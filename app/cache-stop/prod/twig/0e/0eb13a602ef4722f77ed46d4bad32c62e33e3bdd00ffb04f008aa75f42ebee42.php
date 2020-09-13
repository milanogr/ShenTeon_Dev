<?php

/* GdrGameBundle:Work:index.html.twig */
class __TwigTemplate_22c8be1e09a9fa18cf03681f834bb5dc1a577831365abd6dea509a6b763f3cb5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Work:index.html.twig", 1);
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
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"works-container\">
        <h1><span>Palazzo del Lavoro</span></h1>

        <img src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/casa_lavori.jpg"), "html", null, true);
        echo "\">

        <div class=\"flash-notice\">
            ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 19
            echo "                <p class=\"text-centered\">";
            echo $context["flashMessage"];
            echo "</p>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "        </div>

        <table class=\"spaced\">
            <tr class=\"dark\">
                <th>Tipologia di impiego</th>
                <th>Posti disponibili</th>
                <th>Paga</th>
                <th>Lavora</th>
            </tr>

            ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["works"]) ? $context["works"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["work"]) {
            // line 32
            echo "                <tr>
                    <td class=\"name dark\">";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["work"], "getName", array()), "html", null, true);
            echo "</td>
                    <td class=\"available\">";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["work"], "getAvailable", array()), "html", null, true);
            echo "</td>
                    <td class=\"pay\">";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["work"], "getPay", array()), "html", null, true);
            echo "</td>
                    ";
            // line 36
            if ((isset($context["already"]) ? $context["already"] : null)) {
                // line 37
                echo "                        <td class=\"worked\">Hai già lavorato per oggi</td>
                    ";
            } elseif ($this->getAttribute(            // line 38
$context["work"], "getIsFree", array())) {
                // line 39
                echo "                        <td class=\"work\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("lavoro-scegli", array("id" => $this->getAttribute($context["work"], "getId", array()))), "html", null, true);
                echo "\" class=\"button small\">Lavora</a>
                        </td>
                    ";
            } else {
                // line 42
                echo "                        <td class=\"work\">Non disponibile</td>
                    ";
            }
            // line 44
            echo "                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['work'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "        </table>
    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Work:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 46,  126 => 44,  122 => 42,  115 => 39,  113 => 38,  110 => 37,  108 => 36,  104 => 35,  100 => 34,  96 => 33,  93 => 32,  89 => 31,  77 => 21,  68 => 19,  64 => 18,  58 => 15,  53 => 12,  50 => 11,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  11 => 1,);
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
/* {% endblock %}*/
/* */
/* {% block content %}*/
/*     <div class="works-container">*/
/*         <h1><span>Palazzo del Lavoro</span></h1>*/
/* */
/*         <img src="{{ asset('bundles/gdrgame/images/casa_lavori.jpg') }}">*/
/* */
/*         <div class="flash-notice">*/
/*             {% for flashMessage in app.session.flashbag.get('error') %}*/
/*                 <p class="text-centered">{{ flashMessage|raw }}</p>*/
/*             {% endfor %}*/
/*         </div>*/
/* */
/*         <table class="spaced">*/
/*             <tr class="dark">*/
/*                 <th>Tipologia di impiego</th>*/
/*                 <th>Posti disponibili</th>*/
/*                 <th>Paga</th>*/
/*                 <th>Lavora</th>*/
/*             </tr>*/
/* */
/*             {% for work in works %}*/
/*                 <tr>*/
/*                     <td class="name dark">{{ work.getName }}</td>*/
/*                     <td class="available">{{ work.getAvailable }}</td>*/
/*                     <td class="pay">{{ work.getPay }}</td>*/
/*                     {% if (already) %}*/
/*                         <td class="worked">Hai già lavorato per oggi</td>*/
/*                     {% elseif(work.getIsFree) %}*/
/*                         <td class="work"><a href="{{ path("lavoro-scegli", {"id": work.getId}) }}" class="button small">Lavora</a>*/
/*                         </td>*/
/*                     {% else %}*/
/*                         <td class="work">Non disponibile</td>*/
/*                     {% endif %}*/
/*                 </tr>*/
/*             {% endfor %}*/
/*         </table>*/
/*     </div>*/
/* {% endblock %}*/
