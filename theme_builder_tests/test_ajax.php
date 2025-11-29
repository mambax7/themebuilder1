<?php
require_once 'theme_builder_tests/mock_xoops.php';

// Mock MAINFILE
$mainfile = 'mainfile.php';
file_put_contents($mainfile, '<?php ?>');

// Test 1: Add Slider (SQL Injection check)
echo "Test 1: Add Slider\n";
$_POST['action'] = 'crellyslider_addSlider';
$_POST['datas'] = [
    'name' => "My Slider', (SELECT 1)) -- ",
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

ob_start();
include 'themebuilder1/ajax.php';
$output = ob_get_clean();
echo "Output: $output\n";

// Test 2: Edit Slides (Insert Rows)
echo "\nTest 2: Edit Slides\n";
$_POST['action'] = 'crellyslider_editSlides';
$_POST['datas'] = [
    'slider_parent' => 1,
    'options' => [
        ['col1' => 'val1', 'col2' => "val2', (SELECT 1)) -- "]
    ]
];
ob_start();
include 'themebuilder1/ajax.php';
$output = ob_get_clean();
echo "Output: $output\n";

if (file_exists($mainfile)) {
    unlink($mainfile);
}
?>
