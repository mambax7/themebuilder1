<?php

$op = system_CleanVars ( $_REQUEST, 'action', 'default', 'string' );
switch ( $op ) {

		default:	
	
		global $xoopsDB;
		$sql = "SELECT * FROM ".$xoopsDB->prefix("crellyslider_sliders");
		$result = $xoopsDB->query($sql);
		$i = 1;
		while ( $array = $xoopsDB -> fetchArray( $result )){
		$sliders[$i] = $array;
		$i++;
		}

if(!$sliders) {
	echo '<div class="cs-no-sliders">
	No Sliders found. Please add a new one.
	</div>
	<br /><br />';
}else { ?>

<link rel="stylesheet" href="admin/themebuilder1/slider/css/admin.css" type="text/css" media="all">
<script type="text/javascript" src="admin/themebuilder1/assets/js/adminslider.js"></script>
<script type="text/javascript" src="admin/themebuilder1/assets/js/colorpicker.js"></script>

	<div class="wrap cs-admin" style="width: 1140px;">

		<noscript class="cs-no-js">
			<div class="cs-message cs-message-error" style="display: block;">JavaScript must be enabled to view this page correctly.</div>
		</noscript>

		<div class="cs-message cs-message-ok" style="display: none;">Operation completed successfully.</div>			<div class="cs-message cs-message-error" style="display: none;">Something went wrong.</div>

		<div class="cs-home">
			<table class="cs-sliders-list cs-table">
				<thead>
					<tr>
						<th colspan="5">Sliders List</th>
					</tr>
				</thead>
				<tbody>
					<tr class="cs-table-header">
						<td>ID</td>
						<td>Name</td>
						<td>Alias</td>
						<td>Smarty Shortcode</td>
						<td>Actions</td>
					</tr>
					<?php
					foreach($sliders as $key => $slider) {
						echo '<tr>';
						echo '<td class="cs-slider-id">'.$slider['id'] . '</td>';
						echo '<td class="cs-slider-name"><a href="admin.php?fct=themebuilder1&op=slider&action=edit&id=' . $slider['id'] . '">' . $slider['name'] . '</a></td>';
						echo '<td class="cs-slider-alias">' . $slider['alias'] . '</td>';
						echo '<td class="cs-slider-shortcode"><{themebuilderslider_alias="' . $slider['alias'] . '"]></td>';
						echo '<td>
							<a class="cs-edit-slider cs-button cs-button cs-is-success" href="admin.php?fct=themebuilder1&op=slider&action=edit&id=' . $slider['id'] . '">Edit</a>
							<a class="cs-view-slider cs-button cs-button cs-is-secondary" href="admin.php?fct=themebuilder1&op=slider&action=view&id=' . $slider['id'] . '">View</a>
							<a class="cs-duplicate-slider cs-button cs-button cs-is-primary" href="javascript:void(0)" data-duplicate="' . $slider['id'] . '">Duplicate</a>
							<a class="cs-export-slider cs-button cs-button cs-is-warning" href="javascript:void(0)" data-export="' . $slider['id'] . '">Export</a>
							<a class="cs-delete-slider cs-button cs-button cs-is-danger" href="javascript:void(0)" data-delete="' . $slider['id'] . '">Delete</a>
						</td>';
						echo '</tr>';
					}
					?>
				</tbody>
			</table>
<?php
}
?>

<br />
<a class="cs-button cs-is-primary cs-add-slider" href="admin.php?fct=themebuilder1&op=slider&action=add">Add Slider</a>
<a class="cs-button cs-is-warning cs-import-slider" href="javascript:void(0)">Import Slider</a>
<input id="cs-import-file" type="file" style="display: none;">
</div>
</div>
<?php

        break;

		case 'add':
?>
<link rel="stylesheet" href="admin/themebuilder1/slider/css/crellyslider.css" type="text/css" media="all">
<link rel="stylesheet" href="admin/themebuilder1/slider/css/admin.css" type="text/css" media="all">
<script type="text/javascript" src="admin/themebuilder1/assets/js/adminslider.js"></script>
<script type="text/javascript" src="admin/themebuilder1/assets/js/colorpicker.js"></script>
	<div class="wrap cs-admin">	
		<div class="cs-slider cs-add-slider">
			<div class="cs-tabs cs-tabs-fade cs-tabs-switch-interface">
				<?php include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/slider/slider.php'; ?>
			</div>
			<br />
			<a class="cs-button cs-is-primary cs-save-settings" data-id="" href="#">Save Settings</a>
		</div>
	</div>	
		
		<?php
		break;
		case 'edit':
		
				$edit = true;
				$id = isset($_GET['id']) ? $_GET['id'] : NULL;
		?>
<script src="http://localhost/xoops2510/themes/themebuilder1/js/jquery-1.10.2.js"></script>
<script src="http://localhost/xoops2510/browse.php?Frameworks/jquery/plugins/jquery.ui.js" type="text/javascript"></script>
<link rel="stylesheet" href="admin/themebuilder1/slider/css/crellyslider.css" type="text/css" media="all">
<link rel="stylesheet" href="admin/themebuilder1/slider/css/admin.css" type="text/css" media="all">
<script type="text/javascript" src="admin/themebuilder1/assets/js/adminslider.js"></script>
<script type="text/javascript" src="admin/themebuilder1/slider/js/jquery.crellyslider.js"></script>
<script>
	var upurl = "<?php echo XOOPS_URL ?>";
</script>
<script src="admin/themebuilder1/builder/fields/uploadframe/mlib-includes/js/init.js" type="text/javascript"></script>
<link rel="stylesheet" href="admin/themebuilder1/assets/js/colorpicker.css" type="text/css" />
<script type="text/javascript" src="admin/themebuilder1/assets/js/colorpicker.js"></script>

		
	<div class="wrap cs-admin">	
	
		<noscript class="cs-no-js">
			<div class="cs-message cs-message-error" style="display: block;">JavaScript must be enabled to view this page correctly.</div>
		</noscript>

		<div class="cs-message cs-message-ok" style="display: none;">Operation completed successfully.</div>
		<div class="cs-message cs-message-error" style="display: none;">Something went wrong.</div>

			<h2 class="cs-logo" title="Crelly Slider">
				<a href="admin.php?fct=themebuilder1&op=slider">
					<img src="<?php echo 'http://localhost/xoops257sample/modules/system/themes/default/img/dark/header-logo_big.png' ?>" alt="Crelly Slider" />
				</a>
			</h2>
			<br /><br />
		<div class="cs-slider cs-edit-slider">
			<div class="cs-tabs cs-tabs-fade cs-tabs-switch-interface">	
				<ul>
					<li class="cs-switch active">
						<span class="cs-icon icon-settings"></span>
						<a id="cs-show-slider-settings">Slider Settings</a>
					</li>
					<li class="cs-switch">
						<span class="cs-icon icon-edit"></span>
						<a id="cs-show-slides">Edit Slides</a>
					</li>
					<li class="cs-switch">
						<span class="cs-icon icon-edit"></span>
						<a href="admin.php?fct=themebuilder1&op=slider&action=view&id=<?php echo $id; ?> ">View Slides</a>
					</li>
				</ul>
				<br /><br /><br />
				<?php 

				$sqlslider = "SELECT * FROM ".$xoopsDB->prefix("crellyslider_sliders")." WHERE id = '".$id."'";
				$slider = $xoopsDB -> fetchArray( $xoopsDB -> query( $sqlslider ) );
				//var_dump($slider);
				$sqlslides = "SELECT * FROM ".$xoopsDB->prefix("crellyslider_slides")." WHERE slider_parent = '".$id."' ORDER BY position";
				$result=$xoopsDB->query($sqlslides);
				while ($myrow = $xoopsDB -> fetchArray( $result )) {
				$slides[] = $myrow;
				}
				//var_dump($slides);
			//$slider = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'crellyslider_sliders WHERE id = %d', $id));
			//$slides = $wpdb->get_results($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'crellyslider_slides WHERE slider_parent = %d ORDER BY position', $id));

				include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/slider/slider.php';
				include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/slider/elements.php';
				include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/slider/slides.php';
				?>
			</div>
			<br />
			<a class="cs-button cs-is-primary cs-save-settings" data-id="<?php echo $id; ?>" href="#">Save Settings</a>
		</div>
	</div>

		<?php
		
		break;
		
		
		case 'view':
		
		echo '<script src="http://localhost/xoops2510/themes/themebuilder1/js/jquery-1.10.2.js">
		</script><link rel="stylesheet" href="admin/themebuilder1/slider/css/crellyslider.css" type="text/css" media="all">
<script type="text/javascript" src="admin/themebuilder1/slider/js/jquery.crellyslider.js"></script>';

				$id = isset($_GET['id']) ? $_GET['id'] : NULL;
				$sqlslider = "SELECT * FROM ".$xoopsDB->prefix("crellyslider_sliders")." WHERE id = '".$id."'";
				$result = $xoopsDB->query($sqlslider);
				$slider = $xoopsDB -> fetchArray( $result );

		if(! $slider) {
				echo 'The slider hasn\'t been found';			
		}
		
//var_dump($slider);
		
		$sqlslides = "SELECT * FROM ".$xoopsDB->prefix("crellyslider_slides")." WHERE slider_parent = '".$id."' ORDER BY position";
				$result=$xoopsDB->query($sqlslides);
				while ($myrow = $xoopsDB -> fetchArray( $result )) {
				$slides[] = $myrow;
				}

		$slider_id = $slider['id'];
//var_dump($slides);
		$output = '';

		$output .= '<div style="display: block;" class="crellyslider-slider crellyslider-slider-' . $slider['layout'] . ' crellyslider-slider-' . $slider['alias'] . '" id="crellyslider-' . $slider_id . '">' . "\n";
		$output .= '<ul>' . "\n";
		foreach($slides as $slide) {
			$background_type_image = $slide['background_type_image'] == 'undefined' || $slide['background_type_image'] == 'none' ? 'none;' : 'url(\'' . $slide['background_type_image'] . '\');';
			$output .= '<li' .  "\n" .
			'style="' . "\n" .
			'background-color: ' . $slide['background_type_color'] . ';' . "\n" .
			'background-image: ' . $background_type_image . "\n" .
			'background-position: ' . $slide['background_propriety_position_x'] . ' ' . $slide['background_propriety_position_y'] . ';' . "\n" .
			'background-repeat: ' . $slide['background_repeat'] . ';' . "\n" .
			'background-size: ' . $slide['background_propriety_size'] . ';' . "\n" .
			stripslashes($slide['custom_css']) . "\n" .
			'"' . "\n" .

			'data-in="' . $slide['data_in'] . '"' . "\n" .
			'data-ease-in="' . $slide['data_easeIn'] . '"' . "\n" .
			'data-out="' . $slide['data_out'] . '"' . "\n" .
			'data-ease-out="' . $slide['data_easeOut'] . '"' . "\n" .
			'data-time="' . $slide['data_time'] . '"' . "\n" .
			'>' . "\n";

			if($slide['link'] != '') {
				if($slide['link_new_tab']) {
					$output .= '<a class="cs-background-link" target="_blank" href="' . stripslashes($slide['link']) . '"></a>';
				}
				else {
					$output .= '<a class="cs-background-link" href="' . stripslashes($slide['link']) . '"></a>';
				}
			}

			$slide_parent = $slide['position'];
				$elements = array();
				$sqlelements = "SELECT * FROM ".$xoopsDB->prefix("crellyslider_elements")." WHERE slider_parent = '".$slider_id."' AND slide_parent = '". $slide_parent ."'";
				$result=$xoopsDB->query($sqlelements);
				while ($myrowelements = $xoopsDB -> fetchArray( $result )) {
				$elements[] = $myrowelements;
				}

//var_dump ($elements);			
			
			foreach($elements as $element) {
				if($element['link'] != '') {
					$target = $element['link_new_tab'] == 1 ? 'target="_blank"' : '';

					$output .= '<a' . "\n" .
					'data-delay="' . $element['data_delay'] . '"' . "\n" .
					'data-ease-in="' . $element['data_easeIn'] . '"' . "\n" .
					'data-ease-out="' . $element['data_easeOut'] . '"' . "\n" .
					'data-in="' . $element['data_in'] . '"' . "\n" .
					'data-out="' . $element['data_out'] . '"' . "\n" .
					'data-ignore-ease-out="' . $element['data_ignoreEaseOut'] . '"' . "\n" .
					'data-top="' . $element['data_top'] . '"' . "\n" .
					'data-left="' . $element['data_left'] . '"' . "\n" .
					'data-time="' . $element['data_time'] . '"' . "\n" .
					'href="' . stripslashes($element['link']) . '"' . "\n" .
					$target . "\n" .
					'style="' .
					'z-index: ' . $element['z_index'] . ';' . "\n" .
					'">' .  "\n";
				}
//var_dump($element['type']);
				switch ($element['type']) {
					case 'text':
						$output .= '<div' . "\n" .
						'class="' . $element['custom_css_classes'] . '"' . "\n" .
						'style="';
						if($element['link'] == '') {
							$output .= 'z-index: ' . $element['z_index'] . ';' . "\n";
						}
						$output .= stripslashes($element['custom_css']) . "\n" .
						'"' .  "\n";
						if($element['link'] == '') {
							$output .= 'data-delay="' . $element['data_delay'] . '"' . "\n" .
							'data-ease-in="' . $element['data_easeIn'] . '"' . "\n" .
							'data-ease-out="' . $element['data_easeOut'] . '"' . "\n" .
							'data-in="' . $element['data_in'] . '"' . "\n" .
							'data-out="' . $element['data_out'] . '"' . "\n" .
							'data-ignore-ease-out="' . $element['data_ignoreEaseOut'] . '"' . "\n" .
							'data-top="' . $element['data_top'] . '"' . "\n" .
							'data-left="' . $element['data_left'] . '"' . "\n" .
							'data-time="' . $element['data_time'] . '"' . "\n";
						}
						$output .= '>' . "\n" .
						stripslashes($element['inner_html']) . "\n" .
						'</div>' . "\n";
					break;

					case 'image':
						$output .= '<img' . "\n" .
						'class="' . $element['custom_css_classes'] . '"' . "\n" .
						'src="' . $element['image_src'] . '"' . "\n" .
						'alt="' . $element['image_alt'] . '"' . "\n" .
						'style="' . "\n";
						if($element['link'] == '') {
							$output .= 'z-index: ' . $element['z_index'] . ';' . "\n";
						}
						$output .= stripslashes($element['custom_css']) . "\n" .
						'"' . "\n";
						if($element['link'] == '') {
							$output .= 'data-delay="' . $element['data_delay'] . '"' . "\n" .
							'data-ease-in="' . $element['data_easeIn'] . '"' . "\n" .
							'data-ease-out="' . $element['data_easeOut'] . '"' . "\n" .
							'data-in="' . $element['data_in'] . '"' . "\n" .
							'data-out="' . $element['data_out'] . '"' . "\n" .
							'data-ignore-ease-out="' . $element['data_ignoreEaseOut'] . '"' . "\n" .
							'data-top="' . $element['data_top'] . '"' . "\n" .
							'data-left="' . $element['data_left'] . '"' . "\n" .
							'data-time="' . $element['data_time'] . '"' . "\n";
						}
						$output .= '/>' . "\n";
					break;

					case 'youtube_video':
						$output .= '<iframe frameborder="0" type="text/html" width="560" height="315"' . "\n" .
						'class="cs-yt-iframe ' . $element['custom_css_classes'] . '"' . "\n" .
						'src="' . 'https://www.youtube.com/embed/' . $element['video_id'] . '?enablejsapi=1' . '"' . "\n" .
						'data-autoplay="' . $element['video_autoplay ']. '"' . "\n" .
						'data-loop="' . $element['video_loop'] . '"' . "\n" .
						'style="' . "\n" .
						'z-index: ' . $element['z_index'] . ';' . "\n" .
						stripslashes($element['custom_css']) . "\n" .
						'"' . "\n" .
						'data-delay="' . $element['data_delay'] . '"' . "\n" .
						'data-ease-in="' . $element['data_easeIn'] . '"' . "\n" .
						'data-ease-out="' . $element['data_easeOut'] . '"' . "\n" .
						'data-in="' . $element['data_in'] . '"' . "\n" .
						'data-out="' . $element['data_out'] . '"' . "\n" .
						'data-ignore-ease-out="' . $element['data_ignoreEaseOut'] . '"' . "\n" .
						'data-top="' . $element['data_top'] . '"' . "\n" .
						'data-left="' . $element['data_left'] . '"' . "\n" .
						'data-time="' . $element['data_time'] . '"' . "\n" .
						'></iframe>' . "\n";
					break;

					case 'vimeo_video':
						$output .= '<iframe frameborder="0" width="560" height="315"' . "\n" .
						'class="cs-vimeo-iframe ' . $element['custom_css_classes'] . '"' . "\n" .
						'src="' . 'https://player.vimeo.com/video/' . $element['video_id'] . '?api=1' . '"' . "\n" .
						'data-autoplay="' . $element['video_autoplay'] . '"' . "\n" .
						'data-loop="' . $element['video_loop'] . '"' . "\n" .
						'style="' . "\n" .
						'z-index: ' . $element['z_index'] . ';' . "\n" .
						stripslashes($element['custom_css']) . "\n" .
						'"' . "\n" .
						'data-delay="' . $element['data_delay'] . '"' . "\n" .
						'data-ease-in="' . $element['data_easeIn'] . '"' . "\n" .
						'data-ease-out="' . $element['data_easeOut'] . '"' . "\n" .
						'data-in="' . $element['data_in'] . '"' . "\n" .
						'data-out="' . $element['data_out'] . '"' . "\n" .
						'data-ignore-ease-out="' . $element['data_ignoreEaseOut'] . '"' . "\n" .
						'data-top="' . $element['data_top'] . '"' . "\n" .
						'data-left="' . $element['data_left'] . '"' . "\n" .
						'data-time="' . $element['data_time'] . '"' . "\n" .
						'></iframe>' . "\n";
					break;
				}

				if($element['link'] != '') {
					$output .= '</a>' . "\n";
				}
			}

			$output .= '</li>' . "\n";
		}
		$output .= '</ul>' . "\n";
		$output .= '</div>' . "\n";

		$output .= '<script type="text/javascript">' . "\n";
		$output .= '(function($) {' . "\n";
		$output .= '$(document).ready(function() {' . "\n";
		$output .= '$("#crellyslider-' . $slider_id  . '").crellySlider({' . "\n";
		$output .= 'layout: \'' . $slider['layout'] . '\',' . "\n";
		$output .= 'responsive: ' . $slider['responsive'] . ',' . "\n";
		$output .= 'startWidth: ' . $slider['startWidth'] . ',' . "\n";
		$output .= 'startHeight: ' . $slider['startHeight'] . ',' . "\n";
		$output .= 'automaticSlide: ' . $slider['automaticSlide'] . ',' . "\n";
		$output .= 'showControls: ' . $slider['showControls'] . ',' . "\n";
		$output .= 'showNavigation: ' . $slider['showNavigation'] . ',' . "\n";
		$output .= 'enableSwipe: ' . $slider['enableSwipe'] . ',' . "\n";
		$output .= 'showProgressBar: ' . $slider['showProgressBar'] . ',' . "\n";
		$output .= 'pauseOnHover: ' . $slider['pauseOnHover'] . ',' . "\n";
		if($slider['randomOrder'] != NULL) {
			$output .= 'randomOrder: ' . $slider['randomOrder'] . ',' . "\n";
		}
		if($slider['startFromSlide'] != NULL) {
			$output .= 'startFromSlide: ' . $slider['startFromSlide'] . ',' . "\n";
		}
		$output .= stripslashes($slider['callbacks']) . "\n";
		$output .= '});' . "\n";
		$output .= '});' . "\n";
		$output .= '})(jQuery);' . "\n";
		$output .= '</script>' . "\n";

	

echo $output;

echo '<a class="cs-button cs-is-primary cs-save-settings" href="admin.php?fct=themebuilder1&op=slider">Index</a>';
echo '<br><a class="cs-button cs-is-primary cs-save-settings" href="admin.php?fct=themebuilder1&op=slider&action=edit&id='.$id.'">Edit</a>';

			
		break;


	}

?>