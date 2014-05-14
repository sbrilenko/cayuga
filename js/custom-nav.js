

function pattinav_extend() {


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



}

jQuery(document).ready(function() {

	pattinav_extend();	
	
});
