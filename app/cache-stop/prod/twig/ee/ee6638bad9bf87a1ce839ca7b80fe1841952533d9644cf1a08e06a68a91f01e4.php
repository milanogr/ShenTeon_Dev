<?php

/* GdrAvatarBundle:Inventory:items.html.twig */
class __TwigTemplate_a929271e730bb1dc2fa2174b5282fcff5caa30268229ae48296b44742d840ed4 extends Twig_Template
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
        echo "<div class=\"text-center\">
    <h2><span>";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name", array()), "html", null, true);
        echo "</span></h2>
</div>

";
        // line 5
        if ((isset($context["need_paginator"]) ? $context["need_paginator"] : null)) {
            // line 6
            echo "    <table>
        <tr>
            <td colspan=\"3\" class=\"table-pagination\">
                ";
            // line 9
            echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
            echo "
            </td>
        </tr>
    </table>
";
        }
        // line 14
        echo "
<div class=\"items-centered clearfix\" style=\"\">
    ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginator"]) ? $context["paginator"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 17
            echo "
        <div class=\"item-box\" id=\"inventory-";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "inventoryId", array()), "html", null, true);
            echo "\">

            <img src=\"";
            // line 20
            echo twig_escape_filter($this->env, (isset($context["upload_path"]) ? $context["upload_path"] : null), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemImageName", array()), "html", null, true);
            echo "\" class=\"gdrtooltip\" style=\"cursor: help\"
                 title=\"
             <ul>
                <li><strong>Nome:</strong> ";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemName", array()), "html", null, true);
            echo "</li>
                <li><strong>Peso/Ingombro:</strong> ";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemWeight", array()), "html", null, true);
            echo "</li>
                <li><strong>Descrizione:</strong> ";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('text_extension')->truncateFilter($this->getAttribute($context["item"], "itemShortDescription", array()), 150), "html", null, true);
            echo "</li>
                ";
            // line 26
            if ($this->getAttribute($context["item"], "inventoryExpireAt", array())) {
                // line 27
                echo "                <li><span>Scadenza:</span> ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "inventoryExpireAt", array()), "d/m/Y"), "html", null, true);
                echo "</li>
                ";
            }
            // line 29
            echo "
                ";
            // line 31
            echo "                ";
            if (((isset($context["is_owner"]) ? $context["is_owner"] : null) || $this->env->getExtension('security')->isGranted("ROLE_ADMIN"))) {
                // line 32
                echo "                    <li class='divider'><strong>Informazioni visibili solo dal proprietario:</strong></li>

                    ";
                // line 34
                if ($this->getAttribute($context["item"], "itemActiveDescription", array())) {
                    // line 35
                    echo "                    <li class='effect'>
                        <span>Attiva:</span>
                        ";
                    // line 37
                    if ($this->getAttribute($context["item"], "itemShowActiveDescription", array())) {
                        // line 38
                        echo "                            <i>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemActiveDescription", array()), "html", null, true);
                        echo "</i>
                        ";
                    } else {
                        // line 40
                        echo "                            <i>Effetto nascosto.</i>
                        ";
                    }
                    // line 42
                    echo "                    </li>
                    ";
                }
                // line 44
                echo "
                    ";
                // line 45
                if ($this->getAttribute($context["item"], "itemExpendableDescription", array())) {
                    // line 46
                    echo "                        <li class='effect'>
                        <span>Effetto:</span>
                        ";
                    // line 48
                    if ($this->getAttribute($context["item"], "itemShowExpendableDescription", array())) {
                        // line 49
                        echo "                            <i>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemExpendableDescription", array()), "html", null, true);
                        echo "</i>
                        ";
                    } else {
                        // line 51
                        echo "                            <i>Effetto nascosto</i>
                        ";
                    }
                    // line 53
                    echo "                        </li>
                    ";
                }
                // line 55
                echo "
                    ";
                // line 56
                if (((null === $this->getAttribute($context["item"], "itemExpendableDescription", array())) && (null === $this->getAttribute($context["item"], "itemActiveDescription", array())))) {
                    // line 57
                    echo "                    <li class='effect'>
                        <i>Nessun effetto attivabile</i>
                    </li>
                    ";
                }
                // line 61
                echo "                ";
            }
            // line 62
            echo "                </ul>
            </ul>
            \">

            ";
            // line 66
            if (((isset($context["is_owner"]) ? $context["is_owner"] : null) || $this->env->getExtension('security')->isGranted("ROLE_ADMIN"))) {
                // line 67
                echo "                <button class=\"button small esamina-item\"
                        data-href=\"";
                // line 68
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-inventory-item", array("id" => $this->getAttribute($this->getAttribute($context["item"], 0, array()), "id", array()))), "html", null, true);
                echo "\">Esamina
                </button>
            ";
            }
            // line 71
            echo "
            ";
            // line 73
            echo "            ";
            if ((isset($context["is_owner"]) ? $context["is_owner"] : null)) {
                // line 74
                echo "                ";
                if ($this->getAttribute($context["item"], "itemIsTransportable", array())) {
                    // line 75
                    echo "                    <div>
                        <label>In Borsa</label>
                        <input class=\"checkbox-equipped\" type=\"checkbox\" value=\"\"
                               data-url=\"";
                    // line 78
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-inventory-change-equipped", array("id" => $this->getAttribute($context["item"], "inventoryId", array()))), "html", null, true);
                    echo "\"
                                ";
                    // line 79
                    if ($this->getAttribute($context["item"], "inventoryIsEquipped", array())) {
                        echo " checked=\"checked\" ";
                    }
                    echo ">
                    </div>
                ";
                }
                // line 82
                echo "
                <div>
                    <label>Invisibile</label>
                    <input class=\"checkbox-visibility\" type=\"checkbox\" value=\"\"
                           data-url=\"";
                // line 86
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-inventory-change-visibility", array("id" => $this->getAttribute($context["item"], "inventoryId", array()))), "html", null, true);
                echo "\"
                            ";
                // line 87
                if ($this->getAttribute($context["item"], "inventoryIsInvisible", array())) {
                    echo " checked=\"checked\" ";
                }
                echo ">
                </div>

                ";
                // line 90
                if ($this->getAttribute($context["item"], "itemIsResalable", array())) {
                    // line 91
                    echo "                    <div>
                        <button data-url=\"";
                    // line 92
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-inventory-sell", array("id" => $this->getAttribute($context["item"], "inventoryId", array()))), "html", null, true);
                    echo "\"
                                class=\"small button sell-item\">Vendi a ";
                    // line 93
                    echo twig_escape_filter($this->env, ($this->getAttribute($context["item"], "itemPrice", array()) / twig_number_format_filter($this->env, 2)), "html", null, true);
                    echo " Mori
                        </button>
                    </div>
                ";
                } else {
                    // line 97
                    echo "                    <div>
                        <button disabled
                                class=\"small button sell-item\">Vendi a...
                        </button>
                    </div>
                ";
                }
                // line 103
                echo "
                ";
                // line 104
                if ($this->getAttribute($context["item"], "itemIsTransferable", array())) {
                    // line 105
                    echo "                    <div>
                        <button data-url=\"";
                    // line 106
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-item-send", array("id" => $this->getAttribute($context["item"], "inventoryId", array()))), "html", null, true);
                    echo "\"
                                class=\"small button send-item\"> Recapita a...
                        </button>
                    </div>
                ";
                } else {
                    // line 111
                    echo "                    <div>
                        <button disabled
                                class=\"small button send-item\"> Recapita a...
                        </button>
                    </div>
                ";
                }
                // line 117
                echo "
            ";
            }
            // line 119
            echo "
            ";
            // line 121
            echo "            ";
            if ((((isset($context["is_owner"]) ? $context["is_owner"] : null) && $this->getAttribute($context["item"], "itemIsDestructible", array())) || $this->env->getExtension('security')->isGranted("ROLE_ADMIN"))) {
                // line 122
                echo "                <div>
                    <button data-url=\"";
                // line 123
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-inventory-delete", array("id" => $this->getAttribute($context["item"], "inventoryId", array()))), "html", null, true);
                echo "\"
                            class=\"small button delete-item\">Distruggi
                    </button>
                </div>
            ";
            }
            // line 128
            echo "
            ";
            // line 130
            echo "            ";
            if ((($this->env->getExtension('security')->isGranted("ROLE_ADMIN") && $this->getAttribute($context["item"], "inventoryIsInvisible", array())) && ((isset($context["is_owner"]) ? $context["is_owner"] : null) == false))) {
                // line 131
                echo "                <div>
                    <span><abbr title=\"Info visibile solo dagli admin\">(invisibile)</abbr></span>
                </div>
            ";
            }
            // line 135
            echo "        </div>

    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 138
            echo "        <p>Non ci sono oggetti per questa categoria.</p>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 140
        echo "</div>

<hr>
";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Inventory:items.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  314 => 140,  307 => 138,  300 => 135,  294 => 131,  291 => 130,  288 => 128,  280 => 123,  277 => 122,  274 => 121,  271 => 119,  267 => 117,  259 => 111,  251 => 106,  248 => 105,  246 => 104,  243 => 103,  235 => 97,  228 => 93,  224 => 92,  221 => 91,  219 => 90,  211 => 87,  207 => 86,  201 => 82,  193 => 79,  189 => 78,  184 => 75,  181 => 74,  178 => 73,  175 => 71,  169 => 68,  166 => 67,  164 => 66,  158 => 62,  155 => 61,  149 => 57,  147 => 56,  144 => 55,  140 => 53,  136 => 51,  130 => 49,  128 => 48,  124 => 46,  122 => 45,  119 => 44,  115 => 42,  111 => 40,  105 => 38,  103 => 37,  99 => 35,  97 => 34,  93 => 32,  90 => 31,  87 => 29,  81 => 27,  79 => 26,  75 => 25,  71 => 24,  67 => 23,  60 => 20,  55 => 18,  52 => 17,  47 => 16,  43 => 14,  35 => 9,  30 => 6,  28 => 5,  22 => 2,  19 => 1,);
    }
}
/* <div class="text-center">*/
/*     <h2><span>{{ category.name }}</span></h2>*/
/* </div>*/
/* */
/* {% if need_paginator %}*/
/*     <table>*/
/*         <tr>*/
/*             <td colspan="3" class="table-pagination">*/
/*                 {{ knp_pagination_render(paginator) }}*/
/*             </td>*/
/*         </tr>*/
/*     </table>*/
/* {% endif %}*/
/* */
/* <div class="items-centered clearfix" style="">*/
/*     {% for item in paginator %}*/
/* */
/*         <div class="item-box" id="inventory-{{ item.inventoryId }}">*/
/* */
/*             <img src="{{ upload_path }}{{ item.itemImageName }}" class="gdrtooltip" style="cursor: help"*/
/*                  title="*/
/*              <ul>*/
/*                 <li><strong>Nome:</strong> {{ item.itemName }}</li>*/
/*                 <li><strong>Peso/Ingombro:</strong> {{ item.itemWeight }}</li>*/
/*                 <li><strong>Descrizione:</strong> {{ item.itemShortDescription | truncate(150) }}</li>*/
/*                 {% if item.inventoryExpireAt %}*/
/*                 <li><span>Scadenza:</span> {{ item.inventoryExpireAt|date('d/m/Y') }}</li>*/
/*                 {% endif %}*/
/* */
/*                 {# Visibile solo dal proprietario #}*/
/*                 {% if is_owner or is_granted('ROLE_ADMIN') %}*/
/*                     <li class='divider'><strong>Informazioni visibili solo dal proprietario:</strong></li>*/
/* */
/*                     {% if item.itemActiveDescription %}*/
/*                     <li class='effect'>*/
/*                         <span>Attiva:</span>*/
/*                         {% if item.itemShowActiveDescription %}*/
/*                             <i>{{ item.itemActiveDescription }}</i>*/
/*                         {% else %}*/
/*                             <i>Effetto nascosto.</i>*/
/*                         {% endif %}*/
/*                     </li>*/
/*                     {% endif %}*/
/* */
/*                     {% if item.itemExpendableDescription %}*/
/*                         <li class='effect'>*/
/*                         <span>Effetto:</span>*/
/*                         {% if item.itemShowExpendableDescription %}*/
/*                             <i>{{ item.itemExpendableDescription }}</i>*/
/*                         {% else %}*/
/*                             <i>Effetto nascosto</i>*/
/*                         {% endif %}*/
/*                         </li>*/
/*                     {% endif %}*/
/* */
/*                     {% if (item.itemExpendableDescription is null) and (item.itemActiveDescription is null) %}*/
/*                     <li class='effect'>*/
/*                         <i>Nessun effetto attivabile</i>*/
/*                     </li>*/
/*                     {% endif %}*/
/*                 {% endif %}*/
/*                 </ul>*/
/*             </ul>*/
/*             ">*/
/* */
/*             {% if is_owner or is_granted('ROLE_ADMIN') %}*/
/*                 <button class="button small esamina-item"*/
/*                         data-href="{{ path('avatar-inventory-item', {id: item.0.id}) }}">Esamina*/
/*                 </button>*/
/*             {% endif %}*/
/* */
/*             {# Azioni consentite solo dal proprietario #}*/
/*             {% if is_owner %}*/
/*                 {% if item.itemIsTransportable %}*/
/*                     <div>*/
/*                         <label>In Borsa</label>*/
/*                         <input class="checkbox-equipped" type="checkbox" value=""*/
/*                                data-url="{{ url('avatar-inventory-change-equipped', {id: item.inventoryId}) }}"*/
/*                                 {% if item.inventoryIsEquipped %} checked="checked" {% endif %}>*/
/*                     </div>*/
/*                 {% endif %}*/
/* */
/*                 <div>*/
/*                     <label>Invisibile</label>*/
/*                     <input class="checkbox-visibility" type="checkbox" value=""*/
/*                            data-url="{{ url('avatar-inventory-change-visibility', {id: item.inventoryId}) }}"*/
/*                             {% if item.inventoryIsInvisible %} checked="checked" {% endif %}>*/
/*                 </div>*/
/* */
/*                 {% if item.itemIsResalable %}*/
/*                     <div>*/
/*                         <button data-url="{{ url('avatar-inventory-sell', {id: item.inventoryId}) }}"*/
/*                                 class="small button sell-item">Vendi a {{ item.itemPrice / 2 |number_format }} Mori*/
/*                         </button>*/
/*                     </div>*/
/*                 {% else %}*/
/*                     <div>*/
/*                         <button disabled*/
/*                                 class="small button sell-item">Vendi a...*/
/*                         </button>*/
/*                     </div>*/
/*                 {% endif %}*/
/* */
/*                 {% if item.itemIsTransferable %}*/
/*                     <div>*/
/*                         <button data-url="{{ url('avatar-item-send', {id: item.inventoryId}) }}"*/
/*                                 class="small button send-item"> Recapita a...*/
/*                         </button>*/
/*                     </div>*/
/*                 {% else %}*/
/*                     <div>*/
/*                         <button disabled*/
/*                                 class="small button send-item"> Recapita a...*/
/*                         </button>*/
/*                     </div>*/
/*                 {% endif %}*/
/* */
/*             {% endif %}*/
/* */
/*             {# Il proprietario può cancellare solo se è presente la specifica; gli admin sempre. #}*/
/*             {% if (is_owner and item.itemIsDestructible) or (is_granted('ROLE_ADMIN')) %}*/
/*                 <div>*/
/*                     <button data-url="{{ url('avatar-inventory-delete', {id: item.inventoryId}) }}"*/
/*                             class="small button delete-item">Distruggi*/
/*                     </button>*/
/*                 </div>*/
/*             {% endif %}*/
/* */
/*             {# Se sono admin e sto visualizzando un altro inventario, posso vedere se è invisibile #}*/
/*             {% if is_granted('ROLE_ADMIN') and item.inventoryIsInvisible and is_owner == false %}*/
/*                 <div>*/
/*                     <span><abbr title="Info visibile solo dagli admin">(invisibile)</abbr></span>*/
/*                 </div>*/
/*             {% endif %}*/
/*         </div>*/
/* */
/*     {% else %}*/
/*         <p>Non ci sono oggetti per questa categoria.</p>*/
/*     {% endfor %}*/
/* </div>*/
/* */
/* <hr>*/
/* */
