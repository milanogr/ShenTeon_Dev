<?php

/* GdrGameBundle:Market:market.html.twig */
class __TwigTemplate_3974da619a6d701fd76be0631404e9926c40d58d0ee50d9a05352422e039006c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Market:market.html.twig", 1);
        $this->blocks = array(
            'modals' => array($this, 'block_modals'),
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
    public function block_modals($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("modals", $context, $blocks);
        echo "

    ";
        // line 6
        $this->loadTemplate("GdrGameBundle:Default:reveal.html.twig", "GdrGameBundle:Market:market.html.twig", 6)->display(array_merge($context, array("name" => "market", "size" => "small")));
    }

    // line 9
    public function block_goBack($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Location:renderGoBack"));
        echo "
";
    }

    // line 13
    public function block_javascripts($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    <script src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/javascripts/market.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "<div class=\"market-container\">
        <h1><span>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["market"]) ? $context["market"] : null), "name", array()), "html", null, true);
        echo " ";
        if (((isset($context["level"]) ? $context["level"] : null) > 0)) {
            echo " di livello ";
            echo twig_escape_filter($this->env, (isset($context["level"]) ? $context["level"] : null), "html", null, true);
            echo " ";
        }
        echo "</span></h1>

        <span class=\"bankAmount hide\">";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["bankAmount"]) ? $context["bankAmount"] : null), "html", null, true);
        echo "</span>

        ";
        // line 25
        $this->loadTemplate("GdrGameBundle:Market:filter.html.twig", "GdrGameBundle:Market:market.html.twig", 25)->display(array_merge($context, array("categories" => (isset($context["categories"]) ? $context["categories"] : null), "level" => (isset($context["level"]) ? $context["level"] : null), "currentCategory" => (isset($context["currentCategory"]) ? $context["currentCategory"] : null), "position" => "top")));
        // line 26
        echo "
        ";
        // line 27
        $this->loadTemplate("GdrGameBundle:Market:listItems.html.twig", "GdrGameBundle:Market:market.html.twig", 27)->display(array_merge($context, array("currentCategory" => (isset($context["currentCategory"]) ? $context["currentCategory"] : null), "paginator" => (isset($context["paginator"]) ? $context["paginator"] : null), "upload_path" => (isset($context["upload_path"]) ? $context["upload_path"] : null))));
        // line 28
        echo "
        ";
        // line 29
        $this->loadTemplate("GdrGameBundle:Market:filter.html.twig", "GdrGameBundle:Market:market.html.twig", 29)->display(array_merge($context, array("categories" => (isset($context["categories"]) ? $context["categories"] : null), "level" => (isset($context["level"]) ? $context["level"] : null), "currentCategory" => (isset($context["currentCategory"]) ? $context["currentCategory"] : null), "position" => "bottom")));
        // line 30
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Market:market.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 30,  101 => 29,  98 => 28,  96 => 27,  93 => 26,  91 => 25,  86 => 23,  75 => 21,  72 => 20,  69 => 19,  63 => 16,  57 => 14,  54 => 13,  47 => 10,  44 => 9,  40 => 6,  34 => 4,  31 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Default:innerContent.html.twig' %}*/
/* */
/* {% block modals %}*/
/*     {{ parent() }}*/
/* */
/*     {% include 'GdrGameBundle:Default:reveal.html.twig' with {name: 'market', size: 'small'} %}*/
/* {% endblock %}*/
/* */
/* {% block goBack %}*/
/*     {{ render(controller('GdrGameBundle:Location:renderGoBack')) }}*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/* */
/*     <script src="{{ asset('bundles/gdrgame/javascripts/market.js') }}"></script>*/
/* {% endblock %}*/
/* */
/* {% block content -%}*/
/*     <div class="market-container">*/
/*         <h1><span>{{ market.name }} {% if level > 0 %} di livello {{ level }} {% endif %}</span></h1>*/
/* */
/*         <span class="bankAmount hide">{{ bankAmount }}</span>*/
/* */
/*         {% include 'GdrGameBundle:Market:filter.html.twig' with {'categories': categories, 'level': level, 'currentCategory': currentCategory, 'position': 'top'} %}*/
/* */
/*         {% include 'GdrGameBundle:Market:listItems.html.twig' with {'currentCategory': currentCategory, 'paginator': paginator, 'upload_path': upload_path } %}*/
/* */
/*         {% include 'GdrGameBundle:Market:filter.html.twig' with {'categories': categories, 'level': level, 'currentCategory': currentCategory, 'position': 'bottom'} %}*/
/*     </div>*/
/* {% endblock %}*/
