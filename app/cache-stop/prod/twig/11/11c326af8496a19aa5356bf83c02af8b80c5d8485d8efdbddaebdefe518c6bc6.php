<?php

/* GdrGameBundle:Erario:filter.html.twig */
class __TwigTemplate_5b17be7c7cb0c416220a5b849c32ce201f6342ed9af9ca48efe8cc3b669188a9 extends Twig_Template
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
        // line 1
        echo "<div class=\"erario-filter\">

    ";
        // line 3
        if (((isset($context["position"]) ? $context["position"] : null) == "bottom")) {
            // line 4
            echo "        <hr>
    ";
        }
        // line 6
        echo "
    ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["types"]) ? $context["types"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["type"]) {
            // line 8
            echo "
        ";
            // line 9
            if (((isset($context["currentType"]) ? $context["currentType"] : null) == $context["key"])) {
                // line 10
                echo "            ";
                $context["class"] = "class=\"active\"";
                // line 11
                echo "        ";
            } else {
                // line 12
                echo "            ";
                $context["class"] = "";
                // line 13
                echo "        ";
            }
            // line 14
            echo "
        <a ";
            // line 15
            echo (isset($context["class"]) ? $context["class"] : null);
            echo " href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("erario-index", array("type" => $context["key"])), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["types"]) ? $context["types"] : null), $context["key"], array(), "array"), "html", null, true);
            echo "</a>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "
    ";
        // line 18
        if (((isset($context["position"]) ? $context["position"] : null) == "top")) {
            // line 19
            echo "        <hr>
    ";
        }
        // line 21
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Erario:filter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 21,  73 => 19,  71 => 18,  68 => 17,  56 => 15,  53 => 14,  50 => 13,  47 => 12,  44 => 11,  41 => 10,  39 => 9,  36 => 8,  32 => 7,  29 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }
}
/* <div class="erario-filter">*/
/* */
/*     {% if position == 'bottom' %}*/
/*         <hr>*/
/*     {% endif %}*/
/* */
/*     {% for key, type in types %}*/
/* */
/*         {% if currentType == key %}*/
/*             {% set class = 'class="active"' %}*/
/*         {% else %}*/
/*             {% set class = '' %}*/
/*         {% endif %}*/
/* */
/*         <a {{ class|raw }} href="{{ path('erario-index', {type: key}) }}">{{ types[key] }}</a>*/
/*     {% endfor %}*/
/* */
/*     {% if position == 'top' %}*/
/*         <hr>*/
/*     {% endif %}*/
/* </div>*/
