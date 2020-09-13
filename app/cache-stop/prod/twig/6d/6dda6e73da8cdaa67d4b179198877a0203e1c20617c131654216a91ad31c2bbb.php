<?php

/* GdrGameBundle:Location:popup.html.twig */
class __TwigTemplate_4dadff40d9d21d53407ac4c1e2a921f27056285a5db43ec28cdb7b05958c3364 extends Twig_Template
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
        if ($this->getAttribute((isset($context["location"]) ? $context["location"] : null), "description", array())) {
            // line 2
            echo "    ";
            echo $this->getAttribute((isset($context["location"]) ? $context["location"] : null), "description", array());
            echo "
";
        } else {
            // line 4
            echo "    Non c'è ancora nessuna descrizione per ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["location"]) ? $context["location"] : null), "name", array()), "html", null, true);
            echo "!
";
        }
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Location:popup.html.twig";
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
/* {% if location.description %}*/
/*     {{ location.description|raw }}*/
/* {% else %}*/
/*     Non c'è ancora nessuna descrizione per {{ location.name }}!*/
/* {% endif %}*/
