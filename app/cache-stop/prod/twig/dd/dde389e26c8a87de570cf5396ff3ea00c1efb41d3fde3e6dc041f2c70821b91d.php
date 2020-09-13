<?php

/* GdrGameBundle:Letter:ajax.html.twig */
class __TwigTemplate_4b992026974a157951bd4a412197273508f833f196e3fd9bf107382ece9227c3 extends Twig_Template
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
        ob_start();
        // line 2
        echo "    ";
        $context["count"] = twig_length_filter($this->env, (isset($context["letters"]) ? $context["letters"] : null));
        // line 3
        echo "    ";
        if (((isset($context["count"]) ? $context["count"] : null) == 0)) {
            // line 4
            echo "        <a href=\"";
            echo $this->env->getExtension('routing')->getPath("missive-index");
            echo "\" data-sound=\"off\" title=\"Non ci sono nuove Missive\" class=\"gdrtooltip\">
            <img src=\"";
            // line 5
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/missive-vuote.png"), "html", null, true);
            echo "\">
        </a>

    ";
        } elseif ((        // line 8
(isset($context["count"]) ? $context["count"] : null) == 1)) {
            // line 9
            echo "        <a href=\"";
            echo $this->env->getExtension('routing')->getPath("missive-index");
            echo "\" data-sound=\"on\" title=\"C'è una nuova Missiva\" class=\"gdrtooltip\">
            <img src=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/missive-nuove.png"), "html", null, true);
            echo "\">
        </a>
    ";
        } else {
            // line 13
            echo "        <a href=\"";
            echo $this->env->getExtension('routing')->getPath("missive-index");
            echo "\" data-sound=\"on\" title=\"Ci sono ";
            echo twig_escape_filter($this->env, (isset($context["count"]) ? $context["count"] : null), "html", null, true);
            echo " nuove Missive\" class=\"gdrtooltip\">
            <img src=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/missive-nuove.png"), "html", null, true);
            echo "\">
        </a>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Letter:ajax.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 14,  51 => 13,  45 => 10,  40 => 9,  38 => 8,  32 => 5,  27 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% spaceless %}*/
/*     {% set count = letters|length %}*/
/*     {% if count == 0 %}*/
/*         <a href="{{ path('missive-index') }}" data-sound="off" title="Non ci sono nuove Missive" class="gdrtooltip">*/
/*             <img src="{{ asset('bundles/gdrgame/images/missive-vuote.png') }}">*/
/*         </a>*/
/* */
/*     {% elseif count == 1 %}*/
/*         <a href="{{ path('missive-index') }}" data-sound="on" title="C'è una nuova Missiva" class="gdrtooltip">*/
/*             <img src="{{ asset('bundles/gdrgame/images/missive-nuove.png') }}">*/
/*         </a>*/
/*     {% else %}*/
/*         <a href="{{ path('missive-index') }}" data-sound="on" title="Ci sono {{ count }} nuove Missive" class="gdrtooltip">*/
/*             <img src="{{ asset('bundles/gdrgame/images/missive-nuove.png') }}">*/
/*         </a>*/
/*     {% endif %}*/
/* {% endspaceless %}*/
