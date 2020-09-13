<?php

/* GdrGameBundle:Location:map.html.twig */
class __TwigTemplate_888e41a6fbd2061582e5046613ae35afdb04b517222852f50620ca9c7e823a90 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Location:map.html.twig", 1);
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

    // line 8
    public function block_javascripts($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    ";
        // line 11
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d24dcb4_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d24dcb4_0") : $this->env->getExtension('asset')->getAssetUrl("js/d24dcb4_location_1.js");
            // line 13
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "d24dcb4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d24dcb4") : $this->env->getExtension('asset')->getAssetUrl("js/d24dcb4.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    // line 17
    public function block_content($context, array $blocks = array())
    {
        // line 18
        echo "    <div class=\"general-maps\">
        <h2><span>Mappa testuale rapida</span></h2>
        <div class=\"locations-div\">
            <form method=\"POST\">
                <select id=\"fast-locations\">
                    <option>Seleziona una chat:</option>
                    ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["locations"]) ? $context["locations"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["location"]) {
            // line 25
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["location"], "id", array()), "html", null, true);
            echo "\">
                            ";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["location"], "name", array()), "html", null, true);
            echo " ";
            if ($this->getAttribute($context["location"], "requireKey", array())) {
                echo "[Richiede una chiave]";
            }
            // line 27
            echo "                        </option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['location'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "                </select>
                <button type=\"submit\">VAI!</button>
            </form>
        </div>

        <h2><span>Mappa di Teon</span></h2>
        <span><i>(click sull'immagine per ingrandire)</i></span>

        ";
        // line 37
        if ((isset($context["isDay"]) ? $context["isDay"] : null)) {
            // line 38
            echo "            ";
            $context["extra"] = "";
            // line 39
            echo "        ";
        } else {
            // line 40
            echo "            ";
            $context["extra"] = "_night";
            // line 41
            echo "        ";
        }
        // line 42
        echo "
        <div class=\"map-div\">
            <a href=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("change_location", array("id" => $this->getAttribute((isset($context["teon"]) ? $context["teon"] : null), "id", array()))), "html", null, true);
        echo "\">
                <img title=\"Vai alla mappa di Teon\" class=\"gdrtooltip\"
                     src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl((("bundles/gdrgame/images/mappe/mappa_mini_teon" . (isset($context["extra"]) ? $context["extra"] : null)) . ".jpg")), "html", null, true);
        echo "\">
            </a>
        </div>

        <h2><span>Mappa di Teon Sotterranea</span></h2>
        <span><i>(click sull'immagine per ingrandire)</i></span>

        <div class=\"map-div\">
            <a href=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("change_location", array("id" => $this->getAttribute((isset($context["teonUnder"]) ? $context["teonUnder"] : null), "id", array()))), "html", null, true);
        echo "\">
                <img title=\"Vai alla mappa sotterranea di Teon\" class=\"gdrtooltip\"
                     src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/mappe/mappa_mini_sotterranei.jpg"), "html", null, true);
        echo "\">
            </a>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Location:map.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 56,  146 => 54,  135 => 46,  130 => 44,  126 => 42,  123 => 41,  120 => 40,  117 => 39,  114 => 38,  112 => 37,  102 => 29,  95 => 27,  89 => 26,  84 => 25,  80 => 24,  72 => 18,  69 => 17,  53 => 13,  49 => 11,  43 => 9,  40 => 8,  33 => 4,  30 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Default:innerContent.html.twig' %}*/
/* */
/* {% block goBack %}*/
/*     {{ render(controller('GdrGameBundle:Location:renderGoBack')) }}*/
/* {% endblock %}*/
/* */
/* */
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/* */
/*     {% javascripts filter='?uglifyjs2'*/
/*     '@GdrGameBundle/Resources/public/javascripts/location.js' %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/*     <div class="general-maps">*/
/*         <h2><span>Mappa testuale rapida</span></h2>*/
/*         <div class="locations-div">*/
/*             <form method="POST">*/
/*                 <select id="fast-locations">*/
/*                     <option>Seleziona una chat:</option>*/
/*                     {% for location in locations %}*/
/*                         <option value="{{ location.id }}">*/
/*                             {{ location.name }} {% if location.requireKey %}[Richiede una chiave]{% endif %}*/
/*                         </option>*/
/*                     {% endfor %}*/
/*                 </select>*/
/*                 <button type="submit">VAI!</button>*/
/*             </form>*/
/*         </div>*/
/* */
/*         <h2><span>Mappa di Teon</span></h2>*/
/*         <span><i>(click sull'immagine per ingrandire)</i></span>*/
/* */
/*         {% if isDay %}*/
/*             {% set extra = '' %}*/
/*         {% else %}*/
/*             {% set extra = '_night' %}*/
/*         {% endif %}*/
/* */
/*         <div class="map-div">*/
/*             <a href="{{ path('change_location', {id: teon.id}) }}">*/
/*                 <img title="Vai alla mappa di Teon" class="gdrtooltip"*/
/*                      src="{{ asset('bundles/gdrgame/images/mappe/mappa_mini_teon' ~ extra ~ '.jpg') }}">*/
/*             </a>*/
/*         </div>*/
/* */
/*         <h2><span>Mappa di Teon Sotterranea</span></h2>*/
/*         <span><i>(click sull'immagine per ingrandire)</i></span>*/
/* */
/*         <div class="map-div">*/
/*             <a href="{{ path('change_location', {id: teonUnder.id}) }}">*/
/*                 <img title="Vai alla mappa sotterranea di Teon" class="gdrtooltip"*/
/*                      src="{{ asset('bundles/gdrgame/images/mappe/mappa_mini_sotterranei.jpg') }}">*/
/*             </a>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
