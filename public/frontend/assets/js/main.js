(function ($) {
    "use strict";
/*--
Commons Variables
-----------------------------------*/
var windows = $(window);
/*--
    Menu Sticky
-----------------------------------*/
var sticky = $('.header-sticky');

windows.on('scroll', function() {
    var scroll = windows.scrollTop();
    if (scroll < 300) {
        sticky.removeClass('is-sticky');
    }else{
        sticky.addClass('is-sticky');
    }
});

/*--
    Mobile Menu
-----------------------------------*/
var mainMenuNav = $('.main-menu');
mainMenuNav.meanmenu({
    meanScreenWidth: '991',
    meanMenuContainer: '.mobile-menu',
    meanMenuClose: '<span class="menu-close"></span>',
    meanMenuOpen: '<span class="menu-bar"></span>',
    meanRevealPosition: 'right',
    meanMenuCloseSize: '0',
});

/*--
    Sliders
-----------------------------------*/
// Hero Slider
$('.hero-slider').slick({
    infinite: true,
    fade: false,
    dots: false,
    prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
    responsive: [
        {
        breakpoint: 992,
            settings: {
                dots: true,
                arrows: false,
            }
        },
    ]
});
// Property Carousel For 3 Column
$('.property-carousel').each(function (){
    var $this = $(this);
    var $row = $this.attr("data-row") ? parseInt($this.attr("data-row"), 10) : 1;
    $this.slick({
        infinite: true,
        arrows: true,
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        rows: $row,
        prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
        responsive: [
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
        ]
    });
});
// Property Slider
$('.property-slider-2').each(function (){
    var $this = $(this);
    $this.slick({
        infinite: true,
        arrows: true,
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
    });
});
// Single Property Gallery Slider
$('.single-property-gallery').each(function (){
    var $this = $(this);
    $this.slick({
        infinite: true,
        arrows: false,
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.single-property-thumb',
    });
});
// Single Property Gallery Thumbnail Slider
$('.single-property-thumb').each(function (){
    var $this = $(this);
    $this.slick({
        infinite: true,
        arrows: false,
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        focusOnSelect: true,
        asNavFor: '.single-property-gallery',
    });
});
// News Carousel For 4 Column
$('.news-carousel').each(function (){
    var $this = $(this);
    var $row = $this.attr("data-row") ? parseInt($this.attr("data-row"), 10) : 1;
    $this.slick({
        infinite: true,
        arrows: true,
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        rows: $row,
        prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
        responsive: [
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
        ]
    });
});
// Agent Carousel For 4 Column
$('.agent-carousel').each(function (){
    var $this = $(this);
    var $row = $this.attr("data-row") ? parseInt($this.attr("data-row"), 10) : 1;
    $this.slick({
        infinite: true,
        arrows: true,
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        rows: $row,
        prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });
});
// Agent Carousel For 3 Column
$('.agent-carousel-2').each(function (){
    var $this = $(this);
    var $row = $this.attr("data-row") ? parseInt($this.attr("data-row"), 10) : 1;
    $this.slick({
        infinite: true,
        arrows: true,
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        rows: $row,
        prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });
});
// Brand Carousel For 5 Column
$('.brand-carousel').slick({
    infinite: true,
    arrows: false,
    dots: false,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 479,
            settings: {
                slidesToShow: 2,
            }
        },
    ]
});
// Review Slider For 3 Column
$('.review-slider').slick({
    infinite: true,
    arrows: true,
    dots: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    focusOnSelect: true,
    centerMode: true,
    centerPadding: '0px',
    prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 1,
                centerPadding: '200px',
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
            }
        },
    ]
}); 

// Window Load Function
windows.on('load', function(){
    // Map Property Slider
    $('.map-property-slider').slick({
        infinite: true,
        arrows: false,
        dots: false,
        slidesToShow: 7,
        slidesToScroll: 1,
        focusOnSelect: true,
        centerMode: true,
        centerPadding: '0px',
        responsive: [
            {
                breakpoint: 1500,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 1199,
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
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 479,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });
});
    
/*--
    Nice Select
-----------------------------------*/
$('.nice-select').niceSelect();
    
/*--
    Youtube Background Video 
-----------------------------------*/
$(".player").YTPlayer();
    
/*--
    MailChimp
-----------------------------------*/
$('#mc-form').ajaxChimp({
    language: 'en',
    callback: mailChimpResponse,
    // ADD YOUR MAILCHIMP URL BELOW HERE!
    url: 'http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef'

});
function mailChimpResponse(resp) {

    if (resp.result === 'success') {
        $('.mailchimp-success').html('' + resp.msg).fadeIn(900);
        $('.mailchimp-error').fadeOut(400);

    } else if(resp.result === 'error') {
        $('.mailchimp-error').html('' + resp.msg).fadeIn(900);
    }  
}

/*--
    Search Price Range
-----------------------------------*/
var $searchPriceRange = $('#search-price-range');
$searchPriceRange.slider({
    range: true,
    min: 0,
    max: 100000,
    values: [ 12500, 75000 ],
    slide: function( event, ui ) {
        $searchPriceRange.find('.ui-slider-handle:eq(0)').html( '<span>' + '$' + ui.values[ 0 ] + '</span>');
        $searchPriceRange.find('.ui-slider-handle:eq(1)').html( '<span>' + '$' + ui.values[ 1 ] + '</span>');
    }
});
$searchPriceRange.find('.ui-slider-handle:eq(0)').html( '<span>' + '$' + $searchPriceRange.slider( "values", 0 ) + '</span>' );
$searchPriceRange.find('.ui-slider-handle:eq(1)').html( '<span>' + '$' + $searchPriceRange.slider( "values", 1 ) + '</span>' );   

/*--
    Dropzone Upload
-----------------------------------*/
Dropzone.autoDiscover = false;
$(".dropzone").dropzone({
    url: "/file/post",
    dictDefaultMessage: "<i class='pe-7s-cloud-upload'></i> Click here or drop files to upload",
});
    
/*--
    Add Property Tab Function
-----------------------------------*/
var $addPropertyTabList = $('.add-property-tab-list');
$addPropertyTabList.on('click', 'a', function(){
    var $this = $(this);
    $this.parent('li').addClass('working').removeClass('done');
    $this.parent('li').prevAll('li').addClass('done');
    $this.parent('li').nextAll('li').removeClass('working done');
});
var $addPropertyTabNav = $('.add-property-tab-nav');
$addPropertyTabNav.on('click', 'a', function(){
    var $this = $(this);
    var $thisTarget = $this.attr('href');
    var $addPropertyTabList = $this.closest('.add-property-wrap').find('a[href="' + $thisTarget + '"]').parent('li');
    console.log($thisTarget);
    
        $addPropertyTabList.addClass('working').removeClass('done');
        $addPropertyTabList.prevAll('li').addClass('done');
        $addPropertyTabList.nextAll('li').removeClass('working done');
});
    
/*--
    Login Register Custom Tab Toggle Function
-----------------------------------*/
var $registerToggle = $('.register-toggle');
$registerToggle.on('click', function(e){
    e.preventDefault();
    var $this = $(this);
    var $thisTarget = $this.attr('href');
    var $loginRegisterTabList = $this.closest('#main-wrapper').find('a[href="' + $thisTarget + '"]');
    var $loginRegisterTabPane = $this.closest('#main-wrapper').find('.tab-pane');
    
        $loginRegisterTabList.addClass('active');
        $loginRegisterTabList.parent('li').prevAll('li').find('a').removeClass('active');
        $loginRegisterTabList.parent('li').nextAll('li').find('a').removeClass('active');
        $loginRegisterTabPane.removeClass('show active');
        $($thisTarget).addClass('show active');
});

/*--
    Google Map
-----------------------------------*/

// Google Map For Single Property Map
$('.google-map').each(function(){
    if($(this).length){
        var $this = $(this);
        var $lat = $this.data('lat');
        var $long = $this.data('long');
        function initialize() {
            var mapOptions = {
                zoom: 14,
                scrollwheel: false,
                center: new google.maps.LatLng($lat, $long)
            };
            var map = new google.maps.Map(document.getElementById('single-property-map'), mapOptions);
            var marker = new google.maps.Marker({
                position: map.getCenter(),
                icon: 'assets/images/icons/map-marker-2.png',
                map: map,
                animation: google.maps.Animation.BOUNCE
            });

        }
        google.maps.event.addDomListener(window, 'load', initialize);
    }
});
// Google Map For Conatact Map
$('.contact-map').each(function(){
    if($(this).length){
        var $this = $(this);
        var $lat = $this.data('lat');
        var $long = $this.data('long');
        function initialize() {
            var mapOptions = {
                zoom: 14,
                scrollwheel: false,
                center: new google.maps.LatLng($lat, $long)
            };
            var map = new google.maps.Map(document.getElementById('contact-map'), mapOptions);
            var marker = new google.maps.Marker({
                position: map.getCenter(),
                icon: 'assets/images/icons/map-marker-2.png',
                map: map,
                animation: google.maps.Animation.BOUNCE
            });

        }
        google.maps.event.addDomListener(window, 'load', initialize);
    }
});

/*--
    Scroll Up
-----------------------------------*/
$.scrollUp({
    easingType: 'linear',
    scrollSpeed: 900,
    animation: 'fade',
    scrollText: '<i class="fa fa-angle-up"></i>',
});

/*--
    Scroll Up
-----------------------------------*/
$('.gallery-popup').magnificPopup({
    type: 'image',
    gallery: {
        enabled: true,
    },
});
    
    
})(jQuery);	