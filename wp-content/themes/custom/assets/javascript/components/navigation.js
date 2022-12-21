const inview = require('inview');
var navigation = (function() {
  var mainMenu = function() {
    var showClass;
    $('ul.navigation-overlay li.menu-item').on('click', function() {
      showClass = $(this).attr('data-link');
      if ($(this).hasClass('active-item')) {
        $(this).removeClass('active-item');
        $('body')
          .removeClass(function(index, className) {
            return (className.match(/(^|\s)show-\S+/g) || []).join(' ');
          })
          .removeClass('shrink-main');
      } else {
        $('ul.navigation-overlay li.active-item').removeClass('active-item');
        $('body')
          .removeClass(function(index, className) {
            return (className.match(/(^|\s)show-\S+/g) || []).join(' ');
          })
          .removeClass('shrink-main');
        $(this).addClass('active-item');
        setTimeout(function() {
          $('body')
            .addClass('shrink-main')
            .addClass(showClass);
        }, 600);
      }
    });
  };

  var navigationClick = function() {
    $('.hamburger').on('click', function() {
      $(this).toggleClass('is-active');
    });

    $('ul.menu li').on('click', function() {
      $('ul.menu li.current-menu-item').removeClass('current-menu-item');
      $(this).addClass('current-menu-item');
    });
  };
  var backgroundColour = function() {
    var backgroundHover;
    var lastClass;
    var currentItem = $('ul#menu-main-menu .current_page_item');
    var backgroundDefault = $('ul#menu-main-menu .current_page_item a').attr(
      'data-background'
    );
    var overlay = $('nav#header_nav');
    overlay.addClass(backgroundDefault);

    $('ul#menu-main-menu a').on({
      mouseenter: function() {
        backgroundHover = $(this).attr('data-background');
        overlay.addClass(backgroundHover);
        currentItem.removeClass('current_page_item');
      },
      mouseleave: function() {
        lastClass = overlay
          .attr('class')
          .split(' ')
          .pop();
        overlay.removeClass(lastClass);
        currentItem.addClass('current_page_item');
      }
    });
  };

  var closeSocialMedia = function() {
    $('section.social-media .icon-button ').on('click', function() {
      $('body').removeClass('show-social-menu');
    });
  };

  var magicLine = function() {
    var $el;
    var leftPos;
    var newWidth;
    var $mainNav = $('ul.tabs');

    $mainNav.append("<li class='line'></li>");
    var $magicLine = $('li.line');
    if ($mainNav.children().hasClass('active')) {
      $magicLine.css('left', $('ul.tabs .active').position().left);
      $magicLine.show();
    } else {
      $magicLine.hide();
    }

    $('ul.tabs li').on('click', function() {
      if (!$(this).hasClass('active')) {
        $(this)
          .addClass('active')
          .siblings()
          .removeClass('active');
        $el = $(this);
        leftPos = $el.position().left;
        $magicLine.stop().animate({
          left: leftPos,
          width: newWidth
        });
        $('ul.feeds li.active')
          .removeClass('active')
          .siblings()
          .addClass('active');
      }
    });
  };

  var videoPlayer = function() {
    var video = $('section.video-player video').get(0);
    video.load();
    $('ul.navigation-overlay #video-nav').on('click', function() {
      if ($('body').hasClass('home')) {
        if (video.paused !== true && video.ended !== true) {
          video.pause();
        } else {
          $('#pause > img').attr('src', 'image/play.png');
          video.play();
        }
      } else {
        window.history.back();
      }
    });
  };

  var mapTabs = function() {
    $('ul.maps-tabs li').on('click', function() {
      var $index = $(this).index();
      var $map = $('ul.maps li').index();
      $(this)
        .siblings()
        .removeClass('active');
      $(this).addClass('active');

      $('ul.maps li.active').removeClass('active');
      $('ul.maps li')
        .eq($index)
        .addClass('active');
    });
  };

  var navigationArrows = function() {
    $('section').on('inview', function(event, visible, topOrBottomOrBoth) {
      if (visible === true) {
        // element is now visible in the viewport
        if (topOrBottomOrBoth === 'top') {
          $(this).addClass('inview');
        } else if (topOrBottomOrBoth === 'bottom') {
          $(this).removeClass('inview');
        } else {
          $(this).addClass('inview');
        }
      } else {
        $(this).removeClass('inview');
      }
    });
  };

  var scrollTop = function() {
    var $this;
    $('span.back-to-top').on('click', function() {
      $('html, body').animate(
        {
          scrollTop: 0
        },
        1200
      );
    });
  };

  var showHideNav = function() {
    var lastScrollTop = 0;
    $(window).scroll(function() {
      var st = $(this).scrollTop();
      setTimeout(function() {
        if (st > lastScrollTop) {
          $('body').addClass('hide-nav');
        } else {
          $('body').removeClass('hide-nav');
        }
        lastScrollTop = st;
      }, 300);
    });
  };

  var init = function() {
    mainMenu();
    navigationClick();
    backgroundColour();
    closeSocialMedia();
    navigationArrows();
    magicLine();
    videoPlayer();
    mapTabs();
    scrollTop();
    showHideNav();
  };
  return {
    init: init
  };
})();
navigation.init();
