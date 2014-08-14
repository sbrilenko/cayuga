

function pattinav_extend() {


	jQuery("#navigation a").click(function () {
        var navb = jQuery("#navigation")
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
            navb.hide();
            $("#header").removeClass("menu-response")
            nava.find("i").removeClass("active")
		if (wind > 1023) {
            $("#header").removeClass("menu-response")
            navb.addClass("desktop");
			navb.removeClass("mobile")
		}
		if (wind < 1023) {
            navb.addClass("mobile");
            $("#header").removeClass("menu-response")
			navb.removeClass("desktop")
		}
    });
		if (wind > 1023) {
            nava.find("i").removeClass("active")
            navb.addClass("desktop");
            $("#header").removeClass("menu-response")
			navb.removeClass("mobile")
		}
		if (wind < 1023) {
            nava.find("i").removeClass("active")
            navb.addClass("mobile");
            $("#header").removeClass("menu-response")
			navb.removeClass("desktop")
		}
	// Click Tweak
    nava.on("mouseover",function()
    {
        nava.find('i').addClass("active");
    }).on("mouseout",function()
    {
        nava.find('i').removeClass("active");
    })
	nava.click(function (e) {
        e.preventDefault()
        var touch=!!('ontouchstart' in window);
        if (navb.is(":visible")) {
            if(touch)
            {
                nava.empty().append('<i class="fa fa-bars"></i>')
                navb.slideUp(function(){$("#header").removeClass("menu-response")})

            }
            else
            {
                navb.slideUp(function(){nava.find("i").removeClass("active");$("#header").removeClass("menu-response") })
            }
		} else {
            if(touch)
            {
                nava.empty().append('<i class="fa fa-bars active"></i>')
                $("#header").addClass("menu-response")
                navb.slideDown()
            }
            else
            {
                nava.find("i").addClass("active")
                $("#header").addClass("menu-response")
                navb.slideDown()
            }

		}
	});

    $("li a",navb).click(function(e)
    {
        e.preventDefault()
        nava.find("i").removeClass("active")
    })

	//Scroll Nav
	jQuery('#mainnav').onePageNav({
		currentClass: 'current',
		filter: ':not(.external)',
        changeHash: true
	});



}

jQuery(document).ready(function() {

	pattinav_extend();	
	
});
