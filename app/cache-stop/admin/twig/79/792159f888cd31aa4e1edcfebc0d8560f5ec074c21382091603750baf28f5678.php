<?php

/* SonataAdminBundle:Button:history_button.html.twig */
class __TwigTemplate_41d56c99d78ecc0094f1247e894f487752559f21d05c000677b1a89cc92bd146 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_46af779119fb1ee2bc5946db83bac8a2c48b1f0c134c5292bf7ce77bebd8e642 = $this->env->getExtension("native_profiler");
        $__internal_46af779119fb1ee2bc5946db83bac8a2c48b1f0c134c5292bf7ce77bebd8e642->enter($__internal_46af779119fb1ee2bc5946db83bac8a2c48b1f0c134c5292bf7ce77bebd8e642_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:Button:history_button.html.twig"));

        // line 11
        echo "
";
        // line 12
        if ((($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "hasroute", array(0 => "history"), "method") && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "id", array(0 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method")) && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "isGranted", array(0 => "EDIT", 1 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method"))) {
            // line 13
            echo "    <a class=\"sonata-action-element\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "generateObjectUrl", array(0 => "history", 1 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method"), "html", null, true);
            echo "\">
        <i class=\"fa fa-archive\"></i>
        ";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_action_history", array(), "SonataAdminBundle"), "html", null, true);
            echo "</a>
";
        }
        
        $__internal_46af779119fb1ee2bc5946db83bac8a2c48b1f0c134c5292bf7ce77bebd8e642->leave($__internal_46af779119fb1ee2bc5946db83bac8a2c48b1f0c134c5292bf7ce77bebd8e642_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Button:history_button.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 15,  27 => 13,  25 => 12,  22 => 11,);
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
/* {% if admin.hasroute('history') and admin.id(object) and admin.isGranted('EDIT', object) %}*/
/*     <a class="sonata-action-element" href="{{ admin.generateObjectUrl('history', object) }}">*/
/*         <i class="fa fa-archive"></i>*/
/*         {{ 'link_action_history'|trans({}, 'SonataAdminBundle') }}</a>*/
/* {% endif %}*/
/* */
