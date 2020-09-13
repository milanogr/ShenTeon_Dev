<?php

/* GdrUserBundle:Login:login.html.twig */
class __TwigTemplate_d2765e9ebb458cb80d2e7012f44b14d4de12c263ea2dddea901396ec80648afd extends Twig_Template
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
        $__internal_6dd0069586104712f185353dc110a21d086d6501f0f26d3c02809577bfca0e83 = $this->env->getExtension("native_profiler");
        $__internal_6dd0069586104712f185353dc110a21d086d6501f0f26d3c02809577bfca0e83->enter($__internal_6dd0069586104712f185353dc110a21d086d6501f0f26d3c02809577bfca0e83_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GdrUserBundle:Login:login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6dd0069586104712f185353dc110a21d086d6501f0f26d3c02809577bfca0e83->leave($__internal_6dd0069586104712f185353dc110a21d086d6501f0f26d3c02809577bfca0e83_prof);

    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        $__internal_bb9ef4cde1f6baf81d83c6f1613a9919a138778539c63997d37db0d1bddd67d9 = $this->env->getExtension("native_profiler");
        $__internal_bb9ef4cde1f6baf81d83c6f1613a9919a138778539c63997d37db0d1bddd67d9->enter($__internal_bb9ef4cde1f6baf81d83c6f1613a9919a138778539c63997d37db0d1bddd67d9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

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
        
        $__internal_bb9ef4cde1f6baf81d83c6f1613a9919a138778539c63997d37db0d1bddd67d9->leave($__internal_bb9ef4cde1f6baf81d83c6f1613a9919a138778539c63997d37db0d1bddd67d9_prof);

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
        return array (  60 => 16,  56 => 14,  54 => 13,  46 => 8,  40 => 4,  34 => 3,  11 => 1,);
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
