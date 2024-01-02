<?php

$op = system_CleanVars ( $_REQUEST, 'action', 'default', 'string' );
switch ( $op ) {

	case 'menumanager':
	//////////////////////
		if (isset($_POST['submitextra']) && $_POST['submitextra'] == 'Submit'){
			global $xoopsDB;
			$mfn_items = $_POST;

			/*foreach ( $mfn_items as $key => $value ){
				foreach ( $value as $keys => $values ){
					$meta_arr[$keys] = $value[$keys];
				}
			}*/
			$menuid = (isset($_POST['menuid']) && is_numeric($_POST['menuid'])) ? intval($_POST['menuid']) : intval($_GET['menuid']);
			$serialise = serialize($mfn_items);
			//var_dump($mfn_items);
			//var_dump($serialise);
			//var_dump($mfn_items);
				
			if ($menuid != '' && $serialise != ''){
				$sqlr = "UPDATE " . $xoopsDB -> prefix( 'menu_group' ) . " SET options ='".addslashes($serialise)."' WHERE id=" . intval($menuid) ;
				if ( $resultr = $xoopsDB -> queryF( $sqlr ) ) {
					$message="menu modifié";
				}else{
					$message = _AM_SYSTEM_THEMEBUILDER_probleme_mod_menu;

				}		
				//echo $message;
				//echo $menuid;
				redirect_header("admin.php?fct=themebuilder1&op=menu&action=menumanager&group_id=$menuid", 5, $message);
				exit();
			}else{
				$message = 'pas bon essayez une autre fois';
				redirect_header('admin.php?fct=themebuilder1&op=menu&action=modifymenuoptions&menuid='.$menuid.'', 5, $message);
				exit();
			}	
		}

$src1 = dirname(__FILE__);
$dst1 = str_replace('include', 'menu', $src1);
define('_DOC_ROOT', $dst1 . '/');
function site_url($url = '') {
	if (!empty($url)) {
		return './admin/themebuilder1/menu/index.php?act=' . $url;
	}
	return _BASE_URL;
}

/**
 * GController
 * This is the base class for all controllers
 * Every controller will extend this class
 */
class GController {

protected $xoops;
var $xoopsDB;
	/**
	 * Constructor. Initialize database connection
	 */
	public function __construct() {
		include _DOC_ROOT . 'includes/db.php';
		$this->db = new DB;
	}

	/**
	 * Includes the view file and display the data
	 *
	 * @param string $view_file
	 * @param array $data
	 */
	protected function view($view_file, $data = '') {
		if (is_array($data)) {
			extract($data);
		}
		$file = _DOC_ROOT . 'templates/' . $view_file . '.php';
		if (file_exists($file)) {
			include $file;
		} else {
			die("Cannot include $view_file");
		}
	}

}

/**
 * default controller & method
 */
//$controller = 'home';
$controller = 'menu';
$method = 'index';

/**
 * url structure: index.php?act=controller.method
 */
if (isset($_GET['act'])) {
	$act = explode('.', $_GET['act']);
	$controller = $act[0];
	if (isset($act[1])) {
		$method = $act[1];
	}
}

$controller_file = _DOC_ROOT . 'modules/' . $controller . '.php';
//echo $controller_file;
if (file_exists($controller_file)) {
	include $controller_file;
	$Class_name = ucfirst($controller);
	$instance = new $Class_name;
	if (!is_callable(array($instance, $method))) {
		die("Cannot call method $method");
	}
	$instance->$method();
} else {
	die("Cannot include controller $controller");
}

/* End of index.php */
	
	
	break;
	
	
	
	case 'modifymenuoptions':

		$menuid = (isset($_POST['menuid']) && is_numeric($_POST['menuid'])) ? intval($_POST['menuid']) : intval($_GET['menuid']);
		global $xoopsDB;
		$sql2 = "SELECT distinct id, title, options FROM " . $xoopsDB -> prefix("menu_group") . " WHERE id =" . $menuid;
		$result2 = $xoopsDB -> query($sql2);
		$video_array = $xoopsDB -> fetchArray( $result2 );
		$menuid = $video_array['id'] ? $video_array['id'] : 0;
		$saved_value = unserialize($video_array['options']);
		//var_dump($saved_value);
		if ( $menuid ) {

		$locations_options = array(
			/*array(
				'title' => 'AM_SYSTEM_THEMEBUILDER_catmenu', 
				'descr' => 'Here you can specify ',
				'id' => 'cat_menu',
				'type' => 'text',
				'values' => '',
				'default' => '',
            
			),	*/	
			/*array(
				'title' => 'Categorie Skin',
				'desc' => 'Select the type of skin to displaying in menu.',
				'id' => 'cat_skin',
				'type' => 'select',
				'options' => array(
					'mega_menu1' => 'mega_menu1',
					'mega_menu' => 'mega_menu', 
					'skin1' => 'skin1', 
					'skin2' => 'skin2', 
					'skin3' => 'skin3', 
					'skin4' => 'skin4', 
					'skin5' => 'skin5', 
					'skin6' => 'skin6',
				),
				'default' => array( 'mega_menu', ),
			),	*/	
					
			array(
				'title' => 'Add to Mega Main Menu:',
				'desc' => 'You can add to the menu container: logo and search...',
				'id' => 'included_components',
				'type' => 'checkbox',
				'options' => array(
					'company_logo' => 'Company Logo (on left side)',
					'search_box' => 'Search Box (on right side)',
					'register' => 'Register',
					'login' => 'Login',
					'social' => 'social',
					'date' => 'date',
				),
				'std' => 'company_logo',
			),
						array(
							'title' => 'Height of the first level items',
							'desc' => 'Set the height for the initial menu container and items of the first level.',
							'id' => 'first_level_item_height',
							'type' => 'number',
							'min' => 20,
							'max' => 300,
							'units' => 'px',
							'values' => '50',
							'std' => '50',
						),
						array(
							'title' => 'Primary Style',
							'desc' => 'Select the button style that fits the style of your site.',
							'id' => 'primary_style',
							'type' => 'radio_img',
							'col_width' => 4,
							'options' => array(
												'flat' 	=> array('title' => 'flat', 'img' => 'admin/themebuilder/images/1col.png'),
												'buttons'	=> array('title' => 'buttons', 'img' => 'admin/themebuilder/images/2col.png'),

							),
							'default' => array( 'flat', ),
						),
						array(
							'title' => 'Buttons Height',
							'desc' =>'Only for "Buttons" style. Specify here height of the first level buttons.',
							'id' => 'first_level_button_height',
							'type' => 'number',
							'min' => 20,
							'max' => 300,
							'units' => 'px',
							'values' => '30',
							'std' => '30',
							'dependency' => array(
								'element' => 'mega_main_menu_options[_primary_style]', 
								'value' => array(
									'buttons',
								),
							),
						),
						array(
							'title' => 'Alignment of the first level items',
							'desc' => 'Choose how to locate menu elements of the first level.',
							'id' => 'first_level_item_align',
							'type' => 'radio_img',
							'col_width' => 4,
							'options' => array(
															
												'left' 	=> array('title' => 'left', 'img' => 'admin/themebuilder/images/1col.png'),
												'center'	=> array('title' => 'center', 'img' => 'admin/themebuilder/images/2col.png'),
												'right' 	=> array('title' => 'right', 'img' => 'admin/themebuilder/images/1col.png'),
												'justify'	=> array('title' => 'justify', 'img' => 'admin/themebuilder/images/2col.png'),
							),
							'default' => array( 'left', ),
						),
						array(
							'title' => 'Location of icon in first level elements',
							'desc' => 'Choose where to locate icon for first level items.',
							'id' => 'first_level_icons_position',
							'type' => 'radio_img',
							'col_width' => 4,
							'options' => array(
						
												'left' 	=> array('title' => 'left', 'img' => 'admin/themebuilder/images/1col.png'),
												'top'	=> array('title' => 'top', 'img' => 'admin/themebuilder/images/2col.png'),
												'right' 	=> array('title' => 'right', 'img' => 'admin/themebuilder/images/1col.png'),
												'disable_first_lvl'	=> array('title' => 'disable_first_lvl', 'img' => 'admin/themebuilder/images/2col.png'),
												'disable_globally'	=> array('title' => 'disable_globally', 'img' => 'admin/themebuilder/images/2col.png'),

							),
							'default' => array( 'left', ),
						),
						array(
							'title' => 'Separator',
							'desc' => 'Select type of separator between the first level items of this menu.',
							'id' => 'first_level_separator',
							'type' => 'radio_img',
							'col_width' => 4,
							'options' => array(

												'none' 	=> array('title' => 'none', 'img' => 'admin/themebuilder/images/1col.png'),
												'smooth'	=> array('title' => 'smooth', 'img' => 'admin/themebuilder/images/2col.png'),
												'sharp' 	=> array('title' => 'sharp', 'img' => 'admin/themebuilder/images/1col.png'),
							),
							'default' => array( 'smooth', ),
						),
						array(
							'title' => 'Rounded corners',
							'desc' => 'Select the value of corners radius.',
							'id' => 'corners_rounding',
							'type' => 'number',
							'min' => 0,
							'max' => 100,
							'units' => 'px',
							'std' => 0,
						),
						array(
							'title' => 'Trigger',
							'desc' => 'Show dropdowns by "hover" or "click"?',
							'id' => 'dropdowns_trigger',
							'type' => 'radio_img',
							'col_width' => 4,
							'options' => array(
						
												'hover' 	=> array('title' => 'hover', 'img' => 'admin/themebuilder/images/1col.png'),
												'click'	=> array('title' => 'click', 'img' => 'admin/themebuilder/images/2col.png'),
							),
							'default' => array( 'hover', ),
						),
						array(
							'title' => 'Dropdowns Animation',
							'desc' => 'Select the type of animation to displaying dropdowns. <span style="color: #f11;">Warning:</span> Animation correctly works only in the latest versions of progressive browsers.',
							'id' => 'dropdowns_animation',
							'type' => 'select',
							'options' => array(
								'None' => 'none',
								'anim_1' => 'Unfold',
								'anim_2' => 'Fading',
								'anim_3' => 'Scale',
								'anim_4' => 'Down to Up',
								'Dropdown' => 'anim_5',
							),
							'default' => array( 'none', ),
						),
						array(
							'title' => 'Minimized on Handheld Devices',
							'desc' => 'If this option is activated you get the folded menu on handheld devices.',
							'id' => 'mobile_minimized',
							'type' => 'switch',
							'options' => array(
								'1' => 'On','0' => 'Off'
							),
							'default' => array( 'true', ),
						),
						array(
							'title' => 'Label for Mobile Menu', 
							'desc' => 'Here you can specify label that will be displayed on the mobile version of the menu.',
							'id' => 'mobile_label',
							'type' => 'text',
							'values' => '',
							'std' => 'Menu',
							'dependency' => array(
								'element' => 'mega_main_menu_options[_mobile_minimized]', 
								'value' => array(
									'true',
								),
							),
						),
						array(
							'title' => 'Direction', 
							'desc' => 'Here you can determine the direction of the menu. Horizontal for classic top menu bar. Vertical for sidebar menu.', 
							'id' => 'direction',
							'type' => 'radio_img',
							'col_width' => 4,
							'options' => array(
												'horizontal' 	=> array('title' => 'horizontal', 'img' => 'admin/themebuilder/images/1col.png'),
												'vertical'	=> array('title' => 'vertical', 'img' => 'admin/themebuilder/images/2col.png'),

							),
							'default' => array( 'horizontal' ),
						),
						array(
							'title' => 'Full Width Initial Container', 
							'desc' => 'If this option is enabled then the primary container will try to be the full width.', 
							'id' => 'fullwidth_container',
							'type' => 'switch',
							'options' => array(
								'1' => 'On','0' => 'Off'
							),

						),
					
						array(
							'title' => 'Height of the first level items when menu is Sticky (or Mobile)', 
							'desc' => 'Set the height for the initial menu container and items of the first level.', 
							'id' => 'first_level_item_height_sticky',
							'type' => 'number',
							'min' => 20,
							'max' => 300,
							'units' => 'px',
							'values' => '40',
							'std' => '40',
							'dependency' => array(
								'element' => 'mega_main_menu_options[_direction]', 
								'value' => array(
									'horizontal',
								),
							),
						),
						array(
							'title' => 'Sticky', 
							'desc' => 'Check this option to make the menu sticky. Incompatible with the "Vertical" menu. Sticky do not working on mobile devices. If the menu will be is sticky on mobile devices when you open it - you can not click on the last item, because it will always be outside the screen.', 
							'id' => 'sticky_status',
							'type' => 'switch',
							'options' => array(
								'1' => 'On','0' => 'Off'
							),
							
						),
						array(
							'title' => 'Sticky scroll offset', 
							'desc' => 'Set the length of the scroll for each user to pass before the menu will stick to the top of the window.', 
							'id' => 'sticky_offset',
							'type' => 'number',
							'min' => 0,
							'max' => 2000,
							'units' => 'px',
							'std' => 340,
						),
						array(
							'title' => 'Background Gradient (Color) of the primary sticky container ',
							'id' => 'menu_sticky_bg_gradient',
							'type' => 'color',
							'class' 	=> '_menu_sticky_bg_gradient',
							'std' => '#ffffff',
						),
						array(
							'title' => 'Push Content Down', 
							'desc' => 'Dropdown areas pushes the main website content down instead to dropping down over content. This option will be useful only for "Multi column" and "Full width" dropdowns.', 
							'id' => 'pushing_content',
							'type' => 'switch',
							'options' => array(
								'1' => 'On','0' => 'Off'
							),
						),
					array(
						'title' => 'The logo file', 
						'desc' => "Select image to be used as logo in Main Mega Menu. It's recommended to use image with transparent background (.PNG) and sizes from 200 to 800 px.", 
						'id' => 'logo_src',
						'type' => 'uploadframe',
						'std' => '/images/logo.png',
					),
					array(
						'title' => 'Maximum logo height', 
						'desc' => 'Maximum logo height in terms of percentage in regard to the height of the initial container.', 
						'id' => 'logo_height',
						'min' => 10,
						'max' => 100,
						'units' => '%',
						'type' => 'number',
						'std' => 90,
					),
					/*array(
						'title' => 'Backup of the configuration', 
						'desc' => 'You can make a backup of the plugin configuration and restore this configuration later. Notice: Options of each menu item from the section "Menu Structure" is not imported.', 
						'id' => 'backup',
						//'type' => 'just_html',
						'std' => '<a href="_page=backup_file">Download backup file with current settings)</a><br /><br />Upload backup file and restore settings. Chose file and click "Save All Settings")<br /><input class="col-xs-12 form-control input-sm" type="file" name="_backup" />'
					),*/
						/*array(
							'title' => 'Background Gradient (Color) of the primary container ', 
							'id' => 'menu_bg_gradient',
							'type' => 'gradient',
							'default' => array( 'color1' => '#428bca', 'color2' => '#2a6496', 'start' => '0', 'end' => '100', 'orientation' => 'top' ),
						),*/
						array(
							'title' => 'Background Gradient (Color) of the primary container ',
							'id' => 'menu_bg_gradient',
							'type' => 'color',
							'class' 	=> '_menu_bg_gradient',
							'std' => '#428bca',
						),
						array(
							'title' => 'Background image of the primary container', 
							'desc' => 'You can choose and tune the background image for the primary container.', 
							'id' => 'menu_bg_image',
							'type' => 'uploadframe',
							'std' => '',
						),
						array(
							/*'title' => 'Font of the First Level Item', 
							'desc' => 'You can change size and weight of the font for first level items.', 
							'id' => 'menu_first_level_link_font',
							'type' => 'font',
							'options' => array( 'font_family', 'font_size', 'font_weight' ),
							'default' => array( 'font_family' => 'Inherit', 'font_size' => '13', 'font_weight' => '400' ),*/
							'title' => 'Font of the First Level Item', 
							'desc' => 'You can change size and weight of the font for first level items.',
							'id' => 'menu_first_level_link_font',
							'type' => 'text',
							'values' => '',
							'std' => 'Inherit',
							
						),
						array(
							'title' => 'Text color of the first level item', 
							'id' => 'menu_first_level_link_color',
							'type' => 'color',
							'class' 	=> '_menu_first_level_link_color',
							'std' => '#f8f8f8',
						),
						array(
							'title' => 'Icons in the first level item', 
							'id' => 'menu_first_level_icon_font',
/*
							'type' => 'font',
							'options' => array( 'font_size', ),
							'default' => array( 'font_size' => '15', ),
*/
							'type' => 'number',
							'col_width' => 3,
							'min' => 0,
							'max' => 200,
							'units' => 'px',
							'values' => '15',
							'std' => '15',
						),
						/*array(
							'title' => 'Background Gradient (Color) of the first level item', 
							'id' => 'menu_first_level_link_bg',
							'type' => 'gradient',
							'default' => array( 'color1' => '#428bca', 'color2' => '#2a6496', 'start' => '0', 'end' => '100', 'orientation' => 'top' ),
						),*/
						array(
							'title' => 'Background Gradient (Color) of the first level item', 
							'id' => 'menu_first_level_link_bg',
							'type' => 'color',
							'class' 	=> '_menu_first_level_link_bg',
							'std' => '#428bca',
						),
						array(
							'title' => 'Text color of the active first level item', 
							'id' => 'menu_first_level_link_color_hover',
							'class' 	=> '_menu_first_level_link_color_hover',
							'type' => 'color',
							'std' => '#f8f8f8',
						),
						/*array(
							'title' => 'Background Gradient (Color) of the active first level item', 
							'id' => 'menu_first_level_link_bg_hover',
							'type' => 'gradient',
							'default' => array( 'color1' => '#3498db', 'color2' => '#2980b9', 'start' => '0', 'end' => '100', 'orientation' => 'top' ),
						),*/
						array(
							'title' => 'Background Gradient (Color) of the active first level item', 
							'id' => 'menu_first_level_link_bg_hover',
							'type' => 'color',
							'class' 	=> '_menu_first_level_link_bg_hover',
							'std' => '#3498db',
						),
						array(
							'title' => 'Background color of the Search Box', 
							'id' => 'menu_search_bg',
							'type' => 'color1',
							//'default' => '#3498db',
							'class' 	=> 'bg_color_section',
							'std' 		=> '#3498db',
						),
						array(
							'title' => 'Text and icon color of the Search Box', 
							'id' => 'menu_search_color',
							'type' => 'color',
							'class' 	=> '_menu_search_color',
							'std' => '#f8f8f8',
						),
						/*array(
							'title' => 'Background Gradient (Color) of the Dropdown Area', 
							'id' => 'menu_dropdown_wrapper_gradient',
							'type' => 'gradient',
							'default' => array( 'color1' => '#ffffff', 'color2' => '#ffffff', 'start' => '0', 'end' => '100', 'orientation' => 'top' ),
						),*/
						array(
							'title' => 'Background Gradient (Color) of the Dropdown Area', 
							'id' => 'menu_dropdown_wrapper_gradient',
							'type' => 'color',
							'class' 	=> '_menu_dropdown_wrapper_gradient',
							'std' => '#ffffff',
						),
						array(
							/*'title' => 'Font of the dropdown menu item', 
							'id' => 'menu_dropdown_link_font',
							//'type' => 'font',
							'options' => array( 'font_family', 'font_size', 'font_weight' ),
							'default' => array( 'font_family' => 'Inherit', 'font_size' => '12', 'font_weight' => '400' ),*/
							'title' => 'Font of the dropdown menu item', 
							'desc' => 'You can change size and weight of the font for dropdown menu item.',
							'id' => 'menu_dropdown_link_font',
							'type' => 'text',
							'values' => '',
							'std' => 'Inherit',
						),
						array(
							'title' => 'Text color of the dropdown menu item', 
							'id' => 'menu_dropdown_link_color',
							'type' => 'color',
							'class' 	=> '_menu_dropdown_link_color',
							'std' => '#428bca',
						),
						array(
							'title' => 'Icons of the dropdown menu item', 
							'id' => 'menu_dropdown_icon_font',
/*
							'type' => 'font',
							'options' => array( 'font_size', ),
							'default' => array( 'font_size' => '12', ),
*/
							'type' => 'number',
							'col_width' => 3,
							'min' => 0,
							'max' => 200,
							'units' => 'px',
							'values' => '12',
							'std' => '12',
						),
						/*array(
							'title' => 'Background Gradient (Color) of the dropdown menu item', 
							'id' => 'menu_dropdown_link_bg',
							'type' => 'gradient',
							'default' => array( 'color1' => 'rgba(255,255,255,0)', 'color2' => 'rgba(255,255,255,0)', 'start' => '0', 'end' => '100', 'orientation' => 'top' ),
						),*/
						array(
							'title' => 'Background Gradient (Color) of the dropdown menu item', 
							'id' => 'menu_dropdown_link_bg',
							'type' => 'color',
							'class' 	=> '_menu_dropdown_link_bg',
							'std' => 'rgba(255,255,255,0)',
						),
						array(
							'title' => 'Border color between dropdown menu items', 
							'id' => 'menu_dropdown_link_border_color',
							'type' => 'color',
							'class' 	=> '_menu_dropdown_link_border_color',
							'std' => '#f0f0f0',
						),
						array(
							'title' => 'Text color of the dropdown active menu item', 
							'id' => 'menu_dropdown_link_color_hover',
							'type' => 'color',
							'class' 	=> '_menu_dropdown_link_color_hover',
							'std' => '#f8f8f8',
						),
						/*array(
							'title' => 'Background Gradient (Color) of the dropdown active menu item', 
							'id' => 'menu_dropdown_link_bg_hover',
							'type' => 'gradient',
							'default' => array( 'color1' => '#3498db', 'color2' => '#2980b9', 'start' => '0', 'end' => '100', 'orientation' => 'top' ),
						),*/
						array(
							'title' => 'Background Gradient (Color) of the dropdown active menu item', 
							'id' => 'menu_dropdown_link_bg_hover',
							'type' => 'color',
							'class' 	=> '_menu_dropdown_link_bg_hover',
							'std' => '#3498db',
						),
						array(
							'title' => 'Plain Text Color of the Dropdown', 
							'id' => 'menu_dropdown_plain_text_color',
							'type' => 'color',
							'class' 	=> '_menu_dropdown_plain_text_color',
							'std' => '#333333',
						),


					/*array(
						'title' => 'Set of Installed Google Fonts', 
						'desc' => 'Select the fonts to be included on the site. Remember that a lot of fonts affect on the speed of load page. Always remove unnecessary fonts. Font faces can see on this page - ' . '<a href="http://www.google.com/fonts" target="_blank">Google fonts</a>',
						'id' => 'set_of_google_fonts',
						//'type' => 'multiplier',
						'std' => '0',
						'options' => array(
							array(
								'title' => 'Font 1', 
								'id' => 'font_item',
								'type' => 'collapse_start',
							),
							array(
								'title' => 'Fonts Faily', 
								'id' => 'family',
								'type' => 'select',
								//'values' => mm_datastore::get_googlefonts_list()'',
								'std' => 'Open Sans'
							),
							array(
								'title' => '',
								'id' => 'font_item',
								'type' => 'collapse_end',
							),
						),
					),*/
					/*array(
						'title' => 'Custom Icons', 
						'desc' => 'You can add custom raster icons. After saving these settings, icons will become available in a modal window of icons selection. Recommended size 64x64 pixels.', 
						'id' => 'set_of_custom_icons',
						//'type' => 'multiplier',
						'std' => '1',
						'options' => array(
							array(
								'title' => 'Custom Icon 1', 
								'id' => 'icon_item',
								'type' => 'collapse_start',
							),
							array(
								'title' => 'Icon File', 
								'id' => 'custom_icon',
								'type' => 'uploadframe',
								'std' => '/images/logo.png',
							),
							array(
								'title' => 'Icon File on Hover', 
								'desc' => 'Keep empty to use regular for both', 
								'id' => 'custom_icon_hover',
								'type' => 'uploadframe',
								'std' => '',
							),
							array(
								'title' => '',
								'id' => 'icon_item',
								'type' => 'collapse_end',
							),
						),
					),
					array(
						'title' =>  'Additional Styles: ', 
						'desc' => 'Here you can add and edit highlighting styles. After that you can select these styles for menu item in "Menus -> Your Menu Item -> Style of This Item" option.'	,
						'id' => 'additional_styles_presets',
						//'type' => 'multiplier',
						'std' => '0',
						'options' => array(
							array(
								'title' => 'Style 1', 
								'id' => 'additional_style_item',
								'type' => 'collapse_start',
							),
							array(
								'title' => 'Style Name', 
								'id' => 'style_name',
								'type' => 'textfield',
								'std' => 'My Highlight Style'
							),
							array(
								'title' => 'Font', 
								'id' => 'font',
								//'type' => 'font',
								'options' => array( 'font_family', 'font_size', 'font_weight' ),
								'default' => array( 'font_family' => 'Inherit', 'font_size' => '12', 'font_weight' => '400' ),
							),
							array(
								'title' => 'Icon Size', 
								'id' => 'icon',
								//'type' => 'font',
								'options' => array( 'font_size', ),
								'default' => array( 'font_size' => '12', ),
							),
							array(
								'title' => 'Text color', 
								'id' => 'text_color',
								'type' => 'color',
								'class' 	=> 'text_color',
								'std' => '#f8f8f8',
							),
							array(
								'title' => 'Background Gradient (Color) ', 
								'id' => 'bg_gradient',
								'type' => 'gradient',
								'default' => array( 'color1' => '#34495E', 'color2' => '#2C3E50', 'start' => '0', 'end' => '100', 'orientation' => 'top' ),
							),
							array(
							'title' => 'Background Gradient (Color) ', 
							'id' => 'bg_gradient',
							'type' => 'color',
							'class' 	=> 'bg_gradient',
							'std' => '#34495E',
						),
							array(
								'title' => 'Text color of the active item', 
								'id' => 'text_color_hover',
								'type' => 'color',
								'class' 	=> 'text_color_hover',
								'std' => '#f8f8f8',
							),
							array(
								'title' => 'Background Gradient (Color) of the active item', 
								'id' => 'bg_gradient_hover',
								'type' => 'gradient',
								'default' => array( 'color1' => '#3d566e', 'color2' => '#354b60', 'start' => '0', 'end' => '100', 'orientation' => 'top' ),
							),
							array(
							'title' => 'Background Gradient (Color) of the active item', 
							'id' => 'bg_gradient_hover',
							'type' => 'color',
							'class' 	=> 'bg_gradient_hover',
							'std' => '#3d566e',
						),
							array(
								'title' => '',
								'id' => 'additional_style_item',
								'type' => 'collapse_end',
							),
						),
					),*/

				/*array(
					'title' => 'Specific Options',
					'id' => 'mm_specific_options',
					'icon' => 'im-icon-hammer',
					'options' => array(*/
						array(
							'title' => 'Custom CSS', 
							'desc' => 'You can place here any necessary custom CSS properties.', 
							'id' => 'custom_css',
							'type' => 'textarea',
							'col_width' => 12,
						),
						array(
							'title' => 'Responsive for Handheld Devices', 
							'desc' => 'Enable responsive properties. If this option is enabled, then the menu will be transformed, if the user uses the handheld device.', 
							'id' => 'responsive_styles',
							'type' => 'switch',
							'options' => array(
								'1' => 'On','0' => 'Off'
							),
							'default' => array( '0', ),
						),
						array(
							'title' => 'Responsive Resolution', 
							'desc' => 'Select on which screen resolution menu will be transformed for mobile devices.', 
							'id' => 'responsive_resolution',
							'type' => 'radio_img',
							'col_width' => 3,
							'options' => array(
					
												'480' 	=> array('title' => '480', 'img' => 'admin/themebuilder/images/1col.png'),
												'768'	=> array('title' => '768', 'img' => 'admin/themebuilder/images/2col.png'),
												'960' 	=> array('title' => '960', 'img' => 'admin/themebuilder/images/1col.png'),
												'1024'	=> array('title' => '1024', 'img' => 'admin/themebuilder/images/2col.png'),

							),
							'default' => array( '1024', ),
						),
						array(
							'title' => 'Use sets of icons', 
							'desc' => 'Here you can activate different sets of icons. Remember that the larger the list of icons - require more of time to loading page.', 
							'id' => 'icon_sets',
							'type' => 'checkbox',
							'options' => array(
								'IcoMoon (1200)' => 'icomoon',
								'FontAwesome (400)' => 'fontawesome',
								'Glyphicons (200)' => 'glyphicons',
							),
							'default' =>  array(
								'icomoon',
							),
						),
						array(
							'title' => 'Use Coercive Styles', 
							'desc' => 'If this option is checked - all CSS properties for this plugin will be have "!important" priority.', 
							'id' => 'coercive_styles',
							'type' => 'switch',
							'options' => array('1' => 'On','0' => 'Off'
							),
						),
						array(
							'title' => '"Indefinite location" mode', 
							'desc' => '<span style="color: #f11;">Warning:</span> If this option is checked - all menus will be replaced by the mega menu. This will be useful only for templates in which are not defined locations of the menu and template has only one menu.', 
							'id' => 'indefinite_location_mode',
							'type' => 'switch',
							'options' => array('1' => 'On','0' => 'Off'
							),
						),
						array(
							'title' => 'Number of widget areas', 
							'desc' => 'Set here how many independent widget areas you need.', 
							'id' => 'number_of_widgets',
							'type' => 'number',
							'min' => 0,
							'max' => 100,
							'units' => 'areas',
							'values' => '1',
							'default' => '1',
						),
						array(
							'title' => 'Language text direction', 
							'desc' => 'You can select direction of the text for this plugin. LTR - sites where text is read from left to right. RTL - sites where text is read from right to left.', 
							'id' => 'language_direction',
							'type' => 'radio_img',
							'options' => array(
					
										
												'ltr' 	=> array('title' => 'ltr', 'img' => 'admin/themebuilder/images/1col.png'),
												'rtl'	=> array('title' => 'rtl', 'img' => 'admin/themebuilder/images/2col.png'),
							),
							'default' =>  array(
								'ltr',
							),
						),
				/*	), // 'options' => array
				),*/
				/*array(
					'title' => 'Settings of the structure',
					'id' => 'mm_structure_settings',
					'icon' => 'im-icon-checkbox',
					'options' => array(
						array(
							'title' => 'Here you can deactivate the options that you  do not use to customize the menu structure. It helps reduce the number of options and reduce the load on the server.', 
							'id' => 'menu_structure_settings',
							'type' => 'caption',
						),
						array(
							'title' => 'Description of the item', 
							'id' => 'item_descr',
							'type' => 'checkbox',
							'options' => array(
								'Disable' => 'disable',
							),
						),
						array(
							'title' => 'Style of the item', 
							'id' => 'item_style',
							'type' => 'checkbox',
							'options' => array(
								'Disable' => 'disable',
							),
							'default' => array( 'true', ),
						),
						array(
							'title' => 'Visibility Control', 
							'id' => 'item_visibility',
							'type' => 'checkbox',
							'options' => array(
								'Disable' => 'disable',
							),
							'default' => array( 'true', ),
						),
						array(
							'title' => 'Icon of the item', 
							'id' => 'item_icon',
							'type' => 'checkbox',
							'options' => array(
								'Disable' => 'disable',
							),
						),
	
						array(
							'title' => 'Hide Icon of the Item', 
							'id' => 'disable_icon',
							'type' => 'checkbox',
							'options' => array(
								'Disable' => 'disable',
							),
						),
	
						array(
							'title' => 'Hide Text of the Item', 
							'id' => 'disable_text',
							'type' => 'checkbox',
							'options' => array(
								'Disable' => 'disable',
							),
						),
						array(
							'title' => 'Disable Link', 
							'id' => 'disable_link',
							'type' => 'checkbox',
							'options' => array(
								'Disable' => 'disable',
							),
						),
						array(
							'title' => 'Pull to the Other Side', 
							'id' => 'pull_to_other_side',
							'type' => 'checkbox',
							'options' => array(
								'Disable' => 'disable',
							),
							'default' => array( 'true', ),
						),
						array(
							'title' => 'Submenu Type', 
							'id' => 'submenu_type',
							'type' => 'checkbox',
							'options' => array(
								'Disable' => 'disable',
							),
						),
						array(
							'title' => 'Side of dropdown elements', 
							'id' => 'submenu_drops_side',
							'type' => 'checkbox',
							'options' => array(
								'Disable' => 'disable',
							),
						),
						array(
							'title' => 'Submenu Columns', 
							'id' => 'submenu_columns',
							'type' => 'checkbox',
							'options' => array(
								'Disable' => 'disable',
							),
						),
						array(
							'title' => 'Enable Full Width Dropdown', 
							'id' => 'submenu_enable_full_width',
							'type' => 'checkbox',
							'options' => array(
								'Disable' => 'disable',
							),
						),
						array(
							'title' => 'Dropdown Background Image', 
							'id' => 'submenu_bg_image',
							'type' => 'checkbox',
							'options' => array(
								'Disable' => 'disable',
							),
						),
					), // 'options' => array
				),*/


			); // END FRIMARY ARRAY








//////////////////////////////	
											
$sqls = "SELECT * FROM ".$xoopsDB->prefix("menu_group")." WHERE id = ".$_GET['menuid']."";
	$css_arrs = $xoopsDB -> fetchArray( $xoopsDB -> query( $sqls ) );
	$item = unserialize($css_arrs['options']);											
		//var_dump($item);	


		echo '	<link rel="stylesheet" href="admin/themebuilder1/assets/js/colorpicker.css" type="text/css" />
	<script type="text/javascript" src="admin/themebuilder1/assets/js/colorpicker.js"></script>
	<script type="text/javascript" src="admin/themebuilder1/builder/fields/switch/field_switch.js"></script>
	<script>
		var upurl = "'.XOOPS_URL.'";
	</script>
	<script src="admin/themebuilder1/builder/fields/uploadframe/mlib-includes/js/init.js" type="text/javascript"></script>';
echo '<style>
.div-table {
  display: table;         
  width: auto;         
  background-color: #eee;         
  border: 1px solid #666666;         
  border-spacing: 1px; /* cellspacing:poor IE support for  this */
}
.div-table-row {
  display: table-row;
  width: 49%;
  clear: both;
}
.div-table-col {
  display: table-cell;         
  width: 49%;  
padding: 2px 12px;  
  background-color: #ccc;  
}
 
 /* -------------- .mfn-radio-img --------------- */
.olivee-radio-item .olivee-radio-img input[type="radio"]{ display:none; }

.olivee-radio-item { float: left; text-align: center; margin-bottom: 10px; width: 84px;}
.olivee-radio-item .olivee-radio-img {margin:5px 0 2px !important;display:inline-block;width: 70px;height: 70px;line-height: 70px !important;text-align: center;background: #f0f5f5;border:3px solid transparent;opacity:.9;}
.olivee-radio-item:hover .olivee-radio-img { opacity:1;}
.olivee-radio-item .olivee-radio-img-selected {border-color: #1ABC9C;opacity:1;}
.olivee-radio-item .olivee-radio-img img { vertical-align: middle;}

/* -------------- .switch --------------- */
.has-switch { float:left; margin-right:15px; border-radius:30px; display:inline-block; cursor:pointer; overflow:hidden; position:relative; text-align:left; width:80px;
	-webkit-mask:url(./admin/themebuilder/images/switch-mask.png) 0 0 no-repeat;
	mask:url(./admin/themebuilder/images/switch-mask.png) 0 0 no-repeat;
	-webkit-user-select:none;
	-moz-user-select:none;
	-ms-user-select:none;
	-o-user-select:none;
	user-select:none
}
.has-switch > div { width:162%; position:relative; top:0}
.has-switch > div.switch-animate {
	-webkit-transition:left .25s ease-out;
	-moz-transition:left .25s ease-out;
	-o-transition:left .25s ease-out;
	transition:left .25s ease-out;
	-webkit-backface-visibility:hidden;
}
.has-switch > div.switch-off { left:-63%; }
.has-switch > div.switch-off label { background-color:#999; border-color:#bbb;
	-webkit-box-shadow:-1px 0 0 rgba(255,255,255,0.5);
	-moz-box-shadow:-1px 0 0 rgba(255,255,255,0.5);
	box-shadow:-1px 0 0 rgba(255,255,255,0.5);
}
.has-switch > div.switch-on{ left:0}
.has-switch > div.switch-on label{ background-color:#1ABC9C}
.has-switch input[type=checkbox]{ display:none}

.has-switch span { cursor:pointer; font-size:14px !important; font-weight:600 !important; float:left; height:29px; line-height:19px !important; padding-bottom:6px; padding-top:5px; position:relative; text-align:center; width:50%; z-index:1; margin:0 !important; color:#fff !important;
	-webkit-box-sizing:border-box;
	-moz-box-sizing:border-box;
	box-sizing:border-box;
	-webkit-transition:.25s ease-out;
	-moz-transition:.25s ease-out;
	-o-transition:.25s ease-out;
	transition:.25s ease-out;
	-webkit-backface-visibility:hidden;}
.has-switch span.switch-left { border-radius:30px 0 0 30px; background-color:#2F4052;  border-left:1px solid transparent}
.has-switch span.switch-right { border-radius:0 30px 30px 0;background-color:#bbb;color:#fff;text-indent:7px}
.has-switch span.switch-right [class*=fui-]{ text-indent:0}
.has-switch label { border:4px solid #2F4052;border-radius:50%;float:left;height:21px;position:relative;vertical-align:middle;width:21px;z-index:100; margin:0 -15px 0 -14px; padding:0;
	-webkit-transition:.25s ease-out;
	-moz-transition:.25s ease-out;
	-o-transition:.25s ease-out;
	transition:.25s ease-out;
	-webkit-backface-visibility:hidden;
}



/* -------------- .switch --------------- */



-------------- .mfn-switch-field --------------- */
.mfn-switch-field .description { margin-top:7px !important;}

.has-switch { float:left; margin-right:15px; border-radius:30px; display:inline-block; cursor:pointer; overflow:hidden; position:relative; text-align:left; width:80px;
	-webkit-mask:url(./admin/themebuilder/images/switch-mask.png) 0 0 no-repeat;
	mask:url(./admin/themebuilder/images/switch-mask.png) 0 0 no-repeat;
	-webkit-user-select:none;
	-moz-user-select:none;
	-ms-user-select:none;
	-o-user-select:none;
	user-select:none
}
.has-switch > div { width:162%; position:relative; top:0}
.has-switch > div.switch-animate {
	-webkit-transition:left .25s ease-out;
	-moz-transition:left .25s ease-out;
	-o-transition:left .25s ease-out;
	transition:left .25s ease-out;
	-webkit-backface-visibility:hidden;
}
.has-switch > div.switch-off { left:-63%; }
.has-switch > div.switch-off label { background-color:#999; border-color:#bbb;
	-webkit-box-shadow:-1px 0 0 rgba(255,255,255,0.5);
	-moz-box-shadow:-1px 0 0 rgba(255,255,255,0.5);
	box-shadow:-1px 0 0 rgba(255,255,255,0.5);
}
.has-switch > div.switch-on{ left:0}
.has-switch > div.switch-on label{ background-color:#1ABC9C}
.has-switch input[type=checkbox]{ display:none}

.has-switch span { cursor:pointer; font-size:14px !important; font-weight:600 !important; float:left; height:29px; line-height:19px !important; padding-bottom:6px; padding-top:5px; position:relative; text-align:center; width:50%; z-index:1; margin:0 !important; color:#fff !important;
	-webkit-box-sizing:border-box;
	-moz-box-sizing:border-box;
	box-sizing:border-box;
	-webkit-transition:.25s ease-out;
	-moz-transition:.25s ease-out;
	-o-transition:.25s ease-out;
	transition:.25s ease-out;
	-webkit-backface-visibility:hidden;}
.has-switch span.switch-left { border-radius:30px 0 0 30px; background-color:#2F4052;  border-left:1px solid transparent}
.has-switch span.switch-right { border-radius:0 30px 30px 0;background-color:#bbb;color:#fff;text-indent:7px}
.has-switch span.switch-right [class*=fui-]{ text-indent:0}
.has-switch label { border:4px solid #2F4052;border-radius:50%;float:left;height:21px;position:relative;vertical-align:middle;width:21px;z-index:100; margin:0 -15px 0 -14px; padding:0;
	-webkit-transition:.25s ease-out;
	-moz-transition:.25s ease-out;
	-o-transition:.25s ease-out;
	transition:.25s ease-out;
	-webkit-backface-visibility:hidden;
}


</style>';
		
	echo '<div class="div-table">';
	echo '<form method="post" action="?fct=themebuilder1&op=menu&action=menumanager">';											
		foreach( $locations_options as $fields => $field ){
			// values for existing items
			if( $item && key_exists( $field['id'], $item ) ){
				$meta = $item[$field['id']];
			} else {
				$meta = false;
			}

			if( ! key_exists('std', $field) ) $field['std'] = false;
				$meta = ( $meta || $meta==='0' ) ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES ));
					
				// field ID
				//$field['id'] = 'mfn-items['. $item_std['type'] .']['. $field['id'] .']';	

				// PRINT Single Muffin Options FIELD
				//mfn_meta_field_input( $field['fields'], $meta );
				
				if( isset( $field['type'] ) ){		
					//echo '<div_left style="text-align: center;">';
						
					// Field Title & SubDescription
					echo '<div class="div-table-row">';
					echo '<div class="div-table-col">';
					if( key_exists('title', $field) ) echo $field['title'];
					if( key_exists('sub_desc', $field) ) echo '<span class="description">'. $field['sub_desc'] .'</span>';
					echo '</div>';
							
					//  Options Field & Description 
					echo '<div class="div-table-col">';
					$field_class = 'OLIVEE_Options_'.$field['type'];
						require_once XOOPS_ROOT_PATH .'/modules/system/admin/themebuilder1/builder/fields/'.$field['type'].'/field_'.$field['type'].'.php';												
						if( class_exists( $field_class ) ){ 
							$field_object = new $field_class( $field, $meta );
							$field_object->render(1);
						}else{
							echo 'pas de class';
						}

						echo '</div>';
						echo '</div>';

						//echo '</div>';
				}else{
					echo 'pas de field type';
				}

		}


		echo '<div class="even div-table-row"><input type="hidden" name="menuid" id="menuid" value="'.$_GET['menuid'].'"><input type="submit" name="submitextra" value="Submit"></div>';
		echo '</form>';
		echo '</div>';											
	}
	break;

	
	case 'view':
		echo '<link rel="stylesheet" type="text/css" href="../../themes/themebuilder1/css/megamenu.css">
			<link rel="stylesheet" href="admin/themebuilder1/assets/css/icomoon.css">';
			include_once XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/menu/includes/treefront.php';
			$tree = new Tree;

		$sql0 = "SELECT * FROM ".$xoopsDB->prefix("menu_group")."";
		$result0=$xoopsDB->query($sql0);
		while ( $myrow1 = $xoopsDB->fetchArray($result0) ) {
			$data1[] = $myrow1;
		}
		//var_dump($data1);
			
		foreach ($data1 as $row1) {
			//var_dump($row1);
			$sql = "SELECT * FROM ".$xoopsDB->prefix("menu")." WHERE group_id = ".$row1['id']." ORDER BY parent_id, position";
			$result=$xoopsDB->query($sql);
			$data = array();
			$tree->clear();
			while ( $myrow = $xoopsDB->fetchArray($result) ) {
				$data[] = $myrow;
			}
			echo $row1['title'];	
				foreach ($data as $row) {
					$label = '<a title="'.$row['title'].'" href="'.$row['url'].'" class="item_link  with_icon" tabindex="16">';
					$label .=	'<i class="'.$row['icon'].'"></i>'; 
					$label .=		'<span class="link_content">';
					$label .=			'<span class="link_text">';
					$label .= 				$row['title'];
					$label .=			'</span>';
					$label .=		'</span>';
					$label .= '</a>';

					$li_attr = '';
					if ($row['class']) {
						$li_attr = $row['class'];
					}
					$tree->add_row($row['id'], $row['parent_id'], $li_attr, $label);

				}
				$output = '';
				$output .= '<link rel="stylesheet" type="text/css" media="all" href="' . XOOPS_URL . '/themes/themebuilder1/css/skinmegamenu.php?id='.$row1['id'].'" />';		
				$output .= $tree->options($row1);
				$output .= $tree->generate_list($row1['options']);;
				$output .= '</div>
				</div>
			</div>';
			
			$output .= '</br></br></br></br></br></br></br></br></br></br>';
			
			echo $output;

		}
	
	break;
	
	default:
		if (isset($_POST['submitextra']) && $_POST['submitextra'] == 'Submit'){
			global $xoopsDB;
			$mfn_items = $_POST;

			/*foreach ( $mfn_items as $key => $value ){
				foreach ( $value as $keys => $values ){
					$meta_arr[$keys] = $value[$keys];
				}
			}*/
			$menuid = (isset($_POST['menuid']) && is_numeric($_POST['menuid'])) ? intval($_POST['menuid']) : intval($_GET['menuid']);
			$serialise = serialize($mfn_items);
			//var_dump($mfn_items);
			//var_dump($serialise);
			//var_dump($mfn_items);
				
			if ($menuid != '' && $serialise != ''){
				$sqlr = "UPDATE " . $xoopsDB -> prefix( 'menu_group' ) . " SET options ='".addslashes($serialise)."' WHERE id=" . intval($menuid) ;
				if ( $resultr = $xoopsDB -> queryF( $sqlr ) ) {
					$message="menu modifié";
				}else{
					$message = _AM_SYSTEM_THEMEBUILDER_probleme_mod_menu;
				}		
				//echo $message;
				//echo $menuid;
				redirect_header("admin.php?fct=themebuilder1&op=menu&action=menumanager&group_id=$menuid", 5, $message);
				exit();
			}else{
				$message = 'pas bon essayez une autre fois';
				redirect_header('admin.php?fct=themebuilder1&op=menu&action=modifymenuoptions&menuid='.$menuid.'', 5, $message);
				exit();
			}
		}	
	
$src1 = dirname(__FILE__);
$dst1 = str_replace('include', 'menu', $src1);
define('_DOC_ROOT', $dst1 . '/');
function site_url($url = '') {
	if (!empty($url)) {
		return './admin/themebuilder1/menu/index.php?act=' . $url;
	}
	return _BASE_URL;
}

/**
 * GController
 * This is the base class for all controllers
 * Every controller will extend this class
 */
class GController {

	protected $xoops;
var $xoopsDB;
	/**
	 * Constructor. Initialize database connection
	 */
	public function __construct() {
		include _DOC_ROOT . 'includes/db.php';
		$this->db = new DB;


	}

	/**
	 * Includes the view file and display the data
	 *
	 * @param string $view_file
	 * @param array $data
	 */
	protected function view($view_file, $data = '') {
		if (is_array($data)) {
			extract($data);
		}
		$file = _DOC_ROOT . 'templates/' . $view_file . '.php';
		if (file_exists($file)) {
			include $file;
		} else {
			die("Cannot include $view_file");
		}
	}

}

/**
 * default controller & method
 */
//$controller = 'home';
$controller = 'menu';
$method = 'index';

/**
 * url structure: index.php?act=controller.method
 */
if (isset($_GET['act'])) {
	$act = explode('.', $_GET['act']);
	$controller = $act[0];
	if (isset($act[1])) {
		$method = $act[1];
	}
}

$controller_file = _DOC_ROOT . 'modules/' . $controller . '.php';
//echo $controller_file;
if (file_exists($controller_file)) {
	include $controller_file;
	$Class_name = ucfirst($controller);
	$instance = new $Class_name;
	if (!is_callable(array($instance, $method))) {
		die("Cannot call method $method");
	}
	$instance->$method();
} else {
	die("Cannot include controller $controller");
}

/* End of index.php */
	
	

	break;

}

?>