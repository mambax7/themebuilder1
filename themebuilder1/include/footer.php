<?php
case
'footer':

		echo '<fieldset><legend class="label">Add Footer to page Builder</legend>
				<span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> page builder</span>
				<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> Contact page builder</span>
				<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> Team page builder</span>
				<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> About page builder</span>
				<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> Help page builder</span>
				<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> ' . _AM_SYSTEM_THEMEBUILDER_YOUCAN6 . '</span>
				<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> ' . _AM_SYSTEM_THEMEBUILDER_YOUCAN7 . '</span>
			</fieldset>';
		echo '<div class="floatright">
				<div class="xo-buttons">
					<a class="ui-corner-all tooltip" href="admin.php?fct=themebuilder&op=addfooter" title="Add Footer">
						<img src="./images/icons/default/add.png" alt="" title="Add Footer">
						Add Footer
					</a>   
				</div>
			</div>';

global $xoopsDB;
	$sql21    = "SELECT distinct conf_modid, conf_id, conf_name, conf_title, conf_value FROM " . $xoopsDB->prefix("config_theme") . " WHERE conf_name = 'footer' ORDER BY conf_id DESC";
	$result21 = $xoopsDB->query($sql21);
	echo '<table width="100%" cellspacing="1" class="outer" summary>
			<tr>
				<th style="text-align: center; font-size: smaller;">ID</th>
				<th style=" font-size: smaller;"><b>TITLE</th>
				<th style="text-align: center; font-size: smaller;">SMARTY</th>
				<th style="text-align: center; font-size: smaller;">ACTION</th>
			</tr>';
	if (!$row = $xoopsDB->getRowsNum($result21)) {
        echo '<tr><td>Il n\'y\'a aucun footer enregistré</td></tr>';
    } else {
        while (list($conf_modid, $conf_id, $conf_name, $conf_title, $conf_value) = $xoopsDB->fetchRow($result21)) {
            $icon = '<a href="admin.php?fct=themebuilder&op=delfooter&amp;footerid=' . $conf_id . '" title="DELETE"><img src="./images/icons/default/delete.png" alt="DELETE this Block"></a>&nbsp;';
            $icon .= '<a href="admin.php?fct=themebuilder&op=modfooter&amp;footerid=' . $conf_id . '" title="MODIFY"><img src="./images/icons/default/edit.png" alt="MODIFY this Block"></a>';
            $icon .= '<a href="admin.php?fct=themebuilder&op=clonefooter&amp;footerid=' . $conf_id . '" title="CLONE"><img src="./images/icons/default/clone.png" alt="CLONE this Block"></a>';
            echo '
					<tr style="text-align: center; font-size: smaller;">
						<td class="head">' . $conf_id . '</small></td>
						<td class="even" style="text-align: left;">' . $conf_title . '</td>
						<td class="even">' . $conf_name . '</td>
						<td class="even" style="text-align: center; width: 6%; white-space: nowrap;">' . $icon . '</td>
					</tr>';
        }
    }
	echo '</table>';
		
		
		break;
		
		case 'delfooter':

		$footerid = (isset($_POST['footerid']) && is_numeric($_POST['footerid'])) ? intval($_POST['footerid']) : intval($_GET['footerid']);
		echo 'del' . $footerid;
        $ok = (isset($_POST['ok']) && $_POST['ok'] == 1) ? intval($_POST['ok']) : 0;		
		if ($ok == 1) {
            global $xoopsDB;
            $xoopsDB->queryF("DELETE FROM " . $xoopsDB->prefix("config_theme") . " WHERE conf_id = '$footerid'");
            redirect_header("admin.php?fct=themebuilder&op=footer", 5, _AM_FOOTER_ID_DELETED);
            exit();
            //echo 'delete from db après confirmation '.$sideid;
        } else {
            xoops_confirm(['footerid' => $_GET['footerid'], 'ok' => 1], 'admin.php?fct=themebuilder&op=delfooter', _AM_ARABESK125dotNET_OOOOOOOOOOOO_AREUSURE);
        }
		
		break;
		
		case 'clonefooter':
		
		function xoops_confirmk($hiddens, $action, $msg, $submit = 'clone')
        {
            $submit = ($submit != '') ? trim($submit) : _SUBMIT;
            echo '<div class="confirmMsg">clone footerbar<br />
				  <form method="post" action="' . $action . '">';
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
		

		$footerid = (isset($_POST['footerid']) && is_numeric($_POST['footerid'])) ? intval($_POST['footerid']) : intval($_GET['footerid']);
		echo 'clone ' . $footerid;
        $ok = (isset($_POST['ok']) && $_POST['ok'] == 1) ? intval($_POST['ok']) : 0;		
		if ($ok == 1 && $_POST['confirm_submit'] == 'clone') {
            global $xoopsDB;
            $titleexist   = " SELECT * FROM " . $xoopsDB->prefix('config_theme') . " WHERE conf_id = '" . $footerid . "'";
            $resultexist  = $xoopsDB->query($titleexist);
            $resultexists = $xoopsDB->fetchArray($resultexist);
            if ($resultexists['conf_title'] != $_POST['mfn-item-titre']) {
                $sqltemplate = "INSERT INTO " . $xoopsDB->prefix('config_theme') . " (conf_id, conf_name, conf_value, conf_title, conf_desc, conf_modid) VALUES ('', 'footerbar', '" . $resultexists['conf_value'] . "', '" . $_POST['mfn-item-titre'] . "', '" . $resultexists['conf_desc'] . "', '" . $_POST['selection'] . "')";
                if ($resulttemplate = $xoopsDB->queryF($sqltemplate)) {
                    $message = _AM_FOOTER_ID_CLONED;
                }
            } else {
                $message = _AM_FOOTER_ID_PROB_SECURITY;
            }

            //var_dump($resultexists['conf_title']);
            //var_dump($_POST['mfn-item-titre']);
            redirect_header("admin.php?fct=themebuilder&op=footer", 5, $message);
            exit();
        } else {
            xoops_confirmk(['footerid' => $_GET['footerid'], 'ok' => 1], 'admin.php?fct=themebuilder&op=clonefooter', '<div class="">Footerbar Title: <input class="text-input" size="130" name="mfn-item-titre" type="text" placeholder="Your footerbar titre" data-msg-required="This field is required." required=""></div>');
        }
		
		break;
		
		case 'modfooter':
		
		$footerid = (isset($_POST['footerid'])) ? $_POST['footerid'] : $_GET['footerid'];
		echo 'mod' . $footerid;
		//footerbuilder( $footerid );
		
		break;
		
		case 'addfooter':
		
		echo 'add';
		
		//footerbuilder ();
		
		break;	
?>
