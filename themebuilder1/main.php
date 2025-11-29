<?php

// Check if XOOPS is loaded. It should be if accessed via admin.php?fct=themebuilder1
if (!defined('XOOPS_ROOT_PATH')) {
    die('XOOPS root path not defined');
}

// Ensure the user is an admin
global $xoopsUser;
if (!is_object($xoopsUser) || !$xoopsUser->isAdmin()) {
    die('Access Denied');
}

// Get Action type - using $_GET or $_POST explicitly is better, but system_CleanVars handles input sanitization.
// We will favor GET for navigation 'op'.
$op = isset($_GET['op']) ? trim(strip_tags($_GET['op'])) : 'default';

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

// Helper to generate menu link
function tb_menu_link($op, $label) {
    return '<span style="margin: 1px; padding: 4px; border: #E8E8E8 1px solid;">
            <a href="admin.php?fct=themebuilder1&op=' . htmlspecialchars($op) . '"> ' . htmlspecialchars($label) . '</a>
        </span>';
}

echo '
    <div style="font-size: 10px; text-align: left; color: #2F5376; padding: 2px 6px; line-height: 18px;">
        ' . tb_menu_link('', 'Index') . '
        ' . tb_menu_link('menu', 'Menu') . '
        ' . tb_menu_link('slider', 'Slider') . '
        ' . tb_menu_link('side', 'Side Bar') . '
        ' . tb_menu_link('header', 'Header') . '
        ' . tb_menu_link('footer', 'Footer') . '
        ' . tb_menu_link('options', 'Options') . '
        ' . tb_menu_link('ThemeBuilder', 'Theme Builder') . '
        <span style="margin: 1px; padding: 4px; border: #E8E8E8 1px solid;">
            <a href="admin.php?fct=themebuilder1&op=miseajour"> Update</a>
            <span class="update-plugins">1</span>
        </span>
        ' . tb_menu_link('apropos', 'About') . '
    </div><br/>';

$module_path = __DIR__; // Since this main.php is in the module root

switch ($op) {
    case 'menu':
        include $module_path . '/include/menu.php';
        break;

    case 'slider':
        include $module_path . '/include/slider.php';
        break;

    case 'options':
        include $module_path . '/options/theme-options.php';
        break;

    case 'ThemeBuilder':
        include $module_path . '/builder/themebuilder.php';
        break;

    case 'blockbuilder':
        echo 'ajouter des block prédéfeni à xoops to be done later';
        break;

    case 'pagebuilder':
        include $module_path . '/builder/pagebuilder.php';
        break;

    case 'layoutbuilder':
        include $module_path . '/builder/layoutbuilder.php';
        break;

    case 'miseajour':
        include $module_path . '/include/miseajour.php';
        break;

    case 'siteclosed':
        include $module_path . '/include/siteclosed.php';
        break;

    case 'side':
        include $module_path . '/include/side.php';
        break;

    case 'apropos':
        include $module_path . '/include/apropos.php';
        break;

    case 'footer':
    case 'header':
    case 'importer':
    case 'exporter':
        break;

    case 'install':
        // Code removed as it was commented out and potential security risk if enabled
        break;

    default:
        if (file_exists($module_path . '/include/index.php')) {
            include $module_path . '/include/index.php';
        } else {
             echo "Welcome to Theme Builder";
        }
        break;
}
xoops_cp_footer();

?>
