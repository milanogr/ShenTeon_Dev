<?php

/* @GdrMeteo/Default/moon.html.twig */
class __TwigTemplate_8189770b84518a562e2cd2611fbeb16d859fb0ceecc87409e0e87176a1fb3c8c extends Twig_Template
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
        echo "<li class=\"meteo moon\">
    <img src=\"";
        // line 2
        echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("meteo") . $this->getAttribute((isset($context["moon"]) ? $context["moon"] : null), "imageName", array())), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["moon"]) ? $context["moon"] : null), "name", array()), "html", null, true);
        echo "\" class=\"gdrtooltip\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["moon"]) ? $context["moon"] : null), "name", array()), "html", null, true);
        echo "\">
</li>";
    }

    public function getTemplateName()
    {
        return "@GdrMeteo/Default/moon.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }
}
/* <li class="meteo moon">*/
/*     <img src="{{ uploadPath('meteo') ~ moon.imageName }}" alt="{{ moon.name }}" class="gdrtooltip" title="{{ moon.name }}">*/
/* </li>*/
