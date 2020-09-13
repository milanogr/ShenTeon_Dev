<?php

/* GdrGameBundle:Market:index.html.twig */
class __TwigTemplate_1736d124bb124f0030223582fc1300d51179747498af2ecd6a944dd342d2707d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Market:index.html.twig", 1);
        $this->blocks = array(
            'goBack' => array($this, 'block_goBack'),
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
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"market-container\">
        <h1><span>Il mercato</span></h1>

        <p class=\"text-centered\">
            A Teon giungono, da ogni parte dello Shen, prodotti e materie prime di ogni tipo che vanno ad aggiungersi a
            quelli realizzati nella cittadina.
            La Signoria contratta personalmente con questi mercanti per permettere alla popolazione di usufruire di
            tutti questi beni a prezzi accessibili e coerenti.
        </p>

        <p class=\"text-centered\">Esistono tuttavia tipologie di merci difficilmente reperibili ed alcune di queste
            addirittura illegali.
            Non è chiaro dove questi prodotti possano essere reperiti.</p>

        <div id=\"markets-centered\">
            <table id=\"emporium\">
                <thead>
                <tr>
                    <th><img alt=\"Emporio\" src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/market/emporium.jpg"), "html", null, true);
        echo "\"></th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(0, $this->getAttribute((isset($context["check"]) ? $context["check"] : null), "maxEmporiumLevel", array())));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 31
            echo "                    <tr>
                        <td>
                            ";
            // line 33
            if (($context["i"] == 0)) {
                // line 34
                echo "                                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("market-items", array("livello" => $context["i"], "mercato" => $this->getAttribute((isset($context["emporio"]) ? $context["emporio"] : null), "id", array()))), "html", null, true);
                echo "\">Visita
                                    l'Emporio
                                    della città</a>
                            ";
            } else {
                // line 38
                echo "                                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("market-items", array("livello" => $context["i"], "mercato" => $this->getAttribute((isset($context["emporio"]) ? $context["emporio"] : null), "id", array()))), "html", null, true);
                echo "\">Visita
                                    l'Emporio
                                    di livello ";
                // line 40
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "</a>
                            ";
            }
            // line 42
            echo "                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "                </tbody>
            </table>

            <table id=\"black-market\">
                <thead>
                <tr>
                    <th>
                        ";
        // line 52
        if ($this->getAttribute((isset($context["check"]) ? $context["check"] : null), "maxBlackMarketLevel", array())) {
            // line 53
            echo "                            <img alt=\"Mercato Nero\"
                                 src=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/market/black_market.jpg"), "html", null, true);
            echo "\">
                        ";
        } else {
            // line 56
            echo "                            <img alt=\"Mercato Nero\"
                                 src=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/market/black-market-disabled.jpg"), "html", null, true);
            echo "\">
                        ";
        }
        // line 59
        echo "                    </th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 63
        if (($this->getAttribute((isset($context["check"]) ? $context["check"] : null), "maxBlackMarketLevel", array()) > 0)) {
            // line 64
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute((isset($context["check"]) ? $context["check"] : null), "maxBlackMarketLevel", array())));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 65
                echo "                        <tr>
                            <td>
                                <a href=\"";
                // line 67
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("market-items", array("livello" => $context["i"], "mercato" => $this->getAttribute((isset($context["nero"]) ? $context["nero"] : null), "id", array()))), "html", null, true);
                echo "\">Visita
                                    il Mercato Nero di
                                    livello ";
                // line 69
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "</a>
                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 73
            echo "                ";
        } else {
            // line 74
            echo "                    <tr>
                        <td><a class=\"help gdrtooltip\" href=\"#\"
                               title=\"In giro si può sentir parlare, ogni tanto, di un mercato nero...ma al momento ne sai troppo poco.\">Il
                                mercato nero...</a></td>
                    </tr>
                ";
        }
        // line 80
        echo "                </tbody>
            </table>

            <table id=\"potion-market\">
                <thead>
                <tr>
                    <th>
                        ";
        // line 87
        if ($this->getAttribute((isset($context["check"]) ? $context["check"] : null), "maxPotionMarketLevel", array())) {
            // line 88
            echo "                            <img alt=\"Mercato Pozioni\"
                                 src=\"";
            // line 89
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/market/potion-market.jpg"), "html", null, true);
            echo "\">
                        ";
        } else {
            // line 91
            echo "                            <img alt=\"Mercato Pozioni\"
                                 src=\"";
            // line 92
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/market/potion-market-disabled.jpg"), "html", null, true);
            echo "\">
                        ";
        }
        // line 94
        echo "                    </th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 98
        if (($this->getAttribute((isset($context["check"]) ? $context["check"] : null), "maxPotionMarketLevel", array()) > 0)) {
            // line 99
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute((isset($context["check"]) ? $context["check"] : null), "maxPotionMarketLevel", array())));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 100
                echo "                        <tr>
                            <td>
                                <a href=\"";
                // line 102
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("market-items", array("livello" => $context["i"], "mercato" => $this->getAttribute((isset($context["pozioni"]) ? $context["pozioni"] : null), "id", array()))), "html", null, true);
                echo "\">Accedi
                                    al Mercato Pozioni di
                                    livello ";
                // line 104
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "</a>
                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 108
            echo "                ";
        } else {
            // line 109
            echo "                    <tr>
                        <td><a class=\"help gdrtooltip\" href=\"#\"
                               title=\"In giro si può sentir parlare, ogni tanto, del Mercato Pozioni...ma al momento ne sai troppo poco.\">Il
                                mercato delle Pozioni...</a></td>
                    </tr>
                ";
        }
        // line 115
        echo "                </tbody>
            </table>
        </div>

        <div class=\"enclave-markets-container\">
            ";
        // line 120
        if ((isset($context["enclave"]) ? $context["enclave"] : null)) {
            // line 121
            echo "                <a href=\"";
            echo $this->env->getExtension('routing')->getPath("market-items", array("mercato" => 4));
            echo "\">
                    <img class=\"gdrtooltip\" src=\"";
            // line 122
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/market/Mercato_Enclave_ON.png"), "html", null, true);
            echo "\" title=\"Accedi al mercato de ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["enclave"]) ? $context["enclave"] : null), "name", array()), "html", null, true);
            echo "\">
                </a>
            ";
        } else {
            // line 125
            echo "                <img class=\"gdrtooltip\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/market/Mercato_Enclave_OFF.png"), "html", null, true);
            echo "\" title=\"Non fai parte di nessuna Enclave\">
            ";
        }
        // line 127
        echo "
            ";
        // line 128
        if ((isset($context["clan"]) ? $context["clan"] : null)) {
            // line 129
            echo "                <a href=\"";
            echo $this->env->getExtension('routing')->getPath("market-items", array("mercato" => 5));
            echo "\">
                    <img class=\"gdrtooltip\" src=\"";
            // line 130
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/market/Mercato_Enclave_Razziale_ON.png"), "html", null, true);
            echo "\" title=\"Accedi al mercato de ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["clan"]) ? $context["clan"] : null), "name", array()), "html", null, true);
            echo "\">
                </a>
            ";
        } else {
            // line 133
            echo "                <img class=\"gdrtooltip\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/market/Mercato_Enclave_Razziale_OFF.png"), "html", null, true);
            echo "\" title=\"Non fai parte di nessuna Enclave Razziale\">
            ";
        }
        // line 135
        echo "        </div>

    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Market:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  298 => 135,  292 => 133,  284 => 130,  279 => 129,  277 => 128,  274 => 127,  268 => 125,  260 => 122,  255 => 121,  253 => 120,  246 => 115,  238 => 109,  235 => 108,  225 => 104,  220 => 102,  216 => 100,  211 => 99,  209 => 98,  203 => 94,  198 => 92,  195 => 91,  190 => 89,  187 => 88,  185 => 87,  176 => 80,  168 => 74,  165 => 73,  155 => 69,  150 => 67,  146 => 65,  141 => 64,  139 => 63,  133 => 59,  128 => 57,  125 => 56,  120 => 54,  117 => 53,  115 => 52,  106 => 45,  98 => 42,  93 => 40,  87 => 38,  79 => 34,  77 => 33,  73 => 31,  69 => 30,  62 => 26,  42 => 8,  39 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Default:innerContent.html.twig' %}*/
/* */
/* {% block goBack %}*/
/*     {{ render(controller('GdrGameBundle:Location:renderGoBack')) }}*/
/* {% endblock %}*/
/* */
/* {% block content -%}*/
/*     <div class="market-container">*/
/*         <h1><span>Il mercato</span></h1>*/
/* */
/*         <p class="text-centered">*/
/*             A Teon giungono, da ogni parte dello Shen, prodotti e materie prime di ogni tipo che vanno ad aggiungersi a*/
/*             quelli realizzati nella cittadina.*/
/*             La Signoria contratta personalmente con questi mercanti per permettere alla popolazione di usufruire di*/
/*             tutti questi beni a prezzi accessibili e coerenti.*/
/*         </p>*/
/* */
/*         <p class="text-centered">Esistono tuttavia tipologie di merci difficilmente reperibili ed alcune di queste*/
/*             addirittura illegali.*/
/*             Non è chiaro dove questi prodotti possano essere reperiti.</p>*/
/* */
/*         <div id="markets-centered">*/
/*             <table id="emporium">*/
/*                 <thead>*/
/*                 <tr>*/
/*                     <th><img alt="Emporio" src="{{ asset('bundles/gdrgame/images/market/emporium.jpg') }}"></th>*/
/*                 </tr>*/
/*                 </thead>*/
/*                 <tbody>*/
/*                 {% for i in 0..check.maxEmporiumLevel %}*/
/*                     <tr>*/
/*                         <td>*/
/*                             {% if i == 0 %}*/
/*                                 <a href="{{ path('market-items', {'livello': i, 'mercato': emporio.id}) }}">Visita*/
/*                                     l'Emporio*/
/*                                     della città</a>*/
/*                             {% else %}*/
/*                                 <a href="{{ path('market-items', {'livello': i, 'mercato': emporio.id}) }}">Visita*/
/*                                     l'Emporio*/
/*                                     di livello {{ i }}</a>*/
/*                             {% endif %}*/
/*                         </td>*/
/*                     </tr>*/
/*                 {% endfor %}*/
/*                 </tbody>*/
/*             </table>*/
/* */
/*             <table id="black-market">*/
/*                 <thead>*/
/*                 <tr>*/
/*                     <th>*/
/*                         {% if check.maxBlackMarketLevel %}*/
/*                             <img alt="Mercato Nero"*/
/*                                  src="{{ asset('bundles/gdrgame/images/market/black_market.jpg') }}">*/
/*                         {% else %}*/
/*                             <img alt="Mercato Nero"*/
/*                                  src="{{ asset('bundles/gdrgame/images/market/black-market-disabled.jpg') }}">*/
/*                         {% endif %}*/
/*                     </th>*/
/*                 </tr>*/
/*                 </thead>*/
/*                 <tbody>*/
/*                 {% if check.maxBlackMarketLevel > 0 %}*/
/*                     {% for i in 1..check.maxBlackMarketLevel %}*/
/*                         <tr>*/
/*                             <td>*/
/*                                 <a href="{{ path('market-items', {'livello': i, 'mercato': nero.id}) }}">Visita*/
/*                                     il Mercato Nero di*/
/*                                     livello {{ i }}</a>*/
/*                             </td>*/
/*                         </tr>*/
/*                     {% endfor %}*/
/*                 {% else %}*/
/*                     <tr>*/
/*                         <td><a class="help gdrtooltip" href="#"*/
/*                                title="In giro si può sentir parlare, ogni tanto, di un mercato nero...ma al momento ne sai troppo poco.">Il*/
/*                                 mercato nero...</a></td>*/
/*                     </tr>*/
/*                 {% endif %}*/
/*                 </tbody>*/
/*             </table>*/
/* */
/*             <table id="potion-market">*/
/*                 <thead>*/
/*                 <tr>*/
/*                     <th>*/
/*                         {% if check.maxPotionMarketLevel %}*/
/*                             <img alt="Mercato Pozioni"*/
/*                                  src="{{ asset('bundles/gdrgame/images/market/potion-market.jpg') }}">*/
/*                         {% else %}*/
/*                             <img alt="Mercato Pozioni"*/
/*                                  src="{{ asset('bundles/gdrgame/images/market/potion-market-disabled.jpg') }}">*/
/*                         {% endif %}*/
/*                     </th>*/
/*                 </tr>*/
/*                 </thead>*/
/*                 <tbody>*/
/*                 {% if check.maxPotionMarketLevel > 0 %}*/
/*                     {% for i in 1..check.maxPotionMarketLevel %}*/
/*                         <tr>*/
/*                             <td>*/
/*                                 <a href="{{ path('market-items', {'livello': i, 'mercato': pozioni.id}) }}">Accedi*/
/*                                     al Mercato Pozioni di*/
/*                                     livello {{ i }}</a>*/
/*                             </td>*/
/*                         </tr>*/
/*                     {% endfor %}*/
/*                 {% else %}*/
/*                     <tr>*/
/*                         <td><a class="help gdrtooltip" href="#"*/
/*                                title="In giro si può sentir parlare, ogni tanto, del Mercato Pozioni...ma al momento ne sai troppo poco.">Il*/
/*                                 mercato delle Pozioni...</a></td>*/
/*                     </tr>*/
/*                 {% endif %}*/
/*                 </tbody>*/
/*             </table>*/
/*         </div>*/
/* */
/*         <div class="enclave-markets-container">*/
/*             {% if enclave %}*/
/*                 <a href="{{ path('market-items', {'mercato': 4}) }}">*/
/*                     <img class="gdrtooltip" src="{{ asset('bundles/gdrgame/images/market/Mercato_Enclave_ON.png') }}" title="Accedi al mercato de {{ enclave.name }}">*/
/*                 </a>*/
/*             {% else %}*/
/*                 <img class="gdrtooltip" src="{{  asset('bundles/gdrgame/images/market/Mercato_Enclave_OFF.png') }}" title="Non fai parte di nessuna Enclave">*/
/*             {% endif %}*/
/* */
/*             {% if clan %}*/
/*                 <a href="{{ path('market-items', {'mercato': 5}) }}">*/
/*                     <img class="gdrtooltip" src="{{ asset('bundles/gdrgame/images/market/Mercato_Enclave_Razziale_ON.png') }}" title="Accedi al mercato de {{ clan.name }}">*/
/*                 </a>*/
/*             {% else %}*/
/*                 <img class="gdrtooltip" src="{{ asset('bundles/gdrgame/images/market/Mercato_Enclave_Razziale_OFF.png') }}" title="Non fai parte di nessuna Enclave Razziale">*/
/*             {% endif %}*/
/*         </div>*/
/* */
/*     </div>*/
/* {% endblock %}*/
