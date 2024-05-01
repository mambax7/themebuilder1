<?php

class OLIVEE_Options_checkbox_pseudo
{
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
        $name = 'name="' . $this->field['id'] . '"';

        // prepare values array

        $this->value = preg_replace('/\s+/', ' ', (string) $this->value);
        $values      = explode(' ', $this->value);

        if (is_array($this->field['options'])) {
            // Multi Checkboxes

            echo '<div class="mfnf-checkbox pseudo multi">';

            echo '<input class="value" type="text" ' . $name . ' value="' . $this->value . '"/>';

            echo '<ul>';
            foreach ($this->field['options'] as $key => $val) {
                if (in_array($key, $values)) {
                    //$check = $key;
                    $check = "checked='checked'";
                } else {
                    $check = false;
                }

                //var_dump($key);

                echo '<li>';
                echo '<label>';
                echo '<input type="checkbox" value="' . $key . '" ' . $check . ' />';
                echo '<span class="label">' . $val . '</span>';
                echo '</label>';
                echo '</li>';
            }
            echo '</ul>';

            if (isset($this->field['desc'])) {
                echo '<span class="description">' . $this->field['desc'] . '</span>';
            }

            echo '</div>';
        } else {
            // Single Checkbox
            echo 'please use "switch" field for single checkbox';
        }

        $this->enqueue();
    }

    /**
     * Enqueue Function.
     */
    function enqueue()
    {
        echo "<script type='text/javascript' src='admin/themebuilder1/builder/fields/checkbox_pseudo/field_checkbox_pseudo.js' ></script>";
    }
}
