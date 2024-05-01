<?php
// body classes ---------------------------------
if (!function_exists('mfn_body_classes')) {
    function mfn_body_classes()
    {
        global $xoTheme;
        // Skin -----------------------------------------------
        $classes = 'color-' . $xoTheme->template->_tpl_vars['skin'];

        // Style | Default & Simple ---------------------------
        $classes .= ' style-' . $xoTheme->template->_tpl_vars['style'];

        // Button | Style -------------------------------------
        $classes .= ' button-' . $xoTheme->template->_tpl_vars['button-style'];

        // Layout | Full Width & Boxed ------------------------
        $classes .= ' layout-' . $xoTheme->template->_tpl_vars['layout'];

        // One Page -------------------------------------------

        // Nice Scroll ----------------------------------------
        if ($xoTheme->template->_tpl_vars['nice-scroll'] == '1') {
            $classes .= ' nice-scroll-on';
        }

        // Image Frame | Style --------------------------------
        if ($xoTheme->template->_tpl_vars['image-frame-style']) {
            $classes .= ' if-' . $xoTheme->template->_tpl_vars['image-frame-style'];
        }

        // Image Frame | Border -------------------------------
        if ($xoTheme->template->_tpl_vars['image-frame-border']) {
            $classes .= ' if-border-' . $xoTheme->template->_tpl_vars['image-frame-border'];
        }

        // Image Frame | Caption -------------------------------
        if ($xoTheme->template->_tpl_vars['image-frame-caption']) {
            $classes .= ' if-caption-on';
        }

        // Content Padding ------------------------------------
        if ($xoTheme->template->_tpl_vars['content-remove-padding']) {
            $classes .= ' no-content-padding';
        }

        // Single Template ------------------------------------

        // Love -----------------------------------------------

        // Table Hover ----------------------------------------
        if ($xoTheme->template->_tpl_vars['table-hover']) {
            $classes .= ' table-' . $xoTheme->template->_tpl_vars['table-hover'];
        }

        // Contact Form 7 | Form Error ------------------------
        if ($xoTheme->template->_tpl_vars['cf7-error']) {
            $classes .= ' cf7p-' . $xoTheme->template->_tpl_vars['cf7-error'];
        }

        // Advanced | Other
        $layout_options = $xoTheme->template->_tpl_vars['layout-options'];
        if (is_array($layout_options)) {
            if (isset($layout_options['no-shadows'])) {
                $classes .= ' no-shadows';
            }
            if (isset($layout_options['boxed-no-margin'])) {
                $classes .= ' boxed-no-margin';
            }
        }

        // Header =============================================

        $header_options = $xoTheme->template->_tpl_vars['header-fw'] ?: false;

        // Header | Layout --------------------------
        //$classes .= mfn_header_style();

        // Header | Full Width ----------------------
        if (isset($header_options['full-width'])) {
            $classes .= ' header-fw';
        }

        // Header | Boxed ---------------------------
        if (is_array($header_options) && isset($header_options['header-boxed'])) {
            $classes .= ' header-boxed';
        }

        // Header | Minimalist ----------------------
        if ($xoTheme->template->_tpl_vars['minimalist-header'] == 'no') {
            $classes .= ' minimalist-header-no';
        } elseif ($xoTheme->template->_tpl_vars['minimalist-header']) {
            $classes .= ' minimalist-header';
        }

        // Header | Sticky --------------------------
        if ($xoTheme->template->_tpl_vars['sticky-header']) {
            $classes .= ' sticky-header';
        }

        // Header Sticky Style ----------------------
        $classes .= ' sticky-' . $xoTheme->template->_tpl_vars['sticky-header-style'];

        // Action Bar -------------------------------
        if ($xoTheme->template->_tpl_vars['action-bar']) {
            $classes .= ' ab-show';
        } else {
            $classes .= ' ab-hide';
        }

        // Subheader | Transparent ------------------
        $skin = $xoTheme->template->_tpl_vars['skin'];
        if (!in_array($skin, ['custom', 'one'])) {
            if ($xoTheme->template->_tpl_vars['subheader-transparent'] != 100) {
                $classes .= ' subheader-transparent';
            }
        }

        // Subheader | Style ------------------------
        $classes .= ' subheader-' . $xoTheme->template->_tpl_vars['subheader-style'];

        // Menu | Style -----------------------------
        if ($xoTheme->template->_tpl_vars['menu-style']) {
            $classes .= ' menu-' . $xoTheme->template->_tpl_vars['menu-style'];
        }

        // Menu | Options ---------------------------
        $menu_options = $xoTheme->template->_tpl_vars['menu-options'];
        if (is_array($menu_options) && isset($menu_options['align-right'])) {
            $classes .= ' menuo-right';
        }
        if (is_array($menu_options) && isset($menu_options['menu-arrows'])) {
            $classes .= ' menuo-arrows';
        }
        if (is_array($menu_options) && isset($menu_options['hide-borders'])) {
            $classes .= ' menuo-no-borders';
        }
        if (is_array($menu_options) && isset($menu_options['submenu-active'])) {
            $classes .= ' menuo-sub-active';
        }
        if (is_array($menu_options) && isset($menu_options['submenu-limit'])) {
            $classes .= ' menuo-sub-limit';
        }
        if (is_array($menu_options) && isset($menu_options['last'])) {
            $classes .= ' menuo-last';
        }

        // Mega Menu | Style -----------------------------
        if ($xoTheme->template->_tpl_vars['menu-mega-style']) {
            $classes .= ' mm-' . $xoTheme->template->_tpl_vars['menu-mega-style'];
        }

        // Logo | Options ---------------------------
        if ($xoTheme->template->_tpl_vars['logo-vertical-align']) {
            $classes .= ' logo-valign-' . $xoTheme->template->_tpl_vars['logo-vertical-align'];
        }

        $logo_options = $xoTheme->template->_tpl_vars['logo-advanced'];
        if (is_array($logo_options) && isset($logo_options['no-margin'])) {
            $classes .= ' logo-no-margin';
        }
        if (is_array($logo_options) && isset($logo_options['overflow'])) {
            $classes .= ' logo-overflow';
        }
        if (is_array($logo_options) && isset($logo_options['no-sticky-padding'])) {
            $classes .= ' logo-no-sticky-padding';
        }

        // Footer ===================================================

        // footer | Style ---------------------------
        if ($xoTheme->template->_tpl_vars['footer-style']) {
            $classes .= ' footer-' . $xoTheme->template->_tpl_vars['footer-style'];
        }

        // footer | Copy & Social -------------------
        if ($xoTheme->template->_tpl_vars['footer-hide'] == 'center') {
            $classes .= ' footer-copy-center';
        }

        // Responsive ===============================================

        if (!$xoTheme->template->_tpl_vars['responsive']) {
            $classes .= ' responsive-off';
        }

        if ($xoTheme->template->_tpl_vars['responsive-boxed2fw']) {
            $classes .= ' boxed2fw';
        }
        if ($xoTheme->template->_tpl_vars['no-hover']) {
            $classes .= ' no-hover-' . $xoTheme->template->_tpl_vars['no-hover'];
        }
        if ($xoTheme->template->_tpl_vars['no-section-bg']) {
            $classes .= ' no-section-bg-' . $xoTheme->template->_tpl_vars['no-section-bg'];
        }
        if ($xoTheme->template->_tpl_vars['responsive-top-bar']) {
            $classes .= ' mobile-tb-' . $xoTheme->template->_tpl_vars['responsive-top-bar'];
        }
        if ($xoTheme->template->_tpl_vars['responsive-mobile-menu']) {
            $classes .= ' mobile-' . $xoTheme->template->_tpl_vars['responsive-mobile-menu'];
        }
        if ($xoTheme->template->_tpl_vars['mobile-menu']) {
            $classes .= ' mobile-menu';
        }

        $classes .= ' mobile-mini-' . $xoTheme->template->_tpl_vars['responsive-header-minimal'];

        // responsive | tablet | options
        $responsive_header_mob = $xoTheme->template->_tpl_vars['responsive-header-tablet'];
        if (is_array($responsive_header_mob)) {
            if (isset($responsive_header_mob['sticky'])) {
                $classes .= ' tablet-sticky';
            }
        }

        // responsive | mobile | options
        $responsive_header_mob = $xoTheme->template->_tpl_vars['responsive-header-mobile'];
        if (is_array($responsive_header_mob)) {
            if (isset($responsive_header_mob['minimal'])) {
                $classes .= ' mobile-header-mini';
            }
            if (isset($responsive_header_mob['sticky'])) {
                $classes .= ' mobile-sticky';
            }
            if (isset($responsive_header_mob['transparent'])) {
                $classes .= ' mobile-tr-header';
            }
        }

        // Transparent ==============================================

        $transparent_options = $xoTheme->template->_tpl_vars['transparent'];
        if (is_array($transparent_options)) {
            if (isset($transparent_options['header'])) {
                $classes .= ' tr-header';
            }
            if (isset($transparent_options['menu'])) {
                $classes .= ' tr-menu';
            }
            if (isset($transparent_options['content'])) {
                $classes .= ' tr-content';
            }
            if (isset($transparent_options['footer'])) {
                $classes .= ' tr-footer';
            }
        }

        // demo / debug =============================================

        return $classes;
    }
}

// header style ---------------------------------
if (!function_exists('mfn_header_style')) {
    function mfn_header_style($firstPartOnly = false)
    {
        global $xoTheme;
        $header_layout = false;

        if ($xoTheme->template->_tpl_vars['header-style']) {
            $header_layout = $xoTheme->template->_tpl_vars['header-style'];
        }

        if (strpos((string) $header_layout, ',')) {
            // multiple header parameters
            $a_header_layout = explode(',', (string) $header_layout);

            // return only First Parameter
            if ($firstPartOnly) {
                return 'header-' . $a_header_layout[0];
            }

            foreach ((array)$a_header_layout as $key => $val) {
                $a_header_layout[$key] = 'header-' . $val;
            }
            $header = implode(' ', $a_header_layout);
        } else {
            // one parameter
            $header = 'header-' . $header_layout;
        }

        return $header;
    }
}

/* ---------------------------------------------------------------------------
 * Fonts | Selected in Theme Options
 * --------------------------------------------------------------------------- */
if (!function_exists('mfn_fonts_selected')) {
    function mfn_fonts_selected()
    {
        $fonts = [];

        $fonts['content']       = $xoTheme->template->_tpl_vars['font-content'];
        $fonts['menu']          = $xoTheme->template->_tpl_vars['font-menu'];
        $fonts['title']         = $xoTheme->template->_tpl_vars['font-title'];
        $fonts['headings']      = $xoTheme->template->_tpl_vars['font-headings'];
        $fonts['headingsSmall'] = $xoTheme->template->_tpl_vars['font-headings-small'];
        $fonts['blockquote']    = $xoTheme->template->_tpl_vars['font-blockquote'];
        $fonts['decorative']    = $xoTheme->template->_tpl_vars['font-decorative'];

        return $fonts;
    }
}

/* ---------------------------------------------------------------------------
 * Styles
 * --------------------------------------------------------------------------- */
if (!function_exists('mfn_styles')) {
    function mfn_styles()
    {
        global $xoTheme;
        $theme_disable = $xoTheme->template->_tpl_vars['theme-disable'];

        // wp_enqueue_style ------------------------------------------------------
        /*wp_enqueue_style( 'style', get_stylesheet_uri(), false, THEME_VERSION );

        wp_enqueue_style( 'mfn-base', THEME_URI .'/css/base.css', false, THEME_VERSION );
        wp_enqueue_style( 'mfn-layout', THEME_URI .'/css/layout.css', false, THEME_VERSION );
        wp_enqueue_style( 'mfn-shortcodes', THEME_URI .'/css/shortcodes.css', false, THEME_VERSION );*/

        // plugins
        if (!isset($theme_disable['entrance-animations'])) {
            //wp_enqueue_style( 'mfn-animations',	THEME_URI .'/assets/animations/animations.min.css', false, THEME_VERSION );
            echo '<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . '/assets/animations/animations.min.css" />';
        }

        //wp_enqueue_style( 'mfn-jquery-ui', THEME_URI .'/assets/ui/jquery.ui.all.css', false, THEME_VERSION );
        //wp_enqueue_style( 'mfn-jplayer', THEME_URI .'/assets/jplayer/css/jplayer.blue.monday.css', false, THEME_VERSION );

        // rtl | demo -----
        //if( $_GET && key_exists( 'mfn-rtl', $_GET ) ){
        //	wp_enqueue_style( 'mfn-rtl', THEME_URI .'/rtl.css', false, THEME_VERSION );
        //}

        // Responsive -------------------------------------------------------------
        if ($xoTheme->template->_tpl_vars['responsive']) {
            //wp_enqueue_style( 'mfn-responsive', THEME_URI .'/css/responsive.css', false, THEME_VERSION );
            echo '<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . '/assets/responsive.css" />';
        } else {
            //wp_enqueue_style( 'mfn-responsive-off', THEME_URI .'/css/responsive-off.css', false, THEME_VERSION );
            echo '<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . '/assets/responsive-off.css" />';
        }

        // Custom Theme Options styles --------------------------------------------
        if ($xoTheme->template->_tpl_vars['static-css']) {
            //wp_enqueue_style( 'mfn-style-static', THEME_URI .'/style-static.css', false, THEME_VERSION );
            echo '<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . '/assets/style-static.css" />';
        } else {
            // Predefined Skins

            $skin = $xoTheme->template->_tpl_vars['skin'];

            if ($skin != 'custom' && $skin != 'one') {
                // Predefined Skins
                //wp_enqueue_style( 'mfn-skin-'. $skin, THEME_URI .'/css/skins/'. $skin .'/style.css', false, THEME_VERSION );
                echo '<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . '/css/skins/' . $skin . '/style.css" />';
            }
        }

        // Google Fonts ----------------------------------------------------------
        //$google_fonts = mfn_fonts( 'all' );

        // subset
        $subset = $xoTheme->template->_tpl_vars['font-subset'];
        if ($subset) {
            $subset = '&amp;subset=' . str_replace(' ', '', (string) $subset);
        }

        // style & weight
        if ($weight = $xoTheme->template->_tpl_vars['font-weight']) {
            $weight = ':' . implode(',', $weight);
        }

        $fonts = mfn_fonts_selected();
        foreach ($fonts as $font) {
            if (in_array($font, $google_fonts)) {
                // Google Fonts
                $font_slug = str_replace(' ', '+', (string) $font);
                wp_enqueue_style($font_slug, 'https://fonts.googleapis.com/css?family=' . $font_slug . $weight . $subset);
            }
        }
    }
}




?><!DOCTYPE html>
<html <?php /*language_attributes();*/ ?> class="no-js<?php /*esc_attr_e( mfn_user_os() );*/ ?>" <?php /*mfn_tag_schema();*/ ?>>


<!-- head -->
<head>

    <!-- meta -->
    <meta charset="<?php /*bloginfo( 'charset' );*/ ?>"/>
    <?php
    if ($xoTheme->template->_tpl_vars['responsive']) {
        if ($xoTheme->template->_tpl_vars['responsive-zoom']) {
            echo '<meta name="viewport" content="width=device-width, initial-scale=1" />';
        } else {
            echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />';
        }
    }
    ?>


    <link rel="shortcut icon" href="<?php echo $xoTheme->template->_tpl_vars['favicon-img']; ?>"/>
    <?php if ($xoTheme->template->_tpl_vars['apple-touch-icon']): ?>
        <link rel="apple-touch-icon" href="<?php echo $xoTheme->template->_tpl_vars['apple-touch-icon']; ?>"/>
    <?php endif; ?>

    <meta charset="<?php echo $xoTheme->template->_tpl_vars["xoops_charset"] ?>">
    <meta name="keywords" content="<?php echo $xoTheme->metas['meta']['keywords'] ?>">
    <meta name="description" content="<?php echo $xoTheme->metas['meta']['description'] ?>">
    <meta name="robots" content="<?php echo $xoTheme->metas['meta']['robots'] ?>">
    <meta name="rating" content="<?php echo $xoTheme->metas['meta']['rating'] ?>">
    <meta name="author" content="<?php echo $xoTheme->metas['meta']['author'] ?>">
    <meta name="generator" content="XOOPS">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    <link rel="stylesheet" id="animations-css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>css/animations.css" type="text/css" media="all"/>
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
    <!-- <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>/include/custom-css.php" /> -->
    <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>/include/widget-css.css"/>
    <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>/css/base.css"/>
    <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>/css/layout.css"/>
    <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>/css/shortcodes.css"/>
    <?php mfn_styles() ?>

    <title>

    </title>


</head>

<!-- body -->
<body class="<?php echo mfn_body_classes(); ?>">


<?php /*get_template_part( 'includes/header', 'sliding-area' );*/ ?>

<?php /*if( mfn_header_style( true ) == 'header-creative' ) get_template_part( 'includes/header', 'creative' );*/ ?>

<!-- #Wrapper -->
<div id="Wrapper">

    <?php
    // Featured Image | Parallax ----------
    $header_style = '';

    if ($xoTheme->template->_tpl_vars['img-subheader-attachment'] == 'parallax') {
        if ($xoTheme->template->_tpl_vars['parallax'] == 'stellar') {
            $header_style = ' class="bg-parallax" data-stellar-background-ratio="0.5"';
        } else {
            $header_style = ' class="bg-parallax" data-enllax-ratio="0.3"';
        }
    }
    ?>

    <?php /*if( mfn_header_style( true ) == 'header-below' ) echo mfn_slider();*/ ?>

    <!-- #Header_bg -->
    <div id="Header_wrapper" <?php echo $header_style; ?>>

        <!-- #Header -->
        <?php
        /*if( has_action( 'mfn_header' ) ){

            // action: mfn_header | for future use
            do_action( 'mfn_header' );

        } else {*/

        echo '<header id="Header">';
        if (mfn_header_style(true) != 'header-creative') {
            ////get_template_part( 'includes/header', 'top-area' );
            ////////////////
            ?>
            <?php if ($xoTheme->template->_tpl_vars['action-bar']): ?>
                <div id="Action_bar">
                    <div class="container">
                        <div class="column one">

                            <ul class="contact_details">
                                <?php
                                if ($header_slogan = $xoTheme->template->_tpl_vars['header-slogan']) {
                                    echo '<li class="slogan">' . $header_slogan . '</li>';
                                }
                                if ($header_phone = $xoTheme->template->_tpl_vars['header-phone']) {
                                    echo '<li class="phone"><i class="icon-phone"></i><a href="tel:' . str_replace(' ', '', (string) $header_phone) . '">' . $header_phone . '</a></li>';
                                }
                                if ($header_phone_2 = $xoTheme->template->_tpl_vars['header-phone-2']) {
                                    echo '<li class="phone"><i class="icon-phone"></i><a href="tel:' . str_replace(' ', '', (string) $header_phone_2) . '">' . $header_phone_2 . '</a></li>';
                                }
                                if ($header_email = $xoTheme->template->_tpl_vars['header-email']) {
                                    echo '<li class="mail"><i class="icon-mail-line"></i><a href="mailto:' . $header_email . '">' . $header_email . '</a></li>';
                                }
                                ?>
                            </ul>

                            <?php
                            /*if( has_nav_menu( 'social-menu' ) ){
                                mfn_wp_social_menu();
                            } else {
                                get_template_part( 'includes/include', 'social' );
                            }*/
                            $target = $xoTheme->template->_tpl_vars['social-target'] ? 'target="_blank"' : false;

                            echo '<ul class="social">';

                            if ($xoTheme->template->_tpl_vars['social-skype']) {
                                echo '<li class="skype"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-skype'] . '" title="Skype"><i class="icon-skype"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-whatsapp']) {
                                echo '<li class="whatsapp"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-whatsapp'] . '" title="WhatsApp"><i class="icon-whatsapp"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-facebook']) {
                                echo '<li class="facebook"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-facebook'] . '" title="Facebook"><i class="icon-facebook"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-googleplus']) {
                                echo '<li class="googleplus"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-googleplus'] . '" title="Google+"><i class="icon-gplus"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-twitter']) {
                                echo '<li class="twitter"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-twitter'] . '" title="Twitter"><i class="icon-twitter"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-vimeo']) {
                                echo '<li class="vimeo"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-vimeo'] . '" title="Vimeo"><i class="icon-vimeo"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-youtube']) {
                                echo '<li class="youtube"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-youtube'] . '" title="YouTube"><i class="icon-play"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-flickr']) {
                                echo '<li class="flickr"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-flickr'] . '" title="Flickr"><i class="icon-flickr"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-linkedin']) {
                                echo '<li class="linkedin"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-linkedin'] . '" title="LinkedIn"><i class="icon-linkedin"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-pinterest']) {
                                echo '<li class="pinterest"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-pinterest'] . '" title="Pinterest"><i class="icon-pinterest"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-dribbble']) {
                                echo '<li class="dribbble"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-dribbble'] . '" title="Dribbble"><i class="icon-dribbble"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-instagram']) {
                                echo '<li class="instagram"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-instagram'] . '" title="Instagram"><i class="icon-instagram"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-behance']) {
                                echo '<li class="behance"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-behance'] . '" title="Behance"><i class="icon-behance"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-tumblr']) {
                                echo '<li class="tumblr"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-tumblr'] . '" title="Tumblr"><i class="icon-tumblr"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-tripadvisor']) {
                                echo '<li class="tripadvisor"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-tripadvisor'] . '" title="TripAdvisor"><i class="icon-tripadvisor"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-vkontakte']) {
                                echo '<li class="vkontakte"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-vkontakte'] . '" title="VKontakte"><i class="icon-vkontakte"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-viadeo']) {
                                echo '<li class="viadeo"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-viadeo'] . '" title="Viadeo"><i class="icon-viadeo"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-xing']) {
                                echo '<li class="xing"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-xing'] . '" title="Xing"><i class="icon-xing"></i></a></li>';
                            }
                            if ($xoTheme->template->_tpl_vars['social-rss']) {
                                echo '<li class="rss"><a ' . $target . ' href="' . 'rss2_url' . '" title="RSS"><i class="icon-rss"></i></a></li>';
                            }

                            if ($xoTheme->template->_tpl_vars['social-custom-icon'] && $xoTheme->template->_tpl_vars['social-custom-link']) {
                                echo '<li class="custom"><a ' . $target . ' href="' . $xoTheme->template->_tpl_vars['social-custom-link'] . '"><i class="' . $xoTheme->template->_tpl_vars['social-custom-icon'] . '"></i></a></li>';
                            }

                            echo '</ul>';

                            ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            if (mfn_header_style(true) == 'header-overlay') {
                // Overlay ----------
                echo '<div id="Overlay">';
                //mfn_wp_overlay_menu();
                echo '</div>';

                // Button ----------
                echo '<a class="overlay-menu-toggle" href="#">';
                echo '<i class="open icon-menu-fine"></i>';
                echo '<i class="close icon-cancel-fine"></i>';
                echo '</a>';
            }
            ?>

            <!-- .header_placeholder 4sticky  -->
            <div class="header_placeholder"></div>

            <div id="Top_bar" class="loading">

                <div class="container">
                    <div class="column one">

                        <div class="top_bar_left clearfix">

                            <!-- Logo -->
                            <?php /*get_template_part( 'includes/include', 'logo' );*/ ?>
                            <?php

                            if ($logo_text = $xoTheme->template->_tpl_vars['logo-text']) {
                                $logo_class = ' text-logo';
                            } else {
                                $logo_class = false;
                            }

                            echo '<div class="logo' . $logo_class . '">';

                            /*
                             * Options
                             *
                             * - Link to Homepage
                             * - Wrap into H1 tag on Homepage
                             * - Wrap into H1 tag on All other pages
                             */

                            $logo_height  = intval($xoTheme->template->_tpl_vars['logo-height']);
                            $logo_padding = intval($xoTheme->template->_tpl_vars['logo-vertical-padding']);

                            $logo_options = $xoTheme->template->_tpl_vars['logo-link'];
                            $logo_before  = '';
                            $logo_after   = '';

                            // Link

                            if (isset($logo_options['link'])) {
                                $logo_before = '<a id="logo" href="get_home_url" title="get_bloginfoname" data-height="' . $logo_height . '" data-padding="' . $logo_padding . '">';
                                $logo_after  = '</a>';
                            } else {
                                $logo_before = '<span id="logo" data-height="' . $logo_height . '" data-padding="' . $logo_padding . '">';
                                $logo_after  = '</span>';
                            }

                            // H1

                            /*if( is_front_page() ){
                                if( is_array( $logo_options ) && isset( $logo_options['h1-home'] )){

                                    $logo_before = '<h1>'. $logo_before;
                                    $logo_after .= '</h1>';

                                }
                            } else {*/
                            if (is_array($logo_options) && isset($logo_options['h1-all'])) {
                                $logo_before = '<h1>' . $logo_before;
                                $logo_after  .= '</h1>';
                            }
                            //}

                            /*
                             * Source
                             */

                            $logo = [
                                'default' => [
                                    'main'          => '',
                                    'sticky'        => '',
                                    'mobile'        => '',
                                    'mobile-sticky' => '',
                                ],
                                'retina'  => [
                                    'main'          => '',
                                    'sticky'        => '',
                                    'mobile'        => '',
                                    'mobile-sticky' => '',
                                ],
                            ];

                            /*if( $layoutID = mfn_layout_ID() ){

                                // Custom Layout | Layout Options

                                $logo['default']['main']			= get_post_meta( $layoutID, 'mfn-post-logo-img', true );
                                $logo['default']['sticky'] 			= get_post_meta( $layoutID, 'mfn-post-sticky-logo-img', true ) ? get_post_meta( $layoutID, 'mfn-post-sticky-logo-img', true ) : $logo['default']['main'];
                                $logo['default']['mobile'] 			= get_post_meta( $layoutID, 'mfn-post-responsive-logo-img', true ) ? get_post_meta( $layoutID, 'mfn-post-responsive-logo-img', true ) : $logo['default']['main'];
                                $logo['default']['mobile-sticky']	= get_post_meta( $layoutID, 'mfn-post-responsive-sticky-logo-img', true ) ? get_post_meta( $layoutID, 'mfn-post-responsive-sticky-logo-img', true ) : $logo['default']['main'];

                                $logo['retina']['main'] 			= get_post_meta( $layoutID, 'mfn-post-retina-logo-img', true );
                                $logo['retina']['sticky'] 			= get_post_meta( $layoutID, 'mfn-post-sticky-retina-logo-img', true ) ? get_post_meta( $layoutID, 'mfn-post-sticky-retina-logo-img', true ) : $logo['retina']['main'];
                                $logo['retina']['mobile'] 			= get_post_meta( $layoutID, 'mfn-post-responsive-retina-logo-img', true ) ? get_post_meta( $layoutID, 'mfn-post-responsive-retina-logo-img', true ) : $logo['retina']['main'];
                                $logo['retina']['mobile-sticky']	= get_post_meta( $layoutID, 'mfn-post-responsive-sticky-retina-logo-img', true ) ? get_post_meta( $layoutID, 'mfn-post-responsive-sticky-retina-logo-img', true ) : $logo['retina']['main'];

                            } else {*/

                            // Default | Theme Options

                            $logo['default']['main']          = $xoTheme->template->_tpl_vars['logo-img'];
                            $logo['default']['sticky']        = $xoTheme->template->_tpl_vars['sticky-logo-img'] ?: $logo['default']['main'];
                            $logo['default']['mobile']        = $xoTheme->template->_tpl_vars['responsive-logo-img'] ?: $logo['default']['main'];
                            $logo['default']['mobile-sticky'] = $xoTheme->template->_tpl_vars['responsive-sticky-logo-img'] ?: $logo['default']['main'];

                            $logo['retina']['main']          = $xoTheme->template->_tpl_vars['retina-logo-img'];
                            $logo['retina']['sticky']        = $xoTheme->template->_tpl_vars['sticky-retina-logo-img'] ?: $logo['retina']['main'];
                            $logo['retina']['mobile']        = $xoTheme->template->_tpl_vars['responsive-retina-logo-img'] ?: $logo['retina']['main'];
                            $logo['retina']['mobile-sticky'] = $xoTheme->template->_tpl_vars['responsive-sticky-retina-logo-img'] ?: $logo['retina']['main'];
                            //}

                            // SVG width

                            if ($width = $xoTheme->template->_tpl_vars['logo-width']) {
                                $svg   = ' svg';
                                $width = 'width="' . $width . '"';
                            } else {
                                $svg   = false;
                                $width = false;
                            }

                            /*
                             * Print
                             */

                            echo $logo_before;

                            if ($logo_text) {
                                echo $logo_text;
                            } else {
                                foreach ($logo['default'] as $logo_key => $logo_src) {
                                    echo '<img class="logo-' . $logo_key . ' scale-with-grid' . $svg . '" src="' . $logo_src . '" data-retina="' . $logo['retina'][$logo_key] . '" data-height="' . $logo_src . '" alt="' . $logo_src . '" ' . $width . '/>';
                                }
                            }

                            echo $logo_after;

                            echo '</div>';

                            ?>

                            <div class="menu_wrapper">
                                <?php
                                if ((mfn_header_style(true) != 'header-overlay') && ($xoTheme->template->_tpl_vars['menu-style'] != 'hide')) {
                                    // #menu --------------------------
                                    echo '<nav id="menu"><ul id="menu-main-menu" class="menu menu-main"><li id="menu-item-7" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item"><a href="/"><span>Home</span></a></li><li id="menu-item-19" class="menu-item menu-item-type-post_type menu-item-object-page"><a href=""><span>Blog</span></a></li><li id="menu-item-20" class="menu-item menu-item-type-post_type menu-item-object-page"><a href=""><span>Portfolio</span></a></li><li id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page last"><a href=""><span>About</span></a></li><li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page last"><a href=""><span>Contact</span></a></li></ul></nav>';

                                    /*if( in_array( mfn_header_style(), array( 'header-split', 'header-split header-semi', 'header-below header-split' ) ) ){
                                        mfn_wp_split_menu();
                                    } else {
                                        mfn_wp_nav_menu();
                                    }*/

                                    // responsive menu button ---------
                                    $mb_class = '';
                                    if ($xoTheme->template->_tpl_vars['header-menu-mobile-sticky']) {
                                        $mb_class .= ' is-sticky';
                                    }

                                    echo '<a class="responsive-menu-toggle ' . $mb_class . '" href="#">';
                                    if ($menu_text = trim((string) $xoTheme->template->_tpl_vars['header-menu-text'])) {
                                        echo '<span>' . $menu_text . '</span>';
                                    } else {
                                        echo '<i class="icon-menu-fine"></i>';
                                    }
                                    echo '</a>';
                                }
                                ?>
                            </div>

                            <div class="secondary_menu_wrapper">
                                <!-- #secondary-menu -->
                                <?php /*mfn_wp_secondary_menu();*/ ?>
                            </div>

                            <div class="banner_wrapper">
                                <?php echo $xoTheme->template->_tpl_vars['header-banner']; ?>
                            </div>

                            <div class="search_wrapper">
                                <!-- #searchform -->

                                <?php /*get_search_form( true );*/ ?>

                            </div>

                        </div>

                        <?php
                        if (!$xoTheme->template->_tpl_vars['top-bar-right-hide']) {
                            //get_template_part( 'includes/header', 'top-bar-right' );
                        }
                        ?>

                    </div>
                </div>
            </div>

            <?php
            ////////////////
        }
        if (mfn_header_style(true) != 'header-below') {
            //echo mfn_slider();
            echo 'slider';
        }
        echo '</header>';

        /*}*/
        ?>

        <?php
        if (($xoTheme->template->_tpl_vars['subheader'] != 'all') /*&&
					( ! get_post_meta( mfn_ID(), 'mfn-post-hide-title', true ) ) &&
					( get_post_meta( mfn_ID(), 'mfn-post-template', true ) != 'intro' )*/) {
            $subheader_advanced = $xoTheme->template->_tpl_vars['subheader-advanced'];

            $subheader_style = '';

            if ($xoTheme->template->_tpl_vars['subheader-padding']) {
                $subheader_style .= 'padding:' . $xoTheme->template->_tpl_vars['subheader-padding'] . ';';
            }

            /*if( is_search() ){
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


            } elseif( ! mfn_slider_isset() || ( is_array( $subheader_advanced ) && isset( $subheader_advanced['slider-show'] ) ) ){*/
            // Page title -------------------------

            // Subheader | Options
            $subheader_options = $xoTheme->template->_tpl_vars['subheader'];

            /*if( is_home() && ! get_option( 'page_for_posts' ) && ! mfn_opts_get( 'blog-page' ) ){
                $subheader_show = false;
            } elseif( is_array( $subheader_options ) && isset( $subheader_options[ 'hide-subheader' ] ) ){
                $subheader_show = false;
            } elseif( get_post_meta( mfn_ID(), 'mfn-post-hide-title', true ) ){
                $subheader_show = false;
            } else {*/
            $subheader_show = true;
            //}

            // title
            if (is_array($subheader_options) && isset($subheader_options['hide-title'])) {
                $title_show = false;
            } else {
                $title_show = true;
            }

            // breadcrumbs
            if (is_array($subheader_options) && isset($subheader_options['hide-breadcrumbs'])) {
                $breadcrumbs_show = false;
            } else {
                $breadcrumbs_show = true;
            }

            if (is_array($subheader_advanced) && isset($subheader_advanced['breadcrumbs-link'])) {
                $breadcrumbs_link = 'has-link';
            } else {
                $breadcrumbs_link = 'no-link';
            }

            // Subheader | Print
            if ($subheader_show) {
                echo '<div id="Subheader" style="' . $subheader_style . '">';
                echo '<div class="container">';
                echo '<div class="column one">';

                // Title
                if ($title_show) {
                    $title_tag = $xoTheme->template->_tpl_vars['subheader-title-tag'];
                    echo '<' . $title_tag . ' class="title">mfn_page_title()</' . $title_tag . '>';
                }

                // Breadcrumbs
                if ($breadcrumbs_show) {
                    //mfn_breadcrumbs( $breadcrumbs_link );
                    echo $breadcrumbs_link;
                }

                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            //}

        }
        ?>

    </div>

    <?php
    // Single Post | Template: Intro
    /*if( get_post_meta( mfn_ID(), 'mfn-post-template', true ) == 'intro' ){
        get_template_part( 'includes/header', 'single-intro' );
    }*/
    ?>

<?php

// Omit Closing PHP Tags
