<?php

/* GdrGameBundle:Letter:reply.html.twig */
class __TwigTemplate_3d515277d2a1e4b9c38b086dbec4cf3e799f76a38b54c814294f63eb44778df6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Letter:index.html.twig", "GdrGameBundle:Letter:reply.html.twig", 1);
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
        <h1><span>Rispondi alla missiva</span></h1>

        <a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("missive-index");
        echo "\" class=\"button\">
            Torna alla lista
        </a>

        <form action=\"\" method=\"post\" ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo ">
            ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "

            ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "body", array()), 'widget');
        echo "
            ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "body", array()), 'errors');
        echo "

            ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
            <p class=\"text-centered\">
                <button type=\"submit\">Invia la risposta</button>
            </p>
        </form>

        <hr>

        <div id=\"old-letter\">
            ";
        // line 27
        echo (isset($context["oldLetter"]) ? $context["oldLetter"] : null);
        echo "
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Letter:reply.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 27,  61 => 18,  56 => 16,  52 => 15,  47 => 13,  43 => 12,  36 => 8,  31 => 5,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Letter:index.html.twig' %}*/
/* */
/* {% block content -%}*/
/* */
/*     <div id="missive-container">*/
/*         <h1><span>Rispondi alla missiva</span></h1>*/
/* */
/*         <a href="{{ path('missive-index') }}" class="button">*/
/*             Torna alla lista*/
/*         </a>*/
/* */
/*         <form action="" method="post" {{ form_enctype(form) }}>*/
/*             {{ form_errors(form) }}*/
/* */
/*             {{ form_widget(form.body) }}*/
/*             {{ form_errors(form.body) }}*/
/* */
/*             {{ form_rest(form) }}*/
/*             <p class="text-centered">*/
/*                 <button type="submit">Invia la risposta</button>*/
/*             </p>*/
/*         </form>*/
/* */
/*         <hr>*/
/* */
/*         <div id="old-letter">*/
/*             {{ oldLetter|raw }}*/
/*         </div>*/
/*     </div>*/
/* */
/* {% endblock %}*/
/* */
