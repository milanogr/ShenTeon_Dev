<?php

/* GdrGameBundle:Admin:chooseLocation.html.twig */
class __TwigTemplate_f997a530d70c88a4dda91b8b64f23af26864c581e0b0c3b33c03f1ccf1886b77 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Admin:chooseLocation.html.twig", 1);
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
            // asset "54dd62e_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_54dd62e_0") : $this->env->getExtension('asset')->getAssetUrl("js/54dd62e_jquery-ui-1.10.3.custom.min_1.js");
            // line 13
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "54dd62e_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_54dd62e_1") : $this->env->getExtension('asset')->getAssetUrl("js/54dd62e_admin-location_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "54dd62e"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_54dd62e") : $this->env->getExtension('asset')->getAssetUrl("js/54dd62e.js");
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
        echo "
    <div class=\"page-admin\">

        <h2><span>Admin - Modifica posizione sulla mappa</span></h2>

        <div class=\"centered-form\">
            <label>Scegli la location da modificare</label>
            <form id=\"choose-admin-location\">
                <select id=\"locations\">
                    <option>Scegli:</option>
                    ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["locations"]) ? $context["locations"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["loc"]) {
            // line 29
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("g-select-location", array("id" => $this->getAttribute($context["loc"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loc"], "name", array()), "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['loc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "                </select>
                <button class=\"button\" type=\"submit\">Mostra la posizione</button>
            </form>
        </div>

        <hr>

        <div id=\"inject-map-ajax\">

        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Admin:chooseLocation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 31,  94 => 29,  90 => 28,  78 => 18,  75 => 17,  53 => 13,  49 => 10,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  11 => 1,);
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
/*     '@GdrGameBundle/Resources/public/javascripts/admin-location.js' %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     <div class="page-admin">*/
/* */
/*         <h2><span>Admin - Modifica posizione sulla mappa</span></h2>*/
/* */
/*         <div class="centered-form">*/
/*             <label>Scegli la location da modificare</label>*/
/*             <form id="choose-admin-location">*/
/*                 <select id="locations">*/
/*                     <option>Scegli:</option>*/
/*                     {% for loc in locations %}*/
/*                         <option value="{{ path('g-select-location', {id: loc.id}) }}">{{ loc.name }}</option>*/
/*                     {% endfor %}*/
/*                 </select>*/
/*                 <button class="button" type="submit">Mostra la posizione</button>*/
/*             </form>*/
/*         </div>*/
/* */
/*         <hr>*/
/* */
/*         <div id="inject-map-ajax">*/
/* */
/*         </div>*/
/*     </div>*/
/* */
/* {% endblock %}*/
