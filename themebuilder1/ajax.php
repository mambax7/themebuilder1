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
    die('XOOPS mainfile.php not found.');
}

// Security Check: Ensure user is an admin
global $xoopsUser;
if (!is_object($xoopsUser) || !$xoopsUser->isAdmin()) {
    header('HTTP/1.0 403 Forbidden');
    die('Access Denied');
}

// Disable debug bar for AJAX
global $xoopsLogger;
if (isset($xoopsLogger)) {
    $xoopsLogger->activated = false;
}
// error_reporting(0); // Let XOOPS handle error reporting settings

function crellyslider_wp_insert_rows($row_arrays = [], $wp_table_name)
{
    global $xoopsDB;
    // Setup arrays for Actual Values, and Placeholders
    $place_holders = [];
    $query_columns = "";

    // Get columns from the first row
    $first_row = reset($row_arrays);
    if ($first_row) {
         $keys = array_keys($first_row);
         // Sanitize column names (though they should come from code, better safe)
         $safe_keys = array_map(function($k) { return preg_replace('/[^a-zA-Z0-9_]/', '', $k); }, $keys);
         $query_columns = implode(',', $safe_keys);
    } else {
        return false;
    }

    foreach ($row_arrays as $count => $row_array) {
        $row_values = [];
        foreach ($row_array as $key => $value) {
             // Use QuoteString for escaping. It usually adds quotes around the string.
             $row_values[] = $xoopsDB->quoteString($value);
        }
        $place_holders[] = "(" . implode(', ', $row_values) . ")";
    }

    $query = "INSERT INTO " . $xoopsDB->prefix($wp_table_name) . " ($query_columns) VALUES " . implode(', ', $place_holders);

    if ($result = $xoopsDB->query($query)) {
        return true;
    } else {
        return false;
    }
}

$action = isset($_POST['action']) ? $_POST['action'] : '';

if ($action == 'crellyslider_addSlider') {
    global $xoopsDB;
    $options = $_POST['datas'];

    // Sanitize inputs
    $name = $xoopsDB->quoteString($options['name']);
    $alias = $xoopsDB->quoteString($options['alias']);
    $layout = $xoopsDB->quoteString($options['layout']);
    $responsive = intval($options['responsive']);
    $startWidth = intval($options['startWidth']);
    $startHeight = intval($options['startHeight']);
    $automaticSlide = intval($options['automaticSlide']);
    $showControls = intval($options['showControls']);
    $showNavigation = intval($options['showNavigation']);
    $showProgressBar = intval($options['showProgressBar']);
    $pauseOnHover = intval($options['pauseOnHover']);
    $callbacks = $xoopsDB->quoteString($options['callbacks']);
    $randomOrder = intval($options['randomOrder']);
    $startFromSlide = intval($options['startFromSlide']);
    $enableSwipe = intval($options['enableSwipe']);

    $sqlk = "INSERT INTO " . $xoopsDB->prefix('crellyslider_sliders') . "
        (name, alias, layout, responsive, startWidth, startHeight, automaticSlide, showControls, showNavigation, showProgressBar, pauseOnHover, callbacks, randomOrder, startFromSlide, enableSwipe)
        VALUES
        ($name, $alias, $layout, $responsive, $startWidth, $startHeight, $automaticSlide, $showControls, $showNavigation, $showProgressBar, $pauseOnHover, $callbacks, $randomOrder, $startFromSlide, $enableSwipe)";

    if ($result = $xoopsDB->query($sqlk)) {
        $id = $xoopsDB->getInsertId();
        echo json_encode($id);
    } else {
        echo json_encode(false);
    }
    die();
}

if ($action == 'crellyslider_editSlider') {
    global $xoopsDB;
    $options = $_POST['datas'];

    $id = intval($options['id']);
    $name = $xoopsDB->quoteString($options['name']);
    $alias = $xoopsDB->quoteString($options['alias']);
    $layout = $xoopsDB->quoteString($options['layout']);
    $responsive = intval($options['responsive']);
    $startWidth = intval($options['startWidth']);
    $startHeight = intval($options['startHeight']);
    $automaticSlide = intval($options['automaticSlide']);
    $showControls = intval($options['showControls']);
    $showNavigation = intval($options['showNavigation']);
    $showProgressBar = intval($options['showProgressBar']);
    $pauseOnHover = intval($options['pauseOnHover']);
    $callbacks = $xoopsDB->quoteString($options['callbacks']);
    $randomOrder = intval($options['randomOrder']);
    $startFromSlide = intval($options['startFromSlide']);
    $enableSwipe = intval($options['enableSwipe']);

    $sqlr = "UPDATE " . $xoopsDB->prefix('crellyslider_sliders') . " SET
	name =$name,
	alias =$alias,
	layout =$layout,
	responsive =$responsive,
	startWidth =$startWidth,
	startHeight =$startHeight,
	automaticSlide =$automaticSlide,
	showControls =$showControls,
	showNavigation =$showNavigation,
	showProgressBar =$showProgressBar,
	pauseOnHover =$pauseOnHover,
	callbacks =$callbacks,
    randomOrder =$randomOrder,
    startFromSlide =$startFromSlide,
	enableSwipe =$enableSwipe
	WHERE id=$id";

    // queryF allows updates. Since we are admin and csrf protected (hopefully by XOOPS or we trust admin session), this is better.
    // Note: XOOPS 2.5.x queryF is for non-select queries.
    if ($resultr = $xoopsDB->queryF($sqlr)) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
    die();
}

if ($action == 'crellyslider_editSlides') {
    global $xoopsDB;
    $options = $_POST['datas'];
    $slider_parent = intval($options['slider_parent']);

    $sqlr = 'DELETE FROM ' . $xoopsDB->prefix('crellyslider_slides') . ' WHERE slider_parent = ' . $slider_parent;
    if (!$xoopsDB->queryF($sqlr)) {
        echo json_encode(false);
        die();
    }

    // It's impossible to have 0 slides (jQuery checks it)
    if (!isset($options['options']) || !is_array($options['options']) || count($options['options']) == 0) {
        echo json_encode(false);
        die();
    }

    $output = crellyslider_wp_insert_rows($options['options'], 'crellyslider_slides');
    echo json_encode($output);
    die();
}

if ($action == 'crellyslider_editElements') {
    global $xoopsDB;
    $options = $_POST['datas'];
    $slider_parent = intval($options['slider_parent']);

    // Remove all the old elements
    $sqlr = 'DELETE FROM ' . $xoopsDB->prefix('crellyslider_elements') . ' WHERE slider_parent = ' . $slider_parent;
    if (!$xoopsDB->queryF($sqlr)) {
        echo json_encode(false);
        die();
    }

    $json_options = stripslashes((string) $options['options']);
    $options_array = json_decode($json_options, true); // Decode as array

    if (empty($options_array)) {
        echo json_encode(true);
    } else {
        $output = crellyslider_wp_insert_rows($options_array, 'crellyslider_elements');
        echo json_encode($output);
    }
    die();
}

// Delete slider and its content
if ($action == 'crellyslider_deleteSlider') {
    global $xoopsDB;
    $options = $_POST['datas'];
    $id = intval($options['id']);

    $sql_del_slider = "DELETE FROM " . $xoopsDB->prefix('crellyslider_sliders') . " WHERE id = " . $id;
    $sql_del_slides = "DELETE FROM " . $xoopsDB->prefix('crellyslider_slides') . " WHERE slider_parent = " . $id;
    $sql_del_elements = "DELETE FROM " . $xoopsDB->prefix('crellyslider_elements') . " WHERE slider_parent = " . $id;

    $xoopsDB->queryF($sql_del_slider);
    $xoopsDB->queryF($sql_del_slides);
    $xoopsDB->queryF($sql_del_elements);

    echo json_encode(true);
    die();
}

// Duplicate slider and its content
if ($action == 'crellyslider_duplicateSlider') {
    global $xoopsDB;
    $options = $_POST['datas'];
    $id = intval($options['id']);

    // 1. Get original slider
    $sql_slider = "SELECT * FROM " . $xoopsDB->prefix('crellyslider_sliders') . " WHERE id = " . $id;
    $result = $xoopsDB->query($sql_slider);
    $slider = $xoopsDB->fetchArray($result);

    if ($slider) {
        // Create new slider
        unset($slider['id']);
        $slider['name'] .= ' Copy';

        $keys = array_keys($slider);
        $values = array_values($slider);

        $escaped_values = array_map(function($v) use ($xoopsDB) { return $xoopsDB->quoteString($v); }, $values);

        $sql_insert = "INSERT INTO " . $xoopsDB->prefix('crellyslider_sliders') . " (" . implode(',', $keys) . ") VALUES (" . implode(',', $escaped_values) . ")";

        if ($xoopsDB->queryF($sql_insert)) {
            $new_slider_id = $xoopsDB->getInsertId();

            // 2. Duplicate slides
            $sql_slides = "SELECT * FROM " . $xoopsDB->prefix('crellyslider_slides') . " WHERE slider_parent = " . $id;
            $result_slides = $xoopsDB->query($sql_slides);
            while ($slide = $xoopsDB->fetchArray($result_slides)) {
                $old_slide_position = $slide['position']; // keep track of old position to match elements if needed?
                // Actually elements link to slide_parent which seems to be position?
                // Let's check table structure implied by code.
                // Slides table has `slider_parent`.
                // Elements table has `slider_parent` and `slide_parent`.
                // `slide_parent` in elements table seems to correspond to `position` in slides table based on `crellyslider_editSlides` not updating IDs but just inserting rows.
                // Wait, `crellyslider_editSlides` inserts rows.

                unset($slide['id']);
                $slide['slider_parent'] = $new_slider_id;

                $s_keys = array_keys($slide);
                $s_values = array_map(function($v) use ($xoopsDB) { return $xoopsDB->quoteString($v); }, array_values($slide));

                $sql_insert_slide = "INSERT INTO " . $xoopsDB->prefix('crellyslider_slides') . " (" . implode(',', $s_keys) . ") VALUES (" . implode(',', $s_values) . ")";
                $xoopsDB->queryF($sql_insert_slide);
            }

            // 3. Duplicate elements
            $sql_elements = "SELECT * FROM " . $xoopsDB->prefix('crellyslider_elements') . " WHERE slider_parent = " . $id;
            $result_elements = $xoopsDB->query($sql_elements);
            while ($element = $xoopsDB->fetchArray($result_elements)) {
                unset($element['id']);
                $element['slider_parent'] = $new_slider_id;

                $e_keys = array_keys($element);
                $e_values = array_map(function($v) use ($xoopsDB) { return $xoopsDB->quoteString($v); }, array_values($element));

                $sql_insert_element = "INSERT INTO " . $xoopsDB->prefix('crellyslider_elements') . " (" . implode(',', $e_keys) . ") VALUES (" . implode(',', $e_values) . ")";
                $xoopsDB->queryF($sql_insert_element);
            }

            echo json_encode($new_slider_id);
        } else {
             echo json_encode(false);
        }
    } else {
        echo json_encode(false);
    }
    die();
}
?>
