<?php

/* GdrAvatarBundle:Achievement:index.html.twig */
class __TwigTemplate_8a9411b37a30fc0473d52229a870a58a3997aa6beb7cb067eb13433df0b570fc extends Twig_Template
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
        echo "<p class=\"text-centered\">
    <i>\"Da qui tu, in quanto giocatore, puoi votare i Personaggi che ritieni migliori per una delle categorie proposte.\"</i>
</p>

";
        // line 5
        if ((isset($context["isOwner"]) ? $context["isOwner"] : null)) {
            // line 6
            echo "    <h3>Riconoscimenti da votare</h3>
    <div id=\"achievement-vote\">
        <i>Al momento non ci sono votazioni</i>
    </div>
";
        }
        // line 11
        echo "
<hr>

<h3>Riconoscimenti del personaggio</h3>

<table class=\"items-table-container\">
    <tbody>
    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["achievements"]) ? $context["achievements"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["achievement"]) {
            // line 19
            echo "        <tr class=\"item-row\">
            <td class=\"item-preview\">
                <img src=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($context["achievement"], "image"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["achievement"], "name", array()), "html", null, true);
            echo "\">
            </td>
            <td class=\"item-infos\">
                <ul>
                    <li><span>Riconoscimento:</span> ";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["achievement"], "name", array()), "html", null, true);
            echo "</li>
                    <li><span>Data:</span> ";
            // line 26
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["achievement"], "createdAt", array()), "d/m/Y"), "html", null, true);
            echo "</li>
                    <li><span>Descrizione:</span> ";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["achievement"], "description", array()), "html", null, true);
            echo "</li>
                </ul>
            </td>
        </tr>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 32
            echo "        <tr>
            <td colspan=\"2\" class=\"text-centered\">Il personaggio non ha ancora ricevuto nessun riconoscimento
                pubblico.
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['achievement'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Achievement:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 38,  79 => 32,  69 => 27,  65 => 26,  61 => 25,  52 => 21,  48 => 19,  43 => 18,  34 => 11,  27 => 6,  25 => 5,  19 => 1,);
    }
}
/* <p class="text-centered">*/
/*     <i>"Da qui tu, in quanto giocatore, puoi votare i Personaggi che ritieni migliori per una delle categorie proposte."</i>*/
/* </p>*/
/* */
/* {% if isOwner %}*/
/*     <h3>Riconoscimenti da votare</h3>*/
/*     <div id="achievement-vote">*/
/*         <i>Al momento non ci sono votazioni</i>*/
/*     </div>*/
/* {% endif %}*/
/* */
/* <hr>*/
/* */
/* <h3>Riconoscimenti del personaggio</h3>*/
/* */
/* <table class="items-table-container">*/
/*     <tbody>*/
/*     {% for achievement in achievements %}*/
/*         <tr class="item-row">*/
/*             <td class="item-preview">*/
/*                 <img src="{{ vich_uploader_asset(achievement, 'image') }}" title="{{ achievement.name }}">*/
/*             </td>*/
/*             <td class="item-infos">*/
/*                 <ul>*/
/*                     <li><span>Riconoscimento:</span> {{ achievement.name }}</li>*/
/*                     <li><span>Data:</span> {{ achievement.createdAt|date("d/m/Y") }}</li>*/
/*                     <li><span>Descrizione:</span> {{ achievement.description }}</li>*/
/*                 </ul>*/
/*             </td>*/
/*         </tr>*/
/*     {% else %}*/
/*         <tr>*/
/*             <td colspan="2" class="text-centered">Il personaggio non ha ancora ricevuto nessun riconoscimento*/
/*                 pubblico.*/
/*             </td>*/
/*         </tr>*/
/*     {% endfor %}*/
/*     </tbody>*/
/* </table>*/
/* */
