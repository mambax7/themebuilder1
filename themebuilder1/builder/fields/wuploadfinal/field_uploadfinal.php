<?php

class OLIVEE_Options_uploadfinal
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
        $class = $this->field['class'] ?? 'regular-text';
        $name  = (!$meta) ? ($this->args['opt_name'] . '[' . $this->field['id'] . ']') : $this->field['id'];
        $value = $this->value;

        $healthy = ["mfn-rows[", "][]"];
        $yummy   = ["", ""];

        $id = str_replace($healthy, $yummy, (string) $name);

        //$rmTpl->add_head_script('var imgmgr_title = "'.__('Image Manager','rmcommon').'"'."\n".'var mgrURL = "'.RMCURL.'/include/tiny-images.php";');
        $ret = "<script type='text/javascript' src='admin/themebuilder1/fields/uploadfinal/popup-images-manager.js' ></script>";
        $ret .= "<script type='text/javascript' src='admin/themebuilder1/fields/uploadfinal/advanced-fields.js' ></script>";
        $ret .= '<link rel="stylesheet" title="dark" media="screen" href="admin/themebuilder1/fields/uploadfinal/popup-images-manager.css" type="text/css" />';
        $ret .= '<script> var imgmgr_title = "" </script>';
        $ret .= '<div class="adv_imgurl" id="iurl-container-' . $name . '"><div class="input-group txt-and-button">';
        $ret .= '<input class="form-control" type="text" name="' . $name . '" id="' . $name . '" value="' . $this->default . '" size="10" />';
        $ret .= '<span class="input-group-btn adv_img_launcher" data-id="' . $id . '" data-title="insertImage">
        <button type="button" class="btn btn-default">...</button></span>';
        $ret .= '</div>';
        $ret .= '<div class="img-preview"><img id="preview-' . $name . '" src="' . $value . '"' . ($value != '' ? ' style="display: inline-block;"' : '') . ' /></div></div>';
        echo $ret;
    }
}

?>
