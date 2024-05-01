<?php

$file            = $_FILES['qqfile'];
$uploadDirectory = 'uploads';
$target          = $uploadDirectory . DIRECTORY_SEPARATOR . $file['name'];
$result          = null;
if (move_uploaded_file($file['tmp_name'], $target)) {
    $result               = ['success' => true];
    $result['uploadName'] = $file['name'];
} else {
    $result = ['error' => 'Upload failed'];
}
header("Content-Type: text/plain");
echo json_encode($result);

?>
