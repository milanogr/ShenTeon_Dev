<?php

/* @GdrSite/Default/ambientazione.html.twig */
class __TwigTemplate_f35dc55ef11332c33b42ca75e80f8ea55e51536506871ec7407688ac5fdcfc82 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrSiteBundle::layout.html.twig", "@GdrSite/Default/ambientazione.html.twig", 1);
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
        echo "L'ambientazione del gioco, tutte le informazioni utili";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
    ";
        // line 7
        echo $this->getAttribute((isset($context["ambientazione"]) ? $context["ambientazione"] : null), "body", array());
        echo "

";
    }

    public function getTemplateName()
    {
        return "@GdrSite/Default/ambientazione.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "GdrSiteBundle::layout.html.twig" %}*/
/* */
/* {% block title "L'ambientazione del gioco, tutte le informazioni utili" %}*/
/* */
/* {% block content %}*/
/* */
/*     {{ ambientazione.body|raw }}*/
/* */
/* {% endblock %}*/
