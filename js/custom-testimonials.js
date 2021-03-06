	// Gallery Blog Slider //
$(window).resize(function()
{
    jQuery('.testimonials-slider[id^="owl-testimonials"]').each( function() {

        var $div = jQuery(this);
        var token = $div.data('token');

        var settingObj = window['dt_testimonials_' + token];

        jQuery("#owl-testimonials-"+settingObj.id+"").owlCarousel({
            autoHeight : true,
            singleItem : true,
            slideSpeed : 1000,
            navigation : true, // Show next and prev buttons
            pagination : false,
            lazyLoad : true
        });

    });
})
// Testimonials Slider
jQuery(window).load(function() {
    $(".video").on('click',function()
    {
        if($("#hidden .hidden iframe").length==0)
        { $("#hidden .hidden").append('<iframe src="//www.youtube.com/embed/ScHCxXdtyGs" frameborder="0" allowfullscreen></iframe>'); $("#hidden").slideDown(function(){$(window).scrollTo($("#hidden").offset().top)});}
        else { $("#hidden").slideUp(function(){$("#hidden .hidden").empty() });}

    })
    //owl.next()
    var slider1=false,slider2=false;
	jQuery('.testimonials-slider[id^="owl-testimonials"]').each( function() { 	

		var $div = jQuery(this);
		var token = $div.data('token');

		var settingObj = window['dt_testimonials_' + token];
        if(settingObj.id=="pqu")
        {
            jQuery("#owl-testimonials-"+settingObj.id+"").owlCarousel({
                autoHeight : true,
                singleItem : true,
                slideSpeed : 1000,
                navigation : true, // Show next and prev buttons
                pagination : false,
                lazyLoad : true,
                beforeMove: function()
                {
                    var projects_owl=$("#projects").find('.owl-carousel'),current=projects_owl.data('owlCarousel').currentItem
//                    if(current==1 || current==2)
//                    {
//                        $("#hidden .hidden").empty();
//                        $("#hidden").slideUp();
//                    }
                }
            });
        }
        jQuery("#owl-testimonials-"+settingObj.id+"").owlCarousel({
                autoHeight : true,
                singleItem : true,
                slideSpeed : 1000,
                navigation : true, // Show next and prev buttons
                pagination : false,
                lazyLoad : true
        });



	});
    function slide_one()
    {
        var team_top=$("#team").offset().top,projects=$("#projects").offset().top;
        if($(window).scrollTop()>team_top-100 && $(window).scrollTop()<team_top+100 && !slider1)
        {
            var team_owl=$("#team").find('.owl-carousel'),current=team_owl.data('owlCarousel').currentItem,length_=$("#team").find('.owl-item').length
            if(current==0 && length_>1)
            {
                team_owl.data('owlCarousel').next();
            }
            if(current>1 && length_>1)
            {
                team_owl.data('owlCarousel').prev();
            }
            slider1=true
        }
        if($(window).scrollTop()>projects-100 && $(window).scrollTop()<projects+100 && !slider2)
        {
            var projects_owl=$("#projects").find('.owl-carousel'),current=projects_owl.data('owlCarousel').currentItem,length_=$("#projects").find('.owl-item').length
            if(current==0 && length_>1)
            {
                projects_owl.data('owlCarousel').next();
            }
            if(current>1 && length_>1)
            {
                projects_owl.data('owlCarousel').prev();
            }
            slider2=true
        }
    }
    $(window).scroll(function()
    {
        slide_one()
    })
    $(window).resize(function(){slide_one()})
    //if #projects
    if(window.location.hash==="#projects")
        slider2=true;
    //if #team
    if(window.location.hash==="#team")
        slider1=true;
});