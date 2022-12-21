import { gsap } from 'gsap';

const cursor = (function() {
  const customCursorAnimation = function() {
    const $circle = $('.circle.main');
    const $follow = $('.circle.follow');

    function moveCircle(e) {
      gsap.to($circle, 0.3, {
        x: e.clientX,
        y: e.clientY
      });
      gsap.to($follow, 0.6, {
        x: e.clientX,
        y: e.clientY
      });
    }
    $(window).on('mousemove', moveCircle);
  };

  const init = function() {
    customCursorAnimation();
  };
  return { init: init };
})();
cursor.init();
