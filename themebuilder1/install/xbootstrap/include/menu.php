<?php

 if (file_exists("../../mainfile.php")) {   
include("../../mainfile.php");  
} elseif (file_exists("../../../mainfile.php")) {   
include("../../../mainfile.php");  
} 
//include(XOOPS_ROOT_PATH."/header.php");
global $xoTheme;

$local = dirname($_SERVER['PHP_SELF']);
$location     = str_replace('/themes/maitscocorporate/admin', '', $local);

 global $xoopsDB;
	$sql = "SELECT distinct conf_id, conf_name, conf_catid, conf_value, conf_desc, conf_formtype, conf_valuetype, conf_order FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_catid = 1 ORDER BY conf_id DESC";
	$result = $xoopsDB->query($sql); 
	while (list($conf_id, $conf_name, $conf_catid, $conf_value, $conf_desc, $conf_formtype, $conf_valuetype, $conf_order) = $xoopsDB->fetchRow($result)) {

 
				$MENU = 'MENU_' . $conf_name . '_' . $conf_id;
				$arg = $conf_name; 
				$val = $conf_id;
				 

				 $sql = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE catmenu='.$conf_id.' ORDER BY id ASC';
				$result10 = $xoopsDB -> query( $sql);
				while($video_arr10 = $xoopsDB -> fetchArray( $result10 )){ 
				$tree[$conf_id][] = $video_arr10;
				}

			if (!function_exists('formatTree')) {
				function formatTree($tree, $parent){
						$tree2 = array();
						foreach($tree as $i => $item){
							if($item['parent'] == $parent){
								$tree2[$item['id']] = $item;
								$tree2[$item['id']]['submenu'] = formatTree($tree, $item['id']);
							}
						}
						return $tree2;
					}
				}	
				 
				 $menuhorizontal = formatTree($tree[$conf_id], 0); 

		if ($conf_value == 'skin1'){

		
				/* if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="sf-menu">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li>
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
					
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						//++++++niveau sous menu 1 ---20 a determiner dans les configurations prochain release
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}				
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}*/
				
				${'MENU'.$arg .'_'. $val} = '
				<style>
				
				/* Assistive text */
.assistive-text,
.site .screen-reader-text {
	position: absolute !important;
	clip: rect(1px, 1px, 1px, 1px);
}
.themonic-nav .assistive-text:hover,
.themonic-nav .assistive-text:active,
.themonic-nav .assistive-text:focus {
	background: #fff;
	border: 2px solid #333;
	border-radius: 3px;
	clip: auto !important;
	color: #000;
	display: block;
	font-size: 12px;
	padding: 12px;
	position: absolute;
	top: 5px;
	left: 5px;
	z-index: 100000; /* Above WP toolbar */
}

.selectnav {  display: none;  }
select.selectnav { margin:4px;  padding:10px; } /* centers select */
					.themonic-nav ul.nav-menu,
	.themonic-nav div.nav-menu > ul {
	background:none repeat scroll 0 0 #F3F3F3;
		border-bottom: 5px solid #16A1E7;
		border-top: 1px solid #ededed;
		display: inline-block !important;
		text-align: left;
		width: 100%;
	}
	.themonic-nav ul {
		margin: 0;
		text-indent: 0;
	}
	.themonic-nav li a, 
	.themonic-nav li {
		display: inline-block;
		text-decoration: none;
	}
	.themonic-nav li a {
		border-bottom: 0;
		color: #6a6a6a;
		line-height: 3.692307692;
		padding: 0 20px;
		text-transform: uppercase;
		transition: all 0.4s ease 0s;
		white-space: nowrap;
	}
	.themonic-nav li a:hover {
		color: #fff;
		transition: all 0.1s ease 0s;
	}
	.themonic-nav li {
		margin: 0 0px 0 0;	
		position: relative;
	}

	.themonic-nav li ul {
		display: none;
		margin: 0;
		padding: 0;
		position: absolute;
		top: 100%;
		z-index: 1;
	}
	.themonic-nav li ul ul {
		top: 0;
		left: 100%;
	}
	.themonic-nav ul li:hover > ul {
		border-left: 0;
		display: block;
	}
	.themonic-nav li ul li a {
		background: #efefef;
		border-bottom: 1px solid #ededed;
		display: block;
		font-size: 11px;
		line-height: 2.181818182;
		padding: 8px 10px;
		width: 180px;
		white-space: normal;
	}
	.themonic-nav li ul li a:hover {
		background: #e3e3e3;
		color: #444;
	}
	
	.themonic-nav .current-menu-item > a,
	.themonic-nav .current-menu-ancestor > a,
	.themonic-nav .current_page_item > a,
	.themonic-nav .current_page_ancestor > a {
		    background: #16A1E7;
			color: #FFFFFF;
			font-weight: bold;
	}
	
	@media screen and (max-width: 767px) {
    
   .js .selectnav {
    background:#444444;
	border: none;
    border-radius: 2px;
    color: #F3F3F3;
    display: inline-block;
    width: 96%;
	margin-bottom:10px;
	}
	.main-navigation ul.nav-menu, .main-navigation div.nav-menu > ul, .nav-menu li {
		display: none;
	}
	.themonic-nav ul {
		display: none;
    }
	.themonic-nav li a, .themonic-nav li {
		display: none;
    }
	
	.themonic-nav ul.nav-menu, .themonic-nav div.nav-menu > ul {
   
    display: none;
 
}
}
				</style>
				
				
				<nav id="site-navigation" class="themonic-nav" role="navigation"> <a class="assistive-text" href="#content" title="Skip to content">Skip to content</a><div class="menu-top-container"><ul id="menu-top" class="nav-menu"><li id="menu-item-17" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-17"><a href="http://demo.themonic.com/io-pro/">Home</a></li><li id="menu-item-74" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-74"><a href="http://demo.themonic.com/io-pro/blog/category/news/">News</a></li><li id="menu-item-141" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-141"><a href="http://demo.themonic.com/io-pro/blog/category/technology/">Tech</a></li><li id="menu-item-140" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-140"><a href="http://demo.themonic.com/io-pro/blog/category/mobile/">Mobile</a></li><li id="menu-item-138" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-138"><a href="http://demo.themonic.com/io-pro/blog/category/food/">Food</a></li><li id="menu-item-139" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-139"><a href="http://demo.themonic.com/io-pro/blog/category/beauty/">Beauty</a></li><li id="menu-item-15" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15"><a href="http://demo.themonic.com/io-pro/full-width/">Full Width</a></li><li id="menu-item-157" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-157"><a href="http://demo.themonic.com/io-pro/blog/author/steve/">Author Page</a><ul class="sub-menu"><li id="menu-item-159" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-159"><a href="http://demo.themonic.com/io-pro/blog/author/stacy/">Stacy</a></li><li id="menu-item-158" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-158"><a href="http://demo.themonic.com/io-pro/blog/author/matt/">Matt</a></li></ul></li></ul><select class="selectnav" id="selectnav1"><option value="">Menu</option><option value="http://demo.themonic.com/io-pro/" selected="">HOME</option><option value="http://demo.themonic.com/io-pro/blog/category/news/">NEWS</option><option value="http://demo.themonic.com/io-pro/blog/category/technology/">TECH</option><option value="http://demo.themonic.com/io-pro/blog/category/mobile/">MOBILE</option><option value="http://demo.themonic.com/io-pro/blog/category/food/">FOOD</option><option value="http://demo.themonic.com/io-pro/blog/category/beauty/">BEAUTY</option><option value="http://demo.themonic.com/io-pro/full-width/">FULL WIDTH</option><option value="http://demo.themonic.com/io-pro/blog/author/steve/">AUTHOR PAGE</option><option value="http://demo.themonic.com/io-pro/blog/author/stacy/">- Stacy</option><option value="http://demo.themonic.com/io-pro/blog/author/matt/">- Matt</option></select></div> </nav>';
			//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
		
		
		
		
		if ($conf_value == 'skin2'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf2.css" rel="stylesheet" />';
				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="sfs-menu">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li>
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
		
		
		if ($conf_value == 'skin3'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf3.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="sfs3-menu">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li>
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}


		if ($conf_value == 'skin4'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf4.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="sfs4-menu">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li>
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}


		if ($conf_value == 'skin5'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf5.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="sfs5-menu">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li>
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
		
		
		


///

		if ($conf_value == 'skin10'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="horizontal white">';
					foreach($menuhorizontal as $k => $item1){
					
						if(!empty($item1['submenu'])) {									//de skin 10 a skin 19 a faire ce if de sub menu pour afficher la fleche a coté a finir plutard
							${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
						}else{
							${'MENU'.$arg .'_'. $val} .= '<li>
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
						}						
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
		
		
		if ($conf_value == 'skin11'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="horizontal black">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}	

		if ($conf_value == 'skin12'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="horizontal red">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}	

		if ($conf_value == 'skin13'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="horizontal green">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}	

		if ($conf_value == 'skin14'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="horizontal blue">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}	

		

		
		
				if ($conf_value == 'skin15'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="vertical white">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
		
		
		if ($conf_value == 'skin16'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="vertical black">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}	

		if ($conf_value == 'skin17'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="vertical red">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}	

		if ($conf_value == 'skin18'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="vertical green">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}	

		if ($conf_value == 'skin19'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="vertical blue">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
		
		
		
		
//////
//////
		if ($conf_value == 'skin20'){

				 if(!empty($menuhorizontal)) {
				// ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf20.css" rel="stylesheet" />';
				 
				// ${'MENU'.$arg .'_'. $val} .= '<link href="http://www.bursa.com.tr/wp-content/plugins/mega_main_menu/src/css/cache.skin.css?ver=3.8" rel="stylesheet" />';

				 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/plugins/mega_main_menu/src/css/cache.skin.css?ver=3.8.1" rel="stylesheet" />';

				 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/blue.skin.css?ver=1.1.0" rel="stylesheet" />';

				 
				/*${'MENU'.$arg .'_'. $val} .= '<div class="container" style="padding:0" >
    <div id="mega_main_menu" class="nav_menu primary icons-disable first-lvl-align-left include-logo no-search">
	<div class="menu_holder" data-sticky="1" data-stickyoffset="340">
	<div class="menu_inner">
	<span class="nav_logo">
	<a class="logo_link" href="http://www.bursa.com.tr?lang=fr" title="Bursa.com.tr | Tüm Renkleriyle Bursa"><img src="http://test.bursa.com.tr/wp-content/uploads/2013/12/home1.png" alt="Bursa.com.tr | Tüm Renkleriyle Bursa" /></a>
	<a class="mobile_toggle"><span class="mobile_button"><i class="im-icon-menu-3"></i> Menu</span></a>
	</span><!-- /class="nav_logo" -->
	<ul id="mega_main_menu_ul">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-'.$item1['id'].' default_dropdown drop_to_right  submenu_default_width columns2">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul class="dropdown">';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26594    submenu_default_width columns">
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul class="dropdown">';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2658594    submenu_default_width columns">
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul></div><!-- /class="menu_inner" -->
	</div><!-- /class="menu_holder" --></div>  </div>	';	*/
				}


/////

/*${'MENU'.$arg .'_'. $val} .= '<!--container--->


  <div class="container" style="padding:0" >
    <div id="mega_main_menu" class="nav_menu primary icons-disable first-lvl-align-left include-logo no-search">
	<div class="menu_holder" data-sticky="1" data-stickyoffset="340">
	<div class="menu_inner">
	<span class="nav_logo">
	<a class="logo_link" href="http://www.bursa.com.tr?lang=fr" title="Bursa.com.tr | Tüm Renkleriyle Bursa"><img src="http://test.bursa.com.tr/wp-content/uploads/2013/12/home1.png" alt="Bursa.com.tr | Tüm Renkleriyle Bursa" /></a>
	<a class="mobile_toggle"><span class="mobile_button"><i class="im-icon-menu-3"></i> Menu</span></a>
	</span><!-- /class="nav_logo" -->
	<ul id="mega_main_menu_ul" class="mega_main_menu_ul">
	<li id="menu-item-26900" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-26900 default_dropdown drop_to_right  submenu_default_width columns2"><a href="/" class=" with_icon"><i class="im-icon-left-to-right"></i> <span><span class="link_text">BURSA HAKKINDA</span></span></a>
<ul class="dropdown">
	<li id="menu-item-26594" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26594    submenu_default_width columns"><a href="http://www.bursa.com.tr/bursanin-tarihi" class=" with_icon"><i class="im-icon-fire"></i> <span><span class="link_text">BURSA&#8217;NIN TARİHİ</span></span></a></li>
	<li id="menu-item-26593" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26593    submenu_default_width columns"><a href="http://www.bursa.com.tr/bursanin-cografyasi-iklimi-ve-nufusu" class=" with_icon"><i class="fa-icon-random"></i> <span><span class="link_text">COĞRAFYA İKLİM NÜFUS</span></span></a></li>
	<li id="menu-item-26622" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26622    submenu_default_width columns"><a href="http://www.bursa.com.tr/ilcelerimiz" class=" with_icon"><i class="fa-icon-rss"></i> <span><span class="link_text">İLÇELERİMİZ</span></span></a></li>
	<li id="menu-item-13117" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-13117    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/bursa-hakkinda-fr/symboles-de-bursa?lang=fr" class=" with_icon"><i class="im-icon-volume-high"></i> <span><span class="link_text">BURSA&#8217;NIN SİMGELERİ</span></span></a></li>
	<li id="menu-item-26633" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26633    submenu_default_width columns"><a href="http://www.bursa.com.tr/ulasim" class=" with_icon"><i class="im-icon-pyramid"></i> <span><span class="link_text">ULAŞIM</span></span></a></li>
	<li id="menu-item-26831" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26831    submenu_default_width columns"><a href="http://www.bursa.com.tr/sanalturlar" class=" with_icon"><i class="im-icon-camera-5"></i> <span><span class="link_text">SANAL TURLAR</span></span></a></li>
	<li id="menu-item-26904" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26904    submenu_default_width columns"><a target="_blank" href="http://bursabuyuksehir.tv" class=" with_icon"><i class="im-icon-lock-5"></i> <span><span class="link_text">VİDEOLAR</span></span></a></li>
	<li id="menu-item-26905" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26905    submenu_default_width columns"><a target="_blank" href="http://fotograf.bursa.com.tr" class=" with_icon"><i class="im-icon-queen"></i> <span><span class="link_text">FOTO GALERİ</span></span></a></li>
	<li id="menu-item-26871" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26871    submenu_default_width columns"><a href="http://www.bursa.com.tr/nobetci-eczaneler" class=" with_icon"><i class="fa-icon-bookmark-empty"></i> <span><span class="link_text">NÖBETÇİ ECZANELER</span></span></a></li>

</ul></li>
<li id="menu-item-13062" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-13062 default_dropdown drop_to_right  submenu_default_width columns2"><a href="http://www.bursa.com.tr/kategori/activites?lang=fr" class=" with_icon"><i class="fa-icon-star"></i> <span><span class="link_text">ACTIVITES</span></span></a>
<ul class="dropdown">
	<li id="menu-item-26869" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26869    submenu_default_width columns"><a href="http://www.bursa.com.tr/sinemalarda-bu-hafta" class=" with_icon"><i class="im-icon-mouse-4"></i> <span><span class="link_text">SİNEMALARDA BU HAFTA</span></span></a></li>
	<li id="menu-item-13121" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-13121    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/activites/centres-commerciaux?lang=fr" class=" with_icon"><i class="im-icon-health"></i> <span><span class="link_text">CENTRES COMMERCIAUX</span></span></a></li>
	<li id="menu-item-13122" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-13122    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/activites/tourisme-alternatif?lang=fr" class=" with_icon"><i class="im-icon-storage"></i> <span><span class="link_text">TOURISME ALTERNATIF</span></span></a></li>
	<li id="menu-item-26834" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26834    submenu_default_width columns"><a href="http://www.bursa.com.tr/fuarlar-kongreler-festivaller" class=" with_icon"><i class="im-icon-windows"></i> <span><span class="link_text">FUAR KONGRE FESTİVAL</span></span></a></li>
	<li id="menu-item-26837" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26837    submenu_default_width columns"><a href="http://www.bursa.com.tr/barlar-ve-diskolar" class=" with_icon"><i class="im-icon-eye-2"></i> <span><span class="link_text">BARLAR VE DİSKOLAR</span></span></a></li>
	<li id="menu-item-26838" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-26838    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/activites/lieux-de-loisirs-et-spectacles?lang=fr" class=" with_icon"><i class="im-icon-page-break-2"></i> <span><span class="link_text">LIEUX DE LOISIRS ET SPECTACLES</span></span></a></li>

</ul></li>
<li id="menu-item-13064" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-13064 default_dropdown drop_to_right  submenu_default_width columns2"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite?lang=fr" class=" with_icon"><i class="fa-icon-comment"></i> <span><span class="link_text">LIEUX de VISITE</span></span></a>
<ul class="dropdown">
	<li id="menu-item-13129" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-13129    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture?lang=fr" class=" with_icon"><i class="im-icon-library"></i> <span><span class="link_text">HISTOIRE ET CULTURE</span></span></a>
	<ul class="dropdown">
		<li id="menu-item-23577" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23577    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture/mosquees-et-couvents?lang=fr" class=" disable_icon"><i class="im-icon-stats-2"></i> <span><span class="link_text">MOSQUEES et COUVENTS</span></span></a></li>
		<li id="menu-item-23578" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23578    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture/hanlar-ve-carsilar" class=" disable_icon"><i class="im-icon-arrow-left-12"></i> <span><span class="link_text">HANLAR VE ÇARŞILAR</span></span></a></li>
		<li id="menu-item-23579" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23579    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture/kale-ve-surlar" class=" disable_icon"><i class="im-icon-bubble-up"></i> <span><span class="link_text">KALE VE SURLAR</span></span></a></li>
		<li id="menu-item-23580" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23580    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture/kaplica-ve-hamamlar" class=" disable_icon"><i class="fa-icon-check-sign"></i> <span><span class="link_text">KAPLICA VE HAMAMLAR</span></span></a></li>
		<li id="menu-item-23581" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23581    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture/kopruler" class=" disable_icon"><i class="im-icon-arrow-up-3"></i> <span><span class="link_text">KÖPRÜLER ve DİĞER YAPILAR</span></span></a></li>
		<li id="menu-item-23582" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23582    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture/eglises?lang=fr" class=" disable_icon"><i class="im-icon-flip"></i> <span><span class="link_text">EGLISES</span></span></a></li>
		<li id="menu-item-23583" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23583    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture/seminaires-islamiques?lang=fr" class=" disable_icon"><i class="im-icon-temperature-2"></i> <span><span class="link_text">SEMINAIRES ISLAMIQUES</span></span></a></li>
		<li id="menu-item-23584" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23584    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture/mausolees?lang=fr" class=" disable_icon"><i class="im-icon-map-2"></i> <span><span class="link_text">MAUSOLEES</span></span></a></li>

	</ul></li>
	<li id="menu-item-13125" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-13125    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/activites/musees?lang=fr" class=" with_icon"><i class="im-icon-office"></i> <span><span class="link_text">MUSEES</span></span></a></li>
	<li id="menu-item-13124" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-13124    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/activites/centres-culturels-et-artistiques-et-bibliotheques?lang=fr" class=" with_icon"><i class="im-icon-bookmarks"></i> <span><span class="link_text">CENTRES CULTURELS et BIBLIOTHEQUES</span></span></a></li>
	<li id="menu-item-13120" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-13120    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/bursa-hakkinda-fr/beautes-naurelles?lang=fr" class=" with_icon"><i class="im-icon-direction"></i> <span><span class="link_text">BEAUTES NAURELLES</span></span></a></li>

</ul></li>
<li id="menu-item-23067" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23067 default_dropdown drop_to_right  submenu_default_width columns2"><a href="http://www.bursa.com.tr/kategori/informations-pratiques?lang=fr" class=" with_icon"><i class="im-icon-close-3"></i> <span><span class="link_text">INFORMATIONS PRATIQUES</span></span></a></li>
<li id="menu-item-26326" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26326 default_dropdown drop_to_right  submenu_default_width columns2"><a href="http://www.bursa.com.tr/oteller" class=" with_icon"><i class="fa-icon-sort"></i> <span><span class="link_text">KONAKLAMA</span></span></a></li>
</ul>
	</div><!-- /class="menu_inner" -->
	</div><!-- /class="menu_holder" --></div>  </div>
  <!--container--->
  ';
  
  
  */
  
  /*
  
  
  	${'MENU'.$arg .'_'. $val} .= '<div class="menu_1">
		<div class="container">
			<div class="navigation">
<div id="mega_main_menu" class="nav_menu primary_menu icons-left first-lvl-align-left first-lvl-separator-smooth direction-horizontal responsive-enable mobile_minimized-enable dropdowns_animation-none version-1-1-0 include-logo include-search">
	<div class="menu_holder" data-sticky="1" data-stickyoffset="120">
		<div class="menu_inner">
			<span class="nav_logo">
				<a class="logo_link" href="http://menu.megamain.com" title="Mega Main Menu" tabindex="1"><img src="http://menu.megamain.com/wp-content/plugins/mega_main_menu/src/img/megamain-logo-120x120.png" alt="Mega Main Menu" /></a>
				<a class="mobile_toggle"><span class="mobile_button">Menu&nbsp; <span class="symbol_menu">&equiv;</span><span class="symbol_cross">&#x2573;</span></span></a>
			</span><!-- /class="nav_logo" -->
				<ul id="mega_main_menu_ul" class="mega_main_menu_ul">
	<li class="nav_search_box">
	<form method="get" id="mega_main_menu_searchform" action="http://menu.megamain.com/">
		<i class="im-icon-search-3 icosearch"></i>
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="Search" />
		<input type="text" class="field" name="s" id="s" tabindex="1" />
	</form>
	</li><!-- class="nav_search_box" -->
	<li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-11 default_dropdown additional_style_1 drop_to_right  submenu_default_width columns2"><a title="Standard" href="/1" class="item_link  with_icon"><i class="im-icon-checkmark-3"></i> <span><span class="link_text">Standard</span></span></a>
<ul class="mega_dropdown">
	<li id="menu-item-12" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-12  default_style   submenu_default_width columns"><a href="/11" class="item_link  with_icon"><i class="fa-icon-fighter-jet"></i> <span><span class="link_text">Lorem ipsum</span></span></a></li>
	<li id="menu-item-13" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-13  default_style   submenu_default_width columns"><a href="/12" class="item_link  with_icon"><i class="im-icon-clipboard-4"></i> <span><span class="link_text">Dolor sit amet</span></span></a>
	<ul class="mega_dropdown">
		<li id="menu-item-20" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-20  default_style   submenu_default_width columns"><a href="/121" class="item_link  with_icon"><i class="im-icon-history-2"></i> <span><span class="link_text">Ut enim ad minim</span></span></a></li>
		<li id="menu-item-21" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-21  default_style   submenu_default_width columns"><a href="/122" class="item_link  with_icon"><i class="im-icon-google-plus-4"></i> <span><span class="link_text">Veniam</span></span></a>
		<ul class="mega_dropdown">
			<li id="menu-item-27" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27  default_style   submenu_default_width columns"><a href="/1221" class="item_link  with_icon"><i class="im-icon-rulers"></i> <span><span class="link_text">Duis aute irure</span></span></a></li>
			<li id="menu-item-28" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-28  default_style   submenu_default_width columns"><a href="/1222" class="item_link  with_icon"><i class="im-icon-temperature-2"></i> <span><span class="link_text">Dolor in reprehenderit</span></span></a></li>
			<li id="menu-item-29" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-29  default_style   submenu_default_width columns"><a href="/1223" class="item_link  with_icon"><i class="im-icon-movie"></i> <span><span class="link_text">In voluptate velit</span></span></a></li>

		</ul></li>
		<li id="menu-item-22" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-22  default_style   submenu_default_width columns"><a href="/123" class="item_link  with_icon"><i class="im-icon-file-4"></i> <span><span class="link_text">Quis nostrud</span></span></a></li>
		<li id="menu-item-23" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-23  default_style   submenu_default_width columns"><a href="/124" class="item_link  with_icon"><i class="im-icon-magnet-3"></i> <span><span class="link_text">Exercitation ullamco</span></span></a></li>
		<li id="menu-item-24" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24  default_style   submenu_default_width columns"><a href="/125" class="item_link  with_icon"><i class="im-icon-seven-segment-1"></i> <span><span class="link_text">Laboris nisi ut</span></span></a></li>
		<li id="menu-item-25" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-25  default_style   submenu_default_width columns"><a href="/126" class="item_link  with_icon"><i class="fa-icon-file-alt"></i> <span><span class="link_text">Aliquip ex ea</span></span></a></li>
		<li id="menu-item-26" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26  default_style   submenu_default_width columns"><a href="/127" class="item_link  with_icon"><i class="fa-icon-code-fork"></i> <span><span class="link_text">Commodo consequat</span></span></a></li>

	</ul></li>
	<li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14  default_style   submenu_default_width columns"><a href="/13" class="item_link  with_icon"><i class="im-icon-nbsp"></i> <span><span class="link_text">Consectetur</span></span></a></li>
	<li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15  default_style   submenu_default_width columns"><a href="/14" class="item_link  with_icon"><i class="im-icon-file-3"></i> <span><span class="link_text">Adipisicing elit</span></span></a></li>
	<li id="menu-item-16" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-16  default_style   submenu_default_width columns"><a href="/15" class="item_link  with_icon"><i class="im-icon-zoom-in"></i> <span><span class="link_text">Sed do eiusmod</span></span></a></li>
	<li id="menu-item-17" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-17  default_style   submenu_default_width columns"><a href="/16" class="item_link  with_icon"><i class="im-icon-folder-plus"></i> <span><span class="link_text">Tempor incididunt</span></span></a></li>
	<li id="menu-item-18" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-18  default_style   submenu_default_width columns"><a href="/17" class="item_link  with_icon"><i class="im-icon-spinner-10"></i> <span><span class="link_text">Ut labore et</span></span></a></li>
	<li id="menu-item-19" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-19  default_style   submenu_default_width columns"><a href="/18" class="item_link  with_icon"><i class="im-icon-arrow-4"></i> <span><span class="link_text">Dolore magna aliqua</span></span></a></li>

</ul></li>
<li id="menu-item-121" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-121 multicolumn_dropdown additional_style_2 drop_to_right  submenu_default_width columns2"><a href="/5" class="item_link  with_icon"><i class="im-icon-stats-up"></i> <span><span class="link_text">Promo</span></span></a>
<ul class="mega_dropdown" style="background-image:url(http://menu.megamain.com/wp-content/uploads/2013/10/iphone.png);background-repeat:no-repeat;background-attachment:scroll;background-position:center right;background-size:auto 100%;">
	<li id="menu-item-122" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-122  default_style   submenu_default_width columns" style="width:50%;"><a href="/51" class="item_link  with_icon"><i class="fa-icon-edit-sign"></i> <span><span class="link_text">Minima veniam</span></span></a>
	<ul class="mega_dropdown">
		<li id="menu-item-123" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-123  default_style   submenu_default_width columns"><a href="/52" class="item_link  with_icon"><i class="fa-icon-resize-vertical"></i> <span><span class="link_text">Quis nostrum</span></span></a></li>
		<li id="menu-item-124" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-124  default_style   submenu_default_width columns"><a href="/53" class="item_link  with_icon"><i class="fa-icon-bell"></i> <span><span class="link_text">Exercitationem</span></span></a></li>
		<li id="menu-item-126" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-126  default_style   submenu_default_width columns"><a href="/54" class="item_link  with_icon"><i class="fa-icon-filter"></i> <span><span class="link_text">Ullam corporis</span></span></a></li>
		<li id="menu-item-127" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-127  default_style   submenu_default_width columns"><a href="/55" class="item_link  with_icon"><i class="im-icon-bubble"></i> <span><span class="link_text">Suscipit laboriosam</span></span></a></li>
		<li id="menu-item-128" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-128  default_style   submenu_default_width columns"><a href="/56" class="item_link  with_icon"><i class="im-icon-magnet"></i> <span><span class="link_text">Nisi ut aliquid ex</span></span></a></li>
		<li id="menu-item-129" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-129  default_style   submenu_default_width columns"><a href="/57" class="item_link  with_icon"><i class="fa-icon-beer"></i> <span><span class="link_text">Nulla pariatur</span></span></a></li>

	</ul></li>

</ul></li>
<li id="menu-item-30" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-30 multicolumn_dropdown additional_style_3 drop_to_right  submenu_full_width columns4"><a href="/2" class="item_link  with_icon"><i class="im-icon-pause-2"></i> <span><span class="link_text">Multi Column</span></span></a>
<ul class="mega_dropdown">
	<li id="menu-item-31" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-31  default_style   submenu_full_width columns" style="width:25%;"><a href="/21" class="item_link  disable_icon"><i class="im-icon-text-color"></i> <span><span class="link_text">Excepteur sint</span></span></a>
	<ul class="mega_dropdown">
		<li id="menu-item-39" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-39  default_style   submenu_full_width columns"><a href="/211" class="item_link  with_icon"><i class="fa-icon-signin"></i> <span><span class="link_text">Unde omnis iste</span></span></a></li>
		<li id="menu-item-40" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-40  default_style   submenu_full_width columns"><a href="/212" class="item_link  with_icon"><i class="fa-icon-share-alt"></i> <span><span class="link_text">Natus error sit</span></span></a></li>
		<li id="menu-item-41" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-41  default_style   submenu_full_width columns"><a href="/213" class="item_link  with_icon"><i class="im-icon-equalizer-3"></i> <span><span class="link_text">Voluptatem</span></span></a></li>
		<li id="menu-item-42" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-42  default_style   submenu_full_width columns"><a href="/214" class="item_link  with_icon"><i class="im-icon-camera-8"></i> <span><span class="link_text">Accusantium</span></span></a></li>

	</ul></li>
	<li id="menu-item-32" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-32  default_style   submenu_full_width columns" style="width:25%;"><a href="/22" class="item_link  disable_icon"><i class="im-icon-busy-3"></i> <span><span class="link_text">Occaecat cupidatat</span></span></a>
	<ul class="mega_dropdown">
		<li id="menu-item-43" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-43  default_style   submenu_full_width columns"><a href="/221" class="item_link  with_icon"><i class="im-icon-volume-low"></i> <span><span class="link_text">Nemo enim ipsam</span></span></a></li>
		<li id="menu-item-44" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-44  default_style   submenu_full_width columns"><a href="/222" class="item_link  with_icon"><i class="im-icon-settings"></i> <span><span class="link_text">Voluptatem</span></span></a></li>
		<li id="menu-item-45" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-45  default_style   submenu_full_width columns"><a href="/223" class="item_link  with_icon"><i class="fa-icon-suitcase"></i> <span><span class="link_text">Quia voluptas sit</span></span></a></li>
		<li id="menu-item-46" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-46  default_style   submenu_full_width columns"><a href="/224" class="item_link  with_icon"><i class="im-icon-arrow-left-9"></i> <span><span class="link_text">Aspernatur aut</span></span></a></li>

	</ul></li>
	<li id="menu-item-33" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-33  default_style   submenu_full_width columns" style="width:25%;"><a href="/23" class="item_link  disable_icon"><i class="fa-icon-circle-arrow-down"></i> <span><span class="link_text">Non proident</span></span></a>
	<ul class="mega_dropdown">
		<li id="menu-item-47" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-47  default_style   submenu_full_width columns"><a href="/231" class="item_link  with_icon"><i class="im-icon-arrow-right-11"></i> <span><span class="link_text">Odit aut fugit</span></span></a></li>
		<li id="menu-item-48" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-48  default_style   submenu_full_width columns"><a href="/232" class="item_link  with_icon"><i class="im-icon-movie"></i> <span><span class="link_text">Sed quia consequuntur</span></span></a></li>
		<li id="menu-item-49" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-49  default_style   submenu_full_width columns"><a href="/233" class="item_link  with_icon"><i class="im-icon-stack-spades"></i> <span><span class="link_text">Magni dolores eos</span></span></a></li>
		<li id="menu-item-50" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-50  default_style   submenu_full_width columns"><a href="/234" class="item_link  with_icon"><i class="im-icon-flower"></i> <span><span class="link_text">Qui ratione</span></span></a></li>

	</ul></li>
	<li id="menu-item-34" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-34  default_style   submenu_full_width columns" style="width:25%;"><a href="/24" class="item_link  disable_icon"><i class="im-icon-loop-4"></i> <span><span class="link_text">Sunt in culpa</span></span></a>
	<ul class="mega_dropdown">
		<li id="menu-item-51" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-51  default_style   submenu_full_width columns"><a href="/241" class="item_link  with_icon"><i class="im-icon-quotes-right"></i> <span><span class="link_text">Sequi nesciunt</span></span></a></li>
		<li id="menu-item-52" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-52  default_style   submenu_full_width columns"><a href="/242" class="item_link  with_icon"><i class="im-icon-libreoffice"></i> <span><span class="link_text">Neque porro</span></span></a></li>
		<li id="menu-item-53" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53  default_style   submenu_full_width columns"><a href="/243" class="item_link  with_icon"><i class="fa-icon-rss"></i> <span><span class="link_text">Quisquam est</span></span></a></li>
		<li id="menu-item-54" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-54  default_style   submenu_full_width columns"><a href="/244" class="item_link  with_icon"><i class="im-icon-checkbox-unchecked"></i> <span><span class="link_text">Qui dolorem</span></span></a></li>

	</ul></li>

</ul></li>
<li id="menu-item-72" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-72 post_type_dropdown additional_style_4 drop_to_left  submenu_default_width columns8"><a href="http://4" class="item_link  with_icon"><i class="im-icon-bullhorn"></i> <span><span class="link_text">Recent Posts</span></span></a>
<ul class="mega_dropdown">
<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_22-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/118/" class="icon">
				<i class="im-icon-cup-2"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_22-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-cup-2"></i></div><div class="post_title">Et harum quidem rerum facilis</div><div class="post_description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_21-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/115/" class="icon">
				<i class="im-icon-cog"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_21-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-cog"></i></div><div class="post_title">At vero eos et accusamus</div><div class="post_description">At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_19-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/112/" class="icon">
				<i class="im-icon-brightness-medium"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_19-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-brightness-medium"></i></div><div class="post_title">Duis aute irure dolor in</div><div class="post_description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_18-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/109/" class="icon">
				<i class="im-icon-fire-2"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_18-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-fire-2"></i></div><div class="post_title">Lorem ipsum dolor sit amet</div><div class="post_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_17-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/106/" class="icon">
				<i class="im-icon-trophy-2"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_17-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-trophy-2"></i></div><div class="post_title">Sed ut perspiciatis</div><div class="post_description">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_14-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/100/" class="icon">
				<i class="im-icon-leaf"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_14-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-leaf"></i></div><div class="post_title">Lorem ipsum dolor sit amet</div><div class="post_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_12-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/97/" class="icon">
				<i class="im-icon-star-2"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_12-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-star-2"></i></div><div class="post_title">Temporibus autem quibusdam</div><div class="post_description">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et voluptates repudiandae sint et molestiae non recusandae.</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_10-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/94/" class="icon">
				<i class="im-icon-pencil-3"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_10-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-pencil-3"></i></div><div class="post_title">Et harum quidem rerum facilis</div><div class="post_description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_09-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/91/" class="icon">
				<i class="im-icon-twitter"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_09-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-twitter"></i></div><div class="post_title">At vero eos et accusamus</div><div class="post_description">At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_06-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/88/" class="icon">
				<i class="im-icon-cord"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_06-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-cord"></i></div><div class="post_title">Quis autem vel eum iure reprehenderit</div><div class="post_description">Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_07-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/85/" class="icon">
				<i class="im-icon-crown"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_07-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-crown"></i></div><div class="post_title">Ut enim ad minima veniam</div><div class="post_description">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodiconsequatur</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_01-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/82/" class="icon">
				<i class="im-icon-bullhorn"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_01-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-bullhorn"></i></div><div class="post_title">Nemo enim ipsam voluptatem</div><div class="post_description">Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_02-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/79/" class="icon">
				<i class="im-icon-bug"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_02-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-bug"></i></div><div class="post_title">Sed ut perspiciatis</div><div class="post_description">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_03-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/76/" class="icon">
				<i class="fa-icon-beaker"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_03-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="fa-icon-beaker"></i></div><div class="post_title">Duis aute irure dolor</div><div class="post_description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_04-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/73/" class="icon">
				<i class="im-icon-alarm"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_04-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-alarm"></i></div><div class="post_title">Lorem ipsum dolor</div><div class="post_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_15-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/1/" class="icon">
				<i class="im-icon-apple"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_15-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-apple"></i></div><div class="post_title">Duis aute irure dolor in</div><div class="post_description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim...</div></div><!-- /.post_details --></li><!-- /.post_item -->
</ul></li>
<li id="menu-item-55" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-55 grid_dropdown additional_style_5 drop_to_left  submenu_default_width columns6"><a href="/3" class="item_link  with_icon"><i class="im-icon-grid-5"></i> <span><span class="link_text">Grid</span></span></a>
<ul class="mega_dropdown">
	<li id="menu-item-56" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-56    columns" style="width:16.666666666667%;"><a href="/31" class="item_link  witout_img"><i class="im-icon-clipboard-4"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-clipboard-4"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/56/" title="Quis autem vel">Quis autem vel</a></div><div class="post_description">Item description. Sed ut perspiciatis, unde omnis iste natus error sit.</div></div><!-- /.post_details --></li>
	<li id="menu-item-57" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-57    columns" style="width:16.666666666667%;"><a href="/32" class="item_link  witout_img"><i class="im-icon-history-2"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-history-2"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/57/" title="Eum iure">Eum iure</a></div><div class="post_description">Item description. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit.</div></div><!-- /.post_details --></li>
	<li id="menu-item-58" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-58    columns" style="width:16.666666666667%;"><a href="/33" class="item_link  witout_img"><i class="im-icon-google-plus-4"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-google-plus-4"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/58/" title="Reprehenderit">Reprehenderit</a></div><div class="post_description">Item description. Ut enim ad minima veniam, quis nostrum exercitationem.</div></div><!-- /.post_details --></li>
	<li id="menu-item-59" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-59    columns" style="width:16.666666666667%;"><a href="/34" class="item_link  witout_img"><i class="im-icon-rulers"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-rulers"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/59/" title="Velit esse">Velit esse</a></div><div class="post_description">Item description. Sed ut perspiciatis, unde omnis iste natus error sit.</div></div><!-- /.post_details --></li>
	<li id="menu-item-64" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-64    columns" style="width:16.666666666667%;"><a href="/35" class="item_link  witout_img"><i class="fa-icon-code-fork"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="fa-icon-code-fork"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/64/" title="Quam nihil">Quam nihil</a></div><div class="post_description">Item description. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit.</div></div><!-- /.post_details --></li>
	<li id="menu-item-65" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-65    columns" style="width:16.666666666667%;"><a href="/36" class="item_link  witout_img"><i class="im-icon-link2"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-link2"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/65/" title="Molestiae consequatur">Molestiae consequatur</a></div><div class="post_description">Item description. Sed ut perspiciatis, unde omnis iste natus error sit.</div></div><!-- /.post_details --></li>
	<li id="menu-item-66" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-66    columns" style="width:16.666666666667%;"><a href="/37" class="item_link  witout_img"><i class="im-icon-bubble"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-bubble"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/66/" title="Nulla pariatur">Nulla pariatur</a></div><div class="post_description">Item description. Ut enim ad minima veniam, quis nostrum exercitationem.</div></div><!-- /.post_details --></li>
	<li id="menu-item-67" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-67    columns" style="width:16.666666666667%;"><a href="/38" class="item_link  witout_img"><i class="im-icon-pacman"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-pacman"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/67/" title="At vero eos et">At vero eos et</a></div><div class="post_description">Item description. Quis autem vel eum iure reprehenderit, qui in ea voluptate velit.</div></div><!-- /.post_details --></li>
	<li id="menu-item-70" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-70    columns" style="width:16.666666666667%;"><a href="/39" class="item_link  witout_img"><i class="fa-icon-signin"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="fa-icon-signin"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/70/" title="Blanditiis praesentium">Blanditiis praesentium</a></div><div class="post_description">Item description. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit.</div></div><!-- /.post_details --></li>
	<li id="menu-item-68" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-68    columns" style="width:16.666666666667%;"><a href="/3-10" class="item_link  witout_img"><i class="im-icon-clipboard-3"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-clipboard-3"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/68/" title="Accusamus et">Accusamus et</a></div><div class="post_description">Item description. Nam libero tempore, cum soluta nobis est eligendi optio, cumque.</div></div><!-- /.post_details --></li>
	<li id="menu-item-69" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-69    columns" style="width:16.666666666667%;"><a href="/3-11" class="item_link  witout_img"><i class="im-icon-align-bottom"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-align-bottom"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/69/" title="Iusto odio dignissimos">Iusto odio dignissimos</a></div><div class="post_description">Item description. Ut enim ad minima veniam, quis nostrum exercitationem.</div></div><!-- /.post_details --></li>
	<li id="menu-item-71" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-71    columns" style="width:16.666666666667%;"><a href="/3-12" class="item_link  witout_img"><i class="im-icon-file-powerpoint"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-file-powerpoint"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/71/" title="Deleniti atque corrupti">Deleniti atque corrupti</a></div><div class="post_description">Item description. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit.</div></div><!-- /.post_details --></li>

</ul></li>
<li id="menu-item-137" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-137 widgets_dropdown additional_style_6 drop_to_left  submenu_default_width columns2"><a href="/6" class="item_link  with_icon"><i class="im-icon-puzzle"></i> <span><span class="link_text">Widgets</span></span></a>
<ul class="mega_dropdown">
<div id="text-7" class="widget widget_text"><div class="widgettitle">Contact Us</div>			<div class="textwidget"><ul class="contacts"> 
<li><i class="im-icon-envelop"></i><a href="#">info@megamain.com</a><br>
</li>
<li><i class="im-icon-globe"></i><a href="#">www.megamain.com</a><br>
</li>
<li><i class="im-icon-phone"></i>+1 234-567-8000<br>
</li>
<li> <i class="im-icon-office"></i>600 Madison Ave, New York, NY 10022 United States<br>
</li>
</ul> </div>
		</div><div id="text-6" class="widget widget_text"><div class="widgettitle">Find Us</div>			<div class="textwidget"><iframe src="https://mapsengine.google.com/map/u/0/embed?mid=zbHZaCE4IBhk.k16bc0NN63hE" width="100%" height="260"></iframe>
</div>
		</div>
</ul></li>
</ul><!-- /class="mega_main_menu_ul" -->
		</div><!-- /class="menu_inner" -->
	</div><!-- /class="menu_holder" --></div>			</div><!-- /.navigation-->
		</div><!-- class="container" -->
	</div><!-- class="" -->';
  
  
  */
  
  
  
  ${'MENU'.$arg .'_'. $val} .= '<div class="menu_1">
		<div class="container">
			<div class="navigation">
<div id="mega_main_menu" class="nav_menu primary_menu icons-left first-lvl-align-left first-lvl-separator-smooth direction-horizontal responsive-enable mobile_minimized-enable version-1-1-0 include-logo include-search dropdowns_animation-anim_5">
	<div class="menu_holder" data-sticky="1" data-stickyoffset="120">
		<div class="menu_inner">
			<span class="nav_logo">
				<a class="logo_link" href="http://menu.megamain.com" title="Mega Main Menu" tabindex="1"><img src="http://menu.megamain.com/wp-content/plugins/mega_main_menu/src/img/megamain-logo-120x120.png" alt="Mega Main Menu"></a>
				<a class="mobile_toggle"><span class="mobile_button">Menu&nbsp; <span class="symbol_menu">≡</span><span class="symbol_cross">╳</span></span></a>
			</span><!-- /class="nav_logo" -->
				<ul id="mega_main_menu_ul" class="mega_main_menu_ul">
	<li class="nav_search_box">
	<form method="get" id="mega_main_menu_searchform" action="http://menu.megamain.com/">
		<i class="im-icon-search-3 icosearch"></i>
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="Search">
		<input type="text" class="field" name="s" id="s" tabindex="1">
	</form>
	</li><!-- class="nav_search_box" -->
	<li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-11 default_dropdown additional_style_1 drop_to_right  submenu_default_width columns2"><a title="Standard" href="/1" class="item_link  with_icon"><i class="im-icon-checkmark-3"></i> <span><span class="link_text">Standard</span></span></a>
<ul class="mega_dropdown">
	<li id="menu-item-12" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-12  default_style   submenu_default_width columns"><a href="/11" class="item_link  with_icon"><i class="fa-icon-fighter-jet"></i> <span><span class="link_text">Lorem ipsum</span></span></a></li>
	<li id="menu-item-13" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-13  default_style   submenu_default_width columns"><a href="/12" class="item_link  with_icon"><i class="im-icon-clipboard-4"></i> <span><span class="link_text">Dolor sit amet</span></span></a>
	<ul class="mega_dropdown">
		<li id="menu-item-20" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-20  default_style   submenu_default_width columns"><a href="/121" class="item_link  with_icon"><i class="im-icon-history-2"></i> <span><span class="link_text">Ut enim ad minim</span></span></a></li>
		<li id="menu-item-21" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-21  default_style   submenu_default_width columns"><a href="/122" class="item_link  with_icon"><i class="im-icon-google-plus-4"></i> <span><span class="link_text">Veniam</span></span></a>
		<ul class="mega_dropdown">
			<li id="menu-item-27" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27  default_style   submenu_default_width columns"><a href="/1221" class="item_link  with_icon"><i class="im-icon-rulers"></i> <span><span class="link_text">Duis aute irure</span></span></a></li>
			<li id="menu-item-28" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-28  default_style   submenu_default_width columns"><a href="/1222" class="item_link  with_icon"><i class="im-icon-temperature-2"></i> <span><span class="link_text">Dolor in reprehenderit</span></span></a></li>
			<li id="menu-item-29" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-29  default_style   submenu_default_width columns"><a href="/1223" class="item_link  with_icon"><i class="im-icon-movie"></i> <span><span class="link_text">In voluptate velit</span></span></a></li>

		</ul></li>
		<li id="menu-item-22" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-22  default_style   submenu_default_width columns"><a href="/123" class="item_link  with_icon"><i class="im-icon-file-4"></i> <span><span class="link_text">Quis nostrud</span></span></a></li>
		<li id="menu-item-23" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-23  default_style   submenu_default_width columns"><a href="/124" class="item_link  with_icon"><i class="im-icon-magnet-3"></i> <span><span class="link_text">Exercitation ullamco</span></span></a></li>
		<li id="menu-item-24" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24  default_style   submenu_default_width columns"><a href="/125" class="item_link  with_icon"><i class="im-icon-seven-segment-1"></i> <span><span class="link_text">Laboris nisi ut</span></span></a></li>
		<li id="menu-item-25" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-25  default_style   submenu_default_width columns"><a href="/126" class="item_link  with_icon"><i class="fa-icon-file-alt"></i> <span><span class="link_text">Aliquip ex ea</span></span></a></li>
		<li id="menu-item-26" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26  default_style   submenu_default_width columns"><a href="/127" class="item_link  with_icon"><i class="fa-icon-code-fork"></i> <span><span class="link_text">Commodo consequat</span></span></a></li>

	</ul></li>
	<li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14  default_style   submenu_default_width columns"><a href="/13" class="item_link  with_icon"><i class="im-icon-nbsp"></i> <span><span class="link_text">Consectetur</span></span></a></li>
	<li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15  default_style   submenu_default_width columns"><a href="/14" class="item_link  with_icon"><i class="im-icon-file-3"></i> <span><span class="link_text">Adipisicing elit</span></span></a></li>
	<li id="menu-item-16" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-16  default_style   submenu_default_width columns"><a href="/15" class="item_link  with_icon"><i class="im-icon-zoom-in"></i> <span><span class="link_text">Sed do eiusmod</span></span></a></li>
	<li id="menu-item-17" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-17  default_style   submenu_default_width columns"><a href="/16" class="item_link  with_icon"><i class="im-icon-folder-plus"></i> <span><span class="link_text">Tempor incididunt</span></span></a></li>
	<li id="menu-item-18" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-18  default_style   submenu_default_width columns"><a href="/17" class="item_link  with_icon"><i class="im-icon-spinner-10"></i> <span><span class="link_text">Ut labore et</span></span></a></li>
	<li id="menu-item-19" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-19  default_style   submenu_default_width columns"><a href="/18" class="item_link  with_icon"><i class="im-icon-arrow-4"></i> <span><span class="link_text">Dolore magna aliqua</span></span></a></li>

</ul></li>

</ul></li>
</ul><!-- /class="mega_main_menu_ul" -->
		</div><!-- /class="menu_inner" -->
	</div><!-- /class="menu_holder" --></div>			</div><!-- /.navigation-->
		</div><!-- class="container" -->
	</div>';
  

//////

		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
		
		
		
		
		if ($conf_value == 'skin21'){

		
			
	//<link rel="stylesheet" href="https://googledrive.com/host/0B8nb-pnqjGo_RmxNeVdHVEF4U00/css/style.css"><link rel="stylesheet" href="https://googledrive.com/host/0B8nb-pnqjGo_RmxNeVdHVEF4U00/css/colors/blue.css">
	//<ul><li class="link"><a href="#" class="ico-home" data-title="Home" ></a></li><li class="separ"></li><li class="link"><a href="#" class="ico-about" data-title="About us" ></a></li><li class="separ"></li><li class="link"><a href="#" class="ico-services" data-title="Services" ></a></li><li class="separ"></li><li class="link"><a href="#" class="ico-portfolio" data-title="Portfolio" ></a></li><li class="separ"></li><li class="link"><a href="#" class="ico-blog" data-title="Blog" ></a></li><li class="separ"></li><li class="link"><a href="#" class="ico-contact" data-title="Contact" ></a></li></ul>
	
		
				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf21.css" rel="stylesheet" />
				 	<link rel="stylesheet" href="https://googledrive.com/host/0B8nb-pnqjGo_RmxNeVdHVEF4U00/css/style.css"><link rel="stylesheet" href="https://googledrive.com/host/0B8nb-pnqjGo_RmxNeVdHVEF4U00/css/colors/blue.css">

					<link rel="stylesheet" type="text/css" href="/arabesk125/themes/maitscocorporate/css/icomoon.css">
					<link rel="stylesheet" type="text/css" href="/arabesk125/themes/maitscocorporate/css/font-awesome.css">
					
					';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul>';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="link">
								<a href="'.$item1['link'].'" class="'.$item1['icons'].'" data-title="'.$item1['label'].'"></a>
								<li class="separ"></li>';
					
					
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
		
		
		
		
		if ($conf_value == 'mega_menu'){
		
			if( ! function_exists( 'mmm_nav_search' ) ){
				function mmm_nav_search( $items ) {
					$searchform = '';
					$searchform .= '<li class="nav_search_box">';
						$searchform .= '<form method="get" id="mega_main_menu_searchform" action="http://localhost/xoops25777/search.php">
							<i class="im-icon-search-3 icosearch"></i>
							<input type="submit" class="submit" name="submit" id="searchsubmit" value="Search" />
							<input type="text" class="field" name="s" id="s" />
						</form>';
					$searchform .= '</li><!-- class="nav_search_box" -->';
					$items = $searchform;
				
			
				return $items;
				}
			}
			
			if( ! function_exists( 'mmm_nav_login' ) ){
				function mmm_nav_login( $items) {
					$searchform = '';
					$searchform .= '<li class="nav_login">';
					$searchform .= '<span id="top-menu-login" class="top-menu-login" style="font-size: medium;">Login</span>';
					$searchform .= '</li><!-- class="nav_login" -->';
					$items = $searchform;
					//$items = '<li class="nav_search_box"><h3>login</h3></li>';
				
			
				return $items;
				}
			}
			
			if( ! function_exists( 'mmm_nav_register' ) ){
				function mmm_nav_register( $items ) {
					$searchform = '';
					$searchform .= '<li class="nav_register">';
					$searchform .= '<span id="top-menu-register" class="top-menu-register" style="font-size: medium;">Register</span>';
					$searchform .= '</li><!-- class="nav_register" -->';
					$items = $searchform;
					//$items = '<li class="nav_search_box"><h3>register</h3></li>';
				
			
				return $items;
				}
			}
			
			if( ! function_exists( 'mmm_nav_social' ) ){
				function mmm_nav_social( $items ) {
					$searchform = '';
					$searchform .= '<li class="nav_register">';
					$searchform .= '<a href="register.php" class=""><i class="im-icon-user-plus icosearch"></i></a>';
					$searchform .= '</li><!-- class="nav_register" -->';
					$items = $searchform;
					//$items = '<li class="nav_search_box"><h3>register</h3></li>';
				
			
				return $items;
				}
			}

				 if(!empty($menuhorizontal)) {
				 $unserialise = unserialize($conf_desc);
				 //var_dump($unserialise);
				 if ($unserialise['stickyoffset'] > 0){
					${'MENU'.$arg .'_'. $val} .="
							
							 <script type='application/javascript'>
							 jQuery(document).ready(function(){
							jQuery(window).on('scroll', function(){
								menu_holder = jQuery( '#mega_main_menu > .menu_holder' );
								menu_inner = menu_holder.find( '.menu_inner' );
								if ( menu_holder.attr( 'data-sticky' ) == '1' ) {
									stickyoffset = menu_holder.data( 'stickyoffset' ) * 1;
									scrollpath = jQuery(window).scrollTop();
									if ( scrollpath > stickyoffset ) {
										if ( !menu_holder.hasClass( 'sticky_container' ) ) {
											menu_inner_width = menu_inner.width();
											menu_inner.attr( 'style' , 'width:' + menu_inner_width + 'px;' );
											menu_holder.addClass( 'sticky_container' );
										}
									} else {
										menu_holder.removeClass( 'sticky_container' );
										style_attr = jQuery( menu_inner ).attr( 'style' );
										if ( typeof style_attr !== 'undefined' && style_attr !== false ) {
											menu_inner.removeAttr( 'style' );
										}
									}
								} else {
									menu_holder.removeClass( 'sticky_container' );
								}
							});
							});
							</script>
							";
					
				 }else{
				 
					//$stick = 'class="menu_holder"';
				 
				 }
				 
				 
				 
				 //${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/plugins/mega_main_menu/src/css/cache.skin.css?ver=3.8.1" rel="stylesheet" />';
				if ($unserialise['color'] == 'blue'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="'.XOOPS_URL.'/themes/themebuilder/css/blue.skin.css" rel="stylesheet" />';
					 }elseif ($unserialise['color'] == 'green'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/green.skin.css?ver=1.1.0" rel="stylesheet" />';
					 }elseif ($unserialise['color'] == 'orange'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/orange.skin.css?ver=1.1.0" rel="stylesheet" />';
					 }elseif ($unserialise['color'] == 'depthblue'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/depthblue.skin.css?ver=1.1.0" rel="stylesheet" />';
					 }elseif ($unserialise['color'] == 'multicolor'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/multicolor.skin.css?ver=1.1.0" rel="stylesheet" />';
					 }elseif ($unserialise['color'] == 'aqua'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/aqua.skin.css?ver=1.1.0" rel="stylesheet" />';
					 }elseif ($unserialise['color'] == 'silver'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/silver.skin.css?ver=1.1.0" rel="stylesheet" />';
					 }elseif ($unserialise['color'] == 'violet'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/violet.skin.css?ver=1.1.0" rel="stylesheet" />';
					 }elseif ($unserialise['color'] == 'white'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/white.skin.css?ver=1.1.0" rel="stylesheet" />';
				}
				
			$container_class = 
            ' primary_style-' . $unserialise['primarystyle'] . 
            ' icons-' . $unserialise['lang-menu_first_level_icons_position'] . 
           	' first-lvl-align-' . $unserialise['lang-menu_first_level_item_align'] . 
           	' first-lvl-separator-' . $unserialise['lang-menu_first_level_separator'] . 
           	' language_direction-' . $unserialise['language_direction'] . 
           	' direction-' . $unserialise['_direction'] . 
//           	' responsive-' . ( ( is_array( $mega_main_menu'responsive_styles' ) && in_array( 'true', $mega_main_menu'responsive_styles'  ) ) ? 'enable' : 'disable' ) . 
			' responsive-enable' .
			' mobile_minimized-enable' .
//           	' mobile_minimized-' . ( ( ( is_array( $mega_main_menu . '_mobile_minimized'  ) && in_array( 'true', $mega_main_menu . '_mobile_minimized'  ) ) || ( $indefinite_location_mode === true ) ) ? 'enable' : 'disable' ) . 
//           	' fullwidth-' . ( ( is_array( $mega_main_menu->get_option( $args['theme_location'] . '_fullwidth_container' ) ) && in_array( 'true', $mega_main_menu->get_option( $args['theme_location'] . '_fullwidth_container' ) ) ) ? 'enable' : 'disable' ) . 
           	' dropdowns_animation-' . $unserialise['_dropdowns_animation']
			;
			if(  $unserialise['logo_src'] ) {
				$container_class .= ' include-logo';
			} else {
				$container_class .= ' no-logo';
			}
			if(  $unserialise['search_box'] ) {
				$container_class .= ' include-search';
			} else {
				$container_class .= ' no-search';
			}
			if( $unserialise['login'] ) {
				$container_class .= ' include-login';
			} else {
				$container_class .= ' no-login';
			}
			if( $unserialise['buddypress'] ) {
				$container_class .= ' include-buddypress';
			} else {
				$container_class .= ' no-buddypress';
			}				
				
				
				if ($unserialise['stickyoffset'] > 0){
				$datasticky = 'data-sticky="1"';
				}
				
				
				 ${'MENU'.$arg .'_'. $val} .= '<link rel="stylesheet" type="text/css" href="/arabesk125/themes/maitscocorporate/css/mega_main_menu.css">';
				 
				 ${'MENU'.$arg .'_'. $val} .= '<link rel="stylesheet" type="text/css" href="/arabesk125/themes/maitscocorporate/css/icomoon.css">
									<link rel="stylesheet" type="text/css" href="/arabesk125/themes/maitscocorporate/css/font-awesome.css">
									
		
	<div class="menu_1">
		<div class="containermegamenu">
			<div class="navigation">
				<div id="mega_main_menu" class="nav_menu primary_menu '.$container_class.' icons-left first-lvl-align-left first-lvl-separator-smooth '.$unserialise['direction'].' responsive-enable mobile_minimized-enable '.$unserialise['animation'].' version-1-1-0 include-logo include-search">
					<div class="menu_holder" '.$datasticky.' data-stickyoffset="'.$unserialise['stickyoffset'].'">
					<div class="mmm_fullwidth_container"></div>
						<div class="menu_inner">

			<span class="nav_logo mobile_menu_active">
				<a class="logo_link" href="http://menu.megamain.com" title="Mega Main Menu">
					<img src="http://menu.megamain.com/wp-content/plugins/mega_main_menu/src/img/megamain-logo-120x120.png" alt="Mega Main Menu">
				</a>
				<a class="mobile_toggle">
					<span class="mobile_button">
						Menu &nbsp;
						<span class="symbol_menu">≡</span>
						<span class="symbol_cross">╳</span>
					</span><!-- class="mobile_button" -->
				</a>
			</span>
						
	<ul id="mega_main_menu_ul" class="mega_main_menu_ul">';
	
		
		foreach($menuhorizontal as $k => $item1){
						
						if ($item1['class'] == 'default_dropdown'){
						//default_dropdown
													
													
						${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item1['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-'.$item1['id'].' default_dropdown additional_style_1 drop_to_right  submenu_default_width columns2">
								<a title="'.$item1['label'].'" href="'.$item1['link'].'" class="item_link  with_icon"><i class="'.$item1['icons'].'"></i> <span><span class="link_text">'.$item1['label'].'</span></span></a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul class="mega_dropdown">';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																					${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item2['id'].'" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item2['id'].' default_style submenu_default_width columns">
																						<a href="'.$item2['link'].'" class="item_link  with_icon"><i class="'.$item2['icons'].'"></i> <span><span class="link_text">'.$item2['label'].'</span></span></a>';
																						
																									if(!empty($item2['submenu'])) {
																												${'MENU'.$arg .'_'. $val} .= '<ul class="mega_dropdown">';
																													foreach($item2['submenu'] as $k2 => $item3){
																															${'MENU'.$arg .'_'. $val} .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item3['id'].' submenu_default_width columns">
																															<a href="'.$item3['link'].'" class="item_link  with_icon"><i class="'.$item3['icons'].'"></i> <span><span class="link_text">'.$item3['label'].'</span></span></a>
																															';
																													
																													
																													${'MENU'.$arg .'_'. $val} .= '</li>	';
																													}
																									
																												${'MENU'.$arg .'_'. $val} .= '</ul>	';							
																									}
																					${'MENU'.$arg .'_'. $val} .= '</li>	';
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					
					



					if ($item1['class'] == 'multicolumn_dropdown_bg'){
						//multicolumn_dropdown with background								
						${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item1['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-'.$item1['id'].' multicolumn_dropdown additional_style_2 drop_to_right  submenu_default_width columns3">
								<a title="'.$item1['label'].'" href="'.$item1['link'].'" class="item_link  with_icon"><i class="'.$item1['icons'].'"></i> <span><span class="link_text">'.$item1['label'].'</span></span></a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul class="mega_dropdown" style="background-image:url(http://menu.megamain.com/wp-content/uploads/2013/10/iphone.png);background-repeat:no-repeat;background-attachment:scroll;background-position:center right;background-size:auto 100%;">';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item2['id'].'" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item2['id'].' default_style submenu_default_width columns">
																						<a href="'.$item2['link'].'" class="item_link  with_icon"><i class="'.$item2['icons'].'"></i> <span><span class="link_text">'.$item2['label'].'</span></span></a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul class="mega_dropdown">';
																								foreach($item2['submenu'] as $k2 => $item3){
																								
																								${'MENU'.$arg .'_'. $val} .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item3['id'].' submenu_default_width columns">
																								<a href="'.$item3['link'].'" class="item_link  with_icon"><i class="'.$item3['icons'].'"></i> <span><span class="link_text">'.$item3['label'].'</span></span></a>';
																								${'MENU'.$arg .'_'. $val} .= '</li>	';
																								}
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';							
																						}
																					
																					${'MENU'.$arg .'_'. $val} .= '</li>	';
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					
					
					
					
					
					
			if ($item1['class'] == 'multicolumn_dropdown'){
						//multicolumn_dropdown normal										
													
						${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item1['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-'.$item1['id'].' multicolumn_dropdown additional_style_3 drop_to_right  submenu_default_width columns4">
								<a title="'.$item1['label'].'" href="'.$item1['link'].'" class="item_link  with_icon"><i class="'.$item1['icons'].'"></i> <span><span class="link_text">'.$item1['label'].'</span></span></a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul class="mega_dropdown">';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item2['id'].'" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item2['id'].' default_style submenu_default_width columns">
																						<a href="'.$item2['link'].'" class="item_link  with_icon"><i class="'.$item2['icons'].'"></i> <span><span class="link_text">'.$item2['label'].'</span></span></a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul class="mega_dropdown">';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item3['id'].' submenu_default_width columns">
																						<a href="'.$item3['link'].'" class="item_link  with_icon"><i class="'.$item3['icons'].'"></i> <span><span class="link_text">'.$item3['label'].'</span></span></a>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</li>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</ul>	';							
																					}
																					
																				${'MENU'.$arg .'_'. $val} .= '</li>	';
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}



					if ($item1['class'] == 'grid_dropdown'){		
						//grid_dropdown			
													
						${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item1['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-'.$item1['id'].' grid_dropdown additional_style_4 drop_to_right  submenu_default_width columns5">
								<a title="'.$item1['label'].'" href="'.$item1['link'].'" class="item_link  with_icon"><i class="'.$item1['icons'].'"></i> <span><span class="link_text">'.$item1['label'].'</span></span></a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul class="mega_dropdown">';
																	foreach($item1['submenu'] as $k1 => $item2){																
																			${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item2['id'].'" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item2['id'].' default_style submenu_default_width columns" style="width:16.666666666667%;">
																			<a href="'.$item2['link'].'" class="item_link  with_icon"><i class="'.$item2['icons'].'"></i> </a>';
																						
																						${'MENU'.$arg .'_'. $val} .= '
																						
																						<div class="post_details">
																								<div class="post_icon pull-left"><i class="'.$item2['icons'].'"></i></div>
																								<div class="post_title"><a rel="bookmark" href="'.$item2['link'].'" title="'.$item2['label'].'">'.$item2['label'].'</a></div>
																								<div class="post_description">Item description. '.$item2['label'].'.</div>
																						</div><!-- /.post_details -->
																						
																						
																						</li>	';
																						
																						
																						if(!empty($item2['submenu'])) {

																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item3['id'].'" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item3['id'].' submenu_default_width columns" style="width:16.666666666667%;">
																						<a href="'.$item3['link'].'" class="item_link  with_icon"><i class="'.$item3['icons'].'"></i> </a>';
																						${'MENU'.$arg .'_'. $val} .= '
																						
																						<div class="post_details">
																								<div class="post_icon pull-left"><i class="'.$item3['icons'].'"></i></div>
																								<div class="post_title"><a rel="bookmark" href="'.$item3['link'].'" title="'.$item3['label'].'">'.$item3['label'].'</a></div>
																								<div class="post_description">Item description. '.$item3['label'].'.</div>
																						</div><!-- /.post_details -->
																						
																						
																						</li>	';
																						}
																						
																					}
																					
																			//${'MENU'.$arg .'_'. $val} .= '</li>	';
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';



					
					 
					}
			}

	${'MENU'.$arg .'_'. $val} .= mmm_nav_search($arg);
${'MENU'.$arg .'_'. $val} .= mmm_nav_login($arg);
${'MENU'.$arg .'_'. $val} .= mmm_nav_register($arg);	
			






			
	
	${'MENU'.$arg .'_'. $val} .= '
	</ul><!-- /class="mega_main_menu_ul" -->
		</div><!-- /class="menu_inner" -->
			</div><!-- /class="menu_holder" -->
				</div><!-- /.mega_main_menu-->
					</div><!-- /.navigation-->
						</div><!-- class="container" -->
							</div><!-- class="menu_1" -->					
					
					
					

				 ';

				}

		//$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		$hhhh = 'MENU_'.$arg .'_'. $val;
		//$MENU_.$arg .'_'. $val = ${'MENU'.$arg.'_'.$val};
		//var_dump(${'MENU'.$arg .'_'. $val});
		//$MENU.$arg.'_'.$val= 'jjjj';
		//var_dump(${'MENU'.$arg.'_'.$val});
		//$MENU_menu2_6 = 'ddddddddddddddddd';
		//var_dump($MENU_.$arg .'_'. $val);
		//echo $val;
		//var_dump($hhhh);
		//var_dump($val);
		$$hhhh = ${'MENU'.$arg.'_'.$val};
		}
		
		
		


/////
/////		
		

		
		
		




if ($conf_value == 'mega_menu1'){

		$unserialise = unserialize($conf_desc);

		
		
		//var_dump($conf_value);
		
		
		
		
		
		
		
		
		
		
if ( !function_exists( 'css_font' ) ){ 		
	function css_font( $args = array() ) {
//var_dump($args);
			$font = '';
			if ( $args['font_family'] != '' && $args['font_family'] != false ) {
				if ( $args['font_family'] == 'Inherit' ) {
					$font .= "font-family: inherit;\n";
				} else {
					$font .= "font-family: " . $args['font_family'] . ", '" . $args['font_family'] . "';\n";
				}
			}
			if ( $args['font_color'] != '' && $args['font_color'] != false ) {
				$font .= "color: " . $args['font_color'] . ";\n";
			}
			if ( $args['font_size'] != '' && $args['font_size'] != false ) {
				$font .= "font-size: " . $args['font_size'] . "px;\n";
			}
			if ( $args['font_weight'] != '' && $args['font_weight'] != false ) {
				$font .= "font-weight: " . $args['font_weight'] . ";\n";
			}
			return $font;
		}
}



		$out = '/* ' . $arg . ' */
/* initial_height */
#mega_main_menu.' . $arg . '
{
	min-height:' . $unserialise['_first_level_item_height'] . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > .nav_logo > .logo_link, 
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle, 
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button, 
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link, 
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link > .link_content, 
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_search_box,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_login,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_register,
#mega_main_menu.' . $arg . '.icons-left > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.icons-right > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.disable_icon > .link_content,
#mega_main_menu.' . $arg . '.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.menu_item_without_text > i, 
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link > i.ci-icon-buddypress-user
{
	height:' . $unserialise['_first_level_item_height'] . 'px;
	line-height:' . $unserialise['_first_level_item_height'] . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link > .link_content > .link_text
{
	height:' . $unserialise['_first_level_item_height'] . 'px;
}
#mega_main_menu.' . $arg . '.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
{
	height:' . ( $unserialise['_first_level_item_height'] / 2 ) . 'px;
	line-height:' . ( $unserialise['_first_level_item_height'] / 3 ) . 'px;
}
#mega_main_menu.' . $arg . '.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.with_icon > .link_content > .link_text
{
	height:' . ( $unserialise['_first_level_item_height'] / 3 ) . 'px;
}
#mega_main_menu.' . $arg . '.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i
{
	padding-top:' . ( $unserialise['_first_level_item_height'] / 3 / 2 ) . 'px;
}
#mega_main_menu.' . $arg . '.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
{
	padding-bottom:' . ( $unserialise['_first_level_item_height'] / 3 / 2 ) . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link > i:before
{	
	width:' . ( $unserialise['_first_level_item_height'] * 0.6 ) . 'px;
}
/* initial_height_sticky */
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > .nav_logo > .logo_link, 
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > .nav_logo > .mobile_toggle, 
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button, 
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link, 
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > .link_content, 
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > ul > li.nav_search_box,
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > ul > li.nav_login,
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > ul > li.nav_register,
#mega_main_menu.' . $arg . '.icons-left > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.icons-right > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link.disable_icon > .link_content,
#mega_main_menu.' . $arg . '.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link.menu_item_without_text > i, 
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > ul > li.nav_buddypress > .item_link > i.ci-icon-buddypress-user
{
	height:' . $unserialise['_first_level_item_height_sticky'] . 'px;
	line-height:' . $unserialise['_first_level_item_height_sticky'] . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > .link_content > .link_text 
{
	height:' . $unserialise['_first_level_item_height_sticky'] . 'px;
	
}
#mega_main_menu.' . $arg . '.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > .link_content
{
	height:' . ( $unserialise['_first_level_item_height_sticky'] / 2 ) . 'px;
	line-height:' . ( $unserialise['_first_level_item_height_sticky'] / 3 ) . 'px;
}
#mega_main_menu.' . $arg . '.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link.with_icon > .link_content > .link_text
{
	height:' . ( $unserialise['_first_level_item_height_sticky'] / 3 ) . 'px;
}
#mega_main_menu.' . $arg . '.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > i
{
	padding-top:' . ( $unserialise['_first_level_item_height_sticky'] / 3 / 2 ) . 'px;
}
#mega_main_menu.' . $arg . '.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > .link_content
{
	padding-bottom:' . ( $unserialise['_first_level_item_height_sticky'] / 3 / 2 ) . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder.sticky_container > .menu_inner > ul > li.nav_buddypress > .item_link > i:before
{	
	width:' . ( $unserialise['_first_level_item_height_sticky'] * 0.6 ) . 'px;
}
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link 
{
	margin:' . ( ( $unserialise['_first_level_item_height_sticky'] - $unserialise['_first_level_button_height'] ) / 2 ) . 'px 4px;
}
#mega_main_menu.direction-horizontal > .menu_holder.sticky_container > .mmm_fullwidth_container {
    top: 0px !important;
    right: 0px !important;
    bottom: 0px !important;
    left: 0px !important;
    background-color: ' . $unserialise['_menu_sticky_bg_gradient'] . ';
}
#mega_main_menu.direction-horizontal > .menu_holder.sticky_container > .menu_inner > ul > li  {

    background-color: ' . $unserialise['_menu_sticky_bg_gradient'] . ';
}
#mega_main_menu.direction-horizontal > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link {

    background-color: transparent;
}
.direction-vertical
	{
		max-width: 300px;
		margin: 0px;
	}


/* initial_height_mobile */
@media (max-width: 767px) { /* DO NOT CHANGE THIS LINE (See = Specific Options -> Responsive Resolution) */
	#mega_main_menu.' . $arg . '
	{
		min-height:' . $unserialise['_first_level_item_height_sticky'] . 'px;
	}
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > .nav_logo > .logo_link, 
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle, 
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button, 
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li > .item_link, 
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li > .item_link > .link_content, 
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li.nav_search_box,
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li.nav_login,
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li.nav_register,
	#mega_main_menu.' . $arg . '.mobile_minimized-enable.icons-left > .menu_holder > .menu_inner > ul > li > .item_link > i,
	#mega_main_menu.' . $arg . '.mobile_minimized-enable.icons-right > .menu_holder > .menu_inner > ul > li > .item_link > i,
	#mega_main_menu.' . $arg . '.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.disable_icon > .link_content,
	#mega_main_menu.' . $arg . '.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.menu_item_without_text > i, 
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link > i.ci-icon-buddypress-user
	{
		height:' . $unserialise['_first_level_item_height_sticky'] . 'px;
		line-height:' . $unserialise['_first_level_item_height_sticky'] . 'px;
	}
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li > .item_link > .link_content > .link_text 
	{
		height:' . $unserialise['_first_level_item_height_sticky'] . 'px;
	}
	#mega_main_menu.' . $arg . '.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i,
	#mega_main_menu.' . $arg . '.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
	{
		height:' . ( $unserialise['_first_level_item_height_sticky'] / 2 ) . 'px;
		line-height:' . ( $unserialise['_first_level_item_height_sticky'] / 3 ) . 'px;
	}
	#mega_main_menu.' . $arg . '.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i
	{
		padding-top:' . ( $unserialise['_first_level_item_height_sticky'] / 3 / 2 ) . 'px;
	}
	#mega_main_menu.' . $arg . '.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
	{
		padding-bottom:' . ( $unserialise['_first_level_item_height_sticky'] / 3 / 2 ) . 'px;
	}
	#mega_main_menu.' . $arg . '.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link > i:before
	{	
		width:' . ( $unserialise['_first_level_item_height_sticky'] * 0.6 ) . 'px;
	}
	#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link 
	{
		margin:' . ( ( $unserialise['_first_level_item_height_sticky'] - $unserialise['_first_level_button_height'] ) / 2 ) . 'px 4px;
	}
}
/* style-buttons */
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link, 
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link > .link_content, 
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-left > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-right > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.disable_icon > .link_content,
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.menu_item_without_text > i, 
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link > i.ci-icon-buddypress-user
{
	height:' . $unserialise['_first_level_button_height'] . 'px;
	line-height:' . $unserialise['_first_level_button_height'] . 'px;
}
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link > .link_content > .link_text 
{
	height:' . $unserialise['_first_level_button_height'] . 'px;
}
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link 
{
	margin:' . ( ( $unserialise['_first_level_item_height'] - $unserialise['_first_level_button_height'] ) / 2 ) . 'px 4px;
}
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
{
	height:' . ( $unserialise['_first_level_button_height'] / 2 ) . 'px;
	line-height:' . ( $unserialise['_first_level_button_height'] / 3 ) . 'px;
}
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.with_icon > .link_content > .link_text 
{
	height:' . ( $unserialise['_first_level_button_height'] / 3 ) . 'px;
}
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i
{
	padding-top:' . ( $unserialise['_first_level_button_height'] / 3 / 2 ) . 'px;
}
#mega_main_menu.' . $arg . '.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
{
	padding-bottom:' . ( $unserialise['_first_level_button_height'] / 3 / 2 ) . 'px;
}
/* color_scheme */
#mega_main_menu.' . $arg . ' > .menu_holder > .mmm_fullwidth_container
{
	/*" . mm_common::css_gradient( $unserialise["_menu_bg_gradient"] ) . "*/
	background-color: ' . $unserialise['_menu_bg_gradient'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .mmm_fullwidth_container
{
	/*" . mm_common::css_bg_image( $unserialise["_menu_bg_image"] ) . "*/	
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link .link_text,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_search_box *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li .post_details > .post_title,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li .post_details > .post_title > .item_link
{
	/*" . mm_common::css_font( $unserialise["_menu_first_level_link_font"] ) . "*/
	' . css_font( $unserialise['_menu_first_level_link_font'] ) . '
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link > i
{
	font-size:' . $unserialise['_menu_first_level_icon_font'] . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link > i:before
{	
	width:' . $unserialise['_menu_first_level_icon_font'] . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link *
{
	color: ' . $unserialise['_menu_first_level_link_color'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link:after
{
	border-color: ' . $unserialise['_menu_first_level_link_color'] . ';
}
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link
{
	/*" . mm_common::css_gradient( $unserialise["_menu_first_level_link_bg"] ) . "*/
	background-color: ' . $unserialise['_menu_first_level_link_bg'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li:hover > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link:hover,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link:focus,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-page-ancestor > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-post-ancestor > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link
{
	/*" . mm_common::css_gradient( $unserialise["_menu_first_level_link_bg_hover"] ) . "*/
	background-color: ' . $unserialise['_menu_first_level_link_bg_hover'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_search_box > #mega_main_menu_searchform
{
	background-color:' . $unserialise['_menu_search_bg'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_search_box .field,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.nav_search_box *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li .icosearch
{
	color: ' . $unserialise['_menu_search_color'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li .icouser
{
	color: ' . $unserialise['_menu_first_level_link_color'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li:hover > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link:hover,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .item_link:focus,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li:hover > .item_link *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-page-ancestor > .item_link *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-post-ancestor > .item_link *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link *
{
	color: ' . $unserialise['_menu_first_level_link_color_hover'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link:after,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-page-ancestor > .item_link:after,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-post-ancestor > .item_link:after,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link:after,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li:hover > .item_link:after
{
	border-color: ' . $unserialise['_menu_first_level_link_color_hover'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.default_dropdown .mega_dropdown,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li > .mega_dropdown,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li .mega_dropdown > li .post_details
{
	/*" . mm_common::css_gradient( $unserialise["_menu_dropdown_wrapper_gradient"] ) . "*/
		background-color: ' . $unserialise['_menu_dropdown_wrapper_gradient'] . ';

}
#mega_main_menu.' . $arg . ' .mega_dropdown *
{
	color: ' . $unserialise['_menu_dropdown_plain_text_color'] . ';
}
#mega_main_menu.' . $arg . ' ul li .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' ul li .mega_dropdown > li > .item_link .link_text,
#mega_main_menu.' . $arg . ' ul li .mega_dropdown,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li .post_details > .post_description
{
	/*" . mm_common::css_font( $unserialise["_menu_dropdown_link_font"] ) . "*/
	' . css_font( $unserialise['_menu_dropdown_link_font'] ) . '
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li .mega_dropdown > li > .item_link.with_icon
{
	line-height: ' . $unserialise['_menu_dropdown_icon_font'] . 'px;
	min-height: ' . $unserialise['_menu_dropdown_icon_font'] . 'px;
}
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > .menu-item > .item_link > i,
#mega_main_menu.' . $arg . ' li.tabs_dropdown > .mega_dropdown > .menu-item > .item_link > i,
#mega_main_menu.' . $arg . ' li.widgets_dropdown > .mega_dropdown > .menu-item > .item_link > i,
#mega_main_menu.' . $arg . ' li.multicolumn_dropdown > .mega_dropdown > .menu-item > .item_link > i
{
	width: ' . $unserialise['_menu_dropdown_icon_font'] . 'px;
	height: ' . $unserialise['_menu_dropdown_icon_font'] . 'px;
	line-height: ' . $unserialise['_menu_dropdown_icon_font'] . 'px;
	font-size: ' . $unserialise['_menu_dropdown_icon_font'] . 'px;
	margin-top: -' . ( $unserialise['_menu_dropdown_icon_font'] / 2 ) . 'px;
}
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > .menu-item > .item_link.with_icon > .link_content,
#mega_main_menu.' . $arg . ' li.tabs_dropdown > .mega_dropdown > .menu-item > .item_link.with_icon > .link_content,
#mega_main_menu.' . $arg . ' li.widgets_dropdown > .mega_dropdown > .menu-item > .item_link.with_icon > .link_content,
#mega_main_menu.' . $arg . ' li.multicolumn_dropdown > .mega_dropdown > .menu-item > .item_link.with_icon > .link_content
{
	margin-left: ' . ( $unserialise['_menu_dropdown_icon_font'] + 8 ) . 'px;
}
#mega_main_menu.' . $arg . '.language_direction-rtl li.default_dropdown > .mega_dropdown > .menu-item > .item_link.with_icon > .link_content,
#mega_main_menu.' . $arg . '.language_direction-rtl li.tabs_dropdown > .mega_dropdown > .menu-item > .item_link.with_icon > .link_content,
#mega_main_menu.' . $arg . '.language_direction-rtl li.widgets_dropdown > .mega_dropdown > .menu-item > .item_link.with_icon > .link_content,
#mega_main_menu.' . $arg . '.language_direction-rtl li.multicolumn_dropdown > .mega_dropdown > .menu-item > .item_link.with_icon > .link_content
{
	margin-right: ' . ( $unserialise['_menu_dropdown_icon_font'] + 8 ) . 'px;
}
#mega_main_menu.' . $arg . ' li.default_dropdown .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' li.widgets_dropdown .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' li.multicolumn_dropdown .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' li.grid_dropdown .mega_dropdown > li > .item_link
{
	/*" . mm_common::css_gradient( $unserialise["_menu_dropdown_link_bg"] ) . "*/
	/*background-color: ' . $unserialise['_menu_dropdown_link_bg'] . ';*/
	color: ' . $unserialise['_menu_dropdown_link_color'] . ';
}
#mega_main_menu.' . $arg . ' li .post_details > .post_icon > i,
#mega_main_menu.' . $arg . ' li .mega_dropdown .item_link *,
#mega_main_menu.' . $arg . ' li .mega_dropdown a,
#mega_main_menu.' . $arg . ' li .mega_dropdown a *,
/*
#mega_main_menu.' . $arg . ' li.default_dropdown .mega_dropdown > li > .item_link *,
#mega_main_menu.' . $arg . ' li.widgets_dropdown .mega_dropdown > li > .item_link *
#mega_main_menu.' . $arg . ' li.multicolumn_dropdown .mega_dropdown > li > .item_link *
#mega_main_menu.' . $arg . ' li.grid_dropdown .mega_dropdown > li > .item_link *,
*/
#mega_main_menu.' . $arg . ' li li .post_details a
{
	color: ' . $unserialise['_menu_dropdown_link_color'] . ';
}
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > .menu-item > .item_link:before
{
	border-color: ' . $unserialise['_menu_dropdown_link_color'] . ';
}
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > li > .item_link
{
	border-color: ' . $unserialise['_menu_dropdown_link_border_color'] . ';
}
#mega_main_menu.' . $arg . ' ul .mega_dropdown > li.current-menu-item > .item_link,
#mega_main_menu.' . $arg . ' ul .mega_dropdown > li > .item_link:focus,
#mega_main_menu.' . $arg . ' ul .mega_dropdown > li > .item_link:hover,
/*
#mega_main_menu.' . $arg . ' ul li.default_dropdown > .mega_dropdown > li > .item_link:hover,
#mega_main_menu.' . $arg . ' ul li.default_dropdown > .mega_dropdown > li.current-menu-item > .item_link,
#mega_main_menu.' . $arg . ' ul li.widgets_dropdown > .mega_dropdown > li > .item_link:hover,
#mega_main_menu.' . $arg . ' ul li.widgets_dropdown > .mega_dropdown > li.current-menu-item > .item_link,
#mega_main_menu.' . $arg . ' ul li.tabs_dropdown > .mega_dropdown > li > .item_link:hover,
#mega_main_menu.' . $arg . ' ul li.tabs_dropdown > .mega_dropdown > li.current-menu-item > .item_link,
#mega_main_menu.' . $arg . ' ul li.multicolumn_dropdown > .mega_dropdown > li > .item_link:hover,
#mega_main_menu.' . $arg . ' ul li.multicolumn_dropdown > .mega_dropdown > li.current-menu-item > .item_link,
#mega_main_menu.' . $arg . ' ul li.post_type_dropdown > .mega_dropdown > li:hover > .item_link,
#mega_main_menu.' . $arg . ' ul li.post_type_dropdown > .mega_dropdown > li > .item_link:hover,
#mega_main_menu.' . $arg . ' ul li.post_type_dropdown > .mega_dropdown > li.current-menu-item > .item_link,
#mega_main_menu.' . $arg . ' ul li.grid_dropdown > .mega_dropdown > li:hover > .processed_image,
#mega_main_menu.' . $arg . ' ul li.grid_dropdown > .mega_dropdown > li:hover > .item_link,
#mega_main_menu.' . $arg . ' ul li.grid_dropdown > .mega_dropdown > li > .item_link:hover,
#mega_main_menu.' . $arg . ' ul li.grid_dropdown > .mega_dropdown > li.current-menu-item > .item_link,
*/
#mega_main_menu.' . $arg . ' ul li.post_type_dropdown > .mega_dropdown > li > .processed_image:hover
{
	/*" . mm_common::css_gradient( $unserialise["_menu_dropdown_link_bg_hover"] ) . "*/
	background-color: ' . $unserialise['_menu_dropdown_link_bg_hover'] . ';
	color: ' . $unserialise['_menu_dropdown_link_color_hover'] . ';
}
#mega_main_menu.' . $arg . ' .mega_dropdown > li.current-menu-item > .item_link *,
#mega_main_menu.' . $arg . ' .mega_dropdown > li > .item_link:focus *,
#mega_main_menu.' . $arg . ' .mega_dropdown > li > .item_link:hover *,
/*
#mega_main_menu.' . $arg . ' li[class*="_dropdown"] > .mega_dropdown > li > .item_link:focus *,
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > li > .item_link:hover *,
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > li.current-menu-item > .item_link *,
#mega_main_menu.' . $arg . ' li.widgets_dropdown > .mega_dropdown > li > .item_link:hover *,
#mega_main_menu.' . $arg . ' li.widgets_dropdown > .mega_dropdown > li.current-menu-item > .item_link *,
#mega_main_menu.' . $arg . ' li.tabs_dropdown > .mega_dropdown > li > .item_link:hover *,
#mega_main_menu.' . $arg . ' li.tabs_dropdown > .mega_dropdown > li.current-menu-item > .item_link *,
#mega_main_menu.' . $arg . ' li.multicolumn_dropdown > .mega_dropdown > li > .item_link:hover *,
#mega_main_menu.' . $arg . ' li.multicolumn_dropdown > .mega_dropdown > li.current-menu-item > .item_link *,
#mega_main_menu.' . $arg . ' li.post_type_dropdown > .mega_dropdown > li:hover > .item_link *,
#mega_main_menu.' . $arg . ' li.post_type_dropdown > .mega_dropdown > li.current-menu-item > .item_link *,
#mega_main_menu.' . $arg . ' li.grid_dropdown > .mega_dropdown > li:hover > .item_link *,
#mega_main_menu.' . $arg . ' li.grid_dropdown > .mega_dropdown > li a:hover *,
#mega_main_menu.' . $arg . ' li.grid_dropdown > .mega_dropdown > li.current-menu-item > .item_link *,
*/
#mega_main_menu.' . $arg . ' li.post_type_dropdown > .mega_dropdown > li > .processed_image:hover > .cover > a > i
{
	color: ' . $unserialise['_menu_dropdown_link_color_hover'] . ';
}
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > .menu-item.current-menu-item > .item_link:before,
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > .menu-item > .item_link:focus:before,
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > .menu-item > .item_link:hover:before
{
	border-color: ' . $unserialise['_menu_dropdown_link_color_hover'] . ';
}
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link,
#mega_main_menu.' . $arg . '.primary_style-buttons > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle,
#mega_main_menu.' . $arg . '.primary_style-buttons.direction-vertical > .menu_holder > .menu_inner > ul > li:first-child > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .mmm_fullwidth_container,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li .post_details,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul .mega_dropdown
{
	border-radius: ' . $unserialise['_corners_rounding'] . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > span.nav_logo,
#mega_main_menu.' . $arg . '.primary_style-flat.direction-horizontal.first-lvl-align-left.no-logo > .menu_holder > .menu_inner > ul > li:first-child > .item_link,
#mega_main_menu.' . $arg . '.primary_style-flat.direction-horizontal.first-lvl-align-center.no-logo.no-search.no-woo_cart > .menu_holder > .menu_inner > ul > li:first-child > .item_link
{
	border-radius: ' . $unserialise['_corners_rounding'] . 'px 0px 0px ' . $unserialise['_corners_rounding'] . 'px;
}
#mega_main_menu.' . $arg . '.direction-horizontal.no-search > .menu_holder > .menu_inner > ul > li.nav_woo_cart > .item_link,
#mega_main_menu.' . $arg . '.direction-horizontal.no-search.no-woo_cart > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link,
#mega_main_menu.' . $arg . '.primary_style-flat.direction-horizontal.first-lvl-align-right.no-search.no-woo_cart > .menu_holder > .menu_inner > ul > li:last-child > .item_link,
#mega_main_menu.' . $arg . '.primary_style-flat.direction-horizontal.first-lvl-align-center.no-search.no-woo_cart > .menu_holder > .menu_inner > ul > li:last-child > .item_link
{
	border-radius: 0px ' . $unserialise['_corners_rounding'] . 'px ' . $unserialise['_corners_rounding'] . 'px 0px;
}
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > li:first-child > .item_link,
#mega_main_menu.' . $arg . '.direction-vertical > .menu_holder > .menu_inner > ul > li:first-child > .item_link
{
	border-radius: ' . $unserialise['_corners_rounding'] . 'px ' . $unserialise['_corners_rounding'] . 'px 0px 0px;
}
#mega_main_menu.' . $arg . ' li.default_dropdown > .mega_dropdown > li:last-child > .item_link
{
	border-radius: 0px 0px ' . $unserialise['_corners_rounding'] . 'px ' . $unserialise['_corners_rounding'] . 'px;
}
#mega_main_menu.' . $arg . ' .widgets_dropdown > .mega_dropdown > li.default_dropdown .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' .multicolumn_dropdown > .mega_dropdown > li.default_dropdown .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' ul .nav_search_box #mega_main_menu_searchform,
#mega_main_menu.' . $arg . ' .tabs_dropdown .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' .tabs_dropdown .mega_dropdown > li > .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' .widgets_dropdown > .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' .multicolumn_dropdown > .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' .grid_dropdown > .mega_dropdown > li > .item_link,
#mega_main_menu.' . $arg . ' .grid_dropdown > .mega_dropdown > li .processed_image,
#mega_main_menu.' . $arg . ' .post_type_dropdown > .mega_dropdown > li .item_link,
#mega_main_menu.' . $arg . ' .post_type_dropdown > .mega_dropdown > li .processed_image
{
	border-radius: ' . ( $unserialise['_corners_rounding'] / 2 ) . 'px;
}
';
			$additional_styles_presets = $unserialise['additional_styles_presets'];
			if ( isset( $additional_styles_presets ) && is_array( $additional_styles_presets ) && count( $additional_styles_presets ) > 0 ) {
				$out .= '/* additional_styles */ ';
				foreach ( $unserialise['additional_styles_presets'] as $key => $value ) {
					$out .= '
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ' > .item_link
{
	/*" . mm_common::css_gradient( $value["bg_gradient"] ) . "*/
	color: ' . $value['text_color'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ' > .item_link > i
{
	color: ' . $value['text_color'] . ';
	font-size: ' . $value[ 'icon' ]['font_size'] . 'px;
}
#mega_main_menu.' . $arg . ' ul li .mega_dropdown li.additional_style_' . $key . ' > .item_link > i
{
	width: ' . $value[ 'icon' ]['font_size'] . 'px;
	height: ' . $value[ 'icon' ]['font_size'] . 'px;
	line-height: ' . $value[ 'icon' ]['font_size'] . 'px;
	font-size: ' . $value[ 'icon' ]['font_size'] . 'px;
	margin-top: -' . ( $value[ 'icon' ]['font_size'] / 2 ) . 'px;
}
#mega_main_menu.' . $arg . ' ul li .mega_dropdown > li.additional_style_' . $key . ' > .item_link.with_icon > span
{
	margin-left: ' . ( $value[ 'icon' ]['font_size'] + 8 ) . 'px;
}
#mega_main_menu.' . $arg . '.language_direction-rtl ul li .mega_dropdown > li.additional_style_' . $key . ' > .item_link.with_icon > span
{
	margin-right: ' . ( $value[ 'icon' ]['font_size'] + 8 ) . 'px;
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ' > .item_link *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ' > .item_link .link_content
{
	color: ' . $value['text_color'] . ';
	' . mm_common::css_font( $value[ 'font' ] ) . '
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-menu-ancestor.additional_style_' . $key . ' > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-page-ancestor.additional_style_' . $key . ' > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul > li.current-post-ancestor.additional_style_' . $key . ' > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.current-menu-item.additional_style_' . $key . ' > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ':hover > .item_link,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ' > .item_link:hover,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ' > .item_link:focus
{
	/*" . mm_common::css_gradient( $value["bg_gradient_hover"] ) . "*/
	color: ' . $value['text_color_hover'] . ';
}
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.current-menu-ancestor.additional_style_' . $key . ' > .item_link > *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.current-page-ancestor.additional_style_' . $key . ' > .item_link > *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.current-post-ancestor.additional_style_' . $key . ' > .item_link > *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ' > .item_link:focus > *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ':hover > .item_link > i,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ':hover > .item_link *,
#mega_main_menu.' . $arg . ' > .menu_holder > .menu_inner > ul li.additional_style_' . $key . ':hover > .item_link .link_content
{
	color: ' . $value['text_color_hover'] . ';
}
';
				}
			}
/* set_of_custom_icons */
$set_of_custom_icons = $unserialise['set_of_custom_icons'];
if ( is_array( $set_of_custom_icons ) && count( $set_of_custom_icons ) > 0 ) {
	$out .= '/* set_of_custom_icons */ ';
	foreach ( $set_of_custom_icons as $value ) {
		$icon_name = str_replace( array( '/', strrchr( $value[ 'custom_icon' ], '.' ) ), '', strrchr( $value[ 'custom_icon' ], '/' ) );
		$out .= '
i.ci-icon-' . $icon_name . ':before
{
	background-image: url(' . $value[ 'custom_icon' ] . ');
}
';
		if ( isset( $value[ 'custom_icon_hover' ] ) && $value[ 'custom_icon_hover' ] != '' ) {
		$out .= '
#mega_main_menu li:hover > .item_link > i.ci-icon-' . $icon_name . ':before,
i.ci-icon-' . $icon_name . ':hover:before
{
	background-image: url(' . $value[ 'custom_icon_hover' ] . ');
}
';
		}
	}
}

//////fonction extension to be added
			if( ! function_exists( 'mmm_nav_search' ) ){
				function mmm_nav_search( $items) {
					$searchform = '';
					$searchform .= '<li class="nav_search_box">';
						$searchform .= '<form method="get" id="mega_main_menu_searchform" action="http://localhost/xoops25777/search.php">
							<i class="im-icon-search-3 icosearch"></i>
							<input type="submit" class="submit" name="submit" id="searchsubmit" value="Search" />
							<input type="text" class="field" name="s" id="s" />
						</form>';
					$searchform .= '</li><!-- class="nav_search_box" -->';
					$items = $items . $searchform;
				
			
				return $items;
				}
			}
			
			if( ! function_exists( 'mmm_nav_login' ) ){
				function mmm_nav_login( $items ) {
					$searchform = '';
					$searchform .= '<li class="nav_search_box">';
						$searchform .= '<form method="get" id="mega_main_menu_searchform" action="">
							<i class="im-icon-search-3 icosearch"></i>
							<input type="submit" class="submit" name="submit" id="searchsubmit" value="Search" />
							<input type="text" class="field" name="s" id="s" />
						</form>';
					$searchform .= '</li><!-- class="nav_search_box" -->';
					$items = $items . $searchform;
					//$items = '<li class="nav_search_box"><h3>login</h3></li>';
				
			
				return $items;
				}
			}
			
			if( ! function_exists( 'mmm_nav_register' ) ){
				function mmm_nav_register( $items ) {
					$searchform = '';
					$searchform .= '<li class="nav_search_box">';
						$searchform .= '<form method="get" id="mega_main_menu_searchform" action="">
							<i class="im-icon-search-3 icosearch"></i>
							<input type="submit" class="submit" name="submit" id="searchsubmit" value="Search" />
							<input type="text" class="field" name="s" id="s" />
						</form>';
					$searchform .= '</li><!-- class="nav_search_box" -->';
					$items = $items . $searchform;
					//$items = '<li class="nav_search_box"><h3>register</h3></li>';
				
			
				return $items;
				}
			}



/////

//var_dump($unserialise);
			// check container_class variables
			$container_class = array();
			$theme_location_safe_name = $arg;
			$container_class[] = $theme_location_safe_name;
			$container_class[] = 'primary_style-' . $unserialise['_primary_style'];
			$container_class[] = 'icons-' . $unserialise['_first_level_icons_position'];
			$container_class[] = 'first-lvl-align-' . $unserialise['_first_level_item_align'];
			$container_class[] = 'first-lvl-separator-' . $unserialise['_first_level_separator'];
			$container_class[] = 'direction-' . $unserialise['_direction'];
			$container_class[] = 'fullwidth-' . ( ( is_array( $unserialise['_fullwidth_container'] ) && in_array( 'true', $unserialise['_fullwidth_container'] ) ) ? 'enable' : 'disable' );
			$container_class[] = 'pushing_content-' . ( ( is_array( $unserialise['_pushing_content'] ) && in_array( 'true', $unserialise['_pushing_content'] ) ) ? 'enable' : 'disable' );
			$container_class[] = 'mobile_minimized-' . ( ( ( is_array( $unserialise['_mobile_minimized'] ) && in_array( 'true', $unserialise['_mobile_minimized'] ) ) || ( $indefinite_location_mode === true ) ) ? 'enable' : 'disable' );
			$container_class[] = 'dropdowns_trigger-' . $unserialise['_dropdowns_trigger'] ;
			$container_class[] = 'dropdowns_animation-' . $unserialise['_dropdowns_animation'] ;
			$container_class[] = ( ( is_array( $unserialise['_included_components'] ) && in_array( 'company_logo', $unserialise['_included_components'] ) ) && $unserialise['logo_src'] ) ? 'include-logo' : 'no-logo';
			//$container_class[] = 'include-logo';
			//var_dump($unserialise['_included_components']);
			$container_class[] = ( is_array( $unserialise['_included_components'] ) && in_array( 'search_box', $unserialise['_included_components'] ) ) ? 'include-search' : 'no-search';
			$container_class[] = ( is_array( $unserialise['_included_components'] ) && in_array( 'login', $unserialise['_included_components'] ) ) ? 'include-login' : 'no-login';
			$container_class[] = ( is_array( $unserialise['_included_components'] ) && in_array( 'buddypress', $unserialise['_included_components'] ) ) ? 'include-buddypress' : 'no-buddypress';
			$container_class[] = 'responsive-' . ( ( is_array( $unserialise['responsive_styles'] ) && in_array( 'true', $unserialise['responsive_styles'] ) ) ? 'enable' : 'disable' );
			$container_class[] = 'coercive_styles-' . ( ( is_array( $unserialise['coercive_styles'] ) && in_array( 'true', $unserialise['coercive_styles'] ) ) ? 'enable' : 'disable' );
			$container_class[] = 'indefinite_location_mode-' . ( ( $indefinite_location_mode === true ) ? 'enable' : 'disable' );
			$container_class[] = 'language_direction-' . $unserialise['language_direction'];
			$container_class[] = 'version-1.0.9';

			/*if ( in_array( 'disable', $unserialise['item_icon'], array() ) ) {
				$container_class[] = 'structure_settings-no_icons icons-disable_globally';
				
			}*/

			// implode container_class variables
			$container_class_imploded = implode( ' ', $container_class );

			// apply_filters container_class
			/*if ( has_filter( 'mmm_container_class' ) ) {
				$container_class_imploded .= ' ' . esc_attr( apply_filters( 'mmm_container_class', '', $container_class ) );
			}*/

			// check sticky variables
			$data_sticky = ( (is_array( $unserialise['_sticky_status'] ) && in_array( 'true', $unserialise['_sticky_status']) ) /*|| ( $indefinite_location_mode === true )*/ ) 
				? ' data-sticky="1"' 
				: '';
			$data_sticky .= ( ( $unserialise['_sticky_offset'] !== false && is_array( $unserialise['_sticky_status'] ) && in_array( 'true', $unserialise['_sticky_status']) ) /*|| ( $indefinite_location_mode === true ) */) 
				? ' data-stickyoffset="' . $unserialise['_sticky_offset'] . '"' 
				: '';
//var_dump($unserialise['_sticky_status']);
//var_dump($unserialise['_sticky_offset']);
//var_dump($data_sticky);
			// items_wrap (container) markup
			//var_dump($xoTheme);
			$items_wrap = '';
			$items_wrap .= $outscript;
			$items_wrap .= '<style> ' . $out . ' </style>';
			$items_wrap .= '<div id="mega_main_menu" class="' . $container_class_imploded . ' mega_main mega_main_menu">';
			$items_wrap .= '<div class="menu_holder"' . $data_sticky . '>';
			$items_wrap .= '<div class="mmm_fullwidth_container"></div><!-- class="fullwidth_container" -->';
			$items_wrap .= '<div class="menu_inner">';
			$items_wrap .= '<span class="nav_logo">';
			if( ( is_array( $unserialise['_included_components'] ) && in_array( 'company_logo', $unserialise['_included_components'] ) ) && $unserialise['logo_src'] ) {
					$items_wrap .= '<a class="logo_link" href="'.$xoTheme->template->_tpl_vars["xoops_url"].'" title="'.$xoTheme->template->_tpl_vars["xoops_slogan"].'">';
					$items_wrap .= '<img src="' . XOOPS_URL . '' .$unserialise['logo_src'] . '" alt="'.$xoTheme->template->_tpl_vars["xoops_slogan"].'" />'; //' . $unserialise['logo_src'] . '
					//$items_wrap .= '<img src=' . XOOPS_URL . ' ' .$unserialise['logo_src'] . ' alt="" />'; //' . $unserialise['logo_src'] . '

					$items_wrap .= '</a>';
			}
			$items_wrap .= '<a class="mobile_toggle">';
			$items_wrap .= '<span class="mobile_button">';
			$items_wrap .= $unserialise['_mobile_label'] . ' &nbsp;';
			$items_wrap .= '<span class="symbol_menu">&equiv;</span>'; // "Open menu" symbol
			$items_wrap .= '<span class="symbol_cross">&#x2573;</span>'; // "Close menu" symbol
			$items_wrap .= '</span><!-- class="mobile_button" -->';
			$items_wrap .= '</a>';
			$items_wrap .= '</span><!-- /class="nav_logo" -->';
			//$items_wrap .= $args['items_wrap'];
			
$items_wrap .= '<ul id="mega_main_menu_ul" class="mega_main_menu_ul">';
			foreach($menuhorizontal as $k => $item1){
			//var_dump($k);
			//var_dump($item1['class']);
			
			
					if ($item1['class'] == 'default_dropdown'){
					//var_dump($item1['label']);
						//default_dropdown
							if ( !empty( $item1['submenu'] ) ) {
								$haschildren = 'menu-item-has-children';
							}else{ $haschildren = false; }
						//var_dump($haschildren);<li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-11 default_dropdown additional_style_1 drop_to_right submenu_default_width columns2">

						$outlevel = '<li id="menu-item-'.$item1['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom '.$haschildren.' menu-item-'.$item1['id'].' default_dropdown additional_style_1 drop_to_right  submenu_default_width columns2">
	
								<a title="'.$item1['label'].'" href="'.$item1['link'].'" class="item_link  with_icon"><i class="'.$item1['icons'].'"></i> <span class="link_content"><span class="link_text">'.$item1['label'].'</span></span></a>';
					
																if(!empty($item1['submenu'])) {
																if ( !empty( $item2['submenu'] ) ) {
																	$haschildren = 'menu-item-has-children';
																}else{ $haschildren = false; }
																$outlevel .= '<ul class="mega_dropdown">';
																	foreach($item1['submenu'] as $k1 => $item2){
																
																						//<li id="menu-item-12" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-12 default_dropdown default_style drop_to_right submenu_default_width columns1">

																					$outlevel .= '<li id="menu-item-'.$item2['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom  '.$haschildren.' menu-item-'.$item2['id'].' default_dropdown default_style drop_to_right submenu_default_width columns1">
																						<a href="'.$item2['link'].'" class="item_link  with_icon"><i class="'.$item2['icons'].'"></i> <span class="link_content"><span class="link_text">'.$item2['label'].'</span></span></a>';
																						
																									if(!empty($item2['submenu'])) {
																										if(!empty($item2['submenu'])) {
																										$haschildren = 'menu-item-has-children';
																										}else{ $haschildren = false; }
																												$outlevel .= '<ul class="mega_dropdown">';
																													foreach($item2['submenu'] as $k2 => $item3){
																															$outlevel .= '<li id="menu-item-'.$item3['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom  '.$haschildren.' menu-item-'.$item3['id'].' default_dropdown default_style drop_to_right submenu_default_width columns1">
																															<a href="'.$item3['link'].'" class="item_link  with_icon"><i class="'.$item3['icons'].'"></i> <span class="link_content"><span class="link_text">'.$item3['label'].'</span></span></a>
																															';
																													
																													
																													
																															if(!empty($item3['submenu'])) {
																															if ( !empty( $item3['submenu'] ) ) {
																																$haschildren = 'menu-item-has-children';
																															}else{ $haschildren = false; }
																															$outlevel .= '<ul class="mega_dropdown">';
																															
																															foreach($item3['submenu'] as $k3 => $item4){
																															$outlevel .= '<li id="menu-item-'.$item4['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom  '.$haschildren.' menu-item-'.$item4['id'].' default_dropdown default_style drop_to_right submenu_default_width columns1">
																															<a href="'.$item4['link'].'" class="item_link  with_icon"><i class="'.$item4['icons'].'"></i> <span class="link_content"><span class="link_text">'.$item4['label'].'</span></span></a>
																															';
																													
																																			if(!empty($item4['submenu'])) {
																																				if ( !empty( $item4['submenu'] ) ) {
																																					$haschildren = 'menu-item-has-children';
																																				}else{ $haschildren = false; }
																																				$outlevel .= '<ul class="mega_dropdown">';
																																				
																																									foreach($item4['submenu'] as $k4 => $item5){
																																									$outlevel .= '<li id="menu-item-'.$item5['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom  '.$haschildren.' menu-item-'.$item5['id'].' default_dropdown default_style drop_to_right submenu_default_width columns1">
																																									<a href="'.$item5['link'].'" class="item_link  with_icon"><i class="'.$item5['icons'].'"></i> <span class="link_content"><span class="link_text">'.$item5['label'].'</span></span></a>
																																									';
																																							
																																							
																																										$outlevel .= '</li>	';
																																									}
																														
																																				$outlevel .= '</ul>	';	
																																	
																																			}
																													
																													
																															$outlevel .= '</li>	';
																															}
																									
																												$outlevel .= '</ul>	';	
																													
																													}
																													
																													
																													
																													
																													
																													
																													
																													$outlevel .= '</li>	';
																													}
																									
																												$outlevel .= '</ul>	';							
																									}
																					$outlevel .= '</li>	';
																	}			
																	$outlevel .= '</ul>	';			
																	
																}
						$outlevel .= '</li>	';
					$items_wrap .= $outlevel;						
					 
					}



					if ($item1['class'] == 'multicolumn_dropdown_bg'){
						//multicolumn_dropdown with background	
						
						$outlevel = '<li id="menu-item-'.$item1['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-'.$item1['id'].' multicolumn_dropdown additional_style_2 drop_to_right  submenu_default_width columns2">
								<a title="'.$item1['label'].'" href="'.$item1['link'].'" class="item_link  with_icon"><i class="'.$item1['icons'].'"></i> <span class="link_content"><span class="link_text">'.$item1['label'].'</span></span></a>';
					
																if(!empty($item1['submenu'])) {
																$outlevel .= '<ul class="mega_dropdown" style="background-image:url(http://newsmartwave.net/wordpress/venedor/red/wp-content/uploads/2014/05/menu_bg_01.png);background-repeat:no-repeat;background-attachment:scroll;background-position:center right;background-size:auto 100%;">';
																	$i = 0;
																	$len = count($item1['submenu']);
																	foreach($item1['submenu'] as $k1 => $item2){
		
																	 if ($i == 0) {
																			// first
																				$outlevel .= '<li id="menu-item-'.$item2['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-'.$item2['id'].' default_dropdown default_style drop_to_right submenu_default_width columns1" style="width:50%;">
																						<a href="'.$item2['link'].'" class="item_link  with_icon"><i class="'.$item2['icons'].'"></i> <span class="link_content"><span class="link_text">'.$item2['label'].'</span></span></a>';
																						
																						//if(!empty($item2['submenu'])) {
																						$outlevel .= '<ul class="mega_dropdown">';
																	}else if ($i > 0 && $i < $len - 1){
																				$outlevel .= '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-'.$item2['id'].' submenu_default_width columns">
																								<a href="'.$item2['link'].'" class="item_link  with_icon"><i class="'.$item2['icons'].'"></i> <span class="link_content"><span class="link_text">'.$item2['label'].'</span></span></a>';
																								$outlevel .= '</li>	';
																												foreach($item2['submenu'] as $k2 => $item3){
																												//var_dump($item3['id']);
																												$outlevel .= '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-'.$item3['id'].' submenu_default_width columns">
																												<a href="'.$item3['link'].'" class="item_link  with_icon"><i class="'.$item3['icons'].'"></i> <span class="link_content"><span class="link_text">'.$item3['label'].'</span></span></a>';
																												$outlevel .= '</li>	';
																												}
																						
																	}else if ($i == $len - 1) {
																			// last
																			$outlevel .= '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-'.$item2['id'].' submenu_default_width columns">
																								<a href="'.$item2['link'].'" class="item_link  with_icon"><i class="'.$item2['icons'].'"></i> <span class="link_content"><span class="link_text">'.$item2['label'].'</span></span></a>';
																								$outlevel .= '</li>	';
																			$outlevel .= '</ul>	';							
																					//	}
																					
																					$outlevel .= '</li>	';
																		}
																		// …
																		$i++;	
																					
																					
																	}			
																	$outlevel .= '</ul>	';			
																	
																}
						$outlevel .= '</li>	';	
					$items_wrap .= $outlevel;						
					 
					}


					if ($item1['class'] == 'multicolumn_dropdown'){

						//default_dropdown
								$outlevel = '<li id="menu-item-'.$item1['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-'.$item1['id'].' multicolumn_dropdown additional_style_3 drop_to_right submenu_full_width columns4">
												<a href="'.$item1['link'].'" class="item_link  with_icon"><i class="'.$item1['icons'].'"></i> <span class="link_content"><span class="link_text">'.$item1['label'].'</span></span></a>
								
								';
							
																		if(!empty($item1['submenu'])) {
																		$outlevel .= '<ul class="mega_dropdown">';
																			foreach($item1['submenu'] as $k1 => $item2){
																			
																							$outlevel .= '
																								<li id="menu-item-'.$item2['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-'.$item2['id'].' default_dropdown additional_style_9 drop_to_right submenu_default_width columns1" style="width:25%;">
																									<a href="'.$item2['link'].'" class="item_link  disable_icon">
																										<i class="'.$item2['icons'].'"></i> 
																										<span class="link_content">
																											<span class="link_text">
																												'.$item2['label'].'
																											</span>
																										</span>
																									</a>';
																							
																							
																							
																											if(!empty($item2['submenu'])) {
																														$outlevel .= '<ul class="mega_dropdown">';
																															foreach($item2['submenu'] as $k2 => $item3){
																																	$outlevel .= '
																																	<li id="menu-item-'.$item3['link'].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-'.$item3['link'].' default_dropdown default_style drop_to_right submenu_default_width columns1">
																																						<a href="'.$item3['link'].'" class="item_link  with_icon">
																																							<i class="'.$item3['icons'].'"></i> 
																																							<span class="link_content">
																																								<span class="link_text">
																																									'.$item3['label'].'
																																								</span>
																																							</span>
																																						</a>
																																					</li>
																																	
																																	';
																															$outlevel .= '</li>	';
																															}
																											
																														$outlevel .= '</ul>	';							
																											}
																							$outlevel .= '</li>	';
																			}			
																			$outlevel .= '</ul>	';			
																			
																		}
								$outlevel .= '</li>	';								
							 
						$items_wrap .= $outlevel;
	
}					
			

			
					if ($item1['class'] == 'tabs_dropdown'){
					//var_dump($item1['label']);
						//default_dropdown
							if ( !empty( $item1['submenu'] ) ) {
								$haschildren = 'menu-item-has-children';
							}else{ $haschildren = false; }

						$outlevel = '<li id="menu-item-'.$item1['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom '.$haschildren.' menu-item-'.$item1['id'].' tabs_dropdown additional_style_5 drop_to_left submenu_full_width columns4">
										<a href="'.$item1['link'].'" class="item_link  with_icon">
											<i class="'.$item1['icons'].'"></i> 
											<span class="link_content">
												<span class="link_text">
													'.$item1['label'].'
												</span>
											</span>
										</a>';
					
																if(!empty($item1['submenu'])) {
																if ( !empty( $item2['submenu'] ) ) {
																	$haschildren = 'menu-item-has-children';
																}else{ $haschildren = false; }
																$outlevel .= '<ul class="mega_dropdown" style="min-height: 0px;">';
																	foreach($item1['submenu'] as $k1 => $item2){
																

																					$outlevel .= '
																					<li id="menu-item-'.$item2['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom '.$haschildren.' menu-item-'.$item2['id'].' multicolumn_dropdown default_style drop_to_right submenu_default_width columns3">
																						<a href="'.$item2['link'].'" class="item_link  with_icon">
																							<i class="'.$item2['icons'].'"></i> 
																							<span class="link_content">
																								<span class="link_text">
																									'.$item2['label'].'
																								</span>
																							</span>
																						</a>';
																									if(!empty($item2['submenu'])) {
																									
																												$outlevel .= '<ul class="mega_dropdown">';
																													foreach($item2['submenu'] as $k2 => $item3){
																															$outlevel .= '
																															
																																<li id="menu-item-'.$item3['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-'.$item3['id'].' default_dropdown default_style drop_to_right submenu_default_width columns1" style="width:33.333333333333%;">
																																	<a href="'.$item3['link'].'" class="item_link  with_icon">
																																		<i class="'.$item3['icons'].'"></i> 
																																		<span class="link_content">
																																			<span class="link_text">
																																				'.$item3['label'].'
																																			</span>
																																		</span>
																																	</a>';								
																													
																													
											
																													$outlevel .= '</li>	';
																													}
																									
																												$outlevel .= '</ul>	';							
																									}
																					$outlevel .= '</li>	';
																	}			
																	$outlevel .= '</ul>	';			
																	
																}
						$outlevel .= '</li>	';
					$items_wrap .= $outlevel;						
					 
					}			
			
			}
			
	/*		
			$items_wrap .= '
<li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-11 default_dropdown additional_style_1 drop_to_right submenu_default_width columns2">
	<a title="Standard" href="/1" class="item_link  with_icon" tabindex="1">
		<i class="im-icon-checkmark-3"></i> 
		<span class="link_content">
			<span class="link_text">
				Standard
			</span>
		</span>
	</a>
	<ul class="mega_dropdown">
	<li id="menu-item-12" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-12 default_dropdown default_style drop_to_right submenu_default_width columns1">
		<a href="/11" class="item_link  with_icon" tabindex="2">
			<i class="fa-icon-fighter-jet"></i> 
			<span class="link_content">
				<span class="link_text">
					Lorem ipsum
				</span>
			</span>
		</a>
	</li>
	<li id="menu-item-13" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-13 default_dropdown default_style drop_to_right submenu_default_width columns1">
		<a href="/12" class="item_link  with_icon" tabindex="3">
			<i class="im-icon-clipboard-4"></i> 
			<span class="link_content">
				<span class="link_text">
					Dolor sit amet
				</span>
			</span>
		</a>
		<ul class="mega_dropdown">
		<li id="menu-item-20" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-20 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/121" class="item_link  with_icon" tabindex="4">
				<i class="im-icon-history-2"></i> 
				<span class="link_content">
					<span class="link_text">
						Ut enim ad minim
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-21" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-21 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/122" class="item_link  with_icon" tabindex="5">
				<i class="im-icon-google-plus-4"></i> 
				<span class="link_content">
					<span class="link_text">
						Veniam
					</span>
				</span>
			</a>
			<ul class="mega_dropdown">
			<li id="menu-item-27" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27 default_dropdown default_style drop_to_right submenu_default_width columns1">
				<a href="/1221" class="item_link  with_icon" tabindex="6">
					<i class="im-icon-rulers"></i> 
					<span class="link_content">
						<span class="link_text">
							Duis aute irure
						</span>
					</span>
				</a>
			</li>
			<li id="menu-item-28" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-28 default_dropdown default_style drop_to_right submenu_default_width columns1">
				<a href="/1222" class="item_link  with_icon" tabindex="7">
					<i class="im-icon-temperature-2"></i> 
					<span class="link_content">
						<span class="link_text">
							Dolor in reprehenderit
						</span>
					</span>
				</a>
			</li>
			<li id="menu-item-29" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-29 default_dropdown default_style drop_to_right submenu_default_width columns1">
				<a href="/1223" class="item_link  with_icon" tabindex="8">
					<i class="im-icon-movie"></i> 
					<span class="link_content">
						<span class="link_text">
							In voluptate velit
						</span>
					</span>
				</a>
			</li>
			</ul><!-- /.mega_dropdown -->
		</li>
		<li id="menu-item-22" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-22 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/123" class="item_link  with_icon" tabindex="9">
				<i class="im-icon-file-4"></i> 
				<span class="link_content">
					<span class="link_text">
						Quis nostrud
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-23" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-23 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/124" class="item_link  with_icon" tabindex="10">
				<i class="im-icon-magnet-3"></i> 
				<span class="link_content">
					<span class="link_text">
						Exercitation ullamco
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-24" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/125" class="item_link  with_icon" tabindex="11">
				<i class="im-icon-seven-segment-1"></i> 
				<span class="link_content">
					<span class="link_text">
						Laboris nisi ut
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-25" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-25 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/126" class="item_link  with_icon" tabindex="12">
				<i class="fa-icon-file-alt"></i> 
				<span class="link_content">
					<span class="link_text">
						Aliquip ex ea
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-26" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/127" class="item_link  with_icon" tabindex="13">
				<i class="fa-icon-code-fork"></i> 
				<span class="link_content">
					<span class="link_text">
						Commodo consequat
					</span>
				</span>
			</a>
		</li>
		</ul><!-- /.mega_dropdown -->
	</li>
	<li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14 default_dropdown default_style drop_to_right submenu_default_width columns1">
		<a href="/13" class="item_link  with_icon" tabindex="14">
			<i class="im-icon-nbsp"></i> 
			<span class="link_content">
				<span class="link_text">
					Consectetur
				</span>
			</span>
		</a>
	</li>
	<li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15 default_dropdown default_style drop_to_right submenu_default_width columns1">
		<a href="/14" class="item_link  with_icon" tabindex="15">
			<i class="im-icon-file-3"></i> 
			<span class="link_content">
				<span class="link_text">
					Adipisicing elit
				</span>
			</span>
		</a>
	</li>
	<li id="menu-item-16" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-16 default_dropdown default_style drop_to_right submenu_default_width columns1">
		<a href="/15" class="item_link  with_icon" tabindex="16">
			<i class="im-icon-zoom-in"></i> 
			<span class="link_content">
				<span class="link_text">
					Sed do eiusmod
				</span>
			</span>
		</a>
	</li>
	<li id="menu-item-17" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-17 default_dropdown default_style drop_to_right submenu_default_width columns1">
		<a href="/16" class="item_link  with_icon" tabindex="17">
			<i class="im-icon-folder-plus"></i> 
			<span class="link_content">
				<span class="link_text">
					Tempor incididunt
				</span>
			</span>
		</a>
	</li>
	<li id="menu-item-18" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-18 default_dropdown default_style drop_to_right submenu_default_width columns1">
		<a href="/17" class="item_link  with_icon" tabindex="18">
			<i class="im-icon-spinner-10"></i> 
			<span class="link_content">
				<span class="link_text">
					Ut labore et
				</span>
			</span>
		</a>
	</li>
	<li id="menu-item-19" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-19 default_dropdown default_style drop_to_right submenu_default_width columns1">
		<a href="/18" class="item_link  with_icon" tabindex="19">
			<i class="im-icon-arrow-4"></i> 
			<span class="link_content">
				<span class="link_text">
					Dolore magna aliqua
				</span>
			</span>
		</a>
	</li>
	</ul><!-- /.mega_dropdown -->
</li>
<li id="menu-item-121" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-121 multicolumn_dropdown additional_style_2 drop_to_right submenu_default_width columns2">
	<a href="/5" class="item_link  with_icon" tabindex="20">
		<i class="im-icon-stats-up"></i> 
		<span class="link_content">
			<span class="link_text">
				Promo
			</span>
		</span>
	</a>
	<ul class="mega_dropdown" style="background-image:url(http://menu.megamain.com/wp-content/uploads/2013/10/iphone.png);background-repeat:no-repeat;background-attachment:scroll;background-position:center right;background-size:auto 100%;">
	<li id="menu-item-122" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-122 default_dropdown default_style drop_to_right submenu_default_width columns1" style="width:50%;">
		<a href="/51" class="item_link  with_icon" tabindex="21">
			<i class="fa-icon-edit-sign"></i> 
			<span class="link_content">
				<span class="link_text">
					Minima veniam
				</span>
			</span>
		</a>
		<ul class="mega_dropdown">
		<li id="menu-item-123" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-123 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/52" class="item_link  with_icon" tabindex="22">
				<i class="fa-icon-resize-vertical"></i> 
				<span class="link_content">
					<span class="link_text">
						Quis nostrum
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-124" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-124 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/53" class="item_link  with_icon" tabindex="23">
				<i class="fa-icon-bell"></i> 
				<span class="link_content">
					<span class="link_text">
						Exercitationem
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-126" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-126 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/54" class="item_link  with_icon" tabindex="24">
				<i class="fa-icon-filter"></i> 
				<span class="link_content">
					<span class="link_text">
						Ullam corporis
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-127" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-127 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/55" class="item_link  with_icon" tabindex="25">
				<i class="im-icon-bubble"></i> 
				<span class="link_content">
					<span class="link_text">
						Suscipit laboriosam
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-128" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-128 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/56" class="item_link  with_icon" tabindex="26">
				<i class="im-icon-magnet"></i> 
				<span class="link_content">
					<span class="link_text">
						Nisi ut aliquid ex
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-129" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-129 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/57" class="item_link  with_icon" tabindex="27">
				<i class="fa-icon-beer"></i> 
				<span class="link_content">
					<span class="link_text">
						Nulla pariatur
					</span>
				</span>
			</a>
		</li>
		</ul><!-- /.mega_dropdown -->
	</li>
	</ul><!-- /.mega_dropdown -->
</li>
<li id="menu-item-55" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-55 tabs_dropdown additional_style_5 drop_to_left submenu_full_width columns4">
	<a href="/3" class="item_link  with_icon" tabindex="28">
		<i class="im-icon-list-4"></i> 
		<span class="link_content">
			<span class="link_text">
				Tabs
			</span>
		</span>
	</a>
	<ul class="mega_dropdown">
	<li id="menu-item-56" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-56 post_type_dropdown default_style drop_to_right submenu_default_width columns6">
		<a href="/31" class="item_link  with_icon" tabindex="29">
			<i class="im-icon-clipboard-4"></i> 
			<span class="link_content">
				<span class="link_text">
					Quis autem vel
				</span>
			</span>
		</a>
		<ul class="mega_dropdown">
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_22-190x190-croped.jpg" alt="Et harum quidem rerum facilis" title="Et harum quidem rerum facilis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/118/" class="icon"><i class="im-icon-cup-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_22-1140x380-croped.jpg" alt="Et harum quidem rerum facilis" title="Et harum quidem rerum facilis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/118/" class="icon"><i class="im-icon-cup-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-cup-2"></i>
				</div>
				<div class="post_title">
					Et harum quidem rerum facilis
				</div>
				<div class="post_description">
					Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis...
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_21-190x190-croped.jpg" alt="At vero eos et accusamus" title="At vero eos et accusamus">
		<div class="cover icon">
			<a href="http://menu.megamain.com/115/" class="icon"><i class="im-icon-cog"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_21-1140x380-croped.jpg" alt="At vero eos et accusamus" title="At vero eos et accusamus">
		<div class="cover icon">
			<a href="http://menu.megamain.com/115/" class="icon"><i class="im-icon-cog"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-cog"></i>
				</div>
				<div class="post_title">
					At vero eos et accusamus
				</div>
				<div class="post_description">
					At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non...
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_19-190x190-croped.jpg" alt="Duis aute irure dolor in" title="Duis aute irure dolor in">
		<div class="cover icon">
			<a href="http://menu.megamain.com/112/" class="icon"><i class="im-icon-brightness-medium"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_19-1140x380-croped.jpg" alt="Duis aute irure dolor in" title="Duis aute irure dolor in">
		<div class="cover icon">
			<a href="http://menu.megamain.com/112/" class="icon"><i class="im-icon-brightness-medium"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-brightness-medium"></i>
				</div>
				<div class="post_title">
					Duis aute irure dolor in
				</div>
				<div class="post_description">
					Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim...
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_18-190x190-croped.jpg" alt="Lorem ipsum dolor sit amet" title="Lorem ipsum dolor sit amet">
		<div class="cover icon">
			<a href="http://menu.megamain.com/109/" class="icon"><i class="im-icon-fire-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_18-1140x380-croped.jpg" alt="Lorem ipsum dolor sit amet" title="Lorem ipsum dolor sit amet">
		<div class="cover icon">
			<a href="http://menu.megamain.com/109/" class="icon"><i class="im-icon-fire-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-fire-2"></i>
				</div>
				<div class="post_title">
					Lorem ipsum dolor sit amet
				</div>
				<div class="post_description">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut...
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_17-190x190-croped.jpg" alt="Sed ut perspiciatis" title="Sed ut perspiciatis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/106/" class="icon"><i class="im-icon-trophy-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_17-1140x380-croped.jpg" alt="Sed ut perspiciatis" title="Sed ut perspiciatis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/106/" class="icon"><i class="im-icon-trophy-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-trophy-2"></i>
				</div>
				<div class="post_title">
					Sed ut perspiciatis
				</div>
				<div class="post_description">
					Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae...
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_14-190x190-croped.jpg" alt="Lorem ipsum dolor sit amet" title="Lorem ipsum dolor sit amet">
		<div class="cover icon">
			<a href="http://menu.megamain.com/100/" class="icon"><i class="im-icon-leaf"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_14-1140x380-croped.jpg" alt="Lorem ipsum dolor sit amet" title="Lorem ipsum dolor sit amet">
		<div class="cover icon">
			<a href="http://menu.megamain.com/100/" class="icon"><i class="im-icon-leaf"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-leaf"></i>
				</div>
				<div class="post_title">
					Lorem ipsum dolor sit amet
				</div>
				<div class="post_description">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut...
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_12-190x190-croped.jpg" alt="Temporibus autem quibusdam" title="Temporibus autem quibusdam">
		<div class="cover icon">
			<a href="http://menu.megamain.com/97/" class="icon"><i class="im-icon-star-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_12-1140x380-croped.jpg" alt="Temporibus autem quibusdam" title="Temporibus autem quibusdam">
		<div class="cover icon">
			<a href="http://menu.megamain.com/97/" class="icon"><i class="im-icon-star-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-star-2"></i>
				</div>
				<div class="post_title">
					Temporibus autem quibusdam
				</div>
				<div class="post_description">
					Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et voluptates repudiandae sint et molestiae non recusandae.
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_10-190x190-croped.jpg" alt="Et harum quidem rerum facilis" title="Et harum quidem rerum facilis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/94/" class="icon"><i class="im-icon-pencil-3"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_10-1140x380-croped.jpg" alt="Et harum quidem rerum facilis" title="Et harum quidem rerum facilis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/94/" class="icon"><i class="im-icon-pencil-3"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-pencil-3"></i>
				</div>
				<div class="post_title">
					Et harum quidem rerum facilis
				</div>
				<div class="post_description">
					Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis...
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_09-190x190-croped.jpg" alt="At vero eos et accusamus" title="At vero eos et accusamus">
		<div class="cover icon">
			<a href="http://menu.megamain.com/91/" class="icon"><i class="im-icon-twitter"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_09-1140x380-croped.jpg" alt="At vero eos et accusamus" title="At vero eos et accusamus">
		<div class="cover icon">
			<a href="http://menu.megamain.com/91/" class="icon"><i class="im-icon-twitter"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-twitter"></i>
				</div>
				<div class="post_title">
					At vero eos et accusamus
				</div>
				<div class="post_description">
					At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_06-190x190-croped.jpg" alt="Quis autem vel eum iure reprehenderit" title="Quis autem vel eum iure reprehenderit">
		<div class="cover icon">
			<a href="http://menu.megamain.com/88/" class="icon"><i class="im-icon-cord"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_06-1140x380-croped.jpg" alt="Quis autem vel eum iure reprehenderit" title="Quis autem vel eum iure reprehenderit">
		<div class="cover icon">
			<a href="http://menu.megamain.com/88/" class="icon"><i class="im-icon-cord"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-cord"></i>
				</div>
				<div class="post_title">
					Quis autem vel eum iure reprehenderit
				</div>
				<div class="post_description">
					Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_07-190x190-croped.jpg" alt="Ut enim ad minima veniam" title="Ut enim ad minima veniam">
		<div class="cover icon">
			<a href="http://menu.megamain.com/85/" class="icon"><i class="im-icon-crown"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_07-1140x380-croped.jpg" alt="Ut enim ad minima veniam" title="Ut enim ad minima veniam">
		<div class="cover icon">
			<a href="http://menu.megamain.com/85/" class="icon"><i class="im-icon-crown"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-crown"></i>
				</div>
				<div class="post_title">
					Ut enim ad minima veniam
				</div>
				<div class="post_description">
					Ut enim ad minima&nbsp;veniam, quis nostrum&nbsp;exercitationem&nbsp;ullam corporis suscipit&nbsp;laboriosam,&nbsp;nisi ut aliquid ex ea commodiconsequatur
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_01-190x190-croped.jpg" alt="Nemo enim ipsam voluptatem" title="Nemo enim ipsam voluptatem">
		<div class="cover icon">
			<a href="http://menu.megamain.com/82/" class="icon"><i class="im-icon-bullhorn"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_01-1140x380-croped.jpg" alt="Nemo enim ipsam voluptatem" title="Nemo enim ipsam voluptatem">
		<div class="cover icon">
			<a href="http://menu.megamain.com/82/" class="icon"><i class="im-icon-bullhorn"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-bullhorn"></i>
				</div>
				<div class="post_title">
					Nemo enim ipsam voluptatem
				</div>
				<div class="post_description">
					Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		</ul><!-- /.mega_dropdown -->
	</li>
	<li id="menu-item-57" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-57 widgets_dropdown default_style drop_to_right submenu_default_width columns3">
		<a href="/32" class="item_link  with_icon" tabindex="30">
			<i class="im-icon-history-2"></i> 
			<span class="link_content">
				<span class="link_text">
					Eum iure
				</span>
			</span>
		</a>
		<ul class="mega_dropdown"><div id="text-10" class="widget widget_text"><div class="widgettitle">Contact Form 7</div>			<div class="textwidget"><div class="wpcf7" id="wpcf7-f156-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"></div>
<form name="" action="/#wpcf7-f156-o1" method="post" class="wpcf7-form" novalidate="novalidate">
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="156">
<input type="hidden" name="_wpcf7_version" value="4.0.1">
<input type="hidden" name="_wpcf7_locale" value="en_US">
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f156-o1">
<input type="hidden" name="_wpnonce" value="775efaf1b5">
</div>
<p>Your Name (required)<br>
    <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span> </p>
<p>Your Email (required)<br>
    <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"></span> </p>
<p>Your Message<br>
    <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="5" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span> </p>
<p><input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit"><img class="ajax-loader" src="http://menu.megamain.com/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Sending ..." style="visibility: hidden;"></p>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div></div>
		</div><div id="text-11" class="widget widget_text"><div class="widgettitle">YouTube</div>			<div class="textwidget"><iframe width="100%" height="220" src="//www.youtube.com/embed/JuyB7NO0EYY" frameborder="0" allowfullscreen=""></iframe></div>
		</div><div id="text-12" class="widget widget_text"><div class="widgettitle">Text</div>			<div class="textwidget">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident.</div>
		</div>
		</ul><!-- /.mega_dropdown -->
	</li>
	<li id="menu-item-68" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-68 post_type_dropdown default_style drop_to_right submenu_default_width columns6">
		<a href="/3-10" class="item_link  with_icon" tabindex="31">
			<i class="im-icon-clipboard-3"></i> 
			<span class="link_content">
				<span class="link_text">
					Accusamus et
				</span>
			</span>
		</a>
		<ul class="mega_dropdown">
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_19-190x190-croped.jpg" alt="Duis aute irure dolor in" title="Duis aute irure dolor in">
		<div class="cover icon">
			<a href="http://menu.megamain.com/112/" class="icon"><i class="im-icon-brightness-medium"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_19-1140x380-croped.jpg" alt="Duis aute irure dolor in" title="Duis aute irure dolor in">
		<div class="cover icon">
			<a href="http://menu.megamain.com/112/" class="icon"><i class="im-icon-brightness-medium"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-brightness-medium"></i>
				</div>
				<div class="post_title">
					Duis aute irure dolor in
				</div>
				<div class="post_description">
					Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim...
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_18-190x190-croped.jpg" alt="Lorem ipsum dolor sit amet" title="Lorem ipsum dolor sit amet">
		<div class="cover icon">
			<a href="http://menu.megamain.com/109/" class="icon"><i class="im-icon-fire-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_18-1140x380-croped.jpg" alt="Lorem ipsum dolor sit amet" title="Lorem ipsum dolor sit amet">
		<div class="cover icon">
			<a href="http://menu.megamain.com/109/" class="icon"><i class="im-icon-fire-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-fire-2"></i>
				</div>
				<div class="post_title">
					Lorem ipsum dolor sit amet
				</div>
				<div class="post_description">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut...
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_17-190x190-croped.jpg" alt="Sed ut perspiciatis" title="Sed ut perspiciatis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/106/" class="icon"><i class="im-icon-trophy-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_17-1140x380-croped.jpg" alt="Sed ut perspiciatis" title="Sed ut perspiciatis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/106/" class="icon"><i class="im-icon-trophy-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-trophy-2"></i>
				</div>
				<div class="post_title">
					Sed ut perspiciatis
				</div>
				<div class="post_description">
					Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae...
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_14-190x190-croped.jpg" alt="Lorem ipsum dolor sit amet" title="Lorem ipsum dolor sit amet">
		<div class="cover icon">
			<a href="http://menu.megamain.com/100/" class="icon"><i class="im-icon-leaf"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_14-1140x380-croped.jpg" alt="Lorem ipsum dolor sit amet" title="Lorem ipsum dolor sit amet">
		<div class="cover icon">
			<a href="http://menu.megamain.com/100/" class="icon"><i class="im-icon-leaf"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-leaf"></i>
				</div>
				<div class="post_title">
					Lorem ipsum dolor sit amet
				</div>
				<div class="post_description">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut...
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_12-190x190-croped.jpg" alt="Temporibus autem quibusdam" title="Temporibus autem quibusdam">
		<div class="cover icon">
			<a href="http://menu.megamain.com/97/" class="icon"><i class="im-icon-star-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_12-1140x380-croped.jpg" alt="Temporibus autem quibusdam" title="Temporibus autem quibusdam">
		<div class="cover icon">
			<a href="http://menu.megamain.com/97/" class="icon"><i class="im-icon-star-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-star-2"></i>
				</div>
				<div class="post_title">
					Temporibus autem quibusdam
				</div>
				<div class="post_description">
					Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et voluptates repudiandae sint et molestiae non recusandae.
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_10-190x190-croped.jpg" alt="Et harum quidem rerum facilis" title="Et harum quidem rerum facilis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/94/" class="icon"><i class="im-icon-pencil-3"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_10-1140x380-croped.jpg" alt="Et harum quidem rerum facilis" title="Et harum quidem rerum facilis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/94/" class="icon"><i class="im-icon-pencil-3"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-pencil-3"></i>
				</div>
				<div class="post_title">
					Et harum quidem rerum facilis
				</div>
				<div class="post_description">
					Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis...
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_06-190x190-croped.jpg" alt="Quis autem vel eum iure reprehenderit" title="Quis autem vel eum iure reprehenderit">
		<div class="cover icon">
			<a href="http://menu.megamain.com/88/" class="icon"><i class="im-icon-cord"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_06-1140x380-croped.jpg" alt="Quis autem vel eum iure reprehenderit" title="Quis autem vel eum iure reprehenderit">
		<div class="cover icon">
			<a href="http://menu.megamain.com/88/" class="icon"><i class="im-icon-cord"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-cord"></i>
				</div>
				<div class="post_title">
					Quis autem vel eum iure reprehenderit
				</div>
				<div class="post_description">
					Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_07-190x190-croped.jpg" alt="Ut enim ad minima veniam" title="Ut enim ad minima veniam">
		<div class="cover icon">
			<a href="http://menu.megamain.com/85/" class="icon"><i class="im-icon-crown"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_07-1140x380-croped.jpg" alt="Ut enim ad minima veniam" title="Ut enim ad minima veniam">
		<div class="cover icon">
			<a href="http://menu.megamain.com/85/" class="icon"><i class="im-icon-crown"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-crown"></i>
				</div>
				<div class="post_title">
					Ut enim ad minima veniam
				</div>
				<div class="post_description">
					Ut enim ad minima&nbsp;veniam, quis nostrum&nbsp;exercitationem&nbsp;ullam corporis suscipit&nbsp;laboriosam,&nbsp;nisi ut aliquid ex ea commodiconsequatur
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_02-190x190-croped.jpg" alt="Sed ut perspiciatis" title="Sed ut perspiciatis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/79/" class="icon"><i class="im-icon-bug"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_02-1140x380-croped.jpg" alt="Sed ut perspiciatis" title="Sed ut perspiciatis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/79/" class="icon"><i class="im-icon-bug"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-bug"></i>
				</div>
				<div class="post_title">
					Sed ut perspiciatis
				</div>
				<div class="post_description">
					Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae...
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_03-190x190-croped.jpg" alt="Duis aute irure dolor" title="Duis aute irure dolor">
		<div class="cover icon">
			<a href="http://menu.megamain.com/76/" class="icon"><i class="fa-icon-beaker"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_03-1140x380-croped.jpg" alt="Duis aute irure dolor" title="Duis aute irure dolor">
		<div class="cover icon">
			<a href="http://menu.megamain.com/76/" class="icon"><i class="fa-icon-beaker"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="fa-icon-beaker"></i>
				</div>
				<div class="post_title">
					Duis aute irure dolor
				</div>
				<div class="post_description">
					Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim...
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_04-190x190-croped.jpg" alt="Lorem ipsum dolor" title="Lorem ipsum dolor">
		<div class="cover icon">
			<a href="http://menu.megamain.com/73/" class="icon"><i class="im-icon-alarm"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_04-1140x380-croped.jpg" alt="Lorem ipsum dolor" title="Lorem ipsum dolor">
		<div class="cover icon">
			<a href="http://menu.megamain.com/73/" class="icon"><i class="im-icon-alarm"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-alarm"></i>
				</div>
				<div class="post_title">
					Lorem ipsum dolor
				</div>
				<div class="post_description">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut...
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		<li class="post_item" style="width:16.666666666667%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_15-190x190-croped.jpg" alt="Duis aute irure dolor in" title="Duis aute irure dolor in">
		<div class="cover icon">
			<a href="http://menu.megamain.com/1/" class="icon"><i class="im-icon-apple"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_15-1140x380-croped.jpg" alt="Duis aute irure dolor in" title="Duis aute irure dolor in">
		<div class="cover icon">
			<a href="http://menu.megamain.com/1/" class="icon"><i class="im-icon-apple"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
				<div class="post_icon">
					<i class="im-icon-apple"></i>
				</div>
				<div class="post_title">
					Duis aute irure dolor in
				</div>
				<div class="post_description">
					Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim...
				</div>
			</div><!-- /.post_details -->
		</li><!-- /.post_item -->
		</ul><!-- /.mega_dropdown -->
	</li>
	<li id="menu-item-58" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-58 multicolumn_dropdown default_style drop_to_right submenu_default_width columns3">
		<a href="/33" class="item_link  with_icon" tabindex="32">
			<i class="im-icon-google-plus-4"></i> 
			<span class="link_content">
				<span class="link_text">
					Reprehenderit
				</span>
			</span>
		</a>
		<ul class="mega_dropdown">
		<li id="menu-item-59" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-59 default_dropdown default_style drop_to_right submenu_default_width columns1" style="width:33.333333333333%;">
			<a href="/34" class="item_link  with_icon" tabindex="33">
				<i class="im-icon-rulers"></i> 
				<span class="link_content">
					<span class="link_text">
						Velit esse
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-64" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-64 default_dropdown default_style drop_to_right submenu_default_width columns1" style="width:33.333333333333%;">
			<a href="/35" class="item_link  with_icon" tabindex="34">
				<i class="fa-icon-code-fork"></i> 
				<span class="link_content">
					<span class="link_text">
						Quam nihil
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-65" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-65 default_dropdown default_style drop_to_right submenu_default_width columns1" style="width:33.333333333333%;">
			<a href="/36" class="item_link  with_icon" tabindex="35">
				<i class="im-icon-link2"></i> 
				<span class="link_content">
					<span class="link_text">
						Molestiae consequatur
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-66" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-66 default_dropdown default_style drop_to_right submenu_default_width columns1" style="width:33.333333333333%;">
			<a href="/37" class="item_link  with_icon" tabindex="36">
				<i class="im-icon-bubble"></i> 
				<span class="link_content">
					<span class="link_text">
						Nulla pariatur
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-67" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-67 default_dropdown default_style drop_to_right submenu_default_width columns1" style="width:33.333333333333%;">
			<a href="/38" class="item_link  with_icon" tabindex="37">
				<i class="im-icon-pacman"></i> 
				<span class="link_content">
					<span class="link_text">
						At vero eos et
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-70" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-70 default_dropdown default_style drop_to_right submenu_default_width columns1" style="width:33.333333333333%;">
			<a href="/39" class="item_link  with_icon" tabindex="38">
				<i class="fa-icon-signin"></i> 
				<span class="link_content">
					<span class="link_text">
						Blanditiis praesentium
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-69" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-69 default_dropdown default_style drop_to_right submenu_default_width columns1" style="width:33.333333333333%;">
			<a href="/3-11" class="item_link  with_icon" tabindex="39">
				<i class="im-icon-align-bottom"></i> 
				<span class="link_content">
					<span class="link_text">
						Iusto odio dignissimos
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-71" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-71 default_dropdown default_style drop_to_right submenu_default_width columns1" style="width:33.333333333333%;">
			<a href="/3-12" class="item_link  with_icon" tabindex="40">
				<i class="im-icon-file-powerpoint"></i> 
				<span class="link_content">
					<span class="link_text">
						Deleniti atque corrupti
					</span>
				</span>
			</a>
		</li>
		</ul><!-- /.mega_dropdown -->
	</li>
	</ul><!-- /.mega_dropdown -->
</li>
<li id="menu-item-30" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-30 multicolumn_dropdown additional_style_3 drop_to_right submenu_full_width columns4">
	<a href="/2" class="item_link  with_icon" tabindex="41">
		<i class="im-icon-pause-2"></i> 
		<span class="link_content">
			<span class="link_text">
				Multi Column
			</span>
		</span>
	</a>
	<ul class="mega_dropdown">
	<li id="menu-item-31" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-31 default_dropdown additional_style_9 drop_to_right submenu_default_width columns1" style="width:25%;">
		<a href="/21" class="item_link  disable_icon" tabindex="42">
			<i class=""></i> 
			<span class="link_content">
				<span class="link_text">
					First Column
				</span>
			</span>
		</a>
		<ul class="mega_dropdown">
		<li id="menu-item-39" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-39 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/211" class="item_link  with_icon" tabindex="43">
				<i class="fa-icon-signin"></i> 
				<span class="link_content">
					<span class="link_text">
						Unde omnis iste
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-40" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-40 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/212" class="item_link  with_icon" tabindex="44">
				<i class="fa-icon-share-alt"></i> 
				<span class="link_content">
					<span class="link_text">
						Natus error sit
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-41" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-41 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/213" class="item_link  with_icon" tabindex="45">
				<i class="im-icon-equalizer-3"></i> 
				<span class="link_content">
					<span class="link_text">
						Voluptatem
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-42" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-42 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/214" class="item_link  with_icon" tabindex="46">
				<i class="im-icon-camera-8"></i> 
				<span class="link_content">
					<span class="link_text">
						Accusantium
					</span>
				</span>
			</a>
		</li>
		</ul><!-- /.mega_dropdown -->
	</li>
	<li id="menu-item-32" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-32 default_dropdown additional_style_9 drop_to_right submenu_default_width columns1" style="width:25%;">
		<a href="/22" class="item_link  disable_icon" tabindex="47">
			<i class=""></i> 
			<span class="link_content">
				<span class="link_text">
					Second Column
				</span>
			</span>
		</a>
		<ul class="mega_dropdown">
		<li id="menu-item-43" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-43 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/221" class="item_link  with_icon" tabindex="48">
				<i class="im-icon-volume-low"></i> 
				<span class="link_content">
					<span class="link_text">
						Nemo enim ipsam
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-44" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-44 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/222" class="item_link  with_icon" tabindex="49">
				<i class="im-icon-settings"></i> 
				<span class="link_content">
					<span class="link_text">
						Voluptatem
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-45" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-45 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/223" class="item_link  with_icon" tabindex="50">
				<i class="fa-icon-suitcase"></i> 
				<span class="link_content">
					<span class="link_text">
						Quia voluptas sit
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-46" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-46 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/224" class="item_link  with_icon" tabindex="51">
				<i class="im-icon-arrow-left-9"></i> 
				<span class="link_content">
					<span class="link_text">
						Aspernatur aut
					</span>
				</span>
			</a>
		</li>
		</ul><!-- /.mega_dropdown -->
	</li>
	<li id="menu-item-33" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-33 default_dropdown additional_style_9 drop_to_right submenu_default_width columns1" style="width:25%;">
		<a href="/23" class="item_link  disable_icon" tabindex="52">
			<i class=""></i> 
			<span class="link_content">
				<span class="link_text">
					Third Column
				</span>
			</span>
		</a>
		<ul class="mega_dropdown">
		<li id="menu-item-47" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-47 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/231" class="item_link  with_icon" tabindex="53">
				<i class="im-icon-arrow-right-11"></i> 
				<span class="link_content">
					<span class="link_text">
						Odit aut fugit
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-48" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-48 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/232" class="item_link  with_icon" tabindex="54">
				<i class="im-icon-movie"></i> 
				<span class="link_content">
					<span class="link_text">
						Sed quia consequuntur
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-49" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-49 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/233" class="item_link  with_icon" tabindex="55">
				<i class="im-icon-stack-spades"></i> 
				<span class="link_content">
					<span class="link_text">
						Magni dolores eos
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-50" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-50 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/234" class="item_link  with_icon" tabindex="56">
				<i class="im-icon-flower"></i> 
				<span class="link_content">
					<span class="link_text">
						Qui ratione
					</span>
				</span>
			</a>
		</li>
		</ul><!-- /.mega_dropdown -->
	</li>
	<li id="menu-item-34" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-34 default_dropdown additional_style_9 drop_to_right submenu_default_width columns1" style="width:25%;">
		<a href="/24" class="item_link  disable_icon" tabindex="57">
			<i class=""></i> 
			<span class="link_content">
				<span class="link_text">
					Fourth Column
				</span>
			</span>
		</a>
		<ul class="mega_dropdown">
		<li id="menu-item-51" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-51 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/241" class="item_link  with_icon" tabindex="58">
				<i class="im-icon-quotes-right"></i> 
				<span class="link_content">
					<span class="link_text">
						Sequi nesciunt
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-52" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-52 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/242" class="item_link  with_icon" tabindex="59">
				<i class="im-icon-libreoffice"></i> 
				<span class="link_content">
					<span class="link_text">
						Neque porro
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-53" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/243" class="item_link  with_icon" tabindex="60">
				<i class="fa-icon-rss"></i> 
				<span class="link_content">
					<span class="link_text">
						Quisquam est
					</span>
				</span>
			</a>
		</li>
		<li id="menu-item-54" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-54 default_dropdown default_style drop_to_right submenu_default_width columns1">
			<a href="/244" class="item_link  with_icon" tabindex="61">
				<i class="im-icon-checkbox-unchecked"></i> 
				<span class="link_content">
					<span class="link_text">
						Qui dolorem
					</span>
				</span>
			</a>
		</li>
		</ul><!-- /.mega_dropdown -->
	</li>
	</ul><!-- /.mega_dropdown -->
</li>
<li id="menu-item-72" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-72 post_type_dropdown additional_style_4 drop_to_left submenu_default_width columns8">
	<a href="http://4" class="item_link  with_icon" tabindex="62">
		<i class="im-icon-bullhorn"></i> 
		<span class="link_content">
			<span class="link_text">
				Recent Posts
			</span>
		</span>
	</a>
	<ul class="mega_dropdown">
	<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_22-142x142-croped.jpg" alt="Et harum quidem rerum facilis" title="Et harum quidem rerum facilis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/118/" class="icon"><i class="im-icon-cup-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
		<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_22-450x150-croped.jpg" alt="Et harum quidem rerum facilis" title="Et harum quidem rerum facilis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/118/" class="icon"><i class="im-icon-cup-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_icon">
				<i class="im-icon-cup-2"></i>
			</div>
			<div class="post_title">
				Et harum quidem rerum facilis
			</div>
			<div class="post_description">
				Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis...
			</div>
		</div><!-- /.post_details -->
	</li><!-- /.post_item -->
	<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_21-142x142-croped.jpg" alt="At vero eos et accusamus" title="At vero eos et accusamus">
		<div class="cover icon">
			<a href="http://menu.megamain.com/115/" class="icon"><i class="im-icon-cog"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
		<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_21-450x150-croped.jpg" alt="At vero eos et accusamus" title="At vero eos et accusamus">
		<div class="cover icon">
			<a href="http://menu.megamain.com/115/" class="icon"><i class="im-icon-cog"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_icon">
				<i class="im-icon-cog"></i>
			</div>
			<div class="post_title">
				At vero eos et accusamus
			</div>
			<div class="post_description">
				At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non...
			</div>
		</div><!-- /.post_details -->
	</li><!-- /.post_item -->
	<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_19-142x142-croped.jpg" alt="Duis aute irure dolor in" title="Duis aute irure dolor in">
		<div class="cover icon">
			<a href="http://menu.megamain.com/112/" class="icon"><i class="im-icon-brightness-medium"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
		<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_19-450x150-croped.jpg" alt="Duis aute irure dolor in" title="Duis aute irure dolor in">
		<div class="cover icon">
			<a href="http://menu.megamain.com/112/" class="icon"><i class="im-icon-brightness-medium"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_icon">
				<i class="im-icon-brightness-medium"></i>
			</div>
			<div class="post_title">
				Duis aute irure dolor in
			</div>
			<div class="post_description">
				Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim...
			</div>
		</div><!-- /.post_details -->
	</li><!-- /.post_item -->
	<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_18-142x142-croped.jpg" alt="Lorem ipsum dolor sit amet" title="Lorem ipsum dolor sit amet">
		<div class="cover icon">
			<a href="http://menu.megamain.com/109/" class="icon"><i class="im-icon-fire-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
		<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_18-450x150-croped.jpg" alt="Lorem ipsum dolor sit amet" title="Lorem ipsum dolor sit amet">
		<div class="cover icon">
			<a href="http://menu.megamain.com/109/" class="icon"><i class="im-icon-fire-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_icon">
				<i class="im-icon-fire-2"></i>
			</div>
			<div class="post_title">
				Lorem ipsum dolor sit amet
			</div>
			<div class="post_description">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut...
			</div>
		</div><!-- /.post_details -->
	</li><!-- /.post_item -->
	<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_17-142x142-croped.jpg" alt="Sed ut perspiciatis" title="Sed ut perspiciatis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/106/" class="icon"><i class="im-icon-trophy-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
		<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_17-450x150-croped.jpg" alt="Sed ut perspiciatis" title="Sed ut perspiciatis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/106/" class="icon"><i class="im-icon-trophy-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_icon">
				<i class="im-icon-trophy-2"></i>
			</div>
			<div class="post_title">
				Sed ut perspiciatis
			</div>
			<div class="post_description">
				Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae...
			</div>
		</div><!-- /.post_details -->
	</li><!-- /.post_item -->
	<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_14-142x142-croped.jpg" alt="Lorem ipsum dolor sit amet" title="Lorem ipsum dolor sit amet">
		<div class="cover icon">
			<a href="http://menu.megamain.com/100/" class="icon"><i class="im-icon-leaf"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
		<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_14-450x150-croped.jpg" alt="Lorem ipsum dolor sit amet" title="Lorem ipsum dolor sit amet">
		<div class="cover icon">
			<a href="http://menu.megamain.com/100/" class="icon"><i class="im-icon-leaf"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_icon">
				<i class="im-icon-leaf"></i>
			</div>
			<div class="post_title">
				Lorem ipsum dolor sit amet
			</div>
			<div class="post_description">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut...
			</div>
		</div><!-- /.post_details -->
	</li><!-- /.post_item -->
	<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_12-142x142-croped.jpg" alt="Temporibus autem quibusdam" title="Temporibus autem quibusdam">
		<div class="cover icon">
			<a href="http://menu.megamain.com/97/" class="icon"><i class="im-icon-star-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
		<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_12-450x150-croped.jpg" alt="Temporibus autem quibusdam" title="Temporibus autem quibusdam">
		<div class="cover icon">
			<a href="http://menu.megamain.com/97/" class="icon"><i class="im-icon-star-2"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_icon">
				<i class="im-icon-star-2"></i>
			</div>
			<div class="post_title">
				Temporibus autem quibusdam
			</div>
			<div class="post_description">
				Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et voluptates repudiandae sint et molestiae non recusandae.
			</div>
		</div><!-- /.post_details -->
	</li><!-- /.post_item -->
	<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_10-142x142-croped.jpg" alt="Et harum quidem rerum facilis" title="Et harum quidem rerum facilis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/94/" class="icon"><i class="im-icon-pencil-3"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
		<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_10-450x150-croped.jpg" alt="Et harum quidem rerum facilis" title="Et harum quidem rerum facilis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/94/" class="icon"><i class="im-icon-pencil-3"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_icon">
				<i class="im-icon-pencil-3"></i>
			</div>
			<div class="post_title">
				Et harum quidem rerum facilis
			</div>
			<div class="post_description">
				Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis...
			</div>
		</div><!-- /.post_details -->
	</li><!-- /.post_item -->
	<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_09-142x142-croped.jpg" alt="At vero eos et accusamus" title="At vero eos et accusamus">
		<div class="cover icon">
			<a href="http://menu.megamain.com/91/" class="icon"><i class="im-icon-twitter"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
		<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_09-450x150-croped.jpg" alt="At vero eos et accusamus" title="At vero eos et accusamus">
		<div class="cover icon">
			<a href="http://menu.megamain.com/91/" class="icon"><i class="im-icon-twitter"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_icon">
				<i class="im-icon-twitter"></i>
			</div>
			<div class="post_title">
				At vero eos et accusamus
			</div>
			<div class="post_description">
				At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati
			</div>
		</div><!-- /.post_details -->
	</li><!-- /.post_item -->
	<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_06-142x142-croped.jpg" alt="Quis autem vel eum iure reprehenderit" title="Quis autem vel eum iure reprehenderit">
		<div class="cover icon">
			<a href="http://menu.megamain.com/88/" class="icon"><i class="im-icon-cord"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
		<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_06-450x150-croped.jpg" alt="Quis autem vel eum iure reprehenderit" title="Quis autem vel eum iure reprehenderit">
		<div class="cover icon">
			<a href="http://menu.megamain.com/88/" class="icon"><i class="im-icon-cord"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_icon">
				<i class="im-icon-cord"></i>
			</div>
			<div class="post_title">
				Quis autem vel eum iure reprehenderit
			</div>
			<div class="post_description">
				Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur
			</div>
		</div><!-- /.post_details -->
	</li><!-- /.post_item -->
	<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_07-142x142-croped.jpg" alt="Ut enim ad minima veniam" title="Ut enim ad minima veniam">
		<div class="cover icon">
			<a href="http://menu.megamain.com/85/" class="icon"><i class="im-icon-crown"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
		<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_07-450x150-croped.jpg" alt="Ut enim ad minima veniam" title="Ut enim ad minima veniam">
		<div class="cover icon">
			<a href="http://menu.megamain.com/85/" class="icon"><i class="im-icon-crown"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_icon">
				<i class="im-icon-crown"></i>
			</div>
			<div class="post_title">
				Ut enim ad minima veniam
			</div>
			<div class="post_description">
				Ut enim ad minima&nbsp;veniam, quis nostrum&nbsp;exercitationem&nbsp;ullam corporis suscipit&nbsp;laboriosam,&nbsp;nisi ut aliquid ex ea commodiconsequatur
			</div>
		</div><!-- /.post_details -->
	</li><!-- /.post_item -->
	<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_01-142x142-croped.jpg" alt="Nemo enim ipsam voluptatem" title="Nemo enim ipsam voluptatem">
		<div class="cover icon">
			<a href="http://menu.megamain.com/82/" class="icon"><i class="im-icon-bullhorn"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
		<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_01-450x150-croped.jpg" alt="Nemo enim ipsam voluptatem" title="Nemo enim ipsam voluptatem">
		<div class="cover icon">
			<a href="http://menu.megamain.com/82/" class="icon"><i class="im-icon-bullhorn"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_icon">
				<i class="im-icon-bullhorn"></i>
			</div>
			<div class="post_title">
				Nemo enim ipsam voluptatem
			</div>
			<div class="post_description">
				Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est
			</div>
		</div><!-- /.post_details -->
	</li><!-- /.post_item -->
	<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_02-142x142-croped.jpg" alt="Sed ut perspiciatis" title="Sed ut perspiciatis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/79/" class="icon"><i class="im-icon-bug"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
		<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_02-450x150-croped.jpg" alt="Sed ut perspiciatis" title="Sed ut perspiciatis">
		<div class="cover icon">
			<a href="http://menu.megamain.com/79/" class="icon"><i class="im-icon-bug"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_icon">
				<i class="im-icon-bug"></i>
			</div>
			<div class="post_title">
				Sed ut perspiciatis
			</div>
			<div class="post_description">
				Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae...
			</div>
		</div><!-- /.post_details -->
	</li><!-- /.post_item -->
	<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_03-142x142-croped.jpg" alt="Duis aute irure dolor" title="Duis aute irure dolor">
		<div class="cover icon">
			<a href="http://menu.megamain.com/76/" class="icon"><i class="fa-icon-beaker"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
		<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_03-450x150-croped.jpg" alt="Duis aute irure dolor" title="Duis aute irure dolor">
		<div class="cover icon">
			<a href="http://menu.megamain.com/76/" class="icon"><i class="fa-icon-beaker"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_icon">
				<i class="fa-icon-beaker"></i>
			</div>
			<div class="post_title">
				Duis aute irure dolor
			</div>
			<div class="post_description">
				Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim...
			</div>
		</div><!-- /.post_details -->
	</li><!-- /.post_item -->
	<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_04-142x142-croped.jpg" alt="Lorem ipsum dolor" title="Lorem ipsum dolor">
		<div class="cover icon">
			<a href="http://menu.megamain.com/73/" class="icon"><i class="im-icon-alarm"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
		<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_04-450x150-croped.jpg" alt="Lorem ipsum dolor" title="Lorem ipsum dolor">
		<div class="cover icon">
			<a href="http://menu.megamain.com/73/" class="icon"><i class="im-icon-alarm"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_icon">
				<i class="im-icon-alarm"></i>
			</div>
			<div class="post_title">
				Lorem ipsum dolor
			</div>
			<div class="post_description">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut...
			</div>
		</div><!-- /.post_details -->
	</li><!-- /.post_item -->
	<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_15-142x142-croped.jpg" alt="Duis aute irure dolor in" title="Duis aute irure dolor in">
		<div class="cover icon">
			<a href="http://menu.megamain.com/1/" class="icon"><i class="im-icon-apple"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
		<div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_15-450x150-croped.jpg" alt="Duis aute irure dolor in" title="Duis aute irure dolor in">
		<div class="cover icon">
			<a href="http://menu.megamain.com/1/" class="icon"><i class="im-icon-apple"></i></a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" -->
			<div class="post_icon">
				<i class="im-icon-apple"></i>
			</div>
			<div class="post_title">
				Duis aute irure dolor in
			</div>
			<div class="post_description">
				Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim...
			</div>
		</div><!-- /.post_details -->
	</li><!-- /.post_item -->
	</ul><!-- /.mega_dropdown -->
</li>
<li id="menu-item-137" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-137 widgets_dropdown additional_style_6 drop_to_left submenu_default_width columns2">
	<a href="/6" class="item_link  with_icon" tabindex="63">
		<i class="im-icon-puzzle"></i> 
		<span class="link_content">
			<span class="link_text">
				Widgets
			</span>
		</span>
	</a>
	<ul class="mega_dropdown"><div id="text-8" class="widget widget_text"><div class="widgettitle">Contact Us</div>			<div class="textwidget"><ul class="contacts"> 
    <li>
        <i class="im-icon-envelop"></i><a href="#">info@megamain.com</a><br>
    </li>
    <li>
        <i class="im-icon-globe"></i><a href="#">www.megamain.com</a><br>
    </li>
    <li>
        <i class="im-icon-phone"></i>+1 234-567-8000<br>
    </li>
    <li>
        <i class="im-icon-office"></i>600 Madison Ave, New York, NY 10022 United States<br>
    </li>
</ul>
<style>
#mega_main_menu ul.contacts li
{
    position: relative;
    padding: 6px 10px 6px 25px;
}
#mega_main_menu ul.contacts li i
{
    position: absolute;
    left: 0px;
    top: 0px;
    width: 25px;
    height: 32px;
    text-align: left !important;
    line-height: 32px !important;
    vertical-align: baseline !important;
}
</style></div>
		</div><div id="text-9" class="widget widget_text"><div class="widgettitle">Find Us</div>			<div class="textwidget"><iframe src="https://mapsengine.google.com/map/u/0/embed?mid=zbHZaCE4IBhk.k16bc0NN63hE" width="100%" height="250"></iframe></div>
		</div>
	</ul><!-- /.mega_dropdown -->
</li>
<li id="menu-item-163" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-163 default_dropdown default_style drop_to_right submenu_default_width columns1">
	<a href="http://extensions.megamain.com/" class="item_link  with_icon" tabindex="64">
		<i class="im-icon-lab"></i> 
		<span class="link_content">
			<span class="link_text">
				Extensions
			</span>
		</span>
	</a>
</li>';
*/

if (is_array( $unserialise['_included_components'] ) && in_array( 'search_box', $unserialise['_included_components'] ) ){
$items_wrap .= mmm_nav_search($arg);
}

if (is_array( $unserialise['_included_components'] ) && in_array( 'login', $unserialise['_included_components'] ) ){

//var_dump($xoTheme->template);
/*var_dump($xoTheme->template->_tpl_vars["xoops_isuser"]);
var_dump($xoTheme->template->_tpl_vars["xoops_userid"]);
var_dump($xoTheme->template->_tpl_vars["xoops_uname"]);
var_dump($xoTheme->template->_tpl_vars["xoops_isadmin"]);
var_dump($xoTheme->template->_tpl_vars["xoops_avatar"]);*/
		if ($xoTheme->template->_tpl_vars["xoops_isuser"]){
		$items_wrap .= '<li style="float: right;">
						<a href="http://localhost/xoops25777/modules/profile/userinfo.php?uid='.$xoTheme->template->_tpl_vars["xoops_userid"].'" class="item_link  with_icon"><span class="link_content">
														<i class="im-icon-user-6 icouser"></i><span class="link_text">
															'.$xoTheme->template->_tpl_vars["xoops_uname"].'
															<img src="'.$xoTheme->template->_tpl_vars["xoops_avatar"].'">
														</span>
													</span></a>
						</li>';

		/*$items_wrap .= mmm_nav_login($arg);
		if (is_array( $unserialise['_included_components'] ) && in_array( 'buddypress', $unserialise['_included_components'] ) ){
		$items_wrap .= mmm_nav_register($arg);
		}*/


						
		}else{
		$items_wrap .= mmm_nav_login($arg);
		$items_wrap .= '<script type="text/javascript">

												jQuery(function($) {

													$(".top-menu-login").click (function(e) {
																		//alert("ttttttt");					
														jQuery("#popup-td-login").css("display", "block");

														e.preventDefault();

													});
												});

											</script>
											
											
				<div id="popup-td-login" style="display: none;">

					<div class="container">

						<div class="row">

							<div class="col-sm-12">

								<div class="item-block-title">

									<i class="im-icon-user-6"></i><h4>Login</h4>

									<a id="close-popup-td-login" href="#" data-rel="tooltip" title="close" ><i class="im-icon-user-4"></i></a>

								</div>

								<div class="item-popup-content">

									<form action="http://localhost/xoops25777/modules/profile/user.php" method="post">

										<div class="full" style="margin-bottom: 0;">  
										
											<span class="form-label">Username:</span>
											
											<input type="text" name="userNameLogin" id="userNameLogin" value="" class="input-textarea" placeholder="" />

										</div>

										<div class="full" style="margin-bottom: 0;">

											<span class="form-label">Password:</span>
											
											<input type="password" name="userPasswordLogin" id="userPasswordLogin" value="" class="input-textarea" placeholder="" />

										</div>

										<div class="full" style="margin-bottom: 10px;">

											<input name="rememberme" type="checkbox" value="forever" style="float: left; width: auto !important; margin-top: 6px;"/><span style="margin-left: 10px; float: left; margin-bottom: 10px;">Remember me</span>
											<a id="top-menu-reset" style="float: right; font-size: 20px" class="" href="http://localhost/xoops25777/modules/profile/user.php#lost">Forgot Password</a>

										</div>
																		

										<input style="margin-bottom: 0; width: 100%; font-size: 20px" name="submit" type="submit" value="Login" class="input-submit">	 
										  
									</form>

								</div>
							
							</div>

						</div>

					</div>

					<div id="close-td-login" class="close-login"></div>

					<script type="text/javascript">

						jQuery(function($) {

							$("#close-popup-td-login").click (function(e) {
														
								jQuery("#popup-td-login").css("display","none");

							});

							$("close-td-login").click (function(e) {
														
								jQuery("#popup-td-login").css("display","none");

							});

						});
					</script>

				</div>		
											';


		}
}
if (is_array( $unserialise['_included_components'] ) && in_array( 'register', $unserialise['_included_components'] ) ){

		if ($xoTheme->template->_tpl_vars["xoops_isuser"]){


			$items_wrap .= '';

		}else{		
			$items_wrap .= mmm_nav_register($arg);
			$items_wrap .= '<script type="text/javascript">

													jQuery(function($) {

														$(".top-menu-register").click (function(e) {
														//alert("ggg");
																								
															jQuery("#popup-td-register").css("display", "block");

															e.preventDefault();

														});

													});

												</script>

			<div id="popup-td-register" style="display: none;">

							<div class="container">

								<div class="row">

									<div class="col-sm-12">

										<div class="item-block-title">

											<i class="fa fa-user"></i><h4>Register</h4>

											<a id="close-popup-td-register" href="#" data-rel="tooltip" title="close" ><i class="im-icon-user-4"></i></a>

										</div>

										<div class="item-popup-content">
										
										<form name="regform" id="regform" onsubmit="return xoopsFormValidate_regform();" action="http://localhost/xoops25777/modules/profile/register.php" method="post">
					<table class="profile-form" id="profile-form-regform">
																						<tbody><tr>
									<td class="head">
										<div class="xoops-form-element-caption-required">
											<span class="caption-text">Username</span>
											<span class="caption-marker">*</span>
										</div>
																</td>
									<td class="odd">
										<input name="uname" title="Username" id="uname" type="text" size="35" maxlength="10" value="">
									</td>
								</tr>
																			<tr>
									<td class="head">
										<div class="xoops-form-element-caption-required">
											<span class="caption-text">Email</span>
											<span class="caption-marker">*</span>
										</div>
																</td>
									<td class=" even">
										<input name="email" title="Email" id="email" type="text" size="35" maxlength="255" value="">
									</td>
								</tr>
																			<tr>
									<td class="head">
										<div class="xoops-form-element-caption-required">
											<span class="caption-text">Password</span>
											<span class="caption-marker">*</span>
										</div>
																</td>
									<td class="odd">
										<input name="pass" id="pass" type="password" size="35" maxlength="32" value="" autocomplete="off">
									</td>
								</tr>
																			<tr>
									<td class="head">
										<div class="xoops-form-element-caption-required">
											<span class="caption-text">Verify Password</span>
											<span class="caption-marker">*</span>
										</div>
																</td>
									<td class=" even">
										<input name="vpass" id="vpass" type="password" size="35" maxlength="32" value="" autocomplete="off">
									</td>
								</tr>
																			<tr>
									<td class="head">
										<div class="xoops-form-element-caption">
											<span class="caption-text">Disclaimer</span>
											<span class="caption-marker">*</span>
										</div>
																</td>
									<td class="odd">
										<div class="pad5">While the administrators and moderators of this site will attempt to remove<br>or edit any generally objectionable material as quickly as possible, it is<br>impossible to review every message. Therefore you acknowledge that all posts<br>made to this site express the views and opinions of the author and not the<br>administrators, moderators or webmaster (except for posts by these people)<br>and hence will not be held liable.<br><br>You agree not to post any abusive, obscene, vulgar, slanderous, hateful,<br>threatening, sexually-orientated or any other material that may violate any<br>applicable laws. Doing so may lead to you being immediately and permanently<br>banned (and your service provider being informed). The IP address of all<br>posts is recorded to aid in enforcing these conditions. Creating multiple<br>accounts for a single user is not allowed. You agree that the webmaster,<br>administrator and moderators of this site have the right to remove, edit,<br>move or close any topic at any time should they see fit. As a user you agree<br>to any information you have entered above being stored in a database. While<br>this information will not be disclosed to any third party without your<br>consent the webmaster, administrator and moderators cannot be held<br>responsible for any hacking attempt that may lead to the data being<br>compromised.<br><br>This site system uses cookies to store information on your local computer.<br>These cookies do not contain any of the information you have entered above,<br>they serve only to improve your viewing pleasure. The email address is used<br>only for confirming your registration details and password (and for sending<br>new passwords should you forget your current one).<br><br>By clicking Register below you agree to be bound by these conditions.</div>
			<br><input name="agree_disc" title="" id="agree_disc1" type="checkbox" value="1"><label for="agree_disc1" name="xolb_agree_disc">I agree to the above</label>&nbsp;

									</td>
								</tr>
																			<tr>
									<td class="head">
										<div class="xoops-form-element-caption-required">
											<span class="caption-text">Confirmation Code</span>
											<span class="caption-marker">*</span>
										</div>
																</td>
									<td class=" even">
										<span style="padding: 1px 5px; border: 1px solid rgb(51, 51, 51); border-image: none; font-size: 100%; font-style: normal; font-weight: bold; font-color: #333;">0 + 3 = ?</span>&nbsp;&nbsp; <input name="xoopscaptcha" id="xoopscaptcha" type="text" size="6" maxlength="6" value=""><br>Input the result from the expression<br>Maximum attempts you can try: 10
									</td>
								</tr>
																																								<tr>
									<td class="head">
										<div class="xoops-form-element-caption">
											<span class="caption-text"></span>
											<span class="caption-marker">*</span>
										</div>
																</td>
									<td class="odd">
										<input name="submitButton" title="Submit" class="formButton" id="submitButton" type="submit" value="Submit">
									</td>
								</tr>
																			<tr>
									<td class="head">
										<div class="xoops-form-element-caption">
											<span class="caption-text"></span>
											<span class="caption-marker">*</span>
										</div>
																</td>
									<td class=" even">
										<tr class="foot"><td colspan="2">* = Required</td></tr>
									
								
												</tbody></table>
												<input name="XOOPS_TOKEN_REQUEST" id="XOOPS_TOKEN_REQUEST" type="hidden" value="75aad43e5196d7e60d8d539a0d216a07">
																																													<input name="op40567" id="op40567" type="hidden" value="register">
															<input name="uid" id="uid" type="hidden" value="">
															<input name="step" id="step" type="hidden" value="1">
																			</form>
										
										
										</div>			
									</div>		
								</div>	
							</div>
						</div>
									<script type="text/javascript">

							jQuery(function($) {

								$("#close-popup-td-register").click (function(e) {
															
									jQuery("#popup-td-register").css("display","none");

								});

								$("close-td-register").click (function(e) {
															
									jQuery("#popup-td-register").css("display","none");

								});

							});
						</script>
									
									';
									
				}


}

if (is_array( $unserialise['_included_components'] ) && in_array( 'date', $unserialise['_included_components'] ) ){

$items_wrap .= '<li style="float: right; line-height: 60px;">
						<span class="link_content">
							<i class="im-icon-user-6 icouser"></i>
							<span class="link_text" style="font-size:10px">
							'.date("l jS \of F Y h:i:s A").'
							</span>
						</span>
				</li>';
}

if (is_array( $unserialise['_included_components'] ) && in_array( 'social', $unserialise['_included_components'] ) ){
						$items_wrap .= '<li class="rss"><a target="_blank" href="rssxoops" title="Rss"><i class="fa-icon-rss-sign fa-icon-2x"></i></a></li><li class="facebook"><a target="_blank" href="fbxoops" title="Facebook"><i class="fa-icon-facebook-sign fa-icon-2x"></i></a></li><li class="twitter"><a target="_blank" href="twitter xoops" title="Twitter"><i class="fa-icon-twitter-sign fa-icon-2x"></i></a></li><li class="youtube"><a target="_blank" href="youtube" title="YouTube"><i class="fa-icon-youtube-sign fa-icon-2x"></i></a></li>';						

}
	
	$items_wrap .= '</ul>'; //end ul must be after mmm_nav_extension
	
	/*<!--
	<li class="nav_search_box">
	<form method="get" id="mega_main_menu_searchform" action="http://menu.megamain.com/">
		<i class="im-icon-search-3 icosearch"></i>
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="Search">
		<input type="text" class="field" name="s" id="s">
	</form>
	</li><!-- class="nav_search_box" -->
</ul>';*/
			
			
			$items_wrap .= '</div><!-- /class="menu_inner" -->';
			$items_wrap .= '</div><!-- /class="menu_holder" -->';
			$items_wrap .= '</div><!-- /id="mega_main_menu" -->';


			${'MENU'.$arg .'_'. $val} = $items_wrap;
			$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
}













		
		
		
		

////
		
		
 
 }
 //A ajouter next version ++++ de MENU skin et theme ceci est juste pour tester l'output


?>