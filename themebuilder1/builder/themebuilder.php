<?php

require_once __DIR__ . '/ThemeBuilderController.php';

global $xoopsDB;
$controller = new ThemeBuilderController($xoopsDB);

$op = system_CleanVars($_REQUEST, 'action', 'default', 'string');
$controller->handleRequest($op);

?>
