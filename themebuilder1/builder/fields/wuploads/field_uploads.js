jQuery(document).ready(function($){
	
	$('.mfn-iconn-selectt .mfn-iconn').click(function(){
//alert('ddddd');
		var field = $(this).closest('.mfn-iconn-fieldd');
		var input = field.find('.mfn-iconn-input');
		
		var icon = $(this).attr('data-rel');
		
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
		input.val( icon );			
			
	});
	
	$( "a", ".pagination" ).on( "click", function( e ) {
			e.preventDefault();
			var $a = $(this);
			var field = $(this).closest('.mfn-iconn-fieldd');
			var input = field.find('.mfn-iconn-selectt');

			$a.addClass( "current" ).
			siblings().
			removeClass( "current" );

			var page = $a.data( "page" );
			//alert(page);
			$.get( "admin/themebuilder/fields/uploads/ajax.php", { s: page }, function( html ) {
				input.html( html );

			});
		});
		
		/*$('.browse').each(function(){
		$(this).bind("click", function() {
            alert('upload');
        });
	
			
	});	*/
	
	
	
	
    /**
    * Image URL
    * Next events are related to image url control
    */
    $("body").on('click', '.adv_img_launcher', function(){

        var id = $(this).attr("data-id");
aliert('gggg');
        var html = '<div id="blocker-'+id+'" class="advmgr_blocker"></div><div id="window-'+id+'" class="advmgr_container">';
        html += '<div class="window-title cu-titlebar"><span></span>'+imgmgr_title+'</div>';
        html += '<iframe src="'+mgrURL+'?target=advInsertUrl&amp;idcontainer='+id+'&amp;type=external&amp;multi=no" name="image"></iframe></div>'
        html += '</div>';
        $("body").append(html);

        // window height


        $("#blocker-"+id).fadeIn('fast', function(){
            $("body").css('overflow','hidden');
            $("#window-"+id).fadeIn('fast', function(){

            });

        });

        $("#blocker-"+id+", #window-"+id+" .window-title span").click(function(){

            $("#window-"+id).fadeOut('fast', function(){

                $("#blocker-"+id).fadeOut('fast', function(){
                    $("body").css('overflow','auto');
                    $("#window-"+id).remove();
                    $("#blocker-"+id).remove();

                });

            })

        });

    });

    /**
    * Update thumbnail when input changed
    */
    $("body").on('blur', ".adv_imgurl input", function(){

        imgUrlInsert($(this));

    });
	
});