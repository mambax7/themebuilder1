<?php
//$this->assign('hhhrrrrrrrrrrrrtttttttttttttttttt', ${'header'});
global $xoTheme;
?>
<!doctype html>
<html lang="<{$xoops_langcode}>">
<head>
    <meta charset="<?php echo $xoTheme->template->_tpl_vars["xoops_charset"] ?>">
    <meta name="keywords" content="<?php echo $xoTheme->metas['meta']['keywords'] ?>">
    <meta name="description" content="<?php echo $xoTheme->metas['meta']['description'] ?>">
    <meta name="robots" content="<?php echo $xoTheme->metas['meta']['robots'] ?>">
    <meta name="rating" content="<?php echo $xoTheme->metas['meta']['rating'] ?>">
    <meta name="author" content="<?php echo $xoTheme->metas['meta']['author'] ?>">
    <meta name="generator" content="XOOPS">

    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    if ($xoTheme->template->_tpl_vars['facebook_og_enabled'] == '1') { ?>
        <!-- Facebook graph -->
        <meta property="og:image" content=""/>
        <meta property="og:title" content=""/>
        <meta property="og:type" content="article"/>
        <meta property="og:description" content="<{$xoops_meta_description}> <{$xoops_meta_keywords}>"/>
        <meta property="og:url" content=""/>
        <meta property="og:site_name" content=""/>
        <meta property="fb:admins" content="<{$facebook_og_admins}>"/>
        <meta property="fb:app_id" content="<{$facebook_og_app_id}>"/>
    <?php } ?>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/ico" href="<?php echo $xoTheme->template->_tpl_vars["favicon"] ?>"/>
    <link rel="icon" type="image/png" href="<?php echo $xoTheme->template->_tpl_vars["favico_img"] ?>"/>

    <link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>css/xoops.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>css/codes.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $xoTheme->template->_tpl_vars["xoops_themecss"] ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>css/icomoon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>css/megamenu.css">

    <script src="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>js/jquery-1.10.2.js"></script>
    <script src="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>js/bootstrap.min.js"></script>

    <link rel="stylesheet" id="animations-css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>css/animations.css" type="text/css" media="all"/>
    <script src="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>js/appear.min.js"></script>
    <script src="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>js/animations.js"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <script src="<{xoImgUrl}>js/selectivizr-min.js"></script>
    <![endif]-->
    <script src<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>js
    /js.js"></script>
    <script src<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>js
    /megamenu.js"></script>
    <link rel="alternate" type="application/rss+xml" title="" href="<{xoAppUrl backend.php}>">

    <title><?php if ($xoTheme->template->_tpl_vars['xoops_pagetitle'] != ''): ?><?php echo $xoTheme->template->_tpl_vars['xoops_pagetitle']; ?>
            : <?php endif; ?><?php echo $xoTheme->template->_tpl_vars['xoops_sitename']; ?>
    </title>

    <?php echo $xoTheme->template->_tpl_vars['xoops_module_header']; ?>
    <script src="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>js/theia-sticky-sidebar.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".column_Blockcolumn").theiaStickySidebar({
                additionalMarginTop: 50
            });
        });
    </script>

    <!-- Sheet CssEXTRA -->
    <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>include/custom-css.php"/>
    <!-- Sheet CssEXTRA -->
    <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>include/widget-css.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>css/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>css/layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $xoTheme->template->_tpl_vars["xoops_imageurl"] ?>css/shortcodes.css">

    <?php if ($xoTheme->template->_tpl_vars['preloader'] == '1') { ?>
        <?php echo $xoTheme->template->_tpl_vars['preloadercode']; ?>
    <?php } ?>
    <?php if ($xoTheme->template->_tpl_vars['nicescrollactive'] == '1') { ?>
        <?php echo $xoTheme->template->_tpl_vars['nicescroll']; ?>
    <?php } ?>
    <?php if ($xoTheme->template->_tpl_vars['scrolltopactive'] == '1') { ?>
        <?php echo $xoTheme->template->_tpl_vars['scrolltop']; ?>
    <?php } ?>
    <?php
    echo $xoTheme->template->_tpl_vars['css'];
    echo $xoTheme->template->_tpl_vars['jsheader'];
    echo $xoTheme->template->_tpl_vars['tttt'];
    ?>
</head>

<body id="<{$xoops_dirname}>" class="<{$layout}>">
<div class="container maincontainer">

    <?php if ($xoTheme->template->_tpl_vars['scrolltopactive'] == '1') { ?>
        <p id="back-top">
            <a href="#top">
				<span class="fa-stack">
				<i class="im-icon-home-2"></i>
				</span>Back to Top
            </a>
        </p>
    <?php } ?>
    <div class="row">
