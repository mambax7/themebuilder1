jQuery(document).ready(function($){
	
	$('.mfn-iconn-selectt .mfn-iconn').click(function(){

		var field = $(this).closest('.mfn-iconn-fieldd');
		var input = field.find('.mfn-iconn-input');
		
		var icon = $(this).attr('data-rel');
		
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
		input.val( icon );			
			
	});

	
var uploader = new plupload.Uploader({
				
		runtimes : 'html5,flash',
				
		containes : 'plupload',
				
		browse_button : 'browse',
				
		drop_element: 'droparea',
								
		url : 'upload.php',
								
		flash_swf_url : 'admin/themebuilder/fields/uploads1/js/plupload.flash.swf',
		
		multipart :	true,
		
		urlstream_upload : true,
		multipart_params:{directory : 'test'}
				
});	
/*uploader.bind('UploadProgress',function(up, file){
console.log(file);
$('#'+file.id).find('.progress')css('width',file.percent+'%');
})*/

uploader.init();
uploader.bind('FileAdded',function(up, files){
var filelist = $('#filelist');
condole.log(files);
for(var i in files){
var file = files[i];
//filelist.prepend('<div id="'+file.id+'" class="file">'+file.name+' ('+plupload.formatSize(file.size)+')'+'<div class="progressbar"><div class="progress"></div></div></div>');
}
uploader.start();
uploader.refresh();
})		
		$('.upload').each(function(){
		$(this).bind("click", function() {
            alert('upload');
        });
	
			
	});	
	
});