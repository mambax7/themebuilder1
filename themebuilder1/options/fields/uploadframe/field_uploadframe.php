<?php

class OLIVEE_Options_uploadframe
{
    /**
     * Constructor
     */
    function __construct($field = [], $value = '', $parent = null)
    {
        if (is_object($parent)) {
//            parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
        }

        $this->field = $field;
        $this->value = $value;
    }

    /**
     * Render
     */
    function render($meta = false)
    {
        // class ----------------------------------------------------
        if (isset($this->field['class'])) {
            $class = $this->field['class'];
        } else {
            $class = 'image';
        }

        // name -----------------------------------------------------
        if ($meta == 'new') {
            // builder new
            $name = 'data-name="' . $this->field['id'] . '"';
        } elseif ($meta) {
            // page mata & builder existing items
            $name = 'name="' . $this->field['id'] . '"';
        } else {
            // theme options
            $name = 'name="' . $this->args['opt_name'] . '[' . $this->field['id'] . ']"';
        }

        // value is empty -------------------------------------------
        if ($this->value == '') {
            $remove = 'style="display:none;"';
            $upload = '';
        } else {
            $remove = '';
            $upload = 'style="display:none;"';
        }

        // echo -----------------------------------------------------
        echo '<div class="up">';

        echo '<input type="text" ' . $name . ' value="' . $this->value . '" style="width: 90%;font-size: 16px;" class="' . $class . '" />';

        echo ' <a href="javascript:void(0);" data-choose="Choose a File" data-update="Select File" class="picurlbtn" ' . $upload . '><span></span>Browse</a>';

        if ($class == 'image') {
            echo '<img class="mfn-opts-screenshot ' . $class . '" src="' . $this->value . '" />';
        }

        echo ' <a href="javascript:void(0);" class="mfn-opts-upload-remove" ' . $remove . '>Remove Upload</a>';
        echo '<span class="controls">
            <a href="javascript:void(0);" class="btn add">+</a>
            <a href="javascript:void(0);" class="btn remove">−</a>
        </span>';
        if (isset($this->field['desc']) && !empty($this->field['desc'])) {
            echo '<span class="description ' . $class . '">' . $this->field['desc'] . '</span>';
        }

        echo '</div>';
    }
}
