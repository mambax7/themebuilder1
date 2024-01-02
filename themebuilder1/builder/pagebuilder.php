<?php
$op = system_CleanVars ( $_REQUEST, 'action', 'default', 'string' );
switch ( $op ) {

		case 'delpagebuilder':

			$pageid = (isset($_POST['pageid']) && is_numeric($_POST['pageid'])) ? intval($_POST['pageid']) : intval($_GET['pageid']);
			echo 'del'. $pageid;
			$ok = (isset($_POST['ok']) && $_POST['ok'] == 1) ? intval($_POST['ok']) : 0;		
			if ($ok == 1){
				global $xoopsDB;
				$xoopsDB->queryF("DELETE FROM " . $xoopsDB->prefix("config_theme") . " WHERE conf_id = '$pageid'");
				redirect_header("admin.php?fct=themebuilder1&op=pagebuilder", 5, _AM_PAGE_ID_DELETED);
				exit();
			//echo 'delete from db après confirmation '.$pageid;
			}else{
				xoops_confirm(array('pageid' => $_GET['pageid'], 'ok' => 1), 'admin.php?fct=themebuilder1&op=pagebuilder&action=delpagebuilder', _AM_ARABESK125dotNET_OOOOOOOOOOOO_AREUSURE);
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
			xoops_confirmk(array('pageid' => $_GET['pageid'], 'ok' => 1), 'admin.php?fct=themebuilder1&op=pagebuilder&action=clonepagebuilder', '<div class="">Titre de la page: <input class="text-input" size="130" name="mfn-item-titre" type="text" placeholder="Your page titre" data-msg-required="This field is required." required=""></div>
			<label><input name="selection" type="radio" value="1" checked="checked"> افتراضي</label><code>'.XOOPS_URL.'/page.php?op=123</code><br><label><input name="selection" type="radio" value="2"> رقمي</label><code>'.XOOPS_URL.'/page/123</code><br><label><input name="selection" type="radio" value="3"> عنوان المقالة</label><code>'.XOOPS_URL.'/sample-post/</code>');
		}
		
		break;

		case 'modpagebuilderwrap':
		
			$pageid = (isset($_POST['pageid'])) ? $_POST['pageid'] : $_GET['pageid'];
			echo 'mod'. $pageid;
			include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/builder/wraper.php';
			olivee_wajdi( 'pagebuilder', $pageid );

		break;
		
		case 'addpagebuilder':
		
			include XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/builder/wraper.php';
			echo 'add';
			olivee_wajdi( 'pagebuilder', $pageid = false );
			
		break;
		
		default:
		
echo '<div class="floatright">
		<div class="xo-buttons">
			<a class="ui-corner-all tooltip" href="admin.php?fct=themebuilder1&op=pagebuilder&action=addpagebuilder" title="Add Page">
				<img src="./images/icons/default/add.png" alt="" title="Add Page">
				Add Page
			</a>
			<a class="ui-corner-all tooltip" href="admin.php?fct=themebuilder2&op=pagebuilder&action=importer&importerid=page" title="Import Page">
				<img src="./images/icons/default/add.png" alt="" title="Import Page">
				Import Page
			</a>
		</div>
	</div>';

global $xoopsDB;
$sql21 = "SELECT distinct conf_modid, conf_id, conf_name, conf_title, conf_value FROM " . $xoopsDB -> prefix("config_theme") . " WHERE conf_name = 'pagebuilder' ORDER BY conf_id DESC";
$result21 = $xoopsDB -> query($sql21);
	echo '<table width="100%" cellspacing="1" class="outer" summary>
			<tr>
				<th style="text-align: center; font-size: smaller;">ID</th>
				<th style=" font-size: smaller;"><b>TITLE</th>
				<th style="text-align: center; font-size: smaller;">SMARTY</th>
				<th style="text-align: center; font-size: smaller;">URL</th>
				<th style="text-align: center; font-size: smaller;">ACTION</th>
			</tr>';				
	while (list($conf_modid, $conf_id, $conf_name, $conf_title, $conf_value) = $xoopsDB -> fetchRow($result21)) {
		$icon = '<a href="admin.php?fct=themebuilder1&op=pagebuilder&action=delpagebuilder&amp;pageid=' . $conf_id . '" title="DELETE"><img src="./images/icons/default/delete.png" alt="DELETE this Block"></a>&nbsp;';
		$icon .= '<a href="admin.php?fct=themebuilder1&op=pagebuilder&action=modpagebuilderwrap&amp;pageid=' . $conf_id . '" title="MODIFY"><img src="./images/icons/default/edit.png" alt="MODIFY this Block"></a>';
		$icon .= '<a href="admin.php?fct=themebuilder1&op=pagebuilder&action=clonepagebuilder&amp;pageid=' . $conf_id . '" title="CLONE"><img src="./images/icons/default/clone.png" alt="CLONE this Block"></a>';
		$icon .= '<a href="admin.php?fct=themebuilder1&op=pagebuilder&action=exporter&amp;exporterid=page&amp;pageid=' . $conf_id . '" title="CLONE"><img src="./images/icons/default/clone.png" alt="CLONE this Block"></a>';
			if ($conf_modid == 1) {
			$url = XOOPS_URL."/page.php?op=".$conf_id."";
			}elseif ($conf_modid == 2) {
			$url = XOOPS_URL."/test/".$conf_id."/";
			}elseif ($conf_modid == 3) {
			$url = XOOPS_URL."/test/".$conf_title."/";
			}	
		echo '<tr style="text-align: center; font-size: smaller;">
				<td class="head">' . $conf_id . '</small></td>
				<td class="even" style="text-align: left;">' . $conf_title . '</td>
				<td class="even">'.$conf_name.'</td>
				<td class="even"><a href="'.$url.'" target="_blank" title="'.$url.'">'.$url.'</a></td>
				<td class="even" style="text-align: center; width: 6%; white-space: nowrap;">' . $icon . '</td>
			</tr>';
	}
	echo '</table>';
		
		break;
		
	}
?>