(function ($, window, document, undefined) {
    'use strict';

    var Library = {

        init: function () {
            $('.library-container').on('click', '.show-book', this.show);
        },

        show: function (e) {
            e.preventDefault();
            var $this = $(this);

            Popup.alert('medium', '<p>Attendi...</p>');

            $.get($this.data('href'), function(data){
                Popup.refresh(data);
            });
        }
    };

    Library.init();

})(jQuery, window, document);