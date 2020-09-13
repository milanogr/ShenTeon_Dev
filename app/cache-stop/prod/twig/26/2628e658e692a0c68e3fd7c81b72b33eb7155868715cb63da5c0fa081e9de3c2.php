<?php

/* GdrUserBundle:Login:reset.html.twig */
class __TwigTemplate_338d738157ef2d0defb6b0d4fff5e92961ac2692a03f2e5afbed9ad723198ebd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrSiteBundle::layout.html.twig", "GdrUserBundle:Login:reset.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GdrSiteBundle::layout.html.twig";
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
    <h2>Recupera la tua password</h2>

    <p>Attraverso questo modulo puoi recuperare la password del tuo account, fornendo l'email attraverso cui ti sei
        registrato.
        Se non ricordi nemmeno l'email, utilizza il link \"assistenza\" alla fine della pagina per contattare il supporto. Ogni
        tentativo verrà salvato nel sistema.</p>

    ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 13
            echo "        <div class=\"flash-success\">
            ";
            // line 14
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "
    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 19
            echo "        <div class=\"flash-error\">
            ";
            // line 20
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "
    <form action=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("user_reset");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo ">

        ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'label');
        echo "
        ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'widget');
        echo "
        ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'errors');
        echo "

        ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

        <button type=\"submit\" value=\"Recupera la password\" formnovalidate class=\"button medium\">Recupera la password
        </button>
    </form>
";
    }

    public function getTemplateName()
    {
        return "GdrUserBundle:Login:reset.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 30,  94 => 28,  90 => 27,  86 => 26,  79 => 24,  76 => 23,  67 => 20,  64 => 19,  60 => 18,  57 => 17,  48 => 14,  45 => 13,  41 => 12,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrSiteBundle::layout.html.twig' %}*/
/* */
/* {% block content %}*/
/* */
/*     <h2>Recupera la tua password</h2>*/
/* */
/*     <p>Attraverso questo modulo puoi recuperare la password del tuo account, fornendo l'email attraverso cui ti sei*/
/*         registrato.*/
/*         Se non ricordi nemmeno l'email, utilizza il link "assistenza" alla fine della pagina per contattare il supporto. Ogni*/
/*         tentativo verrà salvato nel sistema.</p>*/
/* */
/*     {% for flashMessage in app.session.flashbag.get('success') %}*/
/*         <div class="flash-success">*/
/*             {{ flashMessage }}*/
/*         </div>*/
/*     {% endfor %}*/
/* */
/*     {% for flashMessage in app.session.flashbag.get('error') %}*/
/*         <div class="flash-error">*/
/*             {{ flashMessage }}*/
/*         </div>*/
/*     {% endfor %}*/
/* */
/*     <form action="{{ path('user_reset') }}" method="post" {{ form_enctype(form) }}>*/
/* */
/*         {{ form_label(form.email) }}*/
/*         {{ form_widget(form.email) }}*/
/*         {{ form_errors(form.email) }}*/
/* */
/*         {{ form_rest(form) }}*/
/* */
/*         <button type="submit" value="Recupera la password" formnovalidate class="button medium">Recupera la password*/
/*         </button>*/
/*     </form>*/
/* {% endblock %}*/
