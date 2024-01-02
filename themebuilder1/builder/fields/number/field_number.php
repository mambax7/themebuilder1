<?php
class OLIVEE_Options_number{	
	
	/**
	 * Field Constructor.
	*/
	function __construct( $field = array(), $value ='', $parent = NULL ){
		if( is_object($parent) ) {
			parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
		}
		$this->field = $field;
		$this->value = $value;		
	}
	
	/**
	 * Field Render Function.
	*/
	function render( $meta = false ){
		
		$class = ( isset( $this->field['class']) ) ? $this->field['class'] : 'regular-text';
		$name = ( ! $meta ) ? ( $this->args['opt_name'].'['.$this->field['id'].']' ) : $this->field['id'];
		
		//	<input class="form-control" type="number" step="1" min="0" max="100" name="number_of_widgets" value="1">
		echo '<input type="number" step="1" min="'.$this->field['min'].'" max="'.$this->field['max'].'" name="'. $name .'" value="'.$this->value.'" class="'.$class.'" />';
		echo (isset($this->field['desc']) && !empty($this->field['desc']))?' <span class="description '.$class.'">'.$this->field['desc'].'</span>':'';
		
	}
	
}
?>