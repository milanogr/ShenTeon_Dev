<?php

/* @Twig/Exception/error.html.twig */
class __TwigTemplate_6b6abcd8302b7229652881b9e1912b1421f763dab03b4f2c14ce17c3345ece88 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <title>Si è verificato un errore: ";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : null), "html", null, true);
        echo "</title>

    <style>
        html, body {
            background-color: black;
            height: 100%;
            width: 100%;
            color: #e6e6e6;
        }

        .container {
            width: 600px;
            margin: 0 auto;
        }

        a {
            color: #e6e6e6;
        }
    </style>
</head>
<body>
<div class=\"container\">
    <h1>Oops! Si è verificato un errore :(</h1>
    <h2>Il server ha restituito un \"";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : null), "html", null, true);
        echo "\".</h2>

    <p><a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("site_homepage");
        echo "\">Torna alla homepage</a></p>
</div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "@Twig/Exception/error.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 30,  51 => 28,  25 => 5,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />*/
/*     <title>Si è verificato un errore: {{ status_text }}</title>*/
/* */
/*     <style>*/
/*         html, body {*/
/*             background-color: black;*/
/*             height: 100%;*/
/*             width: 100%;*/
/*             color: #e6e6e6;*/
/*         }*/
/* */
/*         .container {*/
/*             width: 600px;*/
/*             margin: 0 auto;*/
/*         }*/
/* */
/*         a {*/
/*             color: #e6e6e6;*/
/*         }*/
/*     </style>*/
/* </head>*/
/* <body>*/
/* <div class="container">*/
/*     <h1>Oops! Si è verificato un errore :(</h1>*/
/*     <h2>Il server ha restituito un "{{ status_code }} {{ status_text }}".</h2>*/
/* */
/*     <p><a href="{{ path('site_homepage') }}">Torna alla homepage</a></p>*/
/* </div>*/
/* </body>*/
/* </html>*/
