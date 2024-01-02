<?php
		
		$exporterid = (isset($_POST['exporterid'])) ? $_POST['exporterid'] : $_GET['exporterid'];
		$menuid = $_GET['menuid'];
if ( $exporterid == 'menu') {

echo 'export menu
array with option of menu
array with all level of menu ';


			global $xoopsDB;
								$sql2 = "SELECT distinct conf_id, conf_name, conf_value, conf_desc FROM " . $xoopsDB -> prefix("config_theme") . " WHERE conf_id =" . $menuid;
									$result2 = $xoopsDB -> query($sql2);
									 $video_array = $xoopsDB -> fetchArray( $result2 );
									 //var_dump($video_array);
									 
		$sql = "SELECT distinct id, label, catmenu, link, parent, sort, icons, class FROM ".$xoopsDB->prefix("config_theme_menu")." WHERE catmenu = ". $menuid ." ORDER BY parent ASC";
		$result = $xoopsDB->query($sql);
		while (list($id, $label, $catmenu, $link, $parent, $sort, $icons, $class) = $xoopsDB->fetchRow($result)) {
		$video_array1['id'] = $id;
		$video_array1['label'] = $label;
		$video_array1['link'] = $link;
		$video_array1['parent'] = $parent;
		$video_array1['sort'] = $sort;
		$video_array1['class'] = $class;
		$video_array1['icons'] = $icons;
		$video_array2[] = $video_array1;
		}
		//$video_array3['tttt'] = $video_array2;
		
		
		foreach( $video_array2 as $item => $key ){
			if($key['parent'] == 0){
			}else{
				foreach( $video_array2 as $item1 => $key1 ){
					if($key['parent'] == $key1['id']){
					$key['parent'] = $key1['label'];
					}
				}
				
			}	

		$video_array10['id'] = $key['id'];
		$video_array10['label'] = $key['label'];
		$video_array10['link'] = $key['link'];
		$video_array10['parent'] = $key['parent'];
		$video_array10['sort'] = $key['sort'];
		$video_array10['class'] = $key['class'];
		$video_array10['icons'] = $key['icons'];
		$video_array20[] = $video_array10;			

		
		$video_array3['tttt'] = $video_array20;
		}
	//var_dump(array_merge($video_array, $video_array3));	
		
		
$serialisedarraymerge = serialize(array_merge($video_array, $video_array3));	
	//var_dump($serialisedarraymerge);
	//var_dump(array_merge($video_array, $video_array3));
	
	$OptionData = __DIR__ .'/Importexport/menu_'.$menuid.'_Data.txt';
													$r = @fopen($OptionData, 'w+');
															if ($r) {																
																	  @fputs($r, $serialisedarraymerge."\n");
																$message .= ' <br>menu_'.$menuid.'Data.txt est a jour';
																$message .= $OptionData;
															  @fclose($r);
								//redirect_header("admin.php?fct=themebuilder&op=exporter&exporterid=option", 5, $message);
								//exit();	
															}else{
																$message .= ' <br>probleme avec fopen menu_'.$menuid.'Data.txt';
																$message .= $OptionData;
																
															}echo $message;
							$file = __DIR__ .'/Importexport/menu_'.$menuid.'_Data.txt';
							echo '
							<h3>Backup/Export</h3>
												<p>Here are the stored settings for the current theme:</p>
												<p><textarea class="widefat code" rows="20" cols="100" onclick="this.select()">';
												 readfile($file);
												echo '</textarea></p>
												<p><a href="admin/themebuilder/down.php?fct=themebuilder&op=exporter&exporterid=menu&menuid='.$menuid.'&action=download" class="button-secondary">Download as file</a></p>
							
							';	
	
	
	
}
if ( $exporterid == 'slider') {

echo 'export slider
array with option of slider
array with all level of slider
';

}
		
if ( $exporterid == 'option') {
							$file = __DIR__ .'\Importexport\OptionsData.txt';
							echo '
							<h3>Backup/Export</h3>
												<p>Here are the stored settings for the current theme:</p>
												<p><textarea class="widefat code" rows="20" cols="100" onclick="this.select()">';
												 readfile($file);
												echo '</textarea></p>
												<p><a href="admin/themebuilder/down.php?fct=themebuilder&op=exporter&exporterid=option&action=download" class="button-secondary">Download as file</a></p>
							';
}

if ( $exporterid == 'template') {
							$templateid = (isset($_POST['templateid'])) ? $_POST['templateid'] : $_GET['templateid'];

							global $xoopsDB;
	$sqlt = "SELECT conf_value FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_name = '".$templateid."'";
	$mod1 = $xoopsDB -> fetchArray( $xoopsDB -> query( $sqlt ) );
	$mod = $mod1['conf_value'];
							$OptionData = __DIR__ .'/Importexport/'.$templateid.'_Data.txt';
													$r = @fopen($OptionData, 'w+');
															if ($r) {																
																	  @fputs($r, $mod."\n");
																$message .= ' <br>OptionsData.txt est a jour';
																$message .= $OptionData;
															  @fclose($r);
								//redirect_header("admin.php?fct=themebuilder&op=exporter&exporterid=option", 5, $message);
								//exit();	
															}else{
																$message .= ' <br>probleme avec fopen OptionsData.txt';
																$message .= $OptionData;
																
															}echo $message;
							$file = __DIR__ .'/Importexport/'.$templateid.'_Data.txt';
							echo '
							<h3>Backup/Export</h3>
												<p>Here are the stored settings for the current theme:</p>
												<p><textarea class="widefat code" rows="20" cols="100" onclick="this.select()">';
												 readfile($file);
												echo '</textarea></p>
												<p><a href="admin/themebuilder/down.php?fct=themebuilder&op=exporter&exporterid=template&templateid='.$templateid.'&action=download" class="button-secondary">Download as file</a></p>
												';	
							
							}
if ( $exporterid == 'page') {
//echo 'page';

							$pageid = (isset($_POST['pageid'])) ? $_POST['pageid'] : $_GET['pageid'];

							global $xoopsDB;
	$sqlt = "SELECT * FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_id = '".$pageid."'";
	$mod1 = $xoopsDB -> fetchArray( $xoopsDB -> query( $sqlt ) );
	$mod = serialize($mod1);
							$OptionData = __DIR__ .'/Importexport/'.$exporterid.'_'.$pageid.'_Data.txt';
													$r = @fopen($OptionData, 'w+');
															if ($r) {																
																	  @fputs($r, $mod."\n");
																$message .= ' <br>'.$exporterid.'_'.$pageid.'_Data.txt est a jour';
																$message .= $OptionData;
															  @fclose($r);
								//redirect_header("admin.php?fct=themebuilder&op=exporter&exporterid=option", 5, $message);
								//exit();	
															}else{
																$message .= ' <br>probleme avec fopen OptionsData.txt';
																$message .= $OptionData;
																
															}echo $message;
							$file = __DIR__ .'/Importexport/'.$exporterid.'_'.$pageid.'_Data.txt';
							echo '
							<h3>Backup/Export</h3>
												<p>Here are the stored settings for the current theme:</p>
												<p><textarea class="widefat code" rows="20" cols="100" onclick="this.select()">';
												 readfile($file);
												echo '</textarea></p>
												<p><a href="admin/themebuilder/down.php?fct=themebuilder&op=exporter&exporterid=page&pageid='.$pageid.'&action=download" class="button-secondary">Download as file</a></p>
												';	












			}
?>