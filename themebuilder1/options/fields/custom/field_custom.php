<?php

class MFN_Options_custom extends MFN_Options
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

        echo '<div class="mfn-custom-field">';

        if ($action == 'wpml') {
            // WPML Installer -----------------------------

            echo '<p>BeTheme is <a href="http://wpml.org/theme/betheme/?aid=29349&affiliate_key=aCEsSE0ka33p" target="_blank">fully compatible with WPML</a> - the WordPress Multilingual Plugin. WPML lets you add languages to your existing sites and includes advanced translation management.</p>';

            echo '<div class="mfn-custom-buttons">';

            echo '<a class="btn-blue btn-green" href="http://wpml.org/purchase/?aid=29349&affiliate_key=aCEsSE0ka33p" target="_blank">Buy and Download</a> ';
            echo '<a class="btn-blue" href="http://wpml.org/features/?aid=29349&affiliate_key=aCEsSE0ka33p" target="_blank">WPML Features</a>';

            echo '</div>';
        } elseif ($action == 'description') {
            echo $this->field['desc'];
        } else {
            // Default ------------------------------------

            echo '<p>This is "field_custom" and requires "action" parameter</p>';
        }

        echo '</div>';
    }
}
