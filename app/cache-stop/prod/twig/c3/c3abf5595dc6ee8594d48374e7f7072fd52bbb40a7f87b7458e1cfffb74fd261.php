<?php

/* GdrAvatarBundle:Grimory:categories.html.twig */
class __TwigTemplate_85070e17189397ab7d639c5bdb67aa3a02f8f5a5c34af3b7270bcd4da8483633 extends Twig_Template
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
        echo "<h2><span>Incanti di livello ";
        echo twig_escape_filter($this->env, (isset($context["level"]) ? $context["level"] : null), "html", null, true);
        echo "
        <small>";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["level"]) ? $context["level"] : null), "html", null, true);
        echo " punti MANA per Incanto</small></span></h2>

<div class=\"clearfix\">
    <a href=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("grimory-index");
        echo "\" class=\"loadContainer button medium right\">← Torna al Grimorio</a>
</div>
";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 8
            echo "    <table class=\"table-categories\">
        <thead>
        <tr>
            <th colspan=\"3\">";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "name", array()), "html", null, true);
            echo "</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class=\"open\" colspan=\"3\">
                <a class=\"show-spells\" href=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("grimory-spells", array("categoryId" => $this->getAttribute($context["category"], "id", array()), "level" => (isset($context["level"]) ? $context["level"] : null))), "html", null, true);
            echo "\">
                    Apri elenco - Incanti selezionati: ";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "numero", array()), "html", null, true);
            echo " su ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "numero2", array()), "html", null, true);
            echo "
                </a>
            </td>
        </tr>
        </tbody>
    </table>
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 25
            echo "    <p class=\"text-centered\">Non ci sono categorie di incantesimi.</p>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "<div class=\"clearfix\">
    <a href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("grimory-index");
        echo "\" class=\"loadContainer button medium right\">← Torna al Grimorio</a>
</div>";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Grimory:categories.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 28,  79 => 27,  72 => 25,  58 => 18,  54 => 17,  45 => 11,  40 => 8,  35 => 7,  30 => 5,  24 => 2,  19 => 1,);
    }
}
/* <h2><span>Incanti di livello {{ level }}*/
/*         <small>{{ level }} punti MANA per Incanto</small></span></h2>*/
/* */
/* <div class="clearfix">*/
/*     <a href="{{ path('grimory-index') }}" class="loadContainer button medium right">← Torna al Grimorio</a>*/
/* </div>*/
/* {% for category in categories %}*/
/*     <table class="table-categories">*/
/*         <thead>*/
/*         <tr>*/
/*             <th colspan="3">{{ category.name }}</th>*/
/*         </tr>*/
/*         </thead>*/
/*         <tbody>*/
/*         <tr>*/
/*             <td class="open" colspan="3">*/
/*                 <a class="show-spells" href="{{ path('grimory-spells', {categoryId: category.id, level: level}) }}">*/
/*                     Apri elenco - Incanti selezionati: {{ category.numero }} su {{ category.numero2 }}*/
/*                 </a>*/
/*             </td>*/
/*         </tr>*/
/*         </tbody>*/
/*     </table>*/
/* {% else %}*/
/*     <p class="text-centered">Non ci sono categorie di incantesimi.</p>*/
/* {% endfor %}*/
/* <div class="clearfix">*/
/*     <a href="{{ path('grimory-index') }}" class="loadContainer button medium right">← Torna al Grimorio</a>*/
/* </div>*/
