(function ($, window, document, undefined) {
    'use strict';

    var Tabs = {

        $container: $('.avatar-container'),
        $triggers: $('p[data-section-title]').find('a'),
        $content: null,
        $currentTabContent: null,

        init: function () {
            this.$triggers.on('click', this.loadPage);
        },

        loadPage: function (e) {
            e.preventDefault();

            var url = $(this).attr('href');
            Tabs.$currentTabContent = $(this).parents('section').find('.content');
            Tabs.injectLoader();

            $.get(url, function (data) {
                Tabs.$currentTabContent.html(data);
            });
        },

        injectLoader: function () {
            var loader = $('<div class="ajax-loader-inner"></div>');
            Tabs.$currentTabContent.hide().html(loader).fadeIn().css('display', '');
        },

        reload: function () {
            Tabs.$container.find('section.active').find('p.title').find('a').click();
        }
    };

    Tabs.init();

    // ------------------------------------------------------------------------------------

    var Inventory = {

        $container: $('.tab-inventario, .tab-vestiti, .tab-bag'),
        $parentTable: null,
        $currentTr: null,
        $currentItem: null,
        $sellUrl: null,

        init: function () {
            this.$container.on('click', '.data-inventory-items', this.loadItems);
            this.$container.on('click', '.checkbox-visibility', this.changeCheckbox);
            this.$container.on('click', '.checkbox-equipped', this.changeCheckbox);
            this.$container.on('click', '.sell-item', this.sellItem);
            this.$container.on('click', '.send-item', this.sendItem);
            this.$container.on('click', '.delete-item', this.deleteItem);
            this.$container.on('click', '.radio-dressed', this.dressItem);
            this.$container.on('click', '.page', this.loadPage);
            //this.$container.on('click', '.close-category', this.closeCategory);
            this.$container.on('click', '.esamina-item', this.esaminaItem);
            $('body').on('submit', '.avatar-send-item', this.sendItemForm);
        },

        esaminaItem: function (e) {
            e.preventDefault();
            var $this = $(this);

            Popup.alert("medium", "<p>Attendi...</p>");

            $.get($this.data("href"), function (data) {
                Popup.refresh(data);
            });
        },

        loadPage: function(e){

            e.preventDefault();

            var url = $(this).attr('href');
            var $currentTBody = $(this).parents('table').first().find('tbody');
            var $currentTable = $(this).parents('table').first();
            var $this = $(this);

            Pending.init(true, $currentTable);

            $.get(url, function (data) {
                $currentTBody.html(data);
                $currentTBody.find('th').parent().remove();
                $currentTable.find('a.close-category').removeClass('hide');
                $this.addClass("hide");
                Pending.init(false, $currentTable);
            });
        },

        loadItems: function (e) {
            e.preventDefault();

            var url = $(this).attr('href');
            var $container = $('.js-inventory-items-container');
            var $this = $(this);

            Pending.init(true, $container);

            $.get(url, function (data) {
                $container.html(data);
                Pending.init(false, $container);
                $('.item-box').matchHeight({
                    byRow: false
                });

                window.setTimeout(function(){
                    $.fn.matchHeight._update();
                }, 200);
            });
        },

        closeCategory: function (e) {
            var $this = $(this);
            $(this).parents('table').first().find("tbody").empty();
            $this.addClass('hide');
            $this.parents('table').first().find('.data-inventory-items').removeClass("hide");
        },

        changeCheckbox: function (e) {
            var $this = $(this);
            var url = $this.attr('data-url');

            var $currentTr = $this.parents('tr.item-row');
            Pending.init(true, $currentTr);

            $.get(url, function (data) {

                Pending.init(false, $currentTr);

                if (data.response == false) {
                    Popup.alert('small', data.message);
                }

                if (data.value == true) {
                    $this.prop('checked', 'checked');
                } else {
                    $this.removeAttr('checked');
                }
            });
        },

        dressItem: function (e) {
            e.preventDefault();
            var $this = $(this);

            // Se è già selezionato, non devo fare nulla...
            if ($this.hasClass('selected')) {
                return;
            }

            //...altrimenti lo seleziono.
            $this.addClass('selected');

            var url = $this.attr('data-url');
            var $currentTr = $this.parents('tr.item-row');
            var $currentItem = $this.parents('.item-box');

            Pending.init(true, $currentTr);
            Pending.init(true, $currentItem);

            $.get(url, function (data) {
                Pending.init(false, $currentTr);
                Pending.init(false, $currentItem);

                if (data.response == true) {

                    // Tolgo la spunta degli altri radio tranne questa;
                    $('.radio-dressed').not($this).removeAttr('checked').removeClass('selected');

                    // Tolgo il disabled dal checkbox dell'Invisibile/In borsa.
                    Inventory.$container.find('.checkbox-visibility').removeAttr('disabled');
                    Inventory.$container.find('.checkbox-equipped').removeAttr('disabled');

                    // Diattivo invisibile per il checkbox della riga corrente.
                    var $checkVisibility = $currentTr.find('.checkbox-visibility');
                    $checkVisibility.attr('disabled', 'disabled');
                    $checkVisibility.removeAttr('checked');

                    var $checkVisibility = $currentItem.find('.checkbox-visibility');
                    $checkVisibility.attr('disabled', 'disabled');
                    $checkVisibility.removeAttr('checked');

                    // Disattivo "In borsa" per la riga corrente
                    // Aggiungo la spunta In Borsa per la riga corrente
                    var $checkEquipped = $currentTr.find('.checkbox-equipped');
                    $checkEquipped.prop('checked', 'checked');
                    $checkEquipped.attr('disabled', 'disabled');
                    $this.prop('checked', 'checked');

                    var $checkEquipped = $currentItem.find('.checkbox-equipped');
                    $checkEquipped.prop('checked', 'checked');
                    $checkEquipped.attr('disabled', 'disabled');
                    $this.prop('checked', 'checked');

                } else {
                    Popup.alert('small', data.message);
                    $this.removeAttr('checked')
                }
            });
        },

        sellItem: function () {
            var $this = $(this);

            Inventory.$url = $this.attr('data-url');
            Inventory.$currentTr = $this.parents('tr.item-row');
            Inventory.$currentItem= $this.parents('.item-box');

            var confirm = "<p>Se vendete questo oggetto avrete un guadagno pari alla metà del costo d'acquisto dello stesso. Volete procedere con la vendita?</p>";

            Popup.confirm('small', confirm, Inventory.doSellItem);
        },

        doSellItem: function () {

            Pending.init(true, Inventory.$currentTr);
            Pending.init(true, Inventory.$currentItem);

            $.getJSON(Inventory.$url, function (data) {

                Popup.refresh(data.message);

                Pending.init(false, Inventory.$currentTr);
                Pending.init(false, Inventory.$currentItem);

                if (data.response) {
                    Inventory.$currentItem.remove();
                }
            });
        },

        deleteItem: function () {
            var $this = $(this);
            var $currentTr = $this.parents('tr.item-row');
            var $currentItem = $this.parents('.item-box');

            Popup.confirm('small', "<p>Siete sicuro di voler distruggere definitivamente questo oggetto?</p>", function () {

                Pending.init(true, $currentTr);
                Pending.init(true, $currentItem);

                $.getJSON($this.attr('data-url'), function (data) {

                    Popup.refresh(data.message);

                    Pending.init(false, $currentItem);
                    Pending.init(false, $currentTr);
                    if (data.response) {
                        $currentItem.remove();
                        $currentTr.remove();
                    }
                });
            });
        },

        sendItem: function (e) {
            var $this = $(this);
            e.preventDefault();

            Popup.alert('small', '<p>Attendi...</p>');

            $.get($this.data('url'), function (data) {
                Popup.refresh(data);
            });
        },

        sendItemForm: function (e) {

            e.preventDefault();
            var $form = $(this);

            $form.find('.msg').html('<p>Attendi...</p>');

            $form.ajaxSubmit({
                success: function (data) {
                    if (data.response) {
                        Popup.refresh('<p>' + data.message + '</p>');
                        var $tr = $('#inventory-' + data.id);
                        Pending.init(true, $tr);
                        $tr.remove();
                    } else {
                        $form.find('.msg').html(data.message);
                    }
                }
            });
        }
    };

    Inventory.init();

    // --------------------------------------------------------

    var Bag = {
        $container: $('.tab-bag'),

        init: function () {
            this.$container.on('click', '.unequip-item', this.unequipItem);
        },

        unequipItem: function (e) {

            var $this = $(this);
            var url = $this.attr('data-url');
            var $currentTr = $this.parents('tr.item-row');

            Pending.init(true, $currentTr);

            $.get(url, function (data) {
                Pending.init(false, $currentTr);

                if (data.response) {
                    $currentTr.remove();
                    Bag.$container.find('.actual-weight').html(data.totalWeight);
                    var $totalItems = Bag.$container.find('.total-items');
                    var oldTotalItems = parseInt(Bag.$container.find('.total-items').text());
                    $totalItems.text(oldTotalItems - 1);
                } else {
                    Popup.alert('small', data.message);
                }
            });
        }
    };

    Bag.init();

    // --------------------------------------------------------

    var Diary = {
        $container: $('.tab-diary'),

        init: function () {
            this.$container.on('click', '.page', this.loadPages);
            this.$container.on('click', '.diary-show', this.loadOnePage);
            this.$container.on('submit', '#diary-new-page', this.createPage);
            this.$container.on('click', '.edit', this.edit);
            this.$container.on('click', '.delete', this.remove);
        },

        loadPages: function (e) {
            e.preventDefault();

            var $this = $(this);

            $.get($this.attr('href') + '&ajax=1', function (data) {
                $('#diary-pages').html(data);
            });
        },

        loadOnePage: function (e) {
            e.preventDefault();

            var $this = $(this);

            $.get($this.attr('href'), function (data) {
                Popup.alert('medium', data);
            });
        },

        createPage: function (e) {
            e.preventDefault();
            var $this = $(this);

            $.post($this.attr('action'), $this.serialize(), function (data) {

                if (data.response) {
                    Tabs.reload();
                }

                Popup.alert('small', data.message);
                Diary.refreshList();
            });
        },

        edit: function (e) {
            e.preventDefault();

            var $this = $(this);

            $.get($this.attr('href'), function (html) {
                $('.diary-content-form').html(html);
            });
        },

        remove: function (e) {
            e.preventDefault();

            var $this = $(this);

            Popup.confirm('small', '<p>Siete sicuro di voler eliminare questa pagina?</p>', function () {
                $.post($this.attr('href'), function (data) {
                    Popup.refresh('<p>Avete cancellato correttamente la pagina.</p>');
                    Diary.refreshList();
                });
            });
        },

        refreshList: function () {
            var route = Routing.generate('avatar-diary-list', {ajax: true});

            $.get(route, function (data) {
                $('#diary-pages').html(data);
            });
        }
    };

    Diary.init();

    // --------------------------------------------------

    var Experience = {
        $container: $('.tab-experience'),

        init: function () {
            this.$container.on('click', '.isHidden', this.changeVisibility);
        },

        changeVisibility: function (e) {
            var $this = $(this);
            var url = $this.attr('data-url');

            var $currentTr = $this.parents('tr.experience-row');
            Pending.init(true, $currentTr);

            $.get(url, function (data) {

                if (data.value == true) {
                    $this.prop('checked', 'checked')
                } else {
                    $this.removeAttr('checked')
                }

                Pending.init(false, $currentTr);
            });
        }
    };

    Experience.init();

    // ---------------------------------------------------

    var Management = {
        $container: $('.tab-management'),

        init: function () {
            this.$container.on('submit', '#form-management-common', this.submitCommon);
            this.$container.on('submit', '#form-management-user', this.submitUser);
            this.$container.on('click', '.kill', this.killMySelf);
        },

        submitCommon: function (e) {
            e.preventDefault();
            var $form = $(this);

            $(this).ajaxSubmit({
                success: function (data) {
                    if (data.response) {
                        Popup.alert('small', '<p>' + data.message + '</p>');
                    } else {
                        Popup.alert('small', '<p><strong>Attenzione!</strong> I dati non sono stati salvati perché:</p>' + Management.createErrorsView(data.message));
                    }
                }
            });
        },

        submitUser: function (e) {
            e.preventDefault();
            var $form = $(this);
            Popup.alert('small', '<p>Attendi...</p>');

            $.post($form.attr('action'), $form.serialize(), function (data) {
                if (data.response) {
                    Popup.alert('small', data.message);

                    $form.find('#user_plainPassword_first, #user_plainPassword_second').val('');
                } else {
                    Popup.alert('small', '<p><strong>Attenzione!</strong> I dati non sono stati salvati perché:</p> ' + Management.createErrorsView(data.message));
                }
            });
        },

        createErrorsView: function (errors) {
            var items = '<ul>';

            $.each(errors, function (key, val) {
                items = items + '<li>' + val + '</li>';
            });

            items = items + '</ul>';

            return items;
        },

        killMySelf: function () {

            var $this = $(this);

            var msg = "<p>Sei sicuro di voler dichiarare la morte del tuo pg? L'azione non è reversibile e dovrai " +
                "attendere 7 o 21 giorni, a seconda del caso, per tornare in vita. Riceverai una missiva che ti " +
                "confermerà l'avvenuta morte.</p>";

            Popup.confirm('small', msg, function () {
                $.get($this.data('href'), function () {
                    location.reload();
//                    Popup.close();
//                    Tabs.reload();
//                    Refresh.getMissive();
                })
            });
        }
    };

    Management.init();

    // ----------------------------------------------------

    var Grimory = {

        $container: $('.tab-grimory'),

        init: function () {
            this.$container.on('click', '.open-categories, .loadContainer', this.loadInContainer);
            this.$container.on('click', '.show-spells, .page', this.loadSpells);
            this.$container.on('click', '.selectSpell', this.changeSpell);
            this.$container.on('click', '.study', this.studySpells);
            this.$container.on('click', '.show-spell-description', this.showSpellDescription);
        },

        loadInContainer: function (e) {
            e.preventDefault();

            Grimory.$container.load($(this).attr('href'));
        },

        loadSpells: function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var $currentTBody = $(this).parents('tbody');
            var $currentTable = $(this).parents('.table-categories');

            Pending.init(true, $currentTable);

            $.get(url, function (data) {
                $currentTBody.html(data);
                Pending.init(false, $currentTable);
            });
        },

        changeSpell: function () {
            var $this = $(this);
            var url = $this.attr('data-url');

            var $currentTr = $this.parents('tr.spell-row');
            Pending.init(true, $currentTr);

            $.getJSON(url, function (data) {

                Pending.init(false, $currentTr);

                Popup.alert('small', '<p>' + data.message + '</p>');

                if (data.value == true) {
                    $this.prop('checked', 'checked');
                } else {
                    $this.removeAttr('checked');
                }
            });
        },

        studySpells: function (e) {
            e.preventDefault();

            var $this = $(this),
                msg = "<p>Siete sicuro di voler studiare gli incantesimi selezionati? Non potrete più farlo fino al prossimo sorgere del sole [ore 5.00 am].</p>";

            Popup.confirm('small', msg, function () {
                $.getJSON($this.attr('href'), function (data) {

                    if (data.response) {
                        Tabs.$container.find('section.active').find('p.title').find('a').click();
                        Popup.close();
                    } else {
                        Popup.alert('small', data.message);
                    }
                });
            })
        },

        showSpellDescription: function (e) {
            e.preventDefault();
            var $this = $(this);

            $.get($this.attr('href'), function (data) {
                Popup.alert('small', data);
            });
        }
    };

    Grimory.init();

    // -------------------------------------------------------

    var Skill = {

        $container: $('.tab-skill'),

        init: function () {
            this.$container.on('click', '.can-learn', this.learn);
            this.$container.on('click', '.can-learn-random', this.learnRandom);
        },

        learn: function (e) {
            e.preventDefault();
            var $this = $(this);

            var msg = "<p>Siete sicuro di voler imparare questa skill? La scelta, per questo livello, è definitiva.</p>";
            Popup.confirm('small', msg, function () {

                Popup.refresh("<p>Attendi...</p>");

                $.get($this.attr('href'), function () {
                    Tabs.reload();
                    Popup.close();
                });
            });
        },

        learnRandom: function (e) {
            e.preventDefault();
            var $this = $(this);
            var price = $this.data('price');
            var msg = "<p>Attenzione! Bevendo questa pozione (costo " + price + " Mori) il tuo Personaggio otterrà una nuova Skill! Il risultato è del tutto casuale oltre che definitivo.</p>";

            Popup.confirm('small', msg, function () {

                Popup.refresh("<p>Attendi...</p>");

                $.get($this.attr('data-href'), function (data) {

                    if (data.success == true) {
                        Tabs.reload();
                    }

                    Popup.refresh("<p>" + data.message + "</p>");
                });

            });
        }
    };

    Skill.init();

    // -------------------------------------------------------

    var Property = {
        $container: $('.tab-property'),

        init: function () {
            this.$container.on('click', 'input:checkbox', this.changeAddress);
            this.$container.on('click', '.sell', this.sell);
            this.$container.on('click', '.show-items', this.showItems);
            this.$container.on('click', '.crea-chiavi', this.createKeys);
            this.$container.on('click', '.mostra-chiavi', this.showKeys);
            $(document).on('click', '.remove-key-property', this.removeKey);
        },

        changeAddress: function (e) {
            var $this = $(this);
            e.preventDefault();
            var $currentTable = $this.parents('tr');

            Pending.init(true, $currentTable);

            $.getJSON($this.data('href'), function (data) {
                Property.$container.find('input:checkbox').prop('checked', !data.checkbox);

                $this.prop('checked', data.checkbox);

                Pending.init(false, $currentTable);
            });
        },

        sell: function (e) {
            var $this = $(this);
            e.preventDefault();
            var $currentRow = $this.parents('tr').first();
            var $currentTable = $this.parents('table').first();

            Popup.confirm('small', "<p>Sei sicuro di voler vendere questo immobile alla metà del suo prezzo originario?</p>", function () {
                Popup.refresh("<p>Attendi, l'Erario sta preparando i documenti...</p>");
                $.getJSON($this.data('href'), function (data) {
                    if (data.response) {
                        $currentRow.remove();
                        Popup.refresh("<p>La vendita è andata a buon fine ed i Mori sono stati accreditati nel tuo conto bancario.</p>");
                        Tabs.reload();
                    }
                });
            });
        },

        showItems: function (e) {
            var $this = $(this);
            e.preventDefault();

            Popup.alert('large', "<p>Attendi...</p>");

            $.get($this.data('href'), function (data) {
                Popup.alert('large', data);
            });
        },

        createKeys: function (e) {
            var $this = $(this);
            e.preventDefault();

            var msg = "<p>Con questa funzione verranno create e caricate automaticamente nell'inventario tutte le " +
                "chiavi disponibili a seconda del numero di inquili dell'alloggio.<br>Queste chiavi potranno essere " +
                "assegnate a qualsiasi personaggio ed allo stesso tempo potranno essere tolte in qualsiasi momento.</p>";

            Popup.confirm('small', msg, function () {
                $.get($this.data('href'), function (data) {
                    if (data.response) {
                        Tabs.reload();
                        Popup.close();
                    } else {
                        Popup.refresh("<p>" + data.msg + "</p>");
                    }
                });
            });
        },

        showKeys: function (e) {
            var $this = $(this);
            e.preventDefault();

            Popup.alert("small", "<p>Caricamento...</p>");

            $.get($this.data('href'), function (data) {
                Popup.refresh(data);
            });
        },

        removeKey: function (e) {
            var $this = $(this);
            e.preventDefault();

            $.get($this.data('href'), function (data) {
                if (data.response) {
                    $this.closest('tr').hide();
                }
            });
        }
    };

    Property.init();

    // ---------------------------------

    var Combat = {
        $container: $('.tab-combat'),

        init: function () {
            Combat.$container.on('click', '[data-upgrade]', Combat.upgrade);
        },

        upgrade: function (e) {
            e.preventDefault();
            var $this = $(this);

            Popup.confirm('small', "<p>Sei sicuro di voler aumentare questo Set Combattente?</p>", function () {
                Popup.refresh("<p>Attendi...</p>");
                $.getJSON($this.data('href'), function (data) {
                    if (data.response) {
                        Popup.refresh("<p>" + data.msg + "</p>");
                        Tabs.reload();
                    } else {
                        Popup.refresh("<p>" + data.msg + "</p>");
                    }
                });
            });
        }
    };

    Combat.init();

})(jQuery, window, document);