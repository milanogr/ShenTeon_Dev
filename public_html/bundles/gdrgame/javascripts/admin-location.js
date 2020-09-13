(function ($, window, document, undefined) {
    'use strict';

    var AdminLocation = {

        $form: $('#choose-admin-location'),

        init: function () {
            this.$form.on('submit', this.showLocation);
        },

        showLocation: function (e) {
            e.preventDefault();
            var _self = AdminLocation;
            var $this = $(this);

            var url = _self.$form.find('option:selected').val();

            if (url == "") {
                return false;
            }

            var $button = _self.$form.find('button');
            $button.text('Caricamento...');

            $.get(url, function (data) {
                $('#inject-map-ajax').html(data);
                $button.text('Mostra la posizione');
                _self.activateDrag();
            });
        },

        activateDrag: function () {
            $('.marker').draggable({
                scroll: true,
                stop: function () {
                    var $this = $(this);
                    var position = $this.position();

                    $.get(Routing.generate('g-save-location', {id: $this.data('id'), top: position.top, left: position.left}), function () {
                        Popup.alert('small',"<p>Le coordinate sono state salvate!</p>");
                    })
                }
            });
        }
    };

    AdminLocation.init();

})(jQuery, window, document);