<?php

/* GdrGameBundle:Chat/Type:_action.html.twig */
class __TwigTemplate_f7d19878ada1661dd98c896554b9bb12a766cde2ba22ab3cea74266ac45a2cbf extends Twig_Template
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
        $context["nameForParam"] = twig_last($this->env, twig_split_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderName", array()), " "));
        // line 2
        echo "        ";
        if (($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "special", array()) != "soul")) {
            // line 3
            echo "            <p class=\"chat-row action ";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "cssClass", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "cssClass", array()), " ")) : (" ")), "html", null, true);
            echo "\">
                <span class=\"time\">";
            // line 4
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "createdAt", array()), "H.i"), "html", null, true);
            echo "</span>

                <a data-name=\"";
            // line 6
            echo twig_escape_filter($this->env, (isset($context["nameForParam"]) ? $context["nameForParam"] : null), "html", null, true);
            echo "\" data-type=\"pg-info\"
                   data-url=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("chat-pg-infos", array("name" => (isset($context["nameForParam"]) ? $context["nameForParam"] : null))), "html", null, true);
            echo "\"
                   class=\"tooltip-chat\"
                   href=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => (isset($context["nameForParam"]) ? $context["nameForParam"] : null))), "html", null, true);
            echo "\">
                    <img src=\"";
            // line 10
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array()) . $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderRaceIcon", array())), "html", null, true);
            echo "\">
                </a>

                <a data-name=\"";
            // line 13
            echo twig_escape_filter($this->env, (isset($context["nameForParam"]) ? $context["nameForParam"] : null), "html", null, true);
            echo "\" class=\"tooltip-chat\" data-type=\"pg-items\"
                   data-url=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("chat-pg-items", array("name" => (isset($context["nameForParam"]) ? $context["nameForParam"] : null))), "html", null, true);
            echo "\">
                    <img src=\"";
            // line 15
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array()) . $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/show-equip.gif")), "html", null, true);
            echo "\">
                </a>

                ";
            // line 18
            if ($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderRankName", array())) {
                // line 19
                echo "                    <a class=\"standard-tooltip\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderRankName", array()), "html", null, true);
                echo "\">
                        <img src=\"";
                // line 20
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array()) . $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderLevelIcon", array())), "html", null, true);
                echo "\">
                    </a>
                ";
            } else {
                // line 23
                echo "                    <a class=\"standard-tooltip\" title=\"Appartenenza ad Enclavi sconosciuta\">
                        <img src=\"";
                // line 24
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array()) . $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/no-enclave.png")), "html", null, true);
                echo "\">
                    </a>
                ";
            }
            // line 27
            echo "
                ";
            // line 28
            if (($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "combat", array()) && ($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "combat", array()) != "0"))) {
                // line 29
                echo "                    <a class=\"gdrtooltip\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "combat", array()), "html", null, true);
                echo "\">
                        <img src=\"";
                // line 30
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array()) . $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/combat.png")), "html", null, true);
                echo "\">
                    </a>
                ";
            }
            // line 33
            echo "
                <span class=\"sender\">";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderName", array()), "html", null, true);
            echo "</span>
                ";
            // line 35
            if ($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "tag", array())) {
                // line 36
                echo "                    <span class=\"tag\">[";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "tag", array()), "html", null, true);
                if ($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "freeTag", array())) {
                    echo "|";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "freeTag", array()), "html", null, true);
                }
                echo "]</span>
                ";
            }
            // line 38
            echo "                <span class=\"body\">
                    ";
            // line 39
            ob_start();
            // line 40
            echo "                        ";
            if ((isset($context["isCastI"]) ? $context["isCastI"] : null)) {
                // line 41
                echo "                            <span class=\"cast\">*</span>
                    ";
            } elseif (            // line 42
(isset($context["isCastII"]) ? $context["isCastII"] : null)) {
                // line 43
                echo "                            <span class=\"cast\">**</span>
                        ";
            }
            // line 45
            echo "                    ";
            echo trim($this->env->getExtension('chat_extension')->normalChatFilter($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "body", array())));
            echo "
                    ";
            // line 46
            if ((isset($context["isCastI"]) ? $context["isCastI"] : null)) {
                // line 47
                echo "                        <span class=\"cast\">*</span>
                    ";
            } elseif (            // line 48
(isset($context["isCastII"]) ? $context["isCastII"] : null)) {
                // line 49
                echo "                        <span class=\"cast\">** [<i>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "castBody", array()), "html", null, true);
                echo "</i>] **</span>
                    ";
            }
            // line 51
            echo "                    ";
            if (($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "special", array()) == "skill")) {
                // line 52
                echo "                        <span class=\"skill\"><i> [";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "skill", array()), "html", null, true);
                echo "]</i></span>
                    ";
            }
            // line 54
            echo "                    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 55
            echo "                </span>
            </p>
        ";
        }
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Chat/Type:_action.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 55,  168 => 54,  162 => 52,  159 => 51,  153 => 49,  151 => 48,  148 => 47,  146 => 46,  141 => 45,  137 => 43,  135 => 42,  132 => 41,  129 => 40,  127 => 39,  124 => 38,  114 => 36,  112 => 35,  108 => 34,  105 => 33,  99 => 30,  94 => 29,  92 => 28,  89 => 27,  83 => 24,  80 => 23,  74 => 20,  69 => 19,  67 => 18,  61 => 15,  57 => 14,  53 => 13,  47 => 10,  43 => 9,  38 => 7,  34 => 6,  29 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set nameForParam = chat.senderName|split(' ')|last %}*/
/*         {% if chat.special != 'soul' %}*/
/*             <p class="chat-row action {{ chat.cssClass|default(' ') }}">*/
/*                 <span class="time">{{ chat.createdAt|date('H.i') }}</span>*/
/* */
/*                 <a data-name="{{ nameForParam }}" data-type="pg-info"*/
/*                    data-url="{{ url('chat-pg-infos', {name: nameForParam}) }}"*/
/*                    class="tooltip-chat"*/
/*                    href="{{ path('avatar-index', {name: nameForParam}) }}">*/
/*                     <img src="{{ app.request.getSchemeAndHttpHost ~ chat.senderRaceIcon }}">*/
/*                 </a>*/
/* */
/*                 <a data-name="{{ nameForParam }}" class="tooltip-chat" data-type="pg-items"*/
/*                    data-url="{{ url('chat-pg-items', {name: nameForParam}) }}">*/
/*                     <img src="{{ app.request.getSchemeAndHttpHost ~ asset('bundles/gdrgame/images/chat/show-equip.gif') }}">*/
/*                 </a>*/
/* */
/*                 {% if chat.senderRankName %}*/
/*                     <a class="standard-tooltip" title="{{ chat.senderRankName }}">*/
/*                         <img src="{{ app.request.getSchemeAndHttpHost ~ chat.senderLevelIcon }}">*/
/*                     </a>*/
/*                 {% else %}*/
/*                     <a class="standard-tooltip" title="Appartenenza ad Enclavi sconosciuta">*/
/*                         <img src="{{ app.request.getSchemeAndHttpHost ~ asset('bundles/gdrgame/images/chat/no-enclave.png') }}">*/
/*                     </a>*/
/*                 {% endif %}*/
/* */
/*                 {% if chat.combat and chat.combat != "0" %}*/
/*                     <a class="gdrtooltip" title="{{ chat.combat }}">*/
/*                         <img src="{{ app.request.getSchemeAndHttpHost ~ asset('bundles/gdrgame/images/chat/combat.png') }}">*/
/*                     </a>*/
/*                 {% endif %}*/
/* */
/*                 <span class="sender">{{ chat.senderName }}</span>*/
/*                 {% if chat.tag %}*/
/*                     <span class="tag">[{{ chat.tag }}{% if chat.freeTag %}|{{ chat.freeTag }}{% endif %}]</span>*/
/*                 {% endif %}*/
/*                 <span class="body">*/
/*                     {% spaceless %}*/
/*                         {% if isCastI %}*/
/*                             <span class="cast">*</span>*/
/*                     {% elseif isCastII %}*/
/*                             <span class="cast">**</span>*/
/*                         {% endif %}*/
/*                     {{ chat.body|normalChat|trim|raw }}*/
/*                     {% if isCastI %}*/
/*                         <span class="cast">*</span>*/
/*                     {% elseif isCastII %}*/
/*                         <span class="cast">** [<i>{{ chat.castBody }}</i>] **</span>*/
/*                     {% endif %}*/
/*                     {% if chat.special == 'skill' %}*/
/*                         <span class="skill"><i> [{{ chat.skill }}]</i></span>*/
/*                     {% endif %}*/
/*                     {% endspaceless %}*/
/*                 </span>*/
/*             </p>*/
/*         {% endif %}*/
