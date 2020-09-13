<?php

/* SonataDoctrineORMAdminBundle:CRUD:edit_orm_many_association_script.html.twig */
class __TwigTemplate_dd6cfe55b9ceee35a7e3be76904d1dee9e14679e5c1dcf5a04da392df1789814 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_2addcc9e60fbc40c478c1b720aa9b75bd534b5f468383e8470c15a97c0d7f939 = $this->env->getExtension("native_profiler");
        $__internal_2addcc9e60fbc40c478c1b720aa9b75bd534b5f468383e8470c15a97c0d7f939->enter($__internal_2addcc9e60fbc40c478c1b720aa9b75bd534b5f468383e8470c15a97c0d7f939_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataDoctrineORMAdminBundle:CRUD:edit_orm_many_association_script.html.twig"));

        // line 11
        echo "

";
        // line 18
        echo "
";
        // line 20
        echo "
";
        // line 21
        $context["associationadmin"] = $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "associationadmin", array());
        // line 22
        echo "
<!-- edit many association -->

<script type=\"text/javascript\">

    ";
        // line 32
        echo "
    var field_dialog_form_list_link_";
        // line 33
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo " = function(event) {
        initialize_popup_";
        // line 34
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "();

        var target = jQuery(this);

        // return if the link is an anchor inside the same page
        if (this.nodeName == 'A' && (target.attr('href').length == 0 || target.attr('href')[0] == '#')) {
            Admin.log('[";
        // line 40
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_list_link] element is an anchor, skipping action', this);
            return;
        }

        event.preventDefault();
        event.stopPropagation();

        Admin.log('[";
        // line 47
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_list_link] handle link click in a list');

        var element = jQuery(this).parents('#field_dialog_";
        // line 49
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo " .sonata-ba-list-field');

        // the user does not click on a row column
        if (element.length == 0) {
            Admin.log('[";
        // line 53
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_list_link] the user does not click on a row column, make ajax call to retrieve inner html');
            // make a recursive call (ie: reset the filter)
            jQuery.ajax({
                type: 'GET',
                url: jQuery(this).attr('href'),
                dataType: 'html',
                success: function(html) {
                    Admin.log('[";
        // line 60
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_list_link] callback success, attach valid js event');

                    field_dialog_content_";
        // line 62
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ".html(html);
                    field_dialog_form_list_handle_action_";
        // line 63
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "();

                    Admin.shared_setup(field_dialog_";
        // line 65
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ");
                }
            });

            return;
        }

        Admin.log('[";
        // line 72
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_list_link] the user select one element, update input and hide the modal');

        jQuery('#";
        // line 74
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "').val(element.attr('objectId'));
        jQuery('#";
        // line 75
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "').trigger('change');

        field_dialog_";
        // line 77
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ".modal('hide');
    };

    // this function handle action on the modal list when inside a selected list
    var field_dialog_form_list_handle_action_";
        // line 81
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "  =  function() {
        Admin.log('[";
        // line 82
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_list_handle_action] attaching valid js event');

        // capture the submit event to make an ajax call, ie : POST data to the
        // related create admin
        jQuery('a', field_dialog_";
        // line 86
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ").on('click', field_dialog_form_list_link_";
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ");
        jQuery('form', field_dialog_";
        // line 87
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ").on('submit', function(event) {
            event.preventDefault();

            var form = jQuery(this);

            Admin.log('[";
        // line 92
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_list_handle_action] catching submit event, sending ajax request');

            jQuery(form).ajaxSubmit({
                type: form.attr('method'),
                url: form.attr('action'),
                dataType: 'html',
                data: {_xml_http_request: true},
                success: function(html) {

                    Admin.log('[";
        // line 101
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_list_handle_action] form submit success, restoring event');

                    field_dialog_content_";
        // line 103
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ".html(html);
                    field_dialog_form_list_handle_action_";
        // line 104
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "();

                    Admin.shared_setup(field_dialog_";
        // line 106
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ");
                }
            });
        });
    };

    // handle the list link
    var field_dialog_form_list_";
        // line 113
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo " = function(event) {

        initialize_popup_";
        // line 115
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "();

        event.preventDefault();
        event.stopPropagation();

        Admin.log('[";
        // line 120
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_list] open the list modal');

        var a = jQuery(this);

        field_dialog_content_";
        // line 124
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ".html('');

        // retrieve the form element from the related admin generator
        jQuery.ajax({
            url: a.attr('href'),
            dataType: 'html',
            success: function(html) {

                Admin.log('[";
        // line 132
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_list] retrieving the list content');

                // populate the popup container
                field_dialog_content_";
        // line 135
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ".html(html);

                field_dialog_title_";
        // line 137
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ".html(\"";
        echo $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["associationadmin"]) ? $context["associationadmin"] : $this->getContext($context, "associationadmin")), "label", array()), array(), $this->getAttribute((isset($context["associationadmin"]) ? $context["associationadmin"] : $this->getContext($context, "associationadmin")), "translationdomain", array()));
        echo "\");

                Admin.shared_setup(field_dialog_";
        // line 139
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ");

                field_dialog_form_list_handle_action_";
        // line 141
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "();

                // open the dialog in modal mode
                field_dialog_";
        // line 144
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ".modal();

                Admin.setup_list_modal(field_dialog_";
        // line 146
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ");
            }
        });
    };

    // handle the add link
    var field_dialog_form_add_";
        // line 152
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo " = function(event) {
        initialize_popup_";
        // line 153
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "();

        event.preventDefault();
        event.stopPropagation();

        var a = jQuery(this);

        field_dialog_content_";
        // line 160
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ".html('');

        Admin.log('[";
        // line 162
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_add] add link action');

        // retrieve the form element from the related admin generator
        jQuery.ajax({
            url: a.attr('href'),
            dataType: 'html',
            success: function(html) {

                Admin.log('[";
        // line 170
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_add] ajax success', field_dialog_";
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ");

                // populate the popup container
                field_dialog_content_";
        // line 173
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ".html(html);
                field_dialog_title_";
        // line 174
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ".html(\"";
        echo $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["associationadmin"]) ? $context["associationadmin"] : $this->getContext($context, "associationadmin")), "label", array()), array(), $this->getAttribute((isset($context["associationadmin"]) ? $context["associationadmin"] : $this->getContext($context, "associationadmin")), "translationdomain", array()));
        echo "\");

                Admin.shared_setup(field_dialog_";
        // line 176
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ");

                // capture the submit event to make an ajax call, ie : POST data to the
                // related create admin
                jQuery('a', field_dialog_";
        // line 180
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ").on('click', field_dialog_form_action_";
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ");
                jQuery('form', field_dialog_";
        // line 181
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ").on('submit', field_dialog_form_action_";
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ");

                // open the dialog in modal mode
                field_dialog_";
        // line 184
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ".modal();

                Admin.setup_list_modal(field_dialog_";
        // line 186
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ");
            }
        });
    };

    // handle the post data
    var field_dialog_form_action_";
        // line 192
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo " = function(event) {

        var element = jQuery(this);

        // return if the link is an anchor inside the same page
        if (this.nodeName == 'A' && (element.attr('href').length == 0 || element.attr('href')[0] == '#')) {
            Admin.log('[";
        // line 198
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_action] element is an anchor, skipping action', this);
            return;
        }

        event.preventDefault();
        event.stopPropagation();

        Admin.log('[";
        // line 205
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_action] action catch', this);

        initialize_popup_";
        // line 207
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "();

        if (this.nodeName == 'FORM') {
            var url  = element.attr('action');
            var type = element.attr('method');
        } else if (this.nodeName == 'A') {
            var url  = element.attr('href');
            var type = 'GET';
        } else {
            alert('unexpected element : @' + this.nodeName + '@');
            return;
        }

        if (element.hasClass('sonata-ba-action')) {
            Admin.log('[";
        // line 221
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_action] reserved action stop catch all events');
            return;
        }

        var data = {
            _xml_http_request: true
        }

        var form = jQuery(this);

        Admin.log('[";
        // line 231
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_action] execute ajax call');

        // the ajax post
        jQuery(form).ajaxSubmit({
            url: url,
            type: type,
            data: data,
            success: function(data) {
                Admin.log('[";
        // line 239
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog_form_action] ajax success');

                // if the crud action return ok, then the element has been added
                // so the widget container must be refresh with the last option available
                if (typeof data != 'string' && data.result == 'ok') {
                    field_dialog_";
        // line 244
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ".modal('hide');

                    ";
        // line 246
        if (($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "edit", array()) == "list")) {
            // line 247
            echo "                        ";
            // line 251
            echo "                        jQuery('#";
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo "').val(data.objectId);
                        jQuery('#";
            // line 252
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo "').change();

                    ";
        } else {
            // line 255
            echo "
                        // reload the form element
                        jQuery('#field_widget_";
            // line 257
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo "').closest('form').ajaxSubmit({
                            url: '";
            // line 258
            echo $this->env->getExtension('routing')->getPath("sonata_admin_retrieve_form_element", array("elementId" =>             // line 259
(isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "subclass" => $this->getAttribute($this->getAttribute(            // line 260
(isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "getActiveSubclassCode", array(), "method"), "objectId" => $this->getAttribute($this->getAttribute($this->getAttribute(            // line 261
(isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "root", array()), "id", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "root", array()), "subject", array())), "method"), "uniqid" => $this->getAttribute($this->getAttribute($this->getAttribute(            // line 262
(isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "root", array()), "uniqid", array()), "code" => $this->getAttribute($this->getAttribute($this->getAttribute(            // line 263
(isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "root", array()), "code", array())));
            // line 264
            echo "',
                            data: {_xml_http_request: true },
                            dataType: 'html',
                            type: 'POST',
                            success: function(html) {
                                jQuery('#field_container_";
            // line 269
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo "').replaceWith(html);
                                var newElement = jQuery('#";
            // line 270
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo " [value=\"' + data.objectId + '\"]');
                                if (newElement.is(\"input\")) {
                                    newElement.attr('checked', 'checked');
                                } else {
                                    newElement.attr('selected', 'selected');
                                }

                                jQuery('#field_container_";
            // line 277
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo "').trigger('sonata-admin-append-form-element');
                            }
                        });

                    ";
        }
        // line 282
        echo "
                    return;
                }

                // otherwise, display form error
                field_dialog_content_";
        // line 287
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ".html(data);

                Admin.shared_setup(field_dialog_";
        // line 289
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ");

                // reattach the event
                jQuery('form', field_dialog_";
        // line 292
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ").submit(field_dialog_form_action_";
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ");
            }
        });

        return false;
    };

    var field_dialog_";
        // line 299
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "         = false;
    var field_dialog_content_";
        // line 300
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo " = false;
    var field_dialog_title_";
        // line 301
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "   = false;

    function initialize_popup_";
        // line 303
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "() {
        // initialize component
        if (!field_dialog_";
        // line 305
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ") {
            field_dialog_";
        // line 306
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "         = jQuery(\"#field_dialog_";
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "\");
            field_dialog_content_";
        // line 307
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo " = jQuery(\".modal-body\", \"#field_dialog_";
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "\");
            field_dialog_title_";
        // line 308
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "   = jQuery(\".modal-title\", \"#field_dialog_";
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "\");

            // move the dialog as a child of the root element, nested form breaks html ...
            jQuery(document.body).append(field_dialog_";
        // line 311
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ");

            Admin.log('[";
        // line 313
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "|field_dialog] move dialog container as a document child');
        }
    }

    ";
        // line 320
        echo "    // this function initialize the popup
    // this can be only done this way has popup can be cascaded
    function start_field_dialog_form_add_";
        // line 322
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "(link) {

        // remove the html event
        link.onclick = null;

        initialize_popup_";
        // line 327
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "();

        // add the jQuery event to the a element
        jQuery(link)
            .click(field_dialog_form_add_";
        // line 331
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ")
            .trigger('click')
        ;

        return false;
    }

    if (field_dialog_";
        // line 338
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ") {
        Admin.shared_setup(field_dialog_";
        // line 339
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ");
    }

    ";
        // line 342
        if (($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "edit", array()) == "list")) {
            // line 343
            echo "        ";
            // line 346
            echo "        // this function initialize the popup
        // this can be only done this way has popup can be cascaded
        function start_field_dialog_form_list_";
            // line 348
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo "(link) {

            link.onclick = null;

            initialize_popup_";
            // line 352
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo "();

            // add the jQuery event to the a element
            jQuery(link)
                .click(field_dialog_form_list_";
            // line 356
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo ")
                .trigger('click')
            ;

            return false;
        }

        function remove_selected_element_";
            // line 363
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo "(link) {

            link.onclick = null;

            jQuery(link)
                .click(field_remove_element_";
            // line 368
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo ")
                .trigger('click')
            ;

            return false;
        }

        function field_remove_element_";
            // line 375
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo "(event) {
            event.preventDefault();

            if (jQuery('#";
            // line 378
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo " option').get(0)) {
                jQuery('#";
            // line 379
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo "').attr('selectedIndex', '-1').children(\"option:selected\").attr(\"selected\", false);
            }

            jQuery('#";
            // line 382
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo "').val('');
            jQuery('#";
            // line 383
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo "').trigger('change');

            return false;
        }
        ";
            // line 390
            echo "
        // update the label
        jQuery('#";
            // line 392
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo "').on('change', function(event) {

            Admin.log('[";
            // line 394
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo "|on:change] update the label');

            jQuery('#field_widget_";
            // line 396
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo "').html(\"<span><img src=\\\"";
            echo $this->env->getExtension('asset')->getAssetUrl("bundles/sonataadmin/ajax-loader.gif");
            echo "\\\" style=\\\"vertical-align: middle; margin-right: 10px\\\"/>";
            echo $this->env->getExtension('translator')->trans("loading_information", array(), "SonataAdminBundle");
            echo "</span>\");
            jQuery.ajax({
                type: 'GET',
                url: '";
            // line 399
            echo $this->env->getExtension('routing')->getPath("sonata_admin_short_object_information", array("objectId" => "OBJECT_ID", "uniqid" => $this->getAttribute(            // line 401
(isset($context["associationadmin"]) ? $context["associationadmin"] : $this->getContext($context, "associationadmin")), "uniqid", array()), "code" => $this->getAttribute(            // line 402
(isset($context["associationadmin"]) ? $context["associationadmin"] : $this->getContext($context, "associationadmin")), "code", array()), "linkParameters" => $this->getAttribute($this->getAttribute($this->getAttribute(            // line 403
(isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "options", array()), "link_parameters", array())));
            // line 404
            echo "'.replace('OBJECT_ID', jQuery(this).val()),
                dataType: 'html',
                success: function(html) {
                    jQuery('#field_widget_";
            // line 407
            echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
            echo "').html(html);
                }
            });
        });

    ";
        }
        // line 413
        echo "

</script>
<!-- / edit many association -->

";
        
        $__internal_2addcc9e60fbc40c478c1b720aa9b75bd534b5f468383e8470c15a97c0d7f939->leave($__internal_2addcc9e60fbc40c478c1b720aa9b75bd534b5f468383e8470c15a97c0d7f939_prof);

    }

    public function getTemplateName()
    {
        return "SonataDoctrineORMAdminBundle:CRUD:edit_orm_many_association_script.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  733 => 413,  724 => 407,  719 => 404,  717 => 403,  716 => 402,  715 => 401,  714 => 399,  704 => 396,  699 => 394,  694 => 392,  690 => 390,  683 => 383,  679 => 382,  673 => 379,  669 => 378,  663 => 375,  653 => 368,  645 => 363,  635 => 356,  628 => 352,  621 => 348,  617 => 346,  615 => 343,  613 => 342,  607 => 339,  603 => 338,  593 => 331,  586 => 327,  578 => 322,  574 => 320,  567 => 313,  562 => 311,  554 => 308,  548 => 307,  542 => 306,  538 => 305,  533 => 303,  528 => 301,  524 => 300,  520 => 299,  508 => 292,  502 => 289,  497 => 287,  490 => 282,  482 => 277,  472 => 270,  468 => 269,  461 => 264,  459 => 263,  458 => 262,  457 => 261,  456 => 260,  455 => 259,  454 => 258,  450 => 257,  446 => 255,  440 => 252,  435 => 251,  433 => 247,  431 => 246,  426 => 244,  418 => 239,  407 => 231,  394 => 221,  377 => 207,  372 => 205,  362 => 198,  353 => 192,  344 => 186,  339 => 184,  331 => 181,  325 => 180,  318 => 176,  311 => 174,  307 => 173,  299 => 170,  288 => 162,  283 => 160,  273 => 153,  269 => 152,  260 => 146,  255 => 144,  249 => 141,  244 => 139,  237 => 137,  232 => 135,  226 => 132,  215 => 124,  208 => 120,  200 => 115,  195 => 113,  185 => 106,  180 => 104,  176 => 103,  171 => 101,  159 => 92,  151 => 87,  145 => 86,  138 => 82,  134 => 81,  127 => 77,  122 => 75,  118 => 74,  113 => 72,  103 => 65,  98 => 63,  94 => 62,  89 => 60,  79 => 53,  72 => 49,  67 => 47,  57 => 40,  48 => 34,  44 => 33,  41 => 32,  34 => 22,  32 => 21,  29 => 20,  26 => 18,  22 => 11,);
    }
}
/* {#*/
/* */
/* This file is part of the Sonata package.*/
/* */
/* (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>*/
/* */
/* For the full copyright and license information, please view the LICENSE*/
/* file that was distributed with this source code.*/
/* */
/* #}*/
/* */
/* */
/* {#*/
/* */
/* This code manage the many-to-[one|many] association field popup*/
/* */
/* #}*/
/* */
/* {% autoescape false %}*/
/* */
/* {% set associationadmin = sonata_admin.field_description.associationadmin %}*/
/* */
/* <!-- edit many association -->*/
/* */
/* <script type="text/javascript">*/
/* */
/*     {#*/
/*       handle link click in a list :*/
/*         - if the parent has an objectId defined then the related input get updated*/
/*         - if the parent has NO object then an ajax request is made to refresh the popup*/
/*     #}*/
/* */
/*     var field_dialog_form_list_link_{{ id }} = function(event) {*/
/*         initialize_popup_{{ id }}();*/
/* */
/*         var target = jQuery(this);*/
/* */
/*         // return if the link is an anchor inside the same page*/
/*         if (this.nodeName == 'A' && (target.attr('href').length == 0 || target.attr('href')[0] == '#')) {*/
/*             Admin.log('[{{ id }}|field_dialog_form_list_link] element is an anchor, skipping action', this);*/
/*             return;*/
/*         }*/
/* */
/*         event.preventDefault();*/
/*         event.stopPropagation();*/
/* */
/*         Admin.log('[{{ id }}|field_dialog_form_list_link] handle link click in a list');*/
/* */
/*         var element = jQuery(this).parents('#field_dialog_{{ id }} .sonata-ba-list-field');*/
/* */
/*         // the user does not click on a row column*/
/*         if (element.length == 0) {*/
/*             Admin.log('[{{ id }}|field_dialog_form_list_link] the user does not click on a row column, make ajax call to retrieve inner html');*/
/*             // make a recursive call (ie: reset the filter)*/
/*             jQuery.ajax({*/
/*                 type: 'GET',*/
/*                 url: jQuery(this).attr('href'),*/
/*                 dataType: 'html',*/
/*                 success: function(html) {*/
/*                     Admin.log('[{{ id }}|field_dialog_form_list_link] callback success, attach valid js event');*/
/* */
/*                     field_dialog_content_{{ id }}.html(html);*/
/*                     field_dialog_form_list_handle_action_{{ id }}();*/
/* */
/*                     Admin.shared_setup(field_dialog_{{ id }});*/
/*                 }*/
/*             });*/
/* */
/*             return;*/
/*         }*/
/* */
/*         Admin.log('[{{ id }}|field_dialog_form_list_link] the user select one element, update input and hide the modal');*/
/* */
/*         jQuery('#{{ id }}').val(element.attr('objectId'));*/
/*         jQuery('#{{ id }}').trigger('change');*/
/* */
/*         field_dialog_{{ id }}.modal('hide');*/
/*     };*/
/* */
/*     // this function handle action on the modal list when inside a selected list*/
/*     var field_dialog_form_list_handle_action_{{ id }}  =  function() {*/
/*         Admin.log('[{{ id }}|field_dialog_form_list_handle_action] attaching valid js event');*/
/* */
/*         // capture the submit event to make an ajax call, ie : POST data to the*/
/*         // related create admin*/
/*         jQuery('a', field_dialog_{{ id }}).on('click', field_dialog_form_list_link_{{ id }});*/
/*         jQuery('form', field_dialog_{{ id }}).on('submit', function(event) {*/
/*             event.preventDefault();*/
/* */
/*             var form = jQuery(this);*/
/* */
/*             Admin.log('[{{ id }}|field_dialog_form_list_handle_action] catching submit event, sending ajax request');*/
/* */
/*             jQuery(form).ajaxSubmit({*/
/*                 type: form.attr('method'),*/
/*                 url: form.attr('action'),*/
/*                 dataType: 'html',*/
/*                 data: {_xml_http_request: true},*/
/*                 success: function(html) {*/
/* */
/*                     Admin.log('[{{ id }}|field_dialog_form_list_handle_action] form submit success, restoring event');*/
/* */
/*                     field_dialog_content_{{ id }}.html(html);*/
/*                     field_dialog_form_list_handle_action_{{ id }}();*/
/* */
/*                     Admin.shared_setup(field_dialog_{{ id }});*/
/*                 }*/
/*             });*/
/*         });*/
/*     };*/
/* */
/*     // handle the list link*/
/*     var field_dialog_form_list_{{ id }} = function(event) {*/
/* */
/*         initialize_popup_{{ id }}();*/
/* */
/*         event.preventDefault();*/
/*         event.stopPropagation();*/
/* */
/*         Admin.log('[{{ id }}|field_dialog_form_list] open the list modal');*/
/* */
/*         var a = jQuery(this);*/
/* */
/*         field_dialog_content_{{ id }}.html('');*/
/* */
/*         // retrieve the form element from the related admin generator*/
/*         jQuery.ajax({*/
/*             url: a.attr('href'),*/
/*             dataType: 'html',*/
/*             success: function(html) {*/
/* */
/*                 Admin.log('[{{ id }}|field_dialog_form_list] retrieving the list content');*/
/* */
/*                 // populate the popup container*/
/*                 field_dialog_content_{{ id }}.html(html);*/
/* */
/*                 field_dialog_title_{{ id }}.html("{{ associationadmin.label|trans({}, associationadmin.translationdomain) }}");*/
/* */
/*                 Admin.shared_setup(field_dialog_{{ id }});*/
/* */
/*                 field_dialog_form_list_handle_action_{{ id }}();*/
/* */
/*                 // open the dialog in modal mode*/
/*                 field_dialog_{{ id }}.modal();*/
/* */
/*                 Admin.setup_list_modal(field_dialog_{{ id }});*/
/*             }*/
/*         });*/
/*     };*/
/* */
/*     // handle the add link*/
/*     var field_dialog_form_add_{{ id }} = function(event) {*/
/*         initialize_popup_{{ id }}();*/
/* */
/*         event.preventDefault();*/
/*         event.stopPropagation();*/
/* */
/*         var a = jQuery(this);*/
/* */
/*         field_dialog_content_{{ id }}.html('');*/
/* */
/*         Admin.log('[{{ id }}|field_dialog_form_add] add link action');*/
/* */
/*         // retrieve the form element from the related admin generator*/
/*         jQuery.ajax({*/
/*             url: a.attr('href'),*/
/*             dataType: 'html',*/
/*             success: function(html) {*/
/* */
/*                 Admin.log('[{{ id }}|field_dialog_form_add] ajax success', field_dialog_{{ id }});*/
/* */
/*                 // populate the popup container*/
/*                 field_dialog_content_{{ id }}.html(html);*/
/*                 field_dialog_title_{{ id }}.html("{{ associationadmin.label|trans({}, associationadmin.translationdomain) }}");*/
/* */
/*                 Admin.shared_setup(field_dialog_{{ id }});*/
/* */
/*                 // capture the submit event to make an ajax call, ie : POST data to the*/
/*                 // related create admin*/
/*                 jQuery('a', field_dialog_{{ id }}).on('click', field_dialog_form_action_{{ id }});*/
/*                 jQuery('form', field_dialog_{{ id }}).on('submit', field_dialog_form_action_{{ id }});*/
/* */
/*                 // open the dialog in modal mode*/
/*                 field_dialog_{{ id }}.modal();*/
/* */
/*                 Admin.setup_list_modal(field_dialog_{{ id }});*/
/*             }*/
/*         });*/
/*     };*/
/* */
/*     // handle the post data*/
/*     var field_dialog_form_action_{{ id }} = function(event) {*/
/* */
/*         var element = jQuery(this);*/
/* */
/*         // return if the link is an anchor inside the same page*/
/*         if (this.nodeName == 'A' && (element.attr('href').length == 0 || element.attr('href')[0] == '#')) {*/
/*             Admin.log('[{{ id }}|field_dialog_form_action] element is an anchor, skipping action', this);*/
/*             return;*/
/*         }*/
/* */
/*         event.preventDefault();*/
/*         event.stopPropagation();*/
/* */
/*         Admin.log('[{{ id }}|field_dialog_form_action] action catch', this);*/
/* */
/*         initialize_popup_{{ id }}();*/
/* */
/*         if (this.nodeName == 'FORM') {*/
/*             var url  = element.attr('action');*/
/*             var type = element.attr('method');*/
/*         } else if (this.nodeName == 'A') {*/
/*             var url  = element.attr('href');*/
/*             var type = 'GET';*/
/*         } else {*/
/*             alert('unexpected element : @' + this.nodeName + '@');*/
/*             return;*/
/*         }*/
/* */
/*         if (element.hasClass('sonata-ba-action')) {*/
/*             Admin.log('[{{ id }}|field_dialog_form_action] reserved action stop catch all events');*/
/*             return;*/
/*         }*/
/* */
/*         var data = {*/
/*             _xml_http_request: true*/
/*         }*/
/* */
/*         var form = jQuery(this);*/
/* */
/*         Admin.log('[{{ id }}|field_dialog_form_action] execute ajax call');*/
/* */
/*         // the ajax post*/
/*         jQuery(form).ajaxSubmit({*/
/*             url: url,*/
/*             type: type,*/
/*             data: data,*/
/*             success: function(data) {*/
/*                 Admin.log('[{{ id }}|field_dialog_form_action] ajax success');*/
/* */
/*                 // if the crud action return ok, then the element has been added*/
/*                 // so the widget container must be refresh with the last option available*/
/*                 if (typeof data != 'string' && data.result == 'ok') {*/
/*                     field_dialog_{{ id }}.modal('hide');*/
/* */
/*                     {% if sonata_admin.edit == 'list' %}*/
/*                         {#*/
/*                            in this case we update the hidden input, and call the change event to*/
/*                            retrieve the post information*/
/*                         #}*/
/*                         jQuery('#{{ id }}').val(data.objectId);*/
/*                         jQuery('#{{ id }}').change();*/
/* */
/*                     {% else %}*/
/* */
/*                         // reload the form element*/
/*                         jQuery('#field_widget_{{ id }}').closest('form').ajaxSubmit({*/
/*                             url: '{{ path('sonata_admin_retrieve_form_element', {*/
/*                                 'elementId': id,*/
/*                                 'subclass':  sonata_admin.admin.getActiveSubclassCode(),*/
/*                                 'objectId':  sonata_admin.admin.root.id(sonata_admin.admin.root.subject),*/
/*                                 'uniqid':    sonata_admin.admin.root.uniqid,*/
/*                                 'code':      sonata_admin.admin.root.code*/
/*                             }) }}',*/
/*                             data: {_xml_http_request: true },*/
/*                             dataType: 'html',*/
/*                             type: 'POST',*/
/*                             success: function(html) {*/
/*                                 jQuery('#field_container_{{ id }}').replaceWith(html);*/
/*                                 var newElement = jQuery('#{{ id }} [value="' + data.objectId + '"]');*/
/*                                 if (newElement.is("input")) {*/
/*                                     newElement.attr('checked', 'checked');*/
/*                                 } else {*/
/*                                     newElement.attr('selected', 'selected');*/
/*                                 }*/
/* */
/*                                 jQuery('#field_container_{{ id }}').trigger('sonata-admin-append-form-element');*/
/*                             }*/
/*                         });*/
/* */
/*                     {% endif %}*/
/* */
/*                     return;*/
/*                 }*/
/* */
/*                 // otherwise, display form error*/
/*                 field_dialog_content_{{ id }}.html(data);*/
/* */
/*                 Admin.shared_setup(field_dialog_{{ id }});*/
/* */
/*                 // reattach the event*/
/*                 jQuery('form', field_dialog_{{ id }}).submit(field_dialog_form_action_{{ id }});*/
/*             }*/
/*         });*/
/* */
/*         return false;*/
/*     };*/
/* */
/*     var field_dialog_{{ id }}         = false;*/
/*     var field_dialog_content_{{ id }} = false;*/
/*     var field_dialog_title_{{ id }}   = false;*/
/* */
/*     function initialize_popup_{{ id }}() {*/
/*         // initialize component*/
/*         if (!field_dialog_{{ id }}) {*/
/*             field_dialog_{{ id }}         = jQuery("#field_dialog_{{ id }}");*/
/*             field_dialog_content_{{ id }} = jQuery(".modal-body", "#field_dialog_{{ id }}");*/
/*             field_dialog_title_{{ id }}   = jQuery(".modal-title", "#field_dialog_{{ id }}");*/
/* */
/*             // move the dialog as a child of the root element, nested form breaks html ...*/
/*             jQuery(document.body).append(field_dialog_{{ id }});*/
/* */
/*             Admin.log('[{{ id }}|field_dialog] move dialog container as a document child');*/
/*         }*/
/*     }*/
/* */
/*     {#*/
/*         This code is used to defined the "add" popup*/
/*     #}*/
/*     // this function initialize the popup*/
/*     // this can be only done this way has popup can be cascaded*/
/*     function start_field_dialog_form_add_{{ id }}(link) {*/
/* */
/*         // remove the html event*/
/*         link.onclick = null;*/
/* */
/*         initialize_popup_{{ id }}();*/
/* */
/*         // add the jQuery event to the a element*/
/*         jQuery(link)*/
/*             .click(field_dialog_form_add_{{ id }})*/
/*             .trigger('click')*/
/*         ;*/
/* */
/*         return false;*/
/*     }*/
/* */
/*     if (field_dialog_{{ id }}) {*/
/*         Admin.shared_setup(field_dialog_{{ id }});*/
/*     }*/
/* */
/*     {% if sonata_admin.edit == 'list' %}*/
/*         {#*/
/*             This code is used to defined the "list" popup*/
/*         #}*/
/*         // this function initialize the popup*/
/*         // this can be only done this way has popup can be cascaded*/
/*         function start_field_dialog_form_list_{{ id }}(link) {*/
/* */
/*             link.onclick = null;*/
/* */
/*             initialize_popup_{{ id }}();*/
/* */
/*             // add the jQuery event to the a element*/
/*             jQuery(link)*/
/*                 .click(field_dialog_form_list_{{ id }})*/
/*                 .trigger('click')*/
/*             ;*/
/* */
/*             return false;*/
/*         }*/
/* */
/*         function remove_selected_element_{{ id }}(link) {*/
/* */
/*             link.onclick = null;*/
/* */
/*             jQuery(link)*/
/*                 .click(field_remove_element_{{ id}})*/
/*                 .trigger('click')*/
/*             ;*/
/* */
/*             return false;*/
/*         }*/
/* */
/*         function field_remove_element_{{ id }}(event) {*/
/*             event.preventDefault();*/
/* */
/*             if (jQuery('#{{ id }} option').get(0)) {*/
/*                 jQuery('#{{ id }}').attr('selectedIndex', '-1').children("option:selected").attr("selected", false);*/
/*             }*/
/* */
/*             jQuery('#{{ id }}').val('');*/
/*             jQuery('#{{ id }}').trigger('change');*/
/* */
/*             return false;*/
/*         }*/
/*         {#*/
/*           attach onchange event on the input*/
/*         #}*/
/* */
/*         // update the label*/
/*         jQuery('#{{ id }}').on('change', function(event) {*/
/* */
/*             Admin.log('[{{ id }}|on:change] update the label');*/
/* */
/*             jQuery('#field_widget_{{ id }}').html("<span><img src=\"{{ asset('bundles/sonataadmin/ajax-loader.gif') }}\" style=\"vertical-align: middle; margin-right: 10px\"/>{{ 'loading_information'|trans([], 'SonataAdminBundle') }}</span>");*/
/*             jQuery.ajax({*/
/*                 type: 'GET',*/
/*                 url: '{{ path('sonata_admin_short_object_information', {*/
/*                     'objectId': 'OBJECT_ID',*/
/*                     'uniqid': associationadmin.uniqid,*/
/*                     'code': associationadmin.code,*/
/*                     'linkParameters': sonata_admin.field_description.options.link_parameters*/
/*                 })}}'.replace('OBJECT_ID', jQuery(this).val()),*/
/*                 dataType: 'html',*/
/*                 success: function(html) {*/
/*                     jQuery('#field_widget_{{ id }}').html(html);*/
/*                 }*/
/*             });*/
/*         });*/
/* */
/*     {% endif %}*/
/* */
/* */
/* </script>*/
/* <!-- / edit many association -->*/
/* */
/* {% endautoescape %}*/
/* */
