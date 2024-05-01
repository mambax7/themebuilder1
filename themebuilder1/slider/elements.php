<?php
//// Exit if accessed directly

function crellyslider_printElements($edit, $slider, $slide, $elements)
{
    ?>
    <div class="cs-elements">

        <div
                class="cs-slide-editing-area"
            <?php //if($edit && $slide):

            if ($slide['background_type_image'] != 'none') {
                echo 'data-background-image-src="' . stripslashes((string) $slide['background_type_image']) . '"';
            }
            ?>
                style="
                        width: <?php echo $slider['startWidth']; ?>px;
                        height: <?php echo $slider['startHeight']; ?>px;
                        background-image: url('<?php echo stripslashes((string) $slide['background_type_image']); ?>');
                        background-color: <?php echo $slide['background_type_color'] == 'transparent' ? 'rgb(255, 255, 255)' : $slide['background_type_color']; ?>;
                        background-position: <?php echo $slide['background_propriety_position_x'] . ' ' . $slide['background_propriety_position_y']; ?>;
                        background-repeat: <?php echo $slide['background_repeat']; ?>;
                        background-size: <?php echo $slide['background_propriety_size']; ?>;
                <?php echo stripslashes((string) $slide['custom_css']); ?>
                        "
            <?php //endif;
            ?>
        >
            <?php
            if ($edit && $elements != null) {
                foreach ($elements as $element) {
                    if ($element['link'] != '') {
                        $target = $element['link_new_tab'] == 1 ? 'target="_blank"' : '';

                        $link_output = '<a' . "\n" .
                                       'class="cs-element cs-' . $element['type'] . '-element"' . "\n" .
                                       'href="' . stripslashes((string) $element['link']) . '"' . "\n" .
                                       $target . "\n" .
                                       'style="' .
                                       'z-index: ' . $element['z_index'] . ';' . "\n" .
                                       'top: ' . $element['data_top'] . 'px;' . "\n" .
                                       'left: ' . $element['data_left'] . 'px;' . "\n" .
                                       '">' . "\n";

                        echo $link_output;
                    }

                    switch ($element['type']) {
                        case 'text':
                            ?>
                            <div
                                    style="
                                    <?php
                                    if ($element['link'] == '') {
                                        echo 'z-index: ' . $element['z_index'] . ';';
                                        echo 'left: ' . $element['data_left'] . 'px;';
                                        echo 'top: ' . $element['data_top'] . 'px;';
                                    }
                                    echo stripslashes((string) $element['custom_css']);
                                    ?>
                                            "
                                <?php
                                if ($element['link'] == '') {
                                    echo 'class="cs-element cs-text-element ' . stripslashes((string) $element['custom_css_classes']) . '"';
                                } else {
                                    echo 'class="' . stripslashes((string) $element['custom_css_classes']) . '"';
                                }
                                ?>
                            >
                                <?php echo stripslashes((string) $element['inner_html']); ?>
                            </div>
                            <?php
                            break;

                        case 'image':
                            ?>
                            <img
                                    src="<?php echo $element['image_src']; /*echo CrellySliderCommon::getURL(stripslashes($element->image_src));*/ ?>"
                                    alt="<?php echo $element['image_alt']; ?>"
                                    style="
                                    <?php
                                    if ($element['link'] == '') {
                                        echo 'z-index: ' . $element['z_index'] . ';';
                                        echo 'left: ' . $element['data_left'] . 'px;';
                                        echo 'top: ' . $element['data_top'] . 'px;';
                                    }
                                    echo stripslashes((string) $element['custom_css']);
                                    ?>
                                            "
                                <?php
                                if ($element['link'] == '') {
                                    echo 'class="cs-element cs-image-element ' . stripslashes((string) $element['custom_css_classes']) . '"';
                                } else {
                                    echo 'class="' . stripslashes((string) $element['custom_css_classes']) . '"';
                                }
                                ?>
                            />
                            <?php
                            break;

                        case 'youtube_video':
                            ?>
                            <div
                                    class="cs-element cs-video-element"
                                    style="
                                    <?php
                                    if ($element['link'] == '') {
                                        echo 'z-index: ' . $element['z_index'] . ';';
                                        echo 'left: ' . $element['data_left'] . 'px;';
                                        echo 'top: ' . $element['data_top'] . 'px;';
                                    }
                                    ?>
                                            "
                            >
                                <div class="cs-avoid-interaction"></div>
                                <iframe style="<?php echo stripslashes((string) $element['custom_css']); ?>" class="cs-yt-iframe <?php echo stripslashes((string) $element['custom_css_classes']); ?>" type="text/html" width="560" height="315"
                                        src="<?php echo 'http://www.youtube.com/embed/' . $element['video_id']; ?>?enablejsapi=1" frameborder="0"></iframe>
                            </div>
                            <?php
                            break;

                        case 'vimeo_video':
                            ?>
                            <div
                                    class="cs-element cs-video-element"
                                    style="
                                    <?php
                                    if ($element['link'] == '') {
                                        echo 'z-index: ' . $element['z_index'] . ';';
                                        echo 'left: ' . $element['data_left'] . 'px;';
                                        echo 'top: ' . $element['data_top'] . 'px;';
                                    }
                                    ?>
                                            "
                            >
                                <div class="cs-avoid-interaction"></div>
                                <iframe style="<?php echo stripslashes((string) $element['custom_css']); ?>" class="cs-vimeo-iframe <?php echo stripslashes((string) $element['custom_css_classes']); ?>" src="<?php echo 'https://player.vimeo.com/video/' . $element['video_id']; ?>?api=1" width="560" height="315"
                                        frameborder="0"></iframe>
                            </div>
                            <?php
                            break;
                    }

                    if ($element['link'] != '') {
                        echo '</a>' . "\n";
                    }
                }
            }
            ?>
        </div>

        <br/>
        <br/>

        <div class="cs-elements-actions">
            <div style="float: left;">
                <a class="cs-add-text-element cs-button cs-is-warning">Add text</a>
                <a class="cs-add-image-element cs-button cs-is-warning">Add image</a>
                <a class="cs-add-video-element cs-button cs-is-warning">Add video</a>
            </div>
            <div style="float: right;">
                <a class="cs-live-preview cs-button cs-is-success">Live preview</a>
                <a class="cs-delete-element cs-button cs-is-danger cs-is-disabled">Delete element</a>
                <a class="cs-duplicate-element cs-button cs-is-primary cs-is-disabled">Duplicate element</a>
            </div>
            <div style="clear: both;"></div>
        </div>

        <br/>
        <br/>

        <div class="cs-elements-list">
            <?php
            if ($edit && $elements != null) {
                foreach ($elements as $element) {
                    switch ($element['type']) {
                        case 'text':
                            echo '<div class="cs-element-settings cs-text-element-settings" style="display: none;">';
                            crellyslider_printTextElement($element);
                            echo '</div>';
                            break;

                        case 'image':
                            echo '<div class="cs-element-settings cs-image-element-settings" style="display: none;">';
                            crellyslider_printImageElement($element);
                            echo '</div>';
                            break;

                        case 'youtube_video':
                        case 'vimeo_video':
                            echo '<div class="cs-element-settings cs-video-element-settings" style="display: none;">';
                            crellyslider_printVideoElement($element);
                            echo '</div>';
                            break;
                    }
                }
            }
            echo '<div class="cs-void-element-settings cs-void-text-element-settings cs-element-settings cs-text-element-settings">';
            crellyslider_printTextElement(false);
            echo '</div>';
            echo '<div class="cs-void-element-settings cs-void-image-element-settings cs-element-settings cs-image-element-settings">';
            crellyslider_printImageElement(false);
            echo '</div>';
            echo '<div class="cs-void-element-settings cs-void-video-element-settings cs-element-settings cs-video-element-settings">';
            crellyslider_printVideoElement(false);
            echo '</div>';
            ?>
        </div>

    </div>
<?php
}

function crellyslider_printTextElement($element)
{
    $void = !$element ? true : false;

    $animations = [
        'none'           => ['None'],
        'slideDown'      => ['Slide down'],
        'slideUp'        => ['Slide up'],
        'slideLeft'      => ['Slide left'],
        'slideRight'     => ['Slide right'],
        'fade'           => ['Fade'],
        'fadeDown'       => ['Fade down'],
        'fadeUp'         => ['Fade up'],
        'fadeLeft'       => ['Fade left'],
        'fadeRight'      => ['Fade right'],
        'fadeSmallDown'  => ['Fade small down'],
        'fadeSmallUp'    => ['Fade small up'],
        'fadeSmallLeft'  => ['Fade small left'],
        'fadeSmallRight' => ['Fade small right'],
    ];

    ?>
    <table class="cs-element-settings-list cs-text-element-settings-list cs-table">
        <thead>
        <tr class="odd-row">
            <th colspan="3">Element Options</th>
        </tr>
        </thead>

        <tbody>
        <tr class="cs-table-header">
            <td>Option</td>
            <td>Parameter</td>
            <td>Description</td>
        </tr>
        <tr>
            <td class="cs-name">Text</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<textarea class="cs-element-inner_html">Text element</textarea>';
                } else {
                    echo '<textarea class="cs-element-inner_html">' . stripslashes((string) $element['inner_html']) . '</textarea>';
                }
                ?>
            </td>
            <td class="cs-description">
                Write the text or the HTML.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Left</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_left" type="text" value="0" />';
                } else {
                    echo '<input class="cs-element-data_left" type="text" value="' . $element['data_left'] . '" />';
                }
                ?>
                px
                <br/>
                <br/>
                <input type="button" class="cs-element-center-x cs-button cs-is-default" value="Center horizontally"/>
            </td>
            <td class="cs-description">
                Left distance in px from the start width.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Top</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_top" type="text" value="0" />';
                } else {
                    echo '<input class="cs-element-data_top" type="text" value="' . $element['data_top'] . '" />';
                }
                ?>
                px
                <br/>
                <br/>
                <input type="button" class="cs-element-center-y cs-button cs-is-default" value="Center vertically"/>
            </td>
            <td class="cs-description">
                Top distance in px from the start height.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Z - index</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-z_index" type="text" value="1" />';
                } else {
                    echo '<input class="cs-element-z_index" type="text" value="' . $element['z_index'] . '" />';
                }
                ?>
            </td>
            <td class="cs-description">
                An element with an high z-index will cover an element with a lower z-index if they overlap.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Delay</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_delay" type="text" value="0" />';
                } else {
                    echo '<input class="cs-element-data_delay" type="text" value="' . $element['data_delay'] . '" />';
                }
                ?>
                ms
            </td>
            <td class="cs-description">
                How long will the element wait before the entrance.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Time</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_time" type="text" value="all" />';
                } else {
                    echo '<input class="cs-element-data_time" type="text" value="' . $element['data_time'] . '" />';
                }
                ?>
                ms
            </td>
            <td class="cs-description">
                How long will the element be displayed during the slide execution.
                <br/>
                <br/>
                Write "all" to set the entire time.
                <br/>
                <br/>
                Write "3000" to set 3000 milliseconds minus delay time (so, if the delay time is 1000 milliseconds, the element will be displayed for 3000-1000=2000 milliseconds).
            </td>
        </tr>
        <tr>
            <td class="cs-name">In animation</td>
            <td class="cs-content">
                <select class="cs-element-data_in">
                    <?php
                    foreach ($animations as $key => $value) {
                        echo '<option value="' . $key . '"';
                        //if(($void && $value[1]) || (!$void && $element['data_in'] == $key)) {
                        if (($void && $value[0]) || (!$void && $element['data_in'] == $key)) {
                            echo ' selected';
                        }
                        echo '>' . $value[0] . '</option>';
                    }
                    ?>
                </select>
            </td>
            <td class="cs-description">
                The in animation of the element.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Out animation</td>
            <td class="cs-content">
                <select class="cs-element-data_out">
                    <?php
                    foreach ($animations as $key => $value) {
                        echo '<option value="' . $key . '"';
                        if (($void && $value[0]) || (!$void && $element['data_out'] == $key)) {
                            echo ' selected';
                        }
                        echo '>' . $value[0] . '</option>';
                    }
                    ?>
                </select>
                <br/>
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_ignoreEaseOut" type="checkbox" />Disable synchronization with slide out animation';
                } else {
                    if ($element['data_ignoreEaseOut']) {
                        echo '<input class="cs-element-data_ignoreEaseOut" type="checkbox" checked />Disable synchronization with slide out animation';
                    } else {
                        echo '<input class="cs-element-data_ignoreEaseOut" type="checkbox" />Disable synchronization with slide out animation';
                    }
                }
                ?>
            </td>
            <td class="cs-description">
                The out animation of the element.<br/><br/>Disable synchronization with slide out animation: if not checked, the slide out animation won\'t start until all the elements that have this option unchecked are animated out.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Ease in</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_easeIn" type="text" value="300" />';
                } else {
                    echo '<input class="cs-element-data_easeIn" type="text" value="' . $element['data_easeIn'] . '" />';
                }
                ?>
                ms
            </td>
            <td class="cs-description">
                How long will the in animation take.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Ease out</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_easeOut" type="text" value="300" />';
                } else {
                    echo '<input class="cs-element-data_easeOut" type="text" value="' . $element['data_easeOut'] . '" />';
                }
                ?>
                ms
            </td>
            <td class="cs-description">
                How long will the out animation take.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Link</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-link" type="text" value="" />';
                } else {
                    echo '<input class="cs-element-link" type="text" value="' . stripslashes((string) $element['link']) . '" />';
                }
                ?>
                <br/>
                <?php
                if ($void) {
                    echo '<input class="cs-element-link_new_tab" type="checkbox" />Open link in a new tab';
                } else {
                    if ($element['link_new_tab']) {
                        echo '<input class="cs-element-link_new_tab" type="checkbox" checked />Open link in a new tab';
                    } else {
                        echo '<input class="cs-element-link_new_tab" type="checkbox" />Open link in a new tab';
                    }
                }
                ?>
            </td>
            <td class="cs-description">
                Open the link (e.g.: http://www.google.it) on click. Leave it empty if you don\'t want it.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Custom CSS</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<textarea class="cs-element-custom_css"></textarea>';
                } else {
                    echo '<textarea class="cs-element-custom_css">' . stripslashes((string) $element['custom_css']) . '</textarea>';
                }
                ?>
            </td>
            <td class="cs-description">
                Style the element.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Custom classes</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-custom_css_classes" type="text" />';
                } else {
                    echo '<input class="cs-element-custom_css_classes" type="text" value="' . $element['custom_css_classes'] . '" />';
                }
                ?>
            </td>
            <td class="cs-description">
                Apply custom CSS classes to the element. The style of the classes may not work when working on backend.
            </td>
        </tr>
        </tbody>
    </table>
    <?php
}

function crellyslider_printImageElement($element)
{
    $void = !$element ? true : false;

    $animations = [
        'none'           => ['None'],
        'slideDown'      => ['Slide down'],
        'slideUp'        => ['Slide up'],
        'slideLeft'      => ['Slide left'],
        'slideRight'     => ['Slide right'],
        'fade'           => ['Fade'],
        'fadeDown'       => ['Fade down'],
        'fadeUp'         => ['Fade up'],
        'fadeLeft'       => ['Fade left'],
        'fadeRight'      => ['Fade right'],
        'fadeSmallDown'  => ['Fade small down'],
        'fadeSmallUp'    => ['Fade small up'],
        'fadeSmallLeft'  => ['Fade small left'],
        'fadeSmallRight' => ['Fade small right'],
    ];

    ?>
    <table class="cs-element-settings-list cs-image-element-settings-list cs-table">
        <thead>
        <tr class="odd-row">
            <th colspan="3">Element Options</th>
        </tr>
        </thead>
        <tbody>
        <tr class="cs-table-header">
            <td>Option</td>
            <td>Parameter</td>
            <td>Description</td>
        </tr>
        <tr>
            <td class="cs-name">Modify image</td>
            <td class="cs-content">
                <?php
                if ($void) { //echo '<input class="cs-image-element-upload-button cs-button cs-is-default" type="button" value="Open gallery' . '" />';
                    /*echo '<div class="up">';
                        echo '<input type="text" name="element_type_image" value="" style="width: 90%;font-size: 16px;" class="image cs-image-element-upload-button" />';
                        echo ' <a href="javascript:void(0);" data-choose="Choose a File" data-update="Select File" class="picurlbtn" style="display:none;"><span></span>Browse</a>';
                        echo '<img class="mfn-opts-screenshot image" src="" />';
                        echo ' <a href="javascript:void(0);" class="mfn-opts-upload-remove">Remove Upload</a>';
                    echo '</div>';*/

                    echo '<div class="up">
									<input type="text" name="element_type_image" value="" style="width: 90%;font-size: 16px;" class="image cs-image-element-upload-button"> 
									<a href="javascript:void(0);" data-choose="Choose a File" data-update="Select File" class="picurlbtn">
									<span></span>Browse</a>
									<img class="mfn-opts-screenshot image" src="" style="display: none;"> <a href="javascript:void(0);" class="mfn-opts-upload-remove" style="display: none;">Remove Upload</a>
						</div>';
                } else { //echo '<input data-src="' . stripslashes($element['image_src']) . '" data-alt="' . $element['image_alt'] . '" class="cs-image-element-upload-button cs-button cs-is-default" type="button" value="Open gallery' . '" />';
                    // echo -----------------------------------------------------
                    //var_dump($element);
                    echo '<div class="up">';
                    echo '<input type="text" name="element_type_image" value="' . $element['image_src'] . '" style="width: 90%;font-size: 16px;" class="image cs-image-element-upload-button" />';
                    echo ' <a href="javascript:void(0);" data-choose="Choose a File" data-update="Select File" class="picurlbtn" style="display:none;"><span></span>Browse</a>';
                    echo '<img class="mfn-opts-screenshot image" src="' . $element['image_src'] . '" />';
                    echo ' <a href="javascript:void(0);" class="mfn-opts-upload-remove">Remove Upload</a>';
                    echo '</div>';
                }
                ?>
            </td>
            <td class="cs-description">
                Change the image source or the alt text.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Left</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_left" type="text" value="0" />';
                } else {
                    echo '<input class="cs-element-data_left" type="text" value="' . $element['data_left'] . '" />';
                }
                ?>
                px
                <br/>
                <br/>
                <input type="button" class="cs-element-center-x cs-button cs-is-default" value="Center horizontally"/>
            </td>
            <td class="cs-description">
                Left distance in px from the start width.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Top</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_top" type="text" value="0" />';
                } else {
                    echo '<input class="cs-element-data_top" type="text" value="' . $element['data_top'] . '" />';
                }
                ?>
                px
                <br/>
                <br/>
                <input type="button" class="cs-element-center-y cs-button cs-is-default" value="Center vertically"/>
            </td>
            <td class="cs-description">
                Top distance in px from the start height.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Z - index</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-z_index" type="text" value="1" />';
                } else {
                    echo '<input class="cs-element-z_index" type="text" value="' . $element['z_index'] . '" />';
                }
                ?>
            </td>
            <td class="cs-description">
                An element with an high z-index will cover an element with a lower z-index if they overlap.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Delay</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_delay" type="text" value="0" />';
                } else {
                    echo '<input class="cs-element-data_delay" type="text" value="' . $element['data_delay'] . '" />';
                }
                ?>
                ms
            </td>
            <td class="cs-description">
                How long will the element wait before the entrance.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Time</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_time" type="text" value="all" />';
                } else {
                    echo '<input class="cs-element-data_time" type="text" value="' . $element['data_time'] . '" />';
                }
                ?>
                ms
            </td>
            <td class="cs-description">
                How long will the element be displayed during the slide execution.
                <br/>
                <br/>
                Write "all" to set the entire time.
                <br/>
                <br/>
                Write "3000" to set 3000 milliseconds minus delay time (so, if the delay time is 1000 milliseconds, the element will be displayed for 3000-1000=2000 milliseconds).
            </td>
        </tr>
        <tr>
            <td class="cs-name">In animation</td>
            <td class="cs-content">
                <select class="cs-element-data_in">
                    <?php
                    foreach ($animations as $key => $value) {
                        echo '<option value="' . $key . '"';
                        if (($void && $value[0]) || (!$void && $element['data_in'] == $key)) {
                            echo ' selected';
                        }
                        echo '>' . $value[0] . '</option>';
                    }
                    ?>
                </select>
            </td>
            <td class="cs-description">
                The in animation of the element.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Out animation</td>
            <td class="cs-content">
                <select class="cs-element-data_out">
                    <?php
                    foreach ($animations as $key => $value) {
                        echo '<option value="' . $key . '"';
                        if (($void && $value[0]) || (!$void && $element['data_out'] == $key)) {
                            echo ' selected';
                        }
                        echo '>' . $value[0] . '</option>';
                    }
                    ?>
                </select>
                <br/>
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_ignoreEaseOut" type="checkbox" />Disable synchronization with slide out animation';
                } else {
                    if ($element['data_ignoreEaseOut']) {
                        echo '<input class="cs-element-data_ignoreEaseOut" type="checkbox" checked />Disable synchronization with slide out animation';
                    } else {
                        echo '<input class="cs-element-data_ignoreEaseOut" type="checkbox" />Disable synchronization with slide out animation';
                    }
                }
                ?>
            </td>
            <td class="cs-description">
                The out animation of the element.<br/><br/>Disable synchronization with slide out animation: if not checked, the slide out animation won\'t start until all the elements that have this option unchecked are animated out.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Ease in</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_easeIn" type="text" value="300" />';
                } else {
                    echo '<input class="cs-element-data_easeIn" type="text" value="' . $element['data_easeIn'] . '" />';
                }
                ?>
                ms
            </td>
            <td class="cs-description">
                How long will the in animation take.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Ease out</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_easeOut" type="text" value="300" />';
                } else {
                    echo '<input class="cs-element-data_easeOut" type="text" value="' . $element['data_easeOut'] . '" />';
                }
                ?>
                ms
            </td>
            <td class="cs-description">
                How long will the out animation take.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Link</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-link" type="text" value="" />';
                } else {
                    echo '<input class="cs-element-link" type="text" value="' . stripslashes((string) $element['link']) . '" />';
                }
                ?>
                <br/>
                <?php
                if ($void) {
                    echo '<input class="cs-element-link_new_tab" type="checkbox" />Open link in a new tab';
                } else {
                    if ($element['link_new_tab']) {
                        echo '<input class="cs-element-link_new_tab" type="checkbox" checked />Open link in a new tab';
                    } else {
                        echo '<input class="cs-element-link_new_tab" type="checkbox" />Open link in a new tab';
                    }
                }
                ?>
            </td>
            <td class="cs-description">
                Open the link (e.g.: http://www.google.tn) on click. Leave it empty if you don\'t want it.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Custom CSS</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<textarea class="cs-element-custom_css"></textarea>';
                } else {
                    echo '<textarea class="cs-element-custom_css">' . stripslashes((string) $element['custom_css']) . '</textarea>';
                }
                ?>
            </td>
            <td class="cs-description">
                Style the element.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Custom classes</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-custom_css_classes" type="text" />';
                } else {
                    echo '<input class="cs-element-custom_css_classes" type="text" value="' . $element['custom_css_classes'] . '" />';
                }
                ?>
            </td>
            <td class="cs-description">
                Apply custom CSS classes to the element. The style of the classes may not work when working on backend.
            </td>
        </tr>
        </tbody>
    </table>
    <?php
}

function crellyslider_printVideoElement($element)
{
    $void = !$element ? true : false;

    $animations = [
        'none'           => ['None'],
        'slideDown'      => ['Slide down'],
        'slideUp'        => ['Slide up'],
        'slideLeft'      => ['Slide left'],
        'slideRight'     => ['Slide right'],
        'fade'           => ['Fade', true],
        'fadeDown'       => ['Fade down'],
        'fadeUp'         => ['Fade up'],
        'fadeLeft'       => ['Fade left'],
        'fadeRight'      => ['Fade right'],
        'fadeSmallDown'  => ['Fade small down'],
        'fadeSmallUp'    => ['Fade small up'],
        'fadeSmallLeft'  => ['Fade small left'],
        'fadeSmallRight' => ['Fade small right'],
    ];

    ?>
    <table class="cs-element-settings-list cs-video-element-settings-list cs-table">
        <thead>
        <tr class="odd-row">
            <th colspan="3">Element Options</th>
        </tr>
        </thead>

        <tbody>
        <tr class="cs-table-header">
            <td>Option</td>
            <td>Parameter</td>
            <td>Description</td>
        </tr>
        <tr>
            <td class="cs-name">Video source</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<select class="cs-element-video_src"><option selected value="youtube">YouTube</option><option value="vimeo">Vimeo</option></select>';
                } else {
                    if ($element['type'] == 'youtube_video') {
                        echo '<select class="cs-element-video_src"><option selected value="youtube">YouTube</option><option value="vimeo">Vimeo</option></select>';
                    } else {
                        echo '<select class="cs-element-video_src"><option value="youtube">YouTube</option><option selected value="vimeo">Vimeo</option></select>';
                    }
                }

                echo '<br /><br />';

                if ($void) {
                    echo '<input placeholder="Video ID" class="cs-element-video_id" type="text" />';
                } else {
                    echo '<input placeholder="Video ID" class="cs-element-video_id" type="text" value="' . $element['video_id'] . '" />';
                }
                ?>
            </td>
            <td class="cs-description">
                Set source and ID.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Loop video</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<select class="cs-element-video_loop"><option value="1">Yes' . '</option><option selected value="0">No' . '</option></select>';
                } else {
                    if ($element['video_loop'] == 0) {
                        echo '<select class="cs-element-video_loop"><option value="1">Yes' . '</option><option selected value="0">No' . '</option></select>';
                    } else {
                        echo '<select class="cs-element-video_loop"><option selected value="1">Yes' . '</option><option value="0">No' . '</option></select>';
                    }
                }
                ?>
            </td>
            <td class="cs-description">
                The video will automatically restart from the beginning when it reaches the end.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Autoplay</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<select class="cs-element-video_autoplay"><option value="1">Yes' . '</option><option selected value="0">No' . '</option></select>';
                } else {
                    if ($element['video_autoplay'] == 0) {
                        echo '<select class="cs-element-video_autoplay"><option value="1">Yes' . '</option><option selected value="0">No' . '</option></select>';
                    } else {
                        echo '<select class="cs-element-video_autoplay"><option selected value="1">Yes' . '</option><option value="0">No' . '</option></select>';
                    }
                }
                ?>
            </td>
            <td class="cs-description">
                The video will automatically be played after the in animation.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Left</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_left" type="text" value="0" />';
                } else {
                    echo '<input class="cs-element-data_left" type="text" value="' . $element['data_left'] . '" />';
                }
                ?>
                px
                <br/>
                <br/>
                <input type="button" class="cs-element-center-x cs-button cs-is-default" value="Center horizontally"/>
            </td>
            <td class="cs-description">
                Left distance in px from the start width.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Top</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_top" type="text" value="0" />';
                } else {
                    echo '<input class="cs-element-data_top" type="text" value="' . $element['data_top'] . '" />';
                }
                ?>
                px
                <br/>
                <br/>
                <input type="button" class="cs-element-center-y cs-button cs-is-default" value="Center vertically"/>
            </td>
            <td class="cs-description">
                Top distance in px from the start height.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Z - index</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-z_index" type="text" value="1" />';
                } else {
                    echo '<input class="cs-element-z_index" type="text" value="' . $element['z_index'] . '" />';
                }
                ?>
            </td>
            <td class="cs-description">
                An element with an high z-index will cover an element with a lower z-index if they overlap.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Delay</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_delay" type="text" value="0" />';
                } else {
                    echo '<input class="cs-element-data_delay" type="text" value="' . $element['data_delay'] . '" />';
                }
                ?>
                ms
            </td>
            <td class="cs-description">
                How long will the element wait before the entrance.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Time</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_time" type="text" value="all" />';
                } else {
                    echo '<input class="cs-element-data_time" type="text" value="' . $element['data_time'] . '" />';
                }
                ?>
                ms
            </td>
            <td class="cs-description">
                How long will the element be displayed during the slide execution.
                <br/>
                <br/>
                Write "all" to set the entire time.
                <br/>
                <br/>
                Write "3000" to set 3000 milliseconds minus delay time (so, if the delay time is 1000 milliseconds, the element will be displayed for 3000-1000=2000 milliseconds).
            </td>
        </tr>
        <tr>
            <td class="cs-name">In animation</td>
            <td class="cs-content">
                <select class="cs-element-data_in">
                    <?php
                    foreach ($animations as $key => $value) {
                        echo '<option value="' . $key . '"';
                        if (($void && $value[0]) || (!$void && $element['data_in'] == $key)) {
                            echo ' selected';
                        }
                        echo '>' . $value[0] . '</option>';
                    }
                    ?>
                </select>
            </td>
            <td class="cs-description">
                The in animation of the element.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Out animation</td>
            <td class="cs-content">
                <select class="cs-element-data_out">
                    <?php
                    foreach ($animations as $key => $value) {
                        echo '<option value="' . $key . '"';
                        if (($void && $value[0]) || (!$void && $element['data_out'] == $key)) {
                            echo ' selected';
                        }
                        echo '>' . $value[0] . '</option>';
                    }
                    ?>
                </select>
                <br/>
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_ignoreEaseOut" type="checkbox" />Disable synchronization with slide out animation';
                } else {
                    if ($element['data_ignoreEaseOut']) {
                        echo '<input class="cs-element-data_ignoreEaseOut" type="checkbox" checked />Disable synchronization with slide out animation';
                    } else {
                        echo '<input class="cs-element-data_ignoreEaseOut" type="checkbox" />Disable synchronization with slide out animation';
                    }
                }
                ?>
            </td>
            <td class="cs-description">
                The out animation of the element.<br/><br/>Disable synchronization with slide out animation: if not checked, the slide out animation won\'t start until all the elements that have this option unchecked are animated out.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Ease in</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_easeIn" type="text" value="300" />';
                } else {
                    echo '<input class="cs-element-data_easeIn" type="text" value="' . $element['data_easeIn'] . '" />';
                }
                ?>
                ms
            </td>
            <td class="cs-description">
                How long will the in animation take.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Ease out</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-data_easeOut" type="text" value="300" />';
                } else {
                    echo '<input class="cs-element-data_easeOut" type="text" value="' . $element['data_easeOut'] . '" />';
                }
                ?>
                ms
            </td>
            <td class="cs-description">
                How long will the out animation take.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Custom CSS</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<textarea class="cs-element-custom_css"></textarea>';
                } else {
                    echo '<textarea class="cs-element-custom_css">' . stripslashes((string) $element['custom_css']) . '</textarea>';
                }
                ?>
            </td>
            <td class="cs-description">
                Style the element.
            </td>
        </tr>
        <tr>
            <td class="cs-name">Custom classes</td>
            <td class="cs-content">
                <?php
                if ($void) {
                    echo '<input class="cs-element-custom_css_classes" type="text" />';
                } else {
                    echo '<input class="cs-element-custom_css_classes" type="text" value="' . $element['custom_css_classes'] . '" />';
                }
                ?>
            </td>
            <td class="cs-description">
                Apply custom CSS classes to the element. The style of the classes may not work when working on backend.
            </td>
        </tr>
        </tbody>
    </table>
<?php } ?>
