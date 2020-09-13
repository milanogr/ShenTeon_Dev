<?php

/* GdrGameBundle:Chat:input.html.twig */
class __TwigTemplate_9bb9a75d7e6d19f0c3c611c93990e89ce7ea370f65bc0ce249261a35a3526416 extends Twig_Template
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
        echo "<form id=\"chat-form\" action=\"";
        echo $this->env->getExtension('routing')->getUrl("chat-input");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo ">
    <div id=\"chat-first-row\">
        ";
        // line 3
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "tag", array()), 'widget', array("attr" => array("class" => "tag")));
        echo "
        ";
        // line 4
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "freeTag", array()), 'widget', array("attr" => array("class" => "free-tag", "placeholder" => "Tag Libero")));
        echo "
        ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "body", array()), 'widget', array("attr" => array("class" => "body", "placeholder" => "La tua azione")));
        echo "
        ";
        // line 7
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "special", array()), 'widget');
        echo "
        ";
        // line 8
        if (((isset($context["isSoul"]) ? $context["isSoul"] : null) == false)) {
            // line 9
            echo "            ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "skill", array()), 'widget');
            echo "
        ";
        }
        // line 11
        echo "        ";
        // line 12
        echo "        <button type=\"submit\" class=\"button small\">Invia ";
        if ((isset($context["isSoul"]) ? $context["isSoul"] : null)) {
            echo "(ANIMA)";
        }
        echo "</button>
        <abbr title=\"Se vuoi inviare un'azione senza parlato (in scuro) è sufficiente anteporre un + all'azione stessa. <br>
Se vuoi inviare un'azione con del parlato (in chiaro) è sufficiente scrivere alternando il parlato con le descrizioni comprese tra < e >\"
              class=\"gdrtooltip\">[?]</abbr>
    </div>
    <div id=\"chat-icons-column\">
        <a class=\"icon gdrtooltip\" href=\"#\" data-href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getUrl("chat-show-online");
        echo "\" title=\"Visualizza i presenti\"
           id=\"show-online\">
            <img alt=\"Visualizza i presenti\" src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/show-online.png"), "html", null, true);
        echo "\">
        </a>

        <a class=\"icon gdrtooltip\" data-href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getUrl("chat-mod");
        echo "\" title=\"Segnala la chat ad un Moderatore\"
           id=\"segnala-mod\">
            <img alt=\"Segnala chat\" src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/chiama-mod.jpg"), "html", null, true);
        echo "\">
        </a>

        ";
        // line 28
        if (((isset($context["isSoul"]) ? $context["isSoul"] : null) == false)) {
            // line 29
            echo "            <a class=\"icon gdrtooltip\" href=\"#\" data-href=\"";
            echo $this->env->getExtension('routing')->getUrl("chat-passa-mori");
            echo "\" title=\"Passa mori\"
               id=\"passa-mori\">
                <img alt=\"Passa mori\" src=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/passa-mori.png"), "html", null, true);
            echo "\">
            </a>


            <a class=\"icon gdrtooltip\" href=\"#\" data-href=\"";
            // line 35
            echo $this->env->getExtension('routing')->getUrl("chat-passa-oggetti");
            echo "\" title=\"Passa oggetti\"
               id=\"passa-oggetti\">
                <img alt=\"Passa oggetti\" src=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/passa-oggetti.png"), "html", null, true);
            echo "\">
            </a>

            ";
            // line 41
            echo "            <a class=\"icon gdrtooltip\" href=\"#\" title=\"Mostra le altre skill\"
               id=\"switch-skills\">
                <img alt=\"Mostra le altre skill\" src=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/scorri-skill.png"), "html", null, true);
            echo "\">
            </a>
            ";
            // line 46
            echo "        ";
        }
        // line 47
        echo "
        <a class=\"icon gdrtooltip\" data-href=\"";
        // line 48
        echo $this->env->getExtension('routing')->getPath("chat-save-show-form");
        echo "\" title=\"Salva la chat (scarica sul pc)\"
           id=\"chat-save\">
            <img alt=\"Salva la chat\" src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/save-chat.png"), "html", null, true);
        echo "\">
        </a>
        ";
        // line 52
        if (((isset($context["canRoll"]) ? $context["canRoll"] : null) && ((isset($context["isSoul"]) ? $context["isSoul"] : null) == false))) {
            // line 53
            echo "            <a class=\"icon gdrtooltip\" data-href=\"";
            echo $this->env->getExtension('routing')->getUrl("chat-roll-dice");
            echo "\" title=\"Tira 5 dadi a 6 facce\"
               id=\"roll-dice\">
                <img alt=\"Tira dadi\" src=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/roll-dice.png"), "html", null, true);
            echo "\">
            </a>
        ";
        }
        // line 58
        echo "
        ";
        // line 60
        echo "        ";
        if ((isset($context["canFate"]) ? $context["canFate"] : null)) {
            // line 61
            echo "            <a href=\"#\" class=\"icon special fate-icon gdrtooltip\" title=\"Scrivi come Fato\"
               data-submit=\"Invia (Fato)\" data-value=\"fate\"></a>
            <a href=\"#\" class=\"icon special fate-img-icon gdrtooltip\"
               title=\"Incolla il link completo dell'immagine (http://...)\"
               data-submit=\"Invia (IMG Fato)\" data-value=\"fate-img\"></a>
        ";
        }
        // line 67
        echo "
        ";
        // line 69
        echo "        ";
        if ((isset($context["canModerateChat"]) ? $context["canModerateChat"] : null)) {
            // line 70
            echo "            <a href=\"#\" class=\"icon special mod-icon gdrtooltip\" title=\"Scrivi come Moderatore\"
               data-submit=\"Invia (Mod)\" data-value=\"mod\"></a>
        ";
        }
        // line 73
        echo "        ";
        // line 74
        echo "        ";
        if (((isset($context["canUseSpells"]) ? $context["canUseSpells"] : null) && ((isset($context["isSoul"]) ? $context["isSoul"] : null) == false))) {
            // line 75
            echo "            <a href=\"#\" class=\"icon special cast-end-icon ";
            if (((isset($context["canCastII"]) ? $context["canCastII"] : null) == false)) {
                echo "hide";
            }
            echo " gdrtooltip\"
               title=\"ANNULLA la concentrazione del cast\"></a>
            <a href=\"#\" class=\"icon special castI-icon gdrtooltip ";
            // line 77
            if ((isset($context["canCastII"]) ? $context["canCastII"] : null)) {
                echo "hide";
            }
            echo "\"
               data-submit=\"Invia (Cast I)\" data-value=\"cast-1\" title=\"Abilita/Disabilita MOMENTANEAMENTE il cast\"></a>
            <a href=\"#\" class=\"icon special castII-icon ";
            // line 79
            if (((isset($context["canCastII"]) ? $context["canCastII"] : null) == false)) {
                echo "hide";
            }
            echo " gdrtooltip\"
               data-submit=\"Invia (Cast II)\" title=\"Abilita/Disabilita MOMENTANEAMENTE il cast\"
               data-value=\"cast-2\"></a>
        ";
        }
        // line 83
        echo "
        <a class=\"icon chat-expand-text gdrtooltip\" title=\"Espandi la chat per scrivere meglio\">
            <img src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/espandi.png"), "html", null, true);
        echo "\"
        </a>
    </div>

    ";
        // line 89
        if (((isset($context["isSoul"]) ? $context["isSoul"] : null) == false)) {
            // line 90
            echo "        <div id=\"chat-skills-column\">
            ";
            // line 91
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Chat:showSkill"));
            echo "
        </div>
    ";
        }
        // line 94
        echo "
    <div id=\"chat-dropdowns-column\">
        ";
        // line 96
        if (((isset($context["isSoul"]) ? $context["isSoul"] : null) == false)) {
            // line 97
            echo "            ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "language", array()), 'widget');
            echo "
        ";
        }
        // line 99
        echo "        <span id=\"container-combat\">
            ";
        // line 100
        if (((isset($context["isSoul"]) ? $context["isSoul"] : null) == false)) {
            // line 101
            echo "                ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "combat", array()), 'widget');
            echo "
            ";
        }
        // line 103
        echo "        </span>
        <span id=\"container-spells\" class=\"hide\">
            ";
        // line 105
        if (((isset($context["canUseSpells"]) ? $context["canUseSpells"] : null) && ((isset($context["isSoul"]) ? $context["isSoul"] : null) == false))) {
            // line 106
            echo "                ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "spell", array()), 'widget', array("attr" => array("class" => "castII-select")));
            echo "
            ";
        }
        // line 108
        echo "        </span>
    </div>

    <div id=\"chat-leave\">
        <a href=\"";
        // line 112
        echo $this->env->getExtension('routing')->getPath("chat-leave");
        echo "\" class=\"button small leave\">Esci dalla chat</a>
    </div>
</form>

<form id=\"segnala-chat\" class=\"hide\">
    <input type=\"text\" name=\"motivo\">
</form>

<span id=\"open-bag\"></span>

";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Chat:input.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  270 => 112,  264 => 108,  258 => 106,  256 => 105,  252 => 103,  246 => 101,  244 => 100,  241 => 99,  235 => 97,  233 => 96,  229 => 94,  223 => 91,  220 => 90,  218 => 89,  211 => 85,  207 => 83,  198 => 79,  191 => 77,  183 => 75,  180 => 74,  178 => 73,  173 => 70,  170 => 69,  167 => 67,  159 => 61,  156 => 60,  153 => 58,  147 => 55,  141 => 53,  139 => 52,  134 => 50,  129 => 48,  126 => 47,  123 => 46,  118 => 43,  114 => 41,  108 => 37,  103 => 35,  96 => 31,  90 => 29,  88 => 28,  82 => 25,  77 => 23,  71 => 20,  66 => 18,  54 => 12,  52 => 11,  46 => 9,  44 => 8,  39 => 7,  35 => 5,  31 => 4,  27 => 3,  19 => 1,);
    }
}
/* <form id="chat-form" action="{{ url('chat-input') }}" method="post" {{ form_enctype(form) }}>*/
/*     <div id="chat-first-row">*/
/*         {{ form_widget(form.tag, { 'attr': {'class': 'tag'} }) }}*/
/*         {{ form_widget(form.freeTag, { 'attr': {'class': 'free-tag', 'placeholder': 'Tag Libero'} }) }}*/
/*         {{ form_widget(form.body, { 'attr': {'class': 'body', 'placeholder': 'La tua azione'} }) }}*/
/*         {# Hidden #}*/
/*         {{ form_widget(form.special) }}*/
/*         {% if isSoul == false %}*/
/*             {{ form_widget(form.skill) }}*/
/*         {% endif %}*/
/*         {# /Hidden #}*/
/*         <button type="submit" class="button small">Invia {% if isSoul %}(ANIMA){% endif %}</button>*/
/*         <abbr title="Se vuoi inviare un'azione senza parlato (in scuro) è sufficiente anteporre un + all'azione stessa. <br>*/
/* Se vuoi inviare un'azione con del parlato (in chiaro) è sufficiente scrivere alternando il parlato con le descrizioni comprese tra < e >"*/
/*               class="gdrtooltip">[?]</abbr>*/
/*     </div>*/
/*     <div id="chat-icons-column">*/
/*         <a class="icon gdrtooltip" href="#" data-href="{{ url('chat-show-online') }}" title="Visualizza i presenti"*/
/*            id="show-online">*/
/*             <img alt="Visualizza i presenti" src="{{ asset('bundles/gdrgame/images/chat/show-online.png') }}">*/
/*         </a>*/
/* */
/*         <a class="icon gdrtooltip" data-href="{{ url('chat-mod') }}" title="Segnala la chat ad un Moderatore"*/
/*            id="segnala-mod">*/
/*             <img alt="Segnala chat" src="{{ asset('bundles/gdrgame/images/chat/chiama-mod.jpg') }}">*/
/*         </a>*/
/* */
/*         {% if isSoul == false %}*/
/*             <a class="icon gdrtooltip" href="#" data-href="{{ url('chat-passa-mori') }}" title="Passa mori"*/
/*                id="passa-mori">*/
/*                 <img alt="Passa mori" src="{{ asset('bundles/gdrgame/images/chat/passa-mori.png') }}">*/
/*             </a>*/
/* */
/* */
/*             <a class="icon gdrtooltip" href="#" data-href="{{ url('chat-passa-oggetti') }}" title="Passa oggetti"*/
/*                id="passa-oggetti">*/
/*                 <img alt="Passa oggetti" src="{{ asset('bundles/gdrgame/images/chat/passa-oggetti.png') }}">*/
/*             </a>*/
/* */
/*             {#{% if is_granted('ROLE_ADMIN') %}#}*/
/*             <a class="icon gdrtooltip" href="#" title="Mostra le altre skill"*/
/*                id="switch-skills">*/
/*                 <img alt="Mostra le altre skill" src="{{ asset('bundles/gdrgame/images/chat/scorri-skill.png') }}">*/
/*             </a>*/
/*             {#{% endif %}#}*/
/*         {% endif %}*/
/* */
/*         <a class="icon gdrtooltip" data-href="{{ path('chat-save-show-form') }}" title="Salva la chat (scarica sul pc)"*/
/*            id="chat-save">*/
/*             <img alt="Salva la chat" src="{{ asset('bundles/gdrgame/images/chat/save-chat.png') }}">*/
/*         </a>*/
/*         {% if canRoll and isSoul == false %}*/
/*             <a class="icon gdrtooltip" data-href="{{ url('chat-roll-dice') }}" title="Tira 5 dadi a 6 facce"*/
/*                id="roll-dice">*/
/*                 <img alt="Tira dadi" src="{{ asset('bundles/gdrgame/images/chat/roll-dice.png') }}">*/
/*             </a>*/
/*         {% endif %}*/
/* */
/*         {# Fato? #}*/
/*         {% if canFate %}*/
/*             <a href="#" class="icon special fate-icon gdrtooltip" title="Scrivi come Fato"*/
/*                data-submit="Invia (Fato)" data-value="fate"></a>*/
/*             <a href="#" class="icon special fate-img-icon gdrtooltip"*/
/*                title="Incolla il link completo dell'immagine (http://...)"*/
/*                data-submit="Invia (IMG Fato)" data-value="fate-img"></a>*/
/*         {% endif %}*/
/* */
/*         {# Moderatore? #}*/
/*         {% if canModerateChat %}*/
/*             <a href="#" class="icon special mod-icon gdrtooltip" title="Scrivi come Moderatore"*/
/*                data-submit="Invia (Mod)" data-value="mod"></a>*/
/*         {% endif %}*/
/*         {# Posso usare incanti? #}*/
/*         {% if canUseSpells and isSoul == false %}*/
/*             <a href="#" class="icon special cast-end-icon {% if canCastII == false %}hide{% endif %} gdrtooltip"*/
/*                title="ANNULLA la concentrazione del cast"></a>*/
/*             <a href="#" class="icon special castI-icon gdrtooltip {% if canCastII %}hide{% endif %}"*/
/*                data-submit="Invia (Cast I)" data-value="cast-1" title="Abilita/Disabilita MOMENTANEAMENTE il cast"></a>*/
/*             <a href="#" class="icon special castII-icon {% if canCastII == false %}hide{% endif %} gdrtooltip"*/
/*                data-submit="Invia (Cast II)" title="Abilita/Disabilita MOMENTANEAMENTE il cast"*/
/*                data-value="cast-2"></a>*/
/*         {% endif %}*/
/* */
/*         <a class="icon chat-expand-text gdrtooltip" title="Espandi la chat per scrivere meglio">*/
/*             <img src="{{ asset('bundles/gdrgame/images/chat/espandi.png') }}"*/
/*         </a>*/
/*     </div>*/
/* */
/*     {% if isSoul == false %}*/
/*         <div id="chat-skills-column">*/
/*             {{ render(controller('GdrGameBundle:Chat:showSkill')) }}*/
/*         </div>*/
/*     {% endif %}*/
/* */
/*     <div id="chat-dropdowns-column">*/
/*         {% if isSoul == false %}*/
/*             {{ form_widget(form.language) }}*/
/*         {% endif %}*/
/*         <span id="container-combat">*/
/*             {% if isSoul == false %}*/
/*                 {{ form_widget(form.combat) }}*/
/*             {% endif %}*/
/*         </span>*/
/*         <span id="container-spells" class="hide">*/
/*             {% if canUseSpells and isSoul == false %}*/
/*                 {{ form_widget(form.spell, { 'attr': {'class': 'castII-select'} }) }}*/
/*             {% endif %}*/
/*         </span>*/
/*     </div>*/
/* */
/*     <div id="chat-leave">*/
/*         <a href="{{ path('chat-leave') }}" class="button small leave">Esci dalla chat</a>*/
/*     </div>*/
/* </form>*/
/* */
/* <form id="segnala-chat" class="hide">*/
/*     <input type="text" name="motivo">*/
/* </form>*/
/* */
/* <span id="open-bag"></span>*/
/* */
/* */
