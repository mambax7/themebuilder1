<?php

if ($xoTheme->template->_tpl_vars['sliding-top']) {
    $st_class = 'st-' . $xoTheme->template->_tpl_vars['sliding-top'];

    echo '<div id="Sliding-top" class="' . $st_class . '">';

    echo '<div class="widgets_wrapper">';
    echo '<div class="container">';

    $sidebars_count = 0;
    for ($i = 1; $i <= 4; $i++) {
        //if ( is_active_sidebar( 'top-area-'. $i ) ) $sidebars_count++;
    }

    $sidebar_class = '';
    if ($sidebars_count > 0) {
        $sidebar_class = match ($sidebars_count) {
            2 => 'one-second',
            3 => 'one-third',
            4 => 'one-fourth',
            default => 'one',
        };
    }

    for ($i = 1; $i <= 4; $i++) {
        /*if ( is_active_sidebar( 'top-area-'. $i ) ){
            echo '<div class="'. $sidebar_class .' column">';
                dynamic_sidebar( 'top-area-'. $i );
            echo '</div>';
        }*/
    }

    echo '</div>';
    echo '</div>';

    echo '<a href="#" class="sliding-top-control"><span><i class="plus ' . $xoTheme->template->_tpl_vars['sliding-top-icon'] . '"></i><i class="minus icon-up-open-mini"></i></span></a>';
    echo '</div>';
}
