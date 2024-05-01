<?php
/* ============================ CONFIGURATION START ============================= */

/* This is a relative filepath where you have kept this file */
define('MLIBPATH', __DIR__ . '/');

/* This is a relative URL where you have kept this file */
define('MLIBURL', str_replace("mlib.php", "", (string) $_SERVER['PHP_SELF']));

/* Table Prefixes of this plugin, if you dont know what it is, do not change anything */
define('MLIBPREFIX', 'mlib_');

/* If you want to use it for multiple people, then you must fetch the user id in your user system instead of 1. If you are using this plugin just for 1 admin, there is no need to do anything */
$mlib_current_user = 1;

/* image and file extensions to be allowed. If any extention is not list here, it will not get uploaded even if you allow via javascript in webpages. */
$mlib_allowed_images    = ["jpg", "jpeg", "png", "gif", "avi", "mp4", "ogg", "mp3"];
$mlib_allowed_filetypes = ["txt", "pdf", "doc", "docx", "ppt", "zip", "rar"];

/* database connection settings - host, username, password, database */
//$mlib_db = new mysqli("localhost", "root", "", "mlib");

/* ============================= CONFIGURATION END =============================== */

/*
if($mlib_db->connect_errno > 0){
    die('<h1>Unable to connect to database [' . $mlib_db->connect_error . ']</h1>');
}*/

function get_image_thumb($thumb, $query)
{
    $domain = MLIBURL;

    if (file_exists('mlib-uploads/thumbs/' . $query . '___' . $thumb)) {
        return $domain . '/mlib-uploads/thumbs/' . $query . '___' . $thumb;
    } else {
        $get_file1 = file_get_contents($domain . 'mlib-uploads/timthumb.php?src=' . $domain . 'mlib-uploads/full/' . $thumb . '&' . $query);
        $new_file1 = fopen('mlib-uploads/thumbs/' . $query . '___' . $thumb, "w");
        fwrite($new_file1, $get_file1);
        fclose($new_file1);
        return $domain . '/mlib-uploads/thumbs/' . $query . '___' . $thumb;
    }
}

function upload_from_url($url)
{
    $domain    = MLIBURL;
    $fname     = pathinfo((string) $url);
    $ext       = strtolower($fname['extension']);
    $title     = slugify($fname['filename']);
    $get_file1 = file_get_contents($url);
    $new_file1 = fopen('mlib-uploads/full/' . $title . '.' . $ext, "w");
    fwrite($new_file1, $get_file1);
    fclose($new_file1);

    $data['fname'] = $title . '.' . $ext;
    $data['id']    = $title;
    $data['title'] = $fname['filename'];
    $data['ext']   = $ext;
    return $data;
}

function slugify($text, $timestamp = 'yes')
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', (string) $text);

    // trim
    $text = trim($text, '-');

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('~[^\-\w]+~', '', $text);

    if (empty($text)) {
        return 'n-a';
    }

    if ($timestamp == 'yes') {
        return $text . '-' . uniqid();
    } else {
        return $text;
    }
}

function directory_size($path)
{ /*--------Gives folder size in bytes--------*/
    if (!file_exists($path)) {
        return 0;
    }
    if (is_file($path)) {
        return filesize($path);
    }
    $ret = 0;
    foreach (glob($path . "/*") as $fn) {
        $ret += directory_size($fn);
    }
    return $ret;
}

function display_size($size)
{ /*-----------Gives size in mb,kb,gb from bytes-------------*/
    $sizes = ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
    if ($retstring === null) {
        $retstring = '%01.2f %s';
    }
    $lastsizestring = end($sizes);
    foreach ($sizes as $sizestring) {
        if ($size < 1024) {
            break;
        }
        if ($sizestring != $lastsizestring) {
            $size /= 1024;
        }
    }
    if ($sizestring == $sizes[0]) {
        $retstring = '%01d %s';
    }
    return sprintf($retstring, $size, $sizestring);
}

function empty_directory($dir)
{ /*-----------Deletes all files in folder, path must end with slash-------------*/
    foreach (glob($dir . '*.*') as $v) {
        unlink($v);
    }
}

function mlib_delete_file($file)
{
    if (file_exists($file)) {
        unlink($file);
    }
}

?>
