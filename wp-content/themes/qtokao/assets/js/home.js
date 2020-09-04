(function ($) {


    $(function () {

        // HEADER fixed
        var lastScrollTop = 0;
        $(window).on("scroll", function () {
            if ($(window).scrollTop() > 0) {
                $('header .header-inner').addClass('header-fixed');
            } else {
                $('header  .header-inner').removeClass('header-fixed');
            }
            var st = $(this).scrollTop();
            if (st > lastScrollTop) {
                $('header').addClass('hide-header');
            } else {
                $('header').removeClass('hide-header');
            }
            lastScrollTop = st;
        });

        if ($('.slide-portada').hasClass('slide-portada')) {
            var slide_container = $('.slide-portada');
            slide_container.owlCarousel({
                margin: 0,
                responsiveClass: true,
                nav: false,
                items: 1,
                loop: true,
                autoplay: true,
                animateOut: 'fadeOut',
                animateIn: 'zoomInmedium',
                dotsContainer: '.dots-container'
            });
        }


    });

})(jQuery);

