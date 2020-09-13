var Pending;
Pending = {
    init: function (start, $target) {

        if (start == true) {
            $target.addClass('pending');
        } else {
            $target.removeClass('pending');
        }
    }
};

var Popup;
Popup = {
    $active: null,
    $popup: null,

    alert: function (popClass, msg) {
        var $popup = $('#' + popClass + '-popup');
        $popup.find('.reveal-content').html(msg);

        $popup.foundation('reveal', 'open');

        $popup.on('closed', function(){
            $popup.find('.reveal-content').empty().html();
            if (popClass == 'medium'){
                $popup.mCustomScrollbar("destroy");
            }
        });

        if (popClass == 'medium'){
            $popup.mCustomScrollbar({
                theme: "dark-2",
                scrollButtons: {
                    enable: true
                },
                advanced: {
                    updateOnContentResize: Boolean
                }
            });
        }

        Popup.$active = $popup;
    },
    confirm: function (popClass, msg, callBackConfirm) {
        var confirm = msg + "<p class='buttons'><button class='button-no'>← Annulla</button> <button class='button-yes'>Conferma</button></p>";

        var $popup = $('#' + popClass + '-popup');
        $popup.find('.reveal-content').html(confirm);
        $popup.foundation('reveal', 'open');

        $popup.find('.button-no').on('click', function () {
            $popup.foundation('reveal', 'close');
        });

        $popup.find('.button-yes').on('click', callBackConfirm);

        Popup.$active = $popup;
    },
    refresh: function (msg) {
        Popup.$active.find('.reveal-content').html(msg);
    },
    close: function () {
        Popup.$active.foundation('reveal', 'close');
    }
};

// ------------------------------------------------------------------------

$(document).ready(function () {
    // Foundation  ---------------------------
    $(document).foundation();

    // Tooltips    ---------------------------
    $('body').on('mouseenter', '.gdrtooltip', function(){
        $(this).tooltipster({
            theme: '.tooltipster-shadow',
            updateAnimation: false

        }).on('click', function () {
                $(this).tooltipster('hide');
            });
        $(this).tooltipster('show');
    });

    $.ionSound({
        sounds: [
            "churchbell",
            "corvo"
        ],
        path: "/sounds/",
        multiPlay: false,
        volume: "0.1"
    });

    $('#layout-left-wrap').niceScroll({
        cursorcolor: "#30130b",
        cursorborder: "none"
    });
});