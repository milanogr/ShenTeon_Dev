<?php

/* SonataAdminBundle:CRUD:base_edit_form_macro.html.twig */
class __TwigTemplate_f6edfbc9cf5068c0f0037d471c4751fc67cb3c0661855c23d3db260f6dd966c7 extends Twig_Template
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
        $__internal_67bdb94c11dc4304840dd51b2b544cc10184f97d925a2d84d6022e04cf3f580a = $this->env->getExtension("native_profiler");
        $__internal_67bdb94c11dc4304840dd51b2b544cc10184f97d925a2d84d6022e04cf3f580a->enter($__internal_67bdb94c11dc4304840dd51b2b544cc10184f97d925a2d84d6022e04cf3f580a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:base_edit_form_macro.html.twig"));

        
        $__internal_67bdb94c11dc4304840dd51b2b544cc10184f97d925a2d84d6022e04cf3f580a->leave($__internal_67bdb94c11dc4304840dd51b2b544cc10184f97d925a2d84d6022e04cf3f580a_prof);

    }

    // line 1
    public function getrender_groups($__admin__ = null, $__form__ = null, $__groups__ = null, $__has_tab__ = null, $__no_padding__ = false, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "admin" => $__admin__,
            "form" => $__form__,
            "groups" => $__groups__,
            "has_tab" => $__has_tab__,
            "no_padding" => $__no_padding__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            $__internal_0006ed718855fd8aa5d02254f3a52c9a30d46d809238413c5cac3532e4fc28c6 = $this->env->getExtension("native_profiler");
            $__internal_0006ed718855fd8aa5d02254f3a52c9a30d46d809238413c5cac3532e4fc28c6->enter($__internal_0006ed718855fd8aa5d02254f3a52c9a30d46d809238413c5cac3532e4fc28c6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "render_groups"));

            // line 2
            echo "    ";
            if ((isset($context["has_tab"]) ? $context["has_tab"] : $this->getContext($context, "has_tab"))) {
                echo "<div class=\"row\">";
            }
            // line 3
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : $this->getContext($context, "groups")));
            foreach ($context['_seq'] as $context["_key"] => $context["code"]) {
                // line 4
                echo "        ";
                $context["form_group"] = $this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "formgroups", array()), $context["code"], array(), "array");
                // line 5
                echo "        <div class=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form_group"]) ? $context["form_group"] : $this->getContext($context, "form_group")), "class", array()), "html", null, true);
                echo " ";
                echo (((isset($context["no_padding"]) ? $context["no_padding"] : $this->getContext($context, "no_padding"))) ? ("nopadding") : (""));
                echo "\">
            <div class=\"";
                // line 6
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form_group"]) ? $context["form_group"] : $this->getContext($context, "form_group")), "box_class", array()), "html", null, true);
                echo "\">
                <div class=\"box-header\">
                    <h4 class=\"box-title\">
                        ";
                // line 9
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "trans", array(0 => $this->getAttribute((isset($context["form_group"]) ? $context["form_group"] : $this->getContext($context, "form_group")), "name", array()), 1 => array(), 2 => $this->getAttribute((isset($context["form_group"]) ? $context["form_group"] : $this->getContext($context, "form_group")), "translation_domain", array())), "method"), "html", null, true);
                echo "
                    </h4>
                </div>
                ";
                // line 13
                echo "                <div class=\"box-body\">
                    <div class=\"sonata-ba-collapsed-fields\">
                        ";
                // line 15
                if (($this->getAttribute((isset($context["form_group"]) ? $context["form_group"] : $this->getContext($context, "form_group")), "description", array()) != false)) {
                    // line 16
                    echo "                            <p>";
                    echo $this->getAttribute((isset($context["form_group"]) ? $context["form_group"] : $this->getContext($context, "form_group")), "description", array());
                    echo "</p>
                        ";
                }
                // line 18
                echo "
                        ";
                // line 19
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form_group"]) ? $context["form_group"] : $this->getContext($context, "form_group")), "fields", array()));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["field_name"]) {
                    // line 20
                    echo "                            ";
                    if ($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "formfielddescriptions", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                        // line 21
                        echo "                                ";
                        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), $context["field_name"], array(), "array"), "vars", array()), "sonata_admin", array()), "field_description", array()), "type", array()) == "sonata_type_admin")) {
                            // line 22
                            echo "                                    ";
                            $context["inline_admin"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), $context["field_name"], array(), "array"), "vars", array()), "sonata_admin", array()), "field_description", array()), "associationAdmin", array());
                            // line 23
                            echo "                                    ";
                            $context["inline_form"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), $context["field_name"], array(), "array"), "vars", array()), "form", array());
                            // line 24
                            echo "                                    ";
                            $context["inline_groups"] = array();
                            // line 25
                            echo "                                    ";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["inline_admin"]) ? $context["inline_admin"] : $this->getContext($context, "inline_admin")), "formtabs", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["formtab"]) {
                                // line 26
                                echo "                                    ";
                                $context["inline_groups"] = twig_array_merge((isset($context["inline_groups"]) ? $context["inline_groups"] : $this->getContext($context, "inline_groups")), $this->getAttribute($context["formtab"], "groups", array()));
                                // line 27
                                echo "                                    ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['formtab'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 28
                            echo "                                    ";
                            echo $this->getAttribute($this, "render_groups", array(0 => (isset($context["inline_admin"]) ? $context["inline_admin"] : $this->getContext($context, "inline_admin")), 1 => (isset($context["inline_form"]) ? $context["inline_form"] : $this->getContext($context, "inline_form")), 2 => (isset($context["inline_groups"]) ? $context["inline_groups"] : $this->getContext($context, "inline_groups")), 3 => true, 4 => true), "method");
                            echo "
                                ";
                        } else {
                            // line 30
                            echo "                                    ";
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), $context["field_name"], array(), "array"), 'row');
                            echo "
                                ";
                        }
                        // line 32
                        echo "                            ";
                    }
                    // line 33
                    echo "                        ";
                    $context['_iterated'] = true;
                }
                if (!$context['_iterated']) {
                    // line 34
                    echo "                            <em>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("message_form_group_empty", array(), "SonataAdminBundle"), "html", null, true);
                    echo "</em>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_name'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 36
                echo "                    </div>
                </div>
                ";
                // line 39
                echo "            </div>
        </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['code'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "    ";
            if ((isset($context["has_tab"]) ? $context["has_tab"] : $this->getContext($context, "has_tab"))) {
                echo "</div>";
            }
            
            $__internal_0006ed718855fd8aa5d02254f3a52c9a30d46d809238413c5cac3532e4fc28c6->leave($__internal_0006ed718855fd8aa5d02254f3a52c9a30d46d809238413c5cac3532e4fc28c6_prof);

        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:base_edit_form_macro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 42,  160 => 39,  156 => 36,  147 => 34,  142 => 33,  139 => 32,  133 => 30,  127 => 28,  121 => 27,  118 => 26,  113 => 25,  110 => 24,  107 => 23,  104 => 22,  101 => 21,  98 => 20,  93 => 19,  90 => 18,  84 => 16,  82 => 15,  78 => 13,  72 => 9,  66 => 6,  59 => 5,  56 => 4,  51 => 3,  46 => 2,  27 => 1,);
    }
}
/* {% macro render_groups(admin, form, groups, has_tab, no_padding = false) %}*/
/*     {% if has_tab %}<div class="row">{% endif %}*/
/*     {% for code in groups %}*/
/*         {% set form_group = admin.formgroups[code] %}*/
/*         <div class="{{ form_group.class }} {{ no_padding ? "nopadding" }}">*/
/*             <div class="{{ form_group.box_class }}">*/
/*                 <div class="box-header">*/
/*                     <h4 class="box-title">*/
/*                         {{ admin.trans(form_group.name, {}, form_group.translation_domain) }}*/
/*                     </h4>*/
/*                 </div>*/
/*                 {#<div class="box{% if loop.first %} in{% endif %}" id="{{ admin.uniqid }}_{{ loop.index }}">#}*/
/*                 <div class="box-body">*/
/*                     <div class="sonata-ba-collapsed-fields">*/
/*                         {% if form_group.description != false %}*/
/*                             <p>{{ form_group.description|raw }}</p>*/
/*                         {% endif %}*/
/* */
/*                         {% for field_name in form_group.fields %}*/
/*                             {% if admin.formfielddescriptions[field_name] is defined %}*/
/*                                 {% if form[field_name].vars.sonata_admin.field_description.type == 'sonata_type_admin' %}*/
/*                                     {% set inline_admin = form[field_name].vars.sonata_admin.field_description.associationAdmin %}*/
/*                                     {% set inline_form = form[field_name].vars.form %}*/
/*                                     {% set inline_groups = [] %}*/
/*                                     {% for formtab in inline_admin.formtabs %}*/
/*                                     {% set inline_groups = inline_groups|merge(formtab.groups) %}*/
/*                                     {% endfor %}*/
/*                                     {{ _self.render_groups(inline_admin, inline_form, inline_groups, true, true) }}*/
/*                                 {% else %}*/
/*                                     {{ form_row(form[field_name])}}*/
/*                                 {% endif %}*/
/*                             {% endif %}*/
/*                         {% else %}*/
/*                             <em>{{ 'message_form_group_empty'|trans({}, 'SonataAdminBundle') }}</em>*/
/*                         {% endfor %}*/
/*                     </div>*/
/*                 </div>*/
/*                 {#</div>#}*/
/*             </div>*/
/*         </div>*/
/*     {% endfor %}*/
/*     {% if has_tab %}</div>{% endif %}*/
/* {% endmacro %}*/
/* */
