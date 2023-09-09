(function($){
    $(window).on("load",function(){
        $(this).scrollTop(0),
        $('body').removeClass('d-none');

        $( "body" ).on( "click", ".downloads-grid-pagination--item a", function(e) {
            let letter = e.target.dataset.letter;

            if(letter === "#") {
                $(`.downloads-grid-pagination--item`).removeClass('active'),
                $(`.downloads-grid-results--item`).show()
            } else {
                $(`.downloads-grid-pagination--item:not([data-letter="${letter}"])`).removeClass('active'),
                $(`.downloads-grid-pagination--item[data-letter="${letter}"]`).addClass('active'),

                $(`.downloads-grid-results--item:not([data-letter="${letter}"])`).hide(),
                $(`.downloads-grid-results--item[data-letter="${letter}"]`).show()
            }
        });	        

        var lightbox = new SimpleLightbox('.gallery-list a', { /* options */ });

        $(".mCustomScrollbar").mCustomScrollbar({
            axis:"x", // horizontal scrollbar,
            theme:"dark"
        });
    
        $( "body" ).on( "click", ".hamburger", function(e) {
            $('.hamburger, .navigation.mobile').toggleClass('is-active');
        });	

        $( "body" ).on( "mouseover", ".event-card", function(e) {
            $(this).addClass('hover')
        }).on( "mouseleave", ".event-card", function(e) {
            $(this).removeClass('hover')
        });         
    
        $("header").before($("header").clone().addClass("sticky"));
    
        $('.single-carousel').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
            prevArrow: ".slick-banner-prev",
            nextArrow: ".slick-banner-next"        
        });   
        
        $('.multi-carousel').slick({
            dots: false,
            infinite: false,
            speed: 300,
            mobileFirst: true,
            slidesToScroll: 1,
            adaptiveHeight: true,
            arrows: false,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        centerMode: false,
                    }
                },
                {
                breakpoint: 300,
                    settings: {
                        slidesToShow: 1,
                        initialSlide: 0,
                        centerMode: true,
                    }
                }
            ]                 
        });    

        $('.multi-carousel-4x').slick({
            dots: false,
            infinite: true,
            speed: 300,
            mobileFirst: true,
            slidesToScroll: 1,
            adaptiveHeight: true,
            prevArrow: ".slick-past-events-prev",
            nextArrow: ".slick-past-events-next",  
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4,
                        centerMode: false,
                    }
                },
                {
                breakpoint: 375,
                    settings: {
                        slidesToShow: 1,
                        initialSlide: 0,
                        centerMode: true,
                    }
                }
            ]                 
        }).on('init reInit afterChange', function(event, slick) {
            $(".past-events-counter").text(slick.slickCurrentSlide() + 1);
        });
        
        $(".past-events-total").text($('.multi-carousel-4x').slick('getSlick').slideCount);

        $('.multi-carousel-testimonials').slick({
            dots: true,
            infinite: true,
            speed: 300,
            mobileFirst: true,
            slidesToScroll: 1,
            adaptiveHeight: true,
            prevArrow: ".slick-testimonials-prev",
            nextArrow: ".slick-testimonials-next",  
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                breakpoint: 375,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]                 
        }).on('init reInit afterChange', function(event, slick) {
            $(".testimonials-counter").text(slick.slickCurrentSlide() + 1);
        });
        
        $(".testimonials-total").text($('.multi-carousel-testimonials').slick('getSlick').slideCount);

        $('.multi-carousel-team').slick({
            dots: false,
            infinite: true,
            speed: 300,
            mobileFirst: true,
            slidesToScroll: 1,
            adaptiveHeight: true,
            prevArrow: ".slick-team-prev",
            nextArrow: ".slick-team-next",  
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                breakpoint: 375,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]                 
        }).on('init reInit afterChange', function(event, slick) {
            $(".team-counter").text(slick.slickCurrentSlide() + 1);
        });
        
        $(".team-total").text($('.multi-carousel-team').slick('getSlick').slideCount);
    
        $(window).on("scroll", function() {
            $(".sticky").toggleClass("stuck", ($(window).scrollTop() > 49));
            $(".is-active").removeClass('is-active')
        });
    
        $('.yu2fvl').yu2fvl();
    
        let events = ['scroll', 'resize'];
    
        events.forEach(event => {
            $(window).on(event, function () {
                $(".is-active").removeClass('is-active')
            });	  
        });
        
        setTimeout(function () {
            if (sessionStorage.getItem('name') !== "whatsappIconMessage") {
                $('.whatsapp-icon-message').addClass('active');
            }
        }, 12000);
    
        $('.whatsapp-icon-message-close').click(function () {
            sessionStorage.setItem('name', 'whatsappIconMessage');
            $('.whatsapp-icon-message').removeClass('active');
        });
    
        setTimeout(function() {
            $('#module-whatsapp').css('visibility', 'visible');
        }, 2000);
    
        $('.whatsapp-btn, [href*="https://api.whatsapp.com"]').click(function(e) {
            e.preventDefault();
    
            if ($('.whatsapp-btn').hasClass('active')) {
                $('.whatsapp-btn').addClass('not-active');
                $('.whatsapp-btn').removeClass('active');
                $('#module-whatsapp-container').removeClass('active');
                setTimeout(function() {
                    if (sessionStorage.getItem('name') !== "whatsappIconMessage") {
                        $('.whatsapp-icon-message').addClass('active');
                    }
                }, 2000);
            } else {
                $('.whatsapp-btn').addClass('active');
                $('.whatsapp-btn').removeClass('not-active');
                $('#module-whatsapp-container').addClass('active');
                $('.whatsapp-icon-message').removeClass('active');
            }
        });
    
        setTimeout(function() {
            $('#module-whatsapp').css('visibility', 'visible');
        }, 2000);
    
        var disableSubmit = false;
        
        jQuery('button.module-whatsapp-content-form-button').click(function() {
            jQuery('button.module-whatsapp-content-form-button').addClass("disabled");
            jQuery('button.module-whatsapp-content-form-button').text('INICIANDO...');
            if (disableSubmit == true) {
                return false;
            }
            disableSubmit = true;
            return true;
        })
        
        document.addEventListener('wpcf7submit', function(event) {
            jQuery('#' + event.detail.unitTag + ' button.module-whatsapp-content-form-button').removeClass("disabled");
            jQuery('#' + event.detail.unitTag + ' button.module-whatsapp-content-form-button').text('INICIAR CONVERSA');
            disableSubmit = false;
        }, false);            
    });
})(jQuery);