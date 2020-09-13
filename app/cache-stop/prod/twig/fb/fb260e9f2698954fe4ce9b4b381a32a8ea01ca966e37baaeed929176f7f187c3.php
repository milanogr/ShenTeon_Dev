<?php

/* GdrAvatarBundle:Combat:index.html.twig */
class __TwigTemplate_b3b7a0e0bf577ff4fddc33733adfa6e5c4414a9a1f3a864f7ee47291aec90adc extends Twig_Template
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
        echo "<p class=\"text-centered\" style=\"width: 800px; margin: 0 auto\">
    Il vostro Personaggio può apprendere diversi “stili” di combattimento, detti SET. <br>
    Questi SET sono elencati in questa scheda dalla quale potete scegliere quali imparare e vedere l’evoluzione di quelli già conosciuti.
    Questa evoluzione avviene attraverso l’acquisizione di Punti Abilità di Combattimento che dovranno poi essere spesi all’interno dei SET che conoscete. <br><br>
    <a href=\"http://www.shenteon.com/regolamento/combattimento.html\" target=\"_blank\">APRI LA DOCUMENTAZIONE COMPLETA</a> <br><br>
</p>

<p class=\"text-centered\">
    <strong>Punti Esperienza Combattente: ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "combatPoints", array()), "html", null, true);
        echo "</strong> <br>
    Punti Esperienza Razziali necessari per il prossimo Punto Combattente: ";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["points"]) ? $context["points"] : null), "html", null, true);
        echo "
    ";
        // line 11
        if (((isset($context["points"]) ? $context["points"] : null) < 0)) {
            // line 12
            echo "        <i>(si aggiornerà correttamente alla tua prossima azione)</i>
    ";
        }
        // line 14
        echo "</p>

<table class=\"solited\" style=\"width: 600px; margin: 0 auto;\">
    <tbody>
    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["sets"]) ? $context["sets"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["set"]) {
            // line 19
            echo "        <tr>
            <td style=\"width: 92px\" class=\"text-centered\">
                <img style=\"margin-bottom: 3px\" src=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($this->getAttribute($context["set"], 0, array()), "image"), "html", null, true);
            echo "\" class=\"gdrtooltip\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["set"], 0, array()), "name", array()), "html", null, true);
            echo "\">
                <a data-href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("combat-up", array("id" => $this->getAttribute($this->getAttribute($context["set"], 0, array()), "id", array()))), "html", null, true);
            echo "\" data-upgrade style=\"width: 100%; margin-bottom: 0\" class=\"button small\">Migliora</a>
            </td>
            <td>
                <img class=\"gdrtooltip\" title=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('combat_extension')->getLevelName($this->getAttribute($context["set"], "level", array())), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl((("bundles/gdrgame/images/fight/Avanzamento_" . $this->getAttribute($context["set"], "level", array())) . ".png")), "html", null, true);
            echo "\"
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['set'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "    </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Combat:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 29,  69 => 25,  63 => 22,  57 => 21,  53 => 19,  49 => 18,  43 => 14,  39 => 12,  37 => 11,  33 => 10,  29 => 9,  19 => 1,);
    }
}
/* <p class="text-centered" style="width: 800px; margin: 0 auto">*/
/*     Il vostro Personaggio può apprendere diversi “stili” di combattimento, detti SET. <br>*/
/*     Questi SET sono elencati in questa scheda dalla quale potete scegliere quali imparare e vedere l’evoluzione di quelli già conosciuti.*/
/*     Questa evoluzione avviene attraverso l’acquisizione di Punti Abilità di Combattimento che dovranno poi essere spesi all’interno dei SET che conoscete. <br><br>*/
/*     <a href="http://www.shenteon.com/regolamento/combattimento.html" target="_blank">APRI LA DOCUMENTAZIONE COMPLETA</a> <br><br>*/
/* </p>*/
/* */
/* <p class="text-centered">*/
/*     <strong>Punti Esperienza Combattente: {{ personage.combatPoints }}</strong> <br>*/
/*     Punti Esperienza Razziali necessari per il prossimo Punto Combattente: {{ points }}*/
/*     {% if points < 0 %}*/
/*         <i>(si aggiornerà correttamente alla tua prossima azione)</i>*/
/*     {% endif %}*/
/* </p>*/
/* */
/* <table class="solited" style="width: 600px; margin: 0 auto;">*/
/*     <tbody>*/
/*     {% for set in sets %}*/
/*         <tr>*/
/*             <td style="width: 92px" class="text-centered">*/
/*                 <img style="margin-bottom: 3px" src="{{ vich_uploader_asset(set.0, 'image') }}" class="gdrtooltip" title="{{ set.0.name }}">*/
/*                 <a data-href="{{ path('combat-up', {id: set.0.id}) }}" data-upgrade style="width: 100%; margin-bottom: 0" class="button small">Migliora</a>*/
/*             </td>*/
/*             <td>*/
/*                 <img class="gdrtooltip" title="{{ set.level|combatSet }}" src="{{ asset('bundles/gdrgame/images/fight/Avanzamento_'~ set.level ~'.png') }}"*/
/*             </td>*/
/*         </tr>*/
/*     {% endfor %}*/
/*     </tbody>*/
/* </table>*/
