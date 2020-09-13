<?php

/* GdrGameBundle:Locations/Wise:index.html.twig */
class __TwigTemplate_f0bee98cd6f17aebab7d5f8bd1b7e200b6c0f325296eef1648a4cb21e1a5759f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Locations/Wise:index.html.twig", 1);
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
            // asset "67b80fc_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_67b80fc_0") : $this->env->getExtension('asset')->getAssetUrl("js/67b80fc_wise_1.js");
            // line 12
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>

    <script>
        \$(\"#wiseTag\").select2();
    </script>
    ";
        } else {
            // asset "67b80fc"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_67b80fc") : $this->env->getExtension('asset')->getAssetUrl("js/67b80fc.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>

    <script>
        \$(\"#wiseTag\").select2();
    </script>
    ";
        }
        unset($context["asset_url"]);
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "    <div class=\"wise-container\">

        <h1><span>Il Saggio di Teon</span></h1>

        <div id=\"wise-container\">

            <div id=\"wise-content\">
                <div class=\"form\">

                    <form action=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("wise.ask");
        echo "\" method=\"post\" id=\"wise-form-ask\">
                        <label for=\"id\">Avemor Teoniano, dimmi una parola, una sola e vediamo se ho qualcosa di interessante da raccontarti!</label>
                        <input type=\"text\" name=\"tag\" id=\"tag\" required/>

                        <button type=\"submit\" disabled>Chiedi</button>
                    </form>

                </div>
                <div class=\"ajax\">

                </div>
            </div>

        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Locations/Wise:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 29,  80 => 20,  77 => 19,  53 => 12,  49 => 10,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  11 => 1,);
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
/*     '@GdrGameBundle/Resources/public/javascripts/wise.js' %}*/
/*     <script src="{{ asset_url }}"></script>*/
/* */
/*     <script>*/
/*         $("#wiseTag").select2();*/
/*     </script>*/
/*     {% endjavascripts %}*/
/* {% endblock %}*/
/* {% block content %}*/
/*     <div class="wise-container">*/
/* */
/*         <h1><span>Il Saggio di Teon</span></h1>*/
/* */
/*         <div id="wise-container">*/
/* */
/*             <div id="wise-content">*/
/*                 <div class="form">*/
/* */
/*                     <form action="{{ path('wise.ask') }}" method="post" id="wise-form-ask">*/
/*                         <label for="id">Avemor Teoniano, dimmi una parola, una sola e vediamo se ho qualcosa di interessante da raccontarti!</label>*/
/*                         <input type="text" name="tag" id="tag" required/>*/
/* */
/*                         <button type="submit" disabled>Chiedi</button>*/
/*                     </form>*/
/* */
/*                 </div>*/
/*                 <div class="ajax">*/
/* */
/*                 </div>*/
/*             </div>*/
/* */
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
