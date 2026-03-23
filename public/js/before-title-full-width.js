jQuery(document).ready(function ($) {
    var $panel = $('.notification-container_full_width');
    var $open = $('#open-search-flyout-before-title_full_width');
    var $close = $('#close-search-flyout-before-title_full_width');
    var $input = $('.search-term-before_title_full_width');

    var scrollTop = 0;
    var scrollbarWidth = 0;
    var isAdmin = $('body').hasClass('wp-admin');

    if ($panel.length && $panel.parent()[0] !== document.body) {
        $('body').append($panel);
    }

    function focusInputSafely() {
        if (!$input.length) {
            return;
        }

        var inputEl = $input.get(0);

        try {
            inputEl.focus({ preventScroll: true });
        } catch (err) {
            inputEl.focus();
        }
    }

 function openPanel() {
    // Save scroll position and scrollbar width
    scrollTop = window.pageYOffset || document.documentElement.scrollTop || 0;
    scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
/*
    // Only apply styles in frontend (not in admin)
    if (!isAdmin) {
        // Lock scroll and apply padding-right only in frontend
        $('html, body').addClass('milun-search-open');

        $('body').css({
            top: -scrollTop + 'px', // Scroll lock (only frontend)
            'padding-right': scrollbarWidth + 'px' // Compensate for scrollbar width
        });

        // Focus the input field safely (with prevent scroll)
        setTimeout(function () {
            focusInputSafely();
        }, 500);
    }
*/
    // Always show the panel (both in frontend and admin)
    $panel.addClass('active');
}


    function closePanel() {
        $panel.removeClass('active');

        if (!isAdmin) {
            $('html, body').removeClass('milun-search-open');

            $('body').css({
                top: '',
                'padding-right': ''
            });

            window.scrollTo(0, scrollTop);
        }
    }

    $open.on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
       openPanel();
    });

    $close.on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        closePanel();
    });

    $(document).on('keydown', function (e) {
        if (e.key === 'Escape' && $panel.hasClass('active')) {
            closePanel();
        }
    });

    $panel.on('click', function (e) {
        if ($(e.target).is('.notification-container_full_width')) {
            closePanel();
        }
    });

    document.addEventListener(
        'touchmove',
        function (e) {
            if (!isAdmin && document.body.classList.contains('milun-search-open')) {
                e.preventDefault();
            }
        },
        { passive: false }
    );
});
