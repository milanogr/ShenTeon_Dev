(function($,window,document,undefined){"use strict";var Location={$container:$("#fast-locations"),init:function(){this.$container.closest("form").on("submit",this.changeLocation);this.$container.select2({width:"resolve"})},changeLocation:function(e){e.preventDefault();var $this=$(this);$.getJSON(Routing.generate("change_location",{id:$this.find("select").val(),ajax:1}),function(data){if(data.response){window.location.href=data.url}else{Popup.alert("small","<p>"+data.msg+"</p>")}})}};Location.init()})(jQuery,window,document);