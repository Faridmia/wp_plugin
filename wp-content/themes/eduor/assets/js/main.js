(function ($) {
    "use strict";

    var windowOn = $(window);
    var header = $(".sc-menu-sticky");
    var win = $(window);
    var headerinnerHeight = $(".sc-header-content").innerHeight();

    win.on("scroll", function () {
        var scroll = win.scrollTop();
        if (scroll < headerinnerHeight) {
            header.removeClass("sticky");
        } else {
            header.addClass("sticky");
        }
    });
    $(".sc-header-content").waypoint("sticky", {
        offset: 0,
    });

     // Header Sticky  Js
     windowOn.on("scroll", function () {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
            $(".sc-menu-sticky").removeClass("sticky");
        }
    });

     // Popup Video;
     var popupvideos = $(".popup-videos-button");
     if (popupvideos.length) {
         $(".popup-videos-button").magnificPopup({
             disableOn: 10,
             type: "iframe",
             mainClass: "mfp-fade",
             removalDelay: 160,
             preloader: false,
             fixedContentPos: false,
         });
     }


    //=====VENOBOX.JS=====
    $('.venobox').venobox();



    //=======TESTIMONIAL SLIDER======
   



    //=====BRAND SLIDER=====
    $('.brand_slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: false,
        arrows: false,

        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    //*=====SCROLL BUTTON======
    $('.tf__scroll_btn').on('click', function () {
        $('html, body').animate({
            scrollTop: 0,
        }, 300);
    });
    $(window).on('scroll', function () {
        var scrolling = $(this).scrollTop();

        if (scrolling > 300) {
            $('.tf__scroll_btn').fadeIn();
        } else {
            $('.tf__scroll_btn').fadeOut();
        }
    });




    //======COUNTER JS=======
    // $('.counter').countUp();

     $('.counter').each(function() {
        // Get the text content of the current element
        var text = $(this).text();
    
        // Convert the text to a number
        var number = parseFloat(text);
    
        // Check if the number is not NaN and not null
        if (!isNaN(number) && number !== null) {
            // Run the countUp function on the element
            $(this).countUp(); // Replace with the actual function and options you are using
        }
    });


    //=======STICKY SIDEBAR=======
    $("#sticky_sidebar").stickit({
        top: 90,
    });


    //*======WOW JS========
    new WOW().init();


    //======MENU 2 FIX JS======   
    if ($('.main_menu_2').offset() != undefined) {
        $(window).bind('scroll', function () {
            if ($(window).scrollTop() > 130) {
                $('.main_menu_2').addClass('menu_fix2');
            } else {
                $('.main_menu_2').removeClass('menu_fix2');
            }
        });
    }


    //==========BARFILLER JS===========
    $(document).ready(function () {
        $('#bar1').barfiller();
        $('#bar2').barfiller();
        $('#bar3').barfiller();
        $('#bar4').barfiller();
    });


 


    //======NICE SELECT======
    $('.select_js').niceSelect();


    //=======MOBILE MENU ICON======
    $(".navbar-toggler").on("click", function () {
        $(".navbar-toggler").toggleClass("show_close_icon");
    });

    $(window).on("load", function () {
        // Animate loader off screen
        const preloader = $(".preloader");
        preloader.delay(600).fadeOut();
    });

})(jQuery);
