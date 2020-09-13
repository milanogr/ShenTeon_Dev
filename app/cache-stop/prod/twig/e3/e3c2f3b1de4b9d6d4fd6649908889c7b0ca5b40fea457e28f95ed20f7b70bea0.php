<?php

/* GdrAvatarBundle:Grimory:spells.html.twig */
class __TwigTemplate_1c11136923b7304e054267303b7f08e24797aecc114b8d94d38e6e22e2a78247 extends Twig_Template
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
        echo "<tr>
    <th class=\"name\">Nome</th>
    <th class=\"description\">Descrizione</th>
    <th class=\"select\">Seleziona</th>
</tr>
";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginator"]) ? $context["paginator"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 7
            echo "    <tr class=\"spell-row\">
        <td class=\"name\">";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "name", array()), "html", null, true);
            echo "</td>
        <td class=\"description\">";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "description", array()), "html", null, true);
            echo "</td>
        <td class=\"select\">
            <input data-url=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("grimory-select", array("spellId" => $this->getAttribute($context["p"], "id", array()))), "html", null, true);
            echo "\" class=\"selectSpell\" type=\"checkbox\"
                   ";
            // line 12
            if ($this->getAttribute($context["p"], "isSelected", array())) {
                echo "checked=\"true\"";
            }
            echo ">
            ";
            // line 13
            if ($this->getAttribute($context["p"], "isLearned", array())) {
                echo "<i>(studiato)</i>";
            }
            // line 14
            echo "        </td>
    </tr>
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 17
            echo "    <tr>
        <td colspan=\"3\" class=\"text-center\"><p>Nessun incantesimo per questa categoria</p></td>
    </tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "<tr>
    <td colspan=\"3\" class=\"table-pagination\">
        ";
        // line 23
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
        echo "
    </td>
</tr>";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Grimory:spells.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 23,  73 => 21,  64 => 17,  57 => 14,  53 => 13,  47 => 12,  43 => 11,  38 => 9,  34 => 8,  31 => 7,  26 => 6,  19 => 1,);
    }
}
/* <tr>*/
/*     <th class="name">Nome</th>*/
/*     <th class="description">Descrizione</th>*/
/*     <th class="select">Seleziona</th>*/
/* </tr>*/
/* {% for p in paginator %}*/
/*     <tr class="spell-row">*/
/*         <td class="name">{{ p.name }}</td>*/
/*         <td class="description">{{ p.description }}</td>*/
/*         <td class="select">*/
/*             <input data-url="{{ url('grimory-select', {spellId: p.id}) }}" class="selectSpell" type="checkbox"*/
/*                    {% if p.isSelected %}checked="true"{% endif %}>*/
/*             {% if p.isLearned %}<i>(studiato)</i>{% endif %}*/
/*         </td>*/
/*     </tr>*/
/* {% else %}*/
/*     <tr>*/
/*         <td colspan="3" class="text-center"><p>Nessun incantesimo per questa categoria</p></td>*/
/*     </tr>*/
/* {% endfor %}*/
/* <tr>*/
/*     <td colspan="3" class="table-pagination">*/
/*         {{ knp_pagination_render(paginator) }}*/
/*     </td>*/
/* </tr>*/
