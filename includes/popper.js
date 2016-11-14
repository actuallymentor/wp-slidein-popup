var $ = jQuery
$(function(){
	$('.wpsp_overlay').delay(wpsp_slidein.delay).fadeIn(400);
	$('.wpsp_slidein').delay(wpsp_slidein.delay + 400).animate({left:0});
	$('.wpsp_box, #wpsp_close').delay(wpsp_slidein.delay + 400).fadeIn(750);
	$('#wpsp_close, .wpsp_overlay').click(function(){
		$('.wpsp_overlay, .wpsp_box, #wpsp_close, .wpsp_slidein').fadeOut(400);
		Cookies.set('wpsp_silent', 'true', { expires: wpsp_slidein.expires });
	});
});