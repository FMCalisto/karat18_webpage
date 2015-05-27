<?php
/**
* @package AccessPress Staple
* 
* 
* @name Demo Page
*/ 
$image_path = get_template_directory_uri().'/images/demo/';
$image_path2 = get_template_directory_uri().'/images/demo/';

?>

<section class="slider-wrapper">
<section class="slider" id="main-slider">
<script type="text/javascript">
jQuery(function($){
$('#main-slider .bx-slider').bxSlider({
//adaptiveHeight: true,
pager: true,
controls: true,
mode: 'fade',
auto : 'true',
pause: '5000',
speed: '1500'
});
});
</script>
<div class="bx-wrapper" style="max-width: 100%;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 637px;"><div class="bx-slider" style="width: auto; position: relative;">
<div class="slides" style="float: none; list-style: outside none none; position: absolute; width: 1583px; z-index: 0; display: none;">
<img alt="A multipurpose theme" src="<?php echo $image_path.'bannernew5.jpg'?>">
<div class="caption-wrapper">  
<div class="ak-container">
<div class="slider-caption">
<div class="mid-content">
<div class="small-caption"> <?php _e('A multipurpose theme','accesspress-staple')?></div>
<h1 class="caption-title"><?php _e('AccessPress','accesspress-staple')?><span> <?php _e('Staple','accesspress-staple')?></span> </h1>
<div class="caption-description"><?php _e('Feature pack | easy to use | modern look','accesspress-staple')?></div>
<a class="slider-btn" href="http://accesspressthemes.com/accesspress-staple/a-multipurpose-theme/"> Details </a>
</div>
</div>
</div>
</div>
</div>
<div class="slides" style="float: none; list-style: outside none none; position: absolute; width: 1583px; z-index: 0; display: none;">
<img alt="A fun theme" src="<?php echo $image_path.'bannernew1.jpg'; ?>">
<div class="caption-wrapper">  
<div class="ak-container">
<div class="slider-caption">
<div class="mid-content">
<div class="small-caption"> <?php _e('A fun theme','accesspress-staple')?> </div>
<h1 class="caption-title"><?php _e('Fun yet','accesspress-staple')?><span> <?php _e('Professional!','accesspress-staple')?></span> </h1>
<div class="caption-description"><?php _e('CSS3 animation, HTML5 template, add some excitements on your website.','accesspress-staple')?></div>
<a class="slider-btn" href="#"><?php _e('Details', 'accesspress-staple');?> </a>
</div>
</div>
</div>
</div>
</div>

</div></div>



</section>
</section>


<section class="about">
<div class="ak-container">
<h2 class="title home-title"><?php _e('AccessPress Themes','accesspress-staple')?></h2>
<div class="about-excerpt home-description"><p><?php _e('With our years of experience, we&#146;ve developed this theme and given back to this awesome WordPress community. It is feature rich, multi purpose and flexible responsive theme Suitable for Agencies, Small Biz, Corporates, Bloggers &ndash; Anyone and Everyone!','accesspress-staple')?></p>
</div>
<figure data-wow-delay="0.8s" class="about-img wow fadeInLeft animated" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
<img alt="AccessPress Themes" src="<?php echo $image_path.'about-banner1.jpg'; ?>">              </figure>
<div data-wow-delay="0.5s" class="btn-wrapper wow pulse animated" style="visibility: visible; animation-delay: 0.5s; animation-name: pulse;"><a class="btn" href="http://accesspressthemes.com/accesspress-staple/accesspress-themes/">Know more...</a></div>
</div>
</section>
<section data-wow-delay="0.8s" class="our-services wow fadeInUp animated animated" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
<div class="ak-container">  
<h2 class="title home-title"><?php _e('Our Services','accesspress-staple')?></h2>
<div class="services-desc home-description"><?php _e('You&#146;ll <strong>promote your services</strong> here. Put anything here and control 100% from back-end editor!','accesspress-staple')?></div>
<div class="service-block-wrapper ">
<div class="service-1 service-block">
<figure class="service-icons">
<a href="http://accesspressthemes.com/accesspress-staple/our-services/" class="">
<img alt="Consulting" src="<?php echo $image_path.'child-17387_1920-279x203.jpg'; ?>">                        </a>
</figure>
<div class="service-title">
<?php _e('Consulting','accesspress-staple')?>                    </div>
<div class="service-content">
<?php _e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. ','accesspress-staple')?>                   </div>
</div>
<div class="service-2 service-block">
<figure class="service-icons">
<a href="http://accesspressthemes.com/accesspress-staple/graphics-design/" class="">
<img alt="Graphics solution" src="<?php echo $image_path.'technology-298256-279x203.jpg'; ?>">                        </a>
</figure>
<div class="service-title">
<?php _e('Graphics solution','accesspress-staple')?>                    </div>
<div class="service-content">
<?php _e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.','accesspress-staple')?>                    </div>
</div>
<div class="service-3 service-block">
<figure class="service-icons">
<a href="http://accesspressthemes.com/accesspress-staple/market-analysis/" class="">
<img alt="Market Analysis" src="<?php echo $image_path.'team-279x203.jpg'; ?>">                        </a>
</figure>
<div class="service-title">
<?php _e('Market Analysis','accesspress-staple')?>                    </div>
<div class="service-content">
<?php _e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.','accesspress-staple')?>                    </div>
</div>
<div class="service-4 service-block">
<figure class="service-icons">
<a href="http://accesspressthemes.com/accesspress-staple/app-development/" class="">
<img alt="Mobile solution" src="<?php echo $image_path.'killswitch-279x203.jpg'; ?>">                        </a>
</figure>
<div class="service-title">
<?php _e('Mobile solution','accesspress-staple')?>                    </div>
<div class="service-content">
<?php _e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.','accesspress-staple')?>                    </div>
</div>

<div class="clearfix"> </div>
<div data-wow-delay="0.5s" class="btn-wrapper service-btn wow pulse animated" style="visibility: visible; animation-delay: 0.5s; animation-name: pulse;"><a href="#"><?php _e('More','accesspress-staple')?></a></div>

</div> 
</div>
</section>
<section class="pricing-table">
<div class="ak-container">
<div class="topic home-title"><?php _e('Pricing Table','accesspress-staple')?></div>
<div class="pricing-table-desc home-description"><p style="text-align: center;"><strong><?php _e('You can put pricing table here.','accesspress-staple')?> </strong></p>
<p style="text-align: center;"><?php _e('You have full control over it, use it for price comparison or feature comparison!','accesspress-staple')?></p></div>
<div class="price-table-wrapper"> 
<div data-wow-delay="1s" class="table1 price-table wow fadeInLeft animated" style="visibility: visible; animation-delay: 1s; animation-name: fadeInLeft;">
<div class="title-price">
<span class="pricing-type"><?php _e('Basic','accesspress-staple')?></span>
<span class="price"><span class="dollar"><?php _e('$','accesspress-staple')?></span><?php _e('100','accesspress-staple')?></span>
</div>
<div class="table-content">
<ul>
<li><?php _e('5 projects','accesspress-staple')?></li>
<li><?php _e('10 GB Storage','accesspress-staple')?></li>
<li><?php _e('2 Users','accesspress-staple')?></li>
<li><?php _e('No Time Tracking','accesspress-staple')?></li>
<li><?php _e('Basic Security','accesspress-staple')?></li>
</ul>                        
</div>
<div class="product-link">
<a href="#"> <span> <i class="fa fa-thumbs-o-up"></i> </span><?php _e('Start Trial','accesspress-staple')?></a>
</div>
</div>

<div data-wow-delay="1s" class="table2 price-table wow fadeInUp animated" style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;">
<div class="title-price">
<span class="pricing-type"><?php _e('Premium','accesspress-staple')?></span>
<span class="price"><span class="dollar"><?php _e('$','accesspress-staple')?></span><?php _e('100','accesspress-staple')?></span>
</div>
<div class="table-content">
<ul>
<li><?php _e('5 projects','accesspress-staple')?></li>
<li><?php _e('10 GB Storage','accesspress-staple')?></li>
<li><?php _e('2 Users','accesspress-staple')?></li>
<li><?php _e('No Time Tracking','accesspress-staple')?></li>
<li><?php _e('Basic Security','accesspress-staple')?></li>
</ul>                        
</div>
<div class="product-link">
<a href="#"> <span> <i class="fa fa-thumbs-o-up"></i> </span><?php _e('Start Trail','accesspress-staple')?></a>
</div>
</div>

<div data-wow-delay="1s" class="table3 price-table wow fadeInRight animated" style="visibility: visible; animation-delay: 1s; animation-name: fadeInRight;">
<div class="title-price">
<span class="pricing-type"><?php _e('Free','accesspress-staple')?></span>
<span class="price"><span class="dollar"><?php _e('$','accesspress-staple')?></span><?php _e('0','accesspress-staple')?></span>
</div>
<div class="table-content">
<ul>
<li><?php _e('5 projects','accesspress-staple')?></li>
<li><?php _e('10 GB Storage','accesspress-staple')?></li>
<li><?php _e('2 Users','accesspress-staple')?></li>
<li><?php _e('No Time Tracking','accesspress-staple')?></li>
<li><?php _e('Basic Security','accesspress-staple')?></li>
</ul>                        
</div>
<div class="product-link">
<a href="#"> <span> <i class="fa fa-thumbs-o-up"></i> </span><?php _e('Download','accesspress-staple')?></a>
</div>
</div>
</div>
</div>
</section>
<section class="awesome-feature">
<div class="ak-container">    
<h2 class="title home-title"><?php _e('Awesome Feature','accesspress-staple')?></h2>
<div class="awesome-feature-desc home-description"><?php _e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, aliquet nec, vulputate eget, arcu. In enim justo.','accesspress-staple')?></div>
<div class="clearfix"> </div>
<div data-wow-delay="0.5s" class="aw-block-wrapper wow fadeInUp animated" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
<div class="aw-left">
<div class="aw-wrapper clearfix">
<div class="aw-content">
<div class="aw-title"><?php _e('Consulting','accesspress-staple')?></div>
<div class="aw-excerpt"><?php _e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.','accesspress-staple')?></div>
</div>
<figure class="awesome-icons">
<span> 
<a href="http://accesspressthemes.com/accesspress-staple/our-services/">
<img alt="Consulting" src="<?php echo $image_path.'child-17387_1920-279x203.jpg'; ?>">                        </a>
</span>
</figure>
</div>
</div>
<div class="aw-right">
<div class="aw-wrapper clearfix">
<div class="aw-content">
<div class="aw-title"><?php _e('Graphics solution','accesspress-staple')?></div>
<div class="aw-excerpt"><?php _e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.','accesspress-staple')?></div>
</div>
<figure class="awesome-icons">
<span> 
<a href="http://accesspressthemes.com/accesspress-staple/graphics-design/">
<img alt="Graphics solution" src="<?php echo $image_path.'technology-298256-279x203.jpg'; ?>">                        </a>
</span>
</figure>
</div>
</div>
<div class="aw-left">
<div class="aw-wrapper clearfix">
<div class="aw-content">
<div class="aw-title"><?php _e('Market Analysis','accesspress-staple')?></div>
<div class="aw-excerpt"><?php _e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.','accesspress-staple')?></div>
</div>
<figure class="awesome-icons">
<span> 
<a href="http://accesspressthemes.com/accesspress-staple/market-analysis/">
<img alt="Market Analysis" src="<?php echo $image_path.'team-279x203.jpg'; ?>">                        </a>
</span>
</figure>
</div>
</div>
<div class="aw-right">
<div class="aw-wrapper clearfix">
<div class="aw-content">
<div class="aw-title"><?php _e('Mobile solution','accesspress-staple')?></div>
<div class="aw-excerpt"><?php _e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.','accesspress-staple')?></div>
</div>
<figure class="awesome-icons">
<span> 
<a href="http://accesspressthemes.com/accesspress-staple/app-development/">
<img alt="Mobile solution" src="<?php echo $image_path.'killswitch-279x203.jpg'; ?>">                        </a>
</span>
</figure>
</div>
</div>
</div>
<div class="clearfix"></div>

<div data-wow-delay="0.5s" class="btn-wrapper wow pulse animated" style="visibility: visible; animation-delay: 0.5s; animation-name: pulse;"><a class="btn" href="#"><?php _e('Details','accesspress-staple')?></a></div> 

</div>
</section>
<section class="portfolio">
<div class="ak-container">
<h2 class="title home-title"><?php _e('Portfolio','accesspress-staple')?></h2>
<div class="port-desc home-description"><?php _e('You can showcase your awesome portfolio here. You can control the text here, and display your work beautifully below! If the text is long - it will look like this - &nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.','accesspress-staple')?></div>
</div>
<div class="masinory" id="portfolio-grid">
<div data-wow-delay="0.8s" class="port-wrap wow fadeInUp animated animated" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
<figure class="portfolio-image">
<img alt="We have gadgets" src="<?php echo $image_path.'imac-464739_1920-550x400.jpg'; ?>">              </figure>
<figcaption class="portfolio-content">
<div class="portfolio-content-wrapper">
<a class="read-more" href="http://accesspressthemes.com/accesspress-staple/we-have-gadgets/ "> <i class="fa fa-link"> </i> </a>
<div class="port-title"><?php _e('We have gadgets','accesspress-staple')?></div>
<div class="port-content"><?php _e(' Lorem ipsum dolor sit amet, consectetur adipiscin...','accesspress-staple')?></div>
</div>
</figcaption>
</div>
<div data-wow-delay="0.8s" class="port-wrap wow fadeInUp animated animated" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
<figure class="portfolio-image">
<img alt="Products on Table" src="<?php echo $image_path.'home-office-336378_1920-550x400.jpg'; ?>">              </figure>
<figcaption class="portfolio-content">
<div class="portfolio-content-wrapper">
<a class="read-more" href="http://accesspressthemes.com/accesspress-staple/products-on-table/ "> <i class="fa fa-link"> </i> </a>
<div class="port-title"><?php _e('Products on Table','accesspress-staple')?></div>
<div class="port-content"> <?php _e('Lorem ipsum dolor sit amet, consectetur adipiscin...','accesspress-staple')?></div>
</div>
</figcaption>
</div>
<div data-wow-delay="0.8s" class="port-wrap wow fadeInUp animated animated" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
<figure class="portfolio-image">
<img alt="In a day" src="<?php echo $image_path.'budapest-495752_1920-550x400.jpg'; ?>">              </figure>
<figcaption class="portfolio-content">
<div class="portfolio-content-wrapper">
<a class="read-more" href="http://accesspressthemes.com/accesspress-staple/in-a-day/ "> <i class="fa fa-link"> </i> </a>
<div class="port-title"><?php _e('In a day','accesspress-staple')?></div>
<div class="port-content"> <?php _e('Lorem ipsum dolor sit amet, consectetur adipiscin...','accesspress-staple')?></div>
</div>
</figcaption>
</div>
<div data-wow-delay="0.8s" class="port-wrap wow fadeInUp animated animated" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
<figure class="portfolio-image">
<img alt="porftolio6" src="<?php echo $image_path.'mountain-448108_1920-550x400.jpg'; ?>">              </figure>
<figcaption class="portfolio-content">
<div class="portfolio-content-wrapper">
<a class="read-more" href="http://accesspressthemes.com/accesspress-staple/porftolio6/ "> <i class="fa fa-link"> </i> </a>
<div class="port-title"><?php _e('porftolio6','accesspress-staple')?></div>
<div class="port-content"></div>
</div>
</figcaption>
</div>

</div>
</section>


<section class="clients-logo">
<div class="ak-container">
<h2 class="clients-logo-title"><?php _e('Our Clients','accesspress-staple')?></h2>
<div class="bx-wrapper" style="max-width: 1070px; margin: 0px auto;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 72px;"><div class="clients-logo-wrapper scroll" style="width: 815%; position: relative; transition-duration: 0s; transform: translate3d(-1080px, 0px, 0px);"><div class="client-slider bx-clone" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo1.png'; ?>">
</a>
</div><div class="client-slider bx-clone" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo2.png'; ?>">
</a>
</div><div class="client-slider bx-clone" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo3.png'; ?>">
</a>
</div><div class="client-slider bx-clone" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo4.png'; ?>">
</a>
</div><div class="client-slider bx-clone" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo5.png'; ?>">
</a>
</div><div class="client-slider bx-clone" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo6.png'; ?>">
</a>
</div>
<div class="client-slider" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo1.png'; ?>">
</a>
</div>
<div class="client-slider" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo2.png'; ?>">
</a>
</div>
<div class="client-slider" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo3.png'; ?>">
</a>
</div>
<div class="client-slider" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo4.png'; ?>">
</a>
</div>
<div class="client-slider" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo5.png'; ?>">
</a>
</div>
<div class="client-slider" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo6.png'; ?>">
</a>
</div>
<div class="client-slider bx-clone" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo1.png'; ?>">
</a>
</div><div class="client-slider bx-clone" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo2.png'; ?>">
</a>
</div><div class="client-slider bx-clone" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo3.png'; ?>">
</a>
</div><div class="client-slider bx-clone" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo4.png'; ?>">
</a>
</div><div class="client-slider bx-clone" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo5.png'; ?>">
</a>
</div><div class="client-slider bx-clone" style="float: left; list-style: outside none none; position: relative; width: 170px; margin-right: 10px;">
<a href="">
<img src="<?php echo $image_path2.'logo6.png'; ?>">
</a>
</div></div></div></div>
</div>
</section>
<section class="call-to-action">
<div class="ak-container">
<h2 class="title home-title"><?php _e('About Access Press Staple','accesspress-staple')?></h2>
<div class="call-to-action-desc home-description"><?php _e('<strong>AccesssPresss Staple</strong> is feature rich, multi-purpose and flexible responsive theme suitable for Agencies, Small Biz, Corporates, Bloggers &ndash; Anyone and Everyone! The intuitive theme options let you manage all the possible options/features of the theme. You can use it to create your next superb website in no time and all for <strong>FREE</strong>','accesspress-staple')?></div>
<div data-wow-delay="0.5s" class="cta-link wow shake animated" style="visibility: visible; animation-delay: 0.5s; animation-name: shake;"><a href="https://accesspressthemes.com/wordpress-themes/accesspress-staple/">Get your copy now!</a></div>
</div>
</section>
<section class="our-team-member">
<div class="ak-container">
<h2 class="title home-title"><?php _e('Our Team','accesspress-staple')?></h2>
<div data-wow-delay="0.8s" class="team-block wow fadeInLeft animated animated" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
<figure class="team-image">
<img alt="Mike Ross" src="<?php echo $image_path.'mike-238x238.png'; ?>">                <div class="team-hover">
<div class="team-hover-icon"><a class="fa fa-link" <i="" href="http://accesspressthemes.com/accesspress-staple/mike-ross-3/">  </a> </div>
<div class="team-hover-text"><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pha...','accesspress-staple')?></div>
</div>
</figure>
<div class="team-name"><?php _e('Mike Ross','accesspress-staple')?></div>

</div>
<div data-wow-delay="0.8s" class="team-block wow fadeInLeft animated animated" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
<figure class="team-image">
<img alt="Mike Ross" src="<?php echo $image_path.'mike-2-238x238.png'; ?>">                <div class="team-hover">
<div class="team-hover-icon"><a class="fa fa-link" <i="" href="http://accesspressthemes.com/accesspress-staple/mike-ross-2/">  </a> </div>
<div class="team-hover-text"><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pha...','accesspress-staple')?></div>
</div>
</figure>
<div class="team-name"><?php _e('Mike Ross','accesspress-staple')?></div>

</div>
<div data-wow-delay="0.8s" class="team-block wow fadeInRight animated animated" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInRight;">
<figure class="team-image">
<img alt="Mike Ross" src="<?php echo $image_path.'jim-238x238.png'; ?>">                <div class="team-hover">
<div class="team-hover-icon"><a class="fa fa-link" <i="" href="http://accesspressthemes.com/accesspress-staple/mike-ross/">  </a> </div>
<div class="team-hover-text"><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pha...','accesspress-staple')?></div>
</div>
</figure>
<div class="team-name"><?php _e('Mike Ross','accesspress-staple')?></div>

</div>
<div data-wow-delay="0.8s" class="team-block wow fadeInRight animated animated" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInRight;">
<figure class="team-image">
<img alt="Jim Terrel" src="<?php echo $image_path.'jim-238x238.png'; ?>">                <div class="team-hover">
<div class="team-hover-icon"><a class="fa fa-link" <i="" href="http://accesspressthemes.com/accesspress-staple/jim-terrel/">  </a> </div>
<div class="team-hover-text"><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pha...','accesspress-staple')?></div>
</div>
</figure>
<div class="team-name"><?php _e('Jim Terrel','accesspress-staple')?></div>

</div>
</div>
</section>
<section class="stat-counter">
<div class="ak-container">
<div class="stat-counter-title"><?php _e('Fun Facts','accesspress-staple')?></div>
<div class="stat-counter-desc"><strong><?php _e('I am the beautiful&nbsp;stat counter!</strong> You can put any statistics of your company here, the fun one or serious one :) The longer text in this section will look like this - Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.','accesspress-staple')?></div>
<div class="statcounters statcounter-1">
<div class="statcounter-circle">
<div class="inner-circle"><h2><span class="counter"><?php _e('50000','accesspress-staple')?></span></h2></div>
<div class="stat-fa"><i class="fa fa-code"></i></div>
<div class="coutner-title"><h2><?php _e('Code Lined','accesspress-staple')?></h2></div>
</div>
</div>
<div class="statcounters statcounter-2">
<div class="statcounter-circle">
<div class="inner-circle"><h2><span class="counter"><?php _e('20','accesspress-staple')?></span></h2></div>
<div class="stat-fa"><i class="fa fa-beer"></i></div>
<div class="coutner-title"><h2><?php _e('Beer Ordered','accesspress-staple')?></h2></div>
</div>
</div>

<div class="statcounters statcounter-3">
<div class="statcounter-circle">
<div class="inner-circle"><h2><span class="counter"><?php _e('100','accesspress-staple')?></span></h2></div>
<div class="stat-fa"><i class="fa fa-rocket"></i></div>
<div class="coutner-title"><h2><?php _e('Completed Projects','accesspress-staple')?></h2></div>
</div>
</div>

<div class="statcounters statcounter-4">
<div class="statcounter-circle">
<div class="inner-circle"><h2><span class="counter"><?php _e('80','accesspress-staple')?></span></h2></div>
<div class="stat-fa"><i class="fa fa-trophy"></i></div>
<div class="coutner-title"><h2><?php _e('Winning Awards','accesspress-staple')?></h2></div>
</div>
</div>

</div>
</section>


<section data-wow-delay="0.8s" class="blogs wow fadeInUp animated animated" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
<div class="ak-container">
<div class="blog-title"><?php _e('Blogs','accesspress-staple')?></div>
<div class="blog-desc"><strong><?php _e('Do you love to blog?</strong> This is blog layout to show your latest 3 blogs and more will be displayed on a separate page with beautiful&nbsp; blog layout.','accesspress-staple')?></div>
<div class="blog-wrap clearfix">
<div class="blog-in-wrap">
<div class="blog-image"><img alt="Give us that" src="<?php echo $image_path.'home-office-438386_1920.jpg'; ?>"></div>
<div class="blog-date"><?php _e('30 Nov','accesspress-staple')?></div>
<div class="blog-title-comment">
<div class="blog-single-title"><?php _e('Give us that','accesspress-staple')?></div>
<a href="http://accesspressthemes.com/accesspress-staple/author/admin/"><div class="blog-author"><i class="fa fa-user"></i><?php _e('adminaccess','accesspress-staple')?></div></a>
<div class="blog-comment">
<span class="comments-link"><a title="Comment on Give us that" href="http://accesspressthemes.com/accesspress-staple/give-us-that/#respond"><?php _e('No comment','accesspress-staple')?></a></span>
</div>
</div>
<div class="blog-content"><?php _e(' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam commodo dignissim dolor sit amet egestas. Sed pulvinar met...                    <span><a href="http://accesspressthemes.com/accesspress-staple/give-us-that/">More blogs...','accesspress-staple')?></a></span>
</div>
</div>
<div class="blog-in-wrap">
<div class="blog-image"><img alt="Consisting with Technology" src="<?php echo $image_path.'home-office-336378_1920.jpg'; ?>"></div>
<div class="blog-date"><?php _e('29 Nov','accesspress-staple')?></div>
<div class="blog-title-comment">
<div class="blog-single-title"><?php _e('Consisting with Technology','accesspress-staple')?></div>
<a href="http://accesspressthemes.com/accesspress-staple/author/admin/"><div class="blog-author"><i class="fa fa-user"></i><?php _e('adminaccess','accesspress-staple')?></div></a>
<div class="blog-comment">
<span class="comments-link"><a title="Comment on Consisting with Technology" href="http://accesspressthemes.com/accesspress-staple/consisting-with-technology/#respond"><?php _e('No comment','accesspress-staple')?></a></span>
</div>
</div>
<div class="blog-content"><?php _e(' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam commodo dignissim dolor sit amet egestas. Sed pulvinar met...','accesspress-staple')?>                    <span><a href="http://accesspressthemes.com/accesspress-staple/consisting-with-technology/">More blogs...</a></span>
</div>
</div>
<div class="blog-in-wrap">
<div class="blog-image"><img alt="The Inline Product" src="<?php echo $image_path.'home-office-336581.jpg'; ?>"></div>
<div class="blog-date"><?php _e('27 Nov','accesspress-staple')?></div>
<div class="blog-title-comment">
<div class="blog-single-title"><?php _e('The Inline Product','accesspress-staple')?></div>
<a href="http://accesspressthemes.com/accesspress-staple/author/admin/"><div class="blog-author"><i class="fa fa-user"></i><?php _e('adminaccess','accesspress-staple')?></div></a>
<div class="blog-comment">
<span class="comments-link"><a title="Comment on The Inline Product" href="http://accesspressthemes.com/accesspress-staple/the-inline-product/#respond"><?php _e('No comment','accesspress-staple')?></a></span>
</div>
</div>
<div class="blog-content"> <?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam commodo dignissim dolor sit amet egestas. Sed pulvinar met...  ','accesspress-staple')?>                  
<span><a href="http://accesspressthemes.com/accesspress-staple/the-inline-product/"><?php _e('More blogs...','accesspress-staple')?></a></span>
</div>
</div>
</div>


<div data-wow-delay="0.5s" class="btn-wrapper wow pulse animated animated" style="visibility: visible; animation-delay: 0.5s; animation-name: pulse;"><a class="btn" href="http://accesspressthemes.com/accesspress-staple/category/blog/">Details</a></div> 

</div> 
</section>

<script>
jQuery(document).ready(function($) {
$('.testimonial-slider').bxSlider({
//adaptiveHeight: true,
pager:true,
controls: false,
auto : 'true', 
});});
</script>
<section class="testimonial">
<div class="ak-container">
<div class="testimonial-title"><?php _e('What our client Says','accesspress-staple')?></div>
<div class="bx-wrapper" style="max-width: 100%;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 120px;"><div class="testimonial-slider" style="width: 515%; position: relative; transition-duration: 0s; transform: translate3d(-1178px, 0px, 0px);"><div class="tm-slider bx-clone" style="float: left; list-style: outside none none; position: relative; width: 1178px;">
<?php _e(' Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.','accesspress-staple')?>                    
<div class="title-test"> <?php _e('Ryan Wilson, CEO &ndash; ABC Company','accesspress-staple')?> </div>

</div>

<div class="tm-slider" style="float: left; list-style: outside none none; position: relative; width: 1178px;">
<?php _e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.','accesspress-staple')?>                    
<div class="title-test"> <?php _e('Ryan Wilson, CEO &ndash; ABC Company ','accesspress-staple')?></div>

</div>
<div class="tm-slider bx-clone" style="float: left; list-style: outside none none; position: relative; width: 1178px;">
<?php _e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit.   ','accesspress-staple')?>                 
<div class="title-test"> <?php _e('Jimmy Stevens ','accesspress-staple')?></div>

</div></div></div><div class="bx-controls bx-has-pager"><div class="bx-pager bx-default-pager"><div class="bx-pager-item"><a class="bx-pager-link active" data-slide-index="0" href=""></a></div><div class="bx-pager-item"><a class="bx-pager-link" data-slide-index="1" href=""></a></div><div class="bx-pager-item"><a class="bx-pager-link" data-slide-index="2" href=""></a></div></div></div>
</div>
</section>