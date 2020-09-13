<?php

/* GdrSiteBundle::layout.html.twig */
class __TwigTemplate_eb4b8d7a6d6316d38a2cd4c3702e652c8a2ce1943de85ce3f751177e56ca4284 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::baseSite.html.twig", "GdrSiteBundle::layout.html.twig", 1);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "::baseSite.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_37821f21fc64b633e45e5f3270d96a103c9fe824bf50fd49186785688d27fb1c = $this->env->getExtension("native_profiler");
        $__internal_37821f21fc64b633e45e5f3270d96a103c9fe824bf50fd49186785688d27fb1c->enter($__internal_37821f21fc64b633e45e5f3270d96a103c9fe824bf50fd49186785688d27fb1c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GdrSiteBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_37821f21fc64b633e45e5f3270d96a103c9fe824bf50fd49186785688d27fb1c->leave($__internal_37821f21fc64b633e45e5f3270d96a103c9fe824bf50fd49186785688d27fb1c_prof);

    }

    public function getTemplateName()
    {
        return "GdrSiteBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  11 => 1,);
    }
}
/* {% extends "::baseSite.html.twig" %}*/
/* */
/* */
