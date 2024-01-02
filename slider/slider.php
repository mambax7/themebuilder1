<?php 
//// Exit if accessed directly
//prevent direct access
  ?>

<div id="cs-slider-settings">
	<?php
	// Contains the key, the display name and a boolean: true if is the default option
	$slider_select_options = array(
		'layout' => array(
			'full-width' => array('Full Width'),
			'fixed' => array('Fixed'),
		),
		'boolean' => array(
			1 => array('Yes'),
			0 => array('No'),
		),
		'boolean_not' => array(
			1 => array('Yes'),
			0 => array('No'),
		),
	);
	?>

	<?php if($edit) { 
	//var_dump($slider);
	?>
		<input type="text" id="cs-slider-name" placeholder="Slider Name" value="<?php echo $slider['name']; ?>" />
	<?php
	}
	else { ?>
		<input type="text" id="cs-slider-name" placeholder="Slider Name" />
	<?php } ?>

	<br />
	<br />

	<strong>Alias:</strong>
	<?php if($edit) { ?>
		<span id="cs-slider-alias"><?php echo $slider['alias']; ?></span>
	<?php
	}
	else { ?>
		<span id="cs-slider-alias"></span>
	<?php } ?>

	<br />
	<br />

	<strong>Shortcode:</strong>
	<?php if($edit) { ?>
		<span id="cs-slider-shortcode"><{themebuilderslider_alias="<?php echo $slider['alias']; ?>"}></span>
	<?php
	}
	else { ?>
		<span id="cs-slider-shortcode"></span>
	<?php } ?>

	<br />
	<br />

	<table class="cs-slider-settings-list cs-table">
		<thead>
			<tr class="odd-row">
				<th colspan="3">Slider General Options</th>
			</tr>
		</thead>
		<tbody>
			<tr class="cs-table-header">
				<td>Option</td>
				<td>Parameter</td>
				<td>Description</td>
			</tr>
			<tr>
				<td class="cs-name">Layout</td>
				<td class="cs-content">
					<select id="cs-slider-layout">
						<?php
						foreach($slider_select_options['layout'] as $key => $value) {
							echo '<option value="' . $key . '"';
							if((!$edit && $value[1]) || ($edit && $slider['layout'] == $key)) {
								echo ' selected';
							}
							echo '>' . $value[0] . '</option>';
						}
						?>
					</select>
				</td>
				<td class="cs-description">
					Modify the layout type of the slider.
				</td>
			</tr>
			<tr>
				<td class="cs-name">Responsive</td>
				<td class="cs-content">
					<select id="cs-slider-responsive">
						<?php
						foreach($slider_select_options['boolean'] as $key => $value) {
							echo '<option value="' . $key . '"';
							if((!$edit && $value[1]) || ($edit && $slider['responsive'] == $key)) {
								echo ' selected';
							}
							echo '>' . $value[0] . '</option>';
						}
						?>
					</select>
				</td>
				<td class="cs-description">
					The slider will be adapted to the screen size.
				</td>
			</tr>
			<tr>
				<td class="cs-name">Start Width</td>
				<td class="cs-content">
					<?php
					if(!$edit) echo '<input id="cs-slider-startWidth" type="text" value="1140" />';
					else echo '<input id="cs-slider-startWidth" type="text" value="' . $slider['startWidth'] .'" />';
					?>
					px
				</td>
				<td class="cs-description">
					The content initial width of the slider.
				</td>
			</tr>
			<tr>
				<td class="cs-name">Start Height</td>
				<td class="cs-content">
					<?php
					if(!$edit) echo '<input id="cs-slider-startHeight" type="text" value="500" />';
					else echo '<input id="cs-slider-startHeight" type="text" value="' . $slider['startHeight'] .'" />';
					?>
					px
				</td>
				<td class="cs-description">
					The content initial height of the slider.
				</td>
			</tr>
			<tr>
				<td class="cs-name">Automatic Slide</td>
				<td class="cs-content">
					<select id="cs-slider-automaticSlide">
						<?php
						foreach($slider_select_options['boolean'] as $key => $value) {
							echo '<option value="' . $key . '"';
							if((!$edit && $value[1]) || ($edit && $slider['automaticSlide'] == $key)) {
								echo ' selected';
							}
							echo '>' . $value[0] . '</option>';
						}
						?>
					</select>
				</td>
				<td class="cs-description">
					The slides loop is automatic.
				</td>
			</tr>
			<tr>
				<td class="cs-name">Show Controls</td>
				<td class="cs-content">
					<select id="cs-slider-showControls">
						<?php
						foreach($slider_select_options['boolean'] as $key => $value) {
							echo '<option value="' . $key . '"';
							if((!$edit && $value[1]) || ($edit && $slider['showControls'] == $key)) {
								echo ' selected';
							}
							echo '>' . $value[0] . '</option>';
						}
						?>
					</select>
				</td>
				<td class="cs-description">
					Show the previous and next arrows.
				</td>
			</tr>
			<tr>
				<td class="cs-name">Show Navigation</td>
				<td class="cs-content">
					<select id="cs-slider-showNavigation">
						<?php
						foreach($slider_select_options['boolean'] as $key => $value) {
							echo '<option value="' . $key . '"';
							if((!$edit && $value[1]) || ($edit && $slider['showNavigation'] == $key)) {
								echo ' selected';
							}
							echo '>' . $value[0] . '</option>';
						}
						?>
					</select>
				</td>
				<td class="cs-description">
					Show the links buttons to change slide.
				</td>
			</tr>
			<tr>
				<td class="cs-name">Enable swipe and drag</td>
				<td class="cs-content">
					<select id="cs-slider-enableSwipe">
						<?php
						foreach($slider_select_options['boolean'] as $key => $value) {
							echo '<option value="' . $key . '"';
							if((!$edit && $value[1]) || ($edit && $slider['enableSwipe'] == $key)) {
								echo ' selected';
							}
							echo '>' . $value[0] . '</option>';
						}
						?>
					</select>
				</td>
				<td class="cs-description">
					Enable swipe left, swipe right, drag left, drag right commands.'
				</td>
			</tr>
			<tr>
				<td class="cs-name">Show Progress Bar</td>
				<td class="cs-content">
					<select id="cs-slider-showProgressBar">
						<?php
						foreach($slider_select_options['boolean'] as $key => $value) {
							echo '<option value="' . $key . '"';
							if((!$edit && $value[1]) || ($edit && $slider['showProgressBar'] == $key)) {
								echo ' selected';
							}
							echo '>' . $value[0] . '</option>';
						}
						?>
					</select>
				</td>
				<td class="cs-description">
					Draw the progress bar during the slide execution.
				</td>
			</tr>
			<tr>
				<td class="cs-name">Pause on Hover</td>
				<td class="cs-content">
					<select id="cs-slider-pauseOnHover">
						<?php
						foreach($slider_select_options['boolean'] as $key => $value) {
							echo '<option value="' . $key . '"';
							if((!$edit && $value[1]) || ($edit && $slider['pauseOnHover'] == $key)) {
								echo ' selected';
							}
							echo '>' . $value[0] . '</option>';
						}
						?>
					</select>
				</td>
				<td class="cs-description">
					Pause the current slide when hovered.
				</td>
			</tr>
			<tr>
				<td class="cs-name">Random order</td>
				<td class="cs-content">
					<select id="cs-slider-randomOrder">
						<?php
						foreach($slider_select_options['boolean_not'] as $key => $value) {
							echo '<option value="' . $key . '"';
							if((!$edit && $value[1]) || ($edit && $slider['randomOrder'] == $key)) {
								echo ' selected';
							}
							echo '>' . $value[0] . '</option>';
						}
						?>
					</select>
				</td>
				<td class="cs-description">
					The order of the slides is random (instead of being linear).
				</td>
			</tr>
			<tr>
				<td class="cs-name">Start from slide</td>
				<td class="cs-content">
					<select id="cs-slider-startFromSlide">
						<?php
						if(! $edit) {
							echo '<option selected value="-1">Random slide</option>';
							echo '<option selected value="0">Slide 1</option>';
						}
						else {
							if($edit && $slider['startFromSlide'] == -1) {
								echo '<option selected value="-1">Random slide</option>';
							}
							else {
								echo '<option value="-1">Random slide</option>';
							}
							for($i = 0; $i < count($slides); $i++) {
								echo '<option value="' . $i . '"';
								if((!$edit && $i == 0) || ($edit && $slider['startFromSlide'] == $i)) {
									echo ' selected';
								}
								echo '>Slide ' . ($i + 1) . '</option>';
							}
						}
						?>
					</select>
				</td>
				<td class="cs-description">
					The slide that will be displayed first.
				</td>
			</tr>
			<tr>
				<td class="cs-name">Callbacks</td>
				<td class="cs-content">
					<?php
					if(!$edit || ($edit && stripslashes($slider['callbacks']) == '')) {
					// Sorry for this ugly indentation, ajax compatibility problems...
					?>
<textarea id="cs-slider-callbacks">
beforeStart : function() {},
beforeSetResponsive : function() {},
beforeSlideStart : function() {},
beforePause	: function() {},
beforeResume : function() {},</textarea>
					<?php
					}
					else echo '<textarea id="cs-slider-callbacks">' . stripslashes($slider['callbacks']) . '</textarea>';
					?>
				</td>
				<td class="cs-description">
					Some jQuery functions that you can fire during the slider execution.
				</td>
			</tr>
		</tbody>
	</table>
</div>
