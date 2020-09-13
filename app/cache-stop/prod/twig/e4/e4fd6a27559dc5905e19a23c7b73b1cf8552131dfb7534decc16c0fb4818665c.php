<?php

/* GdrGameBundle:Letter:show.html.twig */
class __TwigTemplate_95e530db598010fbadccc3592104c02b48bfa2697fbbaf0bb254f455f7af017b extends Twig_Template
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
        if ((array_key_exists("showButtons", $context) && ((isset($context["showButtons"]) ? $context["showButtons"] : null) == true))) {
            // line 2
            echo "    <a class=\"button\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("missive-reply", array("id" => $this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "id", array()))), "html", null, true);
            echo "\">Rispondi</a>
    <a class=\"button\" href=\"";
            // line 3
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("missive-inoltra", array("id" => $this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "id", array()))), "html", null, true);
            echo "\">Inoltra</a>
    <a class=\"button\" href=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("missive-inoltra", array("id" => $this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "id", array()), "isForGroup" => true)), "html", null, true);
            echo "\">Inoltra come ML</a>
";
        } elseif ((        // line 5
array_key_exists("showInoltra", $context) && ((isset($context["showInoltra"]) ? $context["showInoltra"] : null) == true))) {
            // line 6
            echo "    <a class=\"button\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("missive-inoltra", array("id" => $this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "id", array()))), "html", null, true);
            echo "\">Inoltra</a>
";
        }
        // line 8
        echo "<a class=\"button delete-single-letter\" data-href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("missive-single-delete", array("id" => $this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "id", array()))), "html", null, true);
        echo "\">Elimina</a>

<table class=\"letter-read\">
    <thead>
    <tr>
        <td class=\"letter-title\">
            <span>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "special", array()), "html", null, true);
        echo " </span>
            ";
        // line 15
        if ($this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "nameAsAdmin", array())) {
            // line 16
            echo "                <strong>GESTIONE</strong>
            ";
        } elseif ($this->getAttribute(        // line 17
(isset($context["letter"]) ? $context["letter"] : null), "nameAsMod", array())) {
            // line 18
            echo "                <strong>MODERAZIONE</strong>
            ";
        } elseif ($this->getAttribute(        // line 19
(isset($context["letter"]) ? $context["letter"] : null), "nameAsFate", array())) {
            // line 20
            echo "                <strong>FATO</strong>
            ";
        } elseif ((null === $this->getAttribute(        // line 21
(isset($context["letter"]) ? $context["letter"] : null), "sender", array()))) {
            // line 22
            echo "                ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "senderName", array()), "html", null, true);
            echo "
            ";
        } else {
            // line 24
            echo "                ";
            if ($this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "senderRaceIcon", array())) {
                // line 25
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => $this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "senderName", array()))), "html", null, true);
                echo "\">
                        <img title=\"";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "senderRaceName", array()), "html", null, true);
                echo "\" class=\"gdrtooltip\"
                             src=\"";
                // line 27
                echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "senderRaceIcon", array())), "html", null, true);
                echo "\">
                    </a>
                ";
            }
            // line 30
            echo "                ";
            if ($this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "senderLevelIcon", array())) {
                // line 31
                echo "                    <img title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "senderRankName", array()), "html", null, true);
                echo "\" class=\"gdrtooltip\"
                         src=\"";
                // line 32
                echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("enclave") . $this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "senderLevelIcon", array())), "html", null, true);
                echo "\">
                ";
            } else {
                // line 34
                echo "                    <img title=\"Appartenenza ad Enclavi sconosciuta\"
                         src=\"";
                // line 35
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/no-enclave.png"), "html", null, true);
                echo "\">
                ";
            }
            // line 37
            echo "                ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "senderName", array()), "html", null, true);
            echo "
            ";
        }
        // line 39
        echo "        </td>
    </tr>
    </thead>
    <tbody>
    <tr>
        ";
        // line 44
        if ($this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "background", array())) {
            // line 45
            echo "            ";
            $context["backGround"] = ($this->env->getExtension('path_extension')->generateUploadPath("generale") . $this->getAttribute($this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "background", array()), "imageName", array()));
            // line 46
            echo "        ";
        }
        // line 47
        echo "        <td ";
        if ($this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "background", array())) {
            echo "style=\"background-image: url('";
            echo twig_escape_filter($this->env, (isset($context["backGround"]) ? $context["backGround"] : null), "html", null, true);
            echo "')\"";
        }
        echo ">
            ";
        // line 48
        if ($this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "isForward", array())) {
            echo "<p><i>Missiva inoltrata: </i></p>";
        }
        // line 49
        echo "            ";
        echo $this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "body", array());
        echo "

            <p class=\"date\">Teon, ";
        // line 51
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "createdAt", array()), "d/m/Y H.i"), "html", null, true);
        echo "</p>
        </td>
    </tr>

    ";
        // line 55
        if ($this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "oldBody", array())) {
            // line 56
            echo "        <tr>
            <td ";
            // line 57
            if ($this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "background", array())) {
                echo "style=\"background-image: url('";
                echo twig_escape_filter($this->env, (isset($context["backGround"]) ? $context["backGround"] : null), "html", null, true);
                echo "')\"";
            }
            echo ">
                <p class=\"text-centered\"><i>Risposte precedenti</i></p>
                ";
            // line 59
            echo $this->getAttribute((isset($context["letter"]) ? $context["letter"] : null), "oldBody", array());
            echo "
            </td>
        </tr>
    ";
        }
        // line 63
        echo "
    </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Letter:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  186 => 63,  179 => 59,  170 => 57,  167 => 56,  165 => 55,  158 => 51,  152 => 49,  148 => 48,  139 => 47,  136 => 46,  133 => 45,  131 => 44,  124 => 39,  118 => 37,  113 => 35,  110 => 34,  105 => 32,  100 => 31,  97 => 30,  91 => 27,  87 => 26,  82 => 25,  79 => 24,  73 => 22,  71 => 21,  68 => 20,  66 => 19,  63 => 18,  61 => 17,  58 => 16,  56 => 15,  52 => 14,  42 => 8,  36 => 6,  34 => 5,  30 => 4,  26 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if showButtons is defined and showButtons == true %}*/
/*     <a class="button" href="{{ path('missive-reply', {id: letter.id}) }}">Rispondi</a>*/
/*     <a class="button" href="{{ path('missive-inoltra', {id: letter.id}) }}">Inoltra</a>*/
/*     <a class="button" href="{{ path('missive-inoltra', {id: letter.id, isForGroup: true}) }}">Inoltra come ML</a>*/
/* {% elseif showInoltra is defined and showInoltra == true %}*/
/*     <a class="button" href="{{ path('missive-inoltra', {id: letter.id}) }}">Inoltra</a>*/
/* {% endif %}*/
/* <a class="button delete-single-letter" data-href="{{ path('missive-single-delete', {id: letter.id}) }}">Elimina</a>*/
/* */
/* <table class="letter-read">*/
/*     <thead>*/
/*     <tr>*/
/*         <td class="letter-title">*/
/*             <span>{{ letter.special }} </span>*/
/*             {% if letter.nameAsAdmin %}*/
/*                 <strong>GESTIONE</strong>*/
/*             {% elseif letter.nameAsMod %}*/
/*                 <strong>MODERAZIONE</strong>*/
/*             {% elseif letter.nameAsFate %}*/
/*                 <strong>FATO</strong>*/
/*             {% elseif letter.sender is null %}*/
/*                 {{ letter.senderName }}*/
/*             {% else %}*/
/*                 {% if letter.senderRaceIcon %}*/
/*                     <a href="{{ path('avatar-index', {name: letter.senderName}) }}">*/
/*                         <img title="{{ letter.senderRaceName }}" class="gdrtooltip"*/
/*                              src="{{ uploadPath('race') ~ letter.senderRaceIcon }}">*/
/*                     </a>*/
/*                 {% endif %}*/
/*                 {% if letter.senderLevelIcon %}*/
/*                     <img title="{{ letter.senderRankName }}" class="gdrtooltip"*/
/*                          src="{{ uploadPath('enclave') ~ letter.senderLevelIcon }}">*/
/*                 {% else %}*/
/*                     <img title="Appartenenza ad Enclavi sconosciuta"*/
/*                          src="{{ asset('bundles/gdrgame/images/chat/no-enclave.png') }}">*/
/*                 {% endif %}*/
/*                 {{ letter.senderName }}*/
/*             {% endif %}*/
/*         </td>*/
/*     </tr>*/
/*     </thead>*/
/*     <tbody>*/
/*     <tr>*/
/*         {% if letter.background %}*/
/*             {% set backGround = uploadPath('generale') ~ letter.background.imageName %}*/
/*         {% endif %}*/
/*         <td {% if letter.background %}style="background-image: url('{{ backGround }}')"{% endif %}>*/
/*             {% if letter.isForward %}<p><i>Missiva inoltrata: </i></p>{% endif %}*/
/*             {{ letter.body|raw }}*/
/* */
/*             <p class="date">Teon, {{ letter.createdAt|date("d/m/Y H.i") }}</p>*/
/*         </td>*/
/*     </tr>*/
/* */
/*     {% if letter.oldBody %}*/
/*         <tr>*/
/*             <td {% if letter.background %}style="background-image: url('{{ backGround }}')"{% endif %}>*/
/*                 <p class="text-centered"><i>Risposte precedenti</i></p>*/
/*                 {{ letter.oldBody|raw }}*/
/*             </td>*/
/*         </tr>*/
/*     {% endif %}*/
/* */
/*     </tbody>*/
/* </table>*/
