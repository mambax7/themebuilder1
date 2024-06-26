<?php

class MFN_Options_typography extends MFN_Options
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
    function render()
    {
        $name = $this->prefix . '[' . $this->field['id'] . ']';

        if (isset($this->field['class'])) {
            $class = $this->field['class'];
        } else {
            $class = false;
        }

        $disable = $this->field['disable'] ?? '';

        $value = $this->value;

        if (!$value) {
            $value = $this->field['std'];
        } elseif (!is_array($value)) {
            // compatibility with Betheme < 13.5

            $value = [
                'size'           => $value,
                'line_height'    => $this->field['std']['line_height'],
                'weight_style'   => $this->field['std']['weight_style'],
                'letter_spacing' => $this->field['std']['letter_spacing'],
            ];
        }

        // echo -----------------------------------------------------
        echo '<div class="mfn-field-typography ' . $class . '">';

        // font size
        echo '<div class="typography-wrapper typography-size">';

        echo '<label>Font size</label>';

        echo '<input type="number" name="' . $name . '[size]" value="' . $value['size'] . '" class="' . $class . '" />';

        echo '<div class="desc-right">px</div>';

        echo '</div>';

        // line height
        if ($disable != 'line_height') {
            echo '<div class="typography-wrapper typography-line">';

            echo '<label>Line height</label>';

            echo '<input type="number" name="' . $name . '[line_height]" value="' . $value['line_height'] . '" class="' . $class . '" />';

            echo '<div class="desc-right">px</div>';

            echo '</div>';
        }

        // weight
        echo '<div class="typography-wrapper typography-weight">';

        echo '<label>Font weight & style</label>';

        echo '<select name="' . $name . '[weight_style]">';
        /*echo '<option value="100" '. selected( $value['weight_style'], '100', false) .'>100 Thin</option>';
        echo '<option value="100italic" '. selected( $value['weight_style'], '100italic', false) .'>100 Thin Italic</option>';
        echo '<option value="200" '. selected( $value['weight_style'], '200', false) .'>200 Extra-Light</option>';
        echo '<option value="200italic" '. selected( $value['weight_style'], '200italic', false) .'>200 Extra-Light Italic</option>';
        echo '<option value="300" '. selected( $value['weight_style'], '300', false) .'>300 Light</option>';
        echo '<option value="300italic" '. selected( $value['weight_style'], '300italic', false) .'>300 Light Italic</option>';
        echo '<option value="400" '. selected( $value['weight_style'], '400', false) .'>400 Regular</option>';
        echo '<option value="400italic" '. selected( $value['weight_style'], '400italic', false) .'>400 Regular Italic</option>';
        echo '<option value="500" '. selected( $value['weight_style'], '500', false) .'>500 Medium</option>';
        echo '<option value="500italic" '. selected( $value['weight_style'], '500italic', false) .'>500 Medium Italic</option>';
        echo '<option value="600" '. selected( $value['weight_style'], '600', false) .'>600 Semi-Bold</option>';
        echo '<option value="600italic" '. selected( $value['weight_style'], '600italic', false) .'>600 Semi-Bold Italic</option>';
        echo '<option value="700" '. selected( $value['weight_style'], '700', false) .'>700 Bold</option>';
        echo '<option value="700italic" '. selected( $value['weight_style'], '700italic', false) .'>700 Bold Italic</option>';
        echo '<option value="800" '. selected( $value['weight_style'], '800', false) .'>800 Extra-Bold</option>';
        echo '<option value="800italic" '. selected( $value['weight_style'], '800italic', false) .'>800 Extra-Bold Italic</option>';
        echo '<option value="900" '. selected( $value['weight_style'], '900', false) .'>900 Black</option>';
        echo '<option value="900italic" '. selected( $value['weight_style'], '900italic', false) .'>900 Black Italic</option>';*/
        echo '</select>';

        echo '</div>';

        // letter spacing
        echo '<div class="typography-wrapper typography-spacing">';

        echo '<label>Letter spacing</label>';

        echo '<input type="number" name="' . $name . '[letter_spacing]" value="' . $value['letter_spacing'] . '" class="' . $class . '" />';

        echo '<div class="desc-right">px</div>';

        echo '</div>';

        echo '<div class="clearfix"></div>';

        if (isset($this->field['desc']) && !empty($this->field['desc'])) {
            echo '<span class="description">' . $this->field['desc'] . '</span>';
        }

        echo '</div>';
    }
}
