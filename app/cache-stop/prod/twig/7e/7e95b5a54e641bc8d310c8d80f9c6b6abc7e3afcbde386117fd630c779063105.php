<?php

/* GdrGameBundle:Default:paginator.html.twig */
class __TwigTemplate_0e58e4290a1d7b679071b93b02976dc5bb1ddfc0286f251e030d22f7e996ae32 extends Twig_Template
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
        if (((isset($context["pageCount"]) ? $context["pageCount"] : null) > 1)) {
            // line 2
            echo "    <div class=\"pagination-centered\">
        <ul class=\"pagination\">

            ";
            // line 5
            if (array_key_exists("previous", $context)) {
                // line 6
                echo "                <li class=\"arrow\">
                    <a class=\"page\" title=\"Torna indietro\" href=\"";
                // line 7
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["previous"]) ? $context["previous"] : null)))), "html", null, true);
                echo "\">&laquo;</a>
                </li>
            ";
            } else {
                // line 10
                echo "                <li class=\"arrow unavailable\">
                    <a href=\"#\">&laquo;</a>
                </li>
            ";
            }
            // line 14
            echo "
            ";
            // line 15
            if (((isset($context["startPage"]) ? $context["startPage"] : null) > 1)) {
                // line 16
                echo "                <li>
                    <a class=\"page\" href=\"";
                // line 17
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => 1))), "html", null, true);
                echo "\">1</a>
                </li>
                ";
                // line 19
                if (((isset($context["startPage"]) ? $context["startPage"] : null) == 3)) {
                    // line 20
                    echo "                    <li>
                        <a class=\"page\" href=\"";
                    // line 21
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => 2))), "html", null, true);
                    echo "\">2</a>
                    </li>
                ";
                } elseif ((                // line 23
(isset($context["startPage"]) ? $context["startPage"] : null) != 2)) {
                    // line 24
                    echo "                    <li class=\"unavailable\">
                        <span>&hellip;</span>
                    </li>
                ";
                }
                // line 28
                echo "            ";
            }
            // line 29
            echo "
            ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagesInRange"]) ? $context["pagesInRange"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 31
                echo "                ";
                if (($context["page"] != (isset($context["current"]) ? $context["current"] : null))) {
                    // line 32
                    echo "                    <li>
                        <a class=\"page\" href=\"";
                    // line 33
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => $context["page"]))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                    echo "</a>
                    </li>
                ";
                } else {
                    // line 36
                    echo "                    <li class=\"current\">
                        <a href=\"#\">";
                    // line 37
                    echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                    echo "</a>
                    </li>
                ";
                }
                // line 40
                echo "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "
            ";
            // line 43
            if (((isset($context["pageCount"]) ? $context["pageCount"] : null) > (isset($context["endPage"]) ? $context["endPage"] : null))) {
                // line 44
                echo "                ";
                if (((isset($context["pageCount"]) ? $context["pageCount"] : null) > ((isset($context["endPage"]) ? $context["endPage"] : null) + 1))) {
                    // line 45
                    echo "                    ";
                    if (((isset($context["pageCount"]) ? $context["pageCount"] : null) > ((isset($context["endPage"]) ? $context["endPage"] : null) + 2))) {
                        // line 46
                        echo "                        <li class=\"unavailable\">
                            <a href=\"#\">&hellip;</a>
                        </li>
                    ";
                    } else {
                        // line 50
                        echo "                        <li>
                            <a class=\"page\" href=\"";
                        // line 51
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => ((isset($context["pageCount"]) ? $context["pageCount"] : null) - 1)))), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, ((isset($context["pageCount"]) ? $context["pageCount"] : null) - 1), "html", null, true);
                        echo "</a>
                        </li>
                    ";
                    }
                    // line 54
                    echo "                ";
                }
                // line 55
                echo "                <li>
                    <a class=\"page\" href=\"";
                // line 56
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["pageCount"]) ? $context["pageCount"] : null)))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["pageCount"]) ? $context["pageCount"] : null), "html", null, true);
                echo "</a>
                </li>
            ";
            }
            // line 59
            echo "
            ";
            // line 60
            if (array_key_exists("next", $context)) {
                // line 61
                echo "                <li class=\"arrow\">
                    <a class=\"page\" title=\"Vai avanti\" href=\"";
                // line 62
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["next"]) ? $context["next"] : null)))), "html", null, true);
                echo "\">
                        &raquo;</a>
                </li>
            ";
            } else {
                // line 66
                echo "                <li class=\"arrow unavailable\">
                    <a href=\"#\">&raquo;</a>
                </li>
            ";
            }
            // line 70
            echo "        </ul>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Default:paginator.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 70,  171 => 66,  164 => 62,  161 => 61,  159 => 60,  156 => 59,  148 => 56,  145 => 55,  142 => 54,  134 => 51,  131 => 50,  125 => 46,  122 => 45,  119 => 44,  117 => 43,  114 => 42,  107 => 40,  101 => 37,  98 => 36,  90 => 33,  87 => 32,  84 => 31,  80 => 30,  77 => 29,  74 => 28,  68 => 24,  66 => 23,  61 => 21,  58 => 20,  56 => 19,  51 => 17,  48 => 16,  46 => 15,  43 => 14,  37 => 10,  31 => 7,  28 => 6,  26 => 5,  21 => 2,  19 => 1,);
    }
}
/* {% if pageCount > 1 %}*/
/*     <div class="pagination-centered">*/
/*         <ul class="pagination">*/
/* */
/*             {% if previous is defined %}*/
/*                 <li class="arrow">*/
/*                     <a class="page" title="Torna indietro" href="{{ path(route, query|merge({(pageParameterName): previous})) }}">&laquo;</a>*/
/*                 </li>*/
/*             {% else %}*/
/*                 <li class="arrow unavailable">*/
/*                     <a href="#">&laquo;</a>*/
/*                 </li>*/
/*             {% endif %}*/
/* */
/*             {% if startPage > 1 %}*/
/*                 <li>*/
/*                     <a class="page" href="{{ path(route, query|merge({(pageParameterName): 1})) }}">1</a>*/
/*                 </li>*/
/*                 {% if startPage == 3 %}*/
/*                     <li>*/
/*                         <a class="page" href="{{ path(route, query|merge({(pageParameterName): 2})) }}">2</a>*/
/*                     </li>*/
/*                 {% elseif startPage != 2 %}*/
/*                     <li class="unavailable">*/
/*                         <span>&hellip;</span>*/
/*                     </li>*/
/*                 {% endif %}*/
/*             {% endif %}*/
/* */
/*             {% for page in pagesInRange %}*/
/*                 {% if page != current %}*/
/*                     <li>*/
/*                         <a class="page" href="{{ path(route, query|merge({(pageParameterName): page})) }}">{{ page }}</a>*/
/*                     </li>*/
/*                 {% else %}*/
/*                     <li class="current">*/
/*                         <a href="#">{{ page }}</a>*/
/*                     </li>*/
/*                 {% endif %}*/
/* */
/*             {% endfor %}*/
/* */
/*             {% if pageCount > endPage %}*/
/*                 {% if pageCount > (endPage + 1) %}*/
/*                     {% if pageCount > (endPage + 2) %}*/
/*                         <li class="unavailable">*/
/*                             <a href="#">&hellip;</a>*/
/*                         </li>*/
/*                     {% else %}*/
/*                         <li>*/
/*                             <a class="page" href="{{ path(route, query|merge({(pageParameterName): (pageCount - 1)})) }}">{{ pageCount -1 }}</a>*/
/*                         </li>*/
/*                     {% endif %}*/
/*                 {% endif %}*/
/*                 <li>*/
/*                     <a class="page" href="{{ path(route, query|merge({(pageParameterName): pageCount})) }}">{{ pageCount }}</a>*/
/*                 </li>*/
/*             {% endif %}*/
/* */
/*             {% if next is defined %}*/
/*                 <li class="arrow">*/
/*                     <a class="page" title="Vai avanti" href="{{ path(route, query|merge({(pageParameterName): next})) }}">*/
/*                         &raquo;</a>*/
/*                 </li>*/
/*             {% else %}*/
/*                 <li class="arrow unavailable">*/
/*                     <a href="#">&raquo;</a>*/
/*                 </li>*/
/*             {% endif %}*/
/*         </ul>*/
/*     </div>*/
/* {% endif %}*/
