<?php

/* @GdrGame/Forum/showThread.html.twig */
class __TwigTemplate_9f12bb9d77b0058bd4c6b6081da1663da1fcd225e2a3b230771c1def992a3d56 extends Twig_Template
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

<h4 class=\"forum-title\">
    ";
        // line 6
        if (($this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "status", array()) == (isset($context["threadAnnounce"]) ? $context["threadAnnounce"] : null))) {
            // line 7
            echo "        <strong>[Annuncio] </strong>
    ";
        } elseif (($this->getAttribute(        // line 8
(isset($context["thread"]) ? $context["thread"] : null), "status", array()) == (isset($context["threadImportant"]) ? $context["threadImportant"] : null))) {
            // line 9
            echo "        <strong>[In evidenza] </strong>
    ";
        }
        // line 11
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "title", array()), "html", null, true);
        echo "
</h4>
<table class=\"posts spaced\">
    <tbody>
    <tr class=\"dark\">
        <th>Autore e Data</th>
        <th>Testo</th>
    </tr>
    ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginator"]) ? $context["paginator"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 20
            echo "
        ";
            // line 21
            $context["isOwner"] = ($this->getAttribute($this->getAttribute($context["post"], "author", array()), "id", array()) == (isset($context["pgId"]) ? $context["pgId"] : null));
            // line 22
            echo "        ";
            $context["canEdit"] = (($this->getAttribute($context["post"], "isLastPost", array()) && (isset($context["isOwner"]) ? $context["isOwner"] : null)) || (isset($context["isMod"]) ? $context["isMod"] : null));
            // line 23
            echo "        ";
            $context["canDelete"] = (($this->getAttribute($context["post"], "isLastPost", array()) && (isset($context["isOwner"]) ? $context["isOwner"] : null)) || (isset($context["isMod"]) ? $context["isMod"] : null));
            // line 24
            echo "
        <tr class=\"post\">
            <td class=\"dark name\">
                ";
            // line 27
            if ($this->getAttribute($context["post"], "nameAsMod", array())) {
                // line 28
                echo "                    <span class=\"author-mod\">
                                Moderatore ";
                // line 29
                if ((isset($context["isAdmin"]) ? $context["isAdmin"] : null)) {
                    echo "<abbr
                                title=\"Info per la Gestione\">(";
                    // line 30
                    echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "authorName", array()), "html", null, true);
                    echo ")</abbr>";
                }
                // line 31
                echo "                            </span>
                ";
            } elseif ($this->getAttribute(            // line 32
$context["post"], "nameAsAdmin", array())) {
                // line 33
                echo "                    <span class=\"author-admin\">
                                Gestione ";
                // line 34
                if ((isset($context["isAdmin"]) ? $context["isAdmin"] : null)) {
                    echo "<abbr
                                title=\"Info per la Gestione\">(";
                    // line 35
                    echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "authorName", array()), "html", null, true);
                    echo ")</abbr>";
                }
                // line 36
                echo "                            </span>
                ";
            } else {
                // line 38
                echo "                    ";
                if ($this->getAttribute($context["post"], "authorLevelIcon", array())) {
                    // line 39
                    echo "                        <img src=\"";
                    echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("enclave") . $this->getAttribute($context["post"], "authorLevelIcon", array())), "html", null, true);
                    echo "\"
                             title=\"";
                    // line 40
                    echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "authorLevelName", array()), "html", null, true);
                    echo "\" class=\"gdrtooltip\">
                    ";
                } else {
                    // line 42
                    echo "                        <img title=\"Appartenenza ad Enclavi sconosciuta\" class=\"gdrtooltip\"
                             src=\"";
                    // line 43
                    echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/no-enclave.png"), "html", null, true);
                    echo "\">
                    ";
                }
                // line 45
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => $this->getAttribute($context["post"], "authorName", array()))), "html", null, true);
                echo "\"
                       title=\"Apri l'avatar di ";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "authorName", array()), "html", null, true);
                echo "\">
                        <img src=\"";
                // line 47
                echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute($context["post"], "authorRaceIcon", array())), "html", null, true);
                echo "\"
                             alt=\"";
                // line 48
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "authorRaceName", array()), "html", null, true);
                echo "\">
                    </a>
                    <span>";
                // line 50
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "authorName", array()), "html", null, true);
                echo "</span>
                ";
            }
            // line 52
            echo "                <span class=\"date\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["post"], "createdAt", array()), "d/m/Y H:i"), "html", null, true);
            echo "</span>

                <div class=\"mod\">
                    ";
            // line 55
            if ((isset($context["canEdit"]) ? $context["canEdit"] : null)) {
                // line 56
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-edit-post", array("id" => $this->getAttribute($context["post"], "id", array()))), "html", null, true);
                echo "\">[modifica]</a>

                    ";
            }
            // line 59
            echo "                    ";
            if ((isset($context["canDelete"]) ? $context["canDelete"] : null)) {
                // line 60
                echo "                        <a class=\"delete-post\" data-href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-delete-post", array("id" => $this->getAttribute($context["post"], "id", array()))), "html", null, true);
                echo "\">[cancella]</a>
                    ";
            }
            // line 62
            echo "                </div>
            </td>
            <td class=\"body\">
                ";
            // line 65
            echo $this->getAttribute($context["post"], "body", array());
            echo "

                ";
            // line 67
            if ($this->getAttribute($context["post"], "updatedBy", array())) {
                // line 68
                echo "                    <p class=\"updated\">Modificato il ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["post"], "updatedAt", array()), "d/m/Y H:i"), "html", null, true);
                echo "
                        da ";
                // line 69
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "updatedBy", array()), "html", null, true);
                echo ".</p>
                ";
            }
            // line 71
            echo "            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "    </tbody>
</table>

<div class=\"text-centered\">
    ";
        // line 78
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
        echo "
</div>";
    }

    public function getTemplateName()
    {
        return "@GdrGame/Forum/showThread.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 78,  204 => 74,  196 => 71,  191 => 69,  186 => 68,  184 => 67,  179 => 65,  174 => 62,  168 => 60,  165 => 59,  158 => 56,  156 => 55,  149 => 52,  144 => 50,  139 => 48,  135 => 47,  131 => 46,  126 => 45,  121 => 43,  118 => 42,  113 => 40,  108 => 39,  105 => 38,  101 => 36,  97 => 35,  93 => 34,  90 => 33,  88 => 32,  85 => 31,  81 => 30,  77 => 29,  74 => 28,  72 => 27,  67 => 24,  64 => 23,  61 => 22,  59 => 21,  56 => 20,  52 => 19,  40 => 11,  36 => 9,  34 => 8,  31 => 7,  29 => 6,  22 => 2,  19 => 1,);
    }
}
/* <div class="text-centered">*/
/*     {{ knp_pagination_render(paginator) }}*/
/* </div>*/
/* */
/* <h4 class="forum-title">*/
/*     {% if thread.status == threadAnnounce %}*/
/*         <strong>[Annuncio] </strong>*/
/*     {% elseif thread.status == threadImportant %}*/
/*         <strong>[In evidenza] </strong>*/
/*     {% endif %}*/
/*     {{ thread.title }}*/
/* </h4>*/
/* <table class="posts spaced">*/
/*     <tbody>*/
/*     <tr class="dark">*/
/*         <th>Autore e Data</th>*/
/*         <th>Testo</th>*/
/*     </tr>*/
/*     {% for post in paginator %}*/
/* */
/*         {% set isOwner = post.author.id == pgId %}*/
/*         {% set canEdit = (post.isLastPost and isOwner) or isMod %}*/
/*         {% set canDelete = (post.isLastPost and isOwner) or isMod %}*/
/* */
/*         <tr class="post">*/
/*             <td class="dark name">*/
/*                 {% if post.nameAsMod %}*/
/*                     <span class="author-mod">*/
/*                                 Moderatore {% if isAdmin %}<abbr*/
/*                                 title="Info per la Gestione">({{ post.authorName }})</abbr>{% endif %}*/
/*                             </span>*/
/*                 {% elseif post.nameAsAdmin %}*/
/*                     <span class="author-admin">*/
/*                                 Gestione {% if isAdmin %}<abbr*/
/*                                 title="Info per la Gestione">({{ post.authorName }})</abbr>{% endif %}*/
/*                             </span>*/
/*                 {% else %}*/
/*                     {% if post.authorLevelIcon %}*/
/*                         <img src="{{ uploadPath('enclave') ~ post.authorLevelIcon }}"*/
/*                              title="{{ post.authorLevelName }}" class="gdrtooltip">*/
/*                     {% else %}*/
/*                         <img title="Appartenenza ad Enclavi sconosciuta" class="gdrtooltip"*/
/*                              src="{{ asset('bundles/gdrgame/images/chat/no-enclave.png') }}">*/
/*                     {% endif %}*/
/*                     <a href="{{ path('avatar-index', {name: post.authorName}) }}"*/
/*                        title="Apri l'avatar di {{ post.authorName }}">*/
/*                         <img src="{{ uploadPath('race') ~ post.authorRaceIcon }}"*/
/*                              alt="{{ post.authorRaceName }}">*/
/*                     </a>*/
/*                     <span>{{ post.authorName }}</span>*/
/*                 {% endif %}*/
/*                 <span class="date">{{ post.createdAt|date('d/m/Y H:i') }}</span>*/
/* */
/*                 <div class="mod">*/
/*                     {% if canEdit %}*/
/*                         <a href="{{ path('bacheca-edit-post', {id: post.id}) }}">[modifica]</a>*/
/* */
/*                     {% endif %}*/
/*                     {% if canDelete %}*/
/*                         <a class="delete-post" data-href="{{ path('bacheca-delete-post', {id: post.id}) }}">[cancella]</a>*/
/*                     {% endif %}*/
/*                 </div>*/
/*             </td>*/
/*             <td class="body">*/
/*                 {{ post.body|raw }}*/
/* */
/*                 {% if post.updatedBy %}*/
/*                     <p class="updated">Modificato il {{ post.updatedAt|date('d/m/Y H:i') }}*/
/*                         da {{ post.updatedBy }}.</p>*/
/*                 {% endif %}*/
/*             </td>*/
/*         </tr>*/
/*     {% endfor %}*/
/*     </tbody>*/
/* </table>*/
/* */
/* <div class="text-centered">*/
/*     {{ knp_pagination_render(paginator) }}*/
/* </div>*/
