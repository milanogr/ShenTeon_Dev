(function ($, window, document, undefined) {
    'use strict';

    var Missive = {

        $container: $('#missive-container'),

        init: function () {
            this.$container.on('click', '.delete-letter', this.remove);
            this.$container.on('click', '.show-letter', this.show);
            this.$container.on('click', '.convert', this.convert);
            this.$container.on('click', '#letter-select-all', this.selectAll);
            this.$container.on('click', '#letter-delete-submit', this.submitDelete);
            $('body').on('click', ".delete-single-letter", this.removeFromPopup);
        },

        show: function (e) {
            e.preventDefault();
            var $this = $(this);

            // Aggiorno l'icona laterale
            Refresh.getMissive();

            $.get($this.data('href'), function (data) {
                Popup.alert('medium', data);
                $this.parents('tr').removeClass('to-read');
            })
        },

        convert: function (e) {
            e.preventDefault();

            var msg = "<p>Sei sicuro di voler trasformare questa missive in un oggetto che verrà riposto nel tuo " +
                "inventario? La missiva attuale non sarà cancellata.</p>";
            var $this = $(this);

            Popup.confirm('small', msg, function () {
                Popup.refresh("<p>Attendi...</p>");
                $.get($this.data('href'), function (data) {
                    Popup.refresh("<p>"+data.msg+"</p>");
                })
            });
        },

        remove: function (e) {
            e.preventDefault();
            var msg = "<p>Sei sicuro di voler cancellare questa missiva?</p>";
            var $this = $(this);

            Popup.confirm('small', msg, function () {
                Popup.refresh("<p>Attendi...</p>");
                $.get($this.data('href'), function () {
                    $this.parents('tr').remove();
                    Popup.close();
                })
            });
        },

        removeFromPopup: function (e) {
            e.preventDefault();
            var msg = "<p>Sei sicuro di voler cancellare questa missiva?</p>";
            var $this = $(this);

            Popup.confirm('small', msg, function () {
                Popup.refresh("<p>Attendi...</p>");
                $.get($this.data('href'), function (data) {
                    $('#letter-ajax-output').html(data);
                    Popup.close();
                })
            });
        },

        selectAll: function () {
            var $this = $(this);
            if ($this.hasClass('opened')) {
                Missive.$container.find('.missiva-id').prop('checked', false);
                $this.removeClass('opened');
            } else {
                Missive.$container.find('.missiva-id').prop('checked', true);
                $this.addClass('opened');
            }
        },

        submitDelete: function (e) {
            e.preventDefault();

            if (!Missive.$container.find('.missiva-id:checked').length) {
                Popup.alert("small", "<p>Devi selezionare almeno una missiva.</p>");
                return;
            }

            var $this = $(this);
            var $form = $('#letter-delete-form');

            Popup.confirm('small', "<p>Sei sicuro di voler eliminare le Missive selezionate?</p>", function () {
                var dataPost = $('#letter-delete-form').serialize();

                Popup.alert("small", "<p>Attendi...</p>");

                $.post($form.prop('action'), dataPost, function (data) {
                    $('#letter-ajax-output').html(data);
                    Popup.close();
                });
            });
        }
    };

    Missive.init();

})(jQuery, window, document);