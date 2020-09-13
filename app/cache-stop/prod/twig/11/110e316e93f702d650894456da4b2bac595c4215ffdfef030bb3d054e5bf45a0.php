<?php

/* @GdrGame/Default/audio.html.twig */
class __TwigTemplate_aae5009bf85cdeebc397a296381bc97ad02cfcd0d7f261f1f35d66b1b98ef7b1 extends Twig_Template
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
        if ((isset($context["isAudioActive"]) ? $context["isAudioActive"] : null)) {
            // line 2
            echo "    <a id=\"toggle-suoni\" data-sound=\"on\" class=\"gdrtooltip\" data-href=\"";
            echo $this->env->getExtension('routing')->getPath("toggle-audio", array("change" => 1));
            echo "\" title=\"I suoni sono attivati. Clicca qui per disabilitarli.\">
        <img src=\"";
            // line 3
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/suoni-on.png"), "html", null, true);
            echo "\">
    </a>
";
        } else {
            // line 6
            echo "    <a id=\"toggle-suoni\" data-sound=\"off\" class=\"gdrtooltip\" data-href=\"";
            echo $this->env->getExtension('routing')->getPath("toggle-audio", array("change" => 1));
            echo "\" title=\"I suoni sono DISATTIVATI. Clicca qui per abilitarli (campana al cambio dell'ora e corvo alla ricezione delle missive).\">
        <img src=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/suoni-off.png"), "html", null, true);
            echo "\">
    </a>
";
        }
    }

    public function getTemplateName()
    {
        return "@GdrGame/Default/audio.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 7,  32 => 6,  26 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if isAudioActive %}*/
/*     <a id="toggle-suoni" data-sound="on" class="gdrtooltip" data-href="{{ path("toggle-audio", {change: 1}) }}" title="I suoni sono attivati. Clicca qui per disabilitarli.">*/
/*         <img src="{{ asset("bundles/gdrgame/images/suoni-on.png") }}">*/
/*     </a>*/
/* {% else %}*/
/*     <a id="toggle-suoni" data-sound="off" class="gdrtooltip" data-href="{{ path("toggle-audio", {change: 1}) }}" title="I suoni sono DISATTIVATI. Clicca qui per abilitarli (campana al cambio dell'ora e corvo alla ricezione delle missive).">*/
/*         <img src="{{ asset("bundles/gdrgame/images/suoni-off.png") }}">*/
/*     </a>*/
/* {% endif %}*/
