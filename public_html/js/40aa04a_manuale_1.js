(function ($, window, document, undefined) {
    'use strict';

    var Manuale = {

        init: function () {
            $('.manuale-container').find('a').on('click', this.show);
        },

        show: function (e) {
            e.preventDefault();
            var $this = $(this);

            Popup.alert('medium', "<p>Attendi, caricamento in corso...</p>");

            $.get($this.data('href'), function(data){
                Popup.refresh(data);
            });
        }
    };

    Manuale.init();

})(jQuery, window, document);