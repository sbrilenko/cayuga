

function pattinav_extend() {


	jQuery("ul#mainnav li").css({ "overflow":"visible"});

	jQuery('#mainnav > li > a').wrapInner('<span></span>');	

	jQuery('#mainnav li.external').each(function() {
		jQuery(this).children('a').addClass('external');
		jQuery(this).removeClass('external');
	});


	
	jQuery("#navigation a").click(function () {
		if (navb.is(":visible") && navb.hasClass("mobile")) {
			navb.slideUp();
		}
	});		

	jQuery('#mainnav li').each(function() { 
		if(jQuery(this).hasClass('current-menu-item')) {
			jQuery(this).children('a').removeClass('external')
		}
		else {
			jQuery(this).children('a').addClass('external')
		}
	});

	// initial hello state
	if(jQuery('body').hasClass('home')) {
		jQuery('#mainnav li.initial').addClass('current')
	}

	// highlight on page
	if(!jQuery('body').hasClass('home')) {	
		jQuery('#mainnav li.current-menu-item').addClass('highlighted-state');
		jQuery('#mainnav li.current-menu-parent').addClass('highlighted-state')
	}

	// Responsive Navigation 

	var nava = jQuery(".nav-btn"),
		navb = jQuery("#navigation"),
		wind = jQuery(window).width();	
			
	// Add classes		
    jQuery(window).resize(function () {
		var nava = jQuery(".nav-btn"),
			navb = jQuery("#navigation"),
			wind = jQuery(window).width();
		if (wind > 1023) {
			navb.addClass("desktop");
			navb.removeClass("mobile")
		}
		if (wind < 1023) {
			navb.addClass("mobile");
			navb.removeClass("desktop")
		}
    });
			
		if (wind > 1023) {
			navb.addClass("desktop");
			navb.removeClass("mobile")
		}
		if (wind < 1023) {
			navb.addClass("mobile");
			navb.removeClass("desktop")
		}			
		
	// Click Tweak	
	nava.click(function () {
		if (navb.is(":visible")) {
			navb.slideUp()
		} else {
			navb.slideDown()
		}
	});		

	//Scroll Nav
	jQuery('#mainnav').onePageNav({
		currentClass: 'current',
		filter: ':not(.external)'
	});		

	// Fixed Element Height
	var headerheight = jQuery('#header').outerHeight();
	jQuery('.menu-fixer').css({'height': headerheight});	
	

}

jQuery(document).ready(function() {

	pattinav_extend();	
	
});
