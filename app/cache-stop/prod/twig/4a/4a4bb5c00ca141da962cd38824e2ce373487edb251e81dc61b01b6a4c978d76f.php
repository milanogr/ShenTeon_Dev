<?php

/* GdrGameBundle:Chat:onlines.html.twig */
class __TwigTemplate_450944a11f3377287bf4136379052b9eea9538c5bb9ec6d0bea1d0ab1b190e7f extends Twig_Template
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
        echo "<table id=\"chat-online\">
    <thead>
    <tr>
        <th class=\"count\">Nr.</th>
        <th class=\"pg\">Personaggio</th>
        <th class=\"type\">Tipo PG</th>
        <th class=\"dress\">Vestito</th>
        <th class=\"inGame\">In gioco</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 12
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
            // line 13
            echo "        <tr>
            <td class=\"count\">";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "length", array()), "html", null, true);
            echo "</td>
            <td class=\"pg\">
                ";
            // line 16
            if (($this->getAttribute($context["online"], "gender", array()) == 1)) {
                // line 17
                echo "                    <img title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["online"], "race", array()), "html", null, true);
                echo "\" src=\"";
                echo twig_escape_filter($this->env, (isset($context["path_race"]) ? $context["path_race"] : null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["online"], "maleIcon", array()), "html", null, true);
                echo "\">
                ";
            } else {
                // line 19
                echo "                    <img title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["online"], "race", array()), "html", null, true);
                echo "\" src=\"";
                echo twig_escape_filter($this->env, (isset($context["path_race"]) ? $context["path_race"] : null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["online"], "femaleIcon", array()), "html", null, true);
                echo "\">
                ";
            }
            // line 21
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-index", array("name" => $this->getAttribute($context["online"], "name", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["online"], "name", array()), "html", null, true);
            echo "</a>
            </td>
            <td class=\"type\">
                ";
            // line 24
            if ($this->getAttribute($context["online"], "isGestore", array())) {
                // line 25
                echo "                    <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/online/gestore.png"), "html", null, true);
                echo "\" title=\"Gestore\" class=\"gdrtooltip\">
                ";
            }
            // line 27
            echo "                ";
            if ($this->getAttribute($context["online"], "isModeratore", array())) {
                // line 28
                echo "                    <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/online/moderatore.png"), "html", null, true);
                echo "\" title=\"Moderatore\" class=\"gdrtooltip\">
                ";
            }
            // line 30
            echo "                ";
            if ($this->getAttribute($context["online"], "isGuida", array())) {
                // line 31
                echo "                    <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/online/guida.png"), "html", null, true);
                echo "\" title=\"Informatore\" class=\"gdrtooltip\">
                ";
            }
            // line 33
            echo "            </td>
            <td class=\"dress\">
                ";
            // line 35
            if ($this->getAttribute($context["online"], "isDead", array())) {
                // line 36
                echo "                    <span>(anima)</span>
                ";
            } else {
                // line 38
                echo "                    <img class=\"gdrtooltip\" src=\"";
                echo twig_escape_filter($this->env, (isset($context["path_item"]) ? $context["path_item"] : null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["online"], "itemImage", array()), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["online"], "item", array()), "html", null, true);
                echo "\">
                ";
            }
            // line 40
            echo "            </td>
            <td class=\"inGame\">
                ";
            // line 42
            if ($this->getAttribute($context["online"], "isInGame", array())) {
                echo "Sì";
            } else {
                echo "No";
            }
            // line 43
            echo "            </td>
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
        // line 46
        echo "    </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Chat:onlines.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 46,  146 => 43,  140 => 42,  136 => 40,  126 => 38,  122 => 36,  120 => 35,  116 => 33,  110 => 31,  107 => 30,  101 => 28,  98 => 27,  92 => 25,  90 => 24,  81 => 21,  71 => 19,  61 => 17,  59 => 16,  52 => 14,  49 => 13,  32 => 12,  19 => 1,);
    }
}
/* <table id="chat-online">*/
/*     <thead>*/
/*     <tr>*/
/*         <th class="count">Nr.</th>*/
/*         <th class="pg">Personaggio</th>*/
/*         <th class="type">Tipo PG</th>*/
/*         <th class="dress">Vestito</th>*/
/*         <th class="inGame">In gioco</th>*/
/*     </tr>*/
/*     </thead>*/
/*     <tbody>*/
/*     {% for online in onlines %}*/
/*         <tr>*/
/*             <td class="count">{{ loop.index }}/{{ loop.length }}</td>*/
/*             <td class="pg">*/
/*                 {% if online.gender == 1 %}*/
/*                     <img title="{{ online.race }}" src="{{ path_race }}/{{ online.maleIcon }}">*/
/*                 {% else %}*/
/*                     <img title="{{ online.race }}" src="{{ path_race }}/{{ online.femaleIcon }}">*/
/*                 {% endif %}*/
/*                 <a href="{{ url('avatar-index', {name: online.name}) }}">{{ online.name }}</a>*/
/*             </td>*/
/*             <td class="type">*/
/*                 {% if online.isGestore %}*/
/*                     <img src="{{ asset('bundles/gdrgame/images/online/gestore.png') }}" title="Gestore" class="gdrtooltip">*/
/*                 {% endif %}*/
/*                 {% if online.isModeratore %}*/
/*                     <img src="{{ asset('bundles/gdrgame/images/online/moderatore.png') }}" title="Moderatore" class="gdrtooltip">*/
/*                 {% endif %}*/
/*                 {% if online.isGuida %}*/
/*                     <img src="{{ asset('bundles/gdrgame/images/online/guida.png') }}" title="Informatore" class="gdrtooltip">*/
/*                 {% endif %}*/
/*             </td>*/
/*             <td class="dress">*/
/*                 {% if online.isDead %}*/
/*                     <span>(anima)</span>*/
/*                 {% else %}*/
/*                     <img class="gdrtooltip" src="{{ path_item }}/{{ online.itemImage }}" title="{{ online.item }}">*/
/*                 {% endif %}*/
/*             </td>*/
/*             <td class="inGame">*/
/*                 {% if online.isInGame %}Sì{% else %}No{% endif %}*/
/*             </td>*/
/*         </tr>*/
/*     {% endfor %}*/
/*     </tbody>*/
/* </table>*/
