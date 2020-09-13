<?php

/* @GdrUser/Login/login.ajax.html.twig */
class __TwigTemplate_2f1e321ac851b36491cc93bdc8651d5b790d5abe721c1f3255f99bf8fcab4021 extends Twig_Template
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
        $__internal_d09c68e2e03e4db40e8606828795bfed54eda01d2333398f0876437027af06e6 = $this->env->getExtension("native_profiler");
        $__internal_d09c68e2e03e4db40e8606828795bfed54eda01d2333398f0876437027af06e6->enter($__internal_d09c68e2e03e4db40e8606828795bfed54eda01d2333398f0876437027af06e6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@GdrUser/Login/login.ajax.html.twig"));

        // line 1
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            // line 2
            echo "
    <a href=\"";
            // line 3
            echo $this->env->getExtension('routing')->getPath("user_choose_pg");
            echo "\" title=\"Scegli il tuo personaggio\">Scegli Personaggio</a>
    <a href=\"";
            // line 4
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\" title=\"Esegui il logout\">Logout</a>

";
        } else {
            // line 7
            echo "
    ";
            // line 8
            if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
                // line 9
                echo "        <p class=\"flash-error\">
            ";
                // line 10
                if (($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message", array()) == "Bad credentials")) {
                    // line 11
                    echo "                Email e/o password non valide
            ";
                } else {
                    // line 13
                    echo "                ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message", array()), "html", null, true);
                    echo "
            ";
                }
                // line 15
                echo "        </p>
    ";
            }
            // line 17
            echo "
    <form action=\"";
            // line 18
            echo $this->env->getExtension('routing')->getPath("login_check");
            echo "\" method=\"post\">
        <label for=\"email\">Email:</label>
        <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
            // line 20
            echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
            echo "\"/>

        <label for=\"password\">Password:</label>
        <input type=\"password\" id=\"password\" name=\"_password\"/>

        <input type=\"hidden\" name=\"_csrf_token\" value=\"";
            // line 25
            echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
            echo "\"/>

        <button class=\"button\" type=\"submit\">Effettua il login</button>
    </form>

";
        }
        
        $__internal_d09c68e2e03e4db40e8606828795bfed54eda01d2333398f0876437027af06e6->leave($__internal_d09c68e2e03e4db40e8606828795bfed54eda01d2333398f0876437027af06e6_prof);

    }

    public function getTemplateName()
    {
        return "@GdrUser/Login/login.ajax.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 25,  69 => 20,  64 => 18,  61 => 17,  57 => 15,  51 => 13,  47 => 11,  45 => 10,  42 => 9,  40 => 8,  37 => 7,  31 => 4,  27 => 3,  24 => 2,  22 => 1,);
    }
}
/* {% if app.user %}*/
/* */
/*     <a href="{{ path('user_choose_pg') }}" title="Scegli il tuo personaggio">Scegli Personaggio</a>*/
/*     <a href="{{ path('logout') }}" title="Esegui il logout">Logout</a>*/
/* */
/* {% else %}*/
/* */
/*     {% if error %}*/
/*         <p class="flash-error">*/
/*             {% if error.message == 'Bad credentials' %}*/
/*                 Email e/o password non valide*/
/*             {% else %}*/
/*                 {{ error.message }}*/
/*             {% endif %}*/
/*         </p>*/
/*     {% endif %}*/
/* */
/*     <form action="{{ path('login_check') }}" method="post">*/
/*         <label for="email">Email:</label>*/
/*         <input type="text" id="username" name="_username" value="{{ last_username }}"/>*/
/* */
/*         <label for="password">Password:</label>*/
/*         <input type="password" id="password" name="_password"/>*/
/* */
/*         <input type="hidden" name="_csrf_token" value="{{ csrf_token }}"/>*/
/* */
/*         <button class="button" type="submit">Effettua il login</button>*/
/*     </form>*/
/* */
/* {% endif %}*/
