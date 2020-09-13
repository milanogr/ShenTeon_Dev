<?php

/* SonataAdminBundle:CRUD:base_edit.html.twig */
class __TwigTemplate_3c64cd4930b01e6a0e4b2bdd316f08dae154fc17740067f3c8c7951aab4d2a3b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $_trait_0 = $this->loadTemplate("SonataAdminBundle:CRUD:base_edit_form.html.twig", "SonataAdminBundle:CRUD:base_edit.html.twig", 32);
        // line 32
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."SonataAdminBundle:CRUD:base_edit_form.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        if (!isset($_trait_0_blocks["form"])) {
            throw new Twig_Error_Runtime(sprintf('Block "form" is not defined in trait "SonataAdminBundle:CRUD:base_edit_form.html.twig".'));
        }

        $_trait_0_blocks["parentForm"] = $_trait_0_blocks["form"]; unset($_trait_0_blocks["form"]);

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'title' => array($this, 'block_title'),
                'navbar_title' => array($this, 'block_navbar_title'),
                'actions' => array($this, 'block_actions'),
                'tab_menu' => array($this, 'block_tab_menu'),
                'form' => array($this, 'block_form'),
            )
        );
    }

    protected function doGetParent(array $context)
    {
        // line 12
        return $this->loadTemplate((isset($context["base_template"]) ? $context["base_template"] : $this->getContext($context, "base_template")), "SonataAdminBundle:CRUD:base_edit.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_384275dd57f75b465c948e53fb618cc49d5cd09366e4a67abcb916c20b092e75 = $this->env->getExtension("native_profiler");
        $__internal_384275dd57f75b465c948e53fb618cc49d5cd09366e4a67abcb916c20b092e75->enter($__internal_384275dd57f75b465c948e53fb618cc49d5cd09366e4a67abcb916c20b092e75_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:base_edit.html.twig"));

        // line 33
        $context["form_helper"] = $this->loadTemplate("SonataAdminBundle:CRUD:base_edit_form_macro.html.twig", "SonataAdminBundle:CRUD:base_edit.html.twig", 33);
        // line 12
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_384275dd57f75b465c948e53fb618cc49d5cd09366e4a67abcb916c20b092e75->leave($__internal_384275dd57f75b465c948e53fb618cc49d5cd09366e4a67abcb916c20b092e75_prof);

    }

    // line 14
    public function block_title($context, array $blocks = array())
    {
        $__internal_cbca6bb80acfa8d77f37e852eef60d41a0747ad70f7131a0ecdd4c2ab0c6331d = $this->env->getExtension("native_profiler");
        $__internal_cbca6bb80acfa8d77f37e852eef60d41a0747ad70f7131a0ecdd4c2ab0c6331d->enter($__internal_cbca6bb80acfa8d77f37e852eef60d41a0747ad70f7131a0ecdd4c2ab0c6331d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 15
        echo "    ";
        if ( !(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "id", array(0 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method"))) {
            // line 16
            echo "        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("title_edit", array("%name%" => $this->env->getExtension('text_extension')->truncateFilter($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "toString", array(0 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method"), 15)), "SonataAdminBundle"), "html", null, true);
            echo "
    ";
        } else {
            // line 18
            echo "        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("title_create", array(), "SonataAdminBundle"), "html", null, true);
            echo "
    ";
        }
        
        $__internal_cbca6bb80acfa8d77f37e852eef60d41a0747ad70f7131a0ecdd4c2ab0c6331d->leave($__internal_cbca6bb80acfa8d77f37e852eef60d41a0747ad70f7131a0ecdd4c2ab0c6331d_prof);

    }

    // line 22
    public function block_navbar_title($context, array $blocks = array())
    {
        $__internal_bbddb780d810caa52fcfa860b323c0a395050fbcbb4151f0c682c772263cfe01 = $this->env->getExtension("native_profiler");
        $__internal_bbddb780d810caa52fcfa860b323c0a395050fbcbb4151f0c682c772263cfe01->enter($__internal_bbddb780d810caa52fcfa860b323c0a395050fbcbb4151f0c682c772263cfe01_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "navbar_title"));

        // line 23
        echo "    ";
        $this->displayBlock("title", $context, $blocks);
        echo "
";
        
        $__internal_bbddb780d810caa52fcfa860b323c0a395050fbcbb4151f0c682c772263cfe01->leave($__internal_bbddb780d810caa52fcfa860b323c0a395050fbcbb4151f0c682c772263cfe01_prof);

    }

    // line 26
    public function block_actions($context, array $blocks = array())
    {
        $__internal_5396af7103a85e0a3878bdb4b710791acefa2cc7e60535e2ca0733ce8ca364d0 = $this->env->getExtension("native_profiler");
        $__internal_5396af7103a85e0a3878bdb4b710791acefa2cc7e60535e2ca0733ce8ca364d0->enter($__internal_5396af7103a85e0a3878bdb4b710791acefa2cc7e60535e2ca0733ce8ca364d0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "actions"));

        // line 27
        echo "    ";
        $this->loadTemplate("SonataAdminBundle:CRUD:action_buttons.html.twig", "SonataAdminBundle:CRUD:base_edit.html.twig", 27)->display($context);
        
        $__internal_5396af7103a85e0a3878bdb4b710791acefa2cc7e60535e2ca0733ce8ca364d0->leave($__internal_5396af7103a85e0a3878bdb4b710791acefa2cc7e60535e2ca0733ce8ca364d0_prof);

    }

    // line 30
    public function block_tab_menu($context, array $blocks = array())
    {
        $__internal_0844e0390975fe9a386b105123711b8ef7117481047efb86ba4d8af93a64df33 = $this->env->getExtension("native_profiler");
        $__internal_0844e0390975fe9a386b105123711b8ef7117481047efb86ba4d8af93a64df33->enter($__internal_0844e0390975fe9a386b105123711b8ef7117481047efb86ba4d8af93a64df33_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "tab_menu"));

        echo $this->env->getExtension('knp_menu')->render($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "sidemenu", array(0 => (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action"))), "method"), array("currentClass" => "active", "template" => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "adminPool", array()), "getTemplate", array(0 => "tab_menu_template"), "method")), "twig");
        
        $__internal_0844e0390975fe9a386b105123711b8ef7117481047efb86ba4d8af93a64df33->leave($__internal_0844e0390975fe9a386b105123711b8ef7117481047efb86ba4d8af93a64df33_prof);

    }

    // line 35
    public function block_form($context, array $blocks = array())
    {
        $__internal_bd25dc492439e893eba9aec3e5f0e0c74d0a236873580e413d394c4da0cb33ba = $this->env->getExtension("native_profiler");
        $__internal_bd25dc492439e893eba9aec3e5f0e0c74d0a236873580e413d394c4da0cb33ba->enter($__internal_bd25dc492439e893eba9aec3e5f0e0c74d0a236873580e413d394c4da0cb33ba_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form"));

        // line 36
        echo "    ";
        $this->displayBlock("parentForm", $context, $blocks);
        echo "
";
        
        $__internal_bd25dc492439e893eba9aec3e5f0e0c74d0a236873580e413d394c4da0cb33ba->leave($__internal_bd25dc492439e893eba9aec3e5f0e0c74d0a236873580e413d394c4da0cb33ba_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:base_edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 36,  126 => 35,  114 => 30,  106 => 27,  100 => 26,  90 => 23,  84 => 22,  73 => 18,  67 => 16,  64 => 15,  58 => 14,  51 => 12,  49 => 33,  40 => 12,  12 => 32,);
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
/* {% extends base_template %}*/
/* */
/* {% block title %}*/
/*     {% if admin.id(object) is not null %}*/
/*         {{ "title_edit"|trans({'%name%': admin.toString(object)|truncate(15) }, 'SonataAdminBundle') }}*/
/*     {% else %}*/
/*         {{ "title_create"|trans({}, 'SonataAdminBundle') }}*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
/* {% block navbar_title %}*/
/*     {{ block('title') }}*/
/* {% endblock %}*/
/* */
/* {% block actions %}*/
/*     {% include 'SonataAdminBundle:CRUD:action_buttons.html.twig' %}*/
/* {% endblock %}*/
/* */
/* {% block tab_menu %}{{ knp_menu_render(admin.sidemenu(action), {'currentClass' : 'active', 'template': sonata_admin.adminPool.getTemplate('tab_menu_template')}, 'twig') }}{% endblock %}*/
/* */
/* {% use 'SonataAdminBundle:CRUD:base_edit_form.html.twig' with form as parentForm %}*/
/* {% import "SonataAdminBundle:CRUD:base_edit_form_macro.html.twig" as form_helper %}*/
/* */
/* {% block form %}*/
/*     {{ block('parentForm') }}*/
/* {% endblock %}*/
/* */
