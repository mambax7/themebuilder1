<?php session_start();
include('mlib-config.php');

$method = $_POST['func'];
/*
if($method == ''){
die('No direct access. No access identifier found.');
}*/



if($method == 'load_thumbs'){

if($_REQUEST['ipp']==''){$ipp=30;} else {$ipp=$_REQUEST['ipp'];}
if($_REQUEST['page']==''){$page=0;} else {$page=$_REQUEST['page']-1;}
$offset = $page * $ipp;

$i=0;
$data = array();
$storeFolder = 'mlib-uploads/full/';
$domain = MLIBURL;
$files = scandir($storeFolder);
$g_files=count($files);
$files = array_slice($files,$offset,$ipp);
$total = sizeof($files);
$exclude = array( ".","..");
$allowextimg = array( 'jpg', 'png', 'gif', 'jpeg');
$i = 0;
foreach($files as $k=>$file){
	if(in_array($file,$exclude)){
		$i = 0;
		$file = '';
	}else{
		$file_path = $storeFolder.$file;
		$file_url = $domain.$storeFolder.$file;
		$date = date('d/m/Y H:i:s', filemtime($file_path));
		$size = filesize($file_path);
		$file_ext = substr(strrchr($file,'.'),1);
		if(in_array($file_ext,$allowextimg)){
			$thumb = get_image_thumb($file, 'w=150&h=150');
		}else{
				if(file_exists('mlib-includes/icons/100px/'.$file_ext.'.png')){
					$thumb = MLIBURL.'/mlib-includes/icons/100px/'.$file_ext.'.png';
				} else {
					$thumb = MLIBURL.'/mlib-includes/icons/100px/blank.png';
				}
			}
		$data[]=array('id'=>$k,'title'=>strtolower($file),'date'=>$date,'size'=>$size,'type'=>$file_ext,'url'=>strtolower($file_url), 'thumb'=>strtolower($thumb));
		$i++;
	}
}

$data['total'] = $i;
$data['page'] = $page+1;
$data['ipp'] = $ipp;
$data['gtotal'] = $g_files;
echo json_encode($data);
//var_dump ($data);
}

if($method == 'url_upload'){

$urls = explode("\n", $_POST['urls']);

foreach($urls as $url){
$url = trim($url);
if (filter_var($url, FILTER_VALIDATE_URL)) {
//$newurl = mlib_download_url($url);

$file = pathinfo($url);
$ext = strtolower($file['extension']);

if(in_array($ext, $mlib_allowed_images)){
$data = upload_from_url($url);
$thumb = get_image_thumb($data['fname'], 'w=150&h=150');
$url = MLIBURL.'mlib-uploads/full/'.$data['fname'];
//mysqli_query($mlib_db, "INSERT INTO `".MLIBPREFIX."uploads` (`id`, `type`, `title`, `caption`, `url`, `thumb`, `time`, `size`) 
//VALUES ('".$data['id']."', '".$data['ext']."', '".$data['title']."', '".$data['title']."', '".$url."', '$thumb', '".time()."', '1')");

echo'<b>Success : </b><i>'.$url.'</i> was uploaded.<br />';
} elseif(in_array($ext, $mlib_allowed_filetypes)){
$data = upload_from_url($url);
if(file_exists('mlib-includes/icons/100px/'.$data['ext'].'.png')){
$thumb = MLIBURL.'mlib-includes/icons/100px/'.$data['ext'].'.png';
} else {
$thumb = MLIBURL.'mlib-includes/icons/100px/blank.png';
}
$url = MLIBURL.'mlib-uploads/full/'.$data['fname'];
//mysqli_query($mlib_db, "INSERT INTO `".MLIBPREFIX."uploads` (`id`, `type`, `title`, `caption`, `url`, `thumb`, `time`, `size`) 
//VALUES ('".$data['id']."', '".$data['ext']."', '".$data['title']."', '".$data['title']."', '".$url."', '$thumb', '".time()."', '1')");
echo'<b>Success : </b><i>'.$url.'</i> was uploaded.<br />';
} else {
echo '<b>Error : </b><i>'.$ext.'</i> is not a valid file. No extension was found.<br />';
}

}
}

echo '<b>Processing is complete.</b><br />';

}


if($method=='mlib_delete_items'){
$i=0;
foreach($_POST['mlibname'] as $key => $val){
//$sql = "SELECT * FROM `".MLIBPREFIX."uploads` WHERE `id`='".$val."' AND `uid`='".$mlib_current_user."'";
//$data = mysqli_fetch_assoc(mysqli_query($mlib_db, $sql));

/* delete full image and thumb */
//if($mlib_current_user==$data['uid']){
mlib_delete_file(MLIBPATH.'/mlib-uploads/full/'.$val);
mlib_delete_file(MLIBPATH.'/mlib-uploads/thumbs/w=150&h=150___'.$val);
//mysqli_query($mlib_db, "DELETE FROM `".MLIBPREFIX."uploads` WHERE `id`='".$val."' AND `uid`='".$mlib_current_user."'");

++$i;
//}
}
//echo $val;
echo $i.' Files were deleted from the seleted '.count($_POST['mlibid']).' files';
}


if($method=='mlib_create_import_method'){
$title = htmlentities($_POST['name'], ENT_QUOTES, "UTF-8");
$data = htmlentities($_POST['data'], ENT_QUOTES, "UTF-8");
//mysqli_query($mlib_db, "INSERT INTO `mlib_import` (`id`, `title`, `content`, `time`) VALUES (NULL, '$title', '$data', '".time()."')");
echo'Import method created successfully.';
}

if($method=='mlib_get_import_methods'){
$data = array();
$i = 0;
//$qry = mysqli_query($mlib_db, "SELECT * FROM `mlib_import`");
/*while($row = mysqli_fetch_assoc($qry)){
$data[$i] = $row;
$data[$i]['title'] = html_entity_decode($row['title'], ENT_QUOTES, "UTF-8");
$data[$i]['content'] = html_entity_decode($row['content'], ENT_QUOTES, "UTF-8");
$data[$i]['contentx'] = $row['content'];
++$i;
}*/

$data['total'] = $i;
echo json_encode($data);
}


if($method=='mlib_single_edit'){
$local = dirname(__FILE__);
$titleoriginal = $local.'/mlib-uploads/full/' . $_POST['mlibid'];
$title = htmlentities($local.'/mlib-uploads/full/' . $_POST['title'], ENT_QUOTES, "UTF-8");
$caption = htmlentities($_POST['caption'], ENT_QUOTES, "UTF-8");
//mysqli_query($mlib_db, "UPDATE `mlib_uploads` SET `title`='$title', `caption`='$caption' WHERE `id`='".$_POST['mlibid']."'");
if (file_exists($titleoriginal)) {
   /*generate the $new_file_path, with the code given you before*/
   rename($titleoriginal,$title);
   echo 'yes';
}else{echo 'no';}
}

if($method=='mlib_save_type'){
$title = htmlentities($_POST['title'], ENT_QUOTES, "UTF-8");
$content = htmlentities($_POST['content'], ENT_QUOTES, "UTF-8");
//mysqli_query($mlib_db, "UPDATE `mlib_import` SET `title`='$title', `content`='$content' WHERE `id`='".$_POST['mlibtypeid']."'");
}

/* Destroy db connection if it exists */
//if($mlib_db){mysqli_close($mlib_db);}
?>