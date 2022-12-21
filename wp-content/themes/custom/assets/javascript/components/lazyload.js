var lazyload = (function() {
  var $background;
  var $url;
  var init = function() {
    $('.lazyload').each(function() {
      $background = $(this).data('background');
      $(this).css('background-image', 'url(' + $background + ')');
    });
    $('source').each(function() {
      $url = $(this).data('url');
      $(this).attr('srcset', $url);
    });
    $('.lazyload-image').each(function() {
      $url = $(this).data('url');
      $(this).attr('src', $url);
    });
  };
  return {
    init: init
  };
})();
lazyload.init();
