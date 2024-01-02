<?php
/**
 * Custom meta fields | Frontend
 *
 * Print Builder Items
 *
 * Do shortcodes connected with items
 */

if( ! function_exists( 'mfn_print_accordion' ) )
{
	/**
	 * [accordion]
	 */
	function mfn_print_accordion( $item ) {
		return sc_accordion( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_article_box' ) )
{
	/**
	 * [article_box]
	 */
	function mfn_print_article_box( $item ) {
		return sc_article_box( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_before_after' ) )
{
	/**
	 * [before_after]
	 */
	function mfn_print_before_after( $item ) {
		return sc_before_after( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_blockquote' ) )
{
	/**
	 * [blockquote]
	 */
	function mfn_print_blockquote( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_blockquote( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_button' ) )
{
	/**
	 * [button]
	 */
	function mfn_print_button( $item ) {
		return sc_button( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_call_to_action' ) )
{
	/**
	 * [call_to_action]
	 */
	function mfn_print_call_to_action( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_call_to_action( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_chart' ) )
{
	/**
	 * [chart]
	 */
	function mfn_print_chart( $item ) {
		return sc_chart( $item['fields'] );
	}
}


if( ! function_exists( 'mfn_print_code' ) )
{
	/**
	 * [code]
	 */
	function mfn_print_code( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_code( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_column' ) )
{
	/**
	 * [column]
	 */
	function mfn_print_column( $item ) {
		if( ! key_exists( 'content', $item['fields']) ) $item['fields']['content'] = '';

		$column_class = '';
		$column_attr 	= '';
		$style 				= '';

		// align
		if( key_exists( 'align', $item['fields']) && $item['fields']['align'] ){
			$column_class	.= ' align_'. $item['fields']['align'];
		}
		if( ! empty ( $item['fields']['align-mobile'] ) ){
			$column_class	.= ' mobile_align_'. $item['fields']['align-mobile'];
		}

		// animate
		if( key_exists('animate', $item['fields']) && $item['fields']['animate'] ){
			$column_class	.= ' animate';
			$column_attr	.= ' data-anim-type="'. $item['fields']['animate'] .'"';
		}

		// background
		if( key_exists('column_bg', $item['fields']) && $item['fields']['column_bg'] ){
			$style .= ' background-color:'. $item['fields']['column_bg'] .';';
		}
		if( key_exists('bg_image', $item['fields']) && $item['fields']['bg_image'] ){

			// background image
			$style .= ' background-image:url(\''. $item['fields']['bg_image'] .'\');';

			// background position
			if( key_exists('bg_position', $item['fields']) && $item['fields']['bg_position'] ){

				$bg_pos = $item['fields']['bg_position'];

				if( $bg_pos ){
					$background_attr = explode( ';', $bg_pos );
					$aBg[] 	= 'background-repeat:'. $background_attr[0];
					$aBg[] 	= 'background-position:'. $background_attr[1];
				}
				$background = implode('; ', $aBg );

				$style .= ' '. implode('; ', $aBg ) .';';

			}

			// background size
			if( isset( $item['fields']['bg_size'] ) && ( $item['fields']['bg_size'] != 'auto' ) ){
				$column_class .= ' bg-'. $item['fields']['bg_size'];
			}
		}

		// padding
		if( key_exists('padding', $item['fields']) && $item['fields']['padding'] ){
			$style .= ' padding:'. $item['fields']['padding'] .';';
		}

		// custom | style
		if( key_exists('style', $item['fields']) && $item['fields']['style'] ){
			$style .= ' '. $item['fields']['style'];
		}

		$out = '';
		$out .= '<div class="column_attr clearfix'. $column_class .'" '. $column_attr .' style="'. $style .'">';
			$out .= $item['fields']['content'];
		$out .= '</div>';
		return $out;
	}
}

if( ! function_exists( 'mfn_print_contact_box' ) )
{
	/**
	 * [contact_box]
	 */
	function mfn_print_contact_box( $item ) {
		return sc_contact_box( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_content' ) )
{
	/**
	 * [content]
	 */
	function mfn_print_content( $item ) {
		echo '<div class="the_content">';
			echo '<div class="the_content_wrapper">';
				the_content();
			echo '</div>';
		echo '</div>';
	}
}

if( ! function_exists( 'mfn_print_countdown' ) )
{
	/**
	 * [countdown]
	 */
	function mfn_print_countdown( $item ) {
		return sc_countdown( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_counter' ) )
{
	/**
	 * [counter]
	 */
	function mfn_print_counter( $item ) {
		return sc_counter( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_divider' ) )
{
	/**
	 * [divider]
	 */
	function mfn_print_divider( $item ) {
		return sc_divider( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_fancy_divider' ) )
{
	/**
	 * [fancy_divider]
	 */
	function mfn_print_fancy_divider( $item ) {
		return sc_fancy_divider( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_fancy_heading' ) )
{
	/**
	 * [fancy_heading]
	 */
	function mfn_print_fancy_heading( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_fancy_heading( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_faq' ) )
{
	/**
	 * [faq]
	 */
	function mfn_print_faq( $item ) {
		return sc_faq( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_feature_box' ) )
{
	/**
	 * [feature_box]
	 */
	function mfn_print_feature_box( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_feature_box( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_feature_list' ) )
{
	/**
	 * [feature_list]
	 */
	function mfn_print_feature_list( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_feature_list( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_flat_box' ) )
{
	/**
	 * [flat_box]
	 */
	function mfn_print_flat_box( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_flat_box( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_helper' ) )
{
	/**
	 * [helper]
	 */
	function mfn_print_helper( $item ) {
		return sc_helper( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_hover_box' ) )
{
	/**
	 * [hover_box]
	 */
	function mfn_print_hover_box( $item ) {
		return sc_hover_box( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_hover_color' ) )
{
	/**
	 * [hover_color]
	 */
	function mfn_print_hover_color( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_hover_color( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_how_it_works' ) )
{
	/**
	 * [how_it_works]
	 */
	function mfn_print_how_it_works( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_how_it_works( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_icon_box' ) )
{
	/**
	 * [icon_box]
	 */
	function mfn_print_icon_box( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_icon_box( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_image' ) )
{
	/**
	 * [image]
	 */
	function mfn_print_image( $item ) {
		return sc_image( $item['fields'] );
	}
}


if( ! function_exists( 'mfn_print_info_box' ) )
{
	/**
	 * [info_box]
	 */
	function mfn_print_info_box( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_info_box( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_list' ) )
{
	/**
	 * [list]
	 */
	function mfn_print_list( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_list( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_map_basic' ) )
{
	/**
	 * [map_basic]
	 */
	function mfn_print_map_basic( $item ) {
		return sc_map_basic( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_map' ) )
{
	/**
	 * [map]
	 */
	function mfn_print_map( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_map( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_opening_hours' ) )
{
	/**
	 * [opening_hours]
	 */
	function mfn_print_opening_hours( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		echo sc_opening_hours( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_our_team' ) )
{
	/**
	 * [our_team]
	 */
	function mfn_print_our_team( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_our_team( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_our_team_list' ) )
{
	/**
	 * [our_team_list]
	 */
	function mfn_print_our_team_list( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_our_team_list( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_photo_box' ) )
{
	/**
	 * [photo_box]
	 */
	function mfn_print_photo_box( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_photo_box( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_placeholder' ) )
{
	/**
	 * [placeholder]
	 */
	function mfn_print_placeholder( $item ) {
		return '<div class="placeholder">&nbsp;</div>';
	}
}

if( ! function_exists( 'mfn_print_pricing_item' ) )
{
	/**
	 * [pricing_item]
	 */
	function mfn_print_pricing_item( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_pricing_item( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_progress_bars' ) )
{
	/**
	 * [progress_bars]
	 */
	function mfn_print_progress_bars( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_progress_bars( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_promo_box' ) )
{
	/**
	 * [promo_box]
	 */
	function mfn_print_promo_box( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		echo sc_promo_box( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_quick_fact' ) )
{
	/**
	 * [quick_fact]
	 */
	function mfn_print_quick_fact( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		return sc_quick_fact( $item['fields'], $item['fields']['content'] );
	}
}


if( ! function_exists( 'mfn_print_sidebar_widget' ) )
{
	/**
	 * [sidebar_widget]
	 */
	function mfn_print_sidebar_widget( $item ) {
		echo sc_sidebar_widget( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_slider' ) )
{
	/**
	 * [slider]
	 */
	function mfn_print_slider( $item ) {
		return sc_slider( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_menu' ) )
{
	/**
	 * [slider]
	 */
	function mfn_print_menu( $item ) {
		return sc_menu( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_block_xoops' ) )
{
	/**
	 * [block_xoops]
	 */
	function mfn_print_block_xoops( $item ) {
		return sc_block_xoops( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_Blockcolumn' ) )
{
	/**
	 * [block_xoops]
	 */
	function mfn_print_Blockcolumn( $item ) {
		return sc_Blockcolumn( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_slider_plugin' ) )
{
	/**
	 * [slider_plugin]
	 */
	function mfn_print_slider_plugin( $item ) {
		echo sc_slider_plugin( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_sliding_box' ) )
{
	/**
	 * [sliding_box]
	 */
	function mfn_print_sliding_box( $item ) {
		echo sc_sliding_box( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_story_box' ) )
{
	/**
	 * [story_box]
	 */
	function mfn_print_story_box( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		echo sc_story_box( $item['fields'], $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_tabs' ) )
{
	/**
	 * [tabs]
	 */
	function mfn_print_tabs( $item ) {
		return sc_tabs( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_timeline' ) )
{
	/**
	 * [timeline]
	 */
	function mfn_print_timeline( $item ) {
		return sc_timeline( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_trailer_box' ) )
{
	/**
	 * [trailer_box]
	 */
	function mfn_print_trailer_box( $item ) {
		return sc_trailer_box( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_video' ) )
{
	/**
	 * [video]
	 */
	function mfn_print_video( $item ) {
		return sc_video( $item['fields'] );
	}
}

if( ! function_exists( 'mfn_print_visual' ) )
{
	/**
	 * [visual]
	 */
	function mfn_print_visual( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		echo do_shortcode( $item['fields']['content'] );
	}
}

if( ! function_exists( 'mfn_print_zoom_box' ) )
{
	/**
	 * [zoom_box]
	 */
	function mfn_print_zoom_box( $item ) {
		if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
		echo sc_zoom_box( $item['fields'], $item['fields']['content'] );
	}
}


if( ! function_exists( 'mfn_builder_print_content' ) )
{
	/**
	 * PRINT WordPress Editor Content
	 *
	 * @param int $post_id
	 * @param bool $content_field
	 */
	function mfn_builder_print_content( $post_id, $content_field = false ){

		$class = get_post_field( 'post_content', $post_id ) ? 'has_content' : 'no_content' ;

		echo '<div class="section the_content '. $class .'">';
		if( ! get_post_meta( $post_id, 'mfn-post-hide-content', true )){
			echo '<div class="section_wrapper">';
			echo '<div class="the_content_wrapper">';
			if( $content_field ){
				echo apply_filters( 'the_content', get_post_field( 'post_content', $post_id ) );
			} else {
				the_content();
			}
			echo '</div>';
			echo '</div>';
		}
		echo '</div>';
	}
}


if( ! function_exists( 'mfn_builder_print' ) )
{ global $xoTheme, $xoopsTpl;
	/**
	 * PRINT Muffin Builder
	 *
	 * @param int $post_id
	 * @param bool $content_field
	 */
	function mfn_builder_print( /*$mfn_items, $content_field = false*/ ){

		global $xoopsDB, $xoTheme;

		if ( $xoTheme->template->_tpl_vars[ 'xoops_dirname' ] == 'page' ){
			$op = isset($_GET['op']) ? $_GET['op'] : '';

			if ($op){
				//var_dump($xoTheme);
				$sqlq = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme' ) . ' WHERE conf_id=' . intval($op);
				$resultq = $xoopsDB -> query( $sqlq );
				$video_arrt = $xoopsDB -> fetchArray( $resultq );
				//var_dump($video_arrt['conf_value']);
			}else{
			}
		}elseif ( $xoTheme->template->_tpl_vars[ 'xoops_dirname' ] == 'system' ){
				if ( $xoTheme->contentTemplate == 'db:system_homepage.tpl' ){
					$form = 'system_homepage';
					$sqlq = " SELECT * FROM " . $xoopsDB -> prefix( 'config_theme' ) . " WHERE conf_name = '" . $form . "'";
					$resultq = $xoopsDB -> query( $sqlq );
					$video_arrt = $xoopsDB -> fetchArray( $resultq );
					
				}else{
					$form = 'default_template';
					$sqlq = " SELECT * FROM " . $xoopsDB -> prefix( 'config_theme' ) . " WHERE conf_name = '" . $form . "'";
					$resultq = $xoopsDB -> query( $sqlq );
					$video_arrt = $xoopsDB -> fetchArray( $resultq );
				}
			
		}else{
				$form = $xoTheme->template->_tpl_vars[ 'xoops_dirname' ] . '_template';
				$sqlq = " SELECT * FROM " . $xoopsDB -> prefix( 'config_theme' ) . " WHERE conf_name = '" . $form . "'";
				$resultq = $xoopsDB -> query( $sqlq );
				$video_arrt = $xoopsDB -> fetchArray( $resultq );
		}

			//$terp = unserialize ( $video_arrt['conf_value'] );
			$mfn_items = $video_arrt['conf_value'];
			//$mfn_items = 'YToyOntpOjA7YToyOntzOjQ6ImF0dHIiO2E6MTg6e3M6NToidGl0bGUiO3M6MDoiIjtzOjg6ImJnX2NvbG9yIjtzOjE6IjEiO3M6ODoiYmdfaW1hZ2UiO3M6MDoiIjtzOjExOiJiZ19wb3NpdGlvbiI7czoyMDoibm8tcmVwZWF0O2xlZnQgdG9wOzsiO3M6NzoiYmdfc2l6ZSI7czo0OiJhdXRvIjtzOjEyOiJiZ192aWRlb19tcDQiO3M6MDoiIjtzOjEyOiJiZ192aWRlb19vZ3YiO3M6MDoiIjtzOjExOiJwYWRkaW5nX3RvcCI7czoyOiI0MCI7czoxNDoicGFkZGluZ19ib3R0b20iO3M6MToiMCI7czo3OiJkaXZpZGVyIjtzOjA6IiI7czo5OiJkZWNvcl90b3AiO3M6MDoiIjtzOjEyOiJkZWNvcl9ib3R0b20iO3M6MDoiIjtzOjEwOiJuYXZpZ2F0aW9uIjtzOjA6IiI7czo1OiJzdHlsZSI7czowOiIiO3M6NToiY2xhc3MiO3M6MDoiIjtzOjEwOiJzZWN0aW9uX2lkIjtzOjA6IiI7czoxMDoidmlzaWJpbGl0eSI7czowOiIiO3M6NDoiaGlkZSI7czowOiIiO31zOjU6IndyYXBzIjthOjI6e2k6MDthOjM6e3M6NDoic2l6ZSI7czozOiIxLzEiO3M6NToiaXRlbXMiO2E6MTp7aTowO2E6Mzp7czo0OiJ0eXBlIjtzOjQ6Im1lbnUiO3M6NDoic2l6ZSI7czozOiIxLzEiO3M6NjoiZmllbGRzIjthOjE6e3M6NzoiY29udGVudCI7czoxNjoiPHskTUVOVV9tZW51XzF9PiI7fX19czo0OiJhdHRyIjthOjk6e3M6ODoiYmdfY29sb3IiO3M6MToiMSI7czo4OiJiZ19pbWFnZSI7czowOiIiO3M6MTE6ImJnX3Bvc2l0aW9uIjtzOjIwOiJuby1yZXBlYXQ7bGVmdCB0b3A7OyI7czo3OiJiZ19zaXplIjtzOjQ6ImF1dG8iO3M6NzoibW92ZV91cCI7czowOiIiO3M6NzoicGFkZGluZyI7czowOiIiO3M6MTM6ImNvbHVtbl9tYXJnaW4iO3M6MDoiIjtzOjE0OiJ2ZXJ0aWNhbF9hbGlnbiI7czozOiJ0b3AiO3M6NToiY2xhc3MiO3M6MDoiIjt9fWk6MTthOjM6e3M6NDoic2l6ZSI7czozOiIxLzEiO3M6NToiaXRlbXMiO2E6NTp7aTowO2E6Mzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJzaXplIjtzOjM6IjEvNCI7czo2OiJmaWVsZHMiO2E6MTM6e3M6NToidGl0bGUiO3M6MDoiIjtzOjc6ImNvbnRlbnQiO3M6NTY6Im9rIFtpXW9rIFsvaV1vayB4ZXMgeGVzIHhlcyBbdV1bY2VudGVyXWNleHNbL2NlbnRlcl1bL3VdIjtzOjU6ImFsaWduIjtzOjA6IiI7czoxMjoiYWxpZ24tbW9iaWxlIjtzOjA6IiI7czo5OiJjb2x1bW5fYmciO3M6MDoiIjtzOjg6ImJnX2ltYWdlIjtzOjA6IiI7czoxMToiYmdfcG9zaXRpb24iO3M6MjA6Im5vLXJlcGVhdDtsZWZ0IHRvcDs7IjtzOjc6ImJnX3NpemUiO3M6NDoiYXV0byI7czoxMzoibWFyZ2luX2JvdHRvbSI7czowOiIiO3M6NzoicGFkZGluZyI7czowOiIiO3M6NzoiYW5pbWF0ZSI7czowOiIiO3M6NzoiY2xhc3NlcyI7czowOiIiO3M6NToic3R5bGUiO3M6MDoiIjt9fWk6MTthOjM6e3M6NDoidHlwZSI7czoxMDoiYmxvY2txdW90ZSI7czo0OiJzaXplIjtzOjM6IjEvNCI7czo2OiJmaWVsZHMiO2E6NTp7czo3OiJjb250ZW50IjtzOjE5MToiW2NlbnRlcl1ramJiIGogIGdrZmZncyBqdmpoIGpoIGdrIGpqZ2hqIGpoIFtjb2xvcj0wMDAwRkZdW2ZvbnQ9SGVsdmV0aWNhXVtzaXplPWxhcmdlXWNnZmNnaGN2diBbL3NpemVdWy9mb250XVsvY29sb3Jda2tqayBiamtiIGhqdmpodmpodiBqaHYgamh2amh2IGpoIGdoamhqIGogamggamdoIGpnIGogamggamdqaFsvY2VudGVyXW5tbW4iO3M6NjoiYXV0aG9yIjtzOjA6IiI7czo0OiJsaW5rIjtzOjA6IiI7czo2OiJ0YXJnZXQiO3M6MToiMCI7czo3OiJjbGFzc2VzIjtzOjA6IiI7fX1pOjI7YTozOntzOjQ6InR5cGUiO3M6NjoiYnV0dG9uIjtzOjQ6InNpemUiO3M6MzoiMS80IjtzOjY6ImZpZWxkcyI7YToxNDp7czo1OiJ0aXRsZSI7czo1OiJ0aXRyZSI7czo0OiJsaW5rIjtzOjg6ImhnamdqZ2hqIjtzOjY6InRhcmdldCI7czoxOiIwIjtzOjU6ImFsaWduIjtzOjA6IiI7czo0OiJpY29uIjtzOjEzOiJmYS1pY29uLXNtaWxlIjtzOjEzOiJpY29uX3Bvc2l0aW9uIjtzOjQ6ImxlZnQiO3M6NToiY29sb3IiO3M6NzoiI2ZmMmVmZiI7czoxMDoiZm9udF9jb2xvciI7czo3OiIjZGVkZWRlIjtzOjQ6InNpemUiO3M6MToiNCI7czoxMDoiZnVsbF93aWR0aCI7czoxOiIwIjtzOjU6ImNsYXNzIjtzOjA6IiI7czozOiJyZWwiO3M6MDoiIjtzOjg6ImRvd25sb2FkIjtzOjA6IiI7czo3OiJvbmNsaWNrIjtzOjA6IiI7fX1pOjM7YTozOntzOjQ6InR5cGUiO3M6MTQ6ImNhbGxfdG9fYWN0aW9uIjtzOjQ6InNpemUiO3M6MzoiMS8xIjtzOjY6ImZpZWxkcyI7YTo5OntzOjU6InRpdGxlIjtzOjY6ImFjdGlvbiI7czo0OiJpY29uIjtzOjE3OiJpbS1pY29uLWNvbXBhc3MtMiI7czo3OiJjb250ZW50IjtzOjU0OiJua2puayBrbGtqaGtqIGtoayAgaGhramhraGsgIGtqaGtnIGhqZ2pnamhnaCBraGxramxramwiO3M6MTI6ImJ1dHRvbl90aXRsZSI7czowOiIiO3M6NDoibGluayI7czo2OiJqamtqa2oiO3M6NjoidGFyZ2V0IjtzOjE6IjAiO3M6NToiY2xhc3MiO3M6MDoiIjtzOjc6ImFuaW1hdGUiO3M6MDoiIjtzOjc6ImNsYXNzZXMiO3M6MDoiIjt9fWk6NDthOjM6e3M6NDoidHlwZSI7czoxMDoicXVpY2tfZmFjdCI7czo0OiJzaXplIjtzOjM6IjIvNSI7czo2OiJmaWVsZHMiO2E6OTp7czo3OiJoZWFkaW5nIjtzOjEwOiJxdWljayBmYWN0IjtzOjU6InRpdGxlIjtzOjEwOiJxdWljayBmYWN0IjtzOjc6ImNvbnRlbnQiO3M6MTA6InF1aWNrIGZhY3QiO3M6NjoibnVtYmVyIjtzOjc6Ijg1NDE3ODIiO3M6NjoicHJlZml4IjtzOjI6IjQ1IjtzOjU6ImxhYmVsIjtzOjM6Ijk4NSI7czo1OiJhbGlnbiI7czowOiIiO3M6NzoiYW5pbWF0ZSI7czowOiIiO3M6NzoiY2xhc3NlcyI7czowOiIiO319fXM6NDoiYXR0ciI7YTo5OntzOjg6ImJnX2NvbG9yIjtzOjE6IjEiO3M6ODoiYmdfaW1hZ2UiO3M6MDoiIjtzOjExOiJiZ19wb3NpdGlvbiI7czoyMDoibm8tcmVwZWF0O2xlZnQgdG9wOzsiO3M6NzoiYmdfc2l6ZSI7czo0OiJhdXRvIjtzOjc6Im1vdmVfdXAiO3M6NDoiNDBweCI7czo3OiJwYWRkaW5nIjtzOjA6IiI7czoxMzoiY29sdW1uX21hcmdpbiI7czowOiIiO3M6MTQ6InZlcnRpY2FsX2FsaWduIjtzOjM6InRvcCI7czo1OiJjbGFzcyI7czowOiIiO319fX1pOjE7YToyOntzOjQ6ImF0dHIiO2E6MTg6e3M6NToidGl0bGUiO3M6MDoiIjtzOjg6ImJnX2NvbG9yIjtzOjE6IjEiO3M6ODoiYmdfaW1hZ2UiO3M6MDoiIjtzOjExOiJiZ19wb3NpdGlvbiI7czoyMDoibm8tcmVwZWF0O2xlZnQgdG9wOzsiO3M6NzoiYmdfc2l6ZSI7czo0OiJhdXRvIjtzOjEyOiJiZ192aWRlb19tcDQiO3M6MDoiIjtzOjEyOiJiZ192aWRlb19vZ3YiO3M6MDoiIjtzOjExOiJwYWRkaW5nX3RvcCI7czoxOiIwIjtzOjE0OiJwYWRkaW5nX2JvdHRvbSI7czoxOiIwIjtzOjc6ImRpdmlkZXIiO3M6MDoiIjtzOjk6ImRlY29yX3RvcCI7czowOiIiO3M6MTI6ImRlY29yX2JvdHRvbSI7czowOiIiO3M6MTA6Im5hdmlnYXRpb24iO3M6MDoiIjtzOjU6InN0eWxlIjtzOjA6IiI7czo1OiJjbGFzcyI7czowOiIiO3M6MTA6InNlY3Rpb25faWQiO3M6MDoiIjtzOjEwOiJ2aXNpYmlsaXR5IjtzOjA6IiI7czo0OiJoaWRlIjtzOjA6IiI7fXM6NToid3JhcHMiO2E6Mzp7aTowO2E6Mzp7czo0OiJzaXplIjtzOjM6IjEvNiI7czo1OiJpdGVtcyI7YToyOntpOjA7YTozOntzOjQ6InR5cGUiO3M6MTE6ImJsb2NrX3hvb3BzIjtzOjQ6InNpemUiO3M6MzoiMS8xIjtzOjY6ImZpZWxkcyI7YToxOntzOjc6ImNvbnRlbnQiO3M6MToiMSI7fX1pOjE7YTozOntzOjQ6InR5cGUiO3M6MTE6ImJsb2NrX3hvb3BzIjtzOjQ6InNpemUiO3M6MzoiMS8xIjtzOjY6ImZpZWxkcyI7YToxOntzOjc6ImNvbnRlbnQiO3M6MToiNyI7fX19czo0OiJhdHRyIjthOjk6e3M6ODoiYmdfY29sb3IiO3M6NzoiI2UwZTBlMCI7czo4OiJiZ19pbWFnZSI7czowOiIiO3M6MTE6ImJnX3Bvc2l0aW9uIjtzOjIwOiJuby1yZXBlYXQ7bGVmdCB0b3A7OyI7czo3OiJiZ19zaXplIjtzOjQ6ImF1dG8iO3M6NzoibW92ZV91cCI7czowOiIiO3M6NzoicGFkZGluZyI7czowOiIiO3M6MTM6ImNvbHVtbl9tYXJnaW4iO3M6MDoiIjtzOjE0OiJ2ZXJ0aWNhbF9hbGlnbiI7czozOiJ0b3AiO3M6NToiY2xhc3MiO3M6MDoiIjt9fWk6MTthOjM6e3M6NDoic2l6ZSI7czozOiIyLzMiO3M6NToiaXRlbXMiO2E6Mjp7aTowO2E6Mzp7czo0OiJ0eXBlIjtzOjU6InZpZGVvIjtzOjQ6InNpemUiO3M6MzoiMS8xIjtzOjY6ImZpZWxkcyI7YTo5OntzOjU6InZpZGVvIjtzOjExOiJXb0poblJjemVOZyI7czoxMDoicGFyYW1ldGVycyI7czowOiIiO3M6MzoibXA0IjtzOjA6IiI7czozOiJvZ3YiO3M6MDoiIjtzOjExOiJwbGFjZWhvbGRlciI7czowOiIiO3M6MTY6Imh0bWw1X3BhcmFtZXRlcnMiO3M6MDoiIjtzOjU6IndpZHRoIjtzOjM6IjcwMCI7czo2OiJoZWlnaHQiO3M6MzoiNDAwIjtzOjc6ImNsYXNzZXMiO3M6MDoiIjt9fWk6MTthOjM6e3M6NDoidHlwZSI7czo1OiJ2aWRlbyI7czo0OiJzaXplIjtzOjM6IjEvMSI7czo2OiJmaWVsZHMiO2E6OTp7czo1OiJ2aWRlbyI7czoxMToiV29KaG5SY3plTmciO3M6MTA6InBhcmFtZXRlcnMiO3M6MDoiIjtzOjM6Im1wNCI7czowOiIiO3M6Mzoib2d2IjtzOjA6IiI7czoxMToicGxhY2Vob2xkZXIiO3M6MDoiIjtzOjE2OiJodG1sNV9wYXJhbWV0ZXJzIjtzOjA6IiI7czo1OiJ3aWR0aCI7czozOiI3MDAiO3M6NjoiaGVpZ2h0IjtzOjM6IjQwMCI7czo3OiJjbGFzc2VzIjtzOjA6IiI7fX19czo0OiJhdHRyIjthOjk6e3M6ODoiYmdfY29sb3IiO3M6MToiMSI7czo4OiJiZ19pbWFnZSI7czowOiIiO3M6MTE6ImJnX3Bvc2l0aW9uIjtzOjIwOiJuby1yZXBlYXQ7bGVmdCB0b3A7OyI7czo3OiJiZ19zaXplIjtzOjQ6ImF1dG8iO3M6NzoibW92ZV91cCI7czowOiIiO3M6NzoicGFkZGluZyI7czowOiIiO3M6MTM6ImNvbHVtbl9tYXJnaW4iO3M6MDoiIjtzOjE0OiJ2ZXJ0aWNhbF9hbGlnbiI7czozOiJ0b3AiO3M6NToiY2xhc3MiO3M6MDoiIjt9fWk6MjthOjM6e3M6NDoic2l6ZSI7czozOiIxLzYiO3M6NToiaXRlbXMiO2E6Mjp7aTowO2E6Mzp7czo0OiJ0eXBlIjtzOjExOiJibG9ja194b29wcyI7czo0OiJzaXplIjtzOjM6IjEvMSI7czo2OiJmaWVsZHMiO2E6MTp7czo3OiJjb250ZW50IjtzOjE6IjEiO319aToxO2E6Mzp7czo0OiJ0eXBlIjtzOjExOiJibG9ja194b29wcyI7czo0OiJzaXplIjtzOjM6IjEvMSI7czo2OiJmaWVsZHMiO2E6MTp7czo3OiJjb250ZW50IjtzOjE6IjciO319fXM6NDoiYXR0ciI7YTo5OntzOjg6ImJnX2NvbG9yIjtzOjc6IiM5Y2I1ZmYiO3M6ODoiYmdfaW1hZ2UiO3M6MDoiIjtzOjExOiJiZ19wb3NpdGlvbiI7czoyMDoibm8tcmVwZWF0O2xlZnQgdG9wOzsiO3M6NzoiYmdfc2l6ZSI7czo0OiJhdXRvIjtzOjc6Im1vdmVfdXAiO3M6MDoiIjtzOjc6InBhZGRpbmciO3M6MDoiIjtzOjEzOiJjb2x1bW5fbWFyZ2luIjtzOjA6IiI7czoxNDoidmVydGljYWxfYWxpZ24iO3M6MzoidG9wIjtzOjU6ImNsYXNzIjtzOjA6IiI7fX19fX0';
			if( $mfn_items && ! is_array( $mfn_items ) ){
				$terp = unserialize( call_user_func( 'base'.'64_decode', $mfn_items ) );
			}
			if( $terp == false ){
				$terp = unserialize ( $video_arrt['conf_value'] );
			}
			//var_dump($terp);
		// Sizes for Items
		$classes = array(
			'divider' 	=> 'divider',
			'1/6' 		=> 'one-sixth',
			'1/5' 		=> 'one-fifth',
			'1/4' 		=> 'one-fourth',
			'1/3' 		=> 'one-third',
			'2/5' 		=> 'two-fifth',
			'1/2' 		=> 'one-second',
			'3/5' 		=> 'three-fifth',
			'2/3' 		=> 'two-third',
			'3/4' 		=> 'three-fourth',
			'4/5' 		=> 'four-fifth',
			'5/6' 		=> 'five-sixth',
			'1/1' 		=> 'one'
		);
		$outputs = '';

		// Sidebars list
		//$sidebars = mfn_opts_get( 'sidebars' );


		// $mfn_items | Wraps with Items => Sections ------------------------------------

		//$mfn_items = get_post_meta( $post_id, 'mfn-page-items', true );


		// FIX | Muffin Builder 2.0 Compatibility

		if( $mfn_items && ! is_array( $mfn_items ) ){
			$mfn_items = unserialize( call_user_func( 'base'.'64_decode', $mfn_items ) );
		}


		// WordPress Editor Content ---------------------------------
		//if( mfn_opts_get('display-order') == 1 ) mfn_builder_print_content( $post_id, $content_field );


		// Content Builder -------------------------------------

		/*if( post_password_required( ) ){

			// prevents duplication of the password form
			if( get_post_meta( $post_id, 'mfn-post-hide-content', true ) ){
				echo '<div class="section the_content">';
					echo '<div class="section_wrapper">';
						echo '<div class="the_content_wrapper">';
							echo get_the_password_form( );
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}

		} elseif( is_array( $mfn_items ) ){*/
		if( is_array( $mfn_items ) ){
			// Sections
			foreach( $mfn_items as $section ){

// 				print_r($section['attr']);


				// Hide
				if( $_GET && key_exists('mfn-show', $_GET) ){
					// do nothing
				} elseif( key_exists( 'hide', $section['attr']) && $section['attr']['hide'] ){
					continue;
				}


				// section attributes -----------------------------------

				// classes ------------------------
				$section_class 		= array();

				$section_class[]	= $section['attr']['style'];
				$section_class[]	= $section['attr']['class'];

				if( key_exists( 'visibility', $section['attr']) ){
					$section_class[] = $section['attr']['visibility'];
				}
				if( key_exists( 'bg_video_mp4', $section['attr'] ) && $section['attr']['bg_video_mp4'] ){
					$section_class[] = 'has-video';
				}
				if( key_exists( 'navigation', $section['attr'] ) && $section['attr']['navigation'] ){
					$section_class[] = 'has-navi';
				}

				if( isset( $section['attr']['bg_size'] ) && ( $section['attr']['bg_size'] != 'auto' ) ){
					$section_class[] = 'bg-'. $section['attr']['bg_size'];
				}

				$section_class		= implode(' ', $section_class);


				// styles -----------------------------------------------------

				$section_style = $section_bg = array();

				$section_style[] 	= 'padding-top:'. intval( $section['attr']['padding_top'] ) .'px';
				$section_style[] 	= 'padding-bottom:'. intval( $section['attr']['padding_bottom'] ) .'px';
				$section_style[] 	= 'background-color:'. $section['attr']['bg_color'];

				// background image attributes ------------

				if( $section['attr']['bg_image'] ){

					$section_bg_attr = explode(';', $section['attr']['bg_position']);

					$section_bg['image'] 		= 'background-image:url('. $section['attr']['bg_image'] .')';

					$section_bg['repeat'] 		= 'background-repeat:'. $section_bg_attr[0];
					$section_bg['position'] 	= 'background-position:'. $section_bg_attr[1];
					$section_bg['attachment'] 	= 'background-attachment:'. $section_bg_attr[2];
					$section_bg['size'] 		= 'background-size:'. $section_bg_attr[3];
					$section_bg['webkit-size']	= '-webkit-background-size:'. $section_bg_attr[3];

				}

				// parallax -------------------------------

				$parallax = false;
				if( $section['attr']['bg_image'] && ( $section_bg_attr[2] == 'fixed' ) ){

					if( ! key_exists(4, $section_bg_attr) || $section_bg_attr[4] != 'still' ){
						// Parallax

						//$parallax = mfn_parallax_data();

						/*if( mfn_parallax_plugin() == 'translate3d' ){
							if( mfn_is_mobile() ){
								$section_bg['attachment'] = 'background-attachment:scroll';
							} else {
								$section_bg = array();
							}
						}*/

					} else {
						// Fixed | Cover
						$section_class .= ' bg-cover';
					}

				}


				$section_style = array_merge( $section_style, $section_bg );
				$section_style = implode('; ', $section_style );


				// IDs --------------------------------------------------------

				if( key_exists('section_id', $section['attr']) && $section['attr']['section_id'] ){
					$section_id = 'id="'. $section['attr']['section_id'] .'"';
				} else {
					$section_id = false;
				}


				// print ------------------------------------------------

				$outputs .= '<div class="section mcb-section '. $section_class .'" '. $section_id .' style="'. $section_style .'" '. $parallax .'>'; // 100%


					// parallax | translate3d -------
					//if( ! mfn_is_mobile() && $parallax && mfn_parallax_plugin() == 'translate3d' ){
						$outputs .= '<img class="mfn-parallax" src="'. $section['attr']['bg_image'] .'" alt="" style="opacity:0" />';
					//}


					// video ----------
					if( key_exists( 'bg_video_mp4', $section['attr'] ) && $mp4 = $section['attr']['bg_video_mp4'] ){
						$outputs .= '<div class="section_video">';

							$outputs .= '<div class="mask"></div>';

							$poster = $section['attr']['bg_image'];

							$outputs .= '<video poster="'. $poster .'" autoplay="true" loop="true" muted="muted">';

								$outputs .= '<source type="video/mp4" src="'. $mp4 .'" />';
								if( key_exists( 'bg_video_ogv', $section['attr'] ) && $ogv = $section['attr']['bg_video_ogv'] ){
									$outputs .= '<source type="video/ogg" src="'. $ogv .'" />';
								}

							$outputs .= '</video>';

						$outputs .= '</div>';
					}

					// Decoration SVG  ------------------------
					if( key_exists( 'divider', $section['attr'] ) && $divider = $section['attr']['divider'] ){
						$outputs .= '<div class="section-divider '. $divider .'"></div>';
					}

					// Decoration Image Top  ------------------------
					if( key_exists( 'decor_top', $section['attr'] ) && $decor_top = $section['attr']['decor_top'] ){
						$outputs .= '<div class="section-decoration top" style="background-image:url('. $decor_top .');height:'. mfn_get_attachment_data( $decor_top, 'height' ) .'px"></div>';
					}

					// Navigation ------------------------
					if( key_exists( 'navigation', $section['attr'] ) && $section['attr']['navigation'] ){
						$outputs .= '<div class="section-nav prev"><i class="icon-up-open-big"></i></div>';
						$outputs .= '<div class="section-nav next"><i class="icon-down-open-big"></i></div>';
					}

					$outputs .= '<div class="section_wrapper mcb-section-inner">'; // WIDTH + margin: 0 auto


						// Wraps --------------------------------------------------------


						// FIX | Muffin Builder 2.0 Compatibility
						if( ! key_exists( 'wraps', $section ) && is_array( $section['items'] ) ){

							$fix_wrap = array(
								'size'	=> '1/1',
								'items'	=> $section['items'],
							);

							$section['wraps'] = array( $fix_wrap );

						}


						if( key_exists( 'wraps', $section ) && is_array( $section['wraps'] ) ){
							foreach( $section['wraps'] as $wrap ){

								$wrap_class = array();

								// size of wrap
								$wrap_class[] = $classes[ $wrap['size'] ];


								// Wrap | Attributes --------------------------

								// Wrap | Classes -------------------

								if( key_exists( 'attr', $wrap ) ){

									$wrap_class[] = $wrap['attr']['class'];

									// Wrap Items | column margin
									if( $wrap['attr']['column_margin'] ){
										$wrap_class[] = 'column-margin-'. $wrap['attr']['column_margin'];
									}

									// Wrap Items | vertical align
									if( isset( $wrap['attr']['vertical_align'] ) ){
										$wrap_class[] = 'valign-'. $wrap['attr']['vertical_align'];
									}

									// Wrap | Background size
									if( isset( $wrap['attr']['bg_size'] ) && ( $wrap['attr']['bg_size'] != 'auto' ) ){
										$wrap_class[] = 'bg-'. $wrap['attr']['bg_size'];
									}

								}


								// Wrap | Styles -------------------

								$wrap_style = $wrap_bg = array();
								$wrap_data = array();
								$parallax = false;


								if( key_exists( 'attr', $wrap ) ){

									if( $wrap['attr']['padding'] )  $wrap_style[] = 'padding:'. $wrap['attr']['padding'];
									if( $wrap['attr']['bg_color'] ) $wrap_style[] = 'background-color:'. $wrap['attr']['bg_color'];

									// move up -------

									if( key_exists( 'move_up', $wrap['attr'] ) && $wrap['attr']['move_up'] ){
										$wrap_class[] = 'move-up';
										$wrap_style[] = 'margin-top:-'. intval( $wrap['attr']['move_up'] ) .'px';

										/*if( $moveup = mfn_opts_get( 'builder-wrap-moveup' ) ){
											if( 'no-tablet' == $moveup ){
												$wrap_data[] = 'data-tablet="no-up"';
											}
											$wrap_data[] = 'data-mobile="no-up"';
										}*/
									}

									// background image attributes

									if( $wrap['attr']['bg_image'] ){

										$wrap_bg_attr = explode(';', $wrap['attr']['bg_position']);

										$wrap_bg[] = 'background-image:url('. $wrap['attr']['bg_image'] .')';

										$wrap_bg[] = 'background-repeat:'. $wrap_bg_attr[0];
										$wrap_bg[] = 'background-position:'. $wrap_bg_attr[1];
										$wrap_bg[] = 'background-attachment:'. $wrap_bg_attr[2];
										$wrap_bg[] = 'background-size:'. $wrap_bg_attr[3];
										$wrap_bg[] = '-webkit-background-size:'. $wrap_bg_attr[3];
									}

									// parallax -------------------------

									if( $wrap['attr']['bg_image'] && ( $wrap_bg_attr[2] == 'fixed' ) ){
										if( ! key_exists( 4, $wrap_bg_attr ) || $wrap_bg_attr[4] != 'still' ){

											$parallax = mfn_parallax_data();

											if( mfn_parallax_plugin() == 'translate3d' ){
												/*if( mfn_is_mobile() ){
													$wrap_bg['attachment'] = 'background-attachment:scroll';
												} else {
													$wrap_bg = array();
												}*/
											}

										}
									}

								}


								$wrap_class	= implode( ' ', $wrap_class );

								$wrap_style = array_merge( $wrap_style, $wrap_bg );
								$wrap_style = implode( '; ', $wrap_style );

								$wrap_data = implode( ' ', $wrap_data );


								// Wrap | Print -------------------------------

								$outputs .= '<div class="wrap mcb-wrap '. $wrap_class .' clearfix" style="'. $wrap_style .'" '. $parallax .' '. $wrap_data .'>';


									// parallax | translate3d -------
									//if( ! mfn_is_mobile() && $parallax && mfn_parallax_plugin() == 'translate3d' ){
										$outputs .= '<img class="mfn-parallax" src="'. $wrap['attr']['bg_image'] .'" alt="" style="opacity:0" />';
									//}


									$outputs .= '<div class="mcb-wrap-inner">';

									// Items --------------------------------------------

										if( is_array( $wrap['items'] ) ){
											foreach( $wrap['items'] as $item ){

												if( function_exists( 'mfn_print_'. $item['type'] ) ){

													// Item | Size
													$class  = $classes[$item['size']];

													// Item | Type
													$class .= ' column_'. $item['type'];

													// Item | Custom Classes
													if( isset( $item['fields']['classes'] ) ){
														$class .= ' '. $item['fields']['classes'];
													}

													// Column | Margin Bottom
													if( $item['type'] == 'column' && ( ! empty( $item['fields']['margin_bottom'] ) ) ){
														$class .= ' column-margin-'. $item['fields']['margin_bottom'];
													}


													// Print
													$outputs .= '<div class="column mcb-column '. $class .'">';
													$outputs .= call_user_func( 'mfn_print_'. $item['type'], $item );
													$outputs .= '</div>';

												}else{$outputs = 'probleme mfn_print_'. $item['type'];}

											}
										}else{$outputs .= 'probleme item';}

									$outputs .= '</div>';

								$outputs .= '</div>';

							}
						}


					$outputs .= '</div>';

					// Decoration Image Bottom  ------------------------
					if( key_exists( 'decor_bottom', $section['attr'] ) && $decor_bottom = $section['attr']['decor_bottom'] ){
						$outputs .= '<div class="section-decoration bottom" style="background-image:url('. $decor_bottom .');height:'. mfn_get_attachment_data( $decor_bottom, 'height' ) .'px"></div>';
					}

				$outputs .= '</div>';
			}
		}


		// WordPress Editor Content -------------------------------------
		//if( mfn_opts_get('display-order') == 0 ) mfn_builder_print_content( $post_id, $content_field );
		$olives = $outputs;
		//echo $olives;
		return ($olives);

	}
	$xoopsTpl->assign('mfn_builder_print', mfn_builder_print( /*$mfn_items, $content_field = false*/ ));
}
