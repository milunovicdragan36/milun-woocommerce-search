jQuery(document).ready(function ($) {
    var $panel = $('.notification-container_before_loop_full_width');
    var $open = $('#open-before-loop_full_width');
    var $close = $('#close-search-flyout-before-loop_full_width');
    var $input = $('.search-term-before_loop_full_width');

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
      /*  // Save scroll position and scrollbar width
        scrollTop = window.pageYOffset || document.documentElement.scrollTop || 0;
        scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;

        // Calculate the position of the open icon and place the panel below it
        var iconOffset = $open.offset();
        $panel.css({
            top: iconOffset.top + $open.outerHeight(), // Position below the button
            left: iconOffset.left
        });
*/
        // Always show the panel (both in frontend and admin)
        $panel.addClass('active');
    }

    function closePanel() {
        $panel.removeClass('active');
/*
        if (!isAdmin) {
            $('html, body').removeClass('milun-search-open');

            $('body').css({
                top: '',
                'padding-right': ''
            });

            window.scrollTo(0, scrollTop);
        }*/
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
        if ($(e.target).is('.notification-container_before_loop_full_width')) {
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