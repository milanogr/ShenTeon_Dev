<?php

/* GdrGameBundle:Archivio:showItem.html.twig */
class __TwigTemplate_e8c6dcd3d8f28b6fc3545f35407643383bfb62cb189aecee6d8b1afb3a157490 extends Twig_Template
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
        echo "<h2>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["book"]) ? $context["book"] : null), "title", array()), "html", null, true);
        echo "</h2>

";
        // line 3
        echo $this->getAttribute((isset($context["book"]) ? $context["book"] : null), "body", array());
        echo "

<hr>

<p style=\"text-align: right\"><i>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["book"]) ? $context["book"] : null), "author", array()), "html", null, true);
        echo "</i></p>";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Archivio:showItem.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 7,  25 => 3,  19 => 1,);
    }
}
/* <h2>{{ book.title }}</h2>*/
/* */
/* {{ book.body|raw }}*/
/* */
/* <hr>*/
/* */
/* <p style="text-align: right"><i>{{ book.author }}</i></p>*/
