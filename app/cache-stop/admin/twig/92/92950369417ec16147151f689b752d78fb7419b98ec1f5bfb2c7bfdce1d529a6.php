<?php

/* knp_menu_base.html.twig */
class __TwigTemplate_f7239ccc42f3d77c498c40268a3444610412945b89cffd40186c5708c9bc268a extends Twig_Template
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
        $__internal_afa5f8c34629f1a42f27f1bcd7ea0428878dd4335cd05d8dc776c0afb2c96567 = $this->env->getExtension("native_profiler");
        $__internal_afa5f8c34629f1a42f27f1bcd7ea0428878dd4335cd05d8dc776c0afb2c96567->enter($__internal_afa5f8c34629f1a42f27f1bcd7ea0428878dd4335cd05d8dc776c0afb2c96567_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "knp_menu_base.html.twig"));

        // line 1
        if ($this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "compressed", array())) {
            $this->displayBlock("compressed_root", $context, $blocks);
        } else {
            $this->displayBlock("root", $context, $blocks);
        }
        
        $__internal_afa5f8c34629f1a42f27f1bcd7ea0428878dd4335cd05d8dc776c0afb2c96567->leave($__internal_afa5f8c34629f1a42f27f1bcd7ea0428878dd4335cd05d8dc776c0afb2c96567_prof);

    }

    public function getTemplateName()
    {
        return "knp_menu_base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* {% if options.compressed %}{{ block('compressed_root') }}{% else %}{{ block('root') }}{% endif %}*/
/* */
