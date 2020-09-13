<?php

/* SonataAdminBundle:Form:form_admin_fields.html.twig */
class __TwigTemplate_7de6dbe3f5cfc31828b1f9f1e4bbb2c4480f0034b6e72aed64af4e86552d7a45 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("form_div_layout.html.twig", "SonataAdminBundle:Form:form_admin_fields.html.twig", 12);
        $this->blocks = array(
            'form_errors' => array($this, 'block_form_errors'),
            'sonata_help' => array($this, 'block_sonata_help'),
            'form_widget' => array($this, 'block_form_widget'),
            'form_widget_simple' => array($this, 'block_form_widget_simple'),
            'textarea_widget' => array($this, 'block_textarea_widget'),
            'money_widget' => array($this, 'block_money_widget'),
            'percent_widget' => array($this, 'block_percent_widget'),
            'form_label' => array($this, 'block_form_label'),
            'choice_widget_expanded' => array($this, 'block_choice_widget_expanded'),
            'choice_widget_collapsed' => array($this, 'block_choice_widget_collapsed'),
            'date_widget' => array($this, 'block_date_widget'),
            'time_widget' => array($this, 'block_time_widget'),
            'datetime_widget' => array($this, 'block_datetime_widget'),
            'form_row' => array($this, 'block_form_row'),
            'sonata_type_native_collection_widget_row' => array($this, 'block_sonata_type_native_collection_widget_row'),
            'sonata_type_native_collection_widget' => array($this, 'block_sonata_type_native_collection_widget'),
            'sonata_type_immutable_array_widget' => array($this, 'block_sonata_type_immutable_array_widget'),
            'sonata_type_immutable_array_widget_row' => array($this, 'block_sonata_type_immutable_array_widget_row'),
            'sonata_type_model_autocomplete_widget' => array($this, 'block_sonata_type_model_autocomplete_widget'),
            'sonata_type_choice_field_mask_widget' => array($this, 'block_sonata_type_choice_field_mask_widget'),
            'sonata_type_choice_multiple_sortable' => array($this, 'block_sonata_type_choice_multiple_sortable'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "form_div_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_51f7ea2035b5749cfd5e7b275dd4cceb97a9f28708b2d3ecedb07567d860629b = $this->env->getExtension("native_profiler");
        $__internal_51f7ea2035b5749cfd5e7b275dd4cceb97a9f28708b2d3ecedb07567d860629b->enter($__internal_51f7ea2035b5749cfd5e7b275dd4cceb97a9f28708b2d3ecedb07567d860629b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:Form:form_admin_fields.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_51f7ea2035b5749cfd5e7b275dd4cceb97a9f28708b2d3ecedb07567d860629b->leave($__internal_51f7ea2035b5749cfd5e7b275dd4cceb97a9f28708b2d3ecedb07567d860629b_prof);

    }

    // line 14
    public function block_form_errors($context, array $blocks = array())
    {
        $__internal_41db7da2d10c87e09a72b8849ae2fffb4c2f356a48f50e3207d09400cb39b5b4 = $this->env->getExtension("native_profiler");
        $__internal_41db7da2d10c87e09a72b8849ae2fffb4c2f356a48f50e3207d09400cb39b5b4->enter($__internal_41db7da2d10c87e09a72b8849ae2fffb4c2f356a48f50e3207d09400cb39b5b4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_errors"));

        // line 15
        if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
            // line 16
            echo "        ";
            if ( !$this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array())) {
                echo "<div class=\"alert alert-danger\">";
            }
            // line 17
            echo "            <ul class=\"list-unstyled\">
                ";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors")));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 19
                echo "                    <li><i class=\"fa fa-exclamation-circle\"></i> ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["error"], "message", array()), "html", null, true);
                echo "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "            </ul>
        ";
            // line 22
            if ( !$this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array())) {
                echo "</div>";
            }
            // line 23
            echo "    ";
        }
        
        $__internal_41db7da2d10c87e09a72b8849ae2fffb4c2f356a48f50e3207d09400cb39b5b4->leave($__internal_41db7da2d10c87e09a72b8849ae2fffb4c2f356a48f50e3207d09400cb39b5b4_prof);

    }

    // line 26
    public function block_sonata_help($context, array $blocks = array())
    {
        $__internal_659337af7eecbebb2b30b363965adc1dde227b070fc42260cffdb2bedc835f7d = $this->env->getExtension("native_profiler");
        $__internal_659337af7eecbebb2b30b363965adc1dde227b070fc42260cffdb2bedc835f7d->enter($__internal_659337af7eecbebb2b30b363965adc1dde227b070fc42260cffdb2bedc835f7d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_help"));

        // line 27
        ob_start();
        // line 28
        if ((array_key_exists("sonata_help", $context) && (isset($context["sonata_help"]) ? $context["sonata_help"] : $this->getContext($context, "sonata_help")))) {
            // line 29
            echo "    <span class=\"help-block sonata-ba-field-widget-help\">";
            echo (isset($context["sonata_help"]) ? $context["sonata_help"] : $this->getContext($context, "sonata_help"));
            echo "</span>
";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_659337af7eecbebb2b30b363965adc1dde227b070fc42260cffdb2bedc835f7d->leave($__internal_659337af7eecbebb2b30b363965adc1dde227b070fc42260cffdb2bedc835f7d_prof);

    }

    // line 34
    public function block_form_widget($context, array $blocks = array())
    {
        $__internal_32639f285d7468528eb6e3057872811914fc205d4a24d2a049f0f471f82ec243 = $this->env->getExtension("native_profiler");
        $__internal_32639f285d7468528eb6e3057872811914fc205d4a24d2a049f0f471f82ec243->enter($__internal_32639f285d7468528eb6e3057872811914fc205d4a24d2a049f0f471f82ec243_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_widget"));

        // line 35
        $this->displayParentBlock("form_widget", $context, $blocks);
        echo "
    ";
        // line 36
        $this->displayBlock("sonata_help", $context, $blocks);
        
        $__internal_32639f285d7468528eb6e3057872811914fc205d4a24d2a049f0f471f82ec243->leave($__internal_32639f285d7468528eb6e3057872811914fc205d4a24d2a049f0f471f82ec243_prof);

    }

    // line 39
    public function block_form_widget_simple($context, array $blocks = array())
    {
        $__internal_a4f10558ab73aa7a1f94171b08584cf0734f019c16d2f058b80d5c5d82a19dfc = $this->env->getExtension("native_profiler");
        $__internal_a4f10558ab73aa7a1f94171b08584cf0734f019c16d2f058b80d5c5d82a19dfc->enter($__internal_a4f10558ab73aa7a1f94171b08584cf0734f019c16d2f058b80d5c5d82a19dfc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_widget_simple"));

        // line 40
        echo "    ";
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "text")) : ("text"));
        // line 41
        echo "    ";
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) != "file")) {
            // line 42
            echo "        ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " form-control")));
            // line 43
            echo "    ";
        }
        // line 44
        echo "    ";
        $this->displayParentBlock("form_widget_simple", $context, $blocks);
        echo "
";
        
        $__internal_a4f10558ab73aa7a1f94171b08584cf0734f019c16d2f058b80d5c5d82a19dfc->leave($__internal_a4f10558ab73aa7a1f94171b08584cf0734f019c16d2f058b80d5c5d82a19dfc_prof);

    }

    // line 47
    public function block_textarea_widget($context, array $blocks = array())
    {
        $__internal_a8b9df99574b0fee692cb60c5d95bc75a67b526260982e9300d97a68a0ffd2dd = $this->env->getExtension("native_profiler");
        $__internal_a8b9df99574b0fee692cb60c5d95bc75a67b526260982e9300d97a68a0ffd2dd->enter($__internal_a8b9df99574b0fee692cb60c5d95bc75a67b526260982e9300d97a68a0ffd2dd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "textarea_widget"));

        // line 48
        echo "    ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " form-control")));
        // line 49
        echo "    ";
        $this->displayParentBlock("textarea_widget", $context, $blocks);
        echo "
";
        
        $__internal_a8b9df99574b0fee692cb60c5d95bc75a67b526260982e9300d97a68a0ffd2dd->leave($__internal_a8b9df99574b0fee692cb60c5d95bc75a67b526260982e9300d97a68a0ffd2dd_prof);

    }

    // line 52
    public function block_money_widget($context, array $blocks = array())
    {
        $__internal_38f92e8298577805da3c44cbb9f3dbd823a029e8630ea449139d385d601dbeea = $this->env->getExtension("native_profiler");
        $__internal_38f92e8298577805da3c44cbb9f3dbd823a029e8630ea449139d385d601dbeea->enter($__internal_38f92e8298577805da3c44cbb9f3dbd823a029e8630ea449139d385d601dbeea_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "money_widget"));

        // line 53
        if (((isset($context["money_pattern"]) ? $context["money_pattern"] : $this->getContext($context, "money_pattern")) == "{{ widget }}")) {
            // line 54
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 56
            echo "        ";
            $context["currencySymbol"] = trim(twig_replace_filter((isset($context["money_pattern"]) ? $context["money_pattern"] : $this->getContext($context, "money_pattern")), array("{{ widget }}" => "")));
            // line 57
            echo "        ";
            if (preg_match("/^{{ widget }}/", (isset($context["money_pattern"]) ? $context["money_pattern"] : $this->getContext($context, "money_pattern")))) {
                // line 58
                echo "            <div class=\"input-group\">";
                // line 59
                $this->displayBlock("form_widget_simple", $context, $blocks);
                // line 60
                echo "<span class=\"input-group-addon\">";
                echo twig_escape_filter($this->env, (isset($context["currencySymbol"]) ? $context["currencySymbol"] : $this->getContext($context, "currencySymbol")), "html", null, true);
                echo "</span>
            </div>
        ";
            } elseif (preg_match("/{{ widget }}\$/",             // line 62
(isset($context["money_pattern"]) ? $context["money_pattern"] : $this->getContext($context, "money_pattern")))) {
                // line 63
                echo "            <div class=\"input-group\">
                <span class=\"input-group-addon\">";
                // line 64
                echo twig_escape_filter($this->env, (isset($context["currencySymbol"]) ? $context["currencySymbol"] : $this->getContext($context, "currencySymbol")), "html", null, true);
                echo "</span>";
                // line 65
                $this->displayBlock("form_widget_simple", $context, $blocks);
                // line 66
                echo "</div>
        ";
            }
            // line 68
            echo "    ";
        }
        
        $__internal_38f92e8298577805da3c44cbb9f3dbd823a029e8630ea449139d385d601dbeea->leave($__internal_38f92e8298577805da3c44cbb9f3dbd823a029e8630ea449139d385d601dbeea_prof);

    }

    // line 71
    public function block_percent_widget($context, array $blocks = array())
    {
        $__internal_99f629daa20a4e35e2105146f1fc964c5ac3760838ec63991f6e76b61990a062 = $this->env->getExtension("native_profiler");
        $__internal_99f629daa20a4e35e2105146f1fc964c5ac3760838ec63991f6e76b61990a062->enter($__internal_99f629daa20a4e35e2105146f1fc964c5ac3760838ec63991f6e76b61990a062_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "percent_widget"));

        // line 72
        echo "    ";
        ob_start();
        // line 73
        echo "        ";
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "text")) : ("text"));
        // line 74
        echo "        <div class=\"input-group\">
            ";
        // line 75
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
            <span class=\"input-group-addon\">%</span>
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_99f629daa20a4e35e2105146f1fc964c5ac3760838ec63991f6e76b61990a062->leave($__internal_99f629daa20a4e35e2105146f1fc964c5ac3760838ec63991f6e76b61990a062_prof);

    }

    // line 82
    public function block_form_label($context, array $blocks = array())
    {
        $__internal_dd828e603219c3c3e8e922b3a69292dd3160abfedb6a21a649238df9ced64322 = $this->env->getExtension("native_profiler");
        $__internal_dd828e603219c3c3e8e922b3a69292dd3160abfedb6a21a649238df9ced64322->enter($__internal_dd828e603219c3c3e8e922b3a69292dd3160abfedb6a21a649238df9ced64322_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_label"));

        // line 83
        ob_start();
        // line 84
        echo "    ";
        if (( !((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")) === false) && ($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "options", array()), "form_type", array(), "array") == "horizontal"))) {
            // line 85
            echo "        ";
            $context["label_class"] = "col-sm-3";
            // line 86
            echo "    ";
        }
        // line 87
        echo "
    ";
        // line 88
        $context["label_class"] = (((array_key_exists("label_class", $context)) ? (_twig_default_filter((isset($context["label_class"]) ? $context["label_class"] : $this->getContext($context, "label_class")), "")) : ("")) . " control-label");
        // line 89
        echo "
    ";
        // line 90
        if ( !((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")) === false)) {
            // line 91
            echo "        ";
            $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), array("class" => ((($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array()), "")) : ("")) . (isset($context["label_class"]) ? $context["label_class"] : $this->getContext($context, "label_class")))));
            // line 92
            echo "
        ";
            // line 93
            if ( !(isset($context["compound"]) ? $context["compound"] : $this->getContext($context, "compound"))) {
                // line 94
                echo "            ";
                $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), array("for" => (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"))));
                // line 95
                echo "        ";
            }
            // line 96
            echo "        ";
            if ((isset($context["required"]) ? $context["required"] : $this->getContext($context, "required"))) {
                // line 97
                echo "            ";
                $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), array("class" => trim(((($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array()), "")) : ("")) . " required"))));
                // line 98
                echo "        ";
            }
            // line 99
            echo "
        ";
            // line 100
            if (twig_test_empty((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")))) {
                // line 101
                if ((array_key_exists("label_format", $context) &&  !twig_test_empty((isset($context["label_format"]) ? $context["label_format"] : $this->getContext($context, "label_format"))))) {
                    // line 102
                    $context["label"] = twig_replace_filter((isset($context["label_format"]) ? $context["label_format"] : $this->getContext($context, "label_format")), array("%name%" =>                     // line 103
(isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "%id%" =>                     // line 104
(isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"))));
                } else {
                    // line 107
                    $context["label"] = $this->env->getExtension('form')->humanize((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")));
                }
            }
            // line 110
            echo "
        ";
            // line 111
            if (((array_key_exists("in_list_checkbox", $context) && (isset($context["in_list_checkbox"]) ? $context["in_list_checkbox"] : $this->getContext($context, "in_list_checkbox"))) && array_key_exists("widget", $context))) {
                // line 112
                echo "            <label";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")));
                foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                    echo " ";
                    echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                    echo "\"";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo ">
                ";
                // line 113
                echo (isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget"));
                echo "
                <span>
                    ";
                // line 115
                if ( !$this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array())) {
                    // line 116
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
                } else {
                    // line 118
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), array(), $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "translationDomain", array())), "html", null, true);
                }
                // line 120
                echo "                </span>
            </label>
        ";
            } else {
                // line 123
                echo "            <label";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")));
                foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                    echo " ";
                    echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                    echo "\"";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo ">
                ";
                // line 124
                if ( !$this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array())) {
                    // line 125
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
                } else {
                    // line 127
                    echo "                    ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "trans", array(0 => (isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), 1 => array(), 2 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "translationDomain", array())), "method"), "html", null, true);
                    echo "
                ";
                }
                // line 129
                echo "            </label>
        ";
            }
            // line 131
            echo "    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_dd828e603219c3c3e8e922b3a69292dd3160abfedb6a21a649238df9ced64322->leave($__internal_dd828e603219c3c3e8e922b3a69292dd3160abfedb6a21a649238df9ced64322_prof);

    }

    // line 135
    public function block_choice_widget_expanded($context, array $blocks = array())
    {
        $__internal_cdefea79304c873a8ee33862712572e4ab7ee2fb0131cc539e88dcfc99085b4e = $this->env->getExtension("native_profiler");
        $__internal_cdefea79304c873a8ee33862712572e4ab7ee2fb0131cc539e88dcfc99085b4e->enter($__internal_cdefea79304c873a8ee33862712572e4ab7ee2fb0131cc539e88dcfc99085b4e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "choice_widget_expanded"));

        // line 136
        ob_start();
        // line 137
        echo "    ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " list-unstyled")));
        // line 138
        echo "    <ul ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
    ";
        // line 139
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 140
            echo "        <li>
            ";
            // line 141
            ob_start();
            // line 142
            echo "                ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'widget', array("horizontal" => false, "horizontal_input_wrapper_class" => ""));
            echo " ";
            // line 143
            echo "            ";
            $context["form_widget_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 144
            echo "            ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'label', array("in_list_checkbox" => true, "widget" => (isset($context["form_widget_content"]) ? $context["form_widget_content"] : $this->getContext($context, "form_widget_content"))) + (twig_test_empty($_label_ = (($this->getAttribute($this->getAttribute($context["child"], "vars", array(), "any", false, true), "label", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($context["child"], "vars", array(), "any", false, true), "label", array()), null)) : (null))) ? array() : array("label" => $_label_)));
            echo "
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 147
        echo "    </ul>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_cdefea79304c873a8ee33862712572e4ab7ee2fb0131cc539e88dcfc99085b4e->leave($__internal_cdefea79304c873a8ee33862712572e4ab7ee2fb0131cc539e88dcfc99085b4e_prof);

    }

    // line 151
    public function block_choice_widget_collapsed($context, array $blocks = array())
    {
        $__internal_10d75ae8594408f597a02d280af8da47c0c4ed5006fcf4e543d727680405dbe8 = $this->env->getExtension("native_profiler");
        $__internal_10d75ae8594408f597a02d280af8da47c0c4ed5006fcf4e543d727680405dbe8->enter($__internal_10d75ae8594408f597a02d280af8da47c0c4ed5006fcf4e543d727680405dbe8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "choice_widget_collapsed"));

        // line 152
        ob_start();
        // line 153
        echo "    ";
        if ((((isset($context["required"]) ? $context["required"] : $this->getContext($context, "required")) && array_key_exists("placeholder", $context)) && (null === (isset($context["placeholder"]) ? $context["placeholder"] : $this->getContext($context, "placeholder"))))) {
            // line 154
            echo "        ";
            $context["required"] = false;
            // line 155
            echo "    ";
        } elseif (((((((isset($context["required"]) ? $context["required"] : $this->getContext($context, "required")) && array_key_exists("empty_value", $context)) && array_key_exists("empty_value_in_choices", $context)) && (null === (isset($context["empty_value"]) ? $context["empty_value"] : $this->getContext($context, "empty_value")))) &&  !(isset($context["empty_value_in_choices"]) ? $context["empty_value_in_choices"] : $this->getContext($context, "empty_value_in_choices"))) &&  !(isset($context["multiple"]) ? $context["multiple"] : $this->getContext($context, "multiple")))) {
            // line 156
            echo "        ";
            $context["required"] = false;
            // line 157
            echo "    ";
        }
        // line 158
        echo "
    ";
        // line 159
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " form-control")));
        // line 160
        echo "    ";
        if (((array_key_exists("sortable", $context) && (isset($context["sortable"]) ? $context["sortable"] : $this->getContext($context, "sortable"))) && (isset($context["multiple"]) ? $context["multiple"] : $this->getContext($context, "multiple")))) {
            // line 161
            echo "        ";
            $this->displayBlock("sonata_type_choice_multiple_sortable", $context, $blocks);
            echo "
    ";
        } else {
            // line 163
            echo "        <select ";
            $this->displayBlock("widget_attributes", $context, $blocks);
            if ((isset($context["multiple"]) ? $context["multiple"] : $this->getContext($context, "multiple"))) {
                echo " multiple=\"multiple\"";
            }
            echo " >
            ";
            // line 164
            if ((array_key_exists("empty_value", $context) &&  !(null === (isset($context["empty_value"]) ? $context["empty_value"] : $this->getContext($context, "empty_value"))))) {
                // line 165
                echo "                <option value=\"\"";
                if (((isset($context["required"]) ? $context["required"] : $this->getContext($context, "required")) && twig_test_empty((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))))) {
                    echo " selected=\"selected\"";
                }
                echo ">
                    ";
                // line 166
                if ( !$this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array())) {
                    // line 167
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["empty_value"]) ? $context["empty_value"] : $this->getContext($context, "empty_value")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
                } else {
                    // line 169
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["empty_value"]) ? $context["empty_value"] : $this->getContext($context, "empty_value")), array(), $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "translationDomain", array())), "html", null, true);
                }
                // line 171
                echo "                </option>
            ";
            } elseif ((            // line 172
array_key_exists("placeholder", $context) &&  !(null === (isset($context["placeholder"]) ? $context["placeholder"] : $this->getContext($context, "placeholder"))))) {
                // line 173
                echo "                <option value=\"\"";
                if (((isset($context["required"]) ? $context["required"] : $this->getContext($context, "required")) && twig_test_empty((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))))) {
                    echo " selected=\"selected\"";
                }
                echo ">
                    ";
                // line 174
                if ( !$this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array())) {
                    // line 175
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["placeholder"]) ? $context["placeholder"] : $this->getContext($context, "placeholder")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
                } else {
                    // line 177
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["placeholder"]) ? $context["placeholder"] : $this->getContext($context, "placeholder")), array(), $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "translationDomain", array())), "html", null, true);
                }
                // line 179
                echo "                </option>
            ";
            }
            // line 181
            echo "            ";
            if ((twig_length_filter($this->env, (isset($context["preferred_choices"]) ? $context["preferred_choices"] : $this->getContext($context, "preferred_choices"))) > 0)) {
                // line 182
                echo "                ";
                $context["options"] = (isset($context["preferred_choices"]) ? $context["preferred_choices"] : $this->getContext($context, "preferred_choices"));
                // line 183
                echo "                ";
                $this->displayBlock("choice_widget_options", $context, $blocks);
                echo "
                ";
                // line 184
                if ((twig_length_filter($this->env, (isset($context["choices"]) ? $context["choices"] : $this->getContext($context, "choices"))) > 0)) {
                    // line 185
                    echo "                    <option disabled=\"disabled\">";
                    echo twig_escape_filter($this->env, (isset($context["separator"]) ? $context["separator"] : $this->getContext($context, "separator")), "html", null, true);
                    echo "</option>
                ";
                }
                // line 187
                echo "            ";
            }
            // line 188
            echo "            ";
            $context["options"] = (isset($context["choices"]) ? $context["choices"] : $this->getContext($context, "choices"));
            // line 189
            echo "            ";
            $this->displayBlock("choice_widget_options", $context, $blocks);
            echo "
        </select>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_10d75ae8594408f597a02d280af8da47c0c4ed5006fcf4e543d727680405dbe8->leave($__internal_10d75ae8594408f597a02d280af8da47c0c4ed5006fcf4e543d727680405dbe8_prof);

    }

    // line 195
    public function block_date_widget($context, array $blocks = array())
    {
        $__internal_2c127f292c2d44c4a0c21e694197c9f7ebede857bc6b3b18b70a5a02fd3c5d45 = $this->env->getExtension("native_profiler");
        $__internal_2c127f292c2d44c4a0c21e694197c9f7ebede857bc6b3b18b70a5a02fd3c5d45->enter($__internal_2c127f292c2d44c4a0c21e694197c9f7ebede857bc6b3b18b70a5a02fd3c5d45_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "date_widget"));

        // line 196
        ob_start();
        // line 197
        echo "    ";
        if (((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")) == "single_text")) {
            // line 198
            echo "        ";
            $this->displayBlock("form_widget_simple", $context, $blocks);
            echo "
    ";
        } else {
            // line 200
            echo "        ";
            if (( !array_key_exists("row", $context) || ((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")) == true))) {
                // line 201
                echo "            ";
                $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " row")));
                // line 202
                echo "        ";
            }
            // line 203
            echo "        ";
            $context["input_wrapper_class"] = ((array_key_exists("input_wrapper_class", $context)) ? (_twig_default_filter((isset($context["input_wrapper_class"]) ? $context["input_wrapper_class"] : $this->getContext($context, "input_wrapper_class")), "col-sm-4")) : ("col-sm-4"));
            // line 204
            echo "        <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
            ";
            // line 205
            echo twig_replace_filter((isset($context["date_pattern"]) ? $context["date_pattern"] : $this->getContext($context, "date_pattern")), array("{{ year }}" => (((("<div class=\"" .             // line 206
(isset($context["input_wrapper_class"]) ? $context["input_wrapper_class"] : $this->getContext($context, "input_wrapper_class"))) . "\">") . $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "year", array()), 'widget')) . "</div>"), "{{ month }}" => (((("<div class=\"" .             // line 207
(isset($context["input_wrapper_class"]) ? $context["input_wrapper_class"] : $this->getContext($context, "input_wrapper_class"))) . "\">") . $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "month", array()), 'widget')) . "</div>"), "{{ day }}" => (((("<div class=\"" .             // line 208
(isset($context["input_wrapper_class"]) ? $context["input_wrapper_class"] : $this->getContext($context, "input_wrapper_class"))) . "\">") . $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "day", array()), 'widget')) . "</div>")));
            // line 209
            echo "
        </div>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_2c127f292c2d44c4a0c21e694197c9f7ebede857bc6b3b18b70a5a02fd3c5d45->leave($__internal_2c127f292c2d44c4a0c21e694197c9f7ebede857bc6b3b18b70a5a02fd3c5d45_prof);

    }

    // line 215
    public function block_time_widget($context, array $blocks = array())
    {
        $__internal_7d13812a967a96a9b50d92c9a84d5f8270d1658457a386770506f1d13c5b5a31 = $this->env->getExtension("native_profiler");
        $__internal_7d13812a967a96a9b50d92c9a84d5f8270d1658457a386770506f1d13c5b5a31->enter($__internal_7d13812a967a96a9b50d92c9a84d5f8270d1658457a386770506f1d13c5b5a31_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "time_widget"));

        // line 216
        ob_start();
        // line 217
        echo "    ";
        if (((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")) == "single_text")) {
            // line 218
            echo "        ";
            $this->displayBlock("form_widget_simple", $context, $blocks);
            echo "
    ";
        } else {
            // line 220
            echo "        ";
            if (( !array_key_exists("row", $context) || ((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")) == true))) {
                // line 221
                echo "            ";
                $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " row")));
                // line 222
                echo "        ";
            }
            // line 223
            echo "        ";
            $context["input_wrapper_class"] = ((array_key_exists("input_wrapper_class", $context)) ? (_twig_default_filter((isset($context["input_wrapper_class"]) ? $context["input_wrapper_class"] : $this->getContext($context, "input_wrapper_class")), "col-sm-6")) : ("col-sm-6"));
            // line 224
            echo "        <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
            <div class=\"";
            // line 225
            echo twig_escape_filter($this->env, (isset($context["input_wrapper_class"]) ? $context["input_wrapper_class"] : $this->getContext($context, "input_wrapper_class")), "html", null, true);
            echo "\">
                ";
            // line 226
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "hour", array()), 'widget');
            echo "
            </div>
            ";
            // line 228
            if ((isset($context["with_minutes"]) ? $context["with_minutes"] : $this->getContext($context, "with_minutes"))) {
                // line 229
                echo "                <div class=\"";
                echo twig_escape_filter($this->env, (isset($context["input_wrapper_class"]) ? $context["input_wrapper_class"] : $this->getContext($context, "input_wrapper_class")), "html", null, true);
                echo "\">
                    ";
                // line 230
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "minute", array()), 'widget');
                echo "
                </div>
            ";
            }
            // line 233
            echo "            ";
            if ((isset($context["with_seconds"]) ? $context["with_seconds"] : $this->getContext($context, "with_seconds"))) {
                // line 234
                echo "                <div class=\"";
                echo twig_escape_filter($this->env, (isset($context["input_wrapper_class"]) ? $context["input_wrapper_class"] : $this->getContext($context, "input_wrapper_class")), "html", null, true);
                echo "\">
                    ";
                // line 235
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "second", array()), 'widget');
                echo "
                </div>
            ";
            }
            // line 238
            echo "        </div>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_7d13812a967a96a9b50d92c9a84d5f8270d1658457a386770506f1d13c5b5a31->leave($__internal_7d13812a967a96a9b50d92c9a84d5f8270d1658457a386770506f1d13c5b5a31_prof);

    }

    // line 243
    public function block_datetime_widget($context, array $blocks = array())
    {
        $__internal_bf6d23d6ee36602c83a1a6cc5f0a20ebecab8ea70c11e8150ec3b480116a9332 = $this->env->getExtension("native_profiler");
        $__internal_bf6d23d6ee36602c83a1a6cc5f0a20ebecab8ea70c11e8150ec3b480116a9332->enter($__internal_bf6d23d6ee36602c83a1a6cc5f0a20ebecab8ea70c11e8150ec3b480116a9332_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "datetime_widget"));

        // line 244
        ob_start();
        // line 245
        echo "    ";
        if (((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")) == "single_text")) {
            // line 246
            echo "        ";
            $this->displayBlock("form_widget_simple", $context, $blocks);
            echo "
    ";
        } else {
            // line 248
            echo "        ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " row")));
            // line 249
            echo "        <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
            ";
            // line 250
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "date", array()), 'errors');
            echo "
            ";
            // line 251
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "time", array()), 'errors');
            echo "
            ";
            // line 252
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "date", array()), 'widget', array("row" => false, "input_wrapper_class" => "col-sm-2"));
            echo "
            ";
            // line 253
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "time", array()), 'widget', array("row" => false, "input_wrapper_class" => "col-sm-2"));
            echo "
        </div>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_bf6d23d6ee36602c83a1a6cc5f0a20ebecab8ea70c11e8150ec3b480116a9332->leave($__internal_bf6d23d6ee36602c83a1a6cc5f0a20ebecab8ea70c11e8150ec3b480116a9332_prof);

    }

    // line 259
    public function block_form_row($context, array $blocks = array())
    {
        $__internal_b0d61f0557cf92880351de43386671964d9bae559f8cb1ea110f0a0f81f76035 = $this->env->getExtension("native_profiler");
        $__internal_b0d61f0557cf92880351de43386671964d9bae559f8cb1ea110f0a0f81f76035->enter($__internal_b0d61f0557cf92880351de43386671964d9bae559f8cb1ea110f0a0f81f76035_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_row"));

        // line 260
        echo "    <div class=\"form-group";
        if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
            echo " has-error";
        }
        echo "\" id=\"sonata-ba-field-container-";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\">
        ";
        // line 261
        if ($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "options", array(), "any", true, true)) {
            // line 262
            echo "            ";
            $context["label"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "name", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "name", array()), (isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")))) : ((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label"))));
            // line 263
            echo "        ";
        }
        // line 264
        echo "
        ";
        // line 265
        $context["div_class"] = "sonata-ba-field";
        // line 266
        echo "
        ";
        // line 267
        if (((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")) === false)) {
            // line 268
            echo "            ";
            $context["div_class"] = ((isset($context["div_class"]) ? $context["div_class"] : $this->getContext($context, "div_class")) . " sonata-collection-row-without-label");
            // line 269
            echo "        ";
        }
        // line 270
        echo "
        ";
        // line 271
        if ((array_key_exists("sonata_admin", $context) && ($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "options", array()), "form_type", array(), "array") == "horizontal"))) {
            // line 272
            echo "            ";
            if (((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")) === false)) {
                // line 273
                echo "                ";
                if (twig_in_filter("collection", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()), "vars", array()), "block_prefixes", array()))) {
                    // line 274
                    echo "                    ";
                    $context["div_class"] = ((isset($context["div_class"]) ? $context["div_class"] : $this->getContext($context, "div_class")) . " col-sm-12");
                    // line 275
                    echo "                ";
                } else {
                    // line 276
                    echo "                    ";
                    $context["div_class"] = ((isset($context["div_class"]) ? $context["div_class"] : $this->getContext($context, "div_class")) . " col-sm-9 col-sm-offset-3");
                    // line 277
                    echo "                ";
                }
                // line 278
                echo "            ";
            } else {
                // line 279
                echo "                ";
                $context["div_class"] = ((isset($context["div_class"]) ? $context["div_class"] : $this->getContext($context, "div_class")) . " col-sm-9");
                // line 280
                echo "            ";
            }
            // line 281
            echo "        ";
        }
        // line 282
        echo "
        ";
        // line 283
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label', (twig_test_empty($_label_ = ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), null)) : (null))) ? array() : array("label" => $_label_)));
        echo "

        ";
        // line 285
        if ((array_key_exists("sonata_admin", $context) && (isset($context["sonata_admin_enabled"]) ? $context["sonata_admin_enabled"] : $this->getContext($context, "sonata_admin_enabled")))) {
            // line 286
            echo "            ";
            $context["div_class"] = (((((isset($context["div_class"]) ? $context["div_class"] : $this->getContext($context, "div_class")) . " sonata-ba-field-") . $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "edit", array())) . "-") . $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "inline", array()));
            // line 287
            echo "        ";
        }
        // line 288
        echo "
        ";
        // line 289
        if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
            // line 290
            echo "            ";
            $context["div_class"] = ((isset($context["div_class"]) ? $context["div_class"] : $this->getContext($context, "div_class")) . " sonata-ba-field-error");
            // line 291
            echo "        ";
        }
        // line 292
        echo "
        <div class=\"";
        // line 293
        echo twig_escape_filter($this->env, (isset($context["div_class"]) ? $context["div_class"] : $this->getContext($context, "div_class")), "html", null, true);
        echo "\">
            ";
        // line 294
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget', array("horizontal" => false, "horizontal_input_wrapper_class" => ""));
        echo " ";
        // line 295
        echo "
            ";
        // line 296
        if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
            // line 297
            echo "                <div class=\"help-block sonata-ba-field-error-messages\">
                    ";
            // line 298
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
            echo "
                </div>
            ";
        }
        // line 301
        echo "
            ";
        // line 302
        if (((array_key_exists("sonata_admin", $context) && (isset($context["sonata_admin_enabled"]) ? $context["sonata_admin_enabled"] : $this->getContext($context, "sonata_admin_enabled"))) && (($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "help", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "help", array()), false)) : (false)))) {
            // line 303
            echo "                <span class=\"help-block sonata-ba-field-help\">";
            echo $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "trans", array(0 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "help", array()), 1 => array(), 2 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "translationDomain", array())), "method");
            echo "</span>
            ";
        }
        // line 305
        echo "        </div>
    </div>
";
        
        $__internal_b0d61f0557cf92880351de43386671964d9bae559f8cb1ea110f0a0f81f76035->leave($__internal_b0d61f0557cf92880351de43386671964d9bae559f8cb1ea110f0a0f81f76035_prof);

    }

    // line 309
    public function block_sonata_type_native_collection_widget_row($context, array $blocks = array())
    {
        $__internal_efe1ba287e900559c2129fbbbb4bbdc1069b9bd753e5489d1fb97b18e1b592ea = $this->env->getExtension("native_profiler");
        $__internal_efe1ba287e900559c2129fbbbb4bbdc1069b9bd753e5489d1fb97b18e1b592ea->enter($__internal_efe1ba287e900559c2129fbbbb4bbdc1069b9bd753e5489d1fb97b18e1b592ea_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_native_collection_widget_row"));

        // line 310
        ob_start();
        // line 311
        echo "    <div class=\"sonata-collection-row\">
        ";
        // line 312
        if ((isset($context["allow_delete"]) ? $context["allow_delete"] : $this->getContext($context, "allow_delete"))) {
            // line 313
            echo "            <div class=\"row\">
                <div class=\"col-xs-1\">
                    <a href=\"#\" class=\"btn btn-link sonata-collection-delete\">
                        <i class=\"fa fa-minus-circle\"></i>
                    </a>
                </div>
                <div class=\"col-xs-11\">
        ";
        }
        // line 321
        echo "            ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["child"]) ? $context["child"] : $this->getContext($context, "child")), 'row', array("label" => false));
        echo "
        ";
        // line 322
        if ((isset($context["allow_delete"]) ? $context["allow_delete"] : $this->getContext($context, "allow_delete"))) {
            // line 323
            echo "                </div>
            </div>
        ";
        }
        // line 326
        echo "    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_efe1ba287e900559c2129fbbbb4bbdc1069b9bd753e5489d1fb97b18e1b592ea->leave($__internal_efe1ba287e900559c2129fbbbb4bbdc1069b9bd753e5489d1fb97b18e1b592ea_prof);

    }

    // line 330
    public function block_sonata_type_native_collection_widget($context, array $blocks = array())
    {
        $__internal_6bcd97f91b8392f9dd69eb8ce8d5cdfe7cfed1c3478fde8b36d26d38dfa76a41 = $this->env->getExtension("native_profiler");
        $__internal_6bcd97f91b8392f9dd69eb8ce8d5cdfe7cfed1c3478fde8b36d26d38dfa76a41->enter($__internal_6bcd97f91b8392f9dd69eb8ce8d5cdfe7cfed1c3478fde8b36d26d38dfa76a41_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_native_collection_widget"));

        // line 331
        ob_start();
        // line 332
        echo "    ";
        if (array_key_exists("prototype", $context)) {
            // line 333
            echo "        ";
            $context["child"] = (isset($context["prototype"]) ? $context["prototype"] : $this->getContext($context, "prototype"));
            // line 334
            echo "        ";
            $context["allow_delete_backup"] = (isset($context["allow_delete"]) ? $context["allow_delete"] : $this->getContext($context, "allow_delete"));
            // line 335
            echo "        ";
            $context["allow_delete"] = true;
            // line 336
            echo "        ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("data-prototype" => $this->renderBlock("sonata_type_native_collection_widget_row", $context, $blocks), "data-prototype-name" => $this->getAttribute($this->getAttribute((isset($context["prototype"]) ? $context["prototype"] : $this->getContext($context, "prototype")), "vars", array()), "name", array()), "class" => (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : (""))));
            // line 337
            echo "        ";
            $context["allow_delete"] = (isset($context["allow_delete_backup"]) ? $context["allow_delete_backup"] : $this->getContext($context, "allow_delete_backup"));
            // line 338
            echo "    ";
        }
        // line 339
        echo "    <div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
        ";
        // line 340
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
        ";
        // line 341
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 342
            echo "            ";
            $this->displayBlock("sonata_type_native_collection_widget_row", $context, $blocks);
            echo "
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 344
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        ";
        // line 345
        if ((isset($context["allow_add"]) ? $context["allow_add"] : $this->getContext($context, "allow_add"))) {
            // line 346
            echo "            <div><a href=\"#\" class=\"btn btn-link sonata-collection-add\"><i class=\"fa fa-plus-circle\"></i></a></div>
        ";
        }
        // line 348
        echo "    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_6bcd97f91b8392f9dd69eb8ce8d5cdfe7cfed1c3478fde8b36d26d38dfa76a41->leave($__internal_6bcd97f91b8392f9dd69eb8ce8d5cdfe7cfed1c3478fde8b36d26d38dfa76a41_prof);

    }

    // line 352
    public function block_sonata_type_immutable_array_widget($context, array $blocks = array())
    {
        $__internal_041e7a85eb65132ee20b40df1f045822627e4175b8a864918cc1957640ace746 = $this->env->getExtension("native_profiler");
        $__internal_041e7a85eb65132ee20b40df1f045822627e4175b8a864918cc1957640ace746->enter($__internal_041e7a85eb65132ee20b40df1f045822627e4175b8a864918cc1957640ace746_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_immutable_array_widget"));

        // line 353
        echo "    ";
        ob_start();
        // line 354
        echo "        <div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
            ";
        // line 355
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "

            ";
        // line 357
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["key"] => $context["child"]) {
            // line 358
            echo "                ";
            $this->displayBlock("sonata_type_immutable_array_widget_row", $context, $blocks);
            echo "
            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 360
        echo "
            ";
        // line 361
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_041e7a85eb65132ee20b40df1f045822627e4175b8a864918cc1957640ace746->leave($__internal_041e7a85eb65132ee20b40df1f045822627e4175b8a864918cc1957640ace746_prof);

    }

    // line 366
    public function block_sonata_type_immutable_array_widget_row($context, array $blocks = array())
    {
        $__internal_21acefb8c78330dd2bc90985472dc9f3fc4598403f75bbcc6e29ca086f7158c9 = $this->env->getExtension("native_profiler");
        $__internal_21acefb8c78330dd2bc90985472dc9f3fc4598403f75bbcc6e29ca086f7158c9->enter($__internal_21acefb8c78330dd2bc90985472dc9f3fc4598403f75bbcc6e29ca086f7158c9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_immutable_array_widget_row"));

        // line 367
        echo "    ";
        ob_start();
        // line 368
        echo "        <div class=\"form-group";
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : $this->getContext($context, "child")), "vars", array()), "errors", array())) > 0)) {
            echo " error";
        }
        echo "\" id=\"sonata-ba-field-container-";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")), "html", null, true);
        echo "\">

            ";
        // line 370
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["child"]) ? $context["child"] : $this->getContext($context, "child")), 'label');
        echo "

            ";
        // line 372
        $context["div_class"] = "";
        // line 373
        echo "            ";
        if (($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "options", array()), "form_type", array(), "array") == "horizontal")) {
            // line 374
            echo "                ";
            $context["div_class"] = "col-sm-9";
            // line 375
            echo "            ";
        }
        // line 376
        echo "
            <div class=\"";
        // line 377
        echo twig_escape_filter($this->env, (isset($context["div_class"]) ? $context["div_class"] : $this->getContext($context, "div_class")), "html", null, true);
        echo " sonata-ba-field sonata-ba-field-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "edit", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "inline", array()), "html", null, true);
        echo " ";
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : $this->getContext($context, "child")), "vars", array()), "errors", array())) > 0)) {
            echo "sonata-ba-field-error";
        }
        echo "\">
                ";
        // line 378
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["child"]) ? $context["child"] : $this->getContext($context, "child")), 'widget', array("horizontal" => false, "horizontal_input_wrapper_class" => ""));
        echo " ";
        // line 379
        echo "            </div>

            ";
        // line 381
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : $this->getContext($context, "child")), "vars", array()), "errors", array())) > 0)) {
            // line 382
            echo "                <div class=\"help-block sonata-ba-field-error-messages\">
                    ";
            // line 383
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["child"]) ? $context["child"] : $this->getContext($context, "child")), 'errors');
            echo "
                </div>
            ";
        }
        // line 386
        echo "        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_21acefb8c78330dd2bc90985472dc9f3fc4598403f75bbcc6e29ca086f7158c9->leave($__internal_21acefb8c78330dd2bc90985472dc9f3fc4598403f75bbcc6e29ca086f7158c9_prof);

    }

    // line 390
    public function block_sonata_type_model_autocomplete_widget($context, array $blocks = array())
    {
        $__internal_b0c3bd70f98f8b800e1f6803597fd6ae2ea50008a716cbd01161d396badf234f = $this->env->getExtension("native_profiler");
        $__internal_b0c3bd70f98f8b800e1f6803597fd6ae2ea50008a716cbd01161d396badf234f->enter($__internal_b0c3bd70f98f8b800e1f6803597fd6ae2ea50008a716cbd01161d396badf234f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_model_autocomplete_widget"));

        // line 391
        echo "    ";
        $this->loadTemplate((isset($context["template"]) ? $context["template"] : $this->getContext($context, "template")), "SonataAdminBundle:Form:form_admin_fields.html.twig", 391)->display($context);
        
        $__internal_b0c3bd70f98f8b800e1f6803597fd6ae2ea50008a716cbd01161d396badf234f->leave($__internal_b0c3bd70f98f8b800e1f6803597fd6ae2ea50008a716cbd01161d396badf234f_prof);

    }

    // line 394
    public function block_sonata_type_choice_field_mask_widget($context, array $blocks = array())
    {
        $__internal_d4946233ab4f2199cd732eaef7be06fc04d7d442a9ac54b109b581cda78c1e26 = $this->env->getExtension("native_profiler");
        $__internal_d4946233ab4f2199cd732eaef7be06fc04d7d442a9ac54b109b581cda78c1e26->enter($__internal_d4946233ab4f2199cd732eaef7be06fc04d7d442a9ac54b109b581cda78c1e26_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_choice_field_mask_widget"));

        // line 395
        echo "    ";
        $this->displayBlock("choice_widget", $context, $blocks);
        echo "
    ";
        // line 396
        $context["main_form_name"] = twig_slice($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), 0, (twig_length_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"))) - twig_length_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")))));
        // line 397
        echo "    <script>
        jQuery(document).ready(function() {
            var allFields = ";
        // line 399
        echo twig_jsonencode_filter((isset($context["all_fields"]) ? $context["all_fields"] : $this->getContext($context, "all_fields")));
        echo ";
            var map = ";
        // line 400
        echo twig_jsonencode_filter((isset($context["map"]) ? $context["map"] : $this->getContext($context, "map")));
        echo ";

            showMaskChoiceEl = jQuery('#";
        // line 402
        echo twig_escape_filter($this->env, (isset($context["main_form_name"]) ? $context["main_form_name"] : $this->getContext($context, "main_form_name")), "html", null, true);
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "');

            showMaskChoiceEl.on('change', function () {
                choice_field_mask_show(jQuery(this).val());
            });

            function choice_field_mask_show(val)
            {
                var controlGroupIdFunc = function (field) {
                    return '#sonata-ba-field-container-";
        // line 411
        echo twig_escape_filter($this->env, (isset($context["main_form_name"]) ? $context["main_form_name"] : $this->getContext($context, "main_form_name")), "html", null, true);
        echo "' + field;

                };
                if (map[val] == undefined) {
                    jQuery.each(allFields, function (i, field) {
                        jQuery(controlGroupIdFunc(field)).hide();
                    });
                    return;
                }

                jQuery.each(allFields, function (i, field) {
                    jQuery(controlGroupIdFunc(field)).hide();
                });
                jQuery.each(map[val], function (i, field) {
                    jQuery(controlGroupIdFunc(field)).show();
                });
            }
            choice_field_mask_show(showMaskChoiceEl.val());
        });

    </script>
";
        
        $__internal_d4946233ab4f2199cd732eaef7be06fc04d7d442a9ac54b109b581cda78c1e26->leave($__internal_d4946233ab4f2199cd732eaef7be06fc04d7d442a9ac54b109b581cda78c1e26_prof);

    }

    // line 434
    public function block_sonata_type_choice_multiple_sortable($context, array $blocks = array())
    {
        $__internal_a46a607d2b4ba9ad664a802643f8742d895ad069331ff5a5260bf1cbe4fce6c0 = $this->env->getExtension("native_profiler");
        $__internal_a46a607d2b4ba9ad664a802643f8742d895ad069331ff5a5260bf1cbe4fce6c0->enter($__internal_a46a607d2b4ba9ad664a802643f8742d895ad069331ff5a5260bf1cbe4fce6c0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_choice_multiple_sortable"));

        // line 435
        echo "    <input type=\"hidden\" name=\"";
        echo twig_escape_filter($this->env, (isset($context["full_name"]) ? $context["full_name"] : $this->getContext($context, "full_name")), "html", null, true);
        echo "\" id=\"";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, twig_join_filter((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), ","), "html", null, true);
        echo "\" />

    <script>
        jQuery(document).ready(function() {
            Admin.setup_sortable_select2(jQuery('#";
        // line 439
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "'), ";
        echo twig_jsonencode_filter($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "choices", array()));
        echo ");
        });
    </script>
";
        
        $__internal_a46a607d2b4ba9ad664a802643f8742d895ad069331ff5a5260bf1cbe4fce6c0->leave($__internal_a46a607d2b4ba9ad664a802643f8742d895ad069331ff5a5260bf1cbe4fce6c0_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Form:form_admin_fields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1286 => 439,  1274 => 435,  1268 => 434,  1239 => 411,  1226 => 402,  1221 => 400,  1217 => 399,  1213 => 397,  1211 => 396,  1206 => 395,  1200 => 394,  1192 => 391,  1186 => 390,  1177 => 386,  1171 => 383,  1168 => 382,  1166 => 381,  1162 => 379,  1159 => 378,  1147 => 377,  1144 => 376,  1141 => 375,  1138 => 374,  1135 => 373,  1133 => 372,  1128 => 370,  1116 => 368,  1113 => 367,  1107 => 366,  1096 => 361,  1093 => 360,  1076 => 358,  1059 => 357,  1054 => 355,  1049 => 354,  1046 => 353,  1040 => 352,  1031 => 348,  1027 => 346,  1025 => 345,  1020 => 344,  1003 => 342,  986 => 341,  982 => 340,  977 => 339,  974 => 338,  971 => 337,  968 => 336,  965 => 335,  962 => 334,  959 => 333,  956 => 332,  954 => 331,  948 => 330,  939 => 326,  934 => 323,  932 => 322,  927 => 321,  917 => 313,  915 => 312,  912 => 311,  910 => 310,  904 => 309,  895 => 305,  889 => 303,  887 => 302,  884 => 301,  878 => 298,  875 => 297,  873 => 296,  870 => 295,  867 => 294,  863 => 293,  860 => 292,  857 => 291,  854 => 290,  852 => 289,  849 => 288,  846 => 287,  843 => 286,  841 => 285,  836 => 283,  833 => 282,  830 => 281,  827 => 280,  824 => 279,  821 => 278,  818 => 277,  815 => 276,  812 => 275,  809 => 274,  806 => 273,  803 => 272,  801 => 271,  798 => 270,  795 => 269,  792 => 268,  790 => 267,  787 => 266,  785 => 265,  782 => 264,  779 => 263,  776 => 262,  774 => 261,  765 => 260,  759 => 259,  747 => 253,  743 => 252,  739 => 251,  735 => 250,  730 => 249,  727 => 248,  721 => 246,  718 => 245,  716 => 244,  710 => 243,  700 => 238,  694 => 235,  689 => 234,  686 => 233,  680 => 230,  675 => 229,  673 => 228,  668 => 226,  664 => 225,  659 => 224,  656 => 223,  653 => 222,  650 => 221,  647 => 220,  641 => 218,  638 => 217,  636 => 216,  630 => 215,  619 => 209,  617 => 208,  616 => 207,  615 => 206,  614 => 205,  609 => 204,  606 => 203,  603 => 202,  600 => 201,  597 => 200,  591 => 198,  588 => 197,  586 => 196,  580 => 195,  567 => 189,  564 => 188,  561 => 187,  555 => 185,  553 => 184,  548 => 183,  545 => 182,  542 => 181,  538 => 179,  535 => 177,  532 => 175,  530 => 174,  523 => 173,  521 => 172,  518 => 171,  515 => 169,  512 => 167,  510 => 166,  503 => 165,  501 => 164,  493 => 163,  487 => 161,  484 => 160,  482 => 159,  479 => 158,  476 => 157,  473 => 156,  470 => 155,  467 => 154,  464 => 153,  462 => 152,  456 => 151,  447 => 147,  437 => 144,  434 => 143,  430 => 142,  428 => 141,  425 => 140,  421 => 139,  416 => 138,  413 => 137,  411 => 136,  405 => 135,  396 => 131,  392 => 129,  386 => 127,  383 => 125,  381 => 124,  365 => 123,  360 => 120,  357 => 118,  354 => 116,  352 => 115,  347 => 113,  331 => 112,  329 => 111,  326 => 110,  322 => 107,  319 => 104,  318 => 103,  317 => 102,  315 => 101,  313 => 100,  310 => 99,  307 => 98,  304 => 97,  301 => 96,  298 => 95,  295 => 94,  293 => 93,  290 => 92,  287 => 91,  285 => 90,  282 => 89,  280 => 88,  277 => 87,  274 => 86,  271 => 85,  268 => 84,  266 => 83,  260 => 82,  248 => 75,  245 => 74,  242 => 73,  239 => 72,  233 => 71,  225 => 68,  221 => 66,  219 => 65,  216 => 64,  213 => 63,  211 => 62,  205 => 60,  203 => 59,  201 => 58,  198 => 57,  195 => 56,  192 => 54,  190 => 53,  184 => 52,  174 => 49,  171 => 48,  165 => 47,  155 => 44,  152 => 43,  149 => 42,  146 => 41,  143 => 40,  137 => 39,  130 => 36,  126 => 35,  120 => 34,  108 => 29,  106 => 28,  104 => 27,  98 => 26,  90 => 23,  86 => 22,  83 => 21,  74 => 19,  70 => 18,  67 => 17,  62 => 16,  60 => 15,  54 => 14,  11 => 12,);
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
/* {% extends 'form_div_layout.html.twig' %}*/
/* */
/* {% block form_errors -%}*/
/*     {% if errors|length > 0 %}*/
/*         {% if not form.parent %}<div class="alert alert-danger">{% endif %}*/
/*             <ul class="list-unstyled">*/
/*                 {% for error in errors %}*/
/*                     <li><i class="fa fa-exclamation-circle"></i> {{ error.message }}</li>*/
/*                 {% endfor %}*/
/*             </ul>*/
/*         {% if not form.parent %}</div>{% endif %}*/
/*     {% endif %}*/
/* {%- endblock form_errors %}*/
/* */
/* {% block sonata_help %}*/
/* {% spaceless %}*/
/* {% if sonata_help is defined and sonata_help %}*/
/*     <span class="help-block sonata-ba-field-widget-help">{{ sonata_help|raw }}</span>*/
/* {% endif %}*/
/* {% endspaceless %}*/
/* {% endblock %}*/
/* */
/* {% block form_widget -%}*/
/*     {{ parent() }}*/
/*     {{ block('sonata_help') }}*/
/* {%- endblock form_widget %}*/
/* */
/* {% block form_widget_simple %}*/
/*     {% set type = type|default('text') %}*/
/*     {% if type != 'file' %}*/
/*         {% set attr = attr|merge({'class': attr.class|default('') ~ ' form-control'}) %}*/
/*     {% endif %}*/
/*     {{ parent() }}*/
/* {% endblock form_widget_simple %}*/
/* */
/* {% block textarea_widget %}*/
/*     {% set attr = attr|merge({'class': attr.class|default('') ~ ' form-control'}) %}*/
/*     {{ parent() }}*/
/* {% endblock textarea_widget %}*/
/* */
/* {% block money_widget -%}*/
/*     {% if money_pattern == '{{ widget }}' %}*/
/*         {{- block('form_widget_simple') -}}*/
/*     {% else %}*/
/*         {% set currencySymbol = money_pattern|replace({'{{ widget }}': ''})|trim %}*/
/*         {% if money_pattern matches '/^{{ widget }}/' %}*/
/*             <div class="input-group">*/
/*                 {{- block('form_widget_simple') -}}*/
/*                 <span class="input-group-addon">{{ currencySymbol }}</span>*/
/*             </div>*/
/*         {% elseif money_pattern matches '/{{ widget }}$/' %}*/
/*             <div class="input-group">*/
/*                 <span class="input-group-addon">{{ currencySymbol }}</span>*/
/*                 {{- block('form_widget_simple') -}}*/
/*             </div>*/
/*         {% endif %}*/
/*     {% endif %}*/
/* {%- endblock money_widget %}*/
/* */
/* {% block percent_widget %}*/
/*     {% spaceless %}*/
/*         {% set type = type|default('text') %}*/
/*         <div class="input-group">*/
/*             {{ block('form_widget_simple') }}*/
/*             <span class="input-group-addon">%</span>*/
/*         </div>*/
/*     {% endspaceless %}*/
/* {% endblock percent_widget %}*/
/* */
/* {# Labels #}*/
/* {% block form_label %}*/
/* {% spaceless %}*/
/*     {% if label is not same as(false) and sonata_admin.options['form_type'] == 'horizontal' %}*/
/*         {% set label_class = 'col-sm-3' %}*/
/*     {% endif %}*/
/* */
/*     {% set label_class = label_class|default('') ~ ' control-label' %}*/
/* */
/*     {% if label is not same as(false) %}*/
/*         {% set label_attr = label_attr|merge({'class': label_attr.class|default('') ~ label_class }) %}*/
/* */
/*         {% if not compound %}*/
/*             {% set label_attr = label_attr|merge({'for': id}) %}*/
/*         {% endif %}*/
/*         {% if required %}*/
/*             {% set label_attr = label_attr|merge({'class': (label_attr.class|default('') ~ ' required')|trim}) %}*/
/*         {% endif %}*/
/* */
/*         {% if label is empty %}*/
/*             {%- if label_format is defined and label_format is not empty -%}*/
/*                 {% set label = label_format|replace({*/
/*                     '%name%': name,*/
/*                     '%id%': id,*/
/*                 }) %}*/
/*             {%- else -%}*/
/*                 {% set label = name|humanize %}*/
/*             {%- endif -%}*/
/*         {% endif %}*/
/* */
/*         {% if in_list_checkbox is defined and in_list_checkbox and widget is defined %}*/
/*             <label{% for attrname,attrvalue in attr %} {{attrname}}="{{attrvalue}}"{% endfor %}>*/
/*                 {{ widget|raw }}*/
/*                 <span>*/
/*                     {% if not sonata_admin.admin %}*/
/*                         {{- label|trans({}, translation_domain) -}}*/
/*                     {% else %}*/
/*                         {{- label|trans({}, sonata_admin.field_description.translationDomain) -}}*/
/*                     {% endif%}*/
/*                 </span>*/
/*             </label>*/
/*         {% else %}*/
/*             <label{% for attrname, attrvalue in label_attr %} {{ attrname }}="{{ attrvalue }}"{% endfor %}>*/
/*                 {% if not sonata_admin.admin%}*/
/*                     {{- label|trans({}, translation_domain) -}}*/
/*                 {% else %}*/
/*                     {{ sonata_admin.admin.trans(label, {}, sonata_admin.field_description.translationDomain) }}*/
/*                 {% endif %}*/
/*             </label>*/
/*         {% endif %}*/
/*     {% endif %}*/
/* {% endspaceless %}*/
/* {% endblock form_label %}*/
/* */
/* {% block choice_widget_expanded %}*/
/* {% spaceless %}*/
/*     {% set attr = attr|merge({'class': attr.class|default('') ~ ' list-unstyled'}) %}*/
/*     <ul {{ block('widget_container_attributes') }}>*/
/*     {% for child in form %}*/
/*         <li>*/
/*             {% set form_widget_content %}*/
/*                 {{ form_widget(child, {'horizontal': false, 'horizontal_input_wrapper_class': ''}) }} {# {'horizontal': false, 'horizontal_input_wrapper_class': ''} needed to avoid MopaBootstrapBundle messing with the DOM #}*/
/*             {% endset %}*/
/*             {{ form_label(child, child.vars.label|default(null), { 'in_list_checkbox' : true, 'widget' : form_widget_content } ) }}*/
/*         </li>*/
/*     {% endfor %}*/
/*     </ul>*/
/* {% endspaceless %}*/
/* {% endblock choice_widget_expanded %}*/
/* */
/* {% block choice_widget_collapsed %}*/
/* {% spaceless %}*/
/*     {% if required and placeholder is defined and placeholder is none %}*/
/*         {% set required = false %}*/
/*     {% elseif required and empty_value is defined and empty_value_in_choices is defined and empty_value is none and not empty_value_in_choices and not multiple %}*/
/*         {% set required = false %}*/
/*     {% endif %}*/
/* */
/*     {% set attr = attr|merge({'class': attr.class|default('') ~ ' form-control'}) %}*/
/*     {% if (sortable is defined) and sortable and multiple %}*/
/*         {{ block('sonata_type_choice_multiple_sortable') }}*/
/*     {% else %}*/
/*         <select {{ block('widget_attributes') }}{% if multiple %} multiple="multiple"{% endif %} >*/
/*             {% if empty_value is defined and empty_value is not none %}*/
/*                 <option value=""{% if required and value is empty %} selected="selected"{% endif %}>*/
/*                     {% if not sonata_admin.admin %}*/
/*                         {{- empty_value|trans({}, translation_domain) -}}*/
/*                     {% else %}*/
/*                         {{- empty_value|trans({}, sonata_admin.field_description.translationDomain) -}}*/
/*                     {% endif%}*/
/*                 </option>*/
/*             {% elseif placeholder is defined and placeholder is not none %}*/
/*                 <option value=""{% if required and value is empty %} selected="selected"{% endif %}>*/
/*                     {% if not sonata_admin.admin %}*/
/*                         {{- placeholder|trans({}, translation_domain) -}}*/
/*                     {% else %}*/
/*                         {{- placeholder|trans({}, sonata_admin.field_description.translationDomain) -}}*/
/*                     {% endif%}*/
/*                 </option>*/
/*             {% endif %}*/
/*             {% if preferred_choices|length > 0 %}*/
/*                 {% set options = preferred_choices %}*/
/*                 {{ block('choice_widget_options') }}*/
/*                 {% if choices|length > 0 %}*/
/*                     <option disabled="disabled">{{ separator }}</option>*/
/*                 {% endif %}*/
/*             {% endif %}*/
/*             {% set options = choices %}*/
/*             {{ block('choice_widget_options') }}*/
/*         </select>*/
/*     {% endif %}*/
/* {% endspaceless %}*/
/* {% endblock choice_widget_collapsed %}*/
/* */
/* {% block date_widget %}*/
/* {% spaceless %}*/
/*     {% if widget == 'single_text' %}*/
/*         {{ block('form_widget_simple') }}*/
/*     {% else %}*/
/*         {% if row is not defined or row == true %}*/
/*             {% set attr = attr|merge({'class': attr.class|default('') ~ ' row' }) %}*/
/*         {% endif %}*/
/*         {% set input_wrapper_class = input_wrapper_class|default('col-sm-4') %}*/
/*         <div {{ block('widget_container_attributes') }}>*/
/*             {{ date_pattern|replace({*/
/*                 '{{ year }}':  '<div class="'~ input_wrapper_class ~ '">' ~ form_widget(form.year) ~ '</div>',*/
/*                 '{{ month }}': '<div class="'~ input_wrapper_class ~ '">' ~ form_widget(form.month) ~ '</div>',*/
/*                 '{{ day }}':   '<div class="'~ input_wrapper_class ~ '">' ~ form_widget(form.day) ~ '</div>',*/
/*             })|raw }}*/
/*         </div>*/
/*     {% endif %}*/
/* {% endspaceless %}*/
/* {% endblock date_widget %}*/
/* */
/* {% block time_widget %}*/
/* {% spaceless %}*/
/*     {% if widget == 'single_text' %}*/
/*         {{ block('form_widget_simple') }}*/
/*     {% else %}*/
/*         {% if row is not defined or row == true %}*/
/*             {% set attr = attr|merge({'class': attr.class|default('') ~ ' row' }) %}*/
/*         {% endif %}*/
/*         {% set input_wrapper_class = input_wrapper_class|default('col-sm-6') %}*/
/*         <div {{ block('widget_container_attributes') }}>*/
/*             <div class="{{ input_wrapper_class }}">*/
/*                 {{ form_widget(form.hour) }}*/
/*             </div>*/
/*             {% if with_minutes %}*/
/*                 <div class="{{ input_wrapper_class }}">*/
/*                     {{ form_widget(form.minute) }}*/
/*                 </div>*/
/*             {% endif %}*/
/*             {% if with_seconds %}*/
/*                 <div class="{{ input_wrapper_class }}">*/
/*                     {{ form_widget(form.second) }}*/
/*                 </div>*/
/*             {% endif %}*/
/*         </div>*/
/*     {% endif %}*/
/* {% endspaceless %}*/
/* {% endblock time_widget %}*/
/* */
/* {% block datetime_widget %}*/
/* {% spaceless %}*/
/*     {% if widget == 'single_text' %}*/
/*         {{ block('form_widget_simple') }}*/
/*     {% else %}*/
/*         {% set attr = attr|merge({'class': attr.class|default('') ~ ' row' }) %}*/
/*         <div {{ block('widget_container_attributes') }}>*/
/*             {{ form_errors(form.date) }}*/
/*             {{ form_errors(form.time) }}*/
/*             {{ form_widget(form.date, {'row': false, 'input_wrapper_class': 'col-sm-2'}) }}*/
/*             {{ form_widget(form.time, {'row': false, 'input_wrapper_class': 'col-sm-2'}) }}*/
/*         </div>*/
/*     {% endif %}*/
/* {% endspaceless %}*/
/* {% endblock datetime_widget %}*/
/* */
/* {% block form_row %}*/
/*     <div class="form-group{% if errors|length > 0 %} has-error{% endif %}" id="sonata-ba-field-container-{{ id }}">*/
/*         {% if sonata_admin.field_description.options is defined %}*/
/*             {% set label = sonata_admin.field_description.options.name|default(label)  %}*/
/*         {% endif %}*/
/* */
/*         {% set div_class = 'sonata-ba-field' %}*/
/* */
/*         {% if label is same as(false) %}*/
/*             {% set div_class = div_class ~ ' sonata-collection-row-without-label' %}*/
/*         {% endif %}*/
/* */
/*         {% if sonata_admin is defined and sonata_admin.options['form_type'] == 'horizontal' %}*/
/*             {% if label is same as(false) %}*/
/*                 {% if 'collection' in form.parent.vars.block_prefixes %}*/
/*                     {% set div_class = div_class ~ ' col-sm-12' %}*/
/*                 {% else %}*/
/*                     {% set div_class = div_class ~ ' col-sm-9 col-sm-offset-3' %}*/
/*                 {% endif %}*/
/*             {% else %}*/
/*                 {% set div_class = div_class ~ ' col-sm-9' %}*/
/*             {% endif %}*/
/*         {% endif %}*/
/* */
/*         {{ form_label(form, label|default(null)) }}*/
/* */
/*         {% if sonata_admin is defined and sonata_admin_enabled %}*/
/*             {% set div_class = div_class ~ ' sonata-ba-field-' ~ sonata_admin.edit ~ '-' ~ sonata_admin.inline %}*/
/*         {% endif %}*/
/* */
/*         {% if errors|length > 0 %}*/
/*             {% set div_class = div_class ~ ' sonata-ba-field-error' %}*/
/*         {% endif %}*/
/* */
/*         <div class="{{ div_class }}">*/
/*             {{ form_widget(form, {'horizontal': false, 'horizontal_input_wrapper_class': ''}) }} {# {'horizontal': false, 'horizontal_input_wrapper_class': ''} needed to avoid MopaBootstrapBundle messing with the DOM #}*/
/* */
/*             {% if errors|length > 0 %}*/
/*                 <div class="help-block sonata-ba-field-error-messages">*/
/*                     {{ form_errors(form) }}*/
/*                 </div>*/
/*             {% endif %}*/
/* */
/*             {% if sonata_admin is defined and sonata_admin_enabled and sonata_admin.field_description.help|default(false) %}*/
/*                 <span class="help-block sonata-ba-field-help">{{ sonata_admin.admin.trans(sonata_admin.field_description.help, {}, sonata_admin.field_description.translationDomain)|raw }}</span>*/
/*             {% endif %}*/
/*         </div>*/
/*     </div>*/
/* {% endblock form_row %}*/
/* */
/* {% block sonata_type_native_collection_widget_row %}*/
/* {% spaceless %}*/
/*     <div class="sonata-collection-row">*/
/*         {% if allow_delete %}*/
/*             <div class="row">*/
/*                 <div class="col-xs-1">*/
/*                     <a href="#" class="btn btn-link sonata-collection-delete">*/
/*                         <i class="fa fa-minus-circle"></i>*/
/*                     </a>*/
/*                 </div>*/
/*                 <div class="col-xs-11">*/
/*         {% endif %}*/
/*             {{ form_row(child, { label: false }) }}*/
/*         {% if allow_delete %}*/
/*                 </div>*/
/*             </div>*/
/*         {% endif %}*/
/*     </div>*/
/* {% endspaceless %}*/
/* {% endblock sonata_type_native_collection_widget_row %}*/
/* */
/* {% block sonata_type_native_collection_widget %}*/
/* {% spaceless %}*/
/*     {% if prototype is defined %}*/
/*         {% set child = prototype %}*/
/*         {% set allow_delete_backup = allow_delete %}*/
/*         {% set allow_delete = true %}*/
/*         {% set attr = attr|merge({'data-prototype': block('sonata_type_native_collection_widget_row'), 'data-prototype-name': prototype.vars.name, 'class': attr.class|default('') }) %}*/
/*         {% set allow_delete = allow_delete_backup %}*/
/*     {% endif %}*/
/*     <div {{ block('widget_container_attributes') }}>*/
/*         {{ form_errors(form) }}*/
/*         {% for child in form %}*/
/*             {{ block('sonata_type_native_collection_widget_row') }}*/
/*         {% endfor %}*/
/*         {{ form_rest(form) }}*/
/*         {% if allow_add %}*/
/*             <div><a href="#" class="btn btn-link sonata-collection-add"><i class="fa fa-plus-circle"></i></a></div>*/
/*         {% endif %}*/
/*     </div>*/
/* {% endspaceless %}*/
/* {% endblock sonata_type_native_collection_widget %}*/
/* */
/* {% block sonata_type_immutable_array_widget %}*/
/*     {% spaceless %}*/
/*         <div {{ block('widget_container_attributes') }}>*/
/*             {{ form_errors(form) }}*/
/* */
/*             {% for key, child in form %}*/
/*                 {{ block('sonata_type_immutable_array_widget_row') }}*/
/*             {% endfor %}*/
/* */
/*             {{ form_rest(form) }}*/
/*         </div>*/
/*     {% endspaceless %}*/
/* {% endblock sonata_type_immutable_array_widget %}*/
/* */
/* {% block sonata_type_immutable_array_widget_row %}*/
/*     {% spaceless %}*/
/*         <div class="form-group{% if child.vars.errors|length > 0%} error{%endif%}" id="sonata-ba-field-container-{{ id }}-{{ key }}">*/
/* */
/*             {{ form_label(child) }}*/
/* */
/*             {% set div_class = "" %}*/
/*             {% if sonata_admin.options['form_type'] == 'horizontal' %}*/
/*                 {% set div_class = 'col-sm-9' %}*/
/*             {% endif%}*/
/* */
/*             <div class="{{ div_class }} sonata-ba-field sonata-ba-field-{{ sonata_admin.edit }}-{{ sonata_admin.inline }} {% if child.vars.errors|length > 0 %}sonata-ba-field-error{% endif %}">*/
/*                 {{ form_widget(child, {'horizontal': false, 'horizontal_input_wrapper_class': ''}) }} {# {'horizontal': false, 'horizontal_input_wrapper_class': ''} needed to avoid MopaBootstrapBundle messing with the DOM #}*/
/*             </div>*/
/* */
/*             {% if child.vars.errors|length > 0 %}*/
/*                 <div class="help-block sonata-ba-field-error-messages">*/
/*                     {{ form_errors(child) }}*/
/*                 </div>*/
/*             {% endif %}*/
/*         </div>*/
/*     {% endspaceless %}*/
/* {% endblock %}*/
/* */
/* {% block sonata_type_model_autocomplete_widget %}*/
/*     {% include template %}*/
/* {% endblock sonata_type_model_autocomplete_widget %}*/
/* */
/* {% block sonata_type_choice_field_mask_widget %}*/
/*     {{ block('choice_widget') }}*/
/*     {% set main_form_name = id|slice(0, id|length - name|length) %}*/
/*     <script>*/
/*         jQuery(document).ready(function() {*/
/*             var allFields = {{ all_fields|json_encode|raw }};*/
/*             var map = {{ map|json_encode|raw }};*/
/* */
/*             showMaskChoiceEl = jQuery('#{{ main_form_name }}{{ name }}');*/
/* */
/*             showMaskChoiceEl.on('change', function () {*/
/*                 choice_field_mask_show(jQuery(this).val());*/
/*             });*/
/* */
/*             function choice_field_mask_show(val)*/
/*             {*/
/*                 var controlGroupIdFunc = function (field) {*/
/*                     return '#sonata-ba-field-container-{{ main_form_name }}' + field;*/
/* */
/*                 };*/
/*                 if (map[val] == undefined) {*/
/*                     jQuery.each(allFields, function (i, field) {*/
/*                         jQuery(controlGroupIdFunc(field)).hide();*/
/*                     });*/
/*                     return;*/
/*                 }*/
/* */
/*                 jQuery.each(allFields, function (i, field) {*/
/*                     jQuery(controlGroupIdFunc(field)).hide();*/
/*                 });*/
/*                 jQuery.each(map[val], function (i, field) {*/
/*                     jQuery(controlGroupIdFunc(field)).show();*/
/*                 });*/
/*             }*/
/*             choice_field_mask_show(showMaskChoiceEl.val());*/
/*         });*/
/* */
/*     </script>*/
/* {% endblock %}*/
/* */
/* {%  block sonata_type_choice_multiple_sortable %}*/
/*     <input type="hidden" name="{{ full_name }}" id="{{ id }}" value="{{ value|join(',') }}" />*/
/* */
/*     <script>*/
/*         jQuery(document).ready(function() {*/
/*             Admin.setup_sortable_select2(jQuery('#{{ id }}'), {{ form.vars.choices|json_encode|raw }});*/
/*         });*/
/*     </script>*/
/* {% endblock %}*/
/* */
