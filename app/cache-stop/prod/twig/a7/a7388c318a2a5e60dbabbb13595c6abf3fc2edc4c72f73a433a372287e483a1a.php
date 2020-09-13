<?php

/* GdrGameBundle:Chat:index.html.twig */
class __TwigTemplate_af4dcf72b149499e16b9cde145a6125d8efff8674dfd7bb1258ae080a29384d6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:index.html.twig", "GdrGameBundle:Chat:index.html.twig", 1);
        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GdrGameBundle:Default:index.html.twig";
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
            // asset "26ecd43_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_26ecd43_0") : $this->env->getExtension('asset')->getAssetUrl("js/26ecd43_jquery-ui-1.10.3.custom.min_1.js");
            // line 9
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "26ecd43_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_26ecd43_1") : $this->env->getExtension('asset')->getAssetUrl("js/26ecd43_chat_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "26ecd43"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_26ecd43") : $this->env->getExtension('asset')->getAssetUrl("js/26ecd43.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        echo "
    <div id=\"chat-content\">
        ";
        // line 16
        echo twig_include($this->env, $context, "GdrGameBundle:Chat:chat.html.twig", array("chats" => (isset($context["chats"]) ? $context["chats"] : null)));
        echo "
    </div>

    <div id=\"chat-bar\">
        ";
        // line 20
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Chat:input"));
        echo "
    </div>

    <div id=\"chat-expand-text\" class=\"reveal-modal gdr medium\">
        <a class=\"close-reveal-modal\">×</a>

        <span class=\"hint\">Premendo la \"x\" il testo sarà automaticamente salvato nella barra inferiore.</span>

        <div class=\"reveal-content\">
            <textarea spellcheck=true
                      placeholder=\"Questa finestra serve per scrivere più comodamente la tua azione. Una volta che hai completato la tua frase clicca sulla 'x' di questa finestra, il testo verrà copiato nella barra sottostante. Ricordati che hai la possibilità di trascinare a piacimento questa finestra all'interno del riquadro dalle chat.\"></textarea>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Chat:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 20,  71 => 16,  67 => 14,  64 => 13,  42 => 9,  38 => 6,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Default:index.html.twig' %}*/
/* */
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/* */
/*     {% javascripts filter='?uglifyjs2'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/jquery-ui-1.10.3.custom.min.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/chat.js' %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/* */
/*     <div id="chat-content">*/
/*         {{ include('GdrGameBundle:Chat:chat.html.twig', {chats: chats}) }}*/
/*     </div>*/
/* */
/*     <div id="chat-bar">*/
/*         {{ render(controller('GdrGameBundle:Chat:input')) }}*/
/*     </div>*/
/* */
/*     <div id="chat-expand-text" class="reveal-modal gdr medium">*/
/*         <a class="close-reveal-modal">×</a>*/
/* */
/*         <span class="hint">Premendo la "x" il testo sarà automaticamente salvato nella barra inferiore.</span>*/
/* */
/*         <div class="reveal-content">*/
/*             <textarea spellcheck=true*/
/*                       placeholder="Questa finestra serve per scrivere più comodamente la tua azione. Una volta che hai completato la tua frase clicca sulla 'x' di questa finestra, il testo verrà copiato nella barra sottostante. Ricordati che hai la possibilità di trascinare a piacimento questa finestra all'interno del riquadro dalle chat."></textarea>*/
/*         </div>*/
/*     </div>*/
/* */
/* {% endblock %}*/
