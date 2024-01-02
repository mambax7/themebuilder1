<?php

$error=array();

		if (!ini_get('allow_url_fopen')) {
			$error['warning'] = 'Warning: allow_url_fopen configuration needs to be activated for Theme Builder to work!';
		}

		if (!function_exists( 'fsockopen' )) {
			$error['warning'] = 'Warning: fsockopen extension needs to be loaded for Theme Builder to work!';
		}
		
		if (!is_writable( '../../../constants.php')) {
			$error['warning'] = 'Warning: constants.php needs to be writable for Theme Builder to be installed !';
		}
		
		if (!is_writable( '../../../language/english/admin/')) {
			$error['warning'] = 'Warning: Folder needs to be writable for Theme Builder to be installed !';
		}

?>

<div id="gCtr">
<h1 style="background: url('image/installation.png') no-repeat;">Step 2 - Pre-Installation</h1>
<div style="width: 100%; display: inline-block;">
  <div style="float: left; width: 569px;">
    <?php if (isset($error['warning'])) { ?>
    <div id="warning" class="warning"><?php echo $error['warning']; ?></div>
    <?php } ?>
      <p>1. Please configure your PHP settings to match requirements listed below.</p>
      <div class="inner">
        <table width="100%">
          <tr>
            <th width="35%" align="left"><b>Extension</b></th>
            <th width="25%" align="left"><b>Current Settings</b></th>
            <th width="25%" align="left"><b>Required Settings</b></th>
            <th width="15%" align="center"><b>Status</b></th>
          </tr>
          <tr>
            <td>allow_url_fopen:</td>
            <td><?php echo ini_get( 'allow_url_fopen' ) ? 'On' : 'Off'; ?></td>
            <td>On</td>
            <td align="center"><?php echo ini_get( 'allow_url_fopen' ) ? '<img src="image/good.png" alt="Good" />' : '<img src="image/bad.png" alt="Bad" />'; ?></td>
          </tr>
           <tr>
            <td>fsockopen:</td>
            <td><?php echo function_exists( 'fsockopen' ) ? 'On' : 'Off'; ?></td>
            <td>On</td>
            <td align="center"><?php echo function_exists( 'fsockopen' ) ? '<img src="image/good.png" alt="Good" />' : '<img src="image/bad.png" alt="Bad" />'; ?></td>
          </tr>
        </table>
      </div>
      <p>2. Please make sure you have set the correct permissions on the files and folder list below.</p>
      <div class="inner">
        <table width="100%">
          <tr>
            <th align="left"><b>Files</b></th>
            <th width="15%" align="left"><b>Status</b></th>
          </tr>
           <tr>
            <td><?php echo '/modules/system/constants.php'; ?></td>
            <td><?php echo is_writable( '../../../constants.php') ? '<span class="good">Writable</span>' : '<span class="bad">Unwritable</span>'; ?></td>
			</tr>
			<tr>
            <th align="left"><b>Folder</b></th>
            <th width="15%" align="left"><b>Status</b></th>
          </tr>
           <tr>
			<td><?php echo '/modules/system/language/english/admin/'; ?></td>
            <td><?php echo is_writable( '../../../language/english/admin/') ? '<span class="good">Writable</span>' : '<span class="bad">Unwritable</span>'; ?></td>

          </tr>
        </table>
      </div>
      <div style="text-align: right;"><a id="stp2" class="button"></a></div>
  </div>
  <div id="sidebar">
    <ul>
      <li><del>Welcome</del></li>
      <li><b>Pre-Installation</b></li>
      <li>Configuration</li>
      <li>Finished</li>
    </ul>
  </div>
</div>
</div>