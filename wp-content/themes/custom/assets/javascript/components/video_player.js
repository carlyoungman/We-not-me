var videos = (function() {
  var slideWrapper = $('section.video-player .media-slider');

  function playPauseVideo(slick, control) {
    var currentSlide = slick.find('.slick-current .item');
    var video = currentSlide.find('video').get(0);
    if (video !== null) {
      if (control === 'play') {
        video.play();
      } else {
        video.pause();
      }
    }
  }

  var sliderEvents = function() {
    slideWrapper.on('beforeChange', function(event, slick) {
      slick = $(slick.$slider);
      playPauseVideo(slick, 'pause');
    });
    slideWrapper.on('afterChange', function(event, slick) {
      slick = $(slick.$slider);
      playPauseVideo(slick, 'play');
    });
    slideWrapper.on('lazyLoaded', function(event, slick, image, imageSource) {
      lazyCounter++;
      if (lazyCounter === lazyImages.length) {
        lazyImages.addClass('show');
        // slideWrapper.slick("slickPlay");
      }
    });
  };

  var init = function() {
    sliderEvents();
  };
  return { init: init };
})();

if ($('.media-slider').length) {
  videos.init();
}
