var services = (function() {
  const changeBackground = function() {
    let  $icons = $('section.services .col-lg');

    $icons.on({
      mouseenter: function() {
        let index = $(this).index();
        let newText = $(this).attr('data-text');
        changeText(newText);
        $('ul.backgrounds li').fadeOut();
        $('ul.backgrounds li').eq(index).fadeIn();
      },
      mouseleave: function() {
        $('ul.backgrounds li').fadeOut();
        changeText('Services');
      }
    });
  };

  const changeText = function(text) {
    const title = $('section.services .title');
    title.addClass('hide');
    setTimeout(function() {
      title.text(text);
      title.removeClass('hide');
    }, 600);
  };

  const init = function() {
    changeBackground();
    changeText();
  };

  return { init: init };
})();
services.init();
