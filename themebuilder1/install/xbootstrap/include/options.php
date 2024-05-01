<?php

if (file_exists("../../mainfile.php")) {
    include("../../mainfile.php");
} elseif (file_exists("../../../mainfile.php")) {
    include("../../../mainfile.php");
}

//include XOOPS_ROOT_PATH . '/header.php';
global $xoopsDB, $xoopsTpl, $xoTheme;

$sqlt    = "SELECT * FROM " . $xoopsDB->prefix("config_theme") . " WHERE conf_name = 'themebuilder_options'";
$css_arr = $xoopsDB->fetchArray($xoopsDB->query($sqlt));
//$unserialise = unserialize($css_arr['conf_value']);

$unserialise = unserialize(call_user_func('base' . '64_decode', $css_arr['conf_value']));

if (is_array($unserialise)) {
    foreach ($unserialise as $ka => $smarty) {
        //var_dump($ka);
        $xoopsTpl->assign($ka, $smarty);
    }
}
//var_dump($xoTheme->template->_tpl_vars['preloadertype']);
if ($xoTheme->template->_tpl_vars['preloadertype'] == 'css') {
    $preloadercode = '<link rel="stylesheet" id="pu-css3-spinner-style-css"  href="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . '/spinners/css/' . $xoTheme->template->_tpl_vars['preloadercssloader'] . '.min.css" type="text/css" media="all" />
	<link rel="stylesheet" id="pu-animate-style-css"  href="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . '/css/animate.min.css" type="text/css" media="all" />
<style>
body.preloader-ultimate:before {
	content: "";
	display: block;
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  right: 0; 
	bottom: 0;
  z-index: 1000000;
  background-color: ' . $xoTheme->template->_tpl_vars['preloader_background_color'] . ';
}
.preloader-ultimate-container{
	background-color: ' . $xoTheme->template->_tpl_vars['preloader_background_color'] . ';
	width: 100%;
	height: 100%;
	position: fixed;
	top: 0; 
	left: 0; 
	right: 0; 
	bottom: 0;
 	z-index: 1000000;
  line-height: 0;
}
.center-spin{
  position: absolute !important;
  top: 0; left: 0; bottom: 0; right: 0;
  margin: auto;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.preloader-text{
  height: 20px;
  text-align: center;
}
</style>
	<script type="text/javascript" src="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . '/js/pace.min.js"></script>
	<script type="text/javascript">
	var preloader_ultimate_settings = {"spinner":"<div class=\"preloader-ultimate-container\"><div spinner=\"' . $xoTheme->template->_tpl_vars['preloadercssloader'] . '\" class=\"la-' . $xoTheme->template->_tpl_vars['preloadercssloader'] . ' center-spin ' . $xoTheme->template->_tpl_vars['preloaderwidth'] . '\" spintype=\"' . $xoTheme->template->_tpl_vars['preloadertype'] . '\" style=\"color: ' . $xoTheme->template->_tpl_vars['preloader_anim_color'] . ';\"><div><\/div><\/div><\/div>","delay":"' . $xoTheme->template->_tpl_vars['preloaderdelay'] . '","type":"' . $xoTheme->template->_tpl_vars['preloadertype'] . '","width":"' . $xoTheme->template->_tpl_vars['preloaderwidth'] . '","duration":"2s","exit_anim":"' . $xoTheme->template->_tpl_vars['preloaderexit_anim'] . '","text_spinner":"' . $xoTheme->template->_tpl_vars['preloadertext_spinner'] . '","entrance":"' . $xoTheme->template->_tpl_vars['preloaderentrance_anim'] . '","entrance_du":"1.5s"};
	</script>
	<script type="text/javascript" src="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . '/js/site.js"></script>';
} elseif ($xoTheme->template->_tpl_vars['preloadertype'] == 'gif') {
    if ($xoTheme->template->_tpl_vars['preloaderwidth'] == 'la-sm') {
        $xoTheme->template->_tpl_vars['preloaderwidth'] = '32';
    }
    if ($xoTheme->template->_tpl_vars['preloaderwidth'] == 'la-2x' || $xoTheme->template->_tpl_vars['preloaderwidth'] == '') {
        $xoTheme->template->_tpl_vars['preloaderwidth'] = '64';
    }
    if ($xoTheme->template->_tpl_vars['preloaderwidth'] == 'la-3x') {
        $xoTheme->template->_tpl_vars['preloaderwidth'] = '128';
    }

    $preloadercode = '
	<link rel="stylesheet" id="pu-animate-style-css"  href="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . '/css/animate.min.css" type="text/css" media="all" />
	<link rel="stylesheet" id="pu-site-style-css"  href="http://noypitv.com/wp-content/plugins/preloader-ultimate/css/site.css?ver=4.3" type="text/css" media="all" />
	<script type="text/javascript" src="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . '/js/pace.min.js"></script>
	<script type="text/javascript">
	var preloader_ultimate_settings = {"spinner":"<div class=\"preloader-ultimate-container\"><img class=\"center-spin\" src=\"http:\/\/localhost\/xoops25777\/themes\/themebuilder\/spinners\/gif\/' . $xoTheme->template->_tpl_vars['preloaderwidth'] . '\/' . $xoTheme->template->_tpl_vars['preloadergifloader'] . '.gif\" spinner=\"' . $xoTheme->template->_tpl_vars['preloadergifloader'] . '\" class=\"center-spin\" spintype=\"gif\" style=\"width: ' . $xoTheme->template->_tpl_vars['preloaderwidth'] . 'px;\"><\/div>","delay":"' . $xoTheme->template->_tpl_vars['preloaderdelay'] . '","type":"' . $xoTheme->template->_tpl_vars['preloadertype'] . '","width":"' . $xoTheme->template->_tpl_vars['preloaderwidth'] . '","duration":"2s","exit_anim":"' . $xoTheme->template->_tpl_vars['preloaderexit_anim'] . '","text_spinner":"' . $xoTheme->template->_tpl_vars['preloadertext_spinner'] . '","entrance":"' . $xoTheme->template->_tpl_vars['preloaderentrance_anim'] . '","entrance_du":"1.5s"};
	</script>
	<script type="text/javascript" src="' . $xoTheme->template->_tpl_vars["xoops_imageurl"] . '/js/site.js"></script>';
}
$xoopsTpl->assign('preloadercode', $preloadercode);

$terp1 = '222222';

function mfn_print1($terp1)
{
    return ($terp1);
}

$xoopsTpl->assign('ok', mfn_print1($terp1));
//echo $xoopsTpl->_tpl_vars['ok'];
/*
	$layout = ( ( $unserialise['boxedfullwidthwrapper'] == '0' ) ? 'boxed' : 'full' );

	
	if ( class_exists ( 'xoopsTpl' )) {
	$xoopsTpl->assign('test', 'yyyhhhhhhedhhewdkejhbb  bwqhegu zguzegfuuwzguzergfuzgeur');
	
	$xoopsTpl->assign('layout', $layout);
	}


	if($unserialise['scroll_top_enabled'] == '1'){
	$scrolltop = '
	<script>
$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$("#back-top").fadeIn();
			} else {
				$("#back-top").fadeOut();
			}
		});

		// scroll body to 0px on click
		$("#back-top a").click(function () {
			$("body,html").animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
	
	<style>
#back-top {
	position: fixed;
	z-index: 99999;
	bottom: 30px;
	margin: 50px;
}

#back-top a {
	width: 108px;
	display: block;
	text-align: center;
	font: 11px/100% Arial, Helvetica, sans-serif;
	text-transform: uppercase;
	text-decoration: none;
	color: #bbb;

	-webkit-transition: 1s;
	-moz-transition: 1s;
	transition: 1s;
}
#back-top a:hover {
	color: #000;
}

#back-top span {
	width: 108px;
	height: 108px;
	display: block;
	margin-bottom: 7px;
	background: #ddd url(' . XOOPS_URL . '/themes/themebuilder/icons/up-arrow.png) no-repeat center center;

	-webkit-border-radius: 15px;
	-moz-border-radius: 15px;
	border-radius: 15px;

	-webkit-transition: 1s;
	-moz-transition: 1s;
	transition: 1s;
}
#back-top a:hover span {
	background-color: #777;
}
	</style>
	
	
	';
	$xoopsTpl->assign('scrolltopactive', '1');
	$xoopsTpl->assign('scrolltop', $scrolltop);
	}else{
	$xoopsTpl->assign('scrolltop', '');
	}
	
	
	
	
	
	//'nicescroll' => string '0' 
	if($unserialise['nicescroll'] == '1'){
	$nicescroll ='<script src="http://areaaperta.com/nicescroll/js/jquery.nicescroll.min.js"></script>
	  <script src="http://areaaperta.com/nicescroll/js/jquery.nicescroll.plus.js"></script>
	  
	  <script>
	  $(document).ready(function() {    
		$("html").niceScroll({styler:"fb",cursorcolor:"#000"});

	  });
	</script>';
	$xoopsTpl->assign('nicescrollactive', '1');
	$xoopsTpl->assign('nicescroll', $nicescroll);
	}else{
	$xoopsTpl->assign('nicescrollactive', '0');
	$xoopsTpl->assign('nicescroll', '');
	}
	









$facebook_og_enabled = $unserialise['facebook_og_enabled'];
//var_dump($unserialise);

if ($unserialise['preloader'] == '1' ){
	if ($unserialise['preloadertype'] == 'css'){
	$preloadercode = '<link rel="stylesheet" id="pu-css3-spinner-style-css"  href="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'/spinners/css/'.$unserialise['preloadercssloader'].'.min.css" type="text/css" media="all" />
	<link rel="stylesheet" id="pu-animate-style-css"  href="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'/css/animate.min.css" type="text/css" media="all" />
<style>
body.preloader-ultimate:before {
	content: "";
	display: block;
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  right: 0; 
	bottom: 0;
  z-index: 1000000;
  background-color: '.$unserialise['preloader_background_color'].';
}
.preloader-ultimate-container{
	background-color: '.$unserialise['preloader_background_color'].';
	width: 100%;
	height: 100%;
	position: fixed;
	top: 0; 
	left: 0; 
	right: 0; 
	bottom: 0;
 	z-index: 1000000;
  line-height: 0;
}
.center-spin{
  position: absolute !important;
  top: 0; left: 0; bottom: 0; right: 0;
  margin: auto;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.preloader-text{
  height: 20px;
  text-align: center;
}
</style>
	<script type="text/javascript" src="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'/js/pace.min.js"></script>
	<script type="text/javascript">
	var preloader_ultimate_settings = {"spinner":"<div class=\"preloader-ultimate-container\"><div spinner=\"'.$unserialise['preloadercssloader'].'\" class=\"la-'.$unserialise['preloadercssloader'].' center-spin '.$unserialise['preloaderwidth'].'\" spintype=\"'.$unserialise['preloadertype'].'\" style=\"color: '.$unserialise['preloader_anim_color'].';\"><div><\/div><\/div><\/div>","delay":"'.$unserialise['preloaderdelay'].'","type":"'.$unserialise['preloadertype'].'","width":"'.$unserialise['preloaderwidth'].'","duration":"2s","exit_anim":"'.$unserialise['preloaderexit_anim'].'","text_spinner":"'.$unserialise['preloadertext_spinner'].'","entrance":"'.$unserialise['preloaderentrance_anim'].'","entrance_du":"1.5s"};
	</script>
	<script type="text/javascript" src="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'/js/site.js"></script>';

	}elseif ($unserialise['preloadertype'] == 'gif'){
	if($unserialise['preloaderwidth'] == 'la-sm'){$unserialise['preloaderwidth'] = '32'; }
	if($unserialise['preloaderwidth'] == 'la-2x' || $unserialise['preloaderwidth'] == ''){$unserialise['preloaderwidth'] = '64'; }
	if($unserialise['preloaderwidth'] == 'la-3x'){$unserialise['preloaderwidth'] = '128'; }

	$preloadercode = '
	<link rel="stylesheet" id="pu-animate-style-css"  href="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'/css/animate.min.css" type="text/css" media="all" />
	<link rel="stylesheet" id="pu-site-style-css"  href="http://noypitv.com/wp-content/plugins/preloader-ultimate/css/site.css?ver=4.3" type="text/css" media="all" />
	<script type="text/javascript" src="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'/js/pace.min.js"></script>
	<script type="text/javascript">
	var preloader_ultimate_settings = {"spinner":"<div class=\"preloader-ultimate-container\"><img class=\"center-spin\" src=\"http:\/\/localhost\/xoops25777\/themes\/themebuilder\/spinners\/gif\/'.$unserialise['preloaderwidth'].'\/'.$unserialise['preloadergifloader'].'.gif\" spinner=\"'.$unserialise['preloadergifloader'].'\" class=\"center-spin\" spintype=\"gif\" style=\"width: '.$unserialise['preloaderwidth'].'px;\"><\/div>","delay":"'.$unserialise['preloaderdelay'].'","type":"'.$unserialise['preloadertype'].'","width":"'.$unserialise['preloaderwidth'].'","duration":"2s","exit_anim":"'.$unserialise['preloaderexit_anim'].'","text_spinner":"'.$unserialise['preloadertext_spinner'].'","entrance":"'.$unserialise['preloaderentrance_anim'].'","entrance_du":"1.5s"};
	</script>
	<script type="text/javascript" src="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'/js/site.js"></script>';

	}else{


	}
	$xoopsTpl->assign('preloader', '1');
	$xoopsTpl->assign('preloadercode', $preloadercode);

}else{
	$xoopsTpl->assign('preloader', '0');
	$xoopsTpl->assign('preloadercode', '');
}

if($unserialise['facebook_og_enabled'] == '1'){
	$xoopsTpl->assign('facebook_og_enabled', '1');
	$xoopsTpl->assign('facebook_og_admins', $unserialise['facebook_og_admins']);
	$xoopsTpl->assign('facebook_og_app_id', $unserialise['facebook_og_app_id']);
}else{
	$xoopsTpl->assign('facebook_og_enabled', '0');
	$xoopsTpl->assign('facebook_og_admins', '');
	$xoopsTpl->assign('facebook_og_app_id', '');
}



if($unserialise['body_background_img'] != ''){
$section_bg_attr = explode(';', $unserialise['body_background_img_position']);
	$css ='<style>
		body {
			color: #000;
			background-color: '.$unserialise['body_background_color'].';
			background-image:url('.$unserialise['body_background_img'].');
			background-repeat: '.$section_bg_attr[0].';
			background-attachment:scroll;
			background-position:'.$section_bg_attr[1].';
			background-size:'.$unserialise['body_background_img_size'].';
			-webkit-background-size:'.$unserialise['body_background_img_size'].';
			}
			</style>';
			$xoopsTpl->assign('css', $css);
}



	$favicon = $unserialise['fav_ico'];
	$favico_img = $unserialise['fav_ico_img'];
	$jsheader = $unserialise['js_header_text_extra'];
	$jsbody = $unserialise['js_body_text_extra'];
	$font_apercu_blockTitle = $unserialise['font_apercu_blockTitle'];
	$google_analytique = $unserialise['google_analytique'];
	
	if($unserialise['fonteffect'] != 'none'){
	$effect = '&effect='.$unserialise['fonteffect'].'';
	}else{$effect = '';}

	if($font_apercu_blockTitle != ''){
	$tttt = '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.$unserialise['font_apercu_blockTitle'].''.$effect.'">';
	}
	//var_dump($tttt);
	//var_dump($unserialise['js_header_text_extra']);
	//to add in header or in the footer
	
	
$xoopsTpl->assign('favicon', $favicon);
$xoopsTpl->assign('favico_img', $favico_img);
$xoopsTpl->assign('jsheader', $jsheader);
$xoopsTpl->assign('jsbody', $jsbody);
echo '<pre>';
 //print_r($unserialise);
 echo '</pre>';
*/

?>
