(function ($, window, document, undefined) {
    'use strict';

    var LocationModal = {

        init: function () {
            $('#show-location-modal, #show-map-modal').on('click', this.show);
        },

        show: function (e) {
            e.preventDefault();
            var $this = $(this);
            Popup.alert('medium', "<p>Attendi...</p>");

            $.get($this.data('href'), function (data) {
                Popup.refresh(data);
            });
        }
    };

    LocationModal.init();

})(jQuery, window, document);

// -------------------------------------------

var Clock = {

    $container: $('#actual-date'),
    $time: null,
    timestamp: null,
    interval: null,

    init: function () {
        Clock.$time = Clock.$container.find('.time');
        Clock.interval = setInterval(Clock.timer, 1000 * 25);
        Clock.timer();
    },

    timer: function () {
        var date = new Date();
        Clock.$time.text('ore ' + date.getHours() + ':' + (date.getMinutes() < 10 ? '0' : '') + date.getMinutes());

        if ($.cookie('sound-is-active') == "1"  && date.getMinutes() == "0" && $.cookie('sound-church-hour') != date.getHours()) {
            $.ionSound.play("churchbell");
            $.cookie('sound-church-hour', date.getHours(), { path: '/' });
        }
    }
};

var SoundSettings = {

    init: function () {
        var $container = $(document).find('#toggle-suoni');

        if ($container.data('sound') == "on"){
            SoundSettings.on();
        }else{
            SoundSettings.off();
        }

        $(document).on('click', "#toggle-suoni", function (e) {
            e.preventDefault();
            var $this = $(this);

            $.get($this.data('href'), function (data) {
                $this.closest('li').html(data);
                if ($(document).find('#toggle-suoni').data('sound') == "on") {
                    SoundSettings.on();
                } else {
                    SoundSettings.off();
                }
            });
        });

        // Le missive devono fare il suono?
        SoundSettings.checkMissiveSound();
    },
    off: function () {

        $.cookie('sound-is-active', "0", { path: '/' });
    },
    on: function () {


        $.cookie('sound-is-active', "1", { path: '/' });
    },
    checkMissiveSound: function () {

        var $container = $("#buttons").find('.letter').find('a');

        // data-sound == off quando non ci sono nuove missive
        // data-sound == on  quando ci sono nuove missive
        // la prima volta che faccio il suono, setto corvo ad off.
        // Se data-sound è ON e corvo è OFF, e ci sono nuove missive, rimane così.
        // Se data-sound è OFF e corvo è OFF, corvo passa a true

        if ($.cookie('sound-is-active') == "1"){

            if ($container.data('sound') == "on"){

                if ($.cookie('sound-corvo') == "1" || $.cookie('sound-corvo') == undefined){
                    $.ionSound.play("corvo");
                    $.cookie('sound-corvo', "0", { path: '/' });
                }
            }

            // Se non ci sono missive, posso far ripartire il suono quando arrivano missive.
            if ($container.data('sound') == "off"){
                $.cookie('sound-corvo', "1", { path: '/' });
            }
        }
    }
};

$(document).ready(function () {
    Clock.init();
    SoundSettings.init();
});

// ---------------------------------------

(function ($, window, document, undefined) {
    'use strict';

    var MenuSwitcher = {

        $triggerOn: $('#ribbon-on'),
        $triggerOff: $('#ribbon-off'),
        $containerOn: $('#menu-book-on'),
        $containerOff: $('#menu-book-off'),
        $triggerBagMini: $('#ribbon-borsa'),
        $bagMini: $('#bag-mini'),

        init: function () {
            this.$triggerOn.on('click', this.showMenuOn);
            this.$triggerOff.on('click', this.showMenuOff);
            this.$triggerBagMini.on('click', this.showBagMini);

            if ($.cookie("show-menu") == "on"){
                this.$triggerOn.click();
            }else if ($.cookie("show-menu") == "off"){
                this.$triggerOff.click();
            }
        },

        showMenuOff: function (e) {
            e.preventDefault();

            $(this).addClass('active');
            MenuSwitcher.$triggerOn.removeClass('active');
            MenuSwitcher.$triggerBagMini.removeClass('active');

            MenuSwitcher.$containerOn.hide();
            MenuSwitcher.$bagMini.hide();
            MenuSwitcher.$containerOff.show();

            $.cookie("show-menu", "off", { path: '/' });
        },

        showMenuOn: function (e) {
            e.preventDefault();

            $(this).addClass('active');
            MenuSwitcher.$triggerOff.removeClass('active');
            MenuSwitcher.$triggerBagMini.removeClass('active');

            MenuSwitcher.$containerOff.hide();
            MenuSwitcher.$bagMini.hide();
            MenuSwitcher.$containerOn.show();

            $.cookie("show-menu", "on", { path: '/' });
        },

        hideMenus: function () {

            MenuSwitcher.$triggerOn.removeClass('active');
            MenuSwitcher.$triggerOff.removeClass('active');
            MenuSwitcher.$containerOn.hide();
            MenuSwitcher.$containerOff.hide();
        },

        showBagMini: function (e) {
            e.preventDefault();
            var $a = $(this);
            MenuSwitcher.hideMenus();
            MenuSwitcher.$triggerBagMini.addClass('active');
            MenuSwitcher.$bagMini.show().addClass('loader loader-animated').html('<p class="text-centered"></p>');

            $.get($a.attr('href'), function (data) {
                MenuSwitcher.$bagMini.html(data).removeClass('loader loader-animated');
                MenuSwitcher.activateBagScroller();
            });

        },

        activateBagScroller: function () {
            MenuSwitcher.$bagMini.mCustomScrollbar({
                theme: "dark-2",
                scrollButtons: {
                    enable: true
                },
                advanced: {
                    updateOnContentResize: Boolean
                }
            });
//            MenuSwitcher.$bagMini.niceScroll({
//                cursoropacitymin: 0.4,
//                cursorcolor: "#30130b",
//                cursorborder: "none"
//            });
        }
    };

    MenuSwitcher.init();

})(jQuery, window, document);

// ---------------------------------------------------------------------------------------------------------------------

(function ($, window, document, undefined) {
    'use strict';

    var Resize = {

        $content: $('#content'),
        $wrapperAvatar: $('.wrapper-avatar'),
        $colSx: $('#layout-left-wrap'),
        $colDx: $('#layout-right'),

        init: function () {
            if (this.$wrapperAvatar.length) {
                this.resizeAvatar();
                $(window).on('resizestop', this.resizeAvatar);
            }
            $("#hideSx").on('click', this.toggleColumnSx);
        },
        resizeAvatar: function () {
            var contentHeight = Resize.$content.outerHeight(true);

            Resize.$wrapperAvatar.height(contentHeight);
        },
        hideColumnSx: function() {
            Resize.$colSx.css('margin-left', "-320px");
            Resize.$colSx.addClass('hiddenSx');
            Resize.$colDx.css('margin-left', "27px");
        },
        showColumnSx: function() {
            Resize.$colSx.css('margin-left', 0);
            Resize.$colSx.removeClass('hiddenSx');
            Resize.$colDx.css('margin-left', "347px");
        },
        toggleColumnSx: function() {
            if (Resize.$colSx.hasClass('hiddenSx')){
                Resize.showColumnSx();
            }else{
                Resize.hideColumnSx();
            }
        }
    };

    Resize.init();

})(jQuery, window, document);

// ---------------------------------------------------------------------------------------------------------------------

var Refresh = {

    $container: $('#refresh-characters').find('.target-ajax'),
    missiveInterval: null,
    meteoInterval: null,
    pgInOut: null,
    marque: null,
    date: null,

    init: function () {
        Refresh.missiveInterval = setInterval(this.getMissive, 20 * 1000);
        Refresh.meteoInterval = setInterval(this.meteo, 60 * 5 * 1000);
        Refresh.pgInOut = setInterval(this.getPgInOut, 60 * 2 * 1000);
        Refresh.date = setInterval(this.getDate, 60 * 5 * 1000);
        Refresh.startMarque();
        Refresh.getMarque();

        // TODO: refreshStrillone e refreshAraldo
    },

    getMissive: function () {
        var $container = $('#buttons').find('.letter');

        $.get(Routing.generate('missive-ajax'), function (data) {
            $container.html(data);

            SoundSettings.checkMissiveSound();
        });
    },

    getPgInOut: function () {
        $.get(Routing.generate('logged-in-out'), function (data) {
            Refresh.$container.html(data);
        });
    },

    meteo: function () {
        $.get(Routing.generate('meteo-show'), function (data) {
            $('body').find('#meteo-ajax').html(data);
            $('#meteo-ajax').find('.gdrtooltip').tooltipster({
                theme: '.tooltipster-shadow'
            });
        });
    },

    startMarque: function () {
        Refresh.date = setInterval(Refresh.getMarque, 60 * 5 * 1000);
    },

    getMarque: function () {
        $.get(Routing.generate('marque-show'), function (data) {
            $('#marque').html(data);
        });
    },

    getDate: function () {
        $.get(Routing.generate('date-show'), function (data) {
            $('#actual-date').find('.date').html(data);
        });
    }
};

Refresh.init();

// ---------------------------------------------------------------------------------------------------------------------

(function ($, window, document, undefined) {
    'use strict';

    var Marque = {

        init: function () {
            $(document).on('click', '#marque-toggle', this.toggle)
        },

        toggle: function () {
            var $marque = $('#marque-tag');

            if ($marque.attr('scrollamount') == 3) {
                $marque.attr("scrollamount", "0");
                $marque.stop();
                Refresh.marque = null;
            } else {
                $marque.attr("scrollamount", "3");
                Refresh.startMarque();
            }
        }
    };

    Marque.init();

    var Other = {
        init: function () {
            $('#ribbon-esci').on('click', this.leave);
        },

        leave: function (e) {
            e.preventDefault();

            var $this = $(this);
            var msg = "<p>Sei sicuro di voler uscire dal gioco?</p>";
            Popup.confirm("small", msg, function () {
                window.location.href = $this.attr('href');
            });
        }
    };

    Other.init();

})(jQuery, window, document);

(function ($, window, document, undefined) {
    'use strict';

    var LocationChat = {

        $container: $("#change-location-chat"),

        init: function () {
            this.$container.on('click', this.changeLocation);
        },

        changeLocation: function (e) {
            e.preventDefault();
            var $this = $(this);

            $.getJSON(Routing.generate('change_location', {id: $this.data('location'), ajax: 1}), function (data) {
                console.log(data);
                if (data.response) {
                    window.location.href = data.url;
                } else {
                    Popup.alert("small", "<p>" + data.msg + "</p>");
                }
            });
        }
    };

    LocationChat.init();

})(jQuery, window, document);