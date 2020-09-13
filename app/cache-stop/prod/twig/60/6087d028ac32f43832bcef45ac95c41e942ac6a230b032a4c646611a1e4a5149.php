<?php

/* GdrGameBundle:Letter:index.html.twig */
class __TwigTemplate_784382ca2750142c3b70c8edefcec0f9d813b5ffa0a46ef90b5b93a17edea93f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Letter:index.html.twig", 1);
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
            // asset "af44e84_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_af44e84_0") : $this->env->getExtension('asset')->getAssetUrl("js/af44e84_missive_1.js");
            // line 12
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "af44e84"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_af44e84") : $this->env->getExtension('asset')->getAssetUrl("js/af44e84.js");
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
        echo "<div id=\"missive-container\">

        <h1><span>Lista delle missive</span></h1>

        <div class=\"clearfix\">
            <a href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("missive-create");
        echo "\" class=\"button\">
                Scrivi una nuova missiva
            </a>

            ";
        // line 26
        if ((isset($context["canWriteML"]) ? $context["canWriteML"] : null)) {
            // line 27
            echo "                <a href=\"";
            echo $this->env->getExtension('routing')->getPath("missive-create", array("isForGroup" => true));
            echo "\" class=\"button\">
                    Scrivi una ML
                </a>
            ";
        }
        // line 31
        echo "
            <a data-href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("missive-delete");
        echo "\" class=\"button right\" id=\"letter-delete-submit\">
                Elimina selezionate
            </a>
        </div>
        <div id=\"letter-ajax-output\">
            ";
        // line 37
        $this->loadTemplate("@GdrGame/Letter/list.html.twig", "GdrGameBundle:Letter:index.html.twig", 37)->display($context);
        // line 38
        echo "        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Letter:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 38,  107 => 37,  99 => 32,  96 => 31,  88 => 27,  86 => 26,  79 => 22,  72 => 17,  69 => 16,  53 => 12,  49 => 10,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  11 => 1,);
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
/*     '@GdrGameBundle/Resources/public/javascripts/missive.js' %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* {% endblock %}*/
/* */
/* {% block content -%}*/
/*     <div id="missive-container">*/
/* */
/*         <h1><span>Lista delle missive</span></h1>*/
/* */
/*         <div class="clearfix">*/
/*             <a href="{{ path('missive-create') }}" class="button">*/
/*                 Scrivi una nuova missiva*/
/*             </a>*/
/* */
/*             {% if canWriteML %}*/
/*                 <a href="{{ path('missive-create', {isForGroup: true}) }}" class="button">*/
/*                     Scrivi una ML*/
/*                 </a>*/
/*             {% endif %}*/
/* */
/*             <a data-href="{{ path('missive-delete') }}" class="button right" id="letter-delete-submit">*/
/*                 Elimina selezionate*/
/*             </a>*/
/*         </div>*/
/*         <div id="letter-ajax-output">*/
/*             {% include '@GdrGame/Letter/list.html.twig' %}*/
/*         </div>*/
/*     </div>*/
/* */
/* {% endblock %}*/
