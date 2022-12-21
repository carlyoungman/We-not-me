const slick = require('slick');
const extensions = require('extensions');
import fullpage from 'fullpage.js';

const sliders = (function() {
  const featuredVideo = function() {
    $('ul.media-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 5000,
      speed: 600,
      dots: true,
      arrows: false,
      infinite: true,
      fade: true,
      cssEase: 'ease',
      centerMode: true,
      focusOnSelect: true,
      prevArrow: $('ul.navigation-overlay .prev'),
      nextArrow: $('ul.navigation-overlay .next')
    });
  };
  const gallery = function() {
    $('ul.gallery').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
      speed: 600,
      dots: true,
      arrows: false,
      infinite: true,
      fade: true,
      cssEase: 'ease',
      centerMode: true,
      focusOnSelect: true
    });
  };

  const shuffle = function() {
    $('ul.shuffle').each(function() {
      $(this).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 300,
        speed: 100,
        dots: false,
        draggable: false,
        swipe: false,
        swipeToSlide: false,
        touchMove: false,
        accessibility: false,
        arrows: false,
        infinite: true,
        fade: true,
        cssEase: 'ease'
      });
    });
  };

  const fullPageSlider = function() {
    $('section.fullpage')
      .find('.col-lg-6:first-of-type')
      .addClass('fixed');

    new fullpage('section.fullpage', {
      licenseKey: 'D6D84626-BDB04746-8F4A5522-F2584B7C',
      scrollingSpeed: 1200,
      css3: true,
      easingcss3: 'cubic-bezier(0.520, 0.340, 0.005, 0.995)',
      fixedElements: 'section.fullpage .col-lg-6:first-of-type',
      keyboardScrolling: false,
      menu: '#services-menu',
      onLeave: function(index, direction) {
        const leavingAnchor = index.anchor;
        const newAnchor = direction.anchor;
        if (!$('.initial-state').length) {
          $('.fixed[data-anchor="' + leavingAnchor + '"]').removeClass(
            'active'
          );
          $('.fixed[data-anchor="' + newAnchor + '"]').addClass('active');
        }
        $('body').addClass('is-moving');
        setTimeout(function() {
          $('body').removeClass('is-moving');
        }, 1200);
      },
      afterLoad: function(origin, destination, direction) {
        const loadedSection = this;
        const newAnchor = destination.anchor;
        if (newAnchor.indexOf('-') > -1) {
          const newAnchorParent = newAnchor.substr(0, newAnchor.indexOf('-'));
        } else {
          const newAnchorParent = newAnchor;
        }
        $('.fixed[data-anchor="' + newAnchor + '"]').addClass('active');
      }
    });
  };

  const fullScreenNav = function() {
    function hasNumber(myString) {
      return /\d/.test(myString);
    }

    var $newItem = $('nav#services-menu a')
      .clone()
      .removeClass('clone');
    $('.col-lg-6.fixed').each(function() {
      let link = $(this).attr('data-anchor');
      if (!hasNumber(link)) {
        $newItem.attr('data-menuanchor', link).attr('href', '#' + link);
        link = link.replace(/-/g, ' ').toUpperCase();
        $newItem.text(link);
        $newItem
          .clone()
          .removeClass('clone')
          .insertAfter('nav#services-menu a:last-of-type');
      }
    });
  };
  const showIcon = function() {
    $('nav#services-menu a').on({
      mouseenter: function() {
        $('ul#services-menu-icons li').hide();
        let index = $(this).index() - 2;
        $('ul#services-menu-icons li')
          .eq(index)
          .show();
      },
      mouseleave: function() {
        $('ul#services-menu-icons li').hide();
      }
    });
  };

  const init = function() {
    featuredVideo();
    gallery();

    shuffle();

    if ($(window).innerWidth() >= 992) {
      fullPageSlider();
      fullScreenNav();
      showIcon();
    }
  };
  return { init: init };
})();
sliders.init();
