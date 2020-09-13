<?php

/* GdrGameBundle:Forum:helpDesk.html.twig */
class __TwigTemplate_0040dcf69775dbcc894969491a43aba1cd3eca96e159129e2187e35d850ab93e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Forum:index.html.twig", "GdrGameBundle:Forum:helpDesk.html.twig", 1);
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
        echo "
    <div id=\"forum-container\">
        <h1><span>Supporto</span></h1>

        <a class=\"button\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-thread", array("category" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id", array()))), "html", null, true);
        echo "\">Crea thread</a>

        ";
        // line 10
        $this->loadTemplate("@GdrGame/Forum/listThreads.html.twig", "GdrGameBundle:Forum:helpDesk.html.twig", 10)->display($context);
        // line 11
        echo "
        <a class=\"button\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-thread", array("category" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id", array()))), "html", null, true);
        echo "\">Crea thread</a>
    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Forum:helpDesk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 12,  44 => 11,  42 => 10,  37 => 8,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Forum:index.html.twig' %}*/
/* */
/* {% block content %}*/
/* */
/*     <div id="forum-container">*/
/*         <h1><span>Supporto</span></h1>*/
/* */
/*         <a class="button" href="{{ path('bacheca-create-thread', {category: category.id}) }}">Crea thread</a>*/
/* */
/*         {% include '@GdrGame/Forum/listThreads.html.twig' %}*/
/* */
/*         <a class="button" href="{{ path('bacheca-create-thread', {category: category.id}) }}">Crea thread</a>*/
/*     </div>*/
/* {% endblock %}*/
