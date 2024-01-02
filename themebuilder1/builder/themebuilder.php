<?php
$op = system_CleanVars ( $_REQUEST, 'action', 'default', 'string' );
switch ( $op ) {
	
	case 'delpagebuilder':

		//$pageid = (isset($_POST['pageid']) && is_numeric($_POST['pageid'])) ? intval($_POST['pageid']) : intval($_GET['pageid']);
		$pageid = (isset($_POST['pageid'])) ? $_POST['pageid'] : $_GET['pageid'];
		echo 'del'. $pageid;
		$ok = (isset($_POST['ok']) && $_POST['ok'] == 1) ? intval($_POST['ok']) : 0;		
		if ($ok == 1){
			global $xoopsDB;
			$xoopsDB->queryF("DELETE FROM " . $xoopsDB->prefix("config_theme") . " WHERE conf_name = '$pageid'");
			redirect_header("admin.php?fct=themebuilder1&op=ThemeBuilder", 5, _AM_PAGE_ID_DELETED);
			exit();
		//echo 'delete from db après confirmation '.$pageid;
		}else{
			xoops_confirm(array('pageid' => $_GET['pageid'], 'ok' => 1), 'admin.php?fct=themebuilder1&op=ThemeBuilder&action=delpagebuilder', _AM_ARABESK125dotNET_OOOOOOOOOOOO_AREUSURE);
		}
	
	break;
	
	case 'clonepagebuilder':
	
		function xoops_confirmk($hiddens, $action, $msg, $submit = 'clone'){
			$submit = ($submit != '') ? trim($submit) : _SUBMIT;
			echo '<div class="confirmMsg">clone page<br /><form method="post" action="' . $action . '">';
			echo $msg;
			echo '<br>';
			foreach ($hiddens as $name => $value) {
				if (is_array($value)) {
					foreach ($value as $caption => $newvalue) {
						echo '<input type="radio" name="' . $name . '" value="' . htmlspecialchars($newvalue) . '" /> ' . $caption;
					}
					echo '<br />';
				} else {
					echo '<input type="hidden" name="' . $name . '" value="' . htmlspecialchars($value) . '" />';
				}
			}
	
			echo '<input type="submit" name="confirm_submit" value="' . $submit . '" title="' . $submit . '"/>
				<input type="button" name="confirm_back" value="' . _CANCEL . '" onclick="javascript:history.go(-1);" title="' . _CANCEL . '" />
				</form>
				</div>';
		}
	
		$pageid = (isset($_POST['pageid']) && is_numeric($_POST['pageid'])) ? intval($_POST['pageid']) : intval($_GET['pageid']);
		echo 'clone '. $pageid;
		$ok = (isset($_POST['ok']) && $_POST['ok'] == 1) ? intval($_POST['ok']) : 0;		
		if ($ok == 1 && $_POST['confirm_submit'] == 'clone'){
			global $xoopsDB;
			$titleexist = " SELECT * FROM " . $xoopsDB -> prefix( 'config_theme' ) . " WHERE conf_id = '" . $pageid . "'";
			$resultexist = $xoopsDB->query($titleexist);
			$resultexists = $xoopsDB -> fetchArray( $resultexist );
			if ($resultexists['conf_title'] != $_POST['mfn-item-titre']) {
				$sqltemplate = "INSERT INTO " . $xoopsDB -> prefix('config_theme') . " (conf_id, conf_name, conf_value, conf_title, conf_desc, conf_modid) VALUES ('', 'pagebuilder', '".$resultexists['conf_value']."', '".$_POST['mfn-item-titre']."', '".$resultexists['conf_desc']."', '".$_POST['selection']."')";
				if ($resulttemplate = $xoopsDB -> queryF( $sqltemplate)) {
					$message = _AM_PAGE_ID_CLONED;
				}
			}else{
				$message = _AM_PAGE_ID_PROB_SECURITY;
			}
				redirect_header("admin.php?fct=themebuilder1&op=pagebuilder", 5, $message);
				exit();
		}else{
			xoops_confirmk(array('pageid' => $_GET['pageid'], 'ok' => 1), 'admin.php?fct=themebuilder1&op=pagebuilder&action=clonepagebuilder', '<div class="">Titre de la page: <input class="text-input" size="35" name="mfn-item-titre" type="text" placeholder="Your page titre" data-msg-required="This field is required." required=""></div>
			<label><input name="selection" type="radio" value="1" checked="checked"> افتراضي</label><code>'.XOOPS_URL.'/page.php?op=123</code><br><label><input name="selection" type="radio" value="2"> رقمي</label><code>'.XOOPS_URL.'/page/123</code><br><label><input name="selection" type="radio" value="3"> عنوان المقالة</label><code>'.XOOPS_URL.'/sample-post/</code>');
		}
	
	break;
	
		case 'modpagebuilderwrap':
	
		include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/builder/wraper.php';
		$templetebuilderid = (isset($_POST['pageid'])) ? $_POST['pageid'] : $_GET['pageid'];
		echo 'mod'. $templetebuilderid;

		$sqly = "SELECT * FROM ".$xoopsDB->prefix("modules")." WHERE name != ''";
		$resulty = $xoopsDB->query($sqly);
		while ( $myrow = $xoopsDB->fetchArray($resulty) ) {
			$variable1 = $myrow['dirname'];
			if ($myrow['dirname'] == 'protector'){
				continue;
			}
			//var_dump($variable1);
			if ($variable1 == 'system'){
				if ( $templetebuilderid == 'system_homepage') {
					olivee_wajdi('system_homepage', $pageid = false);
				}
				if ( $templetebuilderid == 'default_template') {
					olivee_wajdi('default_template', $pageid = false);
				}
				if ( $templetebuilderid == 'sytem_siteclosed') {
					include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/include/siteclosed.php';
				}
			//continue;
			}
			
			if ( $templetebuilderid == $variable1.'_template') {
				olivee_wajdi($variable1.'_template', $pageid = false);
			}
		}
		
	break;
	
	default:

		echo '<div id="olivee-builder">
			<div id="olivee-content">
				<div class="olivee-add-item">
					<table class="form-table">
						<tbody>
							<tr>
								<td>
									<div class="xo-buttons">';
			echo '<a class="tooltip" href="admin.php?fct=themebuilder1&op=blockbuilder" title="Block_Builder <br /> ajouter des blocks <br /> predefinis">
					<img src="'.XOOPS_URL.'/modules/system/images/icons/default/block.png" style="width:80px; height: 70px;" alt="Block_Builder <br /> ajouter des blocks <br /> predefinis">
					<br><span>Block_Builder</span></a>
					<a class="tooltip" href="admin.php?fct=themebuilder1&op=pagebuilder" title="Page_Builder <br /> ajouter des pages <br /> à xoops">
					<img src="'.XOOPS_URL.'/modules/system/images/icons/default/block.png" style="width:80px; height: 70px;" alt="Page_Builder <br /> ajouter des pages <br /> xoops">
					<br><span>Page_Builder</span></a>
					<a class="tooltip" href="admin.php?fct=themebuilder1&op=layoutbuilder" title="layout_Builder <br /> ajouter des layout <br /> predefinis">
					<img src="'.XOOPS_URL.'/modules/system/images/icons/default/block.png" style="width:80px; height: 70px;" alt="Layout_Builder <br /> ajouter des layout <br /> predefinis">
					<br><span>layout_Builder</span></a>';
			echo '	</div>
				</div>
								</td>
							</tr>	
						</tbody>
					</table>
				</div>
			</div>
		</div>';
	
		echo '<table width="100%" cellspacing="1" class="outer" summary>
			<tr>
				<th style="text-align: center; font-size: smaller;">ID</th>
				<th style=" font-size: smaller;"><b>TITLE</th>
				<th style="text-align: center; font-size: smaller;">DESCRIPTION</th>
				<th style="text-align: center; font-size: smaller;">ACTION</th>
			</tr>';	
		global $xoopsDB;
		$dirmodules = array();
			$sqly = "SELECT * FROM ".$xoopsDB->prefix("modules")." WHERE name != ''";
			$resulty = $xoopsDB->query($sqly);
				while ( $myrow = $xoopsDB->fetchArray($resulty) ) {
					if ($myrow['dirname'] == 'protector'){
						continue;
					}
					if ($myrow['dirname'] == 'system'){
						$dirmodules[] = 'default_template';
					}else{
						$dirmodules[] = $myrow['dirname'].'_template';
					}
				}
		$dirmodules[] = 'sytem_siteclosed';
		$dirmodules[] = 'system_homepage';
		foreach($dirmodules as $key => $value){
			$icon = '<a href="admin.php?fct=themebuilder1&op=ThemeBuilder&action=delpagebuilder&amp;pageid=' . $value . '" title="DELETE"><img src="./images/icons/default/delete.png" alt="DELETE this template"></a>&nbsp;';
			$icon .= '<a href="admin.php?fct=themebuilder1&op=ThemeBuilder&action=modpagebuilderwrap&amp;pageid=' . $value . '" title="MODIFY"><img src="./images/icons/default/edit.png" alt="MODIFY this template"></a>';
			$icon .= '<a href="admin.php?fct=themebuilder1&op=ThemeBuilder&action=clonepagebuilder&amp;pageid=' . $value . '" title="CLONE"><img src="./images/icons/default/clone.png" alt="CLONE this template"></a>';
			$icon .= '<a href="admin.php?fct=themebuilder1&op=ThemeBuilder&action=exporter&amp;exporterid=page&amp;pageid=' . $value . '" title="EXPORT"><img src="./images/icons/default/clone.png" alt="Export this template"></a>';
	
			echo '<tr style="text-align: center; font-size: smaller;">
					<td class="head">' . $key . '</small></td>
					<td class="even" style="text-align: left;">' . $value . '</td>
					<td class="even">Theme for '.$value.'</td>
					<td class="even" style="text-align: center; width: 6%; white-space: nowrap;">' . $icon . '</td>
				</tr>';
		}
		
		echo '</table>';
			
			
	break;
		
	}
?>