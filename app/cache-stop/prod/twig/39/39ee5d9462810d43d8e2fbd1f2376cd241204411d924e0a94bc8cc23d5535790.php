<?php

/* GdrAvatarBundle:Experience:index.html.twig */
class __TwigTemplate_b1c9a024824ed48772a7ab63805e8c2459e67dac9f77ab05f235e75b7ec30377 extends Twig_Template
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
        $context["can_edit"] = ((isset($context["is_owner"]) ? $context["is_owner"] : null) || $this->env->getExtension('security')->isGranted("ROLE_ADMIN"));
        // line 2
        echo "
<table class=\"table-experience solited\">
    <thead>
    <tr>
        <td>Data</td>
        <td>Esperienza</td>
        ";
        // line 8
        if ((isset($context["can_edit"]) ? $context["can_edit"] : null)) {
            // line 9
            echo "        <td>Invisibile</td>
        ";
        }
        // line 11
        echo "    </tr>
    </thead>
    <tbody>
    ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginator"]) ? $context["paginator"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
            // line 15
            echo "        <tr class=\"experience-row\">
            <td class=\"date\">";
            // line 16
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["e"], "createdAt", array()), "d/m/Y"), "html", null, true);
            echo "</td>
            <td class=\"experience\">";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["e"], "body", array()), "html", null, true);
            echo "</td>
            ";
            // line 18
            if ((isset($context["is_owner"]) ? $context["is_owner"] : null)) {
                // line 19
                echo "            <td class=\"edit\">
                <input data-url=\"";
                // line 20
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-experience-visibility", array("id" => $this->getAttribute($context["e"], "id", array()))), "html", null, true);
                echo "\" type=\"checkbox\" class=\"isHidden\" ";
                if ($this->getAttribute($context["e"], "isInvisible", array())) {
                    echo "checked=\"checked\"";
                }
                echo ">
            </td>
            ";
            }
            // line 23
            echo "            ";
            if (($this->env->getExtension('security')->isGranted("ROLE_ADMIN") && ((isset($context["is_owner"]) ? $context["is_owner"] : null) == false))) {
                // line 24
                echo "                <td class=\"edit\">
                    ";
                // line 25
                if ($this->getAttribute($context["e"], "isInvisibile", array())) {
                    // line 26
                    echo "                        <abbr title=\"Informazione visibile sono dagli Admin\"><i>Invisibile</i></abbr>
                    ";
                }
                // line 28
                echo "                </td>
            ";
            }
            // line 30
            echo "        </tr>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 32
            echo "        <tr>
            <td class=\"text-centered\" colspan=\"";
            // line 33
            if ((isset($context["can_edit"]) ? $context["can_edit"] : null)) {
                echo " 3 ";
            } else {
                echo " 2 ";
            }
            echo "\">
                <i>Al momento non c'è nessuna esperienza da segnalare.</i>
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "    </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Experience:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 38,  96 => 33,  93 => 32,  87 => 30,  83 => 28,  79 => 26,  77 => 25,  74 => 24,  71 => 23,  61 => 20,  58 => 19,  56 => 18,  52 => 17,  48 => 16,  45 => 15,  40 => 14,  35 => 11,  31 => 9,  29 => 8,  21 => 2,  19 => 1,);
    }
}
/* {% set can_edit = is_owner or is_granted('ROLE_ADMIN') %}*/
/* */
/* <table class="table-experience solited">*/
/*     <thead>*/
/*     <tr>*/
/*         <td>Data</td>*/
/*         <td>Esperienza</td>*/
/*         {% if can_edit %}*/
/*         <td>Invisibile</td>*/
/*         {% endif %}*/
/*     </tr>*/
/*     </thead>*/
/*     <tbody>*/
/*     {% for e in paginator %}*/
/*         <tr class="experience-row">*/
/*             <td class="date">{{ e.createdAt|date('d/m/Y') }}</td>*/
/*             <td class="experience">{{ e.body }}</td>*/
/*             {% if is_owner %}*/
/*             <td class="edit">*/
/*                 <input data-url="{{ url('avatar-experience-visibility', {id: e.id}) }}" type="checkbox" class="isHidden" {% if e.isInvisible %}checked="checked"{% endif %}>*/
/*             </td>*/
/*             {% endif %}*/
/*             {% if is_granted('ROLE_ADMIN') and (is_owner == false) %}*/
/*                 <td class="edit">*/
/*                     {% if e.isInvisibile %}*/
/*                         <abbr title="Informazione visibile sono dagli Admin"><i>Invisibile</i></abbr>*/
/*                     {% endif %}*/
/*                 </td>*/
/*             {% endif  %}*/
/*         </tr>*/
/*     {% else %}*/
/*         <tr>*/
/*             <td class="text-centered" colspan="{% if can_edit %} 3 {% else %} 2 {% endif %}">*/
/*                 <i>Al momento non c'è nessuna esperienza da segnalare.</i>*/
/*             </td>*/
/*         </tr>*/
/*     {% endfor %}*/
/*     </tbody>*/
/* </table>*/
