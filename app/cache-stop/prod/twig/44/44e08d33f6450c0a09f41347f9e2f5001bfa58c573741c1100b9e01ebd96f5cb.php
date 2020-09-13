<?php

/* GdrGameBundle:Forum:newThread.html.twig */
class __TwigTemplate_c4b61a569d353571fa0981c980f8718384e83f7e37d5f8d40b37b790adb8d92c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Forum:index.html.twig", "GdrGameBundle:Forum:newThread.html.twig", 1);
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
        <h1><span>Crea un nuovo thread</span></h1>

       ";
        // line 7
        if (array_key_exists("backLink", $context)) {
            // line 8
            echo "           <a class=\"button\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["backLink"]) ? $context["backLink"] : null), "html", null, true);
            echo "\">← Torna indietro</a>
       ";
        } else {
            // line 10
            echo "           <a class=\"button\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-lista-threads", array("category" => (isset($context["category"]) ? $context["category"] : null))), "html", null, true);
            echo "\">← Torna indietro</a>
       ";
        }
        // line 12
        echo "
        <form method=\"POST\" action=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-thread", array("category" => (isset($context["category"]) ? $context["category"] : null))), "html", null, true);
        echo "\">
            ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "

            ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

            <button type=\"submit\">Crea Thread</button>
        </form>
    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Forum:newThread.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 16,  57 => 14,  53 => 13,  50 => 12,  44 => 10,  38 => 8,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Forum:index.html.twig' %}*/
/* */
/* {% block content %}*/
/*     <div id="forum-container">*/
/*         <h1><span>Crea un nuovo thread</span></h1>*/
/* */
/*        {% if backLink is defined %}*/
/*            <a class="button" href="{{ backLink }}">← Torna indietro</a>*/
/*        {% else %}*/
/*            <a class="button" href="{{ path('bacheca-lista-threads', {category: category}) }}">← Torna indietro</a>*/
/*        {% endif %}*/
/* */
/*         <form method="POST" action="{{ path('bacheca-create-thread', {category: category}) }}">*/
/*             {{ form_errors(form) }}*/
/* */
/*             {{ form_rest(form) }}*/
/* */
/*             <button type="submit">Crea Thread</button>*/
/*         </form>*/
/*     </div>*/
/* {% endblock %}*/
