<?php

/* GdrAvatarBundle:Diary:form.html.twig */
class __TwigTemplate_833579000f58210404dcad29b23964ed3483544605da5fd52230d3358ca8bbc9 extends Twig_Template
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
        // line 1
        echo "<h3>";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</h3>

<form id=\"diary-new-page\" action=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
        echo "\" method=\"POST\">
    ";
        // line 4
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'label');
        echo "
    ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'errors');
        echo "
    ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'widget');
        echo "

    ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "body", array()), 'label');
        echo "
    ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "body", array()), 'errors');
        echo "
    ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "body", array()), 'widget');
        echo "

    ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

    <div class=\"text-centered\">
        <button class=\"submit-page\" type=\"submit\">Salva la pagina</button>
    </div>
</form>";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Diary:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 12,  50 => 10,  46 => 9,  42 => 8,  37 => 6,  33 => 5,  29 => 4,  25 => 3,  19 => 1,);
    }
}
/* <h3>{{ title }}</h3>*/
/* */
/* <form id="diary-new-page" action="{{ url }}" method="POST">*/
/*     {{ form_label(form.title) }}*/
/*     {{ form_errors(form.title) }}*/
/*     {{ form_widget(form.title) }}*/
/* */
/*     {{ form_label(form.body) }}*/
/*     {{ form_errors(form.body) }}*/
/*     {{ form_widget(form.body) }}*/
/* */
/*     {{ form_rest(form) }}*/
/* */
/*     <div class="text-centered">*/
/*         <button class="submit-page" type="submit">Salva la pagina</button>*/
/*     </div>*/
/* </form>*/
