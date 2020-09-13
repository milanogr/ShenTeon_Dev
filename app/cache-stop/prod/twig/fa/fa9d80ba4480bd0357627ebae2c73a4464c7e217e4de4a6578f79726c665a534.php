<?php

/* @GdrGame/Enclave/index.html.twig */
class __TwigTemplate_4f424e612279226156163033e578fc2824ca5aba05e4f9801644f94d0957a470 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "@GdrGame/Enclave/index.html.twig", 1);
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
        // line 10
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "2a7512c_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_2a7512c_0") : $this->env->getExtension('asset')->getAssetUrl("js/2a7512c_enclavi_1.js");
            // line 12
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "2a7512c"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_2a7512c") : $this->env->getExtension('asset')->getAssetUrl("js/2a7512c.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "
    <div id=\"enclavi-container\">
        <h1><span>Enclavi di Teon</span></h1>

        ";
        // line 21
        $this->loadTemplate("@GdrGame/Enclave/enclaveList.html.twig", "@GdrGame/Enclave/index.html.twig", 21)->display(array_merge($context, array("categoriesEnclave" => (isset($context["categoriesEnclave"]) ? $context["categoriesEnclave"] : null), "isClan" => false, "notOfficial" => false)));
        // line 22
        echo "
        ";
        // line 23
        if ((isset($context["categoriesUnofficial"]) ? $context["categoriesUnofficial"] : null)) {
            // line 24
            echo "            <h1><span>Enclavi non istituzionalizzate</span></h1>
            ";
            // line 25
            $this->loadTemplate("@GdrGame/Enclave/enclaveList.html.twig", "@GdrGame/Enclave/index.html.twig", 25)->display(array_merge($context, array("categoriesEnclave" => (isset($context["categoriesUnofficial"]) ? $context["categoriesUnofficial"] : null), "isClan" => false, "notOfficial" => true)));
            // line 26
            echo "        ";
        }
        // line 27
        echo "
        <h1><span>Enclavi Razziali di Teon</span></h1>

        ";
        // line 30
        $this->loadTemplate("@GdrGame/Enclave/enclaveList.html.twig", "@GdrGame/Enclave/index.html.twig", 30)->display(array_merge($context, array("categoriesEnclave" => (isset($context["categoriesClan"]) ? $context["categoriesClan"] : null), "unofficial" => true, "isClan" => true, "notOfficial" => false)));
        // line 31
        echo "    </div>

";
    }

    public function getTemplateName()
    {
        return "@GdrGame/Enclave/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 31,  98 => 30,  93 => 27,  90 => 26,  88 => 25,  85 => 24,  83 => 23,  80 => 22,  78 => 21,  72 => 17,  69 => 16,  53 => 12,  49 => 10,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  11 => 1,);
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
/* */
/*     {% javascripts filter='?uglifyjs2'*/
/*     '@GdrGameBundle/Resources/public/javascripts/enclavi.js' %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     <div id="enclavi-container">*/
/*         <h1><span>Enclavi di Teon</span></h1>*/
/* */
/*         {% include '@GdrGame/Enclave/enclaveList.html.twig' with {categoriesEnclave: categoriesEnclave, isClan: false, notOfficial: false} %}*/
/* */
/*         {% if categoriesUnofficial %}*/
/*             <h1><span>Enclavi non istituzionalizzate</span></h1>*/
/*             {% include '@GdrGame/Enclave/enclaveList.html.twig' with {categoriesEnclave: categoriesUnofficial, isClan: false, notOfficial: true} %}*/
/*         {% endif %}*/
/* */
/*         <h1><span>Enclavi Razziali di Teon</span></h1>*/
/* */
/*         {% include '@GdrGame/Enclave/enclaveList.html.twig' with {categoriesEnclave: categoriesClan, unofficial: true, isClan: true, notOfficial: false} %}*/
/*     </div>*/
/* */
/* {% endblock %}*/
