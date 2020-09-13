(function ($, window, document, undefined) {
    'use strict';

    var Enclavi = {

        $container: $('#enclavi-container'),
        $trList: null,
        $trDetails: null,

        init: function () {
            this.$container.on('click', '.show-enclave', this.showInfo);
            this.$container.on('click', '.show-statute, .show-annex', this.showPopup);
            this.$container.on('click', '[data-restore-list]', this.restoreList);
        },

        showInfo: function(e) {
            e.preventDefault();
            var $this = $(this);

            Enclavi.$trList = $this.closest('tr');
            Enclavi.$trDetails = Enclavi.$trList.closest('table').find('.data-target-details');

            $.get($this.data('href'), function(data){
                console.log(data);
                Enclavi.$trDetails.html(data).fadeIn();
            });
        },

        showPopup: function(e){
            e.preventDefault();
            var $this = $(this);
            $.get($this.data('href'), function(data){
                Popup.alert('medium', data);
            });
        },

        restoreList: function(e){
            e.preventDefault();
            var $this = $(this);

            Enclavi.$trList.fadeIn();
            Enclavi.$trDetails.hide();
        }
    };

    Enclavi.init();

})(jQuery, window, document);