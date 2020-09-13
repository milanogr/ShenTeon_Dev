<?php

/* @GdrGame/Anagrafe/index.html.twig */
class __TwigTemplate_53721d01c9242f16a656b7adfb1b9cc8a8935cdcd37d99c3d41408ff8865c7da extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "@GdrGame/Anagrafe/index.html.twig", 1);
        $this->blocks = array(
            'goBack' => array($this, 'block_goBack'),
            'javascripts' => array($this, 'block_javascripts'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GdrGameBundle:Default:innerContent.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_goBack($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Location:renderGoBack"));
        echo "
";
    }

    // line 7
    public function block_javascripts($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "
    <div class=\"anagrafe-container\">
        <h1><span>Anagrafe cittadina</span></h1>
        <div class=\"filter\">
            <a ";
        // line 16
        if (((isset($context["typePage"]) ? $context["typePage"] : null) == 1)) {
            echo "class=\"active\"";
        }
        echo " href=\"";
        echo $this->env->getExtension('routing')->getPath("anagrafe-index");
        echo "\">Anagrafe</a>
            <a ";
        // line 17
        if (((isset($context["typePage"]) ? $context["typePage"] : null) == 2)) {
            echo "class=\"active\"";
        }
        echo " href=\"";
        echo $this->env->getExtension('routing')->getPath("anagrafe-matrimoni");
        echo "\">Matrimoni</a>
            <a ";
        // line 18
        if (((isset($context["typePage"]) ? $context["typePage"] : null) == 3)) {
            echo "class=\"active\"";
        }
        echo " href=\"";
        echo $this->env->getExtension('routing')->getPath("anagrafe-divorzi");
        echo "\">Divorzi</a>
        </div>

        ";
        // line 21
        $this->loadTemplate("@GdrGame/Anagrafe/filter.html.twig", "@GdrGame/Anagrafe/index.html.twig", 21)->display(array_merge($context, array("filter" => (isset($context["filter"]) ? $context["filter"] : null), "route" => "anagrafe-index")));
        // line 22
        echo "        ";
        $this->loadTemplate("@GdrGame/Anagrafe/letters.html.twig", "@GdrGame/Anagrafe/index.html.twig", 22)->display(array_merge($context, array("filter" => (isset($context["filter"]) ? $context["filter"] : null), "route" => "anagrafe-index")));
        // line 23
        echo "
        ";
        // line 24
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null), null, (isset($context["filter"]) ? $context["filter"] : null));
        echo "
        ";
        // line 25
        $this->loadTemplate("@GdrGame/Anagrafe/list.html.twig", "@GdrGame/Anagrafe/index.html.twig", 25)->display(array_merge($context, array("personages" => (isset($context["paginator"]) ? $context["paginator"] : null))));
        // line 26
        echo "        ";
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null), null, (isset($context["filter"]) ? $context["filter"] : null));
        echo "
    </div>

";
    }

    public function getTemplateName()
    {
        return "@GdrGame/Anagrafe/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 26,  97 => 25,  93 => 24,  90 => 23,  87 => 22,  85 => 21,  75 => 18,  67 => 17,  59 => 16,  53 => 12,  50 => 11,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Default:innerContent.html.twig' %}*/
/* */
/* {% block goBack %}*/
/*     {{ render(controller('GdrGameBundle:Location:renderGoBack')) }}*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     <div class="anagrafe-container">*/
/*         <h1><span>Anagrafe cittadina</span></h1>*/
/*         <div class="filter">*/
/*             <a {% if typePage == 1 %}class="active"{% endif %} href="{{ path("anagrafe-index") }}">Anagrafe</a>*/
/*             <a {% if typePage == 2 %}class="active"{% endif %} href="{{ path("anagrafe-matrimoni") }}">Matrimoni</a>*/
/*             <a {% if typePage == 3 %}class="active"{% endif %} href="{{ path("anagrafe-divorzi") }}">Divorzi</a>*/
/*         </div>*/
/* */
/*         {% include '@GdrGame/Anagrafe/filter.html.twig' with {filter: filter, route: "anagrafe-index"} %}*/
/*         {% include '@GdrGame/Anagrafe/letters.html.twig' with {filter: filter, route: "anagrafe-index"} %}*/
/* */
/*         {{ knp_pagination_render(paginator, null, filter) }}*/
/*         {% include '@GdrGame/Anagrafe/list.html.twig' with {personages: paginator} %}*/
/*         {{ knp_pagination_render(paginator, null, filter) }}*/
/*     </div>*/
/* */
/* {% endblock %}*/
