$(document).ready(function () {
    $('.replay-content-carousel').owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 4,
                nav: true,
                autoWidth: true,

            },
            600: {
                items: 4,
                nav: true,
                autoWidth: true,
            },
            768: {
                items: 4,
                nav: true,
                autoWidth: true,
            },
            1000: {
                items: 4,
                nav: true,
                loop: true,
                autoWidth: true,
            }
        }
    });

    $('.video').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 1000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            },
        }

    });
    $('.infos-sliders').owlCarousel({
        loop: true,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout: 2000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 3
            },
        }
    })
    $('.replays-content-box').owlCarousel({
        loop: true,
        responsiveClass: true,
        autoplay: true,
        // margin: 5,
        autoplayTimeout: 1000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 3
            },
        }
    })
    $(window).scroll(function () {
        $('nav').toggleClass('scrolled', $(this).scrollTop() > 30);
    });
    $(window).scroll(function () {
        $('nav').toggleClass('farScrolled', $(this).scrollTop() > 300);
    });
})