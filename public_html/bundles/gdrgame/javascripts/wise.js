(function(){

    var Wise = {

        elements: {
            $wiseContainer: $('#wise-content'),
            $formContainer: null,
            $form: null,
            $ajaxContainer: null
        },

        init: function(){
            this.elements.$formContainer = this.elements.$wiseContainer.find('.form');
            this.elements.$form = this.elements.$wiseContainer.find('#wise-form-ask');
            this.elements.$ajaxContainer = this.elements.$wiseContainer.find('.ajax');

            this.elements.$form.on('submit', $.proxy(this.ask, this));
            this.elements.$form.find('button').prop('disabled', false);
        },

        ask: function(e){
            e.preventDefault();
            var _self = this;

            var url = _self.elements.$form.prop('action');

            _self.elements.$form.find('button').text('Sto pensando...').prop('disabled', true);

            $.post(url, _self.elements.$form.serializeArray(), function(data){

                if (data.response == false){
                    _self.elements.$ajaxContainer.html('<p>Mi dispiace, ma non ricordo nulla a riguardo.</p>');
                }else{

                    var text = '';

                    $.each(data.sentences, function(i, sentence){
                        text += sentence.body;
                    });

                    _self.elements.$ajaxContainer.html(text);
                }

                _self.elements.$form.find('button').text('Chiedi').prop('disabled', false);

            });
        }

    };

   $(document).ready(function(){
       Wise.init();
   });

})();