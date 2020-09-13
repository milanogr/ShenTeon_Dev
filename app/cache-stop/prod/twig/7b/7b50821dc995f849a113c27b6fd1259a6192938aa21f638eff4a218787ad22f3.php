<?php

/* @GdrSite/News/singleNews.html.twig */
class __TwigTemplate_8dc6a986817325ba3b0dd4774c51c818b42f87fbe39f60a6090fb55d415ea2d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrSiteBundle::layout.html.twig", "@GdrSite/News/singleNews.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["news"]) ? $context["news"] : null), "title", array()), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"breadcrumb\">
        <a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("site_homepage");
        echo "\">Homepage</a> &gt; <a href=\"";
        echo $this->env->getExtension('routing')->getPath("site_list_news");
        echo "\">News</a> &gt; ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["news"]) ? $context["news"] : null), "title", array()), "html", null, true);
        echo "
    </div>

    <section class=\"news-container\">
        <article>
            <h2>";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["news"]) ? $context["news"] : null), "title", array()), "html", null, true);
        echo "</h2>
            <div class=\"date\">";
        // line 13
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["news"]) ? $context["news"] : null), "createdAt", array()), "d/m/Y"), "html", null, true);
        echo "</div>
            ";
        // line 14
        echo $this->getAttribute((isset($context["news"]) ? $context["news"] : null), "body", array());
        echo "
        </article>
    </section>
";
    }

    public function getTemplateName()
    {
        return "@GdrSite/News/singleNews.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 14,  57 => 13,  53 => 12,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "GdrSiteBundle::layout.html.twig" %}*/
/* */
/* {% block title%}{{ news.title }}{% endblock %}*/
/* */
/* {% block content %}*/
/*     <div class="breadcrumb">*/
/*         <a href="{{ path('site_homepage') }}">Homepage</a> &gt; <a href="{{ path('site_list_news') }}">News</a> &gt; {{ news.title }}*/
/*     </div>*/
/* */
/*     <section class="news-container">*/
/*         <article>*/
/*             <h2>{{ news.title }}</h2>*/
/*             <div class="date">{{ news.createdAt|date("d/m/Y") }}</div>*/
/*             {{ news.body|raw }}*/
/*         </article>*/
/*     </section>*/
/* {% endblock %}*/
