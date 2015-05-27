jQuery(document).ready(function($) {
    $('.testimonial-slider').bxSlider({
					//adaptiveHeight: true,
					pager:true,
					controls: false,
					auto : 'true', 
					});

    $('.ak_footer_social .social-icons > a').each(function(){
    	$(this).wrap('<span></span>');
    });
    
    //Search Box Toogle
    $('.search-icon .fa-search').click(function(){
    $('.ak-search').slideToggle('slow');
    

  });

    // $('.ak_footer_social .social-icons').on('hover','span',function(){
    //   if($(this).children('a').hasClass('animated subtleBounce')){
    //     $(this).children('a').removeClass('animated subtleBounce');
    //   }else{
    //     $(this).children('a').addClass('animated subtleBounce');
    //   }
    // });
  
    $('.ak_footer_social .social-icons a').hover(function() {
      $(this).addClass('animated subtleBounce');
    }, function() {
      $(this).removeClass('animated subtleBounce');
    });

    $('.our-services .service-icons a').hover(function() {
      $(this).addClass('animated pulse');
    }, function() {
      $(this).removeClass('animated pulse');
    });

     $('.error404 .number404').addClass('animated bounce');


    $('.scroll').bxSlider({
        pager:false,
		controls: true,
		auto : 'true',
        minSlides: 2,
        maxSlides: 6,
        slideWidth: 170,
        slideMargin: 10   
    });
    
     
     $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
    

    $('.menu-toggle').click(function() {
      $('.menu-main-menu-container').toggle('slow');
    });
    $('#ak-top').css('right',-65);
    $(window).scroll(function(){
    if($(this).scrollTop() > 300){
      $('#ak-top').css('right',0);
    }else{
      $('#ak-top').css('right',-65);
    }
  });
  
   $("#ak-top").click(function(){
  $('html,body').animate({scrollTop:0},600);
  });
  
  
  $('.search-close').on('click', function(){
    $('.ak-search').slideToggle('slow');
  });
 
});

new WOW().init();
