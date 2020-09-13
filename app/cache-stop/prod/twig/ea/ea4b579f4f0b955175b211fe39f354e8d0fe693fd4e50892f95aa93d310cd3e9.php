<?php

/* @GdrGame/Forum/listForum.html.twig */
class __TwigTemplate_9eb35022c8b8e6da819f8e476ad5c93b61d5409700b0a12cd1016293774f48d0 extends Twig_Template
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
        $context["actualForum"] = null;
        // line 2
        $context["dayNow"] = twig_date_format_filter($this->env, "now", "d/m/Y");
        // line 3
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["forums"]) ? $context["forums"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["forum"]) {
            // line 4
            echo "
            ";
            // line 5
            if (((isset($context["actualForum"]) ? $context["actualForum"] : null) != $this->getAttribute($context["forum"], "name", array()))) {
                // line 6
                echo "                ";
                if (($this->getAttribute($context["loop"], "first", array()) == false)) {
                    // line 7
                    echo "                    </table>
                ";
                }
                // line 9
                echo "                <h4 class=\"forum-title\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["forum"], "name", array()), "html", null, true);
                echo "</h4>
                <table class=\"table-forum-list spaced\">
                <tr class=\"dark\">
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Ultima risposta</th>
                </tr>
            ";
            }
            // line 17
            echo "
            <tr>
                <td class=\"dark name\">
                    <a href=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-lista-threads", array("category" => $this->getAttribute($context["forum"], "categoryId", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($context["forum"], "categoryName", array())), "html", null, true);
            echo "</a>
                </td>
                <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($context["forum"], "categoryDescription", array()), "html", null, true);
            echo "</td>
                <td class=\"last-reply\">
                    ";
            // line 24
            if ($this->getAttribute($context["forum"], "lastThreadTitle", array())) {
                // line 25
                echo "                        ";
                $context["dayLastPost"] = twig_date_format_filter($this->env, $this->getAttribute($context["forum"], "lastPostTime", array()), "d/m/Y");
                // line 26
                echo "                        <div><strong>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["forum"], "lastPostAuthor", array()), "html", null, true);
                echo "</strong></div>
                        <div>";
                // line 27
                echo twig_escape_filter($this->env, $this->env->getExtension('text_extension')->truncateFilter($this->getAttribute($context["forum"], "lastThreadTitle", array()), 25), "html", null, true);
                echo "</div>
                        <div class=\"date ";
                // line 28
                if (((isset($context["dayLastPost"]) ? $context["dayLastPost"] : null) == (isset($context["dayNow"]) ? $context["dayNow"] : null))) {
                    echo "today";
                }
                echo "\">";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["forum"], "lastPostTime", array()), "d/m/Y H:i"), "html", null, true);
                echo "</div>
                    ";
            } else {
                // line 30
                echo "                        <i>Nessuna risposta</i>
                    ";
            }
            // line 32
            echo "
                </td>
            </tr>

            ";
            // line 36
            $context["actualForum"] = $this->getAttribute($context["forum"], "name", array());
            // line 37
            echo "            ";
            if ($this->getAttribute($context["loop"], "last", array())) {
                // line 38
                echo "                </table>
            ";
            }
            // line 40
            echo "        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['forum'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "@GdrGame/Forum/listForum.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 40,  120 => 38,  117 => 37,  115 => 36,  109 => 32,  105 => 30,  96 => 28,  92 => 27,  87 => 26,  84 => 25,  82 => 24,  77 => 22,  70 => 20,  65 => 17,  53 => 9,  49 => 7,  46 => 6,  44 => 5,  41 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set actualForum = null %}*/
/* {% set dayNow = "now"|date("d/m/Y") %}*/
/*         {% for forum in forums %}*/
/* */
/*             {% if actualForum != forum.name %}*/
/*                 {% if loop.first == false %}*/
/*                     </table>*/
/*                 {% endif %}*/
/*                 <h4 class="forum-title">{{ forum.name }}</h4>*/
/*                 <table class="table-forum-list spaced">*/
/*                 <tr class="dark">*/
/*                     <th>Nome</th>*/
/*                     <th>Descrizione</th>*/
/*                     <th>Ultima risposta</th>*/
/*                 </tr>*/
/*             {% endif %}*/
/* */
/*             <tr>*/
/*                 <td class="dark name">*/
/*                     <a href="{{ path('bacheca-lista-threads', {category: forum.categoryId}) }}">{{ forum.categoryName|upper }}</a>*/
/*                 </td>*/
/*                 <td>{{ forum.categoryDescription }}</td>*/
/*                 <td class="last-reply">*/
/*                     {% if forum.lastThreadTitle %}*/
/*                         {% set dayLastPost = forum.lastPostTime|date('d/m/Y') %}*/
/*                         <div><strong>{{ forum.lastPostAuthor }}</strong></div>*/
/*                         <div>{{ forum.lastThreadTitle|truncate(25) }}</div>*/
/*                         <div class="date {% if dayLastPost == dayNow %}today{% endif %}">{{ forum.lastPostTime|date('d/m/Y H:i') }}</div>*/
/*                     {% else %}*/
/*                         <i>Nessuna risposta</i>*/
/*                     {% endif %}*/
/* */
/*                 </td>*/
/*             </tr>*/
/* */
/*             {% set actualForum = forum.name %}*/
/*             {% if loop.last %}*/
/*                 </table>*/
/*             {% endif %}*/
/*         {% endfor %}*/
