$(function () {

    $('.home-header .display-table').animate({opacity: 1}, 2000);
    $('[data-toggle="tooltip"]').tooltip()

    $(".progress-bar-linear .progress-bar").each(function (index, value) {
        $(this).animate({
            width: $(this).attr('aria-valuenow') + '%'
        }, 2500);
    });

    // var htmlCodeMirror = CodeMirror($('textarea.htmlCodeMirror'), {
    //     mode: "javascript"
    // });

    var htmlCodeMirror = CodeMirror.fromTextArea($('textarea.htmlCodeMirror')[0], {
        mode: "text/html",
        theme: 'material',
        lineNumbers: true,
        lineWrapping: true,
        styleActiveLine: true
    });


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

    // -----------------------------------------------------------------------------------------------------------------


});
