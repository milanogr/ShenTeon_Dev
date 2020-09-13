<?php

/* @GdrUser/Login/login.ajax.html.twig */
class __TwigTemplate_192ef172db282058179a87213ac2d37e890d6ad5f680b8fd3638fcfcfbabe57f extends Twig_Template
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
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
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
            if ((isset($context["error"]) ? $context["error"] : null)) {
                // line 9
                echo "        <p class=\"flash-error\">
            ";
                // line 10
                if (($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "message", array()) == "Bad credentials")) {
                    // line 11
                    echo "                Email e/o password non valide
            ";
                } else {
                    // line 13
                    echo "                ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "message", array()), "html", null, true);
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
            echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
            echo "\"/>

        <label for=\"password\">Password:</label>
        <input type=\"password\" id=\"password\" name=\"_password\"/>

        <input type=\"hidden\" name=\"_csrf_token\" value=\"";
            // line 25
            echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
            echo "\"/>

        <button class=\"button\" type=\"submit\">Effettua il login</button>
    </form>

";
        }
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
        return array (  74 => 25,  66 => 20,  61 => 18,  58 => 17,  54 => 15,  48 => 13,  44 => 11,  42 => 10,  39 => 9,  37 => 8,  34 => 7,  28 => 4,  24 => 3,  21 => 2,  19 => 1,);
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
