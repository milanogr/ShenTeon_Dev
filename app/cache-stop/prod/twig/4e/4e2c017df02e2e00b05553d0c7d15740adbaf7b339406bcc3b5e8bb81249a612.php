<?php

/* GdrGameBundle:Forum:threads.html.twig */
class __TwigTemplate_90150118412debefd618c1d1abc39fb67f3a9780297767ccfb3c82ce633eccfb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Forum:index.html.twig", "GdrGameBundle:Forum:threads.html.twig", 1);
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
        <h1><span>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["category"]) ? $context["category"] : null), "forum", array()), "name", array()), "html", null, true);
        echo "</span></h1>


        <a class=\"button\" href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("bacheca-index");
        echo "\">← Torna alla bacheca</a>

        ";
        // line 11
        if ((isset($context["canWriteSoul"]) ? $context["canWriteSoul"] : null)) {
            // line 12
            echo "            <a class=\"button\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-thread", array("category" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id", array()))), "html", null, true);
            echo "\">Crea thread</a>
        ";
        } else {
            // line 14
            echo "            <a class=\"button\">Le anime non possono scrivere qui</a>
        ";
        }
        // line 16
        echo "
        ";
        // line 17
        $this->loadTemplate("@GdrGame/Forum/listThreads.html.twig", "GdrGameBundle:Forum:threads.html.twig", 17)->display($context);
        // line 18
        echo "
        <a class=\"button\" href=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("bacheca-index");
        echo "\">← Torna alla bacheca</a>

        ";
        // line 21
        if ((isset($context["canWriteSoul"]) ? $context["canWriteSoul"] : null)) {
            // line 22
            echo "            <a class=\"button\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-thread", array("category" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id", array()))), "html", null, true);
            echo "\">Crea thread</a>
        ";
        } else {
            // line 24
            echo "            <a class=\"button\">Le anime non possono scrivere qui</a>
        ";
        }
        // line 26
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Forum:threads.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 26,  79 => 24,  73 => 22,  71 => 21,  66 => 19,  63 => 18,  61 => 17,  58 => 16,  54 => 14,  48 => 12,  46 => 11,  41 => 9,  35 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Forum:index.html.twig' %}*/
/* */
/* {% block content %}*/
/* */
/*     <div id="forum-container">*/
/*         <h1><span>{{ category.forum.name }}</span></h1>*/
/* */
/* */
/*         <a class="button" href="{{ path('bacheca-index') }}">← Torna alla bacheca</a>*/
/* */
/*         {% if canWriteSoul %}*/
/*             <a class="button" href="{{ path('bacheca-create-thread', {category: category.id}) }}">Crea thread</a>*/
/*         {% else %}*/
/*             <a class="button">Le anime non possono scrivere qui</a>*/
/*         {% endif %}*/
/* */
/*         {% include '@GdrGame/Forum/listThreads.html.twig' %}*/
/* */
/*         <a class="button" href="{{ path('bacheca-index') }}">← Torna alla bacheca</a>*/
/* */
/*         {% if canWriteSoul %}*/
/*             <a class="button" href="{{ path('bacheca-create-thread', {category: category.id}) }}">Crea thread</a>*/
/*         {% else %}*/
/*             <a class="button">Le anime non possono scrivere qui</a>*/
/*         {% endif %}*/
/*     </div>*/
/* {% endblock %}*/
