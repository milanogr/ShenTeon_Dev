<?php

/* GdrGameBundle:Default:index.html.twig */
class __TwigTemplate_3838109aa93b6c3941ae18f3464dbe8ed2b55e46cdb623ef494186099d000927 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::baseGame.html.twig", "GdrGameBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'location' => array($this, 'block_location'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::baseGame.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_location($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Location:renderLocation"));
        echo "
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends '::baseGame.html.twig' %}*/
/* */
/* {% block location %}*/
/*     {{ render(controller('GdrGameBundle:Location:renderLocation')) }}*/
/* {% endblock %}*/
/* */
/* {% block body %}{% endblock %}*/
