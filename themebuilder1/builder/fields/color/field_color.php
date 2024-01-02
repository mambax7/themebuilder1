<?php
class OLIVEE_Options_color{	
	
	/**
	 * Field Constructor.
	*/
	function __construct( $field = array(), $value ='', $parent = NULL ){	//$parent
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
		$class = ( isset($this->field['class']) ) ? $this->field['class'] : '';
		$class = 'hascolorpicker';
		$value = ( $this->value ) ? $this->value : isset($this->field['std']);
		$name = $this->field['id'];
		/*echo '<pre>';
		print_r( $this);
		echo '</pre>';*/

		$tttt = '<input type="text" id="'.$this->field['id'].'" name="'.$name.'" class="'.$class.'" style="background-color: '. $value .'" value="'.$value .'" />

<script type="text/javascript">
	$(document).ready(function() {
	var p = 0;
			// COLOR Picker			
		$(".'.$class.'").each(function(){
			var Othis = this; //cache a copy of the this variable for use inside nested function
			$(this).attr("id", "thumbrel" + p);
			var ID = $(this).attr("id");
				//alert(ID);
			$("#" + ID).ColorPicker({
				color: "'. $value .'",
				onShow: function (colpkr) {
					$(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					$(colpkr).fadeOut(500);
					return false;
				},
				onChange: function (hsb, hex, rgb) {

					$("#" + ID).css("backgroundColor", "#" + hex);
					$("#" + ID).val("#" + hex);
					//alert(ID);
				}
			});
			p++;
		});
	});
</script>';

	echo $tttt;
	}
}
?>