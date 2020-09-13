<?php

/* @GdrGame/Default/araldo.html.twig */
class __TwigTemplate_888f0a2b28b4b4e9798bd285a58957832edde1c3aa1a612f443b3ec81ea95f47 extends Twig_Template
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
        if ((isset($context["isToRead"]) ? $context["isToRead"] : null)) {
            // line 2
            echo "    <a href=\"";
            echo $this->env->getExtension('routing')->getPath("bacheca-special", array("name" => "Araldo"));
            echo "\"
       title=\"Nuovi messaggi della Gestione!\"
       class=\"gdrtooltip no-square\"><img src=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/star-special-forum.png"), "html", null, true);
            echo "\"> Araldo <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/star-special-forum.png"), "html", null, true);
            echo "\"></a>
";
        } else {
            // line 6
            echo "    <a href=\"";
            echo $this->env->getExtension('routing')->getPath("bacheca-special", array("name" => "Araldo"));
            echo "\"
       title=\"Mostra i messaggi della Gestione\"
       class=\"gdrtooltip\">Araldo</a>
";
        }
    }

    public function getTemplateName()
    {
        return "@GdrGame/Default/araldo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 6,  27 => 4,  21 => 2,  19 => 1,);
    }
}
/* {% if isToRead %}*/
/*     <a href="{{ path('bacheca-special', {name: 'Araldo'}) }}"*/
/*        title="Nuovi messaggi della Gestione!"*/
/*        class="gdrtooltip no-square"><img src="{{ asset('bundles/gdrgame/images/star-special-forum.png') }}"> Araldo <img src="{{ asset('bundles/gdrgame/images/star-special-forum.png') }}"></a>*/
/* {% else %}*/
/*     <a href="{{ path('bacheca-special', {name: 'Araldo'}) }}"*/
/*        title="Mostra i messaggi della Gestione"*/
/*        class="gdrtooltip">Araldo</a>*/
/* {% endif %}*/
/* */
