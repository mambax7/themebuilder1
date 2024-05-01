<?php

// Search
$header_search = $xoTheme->template->_tpl_vars['header-search'];

// Action Button
$action_link = $xoTheme->template->_tpl_vars['header-action-link'];

// WPML Icon
if ($xoTheme->template->_tpl_vars['header-wpml'] != 'hide') {
    $wpml_icon = true;
} else {
    $wpml_icon = false;
}

if ($header_search || $action_link || $wpml_icon) {
    echo '<div class="top_bar_right">';
    echo '<div class="top_bar_right_wrapper">';

    // Search Icon
    if ($header_search == 'input') {
        $translate['search-placeholder'] = $xoTheme->template->_tpl_vars['translate'] ? $xoTheme->template->_tpl_vars['translate-search-placeholder'] : 'Enter your search';

        echo '<a id="search_button" class="has-input">';
        echo '<form method="get" id="searchform" action="home_url">';

        echo '<i class="icon-search-fine"></i>';
        echo '<input type="text" class="field" name="s" placeholder="' . $translate['search-placeholder'] . '" />';

        //do_action( 'wpml_add_language_form_field' );

        echo '<input type="submit" class="submit" value="" style="display:none;" />';

        echo '</form>';
        echo '</a>';
    } elseif ($header_search) {
        echo '<a id="search_button" href="#"><i class="icon-search-fine"></i></a>';
    }

    // Languages menu
    //get_template_part( 'includes/include', 'wpml' );
    include(XOOPS_ROOT_PATH . "/themes/themebuilder1/include/header/include-wpml.php");

    // Action Button
    if ($action_link) {
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

    echo '</div>';
    echo '</div>';
}
