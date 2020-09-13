<?php

/* @GdrGame/Anagrafe/list.html.twig */
class __TwigTemplate_32a24c961e5248020acd165e97d3be421d819e8943d8ac9b99ad27aa99309540 extends Twig_Template
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
        echo "<table id=\"table-online\" class=\"spaced alternate\">
    <thead>
    <tr>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Nome Esteso</th>
        <th>A Teon dal</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["personages"]) ? $context["personages"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["personage"]) {
            // line 12
            echo "        <tr>
            <td>
                <strong>
                    <a href=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-index", array("name" => $this->getAttribute($this->getAttribute($context["personage"], 0, array()), "name", array()))), "html", null, true);
            echo "\">
                    ";
            // line 16
            if (($this->getAttribute($this->getAttribute($context["personage"], 0, array()), "gender", array()) == 1)) {
                // line 17
                echo "                        <img title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["personage"], 0, array()), "race", array()), "name", array()), "html", null, true);
                echo "\" src=\"";
                echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute($context["personage"], "raceMaleIcon", array())), "html", null, true);
                echo "\">
                    ";
            } else {
                // line 19
                echo "                        <img title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["personage"], 0, array()), "race", array()), "name", array()), "html", null, true);
                echo "\" src=\"";
                echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute($context["personage"], "raceFemaleIcon", array())), "html", null, true);
                echo "\">
                    ";
            }
            // line 21
            echo "                    </a>
                    ";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["personage"], 0, array()), "name", array()), "html", null, true);
            echo "
                </strong>
            </td>
            <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["personage"], "surname", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["personage"], 0, array()), "nameExtended", array()), "html", null, true);
            echo "</td>
            <td>
                ";
            // line 28
            if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["personage"], 0, array()), "createdAt", array()), "Y") >= "2013")) {
                // line 29
                echo "                    ";
                echo twig_escape_filter($this->env, $this->env->getExtension('teon_date_extension')->teonDateFilter(twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["personage"], 0, array()), "createdAt", array()), "d/m/Y"), true), "html", null, true);
                echo "
                ";
            } else {
                // line 31
                echo "                    Antico Teoniano
                ";
            }
            // line 33
            echo "            </td>
        </tr>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 36
            echo "        <tr>
            <td colspan=\"4\" class=\"text-centered\">
                La lista, al momento, è vuota
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['personage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "@GdrGame/Anagrafe/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 42,  100 => 36,  93 => 33,  89 => 31,  83 => 29,  81 => 28,  76 => 26,  72 => 25,  66 => 22,  63 => 21,  55 => 19,  47 => 17,  45 => 16,  41 => 15,  36 => 12,  31 => 11,  19 => 1,);
    }
}
/* <table id="table-online" class="spaced alternate">*/
/*     <thead>*/
/*     <tr>*/
/*         <th>Nome</th>*/
/*         <th>Cognome</th>*/
/*         <th>Nome Esteso</th>*/
/*         <th>A Teon dal</th>*/
/*     </tr>*/
/*     </thead>*/
/*     <tbody>*/
/*     {% for personage in personages %}*/
/*         <tr>*/
/*             <td>*/
/*                 <strong>*/
/*                     <a href="{{ url('avatar-index', {name: personage.0.name}) }}">*/
/*                     {% if personage.0.gender == 1 %}*/
/*                         <img title="{{ personage.0.race.name }}" src="{{ uploadPath('race') ~ personage.raceMaleIcon }}">*/
/*                     {% else %}*/
/*                         <img title="{{ personage.0.race.name }}" src="{{ uploadPath('race') ~ personage.raceFemaleIcon }}">*/
/*                     {% endif %}*/
/*                     </a>*/
/*                     {{ personage.0.name }}*/
/*                 </strong>*/
/*             </td>*/
/*             <td>{{ personage.surname }}</td>*/
/*             <td>{{ personage.0.nameExtended }}</td>*/
/*             <td>*/
/*                 {% if personage.0.createdAt|date('Y') >= '2013' %}*/
/*                     {{ personage.0.createdAt|date('d/m/Y')|teon_date(true) }}*/
/*                 {% else %}*/
/*                     Antico Teoniano*/
/*                 {% endif %}*/
/*             </td>*/
/*         </tr>*/
/*     {% else %}*/
/*         <tr>*/
/*             <td colspan="4" class="text-centered">*/
/*                 La lista, al momento, è vuota*/
/*             </td>*/
/*         </tr>*/
/*     {% endfor %}*/
/*     </tbody>*/
/* </table>*/
/* */
