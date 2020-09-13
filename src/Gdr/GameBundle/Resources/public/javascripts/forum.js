(function ($, window, document, undefined) {
    'use strict';

    var Forum = {

        $container: $('#forum-container'),

        init: function () {
            this.$container.find('.delete-post').on('click', this.deletePost);
            this.$container.find('.rispondi').on('click', this.reply);
            this.$container.on('submit', '#reply-form', this.refreshReply);
            //this.$container.on('click', '.set-readed', this.setThreadsReaded);

            var $adminSwitch = $('#admin-switch-forum');
            $adminSwitch.on('change', this.switchForum);
        },

        deletePost: function (e) {
            e.preventDefault();
            var msg = '<p>Sei sicuro di voler eliminare questa risposta?</p>',
                $this = $(this);
            Popup.confirm('small', msg, function () {
                window.location.replace($this.data('href'));
            })
        },

        reply: function (e) {
            e.preventDefault();

            var $this = $(this);
            Forum.goBottom();
            $('#write-reply').html("<p class='text-centered'><strong>Caricamento editor...</strong></p>");

            $.get($this.data('href'), function (data) {
                $('#write-reply').html(data);
                Forum.goBottom();
            });
        },

        refreshReply: function (e) {
            e.preventDefault();

            var $this = $(this);

            $this.ajaxSubmit(function (data) {
                if (data.url){
                    window.location.replace(data.url);
                }else{
                    $('#write-reply').html(data);
                    Forum.goBottom();
                }
            });
        },

        goBottom: function () {
            var $container =  $("#inner-content-wrapper");
            $container.scrollTop(0);
        },

        switchForum: function(e){
            e.preventDefault();

            window.location.href =  $(this).val();
        }
    };

    Forum.init();

})(jQuery, window, document);

$(document).ready(function() {
    $("#forum-container select").select2();
});