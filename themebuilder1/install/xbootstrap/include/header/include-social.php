<?php
/**
 * Social Icons
 */

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
