<?php

class Tree1
{
    /**
     * variable to store temporary data to be processed later
     *
     * @var array
     */
    public $data;

    /**
     * Add an item
     *
     * @param int    $id      ID of the item
     * @param int    $parent  parent ID of the item
     * @param string $li_attr attributes for <li>
     * @param string $label   text inside <li></li>
     */
    function add_row1($id, $parent, $li_attr, $label)
    {
        $this->data[$parent][] = ['id' => $id, 'li_attr' => $li_attr, 'label' => $label];
    }

    /**
     * Generates nested lists
     *
     * @param string $ul_attr
     * @return string
     */
    function generate_list1($ul_attr = '')
    {
        return $this->ul1(0, $ul_attr);
    }

    /**
     * Recursive method for generating nested lists
     *
     * @param int    $parent
     * @param string $attr
     * @return string
     */
    function ul1($parent = 0, $attr = '')
    {
        static $i = 1;
        $indent = str_repeat("\t\t", $i);
        //var_dump($this->data[$parent]);
        if (isset($this->data[$parent])) {
            if ($attr) {
                $attr = ' ' . $attr;
            }
            $html = "\n$indent";
            $html .= "<ul id='menu-main-menu' class='menu menu-main' $attr>";
            $i++;
            foreach ($this->data[$parent] as $row) {
                $child = $this->ul2($row['id']);
                $html  .= "\n\t$indent";
                $html  .= '<li id="menu-item-' . $row['id'] . '" class="menu-item menu-item-type-post_type menu-item-object-page"' . $row['li_attr'] . '>';
                $html  .= $row['label'];
                if ($child) {
                    $i--;
                    $html .= $child;
                    $html .= "\n\t$indent";
                }
                $html .= '</li>';
            }
            $html .= "\n$indent</ul>";
            return $html;
        } else {
            return false;
        }
    }

    function ul2($parent = 0, $attr = '')
    {
        static $i = 1;
        $indent = str_repeat("\t\t", $i);
        //var_dump($this->data[$parent]);
        if (isset($this->data[$parent])) {
            if ($attr) {
                $attr = ' ' . $attr;
            }
            $html = "\n$indent";
            $html .= "<ul id='menu-main-menu2' class='menu menu-main2' $attr>";
            $i++;
            foreach ($this->data[$parent] as $row) {
                $child = $this->ul2($row['id']);
                $html  .= "\n\t$indent";
                $html  .= '<li id="menu-item-' . $row['id'] . '" class="menu-item menu-item-type-post_type menu-item-object-page"' . $row['li_attr'] . '>';
                $html  .= $row['label'];
                if ($child) {
                    $i--;
                    $html .= $child;
                    $html .= "\n\t$indent";
                }
                $html .= '</li>';
            }
            $html .= "\n$indent</ul>";
            return $html;
        } else {
            return false;
        }
    }

    /**
     * Clear the temporary data
     *
     */
    function clear()
    {
        $this->data = [];
    }
}
