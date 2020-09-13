<?php

/* SonataAdminBundle:Pager:results.html.twig */
class __TwigTemplate_4d2cb2c6c924e0de999a7b660a0082c8bae94be3699562475f145a610717dc67 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("SonataAdminBundle:Pager:base_results.html.twig", "SonataAdminBundle:Pager:results.html.twig", 12);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:Pager:base_results.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_277daffaaf0613deeea57277f6fa7f8d385bffa80ab89d21488d614965b12cf0 = $this->env->getExtension("native_profiler");
        $__internal_277daffaaf0613deeea57277f6fa7f8d385bffa80ab89d21488d614965b12cf0->enter($__internal_277daffaaf0613deeea57277f6fa7f8d385bffa80ab89d21488d614965b12cf0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:Pager:results.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_277daffaaf0613deeea57277f6fa7f8d385bffa80ab89d21488d614965b12cf0->leave($__internal_277daffaaf0613deeea57277f6fa7f8d385bffa80ab89d21488d614965b12cf0_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Pager:results.html.twig";
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
/* {% extends 'SonataAdminBundle:Pager:base_results.html.twig' %}*/
/* */
