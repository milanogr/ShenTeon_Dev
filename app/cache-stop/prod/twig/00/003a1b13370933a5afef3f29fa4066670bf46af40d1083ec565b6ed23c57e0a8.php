<?php

/* GdrGameBundle:Market:listItems.html.twig */
class __TwigTemplate_7c00bdb61f5c3001c190315940e6bdd0902f07c9d3092887b958e066363cd257 extends Twig_Template
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
        echo "<hr>
<a class=\"button right\" href=\"";
        // line 2
        echo $this->env->getExtension('routing')->getPath("market");
        echo "\">Torna al Mercato</a>
<table class=\"market-item\">
    <thead>
    <tr>
        <th>Oggetto</th>
        <th>Descrizione</th>
        <th>Qtà</th>
        <th>Peso</th>
        <th>Prezzo</th>
        <th>Acquista</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginator"]) ? $context["paginator"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 16
            echo "        <tr id=\"item-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
            echo "\">
            <td class=\"item-preview\">
                <figure>
                    <figcaption class=\"item-name\">";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "</figcaption>
                    <img src=\"";
            // line 20
            echo twig_escape_filter($this->env, (isset($context["upload_path"]) ? $context["upload_path"] : null), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "imageName", array()), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "\">
                    <span class=\"hide item-id\">";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
            echo "</span>
                </figure>
                ";
            // line 23
            if ($this->getAttribute($context["item"], "dressIconImageName", array())) {
                // line 24
                echo "                    <img class=\"dressIcon\" src=\"";
                echo twig_escape_filter($this->env, (isset($context["upload_path"]) ? $context["upload_path"] : null), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "dressIconImageName", array()), "html", null, true);
                echo "\" title=\"Simbolo\">
                ";
            }
            // line 26
            echo "            </td>
            <td>
                ";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "shortDescription", array()), "html", null, true);
            echo "
                ";
            // line 29
            if ($this->getAttribute($context["item"], "showActiveDescription", array())) {
                // line 30
                echo "                    <p class=\"active-description\">
                        <strong>Effetto:</strong> ";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "activeDescription", array()), "html", null, true);
                echo "
                    </p>
                ";
            }
            // line 34
            echo "            </td>
            <td class=\"item-quantity\">";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "quantity", array()), "html", null, true);
            echo "</td>
            <td class=\"item-weight\">";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "weight", array()), "html", null, true);
            echo "</td>
            <td class=\"item-price\">";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "price", array()), "html", null, true);
            echo "</td>
            <td class=\"item-buy\">
                <form data-item=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
            echo "\">
                    <input value=\"0\" class=\"buy-quantity\" type=\"text\" placeholder=\"Quantità\" pattern=\"\\d*\">
                    <button type=\"submit\">Acquista</button>
                </form>
            </td>
        </tr>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 46
            echo "        <tr>
            <td colspan=\"6\" class=\"text-center\">Al momento non ci sono oggetti in vendita per questa categoria.</td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "    </tbody>
</table>
<a class=\"button right\" href=\"";
        // line 52
        echo $this->env->getExtension('routing')->getPath("market");
        echo "\">Torna al Mercato</a>
";
        // line 53
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Market:listItems.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 53,  135 => 52,  131 => 50,  122 => 46,  110 => 39,  105 => 37,  101 => 36,  97 => 35,  94 => 34,  88 => 31,  85 => 30,  83 => 29,  79 => 28,  75 => 26,  68 => 24,  66 => 23,  61 => 21,  54 => 20,  50 => 19,  43 => 16,  38 => 15,  22 => 2,  19 => 1,);
    }
}
/* <hr>*/
/* <a class="button right" href="{{ path('market') }}">Torna al Mercato</a>*/
/* <table class="market-item">*/
/*     <thead>*/
/*     <tr>*/
/*         <th>Oggetto</th>*/
/*         <th>Descrizione</th>*/
/*         <th>Qtà</th>*/
/*         <th>Peso</th>*/
/*         <th>Prezzo</th>*/
/*         <th>Acquista</th>*/
/*     </tr>*/
/*     </thead>*/
/*     <tbody>*/
/*     {% for item in paginator %}*/
/*         <tr id="item-{{ item.id }}">*/
/*             <td class="item-preview">*/
/*                 <figure>*/
/*                     <figcaption class="item-name">{{ item.name }}</figcaption>*/
/*                     <img src="{{ upload_path }}{{ item.imageName }}" title="{{ item.name }}">*/
/*                     <span class="hide item-id">{{ item.id }}</span>*/
/*                 </figure>*/
/*                 {% if item.dressIconImageName %}*/
/*                     <img class="dressIcon" src="{{ upload_path }}{{ item.dressIconImageName }}" title="Simbolo">*/
/*                 {% endif %}*/
/*             </td>*/
/*             <td>*/
/*                 {{ item.shortDescription }}*/
/*                 {% if item.showActiveDescription %}*/
/*                     <p class="active-description">*/
/*                         <strong>Effetto:</strong> {{ item.activeDescription }}*/
/*                     </p>*/
/*                 {% endif %}*/
/*             </td>*/
/*             <td class="item-quantity">{{ item.quantity }}</td>*/
/*             <td class="item-weight">{{ item.weight }}</td>*/
/*             <td class="item-price">{{ item.price }}</td>*/
/*             <td class="item-buy">*/
/*                 <form data-item="{{ item.id }}">*/
/*                     <input value="0" class="buy-quantity" type="text" placeholder="Quantità" pattern="\d*">*/
/*                     <button type="submit">Acquista</button>*/
/*                 </form>*/
/*             </td>*/
/*         </tr>*/
/*     {% else %}*/
/*         <tr>*/
/*             <td colspan="6" class="text-center">Al momento non ci sono oggetti in vendita per questa categoria.</td>*/
/*         </tr>*/
/*     {% endfor %}*/
/*     </tbody>*/
/* </table>*/
/* <a class="button right" href="{{ path('market') }}">Torna al Mercato</a>*/
/* {{ knp_pagination_render(paginator) }}*/
