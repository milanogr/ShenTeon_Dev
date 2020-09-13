<?php

/* GdrGameBundle:Admin:showLocation.html.twig */
class __TwigTemplate_08f00eeaea2ae129170f060950b5e9971383336439b7a1a57c9958f0abbdd921 extends Twig_Template
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
        echo "<p>Ti basta muovere l'icona e lasciarla nel punto in cui vuoi che appaia. Non appena lasci il mouse lui salverà la
    posizione (puoi farlo più volte di fila).</p>
<div class=\"map\" style=\"background: url(";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($this->getAttribute((isset($context["location"]) ? $context["location"] : null), "parentMap", array()), "map"), "html", null, true);
        echo ") no-repeat\">
    <img data-id=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["location"]) ? $context["location"] : null), "id", array()), "html", null, true);
        echo "\" class=\"marker\" style=\"top: ";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["location"]) ? $context["location"] : null), "iconPosY", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["location"]) ? $context["location"] : null), "iconPosY", array()), 10)) : (10)), "html", null, true);
        echo "px; left: ";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["location"]) ? $context["location"] : null), "iconPosX", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["location"]) ? $context["location"] : null), "iconPosX", array()), 10)) : (10)), "html", null, true);
        echo "px\"
         src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset((isset($context["location"]) ? $context["location"] : null), "icon"), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["location"]) ? $context["location"] : null), "name", array()), "html", null, true);
        echo "\">
</div>";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Admin:showLocation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 5,  27 => 4,  23 => 3,  19 => 1,);
    }
}
/* <p>Ti basta muovere l'icona e lasciarla nel punto in cui vuoi che appaia. Non appena lasci il mouse lui salverà la*/
/*     posizione (puoi farlo più volte di fila).</p>*/
/* <div class="map" style="background: url({{ vich_uploader_asset(location.parentMap, 'map') }}) no-repeat">*/
/*     <img data-id="{{ location.id }}" class="marker" style="top: {{ location.iconPosY|default(10) }}px; left: {{ location.iconPosX|default(10) }}px"*/
/*          src="{{ vich_uploader_asset(location, 'icon') }}" title="{{ location.name }}">*/
/* </div>*/
