<?php $translate['wpml-no'] = $xoTheme->template->_tpl_vars['translate'] ? $xoTheme->template->_tpl_vars['translate-wpml-no'] : 'No translations available for this page'; ?>

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
                //if( has_nav_menu( 'social-menu' ) ){
                //mfn_wp_social_menu();
                //} else {
                //get_template_part( 'includes/include', 'social' );
                include(XOOPS_ROOT_PATH . "/themes/themebuilder1/include/header/include-social.php");
                //}
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
    echo '<nav id="menu">
				<ul id="menu-main-menu" class="menu menu-main">
					<li id="menu-item-104" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item"><a href="http://"><span>Home</span></a></li>
					<li id="menu-item-118" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="http://"><span>Products</span></a></li>
					<li id="menu-item-116" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="https://"><span>Local centres</span></a></li>
					<li id="menu-item-114" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="http://"><span>Articles</span></a></li>
					<li id="menu-item-117" class="menu-item menu-item-type-post_type menu-item-object-page last"><a href="http://"><span>Contact</span></a></li>
					<li id="menu-item-120" class="menu-item menu-item-type-custom menu-item-object-custom last"><a target="_blank" href="http://"><span><span style="padding: 0; color: #44779b;">Visit now</span></span></a></li>
				</ul>
			</nav>';
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
                <?php
                //get_template_part( 'includes/include', 'logo' );
                include(XOOPS_ROOT_PATH . "/themes/themebuilder1/include/header/include-logo.php");
                ?>

                <div class="menu_wrapper">
                    <?php
                    if ((mfn_header_style(true) != 'header-overlay') && ($xoTheme->template->_tpl_vars['menu-style'] != 'hide')) {
                        // #menu --------------------------
                        if (in_array(mfn_header_style(), ['header-split', 'header-split header-semi', 'header-below header-split'])) {
                            //mfn_wp_split_menu();
                            echo 'menu1';
                        } else {
                            mfn_wp_nav_menu();
                            /*echo '<nav id="menu">
                                    <ul id="menu-main-menu" class="menu menu-main">
                                        <li id="menu-item-104" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item"><a href="http://"><span>Home</span></a></li>
                                        <li id="menu-item-118" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="http://"><span>Products</span></a></li>
                                        <li id="menu-item-116" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="https://"><span>Local centres</span></a></li>
                                        <li id="menu-item-114" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="http://"><span>Articles</span></a></li>
                                        <li id="menu-item-117" class="menu-item menu-item-type-post_type menu-item-object-page last"><a href="http://"><span>Contact</span></a></li>
                                        <li id="menu-item-120" class="menu-item menu-item-type-custom menu-item-object-custom last"><a target="_blank" href="http://"><span><span style="padding: 0; color: #44779b;">Visit now</span></span></a></li>
                                    </ul>
                                </nav>';*/
                        }

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
                    <?php
                    //mfn_wp_secondary_menu();
                    echo 'menusecondary';
                    ?>
                </div>

                <div class="banner_wrapper">
                    <?php echo $xoTheme->template->_tpl_vars['header-banner']; ?>
                </div>

                <div class="search_wrapper">
                    <!-- #searchform -->

                    <?php
                    //get_search_form( true );
                    echo 'search';

                    ?>
                    <form role="search" method="get" id="searchform" class="searchform" action="">
                        <div>
                            <label class="screen-reader-text" for="s">Search for:</label>
                            <input type="text" value="" name="s" id="s"/>
                            <input type="submit" id="searchsubmit" value="Search"/>
                        </div>
                    </form>

                </div>

            </div>

            <?php
            if (!$xoTheme->template->_tpl_vars['top-bar-right-hide']) {
                //get_template_part( 'includes/header', 'top-bar-right' );
                include(XOOPS_ROOT_PATH . "/themes/themebuilder1/include/header/header-top-bar-right.php");
            }
            ?>

        </div>
    </div>
</div>
