<?php

/* GdrUserBundle:Login:login.html.twig */
class __TwigTemplate_e91ddbd73c5036dd7c072b0aeca8ca1ed79d30664d08e0f57c33abf494b5ad67 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrSiteBundle::layout.html.twig", "GdrUserBundle:Login:login.html.twig", 1);
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
    <h2>Login - Accedi al gioco</h2>

    <p>Attraverso questo form puoi effettuare l'accesso al gioco. Se non sei registrato, <a
                href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("user_register");
        echo "\" title=\"Registrati ora\">clicca qui</a> per farlo subito!</p>

    <p>Ti suggeriamo di mantenere sempre il tuo browser aggiornato per usufruire al meglio di questo gioco.</p>

    <div class=\"form-centered\">
        ";
        // line 13
        $this->loadTemplate("@GdrUser/Login/login.ajax.html.twig", "GdrUserBundle:Login:login.html.twig", 13)->display($context);
        // line 14
        echo "    </div>

    <p><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("user_reset");
        echo "\">Password dimenticata?</a></p>

";
    }

    public function getTemplateName()
    {
        return "GdrUserBundle:Login:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 16,  47 => 14,  45 => 13,  37 => 8,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "GdrSiteBundle::layout.html.twig" %}*/
/* */
/* {% block content %}*/
/* */
/*     <h2>Login - Accedi al gioco</h2>*/
/* */
/*     <p>Attraverso questo form puoi effettuare l'accesso al gioco. Se non sei registrato, <a*/
/*                 href="{{ path('user_register') }}" title="Registrati ora">clicca qui</a> per farlo subito!</p>*/
/* */
/*     <p>Ti suggeriamo di mantenere sempre il tuo browser aggiornato per usufruire al meglio di questo gioco.</p>*/
/* */
/*     <div class="form-centered">*/
/*         {% include '@GdrUser/Login/login.ajax.html.twig' %}*/
/*     </div>*/
/* */
/*     <p><a href="{{ path('user_reset') }}">Password dimenticata?</a></p>*/
/* */
/* {% endblock %}*/
