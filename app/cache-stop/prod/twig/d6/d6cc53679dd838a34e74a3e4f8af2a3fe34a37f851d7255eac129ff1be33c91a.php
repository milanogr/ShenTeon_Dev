<?php

/* GdrGameBundle:Manuale:show.html.twig */
class __TwigTemplate_8cc54e998393e6a4ade1568e2833baceb2c504edd3e86d983851dd757688484e extends Twig_Template
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
        echo $this->getAttribute((isset($context["manuale"]) ? $context["manuale"] : null), "body", array());
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Manuale:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* {{ manuale.body|raw }}*/
