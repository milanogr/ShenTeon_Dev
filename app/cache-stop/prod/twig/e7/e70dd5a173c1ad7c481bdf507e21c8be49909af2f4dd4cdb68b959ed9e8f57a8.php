<?php

/* ::baseGame.html.twig */
class __TwigTemplate_b306a1f9214cbca2068e8c2332e42beec38b8e49758fd3f354e73d6ff702be42 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'location' => array($this, 'block_location'),
            'goBack' => array($this, 'block_goBack'),
            'body' => array($this, 'block_body'),
            'modals' => array($this, 'block_modals'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\"/>

    <title>";
        // line 7
        if ($this->renderBlock("title", $context, $blocks)) {
            // line 8
            $this->displayBlock("title", $context, $blocks);
            echo " | Shenteon";
        } else {
            // line 10
            echo "Il gioco di ruolo Play by Chat online di ambientazione Fantasy Medievale | Shenteon";
        }
        // line 12
        echo "</title>

    <meta name=\"description\"
          content=\"Shenteon – L’Eredità delle Lune è un innovativo Gioco di Ruolo Play by Chat gratuito ad ambientazione fantasy medievale, creato e gestito da giocatori appassionati ed esperti. Immergiti nella magia e nelle battaglie dello Shen!\">
    <meta name=\"ROBOTS\" content=\"NOINDEX, NOFOLLOW\">

    ";
        // line 18
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 25
        echo "
    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\"/>

    <script src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/javascripts/vendor/custom.modernizr.js"), "html", null, true);
        echo "\"></script>
</head>

<body>

<div id=\"container\">
    <div id=\"layout-left-wrap\">
        <div id=\"layout-left\">
            <div id=\"location\">
                ";
        // line 37
        $this->displayBlock('location', $context, $blocks);
        // line 40
        echo "            </div>

            <nav id=\"menu-book-on\">
                <div class=\"wrap-left\">
                    <ul class=\"left\">
                        <li><a class=\"gdrtooltip\" href=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("avatar-index");
        echo "\" title=\"Visualizza il tuo avatar\">Avatar</a>
                        </li>
                        <li><a class=\"gdrtooltip mappa\" href=\"";
        // line 47
        echo $this->env->getExtension('routing')->getPath("location_map");
        echo "\"
                               title=\"Apri la mappa\">Mappa</a></li>
                        <li><a class=\"gdrtooltip\" href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("editti-index");
        echo "\" title=\"Leggi gli editti\">Editti</a>
                        </li>
                        <li>";
        // line 51
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Default:renderAraldo"));
        echo "</li>
                        <li><a class=\"gdrtooltip\" href=\"";
        // line 52
        echo $this->env->getExtension('routing')->getPath("bacheca-index");
        echo "\" title=\"Apri la bacheca\">Bacheca</a>
                        </li>
                        <li><a class=\"gdrtooltip nosquare\" href=\"";
        // line 54
        echo $this->env->getExtension('routing')->getPath("biblioteca-index");
        echo "\"
                               title=\"Apri la biblioteca\">Biblioteca</a>
                        </li>
                    </ul>
                </div>

                <ul class=\"wrap-right\">
                    <li><a class=\"gdrtooltip\" href=\"";
        // line 61
        echo $this->env->getExtension('routing')->getPath("enclave-index");
        echo "\"
                           title=\"Visualizza le Enclavi\">Enclavi</a></li>
                    <li><a class=\"gdrtooltip\" href=\"";
        // line 63
        echo $this->env->getExtension('routing')->getPath("anagrafe-index");
        echo "\"
                           title=\"Visualizza l'Anagrafe\">Anagrafe</a></li>
                    <li><a href=\"";
        // line 65
        echo $this->env->getExtension('routing')->getPath("enclave-nobili");
        echo "\" title=\"Visualizza i Nobili di Teon\"
                           class=\"gdrtooltip\">Nobili</a></li>
                    <li><a class=\"gdrtooltip\" href=\"";
        // line 67
        echo $this->env->getExtension('routing')->getPath("bank-index");
        echo "\" title=\"Accedi alla Banca\">Banca</a></li>
                    <li><a class=\"gdrtooltip\" href=\"";
        // line 68
        echo $this->env->getExtension('routing')->getPath("erario-index", array("type" => 1));
        echo "\" title=\"Accedi all'Erario\">Erario</a>
                    </li>
                    <li><a class=\"gdrtooltip\" href=\"";
        // line 70
        echo $this->env->getExtension('routing')->getPath("market");
        echo "\" title=\"Accedi al Mercato\">Mercato</a></li>
                </ul>
            </nav>

            <nav id=\"menu-book-off\">
                <div class=\"wrap-left\">
                    <ul class=\"left\">
                        <li><a class=\"gdrtooltip\" href=\"";
        // line 77
        echo $this->env->getExtension('routing')->getPath("manuale-index");
        echo "\" title=\"Visualizza il Manuale di gioco\">Manuale di gioco</a></li>
                        <li>";
        // line 78
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Default:renderStrillone"));
        echo "</li>
                        <li><a class=\"gdrtooltip\" href=\"";
        // line 79
        echo $this->env->getExtension('routing')->getPath("online-index");
        echo "\" title=\"Visualizza i Presenti\">Presenti</a>
                        </li>
                        <li><a class=\"gdrtooltip\" href=\"#\" title=\"Non implementato\">Statistiche</a></li>
                    </ul>
                </div>

                <ul class=\"wrap-right\">
                    <li><a class=\"gdrtooltip\" href=\"";
        // line 86
        echo $this->env->getExtension('routing')->getPath("bacheca-helpdesk", array("type" => "gestione"));
        echo "\"
                           title=\"Scrivi alla Gestione\">Scrivi alla gestione</a></li>
                    <li><a class=\"gdrtooltip\" href=\"";
        // line 88
        echo $this->env->getExtension('routing')->getPath("bacheca-helpdesk", array("type" => "moderazione"));
        echo "\"
                           title=\"Scrivi alla Moderazione\">Scrivi alla moderazione</a></li>
                    <li><a class=\"gdrtooltip\" href=\"";
        // line 90
        echo $this->env->getExtension('routing')->getPath("bacheca-helpdesk", array("type" => "fato"));
        echo "\"
                           title=\"Scrivi al Fato\">Scrivi al fato</a></li>
                </ul>
            </nav>

            <div id=\"bag-mini\"></div>

            <div id=\"buttons\">
                <ul>
                    <li id=\"letter-ajax\"
                        class=\"letter\">";
        // line 100
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Letter:showLetterAjax"));
        echo "</li>
                    ";
        // line 101
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrMeteoBundle:Default:renderCondition"));
        echo "
                    ";
        // line 102
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrMeteoBundle:Default:renderMoon"));
        echo "
                    <li class=\"suoni\">
                        ";
        // line 104
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Default:renderAudio"));
        echo "
                    </li>
                </ul>
            </div>

            <div id=\"actual-date\">
                <span class=\"date\">";
        // line 110
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrMeteoBundle:Default:renderDate"));
        echo "</span>
                <span class=\"time\" data-timestamp=\"";
        // line 111
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_date_converter($this->env), "U"), "html", null, true);
        echo "\"></span>
            </div>

            <a id=\"ribbon-borsa\" href=\"";
        // line 114
        echo $this->env->getExtension('routing')->getPath("mini-bag");
        echo "\" title=\"Visualizza la tua borsa\"
               class=\"gdrtooltip\">Borsa</a>
            <a id=\"ribbon-on\"
               title=\"Tutte le informazioni che troverai qui possono essere conosciute dal tuo personaggio\"
               class=\"active gdrtooltip\">On</a>
            <a id=\"ribbon-off\" title=\"Tutte le informazioni che troverai qui non fanno parte del gioco\"
               class=\"gdrtooltip\">Off</a>
            <a id=\"ribbon-esci\" href=\"";
        // line 121
        echo $this->env->getExtension('routing')->getPath("logout");
        echo "\" title=\"Esci dal gioco\" class=\"gdrtooltip\">Esci</a>

            <div id=\"refresh-characters\">
                <span>Porte cittadine</span>

                <div class=\"target-ajax\">
                    ";
        // line 127
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Online:showLoggedInOut"));
        echo "
                </div>
            </div>

            <div id=\"riepilogo-pg\">
                ";
        // line 132
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrAvatarBundle:Default:miniAvatar"));
        echo "
            </div>
        </div>
    </div>

    <div id=\"layout-right\">
        <div id=\"top-row\">
            <div class=\"relative\">
                <div class=\"top-left\">
                    ";
        // line 141
        $this->displayBlock('goBack', $context, $blocks);
        // line 142
        echo "                </div>
                <div class=\"top-right\">
                    <div class='marquee-top' id=\"marque\"></div>
                </div>
            </div>
        </div>

        <div id=\"content\">
            <div id=\"inner-content\">
                ";
        // line 151
        $this->displayBlock('body', $context, $blocks);
        // line 152
        echo "            </div>
        </div>
    </div>
</div>

";
        // line 157
        $this->displayBlock('modals', $context, $blocks);
        // line 162
        echo "
";
        // line 163
        $this->displayBlock('javascripts', $context, $blocks);
        // line 194
        echo "</body>
</html>
";
    }

    // line 18
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 19
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "ae03a53_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ae03a53_0") : $this->env->getExtension('asset')->getAssetUrl("css/ae03a53_part_1_select2_1.css");
            // line 22
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"/>
        ";
            // asset "ae03a53_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ae03a53_1") : $this->env->getExtension('asset')->getAssetUrl("css/ae03a53_part_1_styles_2.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"/>
        ";
        } else {
            // asset "ae03a53"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ae03a53") : $this->env->getExtension('asset')->getAssetUrl("css/ae03a53.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"/>
        ";
        }
        unset($context["asset_url"]);
        // line 24
        echo "    ";
    }

    // line 37
    public function block_location($context, array $blocks = array())
    {
        // line 38
        echo "                    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Location:renderLocation"));
        echo "
                ";
    }

    // line 141
    public function block_goBack($context, array $blocks = array())
    {
    }

    // line 151
    public function block_body($context, array $blocks = array())
    {
    }

    // line 157
    public function block_modals($context, array $blocks = array())
    {
        // line 158
        echo "    ";
        $this->loadTemplate("GdrGameBundle:Default:reveal.html.twig", "::baseGame.html.twig", 158)->display(array_merge($context, array("name" => "large", "size" => "large")));
        // line 159
        echo "    ";
        $this->loadTemplate("GdrGameBundle:Default:reveal.html.twig", "::baseGame.html.twig", 159)->display(array_merge($context, array("name" => "medium", "size" => "medium")));
        // line 160
        echo "    ";
        $this->loadTemplate("GdrGameBundle:Default:reveal.html.twig", "::baseGame.html.twig", 160)->display(array_merge($context, array("name" => "small", "size" => "small")));
    }

    // line 163
    public function block_javascripts($context, array $blocks = array())
    {
        // line 164
        echo "
    <script src=\"";
        // line 165
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 166
        echo $this->env->getExtension('routing')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData"));
        echo "\"></script>

    ";
        // line 168
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "b5b1c78_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_0") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_jquery_1.js");
            // line 188
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_1") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_foundation_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_2") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_foundation-reveal_3.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_3") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_mousewheel_4.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_4") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_jquery.tooltipster.min_5.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_5") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_onResizeStop.jquery_6.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_6") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_jquery.form.min_7.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_7") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_jquery.mCustomScrollbar.min_8.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_8") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_foundation.placeholder_9.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_9") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_jquery.equalHeight_10.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_10"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_10") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_jquery.hoverIntent_11.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_11"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_11") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_select2_12.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_12"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_12") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_select2-it_13.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_13"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_13") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_jquery.marquee_14.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_14"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_14") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_jquery.cookie_15.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_15"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_15") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_ion.sound.min_16.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_16"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_16") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_jquery.nicescroll_17.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_17"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_17") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_onLoad_18.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "b5b1c78_18"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78_18") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78_gioco_19.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "b5b1c78"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b5b1c78") : $this->env->getExtension('asset')->getAssetUrl("js/b5b1c78.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 190
        echo "
    <!-- <script src=\"";
        // line 191
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/javascripts/vendor/selectivizr.min.js"), "html", null, true);
        echo "\"></script> -->

";
    }

    public function getTemplateName()
    {
        return "::baseGame.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  505 => 191,  502 => 190,  380 => 188,  376 => 168,  371 => 166,  367 => 165,  364 => 164,  361 => 163,  356 => 160,  353 => 159,  350 => 158,  347 => 157,  342 => 151,  337 => 141,  330 => 38,  327 => 37,  323 => 24,  303 => 22,  298 => 19,  295 => 18,  289 => 194,  287 => 163,  284 => 162,  282 => 157,  275 => 152,  273 => 151,  262 => 142,  260 => 141,  248 => 132,  240 => 127,  231 => 121,  221 => 114,  215 => 111,  211 => 110,  202 => 104,  197 => 102,  193 => 101,  189 => 100,  176 => 90,  171 => 88,  166 => 86,  156 => 79,  152 => 78,  148 => 77,  138 => 70,  133 => 68,  129 => 67,  124 => 65,  119 => 63,  114 => 61,  104 => 54,  99 => 52,  95 => 51,  90 => 49,  85 => 47,  80 => 45,  73 => 40,  71 => 37,  59 => 28,  54 => 26,  51 => 25,  49 => 18,  41 => 12,  38 => 10,  34 => 8,  32 => 7,  25 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <meta charset="UTF-8"/>*/
/* */
/*     <title>*/
/*         {%- if block('title') -%}*/
/*             {{ block('title') }} | Shenteon*/
/*         {%- else -%}*/
/*             Il gioco di ruolo Play by Chat online di ambientazione Fantasy Medievale | Shenteon*/
/*         {%- endif -%}*/
/*     </title>*/
/* */
/*     <meta name="description"*/
/*           content="Shenteon – L’Eredità delle Lune è un innovativo Gioco di Ruolo Play by Chat gratuito ad ambientazione fantasy medievale, creato e gestito da giocatori appassionati ed esperti. Immergiti nella magia e nelle battaglie dello Shen!">*/
/*     <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">*/
/* */
/*     {% block stylesheets %}*/
/*         {% stylesheets*/
/*         'bundles/gdrgame/stylesheets/*'*/
/*         filter='cssrewrite' %}*/
/*         <link rel="stylesheet" href="{{ asset_url }}"/>*/
/*         {% endstylesheets %}*/
/*     {% endblock %}*/
/* */
/*     <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"/>*/
/* */
/*     <script src="{{ asset('bundles/gdrgame/javascripts/vendor/custom.modernizr.js') }}"></script>*/
/* </head>*/
/* */
/* <body>*/
/* */
/* <div id="container">*/
/*     <div id="layout-left-wrap">*/
/*         <div id="layout-left">*/
/*             <div id="location">*/
/*                 {% block location %}*/
/*                     {{ render(controller('GdrGameBundle:Location:renderLocation')) }}*/
/*                 {% endblock %}*/
/*             </div>*/
/* */
/*             <nav id="menu-book-on">*/
/*                 <div class="wrap-left">*/
/*                     <ul class="left">*/
/*                         <li><a class="gdrtooltip" href="{{ path('avatar-index') }}" title="Visualizza il tuo avatar">Avatar</a>*/
/*                         </li>*/
/*                         <li><a class="gdrtooltip mappa" href="{{ path('location_map') }}"*/
/*                                title="Apri la mappa">Mappa</a></li>*/
/*                         <li><a class="gdrtooltip" href="{{ path("editti-index") }}" title="Leggi gli editti">Editti</a>*/
/*                         </li>*/
/*                         <li>{{ render(controller('GdrGameBundle:Default:renderAraldo')) }}</li>*/
/*                         <li><a class="gdrtooltip" href="{{ path('bacheca-index') }}" title="Apri la bacheca">Bacheca</a>*/
/*                         </li>*/
/*                         <li><a class="gdrtooltip nosquare" href="{{ path("biblioteca-index") }}"*/
/*                                title="Apri la biblioteca">Biblioteca</a>*/
/*                         </li>*/
/*                     </ul>*/
/*                 </div>*/
/* */
/*                 <ul class="wrap-right">*/
/*                     <li><a class="gdrtooltip" href="{{ path('enclave-index') }}"*/
/*                            title="Visualizza le Enclavi">Enclavi</a></li>*/
/*                     <li><a class="gdrtooltip" href="{{ path('anagrafe-index') }}"*/
/*                            title="Visualizza l'Anagrafe">Anagrafe</a></li>*/
/*                     <li><a href="{{ path('enclave-nobili') }}" title="Visualizza i Nobili di Teon"*/
/*                            class="gdrtooltip">Nobili</a></li>*/
/*                     <li><a class="gdrtooltip" href="{{ path('bank-index') }}" title="Accedi alla Banca">Banca</a></li>*/
/*                     <li><a class="gdrtooltip" href="{{ path('erario-index', {type:1}) }}" title="Accedi all'Erario">Erario</a>*/
/*                     </li>*/
/*                     <li><a class="gdrtooltip" href="{{ path('market') }}" title="Accedi al Mercato">Mercato</a></li>*/
/*                 </ul>*/
/*             </nav>*/
/* */
/*             <nav id="menu-book-off">*/
/*                 <div class="wrap-left">*/
/*                     <ul class="left">*/
/*                         <li><a class="gdrtooltip" href="{{ path("manuale-index") }}" title="Visualizza il Manuale di gioco">Manuale di gioco</a></li>*/
/*                         <li>{{ render(controller('GdrGameBundle:Default:renderStrillone')) }}</li>*/
/*                         <li><a class="gdrtooltip" href="{{ path('online-index') }}" title="Visualizza i Presenti">Presenti</a>*/
/*                         </li>*/
/*                         <li><a class="gdrtooltip" href="#" title="Non implementato">Statistiche</a></li>*/
/*                     </ul>*/
/*                 </div>*/
/* */
/*                 <ul class="wrap-right">*/
/*                     <li><a class="gdrtooltip" href="{{ path('bacheca-helpdesk', {type: 'gestione'}) }}"*/
/*                            title="Scrivi alla Gestione">Scrivi alla gestione</a></li>*/
/*                     <li><a class="gdrtooltip" href="{{ path('bacheca-helpdesk', {type: 'moderazione'}) }}"*/
/*                            title="Scrivi alla Moderazione">Scrivi alla moderazione</a></li>*/
/*                     <li><a class="gdrtooltip" href="{{ path('bacheca-helpdesk', {type: 'fato'}) }}"*/
/*                            title="Scrivi al Fato">Scrivi al fato</a></li>*/
/*                 </ul>*/
/*             </nav>*/
/* */
/*             <div id="bag-mini"></div>*/
/* */
/*             <div id="buttons">*/
/*                 <ul>*/
/*                     <li id="letter-ajax"*/
/*                         class="letter">{{ render(controller('GdrGameBundle:Letter:showLetterAjax')) }}</li>*/
/*                     {{ render(controller('GdrMeteoBundle:Default:renderCondition')) }}*/
/*                     {{ render(controller('GdrMeteoBundle:Default:renderMoon')) }}*/
/*                     <li class="suoni">*/
/*                         {{ render(controller('GdrGameBundle:Default:renderAudio')) }}*/
/*                     </li>*/
/*                 </ul>*/
/*             </div>*/
/* */
/*             <div id="actual-date">*/
/*                 <span class="date">{{ render(controller('GdrMeteoBundle:Default:renderDate')) }}</span>*/
/*                 <span class="time" data-timestamp="{{ date()|date('U') }}"></span>*/
/*             </div>*/
/* */
/*             <a id="ribbon-borsa" href="{{ path('mini-bag') }}" title="Visualizza la tua borsa"*/
/*                class="gdrtooltip">Borsa</a>*/
/*             <a id="ribbon-on"*/
/*                title="Tutte le informazioni che troverai qui possono essere conosciute dal tuo personaggio"*/
/*                class="active gdrtooltip">On</a>*/
/*             <a id="ribbon-off" title="Tutte le informazioni che troverai qui non fanno parte del gioco"*/
/*                class="gdrtooltip">Off</a>*/
/*             <a id="ribbon-esci" href="{{ path('logout') }}" title="Esci dal gioco" class="gdrtooltip">Esci</a>*/
/* */
/*             <div id="refresh-characters">*/
/*                 <span>Porte cittadine</span>*/
/* */
/*                 <div class="target-ajax">*/
/*                     {{ render(controller('GdrGameBundle:Online:showLoggedInOut')) }}*/
/*                 </div>*/
/*             </div>*/
/* */
/*             <div id="riepilogo-pg">*/
/*                 {{ render(controller('GdrAvatarBundle:Default:miniAvatar')) }}*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* */
/*     <div id="layout-right">*/
/*         <div id="top-row">*/
/*             <div class="relative">*/
/*                 <div class="top-left">*/
/*                     {% block goBack %}{% endblock %}*/
/*                 </div>*/
/*                 <div class="top-right">*/
/*                     <div class='marquee-top' id="marque"></div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/* */
/*         <div id="content">*/
/*             <div id="inner-content">*/
/*                 {% block body %}{% endblock %}*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* */
/* {% block modals %}*/
/*     {% include 'GdrGameBundle:Default:reveal.html.twig' with {name: 'large', size: 'large'} %}*/
/*     {% include 'GdrGameBundle:Default:reveal.html.twig' with {name: 'medium', size: 'medium'} %}*/
/*     {% include 'GdrGameBundle:Default:reveal.html.twig' with {name: 'small', size: 'small'} %}*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/* */
/*     <script src="{{ asset('bundles/fosjsrouting/js/router.js') }}"></script>*/
/*     <script src="{{ path('fos_js_routing_js', {"callback": "fos.Router.setData"}) }}"></script>*/
/* */
/*     {% javascripts filter='?uglifyjs2'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/jquery.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/foundation/foundation.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/foundation/foundation-reveal.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/mousewheel.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/jquery.tooltipster.min.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/onResizeStop.jquery.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/jquery.form.min.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/jquery.mCustomScrollbar.min.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/foundation/foundation.placeholder.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/jquery.equalHeight.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/jquery.hoverIntent.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/select2.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/select2-it.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/jquery.marquee.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/jquery.cookie.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/ion.sound.min.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/jquery.nicescroll.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/onLoad.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/gioco.js' %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* */
/*     <!-- <script src="{{ asset('bundles/gdrgame/javascripts/vendor/selectivizr.min.js') }}"></script> -->*/
/* */
/* {% endblock %}*/
/* </body>*/
/* </html>*/
/* */
