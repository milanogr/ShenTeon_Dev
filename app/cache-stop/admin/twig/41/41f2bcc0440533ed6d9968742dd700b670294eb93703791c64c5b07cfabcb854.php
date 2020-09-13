<?php

/* SonataAdminBundle:Core:user_block.html.twig */
class __TwigTemplate_84c9385c0c84434018283af9d06746ad1116e416473a049f23d40b9f32bb787f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'user_block' => array($this, 'block_user_block'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_10fec35817a0255f135c9a3d8dfd8f1f5c6b2e42ff0b8aac38b1ecb68a3f3ba9 = $this->env->getExtension("native_profiler");
        $__internal_10fec35817a0255f135c9a3d8dfd8f1f5c6b2e42ff0b8aac38b1ecb68a3f3ba9->enter($__internal_10fec35817a0255f135c9a3d8dfd8f1f5c6b2e42ff0b8aac38b1ecb68a3f3ba9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataAdminBundle:Core:user_block.html.twig"));

        // line 1
        $this->displayBlock('user_block', $context, $blocks);
        
        $__internal_10fec35817a0255f135c9a3d8dfd8f1f5c6b2e42ff0b8aac38b1ecb68a3f3ba9->leave($__internal_10fec35817a0255f135c9a3d8dfd8f1f5c6b2e42ff0b8aac38b1ecb68a3f3ba9_prof);

    }

    public function block_user_block($context, array $blocks = array())
    {
        $__internal_19acfa7b5db806701fae217b651b23162f1768ab4007bcf005fab99c1e2ebc19 = $this->env->getExtension("native_profiler");
        $__internal_19acfa7b5db806701fae217b651b23162f1768ab4007bcf005fab99c1e2ebc19->enter($__internal_19acfa7b5db806701fae217b651b23162f1768ab4007bcf005fab99c1e2ebc19_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "user_block"));

        
        $__internal_19acfa7b5db806701fae217b651b23162f1768ab4007bcf005fab99c1e2ebc19->leave($__internal_19acfa7b5db806701fae217b651b23162f1768ab4007bcf005fab99c1e2ebc19_prof);

    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Core:user_block.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }
}
/* {% block user_block %}{# Customize this value #}{% endblock %}*/
/* */
