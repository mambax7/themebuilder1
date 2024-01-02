<?php
	$translate['wpml-no'] = $xoTheme->template->_tpl_vars['translate'] ? $xoTheme->template->_tpl_vars['translate-wpml-no'] : 'No translations available for this page';

	$creative_classes = '';
	$creative_options = $xoTheme->template->_tpl_vars[ 'menu-creative-options' ];

	if( is_array( $creative_options ) ){

		if( isset( $creative_options['scroll'] ) ){
			$creative_classes .= ' scroll';
		}
		if( isset( $creative_options['dropdown'] ) ){
			$creative_classes .= ' dropdown';
		}

	}
?>

<div id="Header_creative" class="<?php echo $creative_classes; ?>">
	<a href="#" class="creative-menu-toggle"><i class="icon-menu-fine"></i></a>

	<?php
		echo '<div class="creative-social">';
			include( XOOPS_ROOT_PATH . "/themes/themebuilder1/include/header/include-social.php" );
		echo '</div>';
	?>

	<div class="creative-wrapper">

		<!-- .header_placeholder 4sticky  -->
		<div class="header_placeholder"></div>

		<div id="Top_bar">
			<div class="one clearfix">

				<div class="top_bar_left">

					<!-- Logo -->
					<?php include( XOOPS_ROOT_PATH . "/themes/themebuilder1/include/header/include-logo.php" ); ?>

					<div class="menu_wrapper">
						<?php
							// #menu --------------------------
							//mfn_wp_nav_menu();

							$mb_class = '';
							if( $xoTheme->template->_tpl_vars['header-menu-mobile-sticky'] ) $mb_class .= ' is-sticky';

							// responsive menu button ---------
							echo '<a class="responsive-menu-toggle '. $mb_class .'" href="#">';
								if( $menu_text = $xoTheme->template->_tpl_vars[ 'header-menu-text' ] ){
									echo '<span>'. $menu_text .'</span>';
								} else {
									echo '<i class="icon-menu-fine"></i>';
								}
							echo '</a>';
						?>
					</div>

					<div class="search_wrapper">

						<!-- #searchform -->
						<?php $translate['search-placeholder'] = $xoTheme->template->_tpl_vars['translate'] ? $xoTheme->template->_tpl_vars['translate-search-placeholder'] : 'Enter your search'; ?>
						<form method="get" id="searchform" action="<?php echo 'home_url'; ?>">

							<?php if( $xoTheme->template->_tpl_vars['header-search'] == 'shop' ): ?>
								<input type="hidden" name="post_type" value="product" />
							<?php endif;?>

							<i class="icon_search icon-search-fine"></i>
							<a href="#" class="icon_close"><i class="icon-cancel-fine"></i></a>

							<input type="text" class="field" name="s" id="s" placeholder="<?php echo $translate['search-placeholder']; ?>" />
							<?php 
								//do_action( 'wpml_add_language_form_field' ); 
							?>

							<input type="submit" class="submit" value="" style="display:none;" />

						</form>

					</div>

				</div>

				<?php include( XOOPS_ROOT_PATH . "/themes/themebuilder1/include/header/header-top-bar-right.php" ); ?>

				<div class="banner_wrapper">
					<?php echo $xoTheme->template->_tpl_vars[ 'header-banner' ]; ?>
				</div>

			</div>
		</div>

		<div id="Action_bar">
			<?php include( XOOPS_ROOT_PATH . "/themes/themebuilder1/include/header/include-social.php" ); ?>
		</div>

	</div>

</div>
