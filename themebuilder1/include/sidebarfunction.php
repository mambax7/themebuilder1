<?php

function sidebuilder($sideid)
{
    echo 'add sidebar to theme to xoops not finished yet';
    if (isset($_POST['admin']) && $_POST['admin'] == 'sidebuilder_Update') {
        if (isset($_POST['olivee-itemstitre']) && trim($_POST['olivee-itemstitre'] == '')) {
            $message = 'sidebar title must not be empty';
            redirect_header("admin.php?fct=themebuilder&op=side", 5, $message);
            exit();
        }

        $items      = [];
        $count      = [];
        $tabs_count = [];

        foreach ($_POST['olivee-item-type'] as $type_k => $type) {
            $item         = [];
            $item['type'] = $type;
            $item['size'] = $_POST['olivee-item-size'][$type_k];

            if (!key_exists($type, $count)) {
                $count[$type] = 1;
            }

            if (!key_exists($type, $tabs_count)) {
                $tabs_count[$type] = 0;
            }

            if (key_exists($type, $_POST['olivee-items'])) {
                foreach ((array)$_POST['olivee-items'][$type] as $attr_k => $attr) {
                    $item['fields'][$attr_k] = stripslashes((string) $attr[$count[$type]]);
                }
            }

            $count[$type]++;
            $items[] = $item;
        }

        $new = serialize($items);
        global $xoopsDB;
        //var_dump($new);

        //var_dump($sideid);
        $titresidebar = $_POST['olivee-itemstitre'];

        if ($sideid == 'add') {
            $sqltemplate = "INSERT INTO " . $xoopsDB->prefix('config_theme') . " (conf_id, conf_title, conf_name, conf_value) VALUES ('', '" . $titresidebar . "', 'sidebar', '$new')";

            if ($resulttemplate = $xoopsDB->queryF($sqltemplate)) {
                $message = 'insert new sidebar';
                redirect_header("admin.php?fct=themebuilder&op=side", 5, $message);
                exit();
            } else {
                $message = 'probleme insert new sidebar';
                redirect_header("admin.php?fct=themebuilder&op=side", 5, $message);
                exit();
            }
        } else {
            $sqltemplate = "UPDATE " . $xoopsDB->prefix('config_theme') . " SET conf_title = '" . $titresidebar . "', conf_value = '" . $new . "' WHERE conf_id = '" . $sideid . "'";

            if ($resulttemplate = $xoopsDB->queryF($sqltemplate)) {
                $message = 'update sidebar';
                redirect_header("admin.php?fct=themebuilder&op=side", 5, $message);
                exit();
            }
        }
    }

    if (!function_exists('olivee_meta_field_input')) {
        function olivee_meta_field_input($field, $meta)
        {
            global $OLIVEE_Options;

            if (isset($field['type'])) {
                echo '<tr valign="top">';
                echo '<th>';
                if (key_exists('title', $field)) {
                    echo $field['title'];
                }
                if (key_exists('sub_desc', $field)) {
                    echo '<span class="description">' . $field['sub_desc'] . '</span>';
                }
                echo '</th>';
                echo '<td>';

                $field_class = 'OLIVEE_Options_' . $field['type'];
                if (file_exists(__DIR__ . '/fields/' . $field['type'] . '/field_' . $field['type'] . '.php')) {
                    require_once(__DIR__ . '/fields/' . $field['type'] . '/field_' . $field['type'] . '.php');
                    //echo dirname(__FILE__) .'/fields/'.$field['type'].'/field_'.$field['type'].'.php';
                } else {
                    echo 'probleme include class file';
                }

                if (class_exists($field_class)) {
                    $field_object = new $field_class($field, $meta);
                    $field_object->render(1);
                } else {
                    echo 'pas de class pour ca todo';
                }
                echo '</td>';
                echo '</tr>';
            }
        }
    }

    if (!function_exists('olivee_get_idblock')) {
        function olivee_get_idblock($all = true)
        {
            global $xoopsDB;

            //$blocksid = array( 0 => '-- Select --' );
            $sql3111    = "SELECT distinct bid, name, title FROM " . $xoopsDB->prefix("newblocks") . " ORDER BY bid ASC";
            $result3111 = $xoopsDB->query($sql3111);
            while ([$bid, $name, $title] = $xoopsDB->fetchRow($result3111)) {
                $dddd['type']   = str_replace(" ", "__", (string) $title);
                $dddd['title']  = $title;
                $dddd['size']   = '1/1';
                $dddd['fields'] = [
                    '0' => [
                        'id'       => $bid,
                        'type'     => 'specialblock',
                        'title'    => 'text',
                        'sub'      => 'Adds a target="_blank" attribute to the link.',
                        'sub_desc' => 'Featured Image.',
                        'std'      => $bid,
                    ],
                ];
                $zui            = str_replace(" ", "__", (string) $title);

                $blocksid[$zui] = $dddd;
            }
            return $blocksid;
        }
    }

    if (!function_exists('olivee_builder_item')) {
        function olivee_builder_item($item_std, $item = false)
        {
            $item_std['size'] = $item['size'] ?: $item_std['size'];
            $name_type        = $item ? 'name="olivee-item-type[]"' : '';
            $name_size        = $item ? 'name="olivee-item-size[]"' : '';
            $label            = ($item && key_exists('title', $item['fields'])) ? $item['fields']['title'] : '';

            $classes = [
                '1/4' => 'olivee-item-1-4',
                '1/3' => 'olivee-item-1-3',
                '1/2' => 'olivee-item-1-2',
                '2/3' => 'olivee-item-2-3',
                '3/4' => 'olivee-item-3-4',
                '1/1' => 'olivee-item-1-1',
            ];

            echo '<div class="olivee-item olivee-item-' . $item_std['type'] . ' ' . $classes[$item_std['size']] . '">';

            echo '<div class="olivee-item-content">';
            echo '<input type="hidden" class="olivee-item-type" ' . $name_type . ' value="' . $item_std['type'] . '">';
            echo '<input type="hidden" class="olivee-item-size" ' . $name_size . ' value="' . $item_std['size'] . '">';
            /*echo '<div class="olivee-item-size">';
                echo '<a href="javascript:void(0);" class="olivee-item-btn olivee-item-size-dec">-</a>';
                echo '<a href="javascript:void(0);" class="olivee-item-btn olivee-item-size-inc">+</a>';
                echo '<span class="olivee-item-desc">'. $item_std['size'] .'</span>';
            echo '</div>';*/
            echo '<span class="olivee-item-label">' . $item_std['title'] . ' <small>' . $label . '</small></span>';
            echo '<div class="olivee-item-tool">';
            echo '<a href="javascript:void(0);" class="olivee-item-btn olivee-item-delete">delete</a>';
            echo '<a href="javascript:void(0);" class="olivee-item-btn olivee-item-edit">edit</a>';
            echo '</div>';
            echo '</div>';

            echo '<div class="olivee-item-meta">';
            echo '<table class="form-table">';
            echo '<tbody>';

            foreach ($item_std['fields'] as $field) {
                if ($item && key_exists($field['id'], $item['fields'])) {
                    $meta = $item['fields'][$field['id']];
                } else {
                    $meta = false;
                }

                if (!key_exists('std', $field)) {
                    $field['std'] = false;
                }
                $meta = ($meta || $meta === '0') ? $meta : stripslashes(htmlspecialchars(((string) $field['std']), ENT_QUOTES));

                $field['id'] = 'olivee-items[' . $item_std['type'] . '][' . $field['id'] . ']';
                if (!in_array($item_std['type'], ['tabs'])) {
                    $field['id'] .= '[]';
                }
                olivee_meta_field_input($field, $meta);
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
        }
    }

    $olivee_std_blocks = olivee_get_idblock();
    //var_dump($olivee_std_items);
    //var_dump($olivee_std_blocks['Login']);
    foreach ($olivee_std_blocks as $item => $key) {
        $item = str_replace("(", "", (string) $item);
        $item = str_replace(")", "", $item);
        $item = str_replace("!", "", $item);
        $item = str_replace(" ", "__", $item);
        $wert = $item . "			: [ '1/1' ], ";
        $wert .= "
			";
    }
    //var_dump($wert);

    global $xoopsDB;

    if ($sideid != '') {
        echo '  sideid  ' . $sideid;
        if ($sideid == 'add') {
            $olivee_items = '';
            $titlee       = '<div class="">Sidebar Title: <input class="text-input" size="130" name="olivee-itemstitre" type="text" placeholder="Your sidebar Title" data-msg-required="This field is required." required></div>';
        } elseif ($sideid != 'add') {
            $sqlr          = "SELECT * FROM " . $xoopsDB->prefix("config_theme") . " WHERE conf_id = '" . $sideid . "'";
            $head_arrl     = $xoopsDB->fetchArray($xoopsDB->query($sqlr));
            $olivee_tmp_fn = $head_arrl['conf_value'];
            $olivee_items  = unserialize($olivee_tmp_fn);

            //var_dump($head_arrl);
            if ($head_arrl['conf_title'] != '') {
                $titlee = '<div class="">Sidebar Title: <input class="text-input" size="130" name="olivee-itemstitre" value="' . $head_arrl['conf_title'] . '" type="text" placeholder="Your sidebar Title" data-msg-required="This field is required." required></div>';
            } else {
                $titlee = '<div class="">Sidebar Title: <input class="text-input" size="130" name="olivee-itemstitre" type="text" placeholder="Your sidebar Title" data-msg-required="This field is required." required></div>';
            }
        }
    } else {
        $titlee        = '';
        $sqlr          = "SELECT * FROM " . $xoopsDB->prefix("config_theme") . " WHERE conf_name = '" . $sideid . "'";
        $head_arrl     = $xoopsDB->fetchArray($xoopsDB->query($sqlr));
        $olivee_tmp_fn = $head_arrl['conf_value'];
        $olivee_items  = unserialize($olivee_tmp_fn);
    }
    echo '

<link rel="stylesheet" type="text/css" media="all" href="admin/themebuilder1/build.css" />
	<script src="admin/themebuilder1/overlay.js"></script>
	<link rel="stylesheet" href="admin/themebuilder1/js/colorpicker.css" type="text/css" />
	<script type="text/javascript" src="admin/themebuilder1/js/colorpicker.js"></script>
	';
    echo "
		<script>
			function OliveeBuilder(){

	// Page Template --------------------------------------------------
	var mfn_wrapper = jQuery('#olivee-wrapper');
	var wrapper_builder = jQuery('#olivee-builder');
	var wrapper_switch = jQuery('#olivee-meta-page table tr:first-child');
	
	var desktop = jQuery('#olivee-desk');
	// sortable --------------------------------------------------
	desktop.sortable({ 
		cancel: '.olivee-item-btn',
		forcePlaceholderSize: true, 
		placeholder: 'placeholder'
	});
	
	
	// available items ----------------------------------------
	var items = {
		" . $wert . "
	};	
	
	
	// available classes ------------------------------------------
	var classes = {
		'1/4' : 'olivee-item-1-4',
		'1/3' : 'olivee-item-1-3',
		'1/2' : 'olivee-item-1-2',
		'2/3' : 'olivee-item-2-3',
		'3/4' : 'olivee-item-3-4',
		'1/1' : 'olivee-item-1-1'
	};
	
	
	// increase item size --------------------------------------

	
	
	// decrease size ----------------------------------------------

	
	
	// add item ----------------------------------------------------
	jQuery('.olivee-add-btn').click(function(){
		var item = jQuery(this).siblings('#olivee-add-select').val();
		var clone = jQuery('#olivee-items').find('div.olivee-item-'+ item ).clone(true);
	alert(item);
		clone
			.hide()
			.find('.olivee-item-content input').each(function() {
				jQuery(this).attr('name',jQuery(this).attr('class')+'[]');
			});
	
		desktop.append(clone).find('.olivee-item').fadeIn(500);
	});
	
	
	// delete item ----------------------------------------------------
	jQuery('.olivee-item-delete').click(function(){
		var item = jQuery(this).parents('.olivee-item');
		var itemm = item.find('.olivee-item-type').val();
		var test = 'Blockcolumn';
		
		//if (itemm == test) {
	//alert('impossible de supprimer ce block');
 //}else{
		jQuery.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to delete this item. <br />It cannot be restored at a later time! Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						item.fadeOut(500,function(){jQuery(this).remove();});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}
				}
			}
		});
		//}
	});
	
	
	var source_item = '';
	
	// popup - edit item ------------------------------------------
	jQuery('.olivee-item-edit').click(function(){
		jQuery('#olivee-content, .form-table').fadeOut(50);
		source_item = jQuery(this).parents('.olivee-item');
		var clone_meta = source_item.find('.olivee-item-meta').clone(true);
	
		jQuery('#olivee-popup')
			.append(clone_meta)
			.fadeIn(500);
		
		source_item.find('.olivee-item-meta').remove();
	});
	
	// popup - close ----------------------------------------------
	jQuery('#olivee-popup .olivee-popup-close, #olivee-popup .olivee-popup-save').click(function(){
		jQuery('#olivee-content, .form-table').fadeIn(500);
		var popup = jQuery('#olivee-popup');
		var clone = popup.find('.olivee-item-meta').clone(true);

		source_item.append(clone);
		
		popup.fadeOut(50);
	
		setTimeout(function(){
			popup.find('.olivee-item-meta').remove();
		},500);
	});		
		
}
	
jQuery(document).ready(function(){
	var olivee_bldr = new OliveeBuilder();
});

// clone fix
(function (original) {
	jQuery.fn.clone = function () {
	    var result = original.apply (this, arguments),
		my_textareas = this.find('textarea, select'),
	    result_textareas = result.find('textarea, select');
	
	    for (var i = 0, l = my_textareas.length; i < l; ++i)
	    	jQuery(result_textareas[i]).val (jQuery(my_textareas[i]).val());
	
	    return result;
	};
}) (jQuery.fn.clone);
		</script>";
    echo '
	<div id="olivee-builder">
	
		<div id="olivee-content">
		
			<div class="olivee-add-item">
				<table class="form-table">
					<tbody>
						<tr valign="top">
							<th>
								theme.html builder. Not finished yet!
								<span class="description">Add new item to theme.html</span>
							</th>
							<td>
								<select id="olivee-add-select">
									<option value="">&mdash; Select &mdash;</option>	';

    foreach ($olivee_std_blocks as $item) {
        echo '<option value="' . $item['type'] . '">' . $item['title'] . '</option>';
    }
    echo '
								</select>
								<a class="btn-blue olivee-add-btn" href="javascript:void(0);">Add item</a><br>
								<span class="description">Choose an element and click the Add Item button</span>
							</td>
						</tr>
						<tr>
							<td>


</div>
							</td>
						</tr>	
					</tbody>
				</table>
			</div>
				
			<form id="pass" name="pass" method="post" action="">

' . $titlee . '
			<div id="olivee-items" class="clearfix">
			';

    foreach ($olivee_std_blocks as $item) {
        olivee_builder_item($item);
    }
    echo '
			</div>

			<div id="olivee-desk" class="clearfix">';

    if (is_array($olivee_items)) {
        foreach ($olivee_items as $item) {
            olivee_builder_item($olivee_std_blocks[$item['type']], $item);
        }
    } else {
    }

    echo '
			</div>
			
			<input type="submit" name="admin" id="admin" value="sidebuilder_Update" />
			<!--<input name="blockbuilder_Reset" onclick="location = "admin.php?fct=themebuilder&op=templetebuilder&templatedelid=blockbuilder" type="button" value="blockbuilder_Reset"> -->

		</form>
		</div>
		<div id="olivee-popup">
			<a href="javascript:void(0);" class="olivee-btn-close olivee-popup-close"><em>close</em></a>	
			<a href="javascript:void(0);" class="olivee-popup-save">Save changes</a>	
		</div>
	</div>
		';
}

?>
