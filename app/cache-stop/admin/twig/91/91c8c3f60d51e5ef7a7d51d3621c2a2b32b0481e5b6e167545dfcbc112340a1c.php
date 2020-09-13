<?php

/* ::baseSite.html.twig */
class __TwigTemplate_678cddab094d227fc744290d6d07e64d598183c08ae41a3980afba92cf520923 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'content' => array($this, 'block_content'),
            'modals' => array($this, 'block_modals'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_cc3e3fe741b3c62047b2b332bc2721107ff22fcd16731b9cdf1db2371e4846c2 = $this->env->getExtension("native_profiler");
        $__internal_cc3e3fe741b3c62047b2b332bc2721107ff22fcd16731b9cdf1db2371e4846c2->enter($__internal_cc3e3fe741b3c62047b2b332bc2721107ff22fcd16731b9cdf1db2371e4846c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::baseSite.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<!--[if IE 8]>
<html class=\"no-js lt-ie9\" lang=\"en\"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class=\"no-js\" lang=\"en\"> <!--<![endif]-->

<head>
    <meta charset=\"utf-8\"/>
    ";
        // line 10
        echo "    <title>";
        // line 11
        if ($this->renderBlock("title", $context, $blocks)) {
            // line 12
            $this->displayBlock("title", $context, $blocks);
            echo " | Shenteon";
        } else {
            // line 14
            echo "Il gioco di ruolo Play by Chat online di ambientazione Fantasy Medievale | Shenteon";
        }
        // line 16
        echo "</title>

    <meta name=\"description\"
          content=\"Shenteon – L’Eredità delle Lune ti aspetta per dare sfogo alla tua fantasia. Innovativo Gioco di Ruolo Play by Chat gratuito creato e gestito da giocatori appassionati ed esperti. Immergiti nella magia e nelle battaglie dello Shen!\">

    ";
        // line 21
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 30
        echo "
    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\"/>

    ";
        // line 33
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "e732951_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e732951_0") : $this->env->getExtension('asset')->getAssetUrl("js/e732951_custom.modernizr_1.js");
            // line 35
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "e732951"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e732951") : $this->env->getExtension('asset')->getAssetUrl("js/e732951.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 37
        echo "
</head>
<body>

<div id=\"body-container\">
    <header>
        <nav role=\"navigation\">
            <ul>
                <li class=\"icons-home\">
                    <a href=\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("site_homepage");
        echo "\" title=\"Vai alla homepage del sito\">Home</a>
                </li>
                <li class=\"icons-regolamenti\">
                    <a href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("site_regolamenti");
        echo "\" title=\"Vai ai regolamenti\">Regolamenti</a>
                </li>
                <li class=\"icons-ambientazione\">
                    <a href=\"";
        // line 52
        echo $this->env->getExtension('routing')->getPath("site_ambientazione");
        echo "\"
                       title=\"Vai all'ambientazione\">Ambientazione</a>
                </li>
                <li class=\"icons-registrati\">
                    <a href=\"";
        // line 56
        echo $this->env->getExtension('routing')->getPath("user_register");
        echo "\"
                       title=\"Registrati e crea il tuo PG\">Registrati
                        e crea il tuo PG</a>
                </li>
                <li class=\"icons-news\">
                    <a href=\"";
        // line 61
        echo $this->env->getExtension('routing')->getPath("site_list_news");
        echo "\" title=\"Le news del gioco\">News</a>
                </li>
            </ul>

            <div id=\"login-box\">
                ";
        // line 66
        if (($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY") == false)) {
            // line 67
            echo "                    ";
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrUserBundle:Login:login", array("isIncluded" => true)));
            echo "
                ";
        } else {
            // line 69
            echo "                    <p>Bentornato ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "html", null, true);
            echo "!</p>
                    <div class=\"text-centered\">
                        <a href=\"";
            // line 71
            echo $this->env->getExtension('routing')->getPath("user_choose_pg");
            echo "\">Scegli personaggio</a> -
                        <a href=\"";
            // line 72
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\">Sloggati</a>
                    </div>
                ";
        }
        // line 75
        echo "            </div>
        </nav>
    </header>

    <div id=\"middle-container\">
        <div id=\"radio-riv\">
            <a href=\"https://www.radiorivendell.com/page/listen/\"
               title=\"Ascolta Radio Rivendell - Risorsa esterna - Allowed by www.radiorivendell.com\" target=\"_blank\">Radio
                Rivendell</a>
        </div>
        <div id=\"content\" class=\"pergamena\">
            <div id=\"pergamena-top\"></div>
            <div id=\"pergamena-sx\"></div>
            <div class=\"text-content\">
                ";
        // line 89
        $this->displayBlock('content', $context, $blocks);
        // line 90
        echo "            </div>
        </div>
        <div id=\"catena\"></div>
    </div>

    <div id=\"chain\"></div>
    <div id=\"lanterna\"></div>
    <div id=\"pegi\"></div>

    <footer id=\"footer\">
        <div class=\"footer-inner\">
            <div id=\"footer-top\">
                <ul>
                    <li><a title=\"Come contattare l'Assistenza\" data-reveal-id=\"modal-assistenza\">Assistenza</a>
                    </li>
                    <li><a href=\"";
        // line 105
        echo $this->env->getExtension('routing')->getPath("site_credits");
        echo "\" title=\"Chi ha contribuito alla realizzazione del sito\">Crediti</a></li>
                    <li><a href=\"";
        // line 106
        echo $this->env->getExtension('routing')->getPath("site_regolamento", array("slug" => "faq"));
        echo "\" title=\"Le domande frequenti\">F.A.Q.</a></li>
                    <li><a data-reveal-id=\"modal-large\" data-reveal-ajax=\"";
        // line 107
        echo $this->env->getExtension('routing')->getPath("site_privacy");
        echo "\" title=\"Mostra la privacy policy\">Privacy Policy</a></li>
                </ul>
            </div>
            <div id=\"footer-bottom\">
                <div class=\"footer-stats\">
                    ";
        // line 112
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrSiteBundle:Default:renderStats"));
        echo "
                </div>
                <ul class=\"browsers\">
                    <li class=\"icons-facebook\"><a class=\"has-tip\" target=\"_blank\" href=\"https://www.facebook.com/groups/633251180052619\"
                                                  title=\"Seguici su facebook\">Seguici su facebook</a></li>
                    <li class=\"icons-chrome\"><a class=\"has-tip\" title=\"Compatibile con Chrome\">Compatibile con Chrome</a>
                    </li>
                    <li class=\"icons-firefox\"><a class=\"has-tip\" title=\"Compatibile con Firefox\">Compatibile con Firefox</a>
                    </li>
                    <li class=\"icons-safari\"><a class=\"has-tip\" title=\"Compatibile con Safari\">Compatibile con Safari</a>
                    </li>
                    <li class=\"icons-explorer\">
                        <a class=\"has-tip\" title=\"Compatibile con Internet Explorer 9+\">Compatibile con Internet Explorer
                            9+</a>
                    </li>
                    <li class=\"icons-opera\">
                        <a class=\"has-tip\" title=\"Compatibile con Opera\">Compatibile con Opera</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</div>

<!--[if lte IE 8]>
<div id=\"ie-alert\">
    <p><strong>Attenzione</strong>, la tua versione di Internet Explorer <strong>non</strong> è supportata dal nostro
        sito. Per evitare di incorrere in problemi di sicurezza e visualizzazione ti consigliamo caldamente di cambiare
        browser oppure di <a
                href=\"http://browsehappy.com/\">aggiornalo ora</a>.</p>
</div>
<![endif]-->

";
        // line 145
        $this->displayBlock('modals', $context, $blocks);
        // line 156
        echo "
";
        // line 157
        $this->displayBlock('javascripts', $context, $blocks);
        // line 215
        echo "</body>
</html>";
        
        $__internal_cc3e3fe741b3c62047b2b332bc2721107ff22fcd16731b9cdf1db2371e4846c2->leave($__internal_cc3e3fe741b3c62047b2b332bc2721107ff22fcd16731b9cdf1db2371e4846c2_prof);

    }

    // line 21
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_618b29f76b2d54bf614079b8edc6b7a6525255620db35fab6be0b85e5662e0bd = $this->env->getExtension("native_profiler");
        $__internal_618b29f76b2d54bf614079b8edc6b7a6525255620db35fab6be0b85e5662e0bd->enter($__internal_618b29f76b2d54bf614079b8edc6b7a6525255620db35fab6be0b85e5662e0bd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 22
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "ce389b7_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ce389b7_0") : $this->env->getExtension('asset')->getAssetUrl("css/ce389b7_normalize_1.css");
            // line 27
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
        ";
            // asset "ce389b7_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ce389b7_1") : $this->env->getExtension('asset')->getAssetUrl("css/ce389b7_foundation_2.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
        ";
            // asset "ce389b7_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ce389b7_2") : $this->env->getExtension('asset')->getAssetUrl("css/ce389b7_cookie-bar_3.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
        ";
        } else {
            // asset "ce389b7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ce389b7") : $this->env->getExtension('asset')->getAssetUrl("css/ce389b7.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
        ";
        }
        unset($context["asset_url"]);
        // line 29
        echo "    ";
        
        $__internal_618b29f76b2d54bf614079b8edc6b7a6525255620db35fab6be0b85e5662e0bd->leave($__internal_618b29f76b2d54bf614079b8edc6b7a6525255620db35fab6be0b85e5662e0bd_prof);

    }

    // line 89
    public function block_content($context, array $blocks = array())
    {
        $__internal_36ac1991ab75f92d8ecf945cede643c95687502673a71cf06e1ed1565676985f = $this->env->getExtension("native_profiler");
        $__internal_36ac1991ab75f92d8ecf945cede643c95687502673a71cf06e1ed1565676985f->enter($__internal_36ac1991ab75f92d8ecf945cede643c95687502673a71cf06e1ed1565676985f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_36ac1991ab75f92d8ecf945cede643c95687502673a71cf06e1ed1565676985f->leave($__internal_36ac1991ab75f92d8ecf945cede643c95687502673a71cf06e1ed1565676985f_prof);

    }

    // line 145
    public function block_modals($context, array $blocks = array())
    {
        $__internal_5bc9cd583132fd559e4dd207b33babafdb155658464ecf0a3df97388771bb267 = $this->env->getExtension("native_profiler");
        $__internal_5bc9cd583132fd559e4dd207b33babafdb155658464ecf0a3df97388771bb267->enter($__internal_5bc9cd583132fd559e4dd207b33babafdb155658464ecf0a3df97388771bb267_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "modals"));

        // line 146
        echo "    <div id=\"modal-assistenza\" class=\"reveal-modal small\">
        <h2>Hai bisogno di assistenza?</h2>

        <p>Scrivici a <a href=\"mailto:gestione@shenteon.com\">gestione@shenteon.com</a> per qualsiasi necessità. Ti
            risponderemo quanto prima.</p>
        <a class=\"close-reveal-modal\">&#215;</a>
    </div>

    <div id=\"modal-large\" class=\"reveal-modal large\"></div>
";
        
        $__internal_5bc9cd583132fd559e4dd207b33babafdb155658464ecf0a3df97388771bb267->leave($__internal_5bc9cd583132fd559e4dd207b33babafdb155658464ecf0a3df97388771bb267_prof);

    }

    // line 157
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_adbdda18d0c824b3e86e2d11652f9c0e33cd7af797477d6fb3d6a62dccdbc0bf = $this->env->getExtension("native_profiler");
        $__internal_adbdda18d0c824b3e86e2d11652f9c0e33cd7af797477d6fb3d6a62dccdbc0bf->enter($__internal_adbdda18d0c824b3e86e2d11652f9c0e33cd7af797477d6fb3d6a62dccdbc0bf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 158
        echo "
    ";
        // line 159
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d9efc4e_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d9efc4e_0") : $this->env->getExtension('asset')->getAssetUrl("js/d9efc4e_jquery_1.js");
            // line 168
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "d9efc4e_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d9efc4e_1") : $this->env->getExtension('asset')->getAssetUrl("js/d9efc4e_foundation_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "d9efc4e_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d9efc4e_2") : $this->env->getExtension('asset')->getAssetUrl("js/d9efc4e_foundation.reveal_3.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "d9efc4e_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d9efc4e_3") : $this->env->getExtension('asset')->getAssetUrl("js/d9efc4e_jquery.tooltipster.min_4.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "d9efc4e_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d9efc4e_4") : $this->env->getExtension('asset')->getAssetUrl("js/d9efc4e_jquery.nicescroll_5.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "d9efc4e_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d9efc4e_5") : $this->env->getExtension('asset')->getAssetUrl("js/d9efc4e_cookie-enabler.min_6.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "d9efc4e"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d9efc4e") : $this->env->getExtension('asset')->getAssetUrl("js/d9efc4e.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 170
        echo "
    <script type=\"text/javascript\">

        \$(document).ready(function () {

            \$(document).foundation();

            \$('.has-tip').tooltipster({
                theme: '.tooltipster-shadow'
            });

            \$(\".text-content\").niceScroll({
                cursoropacitymin: 0.5,
                cursorcolor: \"#30130b\",
                cursorborder: \"none\"
            });
        });

        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-42641047-1', 'auto');
        ga('set', 'anonymizeIp', true);
        ga('send', 'pageview');

    </script>

    ";
        // line 200
        echo "        ";
        // line 201
        echo "        ";
        // line 202
        echo "        ";
        // line 203
        echo "        ";
        // line 204
        echo "        ";
        // line 205
        echo "        ";
        // line 206
        echo "    ";
        // line 207
        echo "
    <script>
        COOKIES_ENABLER.init({
            bannerHTML: '<p>Questo sito utilizza dei cookies per migliorare la tua esperienza di navigazione. Per maggiori informazioni <a class=\"ce-read-more\" data-reveal-id=\"modal-large\" data-reveal-ajax=\"";
        // line 210
        echo $this->env->getExtension('routing')->getPath("site_privacy");
        echo "\">clicca qui</a> <a href=\"#\" class=\"ce-dismiss\">X</a>',
            clickOutside: true
        });
    </script>
";
        
        $__internal_adbdda18d0c824b3e86e2d11652f9c0e33cd7af797477d6fb3d6a62dccdbc0bf->leave($__internal_adbdda18d0c824b3e86e2d11652f9c0e33cd7af797477d6fb3d6a62dccdbc0bf_prof);

    }

    public function getTemplateName()
    {
        return "::baseSite.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  438 => 210,  433 => 207,  431 => 206,  429 => 205,  427 => 204,  425 => 203,  423 => 202,  421 => 201,  419 => 200,  388 => 170,  344 => 168,  340 => 159,  337 => 158,  331 => 157,  315 => 146,  309 => 145,  298 => 89,  291 => 29,  265 => 27,  260 => 22,  254 => 21,  246 => 215,  244 => 157,  241 => 156,  239 => 145,  203 => 112,  195 => 107,  191 => 106,  187 => 105,  170 => 90,  168 => 89,  152 => 75,  146 => 72,  142 => 71,  136 => 69,  130 => 67,  128 => 66,  120 => 61,  112 => 56,  105 => 52,  99 => 49,  93 => 46,  82 => 37,  68 => 35,  64 => 33,  59 => 31,  56 => 30,  54 => 21,  47 => 16,  44 => 14,  40 => 12,  38 => 11,  36 => 10,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <!--[if IE 8]>*/
/* <html class="no-js lt-ie9" lang="en"> <![endif]-->*/
/* <!--[if gt IE 8]><!-->*/
/* <html class="no-js" lang="en"> <!--<![endif]-->*/
/* */
/* <head>*/
/*     <meta charset="utf-8"/>*/
/*     {#<meta name="viewport" content="width=device-width"/>#}*/
/*     <title>*/
/*         {%- if block('title') -%}*/
/*             {{ block('title') }} | Shenteon*/
/*         {%- else -%}*/
/*             Il gioco di ruolo Play by Chat online di ambientazione Fantasy Medievale | Shenteon*/
/*         {%- endif -%}*/
/*     </title>*/
/* */
/*     <meta name="description"*/
/*           content="Shenteon – L’Eredità delle Lune ti aspetta per dare sfogo alla tua fantasia. Innovativo Gioco di Ruolo Play by Chat gratuito creato e gestito da giocatori appassionati ed esperti. Immergiti nella magia e nelle battaglie dello Shen!">*/
/* */
/*     {% block stylesheets %}*/
/*         {% stylesheets*/
/*         'bundles/gdrsite/stylesheets/normalize.css'*/
/*         'bundles/gdrsite/stylesheets/foundation.css'*/
/*         'bundles/gdrsite/stylesheets/cookie-bar.css'*/
/*         filter='cssrewrite' %}*/
/*         <link rel="stylesheet" href="{{ asset_url }}"/>*/
/*         {% endstylesheets %}*/
/*     {% endblock %}*/
/* */
/*     <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"/>*/
/* */
/*     {% javascripts filter='?uglifyjs2'*/
/*     '@GdrSiteBundle/Resources/public/javascripts/vendor/custom.modernizr.js' %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* */
/* </head>*/
/* <body>*/
/* */
/* <div id="body-container">*/
/*     <header>*/
/*         <nav role="navigation">*/
/*             <ul>*/
/*                 <li class="icons-home">*/
/*                     <a href="{{ path('site_homepage') }}" title="Vai alla homepage del sito">Home</a>*/
/*                 </li>*/
/*                 <li class="icons-regolamenti">*/
/*                     <a href="{{ path('site_regolamenti') }}" title="Vai ai regolamenti">Regolamenti</a>*/
/*                 </li>*/
/*                 <li class="icons-ambientazione">*/
/*                     <a href="{{ path('site_ambientazione') }}"*/
/*                        title="Vai all'ambientazione">Ambientazione</a>*/
/*                 </li>*/
/*                 <li class="icons-registrati">*/
/*                     <a href="{{ path('user_register') }}"*/
/*                        title="Registrati e crea il tuo PG">Registrati*/
/*                         e crea il tuo PG</a>*/
/*                 </li>*/
/*                 <li class="icons-news">*/
/*                     <a href="{{ path('site_list_news') }}" title="Le news del gioco">News</a>*/
/*                 </li>*/
/*             </ul>*/
/* */
/*             <div id="login-box">*/
/*                 {% if is_granted('IS_AUTHENTICATED_FULLY') == false %}*/
/*                     {{ render(controller('GdrUserBundle:Login:login', {isIncluded: true})) }}*/
/*                 {% else %}*/
/*                     <p>Bentornato {{ app.user }}!</p>*/
/*                     <div class="text-centered">*/
/*                         <a href="{{ path('user_choose_pg') }}">Scegli personaggio</a> -*/
/*                         <a href="{{ path('logout') }}">Sloggati</a>*/
/*                     </div>*/
/*                 {% endif %}*/
/*             </div>*/
/*         </nav>*/
/*     </header>*/
/* */
/*     <div id="middle-container">*/
/*         <div id="radio-riv">*/
/*             <a href="https://www.radiorivendell.com/page/listen/"*/
/*                title="Ascolta Radio Rivendell - Risorsa esterna - Allowed by www.radiorivendell.com" target="_blank">Radio*/
/*                 Rivendell</a>*/
/*         </div>*/
/*         <div id="content" class="pergamena">*/
/*             <div id="pergamena-top"></div>*/
/*             <div id="pergamena-sx"></div>*/
/*             <div class="text-content">*/
/*                 {% block content %}{% endblock %}*/
/*             </div>*/
/*         </div>*/
/*         <div id="catena"></div>*/
/*     </div>*/
/* */
/*     <div id="chain"></div>*/
/*     <div id="lanterna"></div>*/
/*     <div id="pegi"></div>*/
/* */
/*     <footer id="footer">*/
/*         <div class="footer-inner">*/
/*             <div id="footer-top">*/
/*                 <ul>*/
/*                     <li><a title="Come contattare l'Assistenza" data-reveal-id="modal-assistenza">Assistenza</a>*/
/*                     </li>*/
/*                     <li><a href="{{ path('site_credits') }}" title="Chi ha contribuito alla realizzazione del sito">Crediti</a></li>*/
/*                     <li><a href="{{ path('site_regolamento', {slug: "faq"}) }}" title="Le domande frequenti">F.A.Q.</a></li>*/
/*                     <li><a data-reveal-id="modal-large" data-reveal-ajax="{{ path('site_privacy') }}" title="Mostra la privacy policy">Privacy Policy</a></li>*/
/*                 </ul>*/
/*             </div>*/
/*             <div id="footer-bottom">*/
/*                 <div class="footer-stats">*/
/*                     {{ render(controller("GdrSiteBundle:Default:renderStats")) }}*/
/*                 </div>*/
/*                 <ul class="browsers">*/
/*                     <li class="icons-facebook"><a class="has-tip" target="_blank" href="https://www.facebook.com/groups/633251180052619"*/
/*                                                   title="Seguici su facebook">Seguici su facebook</a></li>*/
/*                     <li class="icons-chrome"><a class="has-tip" title="Compatibile con Chrome">Compatibile con Chrome</a>*/
/*                     </li>*/
/*                     <li class="icons-firefox"><a class="has-tip" title="Compatibile con Firefox">Compatibile con Firefox</a>*/
/*                     </li>*/
/*                     <li class="icons-safari"><a class="has-tip" title="Compatibile con Safari">Compatibile con Safari</a>*/
/*                     </li>*/
/*                     <li class="icons-explorer">*/
/*                         <a class="has-tip" title="Compatibile con Internet Explorer 9+">Compatibile con Internet Explorer*/
/*                             9+</a>*/
/*                     </li>*/
/*                     <li class="icons-opera">*/
/*                         <a class="has-tip" title="Compatibile con Opera">Compatibile con Opera</a>*/
/*                     </li>*/
/*                 </ul>*/
/*             </div>*/
/*         </div>*/
/*     </footer>*/
/* </div>*/
/* */
/* <!--[if lte IE 8]>*/
/* <div id="ie-alert">*/
/*     <p><strong>Attenzione</strong>, la tua versione di Internet Explorer <strong>non</strong> è supportata dal nostro*/
/*         sito. Per evitare di incorrere in problemi di sicurezza e visualizzazione ti consigliamo caldamente di cambiare*/
/*         browser oppure di <a*/
/*                 href="http://browsehappy.com/">aggiornalo ora</a>.</p>*/
/* </div>*/
/* <![endif]-->*/
/* */
/* {% block modals %}*/
/*     <div id="modal-assistenza" class="reveal-modal small">*/
/*         <h2>Hai bisogno di assistenza?</h2>*/
/* */
/*         <p>Scrivici a <a href="mailto:gestione@shenteon.com">gestione@shenteon.com</a> per qualsiasi necessità. Ti*/
/*             risponderemo quanto prima.</p>*/
/*         <a class="close-reveal-modal">&#215;</a>*/
/*     </div>*/
/* */
/*     <div id="modal-large" class="reveal-modal large"></div>*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/* */
/*     {% javascripts filter='?uglifyjs2'*/
/*     '@GdrSiteBundle/Resources/public/javascripts/vendor/jquery.js'*/
/*     '@GdrSiteBundle/Resources/public/javascripts/foundation/foundation.js'*/
/*     '@GdrSiteBundle/Resources/public/javascripts/foundation/foundation.reveal.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/jquery.tooltipster.min.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/vendor/jquery.nicescroll.js'*/
/*         '@GdrSiteBundle/Resources/public/javascripts/cookie-enabler.min.js'*/
/* */
/*     %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* */
/*     <script type="text/javascript">*/
/* */
/*         $(document).ready(function () {*/
/* */
/*             $(document).foundation();*/
/* */
/*             $('.has-tip').tooltipster({*/
/*                 theme: '.tooltipster-shadow'*/
/*             });*/
/* */
/*             $(".text-content").niceScroll({*/
/*                 cursoropacitymin: 0.5,*/
/*                 cursorcolor: "#30130b",*/
/*                 cursorborder: "none"*/
/*             });*/
/*         });*/
/* */
/*         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){*/
/*             (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),*/
/*                 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)*/
/*         })(window,document,'script','//www.google-analytics.com/analytics.js','ga');*/
/* */
/*         ga('create', 'UA-42641047-1', 'auto');*/
/*         ga('set', 'anonymizeIp', true);*/
/*         ga('send', 'pageview');*/
/* */
/*     </script>*/
/* */
/*     {#<script type='text/javascript'>#}*/
/*         {#var ba = document.createElement('script');#}*/
/*         {#ba.type = 'text/javascript';#}*/
/*         {#ba.async = true;#}*/
/*         {#ba.src = 'http://www.browseraggiornato.it/browser-updated.js?t=a&p=tr';#}*/
/*         {#var s = document.getElementsByTagName('script')[0];#}*/
/*         {#s.parentNode.insertBefore(ba, s);#}*/
/*     {#</script>#}*/
/* */
/*     <script>*/
/*         COOKIES_ENABLER.init({*/
/*             bannerHTML: '<p>Questo sito utilizza dei cookies per migliorare la tua esperienza di navigazione. Per maggiori informazioni <a class="ce-read-more" data-reveal-id="modal-large" data-reveal-ajax="{{ path("site_privacy") }}">clicca qui</a> <a href="#" class="ce-dismiss">X</a>',*/
/*             clickOutside: true*/
/*         });*/
/*     </script>*/
/* {% endblock %}*/
/* </body>*/
/* </html>*/
