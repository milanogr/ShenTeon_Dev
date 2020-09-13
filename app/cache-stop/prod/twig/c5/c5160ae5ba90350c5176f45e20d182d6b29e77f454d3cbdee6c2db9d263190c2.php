<?php

/* GdrAvatarBundle:Inventory:bag.html.twig */
class __TwigTemplate_91a2868ecd6be3cbcad76e3a5ad057e2e4bb2e5f999969183e7b9d3454618b2c extends Twig_Template
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
        echo "<span></span>
";
        // line 2
        if (((isset($context["is_owner"]) ? $context["is_owner"] : null) || $this->env->getExtension('security')->isGranted("ROLE_ADMIN"))) {
            // line 3
            echo "    <div class=\"text-centered\">
        <h3>Oggetti in borsa: <span class=\"total-items\">";
            // line 4
            echo twig_escape_filter($this->env, (isset($context["totalItems"]) ? $context["totalItems"] : null), "html", null, true);
            echo "</span></h3>

        <h3 class=\"bag-stats\">Peso-Ingombro: <span class=\"actual-weight\">";
            // line 6
            echo twig_escape_filter($this->env, (isset($context["totalWeight"]) ? $context["totalWeight"] : null), "html", null, true);
            echo "</span>/<span
                    class=\"max-weight\">";
            // line 7
            echo twig_escape_filter($this->env, (isset($context["bag_limit"]) ? $context["bag_limit"] : null), "html", null, true);
            echo "</span></h3>
    </div>
";
        }
        // line 10
        echo "
";
        // line 12
        echo "<div class=\"tab-bag\">
    <table class=\"items-table-container solited\">
        <thead>
        <tr>
            <th colspan=\"4\">La borsa di ";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "name", array()), "html", null, true);
        echo "</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 21
            echo "            <tr class=\"item-row\">
                <td class=\"item-preview\">
                    <img src=\"";
            // line 23
            echo twig_escape_filter($this->env, (isset($context["upload_path"]) ? $context["upload_path"] : null), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemImageName", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemName", array()), "html", null, true);
            echo "\">
                    ";
            // line 24
            if (((isset($context["is_owner"]) ? $context["is_owner"] : null) || $this->env->getExtension('security')->isGranted("ROLE_ADMIN"))) {
                // line 25
                echo "                        <button class=\"button small esamina-item\"
                                data-href=\"";
                // line 26
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-inventory-item", array("id" => $this->getAttribute($this->getAttribute($context["item"], 0, array()), "id", array()))), "html", null, true);
                echo "\">Esamina
                        </button>
                    ";
            }
            // line 29
            echo "                </td>
                <td class=\"item-dress-icon\">
                    ";
            // line 31
            if (($this->getAttribute($context["item"], "categoryName", array()) == (isset($context["categoryVestiti"]) ? $context["categoryVestiti"] : null))) {
                // line 32
                echo "                        <img src=\"";
                echo twig_escape_filter($this->env, (isset($context["upload_path"]) ? $context["upload_path"] : null), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemDressIconImageName", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemName", array()), "html", null, true);
                echo "\">
                    ";
            }
            // line 34
            echo "                </td>
                <td class=\"item-infos\">
                    <ul>
                        <li><span>Nome:</span> ";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemName", array()), "html", null, true);
            echo "</li>
                        <li><span>Peso/Ingombro:</span> ";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemWeight", array()), "html", null, true);
            echo "</li>
                        <li><span>Descrizione:</span> ";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemShortDescription", array()), "html", null, true);
            echo "</li>

                        ";
            // line 41
            if ($this->getAttribute($context["item"], "inventoryExpireAt", array())) {
                // line 42
                echo "                            <li><span>Scadenza:</span> ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "inventoryExpireAt", array()), "d/m/Y"), "html", null, true);
                echo "</li>
                        ";
            }
            // line 44
            echo "
                        ";
            // line 46
            echo "                        ";
            if (((isset($context["is_owner"]) ? $context["is_owner"] : null) || $this->env->getExtension('security')->isGranted("ROLE_ADMIN"))) {
                // line 47
                echo "                            <li class=\"divider\">Informazioni visibili solo dal proprietario:</li>

                            ";
                // line 49
                if ($this->getAttribute($context["item"], "itemActiveDescription", array())) {
                    // line 50
                    echo "                                <li class=\"effect\">
                                    <span>Attiva:</span>
                                    ";
                    // line 52
                    if ($this->getAttribute($context["item"], "itemShowActiveDescription", array())) {
                        // line 53
                        echo "                                        <i>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemActiveDescription", array()), "html", null, true);
                        echo "</i>
                                    ";
                    } else {
                        // line 55
                        echo "                                        <i>Effetto nascosto.</i>
                                    ";
                    }
                    // line 57
                    echo "                                </li>
                            ";
                }
                // line 59
                echo "
                            ";
                // line 60
                if ($this->getAttribute($context["item"], "itemExpendableDescription", array())) {
                    // line 61
                    echo "                                <li class=\"effect\">
                                    <span>Effetto:</span>
                                    ";
                    // line 63
                    if ($this->getAttribute($context["item"], "itemShowExpendableDescription", array())) {
                        // line 64
                        echo "                                        <i>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemExpendableDescription", array()), "html", null, true);
                        echo "</i>
                                    ";
                    } else {
                        // line 66
                        echo "                                        <i>Effetto nascosto</i>
                                    ";
                    }
                    // line 68
                    echo "                                </li>
                            ";
                }
                // line 70
                echo "
                            ";
                // line 71
                if (((null === $this->getAttribute($context["item"], "itemExpendableDescription", array())) && (null === $this->getAttribute($context["item"], "itemActiveDescription", array())))) {
                    // line 72
                    echo "                                <li class=\"effect\">
                                    <i>Nessun effetto attivabile</i>
                                </li>
                            ";
                }
                // line 76
                echo "                        ";
            }
            // line 77
            echo "                    </ul>

                </td>
                <td class=\"item-actions\">
                    ";
            // line 82
            echo "                    ";
            if ((isset($context["is_owner"]) ? $context["is_owner"] : null)) {
                // line 83
                echo "
                        ";
                // line 84
                if ($this->getAttribute($context["item"], "itemIsTransportable", array())) {
                    // line 85
                    echo "                            <button class=\"small button unequip-item\"
                                    data-url=\"";
                    // line 86
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-inventory-change-equipped", array("id" => $this->getAttribute($context["item"], "inventoryId", array()))), "html", null, true);
                    echo "\">In
                                inventario
                            </button>
                        ";
                }
                // line 90
                echo "
                        ";
                // line 91
                if (($this->getAttribute($context["item"], "categoryName", array()) == (isset($context["categoryVestiti"]) ? $context["categoryVestiti"] : null))) {
                    // line 92
                    echo "                            <label>Indosso</label>
                            <input type=\"radio\" name=\"isDressed\" class=\"radio-dressed ";
                    // line 93
                    if ($this->getAttribute($context["item"], "inventoryIsDressed", array())) {
                        echo "selected";
                    }
                    echo "\"
                                   data-url=\"";
                    // line 94
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-inventory-change-dressed", array("id" => $this->getAttribute($context["item"], "inventoryId", array()))), "html", null, true);
                    echo "\" ";
                    if ($this->getAttribute($context["item"], "inventoryIsDressed", array())) {
                        echo " checked=\"checked\" ";
                    }
                    echo ">
                        ";
                }
                // line 96
                echo "
                        <label>
                            <abb title=\"Oggetto non visibile dagli altri personaggi\">Invisibile</abb>
                        </label>
                        <input class=\"checkbox-visibility\" type=\"checkbox\" ";
                // line 100
                if ($this->getAttribute($context["item"], "inventoryIsDressed", array())) {
                    echo " disabled=\"disabled\" ";
                }
                // line 101
                echo "                               data-url=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-inventory-change-visibility", array("id" => $this->getAttribute($context["item"], "inventoryId", array()))), "html", null, true);
                echo "\"
                                ";
                // line 102
                if ($this->getAttribute($context["item"], "inventoryIsInvisible", array())) {
                    echo " checked=\"checked\" ";
                }
                echo ">

                    ";
            }
            // line 105
            echo "
                    ";
            // line 107
            echo "                    ";
            if ((($this->env->getExtension('security')->isGranted("ROLE_ADMIN") && $this->getAttribute($context["item"], "inventoryIsInvisible", array())) && ((isset($context["is_owner"]) ? $context["is_owner"] : null) == false))) {
                // line 108
                echo "                        <span><abbr title=\"Info visibile solo dagli admin\">(invisibile)</abbr></span>
                    ";
            }
            // line 110
            echo "                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 113
        echo "        </tbody>
    </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Inventory:bag.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 113,  276 => 110,  272 => 108,  269 => 107,  266 => 105,  258 => 102,  253 => 101,  249 => 100,  243 => 96,  234 => 94,  228 => 93,  225 => 92,  223 => 91,  220 => 90,  213 => 86,  210 => 85,  208 => 84,  205 => 83,  202 => 82,  196 => 77,  193 => 76,  187 => 72,  185 => 71,  182 => 70,  178 => 68,  174 => 66,  168 => 64,  166 => 63,  162 => 61,  160 => 60,  157 => 59,  153 => 57,  149 => 55,  143 => 53,  141 => 52,  137 => 50,  135 => 49,  131 => 47,  128 => 46,  125 => 44,  119 => 42,  117 => 41,  112 => 39,  108 => 38,  104 => 37,  99 => 34,  90 => 32,  88 => 31,  84 => 29,  78 => 26,  75 => 25,  73 => 24,  66 => 23,  62 => 21,  58 => 20,  51 => 16,  45 => 12,  42 => 10,  36 => 7,  32 => 6,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* <span></span>*/
/* {% if (is_owner or is_granted('ROLE_ADMIN')) %}*/
/*     <div class="text-centered">*/
/*         <h3>Oggetti in borsa: <span class="total-items">{{ totalItems }}</span></h3>*/
/* */
/*         <h3 class="bag-stats">Peso-Ingombro: <span class="actual-weight">{{ totalWeight }}</span>/<span*/
/*                     class="max-weight">{{ bag_limit }}</span></h3>*/
/*     </div>*/
/* {% endif %}*/
/* */
/* {# Operazioni permesse: rimetti in inventario (no in gioco), distruggi (sempre), attiva (in gioco), sacrifica (in gioco) #}*/
/* <div class="tab-bag">*/
/*     <table class="items-table-container solited">*/
/*         <thead>*/
/*         <tr>*/
/*             <th colspan="4">La borsa di {{ personage.name }}</th>*/
/*         </tr>*/
/*         </thead>*/
/*         <tbody>*/
/*         {% for item in items %}*/
/*             <tr class="item-row">*/
/*                 <td class="item-preview">*/
/*                     <img src="{{ upload_path }}{{ item.itemImageName }}" alt="{{ item.itemName }}">*/
/*                     {% if is_owner or is_granted('ROLE_ADMIN') %}*/
/*                         <button class="button small esamina-item"*/
/*                                 data-href="{{ path('avatar-inventory-item', {id: item.0.id}) }}">Esamina*/
/*                         </button>*/
/*                     {% endif %}*/
/*                 </td>*/
/*                 <td class="item-dress-icon">*/
/*                     {% if item.categoryName == categoryVestiti %}*/
/*                         <img src="{{ upload_path }}{{ item.itemDressIconImageName }}" alt="{{ item.itemName }}">*/
/*                     {% endif %}*/
/*                 </td>*/
/*                 <td class="item-infos">*/
/*                     <ul>*/
/*                         <li><span>Nome:</span> {{ item.itemName }}</li>*/
/*                         <li><span>Peso/Ingombro:</span> {{ item.itemWeight }}</li>*/
/*                         <li><span>Descrizione:</span> {{ item.itemShortDescription }}</li>*/
/* */
/*                         {% if item.inventoryExpireAt %}*/
/*                             <li><span>Scadenza:</span> {{ item.inventoryExpireAt|date('d/m/Y') }}</li>*/
/*                         {% endif %}*/
/* */
/*                         {# Visibile solo dal proprietario #}*/
/*                         {% if is_owner or is_granted('ROLE_ADMIN') %}*/
/*                             <li class="divider">Informazioni visibili solo dal proprietario:</li>*/
/* */
/*                             {% if item.itemActiveDescription %}*/
/*                                 <li class="effect">*/
/*                                     <span>Attiva:</span>*/
/*                                     {% if item.itemShowActiveDescription %}*/
/*                                         <i>{{ item.itemActiveDescription }}</i>*/
/*                                     {% else %}*/
/*                                         <i>Effetto nascosto.</i>*/
/*                                     {% endif %}*/
/*                                 </li>*/
/*                             {% endif %}*/
/* */
/*                             {% if item.itemExpendableDescription %}*/
/*                                 <li class="effect">*/
/*                                     <span>Effetto:</span>*/
/*                                     {% if item.itemShowExpendableDescription %}*/
/*                                         <i>{{ item.itemExpendableDescription }}</i>*/
/*                                     {% else %}*/
/*                                         <i>Effetto nascosto</i>*/
/*                                     {% endif %}*/
/*                                 </li>*/
/*                             {% endif %}*/
/* */
/*                             {% if (item.itemExpendableDescription is null) and (item.itemActiveDescription is null) %}*/
/*                                 <li class="effect">*/
/*                                     <i>Nessun effetto attivabile</i>*/
/*                                 </li>*/
/*                             {% endif %}*/
/*                         {% endif %}*/
/*                     </ul>*/
/* */
/*                 </td>*/
/*                 <td class="item-actions">*/
/*                     {# Azioni consentite solo dal proprietario #}*/
/*                     {% if is_owner %}*/
/* */
/*                         {% if item.itemIsTransportable %}*/
/*                             <button class="small button unequip-item"*/
/*                                     data-url="{{ url('avatar-inventory-change-equipped', {id: item.inventoryId}) }}">In*/
/*                                 inventario*/
/*                             </button>*/
/*                         {% endif %}*/
/* */
/*                         {% if item.categoryName == categoryVestiti %}*/
/*                             <label>Indosso</label>*/
/*                             <input type="radio" name="isDressed" class="radio-dressed {% if item.inventoryIsDressed %}selected{% endif %}"*/
/*                                    data-url="{{ url('avatar-inventory-change-dressed', {id: item.inventoryId}) }}" {% if item.inventoryIsDressed %} checked="checked" {% endif %}>*/
/*                         {% endif %}*/
/* */
/*                         <label>*/
/*                             <abb title="Oggetto non visibile dagli altri personaggi">Invisibile</abb>*/
/*                         </label>*/
/*                         <input class="checkbox-visibility" type="checkbox" {% if item.inventoryIsDressed %} disabled="disabled" {% endif %}*/
/*                                data-url="{{ url('avatar-inventory-change-visibility', {id: item.inventoryId}) }}"*/
/*                                 {% if item.inventoryIsInvisible %} checked="checked" {% endif %}>*/
/* */
/*                     {% endif %}*/
/* */
/*                     {# Se sono admin e sto visualizzando un altra borsa, posso vedere se è invisibile #}*/
/*                     {% if is_granted('ROLE_ADMIN') and item.inventoryIsInvisible and is_owner == false %}*/
/*                         <span><abbr title="Info visibile solo dagli admin">(invisibile)</abbr></span>*/
/*                     {% endif %}*/
/*                 </td>*/
/*             </tr>*/
/*         {% endfor %}*/
/*         </tbody>*/
/*     </table>*/
/* </div>*/
/* */
