<?php

/* @GdrGame/Default/strillone.html.twig */
class __TwigTemplate_3f7ee1e99700a598e3311790ccc006c743e4461d68dbcd018ee3728394a4dc83 extends Twig_Template
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
            echo $this->env->getExtension('routing')->getPath("bacheca-special", array("name" => "Strillone"));
            echo "\"
       title=\"Nuovi messaggi dallo Strillone!\"
       class=\"gdrtooltip no-square\"><img src=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/star-special-forum.png"), "html", null, true);
            echo "\"> Strillone <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/star-special-forum.png"), "html", null, true);
            echo "\"></a>
";
        } else {
            // line 6
            echo "    <a href=\"";
            echo $this->env->getExtension('routing')->getPath("bacheca-special", array("name" => "Strillone"));
            echo "\"
       title=\"Mostra i messaggi dello Strillone\"
       class=\"gdrtooltip\">Strillone</a>
";
        }
    }

    public function getTemplateName()
    {
        return "@GdrGame/Default/strillone.html.twig";
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
/*     <a href="{{ path('bacheca-special', {name: 'Strillone'}) }}"*/
/*        title="Nuovi messaggi dallo Strillone!"*/
/*        class="gdrtooltip no-square"><img src="{{ asset('bundles/gdrgame/images/star-special-forum.png') }}"> Strillone <img src="{{ asset('bundles/gdrgame/images/star-special-forum.png') }}"></a>*/
/* {% else %}*/
/*     <a href="{{ path('bacheca-special', {name: 'Strillone'}) }}"*/
/*        title="Mostra i messaggi dello Strillone"*/
/*        class="gdrtooltip">Strillone</a>*/
/* {% endif %}*/
/* */
