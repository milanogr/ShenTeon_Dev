<?php

/* SonataAdminBundle:Pager:links.html.twig */
class __TwigTemplate_f43b55d2b77735e3dd48cabd5177a711d9539bf242e2d6a2c270a57d4d922986 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        $this->parent = $this->loadTemplate("SonataAdminBundle:Pager:base_links.html.twig", "SonataAdminBundle:Pager:links.html.twig", 12);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:Pager:base_links.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_544dbb35bbb29bc79b5d441770d42c954671db59aeffb6fdc3ed16ad90537cfc = $this->env->getExtension("native_profiler");
        $__internal_544dbb35bbb29bc79b5d441770d42c954671db59aeffb6fdc3ed16ad90537cfc->enter($__internal_544dbb35bbb29bc79b5d441770d42c954671db59aeffb6fdc3ed16ad90537cfc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:Pager:links.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_544dbb35bbb29bc79b5d441770d42c954671db59aeffb6fdc3ed16ad90537cfc->leave($__internal_544dbb35bbb29bc79b5d441770d42c954671db59aeffb6fdc3ed16ad90537cfc_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Pager:links.html.twig";
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
/* {% extends 'SonataAdminBundle:Pager:base_links.html.twig' %}*/
/* */
