<?php

class Tree {

	var $data;

	/**
	 * Add an item
	 *
	 * @param int $id 			ID of the item
	 * @param int $parent 		parent ID of the item
	 * @param string $li_attr 	attributes for <li>
	 * @param string $label		text inside <li></li>
	 */
	function add_row($id, $parent, $li_attr, $label) {
		$this->data[$parent][] = array('id' => $id, 'li_attr' => $li_attr, 'label' => $label);
	}

	function generate_list($ul_attr = '') {
	
		return $this->ul(0, $ul_attr);
	}
	
	function options($row1) {
		$options = unserialize($row1['options']);
	//var_dump($options);
			$container_class = 
            ' primary_style-' . $options['primary_style'] . 
            ' icons-' . $options['first_level_icons_position'] . 
           	' first-lvl-align-' . $options['first_level_item_align'] . 
           	' first-lvl-separator-' . $options['first_level_separator'] . 
           	' language_direction-' . $options['language_direction'] . 
           	' direction-' . $options['direction'] . 
			' responsive-' . ( ( isset( $options['responsive_styles'] ) ) ? 'enable' : 'disable' ) .
			' mobile_minimized-' . ( ( isset( $options['mobile_minimized'] ) ) ? 'enable' : 'disable' ) .
           	' fullwidth-' . ( ( isset( $options['fullwidth_container'] ) ) ? 'enable' : 'disable' ) .
			' pushing_content-' . ( ( isset( $options['pushing_content'] ) )  ? 'enable' : 'disable' ) .
			' dropdowns_trigger-' . $options['dropdowns_trigger'] .
			' coercive_styles-' . ( ( isset( $options['coercive_styles'] ) ) ? 'enable' : 'disable' ) .
			' indefinite_location_mode-' . ( ( isset( $options['indefinite_location_mode'] ) ) ? 'enable' : 'disable' ) .

			' dropdowns_animation-' . $options['dropdowns_animation']
			;
			if ( isset( $options['included_components'] ) && is_array( $options['included_components'] )  && in_array( 'company_logo', $options['included_components'] ) ) {
				$container_class .= ' include-logo';
			} else {
				$container_class .= ' no-logo';
			}
			if ( isset( $options['included_components'] ) && is_array( $options['included_components'] )  && in_array( 'search_box', $options['included_components'] ) ) {
				$container_class .= ' include-search';
			} else {
				$container_class .= ' no-search';
			}
			if ( isset( $options['included_components'] ) && is_array( $options['included_components'] )  && in_array( 'login', $options['included_components'] ) ) {
				$container_class .= ' include-login';
			} else {
				$container_class .= ' no-login';
			}
			if ( isset( $options['included_components'] ) && is_array( $options['included_components'] )  && in_array( 'buddypress', $options['included_components'] ) ) {
				$container_class .= ' include-buddypress';
			} else {
				$container_class .= ' no-buddypress';
			}
			if ( isset( $options['included_components'] ) && is_array( $options['included_components'] )  && in_array( 'woo_cart', $options['included_components'] ) ) {
				$container_class .= ' include-woo_cart';
			} else {
				$container_class .= ' no-woo_cart';
			}
				

				$datasticky = ( ( $options['sticky_status'] = '1' && $options['sticky_offset'] > 0 )  ? 'data-sticky="1" data-stickyoffset="' . $options["sticky_offset"] . '' : '' );
			if( ( isset( $options['included_components'] ) && is_array( $options['included_components'] )  && in_array( 'company_logo', $options['included_components'] ) ) && $options['logo_src'] ) {
					$logo = '<a class="logo_link" href="" title="' . $row1['title'] . '">';
					$logo .= '<img src="' . str_replace( array('%','$'), array('',''), $options['logo_src'] ) . '" alt="' . $row1['title'] . '" />';
					$logo .= '</a>';
			}else{$logo = '';}	
	//var_dump($container_class);
			$output = '<div id="mega_main_menu" class="menu' . $row1['id'] . ' ' . $container_class . ' version-2-0-7 mega_main mega_main_menu" style="z-index: 990;">
	<div class="menu_holder" ' . $datasticky . '">
	<div class="mmm_fullwidth_container"></div><!-- class="fullwidth_container" -->
		<div class="menu_inner">
			<span class="nav_logo">
				'.$logo.'
				<a class="mobile_toggle">
					<span class="mobile_button">
						'.$options['mobile_label'].' &nbsp;
						<span class="symbol_menu">≡</span>
						<span class="symbol_cross">╳</span>
					</span><!-- class="mobile_button" -->
				</a>
			</span><!-- /class="nav_logo" -->';

	return $output;
	}

	/**
	 * Recursive method for generating nested lists
	 *
	 * @param int $parent
	 * @param string $attr
	 * @return string
	 */
	function ul($parent = 0, $attr = '') {
		static $i = 1;
		$indent = str_repeat("\t\t", $i);
		if (isset($this->data[$parent])) {
			$extensions = '';
			if ($attr) {
				$options = unserialize($attr);
				
				if( isset( $options['included_components'] ) && is_array( $options['included_components'] )  && in_array( 'search_box', $options['included_components'] ) ) {
				$extensions .= '
				
				<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-12 default_dropdown additional_style_1 drop_to_right submenu_default_width columns1 nav_search_box">
    <form method="get" id="mega_main_menu_searchform" action="http://localhost/xoops25777/search.php">
							<i class="im-icon-search-3 icosearch"></i>
							<input type="submit" class="submit" name="submit" id="searchsubmit" value="Search">
							<input type="text" class="field" name="s" id="s">
						</form>
						
						</li><!-- class="nav_search_box" -->
				
				';

				}
				if( isset( $options['included_components'] ) && is_array( $options['included_components'] )  && in_array( 'register', $options['included_components'] ) ) {
				$extensions .= '
				<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-12 default_dropdown additional_style_1 drop_to_right submenu_default_width columns1 nav_login">
    <a title="Register" href="" class="item_link  with_icon" tabindex="16"><i class="im-icon-screen"></i><span class="link_content"><span class="link_text">Register</span></span></a>
</li><!-- class="nav_register" -->';
				}
				if( isset( $options['included_components'] ) && is_array( $options['included_components'] )  && in_array( 'login', $options['included_components'] ) ) {
				$extensions .= '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-12 default_dropdown additional_style_1 drop_to_right submenu_default_width columns1 nav_login">
    <a title="login" href="" class="item_link  with_icon" tabindex="16"><i class="im-icon-screen"></i><span class="link_content"><span class="link_text">Login</span></span></a>
</li><!-- class="nav_login" -->';
				}

				if( isset( $options['included_components'] ) && is_array( $options['included_components'] )  && in_array( 'social', $options['included_components'] ) ) {
				$extensions .= '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-12 default_dropdown additional_style_1 drop_to_right submenu_default_width columns1 nav_login">
    <a title="Social" href="" class="item_link  with_icon" tabindex="16"><i class="im-icon-screen"></i><span class="link_content"><span class="link_text">Social</span></span></a>
</li><!-- class="nav_social" -->';

				}
				if( isset( $options['included_components'] ) && is_array( $options['included_components'] )  && in_array( 'buddypress', $options['included_components'] ) ) {
				$extensions .= '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-12 default_dropdown additional_style_1 drop_to_right submenu_default_width columns1 nav_login">
    <a title="buddypress" href="" class="item_link  with_icon" tabindex="16"><i class="im-icon-screen"></i><span class="link_content"><span class="link_text">buddypress</span></span></a>
</li><!-- class="nav_buddypress" -->';


				}
				if( isset( $options['included_components'] ) && is_array( $options['included_components'] )  && in_array( 'woo_cart', $options['included_components'] ) ) {
				$extensions .= '<li class="nav_login">
								<span id="top-menu-login" class="top-menu-login" style="font-size: medium;">woo_cart</span>
								</li><!-- class="nav_login" -->';

				}
				if( isset( $options['included_components'] ) && is_array( $options['included_components'] )  && in_array( 'date', $options['included_components'] ) ) {
				$date = strftime("%A %d %B %Y");
				$extensions .= '
				<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-12 default_dropdown additional_style_1 drop_to_right submenu_default_width columns1 nav_login">
    <a title="date" href="" class="item_link  with_icon" tabindex="16"><i class="im-icon-screen"></i><span class="link_content"><span class="link_text">'.$date.'</span></span></a>
 </li><!-- class="nav_date" -->';

				}
			}
			$html = "\n$indent";
			$html .= "<ul   id='mega_main_menu_ul' class='mega_main_menu_ul'>";
			$i++;
			foreach ($this->data[$parent] as $row) {
				if($row['li_attr']){
				$class_dropdown = $row['li_attr'];
				}else{
				$class_dropdown = 'default_dropdown';
				}
			//var_dump($row['li_attr']);
				$child = $this->li($row['id']);
				$child1 = $this->ul($row['id']);
				$html .= "\n\t$indent";
				$html .= '<li  id="menu-item-'.$row["id"].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-'.$row["id"].' '.$class_dropdown.' additional_style_1 drop_to_right submenu_default_width columns2">';
				$html .= $row['label'];
				if ($child1) {
					$i--;
					$html .= $child;
					$html .= "\n\t$indent";
				}
				$html .= '</li>';
			}
				$html .= $extensions;
						
			$html .= "\n$indent</ul>";
			return $html;
		} else {
			return false;
		}
	}
	
	function li($parent = 0, $attr = '') {
		static $i = 1;
		$indent = str_repeat("\t\t", $i);
		if (isset($this->data[$parent])) {
			if ($attr) {
				$attr = ' ' . $attr;
			}
			$html = "\n$indent";
			$html .= "<ul class='mega_dropdown'$attr>";
			$i++;
			foreach ($this->data[$parent] as $row) {
			//var_dump($row);
				$child = $this->li($row['id']);
				$html .= "\n\t$indent";
				$html .= '<li  id="menu-item-'.$row["id"].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-'.$row["id"].' default_dropdown additional_style_1 drop_to_right submenu_default_width columns2"'. $row['li_attr'] . '>';
				$html .= $row['label'];
				if ($child) {
					$i--;
					$html .= $child;
					$html .= "\n\t$indent";
				}
				$html .= '</li>';
			}

			$html .= "\n$indent</ul>";
			return $html;
		} else {
			return false;
		}
	}
						
	/**
	 * Clear the temporary data
	 *
	 */
	function clear() {
		$this->data = array();
	}
}