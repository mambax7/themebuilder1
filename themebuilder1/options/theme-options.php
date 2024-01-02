<?php
require_once( dirname( __FILE__ ) . '/fonts.php' );
require_once( dirname( __FILE__ ) . '/options.php' );


/*
 * Options Page | Helper Functions
 */


if( ! function_exists( 'mfna_header_style' ) )
{
	/**
	 * Header Style
	 * @return array
	 */
	function mfna_header_style(){
		return array(
			'classic' => array('title' => 'Classic', 'img' => MFN_OPTIONS_URI.'img/select/header/classic.png'),
			'modern' => array('title' => 'Modern', 'img' => MFN_OPTIONS_URI.'img/select/header/modern.png'),
			'plain' => array('title' => 'Plain', 'img' => MFN_OPTIONS_URI.'img/select/header/plain.png'),
			'stack,left' => array('title' => 'Stack: Left', 'img' => MFN_OPTIONS_URI.'img/select/header/stack-left.png'),
			'stack,center' => array('title' => 'Stack: Center',	'img' => MFN_OPTIONS_URI.'img/select/header/stack-center.png'),
			'stack,right' => array('title' => 'Stack: Right', 'img' => MFN_OPTIONS_URI.'img/select/header/stack-right.png'),
			'stack,magazine' => array('title' => 'Magazine', 'img' => MFN_OPTIONS_URI.'img/select/header/magazine.png'),
			'creative' => array('title' => 'Creative', 'img' => MFN_OPTIONS_URI.'img/select/header/creative.png'),
			'creative,rtl' => array('title' => 'Creative Right', 'img' => MFN_OPTIONS_URI.'img/select/header/creative-right.png'),
			'creative,open' => array('title' => 'Creative: Always Open', 'img' => MFN_OPTIONS_URI.'img/select/header/creative-open.png'),
			'creative,open,rtl' => array('title' => 'Creative Right: Always Open', 'img' => MFN_OPTIONS_URI.'img/select/header/creative-open-right.png'),
			'fixed' => array('title' => 'Fixed', 'img' => MFN_OPTIONS_URI.'img/select/header/fixed.png'),
			'transparent' => array('title' => 'Transparent', 'img' => MFN_OPTIONS_URI.'img/select/header/transparent.png'),
			'simple' => array('title' => 'Simple', 'img' => MFN_OPTIONS_URI.'img/select/header/simple.png'),
			'simple,empty' => array('title' => 'Empty: Subpage without Header', 'img' => MFN_OPTIONS_URI.'img/select/header/empty.png'),
			'below' => array('title' => 'Below Slider', 'img' => MFN_OPTIONS_URI.'img/select/header/below.png'),
			'split' => array('title' => 'Split Menu<br /><i>&#8226; Page Options: Custom Menu is not supported</i>', 'img' => MFN_OPTIONS_URI.'img/select/header/split.png'),
			'split,semi' => array('title' => 'Split Menu Semitransparent<br /><i>&#8226; Page Options: Custom Menu is not supported</i>', 'img' => MFN_OPTIONS_URI.'img/select/header/split-semi.png'),
			'below,split' => array('title' => 'Below Slider with Split Menu<br /><i>&#8226; Page Options: Custom Menu is not supported</i>', 'img' => MFN_OPTIONS_URI.'img/select/header/below-split.png'),
			'overlay,transparent'	=> array('title' => 'Overlay Menu<br /><i>&#8226; Menu has only 1 level<br />&#8226; Sticky Header affects only the menu button</i>', 'img' => MFN_OPTIONS_URI.'img/select/header/overlay.png'),
		);
	}
}


if( ! function_exists( 'mfna_bg_position' ) )
{
	/**
	 * Background Position
	 *
	 * @param string $body
	 * @return array
	 */
	function mfna_bg_position( $element = false ){
		$array = array(

			'no-repeat;left top;;' =>  'Left Top | no-repeat',
			'repeat;left top;;' =>  'Left Top | repeat',
			'no-repeat;left center;;' =>  'Left Center | no-repeat',
			'repeat;left center;;' =>  'Left Center | repeat',
			'no-repeat;left bottom;;' =>  'Left Bottom | no-repeat',
			'repeat;left bottom;;' =>  'Left Bottom | repeat',

			'no-repeat;center top;;' =>  'Center Top | no-repeat',
			'repeat;center top;;' =>  'Center Top | repeat',
			'repeat-x;center top;;' =>  'Center Top | repeat-x',
			'no-repeat;center;;' =>  'Center Center | no-repeat',
			'repeat;center;;' =>  'Center Center | repeat',
			'no-repeat;center bottom;;' =>  'Center Bottom | no-repeat',
			'repeat;center bottom;;' =>  'Center Bottom | repeat',
			'repeat-x;center bottom;;' =>  'Center Bottom | repeat-x',

			'no-repeat;right top;;' =>  'Right Top | no-repeat',
			'repeat;right top;;' =>  'Right Top | repeat',
			'no-repeat;right center;;' =>  'Right Center | no-repeat',
			'repeat;right center;;' =>  'Right Center | repeat',
			'no-repeat;right bottom;;' =>  'Right Bottom | no-repeat',
			'repeat;right bottom;;' =>  'Right Bottom | repeat',
		);

		if( $element == 'column' ){

			// Column
			// do NOT change: backward compatibility

		} elseif( $element == 'header' ){

			// Header

			$array['fixed'] = 'Center | no-repeat | fixed';
			$array['no-repeat;center;fixed;cover;still'] = 'Center | no-repeat | fixed | cover';
			$array['parallax'] = 'Parallax';

		} elseif( $element ){

			// Site Body | <html> tag

			$array['no-repeat;center top;fixed;;'] = 'Center | no-repeat | fixed';
			$array['no-repeat;center;fixed;cover'] = 'Center | no-repeat | fixed | cover';

		} else {

			// Section / Wrap

			$array['no-repeat;center top;fixed;;still'] = 'Center | no-repeat | fixed';
			$array['no-repeat;center;fixed;cover;still'] = 'Center | no-repeat | fixed | cover';
			$array['no-repeat;center top;fixed;cover'] = 'Parallax';

		}

		return $array;
	}
}


if( ! function_exists( 'mfna_bg_size' ) )
{
	/**
	 * Skin
	 *
	 * @return array
	 */
	function mfna_bg_size(){
		return array(
			'auto' => 'Auto',
			'contain' => 'Contain',
			'cover' => 'Cover',
			'cover-ultrawide'	=> 'Cover, on ultrawide screens only > 1920px',
		);
	}
}


if (!function_exists('mfn_slider_select')) {
	function mfn_slider_select( $all = true ) {
		global $xoopsDB;
		$sliders = array( 0 => '-- Select --' );
			$sql31 = "SELECT distinct id, name, alias FROM " . $xoopsDB -> prefix("crellyslider_sliders") . " ORDER BY id DESC";
			$result31 = $xoopsDB -> query($sql31); 
				while (list($id, $name, $alias) = $xoopsDB -> fetchRow($result31)) {
				$sliders['<{$SLIDER_'.$name.'_'.$id.'}>'] = '<{$SLIDER_'.$name.'_'.$id.'}>';
				}	
				//var_dump($sliders);
		return $sliders;
	}
}


if( ! function_exists( 'mfna_skin' ) )
{
	/**
	 * Skin
	 *
	 * @return array
	 */
	function mfna_skin(){
		return array(
			'custom' => '- Custom Skin -',
			'one' => '- One Color Skin -',
			'blue' => 'Blue',
			'brown' => 'Brown',
			'chocolate'	=> 'Chocolate',
			'gold' => 'Gold',
			'green' => 'Green',
			'olive' => 'Olive',
			'orange' => 'Orange',
			'pink' => 'Pink',
			'red' => 'Red',
			'sea' => 'Seagreen',
			'violet' => 'Violet',
			'yellow' => 'Yellow',
		);
	}
}


if( ! function_exists( 'mfna_utc' ) )
{
	/**
	 * UTC – Coordinated Universal Time
	 *
	 * @return array
	 */
	function mfna_utc(){
		return array(
			'-12' 	=> '-12:00',
			'-11' 	=> '-11:00 Pago Pago',
			'-10' 	=> '-10:00 Papeete, Honolulu',
			'-9.5' 	=> '-9:30',
			'-9' 		=> '-9:00 Anchorage',
			'-8' 		=> '-8:00 Los Angeles, Vancouver, Tijuana',
			'-7' 		=> '-7:00 Phoenix, Calgary, Ciudad Juárez',
			'-6' 		=> '-6:00 Chicago, Guatemala City, Mexico City, San José, San Salvador, Winnipeg',
			'-5' 		=> '-5:00 New York, Lima, Toronto, Bogotá, Havana, Kingston',
			'-4' 		=> '-4:00 Caracas, Santiago, La Paz, Manaus, Halifax, Santo Domingo',
			'-3.5' 	=> '-3:30 St. John\'s',
			'-3' 		=> '-3:00 Buenos Aires, Montevideo, São Paulo',
			'-2' 		=> '-2:00',
			'-1' 		=> '-1:00 Praia',
			'0' 		=> '±0:00 Accra, Casablanca, Dakar, Dublin, Lisbon, London',
			'+1' 		=> '+1:00 Berlin, Lagos, Madrid, Paris, Rome, Tunis, Vienna, Warsaw',
			'+2' 		=> '+2:00 Athens, Bucharest, Cairo, Helsinki, Jerusalem, Johannesburg, Kiev',
			'+3' 		=> '+3:00 Istanbul, Moscow, Nairobi, Baghdad, Doha, Minsk, Riyadh',
			'+3.5' 	=> '+3:30 Tehran',
			'+4' 		=> '+4:00 Baku, Dubai, Samara, Muscat',
			'+4.5'	=> '+4:30 Kabul',
			'+5' 		=> '+5:00 Karachi, Tashkent, Yekaterinburg',
			'+5.5' 	=> '+5:30 Delhi, Colombo',
			'+5.75'	=> '+5:45 Kathmandu',
			'+6' 		=> '+6:00 Almaty, Dhaka, Omsk',
			'+6.5' 	=> '+6:30 Yangon',
			'+7' 		=> '+7:00 Jakarta, Bangkok, Krasnoyarsk, Ho Chi Minh City',
			'+8' 		=> '+8:00 Beijing, Hong Kong, Taipei, Singapore, Kuala Lumpur, Perth, Manila, Denpasar, Irkutsk',
			'+8.5'	=> '+8:30 Pyongyang',
			'+8.75'	=> '+8:45',
			'+9' 		=> '+9:00 Seoul, Tokyo, Ambon, Yakutsk',
			'+9.5' 	=> '+9:30 Adelaide',
			'+10'		=> '+10:00 Port Moresby, Brisbane, Vladivostok, Sydney',
			'+10.5'	=> '+10:30',
			'+11' 	=> '+11:00 Nouméa',
			'+12' 	=> '+12:00 Auckland, Suva',
			'+12.75'=> '+12:45',
			'+13' 	=> '+13:00 Apia, Nukuʻalofa',
			'+14' 	=> '+14:00',
		);
	}
}


if( ! function_exists( 'mfna_layout' ) )
{
	/**
	 * Layouts
	 *
	 * @return array
	 */
	function mfna_layout(){
		$layouts = array( 0 =>  '-- Theme Options --' );
		$args = array(
			'post_type' => 'layout',
			'posts_per_page'=> -1,
		);
		$lay = get_posts( $args );

		if( is_array( $lay ) ){
			foreach ( $lay as $v ){
				$layouts[$v->ID] = $v->post_title;
			}
		}

		return $layouts;
	}
}


if( ! function_exists( 'mfna_menu' ) )
{
	/**
	 * Menus
	 *
	 * @return array
	 */
	function mfna_menu(){
		/*$aMenus = array( 0 =>  '-- Default --');
		//$oMenus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

		if( is_array( $oMenus ) ){

			foreach( $oMenus as $menu ){
				$aMenus[ $menu->term_id ] = $menu->name;

				$term_trans_id = apply_filters( 'wpml_object_id', $menu->term_id, 'nav_menu', false );
				if( $term_trans_id != $menu->term_id ){
					unset( $aMenus[ $menu->term_id ] );
				}
			}
		}*/
		global $xoopsDB;
		$menus = array( 0 => '-- Select --' );		
		$sql311 = "SELECT * FROM " . $xoopsDB -> prefix("menu_group") . " ORDER BY id DESC";
		$result311 = $xoopsDB -> query($sql311); 
			while ($row = $xoopsDB -> fetchArray($result311)) {
			$aMenus['<{$MENU_menu_'.$row['id'].'}>'] = '<{$MENU_menu_'.$row['id'].'}>';
			}

		return $aMenus;
	}
}


/*
 * Options Page | Main Functions
 */


if( ! function_exists( 'mfn_opts_setup' ) )
{
	/**
	 * Options Page | Fields & Args
	 */
	function mfn_opts_setup(){

		// Navigation elements
		$menu = array(

			// Global --------------------------------------------
			'global' => array(
				'title' 	=> 'Global',
				'sections' 	=> array( 'general', 'logo', 'sliders', 'advanced', 'hooks', 'facebook', 'preloader' ),
			),

			// Header & Subheader --------------------------------------------
			'header-subheader' => array(
				'title' 	=> 'Header & Subheader',
				'sections' 	=> array( 'header', 'subheader', 'extras' ),
			),

			// Menu & Action Bar --------------------------------------------
			'mab' => array(
				'title' 	=> 'Menu & Action Bar',
				'sections' 	=> array( 'menu', 'action-bar' ),
			),

			// Sidebars --------------------------------------------
			'sidebars' => array(
				'title' 	=> 'Sidebars',
				'sections' 	=> array( 'sidebars' ),
			),

			// Blog, Portfolio, Shop --------------------------------------------
			'bps' => array(
				'title' 	=> 'Blog, Portfolio & Shop',
				'sections' 	=> array( 'bps-general'),
			),

			// Pages --------------------------------------------
			'pages' => array(
				'title' 	=> 'Pages',
				'sections' 	=> array( 'pages-general', 'pages-404', 'pages-under' ),
			),

			// Footer --------------------------------------------
			'footer' => array(
				'title' 	=> 'Footer',
				'sections' 	=> array( 'footer' ),
			),

			// Responsive --------------------------------------------
			'responsive' => array(
				'title' 	=> 'Responsive',
				'sections' 	=> array( 'responsive', 'responsive-header' ),
			),

			// SEO --------------------------------------------
			'seo' => array(
				'title' 	=> 'SEO',
				'sections' 	=> array( 'seo' ),
			),

			// Social --------------------------------------------
			'social' => array(
				'title' 	=> 'Social',
				'sections' 	=> array( 'social' ),
			),

			// Colors --------------------------------------------
			'colors' => array(
				'title' 	=> 'Colors',
				'sections' 	=> array( 'colors-general', 'colors-header', 'colors-menu', 'colors-action', 'content', 'colors-footer', 'colors-sliding-top', 'headings', 'colors-shortcodes', 'colors-forms' ),
			),

			// Fonts --------------------------------------------
			'font' => array(
				'title' 	=> 'Fonts',
				'sections' 	=> array( 'font-family', 'font-size', 'font-custom' ),
			),


			// Custom CSS, JS --------------------------------------------
			'custom' => array(
				'title' 	=> 'Custom CSS & JS',
				'sections' 	=> array( 'css', 'js' ),
			),

		);

		$sections = array();

		// Global =================================================================================

		// General -------------------------------------------
		$sections['general'] = array(
			'title'		=> 'General',
			'fields' 	=> array(

				array(
					'id' 		=> 'general-info-layout',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Layout',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'layout',
					'type' 		=> 'radio_img',
					'title' 	=> 'Layout',
					'options' 	=> array(
						'full-width' 	=> array('title' => 'Full width', 	'img' => MFN_OPTIONS_URI.'img/select/style/full-width.png'),
						'boxed' 		=> array('title' => 'Boxed', 		'img' => MFN_OPTIONS_URI.'img/select/style/boxed.png'),
					),
					'std' 		=> 'full-width',
					'class'		=> 'wide',
				),

				array(
					'id' 		=> 'grid-width',
					'type' 		=> 'sliderbar',
					'title' 	=> 'Grid width',
					'sub_desc' 	=> 'default: 1240px',
					'desc' 		=> 'Works only with <b>Responsive ON</b>',
					'param'	 	=> array(
						'min' 		=> 960,
						'max' 		=> 1920,
					),
					'std' 		=> 1240,
				),

				array(
					'id'		=> 'style',
					'type' 		=> 'radio_img',
					'title' 	=> 'Style | Main',
					'options' 	=> array(
						'' 			=> array('title' => 'Classic', 	'img' => MFN_OPTIONS_URI .'img/select/style/default.png'),
						'simple' 	=> array('title' => 'Simple', 	'img' => MFN_OPTIONS_URI .'img/select/style/simple.png'),
					),
					'class'		=> 'wide',
				),

				array(
					'id'		=> 'button-style',
					'type' 		=> 'radio_img',
					'title' 	=> 'Style | Button',
					'options' 	=> array(
						'' 			=> array('title' => 'Default', 	'img' => MFN_OPTIONS_URI.'img/select/button/classic.png'),
						'flat' 		=> array('title' => 'Flat', 	'img' => MFN_OPTIONS_URI.'img/select/button/flat.png'),
						'stroke' 	=> array('title' => 'Stroke', 	'img' => MFN_OPTIONS_URI.'img/select/button/stroke.png'),
					),
					'class'		=> 'wide short',
				),

				array(
					'id' 		=> 'general-info-image-frame',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Image Frame',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'image-frame-style',
					'type' 		=> 'select',
					'title' 	=> 'Style',
					'options' 	=> array(
						'' 			=> 'Slide Bottom',
						'overlay' 	=> 'Overlay',
						'zoom' 		=> 'Zoom | without icons',
						'disable' 	=> 'Disable hover effect',
					),
				),

				array(
					'id' 		=> 'image-frame-border',
					'type' 		=> 'select',
					'title' 	=> 'Border',
					'desc' 		=> 'Border for <b>Image Item</b> can be set in Item Options',
					'options' 	=> array(
						'' 			=>  'Show',
						'hide' 		=>  'Hide',
					),
				),

				array(
					'id' 		=> 'image-frame-caption',
					'type' 		=> 'select',
					'title' 	=> 'Caption',
					'options' 	=> array(
						'' 			=>  'Below the Image',
						'on' 		=>  'On the Image',
					),
				),

				array(
					'id' 		=> 'general-info-background',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Background',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'img-page-bg',
					'type' 		=> 'uploadframe',
					'title' 	=> 'Image',
					'desc' 		=> 'Recommended image size: <b>1920 x 1080 px</b>',
				),

				array(
					'id' 		=> 'position-page-bg',
					'type' 		=> 'select',
					'title' 	=> 'Position',
					'desc' 		=> 'iOS does <b>not</b> support background-position: fixed',
					'options' 	=> mfna_bg_position(1),
					'std' 		=> 'center top no-repeat',
				),

				array(
					'id' 		=> 'size-page-bg',
					'type' 		=> 'select',
					'title' 	=> 'Size',
					'desc' 		=> 'Does <b>not</b> work with fixed position. Works only in modern browsers',
					'options' 	=> mfna_bg_size(),
				),

				array(
					'id' 		=> 'transparent',
					'type' 		=> 'checkbox',
					'title' 	=>  'Transparent',
					'options' 	=> array(
						'header'	=>  'Header',
						'menu'		=>  'Top Bar with menu <span>Does <b>not</b> work with Header Below.<br />Header Creative requires background image uploaded above.</span>',
						'content'	=>  'Content',
						'footer'	=>  'Footer',
					),
				),

				array(
					'id' 		=> 'general-info-icon',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Icon',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'favicon-img',
					'type'		=> 'uploadframe',
					'title'		=> 'Favicon',
					'desc'		=> '<b>.ico</b> 32x32 pixels',
				),

				array(
					'id'		=> 'apple-touch-icon',
					'type'		=> 'uploadframe',
					'title'		=> 'Apple Touch Icon',
					'desc'		=> '<b>apple-touch-icon.png</b> 180x180 pixels',
				),

			),
		);

		// Logo --------------------------------------------
		$sections['logo'] = array(
			'title' 	=> 'Logo',
			'fields' 	=> array(

				// logo
				array(
					'id' 		=> 'logo-info',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Logo',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'logo-img',
					'type'		=> 'uploadframe',
					'title'		=> 'Logo',
				),

				array(
					'id'		=> 'retina-logo-img',
					'type'		=> 'uploadframe',
					'title'		=> 'Retina Logo',
					'sub_desc'	=> 'optional',
					'desc'		=> 'Retina Logo should be 2x larger than Custom Logo',
				),

				// sticky
				array(
					'id' 		=> 'logo-info-sticky',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Sticky Header Logo',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'sticky-logo-img',
					'type'		=> 'uploadframe',
					'title'		=> 'Logo',
					'sub_desc'	=> 'optional',
					'desc'		=> 'Use if you want different logo for Sticky Header.<br />This is Tablet Logo for Creative Header',
				),

				array(
					'id'		=> 'sticky-retina-logo-img',
					'type'		=> 'uploadframe',
					'title'		=> 'Retina Logo',
					'sub_desc'	=> 'optional',
					'desc'		=> 'Retina Logo should be 2x larger than Sticky Header Logo',
				),

				// options
				array(
					'id' 		=> 'logo-info-options',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Options',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'logo-link',
					'type' 		=> 'checkbox',
					'title' 	=> 'Options',
					'options' 	=> array(
						'link'		=> 'Link to Homepage',
						'h1-home'	=> 'Wrap into H1 tag on Homepage',
						'h1-all'	=> 'Wrap into H1 tag on All other pages',
					),
					'std'		=> array( 'link' => 'link' ),
				),

				array(
					'id'		=> 'logo-text',
					'type'		=> 'text',
					'title'		=> 'Text Logo',
					'sub_desc'	=> 'optional',
					'desc'		=> 'Use text <b>instead</b> of graphic logo',
					'class'		=> 'small-text',
				),

				array(
					'id'		=> 'logo-width',
					'type'		=> 'text',
					'title'		=> 'SVG Logo Width',
					'sub_desc'	=> 'optional',
					'desc'		=> 'Use <b>only</b> with <b>svg</b> logo',
					'class'		=> 'small-text',
				),

				// advanced
				array(
					'id' 		=> 'logo-info-advanced',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Advanced',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'logo-height',
					'type'		=> 'text',
					'title'		=> 'Height',
					'sub_desc'	=> 'default: 60',
					'desc'		=> 'px<br />Minimum height + padding = 60px',
					'class'		=> 'small-text',
				),

				array(
					'id'		=> 'logo-vertical-padding',
					'type'		=> 'text',
					'title'		=> '<small>Vertical</small> Padding',
					'sub_desc'	=> 'default: 15',
					'desc'		=> 'px',
					'class'		=> 'small-text',
				),

				array(
					'id' 		=> 'logo-vertical-align',
					'type' 		=> 'select',
					'title' 	=> '<small>Vertical</small> Align',
					'options' 	=> array(
						'top' 		=> 'Top',
						''			=> 'Middle',
						'bottom'	=> 'Bottom',
					),
				),

				array(
					'id' 		=> 'logo-advanced',
					'type' 		=> 'checkbox',
					'title' 	=> 'Advanced',
					'options' 	=> array(
						'no-margin' 		=> 'Remove Left margin<span>Top margin for Header Creative</span>',
						'overflow' 			=> 'Overflow Logo<span>For some header styles only</span>',
						'no-sticky-padding'	=> 'Sticky Logo | Remove max-height & padding',
					),
				),

			),
		);

		// Sliders --------------------------------------------
		$sections['sliders'] = array(
			'title' 	=> 'Sliders',
			'icon' 		=> MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields'	=> array(

				array(
					'id' 		=> 'slider-blog-timeout',
					'type' 		=> 'text',
					'title' 	=> 'Blog',
					'sub_desc' 	=> 'Milliseconds between slide',
					'desc' 		=> '<strong>0 to disable auto</strong> advance.<br />1000ms = 1s',
					'class'		=> 'small-text',
					'std' 		=> '0',
				),

				array(
					'id' 		=> 'slider-clients-timeout',
					'type' 		=> 'text',
					'title' 	=> 'Clients',
					'sub_desc' 	=> 'Milliseconds between slide',
					'desc' 		=> '<strong>0 to disable auto</strong> advance.<br />1000ms = 1s',
					'class'		=> 'small-text',
					'std' 		=> '0',
				),

				array(
					'id' 		=> 'slider-offer-timeout',
					'type' 		=> 'text',
					'title' 	=> 'Offer',
					'sub_desc' 	=> 'Milliseconds between slide',
					'desc' 		=> '<strong>0 to disable auto</strong> advance.<br />1000ms = 1s',
					'class'		=> 'small-text',
					'std' 		=> '0',
				),

				array(
					'id' 		=> 'slider-portfolio-timeout',
					'type' 		=> 'text',
					'title' 	=> 'Portfolio',
					'sub_desc' 	=> 'Milliseconds between slide',
					'desc' 		=> '<strong>0 to disable auto</strong> advance.<br />1000ms = 1s',
					'class'		=> 'small-text',
					'std' 		=> '0',
				),

				array(
					'id' 		=> 'slider-shop-timeout',
					'type' 		=> 'text',
					'title' 	=> 'Shop',
					'sub_desc' 	=> 'Milliseconds between slide',
					'desc' 		=> '<strong>0 to disable auto</strong> advance.<br />1000ms = 1s',
					'class'		=> 'small-text',
					'std' 		=> '0',
				),

				array(
					'id' 		=> 'slider-slider-timeout',
					'type' 		=> 'text',
					'title' 	=> 'Slider',
					'sub_desc' 	=> 'Milliseconds between slide',
					'desc' 		=> '<strong>0 to disable auto</strong> advance.<br />1000ms = 1s',
					'class'		=> 'small-text',
					'std' 		=> '0',
				),

				array(
					'id' 		=> 'slider-testimonials-timeout',
					'type' 		=> 'text',
					'title' 	=> 'Testimonials',
					'sub_desc' 	=> 'Milliseconds between slide',
					'desc' 		=> '<strong>0 to disable auto</strong> advance.<br />1000ms = 1s',
					'class'		=> 'small-text',
					'std' 		=> '0',
				),

			),
		);

		// Advanced -------------------------------------------
		$sections['advanced'] = array(
			'title' => 'Advanced',
			'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields' => array(

				array(
					'id' 		=> 'advanced-info-layout',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Layout',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'layout-boxed-padding',
					'type' 		=> 'text',
					'title' 	=> 'Boxed Layout | Side padding',
					'desc' 		=> 'Use value with <b>px</b> or <b>%</b><br/>Example: <b>10px</b> or <b>2%</b>',
					'class' 	=> 'small-text',
				),

				/* array(
					'id' 		=> 'builder-visibility',
					'type' 		=> 'select',
					'title' 	=>  'Builder | Visibility',
					'options' 	=> array(
						'' 						=>  '-- Everyone --',
						'publish_posts'			=>  'Author',
						'edit_pages'			=>  'Editor',
						'edit_theme_options'	=>  'Administrator',
						'hide'					=>  'HIDE for Everyone',
					),
				), */

				/* array(
					'id' 		=> 'display-order',
					'type' 		=> 'select',
					'title' 	=>  'Content | Display Order',
					'options' 	=> array(
						0 =>  'MBuilder - WEditor',
						1 =>  'WEditor - MBuilder',
					),
				), */

				array(
					'id' 		=> 'content-remove-padding',
					'type' 		=> 'switch',
					'title' 	=> 'Content | Remove Padding',
					'desc' 		=> 'Remove default Content Padding Top for <b>all</b> pages/posts',
					'options' 	=> array( '0' => 'Off', '1' => 'On' ),
					'std' 		=> '0'
				),

				// options
				array(
					'id' 		=> 'advanced-info-options',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Options',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 			=> 'google-maps-api-key',
					'type' 		=> 'text',
					'title' 	=>  'Google Maps API Key',
					'desc' 		=>  'Google Maps API key is required for Map Basic Embed or Map Advanced. If you do not have the key please visit <a target="_blank" href="https://cloud.google.com/maps-platform/">Google Maps Platform</a>',
				),

				array(
					'id' 		=> 'table-hover',
					'type' 		=> 'select',
					'title' 	=> 'HTML Table',
					'options' 	=> array(
						'' 				=> 'Default',
						'hover' 		=> 'Rows Hover',
						'responsive' 	=> 'Auto Responsive',
					),
				),

				array(
					'id' 		=> 'math-animations-disable',
					'type' 		=> 'switch',
					'title' 	=> 'Math Animate | Disable',
					'sub_desc' 	=> 'Disable animations for Counter, Quick fact',
					'options' 	=> array( '0' => 'Off', '1' => 'On' ),
					'std' 		=> '0'
				),

				array(
					'id' 		=> 'layout-options',
					'type' 		=> 'checkbox',
					'title' 	=> 'Other',
					'options' 	=> array(
						'no-shadows'		=> 'Remove shadows<span>Boxed Layout (also disables overflow: hidden), Creative Header, Sticky Header, Subheader, etc.</span>',
						'boxed-no-margin'	=> 'Boxed Layout: Remove margin<span>Remove top and bottom margin for Layout: Boxed</span>',
					),
				),

				// theme functions
				array(
					'id' 		=> 'advanced-info-functions',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Theme Functions',
					'class' 	=> 'mfn-info',
				),

				/* array(
					'id' 		=> 'post-type-disable',
					'type' 		=> 'checkbox',
					'title' 	=> 'Post Type | Disable',
					'desc' 		=> 'If you do not want to use any of these Types, you can disable it',
					'options' 	=> array(
						'client'		=> 'Clients',
						'layout'		=> 'Layouts',
						'offer'			=> 'Offer',
						'portfolio'		=> 'Portfolio',
						'slide'			=> 'Slides',
						'template'		=> 'Templates',
						'testimonial'	=> 'Testimonials',
					),
				),

				array(
					'id' 		=> 'theme-disable',
					'type' 		=> 'checkbox',
					'title' 	=> 'Theme Functions | Disable',
					'desc' 		=> 'If you do not want to use any of these functions or use external plugins to do the same, you can disable it',
					'options' 	=> array(
						'demo-data'				=> 'BeTheme pre-built websites',
						'categories-sidebars'	=> 'Categories Sidebars<span>This option affects existing sidebars. Please use before adding widgets</span>',
						'entrance-animations'	=> 'Entrance Animations',
						'mega-menu'				=> 'Mega Menu',
					),
				), */

				// advanced
				array(
					'id' 		=> 'advanced-info-advanced',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Advanced',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'builder-storage',
					'type' 		=> 'select',
					'title' 	=> 'Builder | Data Storage',
					'desc' 		=> 'This option will <b>not</b> affect the existing pages, only newly created or updated',
					'options' 	=> array(
						'' 			=> 'Serialized | Readable format, required by some plugins',
						'non-utf-8' => 'Serialized (safe mode) | Readable format, for non-UTF-8 server, etc.',
						'encode'	=> 'Encoded | Less data stored, compatible with WordPress Importer',
					),
				),

				array(
					'id' 		=> 'slider-shortcode',
					'type' 		=> 'select',
					'title' 	=> 'Slider | Shortcode',
					'sub_desc' 	=> 'Use this option to force slider for <b>all</b> pages',
					'desc' 		=> 'This option can <strong>not</strong> be overriden and it is usefull for people who already have many pages and want to standardize their appearance.<br/>eg. [rev_slider alias="slider1"]',
					'options' 	=> mfn_slider_select(),
				),

				array(
					'id' 		=> 'static-css',
					'type' 		=> 'switch',
					'title' 	=> 'Static CSS',
					'sub_desc' 	=> 'Use Static CSS files insted of Theme Options',
					'desc' 		=> 'This file should be <b>regenerated</b> after every <b>theme update</b>',
					'options' 	=> array('1' => 'On','0' => 'Off'),
					'std' 		=> '0'
				),

				/*array(
					'id' 		=> 'table_prefix',
					'type' 		=> 'select',
					'title' 	=> 'Table Prefix',
					'desc' 		=> 'For some <b>multisite</b> installations it is necessary to change table prefix to get Sliders List in Page Options. Please do <b>not</b> change if everything works.',
					'options' 	=> array(
						'base_prefix' 	=> 'base_prefix',
						'prefix' 		=> 'prefix',
					),
				), */

			),
		);

		// Hooks --------------------------------------------
		$sections['hooks'] = array(
			'title' 	=> 'Hooks',
			'icon' 		=> MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields'	=> array(

				array(
					'id' 		=> 'hook-top',
					'type' 		=> 'textarea',
					'title' 	=> 'Top',
					'sub_desc'	=> 'mfn_hook_top',
					'desc' 		=> 'Executes <b>after</b> the opening <b>&lt;body&gt;</b> tag',
				),

				array(
					'id' 		=> 'hook-content-before',
					'type' 		=> 'textarea',
					'title' 	=> 'Content before',
					'sub_desc'	=> 'mfn_hook_content_before',
					'desc' 		=> 'Executes <b>before</b> the opening <b>&lt;#Content&gt;</b> tag',
				),

				array(
					'id' 		=> 'hook-content-after',
					'type' 		=> 'textarea',
					'title' 	=> 'Content after',
					'sub_desc'	=> 'mfn_hook_content_after',
					'desc' 		=> 'Executes <b>after</b> the closing <b>&lt;/#Content&gt;</b> tag',
				),

				array(
					'id' 		=> 'hook-bottom',
					'type' 		=> 'textarea',
					'title' 	=> 'Bottom',
					'sub_desc'	=> 'mfn_hook_bottom',
					'desc' 		=> 'Executes <b>before</b> the closing <b>&lt;/body&gt;</b> tag',
				),

			),
		);
		
		// Facebook --------------------------------------------
		$sections['facebook'] = array(
			'title' 	=> 'Facebook',
			'icon' 		=> MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields'	=> array(

				array(
					'id' 		=> 'facebook_og_enabled',
					'type' 		=> 'select',
					'title' 	=> 'Facebook',
					'desc' 		=> 'facebook og activate',
					'options'	=> array(
						'0' 		=> 'Default | OFF',
						'1' 		=> 'Activate | ON',
					),
				),

				array(
					'id' 		=> 'facebook_og_admins',
					'type' 		=> 'text',
					'title' 	=> 'facebook_og_admins',
					'sub_desc' 	=> 'facebook og admin',
					'desc' 		=> 'facebook og admin number',
					'class' 	=> 'small-text',
				),

				array(
					'id' 		=> 'facebook_og_app_id',
					'type' 		=> 'text',
					'title' 	=> 'facebook_og_app_id',
					'sub_desc' 	=> 'facebook og app id',
					'desc' 		=> 'facebook og app id number',
					'class' 	=> 'small-text',
				),

			),
		);
		
		// Preloader --------------------------------------------
		$sections['preloader'] = array(
			'title' 	=> 'Preloader',
			'icon' 		=> MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields'	=> array(

				array(
					'id' 		=> 'preloader',
					'type' 		=> 'select',
					'title' 	=> 'Preloader enable',
					'desc' 		=> 'preloader activate',
					'options'	=> array(
						'0' 		=> 'Default | OFF',
						'1' 		=> 'Activate | ON',
					),
				),
				
				array(
					'id' 		=> 'preloadertype',
					'type' 		=> 'select',
					'title' 	=> 'preloader type choice',
					'desc' 		=> 'preloader type choice',
					'options'	=> array(
						'css' 		=> 'css',
						'gif' 		=> 'gif',
						'gvs' 		=> 'gvs',
					),
				),

				array(
			'id' 		=> 'preloadercssloader',
			'type' 		=> 'select',
			'title' 	=> 'preloadercssloader',
			'desc' 		=> 'preloader css loader',
			'options' 	=> array( 	'ball-8bits' 				=> 'ball-8bits',
									'ball-atom' 				=> 'ball-atom',
									'ball-beat' 				=> 'ball-beat',
									'ball-circus' 				=> 'ball-circus',
									'ball-climbing-dot' 		=> 'ball-climbing-dot',
									'ball-clip-rotate' 			=> 'ball-clip-rotate',
									'ball-clip-rotate-multiple' => 'ball-clip-rotate-multiple',
									'ball-clip-rotate-pulse' 	=> 'ball-clip-rotate-pulse',
									'ball-elastic-dots' 		=> 'ball-elastic-dots',
									'ball-fall' 				=> 'ball-fall',
									'ball-fussion' 				=> 'ball-fussion',
									'ball-grid-beat' 			=> 'ball-grid-beat',
									'ball-grid-pulse' 			=> 'ball-grid-pulse',
									'ball-newton-cradle' 		=> 'ball-newton-cradle',
									'ball-pulse' 				=> 'ball-pulse',
									'ball-pulse-rise' 			=> 'ball-pulse-rise',
									'ball-pulse-sync' 			=> 'ball-pulse-sync',
									'ball-rotate' 				=> 'ball-rotate',
									'ball-running-dots' 		=> 'ball-running-dots',
									'ball-scale' 				=> 'ball-scale',
									'ball-scale-multiple' 		=> 'ball-scale-multiple',
									'ball-scale-pulse' 			=> 'ball-scale-pulse',
									'ball-scale-ripple' 		=> 'ball-scale-ripple',
									'ball-scale-ripple-multiple' => 'ball-scale-ripple-multiple',
									'ball-spin' 				=> 'ball-spin',
									'ball-spin-clockwise' 		=> 'ball-spin-clockwise',
									'ball-spin-clockwise-fade' 	=> 'ball-spin-clockwise-fade',
									'ball-spin-clockwise-fade-rotating' => 'ball-spin-clockwise-fade-rotating',
									'ball-spin-fade' 			=> 'ball-spin-fade',
									'ball-spin-fade-rotating' 	=> 'ball-spin-fade-rotating',
									'ball-spin-rotate' 			=> 'ball-spin-rotate',
									'ball-square-clockwise-spin' => 'ball-square-clockwise-spin',
									'ball-square-spin' 			=> 'ball-square-spin',
									'ball-triangle-path' 		=> 'ball-triangle-path',
									'ball-zig-zag' 				=> 'ball-zig-zag',
									'ball-zig-zag-deflect' 		=> 'ball-zig-zag-deflect',
									'cog' 						=> 'cog',
									'cube-transition' 			=> 'cube-transition',
									'fire' 						=> 'fire',
									'line-scale' 				=> 'line-scale',
									'line-scale-party' 			=> 'line-scale-party',
									'line-scale-pulse-out' 		=> 'line-scale-pulse-out',
									'line-scale-pulse-out-rapid' => 'line-scale-pulse-out-rapid',
									'line-spin-clockwise-fade' 	=> 'line-spin-clockwise-fade',
									'line-spin-clockwise-fade-rotating' => 'line-spin-clockwise-fade-rotating',
									'line-spin-fade' 			=> 'line-spin-fade',
									'line-spin-fade-rotating' 	=> 'line-spin-fade-rotating',
									'pacman' 					=> 'pacman',
									'square-jelly-box' 			=> 'square-jelly-box',
									'square-loader' 			=> 'square-loader',
									'square-spin' 				=> 'square-spin',
									'timer' 					=> 'timer',
									'triangle-skew-spin' 		=> 'triangle-skew-spin'
								),
			'std' 		=> '0',
		),
		array(
			'id' 		=> 'preloadergifloader',
			'type' 		=> 'select',
			'title' 	=> 'preloadergifloader',
			'desc' 		=> 'preloader gif loader',
			'options' 	=> array( '	Preloader_1' => 'Preloader_1',
									'Preloader_2' => 'Preloader_2',
									'Preloader_3' => 'Preloader_3',
									'Preloader_4' => 'Preloader_4',
									'Preloader_5' => 'Preloader_5',
									'Preloader_6' => 'Preloader_6',
									'Preloader_7' => 'Preloader_7',
									'Preloader_8' => 'Preloader_8',
									'Preloader_9' => 'Preloader_9',
									'Preloader_10' => 'Preloader_10',
									'Preloader_11' => 'Preloader_11',
									'Preloader_12' => 'Preloader_12',
									'Preloader_13' => 'Preloader_13',
									'Preloader_14' => 'Preloader_14',
									'Preloader_15' => 'Preloader_15',
									'Preloader_16' => 'Preloader_16',
									'Preloader_17' => 'Preloader_17',
									'Preloader_18' => 'Preloader_18',
									'Preloader_19' => 'Preloader_19',
									'Preloader_20' => 'Preloader_20',
									'Preloader_21' => 'Preloader_21',
									'Preloader_22' => 'Preloader_22',
									'Preloader_23' => 'Preloader_23',
									'Preloader_24' => 'Preloader_24',
									'Preloader_25' => 'Preloader_25',
									'Preloader_26' => 'Preloader_26',
									'Preloader_27' => 'Preloader_27',
									'Preloader_28' => 'Preloader_28'
								),
			'std' 		=> '0',
		),
		array(
			'id' 		=> 'preloaderexit_anim',
			'type' 		=> 'select',
			'title' 	=> 'preloaderexit_anim',
			'desc' 		=> 'preloader exit animation',
			'options' 	=> array(	'slideOutUp' 		=> 'slideOutUp',
					              	'slideOutDown' 		=> 'slideOutDown',
					              	'slideOutLeft' 		=> 'slideOutLeft',
					              	'slideOutRight' 	=> 'slideOutRight',     
					              	'fadeOut' 			=> 'fadeOut',
					              	'fadeOutDown' 		=> 'fadeOutDown',
					              	'fadeOutDownBig' 	=> 'fadeOutDownBig',
					              	'fadeOutLeft' 		=> 'fadeOutLeft',
					              	'fadeOutLeftBig' 	=> 'fadeOutLeftBig',
					              	'fadeOutRight' 		=> 'fadeOutRight',
					              	'fadeOutRightBig' 	=> 'fadeOutRightBig',
					              	'fadeOutUp' 		=> 'fadeOutUp',
					              	'fadeOutUpBig' 		=> 'fadeOutUpBig',
					              	'zoomOut' 			=> 'zoomOut',
					              	'zoomOutDown' 		=> 'zoomOutDown',
					              	'zoomOutLeft' 		=> 'zoomOutLeft',
					              	'zoomOutRight' 		=> 'zoomOutRight',
					              	'zoomOutUp' 		=> 'zoomOutUp',
					              	'bounceOut' 		=> 'bounceOut',
					              	'bounceOutDown' 	=> 'bounceOutDown',
					              	'bounceOutLeft' 	=> 'bounceOutLeft',
					              	'bounceOutRight' 	=> 'bounceOutRight',
					              	'bounceOutUp' 		=> 'bounceOutUp',
					              	'rotateOut' 		=> 'rotateOut',
					              	'rotateOutDownLeft' => 'rotateOutDownLeft',
					              	'rotateOutDownRight' => 'rotateOutDownRight',
					              	'rotateOutUpLeft' 	=> 'rotateOutUpLeft',
					              	'rotateOutUpRight' 	=> 'rotateOutUpRight',
					            	'hinge' 			=> 'hinge',
					            	'rollOut' 			=> 'rollOut',
					            	'lightSpeedOut' 	=> 'lightSpeedOut'
								),
			'std' 		=> '0',
		),
		array(
			'id' 		=> 'preloaderentrance_anim',
			'type' 		=> 'select',
			'title' 	=> 'preloaderentrance_anim',
			'desc' 		=> 'preloader entrance animation',
			'options' 	=> array( 	'none' 				=> 'none',
					              	'slideInUp' 			=> 'slideInUp',
					              	'slideInDown' 			=> 'slideInDown',
					              	'slideInLeft' 			=> 'slideInLeft',
					              	'slideInRight' 			=> 'slideInRight',
					              	'fadeIn' 				=> 'fadeIn',
					              	'fadeInDown' 			=> 'fadeInDown',
					              	'fadeInDownBig' 		=> 'fadeInDownBig',
					              	'fadeInLeft' 			=> 'fadeInLeft',
					              	'fadeInLeftBig' 		=> 'fadeInLeftBig',
					              	'fadeInRight' 			=> 'fadeInRight',
					              	'fadeInRightBig' 		=> 'fadeInRightBig',
					              	'fadeInUp' 				=> 'fadeInUp',
					              	'fadeInUpBig' 			=> 'fadeInUpBig',
			              			'zoomIn' 				=> 'zoomIn',
					              	'zoomInDown' 			=> 'zoomInDown',
					              	'zoomInLeft' 			=> 'zoomInLeft',
					              	'zoomInRight' 			=> 'zoomInRight',
					              	'zoomInUp' 				=> 'zoomInUp',
					              	'bounceIn' 				=> 'bounceIn',
					              	'bounceInDown' 			=> 'bounceInDown',
					              	'bounceInLeft' 			=> 'bounceInLeft',
					              	'bounceInRight' 		=> 'bounceInRight',
					              	'bounceInUp' 			=> 'bounceInUp',
					              	'rotateIn' 				=> 'rotateIn',
					              	'rotateInDownLeft' 		=> 'rotateInDownLeft',
					              	'rotateInDownRight' 	=> 'rotateInDownRight',
					              	'rotateInUpLeft' 		=> 'rotateInUpLeft',
					              	'rotateInUpRight' 		=> 'rotateInUpRight',
									'bounce' 				=> 'bounce',
									'flash' 				=> 'flash',
									'pulse' 				=> 'pulse',
									'rubberBand' 			=> 'rubberBand',
									'shake' 				=> 'shake',
									'swing' 				=> 'swing',
									'tada' 					=> 'tada',
									'wobble' 				=> 'wobble',
									'jello' 				=> 'jello',
					            	'rollIn' 				=> 'rollIn',
					            	'lightSpeedIn' 			=> 'lightSpeedIn'
								),
			'std' 		=> '0',
		),
		array(
			'id' 		=> 'preloaderwidth',
			'type' 		=> 'select',
			'title' 	=> 'preloaderwidth',
			'desc' 		=> 'preloader width',
			'options' 	=> array( 	'la-sm' => 'small',
									'' 		=> 'normal',
									'la-2x' => 'medium',
									'la-3x' => 'large'
								),
			'std' 		=> '0',
		),
		array(
			'id' 		=> 'preloaderdelay',
			'type' 		=> 'select',
			'title' 	=> 'preloaderdelay',
			'desc' 		=> 'preloader delay',
			'options' 	=> array( 	'1000' => '1000',
									'1500' => '1500',
									'2000' => '2000',
									'2500' => '2500',
									'3000' => '3000',
									'3500' => '3500',
									'4000' => '4000',
									'4500' => '4500',
									'5000' => '5000'
								),
			'std' 		=> '0',
		),
		array(
			'id' 		=> 'preloadertext_spinner',
			'type' 		=> 'text',
			'title' 	=> 'preloadertext_spinner',
			'desc'		=> 'preloader text_spinner: please wait... ',
		),
		array(
			'id' 		=> 'preloader_anim_color',
			'type' 		=> 'color',
			'title' 	=> 'preloader_anim_color',
			'desc' 		=> 'preloader text spinner et animation color',
			'class' 	=> 'preloader_anim_color',
			'std' 		=> '#ffffff',
		),
		array(
			'id' 		=> 'preloader_background_color',
			'type' 		=> 'color',
			'title' 	=> 'preloader_background_color',
			'desc' 		=> 'preloader background color',
			'class' 	=> 'preloader_background_color',
			'std' 		=> '#ffffff',
		)

			),
		);

		// Header, Subheader ======================================================================

		// Header --------------------------------------------
		$sections['header'] = array(
			'title' => 'Header',
			'fields' => array(

				// layout
				array(
					'id' 		=> 'header-info-layout',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Layout',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'header-style',
					'type' 		=> 'radio_img',
					'title' 	=> 'Style',
					'options'	=> mfna_header_style(),
					'class'		=> 'wide',
					'std'		=> 'classic',
				),

				array(
					'id'		=> 'header-fw',
					'type' 		=> 'checkbox',
					'title' 	=> 'Options',
					'options' 	=> array(
						'full-width'	=> 'Full Width (for layout: Full Width)',
						'header-boxed'	=> 'Boxed Sticky Header (for layout: Boxed)',
					),
				),

				array(
					'id'		=> 'minimalist-header',
					'type'		=> 'select',
					'title'		=> 'Minimalist',
					'desc'		=> 'Header without background image & padding',
					'options'	=> array(
						'0' 		=> 'Default | OFF',
						'1' 		=> 'Minimalist | ON',
						'no' 		=> 'Minimalist without Header space',
					),
				),

				// background
				array(
					'id' 		=> 'header-info-background',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Background',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'img-subheader-bg',
					'type' 		=> 'uploadframe',
					'title' 	=> 'Image',
					'desc' 		=> 'Pages without slider. May be overridden for single page.<br />Recommended image width: <b>1920px</b>',
				),

				array(
					'id' 		=> 'img-subheader-attachment',
					'type' 		=> 'select',
					'title' 	=> 'Position',
					'desc' 		=> 'iOS does <b>not</b> support background-position: fixed',
					'options'	=> mfna_bg_position( 'header' ),
				),

				array(
					'id' 		=> 'size-subheader-bg',
					'type' 		=> 'select',
					'title' 	=> 'Size',
					'desc' 		=> 'Does <b>not</b> work with fixed position & parallax. Works only in modern browsers',
					'options' 	=> mfna_bg_size(),
				),

				// top bar background
				array(
					'id' 			=> 'top-bar-info-background',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=>  'Top Bar background <span>also Header Creative background</span>',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 			=> 'top-bar-bg-img',
					'type' 		=> 'uploadframe',
					'title' 	=>  'Image',
				),

				array(
					'id' 			=> 'top-bar-bg-position',
					'type' 		=> 'select',
					'title' 	=>  'Position',
					'desc' 		=>  'iOS does <b>not</b> support background-position: fixed',
					'options'	=> mfna_bg_position(),
				),

				// sticky header
				array(
					'id' 		=> 'header-info-sticky',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Sticky Header',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'sticky-header',
					'type'		=> 'switch',
					'title'		=> 'Sticky',
					'options'	=> array('1' => 'On','0' => 'Off'),
					'std'		=> '1'
				),

				array(
					'id'		=> 'sticky-header-style',
					'type'		=> 'select',
					'title'		=> 'Style',
					'options'	=> array(
						'tb-color'	=> 'The same as Top Bar Left background',
						'white'		=> 'White',
						'dark'		=> 'Dark',

					),
				),

			),
		);

		// Subheader --------------------------------------------
		$sections['subheader'] = array(
			'title' => 'Subheader',
			'fields' => array(

				array(
					'id' 		=> 'subheader-info-layout',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Layout',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'subheader-style',
					'type'		=> 'select',
					'title'		=> 'Style',
					'options'	=> array(
						'both-center' 	=> 'Title & Breadcrumbs Centered',
						'both-left' 	=> 'Title & Breadcrumbs on the Left',
						'both-right' 	=> 'Title & Breadcrumbs on the Right',
						'' 				=> 'Title on the Left',
						'title-right' 	=> 'Title on the Right',
					),
					'std'		=> 'both-center',
				),

				array(
					'id'		=> 'subheader',
					'type' 		=> 'checkbox',
					'title' 	=> 'Hide',
					'options' 	=> array(
						'hide-breadcrumbs'	=> 'Breadcrumbs',
						'hide-title'		=> 'Page Title',
						'hide-subheader'	=> '<b>Subheader</b>',
					),
				),

				array(
					'id' 		=> 'subheader-padding',
					'type' 		=> 'text',
					'title' 	=> 'Padding',
					'sub_desc' 	=> 'default: 30px 0',
					'desc' 		=> 'Use value with <b>px</b> or <b>em</b><br />Example: <b>20px 0</b> or <b>20px 0 30px 0</b> or <b>2em 0</b>',
					'class' 	=> 'small-text',
				),

				array(
					'id'		=> 'subheader-title-tag',
					'type' 		=> 'select',
					'title' 	=> 'Title tag',
					'options' 	=> array(
						'h1'	=> 'h1',
						'h2'	=> 'h2',
						'h3'	=> 'h3',
						'h4'	=> 'h4',
						'h5'	=> 'h5',
						'h6'	=> 'h6',
						'span'	=> 'span',
					),
				),

				array(
					'id' 		=> 'subheader-info-background',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Background',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'subheader-image',
					'type' 		=> 'uploadframe',
					'title' 	=> 'Image',
					'desc' 		=> 'Recommended image width: <b>1920px</b>',
				),

				array(
					'id' 		=> 'subheader-position',
					'type' 		=> 'select',
					'title' 	=> 'Position',
					'desc' 		=> 'iOS does <b>not</b> support background-position: fixed',
					'options' 	=> mfna_bg_position(1),
					'std' 		=> 'center top no-repeat',
				),

				array(
					'id' 		=> 'subheader-size',
					'type' 		=> 'select',
					'title' 	=> 'Size',
					'desc' 		=> 'Does <b>not</b> work with fixed position. Works only in modern browsers',
					'options' 	=> mfna_bg_size(),
				),

				array(
					'id' 		=> 'subheader-transparent',
					'type' 		=> 'sliderbar',
					'title' 	=> 'Transparency (alpha)',
					'sub_desc' 	=> '0 = transparent, 100 = solid',
					'desc' 		=> '<b>Important:</b> This option can be used only with <b>Custom</b> or <b>One Color Skin</b>',
					'param'	 	=> array(
						'min' 		=> 0,
						'max' 		=> 100,
					),
					'std' 		=> '100',
				),

				array(
					'id' 		=> 'subheader-info-advanced',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Advanced',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'subheader-advanced',
					'type' 		=> 'checkbox',
					'title' 	=> 'Options',
					'options' 	=> array(
						'breadcrumbs-link'	=> 'Breadcrumbs | Last item is link (NOT for Shop)',
						'slider-show'		=> 'Slider | Show subheader on pages with Slider',
					),
				),

			),
		);

		// Extras --------------------------------------------
		$sections['extras'] = array(
			'title' => 'Extras',
			'fields' => array(

				array(
					'id' 		=> 'extras-info-top-bar-right',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Top Bar Right',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'top-bar-right-hide',
					'type'		=> 'switch',
					'title'		=> 'Hide',
					'options'	=> array( '0' => 'Off', '1' => 'On' ),
				),

				array(
					'id' 		=> 'extras-info-action-button',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Action Button',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'header-action-title',
					'type'		=> 'text',
					'title'		=> 'Title',
					'class'		=> 'small-text',
				),

				array(
					'id'		=> 'header-action-link',
					'type'		=> 'text',
					'title'		=> 'Link',
				),

				array(
					'id'		=> 'header-action-target',
					'type' 		=> 'checkbox',
					'title' 	=> 'Options',
					'options' 	=> array(
						'target'	=> 'Open in new window',
						'scroll'	=> 'Scroll to section (use #SectionID as Link)',
					),
				),

				array(
					'id' 		=> 'extras-info-search',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Search',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'header-search',
					'type'		=> 'select',
					'title'		=> 'Search',
					'options'	=> array(
						'1' 		=> 'Icon | Default',
						'shop' 		=> 'Icon | Search Shop Products only',
						'input' 	=> 'Search Field',
						'0' 		=> 'Hide',
					),
				),

				array(
					'id' 		=> 'extras-info-wpml',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'WPML',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'header-wpml',
					'type'		=> 'select',
					'title'		=> 'Custom Switcher Style',
					'desc'		=> 'Custom Language Switcher is independent of WPML switcher options',
					'options'	=> array(
						''					=> 'Dropdown | Flags',
						'dropdown-name'		=> 'Dropdown | Language Name (native)',
						'horizontal'		=> 'Horizontal | Flags',
						'horizontal-code'	=> 'Horizontal | Language Code',
						'hide'				=> 'Hide',
					),
				),

				array(
					'id'		=> 'header-wpml-options',
					'type' 		=> 'checkbox',
					'title'		=> 'Custom Switcher Options',
					'options' 	=> array(
						'link-to-home'	=> 'Link to home of language for missing translations<span>Disable this option to skip languages with missing translation</span>',
					),
				),

				array(
					'id' 		=> 'extras-info-sliding-top',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Sliding Top',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'sliding-top',
					'type'		=> 'select',
					'title'		=> 'Sliding Top',
					'desc'		=> 'Widgetized Sliding Top position',
					'options'	=> array(
						'1' 		=> 'Right',
						'center' 	=> 'Center',
						'left' 		=> 'Left',
						'0' 		=> 'Hide',
					),
					'std'		=> '0',
				),

				array(
					'id'		=> 'sliding-top-icon',
					'type'		=> 'icon',
					'title'		=> 'Icon',
					'std'		=> 'icon-down-open-mini',
				),

				array(
					'id' 		=> 'extras-info-other',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Other',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'header-banner',
					'type' 		=> 'textarea',
					'title' 	=> 'Banner',
					'sub_desc' 	=> 'Header Magazine (468px x 60px) or Creative (250px x 250px) Banner code ',
					'desc' 		=> '&lt;a href="#" target="_blank"&gt;&lt;img src="" alt="" /&gt;&lt;/a&gt;',
				),

			),
		);

		// Menu, Action Bar =======================================================================

		// Menu --------------------------------------------
		$sections['menu'] = array(
			'title' => 'Menu',
			'fields' => array(

				array(
					'id' 		=> 'menu-info-layout',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Layout',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'menu-style',
					'type'		=> 'select',
					'title'		=> 'Style',
					'desc'		=> 'For some header style only',
					'options'	=> array(
						'link-color'		=> 'Link color only',
						''					=> 'Line above Menu',
						'line-below'		=> 'Line below Menu',
						'line-below-80'		=> 'Line below Link (80% width)',
						'line-below-80-1'	=> 'Line below Link (80% width, 1px height)',
						'arrow-top'			=> 'Arrow Top',
						'arrow-bottom'		=> 'Arrow Bottom',
						'highlight'			=> 'Highlight',
						'hide'				=> 'HIDE Menu',
					),
					'std'		=> 'link-color',
				),

				array(
					'id'			=> 'menu-options',
					'type' 		=> 'checkbox',
					'title' 	=>  'Options',
					'options' => array(
						'align-right'			=>  'Align Right',
						'menu-arrows'			=>  'Arrows for Items with Submenu',
						'hide-borders'		=>  'Hide Border between Items',
						'submenu-active'	=>  'Submenu | Add active',
						// 'submenu-limit'		=>  'Submenu | Limit width',
						'last'						=>  'Submenu | Fold last 2 to the left<span>for Header Creative: fold to top</span>',
					),
				),

				array(
					'id' 		=> 'menu-info-creative',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Creative <span>for creative header only</span>',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'menu-creative-options',
					'type' 		=> 'checkbox',
					'title' 	=> 'Options',
					'options' 	=> array(
						'scroll'	=> 'Scrollable <span>for menu with large amount of items <b>without submenus</b></span>',
						'dropdown'	=> 'Dropdown submenu <span>use with scrollable</span>',
					),
				),

				array(
					'id' 		=> 'menu-info-mega',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Mega Menu',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'menu-mega-style',
					'type'		=> 'select',
					'title'		=> 'Style',
					'options'	=> array(
						''			=> 'Default',
						'vertical'	=> 'Vertical Lines',
					),
				),

			),
		);

		// Action Bar --------------------------------------------
		$sections['action-bar'] = array(
			'title' => 'Action Bar',
			'fields' => array(

				array(
					'id'		=> 'action-bar',
					'type'		=> 'switch',
					'title'		=>  'Action Bar',
					'desc'		=>  'Show Action Bar above the header',
					'options'	=> array( '0' => 'Off', '1' => 'On' ),
				),

				array(
					'id'		=> 'header-slogan',
					'type'		=> 'text',
					'title'		=> 'Slogan',
					'class'		=> 'small-text',
				),

				array(
					'id'		=> 'header-phone',
					'type'		=> 'text',
					'title'		=> 'Phone',
					'sub_desc'	=> 'Phone number',
					'class'		=> 'small-text',
				),

				array(
					'id'		=> 'header-phone-2',
					'type'		=> 'text',
					'title'		=> '2nd Phone',
					'sub_desc'	=> 'Additional Phone number',
					'class'		=> 'small-text',
				),

				array(
					'id'		=> 'header-email',
					'type'		=> 'text',
					'title'		=> 'Email',
					'sub_desc'	=> 'Email address',
					'class'		=> 'small-text',
				),

			),
		);

		// Sidebars ===============================================================================

		// Sidebars --------------------------------------------
		$sections['sidebars'] = array(
			'title' => 'General',
			'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields' => array(

				array(
					'id' 		=> 'sidebar-info-sidebars',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Sidebars',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'sidebars',
					'type' 		=> 'multi_text',
					'title' 	=> 'Sidebars',
					'sub_desc' 	=> 'Manage custom sidebars',
					'desc' 		=> 'Do <b>not</b> use <b> special characters</b> or the following names: <em>buddy, events, forum, shop</em>',
				),

				array(
					'id' 		=> 'sidebar-info-layout',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Layout',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'sidebar-width',
					'type' 		=> 'sliderbar',
					'title' 	=> 'Width',
					'sub_desc' 	=> 'default: 23%',
					'desc' 		=> 'Recommended: 20%-30%. Too small or too large value may crash the layout',
					'param'	 	=> array(
						'min' 		=> 10,
						'max' 		=> 50,
					),
					'std' 		=> '23',
				),

				array(
					'id' 		=> 'sidebar-lines',
					'type' 		=> 'select',
					'title' 	=> 'Lines',
					'sub_desc' 	=> 'Sidebar Lines Style',
					'options' 	=> array(
						''				=> 'Default',
						'lines-boxed'	=> 'Sidebar Width',
						'lines-hidden'	=> 'Hide Lines',
					),
					'std' 		=> '',
				),

				array(
					'id' 		=> 'sidebar-info-page',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Pages <span>force sidebar</span>',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'single-page-layout',
					'type' 		=> 'radio_img',
					'title' 	=> 'Layout',
					'sub_desc' 	=> 'Use this option to force layout for all pages',
					'desc' 		=> 'This option can <strong>not</strong> be overriden and it is usefull for people who already have many pages and want to standardize their appearance.',
					'options' 	=> array(
						'' 				=> array('title' => 'Use Page Meta', 'img' => MFN_OPTIONS_URI.'img/question.png'),
						'no-sidebar' 	=> array('title' => 'Full width without sidebar', 'img' => MFN_OPTIONS_URI.'img/1col.png'),
						'left-sidebar'	=> array('title' => 'Left Sidebar', 'img' => MFN_OPTIONS_URI.'img/2cl.png'),
						'right-sidebar'	=> array('title' => 'Right Sidebar', 'img' => MFN_OPTIONS_URI.'img/2cr.png'),
						'both-sidebars' => array('title' => 'Both Sidebars', 'img' => MFN_OPTIONS_URI.'img/2sb.png'),
					),
				),

				array(
					'id' 		=> 'single-page-sidebar',
					'type' 		=> 'text',
					'title' 	=> 'Sidebar',
					'sub_desc' 	=> 'Use this option to force sidebar for all pages',
					'desc' 		=> 'Paste the name of one of the sidebars that you added in the "Sidebars" section.',
					'class' 	=> 'small-text',
				),

				array(
					'id' 		=> 'single-page-sidebar2',
					'type' 		=> 'text',
					'title' 	=> 'Sidebar 2',
					'sub_desc' 	=> 'Use this option to force sidebar for all pages',
					'desc' 		=> 'Paste the name of one of the sidebars that you added in the "Sidebars" section.',
					'class' 	=> 'small-text',
				),

				array(
					'id' 		=> 'sidebar-info-post',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Single Posts <span>force sidebar</span>',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'single-layout',
					'type' 		=> 'radio_img',
					'title' 	=> 'Layout',
					'sub_desc' 	=> 'Use this option to force layout for all posts',
					'desc' 		=> 'This option can <strong>not</strong> be overriden and it is usefull for people who already have many posts and want to standardize their appearance.',
					'options' 	=> array(
						'' 				=> array('title' => 'Use Post Meta', 'img' => MFN_OPTIONS_URI.'img/question.png'),
						'no-sidebar' 	=> array('title' => 'Full width without sidebar', 'img' => MFN_OPTIONS_URI.'img/1col.png'),
						'left-sidebar'	=> array('title' => 'Left Sidebar', 'img' => MFN_OPTIONS_URI.'img/2cl.png'),
						'right-sidebar'	=> array('title' => 'Right Sidebar', 'img' => MFN_OPTIONS_URI.'img/2cr.png'),
						'both-sidebars' => array('title' => 'Both Sidebars', 'img' => MFN_OPTIONS_URI.'img/2sb.png'),
					),
				),

				array(
					'id' 		=> 'single-sidebar',
					'type' 		=> 'text',
					'title' 	=> 'Sidebar',
					'sub_desc' 	=> 'Use this option to force sidebar for all posts',
					'desc' 		=> 'Paste the name of one of the sidebars that you added in the "Sidebars" section.',
					'class' 	=> 'small-text',
				),

				array(
					'id' 		=> 'single-sidebar2',
					'type' 		=> 'text',
					'title' 	=> 'Sidebar 2',
					'sub_desc' 	=> 'Use this option to force sidebar for all posts',
					'desc' 		=> 'Paste the name of one of the sidebars that you added in the "Sidebars" section.',
					'class' 	=> 'small-text',
				),

				array(
					'id' 		=> 'sidebar-info-project',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Single Portfolio Projects <span>force sidebar</span>',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'single-portfolio-layout',
					'type' 		=> 'radio_img',
					'title' 	=> 'Layout',
					'sub_desc' 	=> 'Use this option to force layout for all portfolio projects',
					'desc' 		=> 'This option can <strong>not</strong> be overriden and it is usefull for people who already have many portfolio projects and want to standardize their appearance.',
					'options' 	=> array(
						'' 				=> array('title' => 'Use Post Meta', 'img' => MFN_OPTIONS_URI.'img/question.png'),
						'no-sidebar' 	=> array('title' => 'Full width without sidebar', 'img' => MFN_OPTIONS_URI.'img/1col.png'),
						'left-sidebar'	=> array('title' => 'Left Sidebar', 'img' => MFN_OPTIONS_URI.'img/2cl.png'),
						'right-sidebar'	=> array('title' => 'Right Sidebar', 'img' => MFN_OPTIONS_URI.'img/2cr.png'),
						'both-sidebars' => array('title' => 'Both Sidebars', 'img' => MFN_OPTIONS_URI.'img/2sb.png'),
					),
				),

				array(
					'id' 		=> 'single-portfolio-sidebar',
					'type' 		=> 'text',
					'title' 	=> 'Sidebar',
					'sub_desc' 	=> 'Use this option to force sidebar for all portfolio projects',
					'desc' 		=> 'Paste the name of one of the sidebars that you added in the "Sidebars" section.',
					'class' 	=> 'small-text',
				),

				array(
					'id' 		=> 'single-portfolio-sidebar2',
					'type' 		=> 'text',
					'title' 	=> 'Sidebar 2',
					'sub_desc' 	=> 'Use this option to force sidebar for all portfolio projects',
					'desc' 		=> 'Paste the name of one of the sidebars that you added in the "Sidebars" section.',
					'class' 	=> 'small-text',
				),

			),
		);

		// Blog, Portfolio, Shop ==================================================================

		// General ---------------------------------------------
		$sections['bps-general'] = array(
			'title' 	=> 'General',
			'icon' 		=> MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields'	=> array(

				array(
					'id' 		=> 'bps-info',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Blog, Portfolio, Shop',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'prev-next-nav',
					'type' 		=> 'checkbox',
					'title' 	=> 'Navigation',
					'sub_desc' 	=> 'Prev/Next Post Navigation',
					'options' 	=> array(
						'hide-header'	=> '<b>Hide</b> Header Arrows',
						'hide-sticky'	=> '<b>Hide</b> Sticky Arrows',
						'in-same-term'	=> 'Navigate in the same category <span>excluding Shop</span>',
					),
				),

				array(
					'id'		=> 'prev-next-style',
					'type' 		=> 'select',
					'title' 	=> 'Navigation | Header Arrows',
					'options' 	=> array(
						'minimal'	=> 'Simple',
						''			=> 'Classic',
					),
					'std'		=> 'minimal'
				),

				array(
					'id'		=> 'prev-next-sticky-style',
					'type' 		=> 'select',
					'title' 	=>  'Navigation | Sticky Arrows',
					'options' 	=> array(
						''			=>  'Default',
						'images'	=>  'Images only',
						'arrows'	=>  'Arrows only',
					),
				),

				array(
					'id' 		=> 'share',
					'type' 		=> 'select',
					'title' 	=>  'Share Box',
					'options' 	=> array(
						'1' 			=>  'Show',
						'0' 			=>  'Hide',
						'hide-mobile' 	=>  'Hide on Mobile',
					),
					'std' 		=> '1'
				),

				array(
					'id' 		=> 'share-style',
					'type' 		=> 'select',
					'title' 	=>  'Share Box | Style',
					'options' 	=> array(
						'' 			=>  'Classic',
						'simple' 	=>  'Simple',
					),
					'std' 		=> 'simple',
				),

				array(
					'id' 		=> 'bps-info-bp',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Blog, Portfolio',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'pagination-show-all',
					'type' 		=> 'switch',
					'title' 	=> 'All pages in pagination',
					'desc' 		=> 'Show all of the pages instead of a short list of the pages near the current page',
					'options' 	=> array('1' => 'On','0' => 'Off'),
					'std' 		=> '1'
				),

				array(
					'id' 		=> 'love',
					'type' 		=> 'switch',
					'title' 	=> 'Love Box',
					'sub_desc' 	=> 'Show Love Box',
					'options' 	=> array( '1' => 'On', '0' => 'Off' ),
					'std' 		=> '1'
				),

				array(
					'id' 		=> 'bps-info-single-bp',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Single Post, Single Portfolio Project',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'featured-image-caption',
					'type' 		=> 'select',
					'title' 	=> 'Featured Image Caption',
					'desc' 		=> 'Caption for Featured Image can be set in Media Library',
					'options' 	=> array(
						'' 				=> 'Show',
						'hide' 			=> 'Hide',
						'hide-mobile' 	=> 'Hide on Mobile',

					),
				),

				array(
					'id' 		=> 'related-style',
					'type' 		=> 'select',
					'title' 	=> 'Related Posts |  Style',
					'title' 	=> 'Related posts & projects style',
					'options' 	=> array(
						'simple' 	=> 'Simple',
						'' 			=> 'Classic',
					),
					'std' 		=> 'simple',
				),

				array(
					'id' 		=> 'title-heading',
					'type' 		=> 'select',
					'title' 	=> 'Title Heading',
					'options' 	=> array(
						'1' => 'h1',
						'2' => 'h2',
						'3' => 'h3',
						'4' => 'h4',
						'5' => 'h5',
						'6' => 'h6',
					),
					'std' 		=> '1'
				),

			),
		);


		// Pages ==================================================================================

		// General -------------------------------------------
		$sections['pages-general'] = array(
			'title' 	=> 'General',
			'icon'		=> MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields' 	=> array(

				array(
					'id' 		=> 'page-comments',
					'type' 		=> 'switch',
					'title' 	=> 'Page Comments',
					'sub_desc' 	=> 'Show Comments for pages',
					'desc' 		=> 'Single Page',
					'options' 	=> array( '0' => 'Off', '1' => 'On' ),
					'std' 		=> '0'
				),

			),
		);

		// Error 404 -------------------------------------------
		$sections['pages-404'] = array(
			'title' 	=> 'Error 404',
			'icon'		=> MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields' 	=> array(

				array(
					'id' 		=> 'error404-icon',
					'type' 		=> 'icon',
					'title' 	=> 'Icon',
					'sub_desc' 	=> 'Error 404 Page Icon',
					'class' 	=> 'small-text',
					'std' 		=> 'icon-traffic-cone',
				),

				array(
					'id' 		=> 'error404-page',
					'type' 		=> 'pages_select',
					'title' 	=> 'Custom Page',
					'sub_desc' 	=> 'Page Options, header & footer are disabled',
					'desc' 		=> 'Leave this field <b>blank</b> if you want to use <b>default</b> 404 page<br /><b>Notice: </b>Plugins like Visual Composer & Gravity Forms <b>do not work</b> on this page',
					'args' 		=> array()
				),

			),
		);

		// Under Construction --------------------------------------------
		$sections['pages-under'] = array(
			'title' 	=> 'Under Construction',
			'icon' 		=> MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields'	=> array(

				array(
					'id' 		=> 'construction',
					'type' 		=> 'switch',
					'title' 	=> 'Under Construction',
					'desc' 		=> 'Under Construction page will be visible for all NOT logged in users.',
					'options' 	=> array('1' => 'On','0' => 'Off'),
					'std' 		=> '0'
				),

				array(
					'id' 		=> 'construction-title',
					'type' 		=> 'text',
					'title' 	=> 'Title',
					'std' 		=> 'Coming Soon',
				),

				array(
					'id' 		=> 'construction-text',
					'type' 		=> 'textarea',
					'title' 	=> 'Text',
				),

				array(
					'id' 		=> 'construction-date',
					'type' 		=> 'text',
					'title' 	=> 'Launch Date',
					'desc' 		=> 'Format: 12/30/2018 12:00:00 month/day/year hour:minute:second<br />Leave this field <b>blank to hide the counter</b>',
					'std' 		=> '12/30/2018 12:00:00',
					'class' 	=> 'small-text',
				),

				array(
					'id' 		=> 'construction-offset',
					'type' 		=> 'select',
					'title' 	=> 'UTC Timezone',
					'options' 	=> mfna_utc(),
					'std' 		=> '0',
				),

				array(
					'id' 		=> 'construction-contact',
					'type' 		=> 'text',
					'title' 	=> 'Contact Form Shortcode',
					'desc' 		=> 'eg. [contact-form-7 id="000" title="Maintenance"]',
				),

				array(
					'id' 		=> 'construction-page',
					'type' 		=> 'pages_select',
					'title' 	=> 'Custom Page',
					'sub_desc' 	=> 'Page Options, header & footer are disabled',
					'desc' 		=> 'Leave this field <b>blank</b> if you want to use <b>default</b> Under Construction page<br /><b>Notice: </b>Plugins like Visual Composer & Gravity Forms <b>do not work</b> on this page',
					'args' 		=> array(),
				),

			),
		);

		// Footer =================================================================================

		// Footer --------------------------------------------
		$sections['footer'] = array(
			'title'		=> 'General',
			'fields' 	=> array(

				array(
					'id' 		=> 'footer-info-layout',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Layout',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'			=> 'footer-layout',
					'type'		=> 'select',
					'title'		=>  'Layout',
					'options'	=> array(
						'' =>  '-- Default --',
						'5;one-fifth;one-fifth;one-fifth;one-fifth;one-fifth;'	=> '1/5 1/5 1/5 1/5 1/5 (for narrow widgets only)',
						'4;one-fourth;one-fourth;one-fourth;one-fourth'					=> '1/4 1/4 1/4 1/4',

						'3;one-fifth;two-fifth;two-fifth'				=> '1/5 2/5 2/5',
						'3;two-fifth;one-fifth;two-fifth'				=> '2/5 1/5 2/5',
						'3;two-fifth;two-fifth;one-fifth'				=> '2/5 2/5 1/5',

						'3;one-fourth;one-fourth;one-second;'		=> '1/4 1/4 1/2',
						'3;one-fourth;one-second;one-fourth;'		=> '1/4 1/2 1/4',
						'3;one-second;one-fourth;one-fourth;'		=> '1/2 1/4 1/4',
						'3;one-third;one-third;one-third;'			=> '1/3 1/3 1/3',
						'2;one-third;two-third;;'								=> '1/3 2/3',
						'2;two-third;one-third;;'								=> '2/3 1/3',
						'2;one-second;one-second;;'							=> '1/2 1/2',
						'1;one;;;'															=> '1/1',
					),
				),

				array(
					'id'			=> 'footer-style',
					'type'		=> 'select',
					'title'		=>  'Style',
					'desc'		=>  'Sliding style does <b>not</b> work with transparent content',
					'options'	=> array(
						''				=>  '-- Default --',
						'fixed'		=>  'Fixed (covers content)',
						'sliding'	=>  'Sliding (under content)',
						'stick'		=>  'Stick to bottom if content is too short',
						'hide'		=>  'HIDE Footer',
					),
				),

				array(
					'id' 		=> 'footer-padding',
					'type' 		=> 'text',
					'title' 	=> 'Padding',
					'sub_desc' 	=> 'default: 15px 0',
					'desc' 		=> 'Use value with <b>px</b> or <b>em</b><br />Example: <b>20px 0</b> or <b>20px 0 30px 0</b> or <b>2em 0</b>',
					'class' 	=> 'small-text',
					'std' 		=> '70px 0',
				),

				array(
					'id' 		=> 'footer-info-background',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Background',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'footer-bg-img',
					'type' 		=> 'uploadframe',
					'title' 	=> 'Image',
				),

				array(
					'id' 		=> 'footer-bg-img-position',
					'type' 		=> 'select',
					'title' 	=> 'Position',
					'desc' 		=> 'iOS does <b>not</b> support background-position: fixed',
					'options' 	=> mfna_bg_position(1),
					'std' 		=> 'center top no-repeat',
				),

				array(
					'id' 		=> 'footer-bg-img-size',
					'type' 		=> 'select',
					'title' 	=> 'Size',
					'desc' 		=> 'Does <b>not</b> work with fixed position. Works only in modern browsers',
					'options' 	=> mfna_bg_size(),
				),

				array(
					'id' 		=> 'footer-info-advanced',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Advanced',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'			=> 'footer-call-to-action',
					'type'		=> 'textarea',
					'title'		=>  'Call To Action',
				),

				array(
					'id'			=> 'footer-copy',
					'type'		=> 'textarea',
					'title'		=>  'Copyright',
					'desc'		=>  'Leave this field blank to show a default copyright',
				),

				array(
					'id' 		=> 'footer-hide',
					'type' 		=> 'select',
					'title' 	=> 'Copyright & Social Bar',
					'options' 	=> array(
						'' 			=> 'Default',
						'center' 	=> 'Center',
						'1' 		=> 'Hide Copyright & Social Bar',
					),
				),

				array(
					'id' 		=> 'footer-info-extras',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Extras',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'back-top-top',
					'type'		=> 'select',
					'title'		=> 'Back to Top button',
					'options'	=> array(
						''				=> 'Default | in Copyright area',
						'sticky'		=> 'Sticky',
						'sticky scroll'	=> 'Sticky show on scroll',
						'hide'			=> 'Hide',
					),
				),

				array(
					'id'		=> 'popup-contact-form',
					'type'		=> 'text',
					'title'		=> 'Popup Contact Form | Shortcode',
					'sub_desc'	=> '<b>> 768px</b>',
					'desc'		=> '	eg. [contact-form-7 id="000" title="Popup Contact Form"]',
				),

				array(
					'id'		=> 'popup-contact-form-icon',
					'type'		=> 'icon',
					'title'		=> 'Popup Contact Form | Icon',
					'std'		=> 'icon-mail-line',
				),

			),
		);

		// Responsive =================================================================================

		// General --------------------------------------------
		$sections['responsive'] = array(
			'title'		=> 'General',
			'fields' 	=> array(

				array(
					'id' 		=> 'responsive',
					'type' 		=> 'switch',
					'title' 	=> 'Responsive',
					'desc' 		=> '<b>Notice:</b> Responsive menu is working only with WordPress custom menu, please add one in Appearance > Menus and select it for Theme Locations section<br /><a href="https://codex.wordpress.org/WordPress_Menu_User_Guide" target="_blank">https://codex.wordpress.org/WordPress_Menu_User_Guide</a>',
					'options' 	=> array('1' => 'On','0' => 'Off'),
					'std' 		=> '1'
				),

				// layout
				array(
					'id' 		=> 'responsive-info-layout',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Layout',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'mobile-grid-width',
					'type' 		=> 'sliderbar',
					'title' 	=> 'Mobile Grid width',
					'sub_desc' 	=> '<b>< 768px</b>',
					'desc' 		=> 'default: 480',
					'param'	 	=> array(
						'min' 		=> 480,
						'max' 		=> 700,
					),
					'std' 		=> 480,
				),

				array(
					'id' 		=> 'font-size-responsive',
					'type' 		=> 'switch',
					'title' 	=> 'Decrease Fonts',
					'desc' 		=> 'Automatically decrease font size in responsive',
					'options' 	=> array( '1' => 'On', '0' => 'Off' ),
					'std' 		=> '1'
				),

				array(
					'id' 		=> 'responsive-zoom',
					'type' 		=> 'switch',
					'title' 	=> 'Pinch Zoom',
					'desc' 		=> 'Allow pinch zoom',
					'options' 	=> array( '0' => 'Off', '1' => 'On' ),
					'std' 		=> '0'
				),

				// options
				array(
					'id' 		=> 'responsive-info-options',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Options',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'responsive-boxed2fw',
					'type'		=> 'switch',
					'title'		=> 'Boxed to Full Width',
					'sub_desc'	=> '<b>< 768px</b>',
					'desc'		=> 'Change layout from Boxed to Full Witdh on mobile',
					'options'	=> array( '0' => 'Off', '1' => 'On' ),
					'std'		=> '0',
				),

				array(
					'id' 		=> 'no-hover',
					'type' 		=> 'select',
					'title' 	=> 'Hover Effects',
					'options' 	=> array(
						'' 			=> 'Always Enabled',
						'tablet'	=> 'Enabled on Desktop only',
					),
				),

				array(
					'id' 		=> 'no-section-bg',
					'type' 		=> 'select',
					'title' 	=>  'Section | Background Image',
					'options' 	=> array(
						'' 			=>  '-- Default --',
						'tablet'	=>  'Show on Desktop only',
					),
				),

				array(
					'id' 		=> 'responsive-parallax',
					'type' 		=> 'select',
					'title' 	=>  'Section | Parallax',
					'desc' 		=>  'Works only with <b>Translate3d</b> parallax. May run slowly on older devices',
					'options' 	=> array(
						0 	=>  'Disable on mobile',
						1	=>  'Enable on mobile',
					),
				),

				array(
					'id' 			=> 'builder-wrap-moveup',
					'type' 		=> 'select',
					'title' 	=>  'Wrap | Move Up',
					'options' => array(
						'' 					=>  '-- Default --',
						'no-tablet'	=>  'Disable on tablet and mobile < 960px',
						'no-move'		=>  'Disable on mobile < 768px',
					),
				),

				// logo
				array(
					'id' 		=> 'responsive-info-logo',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Logo <span><b>mobile</b> < 768px</span>',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'responsive-logo-img',
					'type'		=> 'uploadframe',
					'title'		=> 'Logo',
					'sub_desc'	=> '<b>< 768px</b><br />optional',
					'desc'		=> 'Use if you want different logo on mobile',
				),

				array(
					'id'		=> 'responsive-retina-logo-img',
					'type'		=> 'uploadframe',
					'title'		=> 'Retina Logo',
					'sub_desc'	=> 'optional',
					'desc'		=> 'Retina Logo should be 2x larger than Logo',
				),

				// logo sticky
				array(
					'id' 		=> 'responsive-sticky-info-logo',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Sticky Header Logo <span><b>mobile</b> < 768px</span>',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'responsive-sticky-logo-img',
					'type'		=> 'uploadframe',
					'title'		=> 'Logo',
					'sub_desc'	=> '<b>< 768px</b><br />optional',
					'desc'		=> 'Use if you want different logo for Sticky Header on mobile',
				),

				array(
					'id'		=> 'responsive-sticky-retina-logo-img',
					'type'		=> 'uploadframe',
					'title'		=> 'Retina Logo',
					'sub_desc'	=> 'optional',
					'desc'		=> 'Retina Logo should be 2x larger than Sticky Header Logo',
				),

			),
		);

		// Responsive | Header --------------------------------------------
		$sections['responsive-header'] = array(
			'title'		=> 'Header',
			'fields' 	=> array(

				// header
				array(
					'id' 		=> 'responsive-info-header',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Header',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'responsive-header-tablet',
					'type' 		=> 'checkbox',
					'title' 	=> 'Tablet options',
					'sub_desc' 	=> '<b>> 768px</b>',
					'options' 	=> array(
						'sticky'		=> 'Sticky',
					),
				),

				array(
					'id'		=> 'responsive-header-mobile',
					'type' 		=> 'checkbox',
					'title' 	=> 'Mobile options',
					'sub_desc' 	=> '<b>< 768px</b>',
					'options' 	=> array(
						'minimal'		=> 'Minimal',
						'sticky'		=> 'Sticky<span>works only with Sticky Header: ON</span>',
						'transparent'	=> 'Transparent',
					),
				),

				// header | minimal
				array(
					'id' 		=> 'responsive-info-header-minimal',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Header Minimal<span>for Mobile Header: Minimal</span>',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'responsive-header-minimal',
					'type' 		=> 'radio_img',
					'title' 	=> 'Layout',
					'sub_desc' 	=> '<b>< 768px</b>',
					'desc' 		=> 'Do not use centered logo with more than 2 Icons in Top Bar',
					'options' 	=> array(
						'mr-ll' 	=> array('title' => 'Menu right | Logo left', 'img' => MFN_OPTIONS_URI.'img/select/mobile-minimal/1.png'),
						'mr-lc' 	=> array('title' => 'Menu right | Logo center', 'img' => MFN_OPTIONS_URI.'img/select/mobile-minimal/2.png'),
						'mr-lr' 	=> array('title' => 'Menu right | Logo right', 'img' => MFN_OPTIONS_URI.'img/select/mobile-minimal/3.png'),
						'ml-ll' 	=> array('title' => 'Menu left | Logo left', 'img' => MFN_OPTIONS_URI.'img/select/mobile-minimal/4.png'),
						'ml-lc' 	=> array('title' => 'Menu left | Logo center', 'img' => MFN_OPTIONS_URI.'img/select/mobile-minimal/5.png'),
						'ml-lr' 	=> array('title' => 'Menu left | Logo right', 'img' => MFN_OPTIONS_URI.'img/select/mobile-minimal/6.png'),
					),
					'class'		=> 'wide short',
					'std' 		=> 'mr-ll',
				),

				// top bar
				array(
					'id' 		=> 'responsive-info-top-bar',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Top Bar',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'responsive-top-bar',
					'type' 		=> 'select',
					'title' 	=> 'Icons',
					'sub_desc' 	=> '<b>< 768px</b>',
					'desc' 		=> '<b>Align</b> works only for <b>Default Header</b> for Minimal Header please use Style select above',
					'options' 	=> array(
						'center'	=> 'Align Center',
						'left' 		=> 'Align Left',
						'right'		=> 'Align Right',
						'hide'		=> 'HIDE Icons & Action Button',
					),
				),

				// menu
				array(
					'id' 		=> 'responsive-info-menu',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Menu',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'mobile-menu-initial',
					'type' 		=> 'sliderbar',
					'title' 	=>  'Mobile breakpoint',
					'sub_desc'=>  'Width at which the mobile menu is turned on',
					'desc' 		=>  'Default: 1240px<br />Values <b>less than 1240</b> are for menu with small amount of items<br />Values <b>less than 950</b> are not suitable for Header Creative with Mega Menu',
					'param'	 	=> array(
						'min' 		=> 768,
						'max' 		=> 1240,
					),
					'std' 		=> 1240,
				),

				array(
					'id' 		=> 'mobile-menu',
					'type' 		=> 'select',
					'title' 	=>  'Menu',
					'sub_desc' 	=>  'Custom mobile main menu<br /><b>< 768px</b>',
					'desc' 		=>  'Overrides <b>all</b> other menu select options',
					'options'	=> mfna_menu(),
				),

				array(
					'id' 		=> 'responsive-mobile-menu',
					'type' 		=> 'select',
					'title' 	=> 'Style',
					'sub_desc' 	=> 'Responsive Menu Style',
					'desc' 		=> 'This option also <b>affects</b> Header Simple & Empty on desktop',
					'options' 	=> array(
						'side-slide'	=>  'Side Slide',
						'' 				=>  'Classic',
					),
					'std'		=> 'side-slide'
				),

				array(
					'id' 		=> 'responsive-side-slide-width',
					'type' 		=> 'sliderbar',
					'title' 	=>  'Side Slide | Width',
					'desc' 		=>  'Default: 250px',
					'param'	 	=> array(
						'min' 		=> 150,
						'max' 		=> 500,
					),
					'std' 		=> 250,
				),

				array(
					'id'		=> 'responsive-side-slide',
					'type' 		=> 'checkbox',
					'title' 	=> 'Side Slide | Hide',
					'desc' 		=> 'Works with Side Slide menu style selected above',
					'options' 	=> array(
						'button'	=> 'Action Button',
						'icons'		=> 'Icons',
						'social'	=> 'Social Icons',
					),
				),

				// menu | button
				array(
					'id' 		=> 'responsive-info-menu-button',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Menu | Button',
					'class' 	=> 'mfn-info',
				),

				array(
					'id'		=> 'header-menu-text',
					'type'		=> 'text',
					'title'		=> 'Button | Text',
					'desc'		=> 'This text will be used instead of the menu icon',
					'class'		=> 'small-text',
				),

				array(
					'id'		=> 'header-menu-mobile-sticky',
					'type'		=> 'switch',
					'title'		=> 'Button | Sticky',
					'desc'		=> 'Sticky Menu Button <b>on mobile</b> < 768px',
					'options'	=> array( '0' => 'Off', '1' => 'On' ),
					'std'		=> '0',
				),



			),
		);

		// SEO ====================================================================================

		// SEO -------------------------------------------
		$sections['seo'] = array(
			'title' 	=>  'General',
			'icon' 		=> MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields'	=> array(

				array(
					'id' 		=> 'seo-info-google',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=>  'Google',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'google-analytics',
					'type' 		=> 'textarea',
					'title' 	=>  'Google | Analytics',
					'sub_desc' 	=>  'Paste your Google Analytics code here',
					'desc' 		=>  'Code will be included <b>before</b> the closing <b>&lt;/head&gt;</b> tag',
				),

				array(
					'id' 		=> 'facebook-pixel',
					'type' 		=> 'textarea',
					'title' 	=>  'Facebook | Pixel',
					'sub_desc' 	=>  'Paste your Facebook Pixel code here',
					'desc' 		=>  'Code will be included <b>before</b> the closing <b>&lt;/head&gt;</b> tag',
				),

				array(
					'id' 		=> 'google-remarketing',
					'type' 		=> 'textarea',
					'title' 	=>  'Google | Remarketing',
					'sub_desc' 	=>  'Paste your Google Remarketing code here',
					'desc' 		=>  'Code will be included <b>before</b> the closing <b>&lt;/body&gt;</b> tag',
				),

				array(
					'id' 		=> 'seo-info-fields',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=>  'SEO Fields',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'mfn-seo',
					'type' 		=> 'switch',
					'title' 	=>  'Use built-in fields',
					'desc' 		=>  'Turn it <b>OFF</b> if you want to use external SEO or share plugin',
					'options' 	=> array( '1' => 'On', '0' => 'Off' ),
					'std' 		=> '1'
				),

				array(
					'id' 		=> 'meta-description',
					'type' 		=> 'text',
					'title' 	=>  'Meta | Description',
					'desc' 		=>  'May be overridden for single posts, pages, portfolio',
					'std' 		=> ''/*get_bloginfo( 'description' )*/,
				),

				array(
					'id' 		=> 'meta-keywords',
					'type' 		=> 'text',
					'title' 	=>  'Meta | Keywords',
					'desc' 		=>  'May be overridden for single posts, pages, portfolio',
				),

				array(
					'id' 		=> 'mfn-seo-og-image',
					'type' 		=> 'uploadframe',
					'title' 	=>  'Open Graph | Image',
					'sub_desc' 	=>  'e.g. Facebook share image',
					'desc' 		=>  'May be overridden for single posts, pages, portfolio',
				),

				array(
					'id' 		=> 'seo-info-advanced',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=>  'Advanced',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'mfn-seo-schema-type',
					'type' 		=> 'switch',
					'title' 	=>  'Schema Type',
					'desc' 		=>  'Add Schema Type to &lt;html&gt; tag',
					'options' 	=> array( '1' => 'On', '0' => 'Off' ),
					'std' 		=> '1'
				),

			),
		);

		// Social Icons ===========================================================================

		// Social Icons --------------------------------------------
		$sections['social'] = array(
			'title' 	=>  'General',
			'icon' 		=> MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields' 	=> array(

				array(
					'id'			=> 'social-target',
					'type'		=> 'switch',
					'title'		=>  'Open links in new window',
					'desc'		=>  'Open social links in new window',
					'options'	=> array( '1' => 'On', '0' => 'Off' ),
					'std'			=> '0'
				),

				array(
					'id' 			=> 'social-skype',
					'type' 		=> 'text',
					'title' 	=>  'Skype',
					'desc' 		=>  'Skype login. You can use <strong>callto:</strong> or <strong>skype:</strong> prefix' ,
				),

				array(
					'id' 			=> 'social-whatsapp',
					'type' 		=> 'text',
					'title' 	=>  'WhatsApp',
					'desc' 		=>  'WhatsApp URL. You can use <strong>whatsapp:</strong> prefix' ,
				),

				array(
					'id' 		=> 'social-facebook',
					'type' 		=> 'text',
					'title' 	=> 'Facebook',
					'desc' 		=> 'Link to the profile page',
				),

				array(
					'id' 		=> 'social-googleplus',
					'type' 		=> 'text',
					'title' 	=> 'Google +',
					'desc' 		=> 'Link to the profile page',
				),

				array(
					'id' 		=> 'social-twitter',
					'type' 		=> 'text',
					'title' 	=> 'Twitter',
					'desc' 		=> 'Link to the profile page',
				),

				array(
					'id' 		=> 'social-vimeo',
					'type' 		=> 'text',
					'title' 	=> 'Vimeo',
					'desc' 		=> 'Link to the profile page',
				),

				array(
					'id' 		=> 'social-youtube',
					'type' 		=> 'text',
					'title' 	=> 'YouTube',
					'desc' 		=> 'Link to the profile page',
				),

				array(
					'id' 		=> 'social-flickr',
					'type' 		=> 'text',
					'title' 	=> 'Flickr',
					'desc' 		=> 'Link to the profile page',
				),

				array(
					'id' 		=> 'social-linkedin',
					'type' 		=> 'text',
					'title' 	=> 'LinkedIn',
					'desc' 		=> 'Link to the profile page',
				),

				array(
					'id' 		=> 'social-pinterest',
					'type'		=> 'text',
					'title' 	=> 'Pinterest',
					'desc' 		=> 'Link to the profile page',
				),

				array(
					'id' 		=> 'social-dribbble',
					'type' 		=> 'text',
					'title' 	=> 'Dribbble',
					'desc' 		=> 'Link to the profile page',
				),

				array(
					'id' 		=> 'social-instagram',
					'type' 		=> 'text',
					'title' 	=> 'Instagram',
					'desc' 		=> 'Link to the profile page',
				),

				array(
					'id' 		=> 'social-behance',
					'type' 		=> 'text',
					'title' 	=> 'Behance',
					'desc' 		=> 'Link to the profile page',
				),

				array(
					'id' 		=> 'social-tumblr',
					'type' 		=> 'text',
					'title' 	=> 'Tumblr',
					'desc' 		=> 'Link to the profile page',
				),

				array(
					'id' 		=> 'social-tripadvisor',
					'type' 		=> 'text',
					'title' 	=> 'TripAdvisor',
					'desc' 		=> 'Link to the profile page',
				),

				array(
					'id' 		=> 'social-vkontakte',
					'type' 		=> 'text',
					'title' 	=> 'VKontakte',
					'desc' 		=> 'Link to the profile page',
				),

				array(
					'id' 		=> 'social-viadeo',
					'type' 		=> 'text',
					'title' 	=> 'Viadeo',
					'desc' 		=> 'Link to the profile page',
				),

				array(
					'id' 		=> 'social-xing',
					'type' 		=> 'text',
					'title' 	=> 'Xing',
					'desc' 		=> 'Link to the profile page',
				),

				array(
					'id'		=> 'social-custom-icon',
					'type'		=> 'icon',
					'title'		=> 'Custom | Icon',
				),

				array(
					'id' 		=> 'social-custom-link',
					'type' 		=> 'text',
					'title' 	=> 'Custom | Link',
					'desc' 		=> 'To show Custom Social Icon select Icon and enter Link to the profile page',
				),

				array(
					'id'		=> 'social-rss',
					'type'		=> 'switch',
					'title'		=> 'RSS',
					'desc'		=> 'Show the RSS icon',
					'options'	=> array('1' => 'On','0' => 'Off'),
					'std'		=> '0'
				),

			),
		);

		// Colors =================================================================================

		// General --------------------------------------------
		$sections['colors-general'] = array(
			'title' => 'General',
			'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields' => array(

				array(
					'id' 		=> 'colors-general-info-skin',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Skin',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'skin',
					'type' 		=> 'select',
					'title' 	=> 'Theme Skin',
					'sub_desc' 	=> 'Choose one of the predefined styles or set your own colors',
					'desc' 		=> '<strong>Important:</strong> Color options can be used only with the <strong>Custom Skin</strong>',
					'options' 	=> mfna_skin(),
					'std' 		=> 'custom',
				),

				array(
					'id' 		=> 'color-one',
					'type' 		=> 'color',
					'title' 	=> 'One Color',
					'sub_desc' 	=> 'One Color Skin Generator',
					'desc' 		=> 'for <strong>One Color Skin</strong>',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'colors-general-info-background',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Background',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'background-html',
					'type' 		=> 'color',
					'title' 	=> 'Body background',
					'desc' 		=> 'for <strong>Boxed Layout</strong>',
					'std' 		=> '#FCFCFC',
				),

				array(
					'id' 		=> 'background-body',
					'type' 		=> 'color',
					'title' 	=> 'Content background',
					'std' 		=> '#FCFCFC',
				),

			),
		);

		// Header --------------------------------------------
		$sections['colors-header'] = array(
			'title' => 'Header',
			'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields' => array(

				array(
					'id' 		=> 'background-header',
					'type' 		=> 'color',
					'title' 	=> 'Header background',
					'std' 		=> '#000119',
				),

				// top bar
				array(
					'id' 		=> 'colors-info-top-bar',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Top Bar',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'background-top-left',
					'type' 		=> 'color',
					'title' 	=> 'Top Bar Left | background',
					'desc' 		=> 'This is also Mobile Header & Top Bar Background for some Header Styles',
					'std' 		=> '#ffffff',
				),

				array(
					'id' 			=> 'background-top-middle',
					'type' 		=> 'color',
					'title' 	=> 'Top Bar Middle | background',
					'desc'		=> 'for <strong>Header Modern</strong>',
					'std' 		=> '#e3e3e3',
				),

				array(
					'id' 		=> 'background-top-right',
					'type' 		=> 'color',
					'title' 	=> 'Top Bar Right | background',
					'std' 		=> '#f5f5f5',
				),

				array(
					'id' 		=> 'color-top-right-a',
					'type' 		=> 'color',
					'title' 	=> 'Top Bar Right | Icon color',
					'std' 		=> '#333333',
				),

				// action button
				array(
					'id' 			=> 'colors-info-action-button',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=>  'Action Button',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 			=> 'background-action-button',
					'type' 		=> 'color',
					'title' 	=>  'Background',
					'std' 		=> '#f7f7f7',
				),

				array(
					'id' 			=> 'color-action-button',
					'type' 		=> 'color',
					'title' 	=>  'Color',
					'std' 		=> '#747474',
				),

				// search
				array(
					'id' 		=> 'colors-info-search',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Search',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'background-search',
					'type' 		=> 'color',
					'title' 	=> 'Background',
					'std' 		=> '#0095eb',
				),

				// subheader
				array(
					'id' 		=> 'colors-info-subheader',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Subheader',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'background-subheader',
					'type' 		=> 'color',
					'title' 	=> 'Background',
					'std' 		=> '#F7F7F7',
				),

				array(
					'id' 		=> 'color-subheader',
					'type' 		=> 'color',
					'title' 	=> 'Title color',
					'std' 		=> '#444444',
				),

			),
		);

		// Menu --------------------------------------------
		$sections['colors-menu'] = array(
			'title' => 'Menu',
			'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields' => array(

				// menu
				array(
					'id' 		=> 'colors-info-menu',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Menu',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'color-menu-a',
					'type' 		=> 'color',
					'title' 	=> 'Link color',
					'std' 		=> '#444444',
				),

				array(
					'id' 		=> 'color-menu-a-active',
					'type' 		=> 'color',
					'title' 	=> 'Active Link color',
					'desc' 		=> 'This is also Active Link Border',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'background-menu-a-active',
					'type' 		=> 'color',
					'title' 	=> 'Active Link background',
					'desc' 		=> 'Header Plain & Menu Highlight',
					'std' 		=> '#F2F2F2',
				),

				// submenu
				array(
					'id' 		=> 'colors-info-submenu',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Submenu',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'background-submenu',
					'type' 		=> 'color',
					'title' 	=> 'Background',
					'std' 		=> '#F2F2F2',
				),

				array(
					'id' 		=> 'color-submenu-a',
					'type' 		=> 'color',
					'title' 	=> 'Link color',
					'std' 		=> '#5f5f5f',
				),

				array(
					'id' 		=> 'color-submenu-a-hover',
					'type' 		=> 'color',
					'title' 	=> 'Hover Link color',
					'std' 		=> '#2e2e2e',
				),

				// responsive
				array(
					'id' 		=> 'colors-info-menu-responsive',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Menu Button <span>Responsive, Header Creative, Simple & Empty</span>',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'color-menu-responsive-icon',
					'type' 		=> 'color',
					'title' 	=> 'Button color',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'background-menu-responsive-icon',
					'type' 		=> 'color',
					'title' 	=> 'Button background',
					'sub_desc' 	=> 'optional',
					'std' 		=> '',
				),

				// styles
				array(
					'id' 		=> 'colors-info-menu-styles',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Styles<span>for specific header styles</span>',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'background-overlay-menu',
					'type' 		=> 'color',
					'title' 	=> 'Overlay Menu<br />Menu background',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'background-overlay-menu-a',
					'type' 		=> 'color',
					'title' 	=> 'Overlay Menu<br />Link color',
					'std' 		=> '#FFFFFF',
				),

				array(
					'id' 		=> 'background-overlay-menu-a-active',
					'type' 		=> 'color',
					'title' 	=> 'Overlay Menu<br />Active Link color',
					'std' 		=> '#B1DCFB',
				),

				array(
					'id' 		=> 'border-menu-plain',
					'type' 		=> 'color',
					'title' 	=> 'Plain<br />Border color',
					'std' 		=> '#F2F2F2',
				),

				// side slide
				array(
					'id' 		=> 'colors-info-side-slide',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Side Slide<span>responsive menu style</span>',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'background-side-menu',
					'type' 		=> 'color',
					'title' 	=> 'Background',
					'std' 		=> '#191919',
				),

				array(
					'id' 		=> 'color-side-menu-a',
					'type' 		=> 'color',
					'title' 	=> 'Link color',
					'sub_desc' 	=> 'Text, Link & Icon color',
					'std' 		=> '#A6A6A6',
				),

				array(
					'id' 		=> 'color-side-menu-a-hover',
					'type' 		=> 'color',
					'title' 	=> 'Active Link color',
					'std' 		=> '#FFFFFF',
				),

			),
		);

		// Colors | Action Bar --------------------------------------------
		$sections['colors-action'] = array(
			'title' => 'Action Bar',
			'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields' => array(

				// desktop & tablet
				array(
					'id' 		=> 'colors-info-action-bar',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Desktop & Tablet<span>> 768px</span>',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'background-action-bar',
					'type' 		=> 'color',
					'title' 	=> 'Background',
					'desc' 		=> 'For some Header Styles',
					'std' 		=> '#292b33',
				),

				array(
					'id' 		=> 'color-action-bar',
					'type' 		=> 'color',
					'title' 	=> 'Text color',
					'std' 		=> '#bbbbbb',
				),

				array(
					'id' 		=> 'color-action-bar-a',
					'type' 		=> 'color',
					'title' 	=> 'Link | Color',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'color-action-bar-a-hover',
					'type' 		=> 'color',
					'title' 	=> 'Link | Hover color',
					'std' 		=> '#007cc3',
				),

				array(
					'id' 		=> 'color-action-bar-social',
					'type' 		=> 'color',
					'title' 	=> 'Social Icon | Color',
					'desc' 		=> 'This is also Social Menu Link color',
					'std' 		=> '#bbbbbb',
				),

				array(
					'id' 		=> 'color-action-bar-social-hover',
					'type' 		=> 'color',
					'title' 	=> 'Social Icon | Hover color',
					'desc' 		=> 'This is also Social Menu Link hover color',
					'std' 		=> '#FFFFFF',
				),

				// mobile
				array(
					'id' 		=> 'colors-info-action-bar-mobile',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Mobile<span>< 768px</span>',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'mobile-background-action-bar',
					'type' 		=> 'color',
					'title' 	=> 'Background',
					'std' 		=> '#FFFFFF',
				),

				array(
					'id' 		=> 'mobile-color-action-bar',
					'type' 		=> 'color',
					'title' 	=> 'Text color',
					'std' 		=> '#222222',
				),

				array(
					'id' 		=> 'mobile-color-action-bar-a',
					'type' 		=> 'color',
					'title' 	=> 'Link | Color',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'mobile-color-action-bar-a-hover',
					'type' 		=> 'color',
					'title' 	=> 'Link | Hover color',
					'std' 		=> '#007cc3',
				),

				array(
					'id' 		=> 'mobile-color-action-bar-social',
					'type' 		=> 'color',
					'title' 	=> 'Social Icon | Color',
					'desc' 		=> 'This is also Social Menu Link color',
					'std' 		=> '#bbbbbb',
				),

				array(
					'id' 		=> 'mobile-color-action-bar-social-hover',
					'type' 		=> 'color',
					'title' 	=> 'Social Icon | Hover color',
					'desc' 		=> 'This is also Social Menu Link hover color',
					'std' 		=> '#777777',
				),

			),
		);

		// Content --------------------------------------------
		$sections['content'] = array(
			'title' => 'Content',
			'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields' => array(

				array(
					'id' => 'color-theme',
					'type' => 'color',
					'title' => 'Theme | color',
					'sub_desc' => 'Highlighted button background, some icons and other small elements',
					'desc' => 'You can use <strong>.themecolor</strong> and <strong>.themebg</strong> classes in your content',
					'std' => '#0095eb'
				),

				array(
					'id' 			=> 'color-text',
					'type' 		=> 'color',
					'title' 	=>  'Text | color',
					'sub_desc'=>  'Content text color',
					'std' 		=> '#626262'
				),

				array(
					'id' 			=> 'color-selection',
					'type' 		=> 'color',
					'title' 	=>  'Selection | color',
					'std' 		=> '#0095eb'
				),

				// link
				array(
					'id' 			=> 'colors-info-link',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=>  'Link',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'color-a',
					'type' 		=> 'color',
					'title' 	=> 'Link | color',
					'std' 		=> '#0095eb'
				),

				array(
					'id' 		=> 'color-a-hover',
					'type' 		=> 'color',
					'title' 	=> 'Link | hover color',
					'std' 		=> '#007cc3'
				),

				array(
					'id' 		=> 'color-fancy-link',
					'type' 		=> 'color',
					'title' 	=> 'Fancy Link | color',
					'desc' 		=> 'For some link styles only',
					'std' 		=> '#656B6F'
				),

				array(
					'id' 		=> 'background-fancy-link',
					'type' 		=> 'color',
					'title' 	=> 'Fancy Link | background',
					'desc' 		=> 'For some link styles only',
					'std' 		=> '#0095eb'
				),

				array(
					'id' 		=> 'color-fancy-link-hover',
					'type' 		=> 'color',
					'title' 	=> 'Fancy Link | hover color',
					'desc' 		=> 'For some link styles only',
					'std' 		=> '#0095eb'
				),

				array(
					'id' 		=> 'background-fancy-link-hover',
					'type' 		=> 'color',
					'title' 	=> 'Fancy Link | hover background',
					'desc' 		=> 'For some link styles only',
					'std' 		=> '#007cc3'
				),

				// button
				array(
					'id' 			=> 'colors-info-button',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=>  'Button',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 			=> 'background-button',
					'type' 		=> 'color',
					'title' 	=>  'Button | background',
					'std' 		=> '#f7f7f7',
				),

				array(
					'id' 			=> 'color-button',
					'type' 		=> 'color',
					'title' 	=>  'Button | color',
					'std' 		=> '#747474',
				),

				array(
					'id' 			=> 'color-button-theme',
					'type' 		=> 'color',
					'title' 	=>  'Button theme | color',
					'sub_desc'=>  'Highlighted button text color',
					'std' 		=> '#ffffff',
				),

				// image frame
				array(
					'id' 		=> 'colors-info-imageframe',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Image Frame',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'border-imageframe',
					'type' 		=> 'color',
					'title'		=> 'Image Frame | Border color',
					'std' 		=> '#f8f8f8',
				),

				array(
					'id' 		=> 'background-imageframe-link',
					'type' 		=> 'color',
					'title'		=> 'Image Frame | Link background',
					'desc'		=> 'This is also Image Frame Hover Link color',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'color-imageframe-link',
					'type' 		=> 'color',
					'title'		=> 'Image Frame | Link color',
					'desc'		=> 'This is also Image Frame Hover Link background',
					'std' 		=> '#ffffff',
				),

				array(
					'id' 		=> 'color-imageframe-mask',
					'type' 		=> 'color',
					'title'		=> 'Image Frame | Mask color',
					'desc'		=> 'Mask has predefined opacity 0.4',
					'std' 		=> '#ffffff',
				),

				// inline shortcodes
				array(
					'id' 		=> 'colors-info-inline-shortcodes',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Inline Shortcodes',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'background-highlight',
					'type' 		=> 'color',
					'title' 	=> 'Dropcap & Highlight background',
					'std' 		=> '#0095eb'
				),

				array(
					'id' 		=> 'color-hr',
					'type' 		=> 'color',
					'title' 	=> 'Hr color',
					'desc' 		=> 'Dots, ZigZag & Theme Color',
					'std' 		=> '#0095eb'
				),

				array(
					'id' 		=> 'color-list',
					'type' 		=> 'color',
					'title' 	=> 'List color',
					'desc' 		=> 'Ordered, Unordered & Bullets List',
					'std' 		=> '#737E86'
				),

				array(
					'id' 		=> 'color-note',
					'type' 		=> 'color',
					'title' 	=> 'Note color',
					'desc' 		=> 'eg. Blog meta, Filters, Widgets meta',
					'std' 		=> '#a8a8a8'
				),

				// section
				array(
					'id' 		=> 'colors-info-section',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Section',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'background-highlight-section',
					'type' 		=> 'color',
					'title' 	=> 'Highlight Section background',
					'std' 		=> '#0095eb'
				),

			),
		);

		// Footer --------------------------------------------
		$sections['colors-footer'] = array(
			'title' => 'Footer',
			'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields' => array(

				array(
					'id' 		=> 'color-footer-theme',
					'type' 		=> 'color',
					'title' 	=> 'Footer Theme color',
					'sub_desc' 	=> 'Color for icons and other small elements',
					'desc' 		=> 'You can use <strong>.themecolor</strong> and <strong>.themebg</strong> classes in your footer content',
					'std' 		=> '#0095eb'
				),

				array(
					'id' 		=> 'background-footer',
					'type' 		=> 'color',
					'title' 	=> 'Footer background',
					'std' 		=> '#292b33',
				),

				array(
					'id' 		=> 'color-footer',
					'type' 		=> 'color',
					'title' 	=> 'Footer Text color',
					'std' 		=> '#cccccc',
				),

				array(
					'id' 		=> 'color-footer-heading',
					'type' 		=> 'color',
					'title' 	=> 'Footer Heading color',
					'std' 		=> '#ffffff',
				),

				array(
					'id' 		=> 'color-footer-note',
					'type' 		=> 'color',
					'title' 	=> 'Footer Note color',
					'desc' 		=> 'eg. Widget meta',
					'std' 		=> '#a8a8a8',
				),

				// link
				array(
					'id' 		=> 'colors-info-footer-link',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Link',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'color-footer-a',
					'type' 		=> 'color',
					'title' 	=> 'Link | color',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'color-footer-a-hover',
					'type' 		=> 'color',
					'title' 	=> 'Link | hover color',
					'std' 		=> '#007cc3',
				),

				// social
				array(
					'id' 		=> 'colors-info-footer-social',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Social',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'color-footer-social',
					'type' 		=> 'color',
					'title' 	=> 'Social Icon | Color',
					'desc' 		=> 'This is also Social Menu Bottom link color',
					'std' 		=> '#65666C',
				),

				array(
					'id' 		=> 'color-footer-social-hover',
					'type' 		=> 'color',
					'title' 	=> 'Social Icon | Hover color',
					'desc' 		=> 'This is also Social Menu Bottom link hover color',
					'std' 		=> '#FFFFFF',
				),

				// social
				array(
					'id' 			=> 'colors-info-footer-backtotop',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=>  'Back to Top & Popup Contact Form',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 			=> 'color-footer-backtotop',
					'type' 		=> 'color',
					'title' 	=>  'Button color',
					'std' 		=> '#65666C',
				),

				array(
					'id' 			=> 'background-footer-backtotop',
					'type' 		=> 'color',
					'title' 	=>  'Button background',
					'sub_desc'=>  'optional',
					'std' 		=> '',
				),

			),
		);

		// Sliding Top --------------------------------------------
		$sections['colors-sliding-top'] = array(
			'title' => 'Sliding Top',
			'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields' => array(

				array(
					'id' 		=> 'color-sliding-top-theme',
					'type' 		=> 'color',
					'title' 	=> 'Sliding Top Theme color',
					'sub_desc' 	=> 'Color for icons and other small elements',
					'desc' 		=> 'You can use <strong>.themecolor</strong> and <strong>.themebg</strong> classes in your Sliding Top content',
					'std' 		=> '#0095eb'
				),

				array(
					'id' 		=> 'background-sliding-top',
					'type' 		=> 'color',
					'title' 	=> 'Sliding Top background',
					'std' 		=> '#545454',
				),

				array(
					'id' 		=> 'color-sliding-top',
					'type' 		=> 'color',
					'title' 	=> 'Sliding Top Text color',
					'std' 		=> '#cccccc',
				),

				array(
					'id' 		=> 'color-sliding-top-a',
					'type' 		=> 'color',
					'title' 	=> 'Sliding Top Link color',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'color-sliding-top-a-hover',
					'type' 		=> 'color',
					'title' 	=> 'Sliding Top Hover Link color',
					'std' 		=> '#007cc3',
				),

				array(
					'id' 		=> 'color-sliding-top-heading',
					'type' 		=> 'color',
					'title' 	=> 'Sliding Top Heading color',
					'std' 		=> '#ffffff',
				),

				array(
					'id' 		=> 'color-sliding-top-note',
					'type' 		=> 'color',
					'title' 	=> 'Sliding Top Note color',
					'desc' 		=> 'eg. Widget meta',
					'std' 		=> '#a8a8a8',
				),

			),
		);

		// Headings --------------------------------------------
		$sections['headings'] = array(
			'title' => 'Headings',
			'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields' => array(

				array(
					'id' 		=> 'color-h1',
					'type' 		=> 'color',
					'title' 	=> 'Heading H1 color',
					'std' 		=> '#161922'
				),

				array(
					'id' 		=> 'color-h2',
					'type' 		=> 'color',
					'title' 	=> 'Heading H2 color',
					'std' 		=> '#161922'
				),

				array(
					'id' 		=> 'color-h3',
					'type' 		=> 'color',
					'title' 	=> 'Heading H3 color',
					'std' 		=> '#161922'
				),

				array(
					'id' 		=> 'color-h4',
					'type' 		=> 'color',
					'title' 	=> 'Heading H4 color',
					'std' 		=> '#161922'
				),

				array(
					'id' 		=> 'color-h5',
					'type' 		=> 'color',
					'title' 	=> 'Heading H5 color',
					'std' 		=> '#161922'
				),

				array(
					'id' 		=> 'color-h6',
					'type' 		=> 'color',
					'title' 	=> 'Heading H6 color',
					'std' 		=> '#161922'
				),

			),
		);

		// Shortcodes --------------------------------------------
		$sections['colors-shortcodes'] = array(
			'title' => 'Shortcodes',
			'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields' => array(

				array(
					'id' 		=> 'color-tab-title',
					'type' 		=> 'color',
					'title'		=> 'Accordion & Tabs Active Title color',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'color-blockquote',
					'type' 		=> 'color',
					'title'		=> 'Blockquote color',
					'std' 		=> '#444444',
				),

				array(
					'id' 		=> 'color-contentlink',
					'type' 		=> 'color',
					'title'		=> 'Content Link | Icon color',
					'desc'		=> 'This is also Content Link Hover Border',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'color-counter',
					'type' 		=> 'color',
					'title'		=> 'Counter Icon | color',
					'desc'		=> 'This is also Chart Progress color',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'background-getintouch',
					'type' 		=> 'color',
					'title'		=> 'Get in Touch background',
					'desc'		=> 'This is also Infobox background',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'color-iconbar',
					'type' 		=> 'color',
					'title'		=> 'Icon Bar Hover Icon color',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'color-iconbox',
					'type' 		=> 'color',
					'title'		=> 'Icon Box Icon color',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'color-list-icon',
					'type' 		=> 'color',
					'title'		=> 'List & Feature List Icon color',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'color-pricing-price',
					'type' 		=> 'color',
					'title'		=> 'Pricing Box | Price color',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'background-pricing-featured',
					'type' 		=> 'color',
					'title'		=> 'Pricing Box | Featured background',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'background-progressbar',
					'type' 		=> 'color',
					'title'		=> 'Progress Bar background',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'color-quickfact-number',
					'type' 		=> 'color',
					'title'		=> 'Quick Fact Number color',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'background-slidingbox-title',
					'type' 		=> 'color',
					'title'		=> 'Sliding Box Title background',
					'std' 		=> '#0095eb',
				),

				array(
					'id' 		=> 'background-trailer-subtitle',
					'type' 		=> 'color',
					'title'		=> 'Trailer Box Subtitle background',
					'std' 		=> '#0095eb',
				),

			),
		);

		// Forms --------------------------------------------
		$sections['colors-forms'] = array(
			'title'		=>  'Forms',
			'icon'		=> MFN_OPTIONS_URI. 'img/icons/sub.png',
			'fields' 	=> array(

				// Input, Select & Textarea
				array(
					'id' 		=> 'form-info-input',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=>  'Input, Select & Textarea',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'color-form',
					'type' 		=> 'color',
					'title'		=>  'Text color',
					'std' 		=> '#626262',
				),

				array(
					'id' 		=> 'background-form',
					'type' 		=> 'color',
					'title'		=>  'Background',
					'std' 		=> '#FFFFFF',
				),

				array(
					'id' 		=> 'border-form',
					'type' 		=> 'color',
					'title'		=>  'Border color',
					'std' 		=> '#EBEBEB',
				),

				array(
					'id' 		=> 'color-form-placeholder',
					'type' 		=> 'color',
					'title'		=>  'Placeholder color',
					'desc'		=>  'Works only in modern browsers',
					'std' 		=> '#929292',
				),

				// Focus
				array(
					'id' 		=> 'form-info-focus',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=>  'Focus',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'color-form-focus',
					'type' 		=> 'color',
					'title'		=>  'Text color',
					'std' 		=> '#1982c2',
				),

				array(
					'id' 		=> 'background-form-focus',
					'type' 		=> 'color',
					'title'		=>  'Background',
					'std' 		=> '#e9f5fc',
				),

				array(
					'id' 		=> 'border-form-focus',
					'type' 		=> 'color',
					'title'		=>  'Border color',
					'std' 		=> '#d5e5ee',
				),

				array(
					'id' 		=> 'color-form-placeholder-focus',
					'type' 		=> 'color',
					'title'		=>  'Placeholder color',
					'desc'		=>  'Works only in modern browsers',
					'std' 		=> '#929292',
				),

				// Advanced
				array(
					'id' 		=> 'form-info-advanced',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=>  'Advanced',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'form-border-width',
					'type' 		=> 'text',
					'title' 	=>  'Border width',
					'sub_desc' 	=>  'default: 1px',
					'desc' 		=>  'Use value with <b>px</b><br />Example: <b>1px 1px 2px 1px</b>',
					'class' 	=> 'small-text',
				),

				array(
					'id' 		=> 'form-transparent',
					'type' 		=> 'sliderbar',
					'title' 	=>  'Background Transparency (alpha)',
					'sub_desc' 	=>  '0 = transparent, 100 = solid',
					'param'	 	=> array(
						'min' 		=> 0,
						'max' 		=> 100,
					),
					'std' 		=> '100',
				),

			),
		);

		// Font Family --------------------------------------------
		$sections['font-family'] = array(
			'title' => 'Family',
			'fields' => array(

				array(
					'id' 		=> 'font-info-family',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Font Family',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'font-content',
					'type' 		=> 'font_select',
					'title' 	=> 'Content',
					'sub_desc'	=> 'All theme texts except headings and menu',
					'std' 		=> 'Roboto'
				),

				array(
					'id' 		=> 'font-menu',
					'type' 		=> 'font_select',
					'title' 	=> 'Main Menu',
					'sub_desc' 	=> 'Header menu',
					'std' 		=> 'Roboto'
				),

				array(
					'id' 		=> 'font-title',
					'type' 		=> 'font_select',
					'title' 	=> 'Page Title',
					'std' 		=> 'Lora'
				),

				array(
					'id' 		=> 'font-headings',
					'type' 		=> 'font_select',
					'title' 	=> 'Big Headings',
					'sub_desc' 	=> 'H1, H2, H3 & H4 headings',
					'std' 		=> 'Roboto'
				),

				array(
					'id' 		=> 'font-headings-small',
					'type' 		=> 'font_select',
					'title' 	=> 'Small Headings',
					'sub_desc' 	=> 'H5 & H6 headings',
					'std' 		=> 'Roboto'
				),

				array(
					'id' 		=> 'font-blockquote',
					'type' 		=> 'font_select',
					'title' 	=> 'Blockquote',
					'std' 		=> 'Roboto'
				),

				array(
					'id' 		=> 'font-decorative',
					'type' 		=> 'font_select',
					'title' 	=> 'Decorative',
					'sub_desc' 	=> 'Digits in some items',
					'desc' 		=> 'eg. Chart Box, Counter, How it Works, Quick Fact, Single Product Price',
					'std' 		=> 'Roboto'
				),

				array(
					'id' 		=> 'font-info-google',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Google Fonts',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'font-weight',
					'type' 		=> 'checkbox',
					'title' 	=> 'Google Fonts Weight & Style',
					'sub_desc' 	=> 'Impact on page <b>load time</b>',
					'desc' 		=> 'Some of the fonts in the Google Fonts Directory support multiple styles. For a complete list of available font subsets please see <a href="https://www.google.com/webfonts" target="_blank">Google Web Fonts</a>',
					'options' 	=> array(
						'100'		=>  '100 Thin',
						'100italic'	=>  '100 Thin Italic',
						'200'		=>  '200 Extra-Light',
						'200italic'	=>  '200 Extra-Light Italic',
						'300'		=>  '300 Light',
						'300italic'	=>  '300 Light Italic',
						'400'		=>  '400 Regular',
						'400italic'	=>  '400 Regular Italic',
						'500'		=>  '500 Medium',
						'500italic'	=>  '500 Medium Italic',
						'600'		=>  '600 Semi-Bold',
						'600italic'	=>  '600 Semi-Bold Italic',
						'700'		=>  '700 Bold',
						'700italic'	=>  '700 Bold Italic',
						'800'		=>  '800 Extra-Bold',
						'800italic'	=>  '800 Extra-Bold Italic',
						'900'		=>  '900 Black',
						'900italic'	=>  '900 Black Italic',
					),
					'class'		=> 'float-left',
					'std'		=> array(
						'300' 		=> '300',
						'400' 		=> '400',
						'400italic' => '400italic',
						'500'		=> '500',
						'700'		=> '700',
						'700italic' => '700italic',
					),
				),

				array(
					'id' 		=> 'font-subset',
					'type' 		=> 'text',
					'title' 	=> 'Google Fonts Subset',
					'sub_desc' 	=> 'Specify which subsets should be downloaded. Multiple subsets should be separated with coma (,)',
					'desc' 		=> 'Some of the fonts in the Google Fonts Directory support multiple scripts (like Latin and Cyrillic for example). For a complete list of available font subsets please see <a href="https://www.google.com/webfonts" target="_blank">Google Web Fonts</a>',
					'class' 	=> 'small-text'
				),

			),
		);

		// Content Font Size --------------------------------------------
		$sections['font-size'] = array(
			'title' => 'Size & Style',
			'fields' => array(

				array(
					'id' 		=> 'font-size-info-general',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'General',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'font-size-content',
					'type' 		=> 'typography',
					'title' 	=>  'Content',
					'sub_desc' 	=>  'All theme texts<br/>default: 14',
					'desc' 		=>  'Some of Google Fonts support multiple weights & styles. Include them in <b>Theme Options > Fonts > Family > Google Fonts Weight & Style</b>',
					'std' 		=> array(
						'size' 				=> 14,
						'line_height' 		=> 25,
						'weight_style' 		=> '400',
						'letter_spacing' 	=> 0,
					),
				),

				array(
					'id' 		=> 'font-size-big',
					'type' 		=> 'typography',
					'title' 	=> 'p.big',
					'sub_desc' 	=> 'class="big"<br />default: 16',
					'std' 		=> array(
						'size' 				=> 16,
						'line_height' 		=> 28,
						'weight_style' 		=> '400',
						'letter_spacing' 	=> 0,
					),
				),

				array(
					'id' 		=> 'font-size-menu',
					'type' 		=> 'typography',
					'title' 	=>  'Main Menu',
					'sub_desc' 	=>  'First level of Main Menu<br/>default: 15',
					'disable' 	=> 'line_height',
					'std' 		=> array(
						'size' 				=> 15,
						'line_height' 		=> 0,
						'weight_style' 		=> '400',
						'letter_spacing' 	=> 0,
					),
				),

				array(
					'id' 		=> 'font-size-title',
					'type' 		=> 'typography',
					'title' 	=> 'Page Title',
					'sub_desc' 	=> 'default: 30',
					'std' 		=> array(
						'size' 				=> 30,
						'line_height' 		=> 35,
						'weight_style' 		=> '400italic',
						'letter_spacing' 	=> 1,
					),
				),

				array(
					'id' 		=> 'font-size-info-heading',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Heading',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'font-size-h1',
					'type' 		=> 'typography',
					'title' 	=> 'H1',
					'sub_desc' 	=> 'default: 48',
					'std' 		=> array(
						'size' 				=> 48,
						'line_height' 		=> 50,
						'weight_style' 		=> '400',
						'letter_spacing' 	=> 0,
					),
				),

				array(
					'id' 		=> 'font-size-h2',
					'type' 		=> 'typography',
					'title' 	=> 'H2',
					'sub_desc' 	=> 'default: 30',
					'std' 		=> array(
						'size' 				=> 30,
						'line_height' 		=> 34,
						'weight_style' 		=> '300',
						'letter_spacing' 	=> 0,
					),
				),

				array(
					'id' 		=> 'font-size-h3',
					'type' 		=> 'typography',
					'title' 	=> 'H3',
					'sub_desc' 	=> 'default: 25',
					'std' 		=> array(
						'size' 				=> 25,
						'line_height' 		=> 29,
						'weight_style' 		=> '300',
						'letter_spacing' 	=> 0,
					),
				),

				array(
					'id' 		=> 'font-size-h4',
					'type' 		=> 'typography',
					'title' 	=> 'H4',
					'sub_desc' 	=> 'default: 21',
					'std' 		=> array(
						'size' 				=> 21,
						'line_height' 		=> 25,
						'weight_style' 		=> '500',
						'letter_spacing' 	=> 0,
					),
				),

				array(
					'id' 		=> 'font-size-h5',
					'type' 		=> 'typography',
					'title' 	=> 'H5',
					'sub_desc' 	=> 'default: 15',
					'std' 		=> array(
						'size' 				=> 15,
						'line_height' 		=> 25,
						'weight_style' 		=> '700',
						'letter_spacing' 	=> 0,
					),
				),

				array(
					'id' 		=> 'font-size-h6',
					'type' 		=> 'typography',
					'title' 	=> 'H6',
					'sub_desc' 	=> 'default: 14',
					'std' 		=> array(
						'size' 				=> 14,
						'line_height' 		=> 25,
						'weight_style' 		=> '400',
						'letter_spacing' 	=> 0,
					),
				),

				array(
					'id' 		=> 'font-size-info-advanced',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=> 'Advanced',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 		=> 'font-size-single-intro',
					'type' 		=> 'typography',
					'title' 	=> 'Single Post | Intro',
					'sub_desc' 	=> 'default: 70',
					'std' 		=> array(
						'size' 				=> 70,
						'line_height' 		=> 70,
						'weight_style' 		=> '400',
						'letter_spacing' 	=> 0,
					),
				),

			),
		);

		// Font Custom --------------------------------------------
		$sections['font-custom'] = array(
			'title' =>  'Custom',
			'fields' => array(

				array(
					'id' 			=> 'fonts-info-custom',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=>  'Use below fields if you want to use webfonts directly from your server.',
					'class' 	=> 'mfn-info desc',
				),

				// font 1
				array(
					'id' 			=> 'fonts-info-font1',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=>  'Font 1',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 			=> 'font-custom',
					'type' 		=> 'text',
					'title' 	=>  'Name',
					'sub_desc'=>  'Please use only letters or spaces, eg. Custom Font 1',
					'desc' 		=>  'Name for Custom Font uploaded below.<br />Font will show on fonts list after <strong>click the Save Changes</strong> button.' ,
					'class' 	=> 'small-text',
				),

				array(
					'id' 			=> 'font-custom-woff',
					'type' 		=> 'uploadframe',
					'title' 	=>  '.woff',
					'sub_desc'=>  'recommended',
					'class'		=> 'font',
				),

				array(
					'id' 			=> 'font-custom-ttf',
					'type' 		=> 'uploadframe',
					'title' 	=>  '.ttf',
					'sub_desc'=>  'optional',
					'desc'		=>  'WordPress blocks .ttf upload by default. Please use <a target="_blank" href="plugin-install.php?s=Disable+Real+MIME+Check&tab=search&type=term">Disable Real MIME Check</a> plugin.',
					'class'		=> 'font',
				),

				// font 2
				array(
					'id' 			=> 'fonts-info-font2',
					'type' 		=> 'info',
					'title' 	=> '',
					'desc' 		=>  'Font 2',
					'class' 	=> 'mfn-info',
				),

				array(
					'id' 			=> 'font-custom2',
					'type' 		=> 'text',
					'title' 	=> 'Name',
					'sub_desc'=>  'Please use only letters or spaces, eg. Custom Font 2',
					'desc' 		=>  'Name for Custom Font uploaded below.<br />Font will show on fonts list after <strong>click the Save Changes</strong> button.' ,
					'class' 	=> 'small-text',
				),

				array(
					'id' 			=> 'font-custom2-woff',
					'type' 		=> 'uploadframe',
					'title' 	=> '.woff',
					'sub_desc'=>  'recommended',
					'class'		=> 'font',
				),

				array(
					'id' 			=> 'font-custom2-ttf',
					'type' 		=> 'uploadframe',
					'title' 	=>  '.ttf',
					'sub_desc'=>  'optional',
					'desc'		=>  'WordPress blocks .ttf upload by default. Please use <a target="_blank" href="plugin-install.php?s=Disable+Real+MIME+Check&tab=search&type=term">Disable Real MIME Check</a> plugin.',
					'class'		=> 'font',
				),

			),
		);

		// Custom CSS & JS ========================================================================

		// CSS --------------------------------------------
		$sections['css'] = array(
			'title' => 'CSS',
			'fields' => array(

				array(
					'id' 		=> 'custom-css',
					'type' 		=> 'textarea',
					'title' 	=> 'Custom CSS',
					'sub_desc' 	=> 'Paste your custom CSS code here',
					'class' 	=> 'custom-css',
				),

			),
		);

		// JS --------------------------------------------
		$sections['js'] = array(
			'title' => 'JS',
			'fields' => array(

				array(
					'id' 		=> 'custom-js',
					'type' 		=> 'textarea',
					'title' 	=> 'Custom JS',
					'sub_desc' 	=> 'Paste your custom JS code here',
					'desc' 		=> 'To use jQuery code wrap it into <strong>jQuery(function($){ ... });</strong>',
				),

			),
		);

		global $MFN_Options;
		$MFN_Options = new MFN_Options( $menu, $sections );
	}
}
// add_action('init', 'mfn_opts_setup', 0);
mfn_opts_setup();


/**
 * This is used to return option value from the options array
 */
if( ! function_exists( 'mfn_opts_get' ) )
{
	function mfn_opts_get( $opt_name, $default = null ){
		global $MFN_Options;
		return $MFN_Options->get( $opt_name, $default );
	}
}
//var_dump(mfn_opts_get( $opt_name, $default = null ));

/**
 * This is used to echo option value from the options array
 */
if( ! function_exists( 'mfn_opts_show' ) )
{
	function mfn_opts_show( $opt_name, $default = null ){
		global $MFN_Options;
		$option = $MFN_Options->get( $opt_name, $default );
		if( ! is_array( $option ) ){
			echo $option;
		}
	}
}


/**
 * Add new mimes for custom font upload
 */
if( ! function_exists( 'mfn_upload_mimes' ) )
{
	function mfn_upload_mimes( $existing_mimes = array() ){
		$existing_mimes['woff'] = 'font/woff';
		$existing_mimes['ttf'] 	= 'font/ttf';
		$existing_mimes['svg'] 	= 'font/svg';
		$existing_mimes['eot'] 	= 'font/eot';
		return $existing_mimes;
	}
}
mfn_upload_mimes();
