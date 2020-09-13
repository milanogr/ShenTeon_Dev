<?php

/* GdrGameBundle:Admin:editPersonage.html.twig */
class __TwigTemplate_7c6693488c109337909a84b7a27555e7c9afe07a2eec59fa0f3c758f8abc87ef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Admin:editPersonage.html.twig", 1);
        $this->blocks = array(
            'goBack' => array($this, 'block_goBack'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GdrGameBundle:Default:innerContent.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_goBack($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Location:renderGoBack"));
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    <div class=\"page-create-step1\">
        <h1><span>Modifica razza pg</span></h1>

        <div class=\"form-centered centered-form\">

            ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 14
            echo "                <div class=\"flash-notice\">
                    <p class=\"text-centered\"><strong>";
            // line 15
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "</strong></p>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "
            <form action=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("g-edit-pg");
        echo "\" method=\"POST\">

                <label>Nome personaggio</label>
                ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "personage", array()), 'widget');
        echo "
                ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "personage", array()), 'errors');
        echo "

                <label>Nuova razza</label>
                ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "race", array()), 'widget');
        echo "
                ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

                <button type=\"submit\" formnovalidate>Procedi ai connotati</button>
            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Admin:editPersonage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 27,  84 => 26,  78 => 23,  74 => 22,  68 => 19,  65 => 18,  56 => 15,  53 => 14,  49 => 13,  42 => 8,  39 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Default:innerContent.html.twig' %}*/
/* */
/* {% block goBack %}*/
/*     {{ render(controller('GdrGameBundle:Location:renderGoBack')) }}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/*     <div class="page-create-step1">*/
/*         <h1><span>Modifica razza pg</span></h1>*/
/* */
/*         <div class="form-centered centered-form">*/
/* */
/*             {% for flashMessage in app.session.flashbag.get('success') %}*/
/*                 <div class="flash-notice">*/
/*                     <p class="text-centered"><strong>{{ flashMessage }}</strong></p>*/
/*                 </div>*/
/*             {% endfor %}*/
/* */
/*             <form action="{{ path('g-edit-pg') }}" method="POST">*/
/* */
/*                 <label>Nome personaggio</label>*/
/*                 {{ form_widget(form.personage) }}*/
/*                 {{ form_errors(form.personage) }}*/
/* */
/*                 <label>Nuova razza</label>*/
/*                 {{ form_widget(form.race) }}*/
/*                 {{ form_rest(form) }}*/
/* */
/*                 <button type="submit" formnovalidate>Procedi ai connotati</button>*/
/*             </form>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
