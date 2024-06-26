<?php

class MFN_Options_tabs extends MFN_Options
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
        // enqueue js fix
        if ($meta) {
            $this->enqueue();
        }

        // name -----------------------------------------------------
        $name = (!$meta) ? ($this->prefix . '[' . $this->field['id'] . ']') : $this->field['id'];

        if ($meta == 'new') {
            // builder new
            $field_prefix = 'data-';
        } else {
            // builder exist & theme options
            $field_prefix = '';
        }

        // echo -----------------------------------------------------
        $count = ($this->value) ? count($this->value) : 0;

        echo '<input type="hidden" ' . $field_prefix . 'name="' . $name . '[count][]" class="mfn-tabs-count" value="' . $count . '" />';

        echo '<a href="javascript:void(0);" class="btn-blue mfn-add-tab" rel-name="' . $name . '">' . __('Add tab', 'mfn-opts') . '</a>';
        echo '<br style="clear:both;" />';

        echo '<ul class="tabs-ul">';

        if (isset($this->value) && is_array($this->value)) {
            foreach ($this->value as $k => $value) {
                echo '<li>';

                echo '<label>' . __('Title', 'mfn-opts') . '</label>';
                echo '<input type="text" name="' . $name . '[title][]" value="' . htmlspecialchars(stripslashes((string) $value['title'])) . '" />';

                echo '<label>' . __('Content', 'mfn-opts') . '</label>';
                echo '<textarea name="' . $name . '[content][]" value="" >' . esc_attr($value['content']) . '</textarea>';

                echo '<a href="" class="mfn-btn-close mfn-remove-tab"><em>delete</em></a>';

                echo '</li>';
            }
        }

        // default tab to clone
        echo '<li class="tabs-default">';

        echo '<label>' . __('Title', 'mfn-opts') . '</label>';
        echo '<input type="text" name="" value="" />';

        echo '<label>' . __('Content', 'mfn-opts') . '</label>';
        echo '<textarea name="" value=""></textarea>';

        echo '<a href="" class="mfn-btn-close mfn-remove-tab"><em>delete</em></a>';

        echo '</li>';

        echo '</ul>';

        if (isset($this->field['desc'])) {
            echo ' <span class="description tabs-desc">' . $this->field['desc'] . '</span>';
        }
    }

    /**
     * Enqueue
     */
    function enqueue()
    {
        wp_enqueue_script('mfn-opts-field-tabs-js', MFN_OPTIONS_URI . 'fields/tabs/field_tabs.js', ['jquery'], THEME_VERSION, true);
    }
}
