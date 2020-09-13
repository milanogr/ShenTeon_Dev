<?php

/* GdrAvatarBundle:Inventory:bagMini.html.twig */
class __TwigTemplate_14d5b5e0a967737796bc6134812fdacc2ced74bd590cfe94161fabbc7aaa4812 extends Twig_Template
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
        echo "<table id=\"mini-bag\">
    <thead>
    <tr>
        <th colspan=\"2\">La tua borsa</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 8
        if ((isset($context["canView"]) ? $context["canView"] : null)) {
            // line 9
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["inventories"]) ? $context["inventories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["inventory"]) {
                // line 10
                echo "
            ";
                // line 11
                $context["activeDescription"] = $this->getAttribute($context["inventory"], "itemActiveDescription", array());
                // line 12
                echo "            ";
                $context["expendableDescription"] = $this->getAttribute($context["inventory"], "itemExpendableDescription", array());
                // line 13
                echo "
            <tr class=\"item-row\">
                <td class=\"item-name\">
                    ";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute($context["inventory"], "itemName", array()), "html", null, true);
                echo "
                </td>
                <td class=\"item-buttons\" style=\"width: 80px; text-align: center\">

                    ";
                // line 20
                if ((isset($context["isInGame"]) ? $context["isInGame"] : null)) {
                    // line 21
                    echo "                        <a class=\"bag-show-item gdrtooltip\"
                           href=\"";
                    // line 22
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("chat-bag", array("id" => $this->getAttribute($context["inventory"], "inventoryId", array()), "type" => "show")), "html", null, true);
                    echo "\"
                           title=\"Mostra oggetto in chat\">
                            <img alt=\"Mostra oggetto\"
                                 src=\"";
                    // line 25
                    echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/bag/bag-mostra.png"), "html", null, true);
                    echo "\">
                        </a>

                        ";
                    // line 28
                    if ( !twig_test_empty($this->getAttribute($context["inventory"], "itemActiveDescription", array()))) {
                        // line 29
                        echo "                            ";
                        if ($this->getAttribute($context["inventory"], "itemShowActiveDescription", array())) {
                            // line 30
                            echo "                                ";
                            $context["actDesc"] = $this->getAttribute($context["inventory"], "itemActiveDescription", array());
                            // line 31
                            echo "                            ";
                        } else {
                            // line 32
                            echo "                                ";
                            $context["actDesc"] = "Effetto Nascosto";
                            // line 33
                            echo "                            ";
                        }
                        // line 34
                        echo "                            <a class=\"bag-activate-item gdrtooltip\"
                               href=\"";
                        // line 35
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("chat-bag", array("id" => $this->getAttribute($context["inventory"], "inventoryId", array()), "type" => "activate")), "html", null, true);
                        echo "\"
                               title=\"Attiva in chat - Effetto: ";
                        // line 36
                        echo twig_escape_filter($this->env, (isset($context["actDesc"]) ? $context["actDesc"] : null), "html", null, true);
                        echo "\">
                                <img src=\"";
                        // line 37
                        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/bag/bag-attiva.png"), "html", null, true);
                        echo "\">
                            </a>
                        ";
                    }
                    // line 40
                    echo "
                        ";
                    // line 41
                    if ( !twig_test_empty($this->getAttribute($context["inventory"], "itemExpendableDescription", array()))) {
                        // line 42
                        echo "                            ";
                        if ($this->getAttribute($context["inventory"], "itemShowExpendableDescription", array())) {
                            // line 43
                            echo "                                ";
                            $context["expDesc"] = $this->getAttribute($context["inventory"], "itemExpendableDescription", array());
                            // line 44
                            echo "                            ";
                        } else {
                            // line 45
                            echo "                                ";
                            $context["expDesc"] = "Effetto Nascosto";
                            // line 46
                            echo "                            ";
                        }
                        // line 47
                        echo "                            <a class=\"bag-sacrify-item gdrtooltip\"
                               href=\"";
                        // line 48
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("chat-bag", array("id" => $this->getAttribute($context["inventory"], "inventoryId", array()), "type" => "sacrify")), "html", null, true);
                        echo "\"
                               title=\"Sacrifica in chat - Effetto: ";
                        // line 49
                        echo twig_escape_filter($this->env, (isset($context["expDesc"]) ? $context["expDesc"] : null), "html", null, true);
                        echo "\">
                                <img alt=\"Sacrifica oggetto\"
                                     src=\"";
                        // line 51
                        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/bag/bag-sacrifica.png"), "html", null, true);
                        echo "\">
                            </a>
                        ";
                    }
                    // line 54
                    echo "
                        ";
                    // line 55
                    if ((($this->getAttribute($context["inventory"], "categoryName", array()) == (isset($context["vestito"]) ? $context["vestito"] : null)) && ($this->getAttribute($context["inventory"], "inventoryIsDressed", array()) == false))) {
                        // line 56
                        echo "                            <a class=\"bag-dress-item gdrtooltip\"
                               href=\"";
                        // line 57
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("chat-bag", array("id" => $this->getAttribute($context["inventory"], "inventoryId", array()), "type" => "dress")), "html", null, true);
                        echo "\"
                               title=\"Cambia il vestito in chat\">
                                <img alt=\"Indossa vestito\"
                                     src=\"";
                        // line 60
                        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/bag/bag-indossa.png"), "html", null, true);
                        echo "\">
                            </a>
                        ";
                    } elseif ((($this->getAttribute(                    // line 62
$context["inventory"], "categoryName", array()) == (isset($context["vestito"]) ? $context["vestito"] : null)) && ($this->getAttribute($context["inventory"], "inventoryIsDressed", array()) == true))) {
                        // line 63
                        echo "                            <a class=\"gdrtooltip\" title=\"Attualmente indosso\">
                                <img alt=\"Attualmente indosso\"
                                     src=\"";
                        // line 65
                        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/bag/bag-indossato.jpg"), "html", null, true);
                        echo "\">
                            </a>
                        ";
                    }
                    // line 68
                    echo "                    ";
                } else {
                    // line 69
                    echo "
                    ";
                }
                // line 71
                echo "                </td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['inventory'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            echo "    ";
        } else {
            // line 75
            echo "        <tr>
            <td class=\"text-centered\">Le anime non possono usare la borsa</td>
        </tr>
    ";
        }
        // line 79
        echo "    </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Inventory:bagMini.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  199 => 79,  193 => 75,  190 => 74,  182 => 71,  178 => 69,  175 => 68,  169 => 65,  165 => 63,  163 => 62,  158 => 60,  152 => 57,  149 => 56,  147 => 55,  144 => 54,  138 => 51,  133 => 49,  129 => 48,  126 => 47,  123 => 46,  120 => 45,  117 => 44,  114 => 43,  111 => 42,  109 => 41,  106 => 40,  100 => 37,  96 => 36,  92 => 35,  89 => 34,  86 => 33,  83 => 32,  80 => 31,  77 => 30,  74 => 29,  72 => 28,  66 => 25,  60 => 22,  57 => 21,  55 => 20,  48 => 16,  43 => 13,  40 => 12,  38 => 11,  35 => 10,  30 => 9,  28 => 8,  19 => 1,);
    }
}
/* <table id="mini-bag">*/
/*     <thead>*/
/*     <tr>*/
/*         <th colspan="2">La tua borsa</th>*/
/*     </tr>*/
/*     </thead>*/
/*     <tbody>*/
/*     {% if canView %}*/
/*         {% for inventory in inventories %}*/
/* */
/*             {% set activeDescription = inventory.itemActiveDescription %}*/
/*             {% set expendableDescription = inventory.itemExpendableDescription %}*/
/* */
/*             <tr class="item-row">*/
/*                 <td class="item-name">*/
/*                     {{ inventory.itemName }}*/
/*                 </td>*/
/*                 <td class="item-buttons" style="width: 80px; text-align: center">*/
/* */
/*                     {% if isInGame %}*/
/*                         <a class="bag-show-item gdrtooltip"*/
/*                            href="{{ url('chat-bag', {id: inventory.inventoryId, type: 'show'}) }}"*/
/*                            title="Mostra oggetto in chat">*/
/*                             <img alt="Mostra oggetto"*/
/*                                  src="{{ asset('bundles/gdrgame/images/chat/bag/bag-mostra.png') }}">*/
/*                         </a>*/
/* */
/*                         {% if inventory.itemActiveDescription is not empty %}*/
/*                             {% if inventory.itemShowActiveDescription %}*/
/*                                 {% set actDesc = inventory.itemActiveDescription %}*/
/*                             {% else %}*/
/*                                 {% set actDesc = "Effetto Nascosto" %}*/
/*                             {% endif %}*/
/*                             <a class="bag-activate-item gdrtooltip"*/
/*                                href="{{ url('chat-bag', {id: inventory.inventoryId, type: 'activate'}) }}"*/
/*                                title="Attiva in chat - Effetto: {{ actDesc }}">*/
/*                                 <img src="{{ asset('bundles/gdrgame/images/chat/bag/bag-attiva.png') }}">*/
/*                             </a>*/
/*                         {% endif %}*/
/* */
/*                         {% if inventory.itemExpendableDescription is not empty %}*/
/*                             {% if inventory.itemShowExpendableDescription %}*/
/*                                 {% set expDesc = inventory.itemExpendableDescription %}*/
/*                             {% else %}*/
/*                                 {% set expDesc = "Effetto Nascosto" %}*/
/*                             {% endif %}*/
/*                             <a class="bag-sacrify-item gdrtooltip"*/
/*                                href="{{ url('chat-bag', {id: inventory.inventoryId, type: 'sacrify'}) }}"*/
/*                                title="Sacrifica in chat - Effetto: {{ expDesc }}">*/
/*                                 <img alt="Sacrifica oggetto"*/
/*                                      src="{{ asset('bundles/gdrgame/images/chat/bag/bag-sacrifica.png') }}">*/
/*                             </a>*/
/*                         {% endif %}*/
/* */
/*                         {% if inventory.categoryName == vestito and inventory.inventoryIsDressed == false %}*/
/*                             <a class="bag-dress-item gdrtooltip"*/
/*                                href="{{ url('chat-bag', {id: inventory.inventoryId, type: 'dress'}) }}"*/
/*                                title="Cambia il vestito in chat">*/
/*                                 <img alt="Indossa vestito"*/
/*                                      src="{{ asset('bundles/gdrgame/images/chat/bag/bag-indossa.png') }}">*/
/*                             </a>*/
/*                         {% elseif inventory.categoryName == vestito and inventory.inventoryIsDressed == true %}*/
/*                             <a class="gdrtooltip" title="Attualmente indosso">*/
/*                                 <img alt="Attualmente indosso"*/
/*                                      src="{{ asset('bundles/gdrgame/images/chat/bag/bag-indossato.jpg') }}">*/
/*                             </a>*/
/*                         {% endif %}*/
/*                     {% else %}*/
/* */
/*                     {% endif %}*/
/*                 </td>*/
/*             </tr>*/
/*         {% endfor %}*/
/*     {% else %}*/
/*         <tr>*/
/*             <td class="text-centered">Le anime non possono usare la borsa</td>*/
/*         </tr>*/
/*     {% endif %}*/
/*     </tbody>*/
/* </table>*/
