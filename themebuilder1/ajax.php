<?php

// Find mainfile.php
$mainfile_path = __DIR__;
$found_mainfile = false;
for ($i = 0; $i < 6; $i++) {
    if (file_exists($mainfile_path . '/mainfile.php')) {
        include_once $mainfile_path . '/mainfile.php';
        $found_mainfile = true;
        break;
    }
    $mainfile_path .= '/..';
}

if (!$found_mainfile) {
    if (defined('XOOPS_ROOT_PATH')) {
        // We are good
    } else {
         header('Content-Type: application/json');
         echo json_encode(['error' => 'XOOPS mainfile.php not found.']);
         exit;
    }
}

// Security Check: Ensure user is an admin
global $xoopsUser;
if (!is_object($xoopsUser) || !$xoopsUser->isAdmin()) {
    header('HTTP/1.0 403 Forbidden');
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Access Denied']);
    exit;
}

// CSRF Check
global $xoopsSecurity;
if (isset($_POST['token']) && is_object($xoopsSecurity)) {
    if (!$xoopsSecurity->check($_POST['token'], false)) {
         header('HTTP/1.0 403 Forbidden');
         header('Content-Type: application/json');
         echo json_encode(['error' => 'Invalid Security Token']);
         exit;
    }
} elseif (is_object($xoopsSecurity)) {
     if (!isset($_POST['token'])) {
         header('HTTP/1.0 403 Forbidden');
         header('Content-Type: application/json');
         echo json_encode(['error' => 'Missing Security Token']);
         exit;
     }
}

// Disable debug bar for AJAX
global $xoopsLogger;
if (isset($xoopsLogger)) {
    $xoopsLogger->activated = false;
}

require_once __DIR__ . '/include/AjaxController.php';

global $xoopsDB;
$controller = new ThemeBuilderAjaxController($xoopsDB);
$controller->handleRequest();

?>
