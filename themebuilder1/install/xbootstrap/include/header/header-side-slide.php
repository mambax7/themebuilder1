<?php

// responsive | mobile | options
$menu_pos = 'right';
if (in_array($xoTheme->template->_tpl_vars['responsive-header-minimal'], ['ml-ll', 'ml-lc', 'ml-lr'])) {
    $menu_pos = 'left';
}

$side_class = $menu_pos;

// background color | brightness
$side_class .= ' ' . mfn_brightness($xoTheme->template->_tpl_vars['background-side-menu']);

// side slide | hide
$ss_hide = $xoTheme->template->_tpl_vars['responsive-side-slide'];
if (is_array($ss_hide)) {
    if (isset($ss_hide['button'])) {
        $side_class .= ' hide-button';
    }
    if (isset($ss_hide['icons'])) {
        $side_class .= ' hide-icons';
    }
    if (isset($ss_hide['social'])) {
        $side_class .= ' hide-social';
    }
}

// #Side_slide
echo '<div id="Side_slide" class="' . $side_class . '" data-width="' . $xoTheme->template->_tpl_vars['responsive-side-slide-width'] . '">';

// Close Button
echo '<div class="close-wrapper">';
echo '<a href="#" class="close"><i class="icon-cancel-fine"></i></a>';
echo '</div>';

// Extras
echo '<div class="extras">';

// action button
if ($action_link = $xoTheme->template->_tpl_vars['header-action-link']) {
    $action_options = $xoTheme->template->_tpl_vars['header-action-target'];

    if (isset($action_options['target'])) {
        $action_target = 'target="_blank"';
    } else {
        $action_target = false;
    }

    if (isset($action_options['scroll'])) {
        $action_class = ' scroll';
    } else {
        $action_class = false;
    }

    echo '<a href="' . $action_link . '" class="action_button' . $action_class . '" ' . $action_target . '>' . $xoTheme->template->_tpl_vars['header-action-title'] . '</a>';
}

// icons
echo '<div class="extras-wrapper">';

// Search
if ($xoTheme->template->_tpl_vars['header-search']) {
    echo '<a class="icon search" href="#"><i class="icon-search-fine"></i></a>';
}

// Languages menu
if (has_nav_menu('lang-menu')) {
    // Custom Languages Menu
    echo '<a class="lang-active" href="#">' . mfn_get_menu_name('lang-menu') . '<i class="icon-down-open-mini"></i></a>';
} elseif (function_exists('icl_get_languages')) {
    // WPML | Custom Languages Menu
    $lang_args    = '';
    $lang_options = $xoTheme->template->_tpl_vars['header-wpml-options'];
    $wmpl_flags   = $xoTheme->template->_tpl_vars['header-wpml'];

    if (isset($lang_options['link-to-home'])) {
        $lang_args .= 'skip_missing=0';
    } else {
        $lang_args .= 'skip_missing=1';
    }
    //$languages = icl_get_languages( $lang_args );

    if (is_array($languages) && $wmpl_flags != 'hide') {
        $active_lang = false;
        foreach ($languages as $lang_k => $lang) {
            if ($lang['active']) {
                $active_lang = $lang;
            }
        }

        if ($active_lang) {
            echo '<a class="lang-active" href="#">';

            if ($wmpl_flags == 'dropdown-name') {
                echo $active_lang['native_name'];
            } elseif ($wmpl_flags == 'horizontal-code') {
                echo strtoupper((string) $active_lang['language_code']);
            } else {
                echo '<img src="' . $active_lang['country_flag_url'] . '" alt="' . $active_lang['translated_name'] . '" width="18" height="12"/>';
            }

            if (count($languages) > 1) {
                echo '<i class="icon-down-open-mini"></i>';
            }

            echo '</a>';
        }
    }
}

echo '</div>';

echo '</div>';

// Search | wrapper
if ($xoTheme->template->_tpl_vars['header-search']) {
    echo '<div class="search-wrapper">';

    $translate['search-placeholder'] = $xoTheme->template->_tpl_vars['translate'] ? $xoTheme->template->_tpl_vars['translate-search-placeholder'] : 'Enter your search';

    echo '<form id="side-form" method="get" action="home_url">';

    if ($xoTheme->template->_tpl_vars['header-search'] == 'shop') {
        echo '<input type="hidden" name="post_type" value="product" />';
    }

    echo '<input type="text" class="field" name="s" placeholder="' . $translate['search-placeholder'] . '" />';
    echo '<input type="submit" class="submit" value="" style="display:none;" />';

    //do_action( 'wpml_add_language_form_field' );

    echo '<a class="submit" href="#"><i class="icon-search-fine"></i></a>';

    echo '</form>';

    echo '</div>';
}

// Languages menu | wrapper
echo '<div class="lang-wrapper">';

// Languages menu
if (has_nav_menu('lang-menu')) {
    // Custom Languages Menu
    mfn_wp_lang_menu();
} elseif (function_exists('icl_get_languages')) {
    // WPML | Custom Languages Menu
    if (count($languages) > 1) {
        echo '<ul class="wpml-lang">';
        foreach ($languages as $lang) {
            echo '<li><a href="' . $lang['url'] . '" class="' . ($lang['active'] ? 'active' : false) . '">';

            if ($wmpl_flags == 'dropdown-name') {
                echo $lang['native_name'];
            } elseif ($wmpl_flags == 'horizontal-code') {
                echo strtoupper((string) $lang['language_code']);
            } else {
                echo '<img src="' . $lang['country_flag_url'] . '" alt="' . $lang['translated_name'] . '" width="18" height="12"/>';
            }

            echo '</a></li>';
        }
        echo '</ul>';
    } else {
        $translate['wpml-no'] = $xoTheme->template->_tpl_vars['translate'] ? $xoTheme->template->_tpl_vars['translate-wpml-no'] : 'No translations available for this page';
        echo '<ul class="wpml-no"><li><a href="#">' . $translate['wpml-no'] . '</a></li></ul>';
    }
}

echo '</div>';

// Main Menu | jQuery content - DO NOT DELETE
echo '<div class="menu_wrapper"></div>';

// social
get_template_part('includes/include', 'social');

echo '</div>';

// #body_overlay
echo '<div id="body_overlay"></div>';
