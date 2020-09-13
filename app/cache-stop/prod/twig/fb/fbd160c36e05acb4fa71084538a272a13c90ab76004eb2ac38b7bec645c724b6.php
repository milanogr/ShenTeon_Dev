<?php

/* GdrGameBundle:Market:filter.html.twig */
class __TwigTemplate_715efdf4dcc3f63b455502514d185f76bd00b12027f00783ae3c96e189727ee1 extends Twig_Template
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
        echo "<div class=\"market-filter\">

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
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 8
            echo "        ";
            if (($this->getAttribute($context["category"], "id", array()) == $this->getAttribute((isset($context["currentCategory"]) ? $context["currentCategory"] : null), "id", array()))) {
                // line 9
                echo "           ";
                $context["class"] = "class=\"active\"";
                // line 10
                echo "        ";
            } else {
                // line 11
                echo "            ";
                $context["class"] = "";
                // line 12
                echo "        ";
            }
            // line 13
            echo "
        <a ";
            // line 14
            echo (isset($context["class"]) ? $context["class"] : null);
            echo " href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("market-items", array("mercato" => $this->getAttribute((isset($context["market"]) ? $context["market"] : null), "id", array()), "categoria" => $this->getAttribute($context["category"], "id", array()), "livello" => (isset($context["level"]) ? $context["level"] : null))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "name", array()), "html", null, true);
            echo "</a>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Market:filter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 16,  54 => 14,  51 => 13,  48 => 12,  45 => 11,  42 => 10,  39 => 9,  36 => 8,  32 => 7,  29 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }
}
/* <div class="market-filter">*/
/* */
/*     {% if position == 'bottom' %}*/
/*         <hr>*/
/*     {% endif %}*/
/* */
/*     {% for category in categories %}*/
/*         {% if category.id == currentCategory.id %}*/
/*            {% set class = 'class="active"' %}*/
/*         {% else %}*/
/*             {% set class = '' %}*/
/*         {% endif %}*/
/* */
/*         <a {{ class|raw }} href="{{ path('market-items', {'mercato': market.id, 'categoria': category.id, 'livello': level}) }}">{{ category.name }}</a>*/
/*     {% endfor %}*/
/* </div>*/
