<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" />
    <link rel='stylesheet'  href='<?php echo Yii::app()->request->baseUrl; ?>/css/style.css' type='text/css' media='all' />
    <?php
    if(Yii::app()->controller->action->id!=="unsubscribe")
    {
    ?>
    <link rel='stylesheet'  href='<?php echo Yii::app()->request->baseUrl; ?>/css/owl.carousel.css' type='text/css' media='all' />
    <link rel='stylesheet'  href='<?php echo Yii::app()->request->baseUrl; ?>/css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/animate.min.css' type='text/css' media='all' />
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.js'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.queryloader2.js'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var dt_loader = {"bcolor":""};
        /* ]]> */
    </script>
    <script type='text/javascript'>
        function scrollMenu()
        {
            var arr_top=[];
            var menu_par;
            $('#nav ul li a').each(function(i)
            {
                menu_par=$(this).attr('href');
                if(($.trim(menu_par)!=="#" || $.trim(menu_par)!=="") && $(menu_par).length>0)
                {
                    var offset=$(menu_par).offset()
                    arr_top.push(offset.top)
                }
            })
            return arr_top
        }
        arr_top=[];
        $(document).ready(function()
        {
            $(document).on('click','.m-collapsed a',function(){
                var th=$(this)
                if(th.hasClass("more"))
                {
                    th.parent().prev().css({height: "auto"})
                    th.hide();
                    $(".hide").show();
                    $(".b-read-all").addClass("none")
                }
                else{
                    th.parent().prev().css({height:"150px"})
                    $("a",th.parent()).removeAttr("style")
                    $(".b-read-all").removeClass("none")
                }


                return false
            })
//            $('.mobile-show img,.mobile-hide img').on('click',function()
//            {
//                if($('#hidden').is(':visible'))
//                {
//                    $('#hidden').slideToggle(500);
//                }
//                else
//                {
//                    $("body").animate({
//                        scrollTop: $('#before-hidden').offset().top
//                    }, function(){
//                        $('#hidden').slideToggle(500);
//                    });
//                }
//
//
//            })
            /*submit form*/
            $('form input[type=submit]').on('click',function()
            {
                var buttonArray={}
                buttonArray["Ok"]=function() { $( this ).dialog( "destroy" );}
                var th=$(this);
                if(!th.hasClass('disabled'))
                {
                    th.addClass('disabled')
                    var optionsUpdate = {
                        url:  "<?php echo Yii::app()->createUrl('/ajax/form') ?>",
                        beforeSubmit: function(jqForm) {
                            var error="";
                            if($.trim($('form input[name=your-name]').val())==="" || $.trim($('form input[name=your-email]').val())==="" || $.trim($('form textarea').val())==="")
                            {
                                $("#dialog").empty().append("Please fill in all fields").dialog({
                                    dialogClass:'dialog',
                                    position: { my: "center",at: "center",of: window},
                                    draggable:false,
                                    modal:true,
                                    buttons: buttonArray
                                });

                                th.removeClass('disabled')
                                return false;
                            }
                        },
                        success: function(responseText) {
                            var buttonArray={}
                            buttonArray["Ok"]=function() { $( this ).dialog( "destroy" );}
                            if(responseText=="Mail send")
                            {
                                $("#dialog").empty().append("Thanks for your message.  We'll get back to you within 24 hours").dialog({
                                    dialogClass:'dialog',
                                    position: { my: "center",at: "center",of: window},
                                    draggable:false,
                                    modal:true,
                                    buttons:buttonArray
                                });
                                $('form input[type=text],form input[type=email],form textarea').val("")
                            }
                            else
                            if(responseText=="Not valid")
                            {
                                $("#dialog").empty().append("Email not valid").dialog({
                                    dialogClass:'dialog',
                                    position: { my: "center",at: "center",of: window},
                                    draggable:false,
                                    modal:true,
                                    buttons:buttonArray
                                });
                            }
                            else
                            {
                                $("#dialog").empty().append("Message not sending").dialog({
                                    dialogClass:'dialog',
                                    position: { my: "center",at: "center",of: window },
                                    draggable:false,
                                    modal:true,
                                    buttons: buttonArray
                                });
                            }
                            th.removeClass('disabled')
                        }
                    };
                    $("form").ajaxSubmit(optionsUpdate);
                    return false;
                }
                })
            /*end submit form*/
            var touch=!!('ontouchstart' in window);
            if(touch)
            {
                $(document).on('touchstart','.experts-table li',function()
                {
                    if($(this).hasClass('active')) $(this).removeClass('active')
                    else
                    {
                        $(this).parent().find('li').removeClass('active')
                        $(this).addClass('active')
                    }
                })
            }

            arr_top=scrollMenu()

        })
        $(window).scroll(function()
        {
            if($(window).scrollTop()<arr_top[0])
            {
                $('#navigation li').removeClass('current');
            }
            if($(window).scrollTop()>=arr_top[0] && $(window).scrollTop()<arr_top[0]+(arr_top[1]-arr_top[0])/2)
            {
                $('#navigation li').removeClass('current');
                $('#navigation li').eq(0).addClass('current');
            }
            if($(window).scrollTop()>=(arr_top[arr_top.length-2]+(arr_top[arr_top.length-1]-arr_top[arr_top.length-2])/2-50 ))
            {
                $('#navigation li').removeClass('current');
                $('#navigation li').eq(arr_top.length-1).addClass('current');
            }
            else
            {
                for(var i=0;i<arr_top.length-2;i++)
                {
                    if($(window).scrollTop()>=arr_top[i]+(arr_top[i+1]-arr_top[i])/2 && $(window).scrollTop()<arr_top[i+1]+(arr_top[i+2]-arr_top[i+1])/2)
                    {
                        $('#navigation li').removeClass('current');
                        $('#navigation li').eq(i+1).addClass('current');
                    }
                }
            }
        })
        $(window).resize(function(){ arr_top=scrollMenu();$(window).trigger('scroll');if($("#dialog").parent().hasClass('dialog')) { $("#dialog").dialog({position: { my: "center",at: "center",of: window}}); }})




    </script>
    <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" />
    <![endif]-->

    <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/custom-loader.js'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.parallax.js'></script>
    <?php } ?>
    <?php $this->pageTitle="Mobile software development company in New York City";?>
    <meta name="description" content="Cayuga Mobile is a team of mobile software development experts, dedicated to creating knock-out mobile apps, at a reasonable cost">
    <meta name="keywords" content="NYC,New York City,mobile apps,mobile application development company,mobile application developer,mobile application development,mobile design,iphone app development,Android app development,Android app,iphone app,iOS app,mobile website development,iphone app development,iOS app development,Android app development">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body  class="home vc_responsive">

<?php echo $content; ?>

<?php
if(Yii::app()->controller->action->id!=="unsubscribe")
{
?>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.min.js'></script>

<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/easing.js'></script>
<!--<script type='text/javascript' src='--><?php //echo Yii::app()->request->baseUrl; ?><!--/js/hoverIntent.js?ver=r7'></script>-->
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/smoothScroll.js'></script>
<!--<script type='text/javascript' src='--><?php //echo Yii::app()->request->baseUrl; ?><!--/js/jquery.fitvids.js?ver=1.0.3'></script>-->
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.scrollTo.js'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.nav.js'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/retina.min.js'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/owl.carousel.min.js'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.isotope.min.js'></script>

<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/custom-nav.js'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var dt_parallax_QKv0G = {"id":"eft"};
    var dt_parallax_I2oUz = {"id":"pgd"};
    var dt_parallax_SOUSK = {"id":"rvw"};
    /* ]]> */
</script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/custom-parallax.js'></script>
<!--<script type='text/javascript' src='--><?php //echo Yii::app()->request->baseUrl; ?><!--/js/waypoints.min.js?ver=4.0.2'></script>-->
<!--<script type='text/javascript' src='--><?php //echo Yii::app()->request->baseUrl; ?><!--/js/custom-waypoints.js?ver=2.0.4'></script>-->

<script type='text/javascript'>
    /* <![CDATA[ */
    var dt_testimonials_dTfaN = {"id":"pqu"};
    var dt_testimonials_dTfaN2 = {"id":"pqu2"};
    /* ]]> */
</script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/custom-testimonials.js'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.4.min.js'></script>
<link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-1.10.4.min.css' type='text/css' media='all' />
<style>
    @font-face {
        font-family: SourceSansPro-Black;
        src: url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Black.eot);
        src: url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Black.eot?#iefix) format(embedded-opentype),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Black.woff) format(woff),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Black.ttf) format(truetype),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Black.svg#SourceSansPro-Black) format(svg);
    }
    @font-face {
        font-family: SourceSansPro-Bold;
        src: url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Bold.eot);
        src: url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Bold.eot?#iefix) format(embedded-opentype),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Bold.woff) format(woff),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Bold.ttf) format(truetype),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Bold.svg#SourceSansPro-Bold) format(svg);
    }
    @font-face {
        font-family: SourceSansPro-Light;
        src: url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Light.eot);
        src: url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Light.eot?#iefix) format(embedded-opentype),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Light.woff) format(woff),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Light.ttf) format(truetype),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Light.svg#SourceSansPro-Light) format(svg);
    }
    @font-face {
        font-family: SourceSansPro-Regular;
        src: url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Regular.eot);
        src: url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Regular.eot?#iefix) format(embedded-opentype),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Regular.woff) format(woff),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Regular.ttf) format(truetype),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Regular.svg#SourceSansPro-Regular) format(svg);
    }
    @font-face {
        font-family: SourceSansPro-Semibold;
        src: url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Semibold.eot);
        src: url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Semibold.eot?#iefix) format(embedded-opentype),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Semibold.woff) format(woff),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Semibold.ttf) format(truetype),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Semibold.svg#SourceSansPro-Semibold) format(svg);
    }
</style>
<div id='dialog'></div>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-51674352-1', 'cayugamobile.com');
    ga('send', 'pageview');

</script>
<?php
}
?>
</body>
</html>
