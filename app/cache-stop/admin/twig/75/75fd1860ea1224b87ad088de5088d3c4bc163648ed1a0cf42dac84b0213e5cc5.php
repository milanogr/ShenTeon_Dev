<?php

/* GdrUserBundle:Login:login_form.html.twig */
class __TwigTemplate_6b2982abc5f7f66997c09cdd9447388f66a8ee6a469b4e3c3f9d397da77c93b9 extends Twig_Template
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
        $__internal_c40b2e74a2262fde8a139eedd69cfd338d41c9127227327e7d102300bba7abad = $this->env->getExtension("native_profiler");
        $__internal_c40b2e74a2262fde8a139eedd69cfd338d41c9127227327e7d102300bba7abad->enter($__internal_c40b2e74a2262fde8a139eedd69cfd338d41c9127227327e7d102300bba7abad_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GdrUserBundle:Login:login_form.html.twig"));

        // line 1
        echo "<form action=\"";
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\">
    <div class=\"row\">
        <div class=\"large-2 columns\"><label>Email:</label></div>
        <div class=\"large-10 columns\"><input type=\"text\" id=\"username\" name=\"_username\" placeholder=\"La tua email\"/></div>
    </div>
    <div class=\"row\">
        <div class=\"large-2 columns\"><label>Pass:</label></div>
        <div class=\"large-10 columns\"><input type=\"password\" id=\"password\" name=\"_password\" placeholder=\"La tua password\"/></div>
    </div>
    <div class=\"fullrow\">
        <div class=\"width-70\">
            <a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("user_reset");
        echo "\" title=\"Recupera la tua password\">Password dimenticata?</a>
        </div>
        <div class=\"width-30\">
            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\"/>
            <button class=\"small button-primary\" type=\"submit\">Entra</button>
        </div>
    </div>
</form>";
        
        $__internal_c40b2e74a2262fde8a139eedd69cfd338d41c9127227327e7d102300bba7abad->leave($__internal_c40b2e74a2262fde8a139eedd69cfd338d41c9127227327e7d102300bba7abad_prof);

    }

    public function getTemplateName()
    {
        return "GdrUserBundle:Login:login_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 15,  37 => 12,  22 => 1,);
    }
}
/* <form action="{{ path('login_check') }}" method="post">*/
/*     <div class="row">*/
/*         <div class="large-2 columns"><label>Email:</label></div>*/
/*         <div class="large-10 columns"><input type="text" id="username" name="_username" placeholder="La tua email"/></div>*/
/*     </div>*/
/*     <div class="row">*/
/*         <div class="large-2 columns"><label>Pass:</label></div>*/
/*         <div class="large-10 columns"><input type="password" id="password" name="_password" placeholder="La tua password"/></div>*/
/*     </div>*/
/*     <div class="fullrow">*/
/*         <div class="width-70">*/
/*             <a href="{{ path('user_reset') }}" title="Recupera la tua password">Password dimenticata?</a>*/
/*         </div>*/
/*         <div class="width-30">*/
/*             <input type="hidden" name="_csrf_token" value="{{ csrf_token }}"/>*/
/*             <button class="small button-primary" type="submit">Entra</button>*/
/*         </div>*/
/*     </div>*/
/* </form>*/
