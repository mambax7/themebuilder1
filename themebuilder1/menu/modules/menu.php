<?php

class Menu extends GController
{
    /**
     * Constructor. Check if user is logged in.
     */
    public function __construct()
    {
        parent::__construct();
        global $xoopsDB;
    }

    /**
     * Show menu manager
     */
    public function index()
    {
        $group_id = 1;
        if (isset($_GET['group_id'])) {
            $group_id = (int)$_GET['group_id'];
        }
        $menu            = $this->get_menu($group_id);
        $data['menu_ul'] = '<ul id="easymm"></ul>';
        if ($menu) {
            include _DOC_ROOT . 'includes/tree.php';
            $tree = new Tree;

            foreach ($menu as $row) {
                $tree->add_row(
                    $row['id'],
                    $row['parent_id'],
                    ' id="menu-' . $row['id'] . '" class="sortable"',
                    $this->get_label($row)
                );
            }

            $data['menu_ul'] = $tree->generate_list('id="easymm"');
        }
        $data['group_id']    = $group_id;
        $data['group_title'] = $this->get_menu_group_title($group_id);
        $data['menu_groups'] = $this->get_menu_groups();
        $this->view('menu', $data);
    }

    /**
     * Add menu action
     * For use with ajax
     * Return json data
     */
    public function add()
    {
        global $xoopsDB;
        if (isset($_POST['title'])) {
            $data['title'] = trim((string) $_POST['title']);
            if (!empty($data['title'])) {
                $data['url']      = $_POST['url'];
                $data['class']    = $_POST['class'];
                $data['icon']     = $_POST['icon'];
                $data['group_id'] = $_POST['group_id'];
                $data['position'] = $this->get_last_position($_POST['group_id']) + 1;
                if ($this->db->insert($xoopsDB->prefix('menu'), $data)) {
                    $data['id']         = $this->db->Insert_ID();
                    $response['status'] = 1;
                    $li_id              = 'menu-' . $data['id'];
                    $response['li']     = '<li id="' . $li_id . '" class="sortable">' . $this->get_label($data) . '</li>';
                    $response['li_id']  = $li_id;
                } else {
                    $response['status'] = 2;
                    $response['msg']    = 'Add menu error.';
                }
            } else {
                $response['status'] = 3;
            }
            header('Content-type: application/json');
            echo json_encode($response);
        }
    }

    /**
     * Show edit menu form
     */
    public function edit()
    {
        global $xoopsDB;
        //var_dump($xoopsDB);
        if (isset($_GET['id'])) {
            $id          = (int)$_GET['id'];
            $data['row'] = $this->get_row($id);
            $this->view('menu_edit', $data);
        }
    }

    /**
     * Save menu
     * Action for edit menu
     * return json data
     */
    public function save()
    {
        global $xoopsDB;
        if (isset($_POST['title'])) {
            $data['title'] = trim((string) $_POST['title']);
            if (!empty($data['title'])) {
                $data['id']    = $_POST['menu_id'];
                $data['url']   = $_POST['url'];
                $data['class'] = $_POST['class'];
                $data['icon']  = $_POST['icon'];
                if ($this->db->update($xoopsDB->prefix('menu'), $data, 'id' . ' = ' . $data['id'])) {
                    $response['status'] = 1;
                    $d['title']         = $data['title'];
                    $d['url']           = $data['url'];
                    $d['klass']         = $data['class']; //klass instead of class because of an error in js
                    $d['icon']          = $data['icon'];
                    $response['menu']   = $d;
                } else {
                    $response['status'] = 2;
                    $response['msg']    = 'Edit menu error.';
                }
            } else {
                $response['status'] = 3;
            }
            header('Content-type: application/json');
            echo json_encode($response);
        }
    }

    /**
     * Delete menu action
     * Also delete all submenus under current menu
     * return json data
     */
    public function delete()
    {
        global $xoopsDB;
        if (isset($_POST['id'])) {
            $id = (int)$_POST['id'];

            $this->get_descendants($id);
            if (!empty($this->ids)) {
                $ids = implode(', ', $this->ids);
                $id  = "$id, $ids";
            }

            $sql    = sprintf('DELETE FROM %s WHERE %s IN (%s)', $xoopsDB->prefix('menu'), 'id', $id);
            $delete = $this->db->Execute($sql);
            if ($delete) {
                $response['success'] = true;
            } else {
                $response['success'] = false;
            }
            header('Content-type: application/json');
            echo json_encode($response);
        }
    }

    /**
     * Save menu position
     */
    public function save_position()
    {
        if (isset($_POST['easymm'])) {
            $easymm = $_POST['easymm'];
            $this->update_position(0, $easymm);
        }
    }

    /**
     * Recursive function for save menu position
     */
    private function update_position($parent, $children)
    {
        global $xoopsDB;
        $i = 1;
        foreach ($children as $k => $v) {
            $id                = (int)$children[$k]['id'];
            $data['parent_id'] = $parent;
            $data['position']  = $i;
            $this->db->update($xoopsDB->prefix('menu'), $data, 'id' . ' = ' . $id);
            if (isset($children[$k]['children'][0])) {
                $this->update_position($id, $children[$k]['children']);
            }
            $i++;
        }
    }

    /**
     * Get items from menu table
     *
     * @param int $group_id
     * @return array
     */
    private function get_menu($group_id)
    {
        global $xoopsDB;
        $sql = sprintf(
            'SELECT * FROM %s WHERE %s = %s ORDER BY %s, %s',
            $xoopsDB->prefix('menu'),
            'group_id',
            $group_id,
            'parent_id',
            'position'
        );
        return $this->db->GetAll($sql);
    }

    /**
     * Get one item from menu table
     *
     * @param unknown_type $id
     * @return unknown
     */
    private function get_row($id)
    {
        global $xoopsDB;
        //var_dump($xoopsDB);
        $sql = sprintf(
            'SELECT * FROM %s WHERE %s = %s',
            $xoopsDB->prefix('menu'),
            'id',
            $id
        );
        return $this->db->GetRow($sql);
    }

    /**
     * Recursive method
     * Get all descendant ids from current id
     * save to $this->ids
     *
     * @param int $id
     */
    private function get_descendants($id)
    {
        global $xoopsDB;
        $sql  = sprintf(
            'SELECT %s FROM %s WHERE %s = %s',
            'id',
            $xoopsDB->prefix('menu'),
            'parent_id',
            $id
        );
        $data = $this->db->GetCol($sql);

        if (!empty($data)) {
            foreach ($data as $v) {
                $this->ids[] = $v;
                $this->get_descendants($v);
            }
        }
    }

    /**
     * Get the highest position number
     *
     * @param int $group_id
     * @return string
     */
    private function get_last_position($group_id)
    {
        global $xoopsDB;
        $sql = sprintf(
            'SELECT MAX(%s) FROM %s WHERE %s = %s',
            'position',
            $xoopsDB->prefix('menu'),
            'group_id',
            $group_id
        );
        return $this->db->GetOne($sql);
    }

    /**
     * Get all items in menu group table
     *
     * @return array
     */
    private function get_menu_groups()
    {
        global $xoopsDB;
        $sql = sprintf(
            'SELECT %s, %s FROM %s',
            'id',
            'title',
            $xoopsDB->prefix('menu_group')
        );
        return $this->db->GetAssoc($sql);
    }

    /**
     * Get menu group title
     *
     * @param int $group_id
     * @return string
     */
    private function get_menu_group_title($group_id)
    {
        global $xoopsDB;
        $sql = sprintf(
            'SELECT %s FROM %s WHERE %s = %s',
            'title',
            $xoopsDB->prefix('menu_group'),
            'id',
            $group_id
        );
        return $this->db->GetOne($sql);
    }

    /**
     * Get label for list item in menu manager
     * this is the content inside each <li>
     *
     * @param array $row
     * @return string
     */
    private function get_label($row)
    {
        $label =
            '<div class="ns-row">' .
            '<div class="ns-title">' . $row['title'] . '</div>' .
            '<div class="ns-url">' . $row['url'] . '</div>' .
            '<div class="ns-class">' . $row['class'] . '</div>' .
            '<div class="ns-icon"><span class="mfn-icon" data-rel="' . isset($row['icon']) . '"><i class="' . isset($row['icon']) . '"></i></span></div>' .
            '<div class="ns-actions">' .
            '<a href="#" class="edit-menu" title="Edit Menu">' .
            '<img src="./admin/themebuilder1/menu/templates/images/edit.png" alt="Edit">' .
            '</a>' .
            '<a href="#" class="delete-menu">' .
            '<img src="./admin/themebuilder1/menu/templates/images/cross.png" alt="Delete">' .
            '</a>' .
            '<input type="hidden" name="menu_id" value="' . $row['id'] . '">' .
            '</div>' .
            '</div>';
        return $label;
    }
}

/* End of menu.php */
