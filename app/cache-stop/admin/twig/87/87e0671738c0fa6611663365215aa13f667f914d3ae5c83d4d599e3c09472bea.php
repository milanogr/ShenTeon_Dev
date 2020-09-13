<?php

/* GdrAdministrationBundle:Form:admin_file_type.html.twig */
class __TwigTemplate_0125036ca2240e4b3cca60f476a7f7adec6a91faffdd812fb7652e2f41fcfcfa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("SonataAdminBundle:Form:form_admin_fields.html.twig", "GdrAdministrationBundle:Form:admin_file_type.html.twig", 1);
        $this->blocks = array(
            'admin_file_widget' => array($this, 'block_admin_file_widget'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:Form:form_admin_fields.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_24d9286eb12de34f661f29ea7d464c8745eb33fc45e8c325ea132a2674f8b0e3 = $this->env->getExtension("native_profiler");
        $__internal_24d9286eb12de34f661f29ea7d464c8745eb33fc45e8c325ea132a2674f8b0e3->enter($__internal_24d9286eb12de34f661f29ea7d464c8745eb33fc45e8c325ea132a2674f8b0e3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GdrAdministrationBundle:Form:admin_file_type.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_24d9286eb12de34f661f29ea7d464c8745eb33fc45e8c325ea132a2674f8b0e3->leave($__internal_24d9286eb12de34f661f29ea7d464c8745eb33fc45e8c325ea132a2674f8b0e3_prof);

    }

    // line 3
    public function block_admin_file_widget($context, array $blocks = array())
    {
        $__internal_3361e6f2c0374789d73d6e69c5eefb5a95cc89590c6e5f96fdac2ec8a36a14ba = $this->env->getExtension("native_profiler");
        $__internal_3361e6f2c0374789d73d6e69c5eefb5a95cc89590c6e5f96fdac2ec8a36a14ba->enter($__internal_3361e6f2c0374789d73d6e69c5eefb5a95cc89590c6e5f96fdac2ec8a36a14ba_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "admin_file_widget"));

        // line 4
        echo "
";
        // line 5
        ob_start();
        // line 6
        echo "    ";
        $context["subject"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "sonata_admin", array()), "admin", array()), "getSubject", array());
        // line 7
        echo "    ";
        if (($this->getAttribute((isset($context["subject"]) ? $context["subject"] : $this->getContext($context, "subject")), "id", array()) && $this->getAttribute((isset($context["subject"]) ? $context["subject"] : $this->getContext($context, "subject")), (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name"))))) {
            // line 8
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl($this->env->getExtension('vich_uploader')->asset((isset($context["subject"]) ? $context["subject"] : $this->getContext($context, "subject")), (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")))), "html", null, true);
            echo "\" target=\"_blank\">
            <img src=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl($this->env->getExtension('vich_uploader')->asset((isset($context["subject"]) ? $context["subject"] : $this->getContext($context, "subject")), (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")))), "html", null, true);
            echo "\" />
        </a><br/>
    ";
        }
        // line 12
        echo "    ";
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "file")) : ("file"));
        // line 13
        echo "    <input type=\"";
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
        echo "\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " ";
        if ( !twig_test_empty((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")))) {
            echo "value=\"";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
            echo "\" ";
        }
        echo "/>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 15
        echo "
";
        
        $__internal_3361e6f2c0374789d73d6e69c5eefb5a95cc89590c6e5f96fdac2ec8a36a14ba->leave($__internal_3361e6f2c0374789d73d6e69c5eefb5a95cc89590c6e5f96fdac2ec8a36a14ba_prof);

    }

    public function getTemplateName()
    {
        return "GdrAdministrationBundle:Form:admin_file_type.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 15,  65 => 13,  62 => 12,  56 => 9,  51 => 8,  48 => 7,  45 => 6,  43 => 5,  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends 'SonataAdminBundle:Form:form_admin_fields.html.twig' %}*/
/* */
/* {% block admin_file_widget %}*/
/* */
/* {% spaceless %}*/
/*     {% set subject =  form.vars.sonata_admin.admin.getSubject%}*/
/*     {% if subject.id and attribute(subject, name) %}*/
/*         <a href="{{ asset(vich_uploader_asset(subject, name)) }}" target="_blank">*/
/*             <img src="{{ asset(vich_uploader_asset(subject, name)) }}" />*/
/*         </a><br/>*/
/*     {% endif %}*/
/*     {% set type = type|default('file') %}*/
/*     <input type="{{ type }}" {{ block('widget_attributes') }} {% if value is not empty %}value="{{ value }}" {% endif %}/>*/
/* {% endspaceless %}*/
/* */
/* {% endblock %}*/
