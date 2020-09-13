<?php

/* GdrUserBundle:Login:login_form.html.twig */
class __TwigTemplate_88e7ae0331af58420ae9d4f8efa9a9ba0f8e9c578631372c69b4c61f20c38493 extends Twig_Template
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
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "\"/>
            <button class=\"small button-primary\" type=\"submit\">Entra</button>
        </div>
    </div>
</form>";
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
        return array (  40 => 15,  34 => 12,  19 => 1,);
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
