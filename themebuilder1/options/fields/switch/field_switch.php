<?php

class MFN_Options_switch extends MFN_Options
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
        // class ----------------------------------------------------
        if (isset($this->field['class'])) {
            $class = $this->field['class'];
        } else {
            $class = 'regular-text';
        }

        // name -----------------------------------------------------
        if ($meta) {
            // page mata & builder existing items
            $name = 'name="' . $this->field['id'] . '"';
        } else {
            // theme options
            $name = 'name="' . $this->prefix . '[' . $this->field['id'] . ']"';
        }

        // echo -----------------------------------------------------
        //echo '<script src="'. MFN_OPTIONS_URI .'fields/switch/field_switch.js" type="text/javascript"></script>';
        echo '<div class="mfn-switch-field">';

        // fix for value "off = 0"
        if (!$this->value) {
            $this->value = 0;
        }

        // fix for WordPress 3.6 meta options
        if (!str_contains((string) $this->field['id'], '[]')) {
            echo '<input type="hidden" ' . $name . ' value="0" />';
        }
        if ($this->value == 1) {
            $checked = 'checked';
        } else {
            $checked = false;
        }

        echo '<input type="checkbox" data-toggle="switch" id="' . $this->field['id'] . '" ' . $name . ' ' . $class . ' value="1" ' . $checked . ' />';

        if (isset($this->field['desc'])) {
            echo '<span class="description btn-desc">' . $this->field['desc'] . '</span>';
        }

        echo '</div>';
    }

    /**
     * Enqueue
     */
    function enqueue()
    {
        //wp_enqueue_script( 'mfn-opts-field-switch-js', MFN_OPTIONS_URI .'fields/switch/field_switch.js', false, THEME_VERSION, true );
    }
}
