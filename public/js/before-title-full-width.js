jQuery(document).ready(function ($) {
    var $panel = $('.notification-container_full_width');
    var $open = $('#open-search-flyout-before-title_full_width');
    var $close = $('#close-search-flyout-before-title_full_width');
    var $input = $('.search-term-before_title_full_width');
    var scrollTop = 0;

    /* Optional but recommended:
       move panel directly under body to avoid z-index/overflow issues */
    if ($panel.length && $panel.parent()[0] !== document.body) {
        $('body').append($panel);
    }

    function openPanel() {
        scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        $panel.addClass('active');
        $('html, body').addClass('milun-search-open');
        $('body').css('top', -scrollTop + 'px');

        setTimeout(function () {
            $input.trigger('focus');
        }, 500);
    }

    function closePanel() {
        $panel.removeClass('active');
        $('html, body').removeClass('milun-search-open');
        $('body').css('top', '');

        window.scrollTo(0, scrollTop);
    }

    /* Open */
    $open.on('click', function (e) {
        e.preventDefault();
        openPanel();
    });

    /* Close */
    $close.on('click', function (e) {
        e.preventDefault();
        closePanel();
    });

    /* ESC close */
    $(document).on('keydown', function (e) {
        if (e.key === 'Escape') {
            closePanel();
        }
    });

    /* Prevent touch scroll on mobile when panel is open */
    document.addEventListener(
        'touchmove',
        function (e) {
            if (document.body.classList.contains('milun-search-open')) {
                e.preventDefault();
            }
        },
        { passive: false }
    );
});