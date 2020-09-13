(function ($, window, document, undefined) {
    'use strict';

    var ResizeMap = {

        $map: $('.map'),

        init: function () {
            this.resize();
            $(".marker.location").on('click', this.changeLocation);
            $("#show-streets").on('click', this.showAndHide);
        },

        resize: function () {

            ResizeMap.$map.craftmap({
                map: {
                    position: 'top_left'
                },
                image: {
                    width: 1320,
                    height: 959,
                    name: 'imgMap'
                },
                marker: {
                    name: 'marker', // (string) class name for a marker
                    center: false, // (bool) set true to pan the map to the center
                    popup: false // (bool) set true to show a popup
                },
                controls: {
                    init: false // (bool) set true to control a map from any place on the page
                }
            });
        },

        changeLocation: function (e) {
            if (!$(this).hasClass('no-ajax')) {
                e.preventDefault();
                var _self = ResizeMap;
                var $this = $(this);

                $.getJSON($this.attr('href'), function (data) {
                    if (data.response) {
                        window.location.href = data.url;
                    } else {
                        Popup.alert("small", "<p>" + data.msg + "</p>");
                    }
                });
            }
        },

        showAndHide: function (e) {
            e.preventDefault();

            $(".marker.location, .marker.street").fadeToggle();
        }
    };

    ResizeMap.init();

})(jQuery, window, document);