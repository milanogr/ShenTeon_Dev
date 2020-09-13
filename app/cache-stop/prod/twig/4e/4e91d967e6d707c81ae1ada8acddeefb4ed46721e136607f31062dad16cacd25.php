<?php

/* GdrGameBundle:Online:enteredAndLeaved.html.twig */
class __TwigTemplate_7a5a83914a407625878966f1555a763484b4760f472f8d057224298a24e26d2d extends Twig_Template
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
        echo "<div id=\"total-pg-online\">
    ";
        // line 2
        if (((isset($context["online"]) ? $context["online"] : null) == 1)) {
            // line 3
            echo "        <a href=\"";
            echo $this->env->getExtension('routing')->getPath("online-index");
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["online"]) ? $context["online"] : null), "html", null, true);
            echo " presente</a>
    ";
        } else {
            // line 5
            echo "        <a href=\"";
            echo $this->env->getExtension('routing')->getPath("online-index");
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["online"]) ? $context["online"] : null), "html", null, true);
            echo " presenti</a>
    ";
        }
        // line 7
        echo "</div>
<ul>
    ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["all"]) ? $context["all"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["personage"]) {
            // line 10
            echo "        ";
            if (($this->getAttribute($context["personage"], "gender", array()) == 1)) {
                // line 11
                echo "            ";
                $context["icon"] = $this->getAttribute($context["personage"], "raceMaleIcon", array());
                // line 12
                echo "        ";
            } else {
                // line 13
                echo "            ";
                $context["icon"] = $this->getAttribute($context["personage"], "raceFemaleIcon", array());
                // line 14
                echo "        ";
            }
            // line 15
            echo "
        ";
            // line 16
            if ((($this->getAttribute($context["personage"], "lastLogin", array()) >= (isset($context["time"]) ? $context["time"] : null)) && ($this->getAttribute($context["personage"], "lastLogin", array()) > $this->getAttribute($context["personage"], "lastLogout", array())))) {
                // line 17
                echo "            <li>
                <a href=\"";
                // line 18
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => $this->getAttribute($context["personage"], "name", array()))), "html", null, true);
                echo "\">
                    <img src=\"";
                // line 19
                echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . (isset($context["icon"]) ? $context["icon"] : null)), "html", null, true);
                echo "\" class=\"gdrtooltip\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["personage"], "raceName", array()), "html", null, true);
                echo "\">
                </a>
                <strong>";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute($context["personage"], "name", array()), "html", null, true);
                echo "</strong> è in giro...
            </li>
        ";
            } else {
                // line 24
                echo "            <li>
                <a href=\"";
                // line 25
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => $this->getAttribute($context["personage"], "name", array()))), "html", null, true);
                echo "\">
                    <img src=\"";
                // line 26
                echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . (isset($context["icon"]) ? $context["icon"] : null)), "html", null, true);
                echo "\" class=\"gdrtooltip\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["personage"], "raceName", array()), "html", null, true);
                echo "\">
                </a>
                ";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute($context["personage"], "name", array()), "html", null, true);
                echo " si allontana...
            </li>
        ";
            }
            // line 31
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['personage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Online:enteredAndLeaved.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 32,  108 => 31,  102 => 28,  95 => 26,  91 => 25,  88 => 24,  82 => 21,  75 => 19,  71 => 18,  68 => 17,  66 => 16,  63 => 15,  60 => 14,  57 => 13,  54 => 12,  51 => 11,  48 => 10,  44 => 9,  40 => 7,  32 => 5,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* <div id="total-pg-online">*/
/*     {% if online == 1 %}*/
/*         <a href="{{ path('online-index') }}">{{ online }} presente</a>*/
/*     {% else %}*/
/*         <a href="{{ path('online-index') }}">{{ online }} presenti</a>*/
/*     {% endif %}*/
/* </div>*/
/* <ul>*/
/*     {% for personage in all %}*/
/*         {% if personage.gender == 1 %}*/
/*             {% set icon = personage.raceMaleIcon %}*/
/*         {% else %}*/
/*             {% set icon = personage.raceFemaleIcon %}*/
/*         {% endif %}*/
/* */
/*         {% if personage.lastLogin >= time and personage.lastLogin > personage.lastLogout %}*/
/*             <li>*/
/*                 <a href="{{ path('avatar-index', {name: personage.name}) }}">*/
/*                     <img src="{{ uploadPath('race') ~ icon }}" class="gdrtooltip" title="{{ personage.raceName }}">*/
/*                 </a>*/
/*                 <strong>{{ personage.name }}</strong> è in giro...*/
/*             </li>*/
/*         {% else %}*/
/*             <li>*/
/*                 <a href="{{ path('avatar-index', {name: personage.name}) }}">*/
/*                     <img src="{{ uploadPath('race') ~ icon }}" class="gdrtooltip" title="{{ personage.raceName }}">*/
/*                 </a>*/
/*                 {{ personage.name }} si allontana...*/
/*             </li>*/
/*         {% endif %}*/
/*     {% endfor %}*/
/* </ul>*/
