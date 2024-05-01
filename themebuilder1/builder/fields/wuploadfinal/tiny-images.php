<?php
// $Id: tiny-images.php 999 2012-07-02 03:53:17Z i.bitcero $
// --------------------------------------------------------------
// Red México Common Utilities
// A framework for Red México Modules
// Author: Eduardo Cortés <i.bitcero@gmail.com>
// Email: i.bitcero@gmail.com
// License: GPL 2.0
// --------------------------------------------------------------

include '../../../../../../mainfile.php';
XoopsLogger::getInstance()->activated        = false;
XoopsLogger::getInstance()->renderingEnabled = false;

function send_message($message): never
{
    global $xoopsSecurity;

    echo $message;
    echo '<input type="hidden" id="ret-token" value="' . $xoopsSecurity->createToken() . '" />';
    die();
}

//$category = RMHttpRequest::post('category', 'integer', 0);
$category = $_POST['category'];
//$action = RMHttpRequest::post( 'action', 'string', '' );
$action = $_POST['action'];
//$cat = new RMImageCategory($category);
//$type = RMHttpRequest::request( 'type', 'string', 'tiny' );
$type = $_REQUEST['type'];
//$multi = RMHttpRequest::request( 'multi', 'string', 'yes' );
$multi = $_REQUEST['multi'];

$multi = $multi == 'yes' ? true : false;
//$en = RMHttpRequest::request( 'name', 'string', '' );
$en = $_REQUEST['name'];

// Check if target is different from editor
//$target = RMHttpRequest::request( 'target', 'string', '' );
$target = $_REQUEST['target'];
// Used when tiny must be loaded
//$editor = RMHttpRequest::request( 'editor', 'string', '' );
$editor = $_REQUEST['editor'];
//$container = RMHttpRequest::request( 'idcontainer', 'string', '' );
$container = $_REQUEST['idcontainer'];

if ($action == '') {
    /*RMTemplate::get()->add_script('jquery.min.js', 'rmcommon', array('directory' => 'include'));
    RMTemplate::get()->add_script('jquery-ui.min.js', 'rmcommon', array('directory' => 'include'));
    RMTemplate::get()->add_script('popup-images-manager.js', 'rmcommon' );*/

    /*if (!$cat->isNew()){
        $uploader = new RMFlashUploader('files-container', 'upload.php');
        $uploader->add_setting('scriptData', array(
            'action'=>'upload',
            'category'=>$cat->id(),
            'rmsecurity'=>TextCleaner::getInstance()->encrypt($xoopsUser->uid().'|'.RMCURL.'/images.php'.'|'.$xoopsSecurity->createToken(), true)
        ));
        $uploader->add_setting('multi', true);
        $uploader->add_setting('fileExt', '*.jpg;*.png;*.gif');
        $uploader->add_setting('fileDesc', __('All Images (*.jpg, *.png, *.gif)','rmcommon'));
        $uploader->add_setting('sizeLimit', $cat->getVar('filesize') * $cat->getVar('sizeunit'));
        $uploader->add_setting('buttonText', __('Browse Images...','rmcommon'));
        $uploader->add_setting('queueSizeLimit', 100);
        $uploader->add_setting('auto', true);
        $uploader->add_setting('onSelect', "function(file){
        	if (queuefiles[file]) return false;
        	queuefiles[file] = true;
        	\$('#upload-errors').html('');
        	return true;
        }");
        $uploader->add_setting('onUploadSuccess',"function(file, resp, data){
            eval('ret = '+resp);
            if (ret.error){
                \$('#upload-errors').append('<span class=\"failed\"><strong>'+file.name+'</strong>: '+ret.message+'</span>');
            } else {
                total++;
                ids[total-1] = ret.id;
                \$('#upload-errors').append('<span class=\"done\"><strong>'+file.name+'</strong>: ".__('Uploaded successfully!','rmcommon')."</span>');
            }
            return true;
        }");
        $uploader->add_setting('onQueueComplete', "function(event, data){
            if(total<=0) return;
                \$('.categories_selector').hide('slow');
                \$('#upload-errors').hide('slow');
                \$('#upload-errors').html('');
                \$('#upload-controls').hide('slow');
                \$('#resizer-bar').show('slow');
                \$('#resizer-bar').effect('highlight',{},1000);
                \$('#gen-thumbnails').show();
                    
                var increments = 1/total*100;
                url = '".RMCURL."/images.php".($target!=''?"?taget=$target&amp;id=$container":'')."';
                    
                params = '".TextCleaner::getInstance()->encrypt($xoopsUser->uid().'|'.RMCURL.'/images.php'.'|'.$xoopsSecurity->createToken(), true)."';
                resize_image(params);
                    
        }");
        
        RMTemplate::get()->add_head($uploader->render());
    }*/

    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>Insert Image</title>

        <script type='text/javascript' src='admin/themebuilder1/fields/uploadfinal/popup-images-manager.js'></script>
        <script type='text/javascript' src='admin/themebuilder1/fields/uploadfinal/advanced-fields.js'></script>
        <link rel="stylesheet" title="dark" media="screen" href="admin/themebuilder1/fields/uploadfinal/popup-images-manager.css" type="text/css"/>

        <!-- RMTemplateHeader -->
    </head>
    <body style="background: #FFF;">
    <div id="img-toolbar">
        <a href="#" class="select" id="a-upload" onclick="show_upload(); return false;">Upload Files</a>
        <a href="#" id="a-fromurl" onclick="return false;">From URL</a>
        <a href="#" id="a-library" onclick="show_library(); return false;">From Library</a>
        <?php //echo RMEvents::get()->run_event('rmcommon.imgmgr.editor.options', '');
        ?>
    </div>
    <div id="upload-container" class="container">
        <div class="form-group">
            <form name="selcat" id="select-category" method="post" action="tiny-images.php">
                Select the category where you wish to upload images
                <select name="category" onchange="$('#select-category').submit();" class="form-control">
                    <option value="0">Select...</option>
                    <?php foreach ($categories as $catego): ?>
                        <?php if (!$catego->user_allowed_toupload($xoopsUser)) {
                            continue;
                        } ?>
                        <option value="<?php echo $catego->id(); ?>"<?php echo $cat->id() == $catego->id() ? ' selected="selected"' : ''; ?>><?php echo $catego->getVar('name'); ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="hidden" name="type" value="<?php echo $type; ?>"/>
                <input type="hidden" name="name" value="<?php echo $en; ?>"/>
                <input type="hidden" name="target" value="<?php echo $target; ?>"/>
                <input type="hidden" name="multi" value="<?php echo $multi ? 'yes' : 'no'; ?>"/>
                <input type="hidden" name="idcontainer" value="<?php echo $container; ?>"/>
            </form>
        </div>
        <?php //if (!$cat->isNew()):
        ?>
        <div id="upload-controls">
            <div id="upload-errors"></div>
            <div id="files-container"></div>
        </div>
        <div id="resizer-bar">
            <strong>Resizing images</strong>
            <div class="thebar">
                <div class="indicator" id="bar-indicator">0</div>
            </div>
            <span class="message"></span>
            <span>Please, do not close the window until resizing process has finished!</span>
        </div>
        <div id="gen-thumbnails"></div>
        <?php //endif;
        ?>
    </div>

    <div id="fromurl-container" class="container">
        <div class="form-group row">
            <div class="col-sm-4 col-md-2">
                <label for="imgurl">Image URL</label>
            </div>
            <div class="col-sm-8 col-md-10">
                <input type="text" id="imgurl" class="form-control" size="50" value="">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 col-md-2">
                <label for="url-title">Title:</label>
            </div>
            <div class="col-sm-8 col-md-10">
                <input type="text" id="url-title" class="form-control" value=""/>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4 col-md-2">
                <label for="url-alt">Alternative text:</label>
            </div>
            <div class="col-sm-8 col-md-10">
                <input type="text" id="url-alt" class="form-control" value=""/>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4 col-md-2">
                <label>Alignment:</label>
            </div>
            <div class="col-sm-8 col-md-10">
                <label class="radio-inline"><input type="radio" name="align_url" value="" checked="checked"> None</label>
                <label class="radio-inline"><input type="radio" name="align_url" value="left"> Left</label>
                <label class="radio-inline"><input type="radio" name="align_url" value="center"> Center</label>
                <label class="radio-inline"><input type="radio" name="align_url" value="right"> Right</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4 col-md-2">
                <label for="url-alt">Link:</label>
            </div>
            <div class="col-sm-8 col-md-10">
                <input type="text" id="url-link" class="form-control" value="">
            </div>
        </div>

        <div class="form-group row">

            <div class="col-sm-4 col-md-2">
                &nbsp;
            </div>
            <div class="col-sm-8 col-md-10">
                <a href="javascript:;" class="btn btn-primary" onclick="<?php if ($type == 'exmcode'): ?>insert_from_url('xoops');<?php else: ?>insert_from_url('tiny');<?php endif; ?>">Insert Image</a>
                <?php if ($type == 'exmcode'): ?>
                    <a href="javascript:;" onclick="exmPopup.closePopup();" class="btn btn-default">Cancel</a>
                <?php endif; ?>
            </div>

        </div>
    </div>


    <div id="library-container" class="container">
        <div class="categories_selector">
            Select the category where yo want to select images
            <select name="category" id="category-field" onchange="show_library();" class="form-control">
                <option value="0">Select...</option>
                <?php foreach ($categories as $catego): ?>
                    <?php if (!$catego->user_allowed_toupload($xoopsUser)) {
                        continue;
                    } ?>
                    <option value="<?php echo $catego->id(); ?>"<?php echo $cat->id() == $catego->id() ? ' selected="selected"' : ''; ?>><?php echo $catego->getVar('name'); ?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="XOOPS_TOKEN_REQUEST" id="xoops-token" value="<?php echo $xoopsSecurity->createToken(); ?>"/>
        </div>
        <div id="library-content" class="loading">

        </div>
    </div>

    <input type="hidden" name="type" id="type" value="<?php echo $type; ?>"/>
    <input type="hidden" name="editor" id="editor" value="<?php echo $editor; ?>"/>
    <input type="hidden" name="name" id="name" value="<?php echo $en; ?>"/>
    <input type="hidden" name="target" id="target" value="<?php echo $target; ?>"/>
    <input type="hidden" name="multi" id="multi" value="<?php echo $multi ? 'yes' : 'no'; ?>"/>
    <input type="hidden" name="idcontainer" id="idcontainer" value="<?php echo $container; ?>"/>
    <span id="parameters">


<?php
//  $ev = RMEvents::get();
// $ev->run_event('rmcommon.imgwin.parameter');
?>
</span>
    </body>
    </html>
    <!-- Options from other elements -->
    <?php //RMEvents::get()->run_event('rmcommon.imgmgr.editor.containers','');
    ?>


    <?php
    /*
    $categories = RMFunctions::load_images_categories("WHERE status='open' ORDER BY id_cat DESC", true);


    RMTemplate::get()->add_style('bootstrap.min.css', 'rmcommon');
    RMTemplate::get()->add_style('imgmgr.css', 'rmcommon');
    RMTemplate::get()->add_style('pagenav.css', 'rmcommon');
    RMTemplate::get()->add_style('popup-images-manager.css', 'rmcommon');
    if($type=='tiny' && $target!='container'){
        RMTemplate::get()->add_script(RMCURL.'/api/editors/tinymce/tiny_mce_popup.js');
    } elseif($target!='container'&&$type!='external') {
        RMTemplate::get()->add_head_script('var exmPopup = window.parent.exmCode'.ucfirst($container).';');
    }

    RMEvents::get()->run_event('rmcommon.loading.editorimages', '');

    include RMTemplate::get()->get_template('rmc-editor-image.php', 'module', 'rmcommon');*/
} elseif ($action == 'load-images') {
    $db = XoopsDatabaseFactory::getDatabaseConnection();

    /*if (!$xoopsSecurity->check()){
        _e('Sorry, unauthorized operation!','rmcommon');
        echo '<script type="text/javascript">window.location.href="tiny-images.php";</script>';
        die();
    }*/

    // Check if some category exists
    //$catnum = RMFunctions::get_num_records("mod_rmcommon_images_categories");
    /*if ($catnum<=0){
        send_message('There are not categories yet! Please create one in order to add images.');
        die();
    }
    
    if ($cat->isNew()){
        send_message(__('You must select a category before','rmcommon'));
        die();
    }*/
    /*
    $sql = "SELECT COUNT(*) FROM ".$db->prefix("mod_rmcommon_images");
    if (!$cat->isNew()) $sql .= " WHERE cat='".$cat->id()."'";
    
     //* Paginacion de Resultados
     
    $page = intval(rmc_server_var($_REQUEST, 'page', 1));
    $page = $page<=0 ? $page = 1 : $page;
    $limit = 35;
    list($num) = $db->fetchRow($db->query($sql));
    
    $tpages = ceil($num / $limit);
    $page = $page > $tpages ? $tpages : $page;

    $start = $num<=0 ? 0 : ($page - 1) * $limit;
    
    $nav = new RMPageNav($num, $limit, $page, 5);
    $nav->target_url('#" onclick="show_library({PAGE_NUM}); return false;');
    
    // Get categories
    $sql = "SELECT * FROM ".$db->prefix("mod_rmcommon_images")." ".(!$cat->isNew() ? "WHERE cat='".$cat->id()."'" : '')." ORDER BY id_img DESC LIMIT $start,$limit";

    $result = $db->query($sql);
    $images = array();
    $categories = array();
    $authors = array();
    
    $category = $cat;
    $sizes = $category->getVar('sizes');
    $current_size = array();

    foreach ($sizes as $size){
        if (empty($current_size)){
            $current_size = $size;
        } else {
            if ($current_size['width']>=$size['width'] && $size['width']>0){
                $current_size = $size;
            }
        }
    }



    while($row = $db->fetchArray($result)){
        $img = new RMImage();
        $img->assignVars($row);

        $fd = pathinfo($img->getVar('file'));
        $filesurl = XOOPS_UPLOAD_URL.'/'.date('Y',$img->getVar('date')).'/'.date('m',$img->getVar('date'));
        
        $thumb = date('Y',$img->getVar('date')).'/'.date('m',$img->getVar('date')).'/sizes/'.$fd['filename'].'-'.$current_size['name'].'.'.$fd['extension'];
        if(!file_exists(XOOPS_UPLOAD_PATH.'/'.$thumb)){
            $thumb = date('Y',$img->getVar('date')).'/'.date('m',$img->getVar('date')).'/'.$fd['filename'].'.'.$fd['extension'];
        }

        $images[] = array(
            'id'        => $img->id(),
            'title'        => $img->getVar('title'),
            'thumb'      => XOOPS_UPLOAD_URL.'/'.$thumb,

        );

    }*/

    // include RMTemplate::get()->get_template('rmc-images-list-editor.php','module','rmcommon');
    $images = [
        '1' => [
            'id'    => '1',
            'thumb' => 'http://localhost/xoops25777/modules/profile/assets/images/logo.png',
            'title' => 'sdssdfsd',
        ],
        '2' => [
            'id'    => '2',
            'thumb' => 'http://localhost/xoops25777/modules/profile/assets/images/logo.png',
            'title' => 'sdssdfsd',
        ],
    ];
    if (empty($images)): ?>

        <div class="alert alert-info text-center">
            There are not images yet!
        </div>

    <?php endif; ?>

    <?php foreach ($images as $image): ?>

        <div id="thumbnail-<?php echo $image['id']; ?>" data-id="<?php echo $image['id']; ?>" class="thumbnail-item" style="background-image: url('<?php echo $image['thumb']; ?>');" alt="<?php echo $image['title']; ?>">
            <span class="thumbnail-cover"></span>
            <?php if ($multi): ?>
                <a href="#" class="add"><span class="glyphicon glyphicon-th"></span></a>
                <span class="check"><span class="glyphicon glyphicon-ok"></span></span>
            <?php endif; ?>
            <a href="#" class="insert"><span class="glyphicon glyphicon-plus"></span></a>
        </div>

    <?php endforeach; ?>

    <div id="inserter-blocker"></div>
    <div id="image-inserter">
        <div class="row content">

            <div class="image-info">
                <span class="image"></span>

                <div class="media author-info">
                    <a href="#" class="pull-left" target="_blank">
                        <img class="author-avatar img-thumbnail">
                    </a>
                    <div class="media-body">
                        <h5 class="media-heading"><strong>Uploaded by <a href="#" target="_blank"></a></strong></h5>
                        <small>on <span class="info-date">1999</span></small><br>
                    </div>
                </div>
                <ul class="list-unstyled">
                    <li>
                        <small>Title: <code><span class="info-title">title</span></code></small>
                    </li>
                    <li>
                        <small>Description: <code><span class="info-description">desc</span></code></small>
                    </li>
                    <li>
                        <small>MIME type: <code><span class="info-mime">mime</span></code></small>
                    </li>
                    <li>
                        <small>Original: <code><span class="info-original"></span></code></small>
                    </li>
                    <li>
                        <small>File size: <code><span class="info-size"></span></code></small>
                    </li>
                    <li>
                        <small>Dimensions: <code><span class="info-dimensions"></span></code></small>
                    </li>
                </ul>

            </div>

            <!-- Insert form -->
            <div class="image-form">
                <div class="form-group">
                    <label>Title:</label>
                    <input class="form-control input-sm img-title" type="text" name="title">
                </div>
                <div class="form-group">
                    <label>Alternative text:</label>
                    <input class="form-control input-sm img-alt" type="text" name="alt">
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <textarea class="form-control input-sm img-description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label>Link URL:</label>
                    <input class="form-control input-sm img-link" type="text" name="link">
                    <div class="btn-group btn-group-xs img-links">

                    </div>
                </div>
                <div class="form-group">
                    <label>Alignment:</label><br>
                    <label class="radio-inline">
                        <input class="img-align" type="radio" name="align" value="" checked="checked"/> None
                    </label>
                    <label class="radio-inline">
                        <input class="img-align" type="radio" name="align" value="left"/> Left
                    </label>
                    <label class="radio-inline">
                        <input class="img-align" type="radio" name="align" value="center"/> Center
                    </label>
                    <label class="radio-inline">
                        <input class="img-align" type="radio" name="align" value="right"/> Right
                    </label>
                </div>
                <div class="form-group img-sizes">

                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="123" class="img-id">
                    <input type="hidden" name="type" value="external" id="insert-type">
                    <input type="hidden" name="target" value="advInsertUrl" id="insert-target">
                    <input type="hidden" name="container" value="container2" id="insert-container">
                    <button type="button" class="btn btn-primary btn-insert">Send Image</button>
                    <button type="button" class="btn btn-primary btn-edit"><span class="glyphicon glyphicon-ok"></span> Set Changes</button>
                    <button type="button" class="btn btn-success btn-edit-next">Save and Next <span class="glyphicon glyphicon-chevron-right"></span></button>
                    <button type="button" class="btn btn-default btn-close">Close</button>
                </div>
            </div>
            <!-- Insert form /-->
        </div>
    </div>

    <div id="images-tray">
        <div class="tray-added">
            <div class="images">

            </div>
        </div>
        <div class="tray-commands">
            <button type="button" class="btn btn-primary btn-sm btn-insert"><span class="glyphicon glyphicon-ok"></span> Insert Images</button>
            <button type="button" class="btn btn-warning btn-sm btn-clear"><span class="glyphicon glyphicon-trash"></span> Clear Selected</button>
        </div>
    </div>

    <input type="hidden" name="token" id="ret-token" value="<?php //echo $xoopsSecurity->createToken();
    ?>"/>
    <?php //echo $nav->display( false );
    ?>
    <input type="hidden" id="filesurl" value="<?php echo $filesurl; ?>"/>

<?php
} elseif ($action == 'image-details') {
    function images_send_json($data): never
    {
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($data);
        die();
    }

    /*if (!$xoopsSecurity->check()){
        images_send_json(array(
            'message'   => _e('Sorry, unauthorized operation!','rmcommon'),
            'error'     => 1
        ));
    }*/

    //$id = RMHttpRequest::post( 'id', 'integer', 0 );
    $id = $_POST['id'];
    /*if ( $id <= 0 )
        images_send_json( array(
            'message'   => __('No image specified', 'rmcommon'),
            'error'     => 1,
            'token'     => $xoopsSecurity->createToken()
        ) );
    
    $image = new RMImage( $id );
    if ( $image->isNew() )
        images_send_json( array(
            'message'   => __('Specified image does not exists', 'rmcommon'),
            'error'     => 1,
            'token'     => $xoopsSecurity->createToken()
        ) );

    $author = new RMUser( $image->uid );
    $original = pathinfo( $image->get_files_path() . '/' . $image->file );
    $dimensions = getimagesize( $image->get_files_path() . '/' . $image->file );
    $mimes = include(XOOPS_ROOT_PATH.'/include/mimetypes.inc.php');

    $category_sizes = $cat->getVar('sizes');
    $sizes = array();
    foreach($category_sizes as $i => $size){
        if($size['width']<=0) continue;
        $tfile = $image->get_files_path() . '/sizes/' . $original['filename'].'-'.$size['name'].'.'.$original['extension'];
        if(!is_file($tfile)) continue;

        $t_dim = getimagesize( $tfile );

        $sizes[] = array(
            'width' => $t_dim[0],
            'height' => $t_dim[1],
            'url'   => $image->get_files_url() . '/sizes/' . $original['filename'].'-'.$size['name'].'.'.$original['extension'],
            'name'  => $size['name'],
        );
    }

    $sizes[] = array(
        'width' => $dimensions[0],
        'height' => $dimensions[1],
        'url'   => $image->getOriginal(),
        'name'  => __('Original', 'rmcommon')
    );

    $links = array(
        'none'=>array('caption'=>__('None','rmcommon'),'value'=>''),
        'file'=>array('caption'=>__('File URL','rmcommon'),'value'=>XOOPS_UPLOAD_URL.'/'.date('Y',$image->getVar('date')).'/'.date('m',$image->getVar('date')).'/'.$image->getVar('file'))
    );
    $links = RMEvents::get()->run_event( 'rmcommon.image.insert.links', $links, $image, RMHttpRequest::post( 'url', 'string', '' ) );

    // Image data
    $data = array(
        'id'        => $image->id(),
        'title'        => $image->title,
        'date'        => formatTimestamp($image->date, 'l'),
        'description'      => $image->getVar('desc', 'n'),
        'author'    => array(
            'uname' => $author->uname,
            'uid' => $author->uid,
            'avatar' => RMEvents::get()->run_event( 'rmcommon.get.avatar', $author->email, 40 ),
            'url'   => XOOPS_URL . '/userinfo.php?uid=' . $author->email
        ),
        'medium'    => $image->get_by_size( 300 ),
        'url'		=> $image->get_files_url(),
        'original'  => array(
            'file'      => $original['basename'],
            'url'       => $image->getOriginal(),
            'size'      => RMFormat::bytes_format( filesize( $image->get_files_path() . '/' . $image->file ) ),
            'width'     => $dimensions[0],
            'height'    => $dimensions[1]
        ),
        'mime'      => isset($mimes[$original['extension']]) ? $mimes[$original['extension']] : 'application/octet-stream',
        'sizes'     => $sizes,
        'links'     => $links
    );

    $data = RMEvents::get()->run_event('rmcommon.loading.image.details', $data, $image, RMHttpRequest::request( 'url', 'string', '' ) );
    $data['token'] = $xoopsSecurity->createToken();*/
    $data = [
        'id'    => '1',
        'title' => 'title',
        //'links'     => $links
    ];
    images_send_json(
        $data
    );
}
