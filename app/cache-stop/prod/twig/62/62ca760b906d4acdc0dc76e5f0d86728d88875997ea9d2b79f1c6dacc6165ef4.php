<?php

/* @GdrGame/Anagrafe/filter.html.twig */
class __TwigTemplate_cbe117e8d8a21ac5e0a15242383f27c388cdbb517ab8e40bee3fc92e668fd952 extends Twig_Template
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
        echo "<div class=\"form-centered centered-form\">
    <form method=\"get\" action=\"";
        // line 2
        echo $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null));
        echo "\">
        <input placeholder=\"Scrivi il nome del personaggio da cercare\" type=\"text\" name=\"byName\"";
        // line 3
        if ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "byName", array(), "any", true, true)) {
            echo " value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "byName", array()), "html", null, true);
            echo "\"";
        }
        echo ">
        <button type=\"submit\">Cerca il Personaggio</button>
    </form>
</div>";
    }

    public function getTemplateName()
    {
        return "@GdrGame/Anagrafe/filter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 3,  22 => 2,  19 => 1,);
    }
}
/* <div class="form-centered centered-form">*/
/*     <form method="get" action="{{ path(route) }}">*/
/*         <input placeholder="Scrivi il nome del personaggio da cercare" type="text" name="byName"{% if filter.byName is defined %} value="{{ filter.byName }}"{% endif %}>*/
/*         <button type="submit">Cerca il Personaggio</button>*/
/*     </form>*/
/* </div>*/
