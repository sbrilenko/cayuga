<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" />
    <link rel='stylesheet'  href='<?php echo Yii::app()->request->baseUrl; ?>/css/style.css' type='text/css' media='all' />
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
    <?php $this->pageTitle="Mobile software development company in New York City";?>
    <meta name="description" content="Cayuga Mobile is a team of mobile software development experts, dedicated to creating knock-out mobile apps, at a reasonable cost">
    <meta name="keywords" content="NYC,New York City,mobile apps,mobile application development company,mobile application developer,mobile application development,mobile design,iphone app development,Android app development,Android app,iphone app,iOS app,mobile website development,iphone app development,iOS app development,Android app development">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body  class="home vc_responsive">

<div id="preloader"></div>

<div id="header">
    <div class="centered-wrapper">
        <div class="percent-one-fourth">
            <div class="logo"><a href="#" title="Cayuga mobile" rel="home"><img src="images/logo.png" alt="Cayuga mobile"></a></div>
        </div>
        <a class="nav-btn"><i class="fa fa-bars"></i></a> <!-- mobile menu icon -->
        <div class="percent-three-fourth float-right">    <!-- menu -->
            <nav id="navigation">
                <ul id="mainnav" style="margin-top: 2px;">
                    <li class="menu-item current-menu-item current"><a href="#home"><span>Home</span></a></li>
                    <li class="menu-item current-menu-item"><a href="#about" class="external"><span>About</span></a></li>
                    <li class="menu-item current-menu-item"><a href="#services" class="external"><span>Services</span></a></li>
                    <li class="menu-item current-menu-item"><a href="#projects" class="external"><span>Projects</span></a></li>
                    <li class="menu-item current-menu-item"><a href="#team" class="external"><span>Team</span></a></li>
                    <li class="menu-item current-menu-item"><a href="#blog" class="external"><span>Blog</span></a></li>
                    <li class="menu-item current-menu-item"><a href="#contact" class="external"><span>Contact</span></a></li>
                </ul>

            </nav><!--end navigation-->
        </div>
        <div class="clear"></div>
    </div><!--end centered-wrapper-->
</div>

<div id="wrapper">

<div id="home" class="wpb_row">
    <div class="first-block">
        <div class="main-back"></div>
        <div class="centered-wrapper f-block-table">
            <div class="experts-padd aligncenter f-block-t-c">
                <span>
                    <h1 class="margin under-h1 text-transform-uppercase" style="padding:0 25px 5px 25px;display: inline;">WE ARE CAYUGA MOBILE</h1>
                </span>
<!--                <div class="under-h1">-->
<!--                    <h1 class="h1-margin-bottom">WE ARE CAYUGA MOBILE</h1>-->
<!--                </div>-->
                <div class="f-block-under-h1-text">We are a talented group of mobile development experts, who can help take your idea from concept to the App Store or Play Store in just a few weeks!</div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="f-block-bottom">
            <div class="centered-wrapper f-bottom-style">
                <ul class="nyc-digital-mobile-studio">
                    <li>NYC Digital Mobile Studio</li>
                </ul>

                <ul class="float-right follow-us-ul">
                    <li class="follow-us">Follow Us On:</li>
                    <!--<li class="float-left f-b-tw">
                        <a href="#">Twitter</a>
                    </li>-->
                    <li class="float-left li-f-b-f f-b-f">
                        <a href="https://www.facebook.com/CayugaSoft" target="_blank">Facebook</a>
                    </li>
                    <li class="float-left f-b-lid">
                        <a href="http://www.linkedin.com/company/cayugasoft-technologies" target="_blank">LinkedIn</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="clear"></div>

    <div class="second-block-back">
        <div class="centered-wrapper">
            <div class="services-padd second-padd">
                <div class="aligncenter">
                    <span>
                        <h1 class="under-h1">WHY YOU SHOULD CHOOSE US?</h1>
                    </span>
                    <div class="f-block-under-h1-text second-under-h1">Cayuga Mobile does outstanding mobile software development work at a competitive price. </div>
                </div>
                <div class="second-table-block">
                    <div class="s-table-block-img">
                        <img src="images/many.png">
                    </div>
                    <div class="s-table-block-text">
                        <div class="s-table-block-title">Why can we beat most others on price, while maintaining a strong quality level?</div>
                        <div class="s-table-block-text-t">We have our own staff of over twenty people, providing us with both cost and control advantages over other mobile development companies, who are frequently resource constrained.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- quotes -->

    <div class="centered-wrapper aligncenter quotes-block">
        <span class="pos-rel">
            <span class="quotes-block-q1"></span>
        </span>
        <span class="quotes-block-text">Give us the opportunity to provide you with a proposal for your project, and you’ll see what we mean.</span>
        <span class="pos-rel">
            <span class="quotes-block-q2"></span>
        </span>
    </div>

    <!-- end quotes -->

    <!-- WE'RE EXPERTS IN -->

    <div id="about" class="parallax-bag-eft experts-in-back" data-token="QKv0G">
        <div class="darker-overlay experts-padd">
            <div class="centered-wrapper aligncenter">
                <span>
                    <h1 class="margin" style="padding:0 25px 5px 25px;">WE'RE EXPERTS IN</h1>
                </span>

            </div>
            <div class="experts-black-line">
                <div class="centered-wrapper">
                    <ul class="experts-table pos-rel">
                        <li class="block">
                            <div class="pos-rel">
                                <div class="padd hide">
                                    <div class="title">Business Apps</div>
                                    <div class="text">Your users expect mobile access to their enterprise data, and the ability to execute transactions using their mobile devices. And while they do so, they want the experience of a consumer app.</div>
                                </div>
                                <div class="padd visible">
                                    <div class="business-app"></div>
                                    <div class="text-visible">Business<br />Applications</div>
                                </div>
                            </div>

                        </li>
                        <li class="padd"></li>
                        <li class="block">
                            <div class="pos-rel">
                                <div class="padd hide">
                                    <div class="title">Gaming</div>
                                    <div class="text">Have you considered creating a game for your brand?  Games are one of the the best and most cost-effective ways to engage your customers for hours, not just minutes or seconds.</div>
                                </div>
                                <div class="padd visible">
                                    <div class="gaming"></div>
                                    <div class="text-visible">Gaming</div>
                                </div>
                            </div>
                        </li>
                        <li class="padd"></li>
                        <li class="block">
                            <div class="pos-rel">
                                <div class="padd hide">
                                    <div class="title">Social Media</div>
                                    <div class="text">Social networks provide new means for engaging your customers and spreading word about your brand.  We'll ensure your app ties into the leading social networks' APIs.</div>
                                </div>
                                <div class="padd visible">
                                    <div class="experts-social-media"></div>
                                    <div class="text-visible">Social<br />Media</div>
                                </div>
                            </div>
                        </li>
                        <li class="padd"></li>
                        <li class="block">
                            <div class="pos-rel">
                                <div class="padd hide">
                                    <div class="title">Mobile Commerce</div>
                                    <div class="text">Do you have a mobile app for placing orders? We'll help you think about how to take advantage of the shift to mobile, and then we'll build the apps you need to capture new revenues. </div>
                                </div>
                                <div class="padd visible">
                                    <div class="experts-mobile-comm"></div>
                                    <div class="text-visible">Mobile<br />Commerce</div>
                                </div>
                            </div>
                        </li>
                        <li class="padd"></li>
                        <li class="block">
                            <div class="pos-rel">
                                <div class="padd hide">
                                    <div class="title">Internet of Things</div>
                                    <div class="text">We’re creating mobile apps that control smart devices, and cloud services that manage a network of smart devices. We’ll connect it all to billing and e-commerce systems to make sure you get paid.</div>
                                </div>
                                <div class="padd visible">
                                    <div class="experts-internet-of-things"></div>
                                    <div class="text-visible">Internet of<br />Things</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div></div>
    </div>
    <!-- end WE'RE EXPERTS IN -->

    <div class="clear"></div></div>

<!-- services -->
<div id="services" class="darker-overlay">
    <div class="centered-wrapper services-padd">
        <div class="aligncenter">
                    <span>
                        <h1 class="under-h1">SERVICES</h1>
                    </span>
            <div class="f-block-under-h1-text second-under-h1">Everything you need to rapidly take your idea from concept to the App Store or Play Store</div>
        </div>
        <div class="clear"></div>
        <div class="services-block-mar">
            <div class="services-mob-strat">
                <div class="logo"></div>
                <div class="aligncenter">
                    <div class="services-block-title">Mobile Strategy</div>
                    <div class="services-block-text">Our founders have been involved with startups and venture-backed companies in the New York area since 1999. We can help you plot out a mobile strategy, including your Minimum Viable Product (MVP), release plan, and monetization plan.</div>
                </div>
            </div>

            <div class="services-mob-develop" >
                <div class="logo"></div>
                <div class="aligncenter">
                    <div class="services-block-title">Mobile Development</div>
                    <div class="services-block-text">We have a large staff of talented developers with experience in both native mobile development, and in cross-platform development approaches. A great app also needs a great back-end, and we have a team of skilled back-end developers too.</div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="services-quality-ass">
                <div class="logo"></div>
                <div class="aligncenter">
                    <div class="services-block-title">Quality Assurance</div>
                    <div class="services-block-text">Some mobile development firms don’t emphasize QA sufficiently. They have the developers QA their own code, or have the Project Manager perform ad-hoc QA. We have a professional QA department that will test your app and ensure that it meets your targeted quality levels, and also check that it looks good on all of your targeted devices.</div>
                </div>
            </div>

            <div class="services-user-interfice">
                <div class="logo"></div>
                <div class="aligncenter">
                    <div class="services-block-title">User Interface and Graphic Design</div>
                    <div class="services-block-text">We have designers who can provide your app with an outstanding look and feel. Or, if you prefer, we can work with your favorite designer and integrate them into our team.</div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- end services -->


<!-- client work -->
<div id="projects" class="lighter-overlay client-work-padd">
    <div class="centered-wrapper">
        <div class="aligncenter client-work-title-padd">
                <span>
                    <h1 class="under-h1">CLIENT WORK</h1>
                </span>
        </div>

        <div class="testimonials-carousel">
            <div id="owl-testimonials-pqu" class="owl-carousel testimonials-slider" data-token="dTfaN">
                <!-- warrior -->
                <div class="testimonial-item">
                    <div class="mobile-hide ">
                        <img src="images/warrior-icon.png">

                    </div>
                    <div>
                        <img src="images/phone-warrior-white.png">
                        <div class="app-button"><a href="https://play.google.com/store/apps/details?id=cdlwarrior.cdlwarrior" target="_blank"><img src="images/en_generic_rgb_wo_60.png"/></a></div>

                    </div>
                    <div>
                        <div class="mobile-show client-work-slide-title-padd app">
                            <img src="images/warrior-icon.png">

                        </div>

                        <div class="client-work-slide-text">CayugaMobile helped Next Gauge, Inc. to build their <a href="http://www.cdlwarrior.com/" target="_blank">CDL Warrior</a> product. CDL Warrior is a mobile communication and productivity platform for commercial truck drivers and fleets. By leveraging the smartphones and tablets drivers already own, CDL Warrior plans to create the TripAdvisor for the trucking industry. The app is live on Google Play, and a web application for trucking fleets will be in production shortly.</div>

                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="mobile-hide">
                        <!--                        <img src="images/quality-ass.png">-->
                        <div class="client-work-slide-title-padd app parent-pops-title-with-image">
                            <div class="pops-title-with-image">
                                <div class="client-work-slide-title big-bold">Word Pops!</div>
                                <div class="client-work-slide-title big-font">Social Game</div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div>
                        <img src="images/phone-game.png">
                        <div class="app-button"><a href="https://itunes.apple.com/us/app/word-pops!/id810609168?mt=8" target="_blank"><img src="images/logo_appstore.gif"/></a></div>
                    </div>
                    <div>
                        <div class="mobile-show">
                            <!--                            <img src="images/gamepad.png">-->
                            <div class="client-work-slide-title-padd app parent-pops-title-with-image">

                                <div class="pops-title-with-image">
                                    <div class="client-work-slide-title big-bold">Word Pops!</div>
                                    <div class="client-work-slide-title big-font">Social Game</div>
                                </div>
                            </div>
                            <div class="clear"></div>

                        </div>

                        <div class="client-work-slide-text"><a href="http://headrightgames.com/" target="_blank">HeadRight Games</a>  asked us to help them create a new mobile word game Word Pops!, with social networking features and gameplay with friends. Users can participate in tournaments or challenge their friends to a game. Prizes and social media sharing make the game viral and fun. The iOS version is out on the App Store for iPhone and iPad.</div>

                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="mobile-hide">
                        <img src="images/quality-ass.png" style="width:auto;">
                        <div class="client-work-slide-title-padd">
                            <div class="client-work-slide-title">App Builder</div>
                        </div>
                    </div>
                    <div>
                        <img src="images/phone.png">
                    </div>
                    <div>
                        <div class="mobile-show">
                            <img src="images/quality-ass.png">
                            <div class="client-work-slide-title-padd">
                                <div class="client-work-slide-title">App Builder</div>
                            </div>
                        </div>

                        <div class="client-work-slide-text">With the help of the app builder, users can create their own apps and easily customize them to best fit their business needs and goals. The builder can be used for the major mobile platforms. With a bright design, management simplicity, and extended customization options the product lets customers create a stand-out mobile solution for their business.</div>

                    </div>
                </div>


            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- end client work -->
<div class="clear"></div>
<!--<div id="hidden" class="lighter-overlay client-work-padd">-->
<!--    <div class="centered-wrapper">-->
<!--        <div class="hidden">-->
<!--            <div class="hidden-image"></div>-->
<!--            <div class="hidden-text">-->
<!--                <a href="http://headrightgames.com/" target="_blank">HeadRight Games</a> asked us to help them create a new mobile word game, with social networking features and gameplay with friends. We created a project team consisting of a front-end developer, a back-end developer, and a project manager/tester.-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="clear"></div>-->

<!--<div id="hidden" class="lighter-overlay client-work-padd">-->
<!--    <div class="centered-wrapper">-->
<!--        <div class="hidden">-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div class="clear"></div>

<!-- our team -->
<div id="team" class="lighter-overlay client-work-padd" style="background-color: #fff;">
    <div class="centered-wrapper">
        <div class="aligncenter client-work-title-padd">
                <span>
                    <h1 class="under-h1">OUR TEAM</h1>
                </span>
            <div class="f-block-under-h1-text second-under-h1">Experienced mobile development leaders, with backgrounds in consumer and enterprise applications</div>
        </div>

        <div class="testimonials-carousel">
            <div id="owl-testimonials-pqu2" class="owl-carousel testimonials-slider" data-token="dTfaN2">
                <div class="testimonial-item">
                    <div>
                        <img src="images/mike.png">
                        <br /><br />
                        <div class="team-people-name">Mike Sadowski</div>
                        <div class="team-people-position">CEO & Co-Founder</div>

                    </div>
                    <div>

                        <div class="client-work-slide-text">Mike has been involved with New York area venture-backed software companies since the late 1990's, as a VP of Product, and CTO. He still remembers when VCs were (briefly) valuing companies based on a multiple of the number of engineers they had.
                            Today, Mike's interests include mobile business applications (especially in the area of logistics and supply-chain management), mobile gaming, and the Internet of Things.</div>

                    </div>

                </div>
                <div class="testimonial-item">
                    <div>
                        <img src="images/eugeniy.png">
                        <br /><br />
                        <div class="team-people-name">Eugene Polyansky</div>
                        <div class="team-people-position">COO and Co-Founder</div>

                    </div>
                    <div>
                        <div class="client-work-slide-text">Eugene is a design maven and dreamer. He has a rare combination of technology and design expertise, having once worked as a creative designer in the Advertising industry.  He's also an experienced IT project manager and leads our development team. Today, Eugene spends much of his time on building our team and optimizing our development processes.</div>

                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<!-- blog -->
<div id="blog" class="lighter-overlay client-work-padd blog-background margin-bottom">
    <div class="centered-wrapper">
        <div class="aligncenter client-work-title-padd">
                <span>
                    <h1 class="under-h1">BLOG</h1>
                </span>
            <!-- <div class="f-block-under-h1-text second-under-h1">Experienced mobile development leaders, with backgrounds in consumer and enterprise applications</div>-->
        </div>

        <div>
            <ul>
               <li>
                   <div class="blog-title blog-name">Native Development vs. Cross Platform Tools </div>
                   <div class="blog-text client-work-slide-text blog-short-text">
                       <p>When we’re in discussions with a client about developing a new mobile app, it’s usually not long before the question comes up: “What technologies do you want to use for this app?”  Some clients may have already selected the technology they prefer, and normally that settles the question—we use what they want to use.  But when the client doesn’t have a strong point of view on this, they normally ask for our recommendations.</p>
                           <br />
                       <p>Sometimes I get a chance to talk with other mobile development shops, and I’ve found that some of them consider the choice of technologies to be a religious matter.  Some say they WILL NEVER use a cross-platform development tool.  EVER!”  Cross-platform mobile development tools (e.g., PhoneGap, Xamarin) allow developers to create an app and, with minor modifications, release it for various mobile platforms, such as iOS and Android.  So what is this baggage that cross-platform tools are being asked to carry around?  Why are these purists so fixed in their positions against these tools?  We’ve found that there are many projects where cross-platform tools are an appropriate choice.  Although there are some cons, as well.</p>
                           <br />
                       <p>PROS of CROSS-PLATFORM TOOLS</p>
                           <br />
                       <p class="indent">- Reduced Development Cost (and Time) – Cross-platform tools let the developers reuse much of their code for various mobile platforms, so assuming you want an app that works on both iOS and Android (and possibly Windows Phone) then there’s less development work to do using a cross platform tool, as opposed to native tools.  Using cross platform tools, we find we can typically save 70% of the development work on a second mobile platform, having developed the first one in a cross platform tool (although your mileage can vary, depending the app).</p>
                       <p class="indent">- Ease of Finding Developers – There’s a global shortage of mobile developers right now.  You probably didn’t need me to tell you that.  One nice thing about Xamarin is that it’s relatively easy to take a .Net developer and turn them into a Xamarin developer, because the tools are similar.  So this helps us, as a mobile development company, find staff.  But it also helps you, our client, since if a key developer quits, finding a replacement is not as difficult as finding a native iOS or Android developer.   Other cross platform tools are based on well known web technologies such as HTML, CSS and Javascript.  So again, it becomes relatively easy for web developers to pick these up an learn them.</p>
                           <br />
                       <p>CONS of CROSS-PLATFORM TOOLS</p>
                           <br />
                       <p class="indent">- Not all Native Features are Accessible – Xamarin has a good record for “zero-day” support for new features from Apple and Google.  But with other cross-platform tools there’s still some concern that Apple will announce some great new feature and your developers can’t access it for a while, until the tools vendor gets around to supporting the new feature.</p>
                       <p class="indent">- Worse Performance & Size – Cross-platform tools might be slower than native tools because the tools generate code that may not be as efficient as the code a really good native developer might write.   That said, we’ve had good experience with Xamarin’s performance.  A related issue is the app size.  Sometimes we find that a cross-platform app might end up larger than a well-written native app would have been.   The cross-platform developer has less control of the code than a native developer, so you might need to accept this, or do some work to slim down the app.</p>
                           <br />
                       <p>One other issue we should discuss is the user experience for various platforms.  You might think that by using a cross-platform tool, you can take an iPhone app and, in no time, generate an Android app.  But when you consider what some experts say about the user experience approach to Android vs. iOS, you’ll see that they recommend putting the app controls in totally different locations on the screen (see this great article by <a href="http://www.creativebloq.com/design/designing-touch-2123037" target="_blank">Josh Clark</a>): Android app navigation and controls at the top, and iPhone app navigation and controls at the bottom.   If you expect to create a cross-platform iPhone app and just turn around and do a quick port to Android, you might find you’re not providing the optimal user experience.  But perhaps the tools you select really aren’t the main issue here.  It’s not the cross-platform tool that’s forcing you to do the “wrong” thing.  You can create a bad user experience on any platform, with any tool!</p>
                           <br />
                       <p>OK, so given all of this, how should you choose the technology for your app?  It depends on your business requirements.    We feel that cross platform tools are a reasonable choice if:</p>
                           <br />
                       <p class="indent">- You’re cost sensitive and want the savings of cross-platform tools</p>
                       <p class="indent">- You definitely plan to release the app on multiple platforms, now or in the future</p>
                       <p class="indent">- You are developing an application that has “normal” business app functionality, which isn’t pushing the envelope of “bleeding edge” design, visual effects, and speed of performance.</p>
                           <br />
                       <p>Actually, we find that many apps meet these characteristics.  Consider a typical business app.  You want to get some data from a server, allow a user to view it on a mobile device, edit it, and save it back on the server.  This is going to be really useful for your users, but in truth, you’re not really pushing the envelope of what’s possible, these days.  And eventually, you’ll probably want the app to have both iOS and Android versions.  So a cross-platform tool is probably a good choice for you.</p>
                           <br />
                       <p>Conversely, if you’re developing something that is really performance intensive and which, therefore, requires the maximum of developer control, you should consider native development.  It’s going to cost you a lot more to develop—almost double, probably--but if your application really demands this then you have no choice.</p>
                           <br />
                       <p>Meanwhile, if you’re creating a game and need “bleeding edge” graphics for it, you can still use a cross-platform tool--Unity.  Unity is a tool that’s great for game development, and you can publish the game to multiple platforms: iOS, Windows, Web, Android, etc.  Each platform requires a little extra work for development and QA, but really, it’s pretty reasonable.</p>
                           <br />
                       <p>So in summary, at Cayuga Mobile, we don’t agree with some in the industry, who say that you need to use native tools, and nothing else.  We feel it’s worth taking the time to think about your application and think about which tools are best, and select one that offers the best mix of capabilities and cost for you.</p>


                       </div>
                   <div class="b-read-all m-collapsed">
                       <a href="#" class="read-all-link b-read-full more"><b>More</b>↓</a>
                       <a href="#" class="read-all-link b-read-full hide"><b>Hide</b>↑</a>
                   </div>
               </li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- end blog -->


<div id="contact" class="parallax-bag-pgd scrollto"  data-token="I2oUz">
    <div class="darker-overlay centered-wrapper contact-padd">
        <div class="aligncenter contact-padd-h1">
                <span>
                    <h1 class="under-h1" style="color:#fff;">CONTACT US</h1>
                </span>
        </div>

        <div class="contact-m-top-content" data-token="SOUSK">
            <div class="float-left alignleft pers-50">
                <div class="contact-left-title">Get in touch with us</div>
                <ul>
                    <li><a href="https://www.facebook.com/CayugaSoft" target="_blank"><div class="soc-color"></div></a></li>
                    <li><a href="http://www.linkedin.com/company/cayugasoft-technologies" target="_blank"><div class="soc-color in"></div></a></li>
                    <!--<li><a href="#"><div class="soc-color tw pad"></div></a></li>-->
                    <!--<li><a href="#"><div class="soc-color gp"></div></a></li>-->
                </ul>
                <div class="clear"></div>
                <div class="contact-left-text">
                    (212) 945-8327<br />
                    Cayugamobile.com<br />
                   <!-- +77-0385 - 1452 - 87<br /> -->
                    info@cayugamobile.com
                </div>
            </div>

            <div class="float-right pers-50">
                <form method="post" class="wpcf7-form pos-rel" novalidate="novalidate" style="width:100%">
                    <div class="percent-one-half"> <br />
                            <span class="wpcf7-form-control-wrap your-name float-left">
                                <input type="text" name="your-name" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Name" /></span><br />
                    </div>
                    <div class="percent-one-half column-last float-right"> <br />
                            <span>
                                <input type="email" name="your-email" value="" size="40"  aria-required="true" aria-invalid="false" placeholder="Email" /></span><br />
                    </div><br />
                        <span>
                            <textarea name="your-message" cols="40" rows="10"  aria-required="true" aria-invalid="false" placeholder="Message"></textarea></span><br />
                    <input type="submit" value="Send" class="button black contact-send-button" /></p>
                    <div class="wpcf7-response-output wpcf7-display-none"></div></form>
            </div>
        </div>
        <div class="clear"></div></div></div>


</div><!--end wrapper-->
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
    /*@font-face {*/
    /*font-family: SourceSansPro-BlackIt;*/
    /*src: url(css/fonts/SourceSansPro-BlackIt.eot);*/
    /*src: url(css/fonts/SourceSansPro-BlackIt.eot?#iefix) format(embedded-opentype),*/
    /*url(css/fonts/SourceSansPro-BlackIt.woff) format(woff),*/
    /*url(css/fonts/SourceSansPro-BlackIt.ttf) format(truetype),*/
    /*url(css/fonts/SourceSansPro-BlackIt.svg#SourceSansPro-BlackIt) format(svg);*/
    /*}*/
    @font-face {
        font-family: SourceSansPro-Bold;
        src: url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Bold.eot);
        src: url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Bold.eot?#iefix) format(embedded-opentype),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Bold.woff) format(woff),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Bold.ttf) format(truetype),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Bold.svg#SourceSansPro-Bold) format(svg);
    }
    /*@font-face {*/
    /*font-family: SourceSansPro-BoldIt;*/
    /*src: url(css/fonts/SourceSansPro-BoldIt.eot);*/
    /*src: url(css/fonts/SourceSansPro-BoldIt.eot?#iefix) format(embedded-opentype),*/
    /*url(css/fonts/SourceSansPro-BoldIt.woff) format(woff),*/
    /*url(css/fonts/SourceSansPro-BoldIt.ttf) format(truetype),*/
    /*url(css/fonts/SourceSansPro-BoldIt.svg#SourceSansPro-BoldIt) format(svg);*/
    /*}*/
    /*@font-face {*/
    /*font-family: SourceSansPro-ExtraLight;*/
    /*src: url(css/fonts/SourceSansPro-ExtraLight.eot);*/
    /*src: url(css/fonts/SourceSansPro-ExtraLight.eot?#iefix) format(embedded-opentype),*/
    /*url(css/fonts/SourceSansPro-ExtraLight.woff) format(woff),*/
    /*url(css/fonts/SourceSansPro-ExtraLight.ttf) format(truetype),*/
    /*url(css/fonts/SourceSansPro-ExtraLight.svg#SourceSansPro-ExtraLight) format(svg);*/
    /*}*/
    /*@font-face {*/
    /*font-family: SourceSansPro-ExtraLightIt;*/
    /*src: url(css/fonts/SourceSansPro-ExtraLightIt.eot);*/
    /*src: url(css/fonts/SourceSansPro-ExtraLightIt.eot?#iefix) format(embedded-opentype),*/
    /*url(css/fonts/SourceSansPro-ExtraLightIt.woff) format(woff),*/
    /*url(css/fonts/SourceSansPro-ExtraLightIt.ttf) format(truetype),*/
    /*url(css/fonts/SourceSansPro-ExtraLightIt.svg#SourceSansPro-ExtraLightIt) format(svg);*/
    /*}*/
    /*@font-face {*/
    /*font-family: SourceSansPro-It;*/
    /*src: url(css/fonts/SourceSansPro-It.eot);*/
    /*src: url(css/fonts/SourceSansPro-It.eot?#iefix) format(embedded-opentype),*/
    /*url(css/fonts/SourceSansPro-It.woff) format(woff),*/
    /*url(css/fonts/SourceSansPro-It.ttf) format(truetype),*/
    /*url(css/fonts/SourceSansPro-It.svg#SourceSansPro-It) format(svg);*/
    /*}*/
    @font-face {
        font-family: SourceSansPro-Light;
        src: url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Light.eot);
        src: url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Light.eot?#iefix) format(embedded-opentype),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Light.woff) format(woff),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Light.ttf) format(truetype),
        url(<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/SourceSansPro-Light.svg#SourceSansPro-Light) format(svg);
    }
    /*@font-face {*/
    /*font-family: SourceSansPro-LightIt;*/
    /*src: url(css/fonts/SourceSansPro-LightIt.eot);*/
    /*src: url(css/fonts/SourceSansPro-LightIt.eot?#iefix) format(embedded-opentype),*/
    /*url(css/fonts/SourceSansPro-LightIt.woff) format(woff),*/
    /*url(css/fonts/SourceSansPro-LightIt.ttf) format(truetype),*/
    /*url(css/fonts/SourceSansPro-LightIt.svg#SourceSansPro-LightIt) format(svg);*/
    /*}*/
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
    /*@font-face {*/
    /*font-family: SourceSansPro-SemiboldIt;*/
    /*src: url(css/fonts/SourceSansPro-SemiboldIt.eot);*/
    /*src: url(css/fonts/SourceSansPro-SemiboldIt.eot?#iefix) format(embedded-opentype),*/
    /*url(css/fonts/SourceSansPro-SemiboldIt.woff) format(woff),*/
    /*url(css/fonts/SourceSansPro-SemiboldIt.ttf) format(truetype),*/
    /*url(css/fonts/SourceSansPro-SemiboldIt.svg#SourceSansPro-SemiboldIt) format(svg);*/
    /*}*/
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
</body>
</html>
