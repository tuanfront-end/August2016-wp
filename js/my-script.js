jQuery(document).ready(function($) {

	/* Js for Search form Header */
	$('.my-searchform .icon-search-click').click(function(){

			$('.my-searchform .search-field').animate({
				width: 'toggle'
			});
			
	});

	/* Js for Search form Footer */
	$('.my-searchform-footer .icon-search-click').click(function(){

			$('.my-searchform-footer .search-field').animate({
				width: 'toggle'
			});
	});


	/* Js for Carousel Material Design */
	$('.carousel').carousel();
	// Next slide
	$('.carousel').carousel('next');
	$('.carousel').carousel('next', 3); // Move next n times.
	// Previous slide
	$('.carousel').carousel('prev');
	$('.carousel').carousel('prev', 4); // Move prev n times.
	// Set to nth slide
	$('.carousel').carousel('set', 4);


	/* Js for Contact form 7 - Plachollder */
	$('.contact-form .yoursubject').attr("placeholder", "Subject");
	$('.contact-form .yourname').attr("placeholder", "Your Name");
	$('.contact-form .youremail').attr("placeholder", "Email");
	$('.contact-form .yourmes').attr("placeholder", "Your Message");


	$('.main-navigation .menu-toggle').click(function(){
		$('.main-navigation ul').slideToggle();
	});

	
});