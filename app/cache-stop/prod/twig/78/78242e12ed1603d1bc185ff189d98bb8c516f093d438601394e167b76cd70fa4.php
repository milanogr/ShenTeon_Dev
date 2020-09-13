<?php

/* GdrGameBundle:Forum:listPrivateForum.html.twig */
class __TwigTemplate_2159f3ea5df47528f02e6bb57b416ac602aab208d4d3cbc92d3a2415fb5de516 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Forum:index.html.twig", "GdrGameBundle:Forum:listPrivateForum.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GdrGameBundle:Forum:index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div id=\"forum-container\">

        <a href=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("bacheca-index");
        echo "\" class=\"button medium\">Torna alla Bacheca</a>

        <h1><span>Forum di Enclave</span></h1>
        ";
        // line 9
        $this->loadTemplate("@GdrGame/Forum/listForum.html.twig", "GdrGameBundle:Forum:listPrivateForum.html.twig", 9)->display(array_merge($context, array("forums" => (isset($context["forums"]) ? $context["forums"] : null))));
        // line 10
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Forum:listPrivateForum.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 10,  41 => 9,  35 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Forum:index.html.twig' %}*/
/* */
/* {% block content %}*/
/*     <div id="forum-container">*/
/* */
/*         <a href="{{ path('bacheca-index') }}" class="button medium">Torna alla Bacheca</a>*/
/* */
/*         <h1><span>Forum di Enclave</span></h1>*/
/*         {% include '@GdrGame/Forum/listForum.html.twig' with {forums: forums} %}*/
/*     </div>*/
/* {% endblock %}*/
