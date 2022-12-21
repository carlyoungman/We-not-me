(function($) {
  $.fn.notification = function(options) {
    var $notification = $('<div class="notification"></div>');
    var $notificationTitle = $('<p class="notification-title"></p>');

    var settings = $.extend(
      {
        title: "Success",
        error: false,
        important: false
      },
      options
    );

    var $builtNotification = $notification;
    $("body").append($builtNotification);
    var notificationElement = document.getElementsByClassName(
      "notification"
    )[0];
    window.getComputedStyle(notificationElement).height;

    if (settings.error === true) {
      $notification.addClass("error");
    }

    if (settings.title) {
      $notification.append($notificationTitle);
      $notificationTitle.html(settings.title);
    }

    if (settings.important === true) {
      $notification.addClass("important");
      $notification.append(
        '<a href="#" class="notification-close"><svg class="icon icon-M fill-white"><use xlink:href="#icon-cross"></use></svg></a>'
      );

      $(".notification-close").on("click", function(e) {
        e.preventDefault();
        closeNotification();
      });
    }

    $notification.addClass("notification-open");

    function notificationTimer() {
      closeNotification();
    }

    if (settings.important === false) {
      setTimeout(notificationTimer, 3200);
    }

    var closeNotification = function() {
      $notification.removeClass("notification-open");
      $notification.on(
        "transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",
        function() {
          $notification.remove();
        }
      );
    };
    return this;
  };
})(jQuery);
