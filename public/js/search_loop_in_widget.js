jQuery('.pop_up_widget').css('display','none');
jQuery('#open-search-flyout-before-title').click(function() {
  jQuery('.pop_up_widget').css('display','block');
});


jQuery('.my_wrapper').css('display','none');
jQuery('.notification-container').css("display",'none');
    


jQuery(document).ready(function () {
  /*
document.getElementsByClassName("my_wrapper")[0].style.visibility = "visible";;
jQuery('.my_wrapper').css('display','block');
 
jQuery('.notification-container').css("display",'none');
*/


});

 


  var w=window.innerWidth;
    document.getElementsByClassName("notification-container")[0].setAttribute("style","width:"+w+"px");

function updateSearchWidth() {

    var input = document.querySelector('.search-term-widget');
    if (!input) return;

    var w = window.innerWidth;

    input.style.width = w + 'px';
    input.style.maxWidth = '80%';
    input.style.boxSizing = 'border-box';

    var input = document.querySelector('.wrapper-data-container-widget-data-posts');
    if (!input) return;

    var w = window.innerWidth;

    input.style.width = w + 'px';
    input.style.maxWidth = '80%';
    input.style.height = 'auto';
    input.style.maxHeight = '500px !important';
    input.style.boxSizing = 'border-box';
}

document.addEventListener('DOMContentLoaded', updateSearchWidth);
window.addEventListener('resize', updateSearchWidth);



jQuery('.dashicons-search').click(function(event) {
  if (jQuery('.notification-container').hasClass('dismiss')) {
    jQuery('.notification-container').removeClass('dismiss').addClass('selected').show().css("display",'block');
    jQuery('.closeFilePanel').css("display",'block');

  }
  event.preventDefault();
});

jQuery('.closeFilePanel').click(function(event) {
  if (jQuery('.notification-container').hasClass('selected')) {
    jQuery('.notification-container').removeClass('selected').addClass('dismiss');
  }
  event.preventDefault();

                 setTimeout(function () {
                    jQuery('.notification-container').css("display",'none');
                    jQuery('.closeFilePanel').css("display",'none');

                 }, 250);
        
});

document.addEventListener('DOMContentLoaded', function () {
  const icon   = document.getElementById('open-search-flyout');
  const flyout = document.getElementById('search-flyout');

  if (!icon || !flyout) return;

  function positionFlyoutFromIcon() {
    const r = icon.getBoundingClientRect();

    flyout.style.display = 'block';
    flyout.classList.remove('active');
    flyout.setAttribute('aria-hidden', 'false');

    const fw = flyout.offsetWidth;
    const fh = flyout.offsetHeight || 260;

    let left = (r.left + r.width / 2) - fw;
    left = Math.max(8, Math.min(left, window.innerWidth - fw - 8));

    let top = r.top - fh - 12;
    if (top < 8) top = r.bottom + 12;

    flyout.style.left = left + 'px';
    flyout.style.top  = top + 'px';
    flyout.style.transformOrigin = '100% 50%';
  }

  function openFlyout() {
    positionFlyoutFromIcon();
    requestAnimationFrame(() => {
      flyout.classList.add('active');
      const input = flyout.querySelector('input, textarea');
      if (input) setTimeout(() => input.focus(), 60);
    });
  }

  function closeFlyout(immediate = false) {
    flyout.classList.remove('active');
    flyout.setAttribute('aria-hidden', 'true');

    if (immediate) {
      flyout.style.display = 'none';
      return;
    }

    setTimeout(() => {
      if (!flyout.classList.contains('active')) {
        flyout.style.display = 'none';
      }
    }, 220);
  }

  function toggleFlyout(e) {
    if (e) e.preventDefault();
    if (flyout.classList.contains('active')) closeFlyout(true);
    else openFlyout();
  }

  // OPEN / TOGGLE handlers (click search icon again closes)
  icon.addEventListener('click', toggleFlyout);
  icon.addEventListener('keydown', function (e) {
    if (e.key === 'Enter' || e.key === ' ') toggleFlyout(e);
  });

  // CLOSE button: ONLY this element closes it (and search icon toggle)
  document.addEventListener('click', function (e) {
    const closeBtn = e.target.closest('#close-search-flyout');
    if (!closeBtn) return;

    e.preventDefault();
    e.stopPropagation();
    e.stopImmediatePropagation();
    closeFlyout(true);
  }, true); // capture

  // 🚫 REMOVED: close on outside click
  // document.addEventListener('click', function (e) {
  //   if (!flyout.classList.contains('active')) return;
  //   if (flyout.contains(e.target) || icon.contains(e.target)) return;
  //   closeFlyout();
  // });

  // 🚫 REMOVED (optional): close on ESC
  // document.addEventListener('keydown', function (e) {
  //   if (e.key === 'Escape') closeFlyout(true);
  // });

  window.addEventListener('resize', function () {
    if (flyout.classList.contains('active')) positionFlyoutFromIcon();
  });
  window.addEventListener('scroll', function () {
    if (flyout.classList.contains('active')) positionFlyoutFromIcon();
  }, true);
});



