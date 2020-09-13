<?php

/* @GdrAvatar/Property/items.html.twig */
class __TwigTemplate_cba2e1052d822b1d2c9f4c31e1ad3b7010349517f9a1fbf2087acb6bba7d9c98 extends Twig_Template
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
        echo "<table class=\"spaced\" style=\"margin-top: 15px\">
    ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 3
            echo "        <tr>
            <td class=\"dark\" style=\"width: 90px\">
                <img src=\"";
            // line 5
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($context["item"], "image"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "\"
            </td>
            <td>
                <p style=\"margin-bottom: 0\"><strong>Nome: </strong>";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "</p>
                <p><strong>Descrizione: </strong>";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "shortDescription", array()), "html", null, true);
            echo "</p>
            </td>
        </tr>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 13
            echo "    <tr>
        <td class=\"centered\">Questo immobile non produce nulla al momento.</td>
    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "</table>";
    }

    public function getTemplateName()
    {
        return "@GdrAvatar/Property/items.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 17,  52 => 13,  43 => 9,  39 => 8,  31 => 5,  27 => 3,  22 => 2,  19 => 1,);
    }
}
/* <table class="spaced" style="margin-top: 15px">*/
/*     {% for item in items %}*/
/*         <tr>*/
/*             <td class="dark" style="width: 90px">*/
/*                 <img src="{{ vich_uploader_asset(item, 'image') }}" alt="{{ item.name }}"*/
/*             </td>*/
/*             <td>*/
/*                 <p style="margin-bottom: 0"><strong>Nome: </strong>{{ item.name }}</p>*/
/*                 <p><strong>Descrizione: </strong>{{ item.shortDescription }}</p>*/
/*             </td>*/
/*         </tr>*/
/*     {% else %}*/
/*     <tr>*/
/*         <td class="centered">Questo immobile non produce nulla al momento.</td>*/
/*     </tr>*/
/*     {% endfor %}*/
/* </table>*/
