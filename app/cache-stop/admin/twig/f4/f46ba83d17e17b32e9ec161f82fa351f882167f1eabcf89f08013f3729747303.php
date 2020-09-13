<?php

/* SonataAdminBundle:CRUD:list.html.twig */
class __TwigTemplate_b2340f3c36efd7d02774df39ec8b143932321bfe39e011ed21cd7c78dec2444b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("SonataAdminBundle:CRUD:base_list.html.twig", "SonataAdminBundle:CRUD:list.html.twig", 12);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_list.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_1252d226f10aa349b4ce93510508284ac80ee148ea84415af297af0ff7707cf5 = $this->env->getExtension("native_profiler");
        $__internal_1252d226f10aa349b4ce93510508284ac80ee148ea84415af297af0ff7707cf5->enter($__internal_1252d226f10aa349b4ce93510508284ac80ee148ea84415af297af0ff7707cf5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:list.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1252d226f10aa349b4ce93510508284ac80ee148ea84415af297af0ff7707cf5->leave($__internal_1252d226f10aa349b4ce93510508284ac80ee148ea84415af297af0ff7707cf5_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  11 => 12,);
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
/* {% extends 'SonataAdminBundle:CRUD:base_list.html.twig' %}*/
/* */
