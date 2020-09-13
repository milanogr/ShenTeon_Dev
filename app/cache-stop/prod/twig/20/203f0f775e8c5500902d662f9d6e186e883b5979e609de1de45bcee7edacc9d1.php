<?php

/* @GdrGame/Forum/listThreads.html.twig */
class __TwigTemplate_80089c3b3cc9514f0a55d425f5ebbbb990cd093ada2883622a38e40abe4f3712 extends Twig_Template
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
        echo "<div class=\"text-centered\">
    ";
        // line 2
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
        echo "
</div>

<h4 class=\"forum-title\">";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name", array()), "html", null, true);
        echo "</h4>
<table class=\"threads spaced\">
    <tbody>
    <tr class=\"dark\">
        <th></th>
        <th>Autore</th>
        <th>Titolo e data</th>
        <th>Letture</th>
        <th>Risposte</th>
        <th>Ultimo Intervento</th>
    </tr>
    ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginator"]) ? $context["paginator"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["thread"]) {
            // line 17
            echo "        ";
            $context["darkClass"] = ((($this->getAttribute($context["thread"], "status", array()) != (isset($context["threadNormal"]) ? $context["threadNormal"] : null))) ? ("dark") : (""));
            // line 18
            echo "        <tr>
            <td class=\"nuovo-img dark\">
                ";
            // line 20
            if ($this->getAttribute($context["thread"], "threadReaded", array())) {
                // line 21
                echo "                    <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/vecchio-thread.png"), "html", null, true);
                echo "\" title=\"Non ci sono nuove risposte dalla tua ultima visita\" alt=\"Non ci sono nuove risposte dalla tua ultima visita\">
                ";
            } else {
                // line 23
                echo "                    <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/nuovo-thread.png"), "html", null, true);
                echo "\" title=\"Ci sono nuove risposte dalla tua ultima visita\" alt=\"Ci sono nuove risposte dalla tua ultima visita\">
                ";
            }
            // line 25
            echo "            </td>
            <td class=\"dark name\">
                ";
            // line 27
            if ($this->getAttribute($context["thread"], "nameAsMod", array())) {
                // line 28
                echo "                    <span class=\"author-mod\">Moderatore</span>
                ";
            } elseif ($this->getAttribute(            // line 29
$context["thread"], "nameAsAdmin", array())) {
                // line 30
                echo "                    <span class=\"author-admin\">Gestione</span>
                ";
            } else {
                // line 32
                echo "                    ";
                if ($this->getAttribute($context["thread"], "authorLevelIcon", array())) {
                    // line 33
                    echo "                        <img src=\"";
                    echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("enclave") . $this->getAttribute($context["thread"], "authorLevelIcon", array())), "html", null, true);
                    echo "\"
                             title=\"";
                    // line 34
                    echo twig_escape_filter($this->env, $this->getAttribute($context["thread"], "authorLevelName", array()), "html", null, true);
                    echo "\" class=\"gdrtooltip\">
                    ";
                } else {
                    // line 36
                    echo "                        <img title=\"Appartenenza ad Enclavi sconosciuta\" class=\"gdrtooltip\"
                             src=\"";
                    // line 37
                    echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/no-enclave.png"), "html", null, true);
                    echo "\">
                    ";
                }
                // line 39
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => $this->getAttribute($context["thread"], "authorName", array()))), "html", null, true);
                echo "\"
                       title=\"Apri l'avatar di ";
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute($context["thread"], "authorName", array()), "html", null, true);
                echo "\">
                        <img src=\"";
                // line 41
                echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute($context["thread"], "authorRaceIcon", array())), "html", null, true);
                echo "\"
                             alt=\"";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute($context["thread"], "authorRace", array()), "html", null, true);
                echo "\">
                    </a>
                    <span>";
                // line 44
                echo twig_escape_filter($this->env, $this->getAttribute($context["thread"], "authorName", array()), "html", null, true);
                echo "</span>
                ";
            }
            // line 46
            echo "            </td>
            <td class=\"body ";
            // line 47
            echo twig_escape_filter($this->env, (isset($context["darkClass"]) ? $context["darkClass"] : null), "html", null, true);
            echo "\">
                <a href=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-show-thread", array("id" => $this->getAttribute($this->getAttribute($context["thread"], 0, array(), "array"), "id", array()))), "html", null, true);
            echo "\">
                    ";
            // line 49
            if ($this->getAttribute($context["thread"], "isLocked", array())) {
                // line 50
                echo "                        <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/forum-locked.png"), "html", null, true);
                echo "\" alt=\"Discussione Chiusa\"
                             title=\"Discussione Chiusa\">
                    ";
            }
            // line 53
            echo "                    ";
            if (($this->getAttribute($context["thread"], "status", array()) == (isset($context["threadAnnounce"]) ? $context["threadAnnounce"] : null))) {
                // line 54
                echo "                        <strong>[Annuncio] </strong>
                    ";
            } elseif (($this->getAttribute(            // line 55
$context["thread"], "status", array()) == (isset($context["threadImportant"]) ? $context["threadImportant"] : null))) {
                // line 56
                echo "                        <strong>[In evidenza] </strong>
                    ";
            }
            // line 58
            echo "                    ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["thread"], 0, array(), "array"), "title", array()), "html", null, true);
            echo "
                </a>
                <span class=\"date\">Teon, ";
            // line 60
            echo twig_escape_filter($this->env, _twig_default_filter(twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["thread"], 0, array(), "array"), "createdAt", array()), "d/m/Y H:i"), ""), "html", null, true);
            echo "</span>
            </td>
            <td class=\"letture ";
            // line 62
            echo twig_escape_filter($this->env, (isset($context["darkClass"]) ? $context["darkClass"] : null), "html", null, true);
            echo "\">
                ";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["thread"], 0, array(), "array"), "readed", array()), "html", null, true);
            echo "
            </td>
            <td class=\"risposte ";
            // line 65
            echo twig_escape_filter($this->env, (isset($context["darkClass"]) ? $context["darkClass"] : null), "html", null, true);
            echo "\">
                ";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["thread"], 0, array(), "array"), "replied", array()), "html", null, true);
            echo "
            </td>
            <td class=\"last-reply ";
            // line 68
            echo twig_escape_filter($this->env, (isset($context["darkClass"]) ? $context["darkClass"] : null), "html", null, true);
            echo "\">
                ";
            // line 69
            if ($this->getAttribute($this->getAttribute($context["thread"], 0, array(), "array"), "lastPostAuthor", array())) {
                // line 70
                echo "                    <div><strong>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["thread"], 0, array(), "array"), "lastPostAuthor", array()), "html", null, true);
                echo "</strong></div>
                    <div class=\"date\">";
                // line 71
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["thread"], 0, array(), "array"), "lastPostTime", array()), "d/m/Y H:i"), "html", null, true);
                echo "</div>
                ";
            } else {
                // line 73
                echo "                    <i>Nessuna risposta</i>
                ";
            }
            // line 75
            echo "            </td>
        </tr>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 78
            echo "        <tr>
            <td colspan=\"6\" class=\"text-centered\">Non ci sono thread</td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['thread'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "    </tbody>
</table>

<div class=\"text-centered\">
    ";
        // line 86
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
        echo "
</div>";
    }

    public function getTemplateName()
    {
        return "@GdrGame/Forum/listThreads.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  230 => 86,  224 => 82,  215 => 78,  208 => 75,  204 => 73,  199 => 71,  194 => 70,  192 => 69,  188 => 68,  183 => 66,  179 => 65,  174 => 63,  170 => 62,  165 => 60,  159 => 58,  155 => 56,  153 => 55,  150 => 54,  147 => 53,  140 => 50,  138 => 49,  134 => 48,  130 => 47,  127 => 46,  122 => 44,  117 => 42,  113 => 41,  109 => 40,  104 => 39,  99 => 37,  96 => 36,  91 => 34,  86 => 33,  83 => 32,  79 => 30,  77 => 29,  74 => 28,  72 => 27,  68 => 25,  62 => 23,  56 => 21,  54 => 20,  50 => 18,  47 => 17,  42 => 16,  28 => 5,  22 => 2,  19 => 1,);
    }
}
/* <div class="text-centered">*/
/*     {{ knp_pagination_render(paginator) }}*/
/* </div>*/
/* */
/* <h4 class="forum-title">{{ category.name }}</h4>*/
/* <table class="threads spaced">*/
/*     <tbody>*/
/*     <tr class="dark">*/
/*         <th></th>*/
/*         <th>Autore</th>*/
/*         <th>Titolo e data</th>*/
/*         <th>Letture</th>*/
/*         <th>Risposte</th>*/
/*         <th>Ultimo Intervento</th>*/
/*     </tr>*/
/*     {% for thread in paginator %}*/
/*         {% set darkClass = thread.status != threadNormal ? 'dark' : "" %}*/
/*         <tr>*/
/*             <td class="nuovo-img dark">*/
/*                 {% if thread.threadReaded %}*/
/*                     <img src="{{ asset('bundles/gdrgame/images/vecchio-thread.png') }}" title="Non ci sono nuove risposte dalla tua ultima visita" alt="Non ci sono nuove risposte dalla tua ultima visita">*/
/*                 {% else %}*/
/*                     <img src="{{ asset('bundles/gdrgame/images/nuovo-thread.png') }}" title="Ci sono nuove risposte dalla tua ultima visita" alt="Ci sono nuove risposte dalla tua ultima visita">*/
/*                 {% endif %}*/
/*             </td>*/
/*             <td class="dark name">*/
/*                 {% if thread.nameAsMod %}*/
/*                     <span class="author-mod">Moderatore</span>*/
/*                 {% elseif thread.nameAsAdmin %}*/
/*                     <span class="author-admin">Gestione</span>*/
/*                 {% else %}*/
/*                     {% if thread.authorLevelIcon %}*/
/*                         <img src="{{ uploadPath('enclave') ~ thread.authorLevelIcon }}"*/
/*                              title="{{ thread.authorLevelName }}" class="gdrtooltip">*/
/*                     {% else %}*/
/*                         <img title="Appartenenza ad Enclavi sconosciuta" class="gdrtooltip"*/
/*                              src="{{ asset('bundles/gdrgame/images/chat/no-enclave.png') }}">*/
/*                     {% endif %}*/
/*                     <a href="{{ path('avatar-index', {name: thread.authorName}) }}"*/
/*                        title="Apri l'avatar di {{ thread.authorName }}">*/
/*                         <img src="{{ uploadPath('race') ~ thread.authorRaceIcon }}"*/
/*                              alt="{{ thread.authorRace }}">*/
/*                     </a>*/
/*                     <span>{{ thread.authorName }}</span>*/
/*                 {% endif %}*/
/*             </td>*/
/*             <td class="body {{ darkClass }}">*/
/*                 <a href="{{ path('bacheca-show-thread', {id: thread[0].id}) }}">*/
/*                     {% if thread.isLocked %}*/
/*                         <img src="{{ asset('bundles/gdrgame/images/forum-locked.png') }}" alt="Discussione Chiusa"*/
/*                              title="Discussione Chiusa">*/
/*                     {% endif %}*/
/*                     {% if thread.status == threadAnnounce %}*/
/*                         <strong>[Annuncio] </strong>*/
/*                     {% elseif thread.status == threadImportant %}*/
/*                         <strong>[In evidenza] </strong>*/
/*                     {% endif %}*/
/*                     {{ thread[0].title }}*/
/*                 </a>*/
/*                 <span class="date">Teon, {{ thread[0].createdAt|date('d/m/Y H:i')|default('') }}</span>*/
/*             </td>*/
/*             <td class="letture {{ darkClass }}">*/
/*                 {{ thread[0].readed }}*/
/*             </td>*/
/*             <td class="risposte {{ darkClass }}">*/
/*                 {{ thread[0].replied }}*/
/*             </td>*/
/*             <td class="last-reply {{ darkClass }}">*/
/*                 {% if thread[0].lastPostAuthor %}*/
/*                     <div><strong>{{ thread[0].lastPostAuthor }}</strong></div>*/
/*                     <div class="date">{{ thread[0].lastPostTime|date('d/m/Y H:i') }}</div>*/
/*                 {% else %}*/
/*                     <i>Nessuna risposta</i>*/
/*                 {% endif %}*/
/*             </td>*/
/*         </tr>*/
/*     {% else %}*/
/*         <tr>*/
/*             <td colspan="6" class="text-centered">Non ci sono thread</td>*/
/*         </tr>*/
/*     {% endfor %}*/
/*     </tbody>*/
/* </table>*/
/* */
/* <div class="text-centered">*/
/*     {{ knp_pagination_render(paginator) }}*/
/* </div>*/
