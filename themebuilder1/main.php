<?php

// Get Action type
$op = system_CleanVars($_REQUEST, 'op', 'default', 'string');
// Call header
xoops_cp_header();
// Define Stylesheet
$xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/admin.css');
$xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/ui/' . xoops_getModuleOption('jquery_theme', 'system') . '/ui.all.css');
// Define scripts
$xoTheme->addScript('browse.php?Frameworks/jquery/jquery.js');
$xoTheme->addScript('browse.php?Frameworks/jquery/plugins/jquery.ui.js');
$xoTheme->addScript('browse.php?Frameworks/jquery/plugins/jquery.tablesorter.js');
$xoTheme->addScript('modules/system/js/admin.js');

echo '
	<div style="font-size: 10px; text-align: left; color: #2F5376; padding: 2px 6px; line-height: 18px;">
		<span style="margin: 1px; padding: 4px; border: #E8E8E8 1px solid;">
			<a href="admin.php?fct=themebuilder1"> Index</a>
		</span>
		<span style="margin: 1px; padding: 4px; border: #E8E8E8 1px solid;">
			<a href="admin.php?fct=themebuilder1&op=menu"> Menu</a>
		</span>
		<span style="margin: 1px; padding: 4px; border: #E8E8E8 1px solid;">
			<a href="admin.php?fct=themebuilder1&op=slider"> Slider</a>
		</span>
		<span style="margin: 1px; padding: 4px; border: #E8E8E8 1px solid;">
			<a href="admin.php?fct=themebuilder1&op=side"> Side Bar</a>
		</span>
		<span style="margin: 1px; padding: 4px; border: #E8E8E8 1px solid;">
			<a href="admin.php?fct=themebuilder1&op=header"> Header</a>
		</span>
		<span style="margin: 1px; padding: 4px; border: #E8E8E8 1px solid;">
			<a href="admin.php?fct=themebuilder1&op=footer"> Footer</a>
		</span>
		<span style="margin: 1px; padding: 4px; border: #E8E8E8 1px solid;">
			<a href="admin.php?fct=themebuilder1&op=options"> Options</a>
		</span>
		<span style="margin: 1px; padding: 4px; border: #E8E8E8 1px solid;">		
			<a href="admin.php?fct=themebuilder1&op=ThemeBuilder"> Theme Builder</a>
		</span>
		<span style="margin: 1px; padding: 4px; border: #E8E8E8 1px solid;">
			<a href="admin.php?fct=themebuilder1&op=miseajour"> Update</a>
			
			<span class="update-plugins">1</span>
			
		</span>
		<span style="margin: 1px; padding: 4px; border: #E8E8E8 1px solid;">		
			<a href="admin.php?fct=themebuilder1&op=apropos"> About</a>
		</span>
	</div></br>';

switch ($op) {
    case 'menu':

        include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/include/menu.php';

        break;

    case 'slider':

        include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/include/slider.php';

        break;

    case 'options':

        include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/options/theme-options.php';

        break;

    case 'ThemeBuilder':

        include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/builder/themebuilder.php';

        break;

    case 'blockbuilder':
        echo 'ajouter des block prédéfeni à xoops to be done later';

        break;

    case 'pagebuilder':

        include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/builder/pagebuilder.php';

        break;

    case 'layoutbuilder':

        include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/builder/layoutbuilder.php';

        break;

    case 'miseajour':

        include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/include/miseajour.php';

        break;

    case 'siteclosed':

        include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/include/siteclosed.php';

        break;

    case 'side':

        include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/include/side.php';

        break;

    case 'apropos':

        include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/include/apropos.php';

        break;

    case 'footer':
        break;

    case 'header':
        break;

    case 'importer':
        break;

    case 'exporter':
        break;

    case 'install':
        //include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/install/install.php';
        /* redirect_header("/modules/system/admin/themebuilder1/install/install.php", 5, $message);
                exit(); */
        break;

    default:

        include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/include/index.php';

        break;
}
xoops_cp_footer();

?>
