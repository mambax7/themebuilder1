<?php

//constant.php add define("XOOPS_SYSTEM_THEME1", 19);
function constantadd() {
	if (!is_writable('../../../constants.php')) {
		$error['warning'] = 'Error: Could not write to constants.php please check you have set the correct permissions on: /modules/system/constants.php !';
		$t1 = 'not ok';
	}else{
		if ($fh = fopen('../../../constants.php', 'r+')) {
			$test = false;
			$put = '';
			while (!feof($fh)) {
				$line = fgets($fh);
				$newline = 'define("XOOPS_SYSTEM_THEME1", 19);';
				if (strpos($line, $newline) !== false) {
					$test = true;
				}
			}
			if($test !== true){
				$put = "\n".$newline."\n";
				fwrite($fh, $put);
				}
				$t1 = ' ok';
			fclose($fh);
		}else{$t1 = 'not ok';}
	}
	return $t1;
}

// copy language file add to language folder for admin: themebuilder1.php 
function copylanguagefile() {
	$languagefile = 'themebuilder1.php';
	$newlanguagefile = '../../../language/english/admin/themebuilder1.php';
	if(!file_exists($newlanguagefile)){
		if(!copy($languagefile,$newlanguagefile)){
			$error['warning'] = "failed to copy $languagefile";
			$t2 = 'not ok';
		}else{
			$error['warning'] = "copied $languagefile into $newlanguagefile\n";
			$t2 = ' ok';
		}	
	}else{
		$error['warning'] = "file already exists";
		$t2 = 'file exist';
	}
	return $t2;
}

// copy page.php to the root of site to use later with spacial page like contact and other: page.php
function copypagefile() {
	$pagefile = 'page.php';
	$newpagefile = '../../../../../page.php';
	if(!file_exists($newpagefile)){
		if(!copy($pagefile,$newpagefile)){
			//echo "failed to copy $pagefile";
			$t3 = 'not ok';
		}else{
			//echo "copied $pagefile into site root\n";
			$t3 = ' ok';
		}	
	}else{
		//echo "file already exists";
		$t3 = 'file exist';
	}
	return $t3;
}

// copy THEME.png to the folder of image to use later with spacial
function copypngfile() {
	$pngfile = './image/THEME.png';
	$newpngfile = '../../../../../modules/system/images/icons/transition/THEME.png';
	if(!file_exists($newpngfile)){
		if(!copy($pngfile,$newpngfile)){
			//echo "failed to copy $pngfile";
			$t13 = 'not ok';
		}else{
			//echo "copied $pngfile into site root\n";
			$t13 = ' ok';
		}	
	}else{
		//echo "file already exists";
		$t13 = 'file exist';
	}
	return $t13;
}

//copy theme folder
function copythemefolder($source, $dest) {
		$dir = opendir($source);
		if (!file_exists($dest) OR !is_dir($dest)){
			@mkdir($dest);
			$t4 = 'folder added ok';
			while(false !== ( $file = readdir($dir)) ) {
				if (( $file != '.' ) && ( $file != '..' )) {
					if ( is_dir($source . '/' . $file) ) {
						copythemefolder($source . '/' . $file,$dest . '/' . $file);
						//echo $dest . '/' . $file;
					}
					else {
						copy($source . '/' . $file,$dest . '/' . $file);
						//echo $dst . '/' . $file;
					}
				}
			}
		}else{$t4 = 'folder exist';}
		closedir($dir);
		return $t4;
}



if(!function_exists("BuilderTableExists")) {
	function BuilderTableExists($tablename){
		global $xoopsDB;
		$result=$xoopsDB->queryF("SHOW TABLES LIKE '$tablename'");
		return($xoopsDB->getRowsNum($result) > 0);
	}
}

function BuilderfieldExists($column, $fieldname, $table){
	global $xoopsDB;
	$result = $xoopsDB->query("SELECT '$column' FROM $table WHERE $column = '$fieldname'");
	return ($xoopsDB->getRowsNum($result) > 0);
}
	
//add sql tables
function sqltable1($table) { 
global $xoopsDB;

	// 1) Create, if it does not exists, the config_theme table
	if($table == 'config_theme' && !BuilderTableExists($xoopsDB->prefix('config_theme'))){
	$t5 = '';
		$sqlinstall = 'CREATE TABLE '.$xoopsDB->prefix('config_theme')." (
		  conf_id smallint(5) unsigned NOT NULL AUTO_INCREMENT,
		  conf_modid smallint(5) unsigned NOT NULL DEFAULT '0',
		  conf_catid smallint(5) unsigned NOT NULL DEFAULT '0',
		  conf_name varchar(25) NOT NULL DEFAULT '',
		  conf_title varchar(255) NOT NULL DEFAULT '',
		  conf_value text,
		  url varchar(255) DEFAULT NULL,
		  conf_desc text,
		  conf_formtype varchar(255) NOT NULL DEFAULT '',
		  conf_valuetype varchar(10) NOT NULL DEFAULT '',
		  conf_order varchar(255) NOT NULL DEFAULT '0',
		  PRIMARY KEY (conf_id),
		  KEY conf_mod_cat_id (conf_modid,conf_catid),
		  KEY conf_order (conf_order)
		) ENGINE=MyISAM;";
		if (!$xoopsDB->queryF($sqlinstall)) {
	    	$t5 .= 'install fail config_theme';
		}else{
			$t5 .= 'table config_theme est installé';
			$new = 'a:2:{i:0;a:3:{s:4:"type";s:11:"Blockcolumn";s:4:"size";s:3:"1/4";s:6:"fields";a:7:{s:7:"content";s:4:"Left";s:8:"content1";s:1:"0";s:9:"content11";s:1:"0";s:10:"content111";s:2:"in";s:8:"content2";s:1:"0";s:9:"content22";s:1:"0";s:10:"content222";s:2:"in";}}i:1;a:3:{s:4:"type";s:11:"Blockcolumn";s:4:"size";s:3:"3/4";s:6:"fields";a:7:{s:7:"content";s:6:"Center";s:8:"content1";s:1:"0";s:9:"content11";s:1:"0";s:10:"content111";s:2:"in";s:8:"content2";s:1:"0";s:9:"content22";s:1:"0";s:10:"content222";s:2:"in";}}}';
			$new1 = 'a:24:{s:21:"boxedfullwidthwrapper";s:8:"Activate";s:7:"fav_ico";N;s:23:"body_background_texture";s:13:"body-bg13.png";s:11:"body_repeat";s:6:"repeat";s:8:"body_pos";s:3:"top";s:13:"body_bgscroll";s:6:"scroll";s:21:"body_background_color";s:7:"#14db50";s:19:"body_background_img";N;s:26:"body_background_img_repeat";N;s:28:"body_background_img_position";N;s:26:"body_background_img_scroll";N;s:18:"scroll_top_enabled";s:8:"Activate";s:8:"fontsize";s:4:"24px";s:10:"fonteffect";s:4:"none";s:11:"font_apercu";s:15:"lohitdevanagari";s:28:"olivee-itemq-BlockcolumnLeft";s:7:"#ebfaf8";s:15:"blockTitlecolor";s:7:"#e2f2dc";s:25:"blockTitlebackgroundcolor";s:7:"#05f5dd";s:22:"font_apercu_blockTitle";s:5:"Eater";s:19:"fontsize_blockTitle";s:4:"26px";s:20:"textalign_blockTitle";s:6:"center";s:30:"olivee-itemq-BlockcolumnCenter";s:7:"#cf27cf";s:14:"css_text_extra";s:5:"kkkkk";s:13:"js_text_extra";s:5:"hbhcd";}';
			$sqltemplateinsert = "INSERT INTO " . $xoopsDB -> prefix('config_theme') . " (conf_id, conf_catid, conf_name, conf_value) VALUES ('1', '3', 'default_template', '$new'), ('2', '4', 'cssextra', '$new1'), ('3', '5', 'system_siteclosed', '')";
				$resultsqltemplate = $xoopsDB->queryF($sqltemplateinsert);
				if(!$resultsqltemplate){
					$t5 .= 'probleme insert config_theme.';
				}else{
					$t5 .=  'insert config_theme ok.' ;
				}
		}
		echo $t5;
	}else{
	$t5 = '';
	$t5 .= 'table config_theme instalee.';
	echo $t5;
	}
}

function sqltable2($table) { 
global $xoopsDB;
	// 2.1) Add the new row active_themebuilder to the config table
	if($table == 'config' && BuilderTableExists($xoopsDB->prefix('config')) && !BuilderfieldExists('conf_name', 'active_themebuilder1', $xoopsDB->prefix('config'))){
		$t6 = '';
		$sqlconfinsert = "INSERT INTO " . $xoopsDB -> prefix('config') . " 
		(conf_id, conf_modid, conf_catid, conf_name, conf_title, conf_value, conf_desc, conf_formtype, conf_valuetype, conf_order) VALUES 
		('', '1', '0', 'active_themebuilder1', '_MI_SYSTEM_PREFERENCE_ACTIVE_THEME', '1', 'description', 'yesno', 'int', '150')";
			$resultsqlconfig = $xoopsDB->queryF($sqlconfinsert);
			if(!$resultsqlconfig){
				$t6 .= 'probleme insert config xoops.';
			}else{
				$t6 .=  'insert config xoops ok.';
			}
		echo $t6;
	}else{echo 'config xoops ok';}
}

function sqltable3($table) { 
global $xoopsDB;
	
		// 1) Create, if it does not exists, the config_theme_menu table
	if($table == 'config_theme_menu' && !BuilderTableExists($xoopsDB->prefix('config_theme_menu'))){
		$t7 = '';
		$sqlinstall2 = 'CREATE TABLE '.$xoopsDB->prefix('config_theme_menu')." (
			  id int(11) NOT NULL AUTO_INCREMENT,
			  catmenu varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
			  label varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
			  link varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
			  image varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
			  parent int(11) NOT NULL DEFAULT '0',
			  sort int(11) DEFAULT NULL,
			  icons varchar(255) DEFAULT NULL,
			  class varchar(255) DEFAULT NULL,
			  PRIMARY KEY (id)
			) ENGINE=MyISAM;";
		if (!$xoopsDB->queryF($sqlinstall2)) {
	    	$t7 .= 'install fail config_theme_menu.';
		}else{
			$t7 .= 'table config_theme_menu install ok.';
		}
		echo $t7;
	}else{
		$t7 = '';
		$t7 .= 'table config_theme_menu deja installee.';
		echo $t7;
	}
}

////////////////

function sqltable4($table) { 
global $xoopsDB;
	if($table == 'crellyslider_sliders' && !BuilderTableExists($xoopsDB->prefix('crellyslider_sliders'))){
	$t8 = '';
	$sqlinstall3 = "CREATE TABLE ".$xoopsDB->prefix('crellyslider_sliders')." (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name TEXT CHARACTER SET utf8,
		alias TEXT CHARACTER SET utf8,
		layout TEXT CHARACTER SET utf8,
		responsive INT,
		startWidth INT,
		startHeight INT,
		automaticSlide INT,
		showControls INT,
		showNavigation INT,
		enableSwipe INT DEFAULT 1,
		showProgressBar INT,
		pauseOnHover INT,
		randomOrder INT DEFAULT 0,
		startFromSlide INT DEFAULT 0,
		callbacks TEXT CHARACTER SET utf8,
		UNIQUE KEY id (id)
		);";

		if (!$xoopsDB->queryF($sqlinstall3)) {
	    	$t8 .= 'install fail crellyslider_sliders.';
		}else{
			$t8 .= 'crellyslider_sliders install ok.';
		}
		echo $t8;
	}else{
		$t8 = '';
		$t8 .= 'table crellyslider_sliders deja installee.';
		echo $t8;
	}
}

function sqltable5($table) { 
global $xoopsDB;
	// Warning: the time variable is a string because it could contain the 'all' word
	if($table == 'crellyslider_slides' && !BuilderTableExists($xoopsDB->prefix('crellyslider_slides'))){
		$t9 = '';
		$sqlinstall4 = "CREATE TABLE ".$xoopsDB->prefix('crellyslider_slides')." (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		slider_parent mediumint(9),
		position INT,
		draft INT DEFAULT 0,
		background_type_image TEXT CHARACTER SET utf8,
		background_type_color TEXT CHARACTER SET utf8,
		background_type_color_input INT DEFAULT -1,
		background_propriety_position_x TEXT CHARACTER SET utf8,
		background_propriety_position_y TEXT CHARACTER SET utf8,
		background_repeat TEXT CHARACTER SET utf8,
		background_propriety_size TEXT CHARACTER SET utf8,
		data_in TEXT CHARACTER SET utf8,
		data_out TEXT CHARACTER SET utf8,
		data_time INT,
		data_easeIn INT,
		data_easeOut INT,
		link TEXT CHARACTER SET utf8,
		link_new_tab INT DEFAULT 0,
		custom_css TEXT CHARACTER SET utf8,
		UNIQUE KEY id (id)
		);";

		if (!$xoopsDB->queryF($sqlinstall4)) {
	    	$t9 .= 'install fail crellyslider_slides.';
		}else{
			$t9 .= 'table crellyslider_slides install ok.';
		}
		echo $t9;
	}else{
		$t9 = '';
		$t9 .= 'crellyslider_slides deja installee.';
		echo $t9;
	}
}

function sqltable6($table) { 
global $xoopsDB;

	if($table == 'crellyslider_elements' && !BuilderTableExists($xoopsDB->prefix('crellyslider_elements'))){
		$t10 = '';
		$sqlinstall5 = "CREATE TABLE ".$xoopsDB->prefix('crellyslider_elements')." (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		slider_parent mediumint(9),
		slide_parent mediumint(9),
		position INT,
		type TEXT CHARACTER SET utf8,
		data_easeIn INT,
		data_easeOut INT,
		data_ignoreEaseOut INT DEFAULT 0,
		data_delay INT,
		data_time TEXT CHARACTER SET utf8,
		data_top FLOAT,
		data_left FLOAT,
		z_index INT,
		data_in TEXT CHARACTER SET utf8,
		data_out TEXT CHARACTER SET utf8,
		custom_css TEXT CHARACTER SET utf8,
		custom_css_classes TEXT CHARACTER SET utf8,
		inner_html TEXT CHARACTER SET utf8,
		image_src TEXT CHARACTER SET utf8,
		image_alt TEXT CHARACTER SET utf8,
		link TEXT CHARACTER SET utf8,
		link_new_tab INT DEFAULT 0,
		video_id TEXT CHARACTER SET utf8,
		video_loop INT,
		video_autoplay INT,
		UNIQUE KEY id (id)
		);";
		if (!$xoopsDB->queryF($sqlinstall5)) {
	    	$t10 .= 'install fail crellyslider_elements.';
		}else{
			$t10 .= 'crellyslider_elements install ok.';
		}
		echo $t10;
	}else{
		$t10 = '';
		$t10 .= 'table crellyslider_elements deja installee.';
		echo $t10;
	}
}
	
///////////////

function sqltable7($table) { 
global $xoopsDB;

	if($table == 'menu' && !BuilderTableExists($xoopsDB->prefix('menu'))){
		$t11 = '';
		$sqlinstall6 = "CREATE TABLE ".$xoopsDB->prefix('menu')." (
			`id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
			`parent_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
			`title` varchar(255) NOT NULL DEFAULT '',
			`url` varchar(255) NOT NULL DEFAULT '',
			`class` varchar(255) NOT NULL DEFAULT '',
			`position` tinyint(3) unsigned NOT NULL DEFAULT '0',
			`group_id` tinyint(3) unsigned NOT NULL DEFAULT '1',
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;";
		if (!$xoopsDB->queryF($sqlinstall6)) {
			$t11 .= 'install fail menu.';
		}else{
			$t11 .= 'table Menu est installé';
			$sqlconfinsert = "INSERT INTO " . $xoopsDB -> prefix('menu') . " (id, parent_id, title, url, class, position, group_id) VALUES 
				(1, 0, 'Home', '/', '', 1, 1),
				(2, 0, 'About', '/about.html', '', 2, 1),
				(3, 2, 'Company Profile', '/company-profile.html', '', 1, 1),
				(19, 0, 'Affiliate', '/affiliate.html', '', 3, 2),
				(18, 0, 'Forum', '/forum', '', 2, 2),
				(17, 0, 'Make Money', '/make-money.html', '', 1, 2),
				(7, 0, 'Contact Us', '/contact-us.html', '', 5, 1),
				(8, 0, 'Blog', '/blog', '', 4, 1),
				(9, 0, 'Products', '/products', '', 3, 1),
				(10, 9, 'Handicraft', '/products/handicraft', '', 1, 1),
				(11, 9, 'Furniture', '/products/furniture', '', 2, 1),
				(12, 10, 'Tissue Box', '/products/handicraft/tissue', '', 1, 1),
				(13, 10, 'Frame', '/products/handicraft/frame', '', 2, 1),
				(14, 11, 'Cabinet', '/products/furniture/cabinet', '', 1, 1),
				(15, 11, 'Chair', '/products/furniture/chair', '', 2, 1),
				(16, 11, 'Table', '/products/furniture/table', '', 3, 1),
				(20, 0, 'Help', '/help', '', 4, 2),
				(21, 20, 'Support Center', '/support-center.html', '', 1, 2),
				(22, 20, 'Sitemap', '/sitemap.html', '', 2, 2),
				(23, 0, 'Author Dashboard', '/author-dashboard', '', 1, 3),
				(24, 0, 'My Profile', '/member/profile', '', 2, 3),
				(25, 0, 'Settings', '/member/settings', '', 3, 3),
				(26, 0, 'Downloads', '/member/downloads', '', 4, 3),
				(27, 0, 'Bookmarks', '/member/bookmarks', '', 5, 3),
				(28, 0, 'Logout', '/logout.php', '', 6, 3),
				(29, 25, 'Profile', '/member/settings/profile', '', 1, 3),
				(30, 25, 'Change Password', '/member/settings/password', '', 2, 3),
				(31, 0, 'Menu 1', '', '', 1, 4),
				(32, 31, 'Menu 1.1', '', '', 1, 4),
				(33, 31, 'Menu 1.2', '', '', 2, 4),
				(34, 0, 'Menu 2', '', '', 2, 4),
				(35, 34, 'Menu 2.1', '', '', 1, 4),
				(36, 35, 'Menu 2.1.1', '', '', 1, 4),
				(37, 35, 'Menu 2.1.2', '', '', 2, 4),
				(38, 34, 'Menu 2.2', '', '', 2, 4),
				(39, 21, 'Popular Files', '/popular', '', 1, 2),
				(40, 21, 'Top Authors', '/top', '', 2, 2),
				(41, 21, 'Wordpress', '/wp', '', 3, 2);";
			$resultsqlconfig = $xoopsDB->queryF($sqlconfinsert);
				if(!$resultsqlconfig){
					$t11 .= 'probleme insert menu.' ;
				}else{
					$t11 .=  'insert menu ok.' ;
				}
			$t11 .= 'table menu install ok.';
		}
		echo $t11;
	}else{
		$t11 = '';
	$t11 .= 'table menu deja installee.';
	echo $t11;
	}
}

function sqltable8($table) { 
global $xoopsDB;

	if($table == 'menu_group' && !BuilderTableExists($xoopsDB->prefix('menu_group'))){
		$t12 = '';
		$sqlinstall7 = "CREATE TABLE ".$xoopsDB->prefix('menu_group')." (
			`id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
			`title` varchar(255) NOT NULL,
			`options` text NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;";
			if (!$xoopsDB->queryF($sqlinstall7)) {
				$t12 .= 'installfail2.';
			}else{
				$t12 .= 'table menu_group est installé';
			// 2.1) Add the new row active_themebuilder to the config table		
				$sqlconfinsert = "INSERT INTO " . $xoopsDB -> prefix('menu_group') . " (id, title) VALUES
					(1, 'Main Menu'),
					(2, 'Footer Menu'),
					(3, 'Member Menu'),
					(4, 'Admin Menu');";
				$resultsqlconfig = $xoopsDB->queryF($sqlconfinsert);
					if(!$resultsqlconfig){
						$t12 .= 'probleme insert menu_group.';
					}else{
						$t12 .=  'insert menu_group ok.' ;
					}
			}
			echo $t12;
	}else{
		$t12 = '';
		$t12 .= 'menu_group deja installee.';
		echo $t12;
	}

}


	?>