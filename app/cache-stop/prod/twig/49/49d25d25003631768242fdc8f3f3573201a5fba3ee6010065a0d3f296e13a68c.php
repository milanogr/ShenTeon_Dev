<?php

/* @GdrMeteo/Default/meteo.html.twig */
class __TwigTemplate_0dd269c885eaea4fa153cf2a49e301f3ba2ee521073dd3a736ae84ee1f743866 extends Twig_Template
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
        if ((isset($context["isDay"]) ? $context["isDay"] : null)) {
            // line 2
            echo "    ";
            $context["img"] = $this->env->getExtension('vich_uploader')->asset($this->getAttribute((isset($context["meteo"]) ? $context["meteo"] : null), "condition", array()), "image");
        } else {
            // line 4
            echo "    ";
            $context["img"] = $this->env->getExtension('vich_uploader')->asset($this->getAttribute((isset($context["meteo"]) ? $context["meteo"] : null), "condition", array()), "imageNight");
        }
        // line 6
        echo "
<span id=\"meteo-ajax\">
    <li class=\"meteo status\">
        <img src=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["img"]) ? $context["img"] : null), "html", null, true);
        echo "\" class=\"gdrtooltip\"
             title=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["meteo"]) ? $context["meteo"] : null), "condition", array()), "name", array()), "html", null, true);
        echo " | ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["meteo"]) ? $context["meteo"] : null), "temp", array()), "html", null, true);
        echo "°\">
    </li>
    <li class=\"meteo wind\">
        <img src=\"";
        // line 13
        echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("meteo") . $this->getAttribute($this->getAttribute((isset($context["meteo"]) ? $context["meteo"] : null), "wind", array()), "imageName", array())), "html", null, true);
        echo "\" class=\"gdrtooltip\"
             title=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["meteo"]) ? $context["meteo"] : null), "wind", array()), "name", array()), "html", null, true);
        echo "\">
    </li>
</span>";
    }

    public function getTemplateName()
    {
        return "@GdrMeteo/Default/meteo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 14,  46 => 13,  38 => 10,  34 => 9,  29 => 6,  25 => 4,  21 => 2,  19 => 1,);
    }
}
/* {% if isDay %}*/
/*     {% set img = vich_uploader_asset(meteo.condition, 'image') %}*/
/* {% else %}*/
/*     {% set img =vich_uploader_asset(meteo.condition, 'imageNight') %}*/
/* {% endif %}*/
/* */
/* <span id="meteo-ajax">*/
/*     <li class="meteo status">*/
/*         <img src="{{ img }}" class="gdrtooltip"*/
/*              title="{{ meteo.condition.name }} | {{ meteo.temp }}°">*/
/*     </li>*/
/*     <li class="meteo wind">*/
/*         <img src="{{ uploadPath('meteo') ~ meteo.wind.imageName }}" class="gdrtooltip"*/
/*              title="{{ meteo.wind.name }}">*/
/*     </li>*/
/* </span>*/
