<?php

/* GdrAvatarBundle:Fate:index.html.twig */
class __TwigTemplate_95abdddc07bd1bf7ea29b7acc38e4376d2de5bd662499e6b52e3a416b881a69e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrAvatarBundle:Fate:index.html.twig", 1);
        $this->blocks = array(
            'goBack' => array($this, 'block_goBack'),
            'javascripts' => array($this, 'block_javascripts'),
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
    public function block_javascripts($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"page-mod\">
        <h1><span>Gestione fato</span></h1>

        <div class=\"centered-form\">
            <h3>Uccidi PG</h3>

            <form method=\"post\" action=\"\">

                <label>Nome Personaggio</label>
                ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name", array()), 'widget');
        echo "
                <div class=\"error\">";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name", array()), 'errors');
        echo "</div>
                ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

                <button class=\"button confirmation-action\" type=\"submit\">Uccidi PG</button>
            </form>

            <h3>Resuscita PG</h3>

            <form method=\"post\" action=\"\">
                <label>Nome Personaggio</label>
                ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : null), "name", array()), 'widget');
        echo "
                <div class=\"error\">";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : null), "name", array()), 'errors');
        echo "</div>
                ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form2"]) ? $context["form2"] : null), 'rest');
        echo "

                <button class=\"button confirmation-action\" type=\"submit\">Resuscita PG</button>
            </form>

            <p>
                <stronga>Nota:</stronga>
                ricordatevi di avvertire il giocatore se è in chat di uscire dalla chat e rientrare dalla stessa.
            </p>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Fate:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 34,  88 => 33,  84 => 32,  72 => 23,  68 => 22,  64 => 21,  53 => 12,  50 => 11,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Default:innerContent.html.twig' %}*/
/* */
/* {% block goBack %}*/
/*     {{ render(controller('GdrGameBundle:Location:renderGoBack')) }}*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/*     <div class="page-mod">*/
/*         <h1><span>Gestione fato</span></h1>*/
/* */
/*         <div class="centered-form">*/
/*             <h3>Uccidi PG</h3>*/
/* */
/*             <form method="post" action="">*/
/* */
/*                 <label>Nome Personaggio</label>*/
/*                 {{ form_widget(form.name) }}*/
/*                 <div class="error">{{ form_errors(form.name) }}</div>*/
/*                 {{ form_rest(form) }}*/
/* */
/*                 <button class="button confirmation-action" type="submit">Uccidi PG</button>*/
/*             </form>*/
/* */
/*             <h3>Resuscita PG</h3>*/
/* */
/*             <form method="post" action="">*/
/*                 <label>Nome Personaggio</label>*/
/*                 {{ form_widget(form2.name) }}*/
/*                 <div class="error">{{ form_errors(form2.name) }}</div>*/
/*                 {{ form_rest(form2) }}*/
/* */
/*                 <button class="button confirmation-action" type="submit">Resuscita PG</button>*/
/*             </form>*/
/* */
/*             <p>*/
/*                 <stronga>Nota:</stronga>*/
/*                 ricordatevi di avvertire il giocatore se è in chat di uscire dalla chat e rientrare dalla stessa.*/
/*             </p>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
