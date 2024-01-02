$(function(){
$('#loadin').hide(1000);
 $('#stp1').click(function(){
 	$('#loadin').show(1000);
		$('#content_middle').load('step2.php',function(){	
 		$('#loadin').hide(1000);
 	});
 });
 
  $('#stp2').live('click',function(){
  	if($('#warning').hasClass('warning')){return false;}
  	$('#loadin').show();
 	$('#gCtr').load('step3.php',function(){
 		$('#loadin').hide(1000);
 	});
 });
 
   $('#stp3').live('click',function(){
  	if($('#warning').hasClass('warning')){return false;}
  	$('#loadin').show();
 	$('#gCtr').load('step4.php',function(){
 		$('#loadin').hide(1000);
 	});
 });

    $('#modeB').live('click',function(){
   		$('.div4').show(500);
   	})
   	
   	 $('#modeA').live('click',function(){
   		$('.div4').hide(500);
   	})
});