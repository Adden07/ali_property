$(function () {

    // var owl = $('.slide-one-item');

    // $('.slide-one-item').owlCarousel({
    //     center: false,
    //     items: 1,
    //     loop: true,
    //     stagePadding: 0,
    //     margin: 0,
    //     smartSpeed: 1500,
    //     autoplay: false,
    //     dots: false,
    //     nav: false,
    //     navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
    // });

    // $('.thumbnail li').each(function (slide_index) {
    //     $(this).click(function (e) {
    //         owl.trigger('to.owl.carousel', [slide_index, 1500]);
    //         e.preventDefault();
    //     })
    // })

    // owl.on('changed.owl.carousel', function (event) {
    //     $('.thumbnail li').removeClass('active');
    //     $('.thumbnail li').eq(event.item.index - 3).addClass('active');
    // })

    $('.custom-dropdown').on('show.bs.dropdown', function () {
        var that = $(this);
        setTimeout(function () {
            that.find('.dropdown-menu').addClass('active');
        }, 100);
    });

    $('.custom-dropdown').on('hide.bs.dropdown', function () {
        $(this).find('.dropdown-menu').removeClass('active');
    });

    if ($(window).scrollTop() > 90) {
        $('.fixed-top').addClass('nav_top');
    }
    else {
        $('.fixed-top').removeClass('nav_top');
    }

    $(window).scroll(function () {
        // let scroll = $(this);
        if ($(window).scrollTop() > 90) {
            $('.fixed-top').addClass('nav_top');
        }
        else {
            $('.fixed-top').removeClass('nav_top');
        }
    })

    $('.services').slick({
        slidesToShow: 6,
        slidesToScroll: 4
    });

    $('.travel_slider').slick({
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 2000
    })

    $('.cities').slick({
        slidesToShow: 5,
        slidesToScroll: 4,
        infinity: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    })

    $('.detail_testimonials').slick({
        slidesToShow: 2,
        slidesToScroll: 3,
        infinity: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    })

    $('.inspire_homeoffers').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        infinity: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    })

    $('.view_propertyslide').slick({
        slidesToShow: 1,
        slidesToScroll: 1
    })

    $('.properties-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        infinity: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    })

    $('[data-toggle="datepicker"]').datepicker({
        startDate: new Date(),
        autoclose: true,
    });

})