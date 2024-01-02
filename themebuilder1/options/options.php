<?php
if ( ! class_exists( 'MFN_Options' ) ){

	if( ! defined( 'MFN_OPTIONS_DIR' ) ){
		define( 'MFN_OPTIONS_DIR',  dirname( __FILE__ ) );
	}

	if( ! defined( 'MFN_OPTIONS_URI' ) )
	{
		define('MFN_OPTIONS_URI', 'admin/themebuilder1/options/');
	}


	class MFN_Options{

		public $dir 			= MFN_OPTIONS_DIR;
		public $url 			= MFN_OPTIONS_URI;
		public $page 			= '';
		public $args 			= array();
		public $sections 	= array();
		public $errors 		= array();
		public $warnings 	= array();
		public $options 	= array();

		public $menu 			= array();


		/**
		 * Class Constructor. Defines the args for the theme options class
		 */
		function __construct( $menu = array(), $sections = array() ){

			//$this->menu = apply_filters( 'mfn-opts-menu', $menu );
			$this->menu = $menu;

			$defaults = array();

			$defaults['opt_name'] 			= 'betheme';

			$defaults['menu_icon'] 			= MFN_OPTIONS_URI .'/img/menu_icon.png';
			$defaults['menu_title'] 		= 'Theme Options';
			$defaults['page_title'] 		= 'Theme Options';
			$defaults['page_slug'] 			= 'be-options';
			$defaults['page_cap'] 			= 'edit_theme_options';
			$defaults['page_type'] 			= 'menu';
			$defaults['page_parent'] 		= '';
			$defaults['page_position'] 	= 100;

			// get args
			$this->args = $defaults;
			$this->args['mfn-opts-args'] = $this->args;
			//$this->args['mfn-opts-args-'. $this->args['opt_name']] = $this->args;
			
			//$this->args = apply_filters( 'mfn-opts-args', $this->args );
			//$this->args = apply_filters( 'mfn-opts-args-'. $this->args['opt_name'], $this->args );
//var_dump($sections);
			// get sections
			//$this->sections['mfn-opts-sections'] = $sections;
			$this->sections = $sections;
			//$this->sections['mfn-opts-sections-'. $this->args['opt_name']] = $this->sections;
			//$this->sections = apply_filters( 'mfn-opts-sections', $sections );
			//$this->sections = apply_filters( 'mfn-opts-sections-'. $this->args['opt_name'], $this->sections );
//var_dump($this->sections);
			// set option with defaults
			//add_action( 'init', array( &$this, '_set_default_options' ) );
			//set_default_options($this);
			$this->_set_default_options();
			$this->_options_page();
			$this->_save_options();
			$this->_download_options();
			//$this->_download_options();
/*
			// options page
			add_action( 'admin_menu', array( &$this, '_options_page' ), 13 );

			// register setting
			add_action( 'admin_init', array( &$this, '_register_setting' ) );

			// add the js for the error handling before the form
			add_action( 'mfn-opts-page-before-form', array( &$this, '_errors_js' ), 1 );

			// add the js for the warning handling before the form
			add_action( 'mfn-opts-page-before-form', array( &$this, '_warnings_js' ), 2 );

			// hook into the wp feeds for downloading the exported settings
			add_action( 'do_feed_mfn-opts-'.$this->args['opt_name'], array( &$this, '_download_options' ), 1, 1 );

			// get the options for use later on
			$this->options = get_option( $this->args['opt_name'] );*/

		}


		function _save_options(){
			global $xoopsDB;
			
			if(isset($_POST['submit']) && $_POST['submit'] == 'Save Changes'){
				$new = call_user_func( 'base'.'64_encode', serialize( $_POST[$this->args['opt_name']] ) );
				$titleexist = " SELECT conf_name FROM " . $xoopsDB -> prefix( 'config_theme' ) . " WHERE conf_name = 'themebuilder_options'";
				$resultexist = $xoopsDB->query($titleexist);
				$filecount = $xoopsDB -> getRowsNum( $resultexist );
	
				if ($filecount == 0) {
					$sqltemplate = "INSERT INTO " . $xoopsDB -> prefix('config_theme') . " (conf_name, conf_value) VALUES ('themebuilder_options', '".$new."')";
					if ($resulttemplate = $xoopsDB -> queryF( $sqltemplate)) {
						$message = 'insert template ';
					}else{
						$message = 'probleme insert template ';
					}
					//redirect_header("admin.php?fct=themebuilder1&op=ThemeBuilder", 5, $message);
					//exit();	
				}else{
					$message = 'update template ';							
					$sqltemplate = "UPDATE " . $xoopsDB -> prefix('config_theme') . " SET conf_value = '".$new."' WHERE conf_name = 'themebuilder_options'";
					if ( $resulttemplate = $xoopsDB -> queryF( $sqltemplate ) ) {
	
						$message .= ' <br>template enregistre avec succes';
	
					}else{
						$message .= ' probleme update';
					}		
				}
				//unset ($this);
				redirect_header("admin.php?fct=themebuilder1&op=options", 5, $message);
				exit();	
			}
		}
		/**
		 * This is used to return and option value from the options array
		*/
		function get( $opt_name, $default = null ){

			if( ( ! is_array($this->options) ) || ( ! key_exists($opt_name, $this->options) ) ) return $default;

			return ( ( ! empty($this->options[$opt_name])) || ($this->options[$opt_name]==='0') ) ? $this->options[$opt_name] : $default;
//			return (!empty($this->options[$opt_name])) ? $this->options[$opt_name] : $default;

		}


		/**
		 * This is used to set an arbitrary option in the options array
		 */
		function set($opt_name, $value) {
			$this->options[$opt_name] = $value;
			update_option($this->args['opt_name'], $this->options);
		}


		/**
		 * This is used to echo and option value from the options array
		*/
		function show($opt_name, $default = null){
			$option = $this->get($opt_name, $default);
			if(!is_array($option)){
				echo $option;
			}
		}


		/**
		 * Get default options into an array suitable for the settings API
		*/
		function _default_values(){
			$defaults = array();

			foreach($this->sections as $k => $section){

				if(isset($section['fields'])){

					foreach($section['fields'] as $fieldk => $field){
						if(!isset($field['std'])){
							$field['std'] = '';
						}
						$defaults[$field['id']] = $field['std'];
					}

				}

			}

			$defaults['last_tab'] = 0;
			return $defaults;
		}


		/**
		 * Set default options on admin_init if option doesnt exist (theme activation hook caused problems, so admin_init it is)
		*/
		function _set_default_options(){
			global $xoopsDB;
			/*if(!get_option($this->args['opt_name'])){
				add_option($this->args['opt_name'], $this->_default_values());
			}
			$this->options = get_option($this->args['opt_name']);*/
				$titleexist = " SELECT conf_value FROM " . $xoopsDB -> prefix( 'config_theme' ) . " WHERE conf_name = 'themebuilder_options'";
				$resultexist = $xoopsDB->query($titleexist);
				$fetch = $xoopsDB -> fetchArray($resultexist);
				$fetch_options = $fetch['conf_value'];
				if( $fetch_options && ! is_array( $fetch_options ) ){
				$fetch1 = unserialize( call_user_func( 'base'.'64_decode', $fetch_options ) );
				}//var_dump($fetch1);
				$fetch1 = isset($fetch1) ? $fetch1 : null;
				//var_dump($fetch1);
				if( $fetch1 == false ){
					$fetch1 = $this->_default_values();
				}
				$this->options = $fetch1;
				//var_dump($this->options);
				//var_dump($this->_default_values());
				//$this->options = $this->_default_values()

		}


		/**
		 * Class Theme Options Page Function, creates main options page.
		*/
		function _options_page(){

			/*$this->page = add_submenu_page(
				'betheme',
				$this->args['page_title'],
				$this->args['page_title'],
				$this->args['page_cap'],
				$this->args['page_slug'],
				array( &$this, '_options_page_html' )
			);*/
			$this->_enqueue();
			$this->_options_page_html();
			
			//add_action( 'admin_print_styles-'.$this->page, array( &$this, '_enqueue' ) );
		}


		/**
		 * enqueue styles/js for theme page
		*/
		function _enqueue(){

			echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$this->url.'css/options.css">';
			echo '<link rel="stylesheet" type="text/css" media="screen" href="'. XOOPS_URL . '/modules/system/admin/themebuilder1/assets/css/fonts/mfn-icons.css">';
			//echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$this->url.'fonts/mfn-icons.css">';
			//echo 'http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600';
			echo '<link rel="stylesheet" href="admin/themebuilder1/assets/js/colorpicker.css" type="text/css" />';
			echo '<script type="text/javascript" src="admin/themebuilder1/assets/js/colorpicker.js"></script>';
			echo '<script src="'.$this->url.'js/options.js" type="text/javascript"></script>';
			echo '<script>	var upurl = "'. XOOPS_URL .'";</script>';
			echo '<script src="'.$this->url.'/fields/uploadframe/mlib-includes/js/init.js" type="text/javascript"></script>
';
			
			/*wp_register_style( 'mfn-opts-css', $this->url.'css/options.css', array('farbtastic'), time(), 'all');
			wp_enqueue_style( 'mfn-opts-css' );

			// rtl
			if( is_rtl() ) wp_enqueue_style( 'mfn-opts-rtl', $this->url.'css/options-rtl.css', false, time(), 'all');

			wp_enqueue_style( 'mfn-opts-icons', THEME_URI. '/fonts/mfn-icons.css', false, time(), 'all');
			wp_enqueue_style( 'mfn-opts-font', 'http'. mfn_ssl() .'://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600' );

			wp_enqueue_script( 'mfn-opts-js', $this->url.'js/options.js', array('jquery'), time(), true );

			do_action('mfn-opts-enqueue');
			do_action('mfn-opts-enqueue-'.$this->args['opt_name']);*/

			foreach($this->sections as $k => $section){

				if(isset($section['fields'])){

					foreach($section['fields'] as $fieldk => $field){

						if(isset($field['type'])){

							$field_class = 'MFN_Options_'.$field['type'];

							if(!class_exists($field_class)){
								require_once($this->dir.'/fields/'.$field['type'].'/field_'.$field['type'].'.php');
							}

							if(class_exists($field_class) && method_exists($field_class, 'enqueue')){
								$enqueue = new $field_class( '','' );
								//$enqueue->enqueue();
							}

						}

					}

				}

			}

		}


		/**
		 * Download the options file, or display it
		*/
		function _download_options(){

			/*if( ! isset( $_GET['secret'] ) || $_GET['secret'] != md5(AUTH_KEY.SECURE_AUTH_KEY)){
				echo 'probleme MD5';
				exit;
			}
			if( ! isset( $_GET['feed']) ){
				echo 'probleme get feed';
				exit;
			}*/

			//$backup_options = get_option(str_replace('mfn-opts-','',$_GET['feed']));
			$backup_options = $this->options;
			$backup_options['mfn-opts-backup'] = '1';
			//$content = '###'.serialize($backup_options).'###';

			if( isset( $_GET['action'] ) && $_GET['action'] == 'download_options' ){
				header('Content-Description: File Transfer');
				header('Content-type: application/txt');
				header('Content-Disposition: attachment; filename="'.str_replace('mfn-opts-','',$_GET['feed']).'_options_'.date('d-m-Y').'.txt"');
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				echo '###'. serialize($backup_options) .'###';
				exit;
			} else {
				//echo '###'. serialize($backup_options) .'###';
				//exit;
			}
		}

		/**
		 * HTML OUTPUT.
		*/
		function _options_page_html(){

			echo '<div id="mfn-wrapper">';
				echo '<form method="post" action="admin.php?fct=themebuilder1&op=options" enctype="multipart/form-data" id="mfn-form-wrapper">';

					//settings_fields($this->args['opt_name'].'_group');

					$this->options['last_tab'] = isset( $this->options['last_tab'] ) ? $this->options['last_tab'] : false;
					echo '<input type="hidden" id="last_tab" name="'.$this->args['opt_name'].'[last_tab]" value="'.$this->options['last_tab'].'" />';

					echo '<div id="mfn-aside">';
						echo '<div class="mfn-logo">Theme Options - Powered by Muffin Group</div>';

						// menu items -----------------------------------------------
						echo '<ul class="mfn-menu">';
							foreach($this->menu as $k => $menu_item)
							{
								echo '<li class="mfn-menu-li mfn-menu-li-'. $k .'">';
									echo '<a href="javascript:void(0);" class="mfn-menu-a"><span class="icon"></span>'. $menu_item['title']. '</a>';

									if( is_array( $menu_item['sections'] ) )
									{
										echo '<ul class="mfn-submenu">';
										foreach( $menu_item['sections'] as $sub_item ){
											echo '<li id="'.$sub_item.'-mfn-submenu-li" class="mfn-submenu-li">';
												echo '<a href="javascript:void(0);" class="mfn-submenu-a" data-rel="'.$sub_item.'"><span>'. $sub_item .'</span></a>';
											echo '</li>';
										}
										echo '</ul>';
									}

								echo '</li>';
							}

							// import -------------------------------------------------
							echo '<li class="mfn-menu-li mfn-menu-li-import">';
								echo '<a href="javascript:void(0);" class="mfn-menu-a"><span class="icon"></span>Backup & Reset</a>';
								echo '<ul class="mfn-submenu">';
									echo '<li id="import-mfn-submenu-li" class="mfn-submenu-li">';
										echo '<a href="javascript:void(0);" class="mfn-submenu-a" data-rel="import"><span>Backup & Reset</span></a>';
									echo '</li>';
								echo '</ul>';
							echo '</li>';

						echo '</ul>';
						// end: menu items -------------------------------------------

						echo '<div class="mfn-theme-version">Theme Version<span>3.0</span></div>';
						echo '<div class="mfn-link"><a href="admin.php?fct=themebuilder1&op=miseajour">Manual & Support</a></div>';
					echo '</div>';

					echo '<div id="mfn-main">';

						echo '<div class="mfn-header">';
							echo '<input type="submit" name="submit" value="Save Changes" class="mfn-popup-save" />';
						echo '</div>';

						// sections -------------------------------------------------
						echo '<div class="mfn-sections">';

							foreach($this->sections as $k => $section){
								if(isset($section['fields'])){
							
									echo '<div id="'.$k.'-mfn-section'.'" class="mfn-section">';
									echo '<h2>'.$k.'</h2>';
									echo '<table class="form-table">';
	
										foreach($section['fields'] as $field){
											$this->_field_input($field);
										}
	
									echo '</table>';
									echo '<div class="mfn-sections-footer">';
									echo '<input type="submit" name="submit" value="Save Changes" class="mfn-popup-save" tabindex="-1"/>';
									echo '</div>';
									echo '</div>';
								}

							}

							// import -------------------------------------------------
							echo '<div id="import-mfn-section" class="mfn-section">';
								echo '<h3>Import & Export</h3>';

								echo '<div class="mfn-import-wrapper">';

									// export -------------------------------------------------
									echo '<div class="mfn-import-box mfn-import-exp">';
										echo '<h4>Export Options</h4>';
										echo '<p class="description">Here you can copy/download your themes current option settings. Keep this safe as you can use it as a backup should anything go wrong. Or you can use it to restore your settings on this site (or any other site). You also have the handy option to copy the link to yours sites settings. Which you can then use to duplicate on another site.</p>';

										$backup_options = $this->options;
										$backup_options['mfn-opts-backup'] = '1';
										$encoded_options = '###'.serialize($backup_options).'###';
										
										echo '<p>';
											echo '<a href="javascript:void(0);" class="mfn-btn mfn-import-exp-code-btn">Copy</a>&nbsp;';
											//echo '<a href="'. esc_url( add_query_arg(array('feed' => 'mfn-opts-'.$this->args['opt_name'], 'action' => 'download_options', 'secret' => md5(AUTH_KEY.SECURE_AUTH_KEY)), site_url()) ) .'" class="mfn-btn mfn-btn-primary mfn-import-exp-download-btn">Download</a>&nbsp;';
											echo '<a href="?fct=themebuilder1&op=options&feed=mfn-opts-'.$this->args['opt_name'].'&action=download_options&secret='.md5($encoded_options).'" class="mfn-btn mfn-btn-primary mfn-import-exp-download-btn">Download</a>&nbsp;';
											echo '<a href="javascript:void(0);" class="mfn-btn mfn-import-exp-link-btn">Copy Link</a>';
										echo '</p>';

										echo '<textarea class="large-text mfn-import-exp-code" rows="8">';
											print_r($encoded_options);
										echo '</textarea>';
										//echo '<input type="text" class="large-text mfn-import-exp-link" value="'. esc_url( add_query_arg(array('feed' => 'mfn-opts-'.$this->args['opt_name'], 'secret' => md5(AUTH_KEY.SECURE_AUTH_KEY)), site_url()) ) .'" />';
										echo '<input type="text" class="large-text mfn-import-exp-link" value="?fct=themebuilder1&op=options&feed=mfn-opts-'.$this->args['opt_name'].'&secret='. md5($encoded_options).'" />';

									echo '</div>';


									// import -------------------------------------------------
									echo '<div class="mfn-import-box mfn-import-imp">';
										echo '<h4>Import Options</h4>';

										echo '<p>';
											echo '<a href="javascript:void(0);" class="mfn-btn mfn-import-imp-code-btn">Import from file</a>&nbsp;';
											echo '<a href="javascript:void(0);" class="mfn-btn mfn-import-imp-link-btn">Import from URL</a>';
										echo '</p>';

										echo '<div class="mfn-import-imp-code-wrapper">';
											echo '<p class="description">Input your backup file below and hit Import to restore your sites options from a backup.</p>';
											echo '<textarea name="'.$this->args['opt_name'].'[import_code]" class="large-text" rows="8"></textarea>';
										echo '</div>';

										echo '<div class="mfn-import-imp-link-wrapper">';
											echo '<p class="description">Input the URL to another sites options set and hit Import to load the options from that site.</p>';
											echo '<input type="text" name="'.$this->args['opt_name'].'[import_link]" class="large-text" value="" />';
										echo '</div>';

										echo '<p class="mfn-import-imp-action">';
											echo '<input type="submit" id="mfn-opts-import" name="'.$this->args['opt_name'].'[import]" class="mfn-btn mfn-btn-primary" value="Import">';
											echo '<span>WARNING! This will overwrite all existing options, please proceed with caution!</span>';
										echo '</p>';

									echo '</div>';

									// reset -------------------------------------------------
									echo '<div class="mfn-import-box mfn-import-res">';
										echo '<h4>Reset Options</h4>';

										echo '<p class="mfn-import-imp-action step-1">';
											echo '<a href="javascript:void(0);" class="mfn-btn mfn-btn-primary reset-pre-confirm">Reset to Defaults</a>';
											echo '<span class="reset-warning">WARNING! This will overwrite all existing options, please proceed with caution!</span>';
										echo '</p>';

										echo '<p class="mfn-import-imp-action step-2">';
											echo 'Insert security code: <b>r3s3t</b> <input type="text" value="" class="reset-security-code" />';
											echo '<input type="submit" name="'. $this->args['opt_name'] .'[defaults]" value="'. 'Confirm reset ALL options'. '" class="mfn-btn mfn-btn-primary mfn-popup-reset" />';
										echo '</p>';

									echo '</div>';


								echo '</div>';

								echo '<div class="mfn-sections-footer">';
									echo '<input type="submit" name="submit" value="Save Changes" class="mfn-popup-save" />';
								echo '</div>';
							echo '</div>';

						echo '</div>';
						// end: sections --------------------------------------------

					echo '</div>';

					echo '<div class="clear">&nbsp;</div>';
				echo '</form>';
			echo '</div>';
		}


		/**
		 * Field HTML OUTPUT +
		 */
		function _field_input( $field ){

			if( isset( $field['type'] ) ){

				$field_class = 'MFN_Options_' .$field['type'];

				
				if( ! class_exists( $field_class ) ){
					require_once( $this->dir .'/fields/'. $field['type'] .'/field_'. $field['type'] .'.php' );
				}
				if( class_exists( $field_class ) ){

					$value = ( isset( $this->options[$field['id']] ) ) ? $this->options[$field['id']] : '';
					//echo "<tr>";
					
					
					
					
					//var_dump($field);
					$class = '';
	
	                if ( ! empty( $field['class'] ) ) {
	                        $class = ' class="' . $field['class'] . '"';
	                }
	
	                echo "<tr{$class}>";
	
	                if ( ! empty( $field['label_for'] ) ) {
	                        echo '<th scope="row"><label for="' . $field['label_for'] . '">' . $field['title'] . '</label></th>';
	                } else {
	                        echo '<th scope="row">' . $field['title'] . '</th>';
	                }
					
					
					
					
					//echo '<th scope="row">' . $field['title'] . '</th>';
					echo '<td>';
					$render = new $field_class( $field, $value, $this->args['opt_name'] );
					$render->render();
					echo '</td>';
					echo '</tr>';

				}else{echo 'noooooo';}

			}else{echo 'sssss';}

		}

	}

}
