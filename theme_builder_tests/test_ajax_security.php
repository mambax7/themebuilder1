<?php
// Mock XOOPS environment
define('XOOPS_ROOT_PATH', '/tmp/xoops');
define('XOOPS_URL', 'http://localhost');

class MockXoopsDB {
    public function prefix($table) { return 'xoops_' . $table; }
    public function query($sql) { echo "Query: $sql\n"; return true; }
    public function queryF($sql) { echo "QueryF: $sql\n"; return true; }
    public function getInsertId() { return 1; }
    public function quoteString($str) { return "'" . addslashes($str) . "'"; }
}

$xoopsDB = new MockXoopsDB();
$xoopsLogger = new stdClass();
$xoopsLogger->activated = true;

// Mock session/user
$xoopsUser = null; // Default: Not logged in
function xoops_getModuleOption($opt, $mod) { return 'default'; }

// Simulate request
$_POST['action'] = 'crellyslider_addSlider';
$_POST['datas'] = [
    'name' => "My Slider', (SELECT 1)) -- ", // SQL Injection attempt
    'alias' => 'alias',
    'layout' => 'fixed',
    'responsive' => 1,
    'startWidth' => 100,
    'startHeight' => 100,
    'automaticSlide' => 1,
    'showControls' => 1,
    'showNavigation' => 1,
    'showProgressBar' => 1,
    'pauseOnHover' => 1,
    'callbacks' => '',
    'randomOrder' => 0,
    'startFromSlide' => 0,
    'enableSwipe' => 1
];

// Include ajax.php
include '../themebuilder1/ajax.php';
?>
