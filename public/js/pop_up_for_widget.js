(function ($) {

  function getPopup() {
    return $(".pop_up_widget.milun-popup-center").first();
  }

  function openPopup() {
    var $popup = getPopup();
    if (!$popup.length) return;

    $popup.addClass("is-open");
    $("body").addClass("milun-popup-lock");

    setTimeout(function () {
      $popup.find(".search-term-widget").first().trigger("focus");
    }, 80);
  }

  function closePopup() {
    var $popup = getPopup();
    if (!$popup.length) return;

    $popup.removeClass("is-open");
    $("body").removeClass("milun-popup-lock");
  }

  /* OPEN */
  $(document).on("click", "#open-search-flyout-before-title", function (e) {
    e.preventDefault();
    openPopup();
  });

  /* CLOSE */
  $(document).on("click", "#close-search-flyout-before-title", function (e) {
    e.preventDefault();
    closePopup();
  });

  /* CLICK OUTSIDE CLOSE */
  $(document).on("click", ".pop_up_widget.milun-popup-center", function (e) {
    if (!$(e.target).closest(".notification-container").length) {
      closePopup();
    }
  });

  /* ESC CLOSE */
  $(document).on("keydown", function (e) {
    if (e.key === "Escape") {
      closePopup();
    }
  });

})(jQuery);