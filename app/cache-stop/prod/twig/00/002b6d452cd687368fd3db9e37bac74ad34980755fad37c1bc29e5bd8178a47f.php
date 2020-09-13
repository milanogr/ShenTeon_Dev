<?php

/* @GdrGame/Online/list.html.twig */
class __TwigTemplate_33933e390aba7fc4915f9db41a35d7c2a4795f3ab20f9d2d99940d58bda0a7e8 extends Twig_Template
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
        echo "<table id=\"table-online\" class=\"solited\">
    <thead>
    <tr>
        <th>Nr.</th>
        <th>Nome</th>
        <th>Posizione</th>
        <th>In Gioco</th>
        <th>Tipo PG</th>
        <th>Status</th>
        <th class=\"text-centered\" >Scrivi</th>
        <th class=\"text-centered\">Raggiungi</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["onlines"]) ? $context["onlines"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["online"]) {
            // line 16
            echo "        <tr>
            <td class=\"nr\">
                ";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "length", array()), "html", null, true);
            echo "
            </td>
            <td class=\"pg\">
                ";
            // line 21
            if (($this->getAttribute($context["online"], "pgGender", array()) == 1)) {
                // line 22
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => $this->getAttribute($context["online"], "pgName", array()))), "html", null, true);
                echo "\">
                        <img src=\"";
                // line 23
                echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute($context["online"], "raceMaleIcon", array())), "html", null, true);
                echo "\">
                    </a>
                ";
            } else {
                // line 26
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => $this->getAttribute($context["online"], "pgName", array()))), "html", null, true);
                echo "\">
                        <img src=\"";
                // line 27
                echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute($context["online"], "raceFemaleIcon", array())), "html", null, true);
                echo "\">
                    </a>
                ";
            }
            // line 30
            echo "                ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["online"], "pgName", array()), "html", null, true);
            if ($this->getAttribute($context["online"], "isDead", array())) {
                echo " (Anima)";
            }
            // line 31
            echo "            </td>
            <td class=\"location\">
                ";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["online"], "locName", array()), "html", null, true);
            echo "
            </td>
            <td style=\"width: 65px; text-align: center\">
                ";
            // line 36
            if ($this->getAttribute($context["online"], "isInGame", array())) {
                echo " Sì ";
            } else {
                echo " - ";
            }
            // line 37
            echo "            </td>
            <td class=\"type\">
                ";
            // line 39
            if ($this->getAttribute($context["online"], "isGestore", array())) {
                // line 40
                echo "                    <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/online/gestore.png"), "html", null, true);
                echo "\" title=\"Gestore\" class=\"gdrtooltip\">
                ";
            }
            // line 42
            echo "                ";
            if ($this->getAttribute($context["online"], "isModeratore", array())) {
                // line 43
                echo "                    <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/online/moderatore.png"), "html", null, true);
                echo "\" title=\"Moderatore\" class=\"gdrtooltip\">
                ";
            }
            // line 45
            echo "                ";
            if ($this->getAttribute($context["online"], "isGuida", array())) {
                // line 46
                echo "                    <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/online/guida.png"), "html", null, true);
                echo "\" title=\"Guida\" class=\"gdrtooltip\">
                ";
            }
            // line 48
            echo "            </td>
            <td class=\"status\">
                ";
            // line 50
            if (($this->getAttribute($context["online"], "status", array()) == 1)) {
                // line 51
                echo "                    <img class=\"gdrtooltip\" title=\"Disponibile al gioco\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/online/disponibile.png"), "html", null, true);
                echo "\">
                ";
            } elseif (($this->getAttribute(            // line 52
$context["online"], "status", array()) == 2)) {
                // line 53
                echo "                    <img class=\"gdrtooltip\" title=\"Sto giocando\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/online/giocando.png"), "html", null, true);
                echo "\">
                ";
            } else {
                // line 55
                echo "                    <img class=\"gdrtooltip\" title=\"Occupato\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/online/occupato.png"), "html", null, true);
                echo "\">
                ";
            }
            // line 57
            echo "            </td>
            <td class=\"scrivi\" style=\"width: 60px\">
                <a class=\"button small\" href=\"";
            // line 59
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("missive-create", array("isForGroup" => 0, "destinatario" => $this->getAttribute($context["online"], "pgName", array()))), "html", null, true);
            echo "\">SCRIVI</a>
            </td>
            <td class=\"vai\" style=\"width: 60px\">
                <a class=\"button small\" href=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("change_location", array("id" => $this->getAttribute($context["online"], "locId", array()))), "html", null, true);
            echo "\">VAI</a>
            </td>
        </tr>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['online'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "@GdrGame/Online/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 66,  175 => 62,  169 => 59,  165 => 57,  159 => 55,  153 => 53,  151 => 52,  146 => 51,  144 => 50,  140 => 48,  134 => 46,  131 => 45,  125 => 43,  122 => 42,  116 => 40,  114 => 39,  110 => 37,  104 => 36,  98 => 33,  94 => 31,  88 => 30,  82 => 27,  77 => 26,  71 => 23,  66 => 22,  64 => 21,  56 => 18,  52 => 16,  35 => 15,  19 => 1,);
    }
}
/* <table id="table-online" class="solited">*/
/*     <thead>*/
/*     <tr>*/
/*         <th>Nr.</th>*/
/*         <th>Nome</th>*/
/*         <th>Posizione</th>*/
/*         <th>In Gioco</th>*/
/*         <th>Tipo PG</th>*/
/*         <th>Status</th>*/
/*         <th class="text-centered" >Scrivi</th>*/
/*         <th class="text-centered">Raggiungi</th>*/
/*     </tr>*/
/*     </thead>*/
/*     <tbody>*/
/*     {% for online in onlines %}*/
/*         <tr>*/
/*             <td class="nr">*/
/*                 {{ loop.index }}/{{ loop.length }}*/
/*             </td>*/
/*             <td class="pg">*/
/*                 {% if online.pgGender == 1 %}*/
/*                     <a href="{{ path('avatar-index', {name: online.pgName}) }}">*/
/*                         <img src="{{ uploadPath('race') ~ online.raceMaleIcon }}">*/
/*                     </a>*/
/*                 {% else %}*/
/*                     <a href="{{ path('avatar-index', {name: online.pgName}) }}">*/
/*                         <img src="{{ uploadPath('race') ~ online.raceFemaleIcon }}">*/
/*                     </a>*/
/*                 {% endif %}*/
/*                 {{ online.pgName }}{% if online.isDead %} (Anima){% endif %}*/
/*             </td>*/
/*             <td class="location">*/
/*                 {{ online.locName }}*/
/*             </td>*/
/*             <td style="width: 65px; text-align: center">*/
/*                 {% if online.isInGame %} Sì {% else %} - {% endif %}*/
/*             </td>*/
/*             <td class="type">*/
/*                 {% if online.isGestore %}*/
/*                     <img src="{{ asset('bundles/gdrgame/images/online/gestore.png') }}" title="Gestore" class="gdrtooltip">*/
/*                 {% endif %}*/
/*                 {% if online.isModeratore %}*/
/*                     <img src="{{ asset('bundles/gdrgame/images/online/moderatore.png') }}" title="Moderatore" class="gdrtooltip">*/
/*                 {% endif %}*/
/*                 {% if online.isGuida %}*/
/*                     <img src="{{ asset('bundles/gdrgame/images/online/guida.png') }}" title="Guida" class="gdrtooltip">*/
/*                 {% endif %}*/
/*             </td>*/
/*             <td class="status">*/
/*                 {% if online.status == 1 %}*/
/*                     <img class="gdrtooltip" title="Disponibile al gioco" src="{{ asset('bundles/gdrgame/images/online/disponibile.png') }}">*/
/*                 {% elseif online.status == 2 %}*/
/*                     <img class="gdrtooltip" title="Sto giocando" src="{{ asset('bundles/gdrgame/images/online/giocando.png') }}">*/
/*                 {% else %}*/
/*                     <img class="gdrtooltip" title="Occupato" src="{{ asset('bundles/gdrgame/images/online/occupato.png') }}">*/
/*                 {% endif %}*/
/*             </td>*/
/*             <td class="scrivi" style="width: 60px">*/
/*                 <a class="button small" href="{{ path('missive-create', {isForGroup:0, destinatario: online.pgName}) }}">SCRIVI</a>*/
/*             </td>*/
/*             <td class="vai" style="width: 60px">*/
/*                 <a class="button small" href="{{ path('change_location', {id: online.locId}) }}">VAI</a>*/
/*             </td>*/
/*         </tr>*/
/*     {% endfor %}*/
/*     </tbody>*/
/* </table>*/
/* */
