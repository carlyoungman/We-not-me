var icons = (function() {
  var injection = function() {
    var baseURL = '/wp-content/themes/custom/dist/assets/images/SVG/';
    $.get(baseURL + 'master.svg', function(data) {
      var div = document.createElement('div');
      div.className += 'master-svg';
      div.innerHTML = new XMLSerializer().serializeToString(
        data.documentElement
      );
      document.body.insertBefore(div, document.body.childNodes[0]);
    });
  };
  var clickAnimation = function() {
    var $icon;
    $('svg.icon').on('click', function() {
      $icon = $(this);
      $icon.addClass('clicked');
      setTimeout(function() {
        $icon.removeClass('clicked');
      }, 200);
    });
  };
  var init = function() {
    injection();
    clickAnimation();
  };
  return { init: init };
})();
icons.init();
