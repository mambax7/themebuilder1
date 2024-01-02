<?php
class MFN_Options_radio_img extends MFN_Options{

	/**
	 * Constructor
	 */
	function __construct( $field = array(), $value ='', $prefix = false ){

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
			$class = 'regular-text';
		}

		// name -----------------------------------------------------
		if( $meta ){

			// page mata & builder existing items
			$name = 'name="'. $this->field['id'] .'"';

		} else {

			// theme options
			$name = 'name="'. $this->prefix .'['. $this->field['id'] .']"';

		}

		// echo -----------------------------------------------------
		echo '<fieldset class="'. $class .'">';

			foreach( $this->field['options'] as $k => $v ){

				echo '<div class="mfn-radio-item">';

					//$checked = ($this->value[$k] == $k ? "checked='checked'" : "");
					$checked = ($this->value == $k ? "checked='checked'" : "");
					$selected = ( $checked != '') ? ' mfn-radio-img-selected' : '';
//var_dump($this->value);
//var_dump($v['title']);
//var_dump($k);
					echo '<label class="mfn-radio-img'. $selected .'" for="'. $this->field['id'] .'_'. $k .'">';
						echo '<input type="radio" id="'. $this->field['id'] .'_'. $k .'" '. $name . ' value="'. $k .'" '. $checked .'/>';
						echo '<img src="'. $v['img'] .'" alt="'. $v['title'] .'" />';
					echo '</label>';

					echo '<span class="description">'. $v['title'] .'</span>';

				echo '</div>';

			}

			if( isset( $this->field['desc'] ) ){
				echo '<br style="clear:both;"/>';
				echo '<span class="description">'. $this->field['desc'] .'</span>';
			}

		echo '</fieldset>';
echo '<script src="'. MFN_OPTIONS_URI .'fields/radio_img/field_radio_img.js" type="text/javascript"></script>';
	}

	/**
	 * Enqueue
	 */
	function enqueue(){
		echo '<script src="'. MFN_OPTIONS_URI .'fields/radio_img/field_radio_img.js" type="text/javascript"></script>';
		//echo  MFN_OPTIONS_URI .'fields/radio_img/field_radio_img.js';
	}

}
