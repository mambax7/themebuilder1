<?php

class OLIVEE_Options_upload
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
        //var_dump($this);
        $class = $this->field['class'] ?? 'image';
        $name  = (!$meta) ? ($this->args['opt_name'] . '[' . $this->field['id'] . ']') : $this->field['id'];
        $value = $this->value ?: $this->field['std'];
        //$name = str_replace('[]', '', $name);
        /*
        echo '<input type="hidden" name="'. $name .'" value="'.$this->value.'" class="'.$class.'" />';
        if( $class == 'image' ) echo '<img class="mfn-opts-screenshot '.$class.'" src="'.$this->value.'" />';

        if($this->value == ''){
            $remove = ' style="display:none;"';$upload = '';}else{$remove = '';$upload = ' style="display:none;"';
        }

        echo ' <a href="javascript:void(0);" data-choose="Choose a File" data-update="Select File" class="mfn-opts-upload"'.$upload.' ><span></span>Browse</a>';
        echo ' <a href="javascript:void(0);" class="mfn-opts-upload-remove"'.$remove.'>Remove Upload</a>';
        echo ( isset($this->field['desc']) && ! empty($this->field['desc']) ) ? '<span class="description">'.$this->field['desc'].'</span>' : '';




        $local = dirname($_SERVER['PHP_SELF']);
        $location     = str_replace('/themes/maitscocorporate/admin', '', $local);*/

        //echo '<input type="file" name="file" id="'.$name.'"><br>';
        //echo $this->value;
        echo '<input type="file" name="' . $name . '" value="' . $this->value . '" class="' . $class . '" />';
        if ($class == 'bg_image') {
            echo '<input type="hidden" name="mfnhidden[bg_image][]" value="' . $this->value . '">';
        } else {
            echo '<input type="hidden" name="mfnhidden' . $name . '" value="' . $this->value . '">';
        }
        //if($this->value !=''){
        echo '<img class="mfn-opts-screenshot ' . $class . '" src="' . XOOPS_URL . '/themes/themebuilder/images/' . $this->value . '" />';
        //}
        /*echo "


<script type='text/javascript' src='admin/themebuilder1/js/ajaxupload.js' ></script>
<link rel='stylesheet' type='text/css' href='admin/themebuilder1/js/stylesupload.css' />
<script type='text/javascript' >
    jQuery(function(){
        var btnUpload=jQuery('#upload". $name ."');
        var status=jQuery('#status". $name ."');
        var x = jQuery('#location').val();

        new AjaxUpload(btnUpload, {
            // Arquivo que fará o upload
            action: 'admin/themebuilder1/upload-file.php',
            //Nome da caixa de entrada do arquivo
            name: 'uploadfile". $name ."',
            onSubmit: function(file, ext){
                 if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
                    alert('Only JPG, PNG or GIF files are allowed');
                    return false;
                }
                status.text('Uploading...');
            jQuery('#status". $name ."').show();
            },
            onComplete: function(file, response){
                //Limpamos o status
                status.text('');
                //Adicionar arquivo carregado na lista
                //if(response==='success'){
                if (response != 'error'){
                    //$('<li></li>').appendTo('#files').html('<img src=uploads/'+file+' />'+file).addClass('success');
                    jQuery('<li></li>').appendTo('#files').html('<img src=../../uploads/'+response+' />'+response).addClass('success');
                    jQuery('#imageslider').val(''+x+'/uploads/'+response+'');
                    status.text('');
                    jQuery('#status". $name ."').hide();
                    jQuery('#upload". $name ."').hide();

                } else{
                    alert('File '+file+' do not load...');
jQuery('<li></li>').appendTo('#files". $name ."').text(file).addClass('error');
status.text('Probleme upload...');

                }
            }
        });

    });
</script>

<div id='upload". $name ."' ><span>Upload File<span></div><span id='status". $name ."' ></span>
        <ul id='files". $name ."' ></ul>

        ";*/
    }

    /**
     * Enqueue Function.
     */
    /*
    function enqueue() {
        $wp_version = floatval( get_bloginfo( 'version' ) );
//         print_r($wp_version);

        if ( $wp_version < "3.5" ) {
            wp_enqueue_script(
                'mfn-opts-field-upload-js', 
                MFN_OPTIONS_URI . 'fields/upload/field_upload_3_4.js', 
                array('jquery', 'thickbox', 'media-upload'),
                time(),
                true
            );
            wp_enqueue_style('thickbox');
        } else {
            wp_enqueue_script(
                'mfn-opts-field-upload-js', 
                MFN_OPTIONS_URI . 'fields/upload/field_upload.js', 
                array('jquery'),
                time(),
                true
            );
            wp_enqueue_media();
        }
        wp_localize_script('mfn-opts-field-upload-js', 'mfn_upload', array('url' => $this->url.'fields/upload/blank.png'));
    }*/
}
