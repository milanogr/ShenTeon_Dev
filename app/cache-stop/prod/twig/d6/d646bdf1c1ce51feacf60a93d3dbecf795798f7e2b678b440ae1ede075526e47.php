<?php

/* GdrUserBundle:Login:doReset.html.twig */
class __TwigTemplate_ee76d5f89efad79bf3584282814fba942588bcf2a4eb54ea5d2d5edc205757c8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrSiteBundle::layout.html.twig", "GdrUserBundle:Login:doReset.html.twig", 1);
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
    <h2>Cambia la password</h2>

    <p>Ora puoi cambiare la tua password. Una volta cliccato conferma non riceverai la tua nuova password per email,
        per cui sii sicuro di ricordartela.</p>

    ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 11
            echo "        <div class=\"flash-success\">
            <p>";
            // line 12
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "</p>
            <p>Ora puoi <a href=\"";
            // line 13
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\" title=\"Login\">effettuare il login</a> con la tua nuova password.</p>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 17
            echo "        <div class=\"flash-error\">
            <p>";
            // line 18
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "</p>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "
    <form action=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_do_reset", array("token" => (isset($context["token"]) ? $context["token"] : null), "email" => (isset($context["email"]) ? $context["email"] : null))), "html", null, true);
        echo "\" method=\"POST\">

        ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "first", array()), 'label');
        echo "
        ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "first", array()), 'widget');
        echo "
        ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "first", array()), 'errors');
        echo "

        ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "second", array()), 'label');
        echo "
        ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "second", array()), 'widget');
        echo "
        ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "second", array()), 'errors');
        echo "

        ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

        <button type=\"submit\" formnovalidate>Conferma la nuova password</button>
    </form>
";
    }

    public function getTemplateName()
    {
        return "GdrUserBundle:Login:doReset.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 32,  105 => 30,  101 => 29,  97 => 28,  92 => 26,  88 => 25,  84 => 24,  79 => 22,  76 => 21,  67 => 18,  64 => 17,  59 => 16,  50 => 13,  46 => 12,  43 => 11,  39 => 10,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrSiteBundle::layout.html.twig' %}*/
/* */
/* {% block content %}*/
/* */
/*     <h2>Cambia la password</h2>*/
/* */
/*     <p>Ora puoi cambiare la tua password. Una volta cliccato conferma non riceverai la tua nuova password per email,*/
/*         per cui sii sicuro di ricordartela.</p>*/
/* */
/*     {% for flashMessage in app.session.flashbag.get('success') %}*/
/*         <div class="flash-success">*/
/*             <p>{{ flashMessage }}</p>*/
/*             <p>Ora puoi <a href="{{ path('login') }}" title="Login">effettuare il login</a> con la tua nuova password.</p>*/
/*         </div>*/
/*     {% endfor %}*/
/*     {% for flashMessage in app.session.flashbag.get('error') %}*/
/*         <div class="flash-error">*/
/*             <p>{{ flashMessage }}</p>*/
/*         </div>*/
/*     {% endfor %}*/
/* */
/*     <form action="{{ path('user_do_reset', {token: token, email: email}) }}" method="POST">*/
/* */
/*         {{ form_label(form.plainPassword.first) }}*/
/*         {{ form_widget(form.plainPassword.first) }}*/
/*         {{ form_errors(form.plainPassword.first) }}*/
/* */
/*         {{ form_label(form.plainPassword.second) }}*/
/*         {{ form_widget(form.plainPassword.second) }}*/
/*         {{ form_errors(form.plainPassword.second) }}*/
/* */
/*         {{ form_rest(form) }}*/
/* */
/*         <button type="submit" formnovalidate>Conferma la nuova password</button>*/
/*     </form>*/
/* {% endblock %}*/
