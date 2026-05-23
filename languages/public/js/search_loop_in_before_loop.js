jQuery('.pop_up_before_loop').css('display', 'none');

jQuery('#open-search-flyout-before-title').click(function () {
    jQuery('.pop_up_before_loop').css('display', 'block');
});

jQuery('.my_wrapper').css('display', 'none');
jQuery('.notification-container').css('display', 'none');

jQuery(document).ready(function ($) {

    /*
    var myWrapper = document.getElementsByClassName("my_wrapper")[0];
    if (myWrapper) {
        myWrapper.style.visibility = "visible";
    }

    $('.my_wrapper').css('display', 'block');
    $('.notification-container').css('display', 'none');
    */

    var w = window.innerWidth;
    var $notificationContainer = $('.notification-container').first();

    if ($notificationContainer.length) {
        $notificationContainer.css('width', w + 'px');
    }
});

function updateSearchWidth() {

    var inputSearch = document.querySelector('.search-term-before-loop');
    if (inputSearch) {
        var w = window.innerWidth;
        inputSearch.style.width = w + 'px';
        inputSearch.style.maxWidth = '80%';
        inputSearch.style.boxSizing = 'border-box';
    }

    var resultsWrapper = document.querySelector('.wrapper-data-container-before-loop-data-posts');
    if (resultsWrapper) {
        var w2 = window.innerWidth;
        resultsWrapper.style.width = w2 + 'px';
        resultsWrapper.style.maxWidth = '80%';
        resultsWrapper.style.height = 'auto';
        resultsWrapper.style.maxHeight = '500px';
        resultsWrapper.style.boxSizing = 'border-box';
    }
}

document.addEventListener('DOMContentLoaded', updateSearchWidth);
window.addEventListener('resize', updateSearchWidth);

jQuery('.dashicons-search').click(function (event) {
    if (jQuery('.notification-container').hasClass('dismiss')) {
        jQuery('.notification-container')
            .removeClass('dismiss')
            .addClass('selected')
            .show()
            .css('display', 'block');

        jQuery('.closeFilePanel').css('display', 'block');
    }
    event.preventDefault();
});

jQuery('.closeFilePanel').click(function (event) {
    if (jQuery('.notification-container').hasClass('selected')) {
        jQuery('.notification-container').removeClass('selected').addClass('dismiss');
    }

    event.preventDefault();

    setTimeout(function () {
        jQuery('.notification-container').css('display', 'none');
        jQuery('.closeFilePanel').css('display', 'none');
    }, 250);
});

document.addEventListener('DOMContentLoaded', function () {
    const icon = document.getElementById('open-search-flyout');
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
        flyout.style.top = top + 'px';
        flyout.style.transformOrigin = '100% 50%';
    }

    function openFlyout() {
        positionFlyoutFromIcon();

        requestAnimationFrame(function () {
            flyout.classList.add('active');
            const input = flyout.querySelector('input, textarea');
            if (input) {
                setTimeout(function () {
                    input.focus();
                }, 60);
            }
        });
    }

    function closeFlyout(immediate) {
        immediate = immediate || false;

        flyout.classList.remove('active');
        flyout.setAttribute('aria-hidden', 'true');

        if (immediate) {
            flyout.style.display = 'none';
            return;
        }

        setTimeout(function () {
            if (!flyout.classList.contains('active')) {
                flyout.style.display = 'none';
            }
        }, 220);
    }

    function toggleFlyout(e) {
        if (e) e.preventDefault();

        if (flyout.classList.contains('active')) {
            closeFlyout(true);
        } else {
            openFlyout();
        }
    }

    icon.addEventListener('click', toggleFlyout);

    icon.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
            toggleFlyout(e);
        }
    });

    document.addEventListener('click', function (e) {
        const closeBtn = e.target.closest('#close-search-flyout');
        if (!closeBtn) return;

        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        closeFlyout(true);
    }, true);

    window.addEventListener('resize', function () {
        if (flyout.classList.contains('active')) {
            positionFlyoutFromIcon();
        }
    });

    window.addEventListener('scroll', function () {
        if (flyout.classList.contains('active')) {
            positionFlyoutFromIcon();
        }
    }, true);
});