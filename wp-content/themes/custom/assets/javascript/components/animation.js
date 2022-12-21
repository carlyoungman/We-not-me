import { gsap } from "gsap";
import { TimelineMax, MorphSVGPlugin, Power1, Power2, Linear } from "gsap";
import * as ScrollMagic from "scrollmagic";
import { ScrollMagicPluginGsap } from "scrollmagic-plugin-gsap";
var cookie = require("cookie");
ScrollMagicPluginGsap(ScrollMagic, gsap);
gsap.registerPlugin(MorphSVGPlugin);
MorphSVGPlugin.convertToPath("circle, ellipse, polygon");
const animation = (function() {
  const landingPage = function() {
    function makeWord(elem, count, label) {
      let logo = "#logo #path" + count;
      let element = elem + " #path" + count;
      tl.to(logo, { duration: 0.6, morphSVG: element }, label);
      return tl;
    }
    const tl = new TimelineMax({ onComplete: hideScreen });
    const t1 = gsap.timeline({
      defaults: {
        ease: "Power2.easeInOut",
        duration: 0.6,
        repeat: 0,
        onComplete: hideScreen
      }
    });

    const dur = "0.6";
    const blobTiming = ">0.2";
    const wordTiming = ">1";
    const delay = 0.6;

    tl.to(
      "#logo path",
      { duration: dur, delay: delay, morphSVG: "#blob" },
      delay
    ).addLabel("endofblob-1", blobTiming);
    for (let i = 1; i <= 12; i++) {
      makeWord("#english", i, "endofblob-1");
    }
    t1.addLabel("endOfEndlish", wordTiming);
    tl.to(
      "#logo path",
      { duration: dur, delay: delay, morphSVG: "#blob" },
      "endOfEndlish"
    ).addLabel("endofblob-2", blobTiming);
    for (let i = 1; i <= 12; i++) {
      makeWord("#german", i, "endofblob-2");
    }
    t1.addLabel("endOfGerman", wordTiming);
    tl.to(
      "#logo path",
      { duration: dur, delay: delay, morphSVG: "#blob" },
      "endOfGerman"
    ).addLabel("endofblob-3", blobTiming);
    for (let i = 1; i <= 12; i++) {
      makeWord("#french", i, "endofblob-3");
    }
    t1.addLabel("endOfFrench", wordTiming);
    tl.to(
      "#logo path",
      { duration: dur, delay: delay, morphSVG: "#blob" },
      "endOfFrench"
    ).addLabel("endofblob-4", blobTiming);
    for (let i = 1; i <= 12; i++) {
      makeWord("#dutch", i, "endofblob-4");
    }
    t1.addLabel("endOfDutch", wordTiming);
    tl.to(
      "#logo path",
      { duration: dur, delay: delay, morphSVG: "#blob" },
      "endOfDutch"
    );

    function hideScreen() {
      $.cookie("landingPage", "true");
      // tl.pause(0);
      setTimeout(function() {
        $("body").addClass("hide-screen");
        videoReveal();
      }, 20000);
      setTimeout(function() {
        $("section.landing-page").remove();
      }, 22000);
    }

    setTimeout(function() {
      $(".landing-page-skip").addClass("show");
    }, 1000);

    $("section.landing-page .landing-page-skip ").on("click", function() {
      hideScreen();
    });
  };

  const headlineWithImage = function() {
    const controller = new ScrollMagic.Controller();
    $("section.headline-with-image").each(function() {
      const headline = $(this).find(".headline");
      const action = gsap.fromTo(
        headline,
        1,
        { y: "100%" },
        { y: "-75%" },
        { ease: Power1.inOut }
      );
      new ScrollMagic.Scene({
        triggerElement: this,
        offset: 0,
        triggerHook: 0.4,
        duration: "100%"
      })
        .setTween(action)
        .addTo(controller);
    });
  };

  const imageReveal = function() {
    const controller = new ScrollMagic.Controller();

    $("section.headline-with-image").each(function(i) {
      const tl = new TimelineMax();
      const t1 = gsap.timeline({
        defaults: {
          ease: "Power2.easeInOut",
          duration: 1,
          repeat: 0
        }
      });

      const cov = $(this).find(".cover");
      const media = $(this).find(".media");
      const article = $(this).find("article");

      if (i % 2 === 0) {
        tl.from(cov, 1, { scaleX: 0, transformOrigin: "right" });
        tl.to(cov, 1, { scaleX: 0, transformOrigin: "left" }, "reveal");
      } else {
        tl.from(cov, 1, { scaleX: 0, transformOrigin: "left" });
        tl.to(cov, 1, { scaleX: 0, transformOrigin: "right" }, "reveal");
      }

      tl.call(function() {
        article.addClass("show");
        setTimeout(function() {
          article.find("b").addClass("hightlight");
        }, 600);
      });
      tl.from(media, 1, { opacity: 0 }, "reveal");

      const scene = new ScrollMagic.Scene({
        triggerElement: this,
        triggerHook: 0.6
      })
        .setTween(tl)
        .reverse(false)
        .addTo(controller);
    });
  };

  const videoReveal = function() {
    const controller = new ScrollMagic.Controller();
    const $video = $("section.hero");
    const tl = new TimelineMax();
    const t1 = gsap.timeline({
      defaults: {
        ease: "Power2.easeInOut",
        duration: 1,
        repeat: 0
      }
    });

    const cov = $video.find(".cover");
    const media = $(this).find("media");

    tl.to(cov, 1, { scaleX: 0, transformOrigin: "top" }, 0.5);
    tl.from(media, 1, { opacity: 0 }, "reveal");
    tl.call(function() {
      $video.find("article").addClass("show");
    });

    const scene = new ScrollMagic.Scene({
      triggerElement: this,
      triggerHook: 0.7
    })
      .setTween(tl)
      .reverse(false)
      .addTo(controller);
  };

  var scrollTo = function() {
    var prev = $("li#vertical-nav").find("svg#scroll-prev");
    var next = $("li#vertical-nav").find("svg#scroll-next");
    next.on("click", function() {
      var section = $("main#main section.inview")
        .index(0)
        .next("section");
      $([document.documentElement, document.body]).animate(
        {
          scrollTop: section.scrollTop().offset().top
        },
        700
      );
    });
    prev.on("click", function() {
      var section = $("main#main section.inview").prev("section");
      $([document.documentElement, document.body]).animate(
        {
          scrollTop: section.scrollTop().offset().top
        },
        700
      );
    });
  };

  const heroText = function() {
    const controller = new ScrollMagic.Controller();

    const headline = $("section.hero article");
    const action = gsap.fromTo(
      headline,
      1,
      { y: "25%" },
      { y: "-75%" },
      { ease: Power1.inOut }
    );
    new ScrollMagic.Scene({
      triggerElement: this,
      triggerHook: 0.4,
      duration: "100%"
    })
      .setTween(action)
      .addTo(controller);
  };

  const loadAnimation = function() {
    $("main#main").addClass("loaded");
  };

  const landingPageToggle = function() {
    var check = $("label.switch input");
    check.on("click", function() {
      if ($("label.switch input:checked").length) {
        $.removeCookie("landingPage");
      } else {
        $.cookie("landingPage", "true");
      }
    });
  };

  const landingPageCheck = function() {
    if ($.cookie("landingPage")) {
      $("body").addClass("hide-screen");
      $("section.landing-page").remove();
      videoReveal();
    } else {
      landingPage();
    }
  };

  const init = function() {
    landingPageCheck();
    loadAnimation();
    landingPageToggle();
    imageReveal();

    $(window)
      .on("resize", function() {
        if ($("#main").width() >= 992) {
          heroText();
          headlineWithImage();
        }
      })
      .resize();
  };
  return { init: init };
})();
animation.init();
