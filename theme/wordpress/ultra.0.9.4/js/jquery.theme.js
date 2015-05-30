/**
 * Main theme Javascript - (c) Greg Priday, freely distributable under the terms of the GPL 2.0 license.
 */

jQuery(function($){ 

    // Setup fitvids for entry content and panels
    if(typeof $.fn.fitVids != 'undefined') {
        $('.entry-content, .entry-content .panel' ).fitVids();
    }

    // Substitute any retina images
    var pixelRatio = !!window.devicePixelRatio ? window.devicePixelRatio : 1;
    if( pixelRatio > 1 ) {
        $('img[data-retina-image]').each(function(){
            var $$ = $(this);
            $$.attr('src', $$.data('retina-image'));

            // If the width attribute isn't set, then lets scale to 50%
            if( typeof $$.attr('width') == 'undefined' ) {
                $$.load( function(){
                    var size = [$$.width(), $$.height()];
                    $$.width(size[0]/2);
                    $$.height(size[1]/2);
                } );
            }
        })
    }      

    // Top bar menu hover effects
    $('#top-bar')
        .on('mouseenter', '.top-bar-navigation ul li', function(){
            var $$ = $(this);
            var $ul = $$.find('> ul');
            $ul.css({
                'display' : 'block',
                'opacity' : 0
            }).clearQueue().animate({opacity: 1}, 250);
            $ul.data('final-opacity', 1);
        } )
        .on('mouseleave', '.top-bar-navigation ul li', function(){
            var $$ = $(this);
            var $ul = $$.find('> ul');
            $ul.clearQueue().animate( {opacity: 0}, 250, function(){
                if($ul.data('final-opacity') == 0) {
                    $ul.css('display', 'none');
                }
            });
            $ul.data('final-opacity', 0);
        } );      

    // Main menu hover effects
    $('.site-header')
        .on('mouseenter', '.main-navigation ul li', function(){
            var $$ = $(this);
            var $ul = $$.find('> ul');
            $ul.css({
                'display' : 'block',
                'opacity' : 0
            }).clearQueue().animate({opacity: 1}, 250);
            $ul.data('final-opacity', 1);
        } )
        .on('mouseleave', '.main-navigation ul li', function(){
            var $$ = $(this);
            var $ul = $$.find('> ul');
            $ul.clearQueue().animate( {opacity: 0}, 250, function(){
                if($ul.data('final-opacity') == 0) {
                    $ul.css('display', 'none');
                }
            });
            $ul.data('final-opacity', 0);
        } );       

    // Menu search bar
    var isSearchHover = false;
    $(document).click(function(){
        if(!isSearchHover) $('.main-navigation .menu-search .search-form').fadeOut(250);
    });

    $(document)
        .on('click','.search-icon', function(){
            var $$ = $(this).parent();
            $$.find('form').fadeToggle(250);
            setTimeout(function(){
                $$.find('input[name=s]').focus();
            }, 300);
        } );

    $(document)
        .on('mouseenter', '.search-icon', function(){
            isSearchHover = true;
        } )
        .on('mouseleave', '.search-icon', function(){
            isSearchHover = false;
        } );                          

    // Sticky header
    $(window).scroll(function(){
        if ($(this).scrollTop() > 150) {
            $('.site-header-sentinel').addClass('fixed');
        } else {
            $('.site-header-sentinel').removeClass('fixed');
        }
    });

    // Initialize the Flex Slider
    $('.entry-content .flexslider:not(.metaslider .flexslider), #metaslider-demo.flexslider').flexslider( {
        namespace: "flex-ultra-",        
    } );

    // Stretch the main slider
    $('#main-slider[data-stretch="true"]').each(function(){
        var $$ = $(this);
        $$.find('>div').css('max-width', '100%');
        $$.find('.slides li').each(function(){
            var $s = $(this);

            // Move the image into the background
            var $img = $s.find('img.ms-default-image').eq(0);
            if(!$img.length) {
                $img = $s.find('img').eq(0);
            }

            $s.css('background-image', 'url(' + $img.attr('src') + ')');
            $img.css('visibility', 'hidden');
            // Add a wrapper
            $s.wrapInner('<div class="container"></div>');
            var link = $s.find('a');
            if(link.length) {
                $s.click(function () {
                    if(link.attr('href')) {
                        window.location.href = link.attr('href');
                    }
                });
            }
        });
    });

    // Scroll to top
    $(window).scroll( function(){
        if($(window).scrollTop() > 150) {
            $('#scroll-to-top').addClass('displayed');
        }
        else {
            $('#scroll-to-top').removeClass('displayed');
        }
    } );

    $('#scroll-to-top').click( function(){
        $("html, body").animate( { scrollTop: "0px" } );
        return false;
    } );
    
});