<?php

/*-----------------------------------------------------------------------------------*/

/*	PRINT Item - FRONTEND
/*-----------------------------------------------------------------------------------*/

// ---------- [blockcolumn] -----------
function mfn_print_blockcolumn($item)
{
    //return sc_blockcolumn( $item['fields'] );
    return sc_blockcolumn($item);
    //return ( print_r($item['fields']) );
}

// ---------- [menu] -----------
function mfn_print_menu($item)
{
    return sc_menu($item['fields']);
    //return sc_menu( $item );
    //return ( print_r($item['fields']) );
}

// ---------- [accordion] -----------
function mfn_print_accordion($item)
{
    return sc_accordion($item['fields']);
}

// ---------- [article_box] -----------
function mfn_print_article_box($item)
{
    return sc_article_box($item['fields']);
}

// ---------- [blockquote] -----------
function mfn_print_blockquote($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_blockquote($item['fields'], $item['fields']['content']);
}

// ---------- [blog] -----------
function mfn_print_blog($item)
{
    return sc_blog($item['fields']);
}

// ---------- [blog_slider] -----------
function mfn_print_blog_slider($item)
{
    return sc_blog_slider($item['fields']);
}

// ---------- [call_to_action] -----------
function mfn_print_call_to_action($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_call_to_action($item['fields'], $item['fields']['content']);
}

// ---------- [chart] -----------
function mfn_print_chart($item)
{
    return sc_chart($item['fields']);
}

// ---------- [clients] -----------
function mfn_print_clients($item)
{
    return sc_clients($item['fields']);
}

// ---------- [code] -----------
function mfn_print_code($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_code($item['fields'], $item['fields']['content']);
}

// ---------- [idea] -----------
function mfn_print_idea($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_idea($item['fields'], $item['fields']['content']);
}

// ---------- [alert] -----------
function mfn_print_alert($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_alert($item['fields'], $item['fields']['content']);
}

// ---------- [column] -----------
function mfn_print_column($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    $output = '<div style="padding:20px"><h2>' . $item['fields']['title'] . '</h2>';
    if ($item['fields']['animate']) {
        $output .= '<div class="animate" data-anim-type="' . $item['fields']['animate'] . '">';
    }
    $output .= $item['fields']['content'];
    if ($item['fields']['animate']) {
        $output .= '</div>';
    }
    $output .= '</div>';
    return $output;
}

// ---------- [contact_box] -----------
function mfn_print_contact_box($item)
{
    return sc_contact_box($item['fields']);
}

// ---------- [contact_form] -----------
function mfn_print_contact_form($item)
{
    return sc_contact_form($item['fields']);
}

// ---------- [counter] -----------
function mfn_print_counter($item)
{
    return sc_counter($item['fields']);
}

// ---------- [fancy_divider] -----------
function mfn_print_fancy_divider($item)
{
    return sc_fancy_divider($item['fields']);
}

// ---------- [divider] -----------
function mfn_print_divider($item)
{
    return sc_divider($item['fields']);
}

// ---------- [fancy_heading] -----------
function mfn_print_fancy_heading($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_fancy_heading($item['fields'], $item['fields']['content']);
}

// ---------- [faq] -----------
function mfn_print_faq($item)
{
    return sc_faq($item['fields']);
}

// ---------- [feature_list] -----------
function mfn_print_feature_list($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_feature_list($item['fields'], $item['fields']['content']);
}

// ---------- [how_it_works] -----------
function mfn_print_how_it_works($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_how_it_works($item['fields'], $item['fields']['content']);
}

// ---------- [icon_box] -----------
function mfn_print_icon_box($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_icon_box($item['fields'], $item['fields']['content']);
}

// ---------- [image] -----------
function mfn_print_image($item)
{
    return sc_image($item['fields']);
}

// ---------- [info_box] -----------
function mfn_print_info_box($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_info_box($item['fields'], $item['fields']['content']);
}

// ---------- [list] -----------
function mfn_print_list($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_list($item['fields'], $item['fields']['content']);
}

// ---------- [map] -----------
function mfn_print_map($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_map($item['fields'], $item['fields']['content']);
}

// ---------- [offer] -----------
function mfn_print_offer($item)
{
    return sc_offer($item['fields']);
}

// ---------- [opening_hours] -----------
function mfn_print_opening_hours($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_opening_hours($item['fields'], $item['fields']['content']);
}

// ---------- [our_team] -----------
function mfn_print_our_team($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_our_team($item['fields'], $item['fields']['content']);
}

// ---------- [our_team_list] -----------
function mfn_print_our_team_list($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_our_team_list($item['fields'], $item['fields']['content']);
}

// ---------- [photo_box] -----------
function mfn_print_photo_box($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_photo_box($item['fields'], $item['fields']['content']);
}

// ---------- [portfolio] -----------
function mfn_print_portfolio($item)
{
    return sc_portfolio($item['fields']);
}

// ---------- [portfolio_grid] -----------
function mfn_print_portfolio_grid($item)
{
    return sc_portfolio_grid($item['fields']);
}

// ---------- [portfolio_slider] -----------
function mfn_print_portfolio_slider($item)
{
    return sc_portfolio_slider($item['fields']);
}

// ---------- [pricing_item] -----------
function mfn_print_pricing_item($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_pricing_item($item['fields'], $item['fields']['content']);
}

// ---------- [progress_bars] -----------
function mfn_print_progress_bars($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_progress_bars($item['fields'], $item['fields']['content']);
}

// ---------- [promo_box] -----------
function mfn_print_promo_box($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_promo_box($item['fields'], $item['fields']['content']);
}

// ---------- [quick_fact] -----------
function mfn_print_quick_fact($item)
{
    if (!key_exists('content', $item['fields'])) {
        $item['fields']['content'] = '';
    }
    return sc_quick_fact($item['fields'], $item['fields']['content']);
}

// ---------- [shop_slider] -----------
function mfn_print_shop_slider($item)
{
    return sc_shop_slider($item['fields']);
}

// ---------- [sidebar_widget] -----------
function mfn_print_sidebar_widget($item)
{
    return sc_sidebar_widget($item['fields']);
}

// ---------- [slider] -----------
function mfn_print_slider($item)
{
    return sc_slider($item['fields']);
    //return ( print_r($item['fields']['content']) );
    /*$output = '<pre>';
		$output .= $item['type'];
		$output .= $item['size'];
		$output .= $item['fields'];
		$output .= $item['fields']['content'];
		$output .= '</pre>';
		return $output;*/
}

// ---------- [slider] -----------
function mfn_print_slider1($item)
{
    return sc_slider1($item['fields']);
}

// ---------- [sliding_box] -----------
function mfn_print_sliding_box($item)
{
    return sc_sliding_box($item['fields']);
}

// ---------- [tabs] -----------
function mfn_print_tabs($item)
{
    return sc_tabs($item['fields']);
    //return ( print_r($item['fields']) );
}

// ---------- [timeline] -----------
function mfn_print_timeline($item)
{
    return sc_timeline($item['fields']);
}

// ---------- [trailer_box] -----------
function mfn_print_trailer_box($item)
{
    return sc_trailer_box($item['fields']);
}

// ---------- [video] -----------
function mfn_print_video($item)
{
    return sc_video($item['fields']);
}

// ---------- [Footer] -----------
function mfn_print_Footer($item)
{
    return sc_Footer($item['fields']);
}

/* ---------------------------------------------------------------------------
 * sc_blockcolumn [sc_blockcolumn] [/sc_blockcolumn]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_blockcolumn')) {
    function sc_blockcolumn($attr, $content = null)
    {
        if ($attr['fields']['content'] == 'Left') {
            global $xoopsDB;
            $sqlt        = "SELECT * FROM " . $xoopsDB->prefix("config_theme") . " WHERE conf_name = 'cssextra'";
            $css_arr     = $xoopsDB->fetchArray($xoopsDB->query($sqlt));
            $unserialise = unserialize($css_arr['conf_value']);

            //var_dump($unserialise['fonteffect']);
            $output = '<{if $xoops_showlblock}>';
            $output .= '<div class="olivee-itemq olivee-itemq-' . $attr['type'] . '' . $attr['fields']['content'] . ' ' . $classes[$attr['size']] . '">';
            $output .= '<div class="olivee-item-contentdiv">';
            $output .= '<{if $xoops_showlblock}>';
            $output .= '<{foreach item=block from=$xoBlocks.canvas_left}>';
            $output .= '<div class="animate" data-anim-type="zoomInLeft">';

            if ($attr['fields']['content222'] == 'before') {
                if ($attr['fields']['content2'] != '0' && $attr['fields']['content22'] != '0') {
                    $output .= '<{if $block.id == ' . $attr['fields']['content22'] . '}>
						<br>
						' . $attr['fields']['content2'] . '
						<br>
						<{/if}>';
                }
            }
            if ($attr['fields']['content111'] == 'before') {
                if ($attr['fields']['content1'] != '0' && $attr['fields']['content11'] != '0') {
                    $output .= '<{if $block.id == ' . $attr['fields']['content11'] . '}>
						<br>
						' . $attr['fields']['content1'] . '
						<br>
						<{/if}>';
                }
            }

            $output .= '<div class="blockdiv">
				<{if $block.title}>
					<div class="blockTitle font-effect-' . $unserialise['fonteffect'] . '"><{$block.title}></div>
				<{/if}>
				<div class="blockContent"><{$block.content}></div></div>';

            if ($attr['fields']['content222'] == 'in') {
                if ($attr['fields']['content2'] != '0' && $attr['fields']['content22'] != '0') {
                    $output .= '<{if $block.id == ' . $attr['fields']['content22'] . '}>
						<br>
						' . $attr['fields']['content2'] . '
						<br>
						<{/if}>';
                }
            }

            if ($attr['fields']['content111'] == 'in') {
                if ($attr['fields']['content1'] != '0' && $attr['fields']['content11'] != '0') {
                    $output .= '<{if $block.id == ' . $attr['fields']['content11'] . '}>
						<br>
						' . $attr['fields']['content1'] . '
						<br>
						<{/if}>';
                }
            }

            if ($attr['fields']['content222'] == 'after') {
                if ($attr['fields']['content2'] != '0' && $attr['fields']['content22'] != '0') {
                    $output .= '<{if $block.id == ' . $attr['fields']['content22'] . '}>
						<br>
						' . $attr['fields']['content2'] . '
						<br>
						<{/if}>';
                }
            }

            if ($attr['fields']['content111'] == 'after') {
                if ($attr['fields']['content1'] != '0' && $attr['fields']['content11'] != '0') {
                    $output .= '<{if $block.id == ' . $attr['fields']['content11'] . '}>
						<br>
						' . $attr['fields']['content1'] . '
						<br>
						<{/if}>';
                }
            }

            $output .= '</div>';
            $output .= '<{/foreach}>';
            $output .= '<{/if}>';

            $output .= '</div>';
            $output .= '</div>';
            $output .= '<{/if}>';
        }
        if ($attr['fields']['content'] == 'Center') {
            $classess = [
                '1/4' => 'col-sm-3 col-md-3',
                '1/3' => 'col-sm-4 col-md-4',
                '1/2' => 'col-sm-6 col-md-6',
                '2/3' => 'col-sm-8 col-md-8',
                '3/4' => 'col-sm-4 col-md-4',
                '1/1' => 'col-sm-12 col-md-12',
            ];
            if ($attr['size'] == '1/1') {
                $toe = '4';
            } elseif ($attr['size'] == '1/2') {
                $toe = '6';
            } elseif ($attr['size'] == '1/3') {
                $toe = '12';
            } elseif ($attr['size'] == '1/4') {
                $toe = '12';
            } elseif ($attr['size'] == '2/3') {
                $toe = '4';
            } elseif ($attr['size'] == '3/4') {
                $toe = '4';
            }
            $output = '<{if $xoBlocks.page_topleft or $xoBlocks.page_topcenter or $xoBlocks.page_topright or $xoBlocks.page_bottomleft or $xoBlocks.page_bottomright or $xoBlocks.page_bottomcenter or $xoops_contents && ($xoops_contents != " ")}>';
            $output .= '<div class="olivee-itemq olivee-itemq-' . $attr['type'] . '' . $attr['fields']['content'] . ' ' . $classes[$attr['size']] . '"><div class="olivee-item-contentdiv">';
            //$output .= '		 <{includeq file="$theme_name/tpl/theme_centerblocksandcontent.html"}>';

            $output .= '
<{if $xoBlocks.page_topleft or $xoBlocks.page_topcenter or $xoBlocks.page_topright}>
	<div class="bottom-blocks">
            <div class="row">
			<!-- Start center-center blocks loop -->
			<aside class="col-sm-' . $toe . ' col-md-' . $toe . '">
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
			<aside class="col-sm-' . $toe . ' col-md-' . $toe . '">
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
			<aside class="col-sm-' . $toe . ' col-md-' . $toe . '">
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
<!-- Start content module page -->
	<{if $xoops_contents && ($xoops_contents != " ") }><div class="animate" data-anim-type="bounceInUp"><div id="content"><{$xoops_contents}></div></div><{/if}>
	<!-- End content module -->
	
<{if $xoBlocks.page_bottomcenter || $xoBlocks.page_bottomright || $xoBlocks.page_bottomleft}>
    <div class="bottom-blocks">
            <div class="row">
<{if $xoBlocks.page_bottomleft}>
	<aside class="col-sm-' . $toe . ' col-md-' . $toe . '">
		<{foreach item=block from=$xoBlocks.page_bottomleft}>
		<div class="animate" data-anim-type="bounceInUp">
			<div class="xoops-bottom-blocks">
				<{if $block.title}><h4><{$block.title}></h4><{/if}>
				<{$block.content}>
			</div>
		</div>	
		<{/foreach}>
	</aside>
<{/if}>
                
<{if $xoBlocks.page_bottomcenter}>
	<aside class="col-sm-' . $toe . ' col-md-' . $toe . '">
		<{foreach item=block from=$xoBlocks.page_bottomcenter}>
		<div class="animate" data-anim-type="bounceInUp">
			<div class="xoops-bottom-blocks">
				<{if $block.title}><h4><{$block.title}></h4><{/if}>
				<{$block.content}>
			</div>
		</div>	
		<{/foreach}>
	</aside>
<{/if}>
                
<{if $xoBlocks.page_bottomright}>
<aside class="col-sm-' . $toe . ' col-md-' . $toe . '">
    <{foreach item=block from=$xoBlocks.page_bottomright}>
	<div class="animate" data-anim-type="bounceInUp">
        <div class="xoops-bottom-blocks">
            <{if $block.title}><h4><{$block.title}></h4><{/if}>
            <{$block.content}>
        </div>
	</div>	
    <{/foreach}>
</aside>
<{/if}>
            </div>
    </div><!-- .bottom-blocks -->
<{/if}>	
';

            $output .= '</div></div>';
            $output .= '<{/if}>';
        }

        if ($attr['fields']['content'] == 'Right') {
            $output = '<{if $xoops_showrblock}>';
            $output .= '<div class="olivee-itemq olivee-itemq-' . $attr['type'] . '' . $attr['fields']['content'] . ' ' . $classes[$item['size']] . '"><div class="olivee-item-contentdiv">';
            $output .= '
			<{if $xoBlocks.canvas_right}>
					<{foreach item=block from=$xoBlocks.canvas_right}>
					<div class="animate" data-anim-type="zoomInRight">
						<div class="blockdiv">
					<{if $block.title}>
						<div class="blockTitle font-effect-' . $unserialise['fonteffect'] . '"><{$block.title}></div>
					<{/if}>
					<div class="blockContent"><{$block.content}></div></div>
					</div>	
					<{/foreach}>
			<{/if}>';
            $output .= '</div></div>';
            $output .= '<{/if}>';
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
if (!function_exists('sc_menu')) {
    function sc_menu($attr, $content = null)
    {
        global $xoopsDB;
        $rest = substr((string) $attr['content'], 3, -2);
        $id   = substr($rest, 10);

        include_once XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/menu/includes/treefront.php';
        $tree = new Tree;

        $sql0    = "SELECT * FROM " . $xoopsDB->prefix("menu_group") . " WHERE id = " . $id . " ";
        $result0 = $xoopsDB->query($sql0);
        while ($myrow1 = $xoopsDB->fetchArray($result0)) {
            $data1[] = $myrow1;
        }
        //var_dump($data1);
        if (!$data1) {
            echo 'The Menu hasn\'t been found';
        }

        foreach ($data1 as $row1) {
            //var_dump($row1);
            $sql    = "SELECT * FROM " . $xoopsDB->prefix("menu") . " WHERE group_id = " . $row1['id'] . " ORDER BY parent_id, position";
            $result = $xoopsDB->query($sql);
            $data   = [];
            $tree->clear();
            while ($myrow = $xoopsDB->fetchArray($result)) {
                $data[] = $myrow;
            }
            //echo $row1['title'];
            foreach ($data as $row) {
                $label = '<a title="' . $row['title'] . '" href="' . $row['url'] . '" class="item_link  with_icon" tabindex="16">';
                $label .= '<i class="' . $row['icon'] . '"></i>';
                $label .= '<span class="link_content">';
                $label .= '<span class="link_text">';
                $label .= $row['title'];
                $label .= '</span>';
                $label .= '</span>';
                $label .= '</a>';

                $li_attr = '';
                if ($row['class']) {
                    $li_attr = $row['class'];
                }
                $tree->add_row($row['id'], $row['parent_id'], $li_attr, $label);
            }
            $output = '';
            $output .= '<link rel="stylesheet" type="text/css" href="<{$xoops_url}>/themes/themebuilder/css/megamenu.css">';
            $output .= '<link rel="stylesheet" href="<{$xoops_url}>/modules/system/admin/themebuilder1/icomoon.css">';
            $output .= "\n" . '<link rel="stylesheet" type="text/css" media="all" href="' . XOOPS_URL . '/themes/themebuilder/css/skinmegamenu.php?id=' . $row1['id'] . '" />' . "\n";
            $output .= $tree->options($row1);
            $output .= $tree->generate_list($row1['options']);;
            $output .= '</div>
				</div>
			</div>';
            //echo $output;

        }
        $output1 = "\n" . '<div class="olivee-item-contentdiv">' . "\n";
        $output1 .= $output;
        $output1 .= "\n</div>\n";

        return $output1;
    }
}

/* ---------------------------------------------------------------------------
 * Code [code] [/code]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_code')) {
    function sc_code($attr, $content = null)
    {
        $output = "\n" . '<pre>' . "\n";
        $output .= htmlspecialchars((string) $content);
        $output .= "\n" . '</pre>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Article Box [article_box] [/article_box]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_article_box')) {
    function sc_article_box($attr, $content = null)
    {
        /*array(
			'image' 	=> '',
			'slogan' 	=> '',
			'title' 	=> '',
			'link' 		=> '',
			'target' 	=> '',
			'animate' 	=> '',
		);*/

        // target
        if ($attr['target']) {
            $target = 'target="_blank"';
        } else {
            $target = false;
        }

        $output = '<div class="article_box">';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }
        if ($attr['link']) {
            $output .= '<a href="' . $attr['link'] . '" ' . $target . '>';
        }

        $output .= '<div class="photo_wrapper">';
        $output .= '<img class="scale-with-grid" src="' . $attr['image'] . '" alt="' . $attr['title'] . '" />';
        $output .= '</div>';

        $output .= '<div class="desc_wrapper">';
        if ($attr['slogan']) {
            $output .= '<p>' . $attr['slogan'] . '</p>';
        }
        if ($attr['title']) {
            $output .= '<h4>' . $attr['title'] . '</h4>';
        }
        $output .= '<i class="fa-icon-right-open themecolor"></i>';
        $output .= '</div>';

        if ($attr['link']) {
            $output .= '</a>';
        }
        if ($attr['animate']) {
            $output .= '</div>' . "\n";
        }
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Photo Box [photo_box] [/photo_box]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_photo_box')) {
    function sc_photo_box($attr, $content = null)
    {
        /*array(
			'image' 	=> '',
			'title' 	=> '',
			'link' 		=> '',
			'target' 	=> '',
			'animate' 	=> '',
		);*/

        // target
        if ($attr['target']) {
            $target = 'target="_blank"';
        } else {
            $target = false;
        }

        $output = '<div class="photo_box">';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }
        if ($attr['title']) {
            $output .= '<h4>' . $attr['title'] . '</h4>';
        }

        if ($attr['image']) {
            $output .= '<div class="image_frame">';
            $output .= '<div class="image_wrapper">';
            if ($attr['link']) {
                $output .= '<a href="' . $attr['link'] . '" ' . $target . '>';
            };
            $output .= '<div class="mask"></div>';
            $output .= '<img class="scale-with-grid" src="' . $attr['image'] . '" alt="' . $attr['title'] . '" />';
            if ($attr['link']) {
                $output .= '</a>';
            }
            $output .= '</div>';
            $output .= '</div>';
        }

        $output .= '<div class="desc">' . $content . '</div>';
        if ($attr['animate']) {
            $output .= '</div>';
        }
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Sliding Box [sliding_box] [/sliding_box]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_sliding_box')) {
    function sc_sliding_box($attr, $content = null)
    {
        /*array(
			'image' 	=> '',
			'title' 	=> '',
			'link' 		=> '',
			'target' 	=> '',
			'animate' 	=> '',
		);*/

        // target
        if ($attr['target']) {
            $target = 'target="_blank"';
        } else {
            $target = false;
        }

        $output = '<div class="sliding_box">';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }
        if ($attr['link']) {
            $output .= '<a href="' . $attr['link'] . '" ' . $target . '>';
        }

        $output .= '<div class="photo_wrapper">';
        $output .= '<img class="scale-with-grid" src="' . $attr['image'] . '" alt="' . $attr['title'] . '" />';
        $output .= '</div>';

        $output .= '<div class="desc_wrapper">';
        if ($attr['title']) {
            $output .= '<h4>' . $attr['title'] . '</h4>';
        }
        $output .= '</div>';

        if ($attr['link']) {
            $output .= '</a>';
        }
        if ($attr['animate']) {
            $output .= '</div>';
        }
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Trailer Box [trailer_box]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_trailer_box')) {
    function sc_trailer_box($attr, $content = null)
    {
        /*array(
			'image' 	=> '',
			'slogan' 	=> '',
			'title' 	=> '',
			'link' 		=> '',
			'target' 	=> '',
			'animate' 	=> '',
		);*/

        // target
        if ($attr['target']) {
            $target = 'target="_blank"';
        } else {
            $target = false;
        }

        $output = '<div class="trailer_box">';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }
        if ($attr['link']) {
            $output .= '<a href="' . $attr['link'] . '" ' . $target . '>';
        }

        $output .= '<img class="scale-with-grid" src="' . $attr['image'] . '" alt="' . $attr['title'] . '" />';
        $output .= '<div class="desc">';
        if ($attr['slogan']) {
            $output .= '<div class="subtitle">' . $attr['slogan'] . '</div>';
        }
        if ($attr['title']) {
            $output .= '<h2>' . $attr['title'] . '</h2>';
        }
        $output .= '<div class="line"></div>';
        $output .= '</div>';

        if ($attr['link']) {
            $output .= '</a>';
        }
        if ($attr['animate']) {
            $output .= '</div>';
        }
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Promo Box [promo_box] [/promo_box]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_promo_box')) {
    function sc_promo_box($attr, $content = null)
    {
        /*array(
			'image' 	=> '',
			'title' 	=> '',
			'btn_text' 	=> '',
			'btn_link' 	=> '',
			'position' 	=> 'left',
			'border' 	=> 'no_border',
			'target' 	=> '',
			'animate' 	=> '',
		);*/

        // target
        if ($attr['target']) {
            $target = 'target="_blank"';
        } else {
            $target = false;
        }

        $output = '<div class="promo_box ' . $attr['border'] . '">';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }
        $output .= '<div class="promo_box_wrapper promo_box_' . $attr['position'] . '">';

        $output .= '<div class="photo_wrapper">';
        if ($attr['image']) {
            $output .= '<img class="scale-with-grid" src="' . $attr['image'] . '" alt="' . $attr['title'] . '">';
        }
        $output .= '</div>';

        $output .= '<div class="desc_wrapper">';
        if ($attr['title']) {
            $output .= '<h2>' . $attr['title'] . '</h2>';
        }
        if ($content) {
            $output .= '<div class="desc">' . $content . '</div>';
        }
        if ($attr['btn_link']) {
            $output .= '<a href="' . $attr['btn_link'] . '" class="button button_left button_theme button_js" ' . $target . '><span class="button_icon"><i class="fa-icon-link"></i></span><span class="button_label">' . $attr['btn_text'] . '</span></a>';
        }
        $output .= '</div>';

        $output .= '</div>';
        if ($attr['animate']) {
            $output .= '</div>';
        }
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * How It Works [how_it_works] [/how_it_works]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_how_it_works')) {
    function sc_how_it_works($attr, $content = null)
    {
        /*array(
			'image' 	=> '',
			'number' 	=> '',
			'title' 	=> '',
			'border' 	=> '',
			'animate' 	=> '',
		);*/

        // border
        if ($attr['border']) {
            $border = 'has_border';
        } else {
            $border = 'no_border';
        }

        $output = '<div class="how_it_works ' . $border . '">';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }

        $output .= '<div class="image">';
        $output .= '<img src="' . $attr['image'] . '" class="scale-with-grid" alt="' . $attr['title'] . '">';
        if ($attr['number']) {
            $output .= '<span class="number">' . $attr['number'] . '</span>';
        }
        $output .= '</div>';
        if ($attr['title']) {
            $output .= '<h4>' . $attr['title'] . '</h4>';
        }
        $output .= '<div class="desc">' . $content . '</div>';

        if ($attr['animate']) {
            $output .= '</div>' . "\n";
        }
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Blog [blog]
* --------------------------------------------------------------------------- */
if (!function_exists('sc_blog')) {
    function sc_blog($attr, $content = null)
    {
        /*array(
			'count'			=> 2,
			'category'		=> '',
			'style'			=> 'classic',
			'more'			=> '',
			'pagination'	=> '',
		);*/

        if ($category) {
            $args['category_name'] = $category;
        }

        // classes
        $classes = $style;
        if ($style == 'masonry') {
            $classes .= ' isotope';
        }
        if (!$more) {
            $classes .= ' hide-more';
        }

        $output = '<div class="blog_wrapper isotope_wrapper">';
        $output .= '<div class="posts_group ' . $classes . '">';
        $output .= 'content news from publisher or news or content module will be done later';
        $output .= '</div>';
        $output .= '</div>' . "\n";
        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Blog Slider [blog_slider]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_blog_slider')) {
    function sc_blog_slider($attr, $content = null)
    {
        /*array(
			'title'			=> '',
			'count'			=> 5,
			'category'		=> '',
			'more'			=> '',
		);*/

        // classes
        $classes = '';
        if (!$more) {
            $classes .= ' hide-more';
        }

        $args = [
            'posts_per_page'      => intval($count),
            'no_found_rows'       => 1,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
        ];
        if ($category) {
            $args['category_name'] = $category;
        }

        $output = '<div class="blog_slider ' . $classes . '">';

        $output .= '<div class="blog_slider_header">';
        if ($title) {
            $output .= '<h4 class="title">' . $title . '</h4>';
        }
        $output .= '<a class="button button_js slider_prev" href="#"><span class="button_icon"><i class="fa-icon-left-open-big"></i></span></a>';
        $output .= '<a class="button button_js slider_next" href="#"><span class="button_icon"><i class="fa-icon-right-open-big"></i></span></a>';
        $output .= '</div>';

        $output .= '<ul class="blog_slider_ul">';
        global $xoopsDB;
        $sqlyy    = "SELECT * FROM " . $xoopsDB->prefix("publisher_categories") . " WHERE categoryid != ''";
        $resultyy = $xoopsDB->query($sqlyy);
        if ($resultyy) {
            while ($myrowy = $xoopsDB->fetchArray($resultyy)) {
                $output .= $myrowy['image'];
                $output .= '<li class="">';
                $output .= '<div class="item_wrapper">';
                $output .= '<div class="image_frame scale-with-grid">';
                $output .= '<div class="image_wrapper">';
                $output .= '';
                $output .= '';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '<div class="date_label">date</div>';
                $output .= '<div class="desc">';
                $output .= '<h4><a href="link">title</a></h4>';
                $output .= '<hr class="hr_color" />';
                $output .= '<a href="link" class="button button_left button_js"><span class="button_icon"><i class="fa-icon-layout"></i></span><span class="button_label">readmore</span></a>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</li>';
            }
        } else {
            $output .= 'you must install publisher module to use this';
        }

        $output .= '</ul>';
        $output .= '<div class="slider_pagination"></div>';
        $output .= '</div>' . "\n";
        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Shop Slider [shop_slider]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_shop_slider')) {
    function sc_shop_slider($attr, $content = null)
    {
        $output = '<div class="shop_slider">';

        $output .= '<div class="blog_slider_header">';
        if ($title) {
            $output .= '<h4 class="title">' . $title . '</h4>';
        }
        $output .= '<a class="button button_js slider_prev" href="#"><span class="button_icon"><i class="fa-icon-left-open-big"></i></span></a>';
        $output .= '<a class="button button_js slider_next" href="#"><span class="button_icon"><i class="fa-icon-right-open-big"></i></span></a>';
        $output .= '</div>';

        $output .= '<ul class="shop_slider_ul">';
        $output .= 'not yet added';
        $output .= '</ul>';

        $output .= '<div class="slider_pagination"></div>';

        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Contact Box [contact_box]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_contact_box')) {
    function sc_contact_box($attr, $content = null)
    {
        /*array(
			'title'			=> '',
			'address' 		=> '',
			'telephone'		=> '',
			'email' 		=> '',
			'www' 			=> '',
			'image' 		=> '',
			'animate' 		=> '',
		));*/

        // background
        if ($attr['image']) {
            $image = 'style="background-image:url(' . XOOPS_URL . '/themes/themebuilder/texture/bg/' . $attr['image'] . ');"';
        }

        $output = '';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }
        $output .= '<div class="get_in_touch" ' . $image . '>';

        if ($attr['title']) {
            $output .= '<h3>' . $attr['title'] . '</h3>';
        }
        $output .= '<div class="get_in_touch_wrapper">';
        $output .= '<ul>';
        if ($attr['address']) {
            $output .= '<li class="address">';
            $output .= '<span class="icon"><i class="fa-icon-location-arrow"></i></span>';
            $output .= '<span class="address_wrapper">' . $attr['address'] . '</span>';
            $output .= '</li>';
        }
        if ($attr['telephone']) {
            $output .= '<li class="phone">';
            $output .= '<span class="icon"><i class="fa-icon-phone"></i></span>';
            $output .= '<p><a href="tel:' . $attr['telephone'] . '">' . $attr['telephone'] . '</a></p>';
            $output .= '</li>';
        }
        if ($attr['email']) {
            $output .= '<li class="mail">';
            $output .= '<span class="icon"><i class="fa-icon-envelope"></i></span>';
            $output .= '<p><a href="mailto:' . $attr['email'] . '">' . $attr['email'] . '</a></p>';
            $output .= '</li>';
        }
        if ($attr['www']) {
            $output .= '<li class="www">';
            $output .= '<span class="icon"><i class="fa-icon-link"></i></span>';
            $output .= '<p><a target="_blank" href="http://' . $attr['www'] . '">' . $attr['www'] . '</a></p>';
            $output .= '</li>';
        }
        $output .= '</ul>';
        $output .= '</div>';

        $output .= '</div>' . "\n";
        if ($attr['animate']) {
            $output .= '</div>' . "\n";
        }

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Contact Form [contact_form]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_contact_form')) {
    function sc_contact_form($attr, $content = null)
    {
        /*array(
			'title'			=> '',
			'address' 		=> '',
			'telephone'		=> '',
			'email' 		=> '',
			'www' 			=> '',
			'image' 		=> '',
			'animate' 		=> '',
		);*/

        $output = '';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }
        $output .= '<div class="contact_form">';
        $output .= '    <!-- ajax contact form -->
    <section style="margin: 20px;">
        <div class="container11">
            <div class="rowm justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header">Ajax Contact Form</h5>
                        <div class="card-body">
                            <form class="contact__form" method="post" action="<{$xoops_url}>/themes/themebuilder1/mail.php">
                                
                                <!-- form message -->
                                <div class="rowm">
                                    <div class="col-12">
                                        <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                            Your message was sent successfully.
                                        </div>
                                    </div>
                                </div>
                                <!-- end message -->

                                <!-- form element -->
                                <div class="rowm">
                                    <div class="col-md-6 form-group">
                                        <input name="name" type="text" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input name="email" type="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input name="phone" type="text" class="form-control" placeholder="Phone" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input name="subject" type="text" class="form-control" placeholder="Subject" required>
                                    </div>
                                    <div class="col-12 form-group">
                                        <textarea name="message" class="form-control" rows="3" placeholder="Message" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <input name="submit" type="submit" class="btn btn-success" value="Send Message">
                                    </div>
                                </div>
                                <!-- end form element -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="<{$xoops_url}>/themes/themebuilder1/js/main.js"></script>
';
        //<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

        $output .= '</div>' . "\n";
        if ($attr['animate']) {
            $output .= '</div>' . "\n";
        }

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Popup [popup][/popup]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_popup')) {
    function sc_popup($attr, $content = null)
    {
        /*array(
			'title'			=> '',
			'padding'		=> '',
			'button' 		=> '',
			'uid'			=> 'popup-'. uniqid(),
		);*/

        // padding
        if ($padding) {
            $padding = 'style="padding:' . $padding . 'px;"';
        } else {
            $padding = false;
        }

        $output = '';

        if ($button) {
            $output .= '<a href="#' . $uid . '" rel="prettyPhoto" class="popup-link button button_js"><span class="button_label">' . $title . '</span></a>';
        } else {
            $output .= '<a href="#' . $uid . '" rel="prettyPhoto" class="popup-link">' . $title . '</a>';
        }

        $output .= '<div id="' . $uid . '" class="popup-content">';
        $output .= '<div class="popup-inner" ' . $padding . '>' . $content . '</div>';
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Info Box [info_box]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_info_box')) {
    function sc_info_box($attr, $content = null)
    {
        /*array(
			'title'			=> '',
			'image' 		=> '',
			'animate' 		=> '',
		);*/

        // background
        if ($attr['image']) {
            $image = 'style="background-image:url(' . XOOPS_URL . '/themes/themebuilder/texture/bg/' . $attr['image'] . ');"';
        }

        $output = '';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }
        $output .= '<div class="infobox" ' . $image . '>';

        if ($attr['title']) {
            $output .= '<h3>' . $attr['title'] . '</h3>';
        }
        $output .= '<div class="infobox_wrapper">';
        $output .= $content;
        $output .= '</div>';

        $output .= '</div>' . "\n";
        if ($attr['animate']) {
            $output .= '</div>' . "\n";
        }

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Opening hours [opening_hours]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_opening_hours')) {
    function sc_opening_hours($attr, $content = null)
    {
        /*array(
			'title'			=> '',
			'image' 		=> '',
			'animate' 		=> '',
		);*/

        // background
        if ($attr['image']) {
            $image = 'style="background-image:url(' . $attr['image'] . ');"';
        }

        $output = '';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }
        $output .= '<div class="opening_hours" ' . $image . '>';

        if ($attr['title']) {
            $output .= '<h3>' . $title . '</h3>';
        }
        $output .= '<div class="opening_hours_wrapper">';
        $output .= $content;
        $output .= '</div>';

        $output .= '</div>' . "\n";
        if ($attr['animate']) {
            $output .= '</div>' . "\n";
        }

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Divider [divider]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_divider')) {
    function sc_divider($attr, $content = null)
    {
        /*array(
		    'height' 		=> 0,
		    'style' 		=> '',		// default, dots, zigzag
		    'line'			=> '',		// default, narrow, wide, 0 = no_line
		    'themecolor'	=> '',
	    );*/

        // classes
        $class = '';
        if ($attr['themecolor']) {
            $class .= ' hr_color';
        }

        // height
        if ($attr['height']) {
            $inlinecss = 'style="margin: 0 auto ' . intval($attr['height']) . 'px;"';
        } else {
            $inlinecss = '';
        }

        switch ($attr['style']) {
            case 'dots':
                $output = "\n" . '<div class="hr_dots" ' . $inlinecss . '><span></span><span></span><span></span></div>' . "\n";
                break;
            case 'zigzag':
                $output = "\n" . '<div class="hr_zigzag" ' . $inlinecss . '><i class="fa-icon-chevron-down"></i><i class="fa-icon-chevron-down"></i><i class="fa-icon-chevron-down"></i></div>' . "\n";
                break;
            default:
                if ($attr['line'] == 'narrow') {
                    $output = "\n" . '<hr class="hr_narrow ' . $class . '" ' . $inlinecss . '/>' . "\n";
                } elseif ($attr['line'] == 'wide') {
                    $output = "\n" . '<div class="hr_wide ' . $class . '" ' . $inlinecss . '><hr /></div>' . "\n";
                } elseif ($attr['line']) {
                    $output = "\n" . '<hr class="' . $class . '" ' . $inlinecss . '/>' . "\n";
                } else {
                    $output = "\n" . '<hr class="no_line" ' . $inlinecss . '/>' . "\n";
                }
        }

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Fancy Divider [fancy_divider]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_fancy_divider')) {
    function sc_fancy_divider($attr, $content = null)
    {
        /*array(
		    'style' 		=> 'stamp',
		    'color_top' 	=> '',
		    'color_bottom' 	=> '',
	    );*/

        $output = '<div class="fancy-divider">';

        switch ($attr['style']) {
            case 'circle up':
                $output .= '<svg preserveAspectRatio="none" viewBox="0 0 100 100" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" style="background: ' . $attr['color_top'] . ';">';
                $output .= '<path d="M0 100 C50 0 50 0 100 100 Z" style="fill: ' . $attr['color_bottom'] . '; stroke: ' . $attr['color_bottom'] . ';">';
                $output .= '</svg>';
                break;

            case 'circle down':
                $output .= '<svg preserveAspectRatio="none" viewBox="0 0 100 100" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" style="background: ' . $attr['color_bottom'] . ';">';
                $output .= '<path d="M0 0 C50 100 50 100 100 0 Z" style="fill: ' . $attr['color_top'] . '; stroke: ' . $attr['color_top'] . ';">';
                $output .= '</svg>';
                break;

            case 'curve up':
                $output .= '<svg preserveAspectRatio="none" viewBox="0 0 100 100" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" style="background: ' . $attr['color_top'] . ';">';
                $output .= '<path d="M0 100 C 20 0 50 0 100 100 Z" style="fill: ' . $attr['color_bottom'] . '; stroke: ' . $attr['color_bottom'] . ';">';
                $output .= '</svg>';
                break;

            case 'curve down':
                $output .= '<svg preserveAspectRatio="none" viewBox="0 0 100 100" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" style="background: ' . $attr['color_bottom'] . ';">';
                $output .= '<path d="M0 0 C 50 100 80 100 100 0 Z" style="fill: ' . $attr['color_top'] . '; stroke: ' . $attr['color_top'] . ';">';
                $output .= '</svg>';
                break;

            case 'triangle up':
                $output .= '<svg preserveAspectRatio="none" viewBox="0 0 100 100" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" style="background: ' . $attr['color_top'] . ';">';
                $output .= '<path d="M0 100 L50 2 L100 100 Z" style="fill: ' . $attr['color_bottom'] . '; stroke: ' . $attr['color_bottom'] . ';">';
                $output .= '</svg>';
                break;

            case 'triangle down':
                $output .= '<svg preserveAspectRatio="none" viewBox="0 0 100 100" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" style="background: ' . $attr['color_bottom'] . ';">';
                $output .= '<path d="M0 0 L50 100 L100 0 Z" style="fill: ' . $attr['color_top'] . '; stroke: ' . $attr['color_top'] . ';">';
                $output .= '</svg>';
                break;

            default:
                $output .= '<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" style="background: ' . $attr['color_bottom'] . ';">';
                $output .= '<path d="M0 0 Q 2.5 40 5 0 Q 7.5 40 10 0Q 12.5 40 15 0Q 17.5 40 20 0Q 22.5 40 25 0Q 27.5 40 30 0Q 32.5 40 35 0Q 37.5 40 40 0Q 42.5 40 45 0Q 47.5 40 50 0 Q 52.5 40 55 0Q 57.5 40 60 0Q 62.5 40 65 0Q 67.5 40 70 0Q 72.5 40 75 0Q 77.5 40 80 0Q 82.5 40 85 0Q 87.5 40 90 0Q 92.5 40 95 0Q 97.5 40 100 0 Z" style="fill: ' . $attr['color_top'] . '; stroke: ' . $attr['color_top'] . ';">';
                $output .= '</svg>';
        }

        $output .= '</div>';

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Google Font [google_font]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_google_font')) {
    function sc_google_font($attr, $content = null)
    {
        /*array(
			'font' 		=> '',
			'subset' 	=> '',
			'size' 		=> '25',
		);*/

        $font_slug = str_replace(' ', '+', (string) $font);

        // subset
        if ($subset) {
            $subset = '&amp;subset=' . str_replace(' ', '', (string) $subset);
        } else {
            $subset = false;
        }

        $output = '<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=' . $font_slug . ':400' . $subset . '">' . "\n";
        $output .= '<div class="google_font" style="font-family:\'' . $font . '\'; font-size:' . $size . 'px; line-height:' . $size . 'px;">' . do_shortcode($content) . '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Sidebar Widget [sidebar_widget]
 * --------------------------------------------------------------------------- */
/*if( ! function_exists( 'sc_sidebar_widget' ) )
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
}*/

/* ---------------------------------------------------------------------------
 * Pricing Item [pricing_item] [/pricing_item]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_pricing_item')) {
    function sc_pricing_item($attr, $content = null)
    {
        /*array(
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
		);*/

        // classes
        $classes = '';
        if ($attr['featured']) {
            $classes .= ' pricing-box-featured';
        }
        if ($attr['style']) {
            $classes .= ' pricing-box-' . $attr['style'];
        }

        $output = '<div class="pricing-box ' . $classes . '">';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }

        $output .= '<div class="plan-header">';
        if ($attr['title']) {
            $output .= '<h2>' . $attr['title'] . '</h2>';
        }
        if ($attr['price']) {
            $output .= '<div class="price">';
            $output .= '<sup class="currency">' . $attr['currency'] . '</sup>';
            $output .= '<span>' . $attr['price'] . '</span>';
            $output .= '<sup class="period">' . $attr['period'] . '</sup>';
            $output .= '</div>';
            $output .= '<hr class="hr_color" />';
            if ($attr['subtitle']) {
                $output .= '<p class="subtitle"><big>' . $attr['subtitle'] . '</big></p>';
            }
        }
        $output .= '</div>';

        if ($content) {
            $output .= '<div class="plan-inside">';
            $output .= $content;
            $output .= '</div>';
        }

        if ($attr['link']) {
            $output .= '<div class="plan-footer">';
            $output .= '<a href="' . $attr['link'] . '" class="button  button_left button_theme button_js"><span class="button_icon"><i class="fa-icon-basket"></i></span><span class="button_label">' . $attr['link_title'] . '</span></a>';
            $output .= '</div>';
        }

        if ($attr['animate']) {
            $output .= '</div>';
        }
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Call to Action [call_to_action] [/call_to_action]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_call_to_action')) {
    function sc_call_to_action($attr, $content = null)
    {
        /*array(
			'title' 	=> '',
			'icon' 		=> 'icon-lamp',
			'link' 		=> '',
			'class' 	=> '',
			'target' 	=> '',
			'animate' 	=> '',
		);*/

        // target
        if ($attr['target']) {
            $target = 'target="_blank"';
        } else {
            $target = false;
        }

        $output = '<div class="call_to_action">';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }

        $output .= '<div class="call_left">';
        $output .= '<h3>' . $attr['title'] . '</h3>';
        $output .= '</div>';

        $output .= '<div class="call_center">';
        if ($attr['link']) {
            $output .= '<a href="' . $attr['link'] . '" class="' . $attr['class'] . '" ' . $target . '>';
        }
        $output .= '<span class="icon_wrapper"><i class="' . $attr['icon'] . '"></i></span>';
        if ($attr['link']) {
            $output .= '</a>';
        }
        $output .= '</div>';

        $output .= '<div class="call_right">';
        $output .= '<div class="desc">' . $content . '</div>';
        $output .= '</div>';

        if ($attr['animate']) {
            $output .= '</div>';
        }
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Chart [chart]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_chart')) {
    function sc_chart($attr, $content = null)
    {
        /*array(
			'percent' 		=> '',
			'label' 		=> '',
			'icon'	 		=> '',
			'image'	 		=> '',
			'title' 		=> '',
		);*/

        // color
        if ($_GET && key_exists('mfn-c', $_GET)) {
            $color = '#D69942';
        } else {
            $color = '#2991D6';
        }

        $output = '<div class="chart_box">';
        $output .= '<div class="chart" data-percent="' . intval($attr['percent']) . '" data-color="' . $color . '">';
        if ($attr['image']) {
            $output .= '<div class="image"><img src="' . $attr['image'] . '" alt="' . $attr['percent'] . '" class="scale-with-grid" /></div>';
        } elseif ($attr['icon']) {
            $output .= '<div class="icon"><i class="' . $attr['icon'] . '"></i></div>';
        } else {
            $output .= '<div class="num">' . $attr['label'] . '</div>';
        }
        $output .= '</div>';
        $output .= '<p><big>' . $attr['title'] . '</big></p>';
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Counter [counter]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_counter')) {
    function sc_counter($attr, $content = null)
    {
        /*array(
			'icon' 			=> '',
			'color' 		=> '',
			'imagecounter' 		=> '',
			'number' 		=> '',
			'title' 		=> '',
			'type'	 		=> 'vertical',
			'animate'	 	=> '',
		);*/

        // color
        if ($attr['color']) {
            $color = 'style="color:' . $attr['color'] . ';"';
        } else {
            $color = false;
        }

        $output = '<div class="counter animate-math counter_' . $attr['type'] . '">';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }

        $output .= '<div class="icon_wrapper">';
        if ($attr['image']) {
            $output .= '<img src="' . XOOPS_URL . '/themes/themebuilder/texture/bg/' . $attr['imagecounter'] . '" alt="' . $attr['title'] . '" />';
        } elseif ($attr['icon']) {
            $output .= '<i class="' . $attr['icon'] . '" ' . $color . '></i>';
        }
        $output .= '</div>';

        $output .= '<div class="desc_wrapper">';
        if ($attr['number']) {
            $output .= '<div class="number" data-to="' . $attr['number'] . '">0</div>';
        }
        if ($attr['title']) {
            $output .= '<p class="title">' . $attr['title'] . '</p>';
        }
        $output .= '</div>';

        if ($attr['animate']) {
            $output .= '</div>' . "\n";
        }
        $output .= '</div>' . "\n";

        $output .= '
				<script src="http://localhost/xoops25777/themes/themebuilder/js/waypoints.min.js" type="text/javascript"></script>

		<script>
		
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
if (!function_exists('sc_icon')) {
    function sc_icon($attr, $content = null)
    {
        /*array(
			'type' => '',
		);*/

        $output = '<i class="' . $attr['type'] . '"></i>';

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Icon Block [icon_block]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_icon_block')) {
    function sc_icon_block($attr, $content = null)
    {
        /*array(
			'icon'	=> '',
			'align'	=> '',
			'color'	=> '',
			'size'	=> 25,
		);*/

        // classes
        $class = '';
        if ($attr['align']) {
            $class .= ' icon_' . $attr['align'];
        }
        if ($attr['color']) {
            $color = ' color:' . $attr['color'] . ';';
        } else {
            $class .= ' themecolor';
        }

        $output = '<span class="single_icon ' . $class . '">';
        $output .= '<i style="font-size: ' . $attr['size'] . 'px; line-height: ' . $attr['size'] . 'px; ' . $color . '" class="' . $attr['icon'] . '"></i>';
        $output .= '</span>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Image [image]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_image')) {
    function sc_image($attr, $content = null)
    {
        /*array(
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
		);*/

        // align
        if ($attr['align']) {
            $align = ' align' . $attr['align'];
        }

        // target
        if ($attr['target']) {
            $target = 'target="_blank"';
        } else {
            $target = false;
        }

        // margin
        if ($attr['margin']) {
            $margin = 'style="margin-top:' . intval($attr['margin']) . 'px"';
        } else {
            $margin = false;
        }

        // border
        if ($attr['border']) {
            $border = ' has_border';
        } else {
            $border = ' no_border';
        }

        // hoover icon
        if ($attr['link_image']) {
            $class  = 'zoom prettyphoto';
            $target = false;
            $icon   = 'fa-icon-search';
        } else {
            $class = 'link';
            $icon  = 'fa-icon-link';
        }

        // link
        if ($attr['link_image']) {
            $link = $attr['link_image'];
        }

        $output = '';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }

        if ($link) {
            $output .= '<div class="image_frame scale-with-grid' . $border . $align . '" ' . $margin . '>';
            $output .= '<div class="image_wrapper">';
            $output .= '<a href="' . $link . '" class="' . $class . '" ' . $target . '>';
            $output .= '<div class="mask"></div>';
            $output .= '<img class="scale-with-grid" src="' . $attr['src'] . '" alt="' . $attr['alt'] . '" />';
            $output .= '</a>';
            $output .= '<div class="image_links">';
            $output .= '<a href="' . $link . '" class="' . $class . '" ' . $target . '><i class="' . $icon . '"></i></a>';
            $output .= '</div>';
            $output .= '</div>';
            if ($attr['caption']) {
                $output .= '<p class="wp-caption-text">' . $attr['caption'] . '</p>';
            }
            $output .= '</div>' . "\n";
        } else {
            $output .= '<div class="image_frame no_link scale-with-grid' . $border . $align . '" ' . $margin . '>';
            $output .= '<div class="image_wrapper">';
            $output .= '<img class="scale-with-grid" src="' . $attr['src'] . '" alt="' . $attr['alt'] . '" />';
            $output .= '</div>';
            if ($caption) {
                $output .= '<p class="wp-caption-text">' . $attr['caption'] . '</p>';
            }
            $output .= '</div>' . "\n";
        }

        if ($attr['animate']) {
            $output .= '</div>' . "\n";
        }

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Quick Fact [quick_fact]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_quick_fact')) {
    function sc_quick_fact($attr, $content = null)
    {
        /*array(
			'number' 	=> '',
			'title' 	=> '',
			'animate' 	=> '',
		);*/

        $output = '<div class="quick_fact animate-math">';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }

        if ($attr['number']) {
            $output .= '<div class="number" data-to="' . $attr['number'] . '">0</div>';
        }
        if ($attr['title']) {
            $output .= '<h3 class="title">' . $attr['title'] . '</h3>';
        }
        $output .= '<hr class="hr_narrow" />';
        $output .= '<div class="desc">' . $content . '</div>';

        if ($attr['animate']) {
            $output .= '</div>';
        }
        $output .= '</div>' . "\n";

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
if (!function_exists('sc_button')) {
    function sc_button($attr, $content = null)
    {
        /*array(
			'title' 		=> 'Read more',
			'icon' 			=> '',
			'icon_position' => 'left',
			'link' 			=> '',
			'target' 		=> '',
			'color' 		=> '',
			'large' 		=> '',
			'class' 		=> '',
			'download' 		=> '',
		);*/

        // target
        if ($target) {
            $target = 'target="_blank"';
        } else {
            $target = false;
        }

        // download
        if ($download) {
            $download = 'download="' . $download . '"';
        } else {
            $download = false;
        }

        // icon_position
        if ($icon_position != 'left') {
            $icon_position = 'right';
        }

        // class
        if ($icon) {
            $class .= ' button_' . $icon_position;
        }
        if ($large) {
            $class .= ' button_large';
        }

        // custom color
        $style = false;
        if ($color) {
            if (str_starts_with((string) $color, '#')) {
                $style = ' style="background-color:' . $color . ' !important"';
            } else {
                $class .= ' button_' . $color;
            }
        }

        $output = '<a class="button ' . $class . ' button_js" href="' . $link . '" ' . $target . ' ' . $style . ' ' . $download . '>';
        if ($icon) {
            $output .= '<span class="button_icon"><i class="' . $icon . '"></i></span>';
        }
        if ($title) {
            $output .= '<span class="button_label">' . $title . '</span>';
        }
        $output .= '</a>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Icon Bar [icon_bar]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_icon_bar')) {
    function sc_icon_bar($attr, $content = null)
    {
        /*array(
			'icon' 			=> 'icon-lamp',
			'link' 			=> '',
			'target' 		=> '',
			'size' 			=> '',
			'social' 		=> '',
		);*/

        // target
        if ($target) {
            $target = 'target="_blank"';
        } else {
            $target = false;
        }

        // class
        $class = '';
        if ($social) {
            $class .= ' icon_bar_' . $social;
        }
        if ($size) {
            $class .= ' icon_bar_' . $size;
        }

        $output = '<a href="' . $link . '" class="icon_bar ' . $class . '" ' . $target . '>';
        $output .= '<span class="t"><i class="' . $icon . '"></i>';
        $output .= '</span><span class="b"><i class="' . $icon . '"></i></span>';
        $output .= '</a>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Alert [alert] [/alert]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_alert')) {
    function sc_alert($attr, $content = null)
    {
        /*array(
			'style'		=> 'warning',
		);*/

        $icon = match ($attr['style']) {
            'error' => 'fa-icon-stop',
            'info' => 'fa-icon-help',
            'success' => 'fa-icon-check',
            default => 'fa-icon-lamp',
        };

        $output = '<div class="alert alert_' . $attr['style'] . '">';
        $output .= '<div class="alert_icon">';
        $output .= '<i class="' . $icon . '"></i>';
        $output .= '</div>';
        $output .= '<div class="alert_wrapper">';
        $output .= $content;
        $output .= '</div>';
        $output .= '<a href="#" class="close"><i class="fa-icon-eject"></i></a>';
        $output .= '</div>' . "\n";
        $output .= '</div>' . "\n"; //ajoute pour corriger </div> at the end to do

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Idea [idea] [/idea]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_idea')) {
    function sc_idea($attr, $content = null)
    {
        $output = '<div class="idea_box">';
        $output .= '<div class="icon"><i class="im-icon-lamp-4"></i></div>';
        $output .= '<div class="desc">' . $content . '</div>';
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Dropcap [dropcap] [/dropcap]
* --------------------------------------------------------------------------- */
if (!function_exists('sc_dropcap')) {
    function sc_dropcap($attr, $content = null)
    {
        /*array(
			'background' 	=> '',
			'color' 		=> '',
			'circle' 		=> '',
		);*/

        // circle
        if ($attr['circle']) {
            $class = ' dropcap_circle';
        } else {
            $class = false;
        }

        $style = '';
        if ($attr['background']) {
            $style .= 'background-color:' . XOOPS_URL . '/themes/themebuilder/texture/bg/' . $attr['background'] . ';';
        }
        if ($attr['color']) {
            $style .= ' color:' . $attr['color'] . ';';
        }
        if ($style) {
            $style = 'style="' . $style . '"';
        }

        $output = '<span class="dropcap' . $class . '" ' . $style . '>';
        $output .= $content;
        $output .= '</span>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Highlight [highlight] [/highlight]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_highlight')) {
    function sc_highlight($attr, $content = null)
    {
        /*array(
			'background' 	=> '',
			'color' 		=> '',
		);*/

        // style
        $style = '';
        if ($background) {
            $style .= 'background-color:' . $background . ';';
        }
        if ($color) {
            $style .= ' color:' . $color . ';';
        }
        if ($style) {
            $style = 'style="' . $style . '"';
        }

        $output = '<span class="highlight" ' . $style . '>';
        $output .= $content;
        $output .= '</span>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Tooltip [tooltip] [/tooltip]
* --------------------------------------------------------------------------- */
if (!function_exists('sc_tooltip')) {
    function sc_tooltip($attr, $content = null)
    {
        /*array(
			'hint' 			=> '',
		);*/

        $output = '';
        if ($hint) {
            $output .= '<span class="tooltip" data-tooltip="' . $hint . '" ontouchstart="this.classList.toggle(\'hover\');">';
            $output .= $content;
            $output .= '</span>' . "\n";
        }

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Content Link [content_link]
* --------------------------------------------------------------------------- */
if (!function_exists('sc_content_link')) {
    function sc_content_link($attr, $content = null)
    {
        /*array(
			'title' 	=> '',
			'icon' 		=> '',
			'link' 		=> '',
			'target' 	=> '',
			'class' 	=> '',
			'download' 	=> '',
		);*/

        // target
        if ($target) {
            $target = 'target="_blank"';
        } else {
            $target = false;
        }

        // download
        if ($download) {
            $download = 'download="' . $download . '"';
        } else {
            $download = false;
        }

        $output = '<a class="content_link ' . $class . '" href="' . $link . '" ' . $target . ' ' . $download . '>';
        if ($icon) {
            $output .= '<span class="icon"><i class="' . $icon . '"></i></span>';
        }
        if ($title) {
            $output .= '<span class="title">' . $title . '</span>';
        }
        $output .= '</a>';

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Blockquote [blockquote] [/blockquote]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_blockquote')) {
    function sc_blockquote($attr, $content = null)
    {
        /*array(
			'author'	=> '',
			'link'		=> '',
			'target'	=> '',
		);*/

        // target
        if ($target) {
            $target = 'target="_blank"';
        } else {
            $target = false;
        }

        $output = '<div class="blockquote">';
        $output .= '<blockquote>' . $content . '</blockquote>';
        if ($attr['author']) {
            $output .= '<p class="author">';
            $output .= '<i class="fa-icon-user"></i>';
            if ($attr['link']) {
                $output .= '<a href="' . $attr['link'] . '" ' . $attr['target'] . '>' . $attr['author'] . '</a>';
            } else {
                $output .= '<span>' . $attr['author'] . '</span>';
            }
            $output .= '</p>';
        }
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Clients [clients]
* --------------------------------------------------------------------------- */
if (!function_exists('sc_clients')) {
    function sc_clients($attr, $content = null)
    {
        /*array(
			'in_row' 	=> 6,
			'category' 	=> '',
			'style' 	=> '',
		);*/

        // style
        if ($style) {
            $style = 'clients_tiles';
        } else {
            $style = false;
        }

        if (!intval($in_row)) {
            $in_row = 6;
        }

        $args = [
            'post_type'      => 'client',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ];
        if ($category) {
            $args['client-types'] = $category;
        }

        $output = '<ul class="clients ' . $style . '">';
        $output .= 'to be added later' . "\n";
        $output .= '</ul>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Fancy Heading [fancy_heading] [/fancy_heading]
* --------------------------------------------------------------------------- */
if (!function_exists('fancy_heading')) {
    function sc_fancy_heading($attr, $content = null)
    {
        /*array(
			'title'		=> '',
			'h1'		=> '',
			'icon' 		=> '',
			'slogan' 	=> '',
			'style' 	=> 'icon',	// icon, line, arrows
			'animate' 	=> '',
		);*/

        $output = '<div class="fancy_heading fancy_heading_' . $attr['style'] . '">';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }

        if ($attr['icon'] && $attr['style'] == 'icon') {
            $output .= '<span class="icon_top"><i class="' . $attr['icon'] . '"></i></span>';
        }
        if ($attr['slogan'] && $attr['style'] == 'line') {
            $output .= '<span class="slogan">' . $attr['slogan'] . '</span>';
        }
        if ($attr['style'] == 'arrows') {
            $attr['title'] = '<i class="im-icon-arrow-right-14"></i>' . $attr['title'] . '<i class="im-icon-arrow-left-13"></i>';
        }
        if ($attr['title']) {
            if ($attr['h1']) {
                $output .= '<h1 class="title">' . $attr['title'] . '</h1>';
            } else {
                $output .= '<h2 class="title">' . $attr['title'] . '</h2>';
            }
        }
        if ($content) {
            $output .= '<div class="inside">' . $content . '</div>';
        }

        if ($attr['animate']) {
            $output .= '</div>';
        }
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Icon Box [icon_box] [/icon_box]
* --------------------------------------------------------------------------- */
if (!function_exists('sc_icon_box')) {
    function sc_icon_box($attr, $content = null)
    {
        /*array(
			'title'			=> '',
			'icon'			=> '',
			'image'			=> '',
			'icon_position'	=> 'top',
			'border'		=> '',
			'link'			=> '',
			'target'		=> '',
			'animate'		=> '',
			'class'			=> '',
		);*/

        // border
        if ($attr['border']) {
            $border = 'has_border';
        } else {
            $border = 'no_border';
        }

        // target
        if ($attr['target']) {
            $target = 'target="_blank"';
        } else {
            $target = false;
        }

        $output = '';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }
        $output .= '<div class="icon_box icon_position_' . $attr['icon_position'] . ' ' . $border . '">';
        if ($attr['link']) {
            $output .= '<a class="' . $attr['class'] . '" href="' . $attr['link'] . '" ' . $target . '>';
        }

        if ($attr['image']) {
            $output .= '<div class="image_wrapper">';
            $output .= '<img src="' . $attr['image'] . '" alt="' . $attr['title'] . '" class="scale-with-grid" />';
            $output .= '</div>';
        } else {
            $output .= '<div class="icon_wrapper">';
            $output .= '<div class="icon">';
            $output .= '<i class="' . $attr['icon'] . '"></i>';
            $output .= '</div>';
            $output .= '</div>';
        }

        $output .= '<div class="desc_wrapper">';
        if ($attr['title']) {
            $output .= '<h4>' . $attr['title'] . '</h4>';
        }
        if ($content) {
            $output .= '<div class="desc">' . $content . '</div>';
        }
        $output .= '</div>';

        if ($attr['link']) {
            $output .= '</a>';
        }
        $output .= '</div>' . "\n";
        if ($attr['animate']) {
            $output .= '</div>' . "\n";
        }

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Our Team [our_team]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_our_team')) {
    function sc_our_team($attr, $content = null)
    {
        /*array(
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
		);*/

        $output = '<div class="team team_' . $attr['style'] . '">';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }

        $output .= '<div class="image_frame no_link scale-with-grid">';
        $output .= '<div class="image_wrapper">';
        $output .= '<img class="scale-with-grid" src="' . $attr['image'] . '" alt="' . $attr['title'] . '" />';
        $output .= '</div>';
        $output .= '</div>';

        $output .= '<div class="desc_wrapper">';
        if ($attr['title']) {
            $output .= '<h4>' . $attr['title'] . '</h4>';
        }
        if ($attr['subtitle']) {
            $output .= '<p class="subtitle">' . $attr['subtitle'] . '</p>';
        }
        if ($attr['phone']) {
            $output .= '<p class="phone"><i class="im-icon-phone-4"></i> <a href="tel:' . $attr['phone'] . '">' . $attr['phone'] . '</a></p>';
        }
        $output .= '<hr class="hr_color" />';

        $output .= '<div class="desc">' . $content . '</div>';

        if ($attr['email'] || $attr['phone'] || $attr['facebook'] || $attr['twitter'] || $attr['linkedin']) {
            $output .= '<div class="links">';
            if ($attr['email']) {
                $output .= '<a href="mailto:' . $attr['email'] . '" class="icon_bar icon_bar_small"><span class="t"><i class="im-icon-mail-send"></i></span><span class="b"><i class="im-icon-mail-send"></i></span></a>';
            }
            if ($attr['facebook']) {
                $output .= '<a target="_blank" href="' . $attr['facebook'] . '" class="icon_bar icon_bar_small"><span class="t"><i class="fa-icon-facebook"></i></span><span class="b"><i class="fa-icon-facebook"></i></span></a>';
            }
            if ($attr['twitter']) {
                $output .= '<a target="_blank" href="' . $attr['twitter'] . '" class="icon_bar icon_bar_small"><span class="t"><i class="fa-icon-twitter"></i></span><span class="b"><i class="fa-icon-twitter"></i></span></a>';
            }
            if ($attr['linkedin']) {
                $output .= '<a target="_blank" href="' . $attr['linkedin'] . '" class="icon_bar icon_bar_small"><span class="t"><i class="fa-icon-linkedin"></i></span><span class="b"><i class="fa-icon-linkedin"></i></span></a>';
            }
            $output .= '</div>';
        }
        $output .= '</div>';

        if ($attr['animate']) {
            $output .= '</div>';
        }
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Our Team List [our_team_list]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_our_team_list')) {
    function sc_our_team_list($attr, $content = null)
    {
        /*array(
			'image' 		=> '',
			'title' 		=> '',
			'subtitle'		=> '',
			'blockquote'	=> '',
			'email' 		=> '',
			'phone' 		=> '',
			'facebook' 		=> '',
			'twitter'		=> '',
			'linkedin'		=> '',
		);*/

        $output = '<div class="team team_list">';

        $output .= '<div class="column col-sm-3 col-md-3">';
        $output .= '<div class="image_frame no_link scale-with-grid">';
        $output .= '<div class="image_wrapper">';
        $output .= '<img class="scale-with-grid" src="' . $attr['image'] . '" alt="' . $attr['title'] . '" />';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';

        $output .= '<div class="column col-sm-6 col-md-6">';
        $output .= '<div class="desc_wrapper">';
        if ($attr['title']) {
            $output .= '<h4>' . $attr['title'] . '</h4>';
        }
        if ($attr['subtitle']) {
            $output .= '<p class="subtitle">' . $attr['subtitle'] . '</p>';
        }
        if ($attr['phone']) {
            $output .= '<p class="phone"><i class="im-icon-phone-4"></i> <a href="tel:' . $attr['phone'] . '">' . $attr['phone'] . '</a></p>';
        }
        $output .= '<hr class="hr_color" />';

        $output .= '<div class="desc">' . $content . '</div>';
        $output .= '</div>';
        $output .= '</div>';

        $output .= '<div class="column col-sm-3 col-md-3">';
        $output .= '<div class="bq_wrapper">';
        if ($attr['blockquote']) {
            $output .= '<blockquote>' . $attr['blockquote'] . '</blockquote>';
        }

        if ($attr['email'] || $attr['phone'] || $attr['facebook'] || $attr['twitter'] || $attr['linkedin']) {
            $output .= '<div class="links">';
            if ($attr['email']) {
                $output .= '<a href="mailto:' . $attr['email'] . '" class="icon_bar icon_bar_small"><span class="t"><i class="im-icon-mail-send"></i></span><span class="b"><i class="im-icon-mail-send"></i></span></a>';
            }
            if ($attr['facebook']) {
                $output .= '<a target="_blank" href="' . $attr['facebook'] . '" class="icon_bar icon_bar_small"><span class="t"><i class="fa-icon-facebook"></i></span><span class="b"><i class="fa-icon-facebook"></i></span></a>';
            }
            if ($attr['twitter']) {
                $output .= '<a target="_blank" href="' . $attr['twitter'] . '" class="icon_bar icon_bar_small"><span class="t"><i class="fa-icon-twitter"></i></span><span class="b"><i class="fa-icon-twitter"></i></span></a>';
            }
            if ($attr['linkedin']) {
                $output .= '<a target="_blank" href="' . $attr['linkedin'] . '" class="icon_bar icon_bar_small"><span class="t"><i class="fa-icon-linkedin"></i></span><span class="b"><i class="fa-icon-linkedin"></i></span></a>';
            }
            $output .= '</div>';
        }
        $output .= '</div>';
        $output .= '</div>';

        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Portfolio [portfolio]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_portfolio')) {
    function sc_portfolio($attr, $content = null)
    {
        /*array(
			'count' 		=> '2',
			'category' 		=> '',
			'orderby' 		=> 'date',
			'order' 		=> 'DESC',
			'style'			=> 'one',
			'pagination'	=> '',
		);*/

        $output = '<div class="portfolio_wrapper isotope_wrapper">';

        $output .= '<ul class="portfolio_group isotope ' . $style . '">';
        $output .= 'to be added later';
        $output .= '</ul>';
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Portfolio Grid [portfolio_grid]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_portfolio_grid')) {
    function sc_portfolio_grid($attr, $content = null)
    {
        /*array(
			'count' 		=> '4',
			'category' 		=> '',
			'orderby' 		=> 'date',
			'order' 		=> 'DESC',
		);*/

        $args = [
            'post_type'           => 'portfolio',
            'posts_per_page'      => intval($count),
            'paged'               => -1,
            'orderby'             => $orderby,
            'order'               => $order,
            'ignore_sticky_posts' => 1,
        ];

        $output = '<ul class="portfolio_grid">';
        $output .= '<li>';
        $output .= '<div class="image_frame scale-with-grid">';
        $output .= '<div class="image_wrapper">';
        $output .= 'to be done';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</li>';
        $output .= '</ul>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Portfolio Slider [portfolio_slider]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_portfolio_slider')) {
    function sc_portfolio_slider($attr, $content = null)
    {
        /*array(
			'count' 		=> '5',
			'category' 		=> '',
			'orderby' 		=> 'date',
			'order' 		=> 'DESC',
		);*/

        $args = [
            'post_type'           => 'portfolio',
            'posts_per_page'      => intval($count),
            'paged'               => -1,
            'orderby'             => $orderby,
            'order'               => $order,
            'ignore_sticky_posts' => 1,
        ];

        $output = '<div class="portfolio_slider">';
        $output .= '<ul class="portfolio_slider_ul">';
        $output .= '<li>';
        $output .= '<div class="image_frame scale-with-grid">';
        $output .= '<div class="image_wrapper">';
        $output .= 'once again to bo done later';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</li>';
        $output .= '</ul>';
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Slides [slides]
* --------------------------------------------------------------------------- */
if (!function_exists('sc_slider')) {
    function sc_slider($attr, $content = null)
    {
        global $xoopsDB;
        $rest = substr((string) $attr['content'], 3, -2);
        $id   = substr($rest, -2);

        //var_dump($attr['content']);
        //var_dump($id);
        $output = '';
        $output .= '<link rel="stylesheet" href="<{$xoops_url}>/modules/system/admin/themebuilder1/slider/css/crellyslider.css" type="text/css" media="all">
<script type="text/javascript" src="<{$xoops_url}>/modules/system/admin/themebuilder1/slider/js/jquery.crellyslider.js"></script>';

        //$id = isset($_GET['id']) ? $_GET['id'] : NULL;
        //$id = 17;
        $sqlslider = "SELECT * FROM " . $xoopsDB->prefix("crellyslider_sliders") . " WHERE id = '" . $id . "'";
        $result    = $xoopsDB->query($sqlslider);
        $slider    = $xoopsDB->fetchArray($result);

        if (!$slider) {
            $output .= 'The slider hasn\'t been found';
        }

        //var_dump($slider);

        $sqlslides = "SELECT * FROM " . $xoopsDB->prefix("crellyslider_slides") . " WHERE slider_parent = '" . $id . "' ORDER BY position";
        $result    = $xoopsDB->query($sqlslides);
        while ($myrow = $xoopsDB->fetchArray($result)) {
            $slides[] = $myrow;
        }

        $slider_id = $slider['id'];
        //var_dump($slides);

        $output .= '<div style="display: block;" class="crellyslider-slider crellyslider-slider-' . $slider['layout'] . ' crellyslider-slider-' . $slider['alias'] . '" id="crellyslider-' . $slider_id . '">' . "\n";
        $output .= '<ul>' . "\n";
        foreach ($slides as $slide) {
            $background_type_image = $slide['background_type_image'] == 'undefined' || $slide['background_type_image'] == 'none' ? 'none;' : 'url(\'' . $slide['background_type_image'] . '\');';
            $output                .= '<li' . "\n" .
                                      'style="' . "\n" .
                                      'background-color: ' . $slide['background_type_color'] . ';' . "\n" .
                                      'background-image: ' . $background_type_image . "\n" .
                                      'background-position: ' . $slide['background_propriety_position_x'] . ' ' . $slide['background_propriety_position_y'] . ';' . "\n" .
                                      'background-repeat: ' . $slide['background_repeat'] . ';' . "\n" .
                                      'background-size: ' . $slide['background_propriety_size'] . ';' . "\n" .
                                      stripslashes((string) $slide['custom_css']) . "\n" .
                                      '"' . "\n" .

                                      'data-in="' . $slide['data_in'] . '"' . "\n" .
                                      'data-ease-in="' . $slide['data_easeIn'] . '"' . "\n" .
                                      'data-out="' . $slide['data_out'] . '"' . "\n" .
                                      'data-ease-out="' . $slide['data_easeOut'] . '"' . "\n" .
                                      'data-time="' . $slide['data_time'] . '"' . "\n" .
                                      '>' . "\n";

            if ($slide['link'] != '') {
                if ($slide['link_new_tab']) {
                    $output .= '<a class="cs-background-link" target="_blank" href="' . stripslashes((string) $slide['link']) . '"></a>';
                } else {
                    $output .= '<a class="cs-background-link" href="' . stripslashes((string) $slide['link']) . '"></a>';
                }
            }

            $slide_parent = $slide['position'];
            $elements     = [];
            $sqlelements  = "SELECT * FROM " . $xoopsDB->prefix("crellyslider_elements") . " WHERE slider_parent = '" . $slider_id . "' AND slide_parent = '" . $slide_parent . "'";
            $result       = $xoopsDB->query($sqlelements);
            while ($myrowelements = $xoopsDB->fetchArray($result)) {
                $elements[] = $myrowelements;
            }

            //var_dump ($elements);

            foreach ($elements as $element) {
                if ($element['link'] != '') {
                    $target = $element['link_new_tab'] == 1 ? 'target="_blank"' : '';

                    $output .= '<a' . "\n" .
                               'data-delay="' . $element['data_delay'] . '"' . "\n" .
                               'data-ease-in="' . $element['data_easeIn'] . '"' . "\n" .
                               'data-ease-out="' . $element['data_easeOut'] . '"' . "\n" .
                               'data-in="' . $element['data_in'] . '"' . "\n" .
                               'data-out="' . $element['data_out'] . '"' . "\n" .
                               'data-ignore-ease-out="' . $element['data_ignoreEaseOut'] . '"' . "\n" .
                               'data-top="' . $element['data_top'] . '"' . "\n" .
                               'data-left="' . $element['data_left'] . '"' . "\n" .
                               'data-time="' . $element['data_time'] . '"' . "\n" .
                               'href="' . stripslashes((string) $element['link']) . '"' . "\n" .
                               $target . "\n" .
                               'style="' .
                               'z-index: ' . $element['z_index'] . ';' . "\n" .
                               '">' . "\n";
                }
                //var_dump($element['type']);
                switch ($element['type']) {
                    case 'text':
                        $output .= '<div' . "\n" .
                                   'class="' . $element['custom_css_classes'] . '"' . "\n" .
                                   'style="';
                        if ($element['link'] == '') {
                            $output .= 'z-index: ' . $element['z_index'] . ';' . "\n";
                        }
                        $output .= stripslashes((string) $element['custom_css']) . "\n" .
                                   '"' . "\n";
                        if ($element['link'] == '') {
                            $output .= 'data-delay="' . $element['data_delay'] . '"' . "\n" .
                                       'data-ease-in="' . $element['data_easeIn'] . '"' . "\n" .
                                       'data-ease-out="' . $element['data_easeOut'] . '"' . "\n" .
                                       'data-in="' . $element['data_in'] . '"' . "\n" .
                                       'data-out="' . $element['data_out'] . '"' . "\n" .
                                       'data-ignore-ease-out="' . $element['data_ignoreEaseOut'] . '"' . "\n" .
                                       'data-top="' . $element['data_top'] . '"' . "\n" .
                                       'data-left="' . $element['data_left'] . '"' . "\n" .
                                       'data-time="' . $element['data_time'] . '"' . "\n";
                        }
                        $output .= '>' . "\n" .
                                   stripslashes((string) $element['inner_html']) . "\n" .
                                   '</div>' . "\n";
                        break;

                    case 'image':
                        $output .= '<img' . "\n" .
                                   'class="' . $element['custom_css_classes'] . '"' . "\n" .
                                   'src="' . $element['image_src'] . '"' . "\n" .
                                   'alt="' . $element['image_alt'] . '"' . "\n" .
                                   'style="' . "\n";
                        if ($element['link'] == '') {
                            $output .= 'z-index: ' . $element['z_index'] . ';' . "\n";
                        }
                        $output .= stripslashes((string) $element['custom_css']) . "\n" .
                                   '"' . "\n";
                        if ($element['link'] == '') {
                            $output .= 'data-delay="' . $element['data_delay'] . '"' . "\n" .
                                       'data-ease-in="' . $element['data_easeIn'] . '"' . "\n" .
                                       'data-ease-out="' . $element['data_easeOut'] . '"' . "\n" .
                                       'data-in="' . $element['data_in'] . '"' . "\n" .
                                       'data-out="' . $element['data_out'] . '"' . "\n" .
                                       'data-ignore-ease-out="' . $element['data_ignoreEaseOut'] . '"' . "\n" .
                                       'data-top="' . $element['data_top'] . '"' . "\n" .
                                       'data-left="' . $element['data_left'] . '"' . "\n" .
                                       'data-time="' . $element['data_time'] . '"' . "\n";
                        }
                        $output .= '/>' . "\n";
                        break;

                    case 'youtube_video':
                        $output .= '<iframe frameborder="0" type="text/html" width="560" height="315"' . "\n" .
                                   'class="cs-yt-iframe ' . $element['custom_css_classes'] . '"' . "\n" .
                                   'src="' . 'https://www.youtube.com/embed/' . $element['video_id'] . '?enablejsapi=1' . '"' . "\n" .
                                   'data-autoplay="' . $element['video_autoplay '] . '"' . "\n" .
                                   'data-loop="' . $element['video_loop'] . '"' . "\n" .
                                   'style="' . "\n" .
                                   'z-index: ' . $element['z_index'] . ';' . "\n" .
                                   stripslashes((string) $element['custom_css']) . "\n" .
                                   '"' . "\n" .
                                   'data-delay="' . $element['data_delay'] . '"' . "\n" .
                                   'data-ease-in="' . $element['data_easeIn'] . '"' . "\n" .
                                   'data-ease-out="' . $element['data_easeOut'] . '"' . "\n" .
                                   'data-in="' . $element['data_in'] . '"' . "\n" .
                                   'data-out="' . $element['data_out'] . '"' . "\n" .
                                   'data-ignore-ease-out="' . $element['data_ignoreEaseOut'] . '"' . "\n" .
                                   'data-top="' . $element['data_top'] . '"' . "\n" .
                                   'data-left="' . $element['data_left'] . '"' . "\n" .
                                   'data-time="' . $element['data_time'] . '"' . "\n" .
                                   '></iframe>' . "\n";
                        break;

                    case 'vimeo_video':
                        $output .= '<iframe frameborder="0" width="560" height="315"' . "\n" .
                                   'class="cs-vimeo-iframe ' . $element['custom_css_classes'] . '"' . "\n" .
                                   'src="' . 'https://player.vimeo.com/video/' . $element['video_id'] . '?api=1' . '"' . "\n" .
                                   'data-autoplay="' . $element['video_autoplay'] . '"' . "\n" .
                                   'data-loop="' . $element['video_loop'] . '"' . "\n" .
                                   'style="' . "\n" .
                                   'z-index: ' . $element['z_index'] . ';' . "\n" .
                                   stripslashes((string) $element['custom_css']) . "\n" .
                                   '"' . "\n" .
                                   'data-delay="' . $element['data_delay'] . '"' . "\n" .
                                   'data-ease-in="' . $element['data_easeIn'] . '"' . "\n" .
                                   'data-ease-out="' . $element['data_easeOut'] . '"' . "\n" .
                                   'data-in="' . $element['data_in'] . '"' . "\n" .
                                   'data-out="' . $element['data_out'] . '"' . "\n" .
                                   'data-ignore-ease-out="' . $element['data_ignoreEaseOut'] . '"' . "\n" .
                                   'data-top="' . $element['data_top'] . '"' . "\n" .
                                   'data-left="' . $element['data_left'] . '"' . "\n" .
                                   'data-time="' . $element['data_time'] . '"' . "\n" .
                                   '></iframe>' . "\n";
                        break;
                }

                if ($element['link'] != '') {
                    $output .= '</a>' . "\n";
                }
            }

            $output .= '</li>' . "\n";
        }
        $output .= '</ul>' . "\n";
        $output .= '</div>' . "\n";

        $output .= '<script type="text/javascript">' . "\n";
        $output .= '(function($) {' . "\n";
        $output .= '$(document).ready(function() {' . "\n";
        $output .= '$("#crellyslider-' . $slider_id . '").crellySlider({' . "\n";
        $output .= 'layout: \'' . $slider['layout'] . '\',' . "\n";
        $output .= 'responsive: ' . $slider['responsive'] . ',' . "\n";
        $output .= 'startWidth: ' . $slider['startWidth'] . ',' . "\n";
        $output .= 'startHeight: ' . $slider['startHeight'] . ',' . "\n";
        $output .= 'automaticSlide: ' . $slider['automaticSlide'] . ',' . "\n";
        $output .= 'showControls: ' . $slider['showControls'] . ',' . "\n";
        $output .= 'showNavigation: ' . $slider['showNavigation'] . ',' . "\n";
        $output .= 'enableSwipe: ' . $slider['enableSwipe'] . ',' . "\n";
        $output .= 'showProgressBar: ' . $slider['showProgressBar'] . ',' . "\n";
        $output .= 'pauseOnHover: ' . $slider['pauseOnHover'] . ',' . "\n";
        if ($slider['randomOrder'] != null) {
            $output .= 'randomOrder: ' . $slider['randomOrder'] . ',' . "\n";
        }
        if ($slider['startFromSlide'] != null) {
            $output .= 'startFromSlide: ' . $slider['startFromSlide'] . ',' . "\n";
        }
        $output .= stripslashes((string) $slider['callbacks']) . "\n";
        $output .= '});' . "\n";
        $output .= '});' . "\n";
        $output .= '})(jQuery);' . "\n";
        $output .= '</script>' . "\n";

        $output1 = '<div class="olivee-item-contentdiv">';
        $output1 .= "\n" . $output . "\n";
        $output1 .= "</div>\n";

        return $output1;
    }
}

/* ---------------------------------------------------------------------------
 * Slides [slides]
* --------------------------------------------------------------------------- */
if (!function_exists('sc_slider1')) {
    function sc_slider1($attr, $content = null)
    {
        $output = '';
        $output .= '<div class="content_slider">';
        $output .= '<ul class="content_slider_ul">';
        $output .= "\n" . $attr['content'] . "\n";
        $output .= '</ul>';

        $output .= '<a class="button button_js slider_prev" href="#"><span class="button_icon"><i class="fa-icon-arrow-left"></i></span></a>';
        $output .= '<a class="button button_js slider_next" href="#"><span class="button_icon"><i class="fa-icon-arrow-right"></i></span></a>';
        $output .= '<div class="slider_pagination"></div>';

        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Offer [offer]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_offer')) {
    function sc_offer($attr = false, $content = null)
    {
        /*array(
			'category' 	=> '',
		);*/

        $args = [
            'post_type'           => 'offer',
            'posts_per_page'      => -1,
            'orderby'             => 'menu_order',
            'order'               => 'ASC',
            'ignore_sticky_posts' => 1,
        ];

        $output = '';

        $output .= '<div class="offer">';
        $output .= '<ul class="offer_ul">';
        $output .= '<li class="offer_li">';

        $output .= '<div class="image_wrapper">';
        $output .= 'hhhhhh';
        $output .= '</div>';

        $output .= '<div class="desc_wrapper">';

        $output .= '<div class="title">';
        $output .= '<h3>title</h3>';
        if ($link) {
            $output .= '<a href="' . $link . '" class="button button_js" ' . $target . '><span class="button_icon"><i class="fa-icon-layout"></i></span><span class="button_label">hhhhh</span></a>';
        }
        $output .= '</div>';

        $output .= '<div class="desc">';
        $output .= 'the_content';
        $output .= '</div>';

        $output .= '</div>';

        $output .= '</li>';

        $output .= '</ul>';
        $output .= '<a class="button button_large button_js slider_prev" href="#"><span class="button_icon"><i class="fa-icon-up-open-big"></i></span></a>';
        $output .= '<div class="slider_pagination"><span class="current">1</span> / <span class="count">1</span></div>';
        $output .= '<a class="button button_large button_js slider_next" href="#"><span class="button_icon"><i class="fa-icon-down-open-big"></i></span></a>';
        $output .= '</div>' . "\n";
        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Map [map]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_map')) {
    function sc_map($attr, $content = null)
    {
        /*array(
			'lat' 		=> '',
			'lng' 		=> '',
			'zoom' 		=> 13,
			'height' 	=> 200,
			'title'		=> '',
			'uid' 		=> uniqid(),
		);*/

        $output = '<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>';

        $output .= '<script>';
        //<![CDATA[
        $output .= 'function google_maps_' . $attr['uid'] . '(){';
        $output .= 'var latlng = new google.maps.LatLng(' . $attr['lat'] . ',' . $attr['lng'] . ');';
        $output .= 'var myOptions = {';
        $output .= 'zoom				: ' . intval($attr['zoom']) . ',';
        $output .= 'center				: latlng,';
        $output .= 'zoomControl			: true,';
        $output .= 'mapTypeControl		: false,';
        $output .= 'streetViewControl	: false,';
        $output .= 'scrollwheel			: false,';
        $output .= 'mapTypeId			: google.maps.MapTypeId.ROADMAP';
        $output .= '};';

        $output .= 'var map = new google.maps.Map(document.getElementById("google-map-area-' . $attr['uid'] . '"), myOptions);';
        $output .= 'var image = "' . XOOPS_URL . '/themes/themebuilder1/images/pin.png";';
        $output .= 'var marker = new google.maps.Marker({';
        $output .= 'position			: latlng,';
        $output .= 'icon				: image,';
        $output .= 'map					: map';
        $output .= '});';

        $output .= '}';

        $output .= 'jQuery(document).ready(function($){';
        $output .= 'google_maps_' . $attr['uid'] . '();';
        $output .= '});';
        //]]>
        $output .= '</script>';

        $output .= '<div class="google-map-wrapper">';

        if ($attr['title'] || $content) {
            $output .= '<div class="google-map-contact-wrapper">';
            $output .= '<div class="get_in_touch">';
            if ($attr['title']) {
                $output .= '<h3>' . $attr['title'] . '</h3>';
            }
            $output .= '<div class="get_in_touch_wrapper">';
            $output .= '<ul>';
            $output .= '<li class="address">';
            $output .= '<span class="icon"><i class="im-icon-location-4"></i></span>';
            $output .= '<span class="address_wrapper">' . $content . '</span>';
            $output .= '</li>';
            $output .= '</ul>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
        }

        $output .= '<div class="google-map" id="google-map-area-' . $attr['uid'] . '" style="width:100%; height:' . intval($attr['height']) . 'px;">&nbsp;</div>';

        $output .= '</div>' . "\n";
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
if (!function_exists('sc_tabs')) {
    function sc_tabs($attr, $content = null)
    {
        global $tabs_array, $tabs_count;

        /*array(
			'title'	=> '',
			'uid'	=> 'tab-'. uniqid(),
			'tabs'	=> '',
			'type'	=> '',
		);
		$content;*/

        // content builder
        if ($attr['tabs']) {
            $tabs_array = $attr['tabs'];
        }

        $output = '';
        if (is_array($tabs_array)) {
            $output .= '<div class="tabs">';
            if ($attr['title']) {
                $output .= '<h4 class="title">' . $attr['title'] . '</h4>';
            }
            $output .= '<div class="jq-tabs' . $attr['title'] . ' tabs_wrapper tabs_' . $attr['type'] . '">';

            // contant
            $output      .= '<ul>';
            $i           = 1;
            $output_tabs = '';
            foreach ($tabs_array as $tab) {
                $output      .= '<li><a href="#' . $uid . '-' . $i . '">' . $tab['title'] . '</a></li>';
                $output_tabs .= '<div id="' . $uid . '-' . $i . '">' . $tab['content'] . '</div>';
                $i++;
            }
            $output .= '</ul>';

            // titles
            $output .= $output_tabs;

            $output .= '</div>';
            $output .= '</div>' . "\n";
            $output .= '</div>' . "\n";

            $tabs_array = '';
            $tabs_count = 0;
        }

        $output .= '  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

 
<script>
$(".jq-tabs' . $attr['title'] . '").tabs();
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
if (!function_exists('sc_tab')) {
    function sc_tab($attr, $content = null)
    {
        global $tabs_array, $tabs_count;

        /*array(
			'title' => 'Tab title',
		)*/

        $tabs_array[] = [
            'title'   => $title,
            'content' => $content,
        ];
        $tabs_count++;

        return true;
    }
}

/* ---------------------------------------------------------------------------
 * Accordion [accordion]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_accordion')) {
    function sc_accordion($attr, $content = null)
    {
        /*array(
			'title' 	=> '',
			'tabs' 		=> '',
			'open1st' 	=> '',
			'style' 	=> 'accordion',
		);*/

        // class
        $class = false;
        if ($attr['open1st']) {
            $class = 'open1st';
        }
        if ($attr['style'] == 'toggle') {
            $class = 'toggle';
        }

        $output = '';

        $output .= '<div class="accordion">';
        if ($attr['title']) {
            $output .= '<h4 class="title">' . $attr['title'] . '</h4>';
        }
        $output .= '<div class="mfn-acc' . $attr['title'] . ' accordion_wrapper ' . $class . '">';
        //$output .= print_r($attr['tabs']);
        if (is_array($attr['tabs'])) {
            // content builder
            foreach ($attr['tabs'] as $tab) {
                $output .= '<div class="question">';
                $output .= '<div class="title"><i class="fa-glyphicon glyphicon-star"></i><i class="icon-minus acc-icon-minus"></i>' . $tab['title'] . '</div>';
                $output .= '<div class="answer">';
                $output .= $tab['content'];
                $output .= '</div>';
                $output .= '</div>' . "\n";
            }
        } else {
            $output . $content;
        }

        $output .= '</div>';
        $output .= '</div>' . "\n";

        $output .= ' 
<script>
$(".mfn-acc' . $attr['title'] . '.open1st .question:first-child")
			.addClass("active")
			.children(".answer")
				.show();

		$(".mfn-acc' . $attr['title'] . ' .question > .title").click(function(){		
			if($(this).parent().hasClass("active")) {
				$(this).parent().removeClass("active").children(".answer").slideToggle(200);
			}
			else
			{
				if( ! $(this).closest(".mfn-acc' . $attr['title'] . '").hasClass("toggle") ){
					$(this).parents(".mfn-acc' . $attr['title'] . '").children().each(function() {
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
if (!function_exists('sc_faq')) {
    function sc_faq($attr, $content = null)
    {
        /*array(
			'title' 	=> '',
			'tabs' 		=> '',
			'open1st' 	=> '',
		);*/

        // class
        $class = false;
        if ($attr['open1st']) {
            $class = 'open1st';
        }

        $output = '';

        $output .= '<div class="faq">';
        if ($attr['title']) {
            $output .= '<h4 class="title">' . $attr['title'] . '</h4>';
        }
        $output .= '<div class="mfn-acc faq_wrapper ' . $class . '">';

        if (is_array($attr['tabs'])) {
            // content builder
            $i = 0;
            foreach ($attr['tabs'] as $tab) {
                $i++;
                $output .= '<div class="question">';
                $output .= '<div class="title"><span class="num">' . $i . '</span><i class="fa-icon-plus acc-icon-plus"></i><i class="fa-icon-minus acc-icon-minus"></i>' . $tab['title'] . '</div>';
                $output .= '<div class="answer">';
                $output .= $tab['content'];
                $output .= '</div>';
                $output .= '</div>' . "\n";
            }
        } else {
            $output .= $content;
        }

        $output .= '</div>';
        $output .= '</div>' . "\n";

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
if (!function_exists('sc_progress_bars')) {
    function sc_progress_bars($attr, $content = null)
    {
        /*array(
			'title' => '',
		);*/

        $d = explode('[bartitle="', (string) $content);

        $array = [];
        foreach ($d as $k => $v) {
            $d2    = explode('" value="', $v);
            $d2[1] = str_replace('"]', '', trim($d2[1]));
            if (!empty($v)) {
                //unset($array[$k]);
                //}
                $array[$d2[0]] = $d2[1];
            }
        }

        $output = "\n" . '<div class="progress_bars">' . "\n";
        if ($attr['title']) {
            $output .= '<h4 class="title">' . $attr['title'] . '</h4>';
        }
        $output .= "\n" . '<ul class="bars_list">' . "\n";//un seul bar progress a finir plutard pour plusieurs progressbars

        if (is_array($array)) {
            // content builder
            foreach ($array as $tab => $ts) {
                //$output .=  var_dump ($array) ;
                //$output .=  var_dump ($ts) ;
                $output .= '<li>';

                $output .= '<h6>';
                $output .= $tab;
                $output .= '<span class="label">' . $ts . '%</span>';
                $output .= '</h6>';

                $output .= '<div class="bar">';
                $output .= '<span class="progress" style="width:' . $ts . '%"></span>';
                $output .= '</div>' . "\n";

                $output .= '</li>' . "\n";
            }
        } else {
            $output .= $content;
        }
        $output .= '</ul>' . "\n";
        $output .= '</div>' . "\n";

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
if (!function_exists('sc_bar')) {
    function sc_bar($attr, $content = null)
    {
        /*array(
			'title' => '',
			'value' => 0,
		);*/

        $value = intval($attr['value']);

        $output = '<li>';

        $output .= '<h6>';
        $output .= $attr['title'];
        $output .= '<span class="label">' . $attr['value'] . '%</span>';
        $output .= '</h6>';

        $output .= '<div class="bar">';
        $output .= '<span class="progress" style="width:' . $attr['value'] . '%"></span>';
        $output .= '</div>';

        $output .= '</li>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Timeline [timeline] [/timeline]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_timeline')) {
    function sc_timeline($attr, $content = null)
    {
        /*array(
			'count' => '',
			'tabs' => '',
		);*/

        $output = '<ul class="timeline_items">';

        if (is_array($attr['tabs'])) {
            // content builder
            foreach ($attr['tabs'] as $tab) {
                $output .= '<li>';
                $output .= '<h3>' . $tab['title'] . '</h3>';
                if ($tab['content']) {
                    $output .= '<div class="desc">';
                    $output .= $tab['content'];
                    $output .= '</div>';
                }
                $output .= '</li>';
            }
        } else {
            $output .= $content;
        }

        $output .= '</ul>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Vimeo [video]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_video')) {
    function sc_video($attr, $content = null)
    {
        /*array(
			'video' 	=> '',
			'width' 	=> '710',
			'height' 	=> '426',
		);*/
        $output = '<pre>';
        $output .= $attr['width'];
        $output .= '</pre>';

        $output .= '<div class="content_video">';
        if (is_numeric($attr['video'])) {
            // Vimeo
            $output .= '<iframe class="scale-with-grid" width="' . $attr['width'] . '" height="' . $attr['height'] . '" src="http://player.vimeo.com/video/' . $attr['video'] . '" allowFullScreen></iframe>' . "\n";
        } else {
            // YouTube
            $output .= '<iframe class="scale-with-grid" width="' . $attr['width'] . '" height="' . $attr['height'] . '" src="http://www.youtube.com/embed/' . $attr['video'] . '?wmode=opaque" allowfullscreen></iframe>' . "\n";
        }
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * _Item [item]								[feature_list][item][/feature_list]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_item')) {
    function sc_item($attr, $content = null)
    {
        /*array(
			'title'		=> '',
			'link'		=> '',
			'icon'		=> 'fa-icon-picture',
			'animate'	=> '',
		);*/

        $output = '<li>';
        if ($animate) {
            $output .= '<div class="animate" data-anim-type="' . $animate . '">';
        }
        if ($link) {
            $output .= '<a href="' . $link . '">';
        }

        $output .= '<span class="icon">';
        $output .= '<i class="' . $icon . '"></i>';
        $output .= '</span>';
        $output .= '<p>' . $title . '</p>';

        if ($link) {
            $output .= '</a>';
        }
        if ($animate) {
            $output .= '</div>';
        }
        $output .= '</li>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * Feature List [feature_list]				[feature_list][item][/feature_list]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_feature_list')) {
    function sc_feature_list($attr, $content = null)
    {
        $output = '<div class="feature_list">';
        $output .= '<ul>';
        $output .= $content;    // [item]
        $output .= '</ul>';
        $output .= '</div>' . "\n";

        return $output;
    }
}

/* ---------------------------------------------------------------------------
 * List [list][/list]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_list')) {
    function sc_list($attr, $content = null)
    {
        /*/*array(
			'icon'		=> 'icon-picture',
			'image'		=> '',
			'title'		=> '',
			'link'		=> '',
			'target'	=> '',
			'style'		=> 1,
			'animate'	=> '',
		);*/

        // target
        if ($attr['target']) {
            $target = 'target="_blank"';
        } else {
            $target = false;
        }

        $output = '<div class="list_item lists_' . $attr['style'] . '">';
        if ($attr['animate']) {
            $output .= '<div class="animate" data-anim-type="' . $attr['animate'] . '">';
        }
        if ($attr['link']) {
            $output .= '<a href="' . $attr['link'] . '" ' . $target . '>';
        }

        if ($attr['style'] == 4) {
            $output .= '<div class="circle">' . $attr['title'] . '</div>';
        } elseif ($attr['image']) {
            $output .= '<div class="list_left list_image">';
            $output .= '<img src="' . $attr['image'] . '" alt="' . $attr['title'] . '" class="scale-with-grid" />';
            $output .= '</div>';
        } else {
            $output .= '<div class="list_left list_icon">';
            $output .= '<i class="' . $attr['icon'] . '"></i>';
            $output .= '</div>';
        }
        $output .= '<div class="list_right">';
        if ($attr['title'] && $attr['style'] != 4) {
            $output .= '<h4>' . $attr['title'] . '</h4>';
        }
        $output .= '<div class="desc">' . $content . '</div>';
        $output .= '</div>';

        if ($attr['link']) {
            $output .= '</a>';
        }
        if ($attr['animate']) {
            $output .= '</div>';
        }
        $output .= '</div>' . "\n";

        return $output;
    }
}

/*
function mfn_print_blockquote( $item ) {
	if( ! key_exists('content', $item['fields']) ) $item['fields']['content'] = '';
	return sc_blockquote( $item['fields'], $item['fields']['content'] );
}
/* ---------------------------------------------------------------------------
 * Blockquote [blockquote] [/blockquote]
 * --------------------------------------------------------------------------- */
/*if( ! function_exists( 'sc_blockquote' ) )
{
	function sc_blockquote( $attr, $content = null )
	{


		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		$output = '<div class="blockquote">';
			$output .= '<blockquote>'. $content .'</blockquote>';
			if( $attr['author'] ){
				$output .= '<p class="author">';
					$output .= '<i class="icon-user"></i>';
					if( $attr['link'] ){
						$output .= '<a href="'. $attr['link'] .'" '. $attr['target'] .'>'. $attr['author'] .'</a>';
					} else {
						$output .= '<span>'. $attr['author'] .'</span>';
					}
				$output .= '</p>';
			}
		$output .= '</div>'."\n";

		return $output;
	}
}*/

/* ---------------------------------------------------------------------------
 * sc_menu [sc_menu] [/sc_menu]
 * --------------------------------------------------------------------------- */
if (!function_exists('sc_Footer')) {
    function sc_Footer($attr, $content = null)
    {
        $output = '<div class="olivee-item-contentdiv">';
        //$output .=  "\n".var_dump($attr)."\n";

        $output .= '

<style>
#Footer .copyrights p{text-align:center;float:none;margin-bottom:10px}
#Footer .bottom_addons .social{float:none;text-align:center;}
#Footer .bottom_addons .social li{display:inline-block;float:none;margin: 0 5px 0 0;}
#Footer .copyrights .menu_bottom{float:none;width:100%;text-align:center}
#Footer .copyrights .menu_bottom>ul>li{display:inline-block;float:none}
.footer-included #Footer .container .column .widget{border-right:0}
.offer.offer-no-pager a.Offer_slider_prev, .offer.offer-no-pager a.Offer_slider_next{display:block}
.offer-page .offer-item{width:100%;float:none}
.offer-page .offer-right{width:100%;border:0}
#Footer .container .column{background:none}
#Footer .copyrights{padding-top:20px !important; background: url("./themes/themebuilder/icons/hr.png") repeat-x left top !important;
}
a#back_to_top{}
#Footer {
clear:both;
display: block;
overflow:auto;
border-color: ' . $attr['border-footer-frame'] . ';
border-style: ' . $attr['border-footer-style'] . ';
border-width: ' . $attr['border-footer-width'] . 'px;
background-color: ' . $attr['background-footer'] . ';
}
.containerFooter {
position: relative;
margin: 0 auto;
padding-top: 20px;
}

</style>							
							
<div class="olivee-itemq olivee-itemq-divider olivee-item-1-1"><br><hr style="display: none;" /></div><br>
	<footer id="Footer">
	<div class="containerFooter">';
        if ($attr['copyright'] != '') {
            $copy = $attr['copyright'];
        } else {
            $copy = '&copy; Avril 2014 <strong>Olivee</strong>. All Rights Reserved.<br />
				Powered by wajdi <a target="_blank" href="http://arabesk125.net">wajdi</a>. Created by wajdi <a target="_blank" href="http://ffff">oliveeee</a>';
        }
        for ($i = 1; $i <= 4; $i++) {
            $output .= '<div class="animate" data-anim-type="zoomInLeft">
				<div class="column col-sm-3 col-md-3"><div class="olivee-item-contentdiv">';
            //'.$attr['background-footer-col'. $i].'
            $output .= '
										<div class="background-footer-col' . $i . '">
											<{block id=' . $attr['background-footer-col' . $i] . '}>
										</div>	
									';
            $output .= '</div></div></div>';
        }

        ////
        //var_dump($attr);
        $hasrss       = (empty($attr['rss'])) ? false : $attr['rss'];
        $hasfacebook  = (empty($attr['facebook'])) ? false : $attr['facebook'];
        $hastwitter   = (empty($attr['twitter'])) ? false : $attr['twitter'];
        $hasgoogle    = (empty($attr['google-plus'])) ? false : $attr['google-plus'];
        $hasvimeo     = (empty($attr['vimeo-square'])) ? false : $attr['vimeo-square'];
        $hasflickr    = (empty($attr['flickr'])) ? false : $attr['flickr'];
        $hasyoutube   = (empty($attr['youtube'])) ? false : $attr['youtube'];
        $haspinterest = (empty($attr['pinterest'])) ? false : $attr['pinterest'];
        $hasdribbble  = (empty($attr['dribbble'])) ? false : $attr['dribbble'];
        $haslinkedin  = (empty($attr['linked_in'])) ? false : $attr['linked_in'];

        //var_dump ($hasflickr);
        // If any of the above social networks are true, sets this to true.
        $hassocialnetworks = ($hasrss || $hasfacebook || $hastwitter || $hasgoogle || $hasvimeo || $hasflickr || $hasyoutube || $haspinterest || $hasdribbble || $haslinkedin) ? true : false;

        if ($hassocialnetworks) {
            $social1 = '';

            if ($hasrss) {
                $social1 .= '<li class="rss"><a target="_blank" href="' . $attr['rss'] . '" title="Rss"><i class="fa-icon-rss-sign fa-icon-2x"></i></a></li>';
            }

            if ($hasfacebook) {
                $social1 .= '<li class="facebook"><a target="_blank" href="' . $attr['facebook'] . '" title="Facebook"><i class="fa-icon-facebook-sign fa-icon-2x"></i></a></li>';
            }

            if ($hastwitter) {
                $social1 .= '<li class="twitter"><a target="_blank" href="' . $attr['twitter'] . '" title="Twitter"><i class="fa-icon-twitter-sign fa-icon-2x"></i></a></li>';
            }

            if ($hasgoogle) {
                $social1 .= '<li class="googleplus"><a target="_blank" href="' . $attr['googleplus'] . '" title="Google+"><i class="fa-icon-google-plus-sign fa-icon-2x"></i></a></li></a>';
            }

            if ($hasvimeo) {
                $social1 .= '<li class="vimeo"><a target="_blank" href="' . $attr['vimeo-square'] . '" title="vimeo"><i class="fa-icon-facetime-video fa-icon-2x"></i></a></li>';
            }

            if ($hasflickr) {
                $social1 .= '<li class="flickr"><a target="_blank" href="' . $attr['flickr'] . '" title="Flickr"><i class="fa-icon-flickr fa-icon-2x"></i></a></li></a>';
            }

            if ($hasyoutube) {
                $social1 .= '<li class="youtube"><a target="_blank" href="' . $attr['youtube'] . '" title="YouTube"><i class="fa-icon-youtube-sign fa-icon-2x"></i></a></li>';
            }

            if ($hasdribbble) {
                $social1 .= '<li class="dribbble"><a target="_blank" href="' . $attr['dribbble'] . '" title="Dribbble"><i class="fa-icon-dribbble fa-icon-2x"></i></a></li>';
            }

            if ($haspinterest) {
                $social1 .= '<li class="pinterest"><a target="_blank" href="' . $attr['pinterest'] . '" title="Pinterest"><i class="fa-icon-pinterest-sign fa-icon-2x"></i></a></li>';
            }

            if ($haslinkedin) {
                $social1 .= '<li class="linked_in"><a target="_blank" href="' . $attr['linked_in'] . '" title="LinkedIn"><i class="fa-icon-linkedin-sign fa-icon-2x"></i></a></li>';
            }
        }

        //////

        $output .= '
	</div>
	
	
<div class="olivee-itemq olivee-itemq-divider olivee-item-1-1"><br><hr style="display: none;" /></div><br>	
		<div class="olivee-item-1-1 copyrights">
			<p>
' . $copy . '
			</p>
			<div class="menu_bottom">
				menu admin to add todo
			</div>
		</div>


		<div class="olivee-item-1-1 bottom_addons">
				<div class="social" style="float: left;">
					<ul>
' . $social1 . '
					</ul>
				</div>
				<div class="copyfoot" style="float: right;">
					theme builder xoops olivee wajdi
				</div>
		</div>
		
</footer>';
        $output .= "\n</div>\n";

        return $output;
    }
}

function footerbuilder()
{
    // Footer =================================================================================

    // Footer --------------------------------------------
    $sections['footer'] = [
        'title'  => 'General',
        'fields' => [

            [
                'id'      => 'footer-layout',
                'type'    => 'select',
                'title'   => 'Layout',
                'options' => [
                    ''                                              => 'Default',
                    '4;one-fourth;one-fourth;one-fourth;one-fourth' => '1/4 1/4 1/4 1/4',
                    '3;one-fourth;one-fourth;one-second;'           => '1/4 1/4 1/2',
                    '3;one-fourth;one-second;one-fourth;'           => '1/4 1/2 1/4',
                    '3;one-second;one-fourth;one-fourth;'           => '1/2 1/4 1/4',
                    '3;one-third;one-third;one-third;'              => '1/3 1/3 1/3',
                    '2;one-third;two-third;;'                       => '1/3 2/3',
                    '2;two-third;one-third;;'                       => '2/3 1/3',
                    '2;one-second;one-second;;'                     => '1/2 1/2',
                    '1;one;;;'                                      => '1/1',
                ],
            ],

            [
                'id'      => 'footer-style',
                'type'    => 'select',
                'title'   => 'Style',
                'options' => [
                    ''        => 'Default',
                    'fixed'   => 'Fixed',
                    'sliding' => 'Sliding',
                ],
            ],

            [
                'id'    => 'footer-bg-img',
                'type'  => 'upload',
                'title' => 'Background Image',
            ],

            [
                'id'    => 'footer-call-to-action',
                'type'  => 'text',
                'title' => 'Call To Action',
            ],

            [
                'id'    => 'footer-copy',
                'type'  => 'text',
                'title' => 'Copyright',
                'desc'  => 'Leave this field blank to show a default copyright.',
            ],

            [
                'id'      => 'footer-hide',
                'type'    => 'select',
                'title'   => 'Copyright & Social Bar',
                'options' => [
                    ''       => 'Default',
                    'center' => 'Center',
                    '1'      => 'Hide Copyright & Social Bar',
                ],
            ],

            [
                'id'      => 'back-top-top',
                'type'    => 'select',
                'title'   => 'Back to Top button',
                'options' => [
                    ''              => 'Default',
                    'sticky'        => 'Sticky',
                    'sticky scroll' => 'Sticky show on scroll',
                    'hide'          => 'Hide',
                ],
            ],

            [
                'id'    => 'popup-contact-form',
                'type'  => 'text',
                'title' => 'Popup Contact Form | Shortcode',
                'desc'  => '	eg. [contact-form-7 id="000" title="Popup Contact Form"]',
            ],

            [
                'id'    => 'popup-contact-form-icon',
                'type'  => 'icon',
                'title' => 'Popup Contact Form | Icon',
                'std'   => 'icon-mail-line',
            ],

        ],
    ];
}

?>
