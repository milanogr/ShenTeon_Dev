<?php

/* GdrGameBundle:Chat/Type:_normal.html.twig */
class __TwigTemplate_4f23fc2ac87eaf975a404464a7762de655a3dbe60164846bb866341a57af18db extends Twig_Template
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
        if (($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "special", array()) == "fate")) {
            // line 2
            echo "    <p class=\"chat-row fate gdrtooltip\"
       title=\"Questa è una stringa del Fato. Descrive ciò che accade e deve essere presa in massima considerazione.\">
        ";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "body", array()), "html", null, true);
            echo "
    </p>
";
        } elseif (($this->getAttribute(        // line 6
(isset($context["chat"]) ? $context["chat"] : null), "special", array()) == "fate-img")) {
            // line 7
            echo "    <p class=\"chat-row fate fate-img gdrtooltip\"
       title=\"Questa è un'immagine del Fato.\">
        <img src=\"";
            // line 9
            echo $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "body", array());
            echo "\">
    </p>
";
        } elseif (($this->getAttribute(        // line 11
(isset($context["chat"]) ? $context["chat"] : null), "special", array()) == "mod")) {
            // line 12
            echo "    <p class=\"chat-row mod\">
        <span class=\"time\">";
            // line 13
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "createdAt", array()), "H.i"), "html", null, true);
            echo "</span>
        <strong>MODERATORE</strong>: ";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "body", array()), "html", null, true);
            echo "
    </p>
";
        } elseif (($this->getAttribute(        // line 16
(isset($context["chat"]) ? $context["chat"] : null), "special", array()) == "soul")) {
            // line 17
            echo "    ";
        } else {
            // line 19
            echo "    <p class=\"chat-row normal ";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "cssClass", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "cssClass", array()), " ")) : (" ")), "html", null, true);
            echo "\">
        <span class=\"time\">";
            // line 20
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "createdAt", array()), "H.i"), "html", null, true);
            echo "</span>

        <a data-name=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderName", array()), "html", null, true);
            echo "\" data-type=\"pg-info\"
           data-url=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("chat-pg-infos", array("name" => $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderName", array()))), "html", null, true);
            echo "\"
           class=\"tooltip-chat\"
           href=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderName", array()))), "html", null, true);
            echo "\">
            <img src=\"";
            // line 26
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array()) . $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderRaceIcon", array())), "html", null, true);
            echo "\">
        </a>

        <a data-name=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderName", array()), "html", null, true);
            echo "\" class=\"tooltip-chat\" data-type=\"pg-items\"
           data-url=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("chat-pg-items", array("name" => $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderName", array()))), "html", null, true);
            echo "\">
            <img src=\"";
            // line 31
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array()) . $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/show-equip.gif")), "html", null, true);
            echo "\">
        </a>

        ";
            // line 34
            if ($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderRankName", array())) {
                // line 35
                echo "            <a class=\"standard-tooltip\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderRankName", array()), "html", null, true);
                echo "\">
                <img src=\"";
                // line 36
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array()) . $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderLevelIcon", array())), "html", null, true);
                echo "\">
            </a>
        ";
            } else {
                // line 39
                echo "            <a class=\"standard-tooltip\" title=\"Appartenenza ad Enclavi sconosciuta\">
                <img src=\"";
                // line 40
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array()) . $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/no-enclave.png")), "html", null, true);
                echo "\">
            </a>
        ";
            }
            // line 43
            echo "
        <a class=\"sender\">";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderName", array()), "html", null, true);
            echo "</a>

        <a href=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("chat-show-item", array("name" => $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderDressName", array()))), "html", null, true);
            echo "\" class=\"tooltip-chat pg-dress\"
           data-name=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderDressName", array()), "html", null, true);
            echo "\" data-type=\"pg-dress\"
           data-url=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("chat-pg-dress", array("name" => $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderDressName", array()))), "html", null, true);
            echo "\">
            <img src=\"";
            // line 49
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array()) . $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderDressIcon", array())), "html", null, true);
            echo "\">
        </a>

        ";
            // line 52
            if (($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "combat", array()) && ($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "combat", array()) != "0"))) {
                // line 53
                echo "            <a class=\"gdrtooltip\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "combat", array()), "html", null, true);
                echo "\">
                <img src=\"";
                // line 54
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array()) . $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/combat.png")), "html", null, true);
                echo "\">
            </a>
        ";
            }
            // line 57
            echo "
        ";
            // line 58
            if ($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "tag", array())) {
                // line 59
                echo "            <span class=\"tag\">[";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "tag", array()), "html", null, true);
                if ($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "freeTag", array())) {
                    echo "|";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "freeTag", array()), "html", null, true);
                }
                echo "]</span>:
        ";
            }
            // line 61
            echo "
        <span class=\"body\">
                    ";
            // line 63
            ob_start();
            // line 64
            echo "                        ";
            if ((isset($context["isCastI"]) ? $context["isCastI"] : null)) {
                // line 65
                echo "                            <span class=\"cast\">*</span>
                    ";
            } elseif (            // line 66
(isset($context["isCastII"]) ? $context["isCastII"] : null)) {
                // line 67
                echo "                            <span class=\"cast\">**</span>
                        ";
            }
            // line 69
            echo "
                    ";
            // line 70
            if ($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "language", array())) {
                // line 71
                echo "                        ";
                echo trim($this->env->getExtension('race_chat_extension')->raceChatFilter($this->env->getExtension('chat_extension')->normalChatFilter($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "body", array())), $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "raceLanguage", array())));
                echo "
                    ";
            } else {
                // line 73
                echo "                        ";
                echo trim($this->env->getExtension('chat_extension')->normalChatFilter($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "body", array())));
                echo "
                    ";
            }
            // line 75
            echo "
                    ";
            // line 76
            if (($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "special", array()) == "skill")) {
                // line 77
                echo "                        <span class=\"skill\"><i> [";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "skill", array()), "html", null, true);
                echo "]</i></span>
                    ";
            }
            // line 79
            echo "                    ";
            if ((isset($context["isCastI"]) ? $context["isCastI"] : null)) {
                // line 80
                echo "                        <span class=\"cast\">*</span>
                    ";
            } elseif (            // line 81
(isset($context["isCastII"]) ? $context["isCastII"] : null)) {
                // line 82
                echo "                        <span class=\"cast\">** <i>[";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "castBody", array()), "html", null, true);
                echo "]</i> **</span>
                    ";
            }
            // line 84
            echo "                    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 85
            echo "                </span>
    </p>
";
        }
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Chat/Type:_normal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  242 => 85,  239 => 84,  233 => 82,  231 => 81,  228 => 80,  225 => 79,  219 => 77,  217 => 76,  214 => 75,  208 => 73,  202 => 71,  200 => 70,  197 => 69,  193 => 67,  191 => 66,  188 => 65,  185 => 64,  183 => 63,  179 => 61,  169 => 59,  167 => 58,  164 => 57,  158 => 54,  153 => 53,  151 => 52,  145 => 49,  141 => 48,  137 => 47,  133 => 46,  128 => 44,  125 => 43,  119 => 40,  116 => 39,  110 => 36,  105 => 35,  103 => 34,  97 => 31,  93 => 30,  89 => 29,  83 => 26,  79 => 25,  74 => 23,  70 => 22,  65 => 20,  60 => 19,  57 => 17,  55 => 16,  50 => 14,  46 => 13,  43 => 12,  41 => 11,  36 => 9,  32 => 7,  30 => 6,  25 => 4,  21 => 2,  19 => 1,);
    }
}
/* {% if chat.special == 'fate' %}*/
/*     <p class="chat-row fate gdrtooltip"*/
/*        title="Questa è una stringa del Fato. Descrive ciò che accade e deve essere presa in massima considerazione.">*/
/*         {{ chat.body }}*/
/*     </p>*/
/* {% elseif chat.special == 'fate-img' %}*/
/*     <p class="chat-row fate fate-img gdrtooltip"*/
/*        title="Questa è un'immagine del Fato.">*/
/*         <img src="{{ chat.body|raw }}">*/
/*     </p>*/
/* {% elseif chat.special == 'mod' %}*/
/*     <p class="chat-row mod">*/
/*         <span class="time">{{ chat.createdAt|date('H.i') }}</span>*/
/*         <strong>MODERATORE</strong>: {{ chat.body }}*/
/*     </p>*/
/* {% elseif chat.special == 'soul' %}*/
/*     {# Non faccio nulla #}*/
/* {% else %}*/
/*     <p class="chat-row normal {{ chat.cssClass|default(' ') }}">*/
/*         <span class="time">{{ chat.createdAt|date('H.i') }}</span>*/
/* */
/*         <a data-name="{{ chat.senderName }}" data-type="pg-info"*/
/*            data-url="{{ url('chat-pg-infos', {name: chat.senderName}) }}"*/
/*            class="tooltip-chat"*/
/*            href="{{ path('avatar-index', {name: chat.senderName}) }}">*/
/*             <img src="{{ app.request.getSchemeAndHttpHost ~ chat.senderRaceIcon }}">*/
/*         </a>*/
/* */
/*         <a data-name="{{ chat.senderName }}" class="tooltip-chat" data-type="pg-items"*/
/*            data-url="{{ url('chat-pg-items', {name: chat.senderName}) }}">*/
/*             <img src="{{ app.request.getSchemeAndHttpHost ~ asset('bundles/gdrgame/images/chat/show-equip.gif') }}">*/
/*         </a>*/
/* */
/*         {% if chat.senderRankName %}*/
/*             <a class="standard-tooltip" title="{{ chat.senderRankName }}">*/
/*                 <img src="{{ app.request.getSchemeAndHttpHost ~ chat.senderLevelIcon }}">*/
/*             </a>*/
/*         {% else %}*/
/*             <a class="standard-tooltip" title="Appartenenza ad Enclavi sconosciuta">*/
/*                 <img src="{{ app.request.getSchemeAndHttpHost ~ asset('bundles/gdrgame/images/chat/no-enclave.png') }}">*/
/*             </a>*/
/*         {% endif %}*/
/* */
/*         <a class="sender">{{ chat.senderName }}</a>*/
/* */
/*         <a href="{{ url('chat-show-item', {name: chat.senderDressName}) }}" class="tooltip-chat pg-dress"*/
/*            data-name="{{ chat.senderDressName }}" data-type="pg-dress"*/
/*            data-url="{{ url('chat-pg-dress', {name: chat.senderDressName}) }}">*/
/*             <img src="{{ app.request.getSchemeAndHttpHost ~ chat.senderDressIcon }}">*/
/*         </a>*/
/* */
/*         {% if chat.combat and chat.combat != "0" %}*/
/*             <a class="gdrtooltip" title="{{ chat.combat }}">*/
/*                 <img src="{{ app.request.getSchemeAndHttpHost ~ asset('bundles/gdrgame/images/chat/combat.png') }}">*/
/*             </a>*/
/*         {% endif %}*/
/* */
/*         {% if chat.tag %}*/
/*             <span class="tag">[{{ chat.tag }}{% if chat.freeTag %}|{{ chat.freeTag }}{% endif %}]</span>:*/
/*         {% endif %}*/
/* */
/*         <span class="body">*/
/*                     {% spaceless %}*/
/*                         {% if isCastI %}*/
/*                             <span class="cast">*</span>*/
/*                     {% elseif isCastII %}*/
/*                             <span class="cast">**</span>*/
/*                         {% endif %}*/
/* */
/*                     {% if chat.language %}*/
/*                         {{ chat.body|normalChat|raceChat(chat.raceLanguage)|trim|raw }}*/
/*                     {% else %}*/
/*                         {{ chat.body|normalChat|trim|raw }}*/
/*                     {% endif %}*/
/* */
/*                     {% if chat.special == 'skill' %}*/
/*                         <span class="skill"><i> [{{ chat.skill }}]</i></span>*/
/*                     {% endif %}*/
/*                     {% if isCastI %}*/
/*                         <span class="cast">*</span>*/
/*                     {% elseif isCastII %}*/
/*                         <span class="cast">** <i>[{{ chat.castBody }}]</i> **</span>*/
/*                     {% endif %}*/
/*                     {% endspaceless %}*/
/*                 </span>*/
/*     </p>*/
/* {% endif %}*/
