<?php

function BuilderTableExists($tablename){
	global $xoopsDB;
	$result=$xoopsDB->queryF("SHOW TABLES LIKE '$tablename'");
	return($xoopsDB->getRowsNum($result) > 0);
}
function BuilderfieldExists($column, $fieldname, $table){
	global $xoopsDB;
	$result = $xoopsDB->query("SELECT '$column' FROM $table WHERE $column = '$fieldname'");
	return ($xoopsDB->getRowsNum($result) > 0);
}

if (!BuilderfieldExists('conf_name', 'active_themebuilder1', $xoopsDB->prefix('config'))){
	
	echo 'not exist';
	echo 'Theme builder a besoin d\'ajouter la configuration necessaire dans la table sql';
	echo 'il faut refaire linstallation du script';
	redirect_header(XOOPS_URL . "/modules/system/admin/themebuilder1/install/install.php", 5, $message);
					exit();
	}else{
	echo ' exist';
	}
if (!file_exists("./language/english/admin/themebuilder1.php")) { 
echo 'file does not exist';
$file = '../themebuilder1.php'; //a changer le chemin dans le dossier themebuilder a+
$newfile = './language/english/admin/themebuilder1.php';
if (!copy($file, $newfile)) {
    echo "La copie $file du fichier a échoué...\n";
	echo 'il faut refaire linstallation du script';
}
}

//ajouter la ligne define("XOOPS_SYSTEM_THEME", 18); dans le fichier /modules/system/constants.php


	echo'<style>
	/* menu */
div.rmmenuicon {
    margin: 3px;
    font-family: Tahoma, Arial, Helvetica;
    text-align: center;
}

div.rmmenuicon a {
    display: block;
    float: left;
    height: 75px !important;
    height: 75px;
    width: 75px !important;
    width: 75px;
    vertical-align: middle;
    text-decoration: none;
    border: 1px solid #CCCCCC;
    padding: 2px 5px 1px 5px;
    margin: 3px;
    color: #666666;

    background-color: #f0f0f0;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    -khtml-border-radius: 6px;
    border-radius: 6px;

}

div.rmmenuicon img {
    margin-top: 8px;
    margin-bottom: 8px;
}

div.rmmenuicon a span {
    font-size: 11px;
    font-weight: bold;
    display: block;
}

div.rmmenuicon a:hover {
    background-color: #FFF6C1;
    border: 1px solid #FF9900;
    color: #1E90FF;
}

div.rmmenuicon a:hover span {
    text-decoration: none;
}

div.CPbigTitle {
    font-size: 12px;
    color: #606060;
    background: no-repeat left top;
    font-weight: bold;
    height: 30px;
    vertical-align: middle;
    padding: 5px 0 0 40px;
    border-bottom: 1px solid #393e41;
}

/* menu */
	</style>
	<table>
<tbody><tr>
<td width="70%">
<div class="rmmenuicon">
	<a href="admin.php?fct=themebuilder1" title="'._AM_SYSTEM_THEMEBUILDER_Index.'"><img src="../../Frameworks/moduleclasses/icons/32/home.png" alt="'._AM_SYSTEM_THEMEBUILDER_Index.'"><span>'._AM_SYSTEM_THEMEBUILDER_Index.'</span></a>
	<a href="admin.php?fct=themebuilder1&op=menu&action=menumanager" title="'._AM_SYSTEM_THEMEBUILDER_Menu.'"><img src="../../Frameworks/moduleclasses/icons/32/prune.png" alt="'._AM_SYSTEM_THEMEBUILDER_Menu.'"><span>'._AM_SYSTEM_THEMEBUILDER_Menu.'</span></a>
	<a href="admin.php?fct=themebuilder1&op=slider" title="'._AM_SYSTEM_THEMEBUILDER_Slider.'"><img src="../../Frameworks/moduleclasses/icons/32/metagen.png" alt="'._AM_SYSTEM_THEMEBUILDER_Slider.'"><span>'._AM_SYSTEM_THEMEBUILDER_Slider.'</span></a>
	<a href="admin.php?fct=themebuilder1&op=options" title="'._AM_SYSTEM_THEMEBUILDER_Options.'"><img width="32px" src="../../Frameworks/moduleclasses/icons/32/type.png" alt="'._AM_SYSTEM_THEMEBUILDER_Options.'"> <span>'._AM_SYSTEM_THEMEBUILDER_Options.'</span></a>
	<a href="admin.php?fct=themebuilder1&op=ThemeBuilder" title="'._AM_SYSTEM_THEMEBUILDER_ThemeBuilder.'"><img src="../../Frameworks/moduleclasses/icons/32/groupmod.png" alt="'._AM_SYSTEM_THEMEBUILDER_ThemeBuilder.'"><span>'._AM_SYSTEM_THEMEBUILDER_ThemeBuilder.'</span></a>
	<a href="admin.php?fct=themebuilder1&op=miseajour" title="'._AM_SYSTEM_THEMEBUILDER_Miseajour.'"><img src="../../Frameworks/moduleclasses/icons/32/penguin.png" alt="'._AM_SYSTEM_THEMEBUILDER_Miseajour.'"><span>'._AM_SYSTEM_THEMEBUILDER_Miseajour.'</span></a>
	<a href="admin.php?fct=themebuilder1&op=apropos" title="'._AM_SYSTEM_THEMEBUILDER_apropos.'"><img width="32px" src="../../Frameworks/moduleclasses/icons/32/about.png" alt="'._AM_SYSTEM_THEMEBUILDER_apropos.'"> <span>'._AM_SYSTEM_THEMEBUILDER_apropos.'</span></a></div>
</div>
<div style="clear: both;"></div>
</td>
<td width="60%">
</td>
</tr>
<tr>
<td colspan="2">
<fieldset><legend class="label">'._AM_SYSTEM_THEMEBUILDER_ThemeBuilder.'</legend>
	<span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN1.'</span>
<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN2.'</span>
<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN3.'</span>
<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN4.'</span>
<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN5.'</span>
<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN6.'</span>
<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN7.'</span>
<br></fieldset>
</td>
</tr>
</tbody></table>';
	

	
	// 1) if it does not exists, the config_theme table
	$taktak = '';
	if(!BuilderTableExists($xoopsDB->prefix('config_theme'))){
		echo 'il faut refaire linstallation du script';

	}else{
	$taktak .= '<span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png">'._AM_SYSTEM_THEMEBUILDER_tableconfig_themeinstalee.'</span><br>';
	}
	
	
	echo'<fieldset><legend class="label">'._AM_SYSTEM_THEMEBUILDER_Resume.'</legend>
			'.$taktak.'
			<span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/add.png">  '._AM_SYSTEM_THEMEBUILDER_Conseil.'</span>
		</fieldset>';	
	

?>