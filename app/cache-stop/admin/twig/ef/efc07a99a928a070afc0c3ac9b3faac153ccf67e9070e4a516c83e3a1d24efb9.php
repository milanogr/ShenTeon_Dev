<?php

/* SonataIntlBundle:CRUD:list_datetime.html.twig */
class __TwigTemplate_32932252fec3d7c90c757860914c8121403e23df4776ed57fb2f9e822027a38b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 12
        return $this->loadTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getTemplate", array(0 => "base_list_field"), "method"), "SonataIntlBundle:CRUD:list_datetime.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_cfe42c4b371d7d85a26691f75aaa0ad00fbc10cfa7b5e68f4cb3260579a7976b = $this->env->getExtension("native_profiler");
        $__internal_cfe42c4b371d7d85a26691f75aaa0ad00fbc10cfa7b5e68f4cb3260579a7976b->enter($__internal_cfe42c4b371d7d85a26691f75aaa0ad00fbc10cfa7b5e68f4cb3260579a7976b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataIntlBundle:CRUD:list_datetime.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_cfe42c4b371d7d85a26691f75aaa0ad00fbc10cfa7b5e68f4cb3260579a7976b->leave($__internal_cfe42c4b371d7d85a26691f75aaa0ad00fbc10cfa7b5e68f4cb3260579a7976b_prof);

    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        $__internal_6da85a04b9f0c0923165c448cae421380651ca8bd7dd7b163b56b27ff6e68fe4 = $this->env->getExtension("native_profiler");
        $__internal_6da85a04b9f0c0923165c448cae421380651ca8bd7dd7b163b56b27ff6e68fe4->enter($__internal_6da85a04b9f0c0923165c448cae421380651ca8bd7dd7b163b56b27ff6e68fe4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        // line 15
        if (twig_test_empty((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")))) {
            // line 16
            echo "&nbsp;";
        } else {
            // line 18
            $context["pattern"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "pattern", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "pattern", array()), null)) : (null));
            // line 19
            echo "        ";
            $context["locale"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "locale", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "locale", array()), null)) : (null));
            // line 20
            echo "        ";
            $context["timezone"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "timezone", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "timezone", array()), null)) : (null));
            // line 21
            echo "        ";
            $context["dateType"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "dateType", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "dateType", array()), null)) : (null));
            // line 22
            echo "        ";
            $context["timeType"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "timeType", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "timeType", array()), null)) : (null));
            // line 23
            echo "
        ";
            // line 24
            echo $this->env->getExtension('sonata_intl_datetime')->formatDatetime((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), (isset($context["pattern"]) ? $context["pattern"] : $this->getContext($context, "pattern")), (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")), (isset($context["timezone"]) ? $context["timezone"] : $this->getContext($context, "timezone")), (isset($context["dateType"]) ? $context["dateType"] : $this->getContext($context, "dateType")), (isset($context["timeType"]) ? $context["timeType"] : $this->getContext($context, "timeType")));
        }
        
        $__internal_6da85a04b9f0c0923165c448cae421380651ca8bd7dd7b163b56b27ff6e68fe4->leave($__internal_6da85a04b9f0c0923165c448cae421380651ca8bd7dd7b163b56b27ff6e68fe4_prof);

    }

    public function getTemplateName()
    {
        return "SonataIntlBundle:CRUD:list_datetime.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 24,  58 => 23,  55 => 22,  52 => 21,  49 => 20,  46 => 19,  44 => 18,  41 => 16,  39 => 15,  33 => 14,  18 => 12,);
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
/* {% block field %}*/
/*     {%- if value is empty -%}*/
/*         &nbsp;*/
/*     {%- else -%}*/
/*         {% set pattern = field_description.options.pattern|default(null) %}*/
/*         {% set locale = field_description.options.locale|default(null) %}*/
/*         {% set timezone = field_description.options.timezone|default(null) %}*/
/*         {% set dateType = field_description.options.dateType|default(null) %}*/
/*         {% set timeType = field_description.options.timeType|default(null) %}*/
/* */
/*         {{ value | format_datetime(pattern, locale, timezone, dateType, timeType) }}*/
/*     {%- endif -%}*/
/* {% endblock %}*/
/* */
