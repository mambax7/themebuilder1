<?php 
// page.php ajouter pour simplifier le url. c'est un raccourci du /themes/themebuilder/page.php

include("mainfile.php"); 
include(XOOPS_ROOT_PATH."/header.php");
include(XOOPS_ROOT_PATH."/themes/themebuilder/pagefunction.php");
include(XOOPS_ROOT_PATH."/themes/themebuilder/header.php");

$op = isset($_GET['op']) ? $_GET['op'] : '';

$sqlq = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme' ) . ' WHERE conf_id=' . intval($op);
$resultq = $xoopsDB -> query( $sqlq );
$video_arrt = $xoopsDB -> fetchArray( $resultq );
$terp = unserialize ( $video_arrt['conf_value'] );
//print_r($terp);

echo '<!doctype html>
<html lang="'.$xoTheme->template->_tpl_vars["xoops_langcode"].'">
<head>
<meta charset="'.$xoTheme->template->_tpl_vars["xoops_charset"].'">
<meta name="keywords" content="'.$xoTheme->metas['meta']['keywords'].'">
<meta name="description" content="'.$xoTheme->metas['meta']['description'].'">
<meta name="robots" content="'.$xoTheme->metas['meta']['robots'].'">
<meta name="rating" content="'.$xoTheme->metas['meta']['rating'].'">
<meta name="author" content="'.$xoTheme->metas['meta']['author'].'">
<meta name="generator" content="XOOPS">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Owl Carousel Assets -->
<link href="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'js/owl/owl.carousel.css" rel="stylesheet">
<link href="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'js/owl/owl.theme.css" rel="stylesheet">

<link href="'.$xoTheme->template->_tpl_vars["xoops_url"].'/favicon.ico" rel="shortcut icon">
<link rel="stylesheet" type="text/css" href="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'css/xoops.css">
<link rel="stylesheet" type="text/css" href="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'css/reset.css">
<link rel="stylesheet" type="text/css" href="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'/css/codes.css">
<link rel="stylesheet" type="text/css" href="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'/css/icomoon.css">
<link rel="stylesheet" type="text/css" href="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'/css/megamenu.css">
<link rel="stylesheet" type="text/css" media="all" href="'.$xoTheme->template->_tpl_vars["xoops_themecss"].'">
<script src="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'js/jquery-1.10.2.js"></script>
<script src="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'js/bootstrap.min.js"></script>

<link rel="stylesheet" id="animations-css"  href="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'css/animations.css" type="text/css" media="all" />
<script src="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'js/appear.min.js"></script>
<script src="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'js/animations.js"></script>

<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <script src="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'js/selectivizr-min.js"></script>
<![endif]-->
<script src="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'js/js.js"></script>
<link rel="alternate" type="application/rss+xml" title="" href="'.$xoTheme->template->_tpl_vars["xoops_url"].'/backend.php">
<!-- Sheet CssEXTRA -->
    <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'custom-css.php" />
		<!-- Sheet CssEXTRA -->
    <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="'.$xoTheme->template->_tpl_vars["xoops_imageurl"].'/widget-css.css" />

<title>
'.$video_arrt['conf_title'].'
</title>

'.$preloadercode.'

</head>';    
echo '<body id="'.$xoTheme->template->_tpl_vars["xoops_dirname"].'"><div class="container maincontainer">';
//echo $header;
	mfn_builder_item( $terp );
echo '</div></body>';
?>