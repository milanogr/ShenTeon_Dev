(function ($, window, document, undefined) {
    'use strict';

    var SelectRace = {

        $trigger: $('select'),

        init: function () {
            this.$trigger.on('change', this.show);
            this.openFirst();
        },
        show: function () {
            var $this = $(this);

            var $target = $('.race-container');
            $target.html('<p class="text-centered">Caricamento...</p>');

            $.get(Routing.generate('user_show_race', {id: $this.val()}), function (data) {
                $target.hide().html(data).fadeIn();
            });
        },
        openFirst: function () {
            var $target = $('.race-container');
            var val = SelectRace.$trigger.val();

            $.get(Routing.generate('user_show_race', {id: val}), function (data) {
                $target.hide().html(data).fadeIn();
            });
        }
    };

    SelectRace.init();

})(jQuery, window, document);