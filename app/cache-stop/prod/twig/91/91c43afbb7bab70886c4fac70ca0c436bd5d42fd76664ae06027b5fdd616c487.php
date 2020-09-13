<?php

/* @GdrAvatar/Default/avatar.html.twig */
class __TwigTemplate_17c3f086ce845a4a19bcd15af8fb09ebfe65f26f5eda2cacf0a4c493ebb34ca4 extends Twig_Template
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
        echo "<div class=\"first-row\">
    <div class=\"first-column\">
        <div class=\"container-image\">
            <div class=\"image-background\"></div>
            ";
        // line 5
        if ($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "avatarName", array())) {
            // line 6
            echo "                <img class=\"avatar-image\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset((isset($context["personage"]) ? $context["personage"] : null), "avatar"), "html", null, true);
            echo "\"
                     alt=\"Avatar di ";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "name", array()), "html", null, true);
            echo "\"/>
            ";
        } else {
            // line 9
            echo "                ";
            if (($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "gender", array()) == 1)) {
                // line 10
                echo "                    ";
                $context["img"] = $this->env->getExtension('vich_uploader')->asset($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "race", array()), "maleImage");
                // line 11
                echo "                ";
            } else {
                // line 12
                echo "                    ";
                $context["img"] = $this->env->getExtension('vich_uploader')->asset($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "race", array()), "femaleImage");
                // line 13
                echo "                ";
            }
            // line 14
            echo "                <img class=\"avatar-image\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["img"]) ? $context["img"] : null), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "race", array()), "name", array()), "html", null, true);
            echo "\"/>
            ";
        }
        // line 16
        echo "        </div>

        <a class=\"scrivi-missiva\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("missive-create", array("isForGroup" => 0, "destinatario" => $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "name", array()))), "html", null, true);
        echo "\">Scrivi
            una
            missiva</a>
    </div>
    <div class=\"second-column\">
        <ul>
            <li><span>Nome:</span> ";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "name", array()), "html", null, true);
        echo "</li>
            <li><span>Cognome:</span> ";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "surname", array()), "html", null, true);
        echo "</li>
            <li><span>Nome Esteso:</span> ";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "nameExtended", array()), "html", null, true);
        echo "</li>
            <li><span>Razza:</span> <img src=\"";
        // line 27
        echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "raceIcon", array())), "html", null, true);
        echo "\"> ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "race", array()), "name", array()), "html", null, true);
        echo "
            </li>
            <li><span>Età:</span> ";
        // line 29
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "skillsLevel", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "skillsLevel", array()), "Imprecisato")) : ("Imprecisato")), "html", null, true);
        echo " ";
        if ((isset($context["is_owner"]) ? $context["is_owner"] : null)) {
            echo "<abbr
                        title=\"Visibile solo a te\">(";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "age", array()), "html", null, true);
            echo " anni)</abbr>";
        }
        echo " <abbr
                        class=\"gdrtooltip\" title=\"La Fascia d'Età è l'indicazione per gli altri giocatori di quanto sia vecchio il Personaggio.\">[?]</abbr></li>
            <li><span>Forza:</span> ";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "strength", array()), "html", null, true);
        echo " <abbr class=\"gdrtooltip\"
                                                                   title=\"La Forza è un valore calcolato in base all'età ed alla Razza del Personaggio. Rappresenta approssimativamente la sua prestanza fisica.\">[?]</abbr>
            </li>
            <li><span>Saggezza:</span> ";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "sapience", array()), "html", null, true);
        echo " <abbr class=\"gdrtooltip\"
                                                                      title=\"La Saggezza è un valore calcolato in base all'età ed alla Razza del Personaggio. Rappresenta approssimativamente il suo grado di saggezza.\">[?]</abbr>
            </li>
            ";
        // line 38
        if ($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "hideEnclave", array())) {
            // line 39
            echo "                <li><span>Enclave:</span> -</li>
                <li><span>Ruolo Enclave:</span> -</li>
            ";
        } else {
            // line 42
            echo "                <li><span>Enclave:</span> ";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "enclaveRank", array(), "any", false, true), "enclave", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "enclaveRank", array(), "any", false, true), "enclave", array()), "-")) : ("-")), "html", null, true);
            echo "</li>
                <li><span>Ruolo Enclave:</span> ";
            // line 43
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "enclaveRank", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "enclaveRank", array()), "-")) : ("-")), "html", null, true);
            echo "</li>
            ";
        }
        // line 45
        echo "            ";
        if ($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "hideClan", array())) {
            // line 46
            echo "                <li><span>Enclave Razziale:</span> -</li>
                <li><span>Ruolo Enclave Razziale:</span> -</li>
            ";
        } else {
            // line 49
            echo "                <li><span>Enclave Razziale:</span> ";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "clanRank", array(), "any", false, true), "enclave", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "clanRank", array(), "any", false, true), "enclave", array()), "-")) : ("-")), "html", null, true);
            echo "</li>
                <li><span>Ruolo Enclave Razziale:</span> ";
            // line 50
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "clanRank", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "clanRank", array()), "-")) : ("-")), "html", null, true);
            echo "</li>
            ";
        }
        // line 52
        echo "            <li><span>Status:</span> ";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "status", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "status", array()), "Cittadino")) : ("Cittadino")), "html", null, true);
        echo "</li>
            <li><span>Titolo:</span> ";
        // line 53
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "title", array()), "-")) : ("-")), "html", null, true);
        echo "</li>
            <li>
                <span>Residenza:</span> ";
        // line 55
        if ((isset($context["hasKey"]) ? $context["hasKey"] : null)) {
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "address", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "address", array()), "Senza fissa dimora")) : ("Senza fissa dimora")), "html", null, true);
        } else {
            echo "Senza fissa dimora";
        }
        // line 56
        echo "            </li>
            <li><span>Attività:</span> ";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "activity", array()), "html", null, true);
        echo "</li>
            <li><span>A Teon dal:</span>
                ";
        // line 59
        if ((twig_date_format_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "createdAt", array()), "Y") >= "2013")) {
            // line 60
            echo "                    ";
            echo twig_escape_filter($this->env, $this->env->getExtension('teon_date_extension')->teonDateFilter(twig_date_format_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "createdAt", array()), "d/m/Y"), true), "html", null, true);
            echo "
                ";
        } else {
            // line 62
            echo "                    Antico Teoniano
                ";
        }
        // line 64
        echo "            </li>
            ";
        // line 65
        if ($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "marriedWith", array())) {
            // line 66
            echo "                <li><span>Stato civile:</span> Sposato/a
                    con ";
            // line 67
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "marriedWith", array(), "any", false, true), "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "marriedWith", array(), "any", false, true), "title", array()), "")) : ("")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "marriedWith", array()), "name", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "marriedWith", array()), "surname", array()), "value", array()), "html", null, true);
            echo "
                </li>
            ";
        } else {
            // line 70
            echo "                <li><span>Stato civile:</span> Nubile/Celibe</li>
            ";
        }
        // line 72
        echo "        </ul>
    </div>
</div>

<div class=\"second-row\">
    <div class=\"first-column\">
        <ul>
            <li><span>Livello Razziale: </span>";
        // line 79
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "raceLevel", array()), "html", null, true);
        echo " <abbr
                        title=\"Il Livello di Razza indica l'evoluzione di consapevolezza del Personaggio su Shenteon.\"
                        class=\"gdrtooltip\">[?]</abbr></li>

            ";
        // line 83
        if ((isset($context["is_owner"]) ? $context["is_owner"] : null)) {
            // line 84
            echo "                <li><span>Livello Combattente: </span> <abbr title=\"Visibile solo a te\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "combatLevel", array()), "html", null, true);
            echo "</abbr></li>
                <li><span>Mori indosso:</span> <abbr title=\"Visibile solo a te\">";
            // line 85
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "bagAmount", array()), "html", null, true);
            echo "/10000</abbr>
                </li>
                <li><span>Mori in banca:</span> <abbr title=\"Visibile solo a te\">";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "bankAmount", array()), "html", null, true);
            echo "</abbr></li>
                <li><span>Lingue conosciute:</span> <abbr title=\"Visibile solo a te\">";
            // line 88
            echo twig_escape_filter($this->env, twig_join_filter((isset($context["languages"]) ? $context["languages"] : null), ", "), "html", null, true);
            echo "</abbr>
                </li>
            ";
        }
        // line 91
        echo "            <li><span>Esperienza Razziale:</span> ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "experience", array()), "html", null, true);
        echo " <abbr class=\"gdrtooltip\" title=\"L'Esperienza Razziale indica il numero di azioni effettuate dal Personaggio con la Razza attuale.\">[?]</abbr></li>
            <li><span>Esperienza Totale:</span> ";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "globalExperience", array()), "html", null, true);
        echo " <abbr
                        title=\"L'Esperienza Totale indica il numero di azioni effettuate dal Personaggio.\"
                        class=\"gdrtooltip\">[?]</abbr></li>
            <li><span>Presenza su Teon:</span> ";
        // line 95
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "carisma", array()), "html", null, true);
        echo " <abbr
                        title=\"La Presenza su Teon indica il numero d'ore di connessione al sito.\" class=\"gdrtooltip\">[?]</abbr>
            </li>
            <li><span>Altezza:</span> ";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "height", array()), "html", null, true);
        echo " cm</li>
            <li><span>Peso:</span> ";
        // line 99
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "weight", array()), "html", null, true);
        echo " kg</li>
            <li><span>Pelle/Pelo/Squame:</span> ";
        // line 100
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "rightSkin", array()), "html", null, true);
        echo "</li>
            <li><span>Occhi:</span> ";
        // line 101
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "eyeColor", array()), "html", null, true);
        echo "</li>
            <li><span>Capelli:</span> ";
        // line 102
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "hairColor", array()), "html", null, true);
        echo "</li>
            <li><span>Parentele:</span> ";
        // line 103
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "relationship", array()), "html", null, true);
        echo "</li>
            <li><span>Amicizie:</span> ";
        // line 104
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "friendship", array()), "html", null, true);
        echo "</li>
            <li><span>Note del fato: </span> ";
        // line 105
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "fateNote", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "fateNote", array()), "-")) : ("-")), "html", null, true);
        echo "</li>
        </ul>
    </div>
</div>

<div class=\"free-description-container\">
    <i>Descrizione libera</i>

    <div class=\"free-description\">
        <div class=\"corner\"></div>
        <p>";
        // line 115
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "description", array()), "html", null, true);
        echo "</p>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "@GdrAvatar/Default/avatar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  306 => 115,  293 => 105,  289 => 104,  285 => 103,  281 => 102,  277 => 101,  273 => 100,  269 => 99,  265 => 98,  259 => 95,  253 => 92,  248 => 91,  242 => 88,  238 => 87,  233 => 85,  228 => 84,  226 => 83,  219 => 79,  210 => 72,  206 => 70,  196 => 67,  193 => 66,  191 => 65,  188 => 64,  184 => 62,  178 => 60,  176 => 59,  171 => 57,  168 => 56,  162 => 55,  157 => 53,  152 => 52,  147 => 50,  142 => 49,  137 => 46,  134 => 45,  129 => 43,  124 => 42,  119 => 39,  117 => 38,  111 => 35,  105 => 32,  98 => 30,  92 => 29,  85 => 27,  81 => 26,  77 => 25,  73 => 24,  64 => 18,  60 => 16,  52 => 14,  49 => 13,  46 => 12,  43 => 11,  40 => 10,  37 => 9,  32 => 7,  27 => 6,  25 => 5,  19 => 1,);
    }
}
/* <div class="first-row">*/
/*     <div class="first-column">*/
/*         <div class="container-image">*/
/*             <div class="image-background"></div>*/
/*             {% if personage.avatarName %}*/
/*                 <img class="avatar-image" src="{{ vich_uploader_asset(personage, 'avatar') }}"*/
/*                      alt="Avatar di {{ personage.name }}"/>*/
/*             {% else %}*/
/*                 {% if personage.gender == 1 %}*/
/*                     {% set img = vich_uploader_asset(personage.race, 'maleImage') %}*/
/*                 {% else %}*/
/*                     {% set img = vich_uploader_asset(personage.race, 'femaleImage') %}*/
/*                 {% endif %}*/
/*                 <img class="avatar-image" src="{{ img }}" alt="{{ personage.race.name }}"/>*/
/*             {% endif %}*/
/*         </div>*/
/* */
/*         <a class="scrivi-missiva" href="{{ path('missive-create', {isForGroup:0, destinatario: personage.name}) }}">Scrivi*/
/*             una*/
/*             missiva</a>*/
/*     </div>*/
/*     <div class="second-column">*/
/*         <ul>*/
/*             <li><span>Nome:</span> {{ personage.name }}</li>*/
/*             <li><span>Cognome:</span> {{ personage.surname }}</li>*/
/*             <li><span>Nome Esteso:</span> {{ personage.nameExtended }}</li>*/
/*             <li><span>Razza:</span> <img src="{{ uploadPath('race') ~ personage.raceIcon }}"> {{ personage.race.name }}*/
/*             </li>*/
/*             <li><span>Età:</span> {{ personage.skillsLevel|default("Imprecisato") }} {% if is_owner %}<abbr*/
/*                         title="Visibile solo a te">({{ personage.age }} anni)</abbr>{% endif %} <abbr*/
/*                         class="gdrtooltip" title="La Fascia d'Età è l'indicazione per gli altri giocatori di quanto sia vecchio il Personaggio.">[?]</abbr></li>*/
/*             <li><span>Forza:</span> {{ personage.strength }} <abbr class="gdrtooltip"*/
/*                                                                    title="La Forza è un valore calcolato in base all'età ed alla Razza del Personaggio. Rappresenta approssimativamente la sua prestanza fisica.">[?]</abbr>*/
/*             </li>*/
/*             <li><span>Saggezza:</span> {{ personage.sapience }} <abbr class="gdrtooltip"*/
/*                                                                       title="La Saggezza è un valore calcolato in base all'età ed alla Razza del Personaggio. Rappresenta approssimativamente il suo grado di saggezza.">[?]</abbr>*/
/*             </li>*/
/*             {% if personage.hideEnclave %}*/
/*                 <li><span>Enclave:</span> -</li>*/
/*                 <li><span>Ruolo Enclave:</span> -</li>*/
/*             {% else %}*/
/*                 <li><span>Enclave:</span> {{ personage.enclaveRank.enclave|default('-') }}</li>*/
/*                 <li><span>Ruolo Enclave:</span> {{ personage.enclaveRank|default('-') }}</li>*/
/*             {% endif %}*/
/*             {% if personage.hideClan %}*/
/*                 <li><span>Enclave Razziale:</span> -</li>*/
/*                 <li><span>Ruolo Enclave Razziale:</span> -</li>*/
/*             {% else %}*/
/*                 <li><span>Enclave Razziale:</span> {{ personage.clanRank.enclave|default('-') }}</li>*/
/*                 <li><span>Ruolo Enclave Razziale:</span> {{ personage.clanRank|default('-') }}</li>*/
/*             {% endif %}*/
/*             <li><span>Status:</span> {{ personage.status|default("Cittadino") }}</li>*/
/*             <li><span>Titolo:</span> {{ personage.title|default("-") }}</li>*/
/*             <li>*/
/*                 <span>Residenza:</span> {% if hasKey %}{{ personage.address|default('Senza fissa dimora') }}{% else %}Senza fissa dimora{% endif %}*/
/*             </li>*/
/*             <li><span>Attività:</span> {{ personage.activity }}</li>*/
/*             <li><span>A Teon dal:</span>*/
/*                 {% if personage.createdAt|date('Y') >= '2013' %}*/
/*                     {{ personage.createdAt|date('d/m/Y')|teon_date(true) }}*/
/*                 {% else %}*/
/*                     Antico Teoniano*/
/*                 {% endif %}*/
/*             </li>*/
/*             {% if personage.marriedWith %}*/
/*                 <li><span>Stato civile:</span> Sposato/a*/
/*                     con {{ personage.marriedWith.title|default("") }} {{ personage.marriedWith.name }} {{ personage.marriedWith.surname.value }}*/
/*                 </li>*/
/*             {% else %}*/
/*                 <li><span>Stato civile:</span> Nubile/Celibe</li>*/
/*             {% endif %}*/
/*         </ul>*/
/*     </div>*/
/* </div>*/
/* */
/* <div class="second-row">*/
/*     <div class="first-column">*/
/*         <ul>*/
/*             <li><span>Livello Razziale: </span>{{ personage.raceLevel }} <abbr*/
/*                         title="Il Livello di Razza indica l'evoluzione di consapevolezza del Personaggio su Shenteon."*/
/*                         class="gdrtooltip">[?]</abbr></li>*/
/* */
/*             {% if is_owner %}*/
/*                 <li><span>Livello Combattente: </span> <abbr title="Visibile solo a te">{{ personage.combatLevel }}</abbr></li>*/
/*                 <li><span>Mori indosso:</span> <abbr title="Visibile solo a te">{{ personage.bagAmount }}/10000</abbr>*/
/*                 </li>*/
/*                 <li><span>Mori in banca:</span> <abbr title="Visibile solo a te">{{ personage.bankAmount }}</abbr></li>*/
/*                 <li><span>Lingue conosciute:</span> <abbr title="Visibile solo a te">{{ languages|join(", ") }}</abbr>*/
/*                 </li>*/
/*             {% endif %}*/
/*             <li><span>Esperienza Razziale:</span> {{ personage.experience }} <abbr class="gdrtooltip" title="L'Esperienza Razziale indica il numero di azioni effettuate dal Personaggio con la Razza attuale.">[?]</abbr></li>*/
/*             <li><span>Esperienza Totale:</span> {{ personage.globalExperience }} <abbr*/
/*                         title="L'Esperienza Totale indica il numero di azioni effettuate dal Personaggio."*/
/*                         class="gdrtooltip">[?]</abbr></li>*/
/*             <li><span>Presenza su Teon:</span> {{ personage.carisma }} <abbr*/
/*                         title="La Presenza su Teon indica il numero d'ore di connessione al sito." class="gdrtooltip">[?]</abbr>*/
/*             </li>*/
/*             <li><span>Altezza:</span> {{ personage.height }} cm</li>*/
/*             <li><span>Peso:</span> {{ personage.weight }} kg</li>*/
/*             <li><span>Pelle/Pelo/Squame:</span> {{ personage.rightSkin }}</li>*/
/*             <li><span>Occhi:</span> {{ personage.eyeColor }}</li>*/
/*             <li><span>Capelli:</span> {{ personage.hairColor }}</li>*/
/*             <li><span>Parentele:</span> {{ personage.relationship }}</li>*/
/*             <li><span>Amicizie:</span> {{ personage.friendship }}</li>*/
/*             <li><span>Note del fato: </span> {{ personage.fateNote|default("-") }}</li>*/
/*         </ul>*/
/*     </div>*/
/* </div>*/
/* */
/* <div class="free-description-container">*/
/*     <i>Descrizione libera</i>*/
/* */
/*     <div class="free-description">*/
/*         <div class="corner"></div>*/
/*         <p>{{ personage.description }}</p>*/
/*     </div>*/
/* </div>*/
/* */
/* */
