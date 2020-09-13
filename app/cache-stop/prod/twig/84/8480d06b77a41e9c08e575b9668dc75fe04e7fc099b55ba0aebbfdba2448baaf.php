<?php

/* GdrGameBundle:Location:mapAndLocations.html.twig */
class __TwigTemplate_b6c39c74b90ecfb3b73719cb3759c00b393980016709655dc0154d2085f5d5ec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Location:mapAndLocations.html.twig", 1);
        $this->blocks = array(
            'goBack' => array($this, 'block_goBack'),
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
    public function block_javascripts($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    ";
        // line 10
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "5336f28_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5336f28_0") : $this->env->getExtension('asset')->getAssetUrl("js/5336f28_jquery-ui-1.10.3.custom.min_1.js");
            // line 14
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "5336f28_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5336f28_1") : $this->env->getExtension('asset')->getAssetUrl("js/5336f28_craftmap_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "5336f28_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5336f28_2") : $this->env->getExtension('asset')->getAssetUrl("js/5336f28_maps_3.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "5336f28"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5336f28") : $this->env->getExtension('asset')->getAssetUrl("js/5336f28.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 16
        echo "
";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "    <div class=\"maps-and-location\">
        <h2><span>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["map"]) ? $context["map"] : null), "name", array()), "html", null, true);
        echo "</span></h2>

        <div id=\"container-map\" class=\"relative\">
            <div class=\"map\">

                ";
        // line 26
        if ((isset($context["isDay"]) ? $context["isDay"] : null)) {
            // line 27
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset((isset($context["map"]) ? $context["map"] : null), "map"), "html", null, true);
            echo "\" class=\"imgMap\"/>
                ";
        } else {
            // line 29
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset((isset($context["map"]) ? $context["map"] : null), "mapNight"), "html", null, true);
            echo "\" class=\"imgMap\"/>
                ";
        }
        // line 31
        echo "
                ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["locations"]) ? $context["locations"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["location"]) {
            // line 33
            echo "
                    ";
            // line 34
            if ($this->getAttribute($context["location"], "requireKey", array())) {
                // line 35
                echo "                        ";
                $context["requireKey"] = ". Questa chat richiede una chiave.";
                // line 36
                echo "                    ";
            } else {
                // line 37
                echo "                        ";
                $context["requireKey"] = "";
                // line 38
                echo "                    ";
            }
            // line 39
            echo "

                    ";
            // line 41
            if (($this->getAttribute($context["location"], "isStreet", array()) == false)) {
                // line 42
                echo "
                        ";
                // line 43
                if ($this->getAttribute($context["location"], "requireKey", array())) {
                    // line 44
                    echo "                            ";
                    $context["requireKey"] = ". Questa chat richiede una chiave.";
                    // line 45
                    echo "                            <a class=\"marker location\" title=\"";
                    echo twig_escape_filter($this->env, ($this->getAttribute($context["location"], "name", array()) . (isset($context["requireKey"]) ? $context["requireKey"] : null)), "html", null, true);
                    echo "\"
                               data-coords=\"";
                    // line 46
                    echo twig_escape_filter($this->env, $this->getAttribute($context["location"], "iconPosX", array()), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["location"], "iconPosY", array()), "html", null, true);
                    echo "\"
                               href=\"";
                    // line 47
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("change_location", array("id" => $this->getAttribute($context["location"], "id", array()), "ajax" => 1)), "html", null, true);
                    echo "\"
                               style=\"background: url(";
                    // line 48
                    echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($context["location"], "icon"), "html", null, true);
                    echo ")\">
                            </a>
                        ";
                } else {
                    // line 51
                    echo "
                            ";
                    // line 52
                    if (twig_in_filter($this->getAttribute($context["location"], "id", array()), (isset($context["activeLocations"]) ? $context["activeLocations"] : null))) {
                        // line 53
                        echo "                                ";
                        $context["locIcon"] = $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-aperta-gioco.gif");
                        // line 54
                        echo "                            ";
                    } elseif ($this->getAttribute($context["location"], "isClosed", array())) {
                        // line 55
                        echo "                                ";
                        $context["locIcon"] = $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-chiusa.png");
                        // line 56
                        echo "                            ";
                    } else {
                        // line 57
                        echo "                                ";
                        $context["locIcon"] = $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-aperta.png");
                        // line 58
                        echo "                            ";
                    }
                    // line 59
                    echo "
                            <a class=\"marker location\" title=\"";
                    // line 60
                    echo twig_escape_filter($this->env, ($this->getAttribute($context["location"], "name", array()) . (isset($context["requireKey"]) ? $context["requireKey"] : null)), "html", null, true);
                    echo "\"
                               data-coords=\"";
                    // line 61
                    echo twig_escape_filter($this->env, $this->getAttribute($context["location"], "iconPosX", array()), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["location"], "iconPosY", array()), "html", null, true);
                    echo "\"
                               href=\"";
                    // line 62
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("change_location", array("id" => $this->getAttribute($context["location"], "id", array()), "ajax" => 1)), "html", null, true);
                    echo "\"
                               style=\"background: url(";
                    // line 63
                    echo twig_escape_filter($this->env, (isset($context["locIcon"]) ? $context["locIcon"] : null), "html", null, true);
                    echo ")\">
                            </a>

                        ";
                }
                // line 67
                echo "
                    ";
            } else {
                // line 69
                echo "                        <a class=\"marker street no-ajax\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["location"], "name", array()), "html", null, true);
                echo "\"
                           data-coords=\"";
                // line 70
                echo twig_escape_filter($this->env, $this->getAttribute($context["location"], "iconPosX", array()), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["location"], "iconPosY", array()), "html", null, true);
                echo "\"
                           style=\"background: url(";
                // line 71
                echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($context["location"], "icon"), "html", null, true);
                echo ")\">
                        </a>
                    ";
            }
            // line 74
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['location'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "
                ";
        // line 76
        if (($this->getAttribute((isset($context["map"]) ? $context["map"] : null), "name", array()) != "Mappa di Teon")) {
            // line 77
            echo "                    <a class=\"marker location no-ajax\" title=\"Biblioteca\"
                       ";
            // line 79
            echo "                       data-coords=\"270, 457\"
                       href=\"";
            // line 80
            echo $this->env->getExtension('routing')->getPath("biblioteca-index");
            echo "\"
                       style=\"background: url(";
            // line 81
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-servizio.png"), "html", null, true);
            echo ")\">
                    </a>
                    <a class=\"marker location no-ajax\" title=\"Anagrafe\"
                       ";
            // line 85
            echo "                       data-coords=\"475, 533\"
                       href=\"";
            // line 86
            echo $this->env->getExtension('routing')->getPath("anagrafe-index");
            echo "\"
                       style=\"background: url(";
            // line 87
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-servizio.png"), "html", null, true);
            echo ")\">
                    </a>
                    <a class=\"marker location no-ajax\" title=\"Banca\"
                       ";
            // line 91
            echo "                       data-coords=\"303, 358\"
                       href=\"";
            // line 92
            echo $this->env->getExtension('routing')->getPath("bank-index");
            echo "\"
                       style=\"background: url(";
            // line 93
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-servizio.png"), "html", null, true);
            echo ")\">
                    </a>
                    <a class=\"marker location no-ajax\" title=\"Erario\"
                       ";
            // line 97
            echo "                       data-coords=\"595, 409\"
                       href=\"";
            // line 98
            echo $this->env->getExtension('routing')->getPath("erario-index", array("type" => 1));
            echo "\"
                       style=\"background: url(";
            // line 99
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-servizio.png"), "html", null, true);
            echo ")\">
                    </a>
                    <a class=\"marker location no-ajax\" title=\"Cimitero Lapidi\"
                       ";
            // line 103
            echo "                       data-coords=\"216, 577\"
                       href=\"";
            // line 104
            echo $this->env->getExtension('routing')->getPath("cimitero-index");
            echo "\"
                       style=\"background: url(";
            // line 105
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-servizio.png"), "html", null, true);
            echo ")\">
                    </a>
                    <a class=\"marker location no-ajax\" title=\"Palazzo del Lavoro\"
                       ";
            // line 109
            echo "                       data-coords=\"700, 313\"
                       href=\"";
            // line 110
            echo $this->env->getExtension('routing')->getPath("lavoro-index");
            echo "\"
                       style=\"background: url(";
            // line 111
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-servizio.png"), "html", null, true);
            echo ")\">
                    </a>
                    <a class=\"marker location no-ajax\" title=\"Museo di Teon\"
                       ";
            // line 115
            echo "                       data-coords=\"563, 304\"
                       href=\"";
            // line 116
            echo $this->env->getExtension('routing')->getPath("museo-index");
            echo "\"
                       style=\"background: url(";
            // line 117
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-servizio.png"), "html", null, true);
            echo ")\">
                    </a>
                    <a class=\"marker location no-ajax\" title=\"Archivio di Teon\"
                       ";
            // line 121
            echo "                            data-coords=\"496, 448\"
                       href=\"";
            // line 122
            echo $this->env->getExtension('routing')->getPath("archivio-index");
            echo "\"
                       style=\"background: url(";
            // line 123
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-servizio.png"), "html", null, true);
            echo ")\">
                    </a>
                    <a class=\"marker location no-ajax\" title=\"Saggio di Teon\"
                       ";
            // line 127
            echo "                       data-coords=\"469, 603\"
                       href=\"";
            // line 128
            echo $this->env->getExtension('routing')->getPath("wise.index");
            echo "\"
                       style=\"background: url(";
            // line 129
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-servizio.png"), "html", null, true);
            echo ")\">
                    </a>
                ";
        }
        // line 132
        echo "            </div>
            <div class=\"legenda\">
                <ul>
                    <li><img src=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-aperta-gioco.gif"), "html", null, true);
        echo "\"> Chat Attiva</li>
                    <li><img src=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-aperta.png"), "html", null, true);
        echo "\"> Chat Aperta</li>
                    <li><img src=\"";
        // line 137
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-chiusa.png"), "html", null, true);
        echo "\"> Chat Chiusa</li>
                    <li><img src=\"";
        // line 138
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-servizio.png"), "html", null, true);
        echo "\"> Chat di Servizio</li>
                    <li><img src=\"";
        // line 139
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/chat-privata.png"), "html", null, true);
        echo "\"> Chat di Enclave</li>
                    <li><a id=\"show-streets\" class=\"gdrtooltip\"
                           title=\"Fai click per mostrare o nascondere le vie della mappa\" href=\"#\">Mostra/Nascondi
                            Vie</a></li>
                </ul>
            </div>
        </div>

    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Location:mapAndLocations.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  391 => 139,  387 => 138,  383 => 137,  379 => 136,  375 => 135,  370 => 132,  364 => 129,  360 => 128,  357 => 127,  351 => 123,  347 => 122,  344 => 121,  338 => 117,  334 => 116,  331 => 115,  325 => 111,  321 => 110,  318 => 109,  312 => 105,  308 => 104,  305 => 103,  299 => 99,  295 => 98,  292 => 97,  286 => 93,  282 => 92,  279 => 91,  273 => 87,  269 => 86,  266 => 85,  260 => 81,  256 => 80,  253 => 79,  250 => 77,  248 => 76,  245 => 75,  239 => 74,  233 => 71,  227 => 70,  222 => 69,  218 => 67,  211 => 63,  207 => 62,  201 => 61,  197 => 60,  194 => 59,  191 => 58,  188 => 57,  185 => 56,  182 => 55,  179 => 54,  176 => 53,  174 => 52,  171 => 51,  165 => 48,  161 => 47,  155 => 46,  150 => 45,  147 => 44,  145 => 43,  142 => 42,  140 => 41,  136 => 39,  133 => 38,  130 => 37,  127 => 36,  124 => 35,  122 => 34,  119 => 33,  115 => 32,  112 => 31,  106 => 29,  100 => 27,  98 => 26,  90 => 21,  87 => 20,  84 => 19,  79 => 16,  53 => 14,  49 => 10,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Default:innerContent.html.twig' %}*/
/* */
/* {% block goBack %}*/
/*     {{ render(controller('GdrGameBundle:Location:renderGoBack')) }}*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/* */
/*     {% javascripts filter='?uglifyjs2'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/jquery-ui-1.10.3.custom.min.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/craftmap.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/maps.js' %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* */
/* {% endblock %}*/
/* */
/* {% block content %}*/
/*     <div class="maps-and-location">*/
/*         <h2><span>{{ map.name }}</span></h2>*/
/* */
/*         <div id="container-map" class="relative">*/
/*             <div class="map">*/
/* */
/*                 {% if isDay %}*/
/*                     <img src="{{ vich_uploader_asset(map, 'map') }}" class="imgMap"/>*/
/*                 {% else %}*/
/*                     <img src="{{ vich_uploader_asset(map, 'mapNight') }}" class="imgMap"/>*/
/*                 {% endif %}*/
/* */
/*                 {% for location in locations %}*/
/* */
/*                     {% if location.requireKey %}*/
/*                         {% set requireKey = ". Questa chat richiede una chiave." %}*/
/*                     {% else %}*/
/*                         {% set requireKey = "" %}*/
/*                     {% endif %}*/
/* */
/* */
/*                     {% if location.isStreet == false %}*/
/* */
/*                         {% if location.requireKey %}*/
/*                             {% set requireKey = ". Questa chat richiede una chiave." %}*/
/*                             <a class="marker location" title="{{ location.name ~ requireKey }}"*/
/*                                data-coords="{{ location.iconPosX }}, {{ location.iconPosY }}"*/
/*                                href="{{ path('change_location', {'id': location.id, 'ajax': 1}) }}"*/
/*                                style="background: url({{ vich_uploader_asset(location, 'icon') }})">*/
/*                             </a>*/
/*                         {% else %}*/
/* */
/*                             {% if location.id in activeLocations %}*/
/*                                 {% set locIcon = asset('bundles/gdrgame/images/mappe/chat-aperta-gioco.gif') %}*/
/*                             {% elseif location.isClosed %}*/
/*                                 {% set locIcon = asset('bundles/gdrgame/images/mappe/chat-chiusa.png') %}*/
/*                             {% else %}*/
/*                                 {% set locIcon = asset('bundles/gdrgame/images/mappe/chat-aperta.png') %}*/
/*                             {% endif %}*/
/* */
/*                             <a class="marker location" title="{{ location.name ~ requireKey }}"*/
/*                                data-coords="{{ location.iconPosX }}, {{ location.iconPosY }}"*/
/*                                href="{{ path('change_location', {'id': location.id, 'ajax': 1}) }}"*/
/*                                style="background: url({{ locIcon }})">*/
/*                             </a>*/
/* */
/*                         {% endif %}*/
/* */
/*                     {% else %}*/
/*                         <a class="marker street no-ajax" title="{{ location.name }}"*/
/*                            data-coords="{{ location.iconPosX }}, {{ location.iconPosY }}"*/
/*                            style="background: url({{ vich_uploader_asset(location, 'icon') }})">*/
/*                         </a>*/
/*                     {% endif %}*/
/*                 {% endfor %}*/
/* */
/*                 {% if map.name != "Mappa di Teon" %}*/
/*                     <a class="marker location no-ajax" title="Biblioteca"*/
/*                        {#data-coords="100, 510"#}*/
/*                        data-coords="270, 457"*/
/*                        href="{{ path('biblioteca-index') }}"*/
/*                        style="background: url({{ asset('bundles/gdrgame/images/mappe/chat-servizio.png') }})">*/
/*                     </a>*/
/*                     <a class="marker location no-ajax" title="Anagrafe"*/
/*                        {#data-coords="475, 533"#}*/
/*                        data-coords="475, 533"*/
/*                        href="{{ path('anagrafe-index') }}"*/
/*                        style="background: url({{ asset('bundles/gdrgame/images/mappe/chat-servizio.png') }})">*/
/*                     </a>*/
/*                     <a class="marker location no-ajax" title="Banca"*/
/*                        {#data-coords="281, 317"#}*/
/*                        data-coords="303, 358"*/
/*                        href="{{ path('bank-index') }}"*/
/*                        style="background: url({{ asset('bundles/gdrgame/images/mappe/chat-servizio.png') }})">*/
/*                     </a>*/
/*                     <a class="marker location no-ajax" title="Erario"*/
/*                        {#data-coords="287, 173"#}*/
/*                        data-coords="595, 409"*/
/*                        href="{{ path('erario-index', {type: 1}) }}"*/
/*                        style="background: url({{ asset('bundles/gdrgame/images/mappe/chat-servizio.png') }})">*/
/*                     </a>*/
/*                     <a class="marker location no-ajax" title="Cimitero Lapidi"*/
/*                        {#data-coords="994, 678"#}*/
/*                        data-coords="216, 577"*/
/*                        href="{{ path('cimitero-index') }}"*/
/*                        style="background: url({{ asset('bundles/gdrgame/images/mappe/chat-servizio.png') }})">*/
/*                     </a>*/
/*                     <a class="marker location no-ajax" title="Palazzo del Lavoro"*/
/*                        {#data-coords="401, 191"#}*/
/*                        data-coords="700, 313"*/
/*                        href="{{ path('lavoro-index') }}"*/
/*                        style="background: url({{ asset('bundles/gdrgame/images/mappe/chat-servizio.png') }})">*/
/*                     </a>*/
/*                     <a class="marker location no-ajax" title="Museo di Teon"*/
/*                        {#data-coords="490, 256"#}*/
/*                        data-coords="563, 304"*/
/*                        href="{{ path('museo-index') }}"*/
/*                        style="background: url({{ asset('bundles/gdrgame/images/mappe/chat-servizio.png') }})">*/
/*                     </a>*/
/*                     <a class="marker location no-ajax" title="Archivio di Teon"*/
/*                        {#data-coords="506, 632"#}*/
/*                             data-coords="496, 448"*/
/*                        href="{{ path('archivio-index') }}"*/
/*                        style="background: url({{ asset('bundles/gdrgame/images/mappe/chat-servizio.png') }})">*/
/*                     </a>*/
/*                     <a class="marker location no-ajax" title="Saggio di Teon"*/
/*                        {#data-coords="400, 586"#}*/
/*                        data-coords="469, 603"*/
/*                        href="{{ path('wise.index') }}"*/
/*                        style="background: url({{ asset('bundles/gdrgame/images/mappe/chat-servizio.png') }})">*/
/*                     </a>*/
/*                 {% endif %}*/
/*             </div>*/
/*             <div class="legenda">*/
/*                 <ul>*/
/*                     <li><img src="{{ asset('bundles/gdrgame/images/mappe/chat-aperta-gioco.gif') }}"> Chat Attiva</li>*/
/*                     <li><img src="{{ asset('bundles/gdrgame/images/mappe/chat-aperta.png') }}"> Chat Aperta</li>*/
/*                     <li><img src="{{ asset('bundles/gdrgame/images/mappe/chat-chiusa.png') }}"> Chat Chiusa</li>*/
/*                     <li><img src="{{ asset('bundles/gdrgame/images/mappe/chat-servizio.png') }}"> Chat di Servizio</li>*/
/*                     <li><img src="{{ asset('bundles/gdrgame/images/mappe/chat-privata.png') }}"> Chat di Enclave</li>*/
/*                     <li><a id="show-streets" class="gdrtooltip"*/
/*                            title="Fai click per mostrare o nascondere le vie della mappa" href="#">Mostra/Nascondi*/
/*                             Vie</a></li>*/
/*                 </ul>*/
/*             </div>*/
/*         </div>*/
/* */
/*     </div>*/
/* {% endblock %}*/
