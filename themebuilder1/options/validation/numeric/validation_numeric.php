<?php

class MFN_Validation_numeric extends MFN_Options
{
    /**
     * Field Constructor.
     *
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     * @since MFN_Options 1.0
     */
    function __construct($field, $value, $current)
    {
        parent::__construct();
        $this->field        = $field;
        $this->field['msg'] ??= __('You must provide a numerical value for this option.', 'mfn-opts');
        $this->value        = $value;
        $this->current      = $current;
        $this->validate();
    }//function

    /**
     * Field Render Function.
     *
     * Takes the vars and outputs the HTML for the field in the settings
     *
     * @since MFN_Options 1.0
     */
    function validate()
    {
        if (!is_numeric($this->value)) {
            $this->value = $this->current ?? '';
            $this->error = $this->field;
        }
    }//function
}//class
?>
