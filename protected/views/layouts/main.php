<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
<!--    <title>Cayuga mobile</title>-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel='stylesheet'  href='<?php echo Yii::app()->request->baseUrl; ?>/css/style.css' type='text/css' media='all' />
    <link rel='stylesheet'  href='<?php echo Yii::app()->request->baseUrl; ?>/css/owl.carousel.css' type='text/css' media='all' />
    <link rel='stylesheet'  href='<?php echo Yii::app()->request->baseUrl; ?>/css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/animate.min.css' type='text/css' media='all' />
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
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
            /*submit form*/
            $('form input[type=submit]').on('click',function()
            {
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
                                alert('Please fill in all fields')
                                return false;
                            }
                        },
                        success: function(responseText) {
                            alert(responseText)
                            if(responseText=="Mail send")
                            {
                                $('form input[type=text],form input[type=email],form textarea').val("")

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
        $(window).resize(function(){ arr_top=scrollMenu();$(window).trigger('scroll')})




    </script>
    <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/custom-loader.js'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.parallax.js'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/custom-navscroll.js'></script>
    <?php $this->pageTitle="About | Mobile App Design &amp; Development Company in NYC - Fueled";?>
    <meta name="description" content="Cayuga Mobile is a team of mobile software development experts, dedicated to creating knock-out mobile apps, at a reasonable cost">
    <meta name="keywords" content="mobile apps, mobile application development company, mobile application developer, mobile application development, mobile design, iphone app development, Android app development,Android app, iphone app, iOS app, mobile website development, iphone app development, iOS app development, Android app development">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body  class="home vc_responsive">

<div id="preloader"></div>

<header id="header">
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
                    <li class="menu-item current-menu-item"><a href="#contact" class="external"><span>Contact</span></a></li>
                </ul>

            </nav><!--end navigation-->
        </div>
        <div class="clear"></div>
    </div><!--end centered-wrapper-->
</header>

<div id="wrapper">

<div id="home" class="wpb_row">
    <div class="first-block">
        <div class="main-back"></div>
        <div class="centered-wrapper f-block-table">
            <div class="aligncenter text-transform-uppercase f-block-t-c">
                <div class="under-h1">
                    <h1 class="h1-margin-bottom">WE ARE CAYUGA MOBILE</h1>
                </div>
                <div class="f-block-under-h1-text">We are a talanted group of mobile development experts, who can help take your idea from concept to the App Store or Play Store in just a few weeks!</div>
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
            <div class="second-padd">
                <div class="aligncenter">
                    <div class="under-h1">
                        <h1 class="second-h1">WHY YOU SHOULD CHOOSE US?</h1>
                    </div>
                    <div class="f-block-under-h1-text second-under-h1">Cayuga Mobile does outstanding mobile software development work, at a competitive price. </div>
                </div>
                <div class="second-table-block">
                    <div class="s-table-block-img">
                        <img src="images/many.png">
                    </div>
                    <div class="s-table-block-text">
                        <div class="s-table-block-title">Why can we beat most others on price, while maintaining a strong quality level?</div>
                        <div class="s-table-block-text-t">We have our own staff of over twenty people, providing us with both a cost advantage and a control advantage over other mobile development companies, who are frequently resource constrained.</div>
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
                                    <div class="title">Internet of Thing</div>
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
                <div class="testimonial-item">
                    <div class="mobile-hide">
                        <img src="images/quality-ass.png">
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
                <div class="testimonial-item" >
                    <div class="mobile-hide">
                        <img src="images/quality-ass.png">
                        <div class="client-work-slide-title-padd">
                            <div class="client-work-slide-title">Social Game</div>
                        </div>
                    </div>
                    <div>
                        <img src="images/phone-game.png">
                    </div>
                    <div>
                        <div class="mobile-show">
                            <img src="images/gamepad.png">
                            <div class="client-work-slide-title-padd">
                                <div class="client-work-slide-title">Social Game</div>
                            </div>
                        </div>

                        <div class="client-work-slide-text">A mobile word game that encourages people to socialize and play with friends. Users can participate in tournaments or challenge their friends to a game. Prizes and social media sharing make the game viral and fun. The iOS version will be out soon, followed by an Android version.</div>

                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- end client work -->
<div class="clear"></div>

<!-- our team -->
<div id="team" class="lighter-overlay client-work-padd">
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

                        <div class="client-work-slide-text" style="text-align: justify">Mike has been involved with New York area venture-backed software companies since the late 1990's, as a VP of Product, and CTO. He still remembers when VCs were (briefly) valuing companies based on a multiple of the number of engineers they had.
                            Today, Mike's interests include mobile business applications (especially in the area of logistics and supply-chain management), mobile gaming, and the Internet of Things.</div>

                    </div>

                </div>
                <div class="testimonial-item">
                    <div>
                        <img src="images/eugeniy.png">
                        <br /><br />
                        <div class="team-people-name">Eugen Polyansky</div>
                        <div class="team-people-position">COO and Co-Founde</div>

                    </div>
                    <div>
                        <div class="client-work-slide-text" style="text-align: justify">Eugene is a design maven and dreamer. He has a rare combination of technology expertise and design expertise, having once worked as a creative designer in the Advertising industry.  He's also an experienced IT project manager and leads our development team. Today, Eugene spends much of his time on building our team and optimizing our development processes.</div>

                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>


<div id="contact" class="parallax-bag-pgd scrollto"  data-token="I2oUz">
    <div class="darker-overlay centered-wrapper contact-padd">
        <div class="aligncenter contact-padd-h1">
                <span>
                    <h1 class="under-h1" style="color:#fff;">CONTACT US</h1>
                </span>
        </div>

        <div class="contact-m-top-content" data-token="SOUSK">
            <div class="float-left">
                <div class="contact-left-title">Get in touch with us</div>
                <ul>
                    <li><a href="https://www.facebook.com/CayugaSoft" target="_blank"><div class="soc-color"></div></a></li>
                    <li><a href="http://www.linkedin.com/company/cayugasoft-technologies" target="_blank"><div class="soc-color in"></div></a></li>
                    <!--<li><a href="#"><div class="soc-color tw pad"></div></a></li>-->
                    <!--<li><a href="#"><div class="soc-color gp"></div></a></li>-->
                </ul>
                <div class="clear"></div>
                <div class="contact-left-text">
                    Cayugamobile.com<br />
                   <!-- +77-0385 - 1452 - 87<br /> -->
                    info@cayugamobile.com
                </div>
            </div>

            <div class="float-right">
                <form action="/#wpcf7-f69-p82-o1" method="post" class="wpcf7-form" novalidate="novalidate">
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
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.min.js?ver=3.50.0-2014.02.05'></script>

<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/scripts.js?ver=3.7.2'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/easing.js'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/hoverIntent.js?ver=r7'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/smoothScroll.js?ver=1.2.1'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.fitvids.js?ver=1.0.3'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.scrollTo.js?ver=1.4.3'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.nav.js?ver=2.2.0'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/retina.min.js?ver=1.1.0'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/owl.carousel.min.js?ver=1.31'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.isotope.min.js?ver=1.0'></script>

<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/custom-nav.js?ver=1.31'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    //    var dt_parallax_qzLX0 = {"id":"fog"};
    var dt_parallax_NNipg = {"id":"kbd"};
    var dt_parallax_SxcFx = {"id":"bgo"};
    var dt_parallax_xlmev = {"id":"fqf"};
    var dt_parallax_bBvRH = {"id":"dvm"};
    var dt_parallax_wDVKD = {"id":"ycd"};
    var dt_parallax_U5TtP = {"id":"qxf"};
    var dt_parallax_LItlP = {"id":"use"};
    var dt_parallax_8kvft = {"id":"eqm"};
    var dt_parallax_QKv0G = {"id":"eft"};
    var dt_parallax_8fmml = {"id":"xxe"};
    var dt_parallax_8xMIt = {"id":"stf"};
    var dt_parallax_UBVcT = {"id":"pzv"};
    var dt_parallax_kqugZ = {"id":"lcr"};
    var dt_parallax_XwHQc = {"id":"ner"};
    var dt_parallax_KtEcK = {"id":"isk"};
    var dt_parallax_L1TGJ = {"id":"ank"};
    var dt_parallax_ghDkS = {"id":"zdy"};
    var dt_parallax_KbbxJ = {"id":"uss"};
    var dt_parallax_nUIem = {"id":"nwi"};
    var dt_parallax_LPdwb = {"id":"kpd"};
    var dt_parallax_tFFxK = {"id":"kcy"};
    var dt_parallax_B5e7A = {"id":"wnn"};
    var dt_parallax_54E2S = {"id":"gmj"};
    var dt_parallax_jdUI3 = {"id":"yxs"};
    var dt_parallax_KM7BV = {"id":"zih"};
    var dt_parallax_I2oUz = {"id":"pgd"};
    var dt_parallax_vfDCA = {"id":"rgj"};
    var dt_parallax_SOUSK = {"id":"rvw"};
    var dt_parallax_AVtOm = {"id":"fmq"};
    /* ]]> */
</script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/custom-parallax.js?ver=1.0'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/waypoints.min.js?ver=4.0.2'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/custom-waypoints.js?ver=2.0.4'></script>

<script type='text/javascript'>
    /* <![CDATA[ */
    var dt_testimonials_dTfaN = {"id":"pqu"};
    var dt_testimonials_dTfaN2 = {"id":"pqu2"};
    /* ]]> */
</script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/custom-testimonials.js?ver=1.0'></script>
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

</body>
</html>
