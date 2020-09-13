(function ($, window, document, undefined) {
    'use strict';

    var Erario = {

        $button: null,
        $quantity: null,
        $currentr: null,

        init: function () {
            $('table.erario').find('button').on('click', this.confirmBuy);
        },

        confirmBuy: function (e) {
            e.preventDefault();
            var $this = $(this);
            var $currentTr = $this.parents('tr');
            Erario.$button = $this;
            Erario.$quantity = $currentTr.find('.quantity');
            var msg = "<p>Sei sicuro di voler effettuare questo acquisto?</p>";

            Erario.$currentTr = $currentTr;
            Popup.confirm('small', msg, Erario.buy);
        },

        buy: function () {
            var msg = "<p>L'Erario sta verificando i documenti, attendi qualche secondo...</p>";

            Popup.alert('small', msg);

            $.getJSON(Erario.$button.data('href'), function (data) {

                Popup.alert('small', '<p>'+data.message+'</p>');

                if (data.response) {
                    Erario.$quantity.html(data.quantityAvailable);
                    Erario.$currentTr.remove();
                }
            });
        }
    };

    Erario.init();

})(jQuery, window, document);