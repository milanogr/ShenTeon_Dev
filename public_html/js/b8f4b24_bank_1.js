(function ($, window, document, undefined) {
    'use strict';

    var BankPrelievo = {

        $container: $('.bank-container'),
        $form: $('#bank-prelievo'),
        $popUp: $('#small-popup'),
        $inputQuantity: null,
        $bankAmount: null,
        $bagAmount: null,
        quantity: null,

        init: function () {
            this.$form.on('submit', this.validate);
        },

        validate: function (e) {
            e.preventDefault();

            BankPrelievo.$inputQuantity = BankPrelievo.$form.find('.prelievo-quantity');
            BankPrelievo.quantity = parseInt(BankPrelievo.$inputQuantity.val());
            console.log(BankPrelievo.quantity);

            // La quantità da prelevare deve essere un numero maggiore di 0.
            if (BankPrelievo.quantity <= 0) {
                BankPrelievo.openPopup('<p>I Mori da prelevare devono essere un numero maggiore di 0.</p>');
            } else {
                BankPrelievo.$bagAmount = BankPrelievo.$container.find('.bag-amount');
                BankPrelievo.$bankAmount = BankPrelievo.$container.find('.bank-amount');

                var afterGet = parseInt(BankPrelievo.$bankAmount.text()) - BankPrelievo.quantity;

                // Sto prelevando troppo?
                if (afterGet < 0) {
                    BankPrelievo.openPopup('Non puoi prelevare più di quanto possiedi.');
                } else {
                    var msg = "<p>Sei sicuro di voler prelevare <strong>" + BankPrelievo.quantity + "</strong> Mori? Al termine ";
                    var msg = msg + "dell'operazione il tuo conto disporrà di <strong>" + afterGet + "</strong> Mori.</p>";
                    var msg = msg + "<p class='buttons'><button class='button-no'>← Annulla</button> <button class='button-yes'>Conferma</button></p>";

                    BankPrelievo.openPopup(msg);

                    $('.button-no').on('click', BankPrelievo.closePopup);
                    $('.button-yes').on('click', BankPrelievo.doPrelievo);
                }
            }
        },

        doPrelievo: function () {
            var $popUpContent = BankPrelievo.$popUp.find('.reveal-content');
            $popUpContent.html('<p>La Banca sta preparando i Mori, un attimo di pazienza...</p>')

            $.getJSON(Routing.generate('bank-prelievo', {quantity: BankPrelievo.quantity}), function (data) {
                $popUpContent.html("<p>"+data.message+"</p>");

                if (data.response) {
                    // Aggiorno banca e bag.
                    BankPrelievo.$bagAmount.html(data.bagAmount);
                    BankPrelievo.$bankAmount.html(data.bankAmount);
                    BankPrelievo.$inputQuantity.val(0);
                }
            });
        },

        openPopup: function (msg) {
            if (msg) {
                BankPrelievo.$popUp.find('.reveal-content').html(msg);
            }
            BankPrelievo.$popUp.foundation('reveal', 'open');
        },

        closePopup: function () {
            BankPrelievo.$popUp.foundation('reveal', 'close');
        }
    };

    BankPrelievo.init();

    // -----------------------------------------------------------------------------------------------

    var BankTrasferimento = {

        $form: $('#bank-trasferimento'),
        $inputQuantity: null,
        $inputDestinatario: null,
        quantity: null,

        init: function () {
            this.$form.on('submit', this.validate);
        },

        validate: function (e) {
            e.preventDefault();

            BankTrasferimento.$inputQuantity = BankTrasferimento.$form.find('.trasferimento-quantity');
            BankTrasferimento.$inputDestinatario = BankTrasferimento.$form.find('.trasferimento-destinatario');
            BankTrasferimento.quantity = BankTrasferimento.$inputQuantity.val();

            // La quantità da prelevare deve essere un numero maggiore di 0.
            if (BankTrasferimento.quantity <= 0) {
                BankPrelievo.openPopup('<p>I Mori da prelevare devono essere un numero maggiore di 0.</p>');
                return;
            }

            if (BankTrasferimento.$inputDestinatario == '') {
                BankPrelievo.openPopup('<p>Devi indicare un  per i Mori che vuoi trasferire.</p>');
                return;
            }

            BankPrelievo.$bagAmount = BankPrelievo.$container.find('.bag-amount');
            BankPrelievo.$bankAmount = BankPrelievo.$container.find('.bank-amount');

            var afterGet = BankPrelievo.$bankAmount.text() - BankTrasferimento.quantity;

            // Sto trasferendo troppo?
            if (afterGet < 0) {
                BankPrelievo.openPopup('<p>Non puoi trasferire più di quanto possiedi.</p>');
            } else {
                var msg = "<p>Sei sicuro di voler trasferire <strong>" + BankTrasferimento.quantity + "</strong> Mori a <strong>" + BankTrasferimento.$inputDestinatario.val() + "</strong>? Al termine ";
                var msg = msg + "dell'operazione il tuo conto disporrà di <strong>" + afterGet + "</strong> Mori.</p>";
                var msg = msg + "<p class='buttons'><button class='button-no'>← Annulla</button> <button class='button-yes'>Conferma</button></p>";

                BankPrelievo.openPopup(msg);

                $('.button-no').on('click', BankPrelievo.closePopup);
                $('.button-yes').on('click', BankTrasferimento.doTrasferimento);
            }
        },

        doTrasferimento: function () {
            var $popUpContent = BankPrelievo.$popUp.find('.reveal-content');
            $popUpContent.html('<p>La Banca sta preparando il trasferimento, un attimo di pazienza...</p>')

            var $inputNota = BankTrasferimento.$form.find('.trasferimento-nota');

            $.ajax({
                type: "POST",
                url: Routing.generate('bank-trasferimento'),
                data: {quantity: BankTrasferimento.quantity, destinatario: BankTrasferimento.$inputDestinatario.val(), nota: $inputNota.val()},
                dataType: 'json',
                success: function(data) {
                    $popUpContent.html("<p>"+data.message+"</p>");

                    if (data.response) {
                        // Aggiorno banca e bag.
                        BankPrelievo.$bankAmount.html(data.bankAmount);
                        BankTrasferimento.$inputQuantity.val(0);
                        BankTrasferimento.$inputDestinatario.val('');
                        $inputNota.val('');
                    }
                }
            });
        }
    };

    BankTrasferimento.init();

    // -----------------------------------------------------------------------------------------------

    (function ($, window, document, undefined) {
        'use strict';

        var BankDeposito = {

            $form: $('#bank-deposito'),
            $inputQuantity: null,
            quantity: null,

            init: function () {
                this.$form.on('submit', this.validate);
            },

            validate: function (e) {
                e.preventDefault();

                BankDeposito.$inputQuantity = BankDeposito.$form.find('.deposito-quantity');
                BankDeposito.quantity = parseInt(BankDeposito.$inputQuantity.val());

                // La quantità da depositare deve essere un numero maggiore di 0.
                if (BankDeposito.quantity <= 0) {
                    BankPrelievo.openPopup('<p>I Mori da depositare devono essere un numero maggiore di 0.</p>');
                    return;
                }

                BankPrelievo.$bagAmount = BankPrelievo.$container.find('.bag-amount');
                BankPrelievo.$bankAmount = BankPrelievo.$container.find('.bank-amount');

                var afterDep = parseInt(BankPrelievo.$bagAmount.text()) - BankDeposito.quantity;

                // Sto trasferendo troppo?
                if (afterDep < 0) {
                    BankPrelievo.openPopup('<p>Non puoi depositare più di quanto possiedi.</p>');
                } else {
                    var msg = "<p>Sei sicuro di voler depositare <strong>" + BankDeposito.quantity + "</strong> Mori?";
                    var msg = msg + "<p class='buttons'><button class='button-no'>← Annulla</button> <button class='button-yes'>Conferma</button></p>";

                    BankPrelievo.openPopup(msg);

                    $('.button-no').on('click', BankPrelievo.closePopup);
                    $('.button-yes').on('click', BankDeposito.doDeposito);
                }
            },

            doDeposito: function() {
                var $popUpContent = BankPrelievo.$popUp.find('.reveal-content');
                $popUpContent.html('<p>La Banca sta effettuando il deposito, un attimo di pazienza...</p>')

                $.ajax({
                    type: "POST",
                    url: Routing.generate('bank-deposito'),
                    data: {quantity: BankDeposito.quantity},
                    dataType: 'json',
                    success: function(data) {
                        $popUpContent.html("<p>"+data.message+"</p>");

                        if (data.response) {
                            // Aggiorno banca e bag.
                            BankPrelievo.$bankAmount.html(data.bankAmount);
                            BankPrelievo.$bagAmount.html(data.bagAmount);
                            BankDeposito.$inputQuantity.val(0);
                        }
                    }
                });
            }
        };

        BankDeposito.init();

    })(jQuery, window, document);

})(jQuery, window, document);