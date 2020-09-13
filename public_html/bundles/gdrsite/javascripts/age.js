(function ($, window, document, undefined) {
    'use strict';

    var AgeChange = {

        $trigger: $('select.age'),

        init: function () {
            this.$trigger.on('change', this.show);
        },
        show: function () {
            var $this = $(this);
            var race = $('.race').text();

            $.get(Routing.generate('user_show_attr_age', {age: $this.val(), race: race}, true), function (data) {
                $('.forza').html(data.forza);
                $('.saggezza').html(data.saggezza);
                $('.fascia').html(data.fascia);
            });
        }
    };

    AgeChange.init();

})(jQuery, window, document);