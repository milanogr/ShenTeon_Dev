<?php

/* @GdrSite/Default/credits.html.twig */
class __TwigTemplate_2c16958b4652ac95f1327a207f9584f1c68aa36ec02d2ecb31f3212aea4142e3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrSiteBundle::layout.html.twig", "@GdrSite/Default/credits.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
    public function block_title($context, array $blocks = array())
    {
        echo "I Crediti - Chi ha contribuito alla creazione del gioco";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "        <h1 style=\"text-align:center\"><strong>CREDITS</strong></h1>

        <h4 style=\"text-align:center\"><strong>Programmazione</strong></h4>

        <p style=\"text-align:center\"><strong>Diego Viola </strong><br/>
            <em>(Airon)</em></p>

        <h4 style=\"text-align:center\"><strong>Grafica</strong></h4>

        <p style=\"text-align:center\"><strong>Morris Gavazza </strong><br/>
            <em>(Lafrast)</em></p>

        <p style=\"text-align:center\"><strong>Valentina Persano </strong><br/>
            <em>(Narcisse)</em></p>

        <h4 style=\"text-align:center\"><strong>Idea e Testi</strong></h4>

        <p style=\"text-align:center\"><strong>Diego Viola </strong><br/>
            <em>(Airon)</em><br/>
            <strong>Morris Gavazza </strong><br/>
            <em>(Lafrast)</em><br/>
            <strong>Valentina Persano</strong><br/>
            <em>(Narcisse)</em></p>
    ";
    }

    public function getTemplateName()
    {
        return "@GdrSite/Default/credits.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "GdrSiteBundle::layout.html.twig" %}*/
/* */
/* {% block title "I Crediti - Chi ha contribuito alla creazione del gioco" %}*/
/* */
/*     {% block content %}*/
/*         <h1 style="text-align:center"><strong>CREDITS</strong></h1>*/
/* */
/*         <h4 style="text-align:center"><strong>Programmazione</strong></h4>*/
/* */
/*         <p style="text-align:center"><strong>Diego Viola </strong><br/>*/
/*             <em>(Airon)</em></p>*/
/* */
/*         <h4 style="text-align:center"><strong>Grafica</strong></h4>*/
/* */
/*         <p style="text-align:center"><strong>Morris Gavazza </strong><br/>*/
/*             <em>(Lafrast)</em></p>*/
/* */
/*         <p style="text-align:center"><strong>Valentina Persano </strong><br/>*/
/*             <em>(Narcisse)</em></p>*/
/* */
/*         <h4 style="text-align:center"><strong>Idea e Testi</strong></h4>*/
/* */
/*         <p style="text-align:center"><strong>Diego Viola </strong><br/>*/
/*             <em>(Airon)</em><br/>*/
/*             <strong>Morris Gavazza </strong><br/>*/
/*             <em>(Lafrast)</em><br/>*/
/*             <strong>Valentina Persano</strong><br/>*/
/*             <em>(Narcisse)</em></p>*/
/*     {% endblock %}*/
