<?php
/**
 * Header functions.
 *
 */

/* ---------------------------------------------------------------------------
* Hex 2 rgba
* --------------------------------------------------------------------------- */
if (!function_exists('hex2rgba')) {
    function hex2rgba($hex, $alpha = 1, $echo = false)
    {
        $hex = str_replace("#", "", (string) $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }

        $rgba = 'rgba(' . $r . ', ' . $g . ', ' . $b . ', ' . $alpha . ')';

        if ($echo) {
            echo $rgba;
            return true;
        }

        return $rgba;
    }
}

/* ---------------------------------------------------------------------------
* Is dark color
* --------------------------------------------------------------------------- */
if (!function_exists('mfn_brightness')) {
    function mfn_brightness($hex, $tolerance = 169, $oposite_color = false)
    {
        $hex = str_replace("#", "", (string) $hex);

        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        $brightness = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;

        if ($brightness > $tolerance) {
            $brightness = 'light';
        } else {
            $brightness = 'dark';
        }

        if ($oposite_color) {
            if ($brightness == 'light') {
                $brightness = 'black';
            } else {
                $brightness = 'white';
            }
        }

        return $brightness;
    }
}

/* ---------------------------------------------------------------------------
 * Title
 * --------------------------------------------------------------------------- */
if (!function_exists('mfn_title')) {
    function mfn_title($title)
    {
        if (mfn_opts_get('mfn-seo') && mfn_ID()) {
            if (trim((string) get_post_meta(mfn_ID(), 'mfn-meta-seo-title', true))) {
                $title = esc_html(get_post_meta(mfn_ID(), 'mfn-meta-seo-title', true));
            }
        }

        return $title;
    }
}

/* ---------------------------------------------------------------------------
 * Built-in SEO Fields
 * --------------------------------------------------------------------------- */
if (!function_exists('mfn_seo')) {
    function mfn_seo()
    {
        if (mfn_opts_get('mfn-seo')) {
            // description
            if (mfn_ID() && get_post_meta(mfn_ID(), 'mfn-meta-seo-description', true)) {
                echo '<meta name="description" content="' . stripslashes((string) get_post_meta(mfn_ID(), 'mfn-meta-seo-description', true)) . '" />' . "\n";
            } elseif (mfn_opts_get('meta-description')) {
                echo '<meta name="description" content="' . stripslashes((string) mfn_opts_get('meta-description')) . '" />' . "\n";
            }

            // keywords
            if (mfn_ID() && get_post_meta(mfn_ID(), 'mfn-meta-seo-keywords', true)) {
                echo '<meta name="keywords" content="' . stripslashes((string) get_post_meta(mfn_ID(), 'mfn-meta-seo-keywords', true)) . '" />' . "\n";
            } elseif (mfn_opts_get('meta-keywords')) {
                echo '<meta name="keywords" content="' . stripslashes((string) mfn_opts_get('meta-keywords')) . '" />' . "\n";
            }

            // og:image
            if (mfn_ID() && get_post_meta(mfn_ID(), 'mfn-meta-seo-og-image', true)) {
                echo '<meta property="og:image" content="' . stripslashes((string) get_post_meta(mfn_ID(), 'mfn-meta-seo-og-image', true)) . '" />' . "\n";
            } elseif (mfn_opts_get('mfn-seo-og-image')) {
                echo '<meta property="og:image" content="' . stripslashes((string) mfn_opts_get('mfn-seo-og-image')) . '" />' . "\n";
            }

            // hreflang | only if WMPL is not active
            if (!function_exists('icl_object_id')) {
                $format_locale = strtolower(str_replace('_', '-', (string) get_locale()));
                echo '<link rel="alternate" hreflang="' . $format_locale . '" href="' . get_permalink() . '" />' . "\n";
            }
        }

        // google analytics
        if (mfn_opts_get('google-analytics')) {
            mfn_opts_show('google-analytics');
        }

        // facebook pixel
        if (mfn_opts_get('facebook-pixel')) {
            echo "\n";
            mfn_opts_show('facebook-pixel');
        }
    }
}

/* ---------------------------------------------------------------------------
 * Google Remarketing Code
 * --------------------------------------------------------------------------- */
if (!function_exists('mfn_google_remarketing')) {
    function mfn_google_remarketing()
    {
        // google remarketing
        if (mfn_opts_get('google-remarketing')) {
            mfn_opts_show('google-remarketing');
        }
    }
}

/* ---------------------------------------------------------------------------
 * Fonts | Selected in Theme Options
 * --------------------------------------------------------------------------- */
if (!function_exists('mfn_fonts_selected')) {
    function mfn_fonts_selected()
    {
        global $xoTheme;
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
            echo '<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . 'css/animations.css" />';
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
            echo '<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . '/css/responsive.css" />';
        } else {
            //wp_enqueue_style( 'mfn-responsive-off', THEME_URI .'/css/responsive-off.css', false, THEME_VERSION );
            echo '<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . '/css/responsive-off.css" />';
        }

        // Custom Theme Options styles --------------------------------------------
        if ($xoTheme->template->_tpl_vars['static-css']) {
            //wp_enqueue_style( 'mfn-style-static', THEME_URI .'/style-static.css', false, THEME_VERSION );
            echo '<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . '/css/style-static.css" />';
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
        include(XOOPS_ROOT_PATH . "/modules/system/admin/themebuilder1/options/fonts.php");
        $google_fonts = mfn_fonts('all');

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
                //wp_enqueue_style( $font_slug, 'https://fonts.googleapis.com/css?family='. $font_slug . $weight . $subset );
                echo '<link href="https://fonts.googleapis.com/css?family=' . $font_slug . $weight . $subset . '" rel="stylesheet" type="text/css">';
            }
        }
    }
}

/* ---------------------------------------------------------------------------
 * Styles | Custom Font
 * --------------------------------------------------------------------------- */
if (!function_exists('mfn_styles_custom_font')) {
    function mfn_styles_custom_font()
    {
        if ($font_custom = mfn_opts_get('font-custom')) {
            $font_custom_woff = mfn_opts_get('font-custom-woff');
            $font_custom_ttf  = mfn_opts_get('font-custom-ttf');

            echo '<!-- style | custom font -->' . "\n";
            echo '<style id="mfn-dnmc-font-css">' . "\n";
            echo '@font-face{';
            echo 'font-family:"' . $font_custom . '";';
            echo 'src:';

            if ($font_custom_woff) {
                echo 'url("' . $font_custom_woff . '") format("woff")';
            }
            if ($font_custom_woff && $font_custom_ttf) {
                echo ',';
            }
            if ($font_custom_ttf) {
                echo 'url("' . $font_custom_ttf . '") format("truetype")';
            }
            echo ';';

            echo 'font-weight:normal;';
            echo 'font-style:normal';
            echo '}' . "\n";
            echo '</style>' . "\n";
        }

        if ($font_custom2 = mfn_opts_get('font-custom2')) {
            $font_custom2_woff = mfn_opts_get('font-custom2-woff');
            $font_custom2_ttf  = mfn_opts_get('font-custom2-ttf');

            echo '<!-- style | custom font 2 -->' . "\n";
            echo '<style id="mfn-dnmc-font2-css">' . "\n";
            echo '@font-face{';
            echo 'font-family:"' . $font_custom2 . '";';
            echo 'src:';

            if ($font_custom2_woff) {
                echo 'url("' . $font_custom2_woff . '") format("woff")';
            }
            if ($font_custom2_woff && $font_custom2_ttf) {
                echo ',';
            }
            if ($font_custom2_ttf) {
                echo 'url("' . $font_custom2_ttf . '") format("truetype")';
            }
            echo ';';

            echo 'font-weight:normal;';
            echo 'font-style:normal';
            echo '}' . "\n";
            echo '</style>' . "\n";
        }
    }
}

/* ---------------------------------------------------------------------------
 * Styles | Background
 * --------------------------------------------------------------------------- */
if (!function_exists('mfn_styles_background')) {
    function mfn_styles_background()
    {
        global $xoTheme;
        $output           = '';
        $output_ultrawide = '';

        // HTML ----------------------------

        /*if( $layoutID = mfn_layout_ID() ){
            $htmlB = get_post_meta( $layoutID, 'mfn-post-bg', true );
            $htmlP = get_post_meta( $layoutID, 'mfn-post-bg-pos', true );
        } else {*/
        $htmlB = $xoTheme->template->_tpl_vars['img-page-bg'];
        $htmlP = $xoTheme->template->_tpl_vars['position-page-bg'];
        //}

        if ($htmlB) {
            $aBg   = [];
            $aBg[] = 'background-image:url(' . $htmlB . ')';

            if ($htmlP) {
                $background_attr = explode(';', (string) $htmlP);
                if ($background_attr[0]) {
                    $aBg[] = 'background-repeat:' . $background_attr[0];
                }
                if ($background_attr[1]) {
                    $aBg[] = 'background-position:' . $background_attr[1];
                }
                if ($background_attr[2]) {
                    $aBg[] = 'background-attachment:' . $background_attr[2];
                }
                if ($background_attr[3]) {
                    $aBg[] = 'background-size:' . $background_attr[3];
                } elseif ($xoTheme->template->_tpl_vars['size-page-bg']) {
                    if (in_array($xoTheme->template->_tpl_vars['size-page-bg'], ['cover', 'contain'])) {
                        $aBg[] = 'background-size:' . $xoTheme->template->_tpl_vars['size-page-bg'];
                    } elseif ($xoTheme->template->_tpl_vars['size-page-bg'] == 'cover-ultrawide') {
                        $output_ultrawide .= 'html{background-size:cover}';
                    }
                }
            }
            $background = implode(';', $aBg);

            $output .= 'html{' . $background . '}' . "\n";
        }

        // Header wrapper -----------------------

        $headerB = false;

        if ($xoTheme->template->_tpl_vars['img-subheader-bg']) {
            $headerB = $xoTheme->template->_tpl_vars['img-subheader-bg'];
        }

        /*if( mfn_ID() && ! is_search() ){

            if( ( ( mfn_ID() == get_option( 'page_for_posts' ) ) || ( get_post_type( mfn_ID() ) == 'page' ) ) && has_post_thumbnail( mfn_ID() ) ){

                // Pages & Blog Page ---
                $headerB = wp_get_attachment_image_src( get_post_thumbnail_id( mfn_ID() ), 'full' );
                $headerB = $headerB[0];

            } elseif( get_post_meta( mfn_ID(), 'mfn-post-header-bg', true ) ){

                // Single Post ---
                $headerB = get_post_meta( mfn_ID(), 'mfn-post-header-bg', true );

            }
        }*/

        $headerP = $xoTheme->template->_tpl_vars['img-subheader-attachment'];

        if ($headerB) {
            $aBg   = [];
            $aBg[] = 'background-image:url(' . $headerB . ')';

            if ($headerP == "fixed") {
                $aBg[] = 'background-attachment:fixed';
            } elseif ($headerP == "parallax") {
                // do nothing

            } elseif ($headerP) {
                $background_attr = explode(';', (string) $headerP);
                if ($background_attr[0]) {
                    $aBg[] = 'background-repeat:' . $background_attr[0];
                }
                if ($background_attr[1]) {
                    $aBg[] = 'background-position:' . $background_attr[1];
                }
                if ($background_attr[2]) {
                    $aBg[] = 'background-attachment:' . $background_attr[2];
                }
                if ($background_attr[3]) {
                    $aBg[] = 'background-size:' . $background_attr[3];
                } elseif ($xoTheme->template->_tpl_vars['size-subheader-bg']) {
                    if (in_array($xoTheme->template->_tpl_vars['size-subheader-bg'], ['cover', 'contain'])) {
                        $aBg[] = 'background-size:' . $xoTheme->template->_tpl_vars['size-subheader-bg'];
                    } elseif ($xoTheme->template->_tpl_vars['size-subheader-bg'] == 'cover-ultrawide') {
                        $output_ultrawide .= 'body:not(.template-slider) #Header_wrapper{background-size:cover}';
                    }
                }
            }

            $background = implode(';', $aBg);

            $output .= 'body:not(.template-slider) #Header_wrapper{' . $background . '}' . "\n";
        }

        // Top Bar --------------------------

        $topbarB = $xoTheme->template->_tpl_vars['top-bar-bg-img'];
        $topbarP = $xoTheme->template->_tpl_vars['top-bar-bg-position'];

        if ($topbarB) {
            $aBg   = [];
            $aBg[] = 'background-image:url(' . $topbarB . ')';

            if ($topbarP) {
                $background_attr = explode(';', (string) $topbarP);
                if ($background_attr[0]) {
                    $aBg[] = 'background-repeat:' . $background_attr[0];
                }
                if ($background_attr[1]) {
                    $aBg[] = 'background-position:' . $background_attr[1];
                }
                if ($background_attr[2]) {
                    $aBg[] = 'background-attachment:' . $background_attr[2];
                }
                if ($background_attr[3]) {
                    $aBg[] = 'background-size:' . $background_attr[3];
                } elseif ($xoTheme->template->_tpl_vars['topbar-bg-img-size']) {
                    if (in_array($xoTheme->template->_tpl_vars['topbar-bg-img-size'], ['cover', 'contain'])) {
                        $aBg[] = 'background-size:' . $xoTheme->template->_tpl_vars['topbar-bg-img-size'];
                    }
                }
            }

            $background = implode(';', $aBg);

            $output .= '#Top_bar,#Header_creative{' . $background . '}' . "\n";
        }

        // Subheader -----------------------

        /*if( get_post_meta( mfn_ID(), 'mfn-post-subheader-image', true ) ){
            $subheaderB = get_post_meta( mfn_ID(), 'mfn-post-subheader-image', true );
        } else {*/
        $subheaderB = $xoTheme->template->_tpl_vars['subheader-image'];
        //}

        $subheaderP = $xoTheme->template->_tpl_vars['subheader-position'];

        if ($subheaderB) {
            $aBg   = [];
            $aBg[] = 'background-image:url(' . $subheaderB . ')';

            if ($subheaderP) {
                $background_attr = explode(';', (string) $subheaderP);
                if ($background_attr[0]) {
                    $aBg[] = 'background-repeat:' . $background_attr[0];
                }
                if ($background_attr[1]) {
                    $aBg[] = 'background-position:' . $background_attr[1];
                }
                if ($background_attr[2]) {
                    $aBg[] = 'background-attachment:' . $background_attr[2];
                }
                if ($background_attr[3]) {
                    $aBg[] = 'background-size:' . $background_attr[3];
                } elseif ($xoTheme->template->_tpl_vars['subheader-size']) {
                    if (in_array($xoTheme->template->_tpl_vars['subheader-size'], ['cover', 'contain'])) {
                        $aBg[] = 'background-size:' . $xoTheme->template->_tpl_vars['subheader-size'];
                    } elseif ($xoTheme->template->_tpl_vars['subheader-size'] == 'cover-ultrawide') {
                        $output_ultrawide .= '#Subheader{background-size:cover}';
                    }
                }
            }

            $background = implode(';', $aBg);

            $output .= '#Subheader{' . $background . '}' . "\n";
        }

        // Footer --------------------------

        $footerB = $xoTheme->template->_tpl_vars['footer-bg-img'];
        $footerP = $xoTheme->template->_tpl_vars['footer-bg-img-position'];

        if ($footerB) {
            $aBg   = [];
            $aBg[] = 'background-image:url(' . $footerB . ')';

            if ($footerP) {
                $background_attr = explode(';', (string) $footerP);
                if ($background_attr[0]) {
                    $aBg[] = 'background-repeat:' . $background_attr[0];
                }
                if ($background_attr[1]) {
                    $aBg[] = 'background-position:' . $background_attr[1];
                }
                if ($background_attr[2]) {
                    $aBg[] = 'background-attachment:' . $background_attr[2];
                }
                if ($background_attr[3]) {
                    $aBg[] = 'background-size:' . $background_attr[3];
                } elseif ($xoTheme->template->_tpl_vars['footer-bg-img-size']) {
                    if (in_array($xoTheme->template->_tpl_vars['footer-bg-img-size'], ['cover', 'contain'])) {
                        $aBg[] = 'background-size:' . $xoTheme->template->_tpl_vars['footer-bg-img-size'];
                    } elseif ($xoTheme->template->_tpl_vars['footer-bg-img-size'] == 'cover-ultrawide') {
                        $output_ultrawide .= '#Footer{background-size:cover}';
                    }
                }
            }

            $background = implode(';', $aBg);

            $output .= '#Footer{' . $background . '}' . "\n";
        }

        // Echo ----------------------------

        if ($output) {
            echo '<!-- style | background -->' . "\n";
            echo '<style id="mfn-dnmc-bg-css">' . "\n";

            echo $output;

            if ($output_ultrawide) {
                echo '@media only screen and (min-width: 1921px){' . $output_ultrawide . '}' . "\n";
            }

            echo '</style>' . "\n";
        }
    }
}

/* ---------------------------------------------------------------------------
 * Styles | Minify
 * --------------------------------------------------------------------------- */
if (!function_exists('mfn_styles_minify')) {
    function mfn_styles_minify($css)
    {
        // remove comments
        $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', (string) $css);

        // remove whitespace
        $css = str_replace(["\r\n", "\r", "\n", "\t", '  ', '    ', '    '], '', $css);

        return $css;
    }
}

/* ---------------------------------------------------------------------------
 * Styles | Dynamic
 * --------------------------------------------------------------------------- */
if (!function_exists('mfn_styles_dynamic')) {
    function mfn_styles_dynamic()
    {
        global $xoTheme;
        echo '<!-- style | dynamic -->' . "\n";
        echo '<style id="mfn-dnmc-style-css">' . "\n";

        ob_start();

        if (!$xoTheme->template->_tpl_vars['static-css']) {
            // Dynamic | style.php & ( style-responsive.php || style-colors.php || style-one.php || css/skins/.. )

            // Responsive
            if ($xoTheme->template->_tpl_vars['responsive']) {
                include_once(XOOPS_ROOT_PATH . "/themes/themebuilder1/css/style-responsive.php");
            }

            // Colors

            /*if( $_GET && key_exists( 'mfn-c', $_GET ) ){
                $skin = esc_html( $_GET['mfn-c'] ); // demo
            } elseif( $layoutID = mfn_layout_ID() ) {
                $skin = get_post_meta( $layoutID, 'mfn-post-skin', true );
            } else {*/
            $skin = $xoTheme->template->_tpl_vars['skin'];
            //}

            if ($skin == 'custom') {
                // Custom Skin
                include_once(XOOPS_ROOT_PATH . "/themes/themebuilder1/css/style-colors.php");
            } elseif ($skin == 'one') {
                // One Click Skin Generator
                include_once(XOOPS_ROOT_PATH . "/themes/themebuilder1/css/style-one.php");
            }

            // Style PHP

            include_once(XOOPS_ROOT_PATH . "/themes/themebuilder1/css/style.php");
        }

        $css = ob_get_contents();

        ob_get_clean();

        //echo $css;

        echo mfn_styles_minify($css) . "\n";

        echo '</style>' . "\n";
    }
}

/* ---------------------------------------------------------------------------
 * Styles | Custom Styles
 * --------------------------------------------------------------------------- */
if (!function_exists('mfn_styles_custom')) {
    function mfn_styles_custom()
    {
        // Theme Options > Custom CSS
        if ($custom_css = mfn_opts_get('custom-css')) {
            echo '<!-- style | custom css | theme options -->' . "\n";
            echo '<style id="mfn-dnmc-theme-css">' . "\n";
            echo $custom_css . "\n";
            echo '</style>' . "\n";
        }

        // Page Options > Custom CSS
        if ($custom_css = get_post_meta(mfn_ID(), 'mfn-post-css', true)) {
            echo '<!-- style | custom css | page options -->' . "\n";
            echo '<style id="mfn-dnmc-page-css">' . "\n";
            echo $custom_css . "\n";
            echo '</style>' . "\n";
        }

        // Layouts > Custom Colors
        if ($layoutID = mfn_layout_ID()) {
            $layout_styles = '';

            if (get_post_meta($layoutID, 'mfn-post-background-subheader', true)) {
                $layout_styles .= '#Subheader {background-color: ' . get_post_meta($layoutID, 'mfn-post-background-subheader', true) . ';} ';
            }
            if (get_post_meta($layoutID, 'mfn-post-color-subheader', true)) {
                $layout_styles .= '#Subheader .title {color: ' . get_post_meta($layoutID, 'mfn-post-color-subheader', true) . ';} ';
                $layout_styles .= '#Subheader ul.breadcrumbs li, #Subheader ul.breadcrumbs li a {color: ' . hex2rgba(get_post_meta($layoutID, 'mfn-post-color-subheader', true), .6) . ';} ';
            }

            if ($layout_styles) {
                echo '<!-- style | custom layout -->' . "\n";
                echo '<style id="mfn-dnmc-layout-css">' . "\n";
                echo $layout_styles . "\n";
                echo '</style>' . "\n";
            }
        }

        // Demo - Custom Google Fonts for Homepages
        if ($_GET && key_exists('mfn-f', $_GET)) {
            $font_slug   = str_replace('+', ' ', (string) esc_html($_GET['mfn-f']));
            $font_family = str_replace('+', ' ', $font_slug);

            wp_enqueue_style($font_slug, 'http' . mfn_ssl() . '://fonts.googleapis.com/css?family=' . $font_slug . ':300,400');

            echo '<!-- style | demo -->' . "\n";
            echo '<style id="mfn-dnmc-demo-css">';
            echo 'h1, h2, h3, h4 { font-family: ' . $font_family . ' !important;}';
            echo '</style>' . "\n";
        }
    }
}

/* ---------------------------------------------------------------------------
 * Scripts
 * --------------------------------------------------------------------------- */
if (!function_exists('mfn_scripts')) {
    function mfn_scripts()
    {
        global $xoTheme;
        // scripts config -----------------------------
        mfn_scripts_config();
        //wp_enqueue_script( 'jquery-ui-core', THEME_URI .'/assets/ui/jquery.ui.core.js', array( 'jquery' ), THEME_VERSION, true );
        echo '<script src="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . 'css/assets/ui/js/jquery.ui.core.js"></script>';
        //wp_enqueue_script( 'jquery-ui-widget', THEME_URI .'/assets/ui/jquery.ui.widget.js', array( 'jquery' ), THEME_VERSION, true );
        echo '<script src="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . 'css/assets/ui/js/jquery.ui.widget.js"></script>';
        //wp_enqueue_script( 'jquery-ui-tabs', THEME_URI .'/assets/ui/jquery.ui.tabs.js', array( 'jquery' ), THEME_VERSION, true );
        echo '<script src="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . 'css/assets/ui/js/jquery.ui.tabs.js"></script>';
        /*//wp_enqueue_script( 'jquery-ui-accordion', THEME_URI .'/assets/ui/jquery.ui.accordion.js', array( 'jquery' ), THEME_VERSION, true );
        echo '<script src="'. $xoTheme->template->_tpl_vars["xoops_imageurl"] .'css/assets/ui/js/jquery.ui.accordion.js"></script>';

        *///wp_enqueue_script( 'jquery-plugins', THEME_URI .'/js/plugins.js', array( 'jquery' ), THEME_VERSION, true );
        echo '<script src="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . 'js/plugins.js"></script>';
        //wp_enqueue_script( 'jquery-mfn-menu', THEME_URI .'/js/menu.js', array( 'jquery' ), THEME_VERSION, true );
        echo '<script src="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . 'js/menu.js"></script>';
        /*
                //wp_enqueue_script( 'jquery-animations', THEME_URI .'/assets/animations/animations.min.js', array( 'jquery' ), THEME_VERSION, true );
                echo '<script src="'. $xoTheme->template->_tpl_vars["xoops_imageurl"] .'css/assets/animations/animations.min.js"></script>';
                //wp_enqueue_script( 'jquery-jplayer', THEME_URI .'/assets/jplayer/jplayer.min.js', array( 'jquery' ), THEME_VERSION, true );
                echo '<script src="'. $xoTheme->template->_tpl_vars["xoops_imageurl"] .'css/assets/jplayer/jplayer.min.js"></script>';

                //$parallax = mfn_parallax_plugin();
                $parallax = $xoTheme->template->_tpl_vars[ 'parallax' ];
                if( $parallax == 'translate3d' ){
                    //wp_enqueue_script( 'jquery-mfn-parallax', THEME_URI .'/js/parallax/translate3d.js', array( 'jquery' ), THEME_VERSION, true );
                    //echo '<script src="'. $xoTheme->template->_tpl_vars["xoops_imageurl"] .'js/parallax/translate3d.js"></script>';
                } elseif( $parallax == 'stellar' ){
                    //wp_enqueue_script( 'jquery-stellar', THEME_URI .'/js/parallax/stellar.js', array( 'jquery' ), THEME_VERSION, true );
                    echo '<script src="'. $xoTheme->template->_tpl_vars["xoops_imageurl"] .'js/parallax/stellar.js"></script>';
                }

                if( $xoTheme->template->_tpl_vars[ 'nice-scroll' ] == 'smooth' ){
                    //wp_enqueue_script( 'jquery-smoothscroll', THEME_URI .'/js/parallax/smoothscroll.js', array( 'jquery' ), THEME_VERSION, true );
                    echo '<script src="'. $xoTheme->template->_tpl_vars["xoops_imageurl"] .'js/parallax/smoothscroll.js"></script>';
                }
        */

        //wp_enqueue_script( 'jquery-scripts', THEME_URI .'/js/scripts.js', array( 'jquery' ), THEME_VERSION, true );
        echo '<script src="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . 'js/scripts.js"></script>';
    }
}

/* ---------------------------------------------------------------------------
 * Scripts | Custom JS
* --------------------------------------------------------------------------- */
if (!function_exists('mfn_scripts_custom')) {
    function mfn_scripts_custom()
    {
        if ($custom_js = mfn_opts_get('custom-js')) {
            echo '<!-- script | custom js -->' . "\n";
            echo '<script id="mfn-dnmc-custom-js">' . "\n";
            echo '//<![CDATA[' . "\n";
            echo $custom_js . "\n";
            echo '//]]>' . "\n";
            echo '</script>' . "\n";
        }
    }
}

/* ---------------------------------------------------------------------------
 * Scripts config
* --------------------------------------------------------------------------- */
if (!function_exists('mfn_scripts_config')) {
    function mfn_scripts_config()
    {
        global $xoTheme;
        echo '<!-- script | dynamic -->' . "\n";
        echo '<script id="mfn-dnmc-config-js">' . "\n";
        echo '//<![CDATA[' . "\n";

        // ajax
        /*if( mfn_opts_get( 'love' ) ){
            echo 'window.mfn_ajax = "'. admin_url( 'admin-ajax.php' ) .'";'."\n";
        }*/

        // options
        echo 'window.mfn = {';

        // mobile menu initial width
        echo 'mobile_init:1240,';

        // nice scroll
        echo 'nicescroll:40,';

        // parallax
        //echo 'parallax:"'. mfn_parallax_plugin() .'",';
        echo 'parallax:"' . $xoTheme->template->_tpl_vars['parallax'] . '",';

        // responsive
        echo 'responsive:' . intval($xoTheme->template->_tpl_vars['responsive']) . ',';

        // retina disable
        echo 'retina_js:' . intval($xoTheme->template->_tpl_vars['retina-js']) . '';

        echo '};' . "\n";

        // lightbox
        $aPrettyOptions = $xoTheme->template->_tpl_vars['prettyphoto-options'];

        echo 'window.mfn_lightbox = {';
        if (is_array($aPrettyOptions) && isset($aPrettyOptions['disable'])) {
            echo 'disable:true,';
        } else {
            echo 'disable:false,';
        }
        if (is_array($aPrettyOptions) && isset($aPrettyOptions['disable-mobile'])) {
            echo 'disableMobile:true,';
        } else {
            echo 'disableMobile:false,';
        }
        if (is_array($aPrettyOptions) && isset($aPrettyOptions['title'])) {
            echo 'title:true,';
        } else {
            echo 'title:false,';
        }
        echo '};' . "\n";

        // sliders
        echo 'window.mfn_sliders = {';
        echo 'blog:' . intval($xoTheme->template->_tpl_vars['slider-blog-timeout']) . ',';
        echo 'clients:' . intval($xoTheme->template->_tpl_vars['slider-clients-timeout']) . ',';
        echo 'offer:' . intval($xoTheme->template->_tpl_vars['slider-offer-timeout']) . ',';
        echo 'portfolio:' . intval($xoTheme->template->_tpl_vars['slider-portfolio-timeout']) . ',';
        echo 'shop:' . intval($xoTheme->template->_tpl_vars['slider-shop-timeout']) . ',';
        echo 'slider:' . intval($xoTheme->template->_tpl_vars['slider-slider-timeout']) . ',';
        echo 'testimonials:' . intval($xoTheme->template->_tpl_vars['slider-testimonials-timeout']);
        echo '};' . "\n";

        echo '//]]>' . "\n";
        echo '</script>' . "\n";
    }
}

/* ---------------------------------------------------------------------------
 * Adds classes to the array of body classes.
 * --------------------------------------------------------------------------- */

// header style ---------------------------------
if (!function_exists('mfn_header_style')) {
    function mfn_header_style($firstPartOnly = false)
    {
        $header_layout = false;
        global $xoTheme;

        /*if( $_GET && key_exists( 'mfn-h', $_GET ) ){
            $header_layout = esc_html( $_GET['mfn-h'] ); // demo
        } elseif( $layoutID = mfn_layout_ID() ){
            $header_layout = get_post_meta( $layoutID, 'mfn-post-header-style', true );
        } else*/
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

// sidebar classes ------------------------------
if (!function_exists('mfn_sidebar_classes')) {
    function mfn_sidebar_classes($has_both = false)
    {
        $classes = $both = false;

        if (mfn_ID()) {
            if (get_post_type() == 'page' && mfn_opts_get('single-page-layout')) {
                // Theme Options | Single - Page
                $layout = mfn_opts_get('single-page-layout');
            } elseif (get_post_type() == 'post' && is_single() && mfn_opts_get('single-layout')) {
                // Theme Options | Single - Post
                $layout = mfn_opts_get('single-layout');
            } elseif (get_post_type() == 'portfolio' && is_single() && mfn_opts_get('single-portfolio-layout')) {
                // Theme Options | Single - Portfolio
                $layout = mfn_opts_get('single-portfolio-layout');
            } else {
                // Post Meta
                $layout = get_post_meta(mfn_ID(), 'mfn-post-layout', true);
            }

            switch ($layout) {
                case 'left-sidebar':
                    $classes = ' with_aside aside_left';
                    break;

                case 'right-sidebar':
                    $classes = ' with_aside aside_right';
                    break;

                case 'both-sidebars':
                    $classes = ' with_aside aside_both';
                    $both    = true;
                    break;
            }

            // demo
            if ($_GET && key_exists('mfn-s', $_GET)) {
                if ($_GET['mfn-s']) {
                    $classes = ' with_aside aside_right';
                } else {
                    $classes = false;
                }
            }
        }

        // WooCommerce
        if (function_exists('is_woocommerce')) {
            if (is_woocommerce()) {
                if (!isset($layout) || !$layout) {
                    // BeTheme version < 6.4 | DO NOT DELETE
                    if (is_active_sidebar('shop')) {
                        $classes = ' with_aside aside_right';
                    }
                } elseif ($layout == 'both-sidebars') {
                    // Only one sidebar for shop
                    $classes = ' with_aside aside_right';
                }
            }

            if (function_exists('is_product') && is_product() && mfn_opts_get('shop-sidebar') == 'shop') {
                $classes = false;
            }
        }

        // bbPress
        if (function_exists('is_bbpress') && is_bbpress() && is_active_sidebar('forum')) {
            $classes = ' with_aside aside_right';
        }

        // BuddyPress
        if (function_exists('is_buddypress') && is_buddypress() && is_active_sidebar('buddy')) {
            $classes = ' with_aside aside_right';
        }

        // Easy Digital Downloads
        if ((get_post_type() == 'download') && is_active_sidebar('edd')) {
            $classes = ' with_aside aside_right';
        }

        // Events Calendar
        if (function_exists('tribe_is_month') && is_active_sidebar('events')) {
            if (tribe_is_month() || tribe_is_day() || tribe_is_event() || tribe_is_event_query() || tribe_is_venue()) {
                $classes = ' with_aside aside_right';
            }
        }

        // Page | Search
        if (is_search()) {
            if (is_active_sidebar('mfn-search')) {
                $classes = ' with_aside aside_right';
            } else {
                $classes = false;
            }
        }

        // Page | Blank Page, Under Construction
        if (is_page_template('template-blank.php') || is_page_template('under-construction.php')) {
            $classes = false;
        }

        // check if has both sidebars
        if ($has_both) {
            return $both;
        }

        return $classes;
    }
}

// body classes ---------------------------------
if (!function_exists('body_class')) {
    function body_class()
    {
        global $xoTheme;
        // Layout | Custom
        //$layoutID = mfn_layout_ID();

        // Global =============================================

        // Slider ---------------------------------------------
        /*if( mfn_slider_isset() ){
            if( function_exists( 'is_woocommerce' ) && is_woocommerce() ){
                // do nothing
            } else {
                $classes[] = 'template-slider';
            }
        }*/

        // Sidebar --------------------------------------------
        //$classes[] = mfn_sidebar_classes();

        // Skin -----------------------------------------------
        /*if( $_GET && key_exists( 'mfn-c', $_GET ) ){
            $classes[] = 'color-'. esc_html( $_GET['mfn-c'] ); // demo
        } elseif( $layoutID ){
            $classes[] = 'color-'. get_post_meta( $layoutID, 'mfn-post-skin', true );
        } else {*/
        $classes = 'color-' . $xoTheme->template->_tpl_vars['skin'];
        //}

        // Style | Default & Simple ---------------------------
        /*if( $_GET && key_exists( 'mfn-style', $_GET ) ){
            $classes[] = 'style-'. esc_html( $_GET['mfn-style'] ); // demo
        } else {*/
        $classes .= ' style-' . $xoTheme->template->_tpl_vars['style'];
        //}

        // Button | Style -------------------------------------
        /*if( $_GET && key_exists( 'mfn-btn', $_GET ) ){
            $classes .= 'button-'. esc_html( $_GET['mfn-btn'] ); // demo
        } else {*/
        $classes .= ' button-' . $xoTheme->template->_tpl_vars['button-style'];
        //}

        // Layout | Full Width & Boxed ------------------------
        /*if( $_GET && key_exists( 'mfn-box', $_GET ) ){
            $classes .= 'layout-boxed'; // demo
        } elseif( $layoutID ){
            $classes .= 'layout-'. get_post_meta( $layoutID, 'mfn-post-layout', true );
        } else {*/
        $classes .= ' layout-' . $xoTheme->template->_tpl_vars['layout'];
        //}

        // One Page -------------------------------------------
        /*if( get_post_meta( mfn_ID(), 'mfn-post-one-page', true ) ){
            $classes .= 'one-page';
        }*/

        // Nice Scroll ----------------------------------------
        if ($xoTheme->template->_tpl_vars['nice-scroll'] == '1') {
            $classes .= ' nice-scroll-on';
        }

        // Image Frame | Style --------------------------------
        /*if( $_GET && key_exists( 'mfn-if', $_GET ) ){
            $classes .= 'if-'. esc_html( $_GET['mfn-if'] ); // demo
        } else*/
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
        } /*elseif( get_post_meta( mfn_ID(), 'mfn-post-remove-padding', true ) ){
			$classes .= 'no-content-padding';
		}*/

        // Single Template ------------------------------------
        /*if( get_post_meta( mfn_ID(), 'mfn-post-template', true ) ){
            $classes .= 'single-template-'. get_post_meta( mfn_ID(), 'mfn-post-template', true );
        }*/

        // Love -----------------------------------------------
        //if( ! mfn_opts_get('love') ) $classes .= 'hide-love';

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
        $classes .= ' ';
        $classes .= mfn_header_style();

        // Header | Full Width ----------------------
        /*if( $_GET && key_exists( 'mfn-hfw', $_GET ) ){
            $classes .= 'header-fw'; // demo
        } else*/
        if (isset($header_options['full-width'])) {
            $classes .= ' header-fw';
        }

        // Header | Boxed ---------------------------
        if (is_array($header_options) && isset($header_options['header-boxed'])) {
            $classes .= ' header-boxed';
        }

        // Header | Minimalist ----------------------
        /*if( $_GET && key_exists( 'mfn-min', $_GET ) ){
            $classes .= 'minimalist-header'; // demo
        } elseif( $layoutID ){
            if( get_post_meta( $layoutID, 'mfn-post-minimalist-header', true ) == 'no' ){
                $classes .= 'minimalist-header-no';
            } elseif( get_post_meta( $layoutID, 'mfn-post-minimalist-header', true ) ){
                $classes .= 'minimalist-header';
            }
        } else*/
        if ($xoTheme->template->_tpl_vars['minimalist-header'] == 'no') {
            $classes .= ' minimalist-header-no';
        } elseif ($xoTheme->template->_tpl_vars['minimalist-header']) {
            $classes .= ' minimalist-header';
        }

        // Header | Sticky --------------------------
        /*if( $layoutID ){
            if( get_post_meta( $layoutID, 'mfn-post-sticky-header', true ) ){
                $classes .= 'sticky-header';
            }
        } else*/
        if ($xoTheme->template->_tpl_vars['sticky-header']) {
            $classes .= ' sticky-header';
        }

        // Header Sticky Style ----------------------
        /*if( $_GET && key_exists( 'mfn-ss', $_GET ) ){
            $classes .= 'sticky-'. esc_html( $_GET['mfn-ss'] ); // demo
        } elseif( $layoutID ){
            $classes .= 'sticky-'. get_post_meta( $layoutID, 'mfn-post-sticky-header-style', true );
        } else {*/
        $classes .= ' sticky-' . $xoTheme->template->_tpl_vars['sticky-header-style'];
        //}

        // Action Bar -------------------------------
        if ($xoTheme->template->_tpl_vars['action-bar']) {
            $classes .= ' ab-show';
        } else {
            $classes .= ' ab-hide';
        }

        // Subheader | Transparent ------------------
        $skin = $xoTheme->template->_tpl_vars['skin'];
        /*if( $_GET && key_exists( 'mfn-subtr', $_GET ) ){
            $classes .= 'subheader-transparent'; // demo
        } else*/
        if (!in_array($skin, ['custom', 'one'])) {
            if ($xoTheme->template->_tpl_vars['subheader-transparent'] != 100) {
                $classes .= ' subheader-transparent';
            }
        }

        // Subheader | Style ------------------------
        /*if( $_GET && key_exists( 'mfn-sh', $_GET ) ){
            $classes .= 'subheader-'. esc_html( $_GET['mfn-sh'] ); // demo
        } else {*/
        $classes .= ' subheader-' . $xoTheme->template->_tpl_vars['subheader-style'];
        //}

        // Menu | Style -----------------------------
        /*if( $_GET && key_exists( 'mfn-m', $_GET ) ){
            $classes .= 'menu-'. esc_html( $_GET['mfn-m'] ); // demo
        } else*/
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
        /*if( $_GET && key_exists( 'mfn-ftr', $_GET ) ){
            $classes .= 'footer-'. esc_html( $_GET['mfn-ftr'] ); // demo
        } else*/
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
        //if( $_GET && key_exists( 'mfn-rtl' , $_GET ) ) $classes .= 'rtl';
        //if( $layoutID ) $classes .= 'dbg-lay-id-'. $layoutID;

        //$reg = mfn_is_registered() ? 'reg-' : '';
        //$classes .= 'be-'. $reg . str_replace( '.', '', THEME_VERSION );

        return $classes;
    }
}

/* ---------------------------------------------------------------------------
 * Annoying styles remover
 * --------------------------------------------------------------------------- */
if (!function_exists('mfn_remove_recent_comments_style')) {
    function mfn_remove_recent_comments_style()
    {
        global $wp_widget_factory;
        if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
            remove_action('wp_head', [$wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style']);
        }
    }
}

/* ---------------------------------------------------------------------------
 * Breadcrumbs
 * --------------------------------------------------------------------------- */
if (!function_exists('mfn_breadcrumbs')) {
    function mfn_breadcrumbs($class = false)
    {
        global $xoTheme;

        $translate['home'] = $xoTheme->template->_tpl_vars['translate'] ? $xoTheme->template->_tpl_vars['translate-home'] : 'Home';

        $homeLink  = 'home_url()';
        $separator = ' <span><i class="icon-right-open"></i></span>';

        // Default breadcrumbs --------------------------------
        $breadcrumbs = [];

        // Home prefix --------------------------------
        $breadcrumbs[] = '<a href="' . $homeLink . '">' . $translate['home'] . '</a>';

        //if( is_front_page() || is_home() ){
        if ($is_home == '1') {
            // do nothing

            // Default ----------------------------------------
        } else {
            $breadcrumbs[] = '<a href="curPageURL()">get_the_title( mfn_ID() )</a>';
        }

        // PRINT ------------------------------------------------------------------
        echo '<ul class="breadcrumbs ' . $class . '">';

        $count = count($breadcrumbs);
        $i     = 1;

        foreach ($breadcrumbs as $bk => $bc) {
            if (strpos($bc, $separator)) {
                // Category parents fix
                echo '<li>' . $bc . '</li>';
            } else {
                if ($i == $count) {
                    $separator = '';
                }
                echo '<li>' . $bc . $separator . '</li>';
            }

            $i++;
        }

        echo '</ul>';
    }
}

/* ---------------------------------------------------------------------------
 * Slider | Isset
 * --------------------------------------------------------------------------- */
if (!function_exists('mfn_slider_isset')) {
    function mfn_slider_isset($id = false)
    {
        global $xoTheme;
        $slider = false;

        // Global Slider Shortcode
        if ($xoTheme->template->_tpl_vars['slider-shortcode']) {
            return 'global';
        }

        return $slider;
    }
}

/* ---------------------------------------------------------------------------
 * Slider | Get
 * --------------------------------------------------------------------------- */
if (!function_exists('mfn_slider')) {
    function mfn_slider($id = false)
    {
        global $xoopsDB, $xoTheme;
        $slider      = false;
        $slider_type = mfn_slider_isset($id);

        //if( ! $id ) $id = mfn_ID(); // do NOT move it before IF

        switch ($slider_type) {
            case 'global':

                $rest = substr((string) $xoTheme->template->_tpl_vars['slider-shortcode'], 3, -2);
                $id   = substr($rest, -2);

                //var_dump($id);
                $output = '';

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

                $output .= '<link rel="stylesheet" href="' . XOOPS_URL . '/modules/system/admin/themebuilder1/slider/css/crellyslider.css" type="text/css" media="all">';
                $output .= '<script type="text/javascript" src="' . XOOPS_URL . '/modules/system/admin/themebuilder1/slider/js/jquery.crellyslider.js"></script>';

                $output .= '<div style="display: block;" class="crellyslider-slider crellyslider-slider-' . $slider['layout'] . ' crellyslider-slider-' . $slider['alias'] . '" id="crellyslider-' . $slider_id . '">' . "\n";
                $output .= '<ul>' . "\n";
                foreach ($slides as $slide) {
                    $background_type_image = $slide['background_type_image'] == 'undefined' || $slide['background_type_image'] == 'none' ? 'none;' : 'url(\'' . $slide['background_type_image'] . '\');';
                    $customcsss            = $slide['custom_css'] ? stripslashes((string) $slide['custom_css']) . "\n" : '';
                    $output                .= '<li' . "\n" .
                                              'style="' . "\n" .
                                              'background-color: ' . $slide['background_type_color'] . ';' . "\n" .
                                              'background-image: ' . $background_type_image . "\n" .
                                              'background-position: ' . $slide['background_propriety_position_x'] . ' ' . $slide['background_propriety_position_y'] . ';' . "\n" .
                                              'background-repeat: ' . $slide['background_repeat'] . ';' . "\n" .
                                              'background-size: ' . $slide['background_propriety_size'] . ';' . "\n" .
                                              $customcsss . '"' . "\n" .

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

                $slider = '<div class="mfn-main-slider" id="mfn-global-slider">';
                $slider .= $output;
                $slider .= '</div>';
                break;

            case 'rev':
                $slider = '<div class="mfn-main-slider" id="mfn-rev-slider">';
                $slider .= do_shortcode('[rev_slider ' . get_post_meta($id, 'mfn-post-slider', true) . ']');
                $slider .= '</div>';
                break;

            case 'layer':
                $slider = '<div class="mfn-main-slider" id="mfn-layer-slider">';
                $slider .= do_shortcode('[layerslider id="' . get_post_meta($id, 'mfn-post-slider-layer', true) . '"]');
                $slider .= '</div>';
                break;

            case 'custom':
                $slider = '<div class="mfn-main-slider" id="mfn-custom-slider">';
                $slider .= do_shortcode(get_post_meta($id, 'mfn-post-slider-shortcode', true));
                $slider .= '</div>';
                break;
        }

        return $slider;
    }
}
