import $ from 'jquery';
import 'slick-carousel';
import AOS from 'aos';

$(function(){

    // EFFECTS
    AOS.init();

    // CARDS HOME
    $('.js-carousel').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        infinite: false,
        swipe: false,
        speed: 500,
        cssEase: 'ease-in-out',
        variableWidth: true,
        // prevArrow: '<button type="button" class="slick-arrow slick-prev"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#1d3d8a" d="M12.727 3.687a1 1 0 1 0-1.454-1.374l-8.5 9a1 1 0 0 0 0 1.374l8.5 9.001a1 1 0 1 0 1.454-1.373L4.875 12z"/></svg></button>',
        // nextArrow: '<button type="button" class="slick-arrow slick-next"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#1d3d8a" d="M11.273 3.687a1 1 0 1 1 1.454-1.374l8.5 9a1 1 0 0 1 0 1.374l-8.5 9.001a1 1 0 1 1-1.454-1.373L19.125 12z"/></svg></button>'    
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    swipe: true
                }
            }
        ]
    });

    // TESTIMONIALS
    $('.js-testimonials').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        infinite: false,
        swipe: true,
        speed: 500,
        autoplay: true,
        autoplaySpeed: 3000,
        pauseOnHover: false,
        cssEase: 'ease-in-out',
        prevArrow: '<button type="button" class="slick-arrow slick-prev"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#1d3d8a" d="M12.727 3.687a1 1 0 1 0-1.454-1.374l-8.5 9a1 1 0 0 0 0 1.374l8.5 9.001a1 1 0 1 0 1.454-1.373L4.875 12z"/></svg></button>',
        nextArrow: '<button type="button" class="slick-arrow slick-next"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#1d3d8a" d="M11.273 3.687a1 1 0 1 1 1.454-1.374l8.5 9a1 1 0 0 1 0 1.374l-8.5 9.001a1 1 0 1 1-1.454-1.373L19.125 12z"/></svg></button>',    
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

});
