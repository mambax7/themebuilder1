<?php
class OLIVEE_Options_switch{	
	
	/**
	 * Field Constructor.
	*/
	function __construct( $field = array(), $value ='', $parent = NULL ){
		if( is_object($parent) ) parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
		$this->field = $field;
		$this->value = $value;	
	}

	/**
	 * Field Render Function.
	*/
	function render( $meta = false ){
		
		$class = ( isset( $this->field['class']) ) ? 'class="'.$this->field['class'].'" ' : '';	
		$name = ( ! $meta ) ? ( $this->args['opt_name'].'['.$this->field['id'].']' ) : $this->field['id'];
		
		if($this->value = 0){
		$checked = 'checked="checked"';
		}else{
		$checked = false;
		}
		
		// fix for value "off = 0"
		if( ! $this->value ) $this->value = 0;
		// fix for WordPress 3.6 meta options
		//if(strpos( $this->field['id'] ,'[]') === false) echo '<input type="hidden" name="'. $name .'" value="0" />';
		echo "<script type='text/javascript' src='admin/themebuilder/fields/switch/field_switch.js' ></script>";
		echo '<div class="mfn-switch-field">';
		//echo '<input type="checkbox" id="'.$this->field['id'].'" name="'. $name .'" '.$class.' '.$checked.' value="'.$this->value.'"  />';
					if(strpos( $this->field['id'] ,'[]') === false) echo '<input type="hidden" name="'. $name .'" value="0" />';

		echo '<input type="checkbox" data-toggle="switch" id="'.$this->field['id'].'" name="'. $name .'" '.$class.' value="1" '.$checked.' />';

		echo (isset($this->field['desc']) && !empty($this->field['desc']))?'&nbsp;&nbsp;<span class="description btn-desc">'.$this->field['desc'].'</span>':'';	
		echo '</div>';
	echo '';
	
	}
	
	/**
	 * Enqueue Function.
	*/
	/*function enqueue(){		
		wp_enqueue_script( 'mfn-opts-field-switch-js', MFN_OPTIONS_URI.'fields/switch/field_switch.js', false, time(), true );
	}*/
	
}
?>