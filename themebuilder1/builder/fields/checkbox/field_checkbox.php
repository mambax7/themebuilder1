<?php
class OLIVEE_Options_checkbox {	
	
	/**
	 * Field Constructor.
	*/
	function __construct($field = array(), /* $value ='', */ $parent){
		if( is_object($parent) ) {
			parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
		}
		$this->field = $field;
		$this->value = $value;
	
	}

	
	/**
	 * Field Render Function.
	*/
	function render(){
		
		$class = isset( $this->field['class'] ) ? $this->field['class'] : '';

		if ( is_array ( $this->field[ 'options' ] ) ) {
			// Multi Checkboxes
			
			if ( ! isset( $this->value ) ) {
				$this->value = array();
			}
			
			if ( ! is_array( $this->value ) ){
				$this->value = array();
			}
			echo "<script type='text/javascript' src='admin/themebuilder1/builder/fields/checkbox/field_checkbox.js' ></script>";
			echo '<div class="mfnf-checkbox multi '. $class .'">';
			
				echo '<ul>';
					foreach( $this->field['options'] as $k => $v ){
						
						if( ! key_exists( $k, $this->value ) ) $this->value[$k] = '';
						$checked = ($this->value[$k] == $k ? "checked='checked'" : "");
//var_dump($k);
//var_dump($v);
//var_dump($this->value[$k]);
//var_dump($k);
						echo '<li>';
							echo '<label>';
								echo '<input type="checkbox" name="'.$this->field['id'].'['.$k.']" value="'. $k .'" '. $checked .' />';
								echo '<span class="label">'. $v .'</span>';
							echo '</label>';
						echo '</li>';
	
					}
				echo '</ul>';
				
				if( isset( $this->field['desc'] ) && ! empty( $this->field['desc'] ) ) echo '<span class="description">'. $this->field['desc'] .'</span>';
			echo '</div>';
			
			
		} else {
			// Single Checkbox

			echo 'please use "switch" field for single checkbox';
		}
	}
	
	
	/**
	 * Enqueue Function.
	*/
	function enqueue(){
		
		echo "<script type='text/javascript' src='admin/themebuilder1/builder/fields/checkbox/field_checkbox.js' ></script>";
		
	}
	
}
?>