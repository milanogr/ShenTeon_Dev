<?php

/* GdrGameBundle:Admin:assignItem.html.twig */
class __TwigTemplate_2d3327d217f24b2e2f0c9d125160fcb9c150ab6d612aad5745e5fa899cf9ee78 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Admin:assignItem.html.twig", 1);
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
        echo "
    <div class=\"page-admin\">

        <h2><span>Admin - Assegna oggetto in inventario</span></h2>

        <div class=\"centered-form\">
            <div class=\"errors\">
                ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 16
            echo "
                    <p><strong>";
            // line 17
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "</strong></p>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 20
            echo "                    <p><strong>";
            echo twig_escape_filter($this->env, $context["error"], "html", null, true);
            echo "</strong></p>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "            </div>

            <form action=\"\" method=\"POST\">
                <label>ID oggetto</label>
                ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "item", array()), 'widget');
        echo "

                <label>Quantità</label>
                ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "quantity", array()), 'widget');
        echo "

                <label>Nome destinatario</label>
                ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "destinatario", array()), 'widget');
        echo "

                ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

                <button type=\"submit\">Inserisci in Inventario</button>
            </form>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Admin:assignItem.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 34,  98 => 32,  92 => 29,  86 => 26,  80 => 22,  71 => 20,  66 => 19,  58 => 17,  55 => 16,  51 => 15,  42 => 8,  39 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Default:innerContent.html.twig' %}*/
/* */
/* {% block goBack %}*/
/*     {{ render(controller('GdrGameBundle:Location:renderGoBack')) }}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     <div class="page-admin">*/
/* */
/*         <h2><span>Admin - Assegna oggetto in inventario</span></h2>*/
/* */
/*         <div class="centered-form">*/
/*             <div class="errors">*/
/*                 {% for flashMessage in app.session.flashbag.get('success') %}*/
/* */
/*                     <p><strong>{{ flashMessage }}</strong></p>*/
/*                 {% endfor %}*/
/*                 {% for error in errors %}*/
/*                     <p><strong>{{ error }}</strong></p>*/
/*                 {% endfor %}*/
/*             </div>*/
/* */
/*             <form action="" method="POST">*/
/*                 <label>ID oggetto</label>*/
/*                 {{ form_widget(form.item) }}*/
/* */
/*                 <label>Quantità</label>*/
/*                 {{ form_widget(form.quantity) }}*/
/* */
/*                 <label>Nome destinatario</label>*/
/*                 {{ form_widget(form.destinatario) }}*/
/* */
/*                 {{ form_rest(form) }}*/
/* */
/*                 <button type="submit">Inserisci in Inventario</button>*/
/*             </form>*/
/*         </div>*/
/*     </div>*/
/* */
/* {% endblock %}*/
