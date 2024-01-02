<?php
class OLIVEE_Options_select{	
	
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
		
		$class = ( isset( $this->field['class']) ) ? 'class="'.$this->field['class'].'" ' : '';
		$name = ( ! $meta ) ? ( $this->args['opt_name'].'['.$this->field['id'].']' ) : $this->field['id'];
		//var_dump( $this->field['options'] );
		echo '<select name="'. $name .'" '.$class.'rows="6" >';
			if( isset($this->field['options']) && is_array( $this->field['options'] ) ){
				if ($name == 'mfn-rows[bg_image][]'){
				
					foreach( $this->field['options'] as $k => $v ){
					
					$selected = ($this->value == $v ? "selected='selected'" : "");
						echo '<option '.$selected.' value="'.$v.'">'.$v.'</option>';
					}
				
				}else{
					foreach( $this->field['options'] as $k => $v ){
					
					$selected = ($this->value == $k ? "selected='selected'" : "");
						echo '<option '.$selected.' value="'.$k.'">'.$v.'</option>';
					}
				}
			}
		echo '</select>';
		echo (isset($this->field['desc']) && !empty($this->field['desc']))?' <span class="description">'.$this->field['desc'].'</span>':'';
		
		
	}
	
}
?>