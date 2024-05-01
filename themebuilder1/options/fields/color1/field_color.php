<?php

class MFN_Options_color extends MFN_Options
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
        // name ----------------------------------------------------
        if ($meta) {
            $name = $this->field['id'];
        } else {
            $name = $this->prefix . '[' . $this->field['id'] . ']';
        }

        // value ----------------------------------------------------
        if ($this->value) {
            $value = $this->value;
        } else {
            $value = $this->field['std'] ?? '';
        }

        // alpha ----------------------------------------------------
        if (isset($this->field['alpha'])) {
            $alpha = ' data-alpha="true"';
        } else {
            $alpha = false;
        }

        echo '<div class="mfn-field-color">';

        echo '<input type="text" id="' . $this->field['id'] . '" name="' . $name . '" value="' . $value . '" class="has-colorpicker"' . $alpha . '/>';

        if (isset($this->field['desc'])) {
            echo '<span class="description">' . $this->field['desc'] . '</span>';
        }

        echo '</div>';
        echo '<script src="' . MFN_OPTIONS_URI . 'fields/color/field_color.js" type="text/javascript"></script>';
    }

    /**
     * Enqueue
     */
    function enqueue()
    {
        // Add the color picker css file
        wp_enqueue_style('wp-color-picker');

        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script('mfn-opts-field-color-js', MFN_OPTIONS_URI . 'fields/color/field_color.js', ['wp-color-picker'], THEME_VERSION, true);
    }
}
