<?php

/**
 * Controller for all menu group actions
 * (add/edit/delete) group menu
 */
class Menu_group extends GController
{
    /**
     * Constructor. Check if user is logged in.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Add menu group action
     * or
     * Show add menu group form
     */
    public function add()
    {
        if (isset($_POST['title'])) {
            $data['title'] = trim((string) $_POST['title']);
            if (!empty($data['title'])) {
                if ($this->db->insert($xoopsDB->prefix('menu_group'), $data)) {
                    $response['status'] = 1;
                    $response['id']     = $this->db->Insert_ID();
                } else {
                    $response['status'] = 2;
                    $response['msg']    = 'Add menu group error.';
                }
            } else {
                $response['status'] = 3;
            }
            header('Content-type: application/json');
            echo json_encode($response);
        } else {
            $this->view('menu_group_add');
        }
    }

    /**
     * Edit menu group action
     */
    public function edit()
    {
        if (isset($_POST['title'])) {
            $id                  = (int)$_POST['id'];
            $data['title']       = trim((string) $_POST['title']);
            $response['success'] = false;
            if ($this->db->update($xoopsDB->prefix('menu_group'), $data, 'id' . ' = ' . $id)) {
                $response['success'] = true;
            }
            header('Content-type: application/json');
            echo json_encode($response);
        }
    }

    /**
     * Delete menu group action
     * This will also delete all menus under this group
     */
    public function delete()
    {
        if (isset($_POST['id'])) {
            $id = (int)$_POST['id'];
            if ($id == 1) {
                $response['success'] = false;
                $response['msg']     = 'Cannot delete Group ID = 1';
            } else {
                $sql    = sprintf('DELETE FROM %s WHERE %s = %s', $xoopsDB->prefix('menu_group'), 'id', $id);
                $delete = $this->db->Execute($sql);
                if ($delete) {
                    $sql = sprintf('DELETE FROM %s WHERE %s IN (%s)', $xoopsDB->prefix('menu'), 'group_id', $id);
                    $this->db->Execute($sql);
                    $response['success'] = true;
                } else {
                    $response['success'] = false;
                }
            }
            header('Content-type: application/json');
            echo json_encode($response);
        }
    }
}

/* End of menu_group.php */
