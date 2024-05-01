<?php

class OLIVEE_Options_info
{
    /**
     * Field Constructor.
     */
    function __construct($field = [], $value = '', $parent = null)
    {
        if (is_object($parent)) {
            parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
        }
        $this->field = $field;
        $this->value = $value;
    }

    /**
     * Field Render Function.
     */
    function render($meta = false)
    {
        if (key_exists('desc', $this->field)) {
            echo '<p class="description">' . $this->field['desc'] . '</p>';
        }
    }
}

?>
