<?php

header( 'Content-Type: text/html' );



$start = 0;
$end = 8;
$value = 0;

if( isset( $_GET[ 's'] ) ) {

	$taintedStart = $_GET[ 's' ];

	if( strlen( $taintedStart ) <= 2 ) {

		$s = intval( $taintedStart );
	

		if( filter_var( $s, FILTER_VALIDATE_INT ) ) {

			if( $s > $start ) {
				$start = $s;
			}

		

		}


	}

}

$value = ( $start * $end ) - $end;

				$local = dirname(__FILE__);
				$location = str_replace('\modules\system\admin\themebuilder\fields\uploads', '', $local);
			$bg_images_path = $location.'/themes/themebuilder/texture/bg/'; // change this to where you store your bg images
			$bg_images_url = $location.'/themes/themebuilder/texture/bg/'; // change this to where you store your bg images
			$bg_images = array();
			$ht = $_SERVER['PHP_SELF'];
			$htl = str_replace('/modules/system/admin/themebuilder/fields/uploads/ajax.php', '', $ht);			
			if ( is_dir($bg_images_path) ) {
				if ($bg_images_dir = opendir($bg_images_path) ) {
$limit = $start * $end; //Or just for dynamic limit - (int)$_GET['limit'];
$skip = $value;
$skipped = 0;
echo "
<script type='text/javascript'>
jQuery(document).ready(function($){
	
	$('.mfn-iconn-selectt .mfn-iconn').click(function(){

		var field = $(this).closest('.mfn-iconn-fieldd');
		var input = field.find('.mfn-iconn-input');
		
		var icon = $(this).attr('data-rel');
		
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
		input.val( icon );			
			
	});
});	

</script>
";
				$bg_images[] = 'none';
					while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
						if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false || stristr($bg_images_file, ".gif") !== false || stristr($bg_images_file, ".mp4") !== false || stristr($bg_images_file, ".ogv") !== false) {

		$skipped++;
        if ($skipped < $skip || $skipped >= $limit) {
            continue;
        }						
					//$iclass = ( $value == $htl.'/themes/themebuilder/texture/bg/'.$bg_images_file ) ? ' active' : '';
					echo '<img src="'.$htl.'/themes/themebuilder/texture/bg/'.$bg_images_file.'" class="mfn-iconn'. $iclass .'" data-rel="'.$htl.'/themes/themebuilder/texture/bg/'.$bg_images_file.'" alt="'.$bg_images_file.'">';
					
						}
					}    
				}
			}

//$html = 'ddddddddddddddddddddddd';
//echo $html;

?>