<?php

/* @GdrGame/Anagrafe/letters.html.twig */
class __TwigTemplate_346a1c44eba506673820704a16f3184ffef2ee6c717cc1bd6cfaf7c483e67443 extends Twig_Template
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
        echo "<ul class=\"letters\">
    ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range("a", "z"));
        foreach ($context['_seq'] as $context["_key"] => $context["letter"]) {
            // line 3
            echo "        ";
            $context["class"] = "";
            // line 4
            echo "        ";
            if ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "byLetter", array(), "any", true, true)) {
                // line 5
                echo "            ";
                if ((twig_upper_filter($this->env, $context["letter"]) == $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "byLetter", array()))) {
                    // line 6
                    echo "                ";
                    $context["class"] = "active";
                    // line 7
                    echo "            ";
                }
                // line 8
                echo "        ";
            }
            // line 9
            echo "        <li>
            <a class=\"gdrtooltip ";
            // line 10
            echo twig_escape_filter($this->env, (isset($context["class"]) ? $context["class"] : null), "html", null, true);
            echo "\" title=\"Filtra per la lettera '";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $context["letter"]), "html", null, true);
            echo "'\"
               href=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), array("byLetter" => twig_upper_filter($this->env, $context["letter"]))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $context["letter"]), "html", null, true);
            echo "</a>
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['letter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "@GdrGame/Anagrafe/letters.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 14,  53 => 11,  47 => 10,  44 => 9,  41 => 8,  38 => 7,  35 => 6,  32 => 5,  29 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
/* <ul class="letters">*/
/*     {% for letter in 'a'..'z' %}*/
/*         {% set class="" %}*/
/*         {% if filter.byLetter is defined %}*/
/*             {% if letter|upper == filter.byLetter %}*/
/*                 {% set class="active" %}*/
/*             {% endif %}*/
/*         {% endif %}*/
/*         <li>*/
/*             <a class="gdrtooltip {{ class }}" title="Filtra per la lettera '{{ letter|upper }}'"*/
/*                href="{{ path(route, {byLetter: letter|upper}) }}">{{ letter|upper }}</a>*/
/*         </li>*/
/*     {% endfor %}*/
/* </ul>*/
