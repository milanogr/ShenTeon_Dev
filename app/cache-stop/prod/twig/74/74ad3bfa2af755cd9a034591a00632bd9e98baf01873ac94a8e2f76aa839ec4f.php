<?php

/* GdrGameBundle:Location:popupDescriptionAction.html.twig */
class __TwigTemplate_8ce3eb621d887ce74dde8175c3f9117bf67543e5d33e5e41e50e62572bdd3358 extends Twig_Template
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
        if ($this->getAttribute((isset($context["location"]) ? $context["location"] : null), "descriptionMap", array())) {
            // line 2
            echo "    ";
            echo $this->getAttribute((isset($context["location"]) ? $context["location"] : null), "descriptionMap", array());
            echo "
";
        } else {
            // line 4
            echo "    <p>Non c'è ancora nessuna descrizione per ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["location"]) ? $context["location"] : null), "name", array()), "html", null, true);
            echo "!</p>
";
        }
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Location:popupDescriptionAction.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 4,  21 => 2,  19 => 1,);
    }
}
/* {% if location.descriptionMap %}*/
/*     {{ location.descriptionMap|raw }}*/
/* {% else %}*/
/*     <p>Non c'è ancora nessuna descrizione per {{ location.name }}!</p>*/
/* {% endif %}*/
