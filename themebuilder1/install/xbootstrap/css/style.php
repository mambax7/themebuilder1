<?php

global $xoTheme;
?>

/* ==============================================================================================================================
/*    Background                                                                                                        Background
/* ============================================================================================================================ */

html {
background-color: <?php echo (!empty($xoTheme->template->_tpl_vars['background-html'])) ? $xoTheme->template->_tpl_vars['background-html'] : '#FCFCFC'; ?>;
}

#Wrapper, #Content {
background-color: <?php echo (!empty($xoTheme->template->_tpl_vars['background-body'])) ? $xoTheme->template->_tpl_vars['background-body'] : '#FCFCFC'; ?>;
}


/* ==============================================================================================================================
/*    Font | Family                                                                                                    Font | Family
/* ============================================================================================================================ */

body, button, span.date_label, .timeline_items li h3 span, input[type="submit"], input[type="reset"], input[type="button"],
input[type="text"], input[type="password"], input[type="tel"], input[type="email"], textarea, select, .offer_li .title h3 {
font-family: "<?php echo str_replace('#', '', (!empty($xoTheme->template->_tpl_vars['font-content'])) ? $xoTheme->template->_tpl_vars['font-content'] : 'Roboto'); ?>", Arial, Tahoma, sans-serif;
}

#menu > ul > li > a, a.action_button, #overlay-menu ul li a {
font-family: "<?php echo str_replace('#', '', (!empty($xoTheme->template->_tpl_vars['font-menu'])) ? $xoTheme->template->_tpl_vars['font-menu'] : 'Roboto'); ?>", Arial, Tahoma, sans-serif;
}

#Subheader .title {
font-family: "<?php echo str_replace('#', '', (!empty($xoTheme->template->_tpl_vars['font-title'])) ? $xoTheme->template->_tpl_vars['font-title'] : 'Lora'); ?>", Arial, Tahoma, sans-serif;
}

h1, h2, h3, h4, .text-logo #logo {
font-family: "<?php echo str_replace('#', '', (!empty($xoTheme->template->_tpl_vars['font-headings'])) ? $xoTheme->template->_tpl_vars['font-headings'] : 'Roboto'); ?>", Arial, Tahoma, sans-serif;
}

h5, h6 {
font-family: "<?php echo str_replace('#', '', (!empty($xoTheme->template->_tpl_vars['font-headings-small'])) ? $xoTheme->template->_tpl_vars['font-headings-small'] : 'Roboto'); ?>", Arial, Tahoma, sans-serif;
}

blockquote {
font-family: "<?php echo str_replace('#', '', (!empty($xoTheme->template->_tpl_vars['font-blockquote'])) ? $xoTheme->template->_tpl_vars['font-blockquote'] : 'Roboto'); ?>", Arial, Tahoma, sans-serif;
}

.chart_box .chart .num, .counter .desc_wrapper .number-wrapper, .how_it_works .image .number,
.pricing-box .plan-header .price, .quick_fact .number-wrapper, .woocommerce .product div.entry-summary .price {
font-family: "<?php echo str_replace('#', '', (!empty($xoTheme->template->_tpl_vars['font-decorative'])) ? $xoTheme->template->_tpl_vars['font-decorative'] : 'Roboto'); ?>", Arial, Tahoma, sans-serif;
}


/* ==============================================================================================================================
/*    Font | Size & Style                                                                                        Font | Size & Style
/* ============================================================================================================================ */

<?php
$defaults = [
    'content' => [
        'size'           => 14,
        'line_height'    => 25,
        'weight_style'   => '400',
        'letter_spacing' => 0,
    ],
    'big'     => [
        'size'           => 16,
        'line_height'    => 28,
        'weight_style'   => '400',
        'letter_spacing' => 0,
    ],
    'menu'    => [
        'size'           => 15,
        'line_height'    => 0,
        'weight_style'   => '400',
        'letter_spacing' => 0,
    ],
    'title'   => [
        'size'           => 30,
        'line_height'    => 35,
        'weight_style'   => '400italic',
        'letter_spacing' => 1,
    ],
    'h1'      => [
        'size'           => 48,
        'line_height'    => 50,
        'weight_style'   => '400',
        'letter_spacing' => 0,
    ],
    'h2'      => [
        'size'           => 30,
        'line_height'    => 34,
        'weight_style'   => '300',
        'letter_spacing' => 0,
    ],
    'h3'      => [
        'size'           => 25,
        'line_height'    => 29,
        'weight_style'   => '300',
        'letter_spacing' => 0,
    ],
    'h4'      => [
        'size'           => 21,
        'line_height'    => 25,
        'weight_style'   => '500',
        'letter_spacing' => 0,
    ],
    'h5'      => [
        'size'           => 15,
        'line_height'    => 25,
        'weight_style'   => '700',
        'letter_spacing' => 0,
    ],
    'h6'      => [
        'size'           => 14,
        'line_height'    => 25,
        'weight_style'   => '400',
        'letter_spacing' => 0,
    ],
    'intro'   => [
        'size'           => 70,
        'line_height'    => 70,
        'weight_style'   => '400',
        'letter_spacing' => 0,
    ],
];

if (is_array($xoTheme->template->_tpl_vars['font-size-content'])) {
    $aFont = [
        'content' => $xoTheme->template->_tpl_vars['font-size-content'],
        'big'     => $xoTheme->template->_tpl_vars['font-size-big'],
        'menu'    => $xoTheme->template->_tpl_vars['font-size-menu'],
        'title'   => $xoTheme->template->_tpl_vars['font-size-title'],
        'h1'      => $xoTheme->template->_tpl_vars['font-size-h1'],
        'h2'      => $xoTheme->template->_tpl_vars['font-size-h2'],
        'h3'      => $xoTheme->template->_tpl_vars['font-size-h3'],
        'h4'      => $xoTheme->template->_tpl_vars['font-size-h4'],
        'h5'      => $xoTheme->template->_tpl_vars['font-size-h5'],
        'h6'      => $xoTheme->template->_tpl_vars['font-size-h6'],
        'intro'   => $xoTheme->template->_tpl_vars['font-size-single-intro'],
    ];

    $aFont = array_replace_recursive($defaults, $aFont);
} else {
    // compatibility with Betheme < 13.5

    $defaults['content']['size'] = (!empty($xoTheme->template->_tpl_vars['font-size-content'])) ? $xoTheme->template->_tpl_vars['font-size-content'] : '14';
    $defaults['big']['size']     = (!empty($xoTheme->template->_tpl_vars['font-size-big'])) ? $xoTheme->template->_tpl_vars['font-size-big'] : '16';
    $defaults['menu']['size']    = (!empty($xoTheme->template->_tpl_vars['font-size-menu'])) ? $xoTheme->template->_tpl_vars['font-size-menu'] : '15';
    $defaults['title']['size']   = (!empty($xoTheme->template->_tpl_vars['font-size-title'])) ? $xoTheme->template->_tpl_vars['font-size-title'] : '30';
    $defaults['h1']['size']      = (!empty($xoTheme->template->_tpl_vars['font-size-h1'])) ? $xoTheme->template->_tpl_vars['font-size-h1'] : '48';
    $defaults['h2']['size']      = (!empty($xoTheme->template->_tpl_vars['font-size-h2'])) ? $xoTheme->template->_tpl_vars['font-size-h2'] : '30';
    $defaults['h3']['size']      = (!empty($xoTheme->template->_tpl_vars['font-size-h3'])) ? $xoTheme->template->_tpl_vars['font-size-h3'] : '25';
    $defaults['h4']['size']      = (!empty($xoTheme->template->_tpl_vars['font-size-h4'])) ? $xoTheme->template->_tpl_vars['font-size-h4'] : '21';
    $defaults['h5']['size']      = (!empty($xoTheme->template->_tpl_vars['font-size-h5'])) ? $xoTheme->template->_tpl_vars['font-size-h5'] : '15';
    $defaults['h6']['size']      = (!empty($xoTheme->template->_tpl_vars['font-size-h6'])) ? $xoTheme->template->_tpl_vars['font-size-h6'] : '14';
    $defaults['intro']['size']   = (!empty($xoTheme->template->_tpl_vars['font-size-single-intro'])) ? $xoTheme->template->_tpl_vars['font-size-single-intro'] : '70';

    $aFont = $defaults;
}

$aFontInit = $aFont;
?>


/* Body */

body {
font-size: <?php echo $aFont['content']['size']; ?>px;
line-height: <?php echo $aFont['content']['line_height']; ?>px;
font-weight: <?php echo str_replace('italic', '', (string) $aFont['content']['weight_style']) ?>;
letter-spacing: <?php echo $aFont['content']['letter_spacing']; ?>px;
<?php if (strpos((string) $aFont['content']['weight_style'], 'italic')) echo 'font-style: italic;' ?>
}

big,.big {
font-size: <?php echo $aFont['big']['size']; ?>px;
line-height: <?php echo $aFont['big']['line_height']; ?>px;
font-weight: <?php echo str_replace('italic', '', (string) $aFont['big']['weight_style']) ?>;
letter-spacing: <?php echo $aFont['big']['letter_spacing']; ?>px;
<?php if (strpos((string) $aFont['big']['weight_style'], 'italic')) echo 'font-style: italic;' ?>
}

#menu > ul > li > a, a.action_button, #overlay-menu ul li a{
font-size: <?php echo $aFont['menu']['size']; ?>px;
font-weight: <?php echo str_replace('italic', '', (string) $aFont['menu']['weight_style']) ?>;
letter-spacing: <?php echo $aFont['menu']['letter_spacing']; ?>px;
<?php if (strpos((string) $aFont['menu']['weight_style'], 'italic')) echo 'font-style: italic;' ?>
}

#overlay-menu ul li a{
line-height: <?php echo($aFont['menu']['size'] + $aFont['menu']['size'] * 0.5); ?>px;
}

#Subheader .title {
font-size: <?php echo $aFont['title']['size']; ?>px;
line-height: <?php echo $aFont['title']['line_height']; ?>px;
font-weight: <?php echo str_replace('italic', '', (string) $aFont['title']['weight_style']) ?>;
letter-spacing: <?php echo $aFont['title']['letter_spacing']; ?>px;
<?php if (strpos((string) $aFont['title']['weight_style'], 'italic')) echo 'font-style: italic;' ?>
}

/* Headings */

h1, .text-logo #logo {
font-size: <?php echo $aFont['h1']['size']; ?>px;
line-height: <?php echo $aFont['h1']['line_height']; ?>px;
font-weight: <?php echo str_replace('italic', '', (string) $aFont['h1']['weight_style']) ?>;
letter-spacing: <?php echo $aFont['h1']['letter_spacing']; ?>px;
<?php if (strpos((string) $aFont['h1']['weight_style'], 'italic')) echo 'font-style: italic;' ?>
}
h2 {
font-size: <?php echo $aFont['h2']['size']; ?>px;
line-height: <?php echo $aFont['h2']['line_height']; ?>px;
font-weight: <?php echo str_replace('italic', '', (string) $aFont['h2']['weight_style']) ?>;
letter-spacing: <?php echo $aFont['h2']['letter_spacing']; ?>px;
<?php if (strpos((string) $aFont['h2']['weight_style'], 'italic')) echo 'font-style: italic;' ?>
}
h3 {
font-size: <?php echo $aFont['h3']['size']; ?>px;
line-height: <?php echo $aFont['h3']['line_height']; ?>px;
font-weight: <?php echo str_replace('italic', '', (string) $aFont['h3']['weight_style']) ?>;
letter-spacing: <?php echo $aFont['h3']['letter_spacing']; ?>px;
<?php if (strpos((string) $aFont['h3']['weight_style'], 'italic')) echo 'font-style: italic;' ?>
}
h4 {
font-size: <?php echo $aFont['h4']['size']; ?>px;
line-height: <?php echo $aFont['h4']['line_height']; ?>px;
font-weight: <?php echo str_replace('italic', '', (string) $aFont['h4']['weight_style']) ?>;
letter-spacing: <?php echo $aFont['h4']['letter_spacing']; ?>px;
<?php if (strpos((string) $aFont['h4']['weight_style'], 'italic')) echo 'font-style: italic;' ?>
}
h5 {
font-size: <?php echo $aFont['h5']['size']; ?>px;
line-height: <?php echo $aFont['h5']['line_height']; ?>px;
font-weight: <?php echo str_replace('italic', '', (string) $aFont['h5']['weight_style']) ?>;
letter-spacing: <?php echo $aFont['h5']['letter_spacing']; ?>px;
<?php if (strpos((string) $aFont['h5']['weight_style'], 'italic')) echo 'font-style: italic;' ?>
}
h6 {
font-size: <?php echo $aFont['h6']['size']; ?>px;
line-height: <?php echo $aFont['h6']['line_height']; ?>px;
font-weight: <?php echo str_replace('italic', '', (string) $aFont['h6']['weight_style']) ?>;
letter-spacing: <?php echo $aFont['h6']['letter_spacing']; ?>px;
<?php if (strpos((string) $aFont['h6']['weight_style'], 'italic')) echo 'font-style: italic;' ?>
}

/* Advanced */

#Intro .intro-title {
font-size: <?php echo $aFont['intro']['size']; ?>px;
line-height: <?php echo $aFont['intro']['line_height']; ?>px;
font-weight: <?php echo str_replace('italic', '', (string) $aFont['intro']['weight_style']) ?>;
letter-spacing: <?php echo $aFont['intro']['letter_spacing']; ?>px;
<?php if (strpos((string) $aFont['intro']['weight_style'], 'italic')) echo 'font-style: italic;' ?>
}


/* ==============================================================================================================================
/*    Font | Size    Responsive                                                                                    Font | Size Responsive
/* ============================================================================================================================ */

<?php if ($xoTheme->template->_tpl_vars['responsive'] && $xoTheme->template->_tpl_vars['font-size-responsive']): ?>

    <?php
    $min_size = 13;
    $min_line = 19;

    // Tablet (Landscape) ------------------------- 768 - 959
    $multiplier = 0.85;

    foreach ($aFont as $key => $font) {
        $aFont[$key]['size'] = round($font['size'] * $multiplier);
        if ($aFont[$key]['size'] < $min_size) {
            $aFont[$key]['size'] = $min_size;
        }

        $aFont[$key]['line_height'] = round($font['line_height'] * $multiplier);
        if ($aFont[$key]['line_height'] < $min_line) {
            $aFont[$key]['line_height'] = $min_line;
        }
    }
    ?>

    @media only screen and (min-width: 768px) and (max-width: 959px){
    body {
    font-size: <?php echo $aFont['content']['size']; ?>px;
    line-height: <?php echo $aFont['content']['line_height']; ?>px;
    }
    big,.big {
    font-size: <?php echo $aFont['big']['size']; ?>px;
    line-height: <?php echo $aFont['big']['line_height']; ?>px;
    }
    #menu > ul > li > a, a.action_button, #overlay-menu ul li a {
    font-size: <?php echo $aFont['menu']['size']; ?>px;
    }
    #overlay-menu ul li a{
    line-height: <?php echo($aFont['menu']['size'] + $aFont['menu']['size'] * 0.5); ?>px;
    }
    #Subheader .title {
    font-size: <?php echo $aFont['title']['size']; ?>px;
    line-height: <?php echo $aFont['title']['line_height']; ?>px;
    }
    h1, .text-logo #logo {
    font-size: <?php echo $aFont['h1']['size']; ?>px;
    line-height: <?php echo $aFont['h1']['line_height']; ?>px;
    }
    h2 {
    font-size: <?php echo $aFont['h2']['size']; ?>px;
    line-height: <?php echo $aFont['h2']['line_height']; ?>px;
    }
    h3 {
    font-size: <?php echo $aFont['h3']['size']; ?>px;
    line-height: <?php echo $aFont['h3']['line_height']; ?>px;
    }
    h4 {
    font-size: <?php echo $aFont['h4']['size']; ?>px;
    line-height: <?php echo $aFont['h4']['line_height']; ?>px;
    }
    h5 {
    font-size: <?php echo $aFont['h5']['size']; ?>px;
    line-height: <?php echo $aFont['h5']['line_height']; ?>px;
    }
    h6 {
    font-size: <?php echo $aFont['h6']['size']; ?>px;
    line-height: <?php echo $aFont['h6']['line_height']; ?>px;
    }
    #Intro .intro-title {
    font-size: <?php echo $aFont['intro']['size']; ?>px;
    line-height: <?php echo $aFont['intro']['line_height']; ?>px;
    }

    blockquote { font-size: 15px;}

    .chart_box .chart .num { font-size: 45px; line-height: 45px; }

    .counter .desc_wrapper .number-wrapper { font-size: 45px; line-height: 45px;}
    .counter .desc_wrapper .title { font-size: 14px; line-height: 18px;}

    .faq .question .title { font-size: 14px; }

    .fancy_heading .title { font-size: 38px; line-height: 38px; }

    .offer .offer_li .desc_wrapper .title h3 { font-size: 32px; line-height: 32px; }
    .offer_thumb_ul li.offer_thumb_li .desc_wrapper .title h3 {  font-size: 32px; line-height: 32px; }

    .pricing-box .plan-header h2 { font-size: 27px; line-height: 27px; }
    .pricing-box .plan-header .price > span { font-size: 40px; line-height: 40px; }
    .pricing-box .plan-header .price sup.currency { font-size: 18px; line-height: 18px; }
    .pricing-box .plan-header .price sup.period { font-size: 14px; line-height: 14px;}

    .quick_fact .number { font-size: 80px; line-height: 80px;}

    .trailer_box .desc h2 { font-size: 27px; line-height: 27px; }

    .widget > h3 { font-size: 17px; line-height: 20px; }
    }

    <?php
    // Tablet (Portrait) & Mobile (Landscape) ----- 480 - 767
    $multiplier = 0.75;

    $aFont = $aFontInit;

    foreach ($aFont as $key => $font) {
        $aFont[$key]['size'] = round($font['size'] * $multiplier);
        if ($aFont[$key]['size'] < $min_size) {
            $aFont[$key]['size'] = $min_size;
        }

        $aFont[$key]['line_height'] = round($font['line_height'] * $multiplier);
        if ($aFont[$key]['line_height'] < $min_line) {
            $aFont[$key]['line_height'] = $min_line;
        }
    }
    ?>

    @media only screen and (min-width: 480px) and (max-width: 767px){
    body {
    font-size: <?php echo $aFont['content']['size']; ?>px;
    line-height: <?php echo $aFont['content']['line_height']; ?>px;
    }
    big,.big {
    font-size: <?php echo $aFont['big']['size']; ?>px;
    line-height: <?php echo $aFont['big']['line_height']; ?>px;
    }
    #menu > ul > li > a, a.action_button, #overlay-menu ul li a {
    font-size: <?php echo $aFont['menu']['size']; ?>px;
    }
    #overlay-menu ul li a{
    line-height: <?php echo($aFont['menu']['size'] + $aFont['menu']['size'] * 0.5); ?>px;
    }
    #Subheader .title {
    font-size: <?php echo $aFont['title']['size']; ?>px;
    line-height: <?php echo $aFont['title']['line_height']; ?>px;
    }
    h1, .text-logo #logo {
    font-size: <?php echo $aFont['h1']['size']; ?>px;
    line-height: <?php echo $aFont['h1']['line_height']; ?>px;
    }
    h2 {
    font-size: <?php echo $aFont['h2']['size']; ?>px;
    line-height: <?php echo $aFont['h2']['line_height']; ?>px;
    }
    h3 {
    font-size: <?php echo $aFont['h3']['size']; ?>px;
    line-height: <?php echo $aFont['h3']['line_height']; ?>px;
    }
    h4 {
    font-size: <?php echo $aFont['h4']['size']; ?>px;
    line-height: <?php echo $aFont['h4']['line_height']; ?>px;
    }
    h5 {
    font-size: <?php echo $aFont['h5']['size']; ?>px;
    line-height: <?php echo $aFont['h5']['line_height']; ?>px;
    }
    h6 {
    font-size: <?php echo $aFont['h6']['size']; ?>px;
    line-height: <?php echo $aFont['h6']['line_height']; ?>px;
    }
    #Intro .intro-title {
    font-size: <?php echo $aFont['intro']['size']; ?>px;
    line-height: <?php echo $aFont['intro']['line_height']; ?>px;
    }

    blockquote { font-size: 14px;}

    .chart_box .chart .num { font-size: 40px; line-height: 40px; }

    .counter .desc_wrapper .number-wrapper { font-size: 40px; line-height: 40px;}
    .counter .desc_wrapper .title { font-size: 13px; line-height: 16px;}

    .faq .question .title { font-size: 13px; }

    .fancy_heading .title { font-size: 34px; line-height: 34px; }

    .offer .offer_li .desc_wrapper .title h3 { font-size: 28px; line-height: 28px; }
    .offer_thumb_ul li.offer_thumb_li .desc_wrapper .title h3 {  font-size: 28px; line-height: 28px; }

    .pricing-box .plan-header h2 { font-size: 24px; line-height: 24px; }
    .pricing-box .plan-header .price > span { font-size: 34px; line-height: 34px; }
    .pricing-box .plan-header .price sup.currency { font-size: 16px; line-height: 16px; }
    .pricing-box .plan-header .price sup.period { font-size: 13px; line-height: 13px;}

    .quick_fact .number { font-size: 70px; line-height: 70px;}

    .trailer_box .desc h2 { font-size: 24px; line-height: 24px; }

    .widget > h3 { font-size: 16px; line-height: 19px; }
    }

    <?php
    // Mobile (Portrait) ------------------------------ < 479
    $multiplier = 0.6;

    $aFont = $aFontInit;

    foreach ($aFont as $key => $font) {
        $aFont[$key]['size'] = round($font['size'] * $multiplier);
        if ($aFont[$key]['size'] < $min_size) {
            $aFont[$key]['size'] = $min_size;
        }

        $aFont[$key]['line_height'] = round($font['line_height'] * $multiplier);
        if ($aFont[$key]['line_height'] < $min_line) {
            $aFont[$key]['line_height'] = $min_line;
        }
    }
    ?>

    @media only screen and (max-width: 479px){
    body {
    font-size: <?php echo $aFont['content']['size']; ?>px;
    line-height: <?php echo $aFont['content']['line_height']; ?>px;
    }
    big,.big {
    font-size: <?php echo $aFont['big']['size']; ?>px;
    line-height: <?php echo $aFont['big']['line_height']; ?>px;
    }
    #menu > ul > li > a, a.action_button, #overlay-menu ul li a {
    font-size: <?php echo $aFont['menu']['size']; ?>px;
    }
    #overlay-menu ul li a{
    line-height: <?php echo($aFont['menu']['size'] + $aFont['menu']['size'] * 0.5); ?>px;
    }
    #Subheader .title {
    font-size: <?php echo $aFont['title']['size']; ?>px;
    line-height: <?php echo $aFont['title']['line_height']; ?>px;
    }
    h1, .text-logo #logo {
    font-size: <?php echo $aFont['h1']['size']; ?>px;
    line-height: <?php echo $aFont['h1']['line_height']; ?>px;
    }
    h2 {
    font-size: <?php echo $aFont['h2']['size']; ?>px;
    line-height: <?php echo $aFont['h2']['line_height']; ?>px;
    }
    h3 {
    font-size: <?php echo $aFont['h3']['size']; ?>px;
    line-height: <?php echo $aFont['h3']['line_height']; ?>px;
    }
    h4 {
    font-size: <?php echo $aFont['h4']['size']; ?>px;
    line-height: <?php echo $aFont['h4']['line_height']; ?>px;
    }
    h5 {
    font-size: <?php echo $aFont['h5']['size']; ?>px;
    line-height: <?php echo $aFont['h5']['line_height']; ?>px;
    }
    h6 {
    font-size: <?php echo $aFont['h6']['size']; ?>px;
    line-height: <?php echo $aFont['h6']['line_height']; ?>px;
    }
    #Intro .intro-title {
    font-size: <?php echo $aFont['intro']['size']; ?>px;
    line-height: <?php echo $aFont['intro']['line_height']; ?>px;
    }

    blockquote { font-size: 13px;}

    .chart_box .chart .num { font-size: 35px; line-height: 35px; }

    .counter .desc_wrapper .number-wrapper { font-size: 35px; line-height: 35px;}
    .counter .desc_wrapper .title { font-size: 13px; line-height: 26px;}

    .faq .question .title { font-size: 13px; }

    .fancy_heading .title { font-size: 30px; line-height: 30px; }

    .offer .offer_li .desc_wrapper .title h3 { font-size: 26px; line-height: 26px; }
    .offer_thumb_ul li.offer_thumb_li .desc_wrapper .title h3 {  font-size: 26px; line-height: 26px; }

    .pricing-box .plan-header h2 { font-size: 21px; line-height: 21px; }
    .pricing-box .plan-header .price > span { font-size: 32px; line-height: 32px; }
    .pricing-box .plan-header .price sup.currency { font-size: 14px; line-height: 14px; }
    .pricing-box .plan-header .price sup.period { font-size: 13px; line-height: 13px;}

    .quick_fact .number { font-size: 60px; line-height: 60px;}

    .trailer_box .desc h2 { font-size: 21px; line-height: 21px; }

    .widget > h3 { font-size: 15px; line-height: 18px; }
    }

<?php endif; ?>


/* ==============================================================================================================================
/*    Sidebar | Width                                                                                                Sidebar | Width
/* ============================================================================================================================ */

<?php
$sidebarW  = (!empty($xoTheme->template->_tpl_vars['sidebar-width'])) ? $xoTheme->template->_tpl_vars['sidebar-width'] : '23';
$contentW  = 100 - $sidebarW;
$sidebar2W = $sidebarW - 5;
$content2W = 100 - ($sidebar2W * 2);
$sidebar2M = $content2W + $sidebar2W;
$content2M = $sidebar2W;
?>

.with_aside .sidebar.columns {
width: <?php echo $sidebarW; ?>%;
}
.with_aside .sections_group {
width: <?php echo $contentW; ?>%;
}

.aside_both .sidebar.columns {
width: <?php echo $sidebar2W; ?>%;
}
.aside_both .sidebar.sidebar-1{
margin-left: -<?php echo $sidebar2M; ?>%;
}
.aside_both .sections_group {
width: <?php echo $content2W; ?>%;
margin-left: <?php echo $content2M; ?>%;
}


/* ==============================================================================================================================
/*    Grid | Width                                                                                                    Grid | Width
/* ============================================================================================================================ */

<?php if ($xoTheme->template->_tpl_vars['responsive']): ?>

    <?php
    $gridW = (!empty($xoTheme->template->_tpl_vars['grid-width'])) ? $xoTheme->template->_tpl_vars['grid-width'] : '1240';
    ?>

    @media only screen and (min-width:1240px){
    #Wrapper, .with_aside .content_wrapper {
    max-width: <?php echo $gridW; ?>px;
    }
    .section_wrapper, .container {
    max-width: <?php echo $gridW - 20; ?>px;
    }
    .layout-boxed.header-boxed #Top_bar.is-sticky{
    max-width: <?php echo $gridW; ?>px;
    }
    }

    <?php
    if ($box_padding = $xoTheme->template->_tpl_vars['layout-boxed-padding']):
        ?>

        @media only screen and (min-width:768px){

        .layout-boxed #Subheader .container,
        .layout-boxed:not(.with_aside) .section:not(.full-width),
        .layout-boxed.with_aside .content_wrapper,
        .layout-boxed #Footer .container { padding-left: <?php echo $box_padding; ?>; padding-right: <?php echo $box_padding; ?>;}

        .layout-boxed.header-modern #Action_bar .container,
        .layout-boxed.header-modern #Top_bar:not(.is-sticky) .container { padding-left: <?php echo $box_padding; ?>; padding-right: <?php echo $box_padding; ?>;}
        }

    <?php endif; ?>

    <?php
    $mobileGridW = (!empty($xoTheme->template->_tpl_vars['mobile-grid-width'])) ? $xoTheme->template->_tpl_vars['mobile-grid-width'] : '700';
    ?>

    @media only screen and (max-width: 767px){
    .section_wrapper,
    .container,
    .four.columns .widget-area { max-width: <?php echo $mobileGridW; ?>px !important; }
    }

<?php endif; ?>


/* ==============================================================================================================================
/*    Other                                                                                                                    Other
/* ============================================================================================================================ */

/* Logo Height */

<?php
$aLogo = [
    'height'           => intval((!empty($xoTheme->template->_tpl_vars['logo-height'])) ? $xoTheme->template->_tpl_vars['logo-height'] : '60'),
    'vertical_padding' => intval((!empty($xoTheme->template->_tpl_vars['logo-vertical-padding'])) ? $xoTheme->template->_tpl_vars['logo-vertical-padding'] : '15'),
];

$aLogo['top_bar_right_H'] = $aLogo['height'] + ($aLogo['vertical_padding'] * 2);
$aLogo['top_bar_right_T'] = ($aLogo['top_bar_right_H'] / 2) - 20;

$aLogo['menu_padding']      = ($aLogo['top_bar_right_H'] / 2) - 30;
$aLogo['menu_margin']       = ($aLogo['top_bar_right_H'] / 2) - 25;
$aLogo['responsive_menu_T'] = ($aLogo['height'] / 2) + 10; /* mobile logo | margin: 10px */

$aLogo['header_fixed_LH'] = ($aLogo['top_bar_right_H'] - 30) / 2;
?>

#Top_bar #logo,
.header-fixed #Top_bar #logo,
.header-plain #Top_bar #logo,
.header-transparent #Top_bar #logo {
height: <?php echo $aLogo['height']; ?>px;
line-height: <?php echo $aLogo['height']; ?>px;
padding: <?php echo $aLogo['vertical_padding']; ?>px 0;
}
.logo-overflow #Top_bar:not(.is-sticky) .logo {
height: <?php echo $aLogo['top_bar_right_H']; ?>px;
}
#Top_bar .menu > li > a {
padding: <?php echo $aLogo['menu_padding']; ?>px 0;
}
.menu-highlight:not(.header-creative) #Top_bar .menu > li > a {
margin: <?php echo $aLogo['menu_margin']; ?>px 0;
}
.header-plain:not(.menu-highlight) #Top_bar .menu > li > a span:not(.description) {
line-height: <?php echo $aLogo['top_bar_right_H']; ?>px;
}
.header-fixed #Top_bar .menu > li > a {
padding: <?php echo $aLogo['header_fixed_LH']; ?>px 0;
}

#Top_bar .top_bar_right,
.header-plain #Top_bar .top_bar_right {
height: <?php echo $aLogo['top_bar_right_H']; ?>px;
}
#Top_bar .top_bar_right_wrapper {
top: <?php echo $aLogo['top_bar_right_T']; ?>px;
}
.header-plain #Top_bar a#header_cart,
.header-plain #Top_bar a#search_button,
.header-plain #Top_bar .wpml-languages,
.header-plain #Top_bar a.action_button {
line-height: <?php echo $aLogo['top_bar_right_H']; ?>px;
}

<?php if (!$aLogo['vertical_padding']): ?>
    .logo-overflow #Top_bar.is-sticky #logo{padding:0!important;}
<?php endif; ?>

@media only screen and (max-width: 767px){
#Top_bar a.responsive-menu-toggle {
top: <?php echo $aLogo['responsive_menu_T']; ?>px;
}
<?php if ($aLogo['vertical_padding']): ?>
    .mobile-header-mini #Top_bar #logo{
    height:50px!important;
    line-height:50px!important;
    margin:5px 0;
    }
<?php endif; ?>
}


/* Before After Item */

<?php
$translate['before'] = $xoTheme->template->_tpl_vars['translate'] ? $xoTheme->template->_tpl_vars['translate-before'] : 'Before';
$translate['after']  = $xoTheme->template->_tpl_vars['translate'] ? $xoTheme->template->_tpl_vars['translate-after'] : 'After';
?>

.twentytwenty-before-label::before { content: "<?php echo $translate['before']; ?>";}
.twentytwenty-after-label::before { content: "<?php echo $translate['after']; ?>";}


/* Form | Border width */
<?php $form_border_width = trim((string) $xoTheme->template->_tpl_vars['form-border-width']); ?>

<?php if ($form_border_width || ($form_border_width === '0')): ?>

    input[type="date"],input[type="email"],input[type="number"],input[type="password"],input[type="search"],
    input[type="tel"],input[type="text"],input[type="url"],select,textarea,.woocommerce .quantity input.qty{
    border-width: <?php echo $form_border_width; ?>;
    <?php if ($form_border_width != '1px'): ?>
        box-shadow: unset;
        resize: none;
    <?php endif; ?>
    }

<?php endif; ?>


/* Side Slide */

#Side_slide{
right:-<?php echo (!empty($xoTheme->template->_tpl_vars['responsive-side-slide-width'])) ? $xoTheme->template->_tpl_vars['responsive-side-slide-width'] : '250'; ?>px;
width:<?php echo (!empty($xoTheme->template->_tpl_vars['responsive-side-slide-width'])) ? $xoTheme->template->_tpl_vars['responsive-side-slide-width'] : '250'; ?>px;
}


/* Other */

/* Blog teaser | Android phones 1pt line fix - do NOT move it somewhere else */
.blog-teaser li .desc-wrapper .desc{background-position-y:-1px;}
