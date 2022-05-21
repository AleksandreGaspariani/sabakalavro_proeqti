$('.carousel').owlCarousel({
    loop:true,
    autoplayTimeout: 7000,
    margin:30,
    nav:false,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});

$('.movie-carousel').owlCarousel({
    loop: false,
    nav: false,
    dots: false,
    autoplay:false,
    autoplayTimeout:7000,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:6
        }
    }
});
