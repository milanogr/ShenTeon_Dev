<?php

/* SonataAdminBundle:CRUD:list__batch.html.twig */
class __TwigTemplate_abf44243809359537d13edb5b47fd13506cb61a49a258170ee92a45500da7964 extends Twig_Template
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
        return $this->loadTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getTemplate", array(0 => "base_list_field"), "method"), "SonataAdminBundle:CRUD:list__batch.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_d73064434dfcf36e29db10eb23a952cbbf6281a73276d0b31c992353f876ba03 = $this->env->getExtension("native_profiler");
        $__internal_d73064434dfcf36e29db10eb23a952cbbf6281a73276d0b31c992353f876ba03->enter($__internal_d73064434dfcf36e29db10eb23a952cbbf6281a73276d0b31c992353f876ba03_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:CRUD:list__batch.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d73064434dfcf36e29db10eb23a952cbbf6281a73276d0b31c992353f876ba03->leave($__internal_d73064434dfcf36e29db10eb23a952cbbf6281a73276d0b31c992353f876ba03_prof);

    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        $__internal_836c735b462349c183901df43ec560c928b5abb3af8d194e54c0863c75d3df37 = $this->env->getExtension("native_profiler");
        $__internal_836c735b462349c183901df43ec560c928b5abb3af8d194e54c0863c75d3df37->enter($__internal_836c735b462349c183901df43ec560c928b5abb3af8d194e54c0863c75d3df37_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        // line 15
        echo "    <input type=\"checkbox\" name=\"idx[]\" value=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "id", array(0 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method"), "html", null, true);
        echo "\">
";
        
        $__internal_836c735b462349c183901df43ec560c928b5abb3af8d194e54c0863c75d3df37->leave($__internal_836c735b462349c183901df43ec560c928b5abb3af8d194e54c0863c75d3df37_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:list__batch.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 15,  33 => 14,  18 => 12,);
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
/*     <input type="checkbox" name="idx[]" value="{{ admin.id(object) }}">*/
/* {% endblock %}*/
/* */
