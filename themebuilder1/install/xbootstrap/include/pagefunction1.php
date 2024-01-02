<?php
//page.php a ete ajoute a la racine de xoops core. il fait appel a ce fichier. obligatoire.


/*-----------------------------------------------------------------------------------*/
/*	PRINT Item - FRONTEND
/*-----------------------------------------------------------------------------------*/

// ---------- [blockcolumn] -----------
function mfn_print_blockcolumn( $item ) {
	//return sc_blockcolumn( $item['fields'] );
	return sc_blockcolumn( $item );
	//return ( print_r($item['fields']) );
}

// ---------- [menu] -----------
function mfn_print_menu( $item ) {
	return sc_menu( $item['fields'] );
	//return sc_menu( $item );
	//return ( print_r($item['fields']) );
}

// ---------- [accordion] -----------
function mfn_print_accordion( $item ) {
	return sc_accordion( $item['fields'] );
}

// ---------- [article_box] -----------
function mfn_print_article_box( $item ) {
	return sc_article_box( $item['fields'] );
}

// ---------- [blockquote] -----------
function mfn_print_blockquote( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_blockquote( $item['fields'], $item['fields']['content'] );
}

// ---------- [blog] -----------
function mfn_print_blog( $item ) {
	return sc_blog( $item['fields'] );
}

// ---------- [blog_slider] -----------
function mfn_print_blog_slider( $item ) {
	return sc_blog_slider( $item['fields'] );
}

// ---------- [call_to_action] -----------
function mfn_print_call_to_action( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_call_to_action( $item['fields'], $item['fields']['content'] );
}

// ---------- [chart] -----------
function mfn_print_chart( $item ) {
	return sc_chart( $item['fields'] );
}

// ---------- [clients] -----------
function mfn_print_clients( $item ) {
	return sc_clients( $item['fields'] );
}

// ---------- [code] -----------
function mfn_print_code( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_code( $item['fields'], $item['fields']['content'] );
}

// ---------- [column] -----------
function mfn_print_column( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	if( $item['fields']['animate'] ) $output = '<div class="animate" data-anim-type="'. $item['fields']['animate'] .'">';
	$output .=  '<H3 class="themecolor">'.$item['fields']['title'].'</H3>';
		$output .=  $item['fields']['content'];
	if( $item['fields']['animate'] ) $output .= '</div>';
	return $output;
}

// ---------- [contact_box] -----------
function mfn_print_contact_box( $item ) {
	return sc_contact_box( $item['fields'] );
}

// ---------- [content] -----------
function mfn_print_content( $item ) {
	echo '<div class="the_content">';
		the_content();
	echo '</div>';
}

// ---------- [counter] -----------
function mfn_print_counter( $item ) {
	return sc_counter( $item['fields'] );
}

// ---------- [divider] -----------
function mfn_print_divider( $item ) {
	return sc_divider( $item['fields'] );
}

// ---------- [fancy_heading] -----------
function mfn_print_fancy_heading( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_fancy_heading( $item['fields'], $item['fields']['content'] );
}

// ---------- [faq] -----------
function mfn_print_faq( $item ) {
	return sc_faq( $item['fields'] );
}

// ---------- [feature_list] -----------
function mfn_print_feature_list( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_feature_list( $item['fields'], $item['fields']['content'] );
}

// ---------- [how_it_works] -----------
function mfn_print_how_it_works( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_how_it_works( $item['fields'], $item['fields']['content'] );
}

// ---------- [icon_box] -----------
function mfn_print_icon_box( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_icon_box( $item['fields'], $item['fields']['content'] );
}

// ---------- [image] -----------
function mfn_print_image( $item ) {
	return sc_image( $item['fields'] );
}

// ---------- [info_box] -----------
function mfn_print_info_box( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_info_box( $item['fields'], $item['fields']['content'] );
}

// ---------- [list] -----------
function mfn_print_list( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_list( $item['fields'], $item['fields']['content'] );
}

// ---------- [map] -----------
function mfn_print_map( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_map( $item['fields'], $item['fields']['content'] );
}

// ---------- [offer] -----------
function mfn_print_offer( $item ) {
	return sc_offer( $item['fields'] );
}

// ---------- [opening_hours] -----------
function mfn_print_opening_hours( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_opening_hours( $item['fields'], $item['fields']['content'] );
}

// ---------- [our_team] -----------
function mfn_print_our_team( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_our_team( $item['fields'], $item['fields']['content'] );
}

// ---------- [our_team_list] -----------
function mfn_print_our_team_list( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_our_team_list( $item['fields'], $item['fields']['content'] );
}

// ---------- [photo_box] -----------
function mfn_print_photo_box( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_photo_box( $item['fields'], $item['fields']['content'] );
}

// ---------- [portfolio] -----------
function mfn_print_portfolio( $item ) {
	return sc_portfolio( $item['fields'] );
}

// ---------- [portfolio_grid] -----------
function mfn_print_portfolio_grid( $item ) {
	return sc_portfolio_grid( $item['fields'] );
}

// ---------- [portfolio_slider] -----------
function mfn_print_portfolio_slider( $item ) {
	return sc_portfolio_slider( $item['fields'] );
}

// ---------- [pricing_item] -----------
function mfn_print_pricing_item( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_pricing_item( $item['fields'], $item['fields']['content'] );
}

// ---------- [progress_bars] -----------
function mfn_print_progress_bars( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_progress_bars( $item['fields'], $item['fields']['content'] );
}

// ---------- [promo_box] -----------
function mfn_print_promo_box( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_promo_box( $item['fields'], $item['fields']['content'] );
}

// ---------- [quick_fact] -----------
function mfn_print_quick_fact( $item ) {
var_dump($item);
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_quick_fact( $item['fields'], $item['fields']['content'] );
}

// ---------- [shop_slider] -----------
function mfn_print_shop_slider( $item ) {
	return sc_shop_slider( $item['fields'] );
}

// ---------- [sidebar_widget] -----------
function mfn_print_sidebar_widget( $item ) {
	return sc_sidebar_widget( $item['fields'] );
}

// ---------- [slider] -----------
function mfn_print_slider( $item ) {
	return sc_slider( $item['fields'] );
	//return ( print_r($item['fields']['content']) );
	/*$output = '<pre>';
		$output .= $item['type'];
		$output .= $item['size'];
		$output .= $item['fields'];
		$output .= $item['fields']['content'];
		$output .= '</pre>';
		return $output;*/
}

// ---------- [sliding_box] -----------
function mfn_print_sliding_box( $item ) {
	return sc_sliding_box( $item['fields'] );
}

// ---------- [tabs] -----------
function mfn_print_tabs( $item ) {
	return sc_tabs( $item['fields'] );
	//return ( print_r($item['fields']) );
}

// ---------- [testimonials] -----------
function mfn_print_testimonials( $item ) {
	return sc_testimonials( $item['fields'] );
}

// ---------- [timeline] -----------
function mfn_print_timeline( $item ) {
	return sc_timeline( $item['fields'] );
}

// ---------- [trailer_box] -----------
function mfn_print_trailer_box( $item ) {
	return sc_trailer_box( $item['fields'] );
}

// ---------- [video] -----------
function mfn_print_video( $item ) {
	return sc_video( $item['fields'] );
}

// ---------- [slider] -----------
function mfn_print_slider1( $item ) {
	return sc_slider1( $item['fields'] );
}


/* ---------------------------------------------------------------------------
 * sc_blockcolumn [sc_blockcolumn] [/sc_blockcolumn]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_blockcolumn' ) )
{
	function sc_blockcolumn( $attr, $content = null )
	{
		include(XOOPS_ROOT_PATH."/header.php");
		//var_dump($xoTheme);
														if ($attr['fields']['content'] == 'Left'){
															if ($xoTheme->template->_tpl_vars["xoops_showlblock"]){
																$_from = $xoTheme->template->_tpl_vars['xoBlocks']['canvas_left'];
																$output = '<div class="olivee-itemq olivee-itemq-'. $attr['type'] .''.$attr['fields']['content'].'"><div class="olivee-item-contentdiv">';																
																if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
																	foreach ($_from as $xoTheme->template->_tpl_vars['block']){
																		$output .= '<div class="animate" data-anim-type="zoomInLeft">';
																		$output .= '<div class="blockdiv">';
																			if ($xoTheme->template->_tpl_vars['block']['title']){
																				$output .= '<div class="blockTitle font-effect-">'.$xoTheme->template->_tpl_vars['block']['title'].'</div>';
																			}
																		$output .= '<div class="blockContent">';
																		$output .= $xoTheme->template->_tpl_vars['block']['content'];
																		$output .= '</div></div></div>';
																	}
																endif;
																unset($_from);
																$output .='</div></div>';
															}
														}
														
														if ($attr['fields']['content'] == 'Center'){
														$classess = array(
		'1/4' => 'col-sm-3 col-md-3',
		'1/3' => 'col-sm-4 col-md-4',
		'1/2' => 'col-sm-6 col-md-6',
		'2/3' => 'col-sm-8 col-md-8',
		'3/4' => 'col-sm-4 col-md-4',
		'1/1' => 'col-sm-12 col-md-12'
	);
															if ($attr['size'] == '1/1'){
															$toe = '4';
															}elseif($attr['size'] == '1/2'){
															$toe = '6';
															}elseif($attr['size'] == '1/3'){
															$toe = '12';
															}elseif($attr['size'] == '1/4'){
															$toe = '12';
															}elseif($attr['size'] == '2/3'){
															$toe = '4';
															}elseif($attr['size'] == '3/4'){
															$toe = '4';
															}
	
			if ($xoTheme->template->_tpl_vars['xoBlocks']['page_topleft'] || $xoTheme->template->_tpl_vars['xoBlocks']['page_topcenter'] || $xoTheme->template->_tpl_vars['xoBlocks']['page_topright']){
$output .= '<div class="olivee-itemq olivee-itemq-'. $attr['type'] .''.$attr['fields']['content'].' '. $classes[$attr['size']] .'"><div class="olivee-item-contentdiv">';			
$output .= '<div class="bottom-blocks">
            <div class="row">';

					$output .= '<aside class="col-sm-'.$toe.' col-md-'.$toe.'">';
						$_from = $xoTheme->template->_tpl_vars['xoBlocks']['page_topleft']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
						foreach ($_from as $xoTheme->template->_tpl_vars['block']){
							$output .= '<div class="animate" data-anim-type="bounceInUp">
							<div class="blockdiv">
							<div class="xoops-bottom-blocks">';
								if ($xoTheme->template->_tpl_vars['block']['title']){
									$output .= $xoTheme->template->_tpl_vars['block']['title'];
								}
									$output .= $xoTheme->template->_tpl_vars['block']['content'];
							$output .= '</div>
							</div>	
							</div>';
						}
					$output .= '</aside>';
						endif; unset($_from);
			
	
			
					$output .= '<aside class="col-sm-'.$toe.' col-md-'.$toe.'">';
						$_from = $xoTheme->template->_tpl_vars['xoBlocks']['page_topcenter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
						foreach ($_from as $xoTheme->template->_tpl_vars['block']){
							$output .= '<div class="animate" data-anim-type="bounceInUp">
							<div class="blockdiv">
							<div class="xoops-bottom-blocks">';
								if ($xoTheme->template->_tpl_vars['block']['title']){
									$output .= $xoTheme->template->_tpl_vars['block']['title'];
								}
									$output .= $xoTheme->template->_tpl_vars['block']['content'];
							$output .= '</div>
							</div>
							</div>';
						}
					$output .= '</aside>';
						endif; unset($_from);
			
			

					$output .= '<aside class="col-sm-'.$toe.' col-md-'.$toe.'">';
						$_from = $xoTheme->template->_tpl_vars['xoBlocks']['page_topright']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
						foreach ($_from as $xoTheme->template->_tpl_vars['block']){
							$output .= '<div class="animate" data-anim-type="bounceInUp">
							<div class="blockdiv">
							<div class="xoops-bottom-blocks">';
								if ($xoTheme->template->_tpl_vars['block']['title']){
									$output .= $xoTheme->template->_tpl_vars['block']['title'];
								}
									$output .= $xoTheme->template->_tpl_vars['block']['content'];
							$output .= '</div>
							</div>
							</div>';
						}
					$output .= '</aside>';
						endif; unset($_from);
			
	$output .= '</div>
									</div>';			
	$output .= '</div>
									</div>';		
		}
	
	/*$output = '<{if $xoBlocks.page_topleft or $xoBlocks.page_topcenter or $xoBlocks.page_topright or $xoBlocks.page_bottomleft or $xoBlocks.page_bottomright or $xoBlocks.page_bottomcenter or $xoops_contents && ($xoops_contents != " ")}>';
	$output .= '<div class="olivee-itemq olivee-itemq-'. $attr['type'] .''.$attr['fields']['content'].' '. $classes[$attr['size']] .'"><div class="olivee-item-contentdiv">';
	
	
	$output .= '
<{if $xoBlocks.page_topleft or $xoBlocks.page_topcenter or $xoBlocks.page_topright}>
	<div class="bottom-blocks">
            <div class="row">
			<!-- Start center-center blocks loop -->
			<aside class="col-sm-'.$toe.' col-md-'.$toe.'">
			<{foreach item=block from=$xoBlocks.page_topleft}>
			<div class="animate" data-anim-type="bounceInUp">
<div class="blockdiv">
	<div class="xoops-bottom-blocks">
            <{if $block.title}><h4><{$block.title}></h4><{/if}>
            <{$block.content}>
        </div>
	</div>	
</div>
			<{/foreach}>
			</aside>
			<!-- End center-center blocks loop -->
			
			<!-- Start center-left blocks loop -->
			<aside class="col-sm-'.$toe.' col-md-'.$toe.'">
			<{foreach item=block from=$xoBlocks.page_topcenter}>
			<div class="animate" data-anim-type="bounceInUp">
<div class="blockdiv">
	<div class="xoops-bottom-blocks">
            <{if $block.title}><h4><{$block.title}></h4><{/if}>
            <{$block.content}>
        </div>
	</div>	
</div>
			<{/foreach}>
			</aside>
			<!-- End center-left blocks loop -->
			
			<!-- Start center-right blocks loop -->
			<aside class="col-sm-'.$toe.' col-md-'.$toe.'">
			<{foreach item=block from=$xoBlocks.page_topright}>
			<div class="animate" data-anim-type="bounceInUp">
<div class="blockdiv">
	<div class="xoops-bottom-blocks">
            <{if $block.title}><h4><{$block.title}></h4><{/if}>
            <{$block.content}>
        </div>
	</div>	
</div>			<{/foreach}>
</aside>
			<!-- End center-right blocks loop -->
			</div>
    </div><!-- .bottom-blocks -->
			
<{/if}>
<!-- End center top blocks loop -->





<!-- Start content module page -->';*/
			if ($xoTheme->template->_tpl_vars['xoops_contents'] && ( $xoTheme->template->_tpl_vars['xoops_contents'] != ' ' )){
				echo $xoTheme->template->_tpl_vars['xoops_contents'];
				$output .= '<div class="animate" data-anim-type="bounceInUp"><div id="content">"'.$xoTheme->template->_tpl_vars['xoops_contents'].'"</div></div>';
			}
$output .= '<!-- End content module -->';

	
	
	
			if ($xoTheme->template->_tpl_vars['xoBlocks']['page_bottomcenter'] || $xoTheme->template->_tpl_vars['xoBlocks']['page_bottomright'] || $xoTheme->template->_tpl_vars['xoBlocks']['page_bottomleft']){
					
				$output .= '<div class="bottom-blocks">
					<div class="row">';
						if ($xoTheme->template->_tpl_vars['xoBlocks']['page_bottomleft']){
							$output .= '<aside class="col-sm-'.$toe.' col-md-'.$toe.'">';
								$_from = $xoTheme->template->_tpl_vars['xoBlocks']['page_bottomleft']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
								foreach ($_from as $xoTheme->template->_tpl_vars['block']){
									$output .= '<div class="animate" data-anim-type="bounceInUp">
									<div class="xoops-bottom-blocks">';
										if ($xoTheme->template->_tpl_vars['block']['title']){
											$output .= $xoTheme->template->_tpl_vars['block']['title'];
										}
											$output .= $xoTheme->template->_tpl_vars['block']['content'];
									$output .= '</div>
									</div>	';
								}
							$output .= '</aside>';
								endif; unset($_from);
						}	


		  
						if ($xoTheme->template->_tpl_vars['xoBlocks']['page_bottomcenter']){
							$output .= '<aside class="col-sm-'.$toe.' col-md-'.$toe.'">';
									$_from = $xoTheme->template->_tpl_vars['xoBlocks']['page_bottomcenter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
									foreach ($_from as $xoTheme->template->_tpl_vars['block']){
										$output .= '<div class="animate" data-anim-type="bounceInUp">
										<div class="xoops-bottom-blocks">';
											if ($xoTheme->template->_tpl_vars['block']['title']){
												$output .= $xoTheme->template->_tpl_vars['block']['title'];
											}
												$output .= $xoTheme->template->_tpl_vars['block']['content'];
										$output .= '</div>
										</div>';
									}
							$output .= '</aside>';
									endif; unset($_from);
						}
		  





		  
						if ($xoTheme->template->_tpl_vars['xoBlocks']['page_bottomright']){
							$output .= '<aside class="col-sm-'.$toe.' col-md-'.$toe.'">';
								$_from = $xoTheme->template->_tpl_vars['xoBlocks']['page_bottomright']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
								foreach ($_from as $xoTheme->template->_tpl_vars['block']){
									$output .= '<div class="animate" data-anim-type="bounceInUp">
									<div class="xoops-bottom-blocks">';
										if ($xoTheme->template->_tpl_vars['block']['title']){
											$output .= $xoTheme->template->_tpl_vars['block']['title'];
										}
											$output .= $xoTheme->template->_tpl_vars['block']['content'];
									$output .= '</div>
									</div>';
								}
							$output .= '</aside>';
									endif; unset($_from);

						}
			$output .= '</div>
									</div>';			
		}

														}

														if ($attr['fields']['content'] == 'Right'){
															if ($xoTheme->template->_tpl_vars["xoops_showrblock"]){
																$_from = $xoTheme->template->_tpl_vars['xoBlocks']['canvas_right'];
																$output = '<div class="olivee-itemq olivee-itemq-'. $attr['type'] .''.$attr['fields']['content'].' '. $classes[$attr['size']] .'"><div class="olivee-item-contentdiv">';																
																if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
																	foreach ($_from as $xoTheme->template->_tpl_vars['block']){
																		$output .= '<div class="animate" data-anim-type="zoomInLeft">';
																		$output .= '<div class="blockdiv">';
																			if ($xoTheme->template->_tpl_vars['block']['title']){
																				$output .= '<div class="blockTitle font-effect-'.$unserialise['fonteffect'].'">'.$xoTheme->template->_tpl_vars['block']['title'].'</div>';
																			}
			
																		$output .= '<div class="blockContent">';
																		$output .= $xoTheme->template->_tpl_vars['block']['content'];
																		$output .= '</div></div></div>';
																	}
																endif;
																unset($_from);
																$output .='</div></div>';
															}																
														}	
		
		
		/*$output .= '<pre>';
		$output .= $attr['size'];
		$output .= $attr['fields']['content'];
		$output .= '</pre>';*/
		
	    return $output;
	}
}




/* ---------------------------------------------------------------------------
 * sc_menu [sc_menu] [/sc_menu]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_menu' ) )
{
	function sc_menu( $attr, $content = null )
	{
		include(XOOPS_ROOT_PATH."/themes/themebuilder/menutopage.php");
		$output =  '<div class="olivee-item-contentdiv">';
		$rest = substr($attr['content'], 3, -2);
		//var_dump($rest);
		//$$rest = 'menu to add later';
		//var_dump($$rest);
		$output .=  "\n".$$rest."\n";
		$output .=  "\n</div>\n";
		
	    return $output;
	}
}



/* ---------------------------------------------------------------------------
 * Code [code] [/code]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_code' ) )
{
	function sc_code( $attr, $content = null )
	{
		$output  = '<pre>';
			$output .= htmlspecialchars($content);
		$output .= '</pre>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Article Box [article_box] [/article_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_article_box' ) )
{
	function sc_article_box( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'image' 	=> '',
			'slogan' 	=> '',
			'title' 	=> '',
			'link' 		=> '',
			'target' 	=> '',
			'animate' 	=> '',
		), $attr));*/
		
		// target
		if( $attr['target'] ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}	
		
		$output = '<div class="article_box">';
			if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
				if( $attr['link'] ) $output .= '<a href="'. $attr['link'] .'" '. $target .'>';
				
					$output .= '<div class="photo_wrapper">';
						$output .= '<img class="scale-with-grid" src="'. $attr['image'] .'" alt="'. $attr['title'] .'" />';
					$output .= '</div>';
					
					$output .= '<div class="desc_wrapper">';
						if( $attr['slogan'] ) $output .= '<p>'. $attr['slogan'] .'</p>';
						if( $attr['title'] ) $output .= '<h4>'. $attr['title'] .'</h4>';
						$output .= '<i class="icon-right-open themecolor"></i>';
					$output .= '</div>';
					
				if( $attr['link'] ) $output .= '</a>';
			if( $attr['animate'] ) $output .= '</div>'."\n";
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Photo Box [photo_box] [/photo_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_photo_box' ) )
{
	function sc_photo_box( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'image' 	=> '',
			'title' 	=> '',
			'link' 		=> '',
			'target' 	=> '',
			'animate' 	=> '',
		), $attr));*/
		
		// target
		if( $attr['target'] ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		$output = '<div class="photo_box">';
			if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
				if( $attr['title'] ) $output .= '<h4>'. $attr['title'] .'</h4>';
				
				if( $attr['image'] ){
					$output .= '<div class="image_frame">';
						$output .= '<div class="image_wrapper">';
							if( $attr['link'] ) $output .= '<a href="'. $attr['link'] .'" '. $target .'>';;
								$output .= '<div class="mask"></div>';
								$output .= '<img class="scale-with-grid" src="'. $attr['image'] .'" alt="'. $attr['title'] .'" />';
							if( $attr['link'] ) $output .= '</a>';
						$output .= '</div>';
					$output .= '</div>';
				}
				
				$output .= '<div class="desc">'.$content.'</div>';	
			if( $attr['animate'] ) $output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Sliding Box [sliding_box] [/sliding_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_sliding_box' ) )
{
	function sc_sliding_box( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'image' 	=> '',
			'title' 	=> '',
			'link' 		=> '',
			'target' 	=> '',
			'animate' 	=> '',
		), $attr));*/
		
		// target
		if( $attr['target'] ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}	
		
		$output = '<div class="sliding_box">';
			if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
				if( $attr['link'] ) $output .= '<a href="'. $attr['link'] .'" '. $target .'>';
				
					$output .= '<div class="photo_wrapper">';
						$output .= '<img class="scale-with-grid" src="'. $attr['image'] .'" alt="'. $attr['title'] .'" />';
					$output .= '</div>';
					
					$output .= '<div class="desc_wrapper">';
						if( $attr['title'] ) $output .= '<h4>'. $attr['title'] .'</h4>';
					$output .= '</div>';
					
				if( $attr['link'] ) $output .= '</a>';
			if( $attr['animate'] ) $output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Trailer Box [trailer_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_trailer_box' ) )
{
	function sc_trailer_box( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'image' 	=> '',
			'slogan' 	=> '',
			'title' 	=> '',
			'link' 		=> '',
			'target' 	=> '',
			'animate' 	=> '',
		), $attr));*/
		
		// target
		if( $attr['target'] ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}	
		
		$output = '<div class="trailer_box">';
			if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
				if( $attr['link'] ) $output .= '<a href="'. $attr['link'] .'" '. $target .'>';
				
					$output .= '<img class="scale-with-grid" src="'. $attr['image'] .'" alt="'. $attr['title'] .'" />';
					$output .= '<div class="desc">';
						if( $attr['slogan'] ) $output .= '<div class="subtitle">'. $attr['slogan'] .'</div>';
						if( $attr['title'] )  $output .= '<h2>'. $attr['title'] .'</h2>';
						$output .= '<div class="line"></div>';
					$output .= '</div>';
					
				if( $attr['link'] ) $output .= '</a>';
			if( $attr['animate'] ) $output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Promo Box [promo_box] [/promo_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_promo_box' ) )
{
	function sc_promo_box( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'image' 	=> '',
			'title' 	=> '',
			'btn_text' 	=> '',
			'btn_link' 	=> '',
			'position' 	=> 'left',
			'border' 	=> 'no_border',
			'target' 	=> '',
			'animate' 	=> '',
		), $attr));*/
		
		// target
		if( $attr['target'] ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
				
		$output = '<div class="promo_box '. $attr['border'] .'">';
			if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
				$output .= '<div class="promo_box_wrapper promo_box_'. $attr['position'] .'">';
	
					$output .= '<div class="photo_wrapper">';
						if( $attr['image'] ) $output .= '<img class="scale-with-grid" src="'. $attr['image'] .'" alt="'. $attr['title'] .'">';
					$output .= '</div>';
					
					$output .= '<div class="desc_wrapper">';
						if( $attr['title'] )$output .= '<h2>'. $attr['title'] .'</h2>';
						if( $content ) $output .= '<div class="desc">'. $content .'</div>';
						if( $attr['btn_link'] ) $output .= '<a href="'. $attr['btn_link'] .'" class="button button_left button_theme button_js" '. $target .'><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">'. $attr['btn_text'] .'</span></a>';
					$output .= '</div>';
					
				$output .= '</div>';
			if( $attr['animate'] ) $output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * How It Works [how_it_works] [/how_it_works]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_how_it_works' ) )
{
	function sc_how_it_works( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'image' 	=> '',
			'number' 	=> '',
			'title' 	=> '',
			'border' 	=> '',
			'animate' 	=> '',
		), $attr));*/
		
		// border
		if( $attr['border'] ){
			$border = 'has_border';
		} else {
			$border = 'no_border';
		}
				
		$output = '<div class="how_it_works '. $border .'">';
			if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
			
				$output .= '<div class="image">';
					$output .= '<img src="'. $attr['image'] .'" class="scale-with-grid" alt="'. $attr['title'] .'">';
					if( $attr['number'] ) $output .= '<span class="number">'. $attr['number'] .'</span>';
				$output .= '</div>';
				if( $attr['title'] ) $output .= '<h4>'. $attr['title'] .'</h4>';
				$output .= '<div class="desc">'. $content .'</div>';
				
			if( $attr['animate'] ) $output .= '</div>'."\n";
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Blog [blog]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_blog' ) )
{
	function sc_blog( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'count'			=> 2,
			'category'		=> '',
			'style'			=> 'classic',
			'more'			=> '',
			'pagination'	=> '',
		), $attr));

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );
		$args = array(
			'posts_per_page'		=> intval($count),
			'paged' 				=> $paged,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
		if( $category ) $args['category_name'] = $category;
		
		// classes
		$classes = $style;
		if( $style == 'masonry' ) $classes .= ' isotope';
		if( ! $more ) $classes .= ' hide-more'; 

		$query_blog = new WP_Query( $args );

		$output = '<div class="blog_wrapper isotope_wrapper">';
		
			$output .= '<div class="posts_group '. $classes .'">';				
					$output .= mfn_content_post($query_blog, $style);					
			$output .= '</div>';
			
			if( $pagination ) $output .= mfn_pagination($query_blog);

		$output .= '</div>'."\n";
		
		wp_reset_postdata();

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Blog Slider [blog_slider]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_blog_slider' ) )
{
	function sc_blog_slider( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title'			=> '',
			'count'			=> 5,
			'category'		=> '',
			'more'			=> '',
		), $attr));

		//$translate['readmore'] 		= mfn_opts_get('translate') ? mfn_opts_get('translate-readmore','Read more') : 'Read more','betheme');
		
		// classes
		$classes = '';
		if( ! $more ) $classes .= ' hide-more';
		
		$args = array(
			'posts_per_page'		=> intval($count),
			'no_found_rows'			=> 1,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
		if( $category ) $args['category_name'] = $category;

		$query_blog = new WP_Query( $args );

		$output = '<div class="blog_slider '. $classes .'">';
		
			$output .= '<div class="blog_slider_header">';
				if( $title ) $output .= '<h4 class="title">'. $title .'</h4>';
				$output .= '<a class="button button_js slider_prev" href="#"><span class="button_icon"><i class="icon-left-open-big"></i></span></a>';
				$output .= '<a class="button button_js slider_next" href="#"><span class="button_icon"><i class="icon-right-open-big"></i></span></a>';
			$output .= '</div>';
			
			$output .= '<ul class="blog_slider_ul">';				
				while ( $query_blog->have_posts() ){
					$query_blog->the_post();
	
					$output .= '<li class="'. implode(' ',get_post_class()).'">';
						$output .= '<div class="item_wrapper">';
					
							if( get_post_format() == 'quote'){
								$output .= '<blockquote>';
									$output .= '<a href="'. get_permalink() .'">';
										$output .= get_the_title();
									$output .= '</a>';
								$output .= '</blockquote>';
							} else {
								$output .= '<div class="image_frame scale-with-grid">';
									$output .= '<div class="image_wrapper">';
										$output .= get_the_post_thumbnail( get_the_ID(), 'blog', array('class'=>'scale-with-grid' ) );
									$output .= '</div>';
								$output .= '</div>';	
							}
							
							$output .= '<div class="date_label">'. get_the_date() .'</div>';
							
							$output .= '<div class="desc">';
								if( get_post_format() != 'quote') $output .= '<h4><a href="'. get_permalink() .'">'. get_the_title() .'</a></h4>';
								$output .= '<hr class="hr_color" />';
								$output .= '<a href="'. get_permalink() .'" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">'. $translate['readmore'] .'</span></a>';
							$output .= '</div>';
							
						$output .= '</div>';
					$output .= '</li>';
				}
				wp_reset_postdata();					
			$output .= '</ul>';
			
			$output .= '<div class="slider_pagination"></div>';

		$output .= '</div>'."\n";
		
		wp_reset_postdata();

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shop Slider [shop_slider]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_shop_slider' ) )
{
	function sc_shop_slider( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title'			=> '',
			'count'			=> 5,
			'category'		=> '',
			'orderby' 		=> 'date',
			'order' 		=> 'DESC',
		), $attr));

		$args = array(
			'post_type' 			=> 'product',
			'posts_per_page' 		=> intval($count),
			'paged' 				=> -1,
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'ignore_sticky_posts'	=> 1
		);
		if( $category ) $args['product_cat'] = $category;			

		$query_shop = new WP_Query();
		$query_shop->query( $args );
		
		$output = '<div class="shop_slider">';
		
			$output .= '<div class="blog_slider_header">';
				if( $title ) $output .= '<h4 class="title">'. $title .'</h4>';
				$output .= '<a class="button button_js slider_prev" href="#"><span class="button_icon"><i class="icon-left-open-big"></i></span></a>';
				$output .= '<a class="button button_js slider_next" href="#"><span class="button_icon"><i class="icon-right-open-big"></i></span></a>';
			$output .= '</div>';
				
			$output .= '<ul class="shop_slider_ul">';				
				while ( $query_shop->have_posts() ){
					$query_shop->the_post();
					global $product;
					
					$output .= '<li class="'. implode(' ',get_post_class()).'">';
						$output .= '<div class="item_wrapper">';
		
							$output .= '<div class="image_frame scale-with-grid product-loop-thumb" ontouchstart="this.classList.toggle(\'hover\');">';
								$output .= '<div class="image_wrapper">';
								
									$output .= '<a href="'. get_the_permalink() .'">';
										$output .= '<div class="mask"></div>';
										$output .= get_the_post_thumbnail( null, 'shop_catalog', array('class'=>'scale-with-grid' ) );
									$output .= '</a>';
									
									$output .= '<div class="image_links">';
										$output .= '<a class="link" href="'. get_the_permalink() .'"><i class="icon-link"></i></a>';
									$output .= '</div>';
									
								$output .= '</div>';
								if ($product->is_on_sale()) $output .= '<span class="onsale"><i class="icon-star"></i></span>';
							$output .= '</div>';
							
							$output .= '<div class="desc">';
								$output .= '<h4><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></h4>';
								if ( $price_html = $product->get_price_html() ) $output .= '<span class="price">'. $price_html .'</span>';
							$output .= '</div>';
					
						$output .= '</div>';
					$output .= '</li>';
				}
				wp_reset_postdata();					
			$output .= '</ul>';
			
			$output .= '<div class="slider_pagination"></div>';

		$output .= '</div>'."\n";
		
		wp_reset_postdata();

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Contact Box [contact_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_contact_box' ) )
{
	function sc_contact_box( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'title'			=> '',
			'address' 		=> '',
			'telephone'		=> '',
			'email' 		=> '',
			'www' 			=> '',
			'image' 		=> '',
			'animate' 		=> '',
		), $attr));*/
		
		// background
		if( $attr['image'] ) $image = 'style="background-image:url('. $attr['image'] .');"';
		
		$output = '';
		if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
			$output .= '<div class="get_in_touch" '. $attr['image'] .'>';

				if( $attr['title'] ) $output .= '<h3>'. $attr['title'] .'</h3>';
				$output .= '<div class="get_in_touch_wrapper">';
					$output .= '<ul>';
						if( $attr['address'] ){
							$output .= '<li class="address">';
								$output .= '<span class="icon"><i class="im-icon-location"></i></span>';
								$output .= '<span class="address_wrapper">'. $attr['address'] .'</span>';
							$output .= '</li>';
						}
						if( $attr['telephone'] ){
							$output .= '<li class="phone">';
								$output .= '<span class="icon"><i class="im-icon-phone"></i></span>';
								$output .= '<p><a href="tel:'. $attr['telephone'] .'">'. $attr['telephone'] .'</a></p>';
							$output .= '</li>';
						}
						if( $attr['email'] ){
							$output .= '<li class="mail">';
								$output .= '<span class="icon"><i class="im-icon-mail"></i></span>';
								$output .= '<p><a href="mailto:'. $attr['email'] .'">'. $attr['email'] .'</a></p>';
							$output .= '</li>';
						}
						if( $attr['www'] ){
							$output .= '<li class="www">';
								$output .= '<span class="icon"><i class="in-icon-link"></i></span>';
								$output .= '<p><a target="_blank" href="http://'. $attr['www'] .'">'. $attr['www'] .'</a></p>';
							$output .= '</li>';
						}
					$output .= '</ul>';
				$output .= '</div>';				
			
			$output .= '</div>'."\n";
		if( $attr['animate'] ) $output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Popup [popup][/popup]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_popup' ) )
{
	function sc_popup( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title'			=> '',
			'padding'		=> '',
			'button' 		=> '',
			'uid'			=> 'popup-'. uniqid(),
		), $attr));

		// padding
		if( $padding ){
			$padding = 'style="padding:'. $padding .'px;"';
		} else {
			$padding = false;
		}
		
		$output = '';

		if( $button ){
			$output .= '<a href="#'. $uid .'" rel="prettyPhoto" class="popup-link button button_js"><span class="button_label">'. $title .'</span></a>';
		} else {
			$output .= '<a href="#'. $uid .'" rel="prettyPhoto" class="popup-link">'. $title .'</a>';
		}
		
		$output .= '<div id="'. $uid .'" class="popup-content">';
			$output .= '<div class="popup-inner" '. $padding .'>'. do_shortcode($content) .'</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Info Box [info_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_info_box' ) )
{
	function sc_info_box( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'title'			=> '',
			'image' 		=> '',
			'animate' 		=> '',
		), $attr));*/
		
		// background
		if( $attr['image'] ) $image = 'style="background-image:url('.XOOPS_URL.'/themes/themebuilder/texture/bg/'. $attr['image'] .');"';
		
		$output = '';
		if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
			$output .= '<div class="infobox" '. $image .'>';

				if( $attr['title'] ) $output .= '<h3>'. $attr['title'] .'</h3>';
				$output .= '<div class="infobox_wrapper">';
					$output .= $content;
				$output .= '</div>';
					
			$output .= '</div>'."\n";
		if( $attr['animate'] ) $output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Opening hours [opening_hours]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_opening_hours' ) )
{
	function sc_opening_hours( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'title'			=> '',
			'image' 		=> '',
			'animate' 		=> '',
		), $attr));*/
		
		// background
		if( $attr['image'] ) $image = 'style="background-image:url('. $attr['image'] .');"';
		
		$output = '';
		if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
			$output .= '<div class="opening_hours" '. $attr['image'] .'>';
			
		
				if( $attr['title'] ) $output .= '<h3>'. $title .'</h3>';
				$output .= '<div class="opening_hours_wrapper">';
					$output .= $content;
				$output .= '</div>';

			$output .= '</div>'."\n";
		if( $attr['animate'] ) $output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Divider [divider]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_divider' ) )
{
	function sc_divider( $attr, $content = null )
	{
	    /*extract(shortcode_atts(array(
		    'height' 		=> 0,
		    'style' 		=> '',		// default, dots, zigzag
		    'line'			=> '',		// default, narrow, wide, 0 = no_line
		    'themecolor'	=> '',
	    ), $attr));*/
	    
	    // classes
	    $class = '';
	    if( $attr['themecolor'] ) 	$class .= ' hr_color';
	    
		// height
		if( $attr['height'] ){
			$inlinecss = 'style="margin: 0 auto '. intval( $attr['height'] ) .'px;"';
		} else {
			$inlinecss = '';
		}
	    
	    switch( $attr['style'] ){
	    	case 'dots':
	    		$output = '<div class="hr_dots" '. $inlinecss .'><span></span><span></span><span></span></div>'."\n";
	    		break;
	    	case 'zigzag':
	    		$output = '<div class="hr_zigzag" '. $inlinecss .'><i class="fa-icon-down-open"></i><i class="fa-icon-down-open"></i><i class="fa-icon-down-open"></i></div>'."\n";
	    		break;
	    	default:
	    		if( $attr['line'] == 'narrow' ){
	    			$output = '<hr class="hr_narrow '. $class .'" '. $inlinecss .'/>'."\n";
	    		} elseif( $attr['line'] == 'wide' ) {
	    			$output = '<div class="hr_wide '. $class .'" '. $inlinecss .'><hr /></div>'."\n";
	    		} elseif( $attr['line'] ) {
	    			$output = '<hr class="'. $class .'" '. $inlinecss .'/>'."\n";
	    		} else {
	    			$output = '<hr class="no_line" '. $inlinecss .'/>'."\n";
	    		}
	    }
	    
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Google Font [google_font]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_google_font' ) )
{
	function sc_google_font( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'font' 		=> '',
			'subset' 	=> '',
			'size' 		=> '25',
		), $attr));
		
		$font_slug	= str_replace(' ', '+', $font);
		
		// subset
		if( $subset ){
			$subset	= '&amp;subset='. str_replace(' ', '', $subset);
		} else {
			$subset = false;	
		}	
	
		$output = '<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family='. $font_slug .':400'. $subset .'">'."\n";
		$output .= '<div class="google_font" style="font-family:\''. $font .'\'; font-size:'. $size .'px; line-height:'. $size .'px;">'. do_shortcode($content) .'</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Sidebar Widget [sidebar_widget]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_sidebar_widget' ) )
{
	function sc_sidebar_widget( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'sidebar' 		=> '',
		), $attr));
		
		$output = '';
		
		if( $sidebar !== '' && $sidebar !== false ){
			
			$sidebars = mfn_opts_get( 'sidebars' );
			$sidebar = $sidebars[$sidebar];
			
			ob_start();
			dynamic_sidebar( $sidebar );
			$output = ob_get_clean();
		}
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Pricing Item [pricing_item] [/pricing_item]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pricing_item' ) )
{
	function sc_pricing_item( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'title'			=> '',
			'currency' 		=> '',
			'price' 		=> '',
			'period' 		=> '',
			'subtitle' 		=> '',
			'link_title'	=> '',
			'link' 			=> '',
			'featured' 		=> '',
			'style' 		=> 'box',
			'animate' 		=> '',
		), $attr));*/
		
		// classes
		$classes = '';
		if( $attr['featured'] ) $classes .= ' pricing-box-featured';
		if( $attr['style'] ) 	$classes .= ' pricing-box-'. $attr['style'];
	
		$output = '<div class="pricing-box '. $classes .'">';
			if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
			
				$output .= '<div class="plan-header">';
					if( $attr['title'] ) $output .= '<h2>'. $attr['title'] .'</h2>';	
					if( $attr['price'] ){ 
						$output .= '<div class="price">';
							$output .= '<sup class="currency">'. $attr['currency'] .'</sup>';
							$output .= '<span>'. $attr['price'] .'</span>';
							$output .= '<sup class="period">'. $attr['period'] .'</sup>';
						$output .= '</div>';
						$output .= '<hr class="hr_color" />';
						if( $attr['subtitle'] ) $output .= '<p class="subtitle"><big>'. $attr['subtitle'] .'</big></p>';
					}
				$output .= '</div>';
				
				if( $content ){
					$output .= '<div class="plan-inside">';
						$output .= $content;
					$output .= '</div>';
				}
				
				if( $attr['link'] ){
					$output .= '<div class="plan-footer">';
						$output .= '<a href="'. $attr['link'] .'" class="button  button_left button_theme button_js"><span class="button_icon"><i class="fa-icon-basket"></i></span><span class="button_label">'. $attr['link_title'] .'</span></a>';
					$output .= '</div>';
				}
			
			if( $attr['animate'] ) $output .= '</div>';
		$output .= '</div>'."\n";
			
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Call to Action [call_to_action] [/call_to_action]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_call_to_action' ) )
{
	function sc_call_to_action( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'title' 	=> '',
			'icon' 		=> 'icon-lamp',
			'link' 		=> '',
			'class' 	=> '',
			'target' 	=> '',
			'animate' 	=> '',
		), $attr));*/
		
		// target
		if( $attr['target'] ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		$output = '<div class="call_to_action">';
			if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
			
				$output .= '<div class="call_left">';
					$output .= '<h3>'. $attr['title'] .'</h3>';
				$output .= '</div>';
				
				$output .= '<div class="call_center">';
					if( $attr['link'] ) $output .= '<a href="'. $attr['link'] .'" class="'. $attr['class'] .'" '. $target .'>';
						$output .= '<span class="icon_wrapper"><i class="'. $attr['icon'] .'"></i></span>';
					if( $attr['link'] ) $output .= '</a>';
				$output .= '</div>';
				
				$output .= '<div class="call_right">';
					$output .= '<div class="desc">'. $content .'</div>';
				$output .= '</div>';
			
			if( $attr['animate'] ) $output .= '</div>';
		$output .= '</div>'."\n";
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Chart [chart]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_chart' ) )
{
	function sc_chart( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'percent' 		=> '',
			'label' 		=> '',
			'icon'	 		=> '',
			'image'	 		=> '',
			'title' 		=> '',
		), $attr));*/
		
		// color
		if( $_GET && key_exists('mfn-c', $_GET) ){
			$color = '#D69942';
		} else {
			$color =  '#2991D6';
		}
		
		$output = '<div class="chart_box">';
			$output .= '<div class="chart" data-percent="'. intval($attr['percent']) .'" data-color="'.  $color .'">';
				if( $attr['image'] ){
					$output .= '<div class="image"><img src="'. $attr['image'] .'" alt="'. $attr['percent'] .'" class="scale-with-grid" /></div>';
				} elseif( $attr['icon'] ){
					$output .= '<div class="icon"><i class="'. $attr['icon'] .'"></i></div>';
				} else {
					$output .= '<div class="num">'. $attr['label'] .'</div>';
				}
			$output .= '</div>';
			$output .= '<p><big>'. $attr['title'] .'</big></p>';
		$output .= '</div>'."\n";
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Counter [counter]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_counter' ) )
{
	function sc_counter( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'icon' 			=> '',
			'color' 		=> '',
			'imagecounter' 		=> '',
			'number' 		=> '',
			'title' 		=> '',
			'type'	 		=> 'vertical',
			'animate'	 	=> '',
		), $attr));*/
		
		// color
		if( $attr['color'] ){
			$color = 'style="color:'. $attr['color'] .';"';
		} else {
			$color = false;
		}
		
		//var_dump($attr);
		$output = '<div class="counter animate-math counter_'. $attr['type'] .'">';
			if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
			
				$output .= '<div class="icon_wrapper">';
					if( $attr['imagecounter'] ){
						$output .= '<img src="'. $attr['imagecounter'] .'" alt="'. $attr['title'] .'" />';
					} elseif( $attr['icon'] ){
						$output .= '<i class="'. $attr['icon'] .'" '. $color .'></i>';
					}
				$output .= '</div>';
				
				$output .= '<div class="desc_wrapper">';
					if( $attr['number'] ) $output .= '<div class="number" data-to="'. $attr['number'] .'">0</div>';
					if( $attr['title'] )  $output .= '<p class="title">'. $attr['title'] .'</p>';
				$output .= '</div>';
			
			if( $attr['animate'] ) $output .= '</div>'."\n";
		$output .= '</div>'."\n";
		
		$output .= '<script>
		
		$(".animate-math .number").waypoint({
			offset		: "100%",
			triggerOnce	: true,
			handler		: function(){
				var el			= $(this);
				var duration	= Math.floor((Math.random()*1000)+1000);
				var to			= el.attr("data-to");

				$({property:0}).animate({property:to}, {
					duration	: duration,
					easing		:"linear",
					step		: function() {
						el.text(Math.floor(this.property));
					},
					complete	: function() {
						el.text(this.property);
					}
				});
			}
		});
		
		</script>';
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Icon [icon]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_icon' ) )
{
	function sc_icon( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'type' => '',
		), $attr));*/
		
		$output = '<i class="'. $attr['type'] .'"></i>';
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Icon Block [icon_block]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_icon_block' ) )
{
	function sc_icon_block( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'icon'	=> '',
			'align'	=> '',
			'color'	=> '',
			'size'	=> 25,
		), $attr));*/

		// classes
		$class = '';
		if( $attr['align'] ) $class .= ' icon_'. $attr['align'];
		if( $attr['color'] ){
			$color = ' color:'. $attr['color'] .';';
		} else {
			$class .= ' themecolor';
		}
			
		$output = '<span class="single_icon '. $class .'">';
			$output .= '<i style="font-size: '. $attr['size'] .'px; line-height: '. $attr['size'] .'px; '. $color .'" class="'. $attr['icon'] .'"></i>';
		$output .= '</span>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Image [image]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_image' ) )
{
	function sc_image( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'src'			=> '',
			'border'			=> '',
			'alt'			=> '',
			'caption'		=> '',
			'margin'		=> '',
			'align'			=> 'none',
			'link'			=> '',
			'link_image'	=> '',
			'target'		=> '',
			'animate'		=> '',
		), $attr));*/
		
		// align
		if( $attr['align'] ) $align = ' align'. $attr['align'];
		
		// target
		if( $attr['target'] ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		// margin
		if( $attr['margin'] ){
			$margin = 'style="margin-top:'. intval( $attr['margin'] ) .'px"';
		} else {
			$margin = false;
		}
		
		// border
		if( $attr['border'] ){
			$border = ' has_border';
		} else {
			$border = ' no_border';
		}

		// hoover icon
		if( $attr['link_image'] ){
			$class	= 'zoom prettyphoto';
			$target = false;
			$icon	= 'fa-icon-search';
		} else {
			$class 	= 'link';
			$icon	= 'fa-icon-link';
		}
		
		// link
		if( $attr['link_image'] ) $link = $attr['link_image'];
		
		$output = '';
		if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
		
			if( $link ) {

				$output .= '<div class="image_frame scale-with-grid'. $border . $align .'" '. $margin .'>';
					$output .= '<div class="image_wrapper">';
						$output .= '<a href="'. $link .'" class="'. $class .'" '. $target .'>';
							$output .= '<div class="mask"></div>';
							$output .= '<img class="scale-with-grid" src="'. $attr['src'] .'" alt="'. $attr['alt'] .'" />';
						$output .= '</a>';
						$output .= '<div class="image_links">';
							$output .= '<a href="'. $link .'" class="'. $class .'" '. $target .'><i class="'. $icon .'"></i></a>';
						$output .= '</div>';
					$output .= '</div>';
					if( $attr['caption'] ) $output .= '<p class="wp-caption-text">'. $attr['caption'] .'</p>';					
				$output .= '</div>'."\n";

			} else {
				
				$output .= '<div class="image_frame no_link scale-with-grid'. $border . $align .'" '. $margin .'>';
					$output .= '<div class="image_wrapper">';
						$output .= '<img class="scale-with-grid" src="'. $attr['src'] .'" alt="'. $attr['alt'] .'" />';
					$output .= '</div>';
					if( $caption ) $output .= '<p class="wp-caption-text">'. $attr['caption'] .'</p>';
				$output .= '</div>'."\n";
				
			}
			
		if( $attr['animate'] ) $output .= '</div>'."\n";
	
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Quick Fact [quick_fact]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_quick_fact' ) )
{
	function sc_quick_fact( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'number' 	=> '',
			'title' 	=> '',
			'animate' 	=> '',
		), $attr));*/
var_dump($attr);
		$output = '<div class="quick_fact animate-math">';
			if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
			
				if( $attr['number'] ) $output .= '<div class="number" data-to="'. $attr['number'] .'">0</div>';
				if( $attr['title'] ) $output .= '<h3 class="title">'. $attr['title'] .'</h3>';
				$output .= '<hr class="hr_narrow" />';
				$output .= '<div class="desc">'. $content .'</div>';
			
			if( $attr['animate'] ) $output .= '</div>';
		$output .= '</div>'."\n";

		$output .= '<script>
		$(".animate-math .number").waypoint({
			offset		: "100%",
			triggerOnce	: true,
			handler		: function(){
				var el			= $(this);
				var duration	= Math.floor((Math.random()*1000)+1000);
				var to			= el.attr("data-to");

				$({property:0}).animate({property:to}, {
					duration	: duration,
					easing		:"linear",
					step		: function() {
						el.text(Math.floor(this.property));
					},
					complete	: function() {
						el.text(this.property);
					}
				});
			}
		});
		</script>';
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Button [button]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_button' ) )
{
	function sc_button( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'title' 		=> 'Read more',
			'icon' 			=> '',
			'icon_position' => 'left',
			'link' 			=> '',
			'target' 		=> '',
			'color' 		=> '',
			'large' 		=> '',
			'class' 		=> '',
			'download' 		=> '',
		), $attr));*/
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		// download
		if( $download ){
			$download = 'download="'. $download .'"';
		} else {
			$download = false;
		}
		
		// icon_position
		if( $icon_position != 'left' ){
			$icon_position = 'right';
		}
		
		// class
		if( $icon )		$class .= ' button_'. $icon_position;
		if( $large ) 	$class .= ' button_large';
		
		// custom color
		$style = false;
		if( $color ){
			if( strpos($color, '#') === 0 ){
				$style = ' style="background-color:'. $color .' !important"';
			} else {
				$class .= ' button_'. $color;
			}
		}
		
		$output = '<a class="button '. $class .' button_js" href="'. $link .'" '. $target .' '. $style .' '. $download .'>';
			if( $icon )	$output .= '<span class="button_icon"><i class="'. $icon .'"></i></span>';
			if( $title ) $output .= '<span class="button_label">'. $title .'</span>';
		$output .= '</a>'."\n";
	
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Icon Bar [icon_bar]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_icon_bar' ) )
{
	function sc_icon_bar( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'icon' 			=> 'icon-lamp',
			'link' 			=> '',
			'target' 		=> '',
			'size' 			=> '',
			'social' 		=> '',
		), $attr));
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		// class
		$class = '';
		if( $social ) 	$class .= ' icon_bar_'. $social;
		if( $size ) 	$class .= ' icon_bar_'. $size;
		
		$output = '<a href="'. $link .'" class="icon_bar '. $class .'" '. $target .'>';
			$output .= '<span class="t"><i class="'. $icon .'"></i>';
			$output .= '</span><span class="b"><i class="'. $icon .'"></i></span>';
		$output .= '</a>'."\n";
	
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Alert [alert] [/alert]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_alert' ) )
{
	function sc_alert( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'style'		=> 'warning',
		), $attr));

		switch( $style ){
			case 'error':
				$icon = 'icon-alert';
				break;
			case 'info':
				$icon = 'icon-help';
				break;
			case 'success':
				$icon = 'icon-check';
				break;
			default:
				$icon = 'icon-lamp';
				break;
		}
			
		$output  = '<div class="alert alert_'. $style .'">';
			$output  .= '<div class="alert_icon">';
				$output .= '<i class="'. $icon .'"></i>';
			$output .= '</div>';
			$output .= '<div class="alert_wrapper">';
				$output .= do_shortcode( $content );
			$output .= '</div>';
			$output .= '<a href="#" class="close"><i class="icon-cancel"></i></a>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Idea [idea] [/idea]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_idea' ) )
{
	function sc_idea( $attr, $content = null )
	{			
		$output  = '<div class="idea_box">';
			$output  .= '<div class="icon"><i class="im-icon-lamp-4"></i></div>';
			$output  .= '<div class="desc">'. $content .'</div>';
		$output .= '</div>'."\n";		

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Dropcap [dropcap] [/dropcap]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_dropcap' ) )
{
	function sc_dropcap( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'background' 	=> '',
			'color' 		=> '',
			'circle' 		=> '',
		), $attr));

		// circle
		if( $circle ){
			$class = ' dropcap_circle';
		} else {
			$class = false;
		}

		$style = '';
		if( $background ) $style .= 'background-color:'. $background .';';
		if( $color ) $style .= ' color:'. $color .';';
		if( $style ) $style = 'style="'. $style .'"';
			
		$output  = '<span class="dropcap'. $class .'" '. $style .'>';
			$output .= do_shortcode( $content );
		$output .= '</span>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Highlight [highlight] [/highlight]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_highlight' ) )
{
	function sc_highlight( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'background' 	=> '',
			'color' 		=> '',
		), $attr));

		// style
		$style = '';
		if( $background ) $style .= 'background-color:'. $background .';';
		if( $color ) $style .= ' color:'. $color .';';
		if( $style ) $style = 'style="'. $style .'"';
							
		$output  = '<span class="highlight" '. $style .'>';
			$output .= do_shortcode($content);
		$output .= '</span>'."\n";
	
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Tooltip [tooltip] [/tooltip]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_tooltip' ) )
{
	function sc_tooltip( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'hint' 			=> '',
		), $attr));

		$output = '';
		if( $hint ){
			$output .= '<span class="tooltip" data-tooltip="'. $hint .'" ontouchstart="this.classList.toggle(\'hover\');">';
				$output .= do_shortcode( $content );
			$output .= '</span>'."\n";
		}

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Content Link [content_link]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_content_link' ) )
{
	function sc_content_link( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' 	=> '',
			'icon' 		=> '',
			'link' 		=> '',
			'target' 	=> '',
			'class' 	=> '',
			'download' 	=> '',
		), $attr));

		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		// download
		if( $download ){
			$download = 'download="'. $download .'"';
		} else {
			$download = false;
		}

		$output = '<a class="content_link '. $class .'" href="'. $link .'" '. $target .' '. $download .'>';
			if( $icon )	$output .= '<span class="icon"><i class="'. $icon .'"></i></span>';
			if( $title ) $output .= '<span class="title">'. $title .'</span>';
		$output .= '</a>';
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Blockquote [blockquote] [/blockquote]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_blockquote' ) )
{
	function sc_blockquote( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'author'	=> '',
			'link'		=> '',
			'target'	=> '',
		), $attr));*/
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		$output = '<div class="blockquote">';
			$output .= '<blockquote>'. $content .'</blockquote>';
			if( $author ){
				$output .= '<p class="author">';
					$output .= '<i class="icon-user"></i>';
					if( $link ){ 
						$output .= '<a href="'. $link .'" '. $target .'>'. $author .'</a>';
					} else {
						$output .= '<span>'. $author .'</span>';
					}
				$output .= '</p>';
			}
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Clients [clients]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_clients' ) )
{
	function sc_clients( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'in_row' 	=> 6,
			'category' 	=> '',
			'style' 	=> '',
		), $attr));
		
		// style
		if( $style ){
			$style = 'clients_tiles';
		} else {
			$style = false;
		}
	
		if( ! intval( $in_row ) ) $in_row = 6;
	
		$args = array(
			'post_type' 		=> 'client',
			'posts_per_page'	=> -1,
			'orderby' 			=> 'menu_order',
			'order' 			=> 'ASC',
		);
		if( $category ) $args['client-types'] = $category;
	
		$clients_query = new WP_Query();
		$clients_query->query( $args );
	
		$output  = '<ul class="clients '. $style .'">';
		if ($clients_query->have_posts())
		{
			$i = 1;
			$width = round( (100 / $in_row), 3 );

			while ($clients_query->have_posts())
			{

				$clients_query->the_post();
				$output .= '<li style="width:'. $width .'%">';
					$output .= '<div class="client_wrapper">';
						$link = get_post_meta(get_the_ID(), 'mfn-post-link', true);
						if( $link ) $output .= '<a target="_blank" href="'. $link .'" title="'. the_title(false, false, false) .'">';
							$output .= get_the_post_thumbnail( null, 'clients-slider', array('class'=>'scale-with-grid') );
						if( $link ) $output .= '</a>';
					$output .= '</div>';
				$output .= '</li>';
	
				$i++;
			}
		}
		wp_reset_query();
		$output .= '</ul>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Fancy Heading [fancy_heading] [/fancy_heading]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'fancy_heading' ) )
{
	function sc_fancy_heading( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'title'		=> '',
			'h1'		=> '',
			'icon' 		=> '',
			'slogan' 	=> '',
			'style' 	=> 'icon',	// icon, line, arrows
			'animate' 	=> '',
		), $attr));*/
	
		$output = '<div class="fancy_heading fancy_heading_'. $attr['style'].'">';	
			if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
				
				if( $attr['icon'] && $attr['style'] == 'icon' ) $output .= '<span class="icon_top"><i class="'. $attr['icon'] .'"></i></span>';
				if( $attr['slogan'] && $attr['style'] == 'line' ) $output .= '<span class="slogan">'. $attr['slogan'] .'</span>';
				if( $attr['style'] =='arrows' ) $attr['title'] = '<i class="icon-right-dir"></i>'. $attr['title'] .'<i class="icon-left-dir"></i>';
				if( $attr['title'] ){
					if( $h1 ){
						$output .= '<h1 class="title">'. $attr['title'] .'</h1>';
					} else {
						$output .= '<h2 class="title">'. $attr['title'] .'</h2>';
					}
				}
				if( $content ) $output .= '<div class="inside">'. $content .'</div>';
			
			if( $attr['animate'] ) $output .= '</div>';
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Icon Box [icon_box] [/icon_box]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_icon_box' ) )
{
	function sc_icon_box( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'title'			=> '',
			'icon'			=> '',
			'image'			=> '',
			'icon_position'	=> 'top',
			'border'		=> '',
			'link'			=> '',
			'target'		=> '',
			'animate'		=> '',
			'class'			=> '',
		), $attr));*/
	
		// border
		if( $attr['border'] ){
			$border = 'has_border';
		} else {
			$border = 'no_border';
		}
		
		// target
		if( $attr['target'] ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		$output = '';
		if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
			$output .= '<div class="icon_box icon_position_'. $attr['icon_position'] .' '. $border .'">';
				if( $attr['link'] ) $output .= '<a class="'. $attr['class'] .'" href="'. $attr['link'] .'" '. $target .'>';
				
					if( $attr['image'] ){
						$output .= '<div class="image_wrapper">';
							$output .= '<img src="'. $attr['image'] .'" alt="'. $attr['title'] .'" class="scale-with-grid" />';
						$output .= '</div>';
					} else {
						$output .= '<div class="icon_wrapper">';
							$output .= '<div class="icon">';
								$output .= '<i class="'. $attr['icon'] .'"></i>';
							$output .= '</div>';
						$output .= '</div>';
					}		
					
					$output .= '<div class="desc_wrapper">';
						if( $attr['title'] ) $output .= '<h4>'. $attr['title'] .'</h4>';
						if( $content )$output .= '<div class="desc">'. $content .'</div>';
					$output .= '</div>';
					
				if( $attr['link'] ) $output .= '</a>';
			$output .= '</div>'."\n";
		if( $attr['animate'] ) $output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Our Team [our_team]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_our_team' ) )
{
	function sc_our_team( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'image' 		=> '',	
			'title' 		=> '',
			'subtitle'		=> '',
			'email' 		=> '',
			'phone' 		=> '',
			'facebook' 		=> '',
			'twitter'		=> '',
			'linkedin'		=> '',
			'style' 		=> 'vertical',
			'animate' 		=> '',
		), $attr));*/
		
		$output = '<div class="team team_'. $attr['style'] .'">';
			if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
		
				$output  .= '<div class="image_frame no_link scale-with-grid">';
					$output .= '<div class="image_wrapper">';
						$output .= '<img class="scale-with-grid" src="'. $attr['image'] .'" alt="'. $attr['title'] .'" />';
					$output .= '</div>';
				$output .= '</div>';
				
				$output .= '<div class="desc_wrapper">';
					if( $attr['title'] ) $output .= '<h4>'. $attr['title'] .'</h4>';
					if( $attr['subtitle'] ) $output .= '<p class="subtitle">'. $attr['subtitle'] .'</p>';
					if( $attr['phone'] ) 	$output .= '<p class="phone"><i class="im-icon-phone-4"></i> <a href="tel:'. $attr['phone'] .'">'. $attr['phone'] .'</a></p>';
					$output .= '<hr class="hr_color" />';
					
					$output .= '<div class="desc">'. $content .'</div>';
					
					if( $attr['email'] || $attr['phone'] || $attr['facebook'] || $attr['twitter'] || $attr['linkedin'] ){
						$output .= '<div class="links">';
							if( $attr['email'] ) 	$output .= '<a href="mailto:'. $attr['email'] .'" class="icon_bar icon_bar_small"><span class="t"><i class="im-icon-mail-send"></i></span><span class="b"><i class="im-icon-mail-send"></i></span></a>';
							if( $attr['facebook'] ) $output .= '<a target="_blank" href="'. $attr['facebook'] .'" class="icon_bar icon_bar_small"><span class="t"><i class="fa-icon-facebook"></i></span><span class="b"><i class="fa-icon-facebook"></i></span></a>';
							if( $attr['twitter'] ) 	$output .= '<a target="_blank" href="'. $attr['twitter'] .'" class="icon_bar icon_bar_small"><span class="t"><i class="fa-icon-twitter"></i></span><span class="b"><i class="fa-icon-twitter"></i></span></a>';
							if( $attr['linkedin'] ) $output .= '<a target="_blank" href="'. $attr['linkedin'] .'" class="icon_bar icon_bar_small"><span class="t"><i class="fa-icon-linkedin"></i></span><span class="b"><i class="fa-icon-linkedin"></i></span></a>';
						$output .= '</div>';
					}
				$output .= '</div>';

			if( $attr['animate'] )  $output .= '</div>';	
		$output .= '</div>'."\n";	
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Our Team List [our_team_list]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_our_team_list' ) )
{
	function sc_our_team_list( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'image' 		=> '',	
			'title' 		=> '',
			'subtitle'		=> '',
			'blockquote'	=> '',
			'email' 		=> '',
			'phone' 		=> '',
			'facebook' 		=> '',
			'twitter'		=> '',
			'linkedin'		=> '',
		), $attr));*/
		
		$output = '<div class="team team_list">';
		
			$output .= '<div class="column col-sm-3 col-md-3">';
				$output .= '<div class="image_frame no_link scale-with-grid">';
					$output .= '<div class="image_wrapper">';
						$output .= '<img class="scale-with-grid" src="'. $attr['image'] .'" alt="'. $attr['title'] .'" />';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';
			
			$output .= '<div class="column col-sm-6 col-md-6">';
				$output .= '<div class="desc_wrapper">';
					if( $attr['title'] ) $output .= '<h4>'. $attr['title'] .'</h4>';
					if( $attr['subtitle'] ) $output .= '<p class="subtitle">'. $attr['subtitle'] .'</p>';
					if( $attr['phone'] ) 	$output .= '<p class="phone"><i class="im-icon-phone-4"></i> <a href="tel:'. $attr['phone'] .'">'. $attr['phone'] .'</a></p>';
					$output .= '<hr class="hr_color" />';
					
					$output .= '<div class="desc">'. $content .'</div>';
				$output .= '</div>';
			$output .= '</div>';
			
			$output .= '<div class="column col-sm-3 col-md-3">';
				$output .= '<div class="bq_wrapper">';
					if( $attr['blockquote'] ) $output .= '<blockquote>'. $attr['blockquote'] .'</blockquote>';
					
					if( $attr['email'] || $attr['phone'] || $attr['facebook'] || $attr['twitter'] || $attr['linkedin'] ){
						$output .= '<div class="links">';
							if( $attr['email'] ) 	$output .= '<a href="mailto:'. $attr['email'] .'" class="icon_bar icon_bar_small"><span class="t"><i class="im-icon-mail-send"></i></span><span class="b"><i class="im-icon-mail-send"></i></span></a>';
							if( $attr['facebook'] ) $output .= '<a target="_blank" href="'. $attr['facebook'] .'" class="icon_bar icon_bar_small"><span class="t"><i class="fa-icon-facebook"></i></span><span class="b"><i class="fa-icon-facebook"></i></span></a>';
							if( $attr['twitter'] ) 	$output .= '<a target="_blank" href="'. $attr['twitter'] .'" class="icon_bar icon_bar_small"><span class="t"><i class="fa-icon-twitter"></i></span><span class="b"><i class="fa-icon-twitter"></i></span></a>';
							if( $attr['linkedin'] ) $output .= '<a target="_blank" href="'. $attr['linkedin'] .'" class="icon_bar icon_bar_small"><span class="t"><i class="fa-icon-linkedin"></i></span><span class="b"><i class="fa-icon-linkedin"></i></span></a>';
						$output .= '</div>';
					}
				$output .= '</div>';
			$output .= '</div>';

		$output .= '</div>'."\n";	
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Portfolio [portfolio]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_portfolio' ) )
{
	function sc_portfolio( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'count' 		=> '2',
			'category' 		=> '',
			'orderby' 		=> 'date',
			'order' 		=> 'DESC',
			'style'			=> 'one',
			'pagination'	=> '',
		), $attr));

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );
		$args = array(
			'post_type' 			=> 'portfolio',
			'posts_per_page' 		=> intval($count),
			'paged' 				=> $paged,
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'ignore_sticky_posts' 	=> 1,
		);
		if( $category ) $args['portfolio-types'] = $category;

		$query_portfolio = new WP_Query( $args );
		
		$output = '<div class="portfolio_wrapper isotope_wrapper">';
		
			$output .= '<ul class="portfolio_group isotope '. $style .'">';
				$output .= mfn_content_portfolio( $query_portfolio, $style );
			$output .= '</ul>';
			
			if( $pagination ) $output .= mfn_pagination( $query_portfolio );
		
		$output .= '</div>'."\n";
		
		wp_reset_postdata();

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Portfolio Grid [portfolio_grid]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_portfolio_grid' ) )
{
	function sc_portfolio_grid( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'count' 		=> '4',
			'category' 		=> '',
			'orderby' 		=> 'date',
			'order' 		=> 'DESC',
		), $attr));

		$args = array(
			'post_type' 			=> 'portfolio',
			'posts_per_page' 		=> intval($count),
			'paged' 				=> -1,
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'ignore_sticky_posts' 	=> 1,
		);
		if( $category ) $args['portfolio-types'] = $category;

		$query = new WP_Query();
		$query->query( $args );
		$post_count = $query->post_count;

		if ($query->have_posts())
		{
			$output  = '<ul class="portfolio_grid">';
				while ($query->have_posts())
				{
					$query->the_post();
	
					$output .= '<li>';
						$output .= '<div class="image_frame scale-with-grid">';
							$output .= '<div class="image_wrapper">';
								$output .= mfn_post_thumbnail( get_the_ID(), 'portfolio' );
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</li>';
				}
			$output .= '</ul>'."\n";
		}
		wp_reset_query();

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Portfolio Slider [portfolio_slider]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_portfolio_slider' ) )
{
	function sc_portfolio_slider( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'count' 		=> '5',
			'category' 		=> '',
			'orderby' 		=> 'date',
			'order' 		=> 'DESC',
		), $attr));

		$args = array(
			'post_type' 			=> 'portfolio',
			'posts_per_page' 		=> intval($count),
			'paged' 				=> -1,
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'ignore_sticky_posts' 	=> 1,
		);
		if( $category ) $args['portfolio-types'] = $category;

		$query = new WP_Query();
		$query->query( $args );

		if ($query->have_posts())
		{
			$output  = '<div class="portfolio_slider">';
				$output .= '<ul class="portfolio_slider_ul">';
				while ($query->have_posts())
				{
					$query->the_post();
	
					$output .= '<li>';
						$output .= '<div class="image_frame scale-with-grid">';
							$output .= '<div class="image_wrapper">';
								$output .= mfn_post_thumbnail( get_the_ID(), 'portfolio' );
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</li>';
				}
				$output .= '</ul>';
			$output .= '</div>'."\n";
		}
		wp_reset_query();

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Slides [slides]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_slider' ) )
{
	function sc_slider( $attr, $content = null )
	{
		/*$output = '<pre>';
		$output .= htmlspecialchars($attr['content']);
		$output .= '</pre>';*/
		include(XOOPS_ROOT_PATH."/themes/themebuilder/slidertopage.php");
		$output =  '<div class="olivee-item-contentdiv">';
		$rest = substr($attr['content'], 3, -2);
		//$$rest = 'slider to add later';
		//var_dump($$rest);
		$output .=  "\n".$$rest."\n";
		$output .=  "</div>\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Offer [offer]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_offer' ) )
{
	function sc_offer( $attr = false, $content = null )
	{
		extract(shortcode_atts(array(
			'category' 	=> '',
		), $attr));
		
		$args = array(
			'post_type'				=> 'offer',
			'posts_per_page'		=> -1,
			'orderby'				=> 'menu_order',
			'order'					=> 'ASC',
			'ignore_sticky_posts'	=> 1,
		);
		if( $category ) $args['offer-types'] = $category;

		$offer_query = new WP_Query();
		$offer_query->query( $args );
		
		$output = '';
		if ($offer_query->have_posts())
		{
			$output .= '<div class="offer">';
				$output .= '<ul class="offer_ul">';

					while ($offer_query->have_posts())
					{
						$offer_query->the_post();
						$output .= '<li class="offer_li">';
						
							$link = get_post_meta( get_the_ID(), 'mfn-post-link', true);
							if( get_post_meta( get_the_ID(), 'mfn-post-target', true) ){
								$target = 'target="_blank"';
							} else {
								$target = false;
							}
						
							$output .= '<div class="image_wrapper">';
								$output .= get_the_post_thumbnail( get_the_ID(), 'full', array('class'=>'scale-with-grid' ) );
							$output .= '</div>';
							
							$output .= '<div class="desc_wrapper">';
							
								$output .= '<div class="title">';
									$output .= '<h3>'. get_the_title() .'</h3>';
									if( $link ) $output .= '<a href="'. $link .'" class="button button_js" '. $target .'><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">'. get_post_meta( get_the_ID(), 'mfn-post-link_title', true) .'</span></a>';
								$output .= '</div>';
								
								$output .= '<div class="desc">';
									$output .=  apply_filters( 'the_content', get_the_content() );
								$output .= '</div>';
								
							$output .= '</div>';
		
						$output .= '</li>';
					}

				$output .= '</ul>';
				$output .= '<a class="button button_large button_js slider_prev" href="#"><span class="button_icon"><i class="icon-up-open-big"></i></span></a>';
				$output .= '<div class="slider_pagination"><span class="current">1</span> / <span class="count">1</span></div>';
				$output .= '<a class="button button_large button_js slider_next" href="#"><span class="button_icon"><i class="icon-down-open-big"></i></span></a>';	
			$output .= '</div>'."\n";
		}
		wp_reset_query();
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Map [map]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_map' ) )
{
	function sc_map( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'lat' 		=> '',
			'lng' 		=> '',
			'zoom' 		=> 13,
			'height' 	=> 200,
			'title'		=> '',
			'uid' 		=> uniqid(),
		), $attr));*/
		
		//wp_enqueue_script( 'google-maps', 'http://maps.google.com/maps/api/js?sensor=false', false, THEME_VERSION, true );
	
		$output = '<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>';

		$output .= '<script>';
			//<![CDATA[
			$output .= 'function google_maps_'. $attr['uid'] .'(){';
				$output .= 'var latlng = new google.maps.LatLng('. $attr['lat'] .','. $attr['lng'] .');';
				$output .= 'var myOptions = {';
					$output .= 'zoom				: '. intval($attr['zoom']) .',';
					$output .= 'center				: latlng,';
					$output .= 'zoomControl			: true,';
					$output .= 'mapTypeControl		: false,';
					$output .= 'streetViewControl	: false,';
					$output .= 'scrollwheel			: false,';       
					$output .= 'mapTypeId			: google.maps.MapTypeId.ROADMAP';
				$output .= '};';
		
				$output .= 'var map = new google.maps.Map(document.getElementById("google-map-area-'. $attr['uid'] .'"), myOptions);';
// 				$output .= 'var image = "'. THEME_URI .'/images/pin.png";';
				$output .= 'var marker = new google.maps.Marker({';
					$output .= 'position			: latlng,';
// 					$output .= 'icon				: image,';
					$output .= 'map					: map';
				$output .= '});';
			
			$output .= '}';
		
			$output .= 'jQuery(document).ready(function($){';
				$output .= 'google_maps_'. $attr['uid'] .'();';
			$output .= '});';	
			//]]>
		$output .= '</script>';
	
		$output .= '<div class="google-map-wrapper">';	
			
			if( $attr['title'] || $content ){
				$output .= '<div class="google-map-contact-wrapper">';	
					$output .= '<div class="get_in_touch">';
						if( $attr['title'] ) $output .= '<h3>'. $attr['title'] .'</h3>';
						$output .= '<div class="get_in_touch_wrapper">';
							$output .= '<ul>';
								$output .= '<li class="address">';
									$output .= '<span class="icon"><i class="icon-location"></i></span>';
									$output .= '<span class="address_wrapper">'. $content .'</span>';
								$output .= '</li>';
							$output .= '</ul>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
			}	
			
			$output .= '<div class="google-map" id="google-map-area-'. $attr['uid'] .'" style="width:100%; height:'. intval($attr['height']) .'px;">&nbsp;</div>';	
		
		$output .= '</div>'."\n";
		/*$output .= '<pre>';
		$output .= $attr['type'];
		$output .= $attr['size'];
		$output .= $attr['fields'];
		$output .= $attr['zoom'];
		$output .= '</pre>';*/
		return $output;
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Tabs [tabs]
 * --------------------------------------------------------------------------- */
global $tabs_array, $tabs_count;
if( ! function_exists( 'sc_tabs' ) )
{
	function sc_tabs( $attr, $content = null )
	{
		global $tabs_array, $tabs_count;
		
		/*extract(shortcode_atts(array(
			'title'	=> '',
			'uid'	=> 'tab-'. uniqid(),
			'tabs'	=> '',
			'type'	=> '',
		), $attr));	
		do_shortcode( $content );*/
		
		// content builder
		if( $attr['tabs'] ){
			$tabs_array = $attr['tabs'];
		}

		$output = '';
		if( is_array( $tabs_array ) )
		{
			if( $attr['title'] ) $output .= '<h4 class="title">'. $attr['title'] .'</h4>';
			$output .= '<div class="jq-tabs'. $attr['title'] .' tabs_wrapper tabs_'. $attr['type'] .'">';
				
				// contant
				$output .= '<ul>';
					$i = 1;
					$output_tabs = '';
					foreach( $tabs_array as $tab )
					{
						$output .= '<li><a href="#'. $uid .'-'. $i .'">'. $tab['title'] .'</a></li>';
						$output_tabs .= '<div id="'. $uid .'-'. $i .'">'.  $tab['content']  .'</div>';
						$i++;
					}
				$output .= '</ul>';
				
				// titles
				$output .= $output_tabs;
				
			$output .= '</div>';
			
			$tabs_array = '';
			$tabs_count = 0;	
		}
		
		$output .= '  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

 
<script>
$(".jq-tabs'. $attr['title'] .'").tabs();
</script>';
		
		/*$output .= '<pre>';
		$output .= $attr['count'];
		$output .= $attr['title'];
		$output .= $attr['tabs'][0]['title'];
		$output .= '</pre>';*/
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * _Tab [tab] _private
 * --------------------------------------------------------------------------- */
$tabs_count = 0;
if( ! function_exists( 'sc_tab' ) )
{
	function sc_tab( $attr, $content = null )
	{
		global $tabs_array, $tabs_count;
		
		/*extract(shortcode_atts(array(
			'title' => 'Tab title',
		), $attr));*/
		
		$tabs_array[] = array(
			'title' => $title,
			'content' => $content 
		);	
		$tabs_count++;
	
		return true;
	}
}


/* ---------------------------------------------------------------------------
 * Accordion [accordion]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_accordion' ) )
{
	function sc_accordion( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'title' 	=> '',
			'tabs' 		=> '',
			'open1st' 	=> '',
			'style' 	=> 'accordion',
		), $attr));*/
		
		// class
		$class = false;	
		if( $attr['open1st'] ) $class = 'open1st';
		if( $attr['style'] == 'toggle' ) $class = 'toggle';
		
		$output  = '';
		
		$output .= '<div class="accordion">';
			if( $attr['title'] ) $output .= '<h4 class="title">'. $attr['title'] .'</h4>';
			$output .= '<div class="mfn-acc'. $attr['title'] .' accordion_wrapper '. $class .'">';
						//$output .= print_r($attr['tabs']);
				if( is_array( $attr['tabs'] ) ){
					// content builder
					foreach( $attr['tabs'] as $tab ){
						$output .= '<div class="question">';
							$output .= '<div class="title"><i class="glyphicon glyphicon-star"></i><i class="icon-minus acc-icon-minus"></i>'. $tab['title'] .'</div>';
							$output .= '<div class="answer">';
								$output .= $tab['content'];	
							$output .= '</div>';
						$output .= '</div>'."\n";
					}
				} else {
					// shortcode
					$output . $content;	
				}
				
			$output .= '</div>';
		$output .= '</div>'."\n";
		
		$output .= ' 
<script>
$(".mfn-acc'. $attr['title'] .'.open1st .question:first-child")
			.addClass("active")
			.children(".answer")
				.show();

		$(".mfn-acc'. $attr['title'] .' .question > .title").click(function(){		
			if($(this).parent().hasClass("active")) {
				$(this).parent().removeClass("active").children(".answer").slideToggle(200);
			}
			else
			{
				if( ! $(this).closest(".mfn-acc'. $attr['title'] .'").hasClass("toggle") ){
					$(this).parents(".mfn-acc'. $attr['title'] .'").children().each(function() {
						if($(this).hasClass("active")) {
							$(this).removeClass("active").children(".answer").slideToggle(200);
						}
					});
				}
				$(this).parent().addClass("active");
				$(this).next(".answer").slideToggle(200);
			}
		});
</script>';
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * FAQ [faq]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_faq' ) )
{
	function sc_faq( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'title' 	=> '',
			'tabs' 		=> '',
			'open1st' 	=> '',
		), $attr));*/
		
		// class
		$class = false;	
		if( $attr['open1st'] ) $class = 'open1st';
		
		$output  = '';
		
		$output .= '<div class="faq">';
			if( $attr['title'] ) $output .= '<h4 class="title">'. $attr['title'] .'</h4>';
			$output .= '<div class="mfn-acc faq_wrapper '. $class .'">';
						
				if( is_array( $attr['tabs'] ) ){
					// content builder
					$i = 0;
					foreach( $attr['tabs'] as $tab ){
						$i++;
						$output .= '<div class="question">';
							$output .= '<div class="title"><span class="num">'. $i .'</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>'. $tab['title'] .'</div>';
							$output .= '<div class="answer">';
								$output .= $tab['content'];	
							$output .= '</div>';
						$output .= '</div>'."\n";
					}
				} else {
					// shortcode
					$output .= $content;	
				}
				
			$output .= '</div>';
		$output .= '</div>'."\n";
		
		$output .= '
		<script>
		
				$(".mfn-acc.open1st .question:first-child")
			.addClass("active")
			.children(".answer")
				.show();

		$(".mfn-acc .question > .title").click(function(){		
			if($(this).parent().hasClass("active")) {
				$(this).parent().removeClass("active").children(".answer").slideToggle(200);
			}
			else
			{
				if( ! $(this).closest(".mfn-acc").hasClass("toggle") ){
					$(this).parents(".mfn-acc").children().each(function() {
						if($(this).hasClass("active")) {
							$(this).removeClass("active").children(".answer").slideToggle(200);
						}
					});
				}
				$(this).parent().addClass("active");
				$(this).next(".answer").slideToggle(200);
			}
		});
		
		
		</script>';
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Progress Bars [progress_bars][bar][/progress_bars]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_progress_bars' ) )
{
	function sc_progress_bars( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'title' => '',
		), $attr));*/
	
	
	$d = explode('[bartitle="', $content);
	
	$array = array();
	foreach($d as $k => $v){
		$d2 = explode('" value="', $v);
		$d2[1] = str_replace('"]', '', trim($d2[1])); 
			if(!empty($v)){
					//unset($array[$k]);
				//}
			$array[$d2[0]] = $d2[1];
			}
	}


		$output = '<div class="progress_bars">';
			if( $attr['title'] ) $output .= '<h4 class="title">'. $attr['title'] .'</h4>';
			$output .= '<ul class="bars_list">';//un seul bar progress a finir plutard pour plusieurs progressbars 
				
				
				if( is_array( $array ) ){
					// content builder
					foreach( $array as $tab => $ts ){
					//$output .=  var_dump ($array) ;
					//$output .=  var_dump ($ts) ;
		$output  .= '<li>';
		
			$output .= '<h6>';
				$output .= $tab;
				$output .= '<span class="label">'. $ts .'%</span>';
			$output .= '</h6>';
			
			$output .= '<div class="bar">';
				$output .= '<span class="progress" style="width:'. $ts .'%"></span>';
			$output .= '</div>';
			
		$output .= '</li>'."\n";				
				
				}
				}else{
				$output .=  $content ;
				}
			$output .= '</ul>';
		$output .= '</div>'."\n";
		
		$output .= '
		<script src="http://localhost/xoops25777/themes/themebuilder/js/waypoints.min.js" type="text/javascript"></script>

		<script>
		
		$(".bars_list").waypoint({
			offset		: "100%",
			triggerOnce	: true,
			handler		: function(){
				$(this).addClass("hover");
			}
		});
		</script>';

		
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * _Bar [bar]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_bar' ) )
{
	function sc_bar( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'title' => '',
			'value' => 0,
		), $attr));*/
	
		$value = intval( $attr['value'] );
	
		$output  = '<li>';
		
			$output .= '<h6>';
				$output .= $attr['title'];
				$output .= '<span class="label">'. $attr['value'] .'%</span>';
			$output .= '</h6>';
			
			$output .= '<div class="bar">';
				$output .= '<span class="progress" style="width:'. $attr['value'] .'%"></span>';
			$output .= '</div>';
			
		$output .= '</li>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Timeline [timeline] [/timeline]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_timeline' ) )
{
	function sc_timeline( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'count' => '',
			'tabs' => '',
		), $attr));*/
		
		$output  = '<ul class="timeline_items">';
		
		if( is_array( $attr['tabs'] ) ){
			// content builder
			foreach( $attr['tabs'] as $tab ){
				$output .= '<li>';
					$output .= '<h3>'. $tab['title'] .'</h3>';
					if( $tab['content'] ){
						$output .= '<div class="desc">';
							$output .= $tab['content'];
						$output .= '</div>';
					}
				$output .= '</li>';
			}
		} else {
			// shortcode
			$output .= $content;
		}
		
		$output .= '</ul>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Testimonials [testimonials]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_testimonials' ) )
{
	function sc_testimonials( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'category' 	=> '',
			'orderby' 	=> 'menu_order',
			'order' 	=> 'ASC',
		), $attr));
		
		$args = array(
			'post_type' 			=> 'testimonial',
			'posts_per_page' 		=> -1,
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'ignore_sticky_posts' 	=>1,
		);
		if( $category ) $args['testimonial-types'] = $category;
		
		$query_tm = new WP_Query();
		$query_tm->query( $args );
		
		$output = '';
		if ($query_tm->have_posts())
		{
			$output .= '<div class="testimonials_slider">';
			
				// photos | pagination
				$output .= '<ul class="slider_images">';
					while ($query_tm->have_posts())
					{
						$query_tm->the_post();
						$output .= '<a href="#">';
							if( has_post_thumbnail() ){
								$output .= get_the_post_thumbnail( null, 'testimonials', array('class'=>'scale-with-grid' ) );
							} else {
								$output .= '<img class="scale-with-grid" src="'. THEME_URI .'/images/testimonials-placeholder.png" alt="'. get_post_meta(get_the_ID(), 'mfn-post-author', true) .'" />';
							}
						$output .= '</a>';
					}
					wp_reset_query();
				$output .= '</ul>';
			
				// testimonials | contant
				$output .= '<ul class="testimonials_slider_ul">';
					while ($query_tm->have_posts())
					{
						$query_tm->the_post();
						$output .= '<li>';
							$output .= '<div class="bq_wrapper">';	
								$output .= '<blockquote>'. get_the_content() .'</blockquote>';	
							$output .= '</div>';	
							$output .= '<div class="hr_dots"><span></span><span></span><span></span></div>';	
							$output .= '<div class="author">';
								$output .= '<h5>';
									if( $link = get_post_meta(get_the_ID(), 'mfn-post-link', true) ) $output .= '<a target="_blank" href="'. $link .'">';
										$output .= get_post_meta(get_the_ID(), 'mfn-post-author', true);
									if( $link ) $output .= '</a>';
								$output .= '</h5>';
								$output .= '<span class="company">'. get_post_meta(get_the_ID(), 'mfn-post-company', true) .'</span>';
							$output .= '</div>';
						$output .= '</li>';
					}
					wp_reset_query();
				$output .= '</ul>';
	
				// navigation
				$output .= '<a class="button button_js slider_prev" href="#"><span class="button_icon"><i class="icon-left-open-big"></i></span></a>';
				$output .= '<a class="button button_js slider_next" href="#"><span class="button_icon"><i class="icon-right-open-big"></i></span></a>';
				
			$output .= '</div>'."\n";
		}
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Vimeo [video]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_video' ) )
{
	function sc_video( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'video' 	=> '',
			'width' 	=> '710',
			'height' 	=> '426',
		), $attr));*/
		$output = '<pre>';
		$output .= $attr['width'];
		$output .= '</pre>';
		
		$output  .= '<div class="content_video">';
			if( is_numeric($attr['video']) ){
				// Vimeo
				$output .= '<iframe class="scale-with-grid" width="'. $attr['width'] .'" height="'. $attr['height'] .'" src="http://player.vimeo.com/video/'. $attr['video'] .'" allowFullScreen></iframe>'."\n";
			} else {
				// YouTube
				$output .= '<iframe class="scale-with-grid" width="'. $attr['width'] .'" height="'. $attr['height'] .'" src="http://www.youtube.com/embed/'. $attr['video'] .'?wmode=opaque" allowfullscreen></iframe>'."\n";
			}
		$output .= '</div>'."\n";
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * _Item [item]								[feature_list][item][/feature_list]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_item' ) )
{
	function sc_item( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title'		=> '',
			'link'		=> '',
			'icon'		=> 'icon-picture',
			'animate'	=> '',
		), $attr));

		$output  = '<li>';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';
				if( $link ) $output .= '<a href="'. $link .'">';
			
					$output .= '<span class="icon">';
						$output .= '<i class="'. $icon .'"></i>';
					$output .= '</span>';
					$output .= '<p>'. $title .'</p>';
					
				if( $link ) $output .= '</a>';
			if( $animate )  $output .= '</div>';
		$output .= '</li>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Feature List [feature_list]				[feature_list][item][/feature_list]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_feature_list' ) )
{
	function sc_feature_list( $attr, $content = null )
	{
		$output = '<div class="feature_list">';
			$output .= '<ul>';
				$output .=  $content ;	// [item]
			$output .= '</ul>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * List [list][/list]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_list' ) )
{
	function sc_list( $attr, $content = null )
	{
		/*extract(shortcode_atts(array(
			'icon'		=> 'icon-picture',
			'image'		=> '',
			'title'		=> '',
			'link'		=> '',
			'target'	=> '',
			'style'		=> 1,
			'animate'	=> '',
		), $attr));*/
		
		// target
		if( $attr['target'] ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		$output = '<div class="list_item lists_'. $attr['style'] .'">';
			if( $attr['animate'] ) $output .= '<div class="animate" data-anim-type="'. $attr['animate'] .'">';
				if( $attr['link'] ) $output .= '<a href="'. $attr['link'] .'" '. $target .'>';
			
					if( $attr['style'] == 4 ){
						$output .= '<div class="circle">'. $attr['title'] .'</div>';
					} elseif( $attr['image'] ){
						$output .= '<div class="list_left list_image">';
							$output .= '<img src="'. $attr['image'] .'" alt="'. $attr['title'] .'" class="scale-with-grid" />';
						$output .= '</div>';
					} else {
						$output .= '<div class="list_left list_icon">';
							$output .= '<i class="'. $attr['icon'] .'"></i>';
						$output .= '</div>';
					}
					$output .= '<div class="list_right">';
						if( $attr['title'] && $attr['style'] != 4 ) $output .= '<h4>'. $attr['title'] .'</h4>';
						$output .= '<div class="desc">'. $content .'</div>';
					$output .= '</div>';
	
				if( $attr['link'] ) $output .= '</a>';			
			if( $attr['animate'] )  $output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Slides [slides]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_slider1' ) )
{
	function sc_slider1( $attr, $content = null )
	{

		$output = '';
			$output .= '<div class="content_slider">';
				$output .= '<ul class="content_slider_ul">';
						$output .= "\n".$attr['content']."\n";
				$output .= '</ul>';
				
				$output .= '<a class="button button_js slider_prev" href="#"><span class="button_icon"><i class="fa-icon-arrow-left"></i></span></a>';
				$output .= '<a class="button button_js slider_next" href="#"><span class="button_icon"><i class="fa-icon-arrow-right"></i></span></a>';
				$output .= '<div class="slider_pagination"></div>';
				
			$output .= '</div>'."\n";
		

		return $output;
	}
}

if( ! function_exists( 'mfn_builder_print' ) )
{
	/**
	 * PRINT Builder
	 *
	 * @param int $post_id
	 * @param bool $content_field
	 */
	function mfn_builder_print( $mfn_items, $content_field = false ){

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
		$output = '';

		// Sidebars list
		//$sidebars = mfn_opts_get( 'sidebars' );


		// $mfn_items | Wraps with Items => Sections ------------------------------------

		//$mfn_items = get_post_meta( $post_id, 'mfn-page-items', true );


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

		} else*/if( is_array( $mfn_items ) ){
			//include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/include/fonctions.php';	


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

						//if( mfn_parallax_plugin() == 'translate3d' ){
							//if( mfn_is_mobile() ){
								//$section_bg['attachment'] = 'background-attachment:scroll';
							//} else {
								$section_bg = array();
							//}
						//}

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

				$output .= '<div class="section mcb-section '. $section_class .'" '. $section_id .' style="'. $section_style .'" '. $parallax .'>'; // 100%


					// parallax | translate3d -------
					//if( ! mfn_is_mobile() && $parallax && mfn_parallax_plugin() == 'translate3d' ){
						$output .= '<img class="mfn-parallax" src="'. $section['attr']['bg_image'] .'" alt="" style="opacity:0" />';
					//}


					// video ----------
					if( key_exists( 'bg_video_mp4', $section['attr'] ) && $mp4 = $section['attr']['bg_video_mp4'] ){
						$output .= '<div class="section_video">';

							$output .= '<div class="mask"></div>';

							$poster = $section['attr']['bg_image'];

							$output .= '<video poster="'. $poster .'" autoplay="true" loop="true" muted="muted">';

								$output .= '<source type="video/mp4" src="'. $mp4 .'" />';
								if( key_exists( 'bg_video_ogv', $section['attr'] ) && $ogv = $section['attr']['bg_video_ogv'] ){
									$output .= '<source type="video/ogg" src="'. $ogv .'" />';
								}

							$output .= '</video>';

						$output .= '</div>';
					}

					// Decoration SVG  ------------------------
					if( key_exists( 'divider', $section['attr'] ) && $divider = $section['attr']['divider'] ){
						$output .= '<div class="section-divider '. $divider .'"></div>';
					}

					// Decoration Image Top  ------------------------
					if( key_exists( 'decor_top', $section['attr'] ) && $decor_top = $section['attr']['decor_top'] ){
						$output .= '<div class="section-decoration top" style="background-image:url('. $decor_top .');height:px"></div>';
					}

					// Navigation ------------------------
					if( key_exists( 'navigation', $section['attr'] ) && $section['attr']['navigation'] ){
						$output .= '<div class="section-nav prev"><i class="icon-up-open-big"></i></div>';
						$output .= '<div class="section-nav next"><i class="icon-down-open-big"></i></div>';
					}

					$output .= '<div class="section_wrapper mcb-section-inner">'; // WIDTH + margin: 0 auto


						// Wraps --------------------------------------------------------


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

										if( $moveup = mfn_opts_get( 'builder-wrap-moveup' ) ){
											if( 'no-tablet' == $moveup ){
												$wrap_data[] = 'data-tablet="no-up"';
											}
											$wrap_data[] = 'data-mobile="no-up"';
										}
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
												if( mfn_is_mobile() ){
													$wrap_bg['attachment'] = 'background-attachment:scroll';
												} else {
													$wrap_bg = array();
												}
											}

										}
									}

								}


								$wrap_class	= implode( ' ', $wrap_class );

								$wrap_style = array_merge( $wrap_style, $wrap_bg );
								$wrap_style = implode( '; ', $wrap_style );

								$wrap_data = implode( ' ', $wrap_data );


								// Wrap | Print -------------------------------

								$output .= '<div class="wrap mcb-wrap '. $wrap_class .' clearfix" style="'. $wrap_style .'" '. $parallax .' '. $wrap_data .'>';


									// parallax | translate3d -------
									//if( ! mfn_is_mobile() && $parallax && mfn_parallax_plugin() == 'translate3d' ){
										$output .= '<img class="mfn-parallax" src="'. $wrap['attr']['bg_image'] .'" alt="" style="opacity:0" />';
									//}


									$output .= '<div class="mcb-wrap-inner">';

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
													$output .= '<div class="column mcb-column '. $class .'">';
													$output .= call_user_func( 'mfn_print_'. $item['type'], $item );
													$output .= '</div>';

												}else{
													$output .= '<div class="column mcb-column">';
													$output .= ' pas de class mfn_print_'. $item['type'];
													$output .= '</div>';
												}

											}
										}

									$output .= '</div>';

								$output .= '</div>';

							}
						}


					$output .= '</div>';

					// Decoration Image Bottom  ------------------------
					if( key_exists( 'decor_bottom', $section['attr'] ) && $decor_bottom = $section['attr']['decor_bottom'] ){
						$output .= '<div class="section-decoration bottom" style="background-image:url('. $decor_bottom .');height:'. mfn_get_attachment_data( $decor_bottom, 'height' ) .'px"></div>';
					}

				$output .= '</div>';
			}
		}


		// WordPress Editor Content -------------------------------------
		//if( mfn_opts_get('display-order') == 0 ) mfn_builder_print_content( $post_id, $content_field );
$olives = $output;
echo $olives;
	}
}


?>