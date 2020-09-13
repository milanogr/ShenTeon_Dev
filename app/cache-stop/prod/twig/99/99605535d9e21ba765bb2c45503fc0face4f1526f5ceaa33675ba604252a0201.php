<?php

/* @GdrSite/News/news.html.twig */
class __TwigTemplate_b65d3032b95c50755cf6ee1c9aab5fa954c8fa961046f05f76e9d1c57b50938b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrSiteBundle::layout.html.twig", "@GdrSite/News/news.html.twig", 1);
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
        echo "Le ultime novità dal gioco | Shenteon";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"breadcrumb\">
        <a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("site_homepage");
        echo "\">Homepage</a> &gt; News
    </div>

    ";
        // line 10
        echo twig_include($this->env, $context, "@GdrSite/News/_news.html.twig");
        echo "
";
    }

    public function getTemplateName()
    {
        return "@GdrSite/News/news.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 10,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "GdrSiteBundle::layout.html.twig" %}*/
/* */
/* {% block title "Le ultime novità dal gioco | Shenteon" %}*/
/* */
/* {% block content %}*/
/*     <div class="breadcrumb">*/
/*         <a href="{{ path('site_homepage') }}">Homepage</a> &gt; News*/
/*     </div>*/
/* */
/*     {{ include('@GdrSite/News/_news.html.twig') }}*/
/* {% endblock %}*/
