<?php

/* GdrGameBundle:Default:reveal.html.twig */
class __TwigTemplate_0d92371a305f9c6efa0af28d43b3eb8f86a54ee7a03a20e60d6c2391406ee83e extends Twig_Template
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
        echo "<div id=\"";
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "-popup\" class=\"reveal-modal gdr ";
        echo twig_escape_filter($this->env, (isset($context["size"]) ? $context["size"] : null), "html", null, true);
        echo "\">
    <a class=\"close-reveal-modal\">&#215;</a>
    <div class=\"reveal-top-left\"></div><div class=\"reveal-top-right\"></div>
    <div class=\"reveal-bottom-left\"></div><div class=\"reveal-bottom-right\"></div>

    <div class=\"reveal-content\"></div>
</div>";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Default:reveal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* <div id="{{ name }}-popup" class="reveal-modal gdr {{ size }}">*/
/*     <a class="close-reveal-modal">&#215;</a>*/
/*     <div class="reveal-top-left"></div><div class="reveal-top-right"></div>*/
/*     <div class="reveal-bottom-left"></div><div class="reveal-bottom-right"></div>*/
/* */
/*     <div class="reveal-content"></div>*/
/* </div>*/
