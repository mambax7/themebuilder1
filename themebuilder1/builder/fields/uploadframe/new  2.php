<? 
 if (file_exists("../../mainfile.php")) {   
include("../../mainfile.php");  
} elseif (file_exists("../../../mainfile.php")) {   
include("../../../mainfile.php");  
} 

//include XOOPS_ROOT_PATH . '/header.php';
global $xoopsDB;

	$sqlt = "SELECT * FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_name = 'cssextra'";
	$css_arr = $xoopsDB -> fetchArray( $xoopsDB -> query( $sqlt ) );
	$unserialise = unserialize($css_arr['conf_value']);
	//var_dump($unserialise);
	
	
	//'boxedfullwidthwrapper' => string '0' 
	$layout = ( ( $unserialise['boxedfullwidthwrapper'] == '0' ) ? 'boxed' : 'full' );
	$this->assign('layout', $layout);
	
	 //'scroll_top_enabled' => string '1'
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
	bottom: 30px;
	margin-left: -150px;
}

#back-top a {
	width: 108px;
	display: block;
	text-align: center;
	font: 11px/100% Arial, Helvetica, sans-serif;
	text-transform: uppercase;
	text-decoration: none;
	color: #bbb;

	/* transition */
	-webkit-transition: 1s;
	-moz-transition: 1s;
	transition: 1s;
}
#back-top a:hover {
	color: #000;
}

/* arrow icon (span tag) */
#back-top span {
	width: 108px;
	height: 108px;
	display: block;
	margin-bottom: 7px;
	background: #ddd url(' . XOOPS_URL . '/themes/themebuilder/icons/up-arrow.png) no-repeat center center;

	/* rounded corners */
	-webkit-border-radius: 15px;
	-moz-border-radius: 15px;
	border-radius: 15px;

	/* transition */
	-webkit-transition: 1s;
	-moz-transition: 1s;
	transition: 1s;
}
#back-top a:hover span {
	background-color: #777;
}
	</style>
	
	
	';
	}else{
	$scrolltop = '';
	}
	$this->assign('scrolltop', $scrolltop);
	
	//'nicescroll' => string '0' 
	if($unserialise['nicescroll'] == '1'){
	$nicescroll ='<script src="http://areaaperta.com/nicescroll/js/jquery.nicescroll.min.js"></script>
	  <script src="http://areaaperta.com/nicescroll/js/jquery.nicescroll.plus.js"></script>
	  
	  <script>
	  $(document).ready(function() {    
		$("html").niceScroll({styler:"fb",cursorcolor:"#000"});

	  });
	</script>';
	}
	$this->assign('nicescroll', $nicescroll);
	
	
	  'facebook_og_enabled' => string '0' 
  'facebook_og_admins' => string '1111111111'
  'facebook_og_app_id' => string '222222222' 
  if($unserialise['facebook_og_enabled'] == '1'){
  
  $this->assign('facebook_og_enabled', $facebook_og_enabled);
$this->assign('facebook_og_admins', $unserialise['facebook_og_admins']);
$this->assign('facebook_og_app_id', $unserialise['facebook_og_app_id']);
  
  
  
  
  }else{}
  
  
    'preloader' => string '1' 
  'preloadertype' => string 'css' 
  'preloadercssloader' => string 'square-jelly-box' 
  'preloadergifloader' => string 'Preloader_14' 
  'preloaderexit_anim' => string 'hinge' 
  'preloaderentrance_anim' => string 'fadeInUp' 
  'preloaderwidth' => string 'la-3x' 
  'preloaderdelay' => string '4000' 
  'preloadertext_spinner' => string 'please wait...' 
  'preloader_anim_color' => string '#ffe8ff' 
  'preloader_background_color' => string '#012417' 
  
$preloader = $unserialise['preloader'];
if ($preloader == '1' ){
	if ($unserialise['preloadertype'] == 'css'){
	$preloadercode = '<link rel="stylesheet" id="pu-css3-spinner-style-css"  href="http://localhost/xoops25777/themes/themebuilder/spinners/css/'.$unserialise['preloadercssloader'].'.min.css" type="text/css" media="all" />
	<link rel="stylesheet" id="pu-animate-style-css"  href="http://localhost/xoops25777/themes/themebuilder/css/animate.min.css" type="text/css" media="all" />
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
	<script type="text/javascript" src="http://localhost/xoops25777/themes/themebuilder/js/pace.min.js"></script>
	<script type="text/javascript">
	var preloader_ultimate_settings = {"spinner":"<div class=\"preloader-ultimate-container\"><div spinner=\"'.$unserialise['preloadercssloader'].'\" class=\"la-'.$unserialise['preloadercssloader'].' center-spin '.$unserialise['preloaderwidth'].'\" spintype=\"'.$unserialise['preloadertype'].'\" style=\"color: '.$unserialise['preloader_anim_color'].';\"><div><\/div><\/div><\/div>","delay":"'.$unserialise['preloaderdelay'].'","type":"'.$unserialise['preloadertype'].'","width":"'.$unserialise['preloaderwidth'].'","duration":"2s","exit_anim":"'.$unserialise['preloaderexit_anim'].'","text_spinner":"'.$unserialise['preloadertext_spinner'].'","entrance":"'.$unserialise['preloaderentrance_anim'].'","entrance_du":"1.5s"};
	</script>
	<script type="text/javascript" src="http://localhost/xoops25777/themes/themebuilder/js/site.js"></script>';

	}elseif ($unserialise['preloadertype'] == 'gif'){
	if($unserialise['preloaderwidth'] == 'la-sm'){$unserialise['preloaderwidth'] = '32'; }
	if($unserialise['preloaderwidth'] == 'la-2x' || $unserialise['preloaderwidth'] == ''){$unserialise['preloaderwidth'] = '64'; }
	if($unserialise['preloaderwidth'] == 'la-3x'){$unserialise['preloaderwidth'] = '128'; }

	$preloadercode = '
	<link rel="stylesheet" id="pu-animate-style-css"  href="http://localhost/xoops25777/themes/themebuilder/css/animate.min.css" type="text/css" media="all" />
	<link rel="stylesheet" id="pu-site-style-css"  href="http://noypitv.com/wp-content/plugins/preloader-ultimate/css/site.css?ver=4.3" type="text/css" media="all" />
	<script type="text/javascript" src="http://localhost/xoops25777/themes/themebuilder/js/pace.min.js"></script>
	<script type="text/javascript">
	var preloader_ultimate_settings = {"spinner":"<div class=\"preloader-ultimate-container\"><img class=\"center-spin\" src=\"http:\/\/localhost\/xoops25777\/themes\/themebuilder\/spinners\/gif\/'.$unserialise['preloaderwidth'].'\/'.$unserialise['preloadergifloader'].'.gif\" spinner=\"'.$unserialise['preloadergifloader'].'\" class=\"center-spin\" spintype=\"gif\" style=\"width: '.$unserialise['preloaderwidth'].'px;\"><\/div>","delay":"'.$unserialise['preloaderdelay'].'","type":"'.$unserialise['preloadertype'].'","width":"'.$unserialise['preloaderwidth'].'","duration":"2s","exit_anim":"'.$unserialise['preloaderexit_anim'].'","text_spinner":"'.$unserialise['preloadertext_spinner'].'","entrance":"'.$unserialise['preloaderentrance_anim'].'","entrance_du":"1.5s"};
	</script>
	<script type="text/javascript" src="http://localhost/xoops25777/themes/themebuilder/js/site.js"></script>';

	}else{


	}
}  
$this->assign('preloader', $preloader);
$this->assign('preloadercode', $preloadercode);
  
  
  
  
  
  'fontsize' => string '14' 
  'fonteffect' => string '5' 
  'font_apercu' => string 'lohitbengali' 
  'body_background_img' => string 'http://localhost/xoops257sample/modules/system/admin/themebuilder/fields/uploadframe/mlib-uploads/full/181-111111.jpg' 
  'body_background_img_position' => string 'no-repeat;center top;;' 
  'body_background_img_size' => string 'cover' 
  'body_background_color' => string '#f0faf8' 
  
  'css_text_extra' => string '' 
  'google_analytique' => string '' 


	
	
	$favicon = $unserialise['fav_ico'];
	$favico_img = $unserialise['fav_ico_img'];
	$jsheader = $unserialise['js_header_text_extra'];
	$jsbody = $unserialise['js_body_text_extra'];
	$font_apercu_blockTitle = $unserialise['font_apercu_blockTitle'];
	$google_analytique = $unserialise['google_analytique'];
	$facebook_og_admins = $unserialise['facebook_og_admins'];
	$facebook_og_app_id = $unserialise['facebook_og_app_id'];
	
	if($unserialise['fonteffect'] != 'none'){
	$effect = '&effect='.$unserialise['fonteffect'].'';
	}else{$effect = '';}

	if($font_apercu_blockTitle != ''){
	$tttt = '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.$unserialise['font_apercu_blockTitle'].''.$effect.'">';
	}
	//var_dump($tttt);
	//var_dump($unserialise['js_header_text_extra']);
	//to add in header or in the footer
	



}
$facebook_og_enabled = $unserialise['facebook_og_enabled'];
//var_dump($unserialise);




$this->assign('favicon', $favicon);
$this->assign('favico_img', $favico_img);
$this->assign('jsheader', $jsheader);
$this->assign('jsbody', $jsbody);




//$this->assign('layout', $layout);






$olives = '<!doctype html>
<{include_php file="file:$xoops_rootpath/themes/$xoops_theme/configuration.inc.php"}>
<html lang="<{$xoops_langcode}>">
<head>
<{assign var=theme_name value=$xoTheme->folderName}>
<meta charset="<{$xoops_charset}>">
<meta name="keywords" content="<{$xoops_meta_keywords}>">
<meta name="description" content="<{$xoops_meta_description}>">
<meta name="robots" content="<{$xoops_meta_robots}>">
<meta name="rating" content="<{$xoops_meta_rating}>">
<meta name="author" content="<{$xoops_meta_author}>">
<meta name="generator" content="XOOPS">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<{if $facebook_og_enabled == "1"}>
	<!-- Facebook graph -->
	<meta property="og:image" content=""/>
	<meta property="og:title" content=""/>
	<meta property="og:type" content="article"/>
	<meta property="og:description" content="<{$xoops_meta_description}> <{$xoops_meta_keywords}>"/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="fb:admins" content="<{$facebook_og_admins}>"/>
	<meta property="fb:app_id" content="<{$facebook_og_app_id}>"/>
<{/if}>

<!-- Favicon -->
    <link rel="shortcut icon" type="image/ico" href="<{$favicon}>" />
    <link rel="icon" type="image/png" href="<{$favico_img}>" />

<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/xoops.css">
<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/reset.css">
<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/codes.css">
<link rel="stylesheet" type="text/css" media="all" href="<{$xoops_themecss}>">
<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/icomoon.css">
<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/megamenu.css">

<script src="<{xoImgUrl}>js/jquery-1.10.2.js"></script>
<script src="<{xoImgUrl}>js/bootstrap.min.js"></script>

<link rel="stylesheet" id="animations-css"  href="<{xoImgUrl}>css/animations.css" type="text/css" media="all" />
<script src="<{xoImgUrl}>js/appear.min.js"></script>
<script src="<{xoImgUrl}>js/animations.js"></script>

<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <script src="<{xoImgUrl}>js/selectivizr-min.js"></script>
<![endif]-->
<script src="<{xoImgUrl}>js/js.js"></script>
<script src="<{xoImgUrl}>js/megamenu.js"></script>
<link rel="alternate" type="application/rss+xml" title="" href="<{xoAppUrl backend.php}>">

<title><{if $xoops_dirname == "system"}><{$xoops_sitename}><{if $xoops_pagetitle !=""}> - <{$xoops_pagetitle}><{/if}><{else}><{if $xoops_pagetitle !=""}><{$xoops_pagetitle}> - <{$xoops_sitename}><{/if}><{/if}></title>

<{$xoops_module_header}>
<script src="<{xoImgUrl}>js/theia-sticky-sidebar.js">  </script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".column_Blockcolumn").theiaStickySidebar({
			additionalMarginTop: 50
		});
	});
</script>

    <!-- Sheet CssEXTRA -->
<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<{xoImgUrl themes/themebuilder/custom-css.php}>" />
	<!-- Sheet CssEXTRA -->
<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<{xoImgUrl themes/themebuilder/widget-css.css}>" />

<{if $nicescroll != ""}>
	<{$nicescroll}>
<{/if}>
<{if $preloader == "1"}>
<{$preloadercode}>
<{/if}>
<{if $scrolltop == "1"}>
<{$scrolltop}>
<{/if}>


	<{$jsheader}>
	<{$tttt}>

</head>
    
<body id="<{$xoops_dirname}>" class="<{$layout}>">';
$olives .= '<div class="container maincontainer">';
$olives .= '
			<{if $scrolltop != ""}>
				<p id="back-top">
					<a href="#top">
						<span class="fa-stack">
						<i class="im-icon-home-2"></i>
						</span>Back to Top
					</a>
				</p>
			<{/if}>';
$olives .= '
	<div class="row">';//supprimer pour le 100%widht

$olives .= '
			';
$olives .= $olive;
$olives .= '
</div>
</div>
'.$iii.'
<{$jsbody}>
</body>
</html>';