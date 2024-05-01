<?php
//// Exit if accessed directly 
?>

<div id="cs-slides">
    <div class="cs-slide-tabs cs-tabs cs-tabs-border">
        <ul class="cs-sortable">
            <?php

            $j          = 0;
            $slides_num = count($slides);
            foreach ($slides as $slide) {
                if ($j == $slides_num - 1) {
                    echo '<li class="ui-state-default active">';
                } else {
                    echo '<li class="ui-state-default">';
                }
                echo '<a><span class="cs-slide-name-text">Slide<span class="cs-slide-index">' . ($slide['position'] + 1) . '</span></span></a>';
                echo '<span title="Duplicate slide" class="cs-duplicate"></span>';
                echo '<span title="Delete slide" class="cs-close"></span>';
                echo '</li>';

                $j++;
            }

            ?>
            <li class="ui-state-default ui-state-disabled"><a class="cs-add-new">Add Slide</a></li>
            <div style="clear: both;"></div>
        </ul>

        <div class="cs-slides-list">
            <?php
            foreach ($slides as $slide) {
                echo '<div class="cs-slide">';
                crellyslider_printSlide($slider, $slide, $edit);
                echo '</div>';
            }

            ?>
        </div>
        <div class="cs-void-slide"><?php crellyslider_printSlide($slider, false, $edit); ?></div>

        <div style="clear: both"></div>
    </div>
</div>

<?php
// Prints a slide. If the ID is not false, prints the values from MYSQL database, else prints a slide with default values. It has to receive the $edit variable because the elements.php file has to see it
function crellyslider_printSlide($slider, $slide, $edit)
{
    $void = !$slide ? true : false;

    $animations = [
        'none'       => ['None'],
        'fade'       => ['Fade'],
        'fadeLeft'   => ['Fade left'],
        'fadeRight'  => ['Fade right'],
        'slideLeft'  => ['Slide left'],
        'slideRight' => ['Slide right'],
        'slideUp'    => ['Slide up'],
        'slideDown'  => ['Slide down'],
    ];
    ?>

    <table class="cs-slide-settings-list cs-table">
        <thead>
        <tr class="odd-row">
            <th colspan="3">Slide Options</th>
        </tr>
        </thead>

        <tbody>
        <tr class="cs-table-header">
            <td>Option</td>
            <td>Parameter</td>
            <td>Description</td>
        </tr>
        <tr>
            <td class="cs-name">Background</td>
            <td class="cs-content">
                <br/>
                <br/>

                <?php
                //var_dump($void);
                if ($void): ?>
                    Background image:
                    <form>
                        <input type="radio" value="0" name="cs-slide-background_type_image" checked/> None
                        <input type="radio" value="1" name="cs-slide-background_type_image"/>
                        <!--<input class="cs-slide-background_type_image-upload-button cs-button cs-is-default" type="button" value="Select image" /> -->
                        <div class="up">
                            <input type="text" name="background_type_image" value="" style="width: 90%;font-size: 16px;" class="image cs-slide-background_type_image-upload-button cs-button cs-is-default">
                            <a href="javascript:void(0);" data-choose="Choose a File" data-update="Select File" class="picurlbtn">
                                <span></span>Browse</a>
                            <img class="mfn-opts-screenshot image" src="" style="display: none;"> <a href="javascript:void(0);" class="mfn-opts-upload-remove" style="display: none;">Remove Upload</a>
                        </div>
                    </form>
                    <br/>
                    <br/>

                    Background color:
                    <form>
                        <br/>
                        <br/>
                        <input type="radio" value="0" name="cs-slide-background_type_color" checked/> Transparent
                        <br/>
                        <input type="radio" value="1" name="cs-slide-background_type_color"/> <input type="text" class="cs_slide_background_type_color_picker_input" style="background-color: #f0faf8" value="#f0faf8"/>
                        <br/>
                        <input type="radio" value="2" name="cs-slide-background_type_color" placeholder="Enter value"/> <input class="cs-slide-background_type_color-manual" type="text"/>
                    </form>

                    <br/>
                    <br/>

                    Background position-x:
                    <input type="text" value="center" class="cs-slide-background_propriety_position_x"/>
                    <br/>
                    Background position-y:
                    <input type="text" value="center" class="cs-slide-background_propriety_position_y"/>

                    <br/>
                    <br/>

                    Background repeat:
                    <form>
                        <input type="radio" value="1" name="cs-slide-background_repeat"/> Repeat
                        <input type="radio" value="0" name="cs-slide-background_repeat" checked/> No repeat
                    </form>

                    <br/>
                    <br/>

                    Background size:
                    <input type="text" value="cover" class="cs-slide-background_propriety_size"/>
                <?php else: ?>
                    Background image:
                    <form>
                        <?php if ($slide['background_type_image'] == 'none' || $slide['background_type_image'] == 'undefined' || $slide['background_type_image'] == ''): ?>
                            <input type="radio" value="0" name="cs-slide-background_type_image" checked/> None
                            <input type="radio" value="1" name="cs-slide-background_type_image"/> image
                                                                                                  <!-- <input class="cs-slide-background_type_image-upload-button cs-button cs-is-default" type="button" value="Select image" /> -->
                            <div class="up">
                                <input type="text" name="background_type_image" value="" style="width: 90%;font-size: 16px;" class="image cs-slide-background_type_image-upload-button cs-button cs-is-default">
                                <a href="javascript:void(0);" data-choose="Choose a File" data-update="Select File" class="picurlbtn">
                                    <span></span>Browse</a>
                                <img class="mfn-opts-screenshot image" src="" style="display: none;"> <a href="javascript:void(0);" class="mfn-opts-upload-remove" style="display: none;">Remove Upload</a>
                            </div>
                        <?php else: ?>
                            <input type="radio" value="0" name="cs-slide-background_type_image"/> None
                            <input type="radio" value="1" name="cs-slide-background_type_image" checked/> image
                            <?php

                            // echo -----------------------------------------------------
                            echo '<div class="up">';

                            echo '<input type="text" name="background_type_image" value="' . $slide['background_type_image'] . '" style="width: 90%;font-size: 16px;" class="image" />';

                            echo ' <a href="javascript:void(0);" data-choose="Choose a File" data-update="Select File" class="picurlbtn cs-slide-background_type_image-upload-button cs-button cs-is-default" style="display:none;"><span></span>Browse</a>';

                            echo '<img class="mfn-opts-screenshot image" src="' . $slide['background_type_image'] . '" />';

                            echo ' <a href="javascript:void(0);" class="mfn-opts-upload-remove">Remove Upload</a>';

                            echo '</div>';

                            ?>

                        <?php endif; ?>
                    </form>

                    <br/>
                    <br/>

                    Background color:
                    <form>
                        <br/>
                        <br/>
                        <?php if ($slide['background_type_color'] == 'transparent'): ?>
                            <input type="radio" value="0" name="cs-slide-background_type_color" checked/> Transparent
                        <?php else: ?>
                            <input type="radio" value="0" name="cs-slide-background_type_color"/> Transparent
                        <?php endif; ?>

                        <br/>
                        <?php if ($slide['background_type_color_input'] == '1' || ($slide['background_type_color_input'] == '-1' && $slide['background_type_color'] != 'transparent')): ?>
                            <input type="radio" value="1" name="cs-slide-background_type_color" checked/> <input class="cs_slide_background_type_color_picker_input" type="text" style="background-color: <?php echo $slide['background_type_color']; ?>"
                                                                                                                 value="<?php echo $slide['background_type_color']; ?>"/>
                        <?php else: ?>
                            <input type="radio" value="1" name="cs-slide-background_type_color"/> <input class="cs_slide_background_type_color_picker_input" type="text" style="background-color: #ffffff" value="#ffffff"/>
                        <?php endif; ?>
                        <br/>
                        <?php if ($slide['background_type_color_input'] == '2'): ?>
                            <input type="radio" value="2" name="cs-slide-background_type_color" checked/> <input class="cs-slide-background_type_color-manual" type="text" value="<?php echo $slide['background_type_color']; ?>"/>
                        <?php else: ?>
                            <input type="radio" value="2" name="cs-slide-background_type_color"/> <input class="cs-slide-background_type_color-manual" type="text" placeholder="Enter value"/>
                        <?php endif; ?>
                    </form>

                    <br/>
                    <br/>

                    Background position-x:
                    <input type="text" value="<?php echo $slide['background_propriety_position_x']; ?>" class="cs-slide-background_propriety_position_x"/>
                    <br/>
                    Background position-y:
                    <input type="text" value="<?php echo $slide['background_propriety_position_y']; ?>" class="cs-slide-background_propriety_position_y"/>

                    <br/>
                    <br/>

                    Background repeat:
                    <form>
                        <?php if ($slide['background_repeat'] == 'repeat'): ?>
                            <input type="radio" value="1" name="cs-slide-background_repeat" checked/> Repeat
                            <input type="radio" value="0" name="cs-slide-background_repeat"/> No repeat
                        <?php else: ?>
                            <input type="radio" value="1" name="cs-slide-background_repeat"/> Repeat
                            <input type="radio" value="0" name="cs-slide-background_repeat" checked/> No repeat
                        <?php endif; ?>
                    </form>

                    <br/>
                    <br/>

                    Background size:
                    <input type="text" value="<?php echo $slide['background_propriety_size']; ?>" class="cs-slide-background_propriety_size"/>
                <?php endif; ?>
            </td>
            <td class="cs-description">
                The background of the slide and its proprieties.
                <br/>
                <br/>
                <strong>Presets:</strong>
                <br/>
                <ul class="cs-style-list">
                    <li><a class="cs-slide-background-image-fullwidth-preset" href="javascript: void(0);">Full width responsive background image</a></li>
                    <li><a class="cs-slide-background-image-pattern-preset" href="javascript: void(0);">Pattern background image</a></li>
                </ul>
            </td>
        </tr>
        <tr>
            <td class="cs-name">In animation</td>
            <td class="cs-content">
                <select class="cs-slide-data_in">
                    <?php
                    foreach ($animations as $key => $value) {
                        echo '<option value="' . $key . '"';
                        if (($void && $value[0]) || (!$void && $slide['data_in'] == $key)) {
                            echo ' selected';
                        }
                        echo '>' . $value[0] . '</option>';
                    }
                    ?>
                </select>
            </td>
            <td class="cs-description">
                The in animation of the slide.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Out animation</td>
            <td class="cs-content">
                <select class="cs-slide-data_out">
                    <?php
                    foreach ($animations as $key => $value) {
                        echo '<option value="' . $key . '"';
                        if (($void && $value[0]) || (!$void && $slide['data_out'] == $key)) {
                            echo ' selected';
                        }
                        echo '>' . $value[0] . '</option>';
                    }
                    ?>
                </select>
            </td>
            <td class="cs-description">
                The out animation of the slide.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Time</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-slide-data_time" type="text" value="3000" />';
                } else {
                    echo '<input class="cs-slide-data_time" type="text" value="' . $slide['data_time'] . '" />';
                }
                ?>
                ms
            </td>
            <td class="cs-description">
                The time that the slide will remain on the screen.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Ease In</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-slide-data_easeIn" type="text" value="300" />';
                } else {
                    echo '<input class="cs-slide-data_easeIn" type="text" value="' . $slide['data_easeIn'] . '" />';
                }
                ?>
                ms
            </td>
            <td class="cs-description">
                The time that the slide will take to get in.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Ease Out</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-slide-data_easeOut" type="text" value="300" />';
                } else {
                    echo '<input class="cs-slide-data_easeOut" type="text" value="' . $slide['data_easeOut'] . '" />';
                }
                ?>
                ms
            </td>
            <td class="cs-description">
                The time that the slide will take to get out.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Link</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-background-link" type="text" value="" />';
                } else {
                    echo '<input class="cs-background-link" type="text" value="' . stripslashes((string) $slide['link']) . '" />';
                }
                ?>
                <br/>
                <?php
                if ($void) {
                    echo '<input class="cs-background-link_new_tab" type="checkbox" />Open link in a new tab';
                } else {
                    if ($slide['link_new_tab']) {
                        echo '<input class="cs-background-link_new_tab" type="checkbox" checked />Open link in a new tab';
                    } else {
                        echo '<input class="cs-background-link_new_tab" type="checkbox" />Open link in a new tab';
                    }
                }
                ?>
            </td>
            <td class="cs-description">
                Open the link (e.g.: http://www.google.ch) when the user clicks on the background. Leave it empty if you don\'t want it.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Custom CSS</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<textarea class="cs-slide-custom_css"></textarea>';
                } else {
                    echo '<textarea class="cs-slide-custom_css">' . stripslashes((string) $slide['custom_css']) . '</textarea>';
                }
                ?>
            </td>
            <td class="cs-description">
                Apply CSS to the slide.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Draft</td>
            <td class="cs-content">
                <select class="cs-slide-draft">
                    <?php
                    if (!$void && $slide['draft']) {
                        echo '<option selected value="1">Yes</option>';
                        echo '<option value="0">No</option>';
                    } else {
                        echo '<option value="1">Yes</option>';
                        echo '<option selected value="0">No</option>';
                    }
                    ?>
                </select>
            </td>
            <td class="cs-description">
                If it is set to "Yes", the slide will not be displayed to the users.
            </td>
        </tr>
        </tbody>
    </table>

    <br/>
    <br/>

    <?php
    // If the slide is not void, select its elements
    if (!$void) {
        global $xoopsDB;

        $id = $_GET['id'] ?? null;
        /*if($id == NULL || ($id != NULL && !CrellySliderCommon::sliderExists($id))) {
            die();
        }*/
        if ($id == null) {
            die();
        }

        $slide_parent = $slide['position'];
        $sqlelements  = "SELECT * FROM " . $xoopsDB->prefix("crellyslider_elements") . " WHERE slider_parent = '" . $id . "' AND slide_parent = '" . $slide_parent . "'";
        $result       = $xoopsDB->query($sqlelements);
        while ($myrowelements = $xoopsDB->fetchArray($result)) {
            $elements[] = $myrowelements;
        }
    } else {
        $slide_id = null;
        $elements = null;
    }
    //var_dump($slide);
    crellyslider_printElements($edit, $slider, $slide, $elements);
}

?>
