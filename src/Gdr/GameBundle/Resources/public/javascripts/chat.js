(function ($, window, document, undefined) {
    'use strict';

    var Chat = {

        $target: $('#chat-content'),
        $form: $('#chat-form'),
        $expandChat: $('#chat-expand-text'),
        $expandChatTrigger: $('.chat-expand-text'),
        $inputChat: $('#chat_form_body'),
        interval: null,
        requestSent: false,
        $hiddenInput: $('#chat_form_special'),
        whisperNames: [],

        init: function () {
            this.scrollToBottom();
            this.interval = window.setInterval(this.refreshChat, 8000);
            this.$expandChatTrigger.on('click', this.expandText);
            this.$expandChat.on('click', '.close-reveal-modal', this.closeExplandText);
            this.$inputChat.focus();
            this.$form.on('submit', this.submitForm);
            this.showPgInfos();
            this.$target.on('click', '.pg-dress', this.showDressDescription);
            this.$target.on('click', '.whisper-remove', this.removeWhisper);
            this.$form.on('click', '.special', this.chooseSpecial);
            this.$target.on('click', '.sender', this.addToWhisper);
            this.$form.on('click', '.cast-end-icon', this.deActivateCast);
            this.$form.on('click', '.leave', this.leave);
            this.$form.on('click', '#chat-save', this.save);

            $('#show-online').on('click', this.showOnline);
            $('#passa-mori').on('click', this.passaMori);
            $('#passa-oggetti').on('click', this.passaMori);
            $('#roll-dice').on('click', this.rollDice);
            $('#segnala-mod').on('click', this.segnala);

            Chat.$hiddenInput.val('');

            $(document).ready(function () {
                $(".castII-select").select2({
                    'placeholder': "Scegli un incanto:",
                    'allowClear': true,
                    'width': 'resolve'
                });
                $("#chat_form_combat").select2({
                    'placeholder': "Set Combattimento:",
                    'allowClear': true,
                    'width': 'resolve'
                });
                Chat.showStandardTooltips();

                if ($('#open-bag').length) {
                    $('#ribbon-borsa').click();
                }
            });
        },

        submitForm: function (e) {
            e.preventDefault();

            // Bisogna selezionare un incanto.
            if (Chat.$hiddenInput.val() == 'cast-2' && $.isEmptyObject(Chat.$form.find('.castII-select').select2('data'))) {
                Popup.alert('small', '<p><strong>Attenzione:</strong> devi selezionare un incanto!</p>');
                return;
            }

            var input = $.trim(Chat.$inputChat.val());

            // Il secondo cast senza "+".
            if (Chat.$hiddenInput.val() == 'cast-2') {

                if (input.charAt(0) == '+') {
                    Popup.alert('small', '<p><strong>Attenzione:</strong> la seconda azione per il lancio di un incantesimo può essere effettuata solo "in chiaro".</p>');
                    return;
                }
            }

            // Posso soltanto sussurrare.
            if (Chat.$hiddenInput.val() != '' && Chat.$hiddenInput.val() != 'mod' && Chat.$hiddenInput.val() != 'fate' && input.charAt(0) == "@") {
                Popup.alert('small', '<p><strong>Attenzione:</strong> non puoi inviare un\'azione speciale mentre sussurri.</p>');
                return;
            }

            // Almeno 2 caratteri.
            if (Chat.$inputChat.val().length > 1) {
                Chat.$form.find('button[type="submit"]').prop('disabled', 'disabled');

                $(this).ajaxSubmit({
                    success: function (data) {

                        if (data.error){
                            Popup.alert("small", "<p>"+ data.error +"</p>");
                            return;
                        }

                        if (data.response == false) {
                            location.reload();
                            return false;
                        }

                        if (data.cast == 'lost') {
                            Chat.deActivateCast();
                            Chat.resetInput();
                            Chat.whisperNames = [];
                            Popup.alert("small", "<p>Hai perso la concentrazione per il cast! L'azione è stata bloccata.</p>");
                            return;
                        }

                        Chat.refreshChat();
                        Chat.resetInput();
                        Chat.whisperNames = [];

                        if (data.cast == 'start') {
                            Chat.activateCastII();
                        } else if (data.cast == 'end') {
                            Chat.deActivateCast();
                        }

                        // Se era una skill ricarico il container delle skills.
                        if (Chat.$form.find('#chat_form_special').val() == 'skill') {
                            Skill.refreshSkills();
                        }

                        return false;
                    }
                });
            } else {
                Popup.alert('small', '<p><strong>Attenzione:</strong> la tua frase è troppo corta!</p>')
            }
        },

        refreshChat: function () {
            Chat.$form.find('button[type="submit"]').removeAttr('disabled');

            if (false == Chat.requestSent) {
                Chat.requestSent = true;

                $.ajax({
                    type: 'GET',
                    dataType: 'html',
                    url: Routing.generate('chat-output'),
                    success: function (data) {
                        Chat.$target.append(data);
                        if (data != '') {
                            Chat.scrollToBottom();
                        }
                        Chat.requestSent = false;
                    }
                });
            }
        },

        resetInput: function () {
            Chat.$inputChat.val('');
            Chat.$inputChat.focus();
        },

        scrollToBottom: function () {
            Chat.$target.scrollTop(Chat.$target.prop('scrollHeight'));
        },

        expandText: function () {
            var $textarea = Chat.$expandChat.find('textarea');

            $textarea.val(Chat.$inputChat.val());
            Chat.$inputChat.val('');
            Chat.$inputChat.prop('disabled', true);

            Chat.$expandChat.show().draggable();
        },
        closeExplandText: function () {
            var $textarea = Chat.$expandChat.find('textarea');
            Chat.$expandChat.hide();
            Chat.$inputChat.val($textarea.val());
            Chat.$inputChat.prop('disabled', false);
            $textarea.val('');
        },

        save: function (e) {
            e.preventDefault();
            var $this = $(this);

            $.get($this.data('href'), function (data) {
                Popup.alert('small', data);
                var $form = Popup.$active.find('form');

                $form.on('submit', function(){
                    Popup.close();
                });
            });
        },

        showPgInfos: function () {
            var $this = $(this);

            $('body').on('mouseenter', 'a.tooltip-chat', function () {
                $(this).tooltipster({
                    theme: '.tooltipster-shadow',
                    content: 'Caricamento...',
                    updateAnimation: 'false',
                    functionBefore: function (origin, continueTooltip) {
                        continueTooltip();

                        $.get(origin.data('url'), function (data) {
                            origin.tooltipster('update', data);
                        });
                    }
                }).tooltipster('show');
            });
        },

        showDressDescription: function (e) {
            e.preventDefault();
            var $this = $(this);

            $.post($this.prop('href'), {}, function (data) {
                $this.tooltipster('hide');
                Popup.alert('medium', data);
            });
        },

        removeWhisper: function (e) {
            e.preventDefault();
            var $this = $(this);

            $this.parents('p').remove();
        },

        chooseSpecial: function (e) {
            e.preventDefault();
            var $this = $(this);

            // Se non è active, aggiungo. Altrimenti, tolgo.
            if (!$this.hasClass('active')) {
                // Devo rimuovere tutti gli active esistenti.
                $('#chat-icons').find('.active').removeClass('active');

                // Aggiungo l'active.
                $this.addClass('active');

                // Cambio il pulsante
                Chat.$form.find('button[type="submit"]').text($(this).data('submit'));

                // Aggiungo il value nell'hidden.
                Chat.$hiddenInput.val($(this).data('value'));

                if ($this.hasClass('castII-icon')) {
                    Chat.activateCastII(true);
                }

                // Sto cliccando su un icona .active
            } else {
                // Blocco se clicco cast2
                if ($this.hasClass('castII-icon') || $this.hasClass('castI-icon')) {
                    // Tolgo la classe active.
                    $this.removeClass('active');

                    // Ripristino il pulsante.
                    Chat.$form.find('button[type="submit"]').text('Invia');

                    // Tolgo il value dall'hidden.
                    Chat.$hiddenInput.val("");
                }
            }
        },

        activateCastII: function (lost) {

            if (!lost) {
                Chat.$form.find('.special').addClass('hide');
                Chat.$form.find('.cast-end-icon').removeClass('hide');
                Chat.$form.find('.castII-icon').removeClass('hide').click();
            }

            Chat.$form.find('.castII-select').closest("#container-spells").removeClass('hide');
            Chat.$form.find('.castII-select').find('option:first').click();
            Chat.$form.find('#container-combat').hide();
        },

        deActivateCast: function () {
            Chat.$form.find('.special').removeClass('hide').removeClass("active");
            Chat.$form.find('.castII-icon, #container-spells, .cast-end-icon').addClass('hide');
            var select = Chat.$form.find('.castII-select');
            select.find('option:selected').remove();
            select.select2('data', null);
            Chat.$form.find('button[type="submit"]').text('Invia');
            Chat.$hiddenInput.val("");
            Chat.$form.find('#container-combat').show();
        },

        addToWhisper: function (e) {
            e.preventDefault();
            var value = $(this).text();

            // Alcuni nickname hanno il "titolo" prima del nome effettivo, dunque lo rimuovo.
            var safeName = value.split(' ');
            value = safeName.reverse()[0];

            // Se il nome è già presente non aggiungo nulla.
            if ($.inArray(value, Chat.whisperNames) == -1) {
                Chat.whisperNames.push(value);
                Chat.$inputChat.val('@' + Chat.whisperNames.join(',') + '@');
            }
            Chat.$inputChat.focus();
        },

        showOnline: function (e) {
            e.preventDefault();
            var $this = $(this);

            $.get($this.data('href'), function (data) {
                Popup.alert('small', data);
            });
        },

        passaMori: function (e) {
            e.preventDefault();
            var $this = $(this);

            $.get($this.data('href'), function (data) {
                Popup.alert('small', data);
                var $form = Popup.$active.find('form');

                $form.ajaxForm(function (data) {

                    if (data.response) {
                        Popup.close();
                        Chat.refreshChat();
                    } else {
                        $form.find('.error').html(data.msg);
                    }

                    return false;
                });
            });
        },

        rollDice: function (e) {
            e.preventDefault();
            var $this = $(this);
            $.get($this.data('href'), function () {
                Chat.refreshChat();
            });
        },

        showStandardTooltips: function () {

            $('body').on('mouseenter', '.standard-tooltip', function () {
                $(this).tooltipster({
                    theme: '.tooltipster-shadow',
                    updateAnimation: false

                }).on('click', function () {
                        $(this).tooltipster('hide');
                    });
                $(this).tooltipster('show');
            });
        },

        segnala: function (e) {
            e.preventDefault();
            var $this = $(this);

            var content = "<p>Con questa funzione segnalerai alla moderazione gli ultimi 20 minuti di questa chat." +
                " Specifica il motivo che ti ha spinto a segnalare.</p>" +
                "<p><label>Motivo</label><textarea id='motivo-segnala' name='motivo'></textarea></p>";

            Popup.confirm("small", content, function () {
                var $motivo = $('#motivo-segnala');

                $.post($this.data('href'), {motivo: $motivo.val()}, function () {
                    $motivo.val("");
                    Popup.refresh("<p>La segnalazione è stata effettuata, un moderatore la prenderà in carico il prima possibile.</p>");
                });
            });
        },

        leave: function (e) {
            e.preventDefault();
            var $this = $(this);
            var msg = "<p>Sei sicuro di voler uscire da questa chat?</p>";
            Popup.confirm("small", msg, function () {
                window.location.href = $this.attr('href');
            });
        }
    };

    Chat.init();

    // ---------------------------------------------------------------------

    var ChatBag = {

        $bag: $('#bag-mini'),

        init: function () {
            this.$bag.on('click', '.bag-show-item, .bag-activate-item', ChatBag.showItem);
            this.$bag.on('click', '.bag-sacrify-item', ChatBag.sacrifyItem);
            this.$bag.on('click', '.bag-dress-item', ChatBag.dressItem);
        },

        showItem: function (e) {
            e.preventDefault();

            $.get($(this).attr('href'), function () {
                Chat.refreshChat();
            });
        },

        sacrifyItem: function (e) {
            e.preventDefault();
            var $this = $(this);

            $.get($(this).attr('href'), function () {
                Chat.refreshChat();
                $this.parents('tr').remove();
            });
        },

        dressItem: function (e) {
            e.preventDefault();
            var $this = $(this);

            $.get($this.attr('href'), function () {
                Chat.refreshChat();
                ChatBag.refresh();
            });
        },

        refresh: function () {
            $('#ribbon-borsa').click();
        }
    };

    ChatBag.init();

    // -------------------------------------

    var Skill = {

        $timer: null,
        endTimerDate: null,
        url: null,

        init: function () {
            Skill.tooltips();

            $('#switch-skills').on('click', this.switchSkills);

            if (Skill.url == null) {
                Skill.url = Chat.$form.find('#skill-refresh').data('url');
            }
            if (Chat.$form.find('#skill-refresh').length) {
                Skill.startTimer();
                var $body = $('body');
                $body.on('click', '.skill-disabled', Skill.cannotUseSkill);
                $body.on('click', '.skill-enabled', Skill.useSkill);
            }
        },

        cannotUseSkill: function (e) {
            e.preventDefault();
            return false;
        },

        useSkill: function (e) {
            e.preventDefault();

            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
                Chat.$form.find('button[type="submit"]').text('Invia');
                Skill.resetInput();
                return;
            }

            Chat.$form.find('.skill').removeClass('selected');
            $(this).addClass('selected');
            var skillId = $(this).data('skill-id');
            // Metti nel form
            Chat.$form.find('#chat_form_skill').val(skillId);
            Chat.$form.find('#chat_form_special').val('skill');

            Chat.$form.find('button[type="submit"]').text('Invia (Skill)');
        },

        tooltips: function () {
            $('body').on('mouseenter', '.skill-tooltip', function () {
                $(this).tooltipster({
                    theme: '.tooltipster-shadow',
                    maxWidth: 400
                }).on('click', function () {
                        $(this).tooltipster('hide');
                    });
                $(this).tooltipster('show');
            });
        },

        startTimer: function () {
            Skill.$timer = setInterval(Skill.doTimer, 5000);
        },

        doTimer: function () {
            if (Chat.$form.find('#skill-refresh').text() == '0') {
                return;
            }
            if (Skill.endTimerDate == null) {
                var endDate = Chat.$form.find('#skill-refresh').text() * 1000;
                Skill.endTimerDate = new Date(endDate);
            }
            var now = new Date(),
                distance = Skill.endTimerDate - now;

            if (distance <= 0) {
                clearInterval(Skill.$timer);
                Skill.endTimerDate = null;
                Skill.refreshSkills();
            }
        },

        refreshSkills: function () {

            var container = Chat.$form.find('#chat-skills-column');
            $.get(Skill.url, function (data) {
                container.empty();
                container.html(data);
                Skill.resetInput();
            });
        },

        resetInput: function () {
            Chat.$form.find('#chat_form_skill').val("");
            Chat.$form.find('#chat_form_special').val("");
            Chat.$form.find('button[type="submit"]').text('Invia');
        },

        switchSkills: function(e){
            e.preventDefault();

            $('.skill-random').toggle();
            $('.skill-standard').toggle();
        }
    };

    Skill.init();

})(jQuery, window, document);