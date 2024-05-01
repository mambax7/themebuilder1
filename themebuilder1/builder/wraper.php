<?php

if (!function_exists('olivee_get_sliders')) {
    function olivee_get_sliders($all = true)
    {
        global $xoopsDB;
        $sliders  = [0 => '-- Select --'];
        $sql31    = "SELECT * FROM " . $xoopsDB->prefix("crellyslider_sliders") . " ORDER BY id DESC";
        $result31 = $xoopsDB->query($sql31);
        while ($row = $xoopsDB->fetchArray($result31)) {
            $sliders['<{$SLIDER_' . $row['name'] . '_' . $row['id'] . '}>'] = '<{$SLIDER_' . $row['name'] . '_' . $row['id'] . '}>';
        }
        //var_dump($sliders);
        return $sliders;
    }
}

if (!function_exists('olivee_get_menus')) {
    function olivee_get_menus($all = true)
    {
        global $xoopsDB;
        $menus     = [0 => '-- Select --'];
        $sql311    = "SELECT * FROM " . $xoopsDB->prefix("menu_group") . " ORDER BY id DESC";
        $result311 = $xoopsDB->query($sql311);
        while ($row = $xoopsDB->fetchArray($result311)) {
            $menus['<{$MENU_menu_' . $row['id'] . '}>'] = '<{$MENU_menu_' . $row['id'] . '}>';
        }//var_dump($row);
        return $menus;
    }
}

if (!function_exists('olivee_get_idblock')) {
    function olivee_get_idblock($all = true)
    {
        global $xoopsDB;
        $blocksid   = [0 => '-- Select --'];
        $sql3111    = "SELECT * FROM " . $xoopsDB->prefix("newblocks") . " ORDER BY bid ASC";
        $result3111 = $xoopsDB->query($sql3111);
        while ($row = $xoopsDB->fetchArray($result3111)) {
            $blocksid[$row['bid']] = $row['title'];
        }
        return $blocksid;
    }
}

if (!function_exists('mfn_get_animations')) {
    /**
     * GET Animations | Entrance animations for items
     *
     * @return array
     */
    function mfn_get_animations()
    {
        $array = [
            ''                 => '- Not Animated -',
            'fadeIn'           => 'Fade In',
            'fadeInUp'         => 'Fade In Up',
            'fadeInDown'       => 'Fade In Down ',
            'fadeInLeft'       => 'Fade In Left',
            'fadeInRight'      => 'Fade In Right ',
            'fadeInUpLarge'    => 'Fade In Up Large',
            'fadeInDownLarge'  => 'Fade In Down Large',
            'fadeInLeftLarge'  => 'Fade In Left Large',
            'fadeInRightLarge' => 'Fade In Right Large',
            'zoomIn'           => 'Zoom In',
            'zoomInUp'         => 'Zoom In Up',
            'zoomInDown'       => 'Zoom In Down',
            'zoomInLeft'       => 'Zoom In Left',
            'zoomInRight'      => 'Zoom In Right',
            'zoomInUpLarge'    => 'Zoom In Up Large',
            'zoomInDownLarge'  => 'Zoom In Down Large',
            'zoomInLeftLarge'  => 'Zoom In Left Large',
            'bounceIn'         => 'Bounce In',
            'bounceInUp'       => 'Bounce In Up',
            'bounceInDown'     => 'Bounce In Down',
            'bounceInLeft'     => 'Bounce In Left',
            'bounceInRight'    => 'Bounce In Right',
        ];

        return $array;
    }
}

if (!function_exists('mfna_bg_position')) {
    /**
     * Background Position
     *
     * @param string $body
     * @return array
     */
    function mfna_bg_position($element = false)
    {
        $array = [

            'no-repeat;left top;;'    => 'Left Top | no-repeat',
            'repeat;left top;;'       => 'Left Top | repeat',
            'no-repeat;left center;;' => 'Left Center | no-repeat',
            'repeat;left center;;'    => 'Left Center | repeat',
            'no-repeat;left bottom;;' => 'Left Bottom | no-repeat',
            'repeat;left bottom;;'    => 'Left Bottom | repeat',

            'no-repeat;center top;;'    => 'Center Top | no-repeat',
            'repeat;center top;;'       => 'Center Top | repeat',
            'repeat-x;center top;;'     => 'Center Top | repeat-x',
            'no-repeat;center;;'        => 'Center Center | no-repeat',
            'repeat;center;;'           => 'Center Center | repeat',
            'no-repeat;center bottom;;' => 'Center Bottom | no-repeat',
            'repeat;center bottom;;'    => 'Center Bottom | repeat',
            'repeat-x;center bottom;;'  => 'Center Bottom | repeat-x',

            'no-repeat;right top;;'    => 'Right Top | no-repeat',
            'repeat;right top;;'       => 'Right Top | repeat',
            'no-repeat;right center;;' => 'Right Center | no-repeat',
            'repeat;right center;;'    => 'Right Center | repeat',
            'no-repeat;right bottom;;' => 'Right Bottom | no-repeat',
            'repeat;right bottom;;'    => 'Right Bottom | repeat',
        ];

        if ($element == 'column') {
            // Column
            // do NOT change: backward compatibility

        } elseif ($element == 'header') {
            // Header

            $array['fixed']                              = 'Center | no-repeat | fixed';
            $array['no-repeat;center;fixed;cover;still'] = 'Center | no-repeat | fixed | cover';
            $array['parallax']                           = 'Parallax';
        } elseif ($element) {
            // Site Body | <html> tag

            $array['no-repeat;center top;fixed;;'] = 'Center | no-repeat | fixed';
            $array['no-repeat;center;fixed;cover'] = 'Center | no-repeat | fixed | cover';
        } else {
            // Section / Wrap

            $array['no-repeat;center top;fixed;;still']  = 'Center | no-repeat | fixed';
            $array['no-repeat;center;fixed;cover;still'] = 'Center | no-repeat | fixed | cover';
            $array['no-repeat;center top;fixed;cover']   = 'Parallax';
        }

        return $array;
    }
}

if (!function_exists('mfna_bg_size')) {
    /**
     * Skin
     *
     * @return array
     */
    function mfna_bg_size()
    {
        return [
            'auto'            => 'Auto',
            'contain'         => 'Contain',
            'cover'           => 'Cover',
            'cover-ultrawide' => 'Cover, on ultrawide screens only > 1920px',
        ];
    }
}

if (!function_exists('mfna_utc')) {
    /**
     * UTC – Coordinated Universal Time
     *
     * @return array
     */

    function mfna_utc()
    {
        return [
            '-12'    => '-12:00',
            '-11'    => '-11:00 Pago Pago',
            '-10'    => '-10:00 Papeete, Honolulu',
            '-9.5'   => '-9:30',
            '-9'     => '-9:00 Anchorage',
            '-8'     => '-8:00 Los Angeles, Vancouver, Tijuana',
            '-7'     => '-7:00 Phoenix, Calgary, Ciudad Juárez',
            '-6'     => '-6:00 Chicago, Guatemala City, Mexico City, San José, San Salvador, Winnipeg',
            '-5'     => '-5:00 New York, Lima, Toronto, Bogotá, Havana, Kingston',
            '-4'     => '-4:00 Caracas, Santiago, La Paz, Manaus, Halifax, Santo Domingo',
            '-3.5'   => '-3:30 St. John\'s',
            '-3'     => '-3:00 Buenos Aires, Montevideo, São Paulo',
            '-2'     => '-2:00',
            '-1'     => '-1:00 Praia',
            '0'      => '±0:00 Accra, Casablanca, Dakar, Dublin, Lisbon, London',
            '+1'     => '+1:00 Berlin, Lagos, Madrid, Paris, Rome, Tunis, Vienna, Warsaw',
            '+2'     => '+2:00 Athens, Bucharest, Cairo, Helsinki, Jerusalem, Johannesburg, Kiev',
            '+3'     => '+3:00 Istanbul, Moscow, Nairobi, Baghdad, Doha, Minsk, Riyadh',
            '+3.5'   => '+3:30 Tehran',
            '+4'     => '+4:00 Baku, Dubai, Samara, Muscat',
            '+4.5'   => '+4:30 Kabul',
            '+5'     => '+5:00 Karachi, Tashkent, Yekaterinburg',
            '+5.5'   => '+5:30 Delhi, Colombo',
            '+5.75'  => '+5:45 Kathmandu',
            '+6'     => '+6:00 Almaty, Dhaka, Omsk',
            '+6.5'   => '+6:30 Yangon',
            '+7'     => '+7:00 Jakarta, Bangkok, Krasnoyarsk, Ho Chi Minh City',
            '+8'     => '+8:00 Beijing, Hong Kong, Taipei, Singapore, Kuala Lumpur, Perth, Manila, Denpasar, Irkutsk',
            '+8.5'   => '+8:30 Pyongyang',
            '+8.75'  => '+8:45',
            '+9'     => '+9:00 Seoul, Tokyo, Ambon, Yakutsk',
            '+9.5'   => '+9:30 Adelaide',
            '+10'    => '+10:00 Port Moresby, Brisbane, Vladivostok, Sydney',
            '+10.5'  => '+10:30',
            '+11'    => '+11:00 Nouméa',
            '+12'    => '+12:00 Auckland, Suva',
            '+12.75' => '+12:45',
            '+13'    => '+13:00 Apia, Nukuʻalofa',
            '+14'    => '+14:00',
        ];
    }
}

/**
 * Custom meta fields | Fields
 */

/*
 * Fields
 *
 * Get Fields for Sections and Items
 */

if (!function_exists('mfn_get_fields_section')) {
    /**
     * GET Fields | Section
     *
     * @return array
     */
    function mfn_get_fields_section()
    {
        $fields = [

            [
                'id'    => 'title',
                'type'  => 'text',
                'title' => 'Title',
                'desc'  => 'This field is used as an Section Label in admin panel only',
            ],

            // background
            [
                'id'    => 'info_background',
                'type'  => 'info',
                'title' => '',
                'desc'  => 'Background',
                'class' => 'mfn-info',
            ],

            [
                'id'    => 'bg_color',
                'type'  => 'color',
                'title' => 'Background | Color',
                'alpha' => true,
            ],

            [
                'id'    => 'bg_image',
                'type'  => 'uploadframe',
                'title' => 'Background | Image',
                'desc'  => 'Recommended image size: <b>1920px x 1080px</b>',
            ],

            [
                'id'      => 'bg_position',
                'type'    => 'select',
                'title'   => 'Background | Position',
                'desc'    => 'iOS does <b>not</b> support background-position: fixed</br>For parallax required background image size is 1920px x 1080px',
                'options' => mfna_bg_position(),
                'std'     => 'center top no-repeat',
            ],

            [
                'id'      => 'bg_size',
                'type'    => 'select',
                'title'   => 'Background | Size',
                'desc'    => 'Does <b>not</b> work with fixed position & parallax. Works only in modern browsers',
                'options' => mfna_bg_size(),
            ],

            [
                'id'       => 'bg_video_mp4',
                'type'     => 'uploadframe',
                'title'    => 'Background | Video HTML5',
                'sub_desc' => 'm4v [.mp4]',
                'desc'     => 'Please add both mp4 and ogv for cross-browser compatibility. Background Image will be used as video placeholder before video loads and on mobile devices',
                'class'    => 'video',
            ],

            [
                'id'       => 'bg_video_ogv',
                'type'     => 'uploadframe',
                'title'    => 'Background | Video HTML5',
                'sub_desc' => 'ogg [.ogv]',
                'class'    => 'video',
            ],

            // layout
            [
                'id'    => 'info_layout',
                'type'  => 'info',
                'title' => '',
                'desc'  => 'Layout',
                'class' => 'mfn-info',
            ],

            [
                'id'    => 'padding_top',
                'type'  => 'text',
                'title' => 'Padding | Top',
                'desc'  => 'px',
                'class' => 'small-text',
                'std'   => '0',
            ],

            [
                'id'    => 'padding_bottom',
                'type'  => 'text',
                'title' => 'Padding | Bottom',
                'desc'  => 'px',
                'class' => 'small-text',
                'std'   => '0',
            ],

            // options
            [
                'id'    => 'info_options',
                'type'  => 'info',
                'title' => '',
                'desc'  => 'Options',
                'class' => 'mfn-info',
            ],

            [
                'id'      => 'divider',
                'type'    => 'select',
                'title'   => 'Decoration SVG',
                'desc'    => 'Works only with <b>background color</b> selected above. Does <b>not</b> work with parallax and some section\'s styles',
                'options' => [
                    ''                     => 'None',
                    'circle up'            => 'Circle Up',
                    'square up'            => 'Square Up',
                    'triangle up'          => 'Triangle Up',
                    'triple-triangle up'   => 'Triple Triangle Up',
                    'circle down'          => 'Circle Down',
                    'square down'          => 'Square Down',
                    'triangle down'        => 'Triangle Down',
                    'triple-triangle down' => 'Triple Triangle Down',
                ],
            ],

            [
                'id'    => 'decor_top',
                'type'  => 'uploadframe',
                'title' => 'Decoration Image | Top',
                'desc'  => 'Please use only images <b>from Media Library</b>. Recommended width: 1920px',
            ],

            [
                'id'    => 'decor_bottom',
                'type'  => 'uploadframe',
                'title' => 'Decoration Image | Bottom',
                'desc'  => 'Please use only images <b>from Media Library</b>. Recommended width: 1920px',
            ],

            [
                'id'      => 'navigation',
                'type'    => 'select',
                'title'   => 'Navigation',
                'options' => [
                    ''       => 'None',
                    'arrows' => 'Arrows',
                ],
            ],

            // advanced
            [
                'id'    => 'info_advanced',
                'type'  => 'info',
                'title' => '',
                'desc'  => 'Advanced',
                'class' => 'mfn-info',
            ],

            [
                'id'       => 'style',
                'type'     => 'checkbox_pseudo',
                'title'    => 'Style',
                'sub_desc' => 'Predefined styles for section',
                'options'  => [
                    'no-margin-h'          => 'Columns | remove horizontal margin',
                    'no-margin-v'          => 'Columns | remove vertical margin',
                    'dark'                 => 'Dark',
                    'equal-height'         => 'Equal Height | items in wrap',
                    'equal-height-wrap'    => 'Equal Height | wraps',
                    'full-screen'          => 'Full Screen',
                    'full-width'           => 'Full Width',
                    'full-width-ex-mobile' => 'Full Width | except mobile',
                    'highlight-left'       => 'Highlight | left',
                    'highlight-right'      => 'Highlight | right<span>in highlight section please use two 1/2 wraps</span>',
                ],
            ],

            [
                'id'    => 'class',
                'type'  => 'text',
                'title' => 'Custom | Classes',
                'desc'  => 'Multiple classes should be separated with SPACE. For sections with centered text you can use class: <strong>center</strong>',
            ],

            [
                'id'    => 'section_id',
                'type'  => 'text',
                'title' => 'Custom | ID',
                'desc'  => 'Use this option to create One Page sites.<br />Example: Your <b>Custom ID</b> is <strong>offer</strong> and you want to open this section, please use link: <strong>your-url/#offer</strong>',
                'class' => 'small-text',
            ],

            [
                'id'      => 'visibility',
                'type'    => 'select',
                'title'   => 'Responsive Visibility',
                'options' => [
                    ''                         => '-- Default --',
                    'hide-desktop'             => 'Hide on Desktop | 960px +',            // 960 +
                    'hide-tablet'              => 'Hide on Tablet | 768px - 959px',        // 768 - 959
                    'hide-mobile'              => 'Hide on Mobile | - 768px',            // - 768
                    'hide-desktop hide-tablet' => 'Hide on Desktop & Tablet',
                    'hide-desktop hide-mobile' => 'Hide on Desktop & Mobile',
                    'hide-tablet hide-mobile'  => 'Hide on Tablet & Mobile',
                ],
            ],

            [
                'id'    => 'hide',
                'type'  => 'text',
                'title' => 'Hide',
                'class' => 'hidden',
            ],

        ];

        return $fields;
    }
}

if (!function_exists('mfn_get_fields_wrap')) {
    /**
     * GET Fields | Wrap
     *
     * @return array
     */
    function mfn_get_fields_wrap()
    {
        $fields = [

            [
                'id'    => 'bg_color',
                'type'  => 'color',
                'title' => 'Background | Color',
                'alpha' => true,
            ],

            [
                'id'    => 'bg_image',
                'type'  => 'uploadframe',
                'title' => 'Background | Image',
                'desc'  => 'Recommended image width: <b>320px - 1920px</b>, depending on size of the wrap',
            ],

            [
                'id'      => 'bg_position',
                'type'    => 'select',
                'title'   => 'Background | Position',
                'desc'    => 'iOS does <b>not</b> support background-position: fixed</br>For parallax required background image size is 1920px x 1080px',
                'options' => mfna_bg_position(),
                'std'     => 'center top no-repeat',
            ],

            [
                'id'      => 'bg_size',
                'type'    => 'select',
                'title'   => 'Background | Size',
                'desc'    => 'Does <b>not</b> work with fixed position & parallax. Works only in modern browsers',
                'options' => mfna_bg_size(),
            ],

            // options
            [
                'id'    => 'info_options',
                'type'  => 'info',
                'title' => '',
                'desc'  => 'Options',
                'class' => 'mfn-info',
            ],

            [
                'id'    => 'move_up',
                'type'  => 'text',
                'title' => 'Move Up',
                'desc'  => 'px<br />Move this wrap to overflow on previous section. Does <b>not</b> work with <b>parallax</b>',
                'class' => 'small-text',
            ],

            [
                'id'    => 'padding',
                'type'  => 'text',
                'title' => 'Padding',
                'desc'  => 'Use value with <b>px</b> or <b>%</b>. Example: <b>20px</b> or <b>20px 10px 20px 10px</b> or <b>20px 1%</b>',
                'class' => 'small-text',
            ],

            // items
            [
                'id'    => 'info_items',
                'type'  => 'info',
                'title' => '',
                'desc'  => 'Items <span>Options for inner items</span>',
                'class' => 'mfn-info',
            ],

            [
                'id'      => 'column_margin',
                'type'    => 'select',
                'title'   => 'Margin Bottom',
                'options' => [
                    ''     => '-- Default --',
                    '0px'  => '0px',
                    '10px' => '10px',
                    '20px' => '20px',
                    '30px' => '30px',
                    '40px' => '40px',
                    '50px' => '50px',
                ],
            ],

            [
                'id'      => 'vertical_align',
                'type'    => 'select',
                'title'   => 'Vertical Align',
                'desc'    => 'Use with Section Style: <b>Equal Height of Wraps</b>',
                'options' => [
                    'top'    => 'Top',
                    'middle' => 'Middle',
                    'bottom' => 'Bottom',
                ],
            ],

            // advanced
            [
                'id'    => 'info_advanced',
                'type'  => 'info',
                'title' => '',
                'desc'  => 'Advanced',
                'class' => 'mfn-info',
            ],

            [
                'id'    => 'class',
                'type'  => 'text',
                'title' => 'Custom | Classes',
                'desc'  => 'Multiple classes should be separated with SPACE',
            ],

        ];

        return $fields;
    }
}

if (!function_exists('mfn_get_fields_item')) {
    /**
     * GET Fields | Item
     *
     * If param $item is empty return items list
     *
     * @param string $item Item name
     * @return array
     */
    function mfn_get_fields_item($item = false)
    {
        $items = [

            // Placeholder ----------------------------------------------------

            'placeholder' => [
                'type'   => 'placeholder',
                'title'  => '- Placeholder',
                'size'   => '1/4',
                'cat'    => 'other',
                'fields' => [

                    [
                        'id'    => 'info',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'This is Builder Placeholder.',
                        'class' => 'mfn-info info',
                    ],

                ],
            ],

            // Accordion  -----------------------------------------------------

            'accordion' => [
                'type'   => 'accordion',
                'title'  => 'Accordion',
                'size'   => '1/4',
                'cat'    => 'blocks',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'       => 'tabs',
                        'type'     => 'tabs',
                        'title'    => 'Accordion',
                        'sub_desc' => 'You can use Drag & Drop to set the order',
                        'desc'     => '<b>JavaScript</b> content like Google Maps and some plugins shortcodes do <b>not work</b> in tabs',
                    ],

                    [
                        'id'      => 'open1st',
                        'type'    => 'select',
                        'title'   => 'Open First',
                        'desc'    => 'Open first tab at start.',
                        'options' => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    [
                        'id'      => 'openAll',
                        'type'    => 'select',
                        'options' => [0 => 'No', 1 => 'Yes'],
                        'title'   => 'Open All',
                        'desc'    => 'Open all tabs at start',
                    ],

                    [
                        'id'      => 'style',
                        'type'    => 'select',
                        'title'   => 'Style',
                        'options' => [
                            'accordion' => 'Accordion',
                            'toggle'    => 'Toggle',
                        ],
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Article box  ---------------------------------------------------

            'article_box' => [
                'type'   => 'article_box',
                'title'  => 'Article box',
                'size'   => '1/3',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'       => 'image',
                        'type'     => 'uploadframe',
                        'title'    => 'Image',
                        'sub_desc' => 'Featured Image',
                        'desc'     => 'Recommended image width: <b>384px - 960px</b>, depending on size of the item',
                    ],

                    [
                        'id'    => 'slogan',
                        'type'  => 'text',
                        'title' => 'Slogan',
                    ],

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    // link
                    [
                        'id'    => 'info_link',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Link',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Link | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Before After  ---------------------------------------------------

            'before_after' => [
                'type'   => 'before_after',
                'title'  => 'Before After',
                'size'   => '1/3',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'    => 'image_before',
                        'type'  => 'uploadframe',
                        'title' => 'Image | Before',
                        'desc'  => 'Recommended image width: <b>768px - 1920px</b>, depending on size of the item',
                    ],

                    [
                        'id'    => 'image_after',
                        'type'  => 'uploadframe',
                        'title' => 'Image | After',
                        'desc'  => 'Both images <b>must have the same size</b>',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Blockquote -----------------------------------------------------

            'blockquote' => [
                'type'   => 'blockquote',
                'title'  => 'Blockquote',
                'size'   => '1/4',
                'cat'    => 'typography',
                'fields' => [

                    [
                        'id'       => 'content',
                        'type'     => 'textarea',
                        'title'    => 'Content',
                        'sub_desc' => 'Blockquote content.',
                        'desc'     => 'Some HTML tags allowed.',
                    ],

                    [
                        'id'    => 'author',
                        'type'  => 'text',
                        'title' => 'Author',
                    ],

                    [
                        'id'       => 'link',
                        'type'     => 'text',
                        'title'    => 'Link',
                        'sub_desc' => 'Link to company page.',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Link | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Button ----------------------------------------------------

            'button' => [
                'type'   => 'button',
                'title'  => 'Button',
                'size'   => '1/4',
                'cat'    => 'typography',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Link | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    [
                        'id'      => 'align',
                        'type'    => 'select',
                        'title'   => 'Align',
                        'options' => [
                            ''       => 'Left',
                            'center' => 'Center',
                            'right'  => 'Right',
                        ],
                    ],

                    // icon
                    [
                        'id'    => 'info_icon',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Icon',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => 'Icon',
                        'class' => 'small-text',
                    ],

                    [
                        'id'      => 'icon_position',
                        'type'    => 'select',
                        'title'   => 'Position',
                        'options' => [
                            'left'  => 'Left',
                            'right' => 'Right',
                        ],
                    ],

                    // color
                    [
                        'id'    => 'info_color',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Color',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'color',
                        'type'  => 'color',
                        'title' => 'Background',
                    ],

                    [
                        'id'    => 'font_color',
                        'type'  => 'color',
                        'title' => 'Font',
                    ],

                    // style
                    [
                        'id'    => 'info_style',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Style',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'      => 'size',
                        'type'    => 'select',
                        'title'   => 'Size',
                        'options' => [
                            1 => 'Small',
                            2 => 'Default',
                            3 => 'Large',
                            4 => 'Very Large',
                        ],
                        'std'     => 2,
                    ],

                    [
                        'id'      => 'full_width',
                        'type'    => 'select',
                        'title'   => 'Full Width',
                        'options' => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'class',
                        'type'  => 'text',
                        'title' => 'Class',
                        'desc'  => 'This option is useful when you want to use <b>scroll</b>',
                    ],

                    [
                        'id'    => 'rel',
                        'type'  => 'text',
                        'title' => 'Rel',
                        'desc'  => 'Adds an rel="..." attribute to the link',
                    ],

                    [
                        'id'       => 'download',
                        'type'     => 'text',
                        'title'    => 'Download',
                        'sub_desc' => 'Download file when clicking on the link',
                        'desc'     => 'Enter the new filename for the downloaded file',
                    ],

                    [
                        'id'    => 'onclick',
                        'type'  => 'text',
                        'title' => 'OnClick',
                        'desc'  => 'Adds an onclick="..." attribute to the link',
                    ],

                ],
            ],

            // Call to Action -------------------------------------------------

            'call_to_action' => [
                'type'   => 'call_to_action',
                'title'  => 'Call to Action',
                'size'   => '1/1',
                'cat'    => 'elements',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => 'Icon',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => 'Content',
                        'desc'  => 'HTML tags allowed.',
                    ],

                    [
                        'id'    => 'button_title',
                        'type'  => 'text',
                        'title' => 'Button Title',
                        'desc'  => 'Leave this field blank if you want Call to Action with Big Icon',
                        'class' => 'small-text',
                    ],

                    // link
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Link',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Link | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'class',
                        'type'  => 'text',
                        'title' => 'Class',
                        'desc'  => 'This option is useful when you want to use <b>scroll</b>',
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Chart  ---------------------------------------------------------

            'chart' => [
                'type'   => 'chart',
                'title'  => 'Chart',
                'size'   => '1/4',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    // chart
                    [
                        'id'    => 'info_chart',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Chart',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'percent',
                        'type'  => 'text',
                        'title' => 'Percent',
                        'desc'  => 'Number between 0-100',
                    ],

                    [
                        'id'    => 'label',
                        'type'  => 'text',
                        'title' => 'Label',
                    ],

                    [
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => 'Icon',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Image',
                        'desc'  => 'Recommended image size: <b>70px x 70px</b>',
                    ],

                    // options
                    [
                        'id'    => 'info_options',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Options',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'line_width',
                        'type'     => 'text',
                        'title'    => 'Line Width',
                        'sub_desc' => 'optional',
                        'desc'     => 'px',
                        'class'    => 'small-text',
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Code  ----------------------------------------------------------

            'code' => [
                'type'   => 'code',
                'title'  => 'Code',
                'size'   => '1/4',
                'cat'    => 'other',
                'fields' => [

                    [
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => 'Content',
                        'class' => 'full-width',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Column  --------------------------------------------------------

            'column' => [
                'type'   => 'column',
                'title'  => 'Column',
                'size'   => '1/4',
                'cat'    => 'typography',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                        'desc'  => 'This field is used as an Item Label in admin panel only',
                    ],

                    [
                        'id'       => 'content',
                        'type'     => 'textarea',
                        'title'    => 'Content',
                        'desc'     => 'Shortcodes and HTML tags allowed. Some plugin\'s shortcodes work only in WordPress editor',
                        'class'    => 'full-width sc',
                        'validate' => 'html',
                    ],

                    [
                        'id'      => 'align',
                        'type'    => 'select',
                        'title'   => 'Text Align',
                        'options' => [
                            ''        => '-- Default --',
                            'left'    => 'Left',
                            'right'   => 'Right',
                            'center'  => 'Center',
                            'justify' => 'Justify',
                        ],
                    ],

                    [
                        'id'       => 'align-mobile',
                        'type'     => 'select',
                        'title'    => 'Text Align | Mobile',
                        'sub_desc' => '< 768px',
                        'options'  => [
                            ''        => '-- The same as selected above --',
                            'left'    => 'Left',
                            'right'   => 'Right',
                            'center'  => 'Center',
                            'justify' => 'Justify',
                        ],
                    ],

                    // background
                    [
                        'id'    => 'info_background',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Background',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'column_bg',
                        'type'  => 'color',
                        'title' => 'Color',
                        'alpha' => true,
                    ],

                    [
                        'id'    => 'bg_image',
                        'type'  => 'uploadframe',
                        'title' => 'Image',
                    ],

                    [
                        'id'      => 'bg_position',
                        'type'    => 'select',
                        'title'   => 'Position',
                        'desc'    => 'This option can be used only with your custom image selected above',
                        'options' => mfna_bg_position('column'),
                        'std'     => 'center top no-repeat',
                    ],

                    [
                        'id'      => 'bg_size',
                        'type'    => 'select',
                        'title'   => 'Size',
                        'desc'    => 'Works only in modern browsers',
                        'options' => mfna_bg_size(),
                    ],

                    // layout
                    [
                        'id'    => 'info_layout',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Layout',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'      => 'margin_bottom',
                        'type'    => 'select',
                        'title'   => 'Margin | Bottom',
                        'desc'    => '<b>Overrides</b> section settings',
                        'options' => [
                            ''     => '-- Default --',
                            '0px'  => '0px',
                            '10px' => '10px',
                            '20px' => '20px',
                            '30px' => '30px',
                            '40px' => '40px',
                            '50px' => '50px',
                        ],
                    ],

                    [
                        'id'    => 'padding',
                        'type'  => 'text',
                        'title' => 'Padding',
                        'desc'  => 'Use value with <b>px</b> or <b>%</b>. Example: <b>20px</b> or <b>20px 10px 20px 10px</b> or <b>20px 1%</b>',
                        'class' => 'small-text',
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                    [
                        'id'       => 'style',
                        'type'     => 'text',
                        'title'    => 'Custom | Styles',
                        'sub_desc' => 'Custom inline CSS Styles',
                        'desc'     => 'Example: <b>border: 1px solid #999;</b>',
                    ],

                ],
            ],

            // Contact box ----------------------------------------------------

            'contact_box' => [
                'type'   => 'contact_box',
                'title'  => 'Contact Box',
                'size'   => '1/4',
                'cat'    => 'elements',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'    => 'address',
                        'type'  => 'textarea',
                        'title' => 'Address',
                        'desc'  => 'HTML tags allowed.',
                    ],

                    [
                        'id'    => 'telephone',
                        'type'  => 'text',
                        'title' => 'Phone',
                        'desc'  => 'Phone number',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'telephone_2',
                        'type'  => 'text',
                        'title' => 'Phone 2nd',
                        'desc'  => 'Additional Phone number',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'fax',
                        'type'  => 'text',
                        'title' => 'Fax',
                        'desc'  => 'Fax number',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'email',
                        'type'  => 'text',
                        'title' => 'Email',
                    ],

                    [
                        'id'    => 'www',
                        'type'  => 'text',
                        'title' => 'WWW',
                    ],

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Background Image',
                        'desc'  => 'Recommended image width: <b>768px - 1920px</b>, depending on size of the item',
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Countdown  -----------------------------------------------------

            'countdown' => [
                'type'   => 'countdown',
                'title'  => 'Countdown',
                'size'   => '1/1',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'    => 'date',
                        'type'  => 'text',
                        'title' => 'Lunch Date',
                        'desc'  => 'Format: 12/30/2018 12:00:00 month/day/year hour:minute:second',
                        'std'   => '12/30/2018 12:00:00',
                        'class' => 'small-text',
                    ],

                    [
                        'id'      => 'timezone',
                        'type'    => 'select',
                        'title'   => 'UTC Timezone',
                        'options' => mfna_utc(),
                        'std'     => '0',
                    ],

                    // options
                    [
                        'id'    => 'info_options',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Options',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'      => 'show',
                        'type'    => 'select',
                        'title'   => 'Show',
                        'options' => [
                            ''    => 'days hours minutes seconds',
                            'dhm' => 'days hours minutes',
                            'dh'  => 'days hours',
                            'd'   => 'days',
                        ],
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Counter  -------------------------------------------------------

            'counter' => [
                'type'   => 'counter',
                'title'  => 'Counter',
                'size'   => '1/4',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    // counter
                    [
                        'id'    => 'info_counter',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Counter',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => 'Icon',
                        'std'   => 'icon-lamp',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'color',
                        'type'  => 'color',
                        'title' => 'Icon Color',
                    ],

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Image',
                        'desc'  => 'If you uploadframe an image, icon will not show',
                    ],

                    [
                        'id'    => 'prefix',
                        'type'  => 'text',
                        'title' => 'Prefix',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'number',
                        'type'  => 'text',
                        'title' => 'Number',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'label',
                        'type'  => 'text',
                        'title' => 'Postfix',
                        'class' => 'small-text',
                    ],

                    // options
                    [
                        'id'    => 'info_options',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Options',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'      => 'type',
                        'type'    => 'select',
                        'title'   => 'Style',
                        'desc'    => 'Vertical style works only for column widths: 1/4, 1/3 & 1/2',
                        'options' => [
                            'horizontal' => 'Horizontal',
                            'vertical'   => 'Vertical',
                        ],
                        'std'     => 'vertical',
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Divider  -------------------------------------------------------

            'divider' => [
                'type'   => 'divider',
                'title'  => 'Divider',
                'size'   => '1/1',
                'cat'    => 'other',
                'fields' => [

                    [
                        'id'    => 'height',
                        'type'  => 'text',
                        'title' => 'Divider height',
                        'desc'  => 'px',
                        'class' => 'small-text',
                    ],

                    [
                        'id'      => 'style',
                        'type'    => 'select',
                        'title'   => 'Style',
                        'options' => [
                            'default' => 'Default',
                            'dots'    => 'Dots',
                            'zigzag'  => 'ZigZag',
                        ],
                    ],

                    [
                        'id'      => 'line',
                        'type'    => 'select',
                        'title'   => 'Line',
                        'desc'    => 'This option can be used <strong>only</strong> with Style: Default.',
                        'options' => [
                            'default' => 'Default',
                            'narrow'  => 'Narrow',
                            'wide'    => 'Wide',
                            ''        => 'No Line',
                        ],
                    ],

                    [
                        'id'      => 'themecolor',
                        'type'    => 'select',
                        'title'   => 'Theme Color',
                        'desc'    => 'This option can be used <strong>only</strong> with Style: Default.',
                        'options' => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Fancy Divider  -------------------------------------------------

            'fancy_divider' => [
                'type'   => 'fancy_divider',
                'title'  => 'Fancy Divider',
                'size'   => '1/1',
                'cat'    => 'elements',
                'fields' => [

                    [
                        'id'    => 'info',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'This item can only be used on pages <strong>Without Sidebar</strong>',
                        'class' => 'mfn-info info',
                    ],

                    [
                        'id'      => 'style',
                        'type'    => 'select',
                        'title'   => 'Style',
                        'options' => [
                            'circle up'     => 'Circle Up',
                            'circle down'   => 'Circle Down',
                            'curve up'      => 'Curve Up',
                            'curve down'    => 'Curve Down',
                            'stamp'         => 'Stamp',
                            'triangle up'   => 'Triangle Up',
                            'triangle down' => 'Triangle Down',
                        ],
                    ],

                    [
                        'id'    => 'color_top',
                        'type'  => 'color',
                        'title' => 'Color Top',
                    ],

                    [
                        'id'    => 'color_bottom',
                        'type'  => 'color',
                        'title' => 'Color Bottom',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Fancy Heading --------------------------------------------------

            'fancy_heading' => [
                'type'   => 'fancy_heading',
                'title'  => 'Fancy Heading',
                'size'   => '1/1',
                'cat'    => 'elements',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'      => 'h1',
                        'type'    => 'select',
                        'title'   => 'Use H1 tag',
                        'desc'    => 'Wrap title into H1 instead of H2',
                        'options' => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    [
                        'id'       => 'content',
                        'type'     => 'textarea',
                        'title'    => 'Content',
                        'desc'     => 'Some Shortcodes and HTML tags allowed',
                        'class'    => 'full-width sc',
                        'validate' => 'html',
                    ],

                    // style
                    [
                        'id'    => 'info_style',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Style',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'      => 'style',
                        'type'    => 'select',
                        'title'   => 'Style',
                        'options' => [
                            'icon'   => 'Icon',
                            'line'   => 'Line',
                            'arrows' => 'Arrows',
                        ],
                    ],

                    [
                        'id'       => 'icon',
                        'type'     => 'icon',
                        'title'    => 'Icon',
                        'sub_desc' => 'for <b>Style: Icon</b>',
                        'class'    => 'small-text',
                    ],

                    [
                        'id'       => 'slogan',
                        'type'     => 'text',
                        'title'    => 'Slogan',
                        'sub_desc' => 'for <b>Style: Line</b>',
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // FAQ  -----------------------------------------------------------

            'faq' => [
                'type'   => 'faq',
                'title'  => 'FAQ',
                'size'   => '1/4',
                'cat'    => 'blocks',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'       => 'tabs',
                        'type'     => 'tabs',
                        'title'    => 'FAQ',
                        'sub_desc' => 'You can use Drag & Drop to set the order',
                        'desc'     => '<b>JavaScript</b> content like Google Maps and some plugins shortcodes do <b>not work</b> in tabs',
                    ],

                    [
                        'id'      => 'open1st',
                        'type'    => 'select',
                        'title'   => 'Open First',
                        'desc'    => 'Open first tab at start',
                        'options' => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    [
                        'id'      => 'openAll',
                        'type'    => 'select',
                        'title'   => 'Open All',
                        'desc'    => 'Open all tabs at start',
                        'options' => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Feature Box -------------------------------------------------------

            'feature_box' => [
                'type'   => 'feature_box',
                'title'  => 'Feature Box',
                'size'   => '1/4',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Image',
                        'desc'  => 'Recommended image width: <b>384px - 960px</b>, depending on size of the item',
                    ],

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'       => 'content',
                        'type'     => 'textarea',
                        'title'    => 'Content',
                        'validate' => 'html',
                    ],

                    [
                        'id'    => 'background',
                        'type'  => 'color',
                        'title' => 'Background color',
                    ],

                    // link
                    [
                        'id'    => 'info_link',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Link',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'link',
                        'type'     => 'text',
                        'title'    => 'Link',
                        'sub_desc' => 'Image Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Link | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Feature List ---------------------------------------------------

            'feature_list' => [
                'type'   => 'feature_list',
                'title'  => 'Feature List',
                'size'   => '1/1',
                'cat'    => 'elements',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                        'desc'  => 'This field is used as an Item Label in admin panel only',
                    ],

                    [
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => 'Content',
                        'desc'  => 'Please use <strong>[item icon="" title="" link="" target=""]</strong> shortcodes.',
                        'std'   => '[item icon="icon-lamp" title="" link="" target="" animate=""]',
                    ],

                    [
                        'id'      => 'columns',
                        'type'    => 'select',
                        'title'   => 'Columns',
                        'desc'    => 'Default: 4. Recommended: 2-4. Too large value may crash the layout.',
                        'options' => [
                            2 => 2,
                            3 => 3,
                            4 => 4,
                            5 => 5,
                            6 => 6,
                        ],
                        'std'     => 4,
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Flat Box -------------------------------------------------------

            'flat_box' => [
                'type'   => 'flat_box',
                'title'  => 'Flat Box',
                'size'   => '1/4',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Image',
                        'desc'  => 'Recommended image width: <b>768px - 1920px</b>, depending on size of the item',
                    ],

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'       => 'content',
                        'type'     => 'textarea',
                        'title'    => 'Content',
                        'desc'     => 'Some Shortcodes and HTML tags allowed',
                        'class'    => 'full-width sc',
                        'validate' => 'html',
                    ],

                    // icon
                    [
                        'id'    => 'info_icon',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Icon',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => 'Icon',
                        'std'   => 'icon-lamp',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'icon_image',
                        'type'  => 'uploadframe',
                        'title' => 'Icon | Image',
                        'desc'  => 'You can use image icon instead of font icon',
                    ],

                    [
                        'id'    => 'background',
                        'type'  => 'color',
                        'title' => 'Background',
                    ],

                    // link
                    [
                        'id'    => 'info_link',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Link',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Link | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Helper -------------------------------------------------------

            'helper' => [
                'type'   => 'helper',
                'title'  => 'Helper',
                'size'   => '1/4',
                'cat'    => 'blocks',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'      => 'title_tag',
                        'type'    => 'select',
                        'title'   => 'Title | Tag',
                        'options' => [
                            'h1' => 'H1',
                            'h2' => 'H2',
                            'h3' => 'H3',
                            'h4' => 'H4',
                            'h5' => 'H5',
                            'h6' => 'H6',
                        ],
                        'std'     => 'h4',
                    ],

                    [
                        'id'    => 'info_item1',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Item 1',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'title1',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'       => 'content1',
                        'type'     => 'textarea',
                        'title'    => 'Content',
                        'desc'     => 'Some Shortcodes and HTML tags allowed',
                        'class'    => 'full-width sc',
                        'validate' => 'html',
                    ],

                    [
                        'id'    => 'link1',
                        'type'  => 'text',
                        'title' => 'Link',
                        'desc'  => 'Use this field if you want to link to another page instead of showing the content',
                    ],

                    [
                        'id'      => 'target1',
                        'type'    => 'select',
                        'options' => [0 => 'No', 1 => 'Yes'],
                        'title'   => 'Link | Open in new window',
                        'desc'    => 'Adds a target="_blank" attribute to the link',
                    ],

                    [
                        'id'    => 'class1',
                        'type'  => 'text',
                        'title' => 'Link | Class',
                        'desc'  => 'This option is useful when you want to use <b>prettyphoto</b> or <b>scroll</b>',
                    ],

                    [
                        'id'    => 'info_item2',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Item 2',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'title2',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'       => 'content2',
                        'type'     => 'textarea',
                        'title'    => 'Content',
                        'desc'     => 'Some Shortcodes and HTML tags allowed',
                        'class'    => 'full-width sc',
                        'validate' => 'html',
                    ],

                    [
                        'id'    => 'link2',
                        'type'  => 'text',
                        'title' => 'Link',
                        'desc'  => 'Use this field if you want to link to another page instead of showing the content',
                    ],

                    [
                        'id'      => 'target2',
                        'type'    => 'select',
                        'title'   => 'Link | Open in new window',
                        'desc'    => 'Adds a target="_blank" attribute to the link',
                        'options' => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    [
                        'id'    => 'class2',
                        'type'  => 'text',
                        'title' => 'Link | Class',
                        'desc'  => 'This option is useful when you want to use <b>prettyphoto</b> or <b>scroll</b>',
                    ],

                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Hover Box ------------------------------------------------------

            'hover_box' => [
                'type'   => 'hover_box',
                'title'  => 'Hover Box',
                'size'   => '1/4',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Image',
                        'desc'  => 'Recommended image width: <b>768px - 1920px</b>, depending on size of the item',
                    ],

                    [
                        'id'    => 'image_hover',
                        'type'  => 'uploadframe',
                        'title' => 'Image | Hover',
                        'desc'  => 'Both images <b>must have the same size</b>',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Link | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Hover Color ----------------------------------------------------

            'hover_color' => [
                'type'   => 'hover_color',
                'title'  => 'Hover Color',
                'size'   => '1/4',
                'cat'    => 'elements',
                'fields' => [

                    [
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => 'Content',
                        'desc'  => 'Some Shortcodes and HTML tags allowed',
                        'class' => 'full-width sc',
                    ],

                    [
                        'id'      => 'align',
                        'type'    => 'select',
                        'title'   => 'Text Align',
                        'options' => [
                            'left'    => 'Left',
                            'right'   => 'Right',
                            ''        => 'Center',
                            'justify' => 'Justify',
                        ],
                    ],

                    [
                        'id'       => 'padding',
                        'type'     => 'text',
                        'title'    => 'Padding',
                        'sub_desc' => 'default: 40px 30px',
                        'desc'     => 'Use value with <b>px</b> or <b>%</b>. Example: <b>20px</b> or <b>20px 10px 20px 10px</b> or <b>20px 1%</b>',
                        'class'    => 'small-text',
                        'std'      => '40px 30px',
                    ],

                    // background
                    [
                        'id'    => 'info_background',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Background',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'background',
                        'type'  => 'color',
                        'title' => 'Color',
                        // 'alpha'		=> true, // requires change to jquery because of background div
                    ],

                    [
                        'id'    => 'background_hover',
                        'type'  => 'color',
                        'title' => 'Hover color',
                        // 'alpha'		=> true,
                    ],

                    // border
                    [
                        'id'    => 'info_border',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Border',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'border',
                        'type'     => 'color',
                        'title'    => 'Color',
                        'sub_desc' => 'optional',
                        // 'alpha'		=> true,
                    ],

                    [
                        'id'       => 'border_hover',
                        'type'     => 'color',
                        'title'    => 'Hover color',
                        'sub_desc' => 'optional',
                        // 'alpha'		=> true,
                    ],

                    [
                        'id'       => 'border_width',
                        'type'     => 'text',
                        'title'    => 'Width',
                        'sub_desc' => 'default: 2px',
                        'desc'     => 'Use value with <b>px</b>. Example: <b>1px</b> or <b>2px 5px 2px 5px</b>',
                        'class'    => 'small-text',
                        'std'      => '2px',
                    ],

                    // link
                    [
                        'id'    => 'info_link',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Link',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    [
                        'id'    => 'class',
                        'type'  => 'text',
                        'title' => 'Class',
                        'desc'  => 'This option is useful when you want to use <b>scroll</b>',
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                    [
                        'id'       => 'style',
                        'type'     => 'text',
                        'title'    => 'Custom | Styles',
                        'sub_desc' => 'Custom inline CSS Styles',
                        'desc'     => 'Example: <b>opacity: 0.5;</b>',
                    ],

                ],
            ],

            // How It Works ---------------------------------------------------

            'how_it_works' => [
                'type'   => 'how_it_works',
                'title'  => 'How It Works',
                'size'   => '1/4',
                'cat'    => 'elements',
                'fields' => [

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Background Image',
                        'desc'  => 'Recommended: Square Image with transparent background.',
                    ],

                    [
                        'id'    => 'number',
                        'type'  => 'text',
                        'title' => 'Number',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'       => 'content',
                        'type'     => 'textarea',
                        'title'    => 'Content',
                        'desc'     => 'Some Shortcodes and HTML tags allowed',
                        'class'    => 'full-width sc',
                        'validate' => 'html',
                    ],

                    // style
                    [
                        'id'    => 'info_style',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Style',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'border',
                        'type'     => 'select',
                        'title'    => 'Line',
                        'sub_desc' => 'Show right connecting line',
                        'options'  => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    [
                        'id'       => 'style',
                        'type'     => 'select',
                        'title'    => 'Style',
                        'sub_desc' => 'Background Image style',
                        'options'  => [
                            ''     => 'Small centered image (image size: max 116px)',
                            'fill' => 'Fill the circle (image size: 200px x 200px)',
                        ],
                    ],

                    // link
                    [
                        'id'    => 'info_link',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Link',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Link | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Icon Box  ------------------------------------------------------

            'icon_box' => [
                'type'   => 'icon_box',
                'title'  => 'Icon Box',
                'size'   => '1/4',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'      => 'title_tag',
                        'type'    => 'select',
                        'title'   => 'Title | Tag',
                        'options' => [
                            'h1' => 'H1',
                            'h2' => 'H2',
                            'h3' => 'H3',
                            'h4' => 'H4',
                            'h5' => 'H5',
                            'h6' => 'H6',
                        ],
                        'std'     => 'h4',
                    ],

                    [
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => 'Content',
                        'desc'  => 'Some Shortcodes and HTML tags allowed',
                        'class' => 'full-width sc',
                    ],

                    // icon
                    [
                        'id'    => 'info_icon',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Icon',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => 'Icon',
                        'std'   => 'icon-lamp',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Image',
                    ],

                    [
                        'id'      => 'icon_position',
                        'type'    => 'select',
                        'title'   => 'Icon Position',
                        'desc'    => 'Left position works only for column widths: 1/4, 1/3 & 1/2',
                        'options' => [
                            'left' => 'Left',
                            'top'  => 'Top',
                        ],
                        'std'     => 'top',
                    ],

                    [
                        'id'       => 'border',
                        'type'     => 'select',
                        'title'    => 'Border',
                        'sub_desc' => 'Show right border',
                        'options'  => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    // link
                    [
                        'id'    => 'info_link',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Link',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Link | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    [
                        'id'    => 'class',
                        'type'  => 'text',
                        'title' => 'Link | Class',
                        'desc'  => 'This option is useful when you want to use <b>scroll</b>',
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Image  ---------------------------------------------------------

            'image' => [
                'type'   => 'image',
                'title'  => 'Image',
                'size'   => '1/4',
                'cat'    => 'typography',
                'fields' => [

                    [
                        'id'    => 'src',
                        'type'  => 'uploadframe',
                        'title' => 'Image',
                    ],

                    [
                        'id'      => 'size',
                        'type'    => 'select',
                        'title'   => 'Image | Size',
                        'desc'    => 'SELECT image size FROM <a target="_blank" href="options-media.php">Settings > Media > Image sizes</a> (Media Library images ONLY)<br />OR USE below FIELDS FOR HTML resize',
                        'options' => [
                            ''          => 'Full size',
                            'large'     => 'Large',
                            'medium'    => 'Medium',
                            'thumbnail' => 'Thumbnail',
                        ],
                    ],

                    [
                        'id'       => 'width',
                        'type'     => 'text',
                        'title'    => 'Image | Width',
                        'sub_desc' => 'HTML resize | optional',
                        'desc'     => 'px',
                        'class'    => 'small-text',
                    ],

                    [
                        'id'       => 'height',
                        'type'     => 'text',
                        'title'    => 'Image | Height',
                        'sub_desc' => 'HTML resize | optional',
                        'desc'     => 'px',
                        'class'    => 'small-text',
                    ],

                    // options
                    [
                        'id'    => 'info_options',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Options',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'      => 'align',
                        'type'    => 'select',
                        'title'   => 'Align',
                        'desc'    => 'If you want image to be <b>resized</b> to column width use <b>align none</b>',
                        'options' => [
                            ''       => 'None',
                            'left'   => 'Left',
                            'right'  => 'Right',
                            'center' => 'Center',
                        ],
                    ],

                    [
                        'id'       => 'stretch',
                        'type'     => 'select',
                        'title'    => 'Stretch',
                        'sub_desc' => 'Stretch image to column width',
                        'desc'     => 'The height of the image will be changed proportionally',
                        'options'  => [
                            '0'         => 'No',
                            '1'         => 'Yes',
                            'ultrawide' => 'Yes, on ultrawide screens only > 1920px',
                        ],
                    ],

                    [
                        'id'       => 'border',
                        'type'     => 'select',
                        'title'    => 'Border',
                        'sub_desc' => 'Show Image Border',
                        'options'  => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    [
                        'id'    => 'margin',
                        'type'  => 'text',
                        'title' => 'Margin | Top',
                        'desc'  => 'px',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'margin_bottom',
                        'type'  => 'text',
                        'title' => 'Margin | Bottom',
                        'desc'  => 'px',
                        'class' => 'small-text',
                    ],

                    // link
                    [
                        'id'    => 'info_link',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Link',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'link_image',
                        'type'  => 'uploadframe',
                        'title' => 'Zoomed image',
                        'desc'  => 'This <b>image or embed video</b> will be opened in lightbox.',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Open in new window',
                        'desc'    => 'Adds a target="_blank" attribute to the link.',
                        'options' => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    [
                        'id'      => 'hover',
                        'type'    => 'select',
                        'title'   => 'Hover Effect',
                        'options' => [
                            ''        => '- Default -',
                            'disable' => 'Disable',
                        ],
                    ],

                    // description
                    [
                        'id'    => 'info_description',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Description',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'alt',
                        'type'  => 'text',
                        'title' => 'Alternate Text',
                    ],

                    [
                        'id'    => 'caption',
                        'type'  => 'text',
                        'title' => 'Caption',
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'      => 'greyscale',
                        'type'    => 'select',
                        'title'   => 'Greyscale Images',
                        'desc'    => 'Works only for images with link',
                        'options' => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Info box -------------------------------------------------------

            'info_box' => [
                'type'   => 'info_box',
                'title'  => 'Info Box',
                'size'   => '1/4',
                'cat'    => 'elements',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => 'Content',
                        'desc'  => 'HTML tags allowed.',
                        'std'   => '<ul><li>list item 1</li><li>list item 2</li></ul>',
                    ],

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Background Image',
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // List -----------------------------------------------------------

            'list' => [
                'type'   => 'list',
                'title'  => 'List',
                'size'   => '1/4',
                'cat'    => 'blocks',
                'fields' => [

                    [
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => 'Icon',
                        'std'   => 'icon-lamp',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Image',
                    ],

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => 'Content',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Open in new window',
                        'desc'    => 'Adds a target="_blank" attribute to the link.',
                        'options' => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    [
                        'id'      => 'style',
                        'type'    => 'select',
                        'title'   => 'Style',
                        'desc'    => 'Only <strong>Vertical Style</strong> works for column widths 1/5 & 1/6',
                        'options' => [
                            1 => 'With background',
                            2 => 'Transparent',
                            3 => 'Vertical',
                            4 => 'Ordered list',
                        ],
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Map Basic ------------------------------------------------------------

            'map_basic' => [
                'type'   => 'map_basic',
                'title'  => 'Map Basic',
                'size'   => '1/4',
                'cat'    => 'elements',
                'fields' => [

                    // iframe
                    [
                        'id'    => 'info_iframe',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Iframe',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'info_iframe_info',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Number of iframe map loads is unlimited.',
                        'class' => 'mfn-info info',
                    ],

                    [
                        'id'       => 'iframe',
                        'type'     => 'textarea',
                        'title'    => 'Iframe',
                        'sub_desc' => 'Leave this filed blank if you use Embed Map',
                        'desc'     => 'Visit <a target="_blank" href="https://google.com/maps">Google Maps</a> and follow these instructions:<br />1. Find place. 2. Click the share button in the left panel. 3. Select "embed a map" 4. Choose size. 5. Click "copy HTML" and paste it above',
                        'class'    => 'small-text',
                    ],

                    // embed
                    [
                        'id'    => 'info_embed',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Embed',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'info_embed_info',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Number of embed map loads is unlimited. Google Maps API key is required.<span>Please go to <a target="_blank" href="admin.php?page=be-options">Theme Options</a><strong> > Global > Advanced</strong> and paste your API key in the <strong>Google Maps API Key</strong> field.</span>',
                        'class' => 'mfn-info info',
                    ],

                    [
                        'id'    => 'address',
                        'type'  => 'text',
                        'title' => 'Address or place name',
                    ],

                    [
                        'id'       => 'zoom',
                        'type'     => 'text',
                        'title'    => 'Zoom',
                        'sub_desc' => 'default: 13',
                        'class'    => 'small-text',
                        'std'      => 13,
                    ],

                    [
                        'id'       => 'height',
                        'type'     => 'text',
                        'title'    => 'Height',
                        'sub_desc' => 'default: 300',
                        'class'    => 'small-text',
                        'std'      => 300,
                    ],

                ],
            ],

            // Map Advanced ------------------------------------------------------------

            'map' => [
                'type'   => 'map',
                'title'  => 'Map Advanced',
                'size'   => '1/4',
                'cat'    => 'elements',
                'fields' => [

                    [
                        'id'    => 'info_advanced_info',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Number of free dynamic map loads is limited. Google Maps API key is required.<span>Please go to <a target="_blank" href="admin.php?page=be-options">Theme Options</a><strong> > Global > Advanced</strong> and paste your API key in the <strong>Google Maps API Key</strong> field.<br />If you need more than 28500 map loads per month please check current Google Maps <a target="_blank" href="https://cloud.google.com/maps-platform/pricing/">Pricing & Plans</a> or choose Map Basic instead.</span>',
                        'class' => 'mfn-info info',
                    ],

                    [
                        'id'    => 'lat',
                        'type'  => 'text',
                        'title' => 'Google Maps Lat',
                        'desc'  => 'The map will appear only if this field is filled correctly.<br />Example: <b>-33.87</b>',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'lng',
                        'type'  => 'text',
                        'title' => 'Google Maps Lng',
                        'desc'  => 'The map will appear only if this field is filled correctly.<br />Example: <b>151.21</b>',
                        'class' => 'small-text',
                    ],

                    [
                        'id'       => 'zoom',
                        'type'     => 'text',
                        'title'    => 'Zoom',
                        'sub_desc' => 'default: 13',
                        'class'    => 'small-text',
                        'std'      => 13,
                    ],

                    [
                        'id'       => 'height',
                        'type'     => 'text',
                        'title'    => 'Height',
                        'sub_desc' => 'default: 300',
                        'class'    => 'small-text',
                        'std'      => 300,
                    ],

                    // options
                    [
                        'id'    => 'info_options',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Options',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'      => 'type',
                        'type'    => 'select',
                        'title'   => 'Type',
                        'options' => [
                            'ROADMAP'   => 'Map',
                            'SATELLITE' => 'Satellite',
                            'HYBRID'    => 'Satellite + Map',
                            'TERRAIN'   => 'Terrain',
                        ],
                    ],

                    [
                        'id'      => 'controls',
                        'type'    => 'select',
                        'title'   => 'Controls',
                        'options' => [
                            ''                        => 'Zoom',
                            'mapType'                 => 'Map Type',
                            'streetView'              => 'Street View',
                            'zoom mapType'            => 'Zoom & Map Type',
                            'zoom streetView'         => 'Zoom & Street View',
                            'mapType streetView'      => 'Map Type & Street View',
                            'zoom mapType streetView' => 'Zoom, Map Type & Street View',
                            'hide'                    => 'Hide All',
                        ],
                    ],

                    [
                        'id'      => 'draggable',
                        'type'    => 'select',
                        'title'   => 'Draggable',
                        'options' => [
                            ''               => 'Enable',
                            'disable'        => 'Disable',
                            'disable-mobile' => 'Disable on Mobile',
                        ],
                    ],

                    [
                        'id'       => 'border',
                        'type'     => 'select',
                        'title'    => 'Border',
                        'sub_desc' => 'Show map border',
                        'options'  => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'icon',
                        'type'  => 'uploadframe',
                        'title' => 'Marker Icon',
                        'desc'  => '.png',
                    ],

                    [
                        'id'    => 'color',
                        'type'  => 'color',
                        'title' => 'Map color',
                    ],

                    [
                        'id'       => 'styles',
                        'type'     => 'textarea',
                        'title'    => 'Styles',
                        'sub_desc' => 'Google Maps API styles array',
                        'desc'     => 'You can get predefined styles from <a target="_blank" href="https://snazzymaps.com/explore">snazzymaps.com/explore</a> or generate your own <a target="_blank" href="https://snazzymaps.com/editor">snazzymaps.com/editor</a>',
                    ],

                    [
                        'id'    => 'latlng',
                        'type'  => 'textarea',
                        'title' => 'Additional Markers | Lat,Lng,IconURL',
                        'desc'  => 'Separate Lat,Lang,IconURL[optional] with <b>coma</b> [ , ]<br />Separate multiple Markers with <b>semicolon</b> [ ; ]<br />Example: <b>-33.88,151.21,ICON_URL;-33.89,151.22</b>',
                    ],

                    // contact
                    [
                        'id'    => 'info_contact',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Contact Box',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => 'Address',
                        'desc'  => 'HTML tags allowed.',
                    ],

                    [
                        'id'    => 'telephone',
                        'type'  => 'text',
                        'title' => 'Telephone',
                    ],

                    [
                        'id'    => 'email',
                        'type'  => 'text',
                        'title' => 'Email',
                    ],

                    [
                        'id'    => 'www',
                        'type'  => 'text',
                        'title' => 'WWW',
                    ],

                    [
                        'id'      => 'style',
                        'type'    => 'select',
                        'title'   => 'Style',
                        'options' => [
                            'box' => 'Contact Box on the map (for full width column/wrap)',
                            'bar' => 'Bar at the top',
                        ],
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Opening Hours --------------------------------------------------

            'opening_hours' => [
                'type'   => 'opening_hours',
                'title'  => 'Opening Hours',
                'size'   => '1/4',
                'cat'    => 'elements',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => 'Content',
                        'desc'  => 'HTML tags allowed.',
                        'std'   => '<ul><li><label>Monday - Saturday</label><span>8am - 4pm</span></li></ul>',
                    ],

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Background Image',
                        'desc'  => 'Recommended image width: <b>768px - 1920px</b>, depending on size of the item',
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Our team -------------------------------------------------------

            'our_team' => [
                'type'   => 'our_team',
                'title'  => 'Our Team',
                'size'   => '1/4',
                'cat'    => 'elements',
                'fields' => [

                    [
                        'id'    => 'heading',
                        'type'  => 'text',
                        'title' => 'Heading',
                    ],

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Photo',
                        'desc'  => 'Recommended image width: <b>768px - 1920px</b>, depending on size of the item',
                    ],

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'    => 'subtitle',
                        'type'  => 'text',
                        'title' => 'Subtitle',
                    ],

                    // description
                    [
                        'id'    => 'info_description',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Description',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'phone',
                        'type'  => 'text',
                        'title' => 'Phone',
                    ],

                    [
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => 'Content',
                        'desc'  => 'Some Shortcodes and HTML tags allowed',
                        'class' => 'full-width sc',
                    ],

                    [
                        'id'    => 'email',
                        'type'  => 'text',
                        'title' => 'E-mail',
                    ],

                    // social
                    [
                        'id'    => 'info_social',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Social',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'facebook',
                        'type'  => 'text',
                        'title' => 'Facebook',
                    ],

                    [
                        'id'    => 'twitter',
                        'type'  => 'text',
                        'title' => 'Twitter',
                    ],

                    [
                        'id'    => 'linkedin',
                        'type'  => 'text',
                        'title' => 'LinkedIn',
                    ],

                    [
                        'id'    => 'vcard',
                        'type'  => 'text',
                        'title' => 'vCard',
                    ],

                    // other
                    [
                        'id'    => 'info_other',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Other',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'blockquote',
                        'type'  => 'textarea',
                        'title' => 'Blockquote',
                    ],

                    [
                        'id'      => 'style',
                        'type'    => 'select',
                        'title'   => 'Style',
                        'options' => [
                            'circle'     => 'Circle',
                            'vertical'   => 'Vertical',
                            'horizontal' => 'Horizontal [only: 1/2]',
                        ],
                        'std'     => 'vertical',
                    ],

                    // link
                    [
                        'id'    => 'info_link',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Link',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Link | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Our team list --------------------------------------------------

            'our_team_list' => [
                'type'   => 'our_team_list',
                'title'  => 'Our Team List',
                'size'   => '1/1',
                'cat'    => 'elements',
                'fields' => [

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Photo',
                        'desc'  => 'Recommended minimum image width: <b>768px</b>',
                    ],

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'    => 'subtitle',
                        'type'  => 'text',
                        'title' => 'Subtitle',
                    ],

                    // description
                    [
                        'id'    => 'info_description',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Description',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'phone',
                        'type'  => 'text',
                        'title' => 'Phone',
                    ],

                    [
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => 'Content',
                        'desc'  => 'Some Shortcodes and HTML tags allowed',
                        'class' => 'full-width sc',
                    ],

                    [
                        'id'    => 'blockquote',
                        'type'  => 'textarea',
                        'title' => 'Blockquote',
                    ],

                    [
                        'id'    => 'email',
                        'type'  => 'text',
                        'title' => 'E-mail',
                    ],

                    // social
                    [
                        'id'    => 'info_social',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Social',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'facebook',
                        'type'  => 'text',
                        'title' => 'Facebook',
                    ],

                    [
                        'id'    => 'twitter',
                        'type'  => 'text',
                        'title' => 'Twitter',
                    ],

                    [
                        'id'    => 'linkedin',
                        'type'  => 'text',
                        'title' => 'LinkedIn',
                    ],

                    [
                        'id'    => 'vcard',
                        'type'  => 'text',
                        'title' => 'vCard',
                    ],

                    // link
                    [
                        'id'    => 'info_link',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Link',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Link | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Photo Box ------------------------------------------------------

            'photo_box' => [
                'type'   => 'photo_box',
                'title'  => 'Photo Box',
                'size'   => '1/4',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Image',
                        'desc'  => 'Recommended image width: <b>768px - 1920px</b>, depending on size of the item',
                    ],

                    [
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => 'Content',
                        'desc'  => 'Some Shortcodes and HTML tags allowed',
                        'class' => 'full-width sc',
                    ],

                    [
                        'id'      => 'align',
                        'type'    => 'select',
                        'title'   => 'Text Align',
                        'options' => [
                            ''      => 'Center',
                            'left'  => 'Left',
                            'right' => 'Right',
                        ],
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Link | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    [
                        'id'      => 'greyscale',
                        'type'    => 'select',
                        'title'   => 'Greyscale Images',
                        'desc'    => 'Works only for images with link',
                        'options' => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Pricing item ---------------------------------------------------

            'pricing_item' => [
                'type'   => 'pricing_item',
                'title'  => 'Pricing Item',
                'size'   => '1/4',
                'cat'    => 'blocks',
                'fields' => [

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Image',
                    ],

                    [
                        'id'       => 'title',
                        'type'     => 'text',
                        'title'    => 'Title',
                        'sub_desc' => 'Pricing item title',
                    ],

                    [
                        'id'    => 'price',
                        'type'  => 'text',
                        'title' => 'Price',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'currency',
                        'type'  => 'text',
                        'title' => 'Currency',
                        'class' => 'small-text',
                    ],

                    [
                        'id'      => 'currency_pos',
                        'type'    => 'select',
                        'title'   => 'Currency | Position',
                        'options' => [
                            ''      => 'Left',
                            'right' => 'Right',
                        ],
                    ],

                    [
                        'id'    => 'period',
                        'type'  => 'text',
                        'title' => 'Period',
                        'class' => 'small-text',
                    ],

                    // description
                    [
                        'id'    => 'info_description',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Description',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'subtitle',
                        'type'  => 'text',
                        'title' => 'Subtitle',
                    ],

                    [
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => 'Content',
                        'desc'  => 'HTML tags allowed.',
                        'std'   => '<ul><li><strong>List</strong> item</li></ul>',
                    ],

                    // button
                    [
                        'id'    => 'info_button',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Button',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'link_title',
                        'type'  => 'text',
                        'title' => 'Button | Title',
                        'desc'  => 'Button will appear only if this field will be filled.',
                    ],

                    [
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => 'Button | Icon',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Button | Link',
                        'desc'  => 'Button will appear only if this field will be filled.',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Button | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'      => 'featured',
                        'type'    => 'select',
                        'title'   => 'Featured',
                        'options' => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    [
                        'id'      => 'style',
                        'type'    => 'select',
                        'title'   => 'Style',
                        'options' => [
                            'box'   => 'Box',
                            'label' => 'Table Label',
                            'table' => 'Table',
                        ],
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Progress Bars  -------------------------------------------------

            'progress_bars' => [
                'type'   => 'progress_bars',
                'title'  => 'Progress Bars',
                'size'   => '1/4',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => 'Content',
                        'desc'  => 'Please use <strong>[bar title="Title" value="50" size="20"]</strong> shortcodes here.',
                        'std'   => '[bar title="Bar1" value="50" size="20"]' . "\n" . '[bar title="Bar2" value="60" size="20"]',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Promo Box ------------------------------------------------------

            'promo_box' => [
                'type'   => 'promo_box',
                'title'  => 'Promo Box',
                'size'   => '1/2',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Image',
                        'desc'  => 'Recommended minimum image width: <b>768px</b>',
                    ],

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => 'Content',
                        'desc'  => 'Some Shortcodes and HTML tags allowed',
                        'class' => 'full-width sc',
                    ],

                    // button
                    [
                        'id'    => 'info_button',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Button',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'btn_text',
                        'type'  => 'text',
                        'title' => 'Button | Text',
                        'class' => 'small-text',
                    ],
                    [
                        'id'    => 'btn_link',
                        'type'  => 'text',
                        'title' => 'Button | Link',
                        'class' => 'small-text',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Button | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'      => 'position',
                        'type'    => 'select',
                        'title'   => 'Image position',
                        'options' => [
                            'left'  => 'Left',
                            'right' => 'Right',
                        ],
                        'std'     => 'left',
                    ],

                    [
                        'id'       => 'border',
                        'type'     => 'select',
                        'title'    => 'Border',
                        'sub_desc' => 'Show right border',
                        'options'  => [
                            0 => 'No',
                            1 => 'Yes',
                        ],
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Quick Fact -----------------------------------------------------

            'quick_fact' => [
                'type'   => 'quick_fact',
                'title'  => 'Quick Fact',
                'size'   => '1/4',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'    => 'heading',
                        'type'  => 'text',
                        'title' => 'Heading',
                    ],

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'       => 'content',
                        'type'     => 'textarea',
                        'title'    => 'Content',
                        'desc'     => 'Some Shortcodes and HTML tags allowed',
                        'class'    => 'full-width sc',
                        'validate' => 'html',
                    ],

                    // quick fact
                    [
                        'id'    => 'info_quick',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Quick Fact',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'    => 'number',
                        'type'  => 'text',
                        'title' => 'Number',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'prefix',
                        'type'  => 'text',
                        'title' => 'Prefix',
                        'class' => 'small-text',
                    ],

                    [
                        'id'    => 'label',
                        'type'  => 'text',
                        'title' => 'Postfix',
                        'class' => 'small-text',
                    ],

                    // options
                    [
                        'id'    => 'info_options',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Options',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'      => 'align',
                        'type'    => 'select',
                        'title'   => 'Align',
                        'options' => [
                            ''      => 'Center',
                            'left'  => 'Left',
                            'right' => 'Right',
                        ],
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Sidebar Widget -------------------------------------------------

            'sidebar_widget' => [
                'type'   => 'sidebar_widget',
                'title'  => 'Sidebar Widget',
                'size'   => '1/4',
                'cat'    => 'other',
                'fields' => [

                    [
                        'id'    => 'sidebar',
                        'type'  => 'select',
                        'title' => 'Select Sidebar',
                        'desc'  => '1. Create Sidebar in Theme Options > Getting Started > Sidebars.<br />2. Add Widget.<br />3. Select your sidebar.',
                        //'options' 	=> mfn_opts_get( 'sidebars' ),
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Sliding Box ----------------------------------------------------

            'sliding_box' => [
                'type'   => 'sliding_box',
                'title'  => 'Sliding Box',
                'size'   => '1/4',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Image',
                        'desc'  => 'Recommended image width: <b>768px - 1920px</b>, depending on size of the item',
                    ],

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Link | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Story Box ------------------------------------------------------

            'story_box' => [
                'type'   => 'story_box',
                'title'  => 'Story Box',
                'size'   => '1/2',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Image',
                        'desc'  => 'Recommended image width: <b>750px - 1500px</b>, depending on size of the item',
                    ],

                    [
                        'id'      => 'style',
                        'type'    => 'select',
                        'title'   => 'Style',
                        'options' => [
                            ''         => 'Horizontal Image',
                            'vertical' => 'Vertical Image',
                        ],
                    ],

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'       => 'content',
                        'type'     => 'textarea',
                        'title'    => 'Content',
                        'desc'     => 'Some Shortcodes and HTML tags allowed',
                        'class'    => 'full-width sc',
                        'validate' => 'html',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Link | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Tabs -----------------------------------------------------------

            'tabs' => [
                'type'   => 'tabs',
                'title'  => 'Tabs',
                'size'   => '1/4',
                'cat'    => 'blocks',
                'fields' => [

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    // tabs
                    [
                        'id'    => 'info_tabs',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Tabs',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'tabs',
                        'type'     => 'tabs',
                        'title'    => '',
                        'sub_desc' => 'To add an <strong>icon</strong> in Title field, please use the following code:<br/><br/>&lt;i class=" icon-lamp"&gt;&lt;/i&gt; Tab Title',
                        'desc'     => '<b>JavaScript</b> content like Google Maps and some plugins shortcodes do <b>not work</b> in tabs. You can use Drag & Drop to set the order',
                    ],

                    // options
                    [
                        'id'    => 'info_options',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Options',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'      => 'type',
                        'type'    => 'select',
                        'title'   => 'Style',
                        'desc'    => 'Vertical tabs works only for column widths: 1/2, 3/4 & 1/1',
                        'options' => [
                            'horizontal' => 'Horizontal',
                            'centered'   => 'Horizontal (centered tab)',
                            'vertical'   => 'Vertical',
                        ],
                    ],

                    [
                        'id'       => 'padding',
                        'type'     => 'text',
                        'title'    => 'Content Padding',
                        'sub_desc' => 'Leave empty to use defult padding',
                        'desc'     => 'Use value with <b>px</b> or <b>%</b>. Example: <b>20px</b> or <b>15px 20px 20px</b> or <b>20px 1%</b>',
                        'class'    => 'small-text',
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'uid',
                        'type'     => 'text',
                        'title'    => 'Unique ID [optional]',
                        'sub_desc' => 'Allowed characters: "a-z" "-" "_"',
                        'desc'     => 'Use this option if you want to open specified tab from link.<br />For example: Your Unique ID is <strong>offer</strong> and you want to open 2nd tab, please use link: <strong>your-url/#offer-2</strong>',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Timeline -------------------------------------------------------

            'timeline' => [
                'type'   => 'timeline',
                'title'  => 'Timeline',
                'size'   => '1/1',
                'cat'    => 'elements',
                'fields' => [

                    [
                        'id'       => 'tabs',
                        'type'     => 'tabs',
                        'title'    => 'Timeline',
                        'sub_desc' => 'Please add <strong>date</strong> wrapped into <strong>span</strong> tag in Title field.<br/><br/>&lt;span&gt;2013&lt;/span&gt;Event Title',
                        'desc'     => 'You can use Drag & Drop to set the order.',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Trailer Box ----------------------------------------------------

            'trailer_box' => [
                'type'   => 'trailer_box',
                'title'  => 'Trailer Box',
                'size'   => '1/4',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Image',
                        'desc'  => 'Recommended image width: <b>768px - 1920px</b>, depending on size of the item',
                    ],

                    [
                        'id'    => 'slogan',
                        'type'  => 'text',
                        'title' => 'Slogan',
                    ],

                    [
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => 'Title',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Link | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    // advanced
                    [
                        'id'    => 'info_advanced',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Advanced',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'      => 'style',
                        'type'    => 'select',
                        'title'   => 'Style',
                        'options' => [
                            ''      => 'Default',
                            'plain' => 'Plain',
                        ],
                    ],

                    [
                        'id'       => 'animate',
                        'type'     => 'select',
                        'title'    => 'Animation',
                        'desc'     => '<b>Notice:</b> In some versions of Safari browser Hover works only if you select: <b>Not Animated</b> or <b>Fade In</b>',
                        'sub_desc' => 'Entrance animation',
                        'options'  => mfn_get_animations(),
                    ],

                    // custom
                    [
                        'id'    => 'info_custom',
                        'type'  => 'info',
                        'title' => '',
                        'desc'  => 'Custom',
                        'class' => 'mfn-info',
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Video  --------------------------------------------
            'video'       => [
                'type'   => 'video',
                'title'  => 'Video',
                'size'   => '1/4',
                'cat'    => 'elements',
                'fields' => [

                    [
                        'id'       => 'video',
                        'type'     => 'text',
                        'title'    => 'YouTube or Vimeo | Video ID',
                        'sub_desc' => 'YouTube or Vimeo',
                        'desc'     => 'It`s placed in every YouTube & Vimeo video, for example:<br /><b>YouTube:</b> http://www.youtube.com/watch?v=<u>WoJhnRczeNg</u><br /><b>Vimeo:</b> http://vimeo.com/<u>62954028</u>',
                        'class'    => 'small-text',
                    ],

                    [
                        'id'       => 'parameters',
                        'type'     => 'text',
                        'title'    => 'YouTube or Vimeo | Parameters',
                        'sub_desc' => 'YouTube or Vimeo',
                        'desc'     => 'Multiple parameters should be connected with "&"<br />For example: <b>autoplay=1&loop=1</b><br /><br />Vimeo authors may disable some parameters for their videos',
                    ],

                    [
                        'id'       => 'mp4',
                        'type'     => 'uploadframe',
                        'title'    => 'HTML5 | MP4 video',
                        'sub_desc' => 'm4v [.mp4]',
                        'desc'     => 'Please add both mp4 and ogv for cross-browser compatibility.',
                        'class'    => 'video',
                    ],

                    [
                        'id'       => 'ogv',
                        'type'     => 'uploadframe',
                        'title'    => 'HTML5 | OGV video',
                        'sub_desc' => 'ogg [.ogv]',
                        'class'    => 'video',
                    ],

                    [
                        'id'    => 'placeholder',
                        'type'  => 'uploadframe',
                        'title' => 'HTML5 | Placeholder image',
                        'desc'  => 'Placeholder Image will be used as video placeholder before video loads and on mobile devices.',
                    ],

                    [
                        'id'      => 'html5_parameters',
                        'type'    => 'select',
                        'title'   => 'HTML5 | Parameters',
                        'desc'    => 'Recent versions of WebKit browsers and iOS do not support autoplay.',
                        'options' => [
                            ''       => 'autoplay controls loop muted',
                            'a;c;l;' => 'autoplay controls loop',
                            'a;c;;m' => 'autoplay controls muted',
                            'a;;l;m' => 'autoplay loop muted',
                            'a;c;;'  => 'autoplay controls',
                            'a;;l;'  => 'autoplay loop',
                            'a;;;m'  => 'autoplay muted',
                            'a;;;'   => 'autoplay',
                            ';c;l;m' => 'controls loop muted',
                            ';c;l;'  => 'controls loop',
                            ';c;;m'  => 'controls muted',
                            ';c;;'   => 'controls',
                        ],
                    ],

                    [
                        'id'    => 'width',
                        'type'  => 'text',
                        'title' => 'Width',
                        'desc'  => 'px',
                        'class' => 'small-text',
                        'std'   => 700,
                    ],

                    [
                        'id'    => 'height',
                        'type'  => 'text',
                        'title' => 'Height',
                        'desc'  => 'px',
                        'class' => 'small-text',
                        'std'   => 400,
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            // Visual Editor  -------------------------------------------------

            /*'visual' => array(
				//'type' 		=> 'visual',
				'title' 	=> 'Visual Editor',
				'size' 		=> '1/4',
				'cat' 		=> 'other',
				'fields' 	=> array(

					array(
						'id' 		=> 'title',
						'type' 		=> 'text',
						'title' 	=> 'Title',
						'desc' 		=> 'This field is used as an Item Label in admin panel only',
					),

					array(
						'id' 		=> 'content',
						'type' 		=> 'visual',
						'title' 	=> 'Visual Editor',
// 						'param' 	=> 'editor',
// 						'validate' 	=> 'html',
					),

					array(
						'id' 		=> 'classes',
						'type' 		=> 'text',
						'title' 	=> 'Custom | Classes',
						'sub_desc'	=> 'Custom CSS Item Classes Names',
						'desc'		=> 'Multiple classes should be separated with SPACE',
					),

				),
			),*/

            // Zoom Box -------------------------------------------------------

            'zoom_box' => [
                'type'   => 'zoom_box',
                'title'  => 'Zoom Box',
                'size'   => '1/4',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'    => 'image',
                        'type'  => 'uploadframe',
                        'title' => 'Image',
                        'desc'  => 'Recommended image width: <b>768px - 1920px</b>, depending on size of the item',
                    ],

                    [
                        'id'    => 'bg_color',
                        'type'  => 'color',
                        'title' => 'Overlay background',
                        'std'   => '#CCCCCC',
                    ],

                    [
                        'id'    => 'content_image',
                        'type'  => 'uploadframe',
                        'title' => 'Content Image',
                    ],

                    [
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => 'Content',
                        'desc'  => 'HTML tags allowed',
                        'class' => 'full-width',
                    ],

                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],

                    [
                        'id'      => 'target',
                        'type'    => 'select',
                        'title'   => 'Link | Target',
                        'options' => [
                            0          => 'Default | _self',
                            1          => 'New Tab or Window | _blank',
                            'lightbox' => 'Lightbox (image or embed video)',
                        ],
                    ],

                    [
                        'id'       => 'classes',
                        'type'     => 'text',
                        'title'    => 'Custom | Classes',
                        'sub_desc' => 'Custom CSS Item Classes Names',
                        'desc'     => 'Multiple classes should be separated with SPACE',
                    ],

                ],
            ],

            'slider' => [
                'type'   => 'slider',
                'title'  => 'Slider',
                'size'   => '1/1',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'      => 'content',
                        'type'    => 'select',
                        'title'   => 'Slider Content',
                        'desc'    => 'Select le Slider.',
                        'options' => olivee_get_sliders(false),

                    ],

                ],
            ],

            'menu' => [
                'type'   => 'menu',
                'title'  => 'Menu',
                'size'   => '1/1',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'      => 'content',
                        'type'    => 'select',
                        'title'   => 'Menu Content',
                        'desc'    => 'Select le Menu.',
                        'options' => olivee_get_menus(false),

                    ],

                ],
            ],

            'block_xoops' => [
                'type'   => 'block_xoops',
                'title'  => 'Block_xoops',
                'size'   => '1/4',
                'cat'    => 'boxes',
                'fields' => [

                    [
                        'id'      => 'content',
                        'type'    => 'select',
                        'title'   => 'Block Content',
                        'desc'    => 'Select le Block.',
                        'options' => olivee_get_idblock(false),

                    ],

                ],
            ],

            // Blockcolumn ---------------------------------------------------------
            'Blockcolumn' => [
                'type'   => 'Blockcolumn',
                'title'  => 'Block Column',
                'size'   => '1/4',
                'fields' => [

                    [
                        'id'      => 'content',
                        'type'    => 'select',
                        'title'   => 'Column Content',
                        'desc'    => 'Select le block column.',
                        'options' => ['Left' => 'Left Column', 'Center' => 'Center Column', 'Right' => 'Right Column'],

                    ],

                    /////
                    [
                        'id'      => 'content1',
                        'type'    => 'select',
                        'title'   => 'menu Content',
                        'desc'    => 'Select le menu in block column.',
                        'options' => olivee_get_menus(false),

                    ],

                    [
                        'id'      => 'content11',
                        'type'    => 'select',
                        'title'   => 'block ID',
                        'desc'    => 'Select le id block column.',
                        'options' => olivee_get_idblock(false),

                    ],

                    [
                        'id'      => 'content111',
                        'type'    => 'select',
                        'title'   => 'block id in after before',
                        'desc'    => 'Select le block column in, before, after.',
                        'options' => ['in' => 'in Block', 'in' => 'in Block', 'before' => 'before Block', 'after' => 'after Block'],

                    ],

                    [
                        'id'      => 'content2',
                        'type'    => 'select',
                        'title'   => 'slider Content',
                        'desc'    => 'Select le slider in block column.',
                        'options' => olivee_get_sliders(false),

                    ],

                    [
                        'id'      => 'content22',
                        'type'    => 'select',
                        'title'   => 'block ID',
                        'desc'    => 'Select le id block column.',
                        'options' => olivee_get_idblock(false),

                    ],

                    [
                        'id'      => 'content222',
                        'type'    => 'select',
                        'title'   => 'block id in after before',
                        'desc'    => 'Select le block column in, before, after.',
                        'options' => ['in' => 'in Block', 'before' => 'before Block', 'after' => 'after Block'],

                    ],

                ],
            ],

        ];

        if ($item) {
            return $items[$item];
        }

        return $items;
    }
}

/////////////////////////////////////

///////////////////////////////////////

/*
 * Print functions
 *
 * Print fields, items, wraps, sections
 */

if (!function_exists('mfn_meta_field_input')) {
    /**
     * PRINT single FIELD
     *
     * @param array $field
     * @param array $meta
     * @global      $MFN_Options
     */
    function mfn_meta_field_input($field, $meta, $type = 'meta')
    {
        global $MFN_Options;

        if (isset($field['type'])) {
            // Table Row class
            if (isset($field['class'])) {
                $class = $field['class'];
            } else {
                $class = '';
            }

            echo '<tr class="' . $class . '">';

            // LABEL title, sub_desc
            echo '<th>';
            if (key_exists('title', $field)) {
                echo $field['title'];
            }
            if (key_exists('sub_desc', $field)) {
                echo '<span class="description">' . $field['sub_desc'] . '</span>';
            }
            echo '</th>';

            // OPTIONS field render
            echo '<td>';
            //$field_class = 'MFN_Options_'.$field['type'];
            $field_class = 'OLIVEE_Options_' . $field['type'];
            //require_once( 'D:\wamp/www/xoops257sample/modules/system/admin/themebuilder1/builder/fields/'.$field['type'].'/field_'.$field['type'].'.php' );
            if (file_exists(XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/builder/fields/' . $field['type'] . '/field_' . $field['type'] . '.php')) {
                require_once XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/builder/fields/' . $field['type'] . '/field_' . $field['type'] . '.php';
            } else {
                echo XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/builder/fields/' . $field['type'] . '/field_' . $field['type'] . '.php';;
            }

            if (class_exists($field_class)) {
                $field_object = new $field_class($field, $meta);
                $field_object->render($type);
            }

            echo '</td>';

            echo '</tr>';
        }
    }
}

if (!function_exists('mfn_builder_section')) {
    /**
     * PRINT single SECTION
     *
     * @param string $section
     * @param string $section_id
     */
    function mfn_builder_section($section = false, $section_id = false, &$wrap_id = false, $item_std = null)
    {
        // Hide
        if ($section && key_exists('attr', $section) && key_exists('hide', $section['attr']) && $section['attr']['hide']) {
            $hide = 'hide';
            $icon = 'hidden';
        } else {
            $hide = false;
            $icon = 'visibility';
        }

        // Input Names - only for existing sections, not for section to clone -----------
        $n_row_id = $section ? 'mfn-row-id[]' : '';

        echo '<div class="mfn-element mfn-row ' . $hide . '" data-title="Section">';

        // Section | Content
        echo '<div class="mfn-element-content">';
        echo '<input type="hidden" class="mfn-row-id" name="' . $n_row_id . '" value="' . $section_id . '" />';

        // Section | Content > Header
        echo '<div class="mfn-element-header mfn-row-header">';

        echo '<div class="mfn-element-btns">';
        echo '<a class="mfn-element-btn mfn-add-wrap" href="javascript:void(0);">Add Wrap</a>';
        echo '<a class="mfn-element-btn mfn-add-divider" href="javascript:void(0);">Add Divider</a>';
        echo '</div>';

        $section_label = ($section && key_exists('attr', $section) && key_exists('title', $section['attr'])) ? $section['attr']['title'] : ''; // section label - visible only in backend
        echo '<span class="mfn-item-label">' . $section_label . '</span>';

        echo '<div class="mfn-element-tools">';
        echo '<a class="mfn-element-btn mfn-element-edit dashicons dashicons-edit" title="Edit" href="javascript:void(0);"></a>';
        echo '<a class="mfn-element-btn mfn-element-clone mfn-row-clone dashicons dashicons-share-alt2" title="Clone" href="javascript:void(0);"></a>';
        echo '<a class="mfn-element-btn mfn-element-hide dashicons dashicons-' . $icon . '" title="Hide" href="javascript:void(0);"></a>';
        echo '<a class="mfn-element-btn mfn-element-delete dashicons dashicons-no" title="Delete" href="javascript:void(0);"></a>';
        echo '</div>';

        echo '</div>';

        // Section | Content > Sortable
        echo '<div class="mfn-sortable mfn-sortable-row clearfix">';

        // Sections | Existing Wraps

        if ($section) {
            // FIX | Builder 2.0 Compatibility
            if (!key_exists('wraps', $section) && is_array($section['items'])) {
                $fix_wrap = [
                    'size'  => '1/1',
                    'items' => $section['items'],
                ];

                $section['wraps'] = [$fix_wrap];
            }

            if (key_exists('wraps', $section) && is_array($section['wraps'])) {
                foreach ($section['wraps'] as $wrap) {
                    mfn_builder_wrap($wrap, $wrap_id, $section_id, $item_std);
                    $wrap_id++;
                }
            }
        }

        echo '</div>';

        echo '</div>';

        // Section | Meta
        echo '<div class="mfn-element-meta">';

        echo '<table class="form-table">';
        echo '<tbody>';

        // Section | Meta > Fields
        $section_fields = mfn_get_fields_section();

        foreach ($section_fields as $field) {
            // Values - only for Existing sections
            if ($section && key_exists($field['id'], $section['attr'])) {
                $meta = $section['attr'][$field['id']];
            } else {
                $meta = false;
            }

            if (!key_exists('std', $field)) {
                $field['std'] = false;
            }
            $meta = ($meta || $meta === '0') ? $meta : stripslashes(htmlspecialchars((string) $field['std'], ENT_QUOTES));

            // field ID
            $field['id'] = 'mfn-rows[' . $field['id'] . ']';

            // field ID except accordion, faq & tabs
            if ($field['type'] != 'tabs') {
                $field['id'] .= '[]';
            }

            // PRINT Single Options FIELD
            if ($section) {
                $input_type = 'existing';
            } else {
                $input_type = 'new';
            }
            mfn_meta_field_input($field, $meta, $input_type);
        }

        echo '</tbody>';
        echo '</table>';

        echo '</div>';

        echo '</div>';
    }
}

if (!function_exists('mfn_builder_wrap')) {
    /**
     * PRINT single WRAP
     *
     * @param array  $item_std
     * @param string $wrap
     * @param string $wrap_id
     */
    function mfn_builder_wrap($wrap = false, $wrap_id = false, $parent_id = false, $item_std = false)
    {
        //var_dump($item_std);

        // input names - only for existing wraps, not for wraps to clone -----------
        $n_wrap_id     = $wrap ? 'mfn-wrap-id[]' : '';
        $n_wrap_parent = $wrap ? 'mfn-wrap-parent[]' : '';
        $n_wrap_size   = $wrap ? 'mfn-wrap-size[]' : '';

        $sizes = [
            '1/6' => 0.1666, '1/5' => 0.2, '1/4' => 0.25, '1/3' => 0.3333, '2/5' => 0.4, '1/2' => 0.5,
            '3/5' => 0.6, '2/3' => 0.6667, '3/4' => 0.75, '4/5' => 0.8, '5/6' => 0.8333, '1/1' => 1, 'divider' => 1,
        ];
        $size  = $wrap ? $wrap['size'] : '1/1';

        $class = '';
        if ($wrap && ($wrap['size'] == 'divider')) {
            $class .= ' divider';
        }

        echo '<div class="mfn-element mfn-wrap ' . $class . '" data-size="' . $sizes[$size] . '" data-title="Wrap">';

        // Wrap | Content
        echo '<div class="mfn-element-content">';

        echo '<input type="hidden" class="mfn-wrap-id" name="' . $n_wrap_id . '" value="' . $wrap_id . '" />';
        echo '<input type="hidden" class="mfn-wrap-parent" name="' . $n_wrap_parent . '" value="' . $parent_id . '" />';
        echo '<input type="hidden" class="mfn-wrap-size" name="' . $n_wrap_size . '" value="' . $size . '" />';

        // Wrap | Content > Header
        echo '<div class="mfn-element-header mfn-wrap-header">';

        echo '<div class="mfn-item-size">';
        echo '<a class="mfn-element-btn mfn-item-size-dec" href="javascript:void(0);">-</a>';
        echo '<a class="mfn-element-btn mfn-item-size-inc" href="javascript:void(0);">+</a>';
        echo '<a class="mfn-element-btn mfn-add-item" href="javascript:void(0);">Add Item</a>';
        echo '<span class="mfn-element-btn mfn-item-desc">' . $size . '</span>';
        echo '</div>';

        echo '<div class="mfn-element-tools">';
        echo '<a class="mfn-element-btn mfn-element-edit mfn-wrap-edit dashicons dashicons-edit" title="Edit" href="javascript:void(0);"></a>';
        echo '<a class="mfn-element-btn mfn-element-clone mfn-wrap-clone dashicons dashicons-share-alt2" title="Clone" href="javascript:void(0);"></a>';
        echo '<a class="mfn-element-btn mfn-element-delete dashicons dashicons-no" title="Delete" href="javascript:void(0);"></a>';
        echo '</div>';

        echo '</div>';

        // Wrap | Content > Sortable
        echo '<div class="mfn-sortable mfn-sortable-wrap clearfix">';

        if ($wrap && key_exists('items', $wrap) && is_array($wrap['items'])) {
            foreach ($wrap['items'] as $item) {
                mfn_builder_item($item['type']);
            }
        }

        echo '</div>';

        echo '</div>';

        // Wrap | Meta
        echo '<div class="mfn-element-meta">';

        echo '<table class="form-table">';
        echo '<tbody>';

        // Wrap | Meta > Fields
        $wrap_fields = mfn_get_fields_wrap();

        foreach ($wrap_fields as $field) {
            // Values - only for Existing wraps
            if ($wrap && key_exists('attr', $wrap) && key_exists($field['id'], $wrap['attr'])) {
                $meta = $wrap['attr'][$field['id']];
            } else {
                $meta = false;
            }

            if (!key_exists('std', $field)) {
                $field['std'] = false;
            }
            $meta = ($meta || $meta === '0') ? $meta : stripslashes(htmlspecialchars((string) $field['std'], ENT_QUOTES));

            // field ID
            $field['id'] = 'mfn-wraps[' . $field['id'] . ']';

            // field ID except accordion, faq & tabs
            if ($field['type'] != 'tabs') {
                $field['id'] .= '[]';
            }

            // PRINT Single Options FIELD
            if ($wrap) {
                $input_type = 'existing';
            } else {
                $input_type = 'new';
            }
            mfn_meta_field_input($field, $meta, $input_type);
        }

        echo '</tbody>';
        echo '</table>';

        echo '</div>';

        echo '</div>';
    }
}

if (!function_exists('mfn_builder_item')) {
    /**
     * PRINT single ITEM
     *
     * @param array  $item_std
     * @param string $item
     * @param string $section_id
     */
    function mfn_builder_item($item_type, $item = false, $parent_id = false, $item_std = false)
    {
        //$item_std 			= mfn_get_fields_item( $item_type );
        $item_std = $item_std[$item_type];
        //var_dump($item);

        // input names - only for existing items, not for items to clone -----------
        $n_item_type   = $item ? 'mfn-item-type[]' : '';
        $n_item_size   = $item ? 'mfn-item-size[]' : '';
        $n_item_parent = $item ? 'mfn-item-parent[]' : '';

        $sizes            = [
            '1/6' => 0.1666, '1/5' => 0.2, '1/4' => 0.25, '1/3' => 0.3333, '2/5' => 0.4, '1/2' => 0.5,
            '3/5' => 0.6, '2/3' => 0.6667, '3/4' => 0.75, '4/5' => 0.8, '5/6' => 0.8333, '1/1' => 1,
        ];
        $item_std['size'] = $item['size'] ?: $item_std['size'];

        echo '<div class="mfn-element mfn-item mfn-item-' . $item_std['type'] . '" data-size="' . $sizes[$item_std['size']] . '" data-title="' . $item_std['title'] . '">';

        echo '<div class="mfn-element-content">';

        echo '<input type="hidden" class="mfn-item-type" name="' . $n_item_type . '" value="' . $item_std['type'] . '">';
        echo '<input type="hidden" class="mfn-item-size" name="' . $n_item_size . '" value="' . $item_std['size'] . '">';
        echo '<input type="hidden" class="mfn-item-parent" name="' . $n_item_parent . '" value="' . $parent_id . '" />';

        echo '<div class="mfn-element-header">';

        echo '<div class="mfn-item-size">';

        echo '<a class="mfn-element-btn mfn-item-size-dec" href="javascript:void(0);">-</a>';
        echo '<a class="mfn-element-btn mfn-item-size-inc" href="javascript:void(0);">+</a>';
        echo '<span class="mfn-element-btn mfn-item-desc">' . $item_std['size'] . '</span>';

        echo '</div>';

        echo '<div class="mfn-element-tools">';

        echo '<a class="mfn-element-btn mfn-fr mfn-element-edit dashicons dashicons-edit" title="Edit" href="javascript:void(0);"></a>';
        echo '<a class="mfn-element-btn mfn-fr mfn-element-clone mfn-item-clone dashicons dashicons-share-alt2" title="Clone" href="javascript:void(0);"></a>';
        echo '<a class="mfn-element-btn mfn-fr mfn-element-delete dashicons dashicons-no" title="Delete" href="javascript:void(0);"></a>';

        echo '</div>';

        echo '</div>';

        echo '<div class="mfn-item-content">';
        echo '<div class="mfn-item-inside">';

        echo '<div class="mfn-item-icon"></div>';

        echo '<div class="mfn-item-inside-desc">';

        echo '<span class="mfn-item-title">' . $item_std['title'] . '</span>';

        $item_label = ($item && key_exists('fields', $item) && key_exists('title', $item['fields'])) ? $item['fields']['title'] : '';
        echo '<span class="mfn-item-label">' . $item_label . '</span>';

        echo '</div>';

        echo '</div>';

        if ($item && key_exists('fields', $item) && key_exists('content', $item['fields'])) {
            //$item_excerpt = strip_shortcodes( strip_tags( $item['fields']['content'] ) );
            if (str_starts_with((string) $item['fields']['content'], '<{$')) {
                $item_excerpt = substr((string) $item['fields']['content'], 3, -2);
            } else {
                $item_excerpt = $item['fields']['content'];
            }
            $item_excerpt = strip_tags((string) $item_excerpt);

            $item_excerpt       = preg_split('/\b/', $item_excerpt, 16 * 2 + 1);
            $item_excerpt_waste = array_pop($item_excerpt);
            $item_excerpt       = implode('', $item_excerpt);

            echo '<p class="mfn-item-excerpt">' . $item_excerpt . '</p>';
        }

        echo '</div>';

        echo '</div>';

        echo '<div class="mfn-element-meta">';

        echo '<table class="form-table">';
        echo '<tbody>';

        // Fields for Item
        foreach ($item_std['fields'] as $field) {
            // values for existing items
            if ($item && key_exists('fields', $item) && key_exists($field['id'], $item['fields'])) {
                $meta = $item['fields'][$field['id']];
            } else {
                if (!key_exists('std', $field)) {
                    $field['std'] = false;
                }
                $meta = stripslashes(htmlspecialchars((string) $field['std'], ENT_QUOTES));
            }

            // field ID
            $field['id'] = 'mfn-items[' . $item_std['type'] . '][' . $field['id'] . ']';

            // field ID except accordion, faq & tabs
            if ($field['type'] != 'tabs') {
                $field['id'] .= '[]';
            }

            // PRINT Single Options FIELD
            if ($item) {
                $input_type = 'existing';
            } else {
                $input_type = 'new';
            }
            mfn_meta_field_input($field, $meta, $input_type);
        }

        echo '</tbody>';
        echo '</table>';

        echo '</div>';

        echo '</div>';
    }
}

/*
 * Builder
 *
 * Main backend builder function
 */

if (!function_exists('mfn_builder_show')) {
    /**
     * PRINT Builder
     *
     * Main function
     *
     * @global $post
     */
    function mfn_builder_show($form, $pageid)
    {
        global $post;
        global $xoopsDB;

        $titlee       = '';
        $olivee_items = '';
        if ($form == 'pagebuilder' || $form == 'layoutbuilder') {
            $olivee_tmp_fn = '';
            if ($pageid == false) {
                if ($form == 'layoutbuilder') {
                    $titlee .= '<div class="">Layout Title: <input class="text-input" size="35" name="mfn-item-titre" type="text" placeholder="Your layout titre" data-msg-required="This field is required." required></div>';
                } else {
                    $titlee .= '<div class="">Page Title: <input class="text-input" size="35" name="mfn-item-titre" type="text" placeholder="Your page titre" data-msg-required="This field is required." required></div>';
                    $titlee .= '<br><label><input name="selection" type="radio" value="1" checked="checked"> default</label><code>' . XOOPS_URL . '/page.php?op=123</code>';
                    $titlee .= '<br><label><input name="selection" type="radio" value="2"> numerique</label><code>' . XOOPS_URL . '/page/123</code>';
                    $titlee .= '<br><label><input name="selection" type="radio" value="3"> SEO page Title</label><code>' . XOOPS_URL . '/sample-post/</code>';
                }
            } else {
                $sqlr          = "SELECT * FROM " . $xoopsDB->prefix("config_theme") . " WHERE conf_id = '" . $pageid . "'";
                $head_arrl     = $xoopsDB->fetchArray($xoopsDB->query($sqlr));
                $olivee_tmp_fn = $head_arrl['conf_value'];
                //$olivee_items = unserialize($olivee_tmp_fn);
                if ($head_arrl['conf_modid'] != 0) {
                    if ($head_arrl['conf_modid'] == 1) {
                        $checked1 = ' checked="checked"';
                    } else {
                        $checked1 = false;
                    }
                    if ($head_arrl['conf_modid'] == 2) {
                        $checked2 = ' checked="checked"';
                    } else {
                        $checked2 = false;
                    }
                    if ($head_arrl['conf_modid'] == 3) {
                        $checked3 = ' checked="checked"';
                    } else {
                        $checked3 = false;
                    }
                }

                if ($form == 'layoutbuilder') {
                    $titlee .= '<div class="">Layout Title: <input class="text-input" size="35" name="mfn-item-titre" value="' . $head_arrl['conf_title'] . '" type="text" placeholder="Your layout titre" data-msg-required="This field is required." required></div>';
                } else {
                    $titlee .= '<div class="">Page Title: <input class="text-input" size="35" name="mfn-item-titre" value="' . $head_arrl['conf_title'] . '" type="text" placeholder="Your page titre" data-msg-required="This field is required." required></div>';
                    $titlee .= '<br><label><input name="selection" type="radio" value="1" "' . $checked1 . '"> default</label><code>' . XOOPS_URL . '/page.php?op=123</code>';
                    $titlee .= '<br><label><input name="selection" type="radio" value="2" "' . $checked2 . '"> numerique</label><code>' . XOOPS_URL . '/page/123</code>';
                    $titlee .= '<br><label><input name="selection" type="radio" value="3" "' . $checked3 . '"> titre de la page SEO</label><code>' . XOOPS_URL . '/sample-post/</code>';
                }
            }
        } else {
            $sqlr          = "SELECT * FROM " . $xoopsDB->prefix("config_theme") . " WHERE conf_name = '" . $form . "'";
            $head_arrl     = $xoopsDB->fetchArray($xoopsDB->query($sqlr));
            $olivee_tmp_fn = $head_arrl['conf_value'];
            //$olivee_items = unserialize($olivee_tmp_fn);
        }

        $mfn_items = $olivee_tmp_fn;
        //var_dump( $mfn_items );
        // Visibility -------------------------------------------------------------------

        /*if( $visibility = mfn_opts_get('builder-visibility') ){
			if( $visibility == 'hide' || ( ! current_user_can( $visibility ) ) ){
				return false;
			}
		}*/

        if ($mfn_items && !is_array($mfn_items)) {
            $mfn_items = unserialize(call_user_func('base' . '64_decode', $mfn_items));
        }
        if ($mfn_items == false) {
            $mfn_items = unserialize($olivee_tmp_fn);
        }

        $mfn_items_serial = call_user_func('base' . '64_encode', serialize($mfn_items));

        // Debug ------------------------------------------------------------------------

        //print_r( $mfn_items );
        //var_dump( $mfn_items );

        // ID | sections, wraps ------------------------------------------------------

        $section_id = 1;
        $wrap_id    = 1;
        $item_std   = mfn_get_fields_item();

        ?>
        <link rel="stylesheet" type="text/css" href="admin/themebuilder1/assets/css/options.css">
        <link rel="stylesheet" type="text/css" href="admin/themebuilder1/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="admin/themebuilder1/assets/css/dashicons.css">
        <link rel="stylesheet" type="text/css" href="admin/themebuilder1/assets/css/icomoon.css">
        <link rel="stylesheet" type="text/css" href="admin/themebuilder1/assets/css/font-awesome.css">
        <script src="admin/themebuilder1/assets/js/scripts.js"></script>
        <link rel="stylesheet" href="admin/themebuilder1/assets/js/colorpicker.css" type="text/css"/>
        <script type="text/javascript" src="admin/themebuilder1/assets/js/colorpicker.js"></script>
        <script>
            var upurl = "<?php echo XOOPS_URL ?>";
        </script>
        <script src="admin/themebuilder1/builder/fields/uploadframe/mlib-includes/js/init.js" type="text/javascript"></script>
        <div id="mfn-wrapper">
            <form id="form" name="form" method="post" action="" enctype="multipart/form-data">
                <div id="mfn-builder">
                    <?php echo $titlee; ?>

                    <input type="hidden" name="mfn-items-save" value="1"/>

                    <a id="mfn-go-to-top" class="dashicons dashicons-arrow-up-alt" href="javascript:void(0);"></a>

                    <div id="mfn-content">


                        <!-- Header | Add Section | first -->
                        <div class="mfn-row-add">
                            <table class="form-table">
                                <tbody>
                                <tr valign="top">
                                    <td>
                                        <a class="mfn-row-add-btn add-first" href="javascript:void(0);">
                                            <span class="dashicons dashicons-align-center"></span>
                                            <strong>Add Section</strong> as the first section
                                        </a>
                                        <img class="sml-4x3" alt="olivee_xoops" src="admin/themebuilder1/assets/css/images/motion.gif">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                        <!-- Builder Desktop -->
                        <div id="mfn-desk" class="clearfix">
                            <?php
                            if (is_array($mfn_items)) {
                                foreach ($mfn_items as $section) {
                                    mfn_builder_section($section, $section_id, $wrap_id, $item_std);
                                    $section_id++;
                                }
                            }

                            if ($section_id == 1) {
                                $class_add_row = 'hide';
                            } else {
                                $class_add_row = '';
                            }
                            ?>
                        </div>


                        <!-- Header | Add Section | last-->
                        <div class="mfn-row-add last <?php echo $class_add_row; ?>">
                            <table class="form-table">
                                <tbody>
                                <tr valign="top">
                                    <td>
                                        <a class="mfn-row-add-btn add-last" href="javascript:void(0);">
                                            <span class="dashicons dashicons-align-center"></span>
                                            <strong>Add Section</strong> as the last section
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                        <!-- New | Section -->
                        <div id="mfn-rows" class="clearfix">
                            <?php mfn_builder_section($section = false, $section_id = false, $wrap_id = false, $item_std); ?>
                        </div>


                        <!-- New | Wrap -->
                        <div id="mfn-wraps" class="clearfix">
                            <?php mfn_builder_wrap($wrap = false, $wrap_id = false, $parent_id = false, $item_std); ?>
                        </div>


                        <!-- New | Items -->
                        <div id="mfn-items" class="clearfix">
                            <?php
                            $items = $item_std; //mfn_get_fields_item();
                            foreach ($items as $item) {
                                mfn_builder_item($item['type']);
                                echo "\n";
                            }
                            ?>
                        </div>


                        <!-- Popup | Add Item -->
                        <div id="mfn-item-add" class="mfn-popup mfn-popup-item-add">
                            <div class="mfn-popup-inside">

                                <div class="mfn-popup-header">

                                    <div class="mfn-ph-left">
                                        <span class="mfn-ph-btn mfn-ph-desc">Add Item</span>
                                    </div>

                                    <div class="mfn-ph-right">
                                        <a class="mfn-ph-btn mfn-ph-close dashicons dashicons-no" title="Close" href="javascript:void(0);"></a>
                                    </div>

                                </div>

                                <div class="mfn-popup-content">

                                    <div class="mfn-popup-subheader">

                                        <ul class="mfn-popup-tabs">
                                            <li data-filter="*" class="active"><a href="javascript:void(0);">All</a></li>
                                            <li data-filter="typography"><a href="javascript:void(0);">Typography</a></li>
                                            <li data-filter="boxes"><a href="javascript:void(0);">Boxes & Infographics</a></li>
                                            <li data-filter="blocks"><a href="javascript:void(0);">Content Blocks</a></li>
                                            <li data-filter="elements"><a href="javascript:void(0);">Content Elements</a></li>
                                            <li data-filter="loops"><a href="javascript:void(0);">Loops</a></li>
                                            <li data-filter="other"><a href="javascript:void(0);">Other</a></li>
                                        </ul>

                                        <div class="mfn-popup-search">
                                            <span class="dashicons dashicons-search"></span>
                                            <input class="mfn-search-item" placeholder="Search Item"/>
                                        </div>

                                    </div>

                                    <ul class="mfn-popup-items clear">
                                        <?php
                                        $items = $item_std;  //mfn_get_fields_item();
                                        foreach ($items as $item) {
                                            $category = isset($item['cat']) ? 'category-' . $item['cat'] : '';

                                            echo '<li class="mfn-item-' . $item['type'] . ' ' . $category . '" data-type="' . $item['type'] . '">';
                                            echo '<a data-type="' . $item['type'] . '" href="javascript:void(0);">';
                                            echo '<span class="title">' . $item['title'] . '</span>';
                                            echo '<div class="mfn-item-icon"></div>';
                                            echo '</a>';
                                            echo '</li>';
                                        }
                                        ?>
                                    </ul>

                                </div>

                            </div>
                        </div>


                        <!-- Migrate -->
                        <div id="mfn-migrate">

                            <div class="btn-wrapper">
                                <a href="javascript:void(0);" class="mfn-btn-migrate btn-exp">Export</a>
                                <a href="javascript:void(0);" class="mfn-btn-migrate btn-imp">Import</a>
                                <a href="javascript:void(0);" class="mfn-btn-migrate btn-tem btn-primary">Templates</a>
                            </div>
                            <div class="migrate-wrapper export-wrapper hide">
                                <textarea id="mfn-items-export" placeholder="Please remember to Publish/Update your post before Export."><?php echo $mfn_items_serial; ?></textarea>
                                <span class="description">Copy to clipboard: Ctrl+C (Cmd+C for Mac)span>
                            </div>

                            <div class="migrate-wrapper import-wrapper hide">
                                <textarea id="mfn-items-import" placeholder="Paste import data here."></textarea>
                                <a href="javascript:void(0);" class="mfn-btn-migrate btn-primary btn-import">Import</a>
                                <select name="mfn-items-import-type">
                                    <option value="before">Insert BEFORE current builder content</option>
                                    <option value="after">Insert AFTER current builder content</option>
                                    <option value="replace">REPLACE current builder content</option>
                                </select>
                            </div>

                            <div class="migrate-wrapper templates-wrapper hide">
                                <a href="javascript:void(0);" class="mfn-btn-migrate btn-primary btn-template">Use Template</a>
                                <select name="mfn-items-import-template-type">
                                    <option value="before">Insert BEFORE current builder content</option>
                                    <option value="after">Insert AFTER current builder content</option>
                                    <option value="replace">REPLACE current builder content</option>
                                </select>
                                <select id="mfn-items-import-template">
                                    <option value="">-- Select --</option>
                                    <?php
                                    $sql3111    = "SELECT distinct conf_id, conf_title FROM " . $xoopsDB->prefix("config_theme") . " WHERE conf_name = 'layoutbuilder' ORDER BY conf_id ASC";
                                    $result3111 = $xoopsDB->query($sql3111);
                                    $templates  = [];
                                    while ([$conf_id, $conf_title] = $xoopsDB->fetchRow($result3111)) {
                                        $template['conf_id']    = $conf_id;
                                        $template['conf_title'] = $conf_title;
                                        $templates[]            = $template;
                                    }

                                    if (is_array($templates)) {
                                        foreach ($templates as $v) {
                                            echo '<option value="' . $v['conf_id'] . '">' . $v['conf_title'] . '</options>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>


                    </div>

                    <input type="hidden" id="mfn-row-id" value="<?php echo $section_id; ?>"/>
                    <input type="hidden" id="mfn-wrap-id" value="<?php echo $wrap_id; ?>"/>

                </div>
                <?php
                if ($form == 'pagebuilder') {
                    if ($pageid == 'add') {
                        $ous = '<input name="' . $form . '_Import" onclick="location = \'admin.php?fct=themebuilder1&op=importer&importerid=page\'" type="button" value="' . $form . '_Import" />';
                    } else {
                        $ous = '<input name="' . $form . '_Export" onclick="location = \'admin.php?fct=themebuilder1&op=exporter&exporterid=page&pageid=' . $pageid . '\'" type="button" value="' . $form . '_Export" />
					<input name="' . $form . '_Import" onclick="location = \'admin.php?fct=themebuilder1&op=importer&importerid=page\'" type="button" value="' . $form . '_Import" />';
                    }
                } else {
                    $ous = '<input name="' . $form . '_Export" onclick="location = \'admin.php?fct=themebuilder1&op=exporter&exporterid=template&templateid=' . $form . '\'" type="button" value="' . $form . '_Export" />
				<input name="' . $form . '_Import" onclick="location = \'admin.php?fct=themebuilder1&op=importer&importerid=template&templateid="' . $form . '"\'" type="button" value="' . $form . '_Import" />';
                } ?>
                <div>
                    <input type="submit" name="admin" id="admin" onclick="disableBeforeUnload()" value="<?php echo $form; ?>_Update"/>
                    <input name="<?php echo $form; ?>_Reset" onclick="location = \'admin.php?fct=themebuilder1&op=templetebuilder&templatedelid=<?php echo $form; ?>\'" type="button" value="<?php echo $form; ?>_Reset"/>
                    <?php echo $ous; ?>
                </div>
            </form>
        </div>
        <?php
    }
}

if (!function_exists('mfn_builder_print')) {
    /**
     * PRINT Builder
     *
     * @param int  $post_id
     * @param bool $content_field
     */
    function mfn_builder_print($mfn_items, $content_field = false)
    {
        // Sizes for Items
        $classes = [
            'divider' => 'divider',
            '1/6'     => 'one-sixth',
            '1/5'     => 'one-fifth',
            '1/4'     => 'one-fourth',
            '1/3'     => 'one-third',
            '2/5'     => 'two-fifth',
            '1/2'     => 'one-second',
            '3/5'     => 'three-fifth',
            '2/3'     => 'two-third',
            '3/4'     => 'three-fourth',
            '4/5'     => 'four-fifth',
            '5/6'     => 'five-sixth',
            '1/1'     => 'one',
        ];
        $output  = '';

        // Sidebars list
        //$sidebars = mfn_opts_get( 'sidebars' );

        // $mfn_items | Wraps with Items => Sections ------------------------------------

        //$mfn_items = get_post_meta( $post_id, 'mfn-page-items', true );

        // FIX | Builder 2.0 Compatibility

        if ($mfn_items && !is_array($mfn_items)) {
            $mfn_items = unserialize(call_user_func('base' . '64_decode', $mfn_items));
        }

        // WordPress Editor Content ---------------------------------
        //if( mfn_opts_get('display-order') == 1 ) mfn_builder_print_content( $post_id, $content_field );

        // Content Builder -------------------------------------

        /*if( post_password_required( ) ){

			// prevents duplication of the password form
			if( get_post_meta( $post_id, 'mfn-post-hide-content', true ) ){
				echo '<div class="section the_content">';
					echo '<div class="section_wrapper">';
						echo '<div class="the_content_wrapper">';
							echo get_the_password_form( );
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}

		} else*/
        if (is_array($mfn_items)) {
            //include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/include/fonctions.php';
            include(XOOPS_ROOT_PATH . "/themes/themebuilder1/include/configuration.inc.php");
            include(XOOPS_ROOT_PATH . "/themes/themebuilder1/include/theme-shortcodes.php");
            include(XOOPS_ROOT_PATH . "/themes/themebuilder1/include/front.php");

            // Sections
            foreach ($mfn_items as $section) {
                // 				print_r($section['attr']);

                // Hide
                if ($_GET && key_exists('mfn-show', $_GET)) {
                    // do nothing
                } elseif (key_exists('hide', $section['attr']) && $section['attr']['hide']) {
                    continue;
                }

                // section attributes -----------------------------------

                // classes ------------------------
                $section_class = [];

                $section_class[] = $section['attr']['style'];
                $section_class[] = $section['attr']['class'];

                if (key_exists('visibility', $section['attr'])) {
                    $section_class[] = $section['attr']['visibility'];
                }
                if (key_exists('bg_video_mp4', $section['attr']) && $section['attr']['bg_video_mp4']) {
                    $section_class[] = 'has-video';
                }
                if (key_exists('navigation', $section['attr']) && $section['attr']['navigation']) {
                    $section_class[] = 'has-navi';
                }

                if (isset($section['attr']['bg_size']) && ($section['attr']['bg_size'] != 'auto')) {
                    $section_class[] = 'bg-' . $section['attr']['bg_size'];
                }

                $section_class = implode(' ', $section_class);

                // styles -----------------------------------------------------

                $section_style = $section_bg = [];

                $section_style[] = 'padding-top:' . intval($section['attr']['padding_top']) . 'px';
                $section_style[] = 'padding-bottom:' . intval($section['attr']['padding_bottom']) . 'px';
                $section_style[] = 'background-color:' . $section['attr']['bg_color'];

                // background image attributes ------------

                if ($section['attr']['bg_image']) {
                    $section_bg_attr = explode(';', (string) $section['attr']['bg_position']);

                    $section_bg['image'] = 'background-image:url(' . $section['attr']['bg_image'] . ')';

                    $section_bg['repeat']      = 'background-repeat:' . $section_bg_attr[0];
                    $section_bg['position']    = 'background-position:' . $section_bg_attr[1];
                    $section_bg['attachment']  = 'background-attachment:' . $section_bg_attr[2];
                    $section_bg['size']        = 'background-size:' . $section_bg_attr[3];
                    $section_bg['webkit-size'] = '-webkit-background-size:' . $section_bg_attr[3];
                }

                // parallax -------------------------------

                $parallax = false;
                if ($section['attr']['bg_image'] && ($section_bg_attr[2] == 'fixed')) {
                    if (!key_exists(4, $section_bg_attr) || $section_bg_attr[4] != 'still') {
                        // Parallax

                        //$parallax = mfn_parallax_data();

                        //if( mfn_parallax_plugin() == 'translate3d' ){
                        //if( mfn_is_mobile() ){
                        //$section_bg['attachment'] = 'background-attachment:scroll';
                        //} else {
                        $section_bg = [];
                        //}
                        //}

                    } else {
                        // Fixed | Cover
                        $section_class .= ' bg-cover';
                    }
                }

                $section_style = array_merge($section_style, $section_bg);
                $section_style = implode('; ', $section_style);

                // IDs --------------------------------------------------------

                if (key_exists('section_id', $section['attr']) && $section['attr']['section_id']) {
                    $section_id = 'id="' . $section['attr']['section_id'] . '"';
                } else {
                    $section_id = false;
                }

                // print ------------------------------------------------

                $output .= '<div class="section mcb-section ' . $section_class . '" ' . $section_id . ' style="' . $section_style . '" ' . $parallax . '>'; // 100%

                // parallax | translate3d -------
                //if( ! mfn_is_mobile() && $parallax && mfn_parallax_plugin() == 'translate3d' ){
                $output .= '<img class="mfn-parallax" src="' . $section['attr']['bg_image'] . '" alt="" style="opacity:0" />';
                //}

                // video ----------
                if (key_exists('bg_video_mp4', $section['attr']) && $mp4 = $section['attr']['bg_video_mp4']) {
                    $output .= '<div class="section_video">';

                    $output .= '<div class="mask"></div>';

                    $poster = $section['attr']['bg_image'];

                    $output .= '<video poster="' . $poster . '" autoplay="true" loop="true" muted="muted">';

                    $output .= '<source type="video/mp4" src="' . $mp4 . '" />';
                    if (key_exists('bg_video_ogv', $section['attr']) && $ogv = $section['attr']['bg_video_ogv']) {
                        $output .= '<source type="video/ogg" src="' . $ogv . '" />';
                    }

                    $output .= '</video>';

                    $output .= '</div>';
                }

                // Decoration SVG  ------------------------
                if (key_exists('divider', $section['attr']) && $divider = $section['attr']['divider']) {
                    $output .= '<div class="section-divider ' . $divider . '"></div>';
                }

                // Decoration Image Top  ------------------------
                if (key_exists('decor_top', $section['attr']) && $decor_top = $section['attr']['decor_top']) {
                    $output .= '<div class="section-decoration top" style="background-image:url(' . $decor_top . ');height:px"></div>';
                }

                // Navigation ------------------------
                if (key_exists('navigation', $section['attr']) && $section['attr']['navigation']) {
                    $output .= '<div class="section-nav prev"><i class="icon-up-open-big"></i></div>';
                    $output .= '<div class="section-nav next"><i class="icon-down-open-big"></i></div>';
                }

                $output .= '<div class="section_wrapper mcb-section-inner">'; // WIDTH + margin: 0 auto

                // Wraps --------------------------------------------------------

                // FIX | 2.0 Compatibility
                if (!key_exists('wraps', $section) && is_array($section['items'])) {
                    $fix_wrap = [
                        'size'  => '1/1',
                        'items' => $section['items'],
                    ];

                    $section['wraps'] = [$fix_wrap];
                }

                if (key_exists('wraps', $section) && is_array($section['wraps'])) {
                    foreach ($section['wraps'] as $wrap) {
                        $wrap_class = [];

                        // size of wrap
                        $wrap_class[] = $classes[$wrap['size']];

                        // Wrap | Attributes --------------------------

                        // Wrap | Classes -------------------

                        if (key_exists('attr', $wrap)) {
                            $wrap_class[] = $wrap['attr']['class'];

                            // Wrap Items | column margin
                            if ($wrap['attr']['column_margin']) {
                                $wrap_class[] = 'column-margin-' . $wrap['attr']['column_margin'];
                            }

                            // Wrap Items | vertical align
                            if (isset($wrap['attr']['vertical_align'])) {
                                $wrap_class[] = 'valign-' . $wrap['attr']['vertical_align'];
                            }

                            // Wrap | Background size
                            if (isset($wrap['attr']['bg_size']) && ($wrap['attr']['bg_size'] != 'auto')) {
                                $wrap_class[] = 'bg-' . $wrap['attr']['bg_size'];
                            }
                        }

                        // Wrap | Styles -------------------

                        $wrap_style = $wrap_bg = [];
                        $wrap_data  = [];
                        $parallax   = false;

                        if (key_exists('attr', $wrap)) {
                            if ($wrap['attr']['padding']) {
                                $wrap_style[] = 'padding:' . $wrap['attr']['padding'];
                            }
                            if ($wrap['attr']['bg_color']) {
                                $wrap_style[] = 'background-color:' . $wrap['attr']['bg_color'];
                            }

                            // move up -------

                            if (key_exists('move_up', $wrap['attr']) && $wrap['attr']['move_up']) {
                                $wrap_class[] = 'move-up';
                                $wrap_style[] = 'margin-top:-' . intval($wrap['attr']['move_up']) . 'px';
                                /*if( $moveup = mfn_opts_get( 'builder-wrap-moveup' ) ){
											if( 'no-tablet' == $moveup ){
												$wrap_data[] = 'data-tablet="no-up"';
											}
											$wrap_data[] = 'data-mobile="no-up"';
										}*/
                            }

                            // background image attributes

                            if ($wrap['attr']['bg_image']) {
                                $wrap_bg_attr = explode(';', (string) $wrap['attr']['bg_position']);

                                $wrap_bg[] = 'background-image:url(' . $wrap['attr']['bg_image'] . ')';

                                $wrap_bg[] = 'background-repeat:' . $wrap_bg_attr[0];
                                $wrap_bg[] = 'background-position:' . $wrap_bg_attr[1];
                                $wrap_bg[] = 'background-attachment:' . $wrap_bg_attr[2];
                                $wrap_bg[] = 'background-size:' . $wrap_bg_attr[3];
                                $wrap_bg[] = '-webkit-background-size:' . $wrap_bg_attr[3];
                            }

                            // parallax -------------------------

                            if ($wrap['attr']['bg_image'] && ($wrap_bg_attr[2] == 'fixed')) {
                                if (!key_exists(4, $wrap_bg_attr) || $wrap_bg_attr[4] != 'still') {
                                    $parallax = mfn_parallax_data();

                                    if (mfn_parallax_plugin() == 'translate3d') {
                                        if (mfn_is_mobile()) {
                                            $wrap_bg['attachment'] = 'background-attachment:scroll';
                                        } else {
                                            $wrap_bg = [];
                                        }
                                    }
                                }
                            }
                        }

                        $wrap_class = implode(' ', $wrap_class);

                        $wrap_style = array_merge($wrap_style, $wrap_bg);
                        $wrap_style = implode('; ', $wrap_style);

                        $wrap_data = implode(' ', $wrap_data);

                        // Wrap | Print -------------------------------

                        $output .= '<div class="wrap mcb-wrap ' . $wrap_class . ' clearfix" style="' . $wrap_style . '" ' . $parallax . ' ' . $wrap_data . '>';

                        // parallax | translate3d -------
                        //if( ! mfn_is_mobile() && $parallax && mfn_parallax_plugin() == 'translate3d' ){
                        $output .= '<img class="mfn-parallax" src="' . $wrap['attr']['bg_image'] . '" alt="" style="opacity:0" />';
                        //}

                        $output .= '<div class="mcb-wrap-inner">';

                        // Items --------------------------------------------

                        if (is_array($wrap['items'])) {
                            foreach ($wrap['items'] as $item) {
                                if (function_exists('mfn_print_' . $item['type'])) {
                                    // Item | Size
                                    $class = $classes[$item['size']];

                                    // Item | Type
                                    $class .= ' column_' . $item['type'];

                                    // Item | Custom Classes
                                    if (isset($item['fields']['classes'])) {
                                        $class .= ' ' . $item['fields']['classes'];
                                    }

                                    // Column | Margin Bottom
                                    if ($item['type'] == 'column' && (!empty($item['fields']['margin_bottom']))) {
                                        $class .= ' column-margin-' . $item['fields']['margin_bottom'];
                                    }

                                    // Print
                                    $output .= '<div class="column mcb-column ' . $class . '">';
                                    $output .= call_user_func('mfn_print_' . $item['type'], $item);
                                    $output .= '</div>';
                                } else {
                                    $output .= 'nooooooooo';
                                }
                            }
                        } else {
                            $output .= 'mmmmmmm';
                        }

                        $output .= '</div>';

                        $output .= '</div>';
                    }
                }

                $output .= '</div>';

                // Decoration Image Bottom  ------------------------
                if (key_exists('decor_bottom', $section['attr']) && $decor_bottom = $section['attr']['decor_bottom']) {
                    $output .= '<div class="section-decoration bottom" style="background-image:url(' . $decor_bottom . ');height:' . mfn_get_attachment_data($decor_bottom, 'height') . 'px"></div>';
                }

                $output .= '</div>';
            }
        }

        $olives = $output;
        return $olives;
    }
}

if (!function_exists('mfn_builder_insert')) {
    function mfn_builder_insert($form, $pageid, $new, $olives)
    {
        global $xoopsDB;
        if ($form == 'pagebuilder' || $form == 'layoutbuilder') {
            if ($pageid == false) {
                $vowels                  = [" ", "  "];
                $_POST['mfn-item-titre'] = str_replace($vowels, "-", (string) $_POST['mfn-item-titre']);
                //var_dump($pageid);
                $titleexist  = " SELECT conf_name FROM " . $xoopsDB->prefix('config_theme') . " WHERE conf_name = '" . $form . "' AND conf_title = '" . $_POST['mfn-item-titre'] . "'";
                $resultexist = $xoopsDB->query($titleexist);
                $filecount   = $xoopsDB->getRowsNum($resultexist);
                if ($filecount == 0) {
                    $sqltemplate = "INSERT INTO " . $xoopsDB->prefix('config_theme') . " (conf_id, conf_name, conf_value, conf_title, conf_desc, conf_modid) VALUES ('', '" . $form . "', '" . $new . "', '" . $_POST['mfn-item-titre'] . "', '" . $olives . "', '" . $_POST['selection'] . "')";
                    if ($resulttemplate = $xoopsDB->queryF($sqltemplate)) {
                        if ($form == 'pagebuilder') {
                            if (empty($pageid)) {
                                $pageid = $xoopsDB->getInsertId();
                            }
                            include_once XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/classhtaccess.php';
                            if ($_POST['selection'] == 1) {
                                $rule = "";
                            } elseif ($_POST['selection'] == 2) {
                                $rule = "RewriteRule ^test/" . $pageid . "/?$ page.php?op=" . $pageid . " [L]";
                            } elseif ($_POST['selection'] == 3) {
                                $rule = "RewriteRule ^test/" . $_POST['mfn-item-titre'] . "/?$ page.php?op=" . $pageid . " [L]";
                            }
                            //$rule = "RewriteRule ^test/".$pageid."/?$ page1.php?op=".$pageid." [L]";
                            //$rule = "RewriteRule ^test/".$_POST['mfn-item-titre']."/?$ page1.php?op=".$pageid." [L]";
                            $ht       = new RMHtaccess('page: ' . $pageid);
                            $htResult = $ht->removeRule();
                            $ht->write($rule);
                            //echo 'insert page '.$form;
                            $message = 'page created  -' . $pageid . $_POST['mfn-item-titre'];
                            redirect_header("admin.php?fct=themebuilder1&op=pagebuilder", 5, $message);
                            exit();
                        } else {
                            $message = 'layout created  -' . $pageid . $_POST['mfn-item-titre'];
                            redirect_header("admin.php?fct=themebuilder1&op=layoutbuilder", 5, $message);
                            exit();
                        }
                    } else {
                        $message = 'probleme insert page ' . $form;
                        redirect_header("admin.php?fct=themebuilder1&op=" . $form, 5, $message);
                        exit();
                    }
                } else {
                    $message = 'page exist ' . $pageid . $_POST['mfn-item-titre'];
                    redirect_header("admin.php?fct=themebuilder1&op=pagebuilder", 5, $message);
                    exit();
                }
            } else {
                echo 'updateeeeeeeeeeeeeee';
                $vowels = [" ", "  "];
                if ($form == 'layoutbuilder') {
                    $_POST['selection'] = '';
                }
                $_POST['mfn-item-titre'] = str_replace($vowels, "-", (string) $_POST['mfn-item-titre']);
                $sqlr                    = "UPDATE " . $xoopsDB->prefix('config_theme') . " SET conf_modid = '" . $_POST['selection'] . "', conf_title = '" . $_POST['mfn-item-titre'] . "', conf_value = '" . $new . "', conf_desc = '" . addslashes((string) $olives) . "' WHERE conf_id = '" . $pageid . "'";
                if ($resultr = $xoopsDB->queryF($sqlr)) {
                    if ($form == 'pagebuilder') {
                        include_once XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/classhtaccess.php';
                        if ($_POST['selection'] == 1) {
                            $rule = "";
                        } elseif ($_POST['selection'] == 2) {
                            $rule = "RewriteRule ^test/" . $pageid . "/?$ page.php?op=" . $pageid . " [L]";
                        } elseif ($_POST['selection'] == 3) {
                            $rule = "RewriteRule ^test/" . $_POST['mfn-item-titre'] . "/?$ page.php?op=" . $pageid . " [L]";
                        }
                        //$rule = "RewriteRule ^test/".$pageid."/?$ page1.php?op=".$pageid." [L]";
                        //$rule = "RewriteRule ^test/".$_POST['mfn-item-titre']."/?$ page1.php?op=".$pageid." [L]";
                        $ht = new RMHtaccess('page: ' . $pageid);
                        //$ht->checkHealth($rule);
                        $htResult = $ht->removeRule();
                        $ht->write($rule);

                        $message = "RewriteRule ok/ " . $_POST['mfn-item-titre'] . " " . $form . "=" . $pageid . " modifé";
                        //echo $pageid;
                        redirect_header("admin.php?fct=themebuilder1&op=pagebuilder", 5, $message);
                        exit();
                    } else {
                        $message = "ok/ " . $_POST['mfn-item-titre'] . " " . $form . "=" . $pageid . " modifié";
                        //echo $pageid;
                        redirect_header("admin.php?fct=themebuilder1&op=" . $form, 5, $message);
                        exit();
                    }
                } else {
                    $message = "Probleme modification " . $form . "";
                    //echo $message;
                    redirect_header("admin.php?fct=themebuilder1&op=pagebuilder", 5, $message);
                    exit();
                }
            }
        } else {
            $titleexist  = " SELECT conf_name FROM " . $xoopsDB->prefix('config_theme') . " WHERE conf_name = '" . $form . "'";
            $resultexist = $xoopsDB->query($titleexist);
            $filecount   = $xoopsDB->getRowsNum($resultexist);

            if ($filecount == 0) {
                echo 'insert template ' . $form;
                $sqltemplate = "INSERT INTO " . $xoopsDB->prefix('config_theme') . " (conf_id, conf_name, conf_value) VALUES ('', '" . $form . "', '$new')";
                if ($resulttemplate = $xoopsDB->queryF($sqltemplate)) {
                    $message = 'insert template ' . $form;
                } else {
                    $message = 'probleme insert template ' . $form;
                }
                redirect_header("admin.php?fct=themebuilder1&op=ThemeBuilder", 5, $message);
                exit();
            } else {
                $message     = 'update template ' . $form;
                $sqltemplate = "UPDATE " . $xoopsDB->prefix('config_theme') . " SET conf_value = '" . $new . "' WHERE conf_name = '" . $form . "'";
                if ($resulttemplate = $xoopsDB->queryF($sqltemplate)) {
                    $src1  = __DIR__;
                    $dst11 = str_replace('modules\system\admin\themebuilder1\builder', 'themes\themebuilder1', $src1);
                    $dst1  = $dst11;
                    echo '<br>' . $src1;
                    echo '<br>' . $dst1;
                    if (!is_dir($dst1)) {
                        $message .= ' Folder themebuilder not exist in theme folder you must reinstall themebuilder from admin';
                    } else { //echo '       folder exist';
                        if (file_exists($dst1 . '\theme.html')) {
                            $local         = dirname((string) $_SERVER['PHP_SELF']);
                            $location      = str_replace('modules/system', '', $local);
                            $include_theme = '';
                            $assign_theme  = '';
                            $sqlyy         = "SELECT * FROM " . $xoopsDB->prefix("modules") . " WHERE name != ''";
                            $resultyy      = $xoopsDB->query($sqlyy);
                            while ($myrowy = $xoopsDB->fetchArray($resultyy)) {
                                $assign_theme .= '';
                                $variable1    = $myrowy['dirname'];
                                if ($variable1 == 'protector') {
                                    continue;
                                }
                                if ($variable1 == 'system') {
                                    //continue;
                                    $assign_theme  .= '<{assign var=theme_name value=$xoTheme->folderName}>' . "\n";
                                    $assign_theme  .= '<{assign var=' . $variable1 . '_template_tpl value="./themes/$theme_name/builder_tpl/' . $variable1 . '_homepage_tpl.html"}>' . "\n";
                                    $assign_theme  .= '<{assign var=default_template_tpl value="./themes/$theme_name/builder_tpl/default_template_tpl.html"}>' . "\n";
                                    $assign_theme  .= '<{assign var=default_template_tpl1 value="../../themes/$theme_name/builder_tpl/default_template_tpl.html"}>' . "\n";
                                    $include_theme .= '<{ if $xoops_dirname=="system" && file_exists($' . $variable1 . '_template_tpl) }>' . "\n";
                                    $include_theme .= '	<{if $xoops_requesturi == "' . $location . 'index.php" or $xoops_requesturi == "' . $location . '" }>' . "\n";
                                    $include_theme .= '		<{includeq file="$theme_name/builder_tpl/system_homepage_tpl.html"}>' . "\n";
                                    $include_theme .= '	<{else}>' . "\n";
                                    $include_theme .= '		<{ if file_exists($default_template_tpl) }>' . "\n";
                                    $include_theme .= '			<{includeq file="$theme_name/builder_tpl/default_template_tpl.html"}>' . "\n";
                                    $include_theme .= '		<{else}>' . "\n";
                                    $include_theme .= '			theme builder est votre theme par defaut oups' . "\n";
                                    $include_theme .= '		<{/if}>' . "\n";
                                    $include_theme .= '	<{/if}>' . "\n";
                                } else {
                                    $assign_theme  .= '<{assign var="' . $variable1 . '_template_tpl" value="../../themes/$theme_name/builder_tpl/' . $variable1 . '_template_tpl.html"}>' . "\n";
                                    $include_theme .= '<{ elseif $xoops_dirname=="' . $variable1 . '" && file_exists($' . $variable1 . '_template_tpl)}>' . "\n";
                                    $include_theme .= '	<{includeq file="$theme_name/builder_tpl/' . $variable1 . '_template_tpl.html"}>' . "\n";
                                }
                            }
                            $include_theme .= '<{else}>' . "\n";
                            $include_theme .= '		<{ if file_exists($default_template_tpl) }>' . "\n";
                            $include_theme .= '			<{includeq file="$theme_name/builder_tpl/default_template_tpl.html"}>' . "\n";
                            $include_theme .= '		<{ elseif file_exists($default_template_tpl1) }>' . "\n";
                            $include_theme .= '			<{includeq file="$theme_name/builder_tpl/default_template_tpl.html"}>' . "\n";
                            $include_theme .= '		<{else}>' . "\n";
                            $include_theme .= '			theme builder est votre theme par defaut' . "\n";
                            $include_theme .= '		<{/if}>' . "\n";
                            $include_theme .= '<{/if}>' . "\n";

                            $tot = $assign_theme;
                            $tot .= $include_theme;

                            //update theme.html
                            $theme_htmlstandard_generated = $dst1 . '\theme.html';
                            $r                            = @fopen($theme_htmlstandard_generated, 'w+');
                            if ($r) {
                                @fputs($r, $tot . "\n");
                                $message .= ' <br>theme.html est a jour';
                                @fclose($r);
                            } else {
                                $message .= ' <br>probleme avec fopen theme.html';
                            }
                        }

                        $fichierthemehtmlamodifier = $dst1 . '\builder_tpl\\' . $form . '_tpl.html';
                        $f                         = @fopen($fichierthemehtmlamodifier, 'w+');
                        $flag                      = false;
                        if ($f) {
                            @fputs($f, $olives . "\n");

                            $message .= ' <br>' . $form . '_tpl.html est a jour';
                            $flag    = true;

                            @fclose($f);
                        } else {
                            $message .= ' <br>probleme avec fopen ' . $form . '_tpl.html';
                        }
                        if ($flag = true) {
                            function del_folder_add_index($folder)
                            { //$folder=Path to folder
                                //$dir = @opendir($folder) or die("<br />erreur d'ouverture du repertoire $folder");
                                //$dir = opendir($folder); //@ pour eviter les messages d erreur de opendir
                                if ($dir = @opendir($folder)) {
                                    while ($file = readdir($dir)) {
                                        if (($file != '.') && ($file != '..') && ($file != 'index.html')) {
                                            if (is_file($folder . $file)) {
                                                del_folder_add_index($folder . $file);
                                            }
                                            unlink($folder . $file);
                                            //echo $folder.$file.'<br>';
                                        }
                                    }
                                    closedir($dir);
                                } else {
                                    $message .= XOOPS_VAR_PATH . 'probleme avec opendir';
                                }
                            }

                            del_folder_add_index(XOOPS_VAR_PATH . "/caches/smarty_compile/");
                            $message .= ' <br>smarty_compile cache is deleted';
                        }
                    }    //fin if folder exist;
                    $message .= ' <br>template enregistre avec succes';
                } else {
                    $message .= ' probleme update';
                }
                //redirect at the end at the same page
                redirect_header("admin.php?fct=themebuilder1&op=ThemeBuilder&action=modpagebuilderwrap&pageid=" . $form . "", 5, $message);
                exit();
                //echo $message;

            }    // fin if ($filecount == 0) {

        }
    }
}

if (!function_exists('mfn_builder_print_html')) {
    function mfn_builder_print_html($mfn_items)
    {
        $html = '';
        $html .= '<!doctype html>
<{include_php file="file:$xoops_rootpath/themes/$xoops_theme/include/configuration.inc.php"}>
<html lang="<{$xoops_langcode}>">
<head>
<{assign var=theme_name value=$xoTheme->folderName}>
<meta charset="<{$xoops_charset}>">
<meta name="keywords" content="<{$xoops_meta_keywords}>">
<meta name="description" content="<{$xoops_meta_description}>">
<meta name="robots" content="<{$xoops_meta_robots}>">
<meta name="rating" content="<{$xoops_meta_rating}>">
<meta name="author" content="<{$xoops_meta_author}>">
<meta name="generator" content="XOOPS">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<{if $facebook_og_enabled == "1"}>
	<!-- Facebook graph -->
	<meta property="og:image" content=""/>
	<meta property="og:title" content=""/>
	<meta property="og:type" content="article"/>
	<meta property="og:description" content="<{$xoops_meta_description}> <{$xoops_meta_keywords}>"/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="fb:admins" content="<{$facebook_og_admins}>"/>
	<meta property="fb:app_id" content="<{$facebook_og_app_id}>"/>
<{/if}>

<!-- Favicon -->
<link rel="shortcut icon" type="image/ico" href="<{$favicon}>" />
<link rel="icon" type="image/png" href="<{$favico_img}>" />

<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/xoops.css">
<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/reset.css">
<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/codes.css">
<link rel="stylesheet" type="text/css" media="all" href="<{$xoops_themecss}>">
<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/icomoon.css">
<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/megamenu.css">

<script src="<{xoImgUrl}>js/jquery-1.10.2.js"></script>
<script src="<{xoImgUrl}>js/bootstrap.min.js"></script>

<link rel="stylesheet" id="animations-css"  href="<{xoImgUrl}>css/animations.css" type="text/css" media="all" />
<script src="<{xoImgUrl}>js/appear.min.js"></script>
<script src="<{xoImgUrl}>js/animations.js"></script>

<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <script src="<{xoImgUrl}>js/selectivizr-min.js"></script>
<![endif]-->
<script src="<{xoImgUrl}>js/js.js"></script>
<script src="<{xoImgUrl}>js/megamenu.js"></script>
<link rel="alternate" type="application/rss+xml" title="" href="<{xoAppUrl backend.php}>">

<title><{if $xoops_dirname == "system"}><{$xoops_sitename}><{if $xoops_pagetitle !=""}> - <{$xoops_pagetitle}><{/if}><{else}><{if $xoops_pagetitle !=""}><{$xoops_pagetitle}> - <{$xoops_sitename}><{/if}><{/if}></title>

<{$xoops_module_header}>
<script src="<{xoImgUrl}>js/theia-sticky-sidebar.js">  </script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".column_Blockcolumn").theiaStickySidebar({
			additionalMarginTop: 50
		});
	});
</script>

    <!-- Sheet CssEXTRA -->
<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<{xoImgUrl themes/themebuilder1/include/custom-css.php}>" />
	<!-- Sheet CssEXTRA -->
<link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<{xoImgUrl themes/themebuilder1/include/widget-css.css}>" />
<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/base.css">
<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/layout.css">
<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/shortcodes.css">

<{if $preloader == "1"}>
	<{$preloadercode}>
<{/if}>
<{if $nicescrollactive == "1"}>
	<{$nicescroll}>
<{/if}>
<{if $scrolltopactive == "1"}>
	<{$scrolltop}>
<{/if}>

<{$css}>
<{$jsheader}>
<{$tttt}>
</head>';

        $html .= '<body id="<{$xoops_dirname}>" class="<{$layout}>">' . "\n";
        $html .= '	<div class="container maincontainer">' . "\n";
        $html .= '
	<{if $scrolltopactive == "1"}>
		<p id="back-top">
			<a href="#top">
				<span class="fa-stack">
				<i class="im-icon-home-2"></i>
				</span>Back to Top
			</a>
		</p>
	<{/if}>';
        $html .= '
	<div class="row">' . "\n";//supprimer pour le 100%widht
        $html .= '';
        $html .= mfn_builder_print($mfn_items) . "\n";
        $html .= '</div>' . "\n";
        $html .= '</div>' . "\n";
        $html .= $iii . "\n";
        $html .= '<{$jsbody}>' . "\n";
        $html .= '</body>' . "\n";
        $html .= '</html>' . "\n";
        return $html;
    }
}

if (!function_exists('mfn_builder_print_smarty')) {
    function mfn_builder_print_smarty($mfn_items)
    {
        $html1 = '<{include_php file="file:$xoops_rootpath/themes/$xoops_theme/include/configuration.inc.php"}>' . "\n";
        $html1 .= '<{include_php file="file:$xoops_rootpath/themes/$xoops_theme/include/theme-shortcodes.php"}>' . "\n";
        $html1 .= '<{include_php file="file:$xoops_rootpath/themes/$xoops_theme/include/front.php"}>' . "\n";
        //$html1 .= '<{include_php file="file:$xoops_rootpath/themes/$xoops_theme/include/header.php"}>' . "\n";
        $html1 .= '<{include_php file="file:$xoops_rootpath/themes/$xoops_theme/include/header/header.php"}>' . "\n";
        $html1 .= '<{$mfn_builder_print}>' . "\n";
        $html1 .= '<{include_php file="file:$xoops_rootpath/themes/$xoops_theme/include/footer.php"}>' . "\n";

        return $html1;
    }
}

if (!function_exists('slash')) {
    function slash($value)
    {
        if (is_array($value)) {
            foreach ($value as $k => $v) {
                if (is_array($v)) {
                    $value[$k] = slash($v);
                } else {
                    $value[$k] = addslashes((string) $v);
                }
            }
        } else {
            $value = addslashes((string) $value);
        }

        return $value;
    }
}

if (!function_exists('mfn_builder_save')) {
    /**
     * SAVE theme Builder
     *
     * @param int $post_id
     */
    function mfn_builder_save($form, $pageid)
    {
        global $xoopsDB;

        //print_r($_POST);
        // exit;

        $mfn_items = [];
        $mfn_wraps = [];

        // Sections ---------------------------------------------------------------------

        if (key_exists('mfn-row-id', $_POST) && is_array($_POST['mfn-row-id'])) {
            foreach ($_POST['mfn-row-id'] as $sectionID_k => $sectionID) {
                $section = [];

                // $section['attr'] - section attributes
                if (key_exists('mfn-rows', $_POST) && is_array($_POST['mfn-rows'])) {
                    foreach ($_POST['mfn-rows'] as $section_attr_k => $section_attr) {
                        $section['attr'][$section_attr_k] = stripslashes((string) $section_attr[$sectionID_k]);
                    }
                }

                $section['wraps'] = '';    // $section['wraps'] - section wraps will be added in next loop

                $mfn_items[] = $section;
            }

            $row_IDs     = $_POST['mfn-row-id'];
            $row_IDs_key = array_flip($row_IDs);
        }

        // Wraps ------------------------------------------------------------------------

        if (key_exists('mfn-wrap-id', $_POST) && is_array($_POST['mfn-wrap-id'])) {
            foreach ($_POST['mfn-wrap-id'] as $wrapID_k => $wrapID) {
                $wrap = [];

                $wrap['size']  = $_POST['mfn-wrap-size'][$wrapID_k];
                $wrap['items'] = '';    // $wrap['items'] - items will be added in the next loop

                // $wrap['attr'] - wrap attributes
                if (key_exists('mfn-wraps', $_POST) && is_array($_POST['mfn-wraps'])) {
                    foreach ($_POST['mfn-wraps'] as $wrap_attr_k => $wrap_attr) {
                        $wrap['attr'][$wrap_attr_k] = $wrap_attr[$wrapID_k];
                    }
                }

                $mfn_wraps[$wrapID] = $wrap;
            }

            $wrap_IDs     = $_POST['mfn-wrap-id'];
            $wrap_IDs_key = array_flip($wrap_IDs);
            $wrap_parents = $_POST['mfn-wrap-parent'];
        }

        // Items ------------------------------------------------------------------------

        if (key_exists('mfn-item-type', $_POST) && is_array($_POST['mfn-item-type'])) {
            $count      = [];
            $tabs_count = [];

            foreach ($_POST['mfn-item-type'] as $type_k => $type) {
                $item         = [];
                $item['type'] = $type;
                $item['size'] = $_POST['mfn-item-size'][$type_k];

                // init count for specified item type
                if (!key_exists($type, $count)) {
                    $count[$type] = 0;
                }

                // init count for specified tab type
                if (!key_exists($type, $tabs_count)) {
                    $tabs_count[$type] = 0;
                }

                if (key_exists($type, $_POST['mfn-items'])) {
                    foreach ((array)$_POST['mfn-items'][$type] as $attr_k => $attr) {
                        if ($attr_k == 'tabs') {
                            // Accordion, FAQ & Tabs --------------------------

                            $item['fields']['count'] = $attr['count'][$count[$type]];

                            if ($item['fields']['count']) {
                                for ($i = 0; $i < $item['fields']['count']; $i++) {
                                    $tab          = [];
                                    $tab['title'] = stripslashes((string) $attr['title'][$tabs_count[$type]]);

                                    $tab['content'] = stripslashes((string) $attr['content'][$tabs_count[$type]]);

                                    $item['fields']['tabs'][] = $tab;

                                    $tabs_count[$type]++;
                                }
                            }
                        } else {
                            // All other items --------------------------------

                            $item['fields'][$attr_k] = stripslashes((string) $attr[$count[$type]]);
                        }
                    }
                }

                // increase count for specified item type
                $count[$type]++;

                // parent wrap
                $parent_wrap_ID = $_POST['mfn-item-parent'][$type_k];

                if (!isset($mfn_wraps[$parent_wrap_ID]['items']) || !is_array($mfn_wraps[$parent_wrap_ID]['items'])) {
                    $mfn_wraps[$parent_wrap_ID]['items'] = [];
                }
                $mfn_wraps[$parent_wrap_ID]['items'][] = $item;
            }
        }

        // $mfn_items | Wraps with Items => Sections ------------------------------------

        foreach ($mfn_wraps as $wrap_ID => $wrap) {
            $wrap_key    = $wrap_IDs_key[$wrap_ID];
            $section_ID  = $wrap_parents[$wrap_key];
            $section_key = $row_IDs_key[$section_ID];

            if (!isset($mfn_items[$section_key]['wraps']) || !is_array($mfn_items[$section_key]['wraps'])) {
                $mfn_items[$section_key]['wraps'] = [];
            }
            $mfn_items[$section_key]['wraps'][] = $wrap;
        }

        $new = slash($mfn_items); //-----------------------------------------------
        function removeMy(&$element, $index)
        {
            $element = str_replace("", "", (string) $element);
        }

        //var_dump($import);
        //array_walk_recursive($new, 'removeMy');
        //var_dump($new);

        if ($mfn_items) {
            $new = call_user_func('base' . '64_encode', serialize($mfn_items));
            //option to add save html or smarty
            //$olives = mfn_builder_print_html($mfn_items);
            $olives = mfn_builder_print_smarty($mfn_items);
        }

        // migrate --------------------------------------------
        if (key_exists('mfn-items-import', $_POST) || key_exists('mfn-items-import-template', $_POST)) {
            if (key_exists('mfn-items-import', $_POST)) {
                // Import -----------------------

                $import_type = htmlspecialchars(stripslashes((string) $_POST['mfn-items-import-type']));

                $import = htmlspecialchars(stripslashes((string) $_POST['mfn-items-import']));
            } else {
                // Template ---------------------

                $import_type = htmlspecialchars(stripslashes((string) $_POST['mfn-items-import-template-type']));
                $template    = htmlspecialchars(stripslashes((string) $_POST['mfn-items-import-template']));

                //$import			= get_post_meta( $template, 'mfn-page-items', true );
                $sql3111    = "SELECT distinct conf_id, conf_title, conf_value FROM " . $xoopsDB->prefix("config_theme") . " WHERE conf_name = 'layoutbuilder' AND conf_id = '" . $template . "' ORDER BY conf_id ASC";
                $result3111 = $xoopsDB->query($sql3111);
                $fetch      = $xoopsDB->fetchArray($result3111);
                $import     = $fetch['conf_value'];
            }

            if ($import) {
                if ($import_type == 'replace') {
                    // REPLACE current builder content

                    $new = $import;
                } else {
                    // Insert BEFORE/AFTER current builder content

                    if ($import && !is_array($import)) {
                        $import = unserialize(call_user_func('base' . '64_decode', $import));
                    }

                    //var_dump($import);
                    array_walk_recursive($import, 'removeMy');
                    //var_dump($import);
                    if ($import_type == 'before') {
                        $mfn_items = array_merge($import, $mfn_items);
                    } else {
                        $mfn_items = array_merge($mfn_items, $import);
                    }

                    $new = call_user_func('base' . '64_encode', serialize($mfn_items));
                }
            }
        }

        // FIX | Quick Edit -----------------------------------
        if (key_exists('mfn-items-save', $_POST)) {
            $field['id'] = 'mfn-page-items';

            if (isset($new)) {
                // update post meta if there is at least one builder section
                //update_post_meta( $post_id, $field['id'], $new );
                mfn_builder_insert($form, $pageid, $new, $olives);
            }
        }
    }
}

function olivee_wajdi($form, $pageid)
{
    if (isset($_POST['admin']) && $_POST['admin'] == $form . '_Update') {
        mfn_builder_save($form, $pageid);
    }

    mfn_builder_show($form, $pageid);
}
