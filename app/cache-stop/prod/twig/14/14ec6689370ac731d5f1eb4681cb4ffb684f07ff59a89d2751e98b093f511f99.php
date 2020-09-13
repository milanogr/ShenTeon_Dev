<?php

/* GdrGameBundle:Erario:index.html.twig */
class __TwigTemplate_b564d505edcc56d6f6d26d0e75efcae4478f8dddbc79c37fde248bc1c982d70b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Erario:index.html.twig", 1);
        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'goBack' => array($this, 'block_goBack'),
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
    public function block_javascripts($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    ";
        // line 6
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "c508f83_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c508f83_0") : $this->env->getExtension('asset')->getAssetUrl("js/c508f83_erario_1.js");
            // line 8
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "c508f83"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c508f83") : $this->env->getExtension('asset')->getAssetUrl("js/c508f83.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    // line 12
    public function block_goBack($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Location:renderGoBack"));
        echo "
";
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "<div class=\"erario-container\">
        <h1><span>Erario</span></h1>

        ";
        // line 20
        $this->loadTemplate("GdrGameBundle:Erario:filter.html.twig", "GdrGameBundle:Erario:index.html.twig", 20)->display(array_merge($context, array("currentType" => (isset($context["currentType"]) ? $context["currentType"] : null), "position" => "top")));
        // line 21
        echo "
        ";
        // line 22
        $this->loadTemplate("GdrGameBundle:Erario:list.html.twig", "GdrGameBundle:Erario:index.html.twig", 22)->display(array_merge($context, array("currentType" => (isset($context["currentType"]) ? $context["currentType"] : null), "paginator" => (isset($context["paginator"]) ? $context["paginator"] : null))));
        // line 23
        echo "
        ";
        // line 24
        $this->loadTemplate("GdrGameBundle:Erario:filter.html.twig", "GdrGameBundle:Erario:index.html.twig", 24)->display(array_merge($context, array("currentType" => (isset($context["currentType"]) ? $context["currentType"] : null), "position" => "bottom")));
        // line 25
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Erario:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 25,  87 => 24,  84 => 23,  82 => 22,  79 => 21,  77 => 20,  72 => 17,  69 => 16,  62 => 13,  59 => 12,  43 => 8,  39 => 6,  33 => 4,  30 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Default:innerContent.html.twig' %}*/
/* */
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/* */
/*     {% javascripts filter='?uglifyjs2'*/
/*     'bundles/gdrgame/javascripts/erario.js' %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* {% endblock %}*/
/* */
/* {% block goBack %}*/
/*     {{ render(controller('GdrGameBundle:Location:renderGoBack')) }}*/
/* {% endblock %}*/
/* */
/* {% block content -%}*/
/*     <div class="erario-container">*/
/*         <h1><span>Erario</span></h1>*/
/* */
/*         {% include 'GdrGameBundle:Erario:filter.html.twig' with {'currentType': currentType, 'position': 'top'} %}*/
/* */
/*         {% include 'GdrGameBundle:Erario:list.html.twig' with {'currentType': currentType, 'paginator': paginator} %}*/
/* */
/*         {% include 'GdrGameBundle:Erario:filter.html.twig' with {'currentType': currentType, 'position': 'bottom'} %}*/
/*     </div>*/
/* {% endblock %}*/
