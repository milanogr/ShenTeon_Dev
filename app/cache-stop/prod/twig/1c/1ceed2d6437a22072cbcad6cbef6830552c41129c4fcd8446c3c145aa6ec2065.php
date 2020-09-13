<?php

/* @GdrAvatar/Property/index.html.twig */
class __TwigTemplate_c28c82340448d0b5a3cc75949ae7b680cb1f1fb27ac54e03e67557c8e1cadccc extends Twig_Template
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
        if ((isset($context["is_owner"]) ? $context["is_owner"] : null)) {
            // line 2
            echo "    <h2><span>Chiavi d'accesso</span></h2>

    <table class=\"spaced abitazioni chiavi\">

        ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["keys"]) ? $context["keys"] : null));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["key"]) {
                // line 7
                echo "            <tr>
                <td class=\"dark img\">
                    <img src=\"";
                // line 9
                echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($this->getAttribute($context["key"], "item", array()), "image"), "html", null, true);
                echo "\">
                    ";
                // line 10
                if ((isset($context["is_owner"]) ? $context["is_owner"] : null)) {
                    // line 11
                    echo "                        ";
                    if ((isset($context["isInGame"]) ? $context["isInGame"] : null)) {
                        // line 12
                        echo "                            <button class=\"small\">Non puoi cambiare chat finché sei in gioco</button>
                        ";
                    } else {
                        // line 14
                        echo "                            <a class=\"button small entra-chat\"
                               href=\"";
                        // line 15
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("change_location", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute($context["key"], "item", array()), "canAccessLocation", array()), "id", array()))), "html", null, true);
                        echo "\">
                                ENTRA IN CHAT
                            </a>
                        ";
                    }
                    // line 19
                    echo "                    ";
                }
                // line 20
                echo "                </td>
                <td class=\"description\">
                    <p><span>Nome: </span>";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["key"], "item", array()), "name", array()), "html", null, true);
                echo "</p>

                    <p><span>Descrizione: </span>";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["key"], "item", array()), "shortDescription", array()), "html", null, true);
                echo "</p>
                </td>
                <td class=\"abita\">
                    <label>Abita</label>
                    <input type=\"checkbox\" name=\"abita\" data-href=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("property-address", array("key" => $this->getAttribute($this->getAttribute($context["key"], "item", array()), "id", array()))), "html", null, true);
                echo "\"
                           ";
                // line 29
                if (($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "address", array()) == $this->getAttribute($this->getAttribute($context["key"], "item", array()), "canAccessLocation", array()))) {
                    echo "checked=\"checked\"";
                }
                echo ">
                </td>
            </tr>
        ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 33
                echo "            <tr>
                <td class=\"text-centered\">Al momento non disponi di chiavi che ti permettono di abitare da qualche
                    parte. Se
                    sei il proprietario di qualche abitazione, prima devi generare gli oggetti chiave.
                </td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['key'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "
    </table>
";
        }
        // line 43
        echo "
<h2><span>Abitazioni</span></h2>

<table class=\"spaced abitazioni\">

    ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["houses"]) ? $context["houses"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["house"]) {
            // line 49
            echo "        <tr>
            <td class=\"dark img\">
                <img src=\"";
            // line 51
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($context["house"], "image"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["house"], "name", array()), "html", null, true);
            echo "\">
                ";
            // line 52
            if ((isset($context["is_owner"]) ? $context["is_owner"] : null)) {
                // line 53
                echo "                    <button class=\"small mostra-chiavi\" data-href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("property-show-keys", array("id" => $this->getAttribute($context["house"], "id", array()))), "html", null, true);
                echo "\">
                        Gestisci chiavi
                    </button>
                    <button data-href=\"";
                // line 56
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("property-create-keys", array("id" => $this->getAttribute($context["house"], "id", array()))), "html", null, true);
                echo "\" class=\"small crea-chiavi\">
                        Crea chiavi
                    </button>
                    <button class=\"sell small\" data-href=\"";
                // line 59
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("property-sell", array("id" => $this->getAttribute($context["house"], "id", array()))), "html", null, true);
                echo "\">Vendi</button>
                ";
            }
            // line 61
            echo "            </td>
            <td class=\"description\">
                <p><span>Nome: </span>";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($context["house"], "name", array()), "html", null, true);
            echo "</p>

                <p><span>Descrizione: </span> ";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute($context["house"], "description", array()), "html", null, true);
            echo "</p>

                <p><span>Valore: </span> ";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute($context["house"], "price", array()), "html", null, true);
            echo " Mori</p>

                <p><span>Tassa mensile: </span> ";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($context["house"], "tax", array()), "html", null, true);
            echo " Mori ";
            if ((isset($context["is_owner"]) ? $context["is_owner"] : null)) {
                echo "<abbr title=\"Visibile solo a te\">
                        al ";
                // line 70
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["house"], "nextTaxAt", array()), "d/m/y H:i"), "html", null, true);
                echo " (circa)</abbr>";
            }
            echo "</p>
            </td>
        </tr>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 74
            echo "        <tr>
            <td class=\"text-centered\">Il personaggio non dispone di Abitazioni.</td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['house'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo "</table>

<hr>

<h2><span>Botteghe/Terreni</span></h2>
<table class=\"spaced abitazioni\">
    ";
        // line 84
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["activities"]) ? $context["activities"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["activity"]) {
            // line 85
            echo "        <tr>
            <td class=\"dark img\">
                <img src=\"";
            // line 87
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($context["activity"], "image"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["activity"], "name", array()), "html", null, true);
            echo "\">
                ";
            // line 88
            if ((isset($context["is_owner"]) ? $context["is_owner"] : null)) {
                // line 89
                echo "                    <button class=\"small show-items\" data-href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("property-items", array("id" => $this->getAttribute($context["activity"], "id", array()))), "html", null, true);
                echo "\">
                        Prodotti
                    </button>
                    <button class=\"sell small\" data-href=\"";
                // line 92
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("property-sell", array("id" => $this->getAttribute($context["activity"], "id", array()))), "html", null, true);
                echo "\">Vendi</button>
                ";
            }
            // line 94
            echo "            </td>
            <td class=\"description\">
                <p><span>Nome: </span>";
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute($context["activity"], "name", array()), "html", null, true);
            echo "</p>

                <p><span>Descrizione: </span> ";
            // line 98
            echo twig_escape_filter($this->env, $this->getAttribute($context["activity"], "description", array()), "html", null, true);
            echo "</p>

                <p><span>Valore: </span> ";
            // line 100
            echo twig_escape_filter($this->env, $this->getAttribute($context["activity"], "price", array()), "html", null, true);
            echo " Mori</p>

                <p><span>Tassa mensile: </span> ";
            // line 102
            echo twig_escape_filter($this->env, $this->getAttribute($context["activity"], "tax", array()), "html", null, true);
            echo " Mori ";
            if ((isset($context["is_owner"]) ? $context["is_owner"] : null)) {
                echo "<abbr
                            title=\"Visibile solo a te\">al ";
                // line 103
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["activity"], "nextTaxAt", array()), "d/m/y H:i"), "html", null, true);
                echo "
                        (circa)</abbr>";
            }
            // line 104
            echo "</p>
                ";
            // line 105
            if ((isset($context["is_owner"]) ? $context["is_owner"] : null)) {
                // line 106
                echo "                    <p>
                        <abbr title=\"Visibile solo a te\"><span>Prossima produzione il: </span>";
                // line 107
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["activity"], "nextProductionAt", array()), "d/m/y H:i"), "html", null, true);
                echo "
                            (circa)</abbr>
                    </p>
                ";
            }
            // line 111
            echo "            </td>
        </tr>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 114
            echo "        <tr>
            <td class=\"text-centered\">Il personaggio non dispone di Botteghe o Terreni.</td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['activity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 118
        echo "</table>";
    }

    public function getTemplateName()
    {
        return "@GdrAvatar/Property/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  295 => 118,  286 => 114,  279 => 111,  272 => 107,  269 => 106,  267 => 105,  264 => 104,  259 => 103,  253 => 102,  248 => 100,  243 => 98,  238 => 96,  234 => 94,  229 => 92,  222 => 89,  220 => 88,  214 => 87,  210 => 85,  205 => 84,  197 => 78,  188 => 74,  177 => 70,  171 => 69,  166 => 67,  161 => 65,  156 => 63,  152 => 61,  147 => 59,  141 => 56,  134 => 53,  132 => 52,  126 => 51,  122 => 49,  117 => 48,  110 => 43,  105 => 40,  93 => 33,  82 => 29,  78 => 28,  71 => 24,  66 => 22,  62 => 20,  59 => 19,  52 => 15,  49 => 14,  45 => 12,  42 => 11,  40 => 10,  36 => 9,  32 => 7,  27 => 6,  21 => 2,  19 => 1,);
    }
}
/* {% if is_owner %}*/
/*     <h2><span>Chiavi d'accesso</span></h2>*/
/* */
/*     <table class="spaced abitazioni chiavi">*/
/* */
/*         {% for key in keys %}*/
/*             <tr>*/
/*                 <td class="dark img">*/
/*                     <img src="{{ vich_uploader_asset(key.item, 'image') }}">*/
/*                     {% if is_owner %}*/
/*                         {% if isInGame %}*/
/*                             <button class="small">Non puoi cambiare chat finché sei in gioco</button>*/
/*                         {% else %}*/
/*                             <a class="button small entra-chat"*/
/*                                href="{{ path('change_location', {id: key.item.canAccessLocation.id}) }}">*/
/*                                 ENTRA IN CHAT*/
/*                             </a>*/
/*                         {% endif %}*/
/*                     {% endif %}*/
/*                 </td>*/
/*                 <td class="description">*/
/*                     <p><span>Nome: </span>{{ key.item.name }}</p>*/
/* */
/*                     <p><span>Descrizione: </span>{{ key.item.shortDescription }}</p>*/
/*                 </td>*/
/*                 <td class="abita">*/
/*                     <label>Abita</label>*/
/*                     <input type="checkbox" name="abita" data-href="{{ path('property-address', {key: key.item.id}) }}"*/
/*                            {% if personage.address == key.item.canAccessLocation %}checked="checked"{% endif %}>*/
/*                 </td>*/
/*             </tr>*/
/*         {% else %}*/
/*             <tr>*/
/*                 <td class="text-centered">Al momento non disponi di chiavi che ti permettono di abitare da qualche*/
/*                     parte. Se*/
/*                     sei il proprietario di qualche abitazione, prima devi generare gli oggetti chiave.*/
/*                 </td>*/
/*             </tr>*/
/*         {% endfor %}*/
/* */
/*     </table>*/
/* {% endif %}*/
/* */
/* <h2><span>Abitazioni</span></h2>*/
/* */
/* <table class="spaced abitazioni">*/
/* */
/*     {% for house in houses %}*/
/*         <tr>*/
/*             <td class="dark img">*/
/*                 <img src="{{ vich_uploader_asset(house, 'image') }}" alt="{{ house.name }}">*/
/*                 {% if is_owner %}*/
/*                     <button class="small mostra-chiavi" data-href="{{ path('property-show-keys', {id: house.id}) }}">*/
/*                         Gestisci chiavi*/
/*                     </button>*/
/*                     <button data-href="{{ path('property-create-keys', {id: house.id}) }}" class="small crea-chiavi">*/
/*                         Crea chiavi*/
/*                     </button>*/
/*                     <button class="sell small" data-href="{{ path('property-sell', {id: house.id}) }}">Vendi</button>*/
/*                 {% endif %}*/
/*             </td>*/
/*             <td class="description">*/
/*                 <p><span>Nome: </span>{{ house.name }}</p>*/
/* */
/*                 <p><span>Descrizione: </span> {{ house.description }}</p>*/
/* */
/*                 <p><span>Valore: </span> {{ house.price }} Mori</p>*/
/* */
/*                 <p><span>Tassa mensile: </span> {{ house.tax }} Mori {% if is_owner %}<abbr title="Visibile solo a te">*/
/*                         al {{ house.nextTaxAt|date("d/m/y H:i") }} (circa)</abbr>{% endif %}</p>*/
/*             </td>*/
/*         </tr>*/
/*     {% else %}*/
/*         <tr>*/
/*             <td class="text-centered">Il personaggio non dispone di Abitazioni.</td>*/
/*         </tr>*/
/*     {% endfor %}*/
/* </table>*/
/* */
/* <hr>*/
/* */
/* <h2><span>Botteghe/Terreni</span></h2>*/
/* <table class="spaced abitazioni">*/
/*     {% for activity in activities %}*/
/*         <tr>*/
/*             <td class="dark img">*/
/*                 <img src="{{ vich_uploader_asset(activity, 'image') }}" alt="{{ activity.name }}">*/
/*                 {% if is_owner %}*/
/*                     <button class="small show-items" data-href="{{ path('property-items', {id: activity.id}) }}">*/
/*                         Prodotti*/
/*                     </button>*/
/*                     <button class="sell small" data-href="{{ path('property-sell', {id: activity.id}) }}">Vendi</button>*/
/*                 {% endif %}*/
/*             </td>*/
/*             <td class="description">*/
/*                 <p><span>Nome: </span>{{ activity.name }}</p>*/
/* */
/*                 <p><span>Descrizione: </span> {{ activity.description }}</p>*/
/* */
/*                 <p><span>Valore: </span> {{ activity.price }} Mori</p>*/
/* */
/*                 <p><span>Tassa mensile: </span> {{ activity.tax }} Mori {% if is_owner %}<abbr*/
/*                             title="Visibile solo a te">al {{ activity.nextTaxAt|date("d/m/y H:i") }}*/
/*                         (circa)</abbr>{% endif %}</p>*/
/*                 {% if is_owner %}*/
/*                     <p>*/
/*                         <abbr title="Visibile solo a te"><span>Prossima produzione il: </span>{{ activity.nextProductionAt|date("d/m/y H:i") }}*/
/*                             (circa)</abbr>*/
/*                     </p>*/
/*                 {% endif %}*/
/*             </td>*/
/*         </tr>*/
/*     {% else %}*/
/*         <tr>*/
/*             <td class="text-centered">Il personaggio non dispone di Botteghe o Terreni.</td>*/
/*         </tr>*/
/*     {% endfor %}*/
/* </table>*/
