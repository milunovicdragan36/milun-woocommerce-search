(function ($) {

function getPopup(){
  return $(".pop_up_popup.milun-popup-center").first();
}

function openPopup(){
  const $popup = getPopup();
  if(!$popup.length) return;

  $popup.addClass("is-open");
  $("body").addClass("milun-popup-lock");

  setTimeout(function(){
    $popup.find(".search-term-popup").first().focus();
  },80);
}

function closePopup(){
  const $popup = getPopup();
  if(!$popup.length) return;

  $popup.removeClass("is-open");
  $("body").removeClass("milun-popup-lock");
}

/* OPEN */
$(document).on(
  "click",
  "#open-search-flyout-before-title",
  function(e){
    e.preventDefault();
    openPopup();
});

/* CLOSE ICON */
$(document).on(
  "click",
  "#close-search-flyout-before-title",
  function(e){
    e.preventDefault();
    closePopup();
});

/* CLICK OUTSIDE CLOSE */
$(document).on(
  "click",
  ".pop_up_popup.milun-popup-center",
  function(e){
    if(!$(e.target).closest(".notification-container").length){
      closePopup();
    }
});

/* ESC CLOSE */
$(document).on("keydown",function(e){
  if(e.key === "Escape"){
    closePopup();
  }
});

})(jQuery);