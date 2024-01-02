<?php
   header('content-type: text/css');
   ob_start('ob_gzhandler');
   header('Cache-Control: max-age=31536000, must-revalidate');

$id = isset($_GET['id']) ? $_GET['id'] : '';
   
if ( !function_exists( 'css_font' ) ){ 		
	function css_font( $args = array() ) {
//var_dump($args);
			$font = '';
			if ( $args['font_family'] != '' && $args['font_family'] != false ) {
				if ( $args['font_family'] == 'Inherit' ) {
					$font .= "font-family: inherit;\n";
				} else {
					$font .= "font-family: " . $args['font_family'] . ", '" . $args['font_family'] . "';\n";
				}
			}
			/*if ( $args['font_color'] != '' && $args['font_color'] != false ) {
				$font .= "color: " . $args['font_color'] . ";\n";
			}
			if ( $args['font_size'] != '' && $args['font_size'] != false ) {
				$font .= "font-size: " . $args['font_size'] . "px;\n";
			}
			if ( $args['font_weight'] != '' && $args['font_weight'] != false ) {
				$font .= "font-weight: " . $args['font_weight'] . ";\n";
			}*/
			return $font;
		}
}
 if (file_exists("../../mainfile.php")) {   
include("../../mainfile.php");  
} elseif (file_exists("../../../mainfile.php")) {   
include("../../../mainfile.php");  
// Disable all debugging for this file. 
error_reporting(0); 
$xoopsLogger->activated = false;
} 
 global $xoopsDB;
$sql = "SELECT * FROM ".$xoopsDB->prefix("menu_group")." WHERE id = ".$id."";
$result=$xoopsDB->query($sql);
$options = $xoopsDB->fetchArray($result);
//var_dump($options['options']); 
$unserialise = unserialize($options['options']);
//$arg = 'menu'.$options['id'];
$arg = 'menu'.$id;

$out = '@import url(https://fonts.googleapis.com/css?family=' . $unserialise["menu_first_level_link_font"] . '|'.$unserialise['menu_dropdown_link_font'].');';
$out .= ' /* ' . $arg . ' */
/* initial_height */
#mega_main_menu.' . $arg . '
{
	min-height:' . $unserialise['first_level_item_height'] . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > .nav_logo > .logo_link, 
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle, 
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button, 
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link, 
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link > .link_content, 
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_search_box,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_login,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_register,
#mega_main_menu.' . $arg . '.icons-left > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.icons-right > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.disable_icon > .link_content,
#mega_main_menu.' . $arg . '.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.menu_item_without_text > i, 
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link > i.ci-icon-buddypress-user
{
	height:' . $unserialise['first_level_item_height'] . 'px;
	line-height:' . $unserialise['first_level_item_height'] . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link > .link_content > .link_text
{
	height:' . $unserialise['first_level_item_height'] . 'px;
}
#mega_main_menu.' . $arg . '.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
{
	height:' . ( $unserialise['first_level_item_height'] / 2 ) . 'px;
	line-height:' . ( $unserialise['first_level_item_height'] / 3 ) . 'px;
}
#mega_main_menu.' . $arg . '.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.with_icon > .link_content > .link_text
{
	height:' . ( $unserialise['first_level_item_height'] / 3 ) . 'px;
}
#mega_main_menu.' . $arg . '.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i
{
	padding-top:' . ( $unserialise['first_level_item_height'] / 3 / 2 ) . 'px;
}
#mega_main_menu.' . $arg . '.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
{
	padding-bottom:' . ( $unserialise['first_level_item_height'] / 3 / 2 ) . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link > i:before
{	
	width:' . ( $unserialise['first_level_item_height'] * 0.6 ) . 'px;
}
/* initial_height_sticky */
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > .nav_logo > .logo_link, 
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > .nav_logo > .mobile_toggle, 
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button, 
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link, 
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > .link_content, 
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > ul > li.nav_search_box,
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > ul > li.nav_login,
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > ul > li.nav_register,
#mega_main_menu.' . $arg . '.icons-left > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.icons-right > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link.disable_icon > .link_content,
#mega_main_menu.' . $arg . '.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link.menu_item_without_text > i, 
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > ul > li.nav_buddypress > .item_link > i.ci-icon-buddypress-user
{
	height:' . $unserialise['first_level_item_height_sticky'] . 'px;
	line-height:' . $unserialise['first_level_item_height_sticky'] . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > .link_content > .link_text 
{
	height:' . $unserialise['first_level_item_height_sticky'] . 'px;
	
}
#mega_main_menu.' . $arg . '.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > .link_content
{
	height:' . ( $unserialise['first_level_item_height_sticky'] / 2 ) . 'px;
	line-height:' . ( $unserialise['first_level_item_height_sticky'] / 3 ) . 'px;
}
#mega_main_menu.' . $arg . '.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link.with_icon > .link_content > .link_text
{
	height:' . ( $unserialise['first_level_item_height_sticky'] / 3 ) . 'px;
}
#mega_main_menu.' . $arg . '.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > i
{
	padding-top:' . ( $unserialise['first_level_item_height_sticky'] / 3 / 2 ) . 'px;
}
#mega_main_menu.' . $arg . '.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > .link_content
{
	padding-bottom:' . ( $unserialise['first_level_item_height_sticky'] / 3 / 2 ) . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > ul > li.nav_buddypress > .item_link > i:before
{	
	width:' . ( $unserialise['first_level_item_height_sticky'] * 0.6 ) . 'px;
}
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link 
{
	margin:' . ( ( $unserialise['first_level_item_height_sticky'] - $unserialise['first_level_button_height'] ) / 2 ) . 'px 4px;
}
#mega_main_menu.direction-horizontal > .menu_holder.sticky_container > .mmm_fullwidth_container {
    top: 0px !important;
    right: 0px !important;
    bottom: 0px !important;
    left: 0px !important;
    background-color: ' . $unserialise['menu_sticky_bg_gradient'] . ';
}
#mega_main_menu.direction-horizontal > .menu_holder.sticky_container > .menu_inner > ul > li  {

    background-color: ' . $unserialise['menu_sticky_bg_gradient'] . ';
}
#mega_main_menu.direction-horizontal > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link {

    background-color: transparent;
}
.direction-vertical
	{
		max-width: 300px;
		margin: 0px;
	}


/* initial_height_mobile */
@media (max-width: 767px) { /* DO NOT CHANGE THIS LINE (See = Specific Options -> Responsive Resolution) */
	#mega_main_menu.' . $arg . '
	{
		min-height:' . $unserialise['first_level_item_height_sticky'] . 'px;
	}
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > .nav_logo > .logo_link, 
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle, 
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button, 
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li > .item_link, 
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li > .item_link > .link_content, 
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li.nav_search_box,
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li.nav_login,
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li.nav_register,
	#mega_main_menu.' . $arg . '.mobile_minimized-enable.icons-left > .menu_holder > .menu_inner > ul > li > .item_link > i,
	#mega_main_menu.' . $arg . '.mobile_minimized-enable.icons-right > .menu_holder > .menu_inner > ul > li > .item_link > i,
	#mega_main_menu.' . $arg . '.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.disable_icon > .link_content,
	#mega_main_menu.' . $arg . '.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.menu_item_without_text > i, 
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link > i.ci-icon-buddypress-user
	{
		height:' . $unserialise['first_level_item_height_sticky'] . 'px;
		line-height:' . $unserialise['first_level_item_height_sticky'] . 'px;
	}
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li > .item_link > .link_content > .link_text 
	{
		height:' . $unserialise['first_level_item_height_sticky'] . 'px;
	}
	#mega_main_menu.' . $arg . '.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i,
	#mega_main_menu.' . $arg . '.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
	{
		height:' . ( $unserialise['first_level_item_height_sticky'] / 2 ) . 'px;
		line-height:' . ( $unserialise['first_level_item_height_sticky'] / 3 ) . 'px;
	}
	#mega_main_menu.' . $arg . '.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i
	{
		padding-top:' . ( $unserialise['first_level_item_height_sticky'] / 3 / 2 ) . 'px;
	}
	#mega_main_menu.' . $arg . '.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
	{
		padding-bottom:' . ( $unserialise['first_level_item_height_sticky'] / 3 / 2 ) . 'px;
	}
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link > i:before
	{	
		width:' . ( $unserialise['first_level_item_height_sticky'] * 0.6 ) . 'px;
	}
	#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link 
	{
		margin:' . ( ( $unserialise['first_level_item_height_sticky'] - $unserialise['first_level_button_height'] ) / 2 ) . 'px 4px;
	}
}
/* style-buttons */
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link, 
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link > .link_content, 
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-left > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-right > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.disable_icon > .link_content,
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.menu_item_without_text > i, 
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link > i.ci-icon-buddypress-user
{
	height:' . $unserialise['first_level_button_height'] . 'px;
	line-height:' . $unserialise['first_level_button_height'] . 'px;
}
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link > .link_content > .link_text 
{
	height:' . $unserialise['first_level_button_height'] . 'px;
}
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link 
{
	margin:' . ( ( $unserialise['first_level_item_height'] - $unserialise['first_level_button_height'] ) / 2 ) . 'px 4px;
}
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
{
	height:' . ( $unserialise['first_level_button_height'] / 2 ) . 'px;
	line-height:' . ( $unserialise['first_level_button_height'] / 3 ) . 'px;
}
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.with_icon > .link_content > .link_text 
{
	height:' . ( $unserialise['first_level_button_height'] / 3 ) . 'px;
}
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i
{
	padding-top:' . ( $unserialise['first_level_button_height'] / 3 / 2 ) . 'px;
}
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
{
	padding-bottom:' . ( $unserialise['first_level_button_height'] / 3 / 2 ) . 'px;
}
/* color_scheme */
#mega_main_menu.' . $arg . ' > .menu_holder > .mmm_fullwidth_container
{
	/*" . mm_common::css_gradient( $unserialise["_menu_bg_gradient"] ) . "*/
	background-color: ' . $unserialise['menu_bg_gradient'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .mmm_fullwidth_container
{
	/*" . mm_common::css_bg_image( $unserialise["_menu_bg_image"] ) . "*/	
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link .link_text,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_search_box *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li .post_details > .post_title,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li .post_details > .post_title > .item_link
{
	/*" . mm_common::css_font( $unserialise["_menu_first_level_link_font"] ) . "*/
	/*' . css_font( $unserialise['menu_first_level_link_font'] ) . '*/
/*font-family: Tahoma, "Tahoma";*/
font-family: '.$unserialise['menu_first_level_link_font'].', serif;
font-size:' . $unserialise['menu_first_level_icon_font'] . 'px;
font-weight: 200;
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link > i
{
	font-size:' . $unserialise['menu_first_level_icon_font'] . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link > i:before
{	
	width:' . $unserialise['menu_first_level_icon_font'] . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link *
{
	color: ' . $unserialise['menu_first_level_link_color'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link:after
{
	border-color: ' . $unserialise['menu_first_level_link_color'] . ';
}
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link
{
	/*" . mm_common::css_gradient( $unserialise["_menu_first_level_link_bg"] ) . "*/
	background-color: ' . $unserialise['menu_first_level_link_bg'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li:hover > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link:hover,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link:focus,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-page-ancestor > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-post-ancestor > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link
{
	/*" . mm_common::css_gradient( $unserialise["_menu_first_level_link_bg_hover"] ) . "*/
	background-color: ' . $unserialise['menu_first_level_link_bg_hover'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_search_box > #mega_main_menu_searchform
{
	background-color:' . $unserialise['menu_search_bg'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_search_box .field,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_search_box *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li .icosearch
{
	color: ' . $unserialise['menu_search_color'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li .icouser
{
	color: ' . $unserialise['menu_first_level_link_color'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li:hover > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link:hover,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link:focus,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li:hover > .item_link *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-page-ancestor > .item_link *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-post-ancestor > .item_link *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link *
{
	color: ' . $unserialise['menu_first_level_link_color_hover'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link:after,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-page-ancestor > .item_link:after,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-post-ancestor > .item_link:after,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link:after,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li:hover > .item_link:after
{
	border-color: ' . $unserialise['menu_first_level_link_color_hover'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.default_dropdown .mega_dropdown,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .mega_dropdown,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li .mega_dropdown > li .post_details
{
	/*" . mm_common::css_gradient( $unserialise["_menu_dropdown_wrapper_gradient"] ) . "*/
		background-color: ' . $unserialise['menu_dropdown_wrapper_gradient'] . ';

}
#mega_main_menu.' . $arg . ' .mega_dropdown *
{
	color: ' . $unserialise['menu_dropdown_plain_text_color'] . ';
}
#mega_main_menu.' . $arg . ' ul li .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' ul li .mega_dropdown > li > .item_link .link_text,
#mega_main_menu.' . $arg . ' ul li .mega_dropdown,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li .post_details > .post_description
{
	/*" . mm_common::css_font( $unserialise["_menu_dropdown_link_font"] ) . "
	' . css_font( $unserialise['menu_dropdown_link_font'] ) . '*/
		font-family: Verdana, "Verdana";
		font-family: '.$unserialise['menu_dropdown_link_font'].', serif;
font-size: 12px;
font-weight: 300;
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li .mega_dropdown > li > .item_link.with_icon
{
	line-height: ' . $unserialise['menu_dropdown_icon_font'] . 'px;
	min-height: ' . $unserialise['menu_dropdown_icon_font'] . 'px;
}
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > .menu-item > .item_link > i,
#mega_main_menu.' . $arg . ' li.tabs_dropdown > .mega_dropdown > .menu-item > .item_link > i,
#mega_main_menu.' . $arg . ' li.widgets_dropdown > .mega_dropdown > .menu-item > .item_link > i,
#mega_main_menu.' . $arg . ' li.multicolumn_dropdown > .mega_dropdown > .menu-item > .item_link > i
{
	width: ' . $unserialise['menu_dropdown_icon_font'] . 'px;
	height: ' . $unserialise['menu_dropdown_icon_font'] . 'px;
	line-height: ' . $unserialise['menu_dropdown_icon_font'] . 'px;
	font-size: ' . $unserialise['menu_dropdown_icon_font'] . 'px;
	margin-top: -' . ( $unserialise['menu_dropdown_icon_font'] / 2 ) . 'px;
}
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > .menu-item > .item_link.with_icon > .link_content,
#mega_main_menu.' . $arg . ' li.tabs_dropdown > .mega_dropdown > .menu-item > .item_link.with_icon > .link_content,
#mega_main_menu.' . $arg . ' li.widgets_dropdown > .mega_dropdown > .menu-item > .item_link.with_icon > .link_content,
#mega_main_menu.' . $arg . ' li.multicolumn_dropdown > .mega_dropdown > .menu-item > .item_link.with_icon > .link_content
{
	margin-left: ' . ( $unserialise['menu_dropdown_icon_font'] + 18 ) . 'px;
}
#mega_main_menu.' . $arg . '.language_direction-rtl li.default_dropdown > .mega_dropdown > .menu-item > .item_link.with_icon > .link_content,
#mega_main_menu.' . $arg . '.language_direction-rtl li.tabs_dropdown > .mega_dropdown > .menu-item > .item_link.with_icon > .link_content,
#mega_main_menu.' . $arg . '.language_direction-rtl li.widgets_dropdown > .mega_dropdown > .menu-item > .item_link.with_icon > .link_content,
#mega_main_menu.' . $arg . '.language_direction-rtl li.multicolumn_dropdown > .mega_dropdown > .menu-item > .item_link.with_icon > .link_content
{
	margin-right: ' . ( $unserialise['menu_dropdown_icon_font'] + 8 ) . 'px;
}
#mega_main_menu.' . $arg . ' li.default_dropdown .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' li.widgets_dropdown .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' li.multicolumn_dropdown .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' li.grid_dropdown .mega_dropdown > li > .item_link
{
	/*" . mm_common::css_gradient( $unserialise["_menu_dropdown_link_bg"] ) . "*/
	/*background-color: ' . $unserialise['menu_dropdown_link_bg'] . ';*/
	color: ' . $unserialise['menu_dropdown_link_color'] . ';
}
#mega_main_menu.' . $arg . ' li .post_details > .post_icon > i,
#mega_main_menu.' . $arg . ' li .mega_dropdown .item_link *,
#mega_main_menu.' . $arg . ' li .mega_dropdown a,
#mega_main_menu.' . $arg . ' li .mega_dropdown a *,
/*
#mega_main_menu.' . $arg . ' li.default_dropdown .mega_dropdown > li > .item_link *,
#mega_main_menu.' . $arg . ' li.widgets_dropdown .mega_dropdown > li > .item_link *
#mega_main_menu.' . $arg . ' li.multicolumn_dropdown .mega_dropdown > li > .item_link *
#mega_main_menu.' . $arg . ' li.grid_dropdown .mega_dropdown > li > .item_link *,
*/
#mega_main_menu.' . $arg . ' li li .post_details a
{
	color: ' . $unserialise['menu_dropdown_link_color'] . ';
}
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > .menu-item > .item_link:before
{
	border-color: ' . $unserialise['menu_dropdown_link_color'] . ';
}
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > li > .item_link
{
	border-color: ' . $unserialise['menu_dropdown_link_border_color'] . ';
}
#mega_main_menu.' . $arg . ' ul .mega_dropdown > li.current-menu-item > .item_link,
#mega_main_menu.' . $arg . ' ul .mega_dropdown > li > .item_link:focus,
#mega_main_menu.' . $arg . ' ul .mega_dropdown > li > .item_link:hover,
/*
#mega_main_menu.' . $arg . ' ul li.default_dropdown > .mega_dropdown > li > .item_link:hover,
#mega_main_menu.' . $arg . ' ul li.default_dropdown > .mega_dropdown > li.current-menu-item > .item_link,
#mega_main_menu.' . $arg . ' ul li.widgets_dropdown > .mega_dropdown > li > .item_link:hover,
#mega_main_menu.' . $arg . ' ul li.widgets_dropdown > .mega_dropdown > li.current-menu-item > .item_link,
#mega_main_menu.' . $arg . ' ul li.tabs_dropdown > .mega_dropdown > li > .item_link:hover,
#mega_main_menu.' . $arg . ' ul li.tabs_dropdown > .mega_dropdown > li.current-menu-item > .item_link,
#mega_main_menu.' . $arg . ' ul li.multicolumn_dropdown > .mega_dropdown > li > .item_link:hover,
#mega_main_menu.' . $arg . ' ul li.multicolumn_dropdown > .mega_dropdown > li.current-menu-item > .item_link,
#mega_main_menu.' . $arg . ' ul li.post_type_dropdown > .mega_dropdown > li:hover > .item_link,
#mega_main_menu.' . $arg . ' ul li.post_type_dropdown > .mega_dropdown > li > .item_link:hover,
#mega_main_menu.' . $arg . ' ul li.post_type_dropdown > .mega_dropdown > li.current-menu-item > .item_link,
#mega_main_menu.' . $arg . ' ul li.grid_dropdown > .mega_dropdown > li:hover > .processed_image,
#mega_main_menu.' . $arg . ' ul li.grid_dropdown > .mega_dropdown > li:hover > .item_link,
#mega_main_menu.' . $arg . ' ul li.grid_dropdown > .mega_dropdown > li > .item_link:hover,
#mega_main_menu.' . $arg . ' ul li.grid_dropdown > .mega_dropdown > li.current-menu-item > .item_link,
*/
#mega_main_menu.' . $arg . ' ul li.post_type_dropdown > .mega_dropdown > li > .processed_image:hover
{
	/*" . mm_common::css_gradient( $unserialise["_menu_dropdown_link_bg_hover"] ) . "*/
	background-color: ' . $unserialise['menu_dropdown_link_bg_hover'] . ';
	color: ' . $unserialise['menu_dropdown_link_color_hover'] . ';
}
#mega_main_menu.' . $arg . ' .mega_dropdown > li.current-menu-item > .item_link *,
#mega_main_menu.' . $arg . ' .mega_dropdown > li > .item_link:focus *,
#mega_main_menu.' . $arg . ' .mega_dropdown > li > .item_link:hover *,
/*
#mega_main_menu.' . $arg . ' li[class*="_dropdown"] > .mega_dropdown > li > .item_link:focus *,
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > li > .item_link:hover *,
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > li.current-menu-item > .item_link *,
#mega_main_menu.' . $arg . ' li.widgets_dropdown > .mega_dropdown > li > .item_link:hover *,
#mega_main_menu.' . $arg . ' li.widgets_dropdown > .mega_dropdown > li.current-menu-item > .item_link *,
#mega_main_menu.' . $arg . ' li.tabs_dropdown > .mega_dropdown > li > .item_link:hover *,
#mega_main_menu.' . $arg . ' li.tabs_dropdown > .mega_dropdown > li.current-menu-item > .item_link *,
#mega_main_menu.' . $arg . ' li.multicolumn_dropdown > .mega_dropdown > li > .item_link:hover *,
#mega_main_menu.' . $arg . ' li.multicolumn_dropdown > .mega_dropdown > li.current-menu-item > .item_link *,
#mega_main_menu.' . $arg . ' li.post_type_dropdown > .mega_dropdown > li:hover > .item_link *,
#mega_main_menu.' . $arg . ' li.post_type_dropdown > .mega_dropdown > li.current-menu-item > .item_link *,
#mega_main_menu.' . $arg . ' li.grid_dropdown > .mega_dropdown > li:hover > .item_link *,
#mega_main_menu.' . $arg . ' li.grid_dropdown > .mega_dropdown > li a:hover *,
#mega_main_menu.' . $arg . ' li.grid_dropdown > .mega_dropdown > li.current-menu-item > .item_link *,
*/
#mega_main_menu.' . $arg . ' li.post_type_dropdown > .mega_dropdown > li > .processed_image:hover > .cover > a > i
{
	color: ' . $unserialise['menu_dropdown_link_color_hover'] . ';
}
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > .menu-item.current-menu-item > .item_link:before,
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > .menu-item > .item_link:focus:before,
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > .menu-item > .item_link:hover:before
{
	border-color: ' . $unserialise['menu_dropdown_link_color_hover'] . ';
}
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link,
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle,
#mega_main_menu.' . $arg . '.primary_style-buttons.direction-vertical > .menu_holder > .menu_inner > ul > li:first-child > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .mmm_fullwidth_container,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li .post_details,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul .mega_dropdown
{
	border-radius: ' . $unserialise['corners_rounding'] . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > span.nav_logo,
#mega_main_menu.' . $arg . '.primary_style-flat.direction-horizontal.first-lvl-align-left.no-logo > .menu_holder > .menu_inner > ul > li:first-child > .item_link,
#mega_main_menu.' . $arg . '.primary_style-flat.direction-horizontal.first-lvl-align-center.no-logo.no-search.no-woo_cart > .menu_holder > .menu_inner > ul > li:first-child > .item_link
{
	border-radius: ' . $unserialise['corners_rounding'] . 'px 0px 0px ' . $unserialise['corners_rounding'] . 'px;
}
#mega_main_menu.' . $arg . '.direction-horizontal.no-search > .menu_holder > .menu_inner > ul > li.nav_woo_cart > .item_link,
#mega_main_menu.' . $arg . '.direction-horizontal.no-search.no-woo_cart > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link,
#mega_main_menu.' . $arg . '.primary_style-flat.direction-horizontal.first-lvl-align-right.no-search.no-woo_cart > .menu_holder > .menu_inner > ul > li:last-child > .item_link,
#mega_main_menu.' . $arg . '.primary_style-flat.direction-horizontal.first-lvl-align-center.no-search.no-woo_cart > .menu_holder > .menu_inner > ul > li:last-child > .item_link
{
	border-radius: 0px ' . $unserialise['corners_rounding'] . 'px ' . $unserialise['corners_rounding'] . 'px 0px;
}
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > li:first-child > .item_link,
#mega_main_menu.' . $arg . '.direction-vertical > .menu_holder > .menu_inner > ul > li:first-child > .item_link
{
	border-radius: ' . $unserialise['corners_rounding'] . 'px ' . $unserialise['corners_rounding'] . 'px 0px 0px;
}
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > li:last-child > .item_link
{
	border-radius: 0px 0px ' . $unserialise['corners_rounding'] . 'px ' . $unserialise['corners_rounding'] . 'px;
}
#mega_main_menu.' . $arg . ' .widgets_dropdown > .mega_dropdown > li.default_dropdown .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' .multicolumn_dropdown > .mega_dropdown > li.default_dropdown .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' ul .nav_search_box #mega_main_menu_searchform,
#mega_main_menu.' . $arg . ' .tabs_dropdown .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' .tabs_dropdown .mega_dropdown > li > .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' .widgets_dropdown > .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' .multicolumn_dropdown > .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' .grid_dropdown > .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' .grid_dropdown > .mega_dropdown > li .processed_image,
#mega_main_menu.' . $arg . ' .post_type_dropdown > .mega_dropdown > li .item_link,
#mega_main_menu.' . $arg . ' .post_type_dropdown > .mega_dropdown > li .processed_image
{
	border-radius: ' . ( $unserialise['corners_rounding'] / 2 ) . 'px;
}
';
			$additional_styles_presets = $unserialise['additional_styles_presets'];
			if ( isset( $additional_styles_presets ) && is_array( $additional_styles_presets ) && count( $additional_styles_presets ) > 0 ) {
				$out .= '/* additional_styles */ ';
				foreach ( $unserialise['additional_styles_presets'] as $key => $value ) {
					$out .= '
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ' > .item_link
{
	/*" . mm_common::css_gradient( $value["bg_gradient"] ) . "*/
	color: ' . $value['text_color'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ' > .item_link > i
{
	color: ' . $value['text_color'] . ';
	font-size: ' . $value[ 'icon' ]['font_size'] . 'px;
}
#mega_main_menu.' . $arg . ' ul li .mega_dropdown li.additional_style_' . $key . ' > .item_link > i
{
	width: ' . $value[ 'icon' ]['font_size'] . 'px;
	height: ' . $value[ 'icon' ]['font_size'] . 'px;
	line-height: ' . $value[ 'icon' ]['font_size'] . 'px;
	font-size: ' . $value[ 'icon' ]['font_size'] . 'px;
	margin-top: -' . ( $value[ 'icon' ]['font_size'] / 2 ) . 'px;
}
#mega_main_menu.' . $arg . ' ul li .mega_dropdown > li.additional_style_' . $key . ' > .item_link.with_icon > span
{
	margin-left: ' . ( $value[ 'icon' ]['font_size'] + 8 ) . 'px;
}
#mega_main_menu.' . $arg . '.language_direction-rtl ul li .mega_dropdown > li.additional_style_' . $key . ' > .item_link.with_icon > span
{
	margin-right: ' . ( $value[ 'icon' ]['font_size'] + 8 ) . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ' > .item_link *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ' > .item_link .link_content
{
	color: ' . $value['text_color'] . ';
	' . mm_common::css_font( $value[ 'font' ] ) . '
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-menu-ancestor.additional_style_' . $key . ' > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-page-ancestor.additional_style_' . $key . ' > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-post-ancestor.additional_style_' . $key . ' > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.current-menu-item.additional_style_' . $key . ' > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ':hover > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ' > .item_link:hover,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ' > .item_link:focus
{
	/*" . mm_common::css_gradient( $value["bg_gradient_hover"] ) . "*/
	color: ' . $value['text_color_hover'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.current-menu-ancestor.additional_style_' . $key . ' > .item_link > *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.current-page-ancestor.additional_style_' . $key . ' > .item_link > *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.current-post-ancestor.additional_style_' . $key . ' > .item_link > *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ' > .item_link:focus > *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ':hover > .item_link > i,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ':hover > .item_link *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ':hover > .item_link .link_content
{
	color: ' . $value['text_color_hover'] . ';
}
';
				}
			}
/* set_of_custom_icons */
$set_of_custom_icons = $unserialise['set_of_custom_icons'];
if ( is_array( $set_of_custom_icons ) && count( $set_of_custom_icons ) > 0 ) {
	$out .= '/* set_of_custom_icons */ ';
	foreach ( $set_of_custom_icons as $value ) {
		$icon_name = str_replace( array( '/', strrchr( $value[ 'custom_icon' ], '.' ) ), '', strrchr( $value[ 'custom_icon' ], '/' ) );
		$out .= '
i.ci-icon-' . $icon_name . ':before
{
	background-image: url(' . $value[ 'custom_icon' ] . ');
}
';
		if ( isset( $value[ 'custom_icon_hover' ] ) && $value[ 'custom_icon_hover' ] != '' ) {
		$out .= '
#mega_main_menu li:hover > .item_link > i.ci-icon-' . $icon_name . ':before,
i.ci-icon-' . $icon_name . ':hover:before
{
	background-image: url(' . $value[ 'custom_icon_hover' ] . ');
}
';
		}
	}
}
echo $out;


?>