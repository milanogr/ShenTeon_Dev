<?php

/* GdrGameBundle:Bank:index.html.twig */
class __TwigTemplate_2d609b89aba8ab31fc5dacfba1f96db7cf6b0160eacd67397d3c2b036c95be88 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Bank:index.html.twig", 1);
        $this->blocks = array(
            'goBack' => array($this, 'block_goBack'),
            'modals' => array($this, 'block_modals'),
            'javascripts' => array($this, 'block_javascripts'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GdrGameBundle:Default:innerContent.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_goBack($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Location:renderGoBack"));
        echo "
";
    }

    // line 7
    public function block_modals($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->displayParentBlock("modals", $context, $blocks);
        echo "

    ";
        // line 10
        $this->loadTemplate("GdrGameBundle:Default:reveal.html.twig", "GdrGameBundle:Bank:index.html.twig", 10)->display(array_merge($context, array("name" => "bank", "size" => "medium")));
    }

    // line 13
    public function block_javascripts($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    ";
        // line 16
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "b8f4b24_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b8f4b24_0") : $this->env->getExtension('asset')->getAssetUrl("js/b8f4b24_bank_1.js");
            // line 18
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "b8f4b24"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b8f4b24") : $this->env->getExtension('asset')->getAssetUrl("js/b8f4b24.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    // line 22
    public function block_content($context, array $blocks = array())
    {
        // line 23
        echo "<div class=\"bank-container\">
        <h1><span>Banca</span></h1>

        <h4>Totale del tuo conto: <strong class=\"bank-amount\">";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["bankAmount"]) ? $context["bankAmount"] : null), "html", null, true);
        echo "</strong> Mori.</h4>
        <h4>Totale Mori trasportati: <strong><span class=\"bag-amount\">";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["bagAmount"]) ? $context["bagAmount"] : null), "html", null, true);
        echo "</span>/10000</strong>.</h4>

        <hr>

        <div class=\"operations-centered\">
            <div class=\"bank-deposito-container\">
                <h3>Deposito</h3>

                <form id=\"bank-deposito\">
                    <label>Mori da depositare*</label>
                    <input placeholder=\"Quantità\" pattern=\"\\d+\" type=\"text\" required=\"true\" class=\"deposito-quantity\">
                    <button type=\"submit\">Deposita</button>
                </form>
            </div>

            <div class=\"bank-prelievo-container\">
                <h3>Prelievo</h3>

                <form id=\"bank-prelievo\">
                    <label>Mori da prelevare*</label>
                    <input placeholder=\"Quantità\" pattern=\"\\d+\" type=\"text\" required=\"true\" class=\"prelievo-quantity\">
                    <button type=\"submit\">Preleva</button>
                </form>
            </div>

            <hr>

            <div class=\"bank-trasferimento-container\">
                <h3>Trasferimento</h3>

                <form id=\"bank-trasferimento\">
                    <div class=\"half\">
                        <label>Mori da trasferire*</label>
                        <input placeholder=\"Quantità\" pattern=\"\\d+\" type=\"text\" required=\"true\"
                               class=\"trasferimento-quantity\">
                    </div>
                    <div class=\"half\">
                        <label>Destinatario*</label>
                        <input placeholder=\"Nome del personaggio\" type=\"text\" required=\"true\"
                               class=\"trasferimento-destinatario\">
                    </div>
                    <div>
                        <label>Nota</label>
                        <input style=\"width: 95%;\" placeholder=\"Nota opzionale...\" type=\"text\" class=\"trasferimento-nota\">
                    </div>
                    <button type=\"submit\">Trasferisci</button>
                </form>

            </div>
        </div>

        <hr>

        <h3>Ultimi movimenti</h3>
        ";
        // line 81
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
        echo "
        <table id=\"bank-transactions\" class=\"solited\">
            <thead>
            <tr>
                <th class=\"date\">Data</th>
                <th class=\"type\">Tipologia</th>
                <th class=\"total\">Totale</th>
                <th class=\"note\">Note</th>
            </tr>
            </thead>

            <tbody>
            ";
        // line 93
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginator"]) ? $context["paginator"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["transaction"]) {
            // line 94
            echo "                ";
            if ($this->getAttribute($context["transaction"], "isPlus", array())) {
                // line 95
                echo "                    ";
                $context["sign"] = "+";
                // line 96
                echo "                ";
            } else {
                // line 97
                echo "                    ";
                $context["sign"] = "-";
                // line 98
                echo "                ";
            }
            // line 99
            echo "                <tr>
                    <td>";
            // line 100
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["transaction"], "createdAt", array()), "d/m/Y H:i"), "html", null, true);
            echo "</td>
                    <td>";
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute($context["transaction"], "typeName", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 102
            echo twig_escape_filter($this->env, (isset($context["sign"]) ? $context["sign"] : null), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["transaction"], "amount", array()), "html", null, true);
            echo " Mori</td>
                    <td>";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute($context["transaction"], "note", array()), "html", null, true);
            echo "</td>
                </tr>
            ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 106
            echo "                <tr>
                    <td colspan=\"4\" class=\"text-centered\">Nel tuo conto non ci sono stati ancora dei movimenti.</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['transaction'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 110
        echo "            </tbody>
        </table>

        ";
        // line 113
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
        echo "
    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Bank:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 113,  221 => 110,  212 => 106,  204 => 103,  198 => 102,  194 => 101,  190 => 100,  187 => 99,  184 => 98,  181 => 97,  178 => 96,  175 => 95,  172 => 94,  167 => 93,  152 => 81,  95 => 27,  91 => 26,  86 => 23,  83 => 22,  67 => 18,  63 => 16,  57 => 14,  54 => 13,  50 => 10,  44 => 8,  41 => 7,  34 => 4,  31 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Default:innerContent.html.twig' %}*/
/* */
/* {% block goBack %}*/
/*     {{ render(controller('GdrGameBundle:Location:renderGoBack')) }}*/
/* {% endblock %}*/
/* */
/* {% block modals %}*/
/*     {{ parent() }}*/
/* */
/*     {% include 'GdrGameBundle:Default:reveal.html.twig' with {name: 'bank', size: 'medium'} %}*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/* */
/*     {% javascripts filter='?uglifyjs2'*/
/*     '@GdrGameBundle/Resources/public/javascripts/bank.js' %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* {% endblock %}*/
/* */
/* {% block content -%}*/
/*     <div class="bank-container">*/
/*         <h1><span>Banca</span></h1>*/
/* */
/*         <h4>Totale del tuo conto: <strong class="bank-amount">{{ bankAmount }}</strong> Mori.</h4>*/
/*         <h4>Totale Mori trasportati: <strong><span class="bag-amount">{{ bagAmount }}</span>/10000</strong>.</h4>*/
/* */
/*         <hr>*/
/* */
/*         <div class="operations-centered">*/
/*             <div class="bank-deposito-container">*/
/*                 <h3>Deposito</h3>*/
/* */
/*                 <form id="bank-deposito">*/
/*                     <label>Mori da depositare*</label>*/
/*                     <input placeholder="Quantità" pattern="\d+" type="text" required="true" class="deposito-quantity">*/
/*                     <button type="submit">Deposita</button>*/
/*                 </form>*/
/*             </div>*/
/* */
/*             <div class="bank-prelievo-container">*/
/*                 <h3>Prelievo</h3>*/
/* */
/*                 <form id="bank-prelievo">*/
/*                     <label>Mori da prelevare*</label>*/
/*                     <input placeholder="Quantità" pattern="\d+" type="text" required="true" class="prelievo-quantity">*/
/*                     <button type="submit">Preleva</button>*/
/*                 </form>*/
/*             </div>*/
/* */
/*             <hr>*/
/* */
/*             <div class="bank-trasferimento-container">*/
/*                 <h3>Trasferimento</h3>*/
/* */
/*                 <form id="bank-trasferimento">*/
/*                     <div class="half">*/
/*                         <label>Mori da trasferire*</label>*/
/*                         <input placeholder="Quantità" pattern="\d+" type="text" required="true"*/
/*                                class="trasferimento-quantity">*/
/*                     </div>*/
/*                     <div class="half">*/
/*                         <label>Destinatario*</label>*/
/*                         <input placeholder="Nome del personaggio" type="text" required="true"*/
/*                                class="trasferimento-destinatario">*/
/*                     </div>*/
/*                     <div>*/
/*                         <label>Nota</label>*/
/*                         <input style="width: 95%;" placeholder="Nota opzionale..." type="text" class="trasferimento-nota">*/
/*                     </div>*/
/*                     <button type="submit">Trasferisci</button>*/
/*                 </form>*/
/* */
/*             </div>*/
/*         </div>*/
/* */
/*         <hr>*/
/* */
/*         <h3>Ultimi movimenti</h3>*/
/*         {{ knp_pagination_render(paginator) }}*/
/*         <table id="bank-transactions" class="solited">*/
/*             <thead>*/
/*             <tr>*/
/*                 <th class="date">Data</th>*/
/*                 <th class="type">Tipologia</th>*/
/*                 <th class="total">Totale</th>*/
/*                 <th class="note">Note</th>*/
/*             </tr>*/
/*             </thead>*/
/* */
/*             <tbody>*/
/*             {% for transaction in paginator %}*/
/*                 {% if transaction.isPlus %}*/
/*                     {% set sign = '+' %}*/
/*                 {% else %}*/
/*                     {% set sign = '-' %}*/
/*                 {% endif %}*/
/*                 <tr>*/
/*                     <td>{{ transaction.createdAt|date('d/m/Y H:i') }}</td>*/
/*                     <td>{{ transaction.typeName }}</td>*/
/*                     <td>{{ sign }} {{ transaction.amount }} Mori</td>*/
/*                     <td>{{ transaction.note }}</td>*/
/*                 </tr>*/
/*             {% else %}*/
/*                 <tr>*/
/*                     <td colspan="4" class="text-centered">Nel tuo conto non ci sono stati ancora dei movimenti.</td>*/
/*                 </tr>*/
/*             {% endfor %}*/
/*             </tbody>*/
/*         </table>*/
/* */
/*         {{ knp_pagination_render(paginator) }}*/
/*     </div>*/
/* {% endblock %}*/
