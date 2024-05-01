<?php

class OLIVEE_Options_textarea
{
    /**
     * Field Constructor.
     */
    function __construct($field = [], $value = '', $parent = null)
    {
        if (is_object($parent)) {
            parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
        }
        $this->field = $field;
        $this->value = $value;
    }

    /**
     * Field Render Function.
     */
    function render($meta = false)
    {
        $class = $this->field['class'] ?? 'large-text';
        $name  = (!$meta) ? ($this->args['opt_name'] . '[' . $this->field['id'] . ']') : $this->field['id'];

        //echo '<textarea name="'. $name .'" class="'.$class.'" rows="6" >'.$this->value.'</textarea>';
        //echo (isset($this->field['desc']) && !empty($this->field['desc']))?'<br/><span class="description">'.$this->field['desc'].'</span>':'';
        $captation = (isset($this->field['desc']) && !empty($this->field['desc'])) ? '<br/><span class="description">' . $this->field['desc'] . '</span>' : '';

        $editor_configs           = [];
        $editor_configs["name"]   = $name;
        $editor_configs["value"]  = $this->value;
        $editor_configs["rows"]   = 35;
        $editor_configs["cols"]   = 60;
        $editor_configs["width"]  = "100%";
        $editor_configs["height"] = "350px";
        $editor_configs['editor'] = 'dhtmltextarea';
        $editor_configs['class']  = $class;

        //$editor = new XoopsFormDhtmlTextArea(_MD_DESCRIPTIONC, 'description', '', 10, 50, '');
        //include (XOOPS_ROOT_PATH . "/class/xoopseditor/tinymce/formtinymce.php");
        $editor1 = new XoopsFormEditor($captation, $name, $editor_configs);
        //var_dump ($editor);
        //var_dump ($editor1);
        echo $editor1->render();
    }
}

?>
