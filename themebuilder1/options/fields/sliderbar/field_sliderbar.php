<?php

class MFN_Options_sliderbar extends MFN_Options
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
        // theme options
        $name = 'name="' . $this->prefix . '[' . $this->field['id'] . ']"';

        // parameters
        if (isset($this->field['param'])) {
            $param = $this->field['param'];
        } else {
            $param = false;
        }

        $min = $param['min'] ?? 1;
        $max = $param['max'] ?? 100;

        // echo -----------------------------------------------------
        echo '<div class="mfn-slider-field clearfix">';

        echo '<div id="' . $this->field['id'] . '_sliderbar" class="sliderbar" rel="' . $this->field['id'] . '" data-min="' . $min . '" data-max="' . $max . '"></div>';

        echo '<input type="number" class="sliderbar_input" min="' . $min . '" max="' . $max . '" id="' . $this->field['id'] . '" ' . $name . ' value="' . $this->value . '"/>';

        echo '<div class="range">' . $min . ' - ' . $max . '</div>';

        if (isset($this->field['desc'])) {
            echo '<span class="description">' . $this->field['desc'] . '</span>';
        }

        echo '</div>';
        echo '<script src="' . MFN_OPTIONS_URI . 'fields/sliderbar/field_sliderbar.js" type="text/javascript"></script>';
    }

    /**
     * Enqueue
     */
    function enqueue()
    {
        //wp_enqueue_style( 'mfn-opts-jquery-ui-css' );
        // wp_enqueue_script( 'jquery-slider', MFN_OPTIONS_URI .'fields/sliderbar/jquery.ui.slider.js', array('jquery', 'jquery-ui-core', 'jquery-ui-slider' ), THEME_VERSION), true );
        echo MFN_OPTIONS_URI . 'fields/sliderbar/field_sliderbar.js';
    }
}
