$(function () {

    $('header').animate({opacity: 1}, 2000);
    $('[data-toggle="tooltip"]').tooltip();

    $(".progress-bar-linear .progress-bar").each(function (index, value) {
        $(this).animate({
            width: $(this).attr('aria-valuenow') + '%'
        }, 2500);
    });

    $('nav.navbar').affix({
        offset: {
            top: $('header').height() - 55
        }
    });

    var clipboard = new Clipboard('.btn-copy-link');

    clipboard.on('success', function (e) {
        console.log('copied');
        $('.btn-copy-link').tooltip('show');
        setTimeout(function () {
            $('.btn-copy-link').tooltip('hide');
        }, 1000);

        e.clearSelection();
    });


    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function () {
            navigator.serviceWorker.register('./assets/js/sw.js').then(function (registration) {
                // Registration was successful
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
            }).catch(function (err) {
                // registration failed :(
                console.log('ServiceWorker registration failed: ', err);
            });
        });
    }


    // if ($('.sortable').length > 0) {
    //     Sortable.create($('.sortable')[0], {
    //         'handle': '.dragger',
    //         'onEnd': function (event) {
    //             showLoadingOverlay();
    //             $.ajax(Routing.generate('manager_manual_move', {
    //                 'id': event.item.dataset.id,
    //                 'direction': 'custom',
    //                 'changeBy': event.newIndex - event.oldIndex
    //             }))
    //                 .fail(function () {
    //                     alert('AJAX position change failed'); //TODO: modal
    //                 })
    //                 .always(function () {
    //                     hideLoadingOverlay();
    //                 });
    //
    //         }
    //     });
    // }

    if ($('textarea.htmlCodeMirror').length > 0) {
        var htmlCodeMirror = CodeMirror.fromTextArea($('textarea.htmlCodeMirror')[0], {
            mode: "text/html",
            theme: 'material',
            lineNumbers: true,
            lineWrapping: true,
            styleActiveLine: true
        });
    }

    $(".lightgallery").lightGallery({
        selector: 'a'
    });

    $('body').scrollspy({target: '.spy-active'});

    // Download countdown page
    // -----------------------------------------------------------------------------------------------------------------
    if ($('div.container#download-request').length > 0) {
        var download_countdown = $('h1#download-countdown');
        var download_time = $('h1#download-countdown #time');
        var download_button = $('a.btn.btn-success#download-button');

        var counter = 5;
        var counterInterval = setInterval(function () {
            if (counter === 0) {
                clearInterval(counterInterval);
                download_countdown.fadeOut(function () {
                    download_button.fadeIn();
                });
            } else {
                --counter;
                download_time.html(counter);
            }
        }, 1000);

        // download_button.on('click', function () {
        //     setTimeout(function () {
        //         window.close();
        //     }, 1000);
        // });
    }

    // Manual images link
    // -----------------------------------------------------------------------------------------------------------------
    if ($('article.container#manual-show').length > 0) {
        $('a.label').on('click', function (e) {

            if ($(this).find('i.fa.fa-picture-o') && $(this).data("ref-name") != undefined) {
                $('#images-panel').find("[data-image-name='" + $(this).data("ref-name") + "']").click();
            }
        });
    }


    // Smooth scrolling effect
    // -----------------------------------------------------------------------------------------------------------------
    $(function () {
        $('a[href*="#"]:not([href="#"]):not(.no-smooth-scroll)').click(function () {
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


    function showLoadingOverlay() {
        $('.loading-overlay').fadeIn();
    }

    function hideLoadingOverlay() {
        $('.loading-overlay').fadeOut();
    }

    // -----------------------------------------------------------------------------------------------------------------


});

(function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
    a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

ga('create', 'UA-91626892-1', 'auto');
ga('send', 'pageview');