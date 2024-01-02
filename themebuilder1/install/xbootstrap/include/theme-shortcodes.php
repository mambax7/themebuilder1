<?php
/**
 * Shortcodes.
 */


/* ---------------------------------------------------------------------------
 * Column One Sixth [one_sixth] [/one_sixth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_sixth' ) )
{
	function sc_one_sixth( $attr, $content = null )
	{
		$output  = '<div class="column one-sixth">';
		$output .= $content;
		$output .= '</div>'."\n";

		return $output;
	}
}

/* ---------------------------------------------------------------------------
 * Column One Fifth [one_fifth] [/one_fifth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_fifth' ) )
{
	function sc_one_fifth( $attr, $content = null )
	{
		$output  = '<div class="column one-fifth">';
		$output .= $content;
		$output .= '</div>'."\n";

		return $output;
	}
}

/* ---------------------------------------------------------------------------
 * Column One Fourth [one_fourth] [/one_fourth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_fourth' ) )
{
	function sc_one_fourth( $attr, $content = null )
	{
		$output  = '<div class="column one-fourth">';
		$output .= $content;
		$output .= '</div>'."\n";

		return $output;
	}
}

/* ---------------------------------------------------------------------------
 * Column One Third [one_third] [/one_third]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_third' ) )
{
	function sc_one_third( $attr, $content = null )
	{
		$output  = '<div class="column one-third">';
		$output .= $content;
		$output .= '</div>'."\n";

		return $output;
	}
}

/* ---------------------------------------------------------------------------
 * Column Two Fifth [two_fifth] [/two_fifth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_two_fifth' ) )
{
	function sc_two_fifth( $attr, $content = null )
	{
		$output  = '<div class="column two-fifth">';
		$output .= $content;
		$output .= '</div>'."\n";

		return $output;
	}
}

/* ---------------------------------------------------------------------------
 * Column One Second [one_second] [/one_second]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_second' ) )
{
	function sc_one_second( $attr, $content = null )
	{
		$output  = '<div class="column one-second">';
		$output .= $content;
		$output .= '</div>'."\n";

		return $output;
	}
}

/* ---------------------------------------------------------------------------
 * Column Two Fifth [three_fifth] [/three_fifth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_three_fifth' ) )
{
	function sc_three_fifth( $attr, $content = null )
	{
		$output  = '<div class="column three-fifth">';
		$output .= $content;
		$output .= '</div>'."\n";

		return $output;
	}
}

/* ---------------------------------------------------------------------------
 * Column Two Third [two_third] [/two_third]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_two_third' ) )
{
	function sc_two_third( $attr, $content = null )
	{
		$output  = '<div class="column two-third">';
		$output .= $content;
		$output .= '</div>'."\n";

		return $output;
	}
}

/* ---------------------------------------------------------------------------
 * Column Three Fourth [three_fourth] [/three_fourth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_three_fourth' ) )
{
	function sc_three_fourth( $attr, $content = null )
	{
		$output  = '<div class="column three-fourth">';
		$output .= $content;
		$output .= '</div>'."\n";

		return $output;
	}
}

/* ---------------------------------------------------------------------------
 * Column Two Fifth [four_fifth] [/four_fifth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_four_fifth' ) )
{
	function sc_four_fifth( $attr, $content = null )
	{
		$output  = '<div class="column four-fifth">';
		$output .= $content;
		$output .= '</div>'."\n";

		return $output;
	}
}

/* ---------------------------------------------------------------------------
 * Column Two Fifth [five_sixth] [/five_sixth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_five_sixth' ) )
{
	function sc_five_sixth( $attr, $content = null )
	{
		$output  = '<div class="column five-sixth">';
		$output .= $content;
		$output .= '</div>'."\n";

		return $output;
	}
}

/* ---------------------------------------------------------------------------
 * Column One [one] [/one]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one' ) )
{
	function sc_one( $attr, $content = null )
	{
		$output  = '<div class="column one">';
		$output .= $content;
		$output .= '</div>'."\n";

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'image' 	=> '',
			'slogan' 	=> '',
			'title' 	=> '',
			'link' 		=> '',
			'target' 	=> '',
			'animate' 	=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		$output = '<div class="article_box">';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';
				if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';

					$output .= '<div class="photo_wrapper">';
						$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
					$output .= '</div>';

					$output .= '<div class="desc_wrapper">';
						if( $slogan ) $output .= '<p>'. $slogan .'</p>';
						if( $title ) $output .= '<h4>'. $title .'</h4>';
						$output .= '<i class="icon-right-open themecolor"></i>';
					$output .= '</div>';

				if( $link ) $output .= '</a>';
			if( $animate ) $output .= '</div>'."\n";
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Helper [helper] [/helper]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_helper' ) )
{
	function sc_helper( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'title' 	=> '',
			'title_tag' => 'h4',

			'title1' 	=> '',
			'content1' 	=> '',
			'link1' 	=> '',
			'target1' 	=> '',
			'class1' 	=> '',

			'title2' 	=> '',
			'content2' 	=> '',
			'link2' 	=> '',
			'target2' 	=> '',
			'class2' 	=> '',

		), $attr));*/

		// target
		$target1 = $target1 ? 'target="_blank"' : false;
		$target2 = $target2 ? 'target="_blank"' : false;

		$output = '<div class="helper">';

			$output .= '<div class="helper_header">';

				if( $title ){
					$output .= '<'. $title_tag .' class="title">'. $title .'</'. $title_tag .'>';
				}

				$output .= '<div class="links">';

					if( $title1 ){
						if( $link1 ){
							$output .= '<a class="link link-1 '. $class1 .'" href="'. $link1 .'" '. $target1 .'>'. $title1 .'</a>';
						} else {
							$output .= '<a class="link link-1 toggle" href="#" data-rel="1">'. $title1 .'</a>';
						}
					}

					if( $title2 ){
						if( $link2 ){
							$output .= '<a class="link link-2 '. $class2 .'" href="'. $link2 .'" '. $target2 .'>'. $title2 .'</a>';
						} else {
							$output .= '<a class="link link-2 toggle" href="#" data-rel="2">'. $title2 .'</a>';
						}
					}

				$output .= '</div>';

			$output .= '</div>';

			$output .= '<div class="helper_content">';

				if( ! $link1 ) $output .= '<div class="item item-1">'. $content1 .'</div>';

				if( ! $link2 ) $output .= '<div class="item item-2">'. $content2 .'</div>';

			$output .= '</div>';

		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Before After [before_after] [/before_after]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_before_after' ) )
{
	function sc_before_after( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'image_before' 	=> '',
			'image_after' 	=> '',
			'classes' 		=> '',
		), $attr));*/

		// image | visual composer fix
		//$image_before = mfn_vc_image( $image_before );
		//$image_after = mfn_vc_image( $image_after );
		list($width, $height) = getimagesize('http://localhost'.$image_before);
		list($width1, $height1) = getimagesize('http://localhost'.$image_after);

		$output = '<div class="before_after twentytwenty-container">';
			$output .= '<img class="scale-with-grid" src="'. $image_before .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
			$output .= '<img class="scale-with-grid" src="'. $image_after .'" alt="'. $alt1 .'" width="'. $width1 .'" height="'. $height1 .'"/>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Flat Box [flat_box] [/flat_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_flat_box' ) )
{
	function sc_flat_box( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'image' 		=> '',
			'title' 		=> '',
			'icon' 			=> 'icon-lamp',
			'icon_image' 	=> '',
			'background' 	=> '',
			'link' 			=> '',
			'target' 		=> '',
			'animate' 		=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		//$icon_image = mfn_vc_image( $icon_image );
		list($width, $height) = getimagesize('http://localhost'.$image);
		list($width1, $height1) = getimagesize('http://localhost'.$icon_image);
		

		// background
		if( $background ) $background = 'style="background-color:'. $background .'"';

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		$output = '<div class="flat_box">';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';

				if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';

					$output .= '<div class="photo_wrapper">';
						$output .= '<div class="icon themebg" '. $background .'>';
							if( $icon_image ){
								$output .= '<img class="scale-with-grid" src="'. $icon_image .'" alt="'. $alt .'" width="'. $width1 .'" height="'. $height1 .'"/>';
							} else {
								$output .= '<i class="'. $icon .'"></i>';
							}
						$output .= '</div>';
						$output .= '<img class="photo scale-with-grid" src="'. $image .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
					$output .= '</div>';

					$output .= '<div class="desc_wrapper">';
						if( $title ) $output .= '<h4>'. $title .'</h4>';
						if( $content )$output .= '<div class="desc">'. $content .'</div>';
					$output .= '</div>';

				if( $link ) $output .= '</a>';

			if( $animate ) $output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Flat Box [feature_box] [/feature_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_feature_box' ) )
{
	function sc_feature_box( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'image' 		=> '',
			'title' 		=> '',
			'background' 	=> '',
			'link' 			=> '',
			'target' 		=> '',
			'animate' 		=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// background
		if( $background ) $background = 'style="background-color:'. $background .'"';

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		$output = '<div class="feature_box">';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';

				$output .= '<div class="feature_box_wrapper" '. $background .'>';

					$output .= '<div class="photo_wrapper">';
						if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';
							$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'" />';
						if( $link ) $output .= '</a>';
					$output .= '</div>';

					$output .= '<div class="desc_wrapper">';
						if( $title ) $output .= '<h4>'. $title .'</h4>';
						if( $content )$output .= '<div class="desc">'. $content .'</div>';
					$output .= '</div>';

				$output .= '</div>';

			if( $animate ) $output .= '</div>';
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
		extract($attr);
		/*extract(shortcode_atts(array(
			'image' 	=> '',
			'title' 	=> '',
			'align' 	=> '',
			'link' 		=> '',
			'target' 	=> '',
			'greyscale' => '',
			'animate' 	=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		// class
		$class = '';
		if( $align ) 		$class .= ' pb_'. $align;
		if( $greyscale )	$class .= ' greyscale';
		if( !$content )		$class .= ' without-desc';

		$output = '<div class="photo_box '. $class .'">';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';
				if( $title ) $output .= '<h4>'. $title .'</h4>';

				if( $image ){
					$output .= '<div class="image_frame">';
						$output .= '<div class="image_wrapper">';
							if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';;
								$output .= '<div class="mask"></div>';
								$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
							if( $link ) $output .= '</a>';
						$output .= '</div>';
					$output .= '</div>';
				}

				if( $content ) $output .= '<div class="desc">'. $content .'</div>';
			if( $animate ) $output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Zoom Box [zoom_box] [/zoom_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_zoom_box' ) )
{
	function sc_zoom_box( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'image' 		=> '',
			'bg_color' 		=> '#000',
			'content_image' => '',
			'link' 			=> '',
			'target' 		=> '',
		), $attr));*/

		// image | visual composer fix
		//$image 			= mfn_vc_image( $image );
		//$content_image 	= mfn_vc_image( $content_image );
		list($width, $height) = getimagesize('http://localhost'.$image);
		list($width1, $height1) = getimagesize('http://localhost'.$content_image);

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		$output = '<div class="zoom_box">';
			if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';

				$output .= '<div class="photo">';
					$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
				$output .= '</div>';

				$output .= '<div class="desc" style="background-color:'. hex2rgba( $bg_color, 0.8 ) .';">';
					$output .= '<div class="desc_wrap">';

						if( $content_image ){
							$output .= '<div class="desc_img">';
								$output .= '<img class="scale-with-grid" src="'. $content_image .'" alt="'. $alt1 .'" width="'. $width1 .'" height="'. $height1 .'"/>';
							$output .= '</div>';
						}

						if( $content ){
							$output .= '<div class="desc_txt">';
								$output .= $content;
							$output .= '</div>';
						}

					$output .= '</div>';
				$output .= '</div>';

			if( $link ) $output .= '</a>';
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
		extract($attr);
		/*extract(shortcode_atts(array(
			'image' 	=> '',
			'title' 	=> '',
			'link' 		=> '',
			'target' 	=> '',
			'animate' 	=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		$output = '<div class="sliding_box">';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';
				if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';

					$output .= '<div class="photo_wrapper">';
						$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
					$output .= '</div>';

					$output .= '<div class="desc_wrapper">';
						if( $title ) $output .= '<h4>'. $title .'</h4>';
					$output .= '</div>';

				if( $link ) $output .= '</a>';
			if( $animate ) $output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Story Box [story_box] [/story_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_story_box' ) )
{
	function sc_story_box( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'image' 	=> '',
			'style' 	=> '',
			'title' 	=> '',
			'link' 		=> '',
			'target' 	=> '',
			'animate' 	=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		$output = '<div class="story_box '. $style .'">';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';
				if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';

					$output .= '<div class="photo_wrapper">';
						$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
					$output .= '</div>';

					$output .= '<div class="desc_wrapper">';
						if( $title ){
							$output .= '<h3 class="themecolor">'. $title .'</h3>';
							$output .= '<hr class="hr_color">';
						}
						$output .= '<div class="desc">'. $content .'</div>';
					$output .= '</div>';

				if( $link ) $output .= '</a>';
			if( $animate ) $output .= '</div>';
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
		extract($attr);
		/*extract( shortcode_atts( array(
			'image' 	=> '',
			'slogan' 	=> '',
			'title' 	=> '',

			'link' 		=> '',
			'target' 	=> '',

			'style' 	=> '',	// [default], plain
			'animate' 	=> '',
		), $attr ) );*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		// class
		$class = '';
		if( $style ){
			$class .= $style;
		}

		$output = '<div class="trailer_box '. $class .'">';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';
				if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';

					$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
					$output .= '<div class="desc">';
						if( $slogan ) $output .= '<div class="subtitle">'. $slogan .'</div>';
						if( $title )  $output .= '<h2>'. $title .'</h2>';
						$output .= '<div class="line"></div>';
					$output .= '</div>';

				if( $link ) $output .= '</a>';
			if( $animate ) $output .= '</div>';
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
		extract($attr);
		/*extract(shortcode_atts(array(
			'image' 	=> '',
			'title' 	=> '',
			'btn_text' 	=> '',
			'btn_link' 	=> '',
			'position' 	=> 'left',
			'border' 	=> '',
			'target' 	=> '',
			'animate' 	=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// border
		if( $border ){
			$border = 'has_border';
		} else {
			$border = 'no_border';
		}

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		$output = '<div class="promo_box '. $border .'">';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';
				$output .= '<div class="promo_box_wrapper promo_box_'. $position .'">';

					$output .= '<div class="photo_wrapper">';
						if( $image ) $output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
					$output .= '</div>';

					$output .= '<div class="desc_wrapper">';
						if( $title )$output .= '<h2>'. $title .'</h2>';
						if( $content ) $output .= '<div class="desc">'. $content .'</div>';
						if( $btn_link ) $output .= '<a href="'. $btn_link .'" class="button button_left button_theme button_js" '. $target .'><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">'. $btn_text .'</span></a>';
					$output .= '</div>';

				$output .= '</div>';
			if( $animate ) $output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Share Box [share_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_share_box' ) )
{
	function sc_share_box( $attr, $content = null )
	{
		$output = mfn_share( 'item' );

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'image' 	=> '',
			'number' 	=> '',
			'title' 	=> '',

			'border' 	=> '',
			'style' 	=> '',

			'link' 		=> '',
			'target' 	=> '',

			'animate' 	=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		// class
		$class = '';

		// border
		if( $border ){
			$class .= ' has_border';
		} else {
			$class .= ' no_border';
		}

		// style
		if( $style ){
			$class .= ' '. $style;
		}

		// image
		if( ! $image ){
			$class .= ' no-img';
		}

		$output = '<div class="how_it_works '. $class .'">';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';

					if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';
						$output .= '<div class="image">';
							if( $image ){
								$output .= '<img src="'. $image .'" class="scale-with-grid" alt="'. $alt .'" width="'. $width .'" height="'. $height .'">';
							}
							if( $number ){
								$output .= '<span class="number">'. $number .'</span>';
							}
						$output .= '</div>';
					if( $link ) $output .= '</a>';

					if( $title ){
						$output .= '<h4>'. $title .'</h4>';
					}
					$output .= '<div class="desc">'. $content .'</div>';

			if( $animate ) $output .= '</div>'."\n";
		$output .= '</div>'."\n";

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'title'			=> '',
			'address' 		=> '',
			'telephone'		=> '',
			'telephone_2'	=> '',
			'fax'			=> '',
			'email' 		=> '',
			'www' 			=> '',
			'image' 		=> '',
			'animate' 		=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// background
		if( $image ) $image = 'style="background-image:url('. $image .');"';

		$output = '';
		if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';
			$output .= '<div class="get_in_touch" '. $image .'>';

				if( $title ) $output .= '<h3>'. $title .'</h3>';
				$output .= '<div class="get_in_touch_wrapper">';
					$output .= '<ul>';
						if( $address ){
							$output .= '<li class="address">';
								$output .= '<span class="icon"><i class="icon-location"></i></span>';
								$output .= '<span class="address_wrapper">'. $address .'</span>';
							$output .= '</li>';
						}
						if( $telephone ){
							$output .= '<li class="phone phone-1">';
								$output .= '<span class="icon"><i class="icon-phone"></i></span>';
								$output .= '<p><a href="tel:'. str_replace(' ', '', $telephone) .'">'. $telephone .'</a></p>';
							$output .= '</li>';
						}
						if( $telephone_2 ){
							$output .= '<li class="phone phone-2">';
								$output .= '<span class="icon"><i class="icon-phone"></i></span>';
								$output .= '<p><a href="tel:'. str_replace(' ', '', $telephone_2) .'">'. $telephone_2 .'</a></p>';
							$output .= '</li>';
						}
						if( $fax ){
							$output .= '<li class="phone fax">';
								$output .= '<span class="icon"><i class="icon-print"></i></span>';
								$output .= '<p><a href="fax:'. str_replace(' ', '', $fax) .'">'. $fax .'</a></p>';
							$output .= '</li>';
						}
						if( $email ){
							$output .= '<li class="mail">';
								$output .= '<span class="icon"><i class="icon-mail"></i></span>';
								$output .= '<p><a href="mailto:'. $email .'">'. $email .'</a></p>';
							$output .= '</li>';
						}
						if( $www ){

							if( strpos( $www, 'http' ) === 0 ){
								$url = $www;
								$www = str_replace( 'http://', '', $www );
								$www = str_replace( 'https://', '', $www );
							} else {
								$url = 'http://'. $www;
							}

							$output .= '<li class="www">';
								$output .= '<span class="icon"><i class="icon-link"></i></span>';
								$output .= '<p><a target="_blank" href="'. $url .'">'. $www .'</a></p>';
							$output .= '</li>';
						}
					$output .= '</ul>';
				$output .= '</div>';

			$output .= '</div>'."\n";
		if( $animate ) $output .= '</div>'."\n";

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'title'			=> '',
			'padding'		=> '',
			'button' 		=> '',
			'uid'			=> 'popup-'. uniqid(),
		), $attr));*/

		// padding
		if( $padding ){
			$padding = 'style="padding:'. $padding .'px;"';
		} else {
			$padding = false;
		}

		$output = '';

		if( $button ){
			$output .= '<a href="#'. $uid .'" rel="prettyphoto" class="popup-link button button_js"><span class="button_label">'. $title .'</span></a>';
		} else {
			$output .= '<a href="#'. $uid .'" rel="prettyphoto" class="popup-link">'. $title .'</a>';
		}

		$output .= '<div id="'. $uid .'" class="popup-content">';
			$output .= '<div class="popup-inner" '. $padding .'>'. $content .'</div>';
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
		extract($attr);
		/*extract(shortcode_atts(array(
			'title'			=> '',
			'image' 		=> '',
			'animate' 		=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// background
		if( $image ) $image = 'style="background-image:url('. $image .');"';

		$output = '';
		if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';
			$output .= '<div class="infobox" '. $image .'>';

				if( $title ) $output .= '<h3>'. $title .'</h3>';
				$output .= '<div class="infobox_wrapper">';
					$output .= $content;
				$output .= '</div>';

			$output .= '</div>'."\n";
		if( $animate ) $output .= '</div>'."\n";

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'title'			=> '',
			'image' 		=> '',
			'animate' 		=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// background
		if( $image ) $image = 'style="background-image:url('. $image .');"';

		$output = '';
		if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';
			$output .= '<div class="opening_hours" '. $image .'>';


				if( $title ) $output .= '<h3>'. $title .'</h3>';
				$output .= '<div class="opening_hours_wrapper">';
					$output .= $content;
				$output .= '</div>';

			$output .= '</div>'."\n";
		if( $animate ) $output .= '</div>'."\n";

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
	    extract($attr);
		/*extract(shortcode_atts(array(
		    'height' 		=> 0,
		    'style' 		=> '',		// default, dots, zigzag
		    'line'			=> '',		// default, narrow, wide, 0 = no_line
		    'themecolor'	=> '',
	    ), $attr));*/

	    // classes
	    $class = '';
	    if( $themecolor ) 	$class .= ' hr_color';

		// height
		if( $height ){
			$inlinecss = 'style="margin: 0 auto '. intval( $height ) .'px;"';
		} else {
			$inlinecss = '';
		}

	    switch( $style ){
	    	case 'dots':
	    		$output = '<div class="hr_dots" '. $inlinecss .'><span></span><span></span><span></span></div>'."\n";
	    		break;
	    	case 'zigzag':
	    		$output = '<div class="hr_zigzag" '. $inlinecss .'><i class="icon-down-open"></i><i class="icon-down-open"></i><i class="icon-down-open"></i></div>'."\n";
	    		break;
	    	default:
	    		if( $line == 'narrow' ){
	    			$output = '<hr class="hr_narrow '. $class .'" '. $inlinecss .'/>'."\n";
	    		} elseif( $line == 'wide' ) {
	    			$output = '<div class="hr_wide '. $class .'" '. $inlinecss .'><hr /></div>'."\n";
	    		} elseif( $line ) {
	    			$output = '<hr class="'. $class .'" '. $inlinecss .'/>'."\n";
	    		} else {
	    			$output = '<hr class="no_line" '. $inlinecss .'/>'."\n";
	    		}
	    }

	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Fancy Divider [fancy_divider]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_fancy_divider' ) )
{
	function sc_fancy_divider( $attr, $content = null )
	{
	    extract($attr);
		/*extract(shortcode_atts(array(
		    'style' 		=> 'stamp',
		    'color_top' 	=> '',
		    'color_bottom' 	=> '',
	    ), $attr));*/

	    $output = '<div class="fancy-divider">';

		    switch( $style ){

		    	case 'circle up':
		    		$output .= '<svg preserveAspectRatio="none" viewBox="0 0 100 100" height="100" width="100%" version="1.1" xmlns="https://www.w3.org/2000/svg" style="background: '. $color_top .';">';
		    			$output .= '<path d="M0 100 C50 0 50 0 100 100 Z" style="fill: '. $color_bottom .'; stroke: '. $color_bottom .';">';
		    		$output .= '</svg>';
		    		break;

		    	case 'circle down':
		    		$output .= '<svg preserveAspectRatio="none" viewBox="0 0 100 100" height="100" width="100%" version="1.1" xmlns="https://www.w3.org/2000/svg" style="background: '. $color_bottom .';">';
		    			$output .= '<path d="M0 0 C50 100 50 100 100 0 Z" style="fill: '. $color_top .'; stroke: '. $color_top .';">';
		    		$output .= '</svg>';
		    		break;

		    	case 'curve up':
		    		$output .= '<svg preserveAspectRatio="none" viewBox="0 0 100 100" height="100" width="100%" version="1.1" xmlns="https://www.w3.org/2000/svg" style="background: '. $color_top .';">';
		    			$output .= '<path d="M0 100 C 20 0 50 0 100 100 Z" style="fill: '. $color_bottom .'; stroke: '. $color_bottom .';">';
		    		$output .= '</svg>';
		    		break;

		    	case 'curve down':
		    		$output .= '<svg preserveAspectRatio="none" viewBox="0 0 100 100" height="100" width="100%" version="1.1" xmlns="https://www.w3.org/2000/svg" style="background: '. $color_bottom .';">';
		    			$output .= '<path d="M0 0 C 50 100 80 100 100 0 Z" style="fill: '. $color_top .'; stroke: '. $color_top .';">';
		    		$output .= '</svg>';
		    		break;

		    	case 'triangle up':
		    		$output .= '<svg preserveAspectRatio="none" viewBox="0 0 100 100" height="100" width="100%" version="1.1" xmlns="https://www.w3.org/2000/svg" style="background: '. $color_top .';">';
		    			$output .= '<path d="M0 100 L50 2 L100 100 Z" style="fill: '. $color_bottom .'; stroke: '. $color_bottom .';">';
		    		$output .= '</svg>';
		    		break;

		    	case 'triangle down':
		    		$output .= '<svg preserveAspectRatio="none" viewBox="0 0 100 100" height="100" width="100%" version="1.1" xmlns="https://www.w3.org/2000/svg" style="background: '. $color_bottom .';">';
		    			$output .= '<path d="M0 0 L50 100 L100 0 Z" style="fill: '. $color_top .'; stroke: '. $color_top .';">';
		    		$output .= '</svg>';
		    		break;

		    	default:
		    		$output .= '<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="https://www.w3.org/2000/svg" style="background: '. $color_bottom .';">';
		    			$output .= '<path d="M0 0 Q 2.5 40 5 0 Q 7.5 40 10 0Q 12.5 40 15 0Q 17.5 40 20 0Q 22.5 40 25 0Q 27.5 40 30 0Q 32.5 40 35 0Q 37.5 40 40 0Q 42.5 40 45 0Q 47.5 40 50 0 Q 52.5 40 55 0Q 57.5 40 60 0Q 62.5 40 65 0Q 67.5 40 70 0Q 72.5 40 75 0Q 77.5 40 80 0Q 82.5 40 85 0Q 87.5 40 90 0Q 92.5 40 95 0Q 97.5 40 100 0 Z" style="fill: '. $color_top .'; stroke: '. $color_top .';">';
		    		$output .= '</svg>';

		    }

	    $output .= '</div>';

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'font' 				=> '',

			'size' 				=> '25',
			'weight'			=> '400',

			'italic'			=> '',
			'letter_spacing' 	=> '',
			'subset' 			=> '',

			'color'				=> '',
			'inline' 			=> '',
		), $attr));*/

		// style
		$style 		= array();
		$style[] 	= "font-family:'". $font ."',Arial,Tahoma,sans-serif;";
		$style[] 	= "font-size:". $size ."px;";
		$style[] 	= "line-height:". $size ."px;";
		$style[] 	= "font-weight:". $weight .";";
		$style[] 	= "letter-spacing:". $letter_spacing ."px;";
		if( $color ) $style[] = "color:". $color .";";

		// italic
		if( $italic ){
			$style[] = "font-style:italic;";
			$weight = $weight .'italic';
		}

		$style 		= implode( '', $style );

		// subset
		if( $subset ){
			$subset	= '&amp;subset='. str_replace( ' ', '', $subset );
		} else {
			$subset = false;
		}

		// class
		$class = '';
		if( $inline ){
			$class .= ' inline';
		}

		// slug
		$font_slug	= str_replace( ' ', '+', $font );
		wp_enqueue_style( $font_slug, 'http'. mfn_ssl() .'://fonts.googleapis.com/css?family='. $font_slug .':'. $weight . $subset );

		$output = '<div class="google_font'. $class .'" style="'. $style .'">'. $content .'</div>'."\n";

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'sidebar' 		=> '',
		), $attr));*/

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'image'			=> '',
			'title'			=> '',
			'currency' 		=> '',
			'currency_pos' 	=> '',
			'price' 		=> '',
			'period' 		=> '',
			'subtitle' 		=> '',
			'link_title'	=> '',
			'link' 			=> '',
			'target' 		=> '',
			'icon' 			=> '',
			'featured' 		=> '',
			'style' 		=> 'box',
			'animate' 		=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		// classes
		$classes = '';
		if( $currency_pos ) $classes .= ' cp-'. $currency_pos;
		if( $featured ) 	$classes .= ' pricing-box-featured';
		if( $style ) 		$classes .= ' pricing-box-'. $style;

		$output = '<div class="pricing-box '. $classes .'">';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';

				$output .= '<div class="plan-header">';

					if( $image ){
						$output .= '<div class="image">';
							$output .= '<img src="'. $image .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
						$output .= '</div>';
					}

					if( $title ) $output .= '<h2>'. $title .'</h2>';
					if( $price || ( $price === '0' ) ){
						$output .= '<div class="price">';
							if( $currency_pos != 'right' ) $output .= '<sup class="currency">'. $currency .'</sup>';
							$output .= '<span>'. $price .'</span>';
							if( $currency_pos == 'right' ) $output .= '<sup class="currency">'. $currency .'</sup>';
							$output .= '<sup class="period">'. $period .'</sup>';
						$output .= '</div>';
						$output .= '<hr class="hr_color" />';
					}
					if( $subtitle ) $output .= '<p class="subtitle"><big>'. $subtitle .'</big></p>';
				$output .= '</div>';

				if( $content ){
					$output .= '<div class="plan-inside">';
						$output .= $content;
					$output .= '</div>';
				}

				if( $link ){

					// button icon
					if( $icon ){
						$icon = '<span class="button_icon"><i class="'. $icon .'"></i></span>';
						$icon_class = 'button_left';
					} else {
						$icon = false;
						$icon_class = false;
					}

					$output .= '<div class="plan-footer">';
						$output .= '<a href="'. $link .'" class="button button_theme button_js '. $icon_class .'" '. $target .'>'. $icon .'<span class="button_label">'. $link_title .'</span></a>';
					$output .= '</div>';
				}

			if( $animate ) $output .= '</div>';
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
		extract($attr);
		/*extract(shortcode_atts(array(
			'title' 		=> '',
			'icon' 			=> '',
			'link' 			=> '',
			'button_title'	=> '',
			'class' 		=> '',
			'target' 		=> '',
			'animate' 		=> '',
		), $attr));*/

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		// FIX | prettyphoto
		if( strpos( $class, 'prettyphoto' ) !== false ){
			$class 	= str_replace( 'prettyphoto', '', $class );
			$rel 	= 'rel="prettyphoto"';
		} else {
			$rel 	= false;
		}

		$output = '<div class="call_to_action">';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';

				$output .= '<div class="call_to_action_wrapper">';

					$output .= '<div class="call_left">';
						$output .= '<h3>'. $title .'</h3>';
					$output .= '</div>';

					$output .= '<div class="call_center">';

						if( $button_title ){
							// Button
							if( $link ) $output .= '<a href="'. $link .'" class="button button_js '. $class .'" '. $rel .' '. $target .'>';
								if( $icon ) $output .= '<span class="button_icon"><i class="'. $icon .'"></i></span>';
								$output .= '<span class="button_label">'. $button_title .'</span>';
							if( $link ) $output .= '</a>';
						} else {
							// Big Icon Link
							if( $link ) $output .= '<a href="'. $link .'" class="'. $class .'" '. $rel .' '. $target .'>';
								$output .= '<span class="icon_wrapper"><i class="'. $icon .'"></i></span>';
							if( $link ) $output .= '</a>';
						}

					$output .= '</div>';

					$output .= '<div class="call_right">';
						$output .= '<div class="desc">'. $content .'</div>';
					$output .= '</div>';

				$output .= '</div>';

			if( $animate ) $output .= '</div>';
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
		extract($attr);
		/*extract(shortcode_atts(array(
			'title' 		=> '',
			'percent' 		=> '',
			'label' 		=> '',
			'icon'	 		=> '',
			'image'	 		=> '',
			'line_width'	=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// color
		if( $_GET && key_exists( 'mfn-c', $_GET ) ){
			$color = '#D69942';
		} else {
			$color =  mfn_opts_get( 'color-counter', '#2991D6' );
		}

		// line width
		if( $line_width ) $line_width = 'data-line-width="'. intval( $line_width ) .'"';

		$output = '<div class="chart_box">';
			$output .= '<div class="chart" data-percent="'. intval( $percent ) .'" data-bar-color="'.  $color .'" '. $line_width .'>';
				if( $image ){
					$output .= '<div class="image"><img class="scale-with-grid" src="'. $image .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/></div>';
				} elseif( $icon ){
					$output .= '<div class="icon"><i class="'. $icon .'"></i></div>';
				} else {
					$output .= '<div class="num">'. $label .'</div>';
				}
			$output .= '</div>';
			$output .= '<p><big>'. $title .'</big></p>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Countdown [countdown]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_countdown' ) )
{
	function sc_countdown( $attr, $content = null )
	{
		global $xoTheme;
		extract($attr);
		/*extract( shortcode_atts( array(
			'date'			=> '12/30/2018 12:00:00',
			'timezone'	=> '0',
			'show'			=> '',
		), $attr ) );*/

		$translate['days'] 		= $xoTheme->template->_tpl_vars['translate'] ? $xoTheme->template->_tpl_vars['translate-days'] : 'days';
		$translate['hours'] 	= $xoTheme->template->_tpl_vars['translate'] ? $xoTheme->template->_tpl_vars['translate-hours'] : 'hours';
		$translate['minutes'] 	= $xoTheme->template->_tpl_vars['translate'] ? $xoTheme->template->_tpl_vars['translate-minutes'] : 'minutes';
		$translate['seconds']	= $xoTheme->template->_tpl_vars['translate'] ? $xoTheme->template->_tpl_vars['translate-seconds'] : 'seconds';

		switch( $show ){
			case 'dhm':
				$hide = 1;
				$columns = 'one-third';
				break;
			case 'dh':
				$hide = 2;
				$columns = 'one-second';
				break;
			case 'd':
				$hide = 3;
				$columns = 'one';
				break;
			default:
				$hide = 0;
				$columns = 'one-fourth';
		}

		$output = '<div class="downcount clearfix" data-date="'. $date .'" data-offset="'. $timezone .'">';

			$output .= '<div class="column column_quick_fact '. $columns .'">';
				$output .= '<div class="quick_fact">';
					$output .= '<div data-anim-type="zoomIn" class="animate zoomIn">';
						$output .= '<div class="number-wrapper">';
							$output .= '<div class="number days">00</div>';
						$output .= '</div>';
						$output .= '<h3 class="title">'. $translate['days'] .'</h3>';
						$output .= '<hr class="hr_narrow">';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';

			if( 3 > $hide ){
				$output .= '<div class="column column_quick_fact '. $columns .'">';
					$output .= '<div class="quick_fact">';
						$output .= '<div data-anim-type="zoomIn" class="animate zoomIn">';
							$output .= '<div class="number-wrapper">';
								$output .= '<div class="number hours">00</div>';
							$output .= '</div>';
							$output .= '<h3 class="title">'. $translate['hours'] .'</h3>';
							$output .= '<hr class="hr_narrow">';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
			}

			if( 2 > $hide ){
				$output .= '<div class="column column_quick_fact '. $columns .'">';
					$output .= '<div class="quick_fact">';
						$output .= '<div data-anim-type="zoomIn" class="animate zoomIn">';
							$output .= '<div class="number-wrapper">';
								$output .= '<div class="number minutes">00</div>';
							$output .= '</div>';
							$output .= '<h3 class="title">'. $translate['minutes'] .'</h3>';
							$output .= '<hr class="hr_narrow">';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
			}

			if( 1 > $hide ){
				$output .= '<div class="column column_quick_fact '. $columns .'">';
					$output .= '<div class="quick_fact">';
						$output .= '<div data-anim-type="zoomIn" class="animate zoomIn">';
							$output .= '<div class="number-wrapper">';
								$output .= '<div class="number seconds">00</div>';
							$output .= '</div>';
							$output .= '<h3 class="title">'. $translate['seconds'] .'</h3>';
							$output .= '<hr class="hr_narrow">';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
			}

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
		global $xoTheme;
		extract($attr);
		/*extract(shortcode_atts(array(
			'icon' 			=> '',
			'color' 		=> '',
			'image' 		=> '',
			'number' 		=> '',
			'prefix' 		=> '',
			'label' 		=> '',
			'title' 		=> '',
			'type'	 		=> 'vertical',
			'animate'	 	=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// color
		if( $color ){
			$color = 'style="color:'. $color .';"';
		} else {
			$color = false;
		}

		$animate_math = $xoTheme->template->_tpl_vars['math-animations-disable'] ? false : 'animate-math';

		$output = '<div class="counter counter_'. $type .' '. $animate_math .'">';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';

				$output .= '<div class="icon_wrapper">';
					if( $image ){
						$output .= '<img src="'. $image .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
					} elseif( $icon ){
						$output .= '<i class="'. $icon .'" '. $color .'></i>';
					}
				$output .= '</div>';

				$output .= '<div class="desc_wrapper">';
					if( $number ){
						$output .= '<div class="number-wrapper">';
							if( $prefix ) $output .= '<span class="label prefix">'. $prefix .'</span>';
							$output .= '<span class="number" data-to="'. $number .'">'. $number .'</span>';
							if( $label ) $output .= '<span class="label postfix">'. $label .'</span>';
						$output .= '</div>';
					}
					if( $title )  $output .= '<p class="title">'. $title .'</p>';
				$output .= '</div>';

			if( $animate ) $output .= '</div>'."\n";
		$output .= '</div>'."\n";

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'type' => '',
		), $attr));*/

		$output = '<i class="'. $type .'"></i>';

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'icon'	=> '',
			'align'	=> '',
			'color'	=> '',
			'size'	=> 25,
		), $attr));*/

		// classes
		$class = '';
		if( $align ) $class .= ' icon_'. $align;
		if( $color ){
			$color = ' color:'. $color .';';
		} else {
			$class .= ' themecolor';
		}

		$output = '<span class="single_icon '. $class .'">';
			$output .= '<i style="font-size: '. $size .'px; line-height: '. $size .'px; '. $color .'" class="'. $icon .'"></i>';
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
		extract($attr);
		/*extract(shortcode_atts(array(

			'src'			=> '',
			'size'			=> '',
			'width'			=> '',
			'height'		=> '',

			// options
			'align'			=> 'none',
			'stretch'		=> '',
			'border'		=> '',
			'margin'		=> '',
			'margin_top'	=> '',	// alias for: margin
			'margin_bottom'	=> '',

			// link
			'link_image'	=> '',
			'link'			=> '',
			'target'		=> '',
			'hover'			=> '',

			// description
			'alt'			=> '',
			'caption'		=> '',

			// advanced
			'greyscale'		=> '',
			'animate'		=> '',

		), $attr));*/


		// margin -----

		if( $margin_top ) $margin = $margin_top;

		if( $margin || $margin_bottom ){
			$margin_tmp = '';
			if( $margin ) $margin_tmp .= 'margin-top:'. intval( $margin ) .'px;';
			if( $margin_bottom ) $margin_tmp .= 'margin-bottom:'. intval( $margin_bottom ) .'px;';
			$margin = 'style="'. $margin_tmp .'"';
		} else {
			$margin = false;
		}


		// target -----

		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}


		// double link -----

		if( $link & $link_image ){
			$double_link = 'double';
		} else {
			$double_link = false;
		}


		// DIV image_frame | classes ----------------------

		$class_div 	= '';

		// align -----

		if( $align ) $class_div .= ' align'. $align;

		// stretch -----

		if( $stretch == 'ultrawide' ){
			$class_div .= ' stretch-ultrawide';
		} elseif( $stretch ){
			$class_div .= ' stretch';
		}

		// border -----
		if( $border ){
			$class_div .= ' has_border';
		} else {
			$class_div .= ' no_border';
		}

		// greyscale -----
		if( $greyscale ) $class_div .= ' greyscale';

		// hover -----
		if( $hover ) $class_div .= ' hover-disable';


		// width x height, alt ----------------------------

		if( ! $alt ){
			//$alt = mfn_get_attachment_data( $src, 'alt' );
		}

		//$title = mfn_get_attachment_data( $src, 'title' );

		// image size ------

		if( $size ){
			/*if( $img_id = mfn_get_attachment_id_url( $src ) ){

				$img_src = wp_get_attachment_image_src( $img_id, $size );

				$src 	= $img_src[0];
				$width 	= $img_src[1];
				$height = $img_src[2];

			}*/
		}

		if( ! $width ){
			//$width 	= mfn_get_attachment_data( $src, 'width' );
		}
		if( ! $height ){
			//$height = mfn_get_attachment_data( $src, 'height' );
		}

		if( $width ){
			$width = 'width="'. $width .'"';
		}
		if( $height ){
			$height = 'height="'. $height .'"';
		}


		// prettyPhoto ------------------------------------

		// link_all -----
		$link_all = $link;

		if( $link_all ){
			$rel 			= false;
		} else {
			$link_all = $link_image;
			$rel 			= 'rel="prettyphoto"';
			$target 	= false;
		}


		// image output -----------------------------------

		$image_output = '<img class="scale-with-grid" src="'. $src .'" alt="'. $alt .'" title="'. $title.'" '.$width.' '.$height.'/>';


		// output -----------------------------------------

		$output = '';
		if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';

			if( $link || $link_image ) {

				$output .= '<div class="image_frame image_item scale-with-grid'. $class_div .'" '. $margin .'>';

					$output .= '<div class="image_wrapper">';

						$output .= '<a href="'. $link_all .'" '. $rel .' '. $target .'>';
							$output .= '<div class="mask"></div>';
							$output .= $image_output;
						$output .= '</a>';

						$output .= '<div class="image_links '. $double_link .'">';
							if( $link_image ) $output .= '<a href="'. $link_image .'" class="zoom" rel="prettyphoto"><i class="icon-search"></i></a>';
							if( $link ) $output .= '<a href="'. $link .'" class="link" '. $target .'><i class="icon-link"></i></a>';
						$output .= '</div>';

					$output .= '</div>';

					if( $caption ) $output .= '<p class="wp-caption-text">'. $caption .'</p>';

				$output .= '</div>'."\n";

			} else {

				$output .= '<div class="image_frame image_item no_link scale-with-grid'. $class_div .'" '. $margin .'>';

					$output .= '<div class="image_wrapper">';
						$output .= $image_output;
					$output .= '</div>';

					if( $caption ) $output .= '<p class="wp-caption-text">'. $caption .'</p>';

				$output .= '</div>'."\n";

			}

		if( $animate ) $output .= '</div>'."\n";

	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Hover Box [hover_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_hover_box' ) )
{
	function sc_hover_box( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'image'			=> '',
			'image_hover'	=> '',
			'link'			=> '',
			'target'		=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		//$image_hover = mfn_vc_image( $image_hover );
		list($width, $height) = getimagesize('http://localhost'.$image);
		list($width1, $height1) = getimagesize('http://localhost'.$image_hover);

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		$output = '<div class="hover_box">';
			if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';
				$output .= '<div class="hover_box_wrapper">';
					$output .= '<img class="visible_photo scale-with-grid" src="'. $image .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
					$output .= '<img class="hidden_photo scale-with-grid" src="'. $image_hover .'" alt="'. $alt1 .'" width="'. $width1 .'" height="'. $height1 .'"/>';
				$output .= '</div>';
			if( $link ) $output .= '</a>';
		$output .= '</div>'."\n";

	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Hover Color [hover_color]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_hover_color' ) )
{
	function sc_hover_color( $attr, $content = null )
	{
		extract($attr);
		/*extract( shortcode_atts( array(

			'align'				=> '',
			'background'		=> '',
			'background_hover'	=> '',
			'border'			=> '',
			'border_hover'		=> '',
			'border_width'		=> '',
			'padding'			=> '',

			'link'				=> '',
			'class'				=> '',
			'target'			=> '',

			'style'				=> '',

		), $attr ));*/

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		// padding
		if( $padding ){
			$padding = 'style="padding:'. $padding .';"';
		} else {
			$padding = false;
		}

		// FIX | prettyphoto
		if( strpos( $class, 'prettyphoto' ) !== false ){
			$class 	= str_replace( 'prettyphoto', '', $class );
			$rel 	= 'rel="prettyphoto"';
		} else {
			$rel 	= false;
		}

		$output = '<div class="hover_color align_'. $align .'" style="background:'. $background_hover .';border-color:'. $border_hover .';'. $style .'" ontouchstart="this.classList.toggle(\'hover\');">';
			$output .= '<div class="hover_color_bg" style="background:'. $background .';border-color:'. $border .';border-width:'. $border_width .';">';
				if( $link ) $output .= '<a href="'. $link .'" class="'. $class .'" '. $rel .' '. $target .'>';
					$output .= '<div class="hover_color_wrapper" '. $padding .'>';
						$output .= $content;
					$output .= '</div>';
				if( $link ) $output .= '</a>';
			$output .= '</div>'."\n";
		$output .= '</div>'."\n";

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'heading' 	=> '',
			'title' 	=> '',
			'number' 	=> '',
			'prefix' 	=> '',
			'label' 	=> '',
			'align' 	=> 'center',
			'animate' 	=> '',
		), $attr));*/

		//$animate_math = mfn_opts_get('math-animations-disable') ? false : 'animate-math';

		$output = '<div class="quick_fact align_'. $align .' '. $animate_math .'">';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';

				if( $heading ) $output .= '<h4 class="title">'. $heading .'</h4>';
				if( $number ){
					$output .= '<div class="number-wrapper">';
						if( $prefix ) $output .= '<span class="label prefix">'. $prefix .'</span>';
						$output .= '<span class="number" data-to="'. $number .'">'. $number .'</span>';
						if( $label ) $output .= '<span class="label postfix">'. $label .'</span>';
					$output .= '</div>';
				}
				if( $title ) $output .= '<h3 class="title">'. $title .'</h3>';
				$output .= '<hr class="hr_narrow" />';
				$output .= '<div class="desc">'. $content .'</div>';

			if( $animate ) $output .= '</div>';
		$output .= '</div>'."\n";

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'title' 		=> 'Button',
			'link' 			=> '',
			'target' 		=> '',
			'align' 		=> '',

			'icon' 			=> '',
			'icon_position' => 'left',

			'color' 		=> '',
			'font_color'	=> '',

			'large' 		=> '', // deprecated since Be 12.4
			'size' 			=> 2,
			'full_width' 	=> '',

			'class' 		=> '',
			'rel' 			=> '',
			'download' 		=> '',
			'onclick' 		=> '',
		), $attr));*/

		// target
		if( $target == 'lightbox' ){
			$target = false;
			$rel = 'prettyphoto '. $rel; // do not change order
		} elseif( $target ){
			$target = 'target="_blank"';
		}

		// download
		if( $download ){
			$download = 'download="'. $download .'"';
		}

		// onclick
		if( $onclick ){
			$onclick = 'onclick="'. $onclick .'"';
		}

		// icon_position
		if( $icon_position != 'left' ){
			$icon_position = 'right';
		}

		// FIX | prettyphoto
		if( strpos( $class, 'prettyphoto' ) !== false ){
			$class 	= str_replace( 'prettyphoto', '', $class );
			$rel = 'prettyphoto '. $rel; // do not change order
		}

		// class
		if( $icon )			$class .= ' button_'. $icon_position;
		if( $full_width ) 	$class .= ' button_full_width';
		if( $large ){
			$class .= ' button_large';
		} else {
			if( $size ) $class .= ' button_size_'. $size;
		}

		// custom color
		$style 		= '';
		$style_icon	= '';
		if( $color ){
			if( strpos($color, '#') === 0 ){
				/*if( mfn_opts_get('button-style') == 'stroke' ){
					// Stroke | Border
					$style .= ' border-color:'. $color .' !important;';
					$class .= ' button_stroke_custom';
				} else {*/
					// Default | Background
					$style .= ' background-color:'. $color .' !important;';
				//}
			} else {
				$class .= ' button_'. $color;
			}
		}
		if( $font_color ){
			$style 		.= ' color:'. $font_color .';';
			$style_icon .= ' color:'. $font_color .' !important;';
		}
		if( $style ){
			$style = ' style="'. $style .'"';
		}
		if( $style_icon ){
			$style_icon = ' style="'. $style_icon .'"';
		}

		// rel (do not move up)
		if( $rel ){
			$rel = 'rel="'. $rel .'"';
		}

		// link attributes
		$attributes = $target .' '. $rel .' '. $download .' '. $onclick .' '. $style;

		$output = '';

		if( $align ) $output .= '<div class="button_align align_'. $align .'">';

			$output .= '<a class="button '. $class .' button_js" href="'. $link .'" '. $attributes .'>';
				if( $icon )	$output .= '<span class="button_icon"><i class="'. $icon .'" '. $style_icon .'></i></span>';
				if( $title ) $output .= '<span class="button_label">'. $title .'</span>';
			$output .= '</a>';

		if( $align ) $output .= '</div>';

		$output .= "\n";

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'icon' 			=> 'icon-lamp',
			'link' 			=> '',
			'target' 		=> '',
			'size' 			=> '',
			'social' 		=> '',
		), $attr));*/

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'style'		=> 'warning',
		), $attr));*/

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
				$output .= $content;
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
			$output  .= '<div class="icon"><i class="icon-lamp"></i></div>';
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
		extract($attr);
		/*extract(shortcode_atts(array(
			'font' 			=> '',
			'size' 			=> 1, // 1-3, or custom size in px
			'background' 	=> '',
			'color' 		=> '',
			'circle' 		=> '',
			'transparent' 	=> '',
		), $attr));*/

		$class = '';
		$style = '';

		// font family
		if( $font ){
			$style .= "font-family:'". $font ."',Arial,Tahoma,sans-serif;";
			$font_slug = str_replace( ' ', '+', $font );
			wp_enqueue_style( $font_slug, 'http'. mfn_ssl() .'://fonts.googleapis.com/css?family='. $font_slug );
		}

		// circle
		if( $circle ) $class = ' dropcap_circle';

		// transparent
		if( $transparent ) $class = ' transparent';

		// background
		if( $background ) $style .= 'background-color:'. $background .';';

		// color
		if( $color ) $style .= ' color:'. $color .';';

		// size
		$size = intval( $size );
		$sizeH = $size + 15;

		if( $size > 3 ){
			if( $transparent ){
				$style .= ' font-size:'. $size .'px;height:'. $size .'px;line-height:'. $size .'px;width:'. $size .'px;';
			} else {
				$style .= ' font-size:'. $size .'px;height:'. $sizeH .'px;line-height:'. $sizeH .'px;width:'. $sizeH .'px;';
			}
		} else {
			$class .= ' size-'. $size;
		}

		if( $style ) $style = 'style="'. $style .'"';

		$output  = '<span class="dropcap'. $class .'" '. $style .'>';
			$output .= $content;
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
		extract($attr);
		/*extract(shortcode_atts(array(
			'background' 	=> '',
			'color' 		=> '',
		), $attr));*/

		// style
		$style = '';
		if( $background ) $style .= 'background-color:'. $background .';';
		if( $color ) $style .= ' color:'. $color .';';
		if( $style ) $style = 'style="'. $style .'"';

		$output  = '<span class="highlight" '. $style .'>';
			$output .= $content;
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
		extract($attr);
		/*extract(shortcode_atts(array(
			'hint' 			=> '',
		), $attr));*/

		$output = '';
		if( $hint ){
			$output .= '<span class="tooltip tooltip-txt" data-tooltip="'. $hint .'">';
				$output .= $content;
			$output .= '</span>'."\n";
		}

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Tooltip [tooltip_image] [/tooltip_image]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_tooltip_image' ) )
{
	function sc_tooltip_image( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'hint' 			=> '',
			'image' 		=> '',
		), $attr));*/

		$output = '';
		if( $hint || $image ){
			$output .= '<span class="tooltip tooltip-img">';
				$output .= '<span class="tooltip-content">';
					if( $image )	$output .= '<img src="'. $image .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
					if( $hint )		$output .= $hint;
				$output .= '</span>';
				$output .= $content;
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
		extract($attr);
		/*extract(shortcode_atts(array(
			'title' 	=> '',
			'icon' 		=> '',
			'link' 		=> '',
			'target' 	=> '',
			'class' 	=> '',
			'download' 	=> '',
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

		$output = '<a class="content_link '. $class .'" href="'. $link .'" '. $target .' '. $download .'>';
			if( $icon )	$output .= '<span class="icon"><i class="'. $icon .'"></i></span>';
			if( $title ) $output .= '<span class="title">'. $title .'</span>';
		$output .= '</a>';

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Fancy Link [fancy_link]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_fancy_link' ) )
{
	function sc_fancy_link( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'title' 	=> '',
			'link' 		=> '',
			'target' 	=> '',
			'style' 	=> '1',	// 1-8
			'class' 	=> '',
			'download' 	=> '',
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

		$output = '<a class="mfn-link mfn-link-'. $style .' '. $class .'" href="'. $link .'" data-hover="'. $title .'" ontouchstart="this.classList.toggle(\'hover\');" '. $target .' '. $download .'>';
			$output .= '<span data-hover="'. $title .'">'. $title .'</span>';
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
		extract($attr);
		/*extract(shortcode_atts(array(
			'author'	=> '',
			'link'		=> '',
			'target'	=> '',
		), $attr));*/

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
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
 * Fancy Heading [fancy_heading] [/fancy_heading]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_fancy_heading' ) )
{
	function sc_fancy_heading( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'title'		=> '',
			'h1'		=> '',
			'icon' 		=> '',
			'slogan' 	=> '',
			'style' 	=> 'icon',	// icon, line, arrows
			'animate' 	=> '',
		), $attr));*/

		$output = '<div class="fancy_heading fancy_heading_'. $style.'">';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';

				if( $style == 'icon' && $icon  ) $output .= '<span class="icon_top"><i class="'. $icon .'"></i></span>';

				if( $style == 'line' && $slogan ) $output .= '<span class="slogan">'. $slogan .'</span>';

				if( $style =='arrows' ) $title = '<i class="icon-right-dir"></i>'. $title .'<i class="icon-left-dir"></i>';

				if( $title ){
					if( $h1 ){
						$output .= '<h1 class="title">'. $title .'</h1>';
					} else {
						$output .= '<h2 class="title">'. $title .'</h2>';
					}
				}
				if( $content ) $output .= '<div class="inside">'. $content .'</div>';

			if( $animate ) $output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Heading [heading] [/heading]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_heading' ) )
{
	function sc_heading( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'tag'		=> 'h2',
			'align'		=> 'left',
			'color' 	=> '',
			'style' 	=> '', // [none], lines
			'color2' 	=> '',
		), $attr));*/

		$before = $after = '';

		// inline_css
		$inline_css = '';
		if( $color ){
			$inline_css .= 'color:'. $color .';';
		}
		if( $inline_css ){
			$inline_css = 'style="'. $inline_css .'"';
		}

		// inline_css2
		$inline_css2 = '';
		if( $color2 ){
			$inline_css2 .= 'background:'. $color2 .';';
		}
		if( $inline_css2 ){
			$inline_css2 = 'style="'. $inline_css2 .'"';
		}

		// style
		if( $style == 'lines' ){
			$before	= '<span class="line line_l" '. $inline_css2 .'></span>';
			$after	= '<span class="line line_r" '. $inline_css2 .'></span>';
		}

		if( $style ){
			$style = 'heading_'. $style;
		}


		// output
		$output = '<div class="mfn_heading '. $style .' align_'. $align .'">';

			$output .= '<'. $tag .' class="title" '. $inline_css .'>';

				$output .= $before;

					$output .= $content;

				$output .= $after;

			$output .= '</'. $tag .'>';

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'title'			=> '',
			'title_tag' 	=> 'h4',

			'icon'			=> '',
			'image'			=> '',
			'icon_position'	=> 'top',
			'border'		=> '',

			'link'			=> '',
			'target'		=> '',
			'class'			=> '',

			'animate'		=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// border
		if( $border ){
			$border = 'has_border';
		} else {
			$border = 'no_border';
		}

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		// FIX | prettyphoto
		if( strpos( $class, 'prettyphoto' ) !== false ){
			$class 	= str_replace( 'prettyphoto', '', $class );
			$rel 	= 'rel="prettyphoto"';
		} else {
			$rel 	= false;
		}

		$output = '';
		if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';
			$output .= '<div class="icon_box icon_position_'. $icon_position .' '. $border .'">';
				if( $link ) $output .= '<a class="'. $class .'" href="'. $link .'" '. $target .' '. $rel .'>';

					if( $image ){

						$output .= '<div class="image_wrapper">';
							$output .= '<img src="'. $image .'" class="scale-with-grid" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
						$output .= '</div>';

					} else {

						$output .= '<div class="icon_wrapper">';
							$output .= '<div class="icon">';
								$output .= '<i class="'. $icon .'"></i>';
							$output .= '</div>';
						$output .= '</div>';

					}

					$output .= '<div class="desc_wrapper">';

						if( $title ){
							$output .= '<'. $title_tag .' class="title">'. $title .'</'. $title_tag .'>';
						}
						if( $content )$output .= '<div class="desc">'. $content .'</div>';

					$output .= '</div>';

				if( $link ) $output .= '</a>';
			$output .= '</div>'."\n";
		if( $animate ) $output .= '</div>'."\n";

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'heading' 		=> '',
			'image' 		=> '',
			'title' 		=> '',
			'subtitle'		=> '',

			'phone' 		=> '',
			'email' 		=> '',

			'facebook' 		=> '',
			'twitter'		=> '',
			'linkedin'		=> '',
			'vcard'			=> '',

			'blockquote' 	=> '',
			'style' 		=> 'vertical',

			'link' 			=> '',
			'target' 		=> '',

			'animate' 		=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		$output = '<div class="team team_'. $style .'">';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';

				if( $heading ) $output .= '<h4 class="title">'. $heading .'</h4>';

				$output  .= '<div class="image_frame photo no_link scale-with-grid">';
					$output .= '<div class="image_wrapper">';

						if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';
							$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
						if( $link ) $output .= '</a>';

					$output .= '</div>';
				$output .= '</div>';

				$output .= '<div class="desc_wrapper">';

					if( $title ){
						$output .= '<h4>';
							if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';
								$output .= $title;
							if( $link ) $output .= '</a>';
						$output .= '</h4>';
					}

					if( $subtitle ) $output .= '<p class="subtitle">'. $subtitle .'</p>';
					if( $phone ) 	$output .= '<p class="phone"><i class="icon-phone"></i> <a href="tel:'. $phone .'">'. $phone .'</a></p>';
					$output .= '<hr class="hr_color" />';

					$output .= '<div class="desc">'. $content .'</div>';

					if( $email || $phone || $facebook || $twitter || $linkedin ){
						$output .= '<div class="links">';
							if( $email ) 	$output .= '<a href="mailto:'. $email .'" class="icon_bar icon_bar_small"><span class="t"><i class="icon-mail"></i></span><span class="b"><i class="icon-mail"></i></span></a>';
							if( $facebook ) $output .= '<a target="_blank" href="'. $facebook .'" class="icon_bar icon_bar_small"><span class="t"><i class="icon-facebook"></i></span><span class="b"><i class="icon-facebook"></i></span></a>';
							if( $twitter ) 	$output .= '<a target="_blank" href="'. $twitter .'" class="icon_bar icon_bar_small"><span class="t"><i class="icon-twitter"></i></span><span class="b"><i class="icon-twitter"></i></span></a>';
							if( $linkedin ) $output .= '<a target="_blank" href="'. $linkedin .'" class="icon_bar icon_bar_small"><span class="t"><i class="icon-linkedin"></i></span><span class="b"><i class="icon-linkedin"></i></span></a>';
							if( $vcard ) 	$output .= '<a href="'. $vcard .'" class="icon_bar icon_bar_small"><span class="t"><i class="icon-vcard"></i></span><span class="b"><i class="icon-vcard"></i></span></a>';
						$output .= '</div>';
					}

					if( $blockquote )  $output .= '<blockquote>'. $blockquote .'</blockquote>';

				$output .= '</div>';

			if( $animate )  $output .= '</div>';
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
		extract($attr);
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
			'vcard'			=> '',
			'link' 			=> '',
			'target' 		=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// target
		if( $target == 'lightbox' ){
			$target = 'rel="prettyphoto"';
		} elseif( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}


		$output = '<div class="team team_list clearfix">';

			$output .= '<div class="column one-fourth">';
				$output .= '<div class="image_frame no_link scale-with-grid">';
					$output .= '<div class="image_wrapper">';

						if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';
							$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
						if( $link ) $output .= '</a>';

					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';

			$output .= '<div class="column one-second">';
				$output .= '<div class="desc_wrapper">';

					if( $title ){
						$output .= '<h4>';
							if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';
								$output .= $title;
							if( $link ) $output .= '</a>';
						$output .= '</h4>';
					}

					if( $subtitle ) $output .= '<p class="subtitle">'. $subtitle .'</p>';
					if( $phone ) 	$output .= '<p class="phone"><i class="icon-phone"></i> <a href="tel:'. $phone .'">'. $phone .'</a></p>';
					$output .= '<hr class="hr_color" />';

					$output .= '<div class="desc">'. $content .'</div>';
				$output .= '</div>';
			$output .= '</div>';

			$output .= '<div class="column one-fourth">';
				$output .= '<div class="bq_wrapper">';
					if( $blockquote ) $output .= '<blockquote>'. $blockquote .'</blockquote>';

					if( $email || $phone || $facebook || $twitter || $linkedin ){
						$output .= '<div class="links">';
							if( $email ) 	$output .= '<a href="mailto:'. $email .'" class="icon_bar icon_bar_small"><span class="t"><i class="icon-mail"></i></span><span class="b"><i class="icon-mail"></i></span></a>';
							if( $facebook ) $output .= '<a target="_blank" href="'. $facebook .'" class="icon_bar icon_bar_small"><span class="t"><i class="icon-facebook"></i></span><span class="b"><i class="icon-facebook"></i></span></a>';
							if( $twitter ) 	$output .= '<a target="_blank" href="'. $twitter .'" class="icon_bar icon_bar_small"><span class="t"><i class="icon-twitter"></i></span><span class="b"><i class="icon-twitter"></i></span></a>';
							if( $linkedin ) $output .= '<a target="_blank" href="'. $linkedin .'" class="icon_bar icon_bar_small"><span class="t"><i class="icon-linkedin"></i></span><span class="b"><i class="icon-linkedin"></i></span></a>';
							if( $vcard ) 	$output .= '<a href="'. $vcard .'" class="icon_bar icon_bar_small"><span class="t"><i class="icon-vcard"></i></span><span class="b"><i class="icon-vcard"></i></span></a>';
						$output .= '</div>';
					}
				$output .= '</div>';
			$output .= '</div>';

		$output .= '</div>'."\n";

		return $output;
	}
}




/* ---------------------------------------------------------------------------
 * Slider [slider] a ete modiffe
 * --------------------------------------------------------------------------- */
 if( ! function_exists( 'sc_slider' ) )
{
	function sc_slider( $attr, $content = null )
	{
		global $xoopsDB;
	$rest = substr($attr['content'], 3, -2);
			
	//$id = substr($rest, -2);
	$ex = explode('_',$rest);
	if (is_numeric(end($ex))) {
		$id = end($ex);
	} 
//var_dump($id);
	
	//var_dump($attr['content']);
	//var_dump($id);
	$output = '';
		$output .= '<link rel="stylesheet" href="'. XOOPS_URL . '/modules/system/admin/themebuilder1/slider/css/crellyslider.css" type="text/css" media="all">
<script type="text/javascript" src="'. XOOPS_URL . '/modules/system/admin/themebuilder1/slider/js/jquery.crellyslider.js"></script>';

				//$id = isset($_GET['id']) ? $_GET['id'] : NULL;
				//$id = 17;
				$sqlslider = "SELECT * FROM ".$xoopsDB->prefix("crellyslider_sliders")." WHERE id = ".$id." ";
				$result = $xoopsDB->query($sqlslider);
				$slider = $xoopsDB -> fetchArray( $result );

		if(! $slider) {
				$output .= 'The slider hasn\'t been found';			
		}
		
//var_dump($id);
		
	$sqlslides = "SELECT * FROM ".$xoopsDB->prefix("crellyslider_slides")." WHERE slider_parent = ".$id." ORDER BY position";
		$result=$xoopsDB->query($sqlslides);
		while ($myrow = $xoopsDB -> fetchArray( $result )) {
			$slides[] = $myrow;
		}

		$slider_id = $slider['id'];
//var_dump($slides);
		

		$output .= '<div style="display: block;" class="crellyslider-slider crellyslider-slider-' . $slider['layout'] . ' crellyslider-slider-' . $slider['alias'] . '" id="crellyslider-' . $slider_id . '">' . "\n";
		$output .= '<ul>' . "\n";
		foreach($slides as $slide) {
			$background_type_image = $slide['background_type_image'] == 'undefined' || $slide['background_type_image'] == 'none' ? 'none;' : 'url(\'' . $slide['background_type_image'] . '\');';
			$output .= '<li' .  "\n" .
			'style="' . "\n" .
			'background-color: ' . $slide['background_type_color'] . ';' . "\n" .
			'background-image: ' . $background_type_image . "\n" .
			'background-position: ' . $slide['background_propriety_position_x'] . ' ' . $slide['background_propriety_position_y'] . ';' . "\n" .
			'background-repeat: ' . $slide['background_repeat'] . ';' . "\n" .
			'background-size: ' . $slide['background_propriety_size'] . ';' . "\n" .
			stripslashes($slide['custom_css']) . "\n" .
			'"' . "\n" .

			'data-in="' . $slide['data_in'] . '"' . "\n" .
			'data-ease-in="' . $slide['data_easeIn'] . '"' . "\n" .
			'data-out="' . $slide['data_out'] . '"' . "\n" .
			'data-ease-out="' . $slide['data_easeOut'] . '"' . "\n" .
			'data-time="' . $slide['data_time'] . '"' . "\n" .
			'>' . "\n";

			if($slide['link'] != '') {
				if($slide['link_new_tab']) {
					$output .= '<a class="cs-background-link" target="_blank" href="' . stripslashes($slide['link']) . '"></a>';
				}
				else {
					$output .= '<a class="cs-background-link" href="' . stripslashes($slide['link']) . '"></a>';
				}
			}

			$slide_parent = $slide['position'];
				$elements = array();
				$sqlelements = "SELECT * FROM ".$xoopsDB->prefix("crellyslider_elements")." WHERE slider_parent = ".$slider_id." AND slide_parent = ". $slide_parent ."";
				$result=$xoopsDB->query($sqlelements);
				while ($myrowelements = $xoopsDB -> fetchArray( $result )) {
				$elements[] = $myrowelements;
				}

//var_dump ($elements);			
			
			foreach($elements as $element) {
				if($element['link'] != '') {
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
					'href="' . stripslashes($element['link']) . '"' . "\n" .
					$target . "\n" .
					'style="' .
					'z-index: ' . $element['z_index'] . ';' . "\n" .
					'">' .  "\n";
				}
//var_dump($element['type']);
				switch ($element['type']) {
					case 'text':
						$output .= '<div' . "\n" .
						'class="' . $element['custom_css_classes'] . '"' . "\n" .
						'style="';
						if($element['link'] == '') {
							$output .= 'z-index: ' . $element['z_index'] . ';' . "\n";
						}
						$output .= stripslashes($element['custom_css']) . "\n" .
						'"' .  "\n";
						if($element['link'] == '') {
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
						stripslashes($element['inner_html']) . "\n" .
						'</div>' . "\n";
					break;

					case 'image':
						$output .= '<img' . "\n" .
						'class="' . $element['custom_css_classes'] . '"' . "\n" .
						'src="' . $element['image_src'] . '"' . "\n" .
						'alt="' . $element['image_alt'] . '"' . "\n" .
						'style="' . "\n";
						if($element['link'] == '') {
							$output .= 'z-index: ' . $element['z_index'] . ';' . "\n";
						}
						$output .= stripslashes($element['custom_css']) . "\n" .
						'"' . "\n";
						if($element['link'] == '') {
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
						'data-autoplay="' . $element['video_autoplay ']. '"' . "\n" .
						'data-loop="' . $element['video_loop'] . '"' . "\n" .
						'style="' . "\n" .
						'z-index: ' . $element['z_index'] . ';' . "\n" .
						stripslashes($element['custom_css']) . "\n" .
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
						stripslashes($element['custom_css']) . "\n" .
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

				if($element['link'] != '') {
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
		$output .= '$("#crellyslider-' . $slider_id  . '").crellySlider({' . "\n";
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
		if($slider['randomOrder'] != NULL) {
			$output .= 'randomOrder: ' . $slider['randomOrder'] . ',' . "\n";
		}
		if($slider['startFromSlide'] != NULL) {
			$output .= 'startFromSlide: ' . $slider['startFromSlide'] . ',' . "\n";
		}
		$output .= stripslashes($slider['callbacks']) . "\n";
		$output .= '});' . "\n";
		$output .= '});' . "\n";
		$output .= '})(jQuery);' . "\n";
		$output .= '</script>' . "\n";

		
		$output1 =  '<div class="olivee-item-contentdiv">';
		$output1 .=  "\n".$output."\n";
		$output1 .=  "</div>\n";

		return $output1;
	
	
	
	
	}
}

/* ---------------------------------------------------------------------------
 * sc_menu [sc_menu] [/sc_menu] added
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_menu' ) ){
	function sc_menu( $attr, $content = null ){
		global $xoopsDB;
		$rest = substr($attr['content'], 3, -2);
		$id = substr($rest, 10);

	include_once XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/menu/includes/treefront.php';
	$tree = new Tree;

		$sql0 = "SELECT * FROM ".$xoopsDB->prefix("menu_group")." WHERE id = ".$id." ";
		$result0=$xoopsDB->query($sql0);
		while ( $myrow1 = $xoopsDB->fetchArray($result0) ) {
				$data1[] = $myrow1;
			}
			//var_dump($data1);
			if(! $data1) {
				echo 'The Menu hasn\'t been found';			
		}
			
		foreach ($data1 as $row1) {
				//var_dump($row1);
				$sql = "SELECT * FROM ".$xoopsDB->prefix("menu")." WHERE group_id = ".$row1['id']." ORDER BY parent_id, position";
				$result=$xoopsDB->query($sql);
				$data = array();
				$tree->clear();
				while ( $myrow = $xoopsDB->fetchArray($result) ) {
						$data[] = $myrow;
					}
			//echo $row1['title'];	
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
				$output .= '<link rel="stylesheet" type="text/css" href="'. XOOPS_URL . '/themes/themebuilder1/css/megamenu.css">';
				$output .= '<link rel="stylesheet" href="'. XOOPS_URL . '/themes/themebuilder1/css/icomoon.css">';
				$output .= "\n".'<link rel="stylesheet" type="text/css" media="all" href="' . XOOPS_URL  .'/themes/themebuilder1/css/skinmegamenu.php?id='.$row1['id'].'" />'."\n";		
				$output .= $tree->options($row1);
				$output .= $tree->generate_list($row1['options']);;
				$output .= '</div>
				</div>
			</div>';
			
			//echo $output;
	
	}
		$output1 =  "\n".'<div class="olivee-item-contentdiv">'."\n";
		$output1 .= $output;
		$output1 .=  "\n</div>\n";
		
	    return $output1;
	}
		
}

/* ---------------------------------------------------------------------------
 * sc_menu [sc_menu] [/sc_menu] added
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_block_xoops' ) ){
	function sc_block_xoops( $attr, $content = null ){
		global $xoTheme;
		extract($attr);
		//var_dump($xoTheme->template->_tpl_vars['xoBlocks']['canvas_right']);
		//global $xoopsDB;
		$output = '';
			if ( isset ($xoTheme->template->_tpl_vars['xoBlocks']['canvas_left'][''.$content.'']) && $xoTheme->template->_tpl_vars['xoBlocks']['canvas_left'][''.$content.'']['id'] === $content ){
				$output .= $xoTheme->template->_tpl_vars['xoBlocks']['canvas_left'][''.$content.'']['content'];
			
			}elseif ( isset ($xoTheme->template->_tpl_vars['xoBlocks']['canvas_right'][''.$content.'']) && $xoTheme->template->_tpl_vars['xoBlocks']['canvas_right'][''.$content.'']['id'] === $content ){
				$output .= $xoTheme->template->_tpl_vars['xoBlocks']['canvas_right'][''.$content.'']['content'];
			
			}elseif ( isset ($xoTheme->template->_tpl_vars['xoBlocks']['page_topleft'][''.$content.'']) && $xoTheme->template->_tpl_vars['xoBlocks']['page_topleft'][''.$content.'']['id'] === $content ){
				$output .= $xoTheme->template->_tpl_vars['xoBlocks']['page_topleft'][''.$content.'']['content'];
			
			}elseif ( isset ($xoTheme->template->_tpl_vars['xoBlocks']['page_topcenter'][''.$content.'']) && $xoTheme->template->_tpl_vars['xoBlocks']['page_topcenter'][''.$content.'']['id'] === $content ){
				$output .= $xoTheme->template->_tpl_vars['xoBlocks']['page_topcenter'][''.$content.'']['content'];
			
			}elseif ( isset ($xoTheme->template->_tpl_vars['xoBlocks']['page_topright'][''.$content.'']) && $xoTheme->template->_tpl_vars['xoBlocks']['page_topright'][''.$content.'']['id'] === $content ){
				$output .= $xoTheme->template->_tpl_vars['xoBlocks']['page_topright'][''.$content.'']['content'];
			
			}

		//var_dump($xoTheme->template->_tpl_vars['xoBlocks']);
		return $output;
	}
}	

/* ---------------------------------------------------------------------------
 * sc_blockcolumn [sc_blockcolumn] [/sc_blockcolumn]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_Blockcolumn' ) )
{
	function sc_Blockcolumn( $attr, $content = null )
	{
	global $xoTheme;
	extract($attr);
	//var_dump($attr);
	//$output = $attr['content'];
		//include(XOOPS_ROOT_PATH."/header.php");
		//var_dump($xoTheme);
														if ($attr['content'] == 'Left'){
															if ($xoTheme->template->_tpl_vars["xoops_showlblock"]){
																$_from = $xoTheme->template->_tpl_vars['xoBlocks']['canvas_left'];
																$output = '<div class="olivee-itemq olivee-itemq-'. $attr['type'] .''.$attr['content'].'"><div class="olivee-item-contentdiv">';																
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
														
														if ($attr['content'] == 'Center'){
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
$output .= '<div class="olivee-itemq olivee-itemq-'. $attr['type'] .''.$attr['content'].' '. $classes[$attr['size']] .'"><div class="olivee-item-contentdiv">';			
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
	$output .= '<div class="olivee-itemq olivee-itemq-'. $attr['type'] .''.$attr['content'].' '. $classes[$attr['size']] .'"><div class="olivee-item-contentdiv">';
	
	
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

														if ($attr['content'] == 'Right'){
															if ($xoTheme->template->_tpl_vars["xoops_showrblock"]){
																$_from = $xoTheme->template->_tpl_vars['xoBlocks']['canvas_right'];
																$output = '<div class="olivee-itemq olivee-itemq-'. $attr['type'] .''.$attr['content'].' '. $classes[$attr['size']] .'"><div class="olivee-item-contentdiv">';																
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
		$output .= $attr['content'];
		$output .= '</pre>';*/
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Map Basic [map_basic]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_map_basic' ) )
{
	function sc_map_basic( $attr, $content = null )
	{
		global $xoTheme;
		extract($attr);
		/*extract( shortcode_atts( array(
			'iframe' 	=> '',

			'address' => '',
			'zoom' 		=> 13,
			'height' 	=> 300,
		), $attr));*/

		$output = '';

		if( $iframe ){
			// iframe

			$output = wp_kses( $iframe, array(
				'iframe' => array(
					'src' => array(),
					'width' => array(),
					'height' => array(),
					'frameborder' => array(),
					'style' => array(),
					'allowfullscreen' => array(),
				),
			));

		} elseif( $address ) {
			// embed

			$address = str_replace( array( ' ' ,',' ), '+', trim( $address ) );
			$api_key = trim( $xoTheme->template->_tpl_vars[ 'google-maps-api-key' ] );

			$src = 'https://www.google.com/maps/embed/v1/place?key='. $api_key .'&q='. $address .'&zoom='. $zoom ;
			$output = '<iframe class="embed" width="100%" height="'. $height .'" frameborder="0" style="border:0" src="'. $src .'" allowfullscreen></iframe>';

		}

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Map [map] [/map]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_map' ) )
{
	function sc_map( $attr, $content = null )
	{
		global $xoTheme;
		extract($attr);
		/*extract(shortcode_atts(array(
			'lat' 		=> '',
			'lng' 		=> '',
			'zoom' 		=> 13,
			'height' 	=> 300,

			'type' 		=> 'ROADMAP',
			'controls' 	=> '',
			'draggable' => '',
			'border' 	=> '',

			'icon' 		=> '',
			'color'		=> '',
			'styles'	=> '',
			'latlng' 	=> '',

			'title'		=> '',
			'telephone'	=> '',
			'email' 	=> '',
			'www' 		=> '',
			'style' 	=> 'box',

			'uid' 		=> uniqid(),
		), $attr));*/
		$uid = uniqid();

		// image | visual composer fix
		//$icon = mfn_vc_image( $icon );
		//list($width, $height) = getimagesize('http://localhost'.$icon);

		// border
		if( $border ){
			$class = 'has_border';
		} else {
			$class = 'no_border';
		}

		// controls
		$zoomControl = $mapTypeControl = $streetViewControl = 'false';
		if( ! $controls ) $zoomControl = 'true';
		if( strpos( $controls , 'zoom' ) !== false ) 		$zoomControl = 'true';
		if( strpos( $controls , 'mapType' ) !== false ) 	$mapTypeControl = 'true';
		if( strpos( $controls , 'streetView' ) !== false ) 	$streetViewControl = 'true';

		if( $api_key = trim( $xoTheme->template->_tpl_vars[ 'google-maps-api-key' ] ) ){
			$api_key = '?key='. $api_key;
		}

		//wp_enqueue_script( 'google-maps', 'http'. mfn_ssl() .'://maps.google.com/maps/api/js'. $api_key, false, null, true );
		$output = '<script src="http://maps.google.com/maps/api/js'. $api_key.'"></script>';

		$output .= '<script>';
			//<![CDATA[
			$output .= 'function google_maps_'. $uid .'(){';

				$output .= 'var latlng = new google.maps.LatLng('. $lat .','. $lng .');';


				// draggable

				if( $draggable == 'disable' ){
					$output .= 'var draggable = false;';
				} elseif( $draggable == 'disable-mobile' ){
					$output .= 'var draggable = jQuery(document).width() > 767 ? true : false;';
				} else {
					$output .= 'var draggable = true;';
				}


				// 1 click color adjustment

				if( $color && ! $styles ){
					$color = $color;

					//if( mfn_brightness( $color ) == 'light' ){

						// light
					//	$styles = '[{featureType:"all",elementType:"labels",stylers:[{visibility:"on"}]},{featureType:"administrative",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"landscape",elementType:"all",stylers:[{color:"'. $color .'"},{visibility:"simplified"}]},{featureType:"poi",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"all",stylers:[{visibility:"on"}]},{featureType:"road",elementType:"geometry",stylers:[{color:"'. $color .'"},{lightness:"50"}]},{featureType:"road",elementType:"labels.text",stylers:[{visibility:"on"}]},{featureType:"road",elementType:"labels.text.fill",stylers:[{color:"'. $color .'"},{lightness:"-60"}]},{featureType:"road",elementType:"labels.text.stroke",stylers:[{color:"'. $color .'"},{lightness:"50"}]},{featureType:"road",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"transit",elementType:"all",stylers:[{visibility:"simplified"},{color:"'. $color .'"},{lightness:"50"}]},{featureType:"transit.station",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"water",elementType:"all",stylers:[{color:"'. $color .'"},{lightness:"-10"}]}]';

					//} else {

						// dark
						$styles = '[{featureType:"all",elementType:"labels",stylers:[{visibility:"on"}]},{featureType:"administrative",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"landscape",elementType:"all",stylers:[{color:"'. $color .'"},{visibility:"simplified"}]},{featureType:"poi",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"all",stylers:[{visibility:"on"}]},{featureType:"road",elementType:"geometry",stylers:[{color:"'. $color .'"},{lightness:"30"},{saturation:"-10"}]},{featureType:"road",elementType:"labels.text",stylers:[{visibility:"on"}]},{featureType:"road",elementType:"labels.text.fill",stylers:[{color:"'. $color .'"},{lightness:"80"}]},{featureType:"road",elementType:"labels.text.stroke",stylers:[{color:"'. $color .'"},{lightness:"0"}]},{featureType:"road",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"transit",elementType:"all",stylers:[{visibility:"simplified"},{color:"'. $color .'"},{lightness:"50"}]},{featureType:"transit.station",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"water",elementType:"all",stylers:[{color:"'. $color .'"},{lightness:"-20"}]}]';

					//}

				}


				// OUTPUT

				$output .= 'var myOptions = {';
					$output .= 'zoom				: '. intval($zoom) .',';
					$output .= 'center				: latlng,';
					$output .= 'mapTypeId			: google.maps.MapTypeId.'. $type .',';
					if( $styles ) $output .= 'styles	: '. $styles .',';
					$output .= 'draggable			: draggable,';
					$output .= 'zoomControl			: '. $zoomControl .',';
					$output .= 'mapTypeControl		: '. $mapTypeControl .',';
					$output .= 'streetViewControl	: '. $streetViewControl .',';
					$output .= 'scrollwheel			: false';
				$output .= '};';

				$output .= 'var map = new google.maps.Map(document.getElementById("google-map-area-'. $uid .'"), myOptions);';

				$output .= 'var marker = new google.maps.Marker({';
					$output .= 'position			: latlng,';
 					if( $icon ) $output .= 'icon	: "'. $icon .'",';
					$output .= 'map					: map';
				$output .= '});';


				// additional markers

				if( $latlng ){

					// remove white spaces
					$latlng = str_replace( ' ', '', $latlng );

					// explode array
					$latlng = explode( ';', $latlng );

					foreach( $latlng as $k=>$v ){

						$markerID = $k + 1;
						$markerID = 'marker'. $markerID;

						// custom marker icon
						$vEx = explode( ',', $v  );
						if( isset( $vEx[2] ) ){
							$customIcon = $vEx[2];
						} else {
							$customIcon = $icon;
						}

						$output .= 'var '. $markerID .' = new google.maps.Marker({';
							$output .= 'position			: new google.maps.LatLng('. $vEx[0] .','. $vEx[1] .'),';
							if( $customIcon ) $output .= 'icon	: "'. $customIcon .'",';
							$output .= 'map					: map';
						$output .= '});';

					}

				}


			$output .= '}';

			$output .= 'jQuery(document).ready(function($){';
				$output .= 'google_maps_'. $uid .'();';
			$output .= '});';
			//]]>
		$output .= '</script>'."\n";

		$output .= '<div class="google-map-wrapper '. $class .'">';

			if( $title || $content ){
				$output .= '<div class="google-map-contact-wrapper style-'. $style .'">';
					$output .= '<div class="get_in_touch">';
						if( $title ) $output .= '<h3>'. $title .'</h3>';
						$output .= '<div class="get_in_touch_wrapper">';
							$output .= '<ul>';
								if( $content ){
									$output .= '<li class="address">';
										$output .= '<span class="icon"><i class="icon-location"></i></span>';
										$output .= '<span class="address_wrapper">'. $content .'</span>';
									$output .= '</li>';
								}
								if( $telephone ){
									$output .= '<li class="phone">';
										$output .= '<span class="icon"><i class="icon-phone"></i></span>';
										$output .= '<p><a href="tel:'. str_replace(' ', '', $telephone) .'">'. $telephone .'</a></p>';
									$output .= '</li>';
								}
								if( $email ){
									$output .= '<li class="mail">';
										$output .= '<span class="icon"><i class="icon-mail"></i></span>';
										$output .= '<p><a href="mailto:'. $email .'">'. $email .'</a></p>';
									$output .= '</li>';
								}
								if( $www ){
									$output .= '<li class="www">';
										$output .= '<span class="icon"><i class="icon-link"></i></span>';
										//$output .= '<p><a target="_blank" href="http'. mfn_ssl() .'://'. $www .'">'. $www .'</a></p>';
									$output .= '</li>';
								}
							$output .= '</ul>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
			}

			$output .= '<div class="google-map" id="google-map-area-'. $uid .'" style="width:100%; height:'. intval($height) .'px;">&nbsp;</div>';

		$output .= '</div>'."\n";

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

		extract($attr);
		/*extract( shortcode_atts( array(
			'title'		=> '',
			'tabs'		=> '',
			'type'		=> '',
			'padding'	=> '',
			'uid'			=> '',
		), $attr ) );*/

		$content;

		// content builder
		if( $tabs ){
			$tabs_array = $tabs;
		}

		// uid
		if( ! $uid ){
			$uid = 'tab-'. uniqid();
		}

		// padding
		if( $padding || $padding === '0' ){
			$padding = 'style="padding:'. $padding .'"';
		}

		$output = '';
		if( is_array( $tabs_array ) )
		{
			if( $title ) $output .= '<h4 class="title">'. $title .'</h4>';
			$output .= '<div class="jq-tabs tabs_wrapper tabs_'. $type .'">';

				// contant
				$output .= '<ul>';
					$i = 1;
					$output_tabs = '';
					foreach( $tabs_array as $tab )
					{
						// check if content contains [tab]|[tabs]
						$pattern = '/\[tab(\]|s| )/';
						if( preg_match( $pattern, $tab['content'] ) ){
							$tab['content'] = 'Tab smarty does not work inside another tab.';
						}

						$output .= '<li><a href="#'. $uid .'-'. $i .'">'. $tab['title'] .'</a></li>';
						$output_tabs .= '<div id="'. $uid .'-'. $i .'" '. $padding .'>'. $tab['content'] .'</div>';
						$i++;
					}
				$output .= '</ul>';

				// titles
				$output .= $output_tabs;

			$output .= '</div>';

			$tabs_array = '';
			$tabs_count = 0;
		}

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

		extract($attr);
		/*extract( shortcode_atts( array(
			'title' => 'Tab title',
		), $attr ) );*/

		$tabs_array[] = array(
			'title' 	=> $title,
			'content' => $content
		);
		$tabs_count++;

		return true;
	}
}


/* ---------------------------------------------------------------------------
 * Accordion [accordion][accordion_item]...[/accordion]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_accordion' ) )
{
	function sc_accordion( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'title' 	=> '',
			'tabs' 		=> '',
			'open1st' 	=> '',
			'openall' 	=> '',
			'openAll' 	=> '',
			'style' 	=> 'accordion',
		), $attr));*/

		// class
		$class = '';
		if( $open1st ) $class .= ' open1st';
		if( /*$openall ||*/ $openAll ) $class .= ' openAll';
		if( $style == 'toggle' ) $class .= ' toggle';

		$output  = '';

		$output .= '<div class="accordion">';
			if( $title ) $output .= '<h4 class="title">'. $title .'</h4>';
			$output .= '<div class="mfn-acc accordion_wrapper '. $class .'">';

				if( is_array( $tabs ) ){
					// content builder
					foreach( $tabs as $tab ){
						$output .= '<div class="question">';
							$output .= '<div class="title"><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>'. $tab['title'] .'</div>';
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

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Accordion Item [accordion_item][/accordion_item]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_accordion_item' ) )
{
	function sc_accordion_item( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'title' 	=> '',
		), $attr));*/

		$output = '<div class="question">';
			$output .= '<div class="title"><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>'. $title .'</div>';
			$output .= '<div class="answer">';
				$output .= $content;
			$output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * FAQ [faq][faq_item]../[/faq]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_faq' ) )
{
	function sc_faq( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'title' 	=> '',
			'tabs' 		=> '',
			'open1st' 	=> '',
			'openall' 	=> '',
			'openAll' 	=> '',
		), $attr));*/

		// class
		$class = '';
		if( $open1st ) $class .= ' open1st';
		if( /*$openall ||*/ $openAll ) $class .= ' openAll';

		$output  = '';

		$output .= '<div class="faq">';
			if( $title ) $output .= '<h4 class="title">'. $title .'</h4>';
			$output .= '<div class="mfn-acc faq_wrapper '. $class .'">';

				if( is_array( $tabs ) ){
					// content builder
					$i = 0;
					foreach( $tabs as $tab ){
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

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * FAQ Item [faq_item][/faq_item]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_faq_item' ) )
{
	function sc_faq_item( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'title' 	=> '',
			'number' 	=> '1',
		), $attr));*/

		$output = '<div class="question">';
			$output .= '<div class="title"><span class="num">'. $number .'</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>'. $title .'</div>';
			$output .= '<div class="answer">';
				$output .= $content;
			$output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Progress Icons [progress_icons]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_progress_icons' ) )
{
	function sc_progress_icons( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'icon' 			=> 'icon-lamp',
			'image' 		=> '',
			'count' 		=> 5,
			'active' 		=> 0,
			'background' 	=> '',
		), $attr));*/

		$output = '<div class="progress_icons" data-active="'. $active .'" data-color="'. $background .'">';
			for ($i = 1; $i <= $count; $i++) {
				if( $image ){
					$output .= '<span class="progress_icon progress_image"><img src="'. $image .'" alt=""/></span>';
				} else {
					$output .= '<span class="progress_icon"><i class="'. $icon .'"></i></span>';
				}
			}
		$output .= '</div>'."\n";

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'title' => '',
		), $attr));*/

		$output = '<div class="progress_bars">';
			if( $title ) $output .= '<h4 class="title">'. $title .'</h4>';
			$output .= '<ul class="bars_list">';
				$output .= $content;
			$output .= '</ul>';
		$output .= '</div>'."\n";

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'title' 	=> '',
			'value' 	=> 0,
			'size' 		=> '',
		), $attr));*/

		if( $size ) $size = 'style="height:'. intval( $size ) .'px"';

		$output  = '<li>';

			$output .= '<h6>';
				$output .= $title;
				$output .= '<span class="label">'. intval( $value ) .'<em>%</em></span>';
			$output .= '</h6>';

			$output .= '<div class="bar" '. $size .'>';
				$output .= '<span class="progress" style="width:'. intval( $value ) .'%"></span>';
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
		extract($attr);
		/*extract(shortcode_atts(array(
			'count' => '',
			'tabs' => '',
		), $attr));*/

		$output  = '<ul class="timeline_items">';

		if( is_array( $tabs ) ){
			// content builder
			foreach( $tabs as $tab ){
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
 * Vimeo [video]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_video' ) )
{
	function sc_video( $attr, $content = null )
	{
		extract($attr);
		/*extract(shortcode_atts(array(
			'video' 			=> '',
			'parameters' 		=> '',
			'mp4' 				=> '',
			'ogv'	 			=> '',
			'placeholder' 		=> '',
			'html5_parameters' 	=> '',
			'width' 			=> '700',
			'height' 			=> '400',
		), $attr));*/


		// parameters
		if( $parameters ) $parameters = '&'. $parameters;


		// HTML5 parameters
		$html5_default = array(
			'autoplay'	=> 'autoplay="1"',
			'controls'	=> 'controls="1"',
			'loop'		=> 'loop="1"',
			'muted'		=> 'muted="1"',
		);

		if( $html5_parameters ){
			$html5_parameters = explode( ';', $html5_parameters );
			if( ! $html5_parameters[0] ) $html5_default['autoplay'] = false;
			if( ! $html5_parameters[1] ) $html5_default['controls'] = false;
			if( ! $html5_parameters[2] ) $html5_default['loop'] = false;
			if( ! $html5_parameters[3] ) $html5_default['muted'] = false;
		}

		$html5_default = implode( ' ', $html5_default );


		// class
		$class = ( $video ) ? 'iframe' : '' ;

		if( $width && $height ){
			$class .= ' has-wh';
		} else {
			$class .= ' auto-wh';
		}

		$output  = '<div class="content_video '. $class .'">';

			if( $video ){

				// Embed
				if( is_numeric($video) ){
					// Vimeo
					$output .= '<iframe class="scale-with-grid" width="'. $width .'" height="'. $height .'" src="https://player.vimeo.com/video/'. $video .'?wmode=opaque'. $parameters .'" allowFullScreen></iframe>'."\n";
				} else {
					// YouTube
					$output .= '<iframe class="scale-with-grid" width="'. $width .'" height="'. $height .'" src="https://www.youtube.com/embed/'. $video .'?wmode=opaque'. $parameters .'" allowfullscreen></iframe>'."\n";
				}

			} elseif( $mp4 ){

				// HTML5
				$output .= '<div class="section_video">';

					$output .= '<div class="mask"></div>';
					$poster = ( $placeholder ) ? $placeholder : false;

					$output .= '<video poster="'. $poster .'" '. $html5_default .' style="max-width:100%;">';

						$output .= '<source type="video/mp4" src="'. $mp4 .'" />';
						if( $ogv ) $output .= '<source type="video/ogg" src="'. $ogv .'" />';

					$output .= '</video>';

				$output .= '</div>';

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'icon'		=> 'icon-picture',
			'title'		=> '',
			'link'		=> '',
			'target'	=> '',
			'animate'	=> '',
		), $attr));*/

		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		$output  = '<li>';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';
				if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';

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
		extract($attr);
		/*extract(shortcode_atts(array(
			'columns'	=> 4,
		), $attr));*/

		$output = '<div class="feature_list" data-col="'. $columns .'">';
			$output .= '<ul>';
				$output .= $content;	// [item]
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
		extract($attr);
		/*extract(shortcode_atts(array(
			'icon'		=> 'icon-picture',
			'image'		=> '',
			'title'		=> '',
			'link'		=> '',
			'target'	=> '',
			'style'		=> 1,
			'animate'	=> '',
		), $attr));*/

		// image | visual composer fix
		//$image = mfn_vc_image( $image );
		list($width, $height) = getimagesize('http://localhost'.$image);

		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}

		$output = '<div class="list_item lists_'. $style .' clearfix">';
			if( $animate ) $output .= '<div class="animate" data-anim-type="'. $animate .'">';
				if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';

					if( $style == 4 ){
						$output .= '<div class="circle">'. $title .'</div>';
					} elseif( $image ){
						$output .= '<div class="list_left list_image">';
							$output .= '<img src="'. $image .'" class="scale-with-grid" alt="'. $alt .'" width="'. $width .'" height="'. $height .'"/>';
						$output .= '</div>';
					} else {
						$output .= '<div class="list_left list_icon">';
							$output .= '<i class="'. $icon .'"></i>';
						$output .= '</div>';
					}
					$output .= '<div class="list_right">';
						if( $title && $style != 4 ) $output .= '<h4>'. $title .'</h4>';
						$output .= '<div class="desc">'. $content .'</div>';
					$output .= '</div>';

				if( $link ) $output .= '</a>';
			if( $animate )  $output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


