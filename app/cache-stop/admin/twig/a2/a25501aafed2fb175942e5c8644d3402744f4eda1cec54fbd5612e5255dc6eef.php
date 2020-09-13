<?php

/* SonataAdminBundle:CRUD:edit.html.twig */
class __TwigTemplate_23e31eaca5b9cffad3a73605acd685bc6a44eef3b9f6757e65651d5e09598479 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("SonataAdminBundle:CRUD:base_edit.html.twig", "SonataAdminBundle:CRUD:edit.html.twig", 12);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_edit.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_a388de561d085369f2ed733e58a6885151497d7536c4f7df36aa29091ea103b5 = $this->env->getExtension("native_profiler");
        $__internal_a388de561d085369f2ed733e58a6885151497d7536c4f7df36aa29091ea103b5->enter($__internal_a388de561d085369f2ed733e58a6885151497d7536c4f7df36aa29091ea103b5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:edit.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_a388de561d085369f2ed733e58a6885151497d7536c4f7df36aa29091ea103b5->leave($__internal_a388de561d085369f2ed733e58a6885151497d7536c4f7df36aa29091ea103b5_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:edit.html.twig";
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
/* {% extends 'SonataAdminBundle:CRUD:base_edit.html.twig' %}*/
/* */
