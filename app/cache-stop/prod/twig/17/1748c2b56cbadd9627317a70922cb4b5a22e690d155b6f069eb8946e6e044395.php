<?php

/* GdrGameBundle:Default:innerContent.html.twig */
class __TwigTemplate_7919d5dd15c5c71db5973a6cfc0a84682dd648c8556cc71f8130b8b970e7a5b4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:index.html.twig", "GdrGameBundle:Default:innerContent.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GdrGameBundle:Default:index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<div id=\"inner-content-wrapper\">
        ";
        // line 5
        $this->displayBlock('content', $context, $blocks);
        // line 8
        echo "    </div>
";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Default:innerContent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 6,  42 => 5,  37 => 8,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Default:index.html.twig' %}*/
/* */
/* {% block body -%}*/
/*     <div id="inner-content-wrapper">*/
/*         {% block content %}*/
/* */
/*         {% endblock %}*/
/*     </div>*/
/* {% endblock %}*/
