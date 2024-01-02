<?php
/**
 * The template for displaying the footer.
 <{include_php file="file:$xoops_rootpath/themes/$xoops_theme/include/footer.php"}>
*/
global $xoopsDB, $xoopsTpl, $xoTheme;
$back_to_top_class = $xoTheme->template->_tpl_vars['back-top-top'];
//var_dump($xoTheme->template->_tpl_vars);
//var_dump($xoTheme->template->_tpl_vars['layout']);
//$xoopsTpl->assign('layoutt', 'hhhhhddddddd');

if( $back_to_top_class == 'hide' ){
	$back_to_top_position = false;
} elseif( strpos( $back_to_top_class, 'sticky' ) !== false ){
	$back_to_top_position = 'body';
} elseif( $xoTheme->template->_tpl_vars['footer-hide'] == 1 ){
	$back_to_top_position = 'footer';
} else {
	$back_to_top_position = 'copyright';
}

?>


<?php if( 'hide' != $xoTheme->template->_tpl_vars[ 'footer-style' ] ): ?>
	<!-- #Footer -->
	<footer id="Footer" class="clearfix">

		<?php if ( $footer_call_to_action = $xoTheme->template->_tpl_vars[ 'footer-call-to-action' ] ): ?>
		<div class="footer_action">
			<div class="container">
				<div class="column one column_column">
					<?php echo $footer_call_to_action; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php
			$sidebars_count = 0;
			for( $i = 1; $i <= 5; $i++ ){
				//if ( is_active_sidebar( 'footer-area-'. $i ) ) $sidebars_count++;
			}

			if( $sidebars_count > 0 ){

				$footer_style = '';

				if( $xoTheme->template->_tpl_vars[ 'footer-padding' ] ){
					$footer_style .= 'padding:'. $xoTheme->template->_tpl_vars[ 'footer-padding' ] .';';
				}

				echo '<div class="widgets_wrapper" style="'. $footer_style .'">';
					echo '<div class="container">';

						if( $footer_layout = $xoTheme->template->_tpl_vars[ 'footer-layout' ] ){
							// Theme Options

							$footer_layout 	= explode( ';', $footer_layout );
							$footer_cols 	= $footer_layout[0];

							for( $i = 1; $i <= $footer_cols; $i++ ){
								if ( is_active_sidebar( 'footer-area-'. $i ) ){
									echo '<div class="column '. $footer_layout[$i] .'">';
										dynamic_sidebar( 'footer-area-'. $i );
									echo '</div>';
								}
							}

						} else {
							// Default - Equal Width

							$sidebar_class = '';
							switch( $sidebars_count ){
								case 2: $sidebar_class = 'one-second'; break;
								case 3: $sidebar_class = 'one-third'; break;
								case 4: $sidebar_class = 'one-fourth'; break;
								case 5: $sidebar_class = 'one-fifth'; break;
								default: $sidebar_class = 'one';
							}

							for( $i = 1; $i <= 5; $i++ ){
								if ( is_active_sidebar( 'footer-area-'. $i ) ){
									echo '<div class="column '. $sidebar_class .'">';
										dynamic_sidebar( 'footer-area-'. $i );
									echo '</div>';
								}
							}

						}

					echo '</div>';
				echo '</div>';
			}
		?>

		<?php if( $xoTheme->template->_tpl_vars['footer-hide'] != 1 ): ?>

			<div class="footer_copy">
				<div class="container">
					<div class="column one">

						<?php
							if( $back_to_top_position == 'copyright' ){
								echo '<a id="back_to_top" class="button button_js" href=""><i class="icon-up-open-big"></i></a>';
							}
						?>

						<!-- Copyrights -->
						<div class="copyright">
							<?php
								if( $xoTheme->template->_tpl_vars[ 'footer-copy' ] ){
									echo $xoTheme->template->_tpl_vars[ 'footer-copy' ];
								} else {
									echo '&copy; '. date( 'Y' ) .' '. 'name' .'. All Rights Reserved. <a target="_blank" rel="nofollow" href="https://arabesk125.net">Theme Builder Xoops</a>';
								}
							?>
						</div>

						<?php
							/*if( has_nav_menu( 'social-menu-bottom' ) ){
								mfn_wp_social_menu_bottom();
							} else {
								get_template_part( 'includes/include', 'social' );
							}*/
$target = $xoTheme->template->_tpl_vars[ 'social-target' ] ? 'target="_blank"' : false;

echo '<ul class="social">';

	if( $xoTheme->template->_tpl_vars['social-skype'] ) echo '<li class="skype"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-skype'] .'" title="Skype"><i class="icon-skype"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-whatsapp'] ) echo '<li class="whatsapp"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-whatsapp'] .'" title="WhatsApp"><i class="icon-whatsapp"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-facebook'] ) echo '<li class="facebook"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-facebook'] .'" title="Facebook"><i class="icon-facebook"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-googleplus'] ) echo '<li class="googleplus"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-googleplus'] .'" title="Google+"><i class="icon-gplus"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-twitter'] ) echo '<li class="twitter"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-twitter'] .'" title="Twitter"><i class="icon-twitter"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-vimeo'] ) echo '<li class="vimeo"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-vimeo'] .'" title="Vimeo"><i class="icon-vimeo"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-youtube'] ) echo '<li class="youtube"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-youtube'] .'" title="YouTube"><i class="icon-play"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-flickr'] ) echo '<li class="flickr"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-flickr'] .'" title="Flickr"><i class="icon-flickr"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-linkedin'] ) echo '<li class="linkedin"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-linkedin'] .'" title="LinkedIn"><i class="icon-linkedin"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-pinterest'] ) echo '<li class="pinterest"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-pinterest'] .'" title="Pinterest"><i class="icon-pinterest"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-dribbble'] ) echo '<li class="dribbble"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-dribbble'] .'" title="Dribbble"><i class="icon-dribbble"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-instagram'] ) echo '<li class="instagram"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-instagram'] .'" title="Instagram"><i class="icon-instagram"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-behance'] ) echo '<li class="behance"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-behance'] .'" title="Behance"><i class="icon-behance"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-tumblr'] ) echo '<li class="tumblr"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-tumblr'] .'" title="Tumblr"><i class="icon-tumblr"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-tripadvisor'] ) echo '<li class="tripadvisor"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-tripadvisor'] .'" title="TripAdvisor"><i class="icon-tripadvisor"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-vkontakte'] ) echo '<li class="vkontakte"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-vkontakte'] .'" title="VKontakte"><i class="icon-vkontakte"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-viadeo'] ) echo '<li class="viadeo"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-viadeo'] .'" title="Viadeo"><i class="icon-viadeo"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-xing'] ) echo '<li class="xing"><a '.$target.' href="'. $xoTheme->template->_tpl_vars['social-xing'] .'" title="Xing"><i class="icon-xing"></i></a></li>';
	if( $xoTheme->template->_tpl_vars['social-rss'] ) echo '<li class="rss"><a '.$target.' href="'. 'rss2_url' .'" title="RSS"><i class="icon-rss"></i></a></li>';

	if( $xoTheme->template->_tpl_vars[ 'social-custom-icon' ] &&  $xoTheme->template->_tpl_vars[ 'social-custom-link' ] ){
		echo '<li class="custom"><a '.$target.' href="'. $xoTheme->template->_tpl_vars[ 'social-custom-link' ] .'"><i class="'. $xoTheme->template->_tpl_vars[ 'social-custom-icon' ] .'"></i></a></li>';
	}

echo '</ul>';
						?>

					</div>
				</div>
			</div>

		<?php endif; ?>

		<?php
			if( $back_to_top_position == 'footer' ){
				echo '<a id="back_to_top" class="button button_js in_footer" href=""><i class="icon-up-open-big"></i></a>';
			}
		?>

	</footer>
<?php endif; ?>

</div><!-- #Wrapper -->

<?php
	// Responsive | Side Slide
	if( $xoTheme->template->_tpl_vars[ 'responsive-mobile-menu' ] ){
		//get_template_part( 'includes/header', 'side-slide' );
		include( XOOPS_ROOT_PATH . "/themes/themebuilder1/include/header/header-side-slide.php" );
	}
?>

<?php
	if( $back_to_top_position == 'body' ){
		echo '<a id="back_to_top" class="button button_js '. $back_to_top_class .'" href=""><i class="icon-up-open-big"></i></a>';
	}
?>

<?php if( $xoTheme->template->_tpl_vars['popup-contact-form'] ): ?>
	<div id="popup_contact">
		<a class="button button_js" href="#"><i class="<?php echo $xoTheme->template->_tpl_vars['popup-contact-form-icon']; ?>"></i></a>
		<div class="popup_contact_wrapper">
			<?php echo $xoTheme->template->_tpl_vars['popup-contact-form']; ?>
			<span class="arrow"></span>
		</div>
	</div>
<?php endif; ?>


</body>
</html>
