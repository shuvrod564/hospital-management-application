 
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('navbar-scrolled'); // The class to add
    } else {
        navbar.classList.remove('navbar-scrolled');
    }
});

 /**
 * Ensure smooth transition by removing Bootstrap's default height-based '.collapsing' behavior 
 * which interferes with full-screen fixed positioning.
 */
jQuery(document).ready(function($) {
    const $menu = $('#navbarSupportedContent');

    $menu.on('show.bs.collapse', function () {
        $('body').addClass('menu-open').css('overflow', 'hidden');
    });

    $menu.on('hide.bs.collapse', function () {
        $('body').removeClass('menu-open').css('overflow', '');
    });
});
 
(function ($) {
    "use strict";

    AOS.init({
        duration: 900,
        once: true,
        offset: 120,
        delay: 200,
    });

    const fadeElements = document.querySelectorAll('.g__fadeup');
    const delayStep = 200; // Delay increment in milliseconds

    fadeElements.forEach((el, index) => {
        el.setAttribute('data-aos', 'fade-up');
        el.setAttribute('data-aos-delay', index * delayStep);
    });
 

    // Refresh AOS to recognize dynamically added attributes
    AOS.refresh();
 
    // Show/Hide button on scroll
    const $btn = $('#backToTop'); 
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 300) {
            $btn.addClass('is-visible');
        } else {
            $btn.removeClass('is-visible');
        }
    }); 
    // Smooth scroll to top
    $btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 600); // Duration in milliseconds
    }); 

    // Service slider Activaton Script 
    $(".latest-services-carousel").owlCarousel({
        autoplay: true,
        autoplayHoverPause: true,
        smartSpeed: 550,
        responsiveClass: true,
        autoplayTimeout: 10000,
        autoplaySpeed: 3000,
        loop: false,
        margin: 0,
        items: 4,
        nav: true,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: { items: 1 },
            576: { items: 1 },
            768: { items: 2 },
            992: { items: 3 },
            1200: { items: 4, },
            1400: { items: 4, }, 
        },
        navText: [
            '<svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 22"><path d="M14.805 1.891v1.89c0 .13-.05.25-.13.326l-7.757 7.16 7.756 7.16a.45.45 0 0 1 .131.326v1.89c0 .164-.146.26-.251.164L4.926 11.92c-.349-.323-.349-.983 0-1.303l9.628-8.887c.105-.098.251-.003.251.161" fill="#fff"/></svg>',
            '<svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 22"><path d="M5.48 1.9v1.88q0 .2.13.33l7.75 7.16-7.75 7.16a.5.5 0 0 0-.13.32v1.9c0 .16.14.25.25.16l9.63-8.89c.34-.32.34-.98 0-1.3L5.73 1.73c-.1-.1-.25 0-.25.16" fill="#fff"/></svg>'
        ]
    });

    // Service slider Activaton Script 
    $(".testimonialSlider").owlCarousel({
        autoplay: true,
        autoplayHoverPause: true,
        smartSpeed: 550,
        responsiveClass: true,
        autoplayTimeout: 10000,
        autoplaySpeed: 3000,
        loop: false,
        margin: 24,
        items: 4,
        nav: true,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: { items: 1 },
            576: { items: 1 },
            768: { items: 1 },
            992: { items: 2 },
            1200: { items: 2, }, 
        },
        navText: [
            '<svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 22"><path d="M14.805 1.891v1.89c0 .13-.05.25-.13.326l-7.757 7.16 7.756 7.16a.45.45 0 0 1 .131.326v1.89c0 .164-.146.26-.251.164L4.926 11.92c-.349-.323-.349-.983 0-1.303l9.628-8.887c.105-.098.251-.003.251.161" fill="#fff"/></svg>',
            '<svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 22"><path d="M5.48 1.9v1.88q0 .2.13.33l7.75 7.16-7.75 7.16a.5.5 0 0 0-.13.32v1.9c0 .16.14.25.25.16l9.63-8.89c.34-.32.34-.98 0-1.3L5.73 1.73c-.1-.1-.25 0-.25.16" fill="#fff"/></svg>'
        ]
    });

    // Blogs slider Activaton Script 
    $(".blogSlider").owlCarousel({
        autoplay: true,
        lazyLoad: true,
        autoplayHoverPause: true,
        smartSpeed: 550,
        responsiveClass: true,
        autoplayTimeout: 10000,
        autoplaySpeed: 3000,
        loop: false,
        margin: 25,
        items: 3,
        nav: true,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: { items: 1 },
            576: { items: 1 },
            768: { items: 1 },
            992: { items: 2 },
            1200: { items: 3, }, 
        },
        navText: [
            '<svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 22"><path d="M14.8 1.9v1.88q0 .2-.13.33l-7.75 7.16 7.75 7.16q.14.12.14.32v1.9c0 .16-.15.25-.26.16l-9.62-8.89c-.35-.32-.35-.98 0-1.3l9.62-8.89c.1-.1.26 0 .26.16" fill="#1645a4" fill-opacity=".75"/></svg>',
            '<svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 22"><path d="M5.5 1.9v1.9l.1.3 7.8 7.2-7.8 7.1-.1.4v1.8q0 .3.2.2l9.7-8.9q.4-.7 0-1.3L5.7 1.7z" fill="#00294b"/></svg>'
        ],
        onInitialized: function() {
            AOS.refresh();
        },
        onTranslated: function() {
            AOS.refresh();
        }
    });
})(jQuery);



  $(document).ready(function() {
    const $modal = $('#testimonialVideoModal');
    const $iframe = $('#videoIframe');

    $('.video-btn').on('click', function() {
        // Retrieve the URL from the data attribute
        const videoSrc = $(this).data('embed-url');
        
        if (videoSrc) {
            // Determine if we need to append with '?' or '&'
            const separator = videoSrc.includes('?') ? '&' : '?';
            
            // Construct the final URL with parameters
            const finalSrc = `${videoSrc}${separator}autoplay=1&mute=1&rel=0`;

            // Inject into iframe
            $iframe.attr('src', finalSrc);
        } else {
            console.error("Video URL not found on clicked element.");
        }
    });

    /**
     * Clear the iframe src when the modal is hidden 
     * to stop the video from playing in the background.
     */
    $modal.on('hidden.bs.modal', function () {
        $iframe.attr('src', '');
    });
});
 