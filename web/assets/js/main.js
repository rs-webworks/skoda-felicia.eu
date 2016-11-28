$(function () {

    $('.home-header .display-table').animate({opacity: 1}, 2000);
    $('[data-toggle="tooltip"]').tooltip();

    $(".progress-bar-linear .progress-bar").each(function (index, value) {
        $(this).animate({
            width: $(this).attr('aria-valuenow') + '%'
        }, 2500);
    });

    $('nav.navbar').affix({
        offset: {
            top: $('header').height()
        }
    });


    if ($('.sortable').length > 0) {
        Sortable.create($('.sortable')[0], {
            'handle': '.dragger',
            'onEnd': function (event) {
                showLoadingOverlay();
                $.ajax(Routing.generate('manager_manual_move', {
                    'id': event.item.dataset.id,
                    'direction': 'custom',
                    'changeBy': event.newIndex - event.oldIndex
                }))
                    .fail(function () {
                        alert('AJAX position change failed'); //TODO: modal
                    })
                    .always(function () {
                        hideLoadingOverlay();
                    });

            }
        });
    }

    if ($('textarea.htmlCodeMirror').length > 0) {
        var htmlCodeMirror = CodeMirror.fromTextArea($('textarea.htmlCodeMirror')[0], {
            mode: "text/html",
            theme: 'material',
            lineNumbers: true,
            lineWrapping: true,
            styleActiveLine: true
        });
    }

    $("#lightgallery").lightGallery();

    // Smooth scrolling effect
    // -----------------------------------------------------------------------------------------------------------------
    $(function () {
        $('a[href*="#"]:not([href="#"])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    // -----------------------------------------------------------------------------------------------------------------


    // Fade in on scroll
    // -----------------------------------------------------------------------------------------------------------------
    // on load
    uncoverVisibleObjects();

    // on scroll
    $(window).scroll(function () {
        uncoverVisibleObjects();
    });

    function uncoverVisibleObjects() {
        $('.hideme').each(function (i) {
            var bottom_of_object = $(this).offset().top;
            var bottom_of_window = $(window).scrollTop() + $(window).height();

            if (bottom_of_window > bottom_of_object + 70) {
                $(this).animate({'opacity': 1}, 1000);
            }
        });
    }

    function showLoadingOverlay() {
        $('.loading-overlay').fadeIn();
    }

    function hideLoadingOverlay() {
        $('.loading-overlay').fadeOut();
    }

    // -----------------------------------------------------------------------------------------------------------------


});
