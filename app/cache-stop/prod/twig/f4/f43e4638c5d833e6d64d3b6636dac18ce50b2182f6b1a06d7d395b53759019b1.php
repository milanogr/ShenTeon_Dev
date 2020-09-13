<?php

/* GdrGameBundle:Erario:list.html.twig */
class __TwigTemplate_b7c10a0cc3afe38397c8fe81a1583b3a40cf849b657a68c9cc8a0daf1a2dc7fd extends Twig_Template
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
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
        echo "

<table class=\"erario\">
    <thead>
    <tr>
        <th>Immobile ed ubicazione</th>
        <th>Descrizione</th>
        ";
        // line 8
        if (((isset($context["currentType"]) ? $context["currentType"] : null) == 1)) {
            // line 9
            echo "            <th>Massimo abitanti</th>
        ";
        }
        // line 11
        echo "            <th>Spesa mensile</th>
        <th>Prezzo</th>
        <th>Acquista</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginator"]) ? $context["paginator"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
            // line 18
            echo "        <tr>
            <td class=\"immobile\">
                ";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "name", array()), "html", null, true);
            echo "
                <img src=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($context["property"], "image"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "name", array()), "html", null, true);
            echo "\">
            </td>
            <td>";
            // line 23
            echo $this->getAttribute($context["property"], "description", array());
            echo "</td>
            ";
            // line 24
            if (((isset($context["currentType"]) ? $context["currentType"] : null) == 1)) {
                // line 25
                echo "                <td class=\"max-people\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "maxPeople", array()), "html", null, true);
                echo "</td>
            ";
            }
            // line 27
            echo "            <td class=\"rendita\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "tax", array()), "html", null, true);
            echo "</td>
            <td class=\"price\">";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "price", array()), "html", null, true);
            echo "</td>
            <td class=\"buy\">
                <button class=\"button\" data-href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("erario-buy", array("id" => $this->getAttribute($context["property"], "id", array()))), "html", null, true);
            echo "\">Compra</button>
            </td>
        </tr>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 34
            echo "        <td colspan=\"5\" class=\"text-centered\">Al momento non ci sono immobili in vendita</td>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "    </tbody>
</table>

";
        // line 39
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Erario:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 39,  101 => 36,  94 => 34,  85 => 30,  80 => 28,  75 => 27,  69 => 25,  67 => 24,  63 => 23,  56 => 21,  52 => 20,  48 => 18,  43 => 17,  35 => 11,  31 => 9,  29 => 8,  19 => 1,);
    }
}
/* {{ knp_pagination_render(paginator) }}*/
/* */
/* <table class="erario">*/
/*     <thead>*/
/*     <tr>*/
/*         <th>Immobile ed ubicazione</th>*/
/*         <th>Descrizione</th>*/
/*         {% if currentType == 1 %}*/
/*             <th>Massimo abitanti</th>*/
/*         {% endif %}*/
/*             <th>Spesa mensile</th>*/
/*         <th>Prezzo</th>*/
/*         <th>Acquista</th>*/
/*     </tr>*/
/*     </thead>*/
/*     <tbody>*/
/*     {% for property in paginator %}*/
/*         <tr>*/
/*             <td class="immobile">*/
/*                 {{ property.name }}*/
/*                 <img src="{{ vich_uploader_asset(property, 'image') }}" alt="{{ property.name }}">*/
/*             </td>*/
/*             <td>{{ property.description | raw }}</td>*/
/*             {% if currentType == 1 %}*/
/*                 <td class="max-people">{{ property.maxPeople }}</td>*/
/*             {% endif %}*/
/*             <td class="rendita">{{ property.tax }}</td>*/
/*             <td class="price">{{ property.price }}</td>*/
/*             <td class="buy">*/
/*                 <button class="button" data-href="{{ path('erario-buy', {id: property.id}) }}">Compra</button>*/
/*             </td>*/
/*         </tr>*/
/*     {% else %}*/
/*         <td colspan="5" class="text-centered">Al momento non ci sono immobili in vendita</td>*/
/*     {% endfor %}*/
/*     </tbody>*/
/* </table>*/
/* */
/* {{ knp_pagination_render(paginator) }}*/
