<?php

require_once __DIR__ . '/MenuController.php';

// Instantiate and run the controller
global $xoopsDB;
$controller = new ThemeBuilderMenuController($xoopsDB);

$op = system_CleanVars($_REQUEST, 'action', 'default', 'string');
$controller->handleRequest($op);

?>
