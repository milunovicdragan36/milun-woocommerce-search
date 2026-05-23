jQuery(document).ready(function ($) {
    var $panel = $('.notification-container_title_full_width');
    var $open = $('#open-search-flyout-title_full_width');
    var $close = $('#close-search-flyout-title_full_width');
    var $input = $('.search-term-title_full_width');

    var scrollTop = 0;
    var scrollbarWidth = 0;
    var isAdmin = $('body').hasClass('wp-admin');

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
        var rect = $open.get(0).getBoundingClientRect();
        var finalLeft = Math.round((window.innerWidth - $panel.outerWidth()) / 2);
        var startLeft = -$panel.outerWidth();

        /* Put panel vertically in correct place immediately */
        $panel.css({
            top: rect.bottom + 'px',
            left: startLeft + 'px'
        });

        /* Make it visible */
        $panel.addClass('active');

        /* Force browser repaint */
        $panel.get(0).offsetHeight;

        /* Animate only horizontally to final position */
        setTimeout(function () {
            $panel.css({
                left: finalLeft + 'px'
            });
        }, 10);

        setTimeout(function () {
            focusInputSafely();
        }, 350);
    }

    function closePanel() {
        var startLeft = -$panel.outerWidth();

        $panel.css({
            left: startLeft + 'px'
        });

        setTimeout(function () {
            $panel.removeClass('active');
        }, 600);
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
        if ($(e.target).is('.notification-container_title_full_width')) {
            closePanel();
        }
    });

    $(window).on('resize', function () {
        if ($panel.hasClass('active')) {
            var rect = $open.get(0).getBoundingClientRect();
            var finalLeft = Math.round((window.innerWidth - $panel.outerWidth()) / 2);

            $panel.css({
                top: rect.bottom + 'px',
                left: finalLeft + 'px'
            });
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