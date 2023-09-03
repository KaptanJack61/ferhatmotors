// npm package: owl.carousel
// github link: https://github.com/OwlCarousel2/OwlCarousel2

$(function() {
  'use strict';

  if($('.owl-basic').length) {
    $('.owl-basic').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      responsive:{
          0:{
              items:2
          },
          600:{
              items:3
          },
          1000:{
              items:4
          }
      }
    });
  }


  if($('.owl-auto-play').length) {
    $('.owl-auto-play').owlCarousel({
      items:1,
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:1000,
      autoplayHoverPause:true,
      responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
    });
  }

  if($('.owl-fadeout').length) {
    $('.owl-fadeout').owlCarousel({
      animateOut: 'fadeOut',
      items:1,
      margin:30,
      stagePadding:30,
      smartSpeed:450
    });
  }

  if($('.owl-animate-css').length) {
    $('.owl-animate-css').owlCarousel({
      animateOut: 'animate__animated animate__slideOutDown',
      animateIn: 'animate__animated animate__flipInX',
      items:1,
      nav:false,
      loop:true,
      margin:30,
      stagePadding:30,
      smartSpeed:450,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
    });
  }

    if($('.front-owl').length) {
        $('.front-owl').owlCarousel({
            animateOut: 'animate__animated animate__slideOutDown',
            animateIn: 'animate__animated animate__flipInX',
            items:1,
            nav:true,
            loop:true,
            margin:30,
            stagePadding:30,
            smartSpeed:450,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
        });
    }

    if($('.dashboard-owl').length) {
        $('.dashboard-owl').owlCarousel({

            items:2,
            nav:true,
            loop:true,
            margin:30,
            stagePadding:30,
            smartSpeed:450,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,

        });
    }




  if($('.owl-mouse-wheel').length) {
    var owl = $('.owl-mouse-wheel');
    owl.owlCarousel({
        loop:true,
        nav:false,
        margin:10,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            960:{
                items:3
            },
            1200:{
                items:4
            }
        }
    });
    owl.on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY>0) {
            owl.trigger('next.owl');
        } else {
            owl.trigger('prev.owl');
        }
        e.preventDefault();
    });

    owl.owlCarousel({
        nav:true
    });

  }

});
