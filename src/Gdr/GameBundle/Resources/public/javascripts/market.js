(function ($, window, document, undefined) {
    'use strict';

    var Market = {

        quantity: null,
        itemId: null,
        $quantityInput: null,
        $quantityText: null,
        $bankAmountText: null,
        $popUp: $('#small-popup'),

        init: function () {
            $('table.market-item').find('form').on('submit', this.submitForm);
        },

        submitForm: function (e) {
            e.preventDefault();

            var itemId = $(this).data('item');
            var $currentTr = $('#item-' + itemId);

            Market.$quantityText = $currentTr.find('.item-quantity');
            Market.$quantityInput = $currentTr.find('.buy-quantity');

            var price = $currentTr.find('.item-price').text();
            var itemName = $currentTr.find('.item-name').text();

            Market.$bankAmountText = $('.bankAmount');
            var bankAmount = Market.$bankAmountText.text();

            var total = price * Market.$quantityInput.val();

            if (!Market.$quantityInput.val() || parseInt(Market.$quantityInput.val()) <= 0) {
                var msg = "<p>Attenzione: devi inserire una quantità maggiore di 0.</p>";
                Popup.alert('small', msg);
                return;
            }

            if (parseInt(Market.$quantityInput.val()) > parseInt(Market.$quantityText.text())) {
                var msg = "<p>Attenzione: la quantità che hai indicato supera quella disponibile.</p>";
                Popup.alert('small', msg);
                return;
            }

            if (total > bankAmount) {
                var msg = "<p>Attenzione: non puoi effettuare quest'acquisto perché non hai abbastanza fondi nel tuo conto bancario.</p>";
                Popup.alert('small', msg);
                return;
            }

            var msg = "<p>Sei sicuro di voler acquistare <strong>" + Market.$quantityInput.val() + "</strong> unità di <strong>" + itemName + "</strong> per un totale di <strong>";
            var msg = msg + total + "</strong> Mori? <br> Il tuo conto bancario è pari a <strong>" + bankAmount + " </strong> Mori e ";
            var msg = msg + "dopo quest'acquisto la tua somma rimanente sarà di <strong>" + (bankAmount - total) + "</strong>.</p>";

            Market.itemId = itemId;
            Popup.confirm('small', msg, Market.buyItems);

        },

        buyItems: function (quantity, itemId) {
            var msg = "<p>I mercanti stanno preparando la merce, attendi qualche secondo...</p>";

            Popup.alert('small', msg);

            $.getJSON(Routing.generate('market-buy', {quantity: Market.$quantityInput.val(), itemId: Market.itemId}), function (data) {

                Popup.alert('small', '<p>'+data.message+'</p>');

                if (data.response) {
                    // Aggiorno banca e quantità dell'oggetto acquistato
                    Market.$quantityText.html(data.quantityAvailable);
                    Market.$bankAmountText.html(data.bankAmount);
                    Market.$quantityInput.val(0);
                }
            });
        }
    };

    Market.init();

})(jQuery, window, document);