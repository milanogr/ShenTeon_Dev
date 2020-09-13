<?php

/* GdrAvatarBundle:Inventory:dress.html.twig */
class __TwigTemplate_59171539c04a993c2acda427bc5810a397ac8309e33ebef8889693413d71b544 extends Twig_Template
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
        echo "<table class=\"items-table-container dress solited\">
    <thead>
    <tr>
        <th colspan=\"4\">Vestiti</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginator"]) ? $context["paginator"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 9
            echo "        <tr class=\"item-row\">
            <td class=\"item-preview\">
                <img src=\"";
            // line 11
            echo twig_escape_filter($this->env, (isset($context["upload_path"]) ? $context["upload_path"] : null), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemImageName", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemName", array()), "html", null, true);
            echo "\">
                ";
            // line 12
            if (((isset($context["is_owner"]) ? $context["is_owner"] : null) || $this->env->getExtension('security')->isGranted("ROLE_ADMIN"))) {
                // line 13
                echo "                    <button class=\"button small esamina-item\"
                            data-href=\"";
                // line 14
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-inventory-item", array("id" => $this->getAttribute($this->getAttribute($context["item"], 0, array()), "id", array()))), "html", null, true);
                echo "\">Esamina
                    </button>
                ";
            }
            // line 17
            echo "            </td>
            <td class=\"item-dress-icon\">
                <img src=\"";
            // line 19
            echo twig_escape_filter($this->env, (isset($context["upload_path"]) ? $context["upload_path"] : null), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemDressIconImageName", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemName", array()), "html", null, true);
            echo "\">
            </td>
            <td class=\"item-infos\">
                <ul>
                    <li><span>Nome:</span> ";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemName", array()), "html", null, true);
            echo "</li>
                    <li><span>Peso/Ingombro:</span> ";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemWeight", array()), "html", null, true);
            echo "</li>
                    <li><span>Descrizione:</span> ";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemShortDescription", array()), "html", null, true);
            echo "</li>

                    ";
            // line 27
            if ($this->getAttribute($context["item"], "inventoryExpireAt", array())) {
                // line 28
                echo "                        <li><span>Scadenza:</span> ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "inventoryExpireAt", array()), "d/m/Y"), "html", null, true);
                echo "</li>
                    ";
            }
            // line 30
            echo "
                    ";
            // line 32
            echo "                    ";
            if (((isset($context["is_owner"]) ? $context["is_owner"] : null) || $this->env->getExtension('security')->isGranted("ROLE_ADMIN"))) {
                // line 33
                echo "                        <li class=\"divider\">Informazioni visibili solo dal proprietario:</li>

                        ";
                // line 35
                if ($this->getAttribute($context["item"], "itemActiveDescription", array())) {
                    // line 36
                    echo "                            <li class=\"effect\">
                                <span>Attiva:</span>
                                ";
                    // line 38
                    if ($this->getAttribute($context["item"], "itemShowActiveDescription", array())) {
                        // line 39
                        echo "                                    <i>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemActiveDescription", array()), "html", null, true);
                        echo "</i>
                                ";
                    } else {
                        // line 41
                        echo "                                    <i>Effetto nascosto.</i>
                                ";
                    }
                    // line 43
                    echo "                            </li>
                        ";
                }
                // line 45
                echo "
                        ";
                // line 46
                if ($this->getAttribute($context["item"], "itemExpendableDescription", array())) {
                    // line 47
                    echo "                            <li class=\"effect\">
                                <span>Effetto:</span>
                                ";
                    // line 49
                    if ($this->getAttribute($context["item"], "itemShowExpendableDescription", array())) {
                        // line 50
                        echo "                                    <i>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemExpendableDescription", array()), "html", null, true);
                        echo "</i>
                                ";
                    } else {
                        // line 52
                        echo "                                    <i>Effetto nascosto</i>
                                ";
                    }
                    // line 54
                    echo "                            </li>
                        ";
                }
                // line 56
                echo "
                        ";
                // line 57
                if (((null === $this->getAttribute($context["item"], "itemExpendableDescription", array())) && (null === $this->getAttribute($context["item"], "itemActiveDescription", array())))) {
                    // line 58
                    echo "                            <li class=\"effect\">
                                <i>Nessun effetto attivabile</i>
                            </li>
                        ";
                }
                // line 62
                echo "                    ";
            }
            // line 63
            echo "                </ul>
            </td>
            <td class=\"item-actions\">
                ";
            // line 67
            echo "                ";
            if ((isset($context["is_owner"]) ? $context["is_owner"] : null)) {
                // line 68
                echo "                    <label>In Borsa</label>
                    <input class=\"checkbox-equipped\"
                           type=\"checkbox\" ";
                // line 70
                if ($this->getAttribute($context["item"], "inventoryIsDressed", array())) {
                    echo " disabled=\"disabled\" ";
                }
                // line 71
                echo "                           data-url=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-inventory-change-equipped", array("id" => $this->getAttribute($context["item"], "inventoryId", array()))), "html", null, true);
                echo "\"
                            ";
                // line 72
                if ($this->getAttribute($context["item"], "inventoryIsEquipped", array())) {
                    echo " checked=\"checked\" ";
                }
                echo ">

                    <label>
                        <abb title=\"Oggetto non visibile dagli altri personaggi\">Invisibile</abb>
                    </label>
                    <input class=\"checkbox-visibility\"
                           type=\"checkbox\" ";
                // line 78
                if ($this->getAttribute($context["item"], "inventoryIsDressed", array())) {
                    echo " disabled=\"disabled\" ";
                }
                // line 79
                echo "                           data-url=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-inventory-change-visibility", array("id" => $this->getAttribute($context["item"], "inventoryId", array()))), "html", null, true);
                echo "\"
                            ";
                // line 80
                if ($this->getAttribute($context["item"], "inventoryIsInvisible", array())) {
                    echo " checked=\"checked\" ";
                }
                echo ">

                    ";
                // line 82
                if ($this->getAttribute($context["item"], "itemIsResalable", array())) {
                    // line 83
                    echo "                        <button data-url=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-inventory-sell", array("id" => $this->getAttribute($context["item"], "inventoryId", array()))), "html", null, true);
                    echo "\"
                                class=\"small button sell-item\">Vendi a ";
                    // line 84
                    echo twig_escape_filter($this->env, ($this->getAttribute($context["item"], "itemPrice", array()) / twig_number_format_filter($this->env, 2)), "html", null, true);
                    echo " Mori
                        </button>
                    ";
                }
                // line 87
                echo "
                    ";
                // line 88
                if ($this->getAttribute($context["item"], "itemIsTransferable", array())) {
                    // line 89
                    echo "                        <button data-url=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-item-send", array("id" => $this->getAttribute($context["item"], "inventoryId", array()))), "html", null, true);
                    echo "\"
                                class=\"small button send-item\"> Recapita a...
                        </button>
                    ";
                }
                // line 93
                echo "
                    <label>Indosso</label>
                    <input type=\"radio\" name=\"isDressed\" class=\"radio-dressed ";
                // line 95
                if ($this->getAttribute($context["item"], "inventoryIsDressed", array())) {
                    echo "selected";
                }
                echo "\"
                           data-url=\"";
                // line 96
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-inventory-change-dressed", array("id" => $this->getAttribute($context["item"], "inventoryId", array()))), "html", null, true);
                echo "\" ";
                if ($this->getAttribute($context["item"], "inventoryIsDressed", array())) {
                    echo " checked=\"checked\" ";
                }
                echo ">

                ";
            }
            // line 99
            echo "
                ";
            // line 101
            echo "                ";
            if ((((isset($context["is_owner"]) ? $context["is_owner"] : null) && $this->getAttribute($context["item"], "itemIsDestructible", array())) || $this->env->getExtension('security')->isGranted("ROLE_ADMIN"))) {
                // line 102
                echo "                    <button data-url=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-inventory-delete", array("id" => $this->getAttribute($context["item"], "inventoryId", array()))), "html", null, true);
                echo "\"
                            class=\"small button delete-item\">Distruggi
                    </button>
                ";
            }
            // line 106
            echo "
                ";
            // line 108
            echo "                ";
            if ((($this->env->getExtension('security')->isGranted("ROLE_ADMIN") && $this->getAttribute($context["item"], "inventoryIsInvisible", array())) && ((isset($context["is_owner"]) ? $context["is_owner"] : null) == false))) {
                // line 109
                echo "                    <span><abbr title=\"Info visibile solo dagli admin\">(invisibile)</abbr></span>
                ";
            }
            // line 111
            echo "
            </td>
        </tr>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 115
            echo "        <tr>
            <td colspan=\"4\" class=\"text-centered\">Non hai ancora acquistato alcun vestito.</td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 119
        echo "
    <tr>
        <td colspan=\"4\" class=\"table-pagination\">
            ";
        // line 122
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
        echo "
        </td>
    </tr>
    </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Inventory:dress.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  301 => 122,  296 => 119,  287 => 115,  279 => 111,  275 => 109,  272 => 108,  269 => 106,  261 => 102,  258 => 101,  255 => 99,  245 => 96,  239 => 95,  235 => 93,  227 => 89,  225 => 88,  222 => 87,  216 => 84,  211 => 83,  209 => 82,  202 => 80,  197 => 79,  193 => 78,  182 => 72,  177 => 71,  173 => 70,  169 => 68,  166 => 67,  161 => 63,  158 => 62,  152 => 58,  150 => 57,  147 => 56,  143 => 54,  139 => 52,  133 => 50,  131 => 49,  127 => 47,  125 => 46,  122 => 45,  118 => 43,  114 => 41,  108 => 39,  106 => 38,  102 => 36,  100 => 35,  96 => 33,  93 => 32,  90 => 30,  84 => 28,  82 => 27,  77 => 25,  73 => 24,  69 => 23,  59 => 19,  55 => 17,  49 => 14,  46 => 13,  44 => 12,  37 => 11,  33 => 9,  28 => 8,  19 => 1,);
    }
}
/* <table class="items-table-container dress solited">*/
/*     <thead>*/
/*     <tr>*/
/*         <th colspan="4">Vestiti</th>*/
/*     </tr>*/
/*     </thead>*/
/*     <tbody>*/
/*     {% for item in paginator %}*/
/*         <tr class="item-row">*/
/*             <td class="item-preview">*/
/*                 <img src="{{ upload_path }}{{ item.itemImageName }}" alt="{{ item.itemName }}">*/
/*                 {% if is_owner or is_granted('ROLE_ADMIN') %}*/
/*                     <button class="button small esamina-item"*/
/*                             data-href="{{ path('avatar-inventory-item', {id: item.0.id}) }}">Esamina*/
/*                     </button>*/
/*                 {% endif %}*/
/*             </td>*/
/*             <td class="item-dress-icon">*/
/*                 <img src="{{ upload_path }}{{ item.itemDressIconImageName }}" alt="{{ item.itemName }}">*/
/*             </td>*/
/*             <td class="item-infos">*/
/*                 <ul>*/
/*                     <li><span>Nome:</span> {{ item.itemName }}</li>*/
/*                     <li><span>Peso/Ingombro:</span> {{ item.itemWeight }}</li>*/
/*                     <li><span>Descrizione:</span> {{ item.itemShortDescription }}</li>*/
/* */
/*                     {% if item.inventoryExpireAt %}*/
/*                         <li><span>Scadenza:</span> {{ item.inventoryExpireAt|date('d/m/Y') }}</li>*/
/*                     {% endif %}*/
/* */
/*                     {# Visibile solo dal proprietario #}*/
/*                     {% if is_owner or is_granted('ROLE_ADMIN') %}*/
/*                         <li class="divider">Informazioni visibili solo dal proprietario:</li>*/
/* */
/*                         {% if item.itemActiveDescription %}*/
/*                             <li class="effect">*/
/*                                 <span>Attiva:</span>*/
/*                                 {% if item.itemShowActiveDescription %}*/
/*                                     <i>{{ item.itemActiveDescription }}</i>*/
/*                                 {% else %}*/
/*                                     <i>Effetto nascosto.</i>*/
/*                                 {% endif %}*/
/*                             </li>*/
/*                         {% endif %}*/
/* */
/*                         {% if item.itemExpendableDescription %}*/
/*                             <li class="effect">*/
/*                                 <span>Effetto:</span>*/
/*                                 {% if item.itemShowExpendableDescription %}*/
/*                                     <i>{{ item.itemExpendableDescription }}</i>*/
/*                                 {% else %}*/
/*                                     <i>Effetto nascosto</i>*/
/*                                 {% endif %}*/
/*                             </li>*/
/*                         {% endif %}*/
/* */
/*                         {% if (item.itemExpendableDescription is null) and (item.itemActiveDescription is null) %}*/
/*                             <li class="effect">*/
/*                                 <i>Nessun effetto attivabile</i>*/
/*                             </li>*/
/*                         {% endif %}*/
/*                     {% endif %}*/
/*                 </ul>*/
/*             </td>*/
/*             <td class="item-actions">*/
/*                 {# Azioni consentite solo dal proprietario #}*/
/*                 {% if is_owner %}*/
/*                     <label>In Borsa</label>*/
/*                     <input class="checkbox-equipped"*/
/*                            type="checkbox" {% if item.inventoryIsDressed %} disabled="disabled" {% endif %}*/
/*                            data-url="{{ url('avatar-inventory-change-equipped', {id: item.inventoryId}) }}"*/
/*                             {% if item.inventoryIsEquipped %} checked="checked" {% endif %}>*/
/* */
/*                     <label>*/
/*                         <abb title="Oggetto non visibile dagli altri personaggi">Invisibile</abb>*/
/*                     </label>*/
/*                     <input class="checkbox-visibility"*/
/*                            type="checkbox" {% if item.inventoryIsDressed %} disabled="disabled" {% endif %}*/
/*                            data-url="{{ url('avatar-inventory-change-visibility', {id: item.inventoryId}) }}"*/
/*                             {% if item.inventoryIsInvisible %} checked="checked" {% endif %}>*/
/* */
/*                     {% if item.itemIsResalable %}*/
/*                         <button data-url="{{ url('avatar-inventory-sell', {id: item.inventoryId}) }}"*/
/*                                 class="small button sell-item">Vendi a {{ item.itemPrice / 2 |number_format }} Mori*/
/*                         </button>*/
/*                     {% endif %}*/
/* */
/*                     {% if item.itemIsTransferable %}*/
/*                         <button data-url="{{ url('avatar-item-send', {id: item.inventoryId}) }}"*/
/*                                 class="small button send-item"> Recapita a...*/
/*                         </button>*/
/*                     {% endif %}*/
/* */
/*                     <label>Indosso</label>*/
/*                     <input type="radio" name="isDressed" class="radio-dressed {% if item.inventoryIsDressed %}selected{% endif %}"*/
/*                            data-url="{{ url('avatar-inventory-change-dressed', {id: item.inventoryId}) }}" {% if item.inventoryIsDressed %} checked="checked" {% endif %}>*/
/* */
/*                 {% endif %}*/
/* */
/*                 {# Il proprietario può cancellare solo se è presente la specifica; gli admin sempre. #}*/
/*                 {% if (is_owner and item.itemIsDestructible) or (is_granted('ROLE_ADMIN')) %}*/
/*                     <button data-url="{{ url('avatar-inventory-delete', {id: item.inventoryId}) }}"*/
/*                             class="small button delete-item">Distruggi*/
/*                     </button>*/
/*                 {% endif %}*/
/* */
/*                 {# Se sono admin e sto visualizzando un altro inventario, posso vedere se è invisibile #}*/
/*                 {% if is_granted('ROLE_ADMIN') and item.inventoryIsInvisible and is_owner == false %}*/
/*                     <span><abbr title="Info visibile solo dagli admin">(invisibile)</abbr></span>*/
/*                 {% endif %}*/
/* */
/*             </td>*/
/*         </tr>*/
/*     {% else %}*/
/*         <tr>*/
/*             <td colspan="4" class="text-centered">Non hai ancora acquistato alcun vestito.</td>*/
/*         </tr>*/
/*     {% endfor %}*/
/* */
/*     <tr>*/
/*         <td colspan="4" class="table-pagination">*/
/*             {{ knp_pagination_render(paginator) }}*/
/*         </td>*/
/*     </tr>*/
/*     </tbody>*/
/* </table>*/
