<?php

class ThemeBuilderMenuController {
    protected $xoopsDB;

    public function __construct($xoopsDB) {
        $this->xoopsDB = $xoopsDB;
    }

    public function handleRequest($op) {
        switch ($op) {
            case 'menumanager':
                $this->handleMenuManager();
                break;
            case 'modifymenuoptions':
                $this->handleModifyMenuOptions();
                break;
            case 'view':
                $this->handleView();
                break;
            default:
                if (isset($_POST['submitextra']) && $_POST['submitextra'] == 'Submit') {
                    $this->handleMenuUpdate();
                } else {
                    $this->handleIndex();
                }
                break;
        }
    }

    protected function handleMenuUpdate() {
        $mfn_items = $_POST;
        $menuid = (isset($_POST['menuid']) && is_numeric($_POST['menuid'])) ? intval($_POST['menuid']) : 0;

        $serialise = serialize($mfn_items);
        $serialise_safe = $this->xoopsDB->quoteString($serialise);

        if ($menuid != 0 && $serialise != '') {
            $sqlr = "UPDATE " . $this->xoopsDB->prefix('menu_group') . " SET options =$serialise_safe WHERE id=" . $menuid;
            if ($resultr = $this->xoopsDB->queryF($sqlr)) {
                $message = "menu modifié";
            } else {
                $message = _AM_SYSTEM_THEMEBUILDER_probleme_mod_menu;
            }
            redirect_header("admin.php?fct=themebuilder1&op=menu&action=menumanager&group_id=$menuid", 5, $message);
            exit();
        } else {
            $message = 'Invalid data';
            redirect_header('admin.php?fct=themebuilder1&op=menu&action=modifymenuoptions&menuid=' . $menuid . '', 5, $message);
            exit();
        }
    }

    protected function handleMenuManager() {
        if (isset($_POST['submitextra']) && $_POST['submitextra'] == 'Submit') {
            $this->handleMenuUpdate();
        }
        $this->handleIndex();
    }

    protected function handleModifyMenuOptions() {
        $menuid = (isset($_POST['menuid']) && is_numeric($_POST['menuid'])) ? intval($_POST['menuid']) : (isset($_GET['menuid']) && is_numeric($_GET['menuid']) ? intval($_GET['menuid']) : 0);

        $sql2 = "SELECT distinct id, title, options FROM " . $this->xoopsDB->prefix("menu_group") . " WHERE id =" . $menuid;
        $result2 = $this->xoopsDB->query($sql2);

        if ($result2) {
            $video_array = $this->xoopsDB->fetchArray($result2);
            $menuid = isset($video_array['id']) ? $video_array['id'] : 0;
            $saved_value = isset($video_array['options']) ? unserialize($video_array['options']) : array();
        } else {
            $menuid = 0;
            $saved_value = array();
        }

        if ($menuid) {
            $this->renderModifyMenuOptionsView($menuid, $saved_value);
        } else {
            echo "Menu not found.";
        }
    }

    protected function handleView() {
        echo '<link rel="stylesheet" type="text/css" href="../../themes/themebuilder1/css/megamenu.css">
			<link rel="stylesheet" href="admin/themebuilder1/assets/css/icomoon.css">';

        include_once XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/menu/includes/treefront.php';

        if (class_exists('Tree')) {
            $tree = new Tree;
            $this->renderTreeView($tree);
        } else {
            echo "Tree class not found.";
        }
    }

    protected function handleIndex() {
        if (isset($_GET['act'])) {
            $act = explode('.', (string) $_GET['act']);
            $controller = preg_replace('/[^a-zA-Z0-9_]/', '', $act[0]);
            $method = isset($act[1]) ? preg_replace('/[^a-zA-Z0-9_]/', '', $act[1]) : 'index';

            if (!defined('_DOC_ROOT')) {
                define('_DOC_ROOT', dirname(__DIR__) . '/menu/');
            }

            $controller_file = _DOC_ROOT . 'modules/' . $controller . '.php';
            if (file_exists($controller_file)) {
                include $controller_file;
                $Class_name = ucfirst($controller);
                if (class_exists($Class_name)) {
                    $instance = new $Class_name;
                    if (method_exists($instance, $method) && is_callable([$instance, $method])) {
                        $instance->$method();
                    } else {
                        echo "Cannot call method $method";
                    }
                }
            } else {
                echo "Cannot include controller $controller";
            }
        } else {
             if (!defined('_DOC_ROOT')) {
                define('_DOC_ROOT', dirname(__DIR__) . '/menu/');
            }
            $controller = 'menu';
            $method = 'index';
            $controller_file = _DOC_ROOT . 'modules/' . $controller . '.php';
             if (file_exists($controller_file)) {
                include $controller_file;
                $Class_name = ucfirst($controller);
                if (class_exists($Class_name)) {
                    $instance = new $Class_name;
                    $instance->$method();
                }
             }
        }
    }

    protected function renderModifyMenuOptionsView($menuid, $item) {
        $locations_options = $this->getMenuOptions();

        echo '	<link rel="stylesheet" href="admin/themebuilder1/assets/js/colorpicker.css" type="text/css" />
	<script type="text/javascript" src="admin/themebuilder1/assets/js/colorpicker.js"></script>
	<script type="text/javascript" src="admin/themebuilder1/builder/fields/switch/field_switch.js"></script>
	<script>
		var upurl = "' . XOOPS_URL . '";
	</script>
	<script src="admin/themebuilder1/builder/fields/uploadframe/mlib-includes/js/init.js" type="text/javascript"></script>';

        echo '<style>
            .div-table { display: table; width: auto; background-color: #eee; border: 1px solid #666666; border-spacing: 1px; }
            .div-table-row { display: table-row; width: 49%; clear: both; }
            .div-table-col { display: table-cell; width: 49%; padding: 2px 12px; background-color: #ccc; }
            .olivee-radio-item .olivee-radio-img input[type="radio"]{ display:none; }
            .olivee-radio-item { float: left; text-align: center; margin-bottom: 10px; width: 84px;}
            .olivee-radio-item .olivee-radio-img {margin:5px 0 2px !important;display:inline-block;width: 70px;height: 70px;line-height: 70px !important;text-align: center;background: #f0f5f5;border:3px solid transparent;opacity:.9;}
            .olivee-radio-item:hover .olivee-radio-img { opacity:1;}
            .olivee-radio-item .olivee-radio-img-selected {border-color: #1ABC9C;opacity:1;}
            .olivee-radio-item .olivee-radio-img img { vertical-align: middle;}
            .has-switch { float:left; margin-right:15px; border-radius:30px; display:inline-block; cursor:pointer; overflow:hidden; position:relative; text-align:left; width:80px; -webkit-mask:url(./admin/themebuilder1/images/switch-mask.png) 0 0 no-repeat; mask:url(./admin/themebuilder1/images/switch-mask.png) 0 0 no-repeat; -webkit-user-select:none; -moz-user-select:none; -ms-user-select:none; -o-user-select:none; user-select:none } .has-switch > div { width:162%; position:relative; top:0} .has-switch > div.switch-animate { -webkit-transition:left .25s ease-out; -moz-transition:left .25s ease-out; -o-transition:left .25s ease-out; transition:left .25s ease-out; -webkit-backface-visibility:hidden; } .has-switch > div.switch-off { left:-63%; } .has-switch > div.switch-off label { background-color:#999; border-color:#bbb; -webkit-box-shadow:-1px 0 0 rgba(255,255,255,0.5); -moz-box-shadow:-1px 0 0 rgba(255,255,255,0.5); box-shadow:-1px 0 0 rgba(255,255,255,0.5); } .has-switch > div.switch-on{ left:0} .has-switch > div.switch-on label{ background-color:#1ABC9C} .has-switch input[type=checkbox]{ display:none} .has-switch span { cursor:pointer; font-size:14px !important; font-weight:600 !important; float:left; height:29px; line-height:19px !important; padding-bottom:6px; padding-top:5px; position:relative; text-align:center; width:50%; z-index:1; margin:0 !important; color:#fff !important; -webkit-box-sizing:border-box; -moz-box-sizing:border-box; box-sizing:border-box; -webkit-transition:.25s ease-out; -moz-transition:.25s ease-out; -o-transition:.25s ease-out; transition:.25s ease-out; -webkit-backface-visibility:hidden;} .has-switch span.switch-left { border-radius:30px 0 0 30px; background-color:#2F4052; border-left:1px solid transparent} .has-switch span.switch-right { border-radius:0 30px 30px 0;background-color:#bbb;color:#fff;text-indent:7px} .has-switch span.switch-right [class*=fui-]{ text-indent:0} .has-switch label { border:4px solid #2F4052;border-radius:50%;float:left;height:21px;position:relative;vertical-align:middle;width:21px;z-index:100; margin:0 -15px 0 -14px; padding:0; -webkit-transition:.25s ease-out; -moz-transition:.25s ease-out; -o-transition:.25s ease-out; transition:.25s ease-out; -webkit-backface-visibility:hidden; }
        </style>';

        echo '<div class="div-table">';
        echo '<form method="post" action="?fct=themebuilder1&op=menu&action=menumanager">';

        $menuid_safe = htmlspecialchars($menuid);

        foreach ($locations_options as $fields => $field) {
            if ($item && key_exists($field['id'], $item)) {
                $meta = $item[$field['id']];
            } else {
                $meta = false;
            }

            if (!key_exists('std', $field)) {
                $field['std'] = false;
            }
            $meta = ($meta || $meta === '0') ? $meta : stripslashes(htmlspecialchars(($field['std']), ENT_QUOTES));

            if (isset($field['type'])) {
                echo '<div class="div-table-row">';
                echo '<div class="div-table-col">';
                if (key_exists('title', $field)) {
                    echo $field['title'];
                }
                if (key_exists('sub_desc', $field)) {
                    echo '<span class="description">' . $field['sub_desc'] . '</span>';
                }
                echo '</div>';

                echo '<div class="div-table-col">';
                $field_class = 'OLIVEE_Options_' . $field['type'];
                $field_file = XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/builder/fields/' . $field['type'] . '/field_' . $field['type'] . '.php';

                if (file_exists($field_file)) {
                    require_once $field_file;
                    if (class_exists($field_class)) {
                        $field_object = new $field_class($field, $meta);
                        $field_object->render(1);
                    } else {
                        echo 'Class not found';
                    }
                } else {
                     echo 'Field type not found';
                }

                echo '</div>';
                echo '</div>';
            }
        }

        echo '<div class="even div-table-row"><input type="hidden" name="menuid" id="menuid" value="' . $menuid_safe . '"><input type="submit" name="submitextra" value="Submit"></div>';
        echo '</form>';
        echo '</div>';
    }

    protected function renderTreeView($tree) {
        $sql0 = "SELECT * FROM " . $this->xoopsDB->prefix("menu_group") . "";
        $result0 = $this->xoopsDB->query($sql0);
        $data1 = [];
        while ($myrow1 = $this->xoopsDB->fetchArray($result0)) {
            $data1[] = $myrow1;
        }

        foreach ($data1 as $row1) {
            $sql = "SELECT * FROM " . $this->xoopsDB->prefix("menu") . " WHERE group_id = " . $row1['id'] . " ORDER BY parent_id, position";
            $result = $this->xoopsDB->query($sql);
            $data = [];
            $tree->clear();
            while ($myrow = $this->xoopsDB->fetchArray($result)) {
                $data[] = $myrow;
            }
            echo htmlspecialchars($row1['title']);
            foreach ($data as $row) {
                $label = '<a title="' . htmlspecialchars($row['title']) . '" href="' . htmlspecialchars($row['url']) . '" class="item_link  with_icon" tabindex="16">';
                $label .= '<i class="' . htmlspecialchars($row['icon']) . '"></i>';
                $label .= '<span class="link_content">';
                $label .= '<span class="link_text">';
                $label .= htmlspecialchars($row['title']);
                $label .= '</span>';
                $label .= '</span>';
                $label .= '</a>';

                $li_attr = '';
                if ($row['class']) {
                    $li_attr = htmlspecialchars($row['class']);
                }
                $tree->add_row($row['id'], $row['parent_id'], $li_attr, $label);
            }
            $output = '';
            $output .= '<link rel="stylesheet" type="text/css" media="all" href="' . XOOPS_URL . '/themes/themebuilder1/css/skinmegamenu.php?id=' . $row1['id'] . '" />';
            $output .= $tree->options($row1);
            $output .= $tree->generate_list($row1['options']);;
            $output .= '</div></div></div>';
            $output .= '</br></br></br></br></br></br></br></br></br></br>';

            echo $output;
        }
    }

    protected function getMenuOptions() {
        return [
                [
                    'title'   => 'Add to Mega Main Menu:',
                    'desc'    => 'You can add to the menu container: logo and search...',
                    'id'      => 'included_components',
                    'type'    => 'checkbox',
                    'options' => [
                        'company_logo' => 'Company Logo (on left side)',
                        'search_box'   => 'Search Box (on right side)',
                        'register'     => 'Register',
                        'login'        => 'Login',
                        'social'       => 'social',
                        'date'         => 'date',
                    ],
                    'std'     => 'company_logo',
                ],
                [
                    'title'  => 'Height of the first level items',
                    'desc'   => 'Set the height for the initial menu container and items of the first level.',
                    'id'     => 'first_level_item_height',
                    'type'   => 'number',
                    'min'    => 20,
                    'max'    => 300,
                    'units'  => 'px',
                    'values' => '50',
                    'std'    => '50',
                ],
                [
                    'title'     => 'Primary Style',
                    'desc'      => 'Select the button style that fits the style of your site.',
                    'id'        => 'primary_style',
                    'type'      => 'radio_img',
                    'col_width' => 4,
                    'options'   => [
                        'flat'    => ['title' => 'flat', 'img' => 'admin/themebuilder1/images/1col.png'],
                        'buttons' => ['title' => 'buttons', 'img' => 'admin/themebuilder1/images/2col.png'],

                    ],
                    'default'   => ['flat',],
                ],
                [
                    'title'      => 'Buttons Height',
                    'desc'       => 'Only for "Buttons" style. Specify here height of the first level buttons.',
                    'id'         => 'first_level_button_height',
                    'type'       => 'number',
                    'min'        => 20,
                    'max'        => 300,
                    'units'      => 'px',
                    'values'     => '30',
                    'std'        => '30',
                    'dependency' => [
                        'element' => 'mega_main_menu_options[_primary_style]',
                        'value'   => [
                            'buttons',
                        ],
                    ],
                ],
                [
                    'title'     => 'Alignment of the first level items',
                    'desc'      => 'Choose how to locate menu elements of the first level.',
                    'id'        => 'first_level_item_align',
                    'type'      => 'radio_img',
                    'col_width' => 4,
                    'options'   => [

                        'left'    => ['title' => 'left', 'img' => 'admin/themebuilder1/images/1col.png'],
                        'center'  => ['title' => 'center', 'img' => 'admin/themebuilder1/images/2col.png'],
                        'right'   => ['title' => 'right', 'img' => 'admin/themebuilder1/images/1col.png'],
                        'justify' => ['title' => 'justify', 'img' => 'admin/themebuilder1/images/2col.png'],
                    ],
                    'default'   => ['left',],
                ],
                [
                    'title'     => 'Location of icon in first level elements',
                    'desc'      => 'Choose where to locate icon for first level items.',
                    'id'        => 'first_level_icons_position',
                    'type'      => 'radio_img',
                    'col_width' => 4,
                    'options'   => [

                        'left'              => ['title' => 'left', 'img' => 'admin/themebuilder1/images/1col.png'],
                        'top'               => ['title' => 'top', 'img' => 'admin/themebuilder1/images/2col.png'],
                        'right'             => ['title' => 'right', 'img' => 'admin/themebuilder1/images/1col.png'],
                        'disable_first_lvl' => ['title' => 'disable_first_lvl', 'img' => 'admin/themebuilder1/images/2col.png'],
                        'disable_globally'  => ['title' => 'disable_globally', 'img' => 'admin/themebuilder1/images/2col.png'],

                    ],
                    'default'   => ['left',],
                ],
                [
                    'title'     => 'Separator',
                    'desc'      => 'Select type of separator between the first level items of this menu.',
                    'id'        => 'first_level_separator',
                    'type'      => 'radio_img',
                    'col_width' => 4,
                    'options'   => [

                        'none'   => ['title' => 'none', 'img' => 'admin/themebuilder1/images/1col.png'],
                        'smooth' => ['title' => 'smooth', 'img' => 'admin/themebuilder1/images/2col.png'],
                        'sharp'  => ['title' => 'sharp', 'img' => 'admin/themebuilder1/images/1col.png'],
                    ],
                    'default'   => ['smooth',],
                ],
                [
                    'title' => 'Rounded corners',
                    'desc'  => 'Select the value of corners radius.',
                    'id'    => 'corners_rounding',
                    'type'  => 'number',
                    'min'   => 0,
                    'max'   => 100,
                    'units' => 'px',
                    'std'   => 0,
                ],
                [
                    'title'     => 'Trigger',
                    'desc'      => 'Show dropdowns by "hover" or "click"?',
                    'id'        => 'dropdowns_trigger',
                    'type'      => 'radio_img',
                    'col_width' => 4,
                    'options'   => [

                        'hover' => ['title' => 'hover', 'img' => 'admin/themebuilder1/images/1col.png'],
                        'click' => ['title' => 'click', 'img' => 'admin/themebuilder1/images/2col.png'],
                    ],
                    'default'   => ['hover',],
                ],
                [
                    'title'   => 'Dropdowns Animation',
                    'desc'    => 'Select the type of animation to displaying dropdowns. <span style="color: #f11;">Warning:</span> Animation correctly works only in the latest versions of progressive browsers.',
                    'id'      => 'dropdowns_animation',
                    'type'    => 'select',
                    'options' => [
                        'None'     => 'none',
                        'anim_1'   => 'Unfold',
                        'anim_2'   => 'Fading',
                        'anim_3'   => 'Scale',
                        'anim_4'   => 'Down to Up',
                        'Dropdown' => 'anim_5',
                    ],
                    'default' => ['none',],
                ],
                [
                    'title'   => 'Minimized on Handheld Devices',
                    'desc'    => 'If this option is activated you get the folded menu on handheld devices.',
                    'id'      => 'mobile_minimized',
                    'type'    => 'switch',
                    'options' => [
                        '1' => 'On', '0' => 'Off',
                    ],
                    'default' => ['true',],
                ],
                [
                    'title'      => 'Label for Mobile Menu',
                    'desc'       => 'Here you can specify label that will be displayed on the mobile version of the menu.',
                    'id'         => 'mobile_label',
                    'type'       => 'text',
                    'values'     => '',
                    'std'        => 'Menu',
                    'dependency' => [
                        'element' => 'mega_main_menu_options[_mobile_minimized]',
                        'value'   => [
                            'true',
                        ],
                    ],
                ],
                [
                    'title'     => 'Direction',
                    'desc'      => 'Here you can determine the direction of the menu. Horizontal for classic top menu bar. Vertical for sidebar menu.',
                    'id'        => 'direction',
                    'type'      => 'radio_img',
                    'col_width' => 4,
                    'options'   => [
                        'horizontal' => ['title' => 'horizontal', 'img' => 'admin/themebuilder1/images/1col.png'],
                        'vertical'   => ['title' => 'vertical', 'img' => 'admin/themebuilder1/images/2col.png'],

                    ],
                    'default'   => ['horizontal'],
                ],
                [
                    'title'   => 'Full Width Initial Container',
                    'desc'    => 'If this option is enabled then the primary container will try to be the full width.',
                    'id'      => 'fullwidth_container',
                    'type'    => 'switch',
                    'options' => [
                        '1' => 'On', '0' => 'Off',
                    ],

                ],

                [
                    'title'      => 'Height of the first level items when menu is Sticky (or Mobile)',
                    'desc'       => 'Set the height for the initial menu container and items of the first level.',
                    'id'         => 'first_level_item_height_sticky',
                    'type'       => 'number',
                    'min'        => 20,
                    'max'        => 300,
                    'units'      => 'px',
                    'values'     => '40',
                    'std'        => '40',
                    'dependency' => [
                        'element' => 'mega_main_menu_options[_direction]',
                        'value'   => [
                            'horizontal',
                        ],
                    ],
                ],
                [
                    'title'   => 'Sticky',
                    'desc'    => 'Check this option to make the menu sticky. Incompatible with the "Vertical" menu. Sticky do not working on mobile devices. If the menu will be is sticky on mobile devices when you open it - you can not click on the last item, because it will always be outside the screen.',
                    'id'      => 'sticky_status',
                    'type'    => 'switch',
                    'options' => [
                        '1' => 'On', '0' => 'Off',
                    ],

                ],
                [
                    'title' => 'Sticky scroll offset',
                    'desc'  => 'Set the length of the scroll for each user to pass before the menu will stick to the top of the window.',
                    'id'    => 'sticky_offset',
                    'type'  => 'number',
                    'min'   => 0,
                    'max'   => 2000,
                    'units' => 'px',
                    'std'   => 340,
                ],
                [
                    'title' => 'Background Gradient (Color) of the primary sticky container ',
                    'id'    => 'menu_sticky_bg_gradient',
                    'type'  => 'color',
                    'class' => '_menu_sticky_bg_gradient',
                    'std'   => '#ffffff',
                ],
                [
                    'title'   => 'Push Content Down',
                    'desc'    => 'Dropdown areas pushes the main website content down instead to dropping down over content. This option will be useful only for "Multi column" and "Full width" dropdowns.',
                    'id'      => 'pushing_content',
                    'type'    => 'switch',
                    'options' => [
                        '1' => 'On', '0' => 'Off',
                    ],
                ],
                [
                    'title' => 'The logo file',
                    'desc'  => "SELECT image TO be used AS logo IN Main Mega Menu. It's recommended to use image with transparent background (.PNG) and sizes from 200 to 800 px.",
                    'id'    => 'logo_src',
                    'type'  => 'uploadframe',
                    'std'   => '/images/logo.png',
                ],
                [
                    'title' => 'Maximum logo height',
                    'desc'  => 'Maximum logo height in terms of percentage in regard to the height of the initial container.',
                    'id'    => 'logo_height',
                    'min'   => 10,
                    'max'   => 100,
                    'units' => '%',
                    'type'  => 'number',
                    'std'   => 90,
                ],
                [
                    'title' => 'Background Gradient (Color) of the primary container ',
                    'id'    => 'menu_bg_gradient',
                    'type'  => 'color',
                    'class' => '_menu_bg_gradient',
                    'std'   => '#428bca',
                ],
                [
                    'title' => 'Background image of the primary container',
                    'desc'  => 'You can choose and tune the background image for the primary container.',
                    'id'    => 'menu_bg_image',
                    'type'  => 'uploadframe',
                    'std'   => '',
                ],
                [
                    'title'  => 'Font of the First Level Item',
                    'desc'   => 'You can change size and weight of the font for first level items.',
                    'id'     => 'menu_first_level_link_font',
                    'type'   => 'text',
                    'values' => '',
                    'std'    => 'Inherit',

                ],
                [
                    'title' => 'Text color of the first level item',
                    'id'    => 'menu_first_level_link_color',
                    'type'  => 'color',
                    'class' => '_menu_first_level_link_color',
                    'std'   => '#f8f8f8',
                ],
                [
                    'title'     => 'Icons in the first level item',
                    'id'        => 'menu_first_level_icon_font',
                    'type'      => 'number',
                    'col_width' => 3,
                    'min'       => 0,
                    'max'       => 200,
                    'units'     => 'px',
                    'values'    => '15',
                    'std'       => '15',
                ],
                [
                    'title' => 'Background Gradient (Color) of the first level item',
                    'id'    => 'menu_first_level_link_bg',
                    'type'  => 'color',
                    'class' => '_menu_first_level_link_bg',
                    'std'   => '#428bca',
                ],
                [
                    'title' => 'Text color of the active first level item',
                    'id'    => 'menu_first_level_link_color_hover',
                    'class' => '_menu_first_level_link_color_hover',
                    'type'  => 'color',
                    'std'   => '#f8f8f8',
                ],
                [
                    'title' => 'Background Gradient (Color) of the active first level item',
                    'id'    => 'menu_first_level_link_bg_hover',
                    'type'  => 'color',
                    'class' => '_menu_first_level_link_bg_hover',
                    'std'   => '#3498db',
                ],
                [
                    'title' => 'Background color of the Search Box',
                    'id'    => 'menu_search_bg',
                    'type'  => 'color1',
                    'class' => 'bg_color_section',
                    'std'   => '#3498db',
                ],
                [
                    'title' => 'Text and icon color of the Search Box',
                    'id'    => 'menu_search_color',
                    'type'  => 'color',
                    'class' => '_menu_search_color',
                    'std'   => '#f8f8f8',
                ],
                [
                    'title' => 'Background Gradient (Color) of the Dropdown Area',
                    'id'    => 'menu_dropdown_wrapper_gradient',
                    'type'  => 'color',
                    'class' => '_menu_dropdown_wrapper_gradient',
                    'std'   => '#ffffff',
                ],
                [
                    'title'  => 'Font of the dropdown menu item',
                    'desc'   => 'You can change size and weight of the font for dropdown menu item.',
                    'id'     => 'menu_dropdown_link_font',
                    'type'   => 'text',
                    'values' => '',
                    'std'    => 'Inherit',
                ],
                [
                    'title' => 'Text color of the dropdown menu item',
                    'id'    => 'menu_dropdown_link_color',
                    'type'  => 'color',
                    'class' => '_menu_dropdown_link_color',
                    'std'   => '#428bca',
                ],
                [
                    'title'     => 'Icons of the dropdown menu item',
                    'id'        => 'menu_dropdown_icon_font',
                    'type'      => 'number',
                    'col_width' => 3,
                    'min'       => 0,
                    'max'       => 200,
                    'units'     => 'px',
                    'values'    => '12',
                    'std'       => '12',
                ],
                [
                    'title' => 'Background Gradient (Color) of the dropdown menu item',
                    'id'    => 'menu_dropdown_link_bg',
                    'type'  => 'color',
                    'class' => '_menu_dropdown_link_bg',
                    'std'   => 'rgba(255,255,255,0)',
                ],
                [
                    'title' => 'Border color between dropdown menu items',
                    'id'    => 'menu_dropdown_link_border_color',
                    'type'  => 'color',
                    'class' => '_menu_dropdown_link_border_color',
                    'std'   => '#f0f0f0',
                ],
                [
                    'title' => 'Text color of the dropdown active menu item',
                    'id'    => 'menu_dropdown_link_color_hover',
                    'type'  => 'color',
                    'class' => '_menu_dropdown_link_color_hover',
                    'std'   => '#f8f8f8',
                ],
                [
                    'title' => 'Background Gradient (Color) of the dropdown active menu item',
                    'id'    => 'menu_dropdown_link_bg_hover',
                    'type'  => 'color',
                    'class' => '_menu_dropdown_link_bg_hover',
                    'std'   => '#3498db',
                ],
                [
                    'title' => 'Plain Text Color of the Dropdown',
                    'id'    => 'menu_dropdown_plain_text_color',
                    'type'  => 'color',
                    'class' => '_menu_dropdown_plain_text_color',
                    'std'   => '#333333',
                ],
                [
                    'title'     => 'Custom CSS',
                    'desc'      => 'You can place here any necessary custom CSS properties.',
                    'id'        => 'custom_css',
                    'type'      => 'textarea',
                    'col_width' => 12,
                ],
                [
                    'title'   => 'Responsive for Handheld Devices',
                    'desc'    => 'Enable responsive properties. If this option is enabled, then the menu will be transformed, if the user uses the handheld device.',
                    'id'      => 'responsive_styles',
                    'type'    => 'switch',
                    'options' => [
                        '1' => 'On', '0' => 'Off',
                    ],
                    'default' => ['0',],
                ],
                [
                    'title'     => 'Responsive Resolution',
                    'desc'      => 'Select on which screen resolution menu will be transformed for mobile devices.',
                    'id'        => 'responsive_resolution',
                    'type'      => 'radio_img',
                    'col_width' => 3,
                    'options'   => [

                        '480'  => ['title' => '480', 'img' => 'admin/themebuilder1/images/1col.png'],
                        '768'  => ['title' => '768', 'img' => 'admin/themebuilder1/images/2col.png'],
                        '960'  => ['title' => '960', 'img' => 'admin/themebuilder1/images/1col.png'],
                        '1024' => ['title' => '1024', 'img' => 'admin/themebuilder1/images/2col.png'],

                    ],
                    'default'   => ['1024',],
                ],
                [
                    'title'   => 'Use sets of icons',
                    'desc'    => 'Here you can activate different sets of icons. Remember that the larger the list of icons - require more of time to loading page.',
                    'id'      => 'icon_sets',
                    'type'    => 'checkbox',
                    'options' => [
                        'IcoMoon (1200)'    => 'icomoon',
                        'FontAwesome (400)' => 'fontawesome',
                        'Glyphicons (200)'  => 'glyphicons',
                    ],
                    'default' => [
                        'icomoon',
                    ],
                ],
                [
                    'title'   => 'Use Coercive Styles',
                    'desc'    => 'If this option is checked - all CSS properties for this plugin will be have "!important" priority.',
                    'id'      => 'coercive_styles',
                    'type'    => 'switch',
                    'options' => [
                        '1' => 'On', '0' => 'Off',
                    ],
                ],
                [
                    'title'   => '"Indefinite location" mode',
                    'desc'    => '<span style="color: #f11;">Warning:</span> If this option is checked - all menus will be replaced by the mega menu. This will be useful only for templates in which are not defined locations of the menu and template has only one menu.',
                    'id'      => 'indefinite_location_mode',
                    'type'    => 'switch',
                    'options' => [
                        '1' => 'On', '0' => 'Off',
                    ],
                ],
                [
                    'title'   => 'Number of widget areas',
                    'desc'    => 'Set here how many independent widget areas you need.',
                    'id'      => 'number_of_widgets',
                    'type'    => 'number',
                    'min'     => 0,
                    'max'     => 100,
                    'units'   => 'areas',
                    'values'  => '1',
                    'default' => '1',
                ],
                [
                    'title'   => 'Language text direction',
                    'desc'    => 'You can select direction of the text for this plugin. LTR - sites where text is read from left to right. RTL - sites where text is read from right to left.',
                    'id'      => 'language_direction',
                    'type'    => 'radio_img',
                    'options' => [

                        'ltr' => ['title' => 'ltr', 'img' => 'admin/themebuilder1/images/1col.png'],
                        'rtl' => ['title' => 'rtl', 'img' => 'admin/themebuilder1/images/2col.png'],
                    ],
                    'default' => [
                        'ltr',
                    ],
                ],
        ];
    }
}
?>
