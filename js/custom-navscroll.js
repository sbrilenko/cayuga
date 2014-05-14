jQuery(document).ready(function() {

	// Header Effect on Scroll

//	var op1 = '0.'+dt_styles.header_scroll_opacity+'';
//	if(dt_styles.header_scroll_opacity == 100) {
//		op1 = ''+dt_styles.header_scroll_opacity+'';
//	}

//	var def_color = dt_styles.default_color;

	jQuery(window).scroll( function() {
		var value = jQuery(this).scrollTop();
		if ( value > 120 )	{
			jQuery("#header").addClass("scrolled-header")
			
//			jQuery("#header.no-header").addClass("show");
			
//			jQuery(".no-csstransforms .no-header").css({"display": "block"});
		
		}
		else {
			jQuery("#header").removeClass("scrolled-header");


//			jQuery("#header.no-header").removeClass("show");
//			jQuery(".no-csstransforms .no-header").css({"display": "none"});

			
		}
	});	
	
});