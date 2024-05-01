<?php
/**
 * Logo
 */

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
