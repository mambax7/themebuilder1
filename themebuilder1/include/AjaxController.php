<?php

class ThemeBuilderAjaxController {
    protected $xoopsDB;

    public function __construct($xoopsDB) {
        $this->xoopsDB = $xoopsDB;
    }

    public function handleRequest() {
        // CSRF Check is handled in ajax.php bootstrap before calling this, or we can move it here.
        // Assuming bootstrap (authentication, token check) is done in ajax.php

        $action = isset($_POST['action']) ? $_POST['action'] : '';

        switch ($action) {
            case 'crellyslider_addSlider':
                $this->addSlider();
                break;
            case 'crellyslider_editSlider':
                $this->editSlider();
                break;
            case 'crellyslider_editSlides':
                $this->editSlides();
                break;
            case 'crellyslider_editElements':
                $this->editElements();
                break;
            case 'crellyslider_deleteSlider':
                $this->deleteSlider();
                break;
            case 'crellyslider_duplicateSlider':
                $this->duplicateSlider();
                break;
            default:
                $this->sendError('Unknown Action');
                break;
        }
    }

    protected function sendResponse($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    protected function sendError($message) {
        header('Content-Type: application/json');
        echo json_encode(['error' => $message]);
        exit;
    }

    protected function sanitizeSliderOptions($options) {
        return [
            'name' => $this->xoopsDB->quoteString($options['name'] ?? ''),
            'alias' => $this->xoopsDB->quoteString($options['alias'] ?? ''),
            'layout' => $this->xoopsDB->quoteString($options['layout'] ?? 'fixed'),
            'responsive' => intval($options['responsive'] ?? 1),
            'startWidth' => intval($options['startWidth'] ?? 0),
            'startHeight' => intval($options['startHeight'] ?? 0),
            'automaticSlide' => intval($options['automaticSlide'] ?? 1),
            'showControls' => intval($options['showControls'] ?? 1),
            'showNavigation' => intval($options['showNavigation'] ?? 1),
            'showProgressBar' => intval($options['showProgressBar'] ?? 1),
            'pauseOnHover' => intval($options['pauseOnHover'] ?? 1),
            'callbacks' => $this->xoopsDB->quoteString($options['callbacks'] ?? ''),
            'randomOrder' => intval($options['randomOrder'] ?? 0),
            'startFromSlide' => intval($options['startFromSlide'] ?? 0),
            'enableSwipe' => intval($options['enableSwipe'] ?? 1)
        ];
    }

    protected function insertRows($row_arrays, $wp_table_name) {
        $place_holders = [];
        $query_columns = "";

        $first_row = reset($row_arrays);
        if ($first_row) {
             $keys = array_keys($first_row);
             $safe_keys = array_map(function($k) { return preg_replace('/[^a-zA-Z0-9_]/', '', $k); }, $keys);
             $query_columns = implode(',', $safe_keys);
        } else {
            return false;
        }

        foreach ($row_arrays as $count => $row_array) {
            $row_values = [];
            foreach ($row_array as $key => $value) {
                 $row_values[] = $this->xoopsDB->quoteString($value);
            }
            $place_holders[] = "(" . implode(', ', $row_values) . ")";
        }

        $query = "INSERT INTO " . $this->xoopsDB->prefix($wp_table_name) . " ($query_columns) VALUES " . implode(', ', $place_holders);

        if ($this->xoopsDB->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    protected function addSlider() {
        $options = $_POST['datas'];
        $s = $this->sanitizeSliderOptions($options);

        $sqlk = "INSERT INTO " . $this->xoopsDB->prefix('crellyslider_sliders') . "
            (name, alias, layout, responsive, startWidth, startHeight, automaticSlide, showControls, showNavigation, showProgressBar, pauseOnHover, callbacks, randomOrder, startFromSlide, enableSwipe)
            VALUES
            ({$s['name']}, {$s['alias']}, {$s['layout']}, {$s['responsive']}, {$s['startWidth']}, {$s['startHeight']}, {$s['automaticSlide']}, {$s['showControls']}, {$s['showNavigation']}, {$s['showProgressBar']}, {$s['pauseOnHover']}, {$s['callbacks']}, {$s['randomOrder']}, {$s['startFromSlide']}, {$s['enableSwipe']})";

        if ($this->xoopsDB->query($sqlk)) {
            $id = $this->xoopsDB->getInsertId();
            $this->sendResponse($id);
        } else {
            $this->sendResponse(false);
        }
    }

    protected function editSlider() {
        $options = $_POST['datas'];
        $id = intval($options['id']);
        $s = $this->sanitizeSliderOptions($options);

        $sqlr = "UPDATE " . $this->xoopsDB->prefix('crellyslider_sliders') . " SET
        name ={$s['name']},
        alias ={$s['alias']},
        layout ={$s['layout']},
        responsive ={$s['responsive']},
        startWidth ={$s['startWidth']},
        startHeight ={$s['startHeight']},
        automaticSlide ={$s['automaticSlide']},
        showControls ={$s['showControls']},
        showNavigation ={$s['showNavigation']},
        showProgressBar ={$s['showProgressBar']},
        pauseOnHover ={$s['pauseOnHover']},
        callbacks ={$s['callbacks']},
        randomOrder ={$s['randomOrder']},
        startFromSlide ={$s['startFromSlide']},
        enableSwipe ={$s['enableSwipe']}
        WHERE id=$id";

        if ($this->xoopsDB->queryF($sqlr)) {
            $this->sendResponse(true);
        } else {
            $this->sendResponse(false);
        }
    }

    protected function editSlides() {
        $options = $_POST['datas'];
        $slider_parent = intval($options['slider_parent']);

        $sqlr = 'DELETE FROM ' . $this->xoopsDB->prefix('crellyslider_slides') . ' WHERE slider_parent = ' . $slider_parent;
        if (!$this->xoopsDB->queryF($sqlr)) {
            $this->sendResponse(false);
        }

        if (!isset($options['options']) || !is_array($options['options']) || count($options['options']) == 0) {
            $this->sendResponse(false);
        }

        $output = $this->insertRows($options['options'], 'crellyslider_slides');
        $this->sendResponse($output);
    }

    protected function editElements() {
        $options = $_POST['datas'];
        $slider_parent = intval($options['slider_parent']);

        $sqlr = 'DELETE FROM ' . $this->xoopsDB->prefix('crellyslider_elements') . ' WHERE slider_parent = ' . $slider_parent;
        if (!$this->xoopsDB->queryF($sqlr)) {
            $this->sendResponse(false);
        }

        $json_options = stripslashes((string) $options['options']);
        $options_array = json_decode($json_options, true);

        if (empty($options_array)) {
            $this->sendResponse(true);
        } else {
            $output = $this->insertRows($options_array, 'crellyslider_elements');
            $this->sendResponse($output);
        }
    }

    protected function deleteSlider() {
        $options = $_POST['datas'];
        $id = intval($options['id']);

        $sql_del_slider = "DELETE FROM " . $this->xoopsDB->prefix('crellyslider_sliders') . " WHERE id = " . $id;
        $sql_del_slides = "DELETE FROM " . $this->xoopsDB->prefix('crellyslider_slides') . " WHERE slider_parent = " . $id;
        $sql_del_elements = "DELETE FROM " . $this->xoopsDB->prefix('crellyslider_elements') . " WHERE slider_parent = " . $id;

        $this->xoopsDB->queryF($sql_del_slider);
        $this->xoopsDB->queryF($sql_del_slides);
        $this->xoopsDB->queryF($sql_del_elements);

        $this->sendResponse(true);
    }

    protected function duplicateSlider() {
        $options = $_POST['datas'];
        $id = intval($options['id']);

        $sql_slider = "SELECT * FROM " . $this->xoopsDB->prefix('crellyslider_sliders') . " WHERE id = " . $id;
        $result = $this->xoopsDB->query($sql_slider);
        $slider = $this->xoopsDB->fetchArray($result);

        if ($slider) {
            unset($slider['id']);
            $slider['name'] .= ' Copy';

            $keys = array_keys($slider);
            $values = array_values($slider);

            $escaped_values = array_map(function($v) { return $this->xoopsDB->quoteString($v); }, $values);

            $sql_insert = "INSERT INTO " . $this->xoopsDB->prefix('crellyslider_sliders') . " (" . implode(',', $keys) . ") VALUES (" . implode(',', $escaped_values) . ")";

            if ($this->xoopsDB->queryF($sql_insert)) {
                $new_slider_id = $this->xoopsDB->getInsertId();

                $sql_slides = "SELECT * FROM " . $this->xoopsDB->prefix('crellyslider_slides') . " WHERE slider_parent = " . $id;
                $result_slides = $this->xoopsDB->query($sql_slides);
                while ($slide = $this->xoopsDB->fetchArray($result_slides)) {
                    unset($slide['id']);
                    $slide['slider_parent'] = $new_slider_id;

                    $s_keys = array_keys($slide);
                    $s_values = array_map(function($v) { return $this->xoopsDB->quoteString($v); }, array_values($slide));

                    $sql_insert_slide = "INSERT INTO " . $this->xoopsDB->prefix('crellyslider_slides') . " (" . implode(',', $s_keys) . ") VALUES (" . implode(',', $s_values) . ")";
                    $this->xoopsDB->queryF($sql_insert_slide);
                }

                $sql_elements = "SELECT * FROM " . $this->xoopsDB->prefix('crellyslider_elements') . " WHERE slider_parent = " . $id;
                $result_elements = $this->xoopsDB->query($sql_elements);
                while ($element = $this->xoopsDB->fetchArray($result_elements)) {
                    unset($element['id']);
                    $element['slider_parent'] = $new_slider_id;

                    $e_keys = array_keys($element);
                    $e_values = array_map(function($v) { return $this->xoopsDB->quoteString($v); }, array_values($element));

                    $sql_insert_element = "INSERT INTO " . $this->xoopsDB->prefix('crellyslider_elements') . " (" . implode(',', $e_keys) . ") VALUES (" . implode(',', $e_values) . ")";
                    $this->xoopsDB->queryF($sql_insert_element);
                }

                $this->sendResponse($new_slider_id);
            } else {
                 $this->sendResponse(false);
            }
        } else {
            $this->sendResponse(false);
        }
    }
}
?>
