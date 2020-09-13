<?php

/* GdrSiteBundle:Default:index.html.twig */
class __TwigTemplate_27ac5b27cdb2b189a2ab6c3882149bb61811265b9d5c2d37b92f1cabcb76ed64 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrSiteBundle::layout.html.twig", "GdrSiteBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GdrSiteBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    ";
        // line 5
        if ((isset($context["isDay"]) ? $context["isDay"] : null)) {
            // line 6
            echo "        ";
            $context["img"] = $this->env->getExtension('vich_uploader')->asset($this->getAttribute((isset($context["meteo"]) ? $context["meteo"] : null), "condition", array()), "image");
            // line 7
            echo "    ";
        } else {
            // line 8
            echo "        ";
            $context["img"] = $this->env->getExtension('vich_uploader')->asset($this->getAttribute((isset($context["meteo"]) ? $context["meteo"] : null), "condition", array()), "imageNight");
            // line 9
            echo "    ";
        }
        // line 10
        echo "
    <div class=\"home-teon\">
        <div class=\"home-left\">
            <div id=\"teon-container\">
                ";
        // line 15
        echo "                <img id=\"teon-tela\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrsite/images/home/teon_new.jpg"), "html", null, true);
        echo "\">
                <img id=\"teon-cornice\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrsite/images/teon-space.png"), "html", null, true);
        echo "\">
            </div>
            <div class=\"condizioni\">
                <img src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($this->getAttribute((isset($context["moon"]) ? $context["moon"] : null), "moon", array()), "image"), "html", null, true);
        echo "\" class=\"has-tip\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["moon"]) ? $context["moon"] : null), "moon", array()), "name", array()), "html", null, true);
        echo "\">
                <img src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($this->getAttribute((isset($context["meteo"]) ? $context["meteo"] : null), "wind", array()), "image"), "html", null, true);
        echo "\" class=\"has-tip\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["meteo"]) ? $context["meteo"] : null), "wind", array()), "name", array()), "html", null, true);
        echo "\">
                <img src=\"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["img"]) ? $context["img"] : null), "html", null, true);
        echo "\" class=\"has-tip\"
                     title=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["meteo"]) ? $context["meteo"] : null), "condition", array()), "name", array()), "html", null, true);
        echo " | ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["meteo"]) ? $context["meteo"] : null), "temp", array()), "html", null, true);
        echo "°\">
            </div>
        </div>
        <div class=\"home-right\">
            <p>Avemor Teoniano, o semplice viandante! <br>
                La Signoria Vi dà il benvenuto a Teon, la città più cosmopolita dello Shen, dove tutte le razze possono
                trovare il proprio posto e portare avanti la propria storia. Diventerete un ricco mercante od un temuto
                guerriero? Tenterete la misteriosa via della magia o lascerete tutto in mano al destino? Sta a Voi e a
                nessun altro. Occhi aperti però, poiché nello Shen molte cose non sono quello che sembrano. Il mistero
                Vi attende dietro l'angolo, a volte per farVi lo sgambetto, altre solo per soprenderVi.</p>
        </div>
    </div>

    ";
        // line 35
        echo twig_include($this->env, $context, "GdrSiteBundle:News:_news.html.twig");
        echo "

";
    }

    public function getTemplateName()
    {
        return "GdrSiteBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 35,  81 => 22,  77 => 21,  71 => 20,  65 => 19,  59 => 16,  54 => 15,  48 => 10,  45 => 9,  42 => 8,  39 => 7,  36 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "GdrSiteBundle::layout.html.twig" %}*/
/* */
/* {% block content %}*/
/* */
/*     {% if isDay %}*/
/*         {% set img = vich_uploader_asset(meteo.condition, 'image') %}*/
/*     {% else %}*/
/*         {% set img = vich_uploader_asset(meteo.condition, 'imageNight') %}*/
/*     {% endif %}*/
/* */
/*     <div class="home-teon">*/
/*         <div class="home-left">*/
/*             <div id="teon-container">*/
/*                 {#<img id="teon-tela" src="{{ asset('bundles/gdrsite/images/home/'~ immagine ~'.jpg') }}">#}*/
/*                 <img id="teon-tela" src="{{ asset('bundles/gdrsite/images/home/teon_new.jpg') }}">*/
/*                 <img id="teon-cornice" src="{{ asset('bundles/gdrsite/images/teon-space.png') }}">*/
/*             </div>*/
/*             <div class="condizioni">*/
/*                 <img src="{{ vich_uploader_asset(moon.moon, 'image') }}" class="has-tip" title="{{ moon.moon.name }}">*/
/*                 <img src="{{ vich_uploader_asset(meteo.wind, 'image') }}" class="has-tip" title="{{ meteo.wind.name }}">*/
/*                 <img src="{{ img }}" class="has-tip"*/
/*                      title="{{ meteo.condition.name }} | {{ meteo.temp }}°">*/
/*             </div>*/
/*         </div>*/
/*         <div class="home-right">*/
/*             <p>Avemor Teoniano, o semplice viandante! <br>*/
/*                 La Signoria Vi dà il benvenuto a Teon, la città più cosmopolita dello Shen, dove tutte le razze possono*/
/*                 trovare il proprio posto e portare avanti la propria storia. Diventerete un ricco mercante od un temuto*/
/*                 guerriero? Tenterete la misteriosa via della magia o lascerete tutto in mano al destino? Sta a Voi e a*/
/*                 nessun altro. Occhi aperti però, poiché nello Shen molte cose non sono quello che sembrano. Il mistero*/
/*                 Vi attende dietro l'angolo, a volte per farVi lo sgambetto, altre solo per soprenderVi.</p>*/
/*         </div>*/
/*     </div>*/
/* */
/*     {{ include('GdrSiteBundle:News:_news.html.twig') }}*/
/* */
/* {% endblock %}*/
/* */
