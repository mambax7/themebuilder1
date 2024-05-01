<?php

class OLIVEE_Options_specialblock
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
        $class = $this->field['class'] ?? 'regular-text';
        $name  = (!$meta) ? ($this->args['opt_name'] . '[' . $this->field['id'] . ']') : $this->field['id'];
        //var_dump($this->field);
        echo '<input type="text" name="' . $name . '" value="' . $this->value . '" class="' . $class . '" />';
        echo (isset($this->field['desc']) && !empty($this->field['desc'])) ? ' <span class="description ' . $class . '">' . $this->field['desc'] . '</span>' : '';
        echo (isset($this->field['sub_desc']) && !empty($this->field['sub_desc'])) ? ' <span class="description">' . $this->field['sub_desc'] . '</span>' : '';
    }
}

?>
