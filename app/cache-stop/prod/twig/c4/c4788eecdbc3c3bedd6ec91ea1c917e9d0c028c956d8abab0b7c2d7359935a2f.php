<?php

/* GdrGameBundle:Chat:chat.html.twig */
class __TwigTemplate_0e266a29ea3975b752d36002884358498ca585c2ef0e733be08712ce1bb321da extends Twig_Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["chats"]) ? $context["chats"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["chat"]) {
            // line 2
            echo "    ";
            $context["isCastI"] = ($this->getAttribute($context["chat"], "special", array()) == "cast-1");
            // line 3
            echo "    ";
            $context["isCastII"] = ($this->getAttribute($context["chat"], "special", array()) == "cast-2");
            // line 4
            echo "
    ";
            // line 6
            echo "    ";
            if (($this->getAttribute($context["chat"], "special", array()) == "soul")) {
                // line 7
                echo "       ";
                echo twig_include($this->env, $context, "GdrGameBundle:Chat/Type:_soul.html.twig");
                echo "
    ";
            }
            // line 9
            echo "
    ";
            // line 11
            echo "    ";
            if (($this->getAttribute($context["chat"], "type", array()) == 1)) {
                // line 12
                echo "
        ";
                // line 13
                echo twig_include($this->env, $context, "GdrGameBundle:Chat/Type:_normal.html.twig");
                echo "

    ";
            }
            // line 16
            echo "
    ";
            // line 18
            echo "    ";
            if (($this->getAttribute($context["chat"], "type", array()) == 2)) {
                // line 19
                echo "        ";
                echo twig_include($this->env, $context, "GdrGameBundle:Chat/Type:_action.html.twig");
                echo "
    ";
            }
            // line 21
            echo "
    ";
            // line 23
            echo "    ";
            if (($this->getAttribute($context["chat"], "type", array()) == 3)) {
                // line 24
                echo "
        ";
                // line 25
                echo twig_include($this->env, $context, "GdrGameBundle:Chat/Type:_whisp.html.twig");
                echo "

    ";
            }
            // line 28
            echo "
    ";
            // line 30
            echo "    ";
            if (($this->getAttribute($context["chat"], "type", array()) == 4)) {
                // line 31
                echo "
        ";
                // line 32
                echo twig_include($this->env, $context, "GdrGameBundle:Chat/Type:_system.html.twig");
                echo "

    ";
            }
            // line 35
            echo "
    ";
            // line 37
            echo "    ";
            if (($this->getAttribute($context["chat"], "type", array()) == 5)) {
                // line 38
                echo "
        ";
                // line 39
                $this->loadTemplate("GdrGameBundle:Chat/Type:_meteo.html.twig", "GdrGameBundle:Chat:chat.html.twig", 39)->display($context);
                // line 40
                echo "
    ";
            }
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['chat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Chat:chat.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 40,  120 => 39,  117 => 38,  114 => 37,  111 => 35,  105 => 32,  102 => 31,  99 => 30,  96 => 28,  90 => 25,  87 => 24,  84 => 23,  81 => 21,  75 => 19,  72 => 18,  69 => 16,  63 => 13,  60 => 12,  57 => 11,  54 => 9,  48 => 7,  45 => 6,  42 => 4,  39 => 3,  36 => 2,  19 => 1,);
    }
}
/* {% for chat in chats %}*/
/*     {% set isCastI = chat.special == "cast-1" %}*/
/*     {% set isCastII = chat.special == "cast-2" %}*/
/* */
/*     {# Anima #}*/
/*     {% if chat.special == 'soul' %}*/
/*        {{  include('GdrGameBundle:Chat/Type:_soul.html.twig') }}*/
/*     {% endif %}*/
/* */
/*     {# Chat normale #}*/
/*     {% if chat.type == 1 %}*/
/* */
/*         {{  include('GdrGameBundle:Chat/Type:_normal.html.twig') }}*/
/* */
/*     {% endif %}*/
/* */
/*     {# Chat Azione #}*/
/*     {% if chat.type == 2 %}*/
/*         {{  include('GdrGameBundle:Chat/Type:_action.html.twig') }}*/
/*     {% endif %}*/
/* */
/*     {# Chat Sussurro #}*/
/*     {% if chat.type == 3 %}*/
/* */
/*         {{  include('GdrGameBundle:Chat/Type:_whisp.html.twig') }}*/
/* */
/*     {% endif %}*/
/* */
/*     {# Chat System Passaggio Mori, Oggetti, Dado #}*/
/*     {% if chat.type == 4 %}*/
/* */
/*         {{  include('GdrGameBundle:Chat/Type:_system.html.twig') }}*/
/* */
/*     {% endif %}*/
/* */
/*     {# Meteo #}*/
/*     {% if chat.type == 5 %}*/
/* */
/*         {% include 'GdrGameBundle:Chat/Type:_meteo.html.twig' %}*/
/* */
/*     {% endif %}*/
/* {% endfor %}*/
