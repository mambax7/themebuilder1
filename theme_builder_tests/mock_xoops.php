<?php
// Mock XOOPS environment for CLI testing
define('XOOPS_ROOT_PATH', __DIR__ . '/../');
define('XOOPS_URL', 'http://localhost');
define('_SUBMIT', 'Submit');
define('_CANCEL', 'Cancel');
define('_AM_PAGE_ID_DELETED', 'Page deleted');
define('_AM_ARABESK125DOTNET_OOOOOOOOOOOO_AREUSURE', 'Are you sure?');
define('_AM_PAGE_ID_CLONED', 'Page cloned');
define('_AM_PAGE_ID_PROB_SECURITY', 'Security problem');
define('_AM_SYSTEM_THEMEBUILDER_probleme_mod_menu', 'Problem modifying menu');
define('XOOPS_SYSTEM_THEME1', 'theme');

class MockXoopsDB {
    public function prefix($table) { return 'xoops_' . $table; }
    public function query($sql) { echo "SQL: $sql\n"; return true; }
    public function queryF($sql) { echo "SQLF: $sql\n"; return true; }
    public function getInsertId() { return 1; }
    public function quoteString($str) { return "'" . addslashes($str) . "'"; }
    public function fetchArray($result) { return false; } // Mock empty result
}

class MockXoopsUser {
    public function isAdmin() { return true; }
}

class MockXoTheme {
    public function addStylesheet($s) { echo "Stylesheet: $s\n"; }
    public function addScript($s) { echo "Script: $s\n"; }
}

$xoopsDB = new MockXoopsDB();
$xoopsUser = new MockXoopsUser();
$xoTheme = new MockXoTheme();

function xoops_cp_header() { echo "Header\n"; }
function xoops_cp_footer() { echo "Footer\n"; }
function system_CleanVars($r, $v, $d, $t) { return isset($_REQUEST[$v]) ? $_REQUEST[$v] : $d; }
function xoops_getModuleOption($opt, $mod) { return 'default'; }
function redirect_header($url, $time, $msg) { echo "Redirect: $url - $msg\n"; }
function xoops_confirm($h, $a, $m) { echo "Confirm: $m\n"; }
?>
