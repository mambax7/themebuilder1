<?php
class MFN_Options_font_select extends MFN_Options{

	/**
	 * Constructor
	 */
	function __construct( $field = array(), $value = '', $prefix = false ){

		$this->field = $field;
		$this->value = $value;

		// theme options 'opt_name'
		$this->prefix = $prefix;

	}

	/**
	 * Render
	 */
	function render( $meta = false ){

		// class ----------------------------------------------------
		if( isset( $this->field['class']) ){
			$class = $this->field['class'];
		} else {
			$class = false;
		}

		// name -----------------------------------------------------
		if( $meta ){

			// page mata & builder existing items
			$name = 'name="'. $this->field['id'] .'"';

		} else {

			// theme options
			$name = 'name="'. $this->prefix .'['. $this->field['id'] .']"';

		}

		$fonts = mfn_fonts();

		// echo -----------------------------------------------------
		echo '<select '. $name .' '. $class .' rows="6" >';

			// system fonts
			echo '<optgroup label="System">';
				foreach ( $fonts['system'] as $font ) {
					$selected = ($this->value == $font ? "selected='selected'" : "");
					echo '<option value="'. $font .'" '. $selected .'>'. $font .'</option>';
				}
			echo '</optgroup>';

			// custom font | uploaded in theme options
			if( key_exists( 'custom', $fonts ) ){
				echo '<optgroup label="Custom Fonts">';
				foreach ( $fonts['custom'] as $font ) {
					$selected = ($this->value == $font ? "selected='selected'" : "");
					echo '<option value="'. $font .'" '. $selected .'>'. str_replace( '#', '', $font ) .'</option>';
				}
				echo '</optgroup>';
			}

			// google fonts | all
			echo '<optgroup label="Google Fonts">';
			foreach ( $fonts['all'] as $font ) {
				$selected = ($this->value == $font ? "selected='selected'" : "");
				echo '<option value="'. $font .'" '. $selected .'>'. $font .'</option>';
			}
			echo '</optgroup>';

		echo '</select>';

		if( isset( $this->field['desc'] ) ){
			echo '<span class="description">'. $this->field['desc'] .'</span>';
		}
	}

}
