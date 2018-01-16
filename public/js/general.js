$(document).ready(function(){
	$('.fancybox').fancybox();
// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
	$('.galeria_slide').slick({
	dots: false,
	infinite: true,
	speed: 500,
	autoplay: true,
	autoplaySpeed: 3500,
	fade: true,
	arrows: false,
	cssEase: 'linear'
	});

});