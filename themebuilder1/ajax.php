<?php

function crellyslider_wp_insert_rows($row_arrays = [], $wp_table_name)
{
    global $xoopsDB;
    $wp_table_name = $wp_table_name;
    // Setup arrays for Actual Values, and Placeholders
    $values        = [];
    $place_holders = [];
    $query         = "";
    $query_columns = "";

    $query .= "INSERT INTO  " . $xoopsDB->prefix('' . $wp_table_name . '') . " (";

    foreach ($row_arrays as $count => $row_array) {
        foreach ($row_array as $key => $value) {
            if ($count == 0) {
                if ($query_columns) {
                    $query_columns .= "," . $key . "";
                } else {
                    $query_columns .= "" . $key . "";
                }
            }

            $values[] = $value;

            if (is_numeric($value)) {
                if (isset($place_holders[$count])) {
                    $place_holders[$count] .= ", '$value'";
                } else {
                    $place_holders[$count] = "( '$value'";
                }
            } else {
                if (isset($place_holders[$count])) {
                    $place_holders[$count] .= ", '$value'";
                } else {
                    $place_holders[$count] = "( '$value'";
                }
            }
        }
        // mind closing the GAP
        $place_holders[$count] .= ")";
    }

    $query .= " $query_columns ) VALUES ";

    $query .= implode(', ', $place_holders);

    if ($result = $xoopsDB->query($query)) {
        return true;
    } else {
        return false;
    }
}

if ($_POST['action'] == 'crellyslider_addSlider') {
    //echo 'yes';
    if (file_exists("mainfile.php")) {
        include_once "mainfile.php";
    } elseif (file_exists("../mainfile.php")) {
        include_once "../mainfile.php";
    } elseif (file_exists("../../mainfile.php")) {
        include_once "../../mainfile.php";
    } elseif (file_exists("../../../mainfile.php")) {
        include_once "../../../mainfile.php";
    } elseif (file_exists("../../../../mainfile.php")) {
        include_once "../../../../mainfile.php";
    }
    // Disable all debugging for this file.
    error_reporting(0);
    $xoopsLogger->activated = false;

    global $xoopsDB;
    $options = $_POST['datas'];
    $sqlk    = 'INSERT INTO ' . $xoopsDB->prefix('crellyslider_sliders') . '	(name, alias, layout, responsive, startWidth, startHeight, automaticSlide, showControls, showNavigation, showProgressBar, pauseOnHover, callbacks, randomOrder, startFromSlide, enableSwipe) ';
    $sqlk    .= " VALUES 	('{$options['name']}', '{$options['alias']}', '{$options['layout']}', '{$options['responsive']}', '{$options['startWidth']}', '{$options['startHeight']}', '{$options['automaticSlide']}', '{$options['showControls']}', '{$options['showNavigation']}', '{$options['showProgressBar']}', '{$options['pauseOnHover']}', '{$options['callbacks']}', '{$options['randomOrder']}', '{$options['startFromSlide']}', '{$options['enableSwipe']}'  )";
    if ($result = $xoopsDB->query($sqlk)) {
        $id = $xoopsDB->getInsertId();
        if ($id) {
        }
    }

    // Returning
    $output = json_encode($id);
    if (is_array($output)) {
        print_r($output);
    } else {
        echo $output;
    }

    die();
}

if ($_POST['action'] == 'crellyslider_editSlider') {
    //echo 'yes';
    if (file_exists("mainfile.php")) {
        include_once "mainfile.php";
    } elseif (file_exists("../mainfile.php")) {
        include_once "../mainfile.php";
    } elseif (file_exists("../../mainfile.php")) {
        include_once "../../mainfile.php";
    } elseif (file_exists("../../../mainfile.php")) {
        include_once "../../../mainfile.php";
    } elseif (file_exists("../../../../mainfile.php")) {
        include_once "../../../../mainfile.php";
    }
    // Disable all debugging for this file.
    error_reporting(0);
    $xoopsLogger->activated = false;

    global $xoopsDB;
    $options = $_POST['datas'];
    //update sql
    $sqlr = "UPDATE " . $xoopsDB->prefix('crellyslider_sliders') . " SET 
	name ='" . $options['name'] . "',
	alias ='" . $options['alias'] . "',
	layout ='" . $options['layout'] . "',
	responsive ='" . $options['responsive'] . "',
	startWidth ='" . $options['startWidth'] . "',
	startHeight ='" . $options['startHeight'] . "',
	automaticSlide ='" . $options['automaticSlide'] . "',
	showControls ='" . $options['showControls'] . "',
	showNavigation ='" . $options['showNavigation'] . "',
	showProgressBar ='" . $options['showProgressBar'] . "',
	pauseOnHover ='" . $options['pauseOnHover'] . "',
	callbacks ='" . $options['callbacks'] . "',
    randomOrder ='" . $options['randomOrder'] . "',
    startFromSlide ='" . $options['startFromSlide'] . "',
	enableSwipe ='" . $options['enableSwipe'] . "'
	WHERE id=" . intval($options['id']);

    if ($resultr = $xoopsDB->queryF($sqlr)) {
        $message = true;
    } else {
        $message = false;
    }

    $output = json_encode($message);
    // Returning
    //$output = json_encode($id);
    if (is_array($output)) {
        print_r($output);
    } else {
        echo $output;
    }

    die();
}

if ($_POST['action'] == 'crellyslider_editSlides') {
    //echo 'yes';
    if (file_exists("mainfile.php")) {
        include_once "mainfile.php";
    } elseif (file_exists("../mainfile.php")) {
        include_once "../mainfile.php";
    } elseif (file_exists("../../mainfile.php")) {
        include_once "../../mainfile.php";
    } elseif (file_exists("../../../mainfile.php")) {
        include_once "../../../mainfile.php";
    } elseif (file_exists("../../../../mainfile.php")) {
        include_once "../../../../mainfile.php";
    }
    // Disable all debugging for this file.
    error_reporting(0);
    $xoopsLogger->activated = false;

    global $xoopsDB;
    $options = $_POST['datas'];

    $sqlr = 'DELETE FROM ' . $xoopsDB->prefix('crellyslider_slides') . ' WHERE slider_parent = ' . $options['slider_parent'] . '';
    if ($resultr = $xoopsDB->queryF($sqlr)) {
        $output = true;
    } else {
        $output = false;
    }

    if ($output === false) {
        echo json_encode(false);
    } else {
        // It's impossible to have 0 slides (jQuery checks it)
        if (count($options['options']) == 0) {
            echo json_encode(false);
            return;
        }

        $output = crellyslider_wp_insert_rows($options['options'], 'crellyslider_slides');

        // Returning
        $output = json_encode($output);
        if (is_array($output)) {
            print_r($output);
        } else {
            echo $output;
        }
    }

    die();
}

if ($_POST['action'] == 'crellyslider_editElements') {
    //echo 'yes';
    if (file_exists("mainfile.php")) {
        include_once "mainfile.php";
    } elseif (file_exists("../mainfile.php")) {
        include_once "../mainfile.php";
    } elseif (file_exists("../../mainfile.php")) {
        include_once "../../mainfile.php";
    } elseif (file_exists("../../../mainfile.php")) {
        include_once "../../../mainfile.php";
    } elseif (file_exists("../../../../mainfile.php")) {
        include_once "../../../../mainfile.php";
    }
    // Disable all debugging for this file.
    error_reporting(0);
    $xoopsLogger->activated = false;

    global $xoopsDB;
    $options = $_POST['datas'];
    $output  = true;

    // Remove all the old elements
    $sqlr = 'DELETE FROM ' . $xoopsDB->prefix('crellyslider_elements') . ' WHERE slider_parent = ' . $options['slider_parent'] . '';
    if ($resultr = $xoopsDB->queryF($sqlr)) {
        $output = true;
    } else {
        $output = false;
    }
    if ($output === false) {
        echo json_encode(false);
    } else {
        // No elements
        $quick_temp = json_decode(stripslashes((string) $options['options']));
        if (empty($quick_temp)) {
            echo json_encode(true);
        } else {
            $options_array = json_decode(stripslashes((string) $options['options']));

            $output = crellyslider_wp_insert_rows($options_array, 'crellyslider_elements');

            // Returning
            $output = json_encode($output);
            if (is_array($output)) {
                print_r($output);
            } else {
                echo $output;
            }
        }
    }

    die();
}

// Delete slider and its content
if ($_POST['action'] == 'crellyslider_deleteSlider') {
    //echo 'yes';
    if (file_exists("mainfile.php")) {
        include_once "mainfile.php";
    } elseif (file_exists("../mainfile.php")) {
        include_once "../mainfile.php";
    } elseif (file_exists("../../mainfile.php")) {
        include_once "../../mainfile.php";
    } elseif (file_exists("../../../mainfile.php")) {
        include_once "../../../mainfile.php";
    } elseif (file_exists("../../../../mainfile.php")) {
        include_once "../../../../mainfile.php";
    }
    global $xoopsDB;
    $options = $_POST['datas'];
}

// Duplicate slider and its content
if ($_POST['action'] == 'crellyslider_duplicateSlider') {
    //echo 'yes';
    if (file_exists("mainfile.php")) {
        include_once "mainfile.php";
    } elseif (file_exists("../mainfile.php")) {
        include_once "../mainfile.php";
    } elseif (file_exists("../../mainfile.php")) {
        include_once "../../mainfile.php";
    } elseif (file_exists("../../../mainfile.php")) {
        include_once "../../../mainfile.php";
    } elseif (file_exists("../../../../mainfile.php")) {
        include_once "../../../../mainfile.php";
    }
    global $xoopsDB;
    $options = $_POST['datas'];
}

?>
