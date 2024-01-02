jQuery(document).ready(function($){

//icon live search
    $(".mfn-icon-input").keyup(function(){

        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(), count = 0;


        var regex = new RegExp(filter, "i"); // Create a regex variable outside the loop statement

        // Loop through the icons
        $(".mfn-icon-select .mfn-icon").each(function(){
            var classname = $('i', this).attr('class');
            // If the list item does not contain the text phrase fade it out
            if (classname.search(regex) < 0) { // use the variable here
                $(this).hide();

            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).fadeIn();
                count++;
            }
        });

    });
	
	
	
	$('.mfn-icon-select .mfn-icon').click(function(){
		
		var field = $(this).closest('.mfn-icon-field');
		var input = field.find('.mfn-icon-input');
		
		var icon = $(this).attr('data-rel');
		
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
		input.val( icon );			
			
	});
	
});