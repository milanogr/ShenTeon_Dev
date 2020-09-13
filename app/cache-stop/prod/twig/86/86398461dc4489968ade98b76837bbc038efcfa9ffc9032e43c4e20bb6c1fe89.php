<?php

/* GdrGameBundle:Letter:create.html.twig */
class __TwigTemplate_18985481123937e28dc19fd2d2fa60ca1784d94c1bfe4abaa8278ab62e8714e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Letter:index.html.twig", "GdrGameBundle:Letter:create.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GdrGameBundle:Letter:index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "<div id=\"missive-container\">
        <h1><span>Scrivi una nuova missiva</span></h1>

        <a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("missive-index");
        echo "\" class=\"button\">
            Torna alla lista
        </a>

        ";
        // line 12
        if ((isset($context["thread"]) ? $context["thread"] : null)) {
            // line 13
            echo "            <div class=\"segnala-thread\">
                <p>Stai segnalando il thread <strong>";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "title", array()), "html", null, true);
            echo "</strong> di ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "author", array()), "html", null, true);
            echo ".</p>
            </div>
        ";
        }
        // line 17
        echo "
        <form action=\"\" method=\"post\" ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo ">

            ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "category", array()), 'row');
        echo "

            ";
        // line 22
        if ((isset($context["isForGroup"]) ? $context["isForGroup"] : null)) {
            // line 23
            echo "                ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "receiverGroup", array()), 'row');
            echo "
            ";
        } else {
            // line 25
            echo "                ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "receiverName", array()), 'row');
            echo "
            ";
        }
        // line 27
        echo "
            ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "body", array()), 'widget');
        echo "
            ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "body", array()), 'errors');
        echo "

            ";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
            <p class=\"text-centered\">
                <button type=\"submit\">Invia la missiva</button>
            </p>
        </form>
    </div>

";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Letter:create.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 31,  90 => 29,  86 => 28,  83 => 27,  77 => 25,  71 => 23,  69 => 22,  64 => 20,  59 => 18,  56 => 17,  48 => 14,  45 => 13,  43 => 12,  36 => 8,  31 => 5,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Letter:index.html.twig' %}*/
/* */
/* {% block content -%}*/
/* */
/*     <div id="missive-container">*/
/*         <h1><span>Scrivi una nuova missiva</span></h1>*/
/* */
/*         <a href="{{ path('missive-index') }}" class="button">*/
/*             Torna alla lista*/
/*         </a>*/
/* */
/*         {% if thread %}*/
/*             <div class="segnala-thread">*/
/*                 <p>Stai segnalando il thread <strong>{{ thread.title }}</strong> di {{ thread.author }}.</p>*/
/*             </div>*/
/*         {% endif %}*/
/* */
/*         <form action="" method="post" {{ form_enctype(form) }}>*/
/* */
/*             {{ form_row(form.category) }}*/
/* */
/*             {% if isForGroup %}*/
/*                 {{ form_row(form.receiverGroup) }}*/
/*             {% else %}*/
/*                 {{ form_row(form.receiverName) }}*/
/*             {% endif %}*/
/* */
/*             {{ form_widget(form.body) }}*/
/*             {{ form_errors(form.body) }}*/
/* */
/*             {{ form_rest(form) }}*/
/*             <p class="text-centered">*/
/*                 <button type="submit">Invia la missiva</button>*/
/*             </p>*/
/*         </form>*/
/*     </div>*/
/* */
/* {% endblock %}*/
/* */
