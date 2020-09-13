(function ($, window, document, undefined) {
    'use strict';

    var FormConfirm = {

        init: function () {
            $('.confirmation-action').on('click', function(e){
                e.preventDefault();
                var $this = $(this);

                var msg = "<p>Sei sicuro di voler effettuare questa operazione?</p>";
                Popup.confirm('small', msg, function(){
                    console.log($this);
                    $this.parents('form').first().submit();
                })
            })
        }
    };

    FormConfirm.init();

})(jQuery, window, document);