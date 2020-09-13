<?php

/* SonataAdminBundle:CRUD:list_string.html.twig */
class __TwigTemplate_ff9333bed67ba3648b1e3259936efb0df7b7bb22e98eaf6a75d818e6ead805a0 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        // line 12
        return $this->loadTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getTemplate", array(0 => "base_list_field"), "method"), "SonataAdminBundle:CRUD:list_string.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_51632c47f6e9176e2cb494263cc1ab9d390873ac5764eeedd10c218c935373b0 = $this->env->getExtension("native_profiler");
        $__internal_51632c47f6e9176e2cb494263cc1ab9d390873ac5764eeedd10c218c935373b0->enter($__internal_51632c47f6e9176e2cb494263cc1ab9d390873ac5764eeedd10c218c935373b0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:list_string.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_51632c47f6e9176e2cb494263cc1ab9d390873ac5764eeedd10c218c935373b0->leave($__internal_51632c47f6e9176e2cb494263cc1ab9d390873ac5764eeedd10c218c935373b0_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:list_string.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  9 => 12,);
    }
}
/* {#*/
/* */
/* This file is part of the Sonata package.*/
/* */
/* (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>*/
/* */
/* For the full copyright and license information, please view the LICENSE*/
/* file that was distributed with this source code.*/
/* */
/* #}*/
/* */
/* {% extends admin.getTemplate('base_list_field') %}*/
/* */
