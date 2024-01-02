<?php
/**
 * The Header for our theme.
 *
 */
 global $xoTheme;
 $theme_disable = $xoTheme->template->_tpl_vars[ 'theme-disable' ];
include( XOOPS_ROOT_PATH . "/themes/themebuilder1/include/header/theme-head.php" );
// Menu -----------------------------------------------------------------------
require_once( XOOPS_ROOT_PATH . "/themes/themebuilder1/include/theme-menu.php" );
if( ! isset( $theme_disable['mega-menu'] ) ){
	//require_once( LIBS_DIR .'/theme-mega-menu.php' );
}
//var_dump($xoTheme->metas['meta']);
 
?><!DOCTYPE html>
<html lang="<?php echo $xoTheme->template->_tpl_vars[ 'xoops_langcode' ]; ?>" class="no-js<?php /*esc_attr_e( mfn_user_os() );*/ ?>" <?php /*mfn_tag_schema();*/ ?>>

<!-- head -->
<head>

<?php
	if( $xoTheme->template->_tpl_vars[ 'responsive' ] ){
		if( $xoTheme->template->_tpl_vars[ 'responsive-zoom' ] ){
			echo '<meta name="viewport" content="width=device-width, initial-scale=1" />';
		} else {
			echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />';
		}

	}//var_dump($xoTheme->template->_tpl_vars);
	if( isset( $xoTheme->template->_tpl_vars['xoops_meta_keywords'] ) ){
		$keywords = $xoTheme->template->_tpl_vars['xoops_meta_keywords'];
	}elseif ( $xoTheme->metas['meta']['keywords'] ){
		$keywords = $xoTheme->metas['meta']['keywords'];
	}else{
		$keywords = '';
	}
	if( isset( $xoTheme->template->_tpl_vars['xoops_meta_description'] ) ){
		$description = $xoTheme->template->_tpl_vars['xoops_meta_description'];
	}elseif ( $xoTheme->metas['meta']['description'] ){
		$description = $xoTheme->metas['meta']['description'];
	}else{
		$description = '';
	}
	if( isset( $xoTheme->template->_tpl_vars['xoops_meta_robots'] ) ){
		$robots = $xoTheme->template->_tpl_vars['xoops_meta_robots'];
	}elseif ( $xoTheme->metas['meta']['robots'] ){
		$robots = $xoTheme->metas['meta']['robots'];
	}else{
		$robots = '';
	}
	if( isset( $xoTheme->template->_tpl_vars['xoops_meta_rating'] ) ){
		$rating = $xoTheme->template->_tpl_vars['xoops_meta_rating'];
	}elseif ( $xoTheme->metas['meta']['rating'] ){
		$rating = $xoTheme->metas['meta']['rating'];
	}else{
		$rating = '';
	}
	if( isset( $xoTheme->template->_tpl_vars['xoops_meta_author'] ) ){
		$author = $xoTheme->template->_tpl_vars['xoops_meta_author'];
	}elseif ( $xoTheme->metas['meta']['author'] ){
		$author = $xoTheme->metas['meta']['author'];
	}else{
		$author = '';
	}
?>


<link rel="shortcut icon" href="<?php echo $xoTheme->template->_tpl_vars[ 'favicon-img' ]; ?>" />
<?php if( $xoTheme->template->_tpl_vars['apple-touch-icon'] ): ?>
<link rel="apple-touch-icon" href="<?php echo $xoTheme->template->_tpl_vars[ 'apple-touch-icon' ]; ?>" />
<?php endif; ?>

<meta charset="<?php echo $xoTheme->template->_tpl_vars['xoops_charset']; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="description" content="<?php echo $description; ?>">
<meta name="robots" content="<?php echo $robots; ?>">
<meta name="rating" content="<?php echo $rating; ?>">
<meta name="author" content="<?php echo $author; ?>">
<meta name="generator" content="<?php echo $author; ?>">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->

<!-- Owl Carousel Assets -->
<link href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>js/owl/owl.carousel.css" rel="stylesheet">
<link href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>js/owl/owl.theme.css" rel="stylesheet">

<link href="<?php echo $xoTheme->template->_tpl_vars["xoops_url"] ?>/favicon.ico" rel="shortcut icon">
<link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>css/xoops.css">
<link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>/css/codes.css">
<link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>/css/icomoon.css">
<link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>/css/megamenu.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $xoTheme->template->_tpl_vars["xoops_themecss"] ?>">
<script src="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>js/jquery-1.10.2.js"></script>
<script src="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>js/bootstrap.min.js"></script>

<link rel="stylesheet" id="animations-css"  href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>css/animations.css" type="text/css" media="all" />
<script src="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>js/appear.min.js"></script>
<script src="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>js/animations.js"></script>

<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <script src="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>js/selectivizr-min.js"></script>
<![endif]-->
<script src="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>js/js.js"></script>
<link rel="alternate" type="application/rss+xml" title="" href="<?php echo $xoTheme->template->_tpl_vars["xoops_url"] ?>/backend.php">
	<!-- Sheet CssEXTRA -->
<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>/include/custom-css.php" />
<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>/include/widget-css.css" />
<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>/css/base.css" />
<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>/css/layout.css" />
<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>/css/shortcodes.css" />
<?php mfn_styles() ?>
<?php mfn_styles_background() ?>
<?php mfn_styles_dynamic() ?>
<?php mfn_scripts() ?>
<?php echo $xoTheme->template->_tpl_vars['xoops_module_header']; ?>
<script src="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>js/theia-sticky-sidebar.js">  </script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".column_Blockcolumn").theiaStickySidebar({
			additionalMarginTop: 50
		});
	});
</script>
<title>
<?php if ($xoTheme->template->_tpl_vars['xoops_pagetitle'] != ''): ?><?php echo $xoTheme->template->_tpl_vars['xoops_pagetitle']; ?>
 : <?php endif; ?><?php echo $xoTheme->template->_tpl_vars['xoops_sitename']; ?>
</title>

</head>

<!-- body -->
<body class="<?php echo body_class(); ?>">
<?php if( $xoTheme->template->_tpl_vars[ 'preloader' ] == '1' ){ ?>
<?php echo $xoTheme->template->_tpl_vars[ 'preloadercode' ]; ?>
<?php } ?>
<?php if( $xoTheme->template->_tpl_vars[ 'nicescrollactive' ] == '1' ){ ?>
<?php echo $xoTheme->template->_tpl_vars[ 'nicescroll' ]; ?>
<?php } ?>
<?php if( $xoTheme->template->_tpl_vars[ 'scrolltopactive' ] == '1' ){ ?>
<?php echo $xoTheme->template->_tpl_vars[ 'scrolltop' ]; ?>
<?php } ?>

	<?php include( XOOPS_ROOT_PATH . "/themes/themebuilder1/include/header/header-sliding-area.php" ); ?>

	<?php if( mfn_header_style( true ) == 'header-creative' ) include( XOOPS_ROOT_PATH . "/themes/themebuilder1/include/header/header-creative.php" ); ?>

	<!-- #Wrapper -->
	<div id="Wrapper">

		<?php
			// Featured Image | Parallax ----------
			$header_style = '';
			//var_dump($xoTheme);

			if( $xoTheme->template->_tpl_vars[ 'img-subheader-attachment' ] == 'parallax' ){

				if( $xoTheme->template->_tpl_vars[ 'parallax' ] == 'stellar' ){
					$header_style = ' class="bg-parallax" data-stellar-background-ratio="0.5"';
				} else {
					$header_style = ' class="bg-parallax" data-enllax-ratio="0.3"';
				}

			}
		?>

		<?php if( mfn_header_style( true ) == 'header-below' ) echo mfn_slider(); ?>

		<!-- #Header_bg -->
		<div id="Header_wrapper" <?php echo $header_style; ?>>

			<!-- #Header -->
			<?php
				/*if( has_action( 'mfn_header' ) ){

					// action: mfn_header | for future use
					do_action( 'mfn_header' );

				} else {*/

					echo '<header id="Header">';
						if( mfn_header_style( true ) != 'header-creative' ){
							//get_template_part( 'includes/header', 'top-area' );
							include( XOOPS_ROOT_PATH . "/themes/themebuilder1/include/header/header-top-area.php" );
						}
						if( mfn_header_style( true ) != 'header-below' ){
							echo mfn_slider();
						}
					echo '</header>';

				//}
			?>

			<?php
				if( ( $xoTheme->template->_tpl_vars['subheader'] != 'all' ) ){


					$subheader_advanced = $xoTheme->template->_tpl_vars[ 'subheader-advanced' ];

					$subheader_style = '';

					if( $xoTheme->template->_tpl_vars[ 'subheader-padding' ] ){
						$subheader_style .= 'padding:'. $xoTheme->template->_tpl_vars[ 'subheader-padding' ] .';';
					}


/*					if( is_search() ){
						// Page title -------------------------

						echo '<div id="Subheader" style="'. $subheader_style .'">';
							echo '<div class="container">';
								echo '<div class="column one">';

									if( trim( $_GET['s'] ) ){
										global $wp_query;
										$total_results = $wp_query->found_posts;
									} else {
										$total_results = 0;
									}

									$translate['search-results'] = mfn_opts_get('translate') ? mfn_opts_get('translate-search-results','results found for:') : __('results found for:','betheme');
									echo '<h1 class="title">'. $total_results .' '. $translate['search-results'] .' '. esc_html( $_GET['s'] ) .'</h1>';

								echo '</div>';
							echo '</div>';
						echo '</div>';


					} else*/if( /*! mfn_slider_isset() || (*/ is_array( $subheader_advanced ) && isset( $subheader_advanced['slider-show'] ) /*)*/ ){
						// Page title -------------------------


						// Subheader | Options
						$subheader_options = $xoTheme->template->_tpl_vars[ 'subheader' ];


						/*if( is_home() && ! get_option( 'page_for_posts' ) && ! mfn_opts_get( 'blog-page' ) ){
							$subheader_show = false;
						} else*/if( is_array( $subheader_options ) && isset( $subheader_options[ 'hide-subheader' ] ) ){
							$subheader_show = false;
						//} elseif( get_post_meta( mfn_ID(), 'mfn-post-hide-title', true ) ){
						//	$subheader_show = false;
						} else {
							$subheader_show = true;
						}


						// title
						if( is_array( $subheader_options ) && isset( $subheader_options[ 'hide-title' ] ) ){
							$title_show = false;
						} else {
							$title_show = true;
						}


						// breadcrumbs
						if( is_array( $subheader_options ) && isset( $subheader_options[ 'hide-breadcrumbs' ] ) ){
							$breadcrumbs_show = false;
						} else {
							$breadcrumbs_show = true;
						}

						if( is_array( $subheader_advanced ) && isset( $subheader_advanced[ 'breadcrumbs-link' ] ) ){
							$breadcrumbs_link = 'has-link';
						} else {
							$breadcrumbs_link = 'no-link';
						}


						// Subheader | Print
						if( $subheader_show ){
							echo '<div id="Subheader" style="'. $subheader_style .'">';
								echo '<div class="container">';
									echo '<div class="column one">';

										// Title
										if( $title_show ){
											$title_tag = $xoTheme->template->_tpl_vars[ 'subheader-title-tag' ];
											echo '<'. $title_tag .' class="title">'. ( $xoTheme->template->_tpl_vars['xoops_pagetitle'] != '' ?  $xoTheme->template->_tpl_vars['xoops_pagetitle']  :   $xoTheme->template->_tpl_vars['xoops_sitename'] ) .'</'. $title_tag .'>';
											 
										}

										// Breadcrumbs
										if( $breadcrumbs_show ){
											mfn_breadcrumbs( $breadcrumbs_link );
										}

									echo '</div>';
								echo '</div>';
							echo '</div>';
						}

					}


				}
			?>

		</div>

		<?php
			// Single Post | Template: Intro
			//if( get_post_meta( mfn_ID(), 'mfn-post-template', true ) == 'intro' ){
				//get_template_part( 'includes/header', 'single-intro' );
			//}
		?>

		<?php //do_action( 'mfn_hook_content_before' );

// Omit Closing PHP Tags
