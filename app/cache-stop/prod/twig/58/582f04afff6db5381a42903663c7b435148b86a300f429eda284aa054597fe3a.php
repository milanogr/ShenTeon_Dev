<?php

/* GdrGameBundle:Forum:strillone.html.twig */
class __TwigTemplate_30ad2a3c97280114154ed1821a2fa8ad797f391824d2c647e8739d2e3f1b86ca extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Forum:index.html.twig", "GdrGameBundle:Forum:strillone.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GdrGameBundle:Forum:index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context["isAdmin"] = $this->env->getExtension('security')->isGranted("ROLE_ADMIN");
        // line 5
        echo "
    <div id=\"forum-container\">

        <h1><span>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name", array()), "html", null, true);
        echo "</span></h1>

        <div class=\"special-description\">";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "description", array()), "html", null, true);
        echo "</div>

        ";
        // line 12
        if ((($this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name", array()) == (isset($context["strillone"]) ? $context["strillone"] : null)) && (isset($context["isAdmin"]) ? $context["isAdmin"] : null))) {
            // line 13
            echo "            <a class=\"button\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-thread", array("category" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id", array()))), "html", null, true);
            echo "\">Crea Thread</a>
        ";
        }
        // line 15
        echo "
        ";
        // line 16
        if (((($this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name", array()) == (isset($context["araldo"]) ? $context["araldo"] : null)) && (isset($context["canAraldo"]) ? $context["canAraldo"] : null)) && (isset($context["canWriteSoul"]) ? $context["canWriteSoul"] : null))) {
            // line 17
            echo "            <a class=\"button\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-thread", array("category" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id", array()))), "html", null, true);
            echo "\">Crea Thread</a>
        ";
        }
        // line 19
        echo "
        <div class=\"text-centered\">
            ";
        // line 21
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
        echo "
        </div>

        ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginator"]) ? $context["paginator"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 25
            echo "            ";
            $context["isOwner"] = ($this->getAttribute($context["post"], "authorId", array()) == (isset($context["pgId"]) ? $context["pgId"] : null));
            // line 26
            echo "
            <h4 class=\"forum-title\">
                ";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["post"], 0, array(), "array"), "title", array()), "html", null, true);
            echo "
            </h4>
            <table class=\"posts spaced special\">
                <tbody>
                <tr class=\"post\">
                    <td class=\"dark name\">
                        ";
            // line 34
            if (($this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name", array()) == (isset($context["strillone"]) ? $context["strillone"] : null))) {
                // line 35
                echo "                            <span class=\"author-admin\">
                                Gestione ";
                // line 36
                if ((isset($context["isAdmin"]) ? $context["isAdmin"] : null)) {
                    echo "<abbr
                                        title=\"Info per la Gestione\">(";
                    // line 37
                    echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "authorName", array()), "html", null, true);
                    echo ")</abbr>";
                }
                // line 38
                echo "                            </span>
                        ";
            } else {
                // line 40
                echo "                            ";
                if ($this->getAttribute($context["post"], "authorLevelIcon", array())) {
                    // line 41
                    echo "                                <img src=\"";
                    echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("enclave") . $this->getAttribute($context["post"], "authorLevelIcon", array())), "html", null, true);
                    echo "\"
                                     title=\"";
                    // line 42
                    echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "authorLevelName", array()), "html", null, true);
                    echo "\" class=\"gdrtooltip\">
                            ";
                }
                // line 44
                echo "                            <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => $this->getAttribute($context["post"], "authorName", array()))), "html", null, true);
                echo "\"
                               title=\"Apri l'avatar di ";
                // line 45
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "authorName", array()), "html", null, true);
                echo "\">
                                <img src=\"";
                // line 46
                echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute($context["post"], "authorRaceIcon", array())), "html", null, true);
                echo "\"
                                     alt=\"";
                // line 47
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "authorRace", array()), "html", null, true);
                echo "\">
                            </a>
                            <span>";
                // line 49
                echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "authorName", array()), "html", null, true);
                echo "</span>
                        ";
            }
            // line 51
            echo "                        <span class=\"date\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["post"], 0, array(), "array"), "createdAt", array()), "d/m/Y H:i"), "html", null, true);
            echo "</span>

                        <div class=\"mod\">
                            ";
            // line 54
            if (((isset($context["isOwner"]) ? $context["isOwner"] : null) || (isset($context["isAdmin"]) ? $context["isAdmin"] : null))) {
                // line 55
                echo "                                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-edit-post", array("id" => $this->getAttribute($context["post"], "postId", array()))), "html", null, true);
                echo "\">[modifica]</a>
                                <a class=\"delete-post\" data-href=\"";
                // line 56
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-delete-post", array("id" => $this->getAttribute($context["post"], "postId", array()))), "html", null, true);
                echo "\">[cancella]</a>
                            ";
            }
            // line 58
            echo "                        </div>
                    </td>
                    <td class=\"body\">
                        ";
            // line 61
            echo $this->getAttribute($context["post"], "body", array());
            echo "

                        ";
            // line 63
            if (($this->getAttribute($this->getAttribute($context["post"], 0, array(), "array", false, true), "updatedAt", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($context["post"], 0, array(), "array"), "updatedAt", array()) != $this->getAttribute($this->getAttribute($context["post"], 0, array(), "array"), "createdAt", array())))) {
                // line 64
                echo "                            <p class=\"updated\">Modificato il ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["post"], 0, array(), "array"), "updatedAt", array()), "d/m/Y H:i"), "html", null, true);
                echo ".</p>
                        ";
            }
            // line 66
            echo "                    </td>
                </tr>
                </tbody>
            </table>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 71
            echo "            <table class=\"posts spaced\">
                <tbody>
                <tr>
                    <td class=\"text-centered\">Non ci sono thread al momento.</td>
                </tr>
                </tbody>
            </table>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Forum:strillone.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 79,  198 => 71,  189 => 66,  183 => 64,  181 => 63,  176 => 61,  171 => 58,  166 => 56,  161 => 55,  159 => 54,  152 => 51,  147 => 49,  142 => 47,  138 => 46,  134 => 45,  129 => 44,  124 => 42,  119 => 41,  116 => 40,  112 => 38,  108 => 37,  104 => 36,  101 => 35,  99 => 34,  90 => 28,  86 => 26,  83 => 25,  78 => 24,  72 => 21,  68 => 19,  62 => 17,  60 => 16,  57 => 15,  51 => 13,  49 => 12,  44 => 10,  39 => 8,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Forum:index.html.twig' %}*/
/* */
/* {% block content %}*/
/*     {% set isAdmin = is_granted('ROLE_ADMIN') %}*/
/* */
/*     <div id="forum-container">*/
/* */
/*         <h1><span>{{ category.name }}</span></h1>*/
/* */
/*         <div class="special-description">{{ category.description }}</div>*/
/* */
/*         {% if category.name == strillone and isAdmin %}*/
/*             <a class="button" href="{{ path('bacheca-create-thread', {category: category.id}) }}">Crea Thread</a>*/
/*         {% endif %}*/
/* */
/*         {% if category.name == araldo and canAraldo and canWriteSoul %}*/
/*             <a class="button" href="{{ path('bacheca-create-thread', {category: category.id}) }}">Crea Thread</a>*/
/*         {% endif %}*/
/* */
/*         <div class="text-centered">*/
/*             {{ knp_pagination_render(paginator) }}*/
/*         </div>*/
/* */
/*         {% for post in paginator %}*/
/*             {% set isOwner = post.authorId == pgId %}*/
/* */
/*             <h4 class="forum-title">*/
/*                 {{ post[0].title }}*/
/*             </h4>*/
/*             <table class="posts spaced special">*/
/*                 <tbody>*/
/*                 <tr class="post">*/
/*                     <td class="dark name">*/
/*                         {% if category.name == strillone %}*/
/*                             <span class="author-admin">*/
/*                                 Gestione {% if isAdmin %}<abbr*/
/*                                         title="Info per la Gestione">({{ post.authorName }})</abbr>{% endif %}*/
/*                             </span>*/
/*                         {% else %}*/
/*                             {% if post.authorLevelIcon %}*/
/*                                 <img src="{{ uploadPath('enclave') ~ post.authorLevelIcon }}"*/
/*                                      title="{{ post.authorLevelName }}" class="gdrtooltip">*/
/*                             {% endif %}*/
/*                             <a href="{{ path('avatar-index', {name: post.authorName}) }}"*/
/*                                title="Apri l'avatar di {{ post.authorName }}">*/
/*                                 <img src="{{ uploadPath('race') ~ post.authorRaceIcon }}"*/
/*                                      alt="{{ post.authorRace }}">*/
/*                             </a>*/
/*                             <span>{{ post.authorName }}</span>*/
/*                         {% endif %}*/
/*                         <span class="date">{{ post[0].createdAt|date('d/m/Y H:i') }}</span>*/
/* */
/*                         <div class="mod">*/
/*                             {% if isOwner or isAdmin %}*/
/*                                 <a href="{{ path('bacheca-edit-post', {id: post.postId}) }}">[modifica]</a>*/
/*                                 <a class="delete-post" data-href="{{ path('bacheca-delete-post', {id: post.postId}) }}">[cancella]</a>*/
/*                             {% endif %}*/
/*                         </div>*/
/*                     </td>*/
/*                     <td class="body">*/
/*                         {{ post.body|raw }}*/
/* */
/*                         {% if post[0].updatedAt is defined and post[0].updatedAt != post[0].createdAt %}*/
/*                             <p class="updated">Modificato il {{ post[0].updatedAt|date('d/m/Y H:i') }}.</p>*/
/*                         {% endif %}*/
/*                     </td>*/
/*                 </tr>*/
/*                 </tbody>*/
/*             </table>*/
/*         {% else %}*/
/*             <table class="posts spaced">*/
/*                 <tbody>*/
/*                 <tr>*/
/*                     <td class="text-centered">Non ci sono thread al momento.</td>*/
/*                 </tr>*/
/*                 </tbody>*/
/*             </table>*/
/*         {% endfor %}*/
/*     </div>*/
/* {% endblock %}*/
