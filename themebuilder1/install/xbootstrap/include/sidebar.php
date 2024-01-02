<?php 
 if (file_exists("../../mainfile.php")) {   
include("../../mainfile.php");  
} elseif (file_exists("../../../mainfile.php")) {   
include("../../../mainfile.php");  
} 

if (!function_exists('dynamic_sidebar')) {
	function dynamic_sidebar( $allo ){
	//echo '<{block id=1}>';
echo $allo;
	}
}
//include XOOPS_ROOT_PATH . '/header.php';
global $xoopsDB;
$sql22 = "SELECT * FROM " . $xoopsDB -> prefix( "config_theme" ) . " WHERE conf_id >= 67";
						$result22 = $xoopsDB -> query( $sql22 );
						$video_arrrrrm = $xoopsDB -> fetchArray( $result22 ); 
						
						$qwer = unserialize ($video_arrrrrm['conf_value']);
						//var_dump($qwer);
						
						if( is_array( $qwer ) ){
							$qwer1 ='';
							foreach ( $qwer as $child ) {
								$qwer1[] = reset($child['fields']);
								//var_dump($qwer1);
							}
						}


//var_dump($allo);

/*$arr = array('1', '5', '7', '6');
var_dump($arr);
$this->assign('blockid', $arr);*/
$this->assign('blockid', $qwer1);
 
?>