<?php

class MFN_Options_text extends MFN_Options
{
    public $field;
    public $value;
    public $prefix;

    /**
     * Constructor
     */
    function __construct($field = [], $value = '', $prefix = false)
    {
        $this->field = $field;
        $this->value = $value;

        // theme options 'opt_name'
        $this->prefix = $prefix;
    }

    /**
     * Render
     */
    function render($meta = false)
    {
        // NOTICE builder uses field types: select, text, textarea, upload, tabs, icon

        // class ----------------------------------------------------
        if (isset($this->field['class'])) {
            $class = $this->field['class'];
        } else {
            $class = 'regular-text';
        }

        // title
        if (strpos((string) $this->field['id'], 'title')) {
            $class .= ' mfn-item-title';
        }

        // name -----------------------------------------------------
        if ($meta == 'new') {
            // builder new
            $name = 'data-name="' . $this->field['id'] . '"';
        } elseif ($meta) {
            // page mata & builder existing items
            $name = 'name="' . $this->field['id'] . '"';
        } else {
            // theme options
            $name = 'name="' . $this->prefix . '[' . $this->field['id'] . ']"';
        }

        // echo -----------------------------------------------------
        echo '<input type="text" ' . $name . ' value="' . $this->value . '" class="' . $class . '" />';

        if (isset($this->field['desc'])) {
            echo '<span class="description">' . $this->field['desc'] . '</span>';
        }
    }
}
