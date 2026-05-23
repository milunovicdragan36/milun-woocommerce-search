jQuery(document).ready(function ($) {
    var $panel = $('.notification-container_shortcode_full_width');
    var $open = $('#open-shortcode_full_width');
    var $close = $('#close-search-flyout-shortcode_full_width');
    var $input = $('.search-term-shortcode_full_width');

    var isAdmin = $('body').hasClass('wp-admin');

    if ($panel.length && $panel.parent()[0] !== document.body) {
        $('body').append($panel);
    }

    function openPanel() {
        // Always show the panel (both in frontend and admin)
        $panel.addClass('active');

        // Position the panel relative to the search icon inside the widget
        var offset = $open.offset();
        var panelHeight = $panel.outerHeight();

        // Position the panel to the right of the search icon and slide from the right
        $panel.css({
            top: offset.top - panelHeight - 20 + 'px',  // Position it above the icon
            right: '0'  // Start sliding from the right edge of the container
        });
    }

    function closePanel() {
        $panel.removeClass('active');
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
        if ($(e.target).is('.notification-container_shortcode_full_width')) {
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