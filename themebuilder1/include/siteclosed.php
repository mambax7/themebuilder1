<?php
if (isset($_POST['submitextra']) && $_POST['submitextra'] == 'Submit'){
	global $xoopsDB;
	$meta_arr = $_POST['mfn-items'];
	$mod = serialize($meta_arr);

$value['html'] = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>'.$meta_arr['ics_meta_title'].'</title>

    <meta name="description" content='.$meta_arr['ics_meta_description'].' />
    <meta name="keywords" content='.$meta_arr['ics_meta_keywords'].' />
    <meta name="author" content="wajdi xoops olivee" />

    <!-- Mobile specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Apple Touch Icons -->
    <link rel="apple-touch-icon" sizes="144x144" href="images/icons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" href="images/icons/apple-touch-icon.png">

    <!-- Favicon -->
    <link rel="shortcut icon" href='.$meta_arr['ics_favicon'].'>

    <!-- Google fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">

    <!-- Stylesheets -->
    <link href="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/css/jquery-ui.css}>" rel="stylesheet">
    <link href="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/css/bootstrap.css}>" rel="stylesheet">
    <link href="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/css/font-awesome.min.css}>" rel="stylesheet">
    <link href="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/css/owl.carousel.css}>" rel="stylesheet">
    <link href="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/css/animate.css}>" rel="stylesheet">
    <link href="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/css/global.css}>" rel="stylesheet">';
	if(isset($meta_arr['ics_layout']) && $meta_arr['ics_layout'] ='2'){ 
		$value['html'] .= '<link href="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/css/ics-layout-2.css}>" rel="stylesheet">';
	}
	$value['html'] .= '
    <link href="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/css/ics_front_end.css}>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style>';
        
            if($meta_arr['ics_bk_type']=='solid_color'){
                

                    $value['html'] .= 'body{
                      background-color : '.$meta_arr['ics_background_select'].' !important;
                    } ';

                
            }elseif($meta_arr['ics_bk_type']=='slides_with_effect'){
            
			$value['html'] .= '
                #supersized img{
                    -webkit-animation: spinBackground 100s linear infinite;
                    -moz-animation: spinBackground 100s linear infinite;
                    animation: spinBackground 100s linear infinite;
                }
				';
         
            }elseif($meta_arr['ics_bk_type']=='parallax'){
			///PARALAX	
            	$value['html'] .= '
				
				.ism-parallax {
					left: -25%;
					top: -25%;
					overflow: hidden;
					margin: 0;
					padding: 0;
					z-index: -999999;
					position: fixed;
					width: 150%;
					height: 150%;
					background-image: url('.$meta_arr['ics_background_img'].');
					-webkit-background-size: cover;
					background-size: cover;
				}';
            
            }
        $overlay = 'background: rgba(0,0,0,0.3)';
        if(isset($meta_arr['ics_bk_pn']) && $meta_arr['ics_bk_pn']!='' && $meta_arr['ics_bk_pn']!='none'){
			$overlay .= ' url(<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/images/patterns/pattern_2.png}>) repeat;';
		}
        $value['html'] .= '
        .overlay{
            '.$overlay.'
        }
		.overlay-top-left, .overlay-top-right, .special-overlay{
			'.$overlay.'
		}';
        
            if(isset($meta_arr['ics_general_color']) && $meta_arr['ics_general_color']!=''){
			
			    $value['html'] .= "
              ::-moz-selection {
                  background: ".$meta_arr['ics_general_color'].";
              }
              ::selection {
                  background: ".$meta_arr['ics_general_color'].";
              }
              p a:hover {
                  border-color: ".$meta_arr['ics_general_color'].";
              }
              .modal-header .close {
                  color: ".$meta_arr['ics_general_color'].";
                  border: solid 1px ".$meta_arr['ics_general_color'].";
              }
              .modal h4 {
              	color: ".$meta_arr['ics_general_color'].";
              }
              .modal p a:hover {
                  border-color: ".$meta_arr['ics_general_color'].";
              }
              .site-logo {
              	background: ".$meta_arr['ics_general_color'].";
              }
              .tooltip-show {
                  background: ".$meta_arr['ics_general_color'].";
              }
              .tooltip-show .tooltip-arrow {
                  border-right-color: ".$meta_arr['ics_general_color'].";
              }
              nav a:hover {
                  color: ".$meta_arr['ics_general_color'].";
              }
              nav .active {
                  color: ".$meta_arr['ics_general_color'].";
              }
              .nav-container:hover .nav-toggle {
                  color: ".$meta_arr['ics_general_color'].";
              }
              .nav-toggle.active {
                   color: ".$meta_arr['ics_general_color'].";
              }
              #subscribe-email {
                  outline-color: ".$meta_arr['ics_general_color'].";
              }
              #subscribe-submit:hover {
                  color: ".$meta_arr['ics_general_color'].";
              }
              .contact-form input, .contact-form textarea {
                  outline-color: ".$meta_arr['ics_general_color'].";
              }
              .btn-contact:hover {
                  color: ".$meta_arr['ics_general_color'].";
              }
              .social-media a:hover {
                  color: ".$meta_arr['ics_general_color'].";
              }
              .circleG {
                  background-color: ".$meta_arr['ics_general_color'].";
              }
			  
              nav li a:hover {
                  color: ".$meta_arr['ics_general_color'].";
              }
              @media (min-width: 768px) and (max-width: 991px) {
                  .tooltip-show .tooltip-arrow {
                      border-bottom-color: ".$meta_arr['ics_general_color'].";
              	}
			  }
			  @media (max-width: 767px) {
              	nav li a:hover {
                 	 background: ".$meta_arr['ics_general_color']." !important;
					 color:#fff;
              	}
				nav li a{
				  color: ".$meta_arr['ics_general_color'].";
			    }
              }
			  
              .tooltip-show .tooltip-arrow {
                  border-bottom-color: ".$meta_arr['ics_general_color'].";
              }
    ";



			}
        	
            // Social Media Style
            //$value['html'] .= ' ics_sm_style_header($meta_arr)';  
			
			if(isset($meta_arr['ics_custom_css']) && $meta_arr['ics_custom_css']!=''){  
			$value['html'] .= ''.$meta_arr['ics_custom_css'].' ';     }
        $value['html'] .= '
    </style>
    <script>
        var subscribe_msg = '.stripslashes($meta_arr['ics_subscribe_msg']).';
        var send_msg_succes = '.stripslashes($meta_arr['ics_contact_s_msg']).';
        //var subscribe_type = '.$meta_arr['ics_subscribe_type'].';
        //var mailchimp_api = '.$meta_arr['ics_mailchimp_api'].';
        //var mailchimp_id_list = '.$meta_arr['ics_mailchimp_id_list'].';
        var nav_effect = '.$meta_arr['ics_change_page_effect'].';
    </script>
</head>
<body class="ics-layout-'.$meta_arr['ics_layout'].'">

    <!-- Begin preloader -->
    <div id="preloader">
		<div id="status">
			<div id="circleG">
				<div id="circleG_1" class="circleG"></div>
				<div id="circleG_2" class="circleG"></div>
				<div id="circleG_3" class="circleG"></div>
			</div>
		</div>
    </div>
    <!-- End preloader -->


    <div class="overlay"></div><!-- /.overlay -->';
	 if($meta_arr['ics_layout'] == 2){
	$value['html'] .= '<div class="overlay-top-left"></div>
	<div class="overlay-top-right"></div>
	'; } 


	
	
	
	
	
	
	
	
	
	$value['html'] .= '
    <div class="wrap">
        <div class="container-full">';
        
  
	        if($meta_arr['ics_bk_type']=='parallax'){
	        	
	        		$value['html'] .= '<div class="ism-parallax" data-parallaxify-range-x="80" data-parallaxify-range-y="80"></div>';
	        
	        }
				if($meta_arr['ics_bk_type']=='video' && isset($meta_arr['ics_sound_on']) && $meta_arr['ics_sound_on']==1){
					$value['html'] .= '
					<div class="ics_video_controllers">
						<div class="tubular-play ics_v_c">
							<i class="ics-icon-fa ics-play"></i>
						</div>
						<div class="tubular-pause ics_v_c">
							<i class="ics-icon-fa ics-pause"></i>
						</div>
						<div class="tubular-volume-up ics_v_c">
							<i class="ics-icon-fa ics-volume-up"></i>
						</div>
						<div class="tubular-volume-down ics_v_c">
							<i class="ics-icon-fa ics-volume-down"></i>
						</div>
						<div class="tubular-mute ics_v_c">
							<i class="ics-icon-fa ics-mute"></i>
						</div>
					</div>';
				
				}
        $value['html'] .= '
            <div class="row">
                <header role="banner">
                    <div class="col-xs-6 col-sm-4">
                        <a href="javascript:void(0)" class="site-logo">';
                             if($meta_arr['ics_logo']!=''){ 
							 $value['html'] .= '<img src="'.$meta_arr['ics_logo'].'" alt="Logo"  style="max-height: '.$meta_arr['ics_logo_height'].'px;" class="img-responsive" />';
							 }
							 $value['html'] .= '
                        </a><!-- /.site-logo -->
                    </div>
                    <div class="col-xs-6 col-sm-8">
                        <div class="nav-container">';
                             if($meta_arr['ics_about_page_enable']==1 || $meta_arr['ics_contact_page_enable']==1){
								$value['html'] .= '<div class="nav-toggle"><i class="fa-ics fa-bars-ics"></i></div>';
							 } 
							 $value['html'] .= '
                            <nav role="navigation">
                                <ul role="menu">';
                                    
                                    	$i= 0;
                                        if($meta_arr['ics_about_page_enable']==1 || $meta_arr['ics_contact_page_enable']==1){
											$value['html'] .= '
                                            <li>
                                                <a href="javascript:void(0)" class="active" id="a_menu_'.$i.'">'.stripslashes($meta_arr['ics_home_label']).'</a>
                                            </li>';
                                        
                                        $i++;
                                        }
                                    
                                    
                                        if($meta_arr['ics_about_page_enable']==1){
                                        $value['html'] .= '
                                            <li>
                                                <a href="javascript:void(0)" id="a_menu_'.$i.'" >'.stripslashes($meta_arr['ics_about_label']).'</a>
                                            </li>';
                                        
                                        $i++;
                                        }
                                    
                                    
                                        if($meta_arr['ics_contact_page_enable']==1){
                                        $value['html'] .= '
                                            <li>
                                                <a href="javascript:void(0)" id="a_menu_'.$i.'">'.stripslashes($meta_arr['ics_contact_label']).'</a>
                                            </li>';
                                        
                                        }
                            $value['html'] .= '        
                                </ul>
                            </nav>
                        </div><!-- /.nav-container -->
                    </div>
                </header>
                <div class="clearfix"></div>
            </div>
            <div class="content-holder">
                <main role="main" class="clearfix">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-bordered">
                            <div class="tag-line">
                                <h1 class="hm-1">'.stripslashes($meta_arr['ics_title_1']).'</h1>
                                <h2 class="hm-2">'.stripslashes($meta_arr['ics_title_2']).'</h2>
                                <h2 class="hm-3">'.stripslashes($meta_arr['ics_title_3']).'</h2>
                                <h3 class="hm-4">'.stripslashes($meta_arr['ics_subtitle']).'</h3>
                            </div><!-- /.tag-line -->';
                            
                                if($meta_arr['ics_enable_more_info']==1){
                                  $value['html'] .= '
                            <div class="util">
                                <a class="call-at" data-toggle="modal" data-target="#myModal">
                                    <i class="fa-ics fa-bullhorn-ics"></i>
                                </a>
                                <span class="tooltip-show">
                                    '.stripslashes($meta_arr['ics_more_info_text']).'
                                    <span class="tooltip-arrow"></span>
                                </span>
                            </div>';
                                  
                                }
                            
$value['html'] .= '
                            <!-- Modal starts -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">';
                                            	 if (isset($meta_arr['ics_title_more_info'])){
                                            		$value['html'] .= ''.htmlspecialchars(stripslashes($meta_arr['ics_title_more_info'])).'';
                                            	 }else{ 
                                            		$value['html'] .= 'More info';
                                            	 }
                                      $value['html'] .= '      </h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                '.htmlspecialchars_decode(stripslashes($meta_arr['ics_more_info'])).'
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Modal ends -->
                   </div>
                    <div class="col-md-7">
                        <div class="page-panels">
                            <!-- Home panel starts -->
                            <section class="pnl-1">
                                <div class="countdown">
								
								
								';
                           							
									$meta_arr["ics_end_date"] = str_replace('/', '-', $meta_arr["ics_end_date"]);
		                            $meta_arr["ics_end_date"] = strtotime($meta_arr["ics_end_date"]);
									$meta_arr["ics_end_date"] = date("Y-m-d", $meta_arr["ics_end_date"]);	
																				
                                	$end_time = strtotime($meta_arr["ics_end_date"].' '.$meta_arr["ics_end_time"]);
                                	$current_time = time();
                                	if($end_time<=$current_time) {//if out of date reset date&time variables
                                		$meta_arr["ics_end_date"] = '';
                                		$meta_arr["ics_end_time"] = '';
                                	}
                                    if($meta_arr['ics_count_down_type']=='circles' && $meta_arr["ics_end_date"]!='' && $meta_arr["ics_end_time"]!=''){
                                        //COUNTDOWN WITH CIRCLES
                                    $value['html'] .= '
                                        <input class="knob days"  data-readOnly="true" data-insidelabel="'.$meta_arr['ics_days_word'].'" data-width="150" data-angleOffset="180" data-fgColor="#fff" data-skin="tron" data-thickness=".1" value="">
    									<input class="knob hours" data-max="24" data-readOnly="true" data-insidelabel="'.$meta_arr['ics_hours_word'].'"  data-width="150" data-angleOffset="180" data-fgColor="#fff" data-skin="tron" data-thickness=".1" value="">
                                        <input class="knob minutes" data-max="60" data-readOnly="true" data-insidelabel="'.$meta_arr['ics_minutes_word'].'" data-width="150" data-angleOffset="180" data-fgColor="#fff" data-skin="tron" data-thickness=".1" value="">
    									<input class="knob second" data-max="60" data-readOnly="true" data-insidelabel="'.$meta_arr['ics_seconds_word'].'" data-width="150" data-angleOffset="180" data-fgColor="#fff" data-skin="tron" data-thickness=".1" value="">
                                    ';
                                    }else{
                                        //COUNTDOWN WITH DIGITS
                                    $value['html'] .= '
                                        <div class="col-xs-6 col-sm-3 col-md-3 text-center">
                                            <div class="count-container">
                                                <span class="days"></span>
                                                <p class="days_ref"></p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-3 col-md-3 text-center">
                                            <div class="count-container">
                                                <span class="hours"></span>
                                                <p class="hours_ref"></p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-3 col-md-3 text-center">
                                            <div class="count-container">
                                                <span class="minutes"></span>
                                                <p class="minutes_ref"></p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-3 col-md-3 text-center">
                                            <div class="count-container">
                                                <span class="seconds"></span>
                                                <p class="seconds_ref"></p>
                                            </div>
                                        </div>';
                                    
                                    }
                                $value['html'] .= '
                                </div>
                            </section>
                            <!-- Home panel ends -->';
							
							if($meta_arr['ics_about_page_enable']==1){
							$value['html'] .= '
                            <!-- Company panel starts -->
                            <section class="pnl-2">
                                <div class="col-offset">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3>'.$meta_arr['ics_about_title'].'</h3>
                                    </div>
                                    <p>'.htmlspecialchars_decode(stripslashes($meta_arr['ics_about_text'])).'</p>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div id="owl-slider" class="owl-carousel">';
                                            
                                                $icons = array( 'fa-camera-ics',
                                                                'fa-bolt-ics',
                                                                'fa-users-ics',
                                                                'fa-circle-o-ics',
                                                                'fa-inbox-ics',
                                                                'fa-desktop-ics'
                                                                );
                                                foreach($icons as $icon){
                                                    if($meta_arr[$icon.'-enable']==1){
                                                      $value['html'] .= '
                                                     <div class="item">
                                                        <div class="slider-icon-container"><i class="fa-ics '.$icon.'"></i></div>
                                                        <p>'.stripslashes($meta_arr[$icon.'-text']).'</p>
                                                     </div>';
                                                      
                                                    }
                                                }
                                            $value['html'] .= '
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </section>
                            <!-- Company panel ends -->
							';
								} if($meta_arr['ics_contact_page_enable']==1){
								$value['html'] .= '
                            <!-- Contact panel starts -->
                            <section class="pnl-3">
                                <div class="col-offset">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h3>'.stripslashes($meta_arr['ics_contact_title']).'</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <form method="post" action="" class="contact-form">
                                            <div class="col-md-6">';
                                            
                                                $placeholder = stripslashes($meta_arr['ics_contact_name']);
                                                if($placeholder!='') $placeholder .= ' *';
                                            $value['html'] .= '
                                                <input type="text" name="name" id="ics_name" placeholder="'.$placeholder.'" class="txt-name">';
                                            
                                                $placeholder = stripslashes($meta_arr['ics_contact_email']);
                                                if($placeholder!='') $placeholder .= ' *';
                                            $value['html'] .= '
                                                <input type="text" name="email" id="ics_contact-email" placeholder="'.$placeholder.'" class="txt-email">
                                            </div>
                                            <div class="col-md-6">';
                                            
                                                $placeholder = stripslashes($meta_arr['ics_contact_message']);
                                                if($placeholder!='') $placeholder .= ' *';
                                            $value['html'] .= '
                                                <textarea rows="4" name="message" cols="60" id="ics_message" placeholder="'.$placeholder.'" class="txt-message"></textarea>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-sm-6">
                                                <button id="contact-submit" class="btn-contact"><i class="fa-ics fa-envelope-o-ics"></i>'.stripslashes($meta_arr['ics_contact_submit']).'</button>
                                                <div class="contact-error-field"></div>
                                                <div class="contact-message"></div>
                                            </div>
                                        </form><!-- /.contact-form -->
                                    </div>
                                </div>
                            </section>';
							
								}
							$value['html'] .= '
                            <!-- Contact panel ends -->
                        </div>
                    </div>
                    </div>
                </main>
            </div>
        </div>
    </div>';
	
	
	
	
	
	
	
	
	
	
	$value['html'] .= '
    <!-- Footer starts -->
    <footer role="contentinfo">
        <div class="footer-bg"></div>
        <div class="container-full">
        	
            <div class="row">
                <div class="col-sm-12">';
				  if($meta_arr['ics_enable_subscribe']==1){
				  $value['html'] .= '
                    <form method="post" action="" class="subscribe-form">
                        <p>'.$meta_arr['ics_subscribe_text'].'</p>
                        <input type="email" name="email" id="subscribe-email" placeholder="'. stripslashes($meta_arr['ics_subscribe_label']).'" required="">
                        <button id="subscribe-submit">'.stripslashes($meta_arr['ics_subscribe_bttn']).'</button>
                        <div class="subscribe-error-field"></div>
                        <div class="subscribe-message"></div>
                    </form><!-- /.subscribe-form -->';
				 }

				 $value['html'] .= '
                    <div class="social-media">
                        <p>'.stripslashes($meta_arr['ics_smb_text']).'</p>
                        <ul>';
						
						  /******************* SOCIAL MEDIA ICONS *******************/
			$arr = array(
			'ics_facebook' => 'facebook',
			'ics_twitter' => 'twitter',
			'ics_googleplus' => 'google-plus',
			'ics_linkedin' => 'linkedin',
			'ics_instagram' => 'instagram',
			'ics_pinterest' => 'pinterest',
			'ics_youtube' => 'youtube',
			'ics_vk' => 'vk',
			'ics_vimeo' => 'vimeo',
			'ics_dribbble' => 'dribbble',
			);
	                       foreach($arr as $k=>$v){
	                        		if(isset($meta_arr[$k]) && $meta_arr[$k]!=''){
	                        			$value['html'] .= '
	                        				<li><a href="'.$meta_arr[$k].'" target="_blank"><i class="fa-ics fa-'.$v.'-ics"></i></a></li>
	                        			 ';
	                        		}
	                        	}
	                      
	                        	
	                    $value['html'] .= '
                        </ul>
               
                    </div><!-- /.social-media -->
                    
                     <small>'.stripslashes($meta_arr['ics_copyright']).'</small>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer ends -->

    <!-- Scripts -->
    <script src="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/js/vendor/jquery-1.11.0.min.js}>"></script>
    <script src="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/js/jquery-ui.min.js}>"></script>
    <script src="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/js/supersized.3.2.7.min.js}>"></script>
    <script src="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/js/jquery.countdown.js}>"></script>
    <script src="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/js/owl.carousel.min.js}>"></script>
    <script src="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/js/jquery.fittext.js}>"></script>
    <script src="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/js/retina-1.1.0.min.js}>"></script>
    <script src="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/js/bootstrap.min.js}>"></script>
        ';
            if($meta_arr['ics_count_down_type']=='circles'){
                $value['html'] .= '<script src="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/js/jquery.knob.js}>"></script>';
            }
$value['html'] .= '    
    <!--[if lte IE 9]>
		    <script src="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/js/jquery.placeholder.js}>"></script>
		    <script type="text/javascript">$("input, textarea").placeholder();</script>
	    <![endif]-->
    ';
        if($meta_arr['ics_bk_type']=='video'){
				$value['html'] .= '
            	<script src="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/js/jquery.tubular.1.0.js}>" type="text/javascript"></script>
				';
        }elseif($meta_arr['ics_bk_type']=='parallax'){
				$value['html'] .= '
        		<script src="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/js/jquery.parallaxify.min.js}>" type="text/javascript"></script>
				';
        }
    $value['html'] .= '
    <script>
    //JS VIDEO BACKGROUND
    ';
        if($meta_arr['ics_bk_type']=='video'){
				if(isset($meta_arr['ics_sound_on']) && $meta_arr['ics_sound_on']==1){
				$sound =  'false';
				}else{ 
				$sound =  'true';
				}
				$value['html'] .= "
                   $(document).ready(function() {
                        $('.wrap').tubular({videoId: '".$meta_arr['ics_video_bk']."', mute: ".$sound."}); // where idOfYourVideo is the YouTube ID.
                   });
				";
           

        }elseif($meta_arr['ics_bk_type']=='parallax'){
            	///PARALAX	
            $value['html'] .= "
				$(function(){
					$(document).ready(function() {
						$.parallaxify({
							positionProperty: 'transform',
							responsive: true,
							motionType: 'natural',
							mouseMotionType: 'performance',
							motionAngleX: 70,
							motionAngleY: 70,
							alphaFilter: 0.5,
							adjustBasePosition: true,
							alphaPosition: 0.025,
						});
					});
				});
			";
        	
        }
    
    $until = $meta_arr['ics_end_date']."' + ' ' + '".$meta_arr['ics_end_time'];
	
    //THE COUNTDOWN
	if($meta_arr["ics_end_date"] != '') { 
	$value['html'] .= "
        until_time = '$until';
        until_timestamp = '$end_time';
		";
    } else {
	$value['html'] .= "
	    until_time = '01/01/2020';
	";	
	} 	

        
             if($meta_arr['ics_count_down_type']=='circles'){
             	if($meta_arr["ics_end_date"]!='' && $meta_arr["ics_end_time"]!=''){
               
               //COUNTDOWN WITH CIRCLES
$value['html'] .= "
        		function indeed_current_date(){
                    var date = new Date();
                    //var utc = date.getTime() + (date.getTimezoneOffset() * 60000);
					var utc = date.getTime();
                    var new_date = new Date(utc);// + (3600000))
                    return new_date;
        		}

                function indeed_countdown() {
                    //var target_date = new Date(window.until_time); // set target date
					var d = new Date();
					d.setTime(until_timestamp*1000);
					target_date = d;                    
                        current_date = indeed_current_date(); // get fixed current date

                    var difference = target_date - current_date;
                    
                    if (difference < 0) {
                        clearInterval(interval);
                        if (callback && typeof callback === 'function') callback();
                        return;
                    }
                    
                   
                    var _second = 1000,
                        _minute = _second * 60,
                        _hour = _minute * 60,
                        _day = _hour * 24;
                    var days = Math.floor(difference / _day),
                        hours = Math.floor((difference % _day) / _hour),
                        minutes = Math.floor((difference % _hour) / _minute),
                        seconds = Math.floor((difference % _minute) / _second);
                        days = (String(days).length >= 2) ? days : '0' + days;
                        hours = (String(hours).length >= 2) ? hours : '0' + hours;
                        minutes = (String(minutes).length >= 2) ? minutes : '0' + minutes;
                        seconds = (String(seconds).length >= 2) ? seconds : '0' + seconds;
                    var ref_days = (days === 1) ? 'day' : 'Days',
                        ref_hours = (hours === 1) ? 'hour' : 'Hours',
                        ref_minutes = (minutes === 1) ? 'minute' : 'Minutes',
                        ref_seconds = (seconds === 1) ? 'second' : 'Seconds';
        			$('.second').val(seconds).trigger('change');
        			$('.minutes').val(minutes).trigger('change');
        			$('.hours').val(hours).trigger('change');
                    $('.days').val(days).trigger('change');
        		}
        		var interval = setInterval(indeed_countdown, 0);
                $(function($) {

                    $('.knob').knob({
                        change : function (value) {
                            //console.log('change : ' + value);
                        },
                        release : function (value) {
                            //console.log(this.$.attr('value'));
                            //console.log('release : ' + value);
                        },
                        cancel : function () {
                            //console.log('cancel : ', this);
                        },
                        /*format : function (value) {
                            return value + '%';
                        },*/
                        draw : function () {

                            // 'tron' case
                            if(this.$.data('skin') == 'tron') {

                                this.cursorExt = 0.3;

                                var a = this.arc(this.cv)  // Arc
                                    , pa                   // Previous arc
                                    , r = 1;

                                this.g.lineWidth = this.lineWidth;

                                if (this.o.displayPrevious) {
                                    pa = this.arc(this.v);
                                    this.g.beginPath();
                                    this.g.strokeStyle = this.pColor;
                                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
                                    this.g.stroke();
                                }

                                this.g.beginPath();
                                this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
                                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
                                this.g.stroke();

                                this.g.lineWidth = 2;
                                this.g.beginPath();
                                this.g.strokeStyle = this.o.fgColor;
                                this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                                this.g.stroke();

                                return false;
                            }
                        }
                    });
                });
                ";
				}//end of not empty date & time
             }//end of circles
            else{
             
								 //COUNTDOWN WITH DIGITS
							$value['html'] .= "
							$('.countdown').downCount({
								date : until_time,
								until_timestamp : '$end_time'
							});
							";

            }
        
$value['html'] .= '
$(function () {
    "use strict";
    ';
        if($meta_arr['ics_bk_type']=='single_image'){
$value['html'] .= "    
      $.supersized({
          slides: [{ image: '".$meta_arr['ics_background_img']."' }]
      });
    ";
        }elseif($meta_arr['ics_bk_type']=='slides' || $meta_arr['ics_bk_type']=='slides_with_effect'){
                    // background
					$value['html'] .= "
                    $.supersized({

                		// Functionality
                		slide_interval          :   4000,		// Length between transitions
                		transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                		transition_speed		:	700,		// Speed of transition

                		// Components
                		slides 					:  	[			// Slideshow Images

                                    {image : 'http://demoics.wpindeed.com/wp/wp-content/uploads/2015/02/beauty-fashion-model-girl-with-hat-wide.jpg'},
									{image : 'http://stage1.indeed.azzaro.biz/wp-content/uploads/2014/07/4476-digital-art-background-wallpaper-1.jpg'}
									
                             
                  									]
                	});
            ";
        }
$value['html'] .= "    
});
";

		$time_arr = array( 'ics_days_word', 
						   'ics_day_word', 
						   'ics_hours_word', 
						   'ics_hour_word', 
						   'ics_minutes_word', 
						   'ics_minute_word',
						   'ics_seconds_word',
						   'ics_second_word',
						 );
		foreach($time_arr as $val){
			if(isset($val)){
				$value['html'] .= "".$val." = '".$meta_arr[$val]."'; ";

			}
		}
	$value['html'] .= '
    </script>
    <script src="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/js/global.js}>"></script>
    <script src="<{xoImgUrl /themes/themebuilder/extra_theme_templete/siteclosed/files/js/front_end.js}>"></script>

</body>
</html>

';



//var_dump($mod);



//////////		
		
		
		
		
		
	$sqlr = "UPDATE " . $xoopsDB -> prefix( 'config_theme' ) . " SET conf_name ='system_siteclosed', conf_value='$mod' WHERE conf_name = 'system_siteclosed'";
	if ( $resultr = $xoopsDB -> queryF( $sqlr ) ) {																
		$message = ""._AM_SYSTEM_THEMEBUILDER_css_EXTRA_modifie."";
		$src1 = dirname(__FILE__).'\themebuilder';
		$dst1 = str_replace('modules\system\admin\themebuilder1\include\themebuilder', 'themes\themebuilder1', $src1);
		$message .= ' <br>template enregistré avec succes';
		$fichierthemehtmlamodifier = $dst1.'\modules\system\system_siteclosed.html';
		
		$f = @fopen($fichierthemehtmlamodifier, 'w+');
		$flag = false;
		if ($f) {
			fputs($f, $value['html']."\n");
			$message .= ' <br>system_siteclosed.html est a jour';
			$flag = true;
			@fclose($f);
		}else{
			$message .= ' <br>probleme avec fopen system_siteclosed.html';
		}
		if ($flag = true){

			function del_folder_add_index($folder){ //$folder=Path to folder  
				$dir = opendir($folder);  
				while ($file = readdir($dir)){  
					if( ($file !='.') && ($file !='..') && ($file !='index.html') ){  
						if (is_dir($folder.$file)){
							del_folder_add_index($folder.$file);
						}  
						unlink($folder.$file);
						//echo $folder.$file.'<br>';
					}
				}
				closedir($dir); 
			}
				
			//del_folder_add_index(XOOPS_VAR_PATH."/caches/smarty_cache/");  
			del_folder_add_index(XOOPS_VAR_PATH."/caches/smarty_compile/");
			$message .= ' <br>smarty_compile cache is deleted';	
		}

	}else{
		$message .= ""._AM_SYSTEM_THEMEBUILDER_ProblememodificationCSSExtra."";
	}	
		//echo $message;
		redirect_header("admin.php?fct=themebuilder1&op=ThemeBuilder&action=modpagebuilder&pageid=sytem_siteclosed", 5, $message);
		exit();		
}







	$arr = array(
		array(
			'id' 		=> 'ics_enable',
			'type' 		=> 'switch',
			'title' 	=> 'ics_enable',
			'sub_desc'	=> 'If you want to check how is looking the Coming Soon page, logOut or try the website into another browser/window.',
			'desc' 		=> 'Enable Coming Soon Page',
			'options' 	=> array('1' => 'On','0' => 'Off'),
		),

		array(
			'id' 		=> 'ics_layout',
			'type' 		=> 'select',
			'title' 	=> 'ics_layout',
			'sub_desc'	=> 'Important: ffffff.',
			'desc' 		=> 'Layout Options',
			'options' 	=> array(
				'1' 			=> 'With Special CountDown',
				'2' 			=> 'Middle Magic Title',
			),
		),	
		
				array(
			'id' 		=> 'ics_bk_type',
			'type' 		=> 'select',
			'title' 	=> 'ics_bk_type',
			'sub_desc'	=> 'Important: ffffff.',
			'desc' 		=> 'Layout Options',
			'options' 	=> array(
				'solid_color' 			=> 'solid_color',
				'parallax' 			=> 'parallax',
				'video' 			=> 'video',
				'slides' 			=> 'slides',
				'slides_with_effect' 			=> 'slides_with_effect',
				'single_image' 			=> 'single_image',
			),
		),

        array(
			'id' 		=> 'ics_general_color',
			'type' 		=> 'select',
			'title' 	=> 'ics_general_color',
			'sub_desc'	=> 'Important: eeeee.',
			'desc' 		=> 'Change Page Color',
			'options' 	=> array('#0a9fd8' => '#0a9fd8', '#38cbcb' => '#38cbcb', '#27bebe' => '#27bebe', '#0bb586' => '#0bb586', '#94c523' => '#94c523', '#6a3da3' => '#6a3da3', '#f1505b' => '#f1505b', '#ee3733' => '#ee3733', '#f36510' => '#f36510', '#f8ba01' => '#f8ba01'
			
			
			),
		),

        array(
			'id' 		=> 'ics_change_page_effect',
			'type' 		=> 'select',
			'title' 	=> 'ics_change_page_effect',
			'sub_desc'	=> 'Important: eeeee.',
			'desc' 		=> 'Change Page Effect',
			'options' 	=> array(
                                                                 'fadeIn' => 'FadeIn',
                                                                 'blind' => 'Blind',
                                                                 'clip' => 'Clip',
                                                                 'drop' => 'Drop',
                                                                 'explode' => 'Explode',
                                                                 'fold' => 'Fold',
                                                                 'puff' => 'Puff',
                                                                 'slide' => 'Slide Left',
                                                                 'slide_right' => 'Slide Right',
                                                                 'slide_up' => 'Slide Up',
                                                                 ),
		),	


		array(
			'id' 		=> 'ics_meta_title',
			'type'		=> 'text',
			'title' 	=> 'ics_meta_title',
			'sub_desc'	=> 'Section Padding Bottom',
			'desc' 		=> ' Meta Settings Meta Title',
			'class' 	=> 'small-text',
			'std' 		=> 'ics_meta_title TITRE',
		),

		array(
			'id' 		=> 'ics_meta_keywords',
			'type'		=> 'text',
			'title' 	=> 'ics_meta_keywords',
			'sub_desc'	=> 'KeyWords',
			'desc' 		=> ' Meta Settings Meta KeyWords',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_meta_keywordsFDFFDFFD',
		),
		
		array(
			'id' 		=> 'ics_meta_description',
			'type'		=> 'textarea',
			'title' 	=> 'ics_meta_description',
			'sub_desc'	=> 'Description',
			'desc' 		=> ' Meta Settings Meta Description',
			'class' 	=> 'small-text',
			'std' 		=> 'ics_meta_description FDFBVDF VDFV SDKFJ V',
		),

array(
			'id' 		=> 'ics_custom_css',
			'type'		=> 'textarea',
			'title' 	=> 'ics_custom_css',
			'sub_desc'	=> 'Custom CSS',
			'desc' 		=> ' Custom CSS',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),							  

array(
			'id' 		=> 'ics_end_date',
			'type'		=> 'text',
			'title' 	=> 'ics_end_date',
			'sub_desc'	=> 'End date:',
			'desc' 		=> ' End date:',
			'class' 	=> 'small-text',
			'std' 		=> '20-06-2018',
		),
		
		array(
			'id' 		=> 'ics_end_time',
			'type'		=> 'text',
			'title' 	=> 'ics_end_time',
			'sub_desc'	=> 'End Time:',
			'desc' 		=> ' End Time:',
			'class' 	=> 'small-text',
			'std' 		=> '15:30',
		),

		array(
			'id' 		=> 'ics_auto_turnoff',
			'type' 		=> 'select',
			'title' 	=> 'ics_auto_turnoff',
			'sub_desc'	=> 'When 54545.',
			'desc' 		=> 'Auto Turn Off:',
			'options' 	=> array(
				'1' 			=> 'oui',
				'0' 			=> 'non',
			),
		),					
							

		array(
			'id' 		=> 'ics_count_down_type',
			'type' 		=> 'select',
			'title' 	=> 'ics_count_down_type',
			'sub_desc'	=> 'When fsdfsdf',
			'desc' 		=> 'CountDown Type:',
			'options' 	=> array(
				'digits' 			=> 'digits',
				'circles' 			=> 'circles',
			),
		),	

array(
			'id' 		=> 'ics_days_word',
			'type'		=> 'text',
			'title' 	=> 'ics_days_word',
			'sub_desc'	=> 'Time Labels Days:',
			'desc' 		=> ' Days:',
			'class' 	=> 'small-text',
			'std' 		=> 'DAYSS',
		),

array(
			'id' 		=> 'ics_day_word',
			'type'		=> 'text',
			'title' 	=> 'ics_day_word',
			'sub_desc'	=> 'Available only for Digits CountDown Type',
			'desc' 		=> ' Day:',
			'class' 	=> 'small-text',
			'std' 		=> 'DAY',
		),		

array(
			'id' 		=> 'ics_hours_word',
			'type'		=> 'text',
			'title' 	=> 'ics_hours_word',
			'sub_desc'	=> 'Hours',
			'desc' 		=> ' Hours:',
			'class' 	=> 'small-text',
			'std' 		=> 'HOURS',
		),
                                    	
array(
			'id' 		=> 'ics_hour_word',
			'type'		=> 'text',
			'title' 	=> 'ics_hour_word',
			'sub_desc'	=> 'Hour Available only for Digits CountDown Type',
			'desc' 		=> ' Hour:',
			'class' 	=> 'small-text',
			'std' 		=> 'HOUR',
		),

	array(
			'id' 		=> 'ics_minutes_word',
			'type'		=> 'text',
			'title' 	=> 'ics_minutes_word',
			'sub_desc'	=> 'Minutes ',
			'desc' 		=> ' Minutes:',
			'class' 	=> 'small-text',
			'std' 		=> 'MINUTES',
		),		
		
	array(
			'id' 		=> 'ics_minute_word',
			'type'		=> 'text',
			'title' 	=> 'ics_minute_word',
			'sub_desc'	=> 'Minute Available only for Digits CountDown Type',
			'desc' 		=> ' Minute:',
			'class' 	=> 'small-text',
			'std' 		=> 'MINUTE',
		),

	array(
			'id' 		=> 'ics_seconds_word',
			'type'		=> 'text',
			'title' 	=> 'ics_seconds_word',
			'sub_desc'	=> 'Seconds ',
			'desc' 		=> ' Seconds:',
			'class' 	=> 'small-text',
			'std' 		=> 'SECONDS',
		),	
		
	array(
			'id' 		=> 'ics_second_word',
			'type'		=> 'text',
			'title' 	=> 'ics_second_word',
			'sub_desc'	=> 'Second Available only for Digits CountDown Type',
			'desc' 		=> ' Second:',
			'class' 	=> 'small-text',
			'std' 		=> 'SECOND',
		),		

		array(
			'id'		=> 'ics_logo',
			//'type'		=> 'filemanager',
			//'type'		=> 'uploadfinal',
			//'type'		=> 'uploads1',
			//'type'		=> 'uploads',
			'type'		=> 'uploadframe',
			'class'		=> 'image',
			//'type'		=> 'select',
			//'type'		=> 'text',
			'title'		=> 'ics_logo',
			'desc' 		=> 'Select the logo Image.',
			//'options' 	=> oliveewajdiit(),
			'std' 		=> XOOPS_URL . '/modules/system/admin/themebuilder/fields/uploadframe/mlib-uploads/full/2successwoman-593c71727e113.png',
		),
		
	array(
			'id' 		=> 'ics_logo_height',
			'type'		=> 'text',
			'title' 	=> 'ics_logo_height',
			'sub_desc'	=> 'Max Height size allowed by the Coming Soon Layout is 200px. The recommended height size is 130px ',
			'desc' 		=> ' Height en px:',
			'class' 	=> 'small-text',
			'std' 		=> '120',
		),	 

array(
			'id' 		=> 'ics_home_label',
			'type'		=> 'text',
			'title' 	=> 'ics_home_label',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Main Title Home Label:',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_home_labelFRGEFBG',
		),

array(
			'id' 		=> 'ics_title_1',
			'type'		=> 'text',
			'title' 	=> 'ics_title_1',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Main Title Home Line 1:',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_title_1 VDGBRFGB',
		),

array(
			'id' 		=> 'ics_title_2',
			'type'		=> 'text',
			'title' 	=> 'ics_title_2',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Main Title Home Line 2:',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_title_2',
		),		

array(
			'id' 		=> 'ics_title_3',
			'type'		=> 'text',
			'title' 	=> 'ics_title_3',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Main Title Home Line 3:',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_title_3',
		),	

array(
			'id' 		=> 'ics_subtitle',
			'type'		=> 'text',
			'title' 	=> 'ics_subtitle',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Main Title Home Subtitle',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),			

array(
			'id' 		=> 'ics_smb_text',
			'type'		=> 'text',
			'title' 	=> 'ics_smb_text',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Before Social Media Text:',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),	array(
			'id' 		=> 'ics_facebook',
			'type'		=> 'text',
			'title' 	=> 'ics_facebook',
			'sub_desc'	=> ' ',
			'desc' 		=> 'ics_facebook',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),	array(
			'id' 		=> 'ics_twitter',
			'type'		=> 'text',
			'title' 	=> 'ics_twitter',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Main Title Home Subtitle',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),	array(
			'id' 		=> 'ics_googleplus',
			'type'		=> 'text',
			'title' 	=> 'ics_googleplus',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Main Title Home Subtitle',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),	array(
			'id' 		=> 'ics_linkedin',
			'type'		=> 'text',
			'title' 	=> 'ics_linkedin',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Main Title Home Subtitle',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),	array(
			'id' 		=> 'ics_instagram',
			'type'		=> 'text',
			'title' 	=> 'ics_instagram',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Main Title Home Subtitle',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),	array(
			'id' 		=> 'ics_pinterest',
			'type'		=> 'text',
			'title' 	=> 'ics_pinterest',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Main Title Home Subtitle',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),	array(
			'id' 		=> 'ics_youtube',
			'type'		=> 'text',
			'title' 	=> 'ics_youtube',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Main Title Home Subtitle',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),	array(
			'id' 		=> 'ics_vk',
			'type'		=> 'text',
			'title' 	=> 'ics_vk',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Main Title Home Subtitle',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),	array(
			'id' 		=> 'ics_vimeo',
			'type'		=> 'text',
			'title' 	=> 'ics_vimeo',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Main Title Home Subtitle',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),
		array(
			'id' 		=> 'ics_dribbble',
			'type'		=> 'text',
			'title' 	=> 'ics_dribbble',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Main Title Home Subtitle',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),			
		array(
			'id' 		=> 'ics_copyright',
			'type'		=> 'text',
			'title' 	=> 'ics_copyright',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Copyright Text',
			'class' 	=> 'small-text',
			'std' 		=> 'Olivee Builder WaJdI',
		),	                       

		array(
			'id' 		=> 'ics_about_page_enable',
			'type' 		=> 'select',
			'title' 	=> 'ics_about_page_enable',
			'sub_desc'	=> 'If you want to check how is looking the Coming Soon page, logOut or try the website into another browser/window.',
			'desc' 		=> 'Enable "About" Page',
			'options' 	=> array(
				'1' 			=> 'oui',
				'0' 			=> 'non',
			),
		),		

		array(
			'id' 		=> 'ics_about_label',
			'type'		=> 'text',
			'title' 	=> 'ics_about_label',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Menu Label Text',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),	

		array(
			'id' 		=> 'ics_about_title',
			'type'		=> 'text',
			'title' 	=> 'ics_about_title',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Menu Title Text',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),			

		array(
			'id' 		=> 'ics_about_text',
			'type'		=> 'textarea',
			'title' 	=> 'ics_about_text',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Menu content Text',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),	

		array(
			'id' 		=> 'ics_contact_page_enable',
			'type' 		=> 'select',
			'title' 	=> 'ics_contact_page_enable',
			'sub_desc'	=> ' contact page enable',
			'desc' 		=> 'Enable "About" Page',
			'options' 	=> array(
				'1' 			=> 'oui',
				'0' 			=> 'non',
			),
		),		

		array(
			'id' 		=> 'ics_contact_label',
			'type'		=> 'text',
			'title' 	=> 'ics_contact_label',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Menu Menu Label',
			'class' 	=> 'small-text',
			'std' 		=> '',
		),		

array(
			'id' 		=> 'ics_contact_title',
			'type'		=> 'text',
			'title' 	=> 'ics_contact_title',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Menu ics_contact_title',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_contact_title',
		),			
			array(
			'id' 		=> 'ics_contact_name',
			'type'		=> 'text',
			'title' 	=> 'ics_contact_name',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Menu Menu ics_contact_name',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_contact_name',
		),			
			array(
			'id' 		=> 'ics_contact_email',
			'type'		=> 'text',
			'title' 	=> 'ics_contact_email',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Menu Menu ics_contact_email',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_contact_email',
		),
		
			array(
			'id' 		=> 'ics_contact_message',
			'type'		=> 'text',
			'title' 	=> 'ics_contact_message',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Menu Menu ics_contact_message',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_contact_message',
		),	

			array(
			'id' 		=> 'ics_contact_submit',
			'type'		=> 'text',
			'title' 	=> 'ics_contact_submit',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Menu Menu ics_contact_submit',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_contact_submit',
		),	

			array(
			'id' 		=> 'ics_contact_s_msg',
			'type'		=> 'text',
			'title' 	=> 'ics_contact_s_msg',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Menu Menu ics_contact_s_msg',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_contact_s_msg',
		),	

			array(
			'id' 		=> 'ics_target_email',
			'type'		=> 'text',
			'title' 	=> 'ics_target_email',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Menu Menu ics_target_email',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_target_email',
		),

		array(
			'id' 		=> 'ics_enable_more_info',
			'type' 		=> 'select',
			'title' 	=> 'ics_enable_more_info',
			'sub_desc'	=> '"More Info" PopUp.',
			'desc' 		=> 'Enable ics_enable_more_info',
			'options' 	=> array(
				'1' 			=> 'oui',
				'0' 			=> 'non',
			),
		),		


			array(
			'id' 		=> 'ics_more_info_text',
			'type'		=> 'textarea',
			'title' 	=> 'ics_more_info_text',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Menu Menu ics_more_info_text',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_more_info_text',
		),
			array(
			'id' 		=> 'ics_title_more_info',
			'type'		=> 'text',
			'title' 	=> 'ics_title_more_info',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Menu Menu ics_title_more_info',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_title_more_info',
		),	

			array(
			'id' 		=> 'ics_more_info',
			'type'		=> 'textarea',
			'title' 	=> 'ics_more_info',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Menu Menu ics_more_info',
			'class' 	=> 'small-text',
			'std' 		=> 'ics_more_info0',
		),	

		
		array(
			'id' 		=> 'ics_background_select',
			//'type' 		=> 'input'/*'color'*/, //probleme de color same class for all section
			//'type' 		=> 'text',
			'type' 		=> 'color1',
			'title' 	=> 'Background Color',
			'desc' 		=> 'Use color name (eg. "gray") or hex (eg. "#808080").<br /><br />Leave this field blank if you want to use transparent background.',
			'class' 	=> 'bg_color_section',
			'std' 		=> '#ffffff',
		),		
		
		array(
			'id'		=> 'ics_background_img',
			//'type'		=> 'filemanager',
			//'type'		=> 'uploadfinal',
			//'type'		=> 'uploads1',
			//'type'		=> 'uploads',
			'type'		=> 'uploadframe',
			'class'		=> 'image',
			//'type'		=> 'select',
			//'type'		=> 'text',
			'title'		=> 'Background Image',
			'desc' 		=> 'Select the Background Image.',
			//'options' 	=> oliveewajdiit(),
			'std' 		=> XOOPS_URL . '/modules/system/admin/themebuilder/fields/uploadframe/mlib-uploads/full/2successwoman-593c71727e113.png',
		),
		
					array(
			'id' 		=> 'ics_video_bk',
			'type'		=> 'text',
			'title' 	=> 'ics_video_bk',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Menu Menu ics_video_bk',
			'class' 	=> 'small-text',
			'std' 		=> 'ics_video_bk0',
		),

		array(
			'id' 		=> 'ics_sound_on',
			'type' 		=> 'select',
			'title' 	=> 'ics_sound_on',
			'sub_desc'	=> '"More Info" PopUp.',
			'desc' 		=> 'Enable ics_sound_on',
			'options' 	=> array(
				'1' 			=> 'oui',
				'0' 			=> 'non',
			),
		),			

		array(
			'id' 		=> 'ics_enable_subscribe',
			'type' 		=> 'select',
			'title' 	=> 'ics_enable_subscribe',
			'sub_desc'	=> ' ics_enable_subscribe page enable',
			'desc' 		=> 'Enable "ics_enable_subscribe" Page',
			'options' 	=> array(
				'1' 			=> 'oui',
				'0' 			=> 'non',
			),
		),		

		array(
			'id' 		=> 'ics_subscribe_text',
			'type'		=> 'text',
			'title' 	=> 'ics_subscribe_text',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Subscribe Text:',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_subscribe_text',
		),
				array(
			'id' 		=> 'ics_subscribe_label',
			'type'		=> 'text',
			'title' 	=> 'ics_subscribe_label',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Subscribe ics_subscribe_label:',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_subscribe_label',
		),
		array(
			'id' 		=> 'ics_subscribe_bttn',
			'type'		=> 'text',
			'title' 	=> 'ics_subscribe_bttn',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Subscribe ics_subscribe_bttn:',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_subscribe_bttn',
		),
		
		array(
			'id' 		=> 'ics_subscribe_msg',
			'type'		=> 'text',
			'title' 	=> 'ics_subscribe_msg',
			'sub_desc'	=> ' ',
			'desc' 		=> 'Subscribe ics_subscribe_msg:',
			'class' 	=> 'small-text',
			'std' 		=> '0ics_subscribe_msg',
		),
		
		array(
			'id' 		=> 'ics_subscribe_type',
			'type' 		=> 'select',
			'title' 	=> 'ics_subscribe_type',
			'sub_desc'	=> ' ics_subscribe_type page enable',
			'desc' 		=> 'Subscribe Type',
			'options' 	=> array(
                                                                    'aweber' => 'AWeber',
                                                                    'campaign_monitor' => 'CampaignMonitor',
                                                                    'constant_contact' => 'Constant Contact',
                                                                    'email_list' => 'E-mail List',
                                                                    'get_response' => 'GetResponse',
                                                                    'icontact' => 'IContact',
                                                                    'madmimi' => 'Mad Mimi',
                                                                    'mailchimp' => 'MailChimp',
                                                                    'mymail' => 'MyMail',
                                                                    'wysija' => 'Wysija',
                                                                 ),
		),
);		

	echo '	<link rel="stylesheet" href="admin/themebuilder1/assets/js/colorpicker.css" type="text/css" />
	<script type="text/javascript" src="admin/themebuilder1/assets/js/colorpicker.js"></script>
	<script>
		var upurl = "'.XOOPS_URL.'";
	</script>
	<script src="admin/themebuilder1/builder/fields/uploadframe/mlib-includes/js/init.js" type="text/javascript"></script>';
echo '<style>
.form-table tr{
	text-align: left;
    background: #ecfbef;}
.form-table tr th{
	text-align: left;
    padding: 7px;
	background: #ecfbef;
	color: #000;
	border-bottom:1px;
	border-style:solid;}
.form-table tr td{
	text-align: left;
    padding: 7px;
	background: #ecfbef;
	color: #000;
	border-bottom:1px;
	border-style:solid;}	
</style>';
$sqls = "SELECT * FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_name = 'system_siteclosed'";
$css_arrs = $xoopsDB -> fetchArray( $xoopsDB -> query( $sqls ) );
$item = unserialize($css_arrs['conf_value']);
	
//var_dump($item);
echo '<table width="100%" cellspacing="1" class="outer" summary="">';
echo '<tbody>';	
echo '<form method="post" action="?fct=themebuilder1&op=ThemeBuilder&action=modpagebuilder&pageid=sytem_siteclosed">';				
 
// Fields for Item
	foreach( $arr as $fields => $field ){

		// values for existing items
		if( $item && key_exists( $field['id'], $item ) ){
			$meta = $item[$field['id']];
		} else {
			$meta = false;
		}
			
		if( ! key_exists('std', $field) ) $field['std'] = false;
		$meta = ( $meta || $meta==='0' ) ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES ));
	
		// field ID
		$field['id'] = 'mfn-items['. $field['id'] .']';							
    
			
		// PRINT Single Muffin Options FIELD
		//mfn_meta_field_input( $field['fields'], $meta );
			
		if( isset( $field['type'] ) ){	
			echo '<tr style="text-align: center;">';
				// Field Title & SubDescription
				echo '<td class="even" style="text-align: left;">';
					if( key_exists('title', $field) ) echo $field['title'];
					if( key_exists('sub_desc', $field) ) echo '<span class="description">'. $field['sub_desc'] .'</span>';
				//echo '</th>';
				
				//  Options Field & Description 
				echo '<td class="even" style="text-align: left;">';
					$field_class = 'OLIVEE_Options_'.$field['type'];
						require_once XOOPS_ROOT_PATH .'/modules/system/admin/themebuilder1/builder/fields/'.$field['type'].'/field_'.$field['type'].'.php';												
					if( class_exists( $field_class ) ){
						$field_object = new $field_class( $field, $meta );
						$field_object->render(1);
					}else{echo 'pas de class';}
					
				echo '</td>';
				
			echo '</tr>';
		}else{echo 'pas de field type';}
	}
echo '<tr valign="top"><td><input type="submit" name="submitextra" value="Submit"></form></td></tr>';
echo '</tbody>';
echo '</table>';

?>
