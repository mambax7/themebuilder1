<?php

class MFN_Options_ajax extends MFN_Options
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
        $action = $this->field['action'] ?? '';
        $param  = $this->field['param'] ?? '';

        echo '<a href="javascript:void(0);" class="btn-blue mfn-opts-ajax" data-ajax="admin-ajax.php" data-action="' . $action . '" data-param="' . $param . '">Randomize</a>';

        if (isset($this->field['desc'])) {
            echo '<span class="description">' . $this->field['desc'] . '</span>';
        }
    }

    /**
     * Enqueue
     */
    function enqueue()
    {
        wp_enqueue_script('mfn-opts-field-ajax-js', MFN_OPTIONS_URI . 'fields/ajax/field_ajax.js', ['jquery'], THEME_VERSION, true);
    }
}
