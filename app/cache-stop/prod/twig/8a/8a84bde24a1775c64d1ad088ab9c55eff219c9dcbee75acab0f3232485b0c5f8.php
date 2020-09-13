<?php

/* @Twig/Exception/error404.html.twig */
class __TwigTemplate_dd99d7b83267a4426d3e8e5ab266b027d2a9ae1d68bb2a135350c0e566003c09 extends Twig_Template
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
    <title>Errore: pagina non trovata | Shenteon</title>
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
    <h1>Oops! La pagina non esiste! :(</h1>

    <p>La pagina che hai cercato è stata rimossa dalla magia dello Shen, oppure non è mai esistita.</p>

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
        return "@Twig/Exception/error404.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 30,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />*/
/*     <title>Errore: pagina non trovata | Shenteon</title>*/
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
/*     <h1>Oops! La pagina non esiste! :(</h1>*/
/* */
/*     <p>La pagina che hai cercato è stata rimossa dalla magia dello Shen, oppure non è mai esistita.</p>*/
/* */
/*     <p><a href="{{ path('site_homepage') }}">Torna alla homepage</a></p>*/
/* </div>*/
/* */
/* </body>*/
/* </html>*/
