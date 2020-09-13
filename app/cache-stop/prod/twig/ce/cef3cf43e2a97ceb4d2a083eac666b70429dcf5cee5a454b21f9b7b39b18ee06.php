<?php

/* @GdrSite/Default/regolamento.html.twig */
class __TwigTemplate_a814bdaf213ea63f3b8d4b73904ce741da65a46217b854c2ee7ddcb453f33b15 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrSiteBundle::layout.html.twig", "@GdrSite/Default/regolamento.html.twig", 1);
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
        // line 4
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["regolamento"]) ? $context["regolamento"] : null), "title", array()), "html", null, true);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
    <div class=\"page-regolamento\">
        <div class=\"breadcrumb\">
            <a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("site_regolamenti");
        echo "\">Regolamenti</a> > ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["regolamento"]) ? $context["regolamento"] : null), "title", array()), "html", null, true);
        echo "
        </div>

        ";
        // line 14
        echo $this->getAttribute((isset($context["regolamento"]) ? $context["regolamento"] : null), "body", array());
        echo "

    </div>
";
    }

    public function getTemplateName()
    {
        return "@GdrSite/Default/regolamento.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 14,  47 => 11,  42 => 8,  39 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends "GdrSiteBundle::layout.html.twig" %}*/
/* */
/* {% block title %}*/
/*     {{ regolamento.title }}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     <div class="page-regolamento">*/
/*         <div class="breadcrumb">*/
/*             <a href="{{ path("site_regolamenti") }}">Regolamenti</a> > {{ regolamento.title }}*/
/*         </div>*/
/* */
/*         {{ regolamento.body|raw }}*/
/* */
/*     </div>*/
/* {% endblock %}*/
