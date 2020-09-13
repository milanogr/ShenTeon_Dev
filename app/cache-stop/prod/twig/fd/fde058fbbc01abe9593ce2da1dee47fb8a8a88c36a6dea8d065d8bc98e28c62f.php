<?php

/* GdrGameBundle:Enclave:show.html.twig */
class __TwigTemplate_3af0cad4186b64598be8ce29150a7779f1de9a35319ecb385b0b8a848d899e7b extends Twig_Template
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
        echo "<tr>
    <td class=\"enclave-members\">
        <h2>";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["enclave"]) ? $context["enclave"] : null), 0, array(), "array"), "name", array()), "html", null, true);
        echo "</h2>
        <ul>
            ";
        // line 5
        $context["lastRank"] = null;
        // line 6
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["enclave"]) ? $context["enclave"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
            // line 7
            echo "            ";
            if (((isset($context["lastRank"]) ? $context["lastRank"] : null) != $this->getAttribute($context["e"], "rankName", array()))) {
                // line 8
                echo "            ";
                if (($this->getAttribute($context["loop"], "first", array()) == false)) {
                    // line 9
                    echo "        </ul>
        ";
                }
                // line 11
                echo "        <li>
            ";
                // line 12
                if (($this->getAttribute($context["e"], "isClan", array()) == false)) {
                    // line 13
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("enclave") . $this->getAttribute($context["e"], "levelIcon", array())), "html", null, true);
                    echo "\">
            ";
                }
                // line 15
                echo "            <img src=\"";
                echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("enclave") . $this->getAttribute($context["e"], "rankIcon", array())), "html", null, true);
                echo "\">
            <span class=\"rank-name\">";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute($context["e"], "rankName", array()), "html", null, true);
                echo "</span>
        </li>
        <ul class=\"";
                // line 18
                if (($this->getAttribute($context["e"], "isClan", array()) == true)) {
                    echo "clan";
                }
                echo "\">
            ";
            }
            // line 20
            echo "
            <li class=\"pg-name\">
                ";
            // line 22
            if ($this->getAttribute($context["e"], "pgName", array())) {
                // line 23
                echo "                    ";
                // line 24
                echo "                    ";
                $context["hideMe"] = false;
                // line 25
                echo "                    ";
                if ((($this->getAttribute($context["e"], "isClan", array()) == true) && ($this->getAttribute($context["e"], "pgHideClan", array()) == true))) {
                    // line 26
                    echo "                        ";
                    $context["hideMe"] = true;
                    // line 27
                    echo "                    ";
                } elseif ((($this->getAttribute($context["e"], "isClan", array()) == false) && ($this->getAttribute($context["e"], "pgHideEnclave", array()) == true))) {
                    // line 28
                    echo "                        ";
                    $context["hideMe"] = true;
                    // line 29
                    echo "                    ";
                }
                // line 30
                echo "
                    ";
                // line 31
                if ((isset($context["hideMe"]) ? $context["hideMe"] : null)) {
                    // line 32
                    echo "                        ";
                    if ((isset($context["isMyEnclave"]) ? $context["isMyEnclave"] : null)) {
                        // line 33
                        echo "                            <abbr title=\"Visibile solo agli appartenenti di Enclave\">
                                ";
                        // line 34
                        if (($this->getAttribute($context["e"], "pgGender", array()) == 1)) {
                            // line 35
                            echo "                                    <a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => $this->getAttribute($context["e"], "pgName", array()))), "html", null, true);
                            echo "\">
                                        <img src=\"";
                            // line 36
                            echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute($context["e"], "raceMaleIcon", array())), "html", null, true);
                            echo "\">
                                        ";
                            // line 37
                            echo twig_escape_filter($this->env, $this->getAttribute($context["e"], "pgName", array()), "html", null, true);
                            echo " (Ignoto)
                                    </a>
                                ";
                        } else {
                            // line 40
                            echo "                                    <a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => $this->getAttribute($context["e"], "pgName", array()))), "html", null, true);
                            echo "\">
                                        <img src=\"";
                            // line 41
                            echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute($context["e"], "raceFemaleIcon", array())), "html", null, true);
                            echo "\">
                                        ";
                            // line 42
                            echo twig_escape_filter($this->env, $this->getAttribute($context["e"], "pgName", array()), "html", null, true);
                            echo " (Ignoto)
                                    </a>
                                ";
                        }
                        // line 45
                        echo "                            </abbr>
                        ";
                    } else {
                        // line 47
                        echo "                            <i class=\"ignote\">Ignoto</i>
                        ";
                    }
                    // line 49
                    echo "                    ";
                } else {
                    // line 50
                    echo "                        ";
                    if (($this->getAttribute($context["e"], "pgGender", array()) == 1)) {
                        // line 51
                        echo "                            <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => $this->getAttribute($context["e"], "pgName", array()))), "html", null, true);
                        echo "\">
                                <img src=\"";
                        // line 52
                        echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute($context["e"], "raceMaleIcon", array())), "html", null, true);
                        echo "\">
                                ";
                        // line 53
                        echo twig_escape_filter($this->env, $this->getAttribute($context["e"], "pgName", array()), "html", null, true);
                        echo "
                            </a>
                        ";
                    } else {
                        // line 56
                        echo "                            <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => $this->getAttribute($context["e"], "pgName", array()))), "html", null, true);
                        echo "\">
                                <img src=\"";
                        // line 57
                        echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute($context["e"], "raceFemaleIcon", array())), "html", null, true);
                        echo "\">
                                ";
                        // line 58
                        echo twig_escape_filter($this->env, $this->getAttribute($context["e"], "pgName", array()), "html", null, true);
                        echo "
                            </a>
                        ";
                    }
                    // line 61
                    echo "                    ";
                }
                // line 62
                echo "                ";
            }
            // line 63
            echo "            </li>

            ";
            // line 66
            echo "            ";
            if ($this->getAttribute($context["loop"], "last", array())) {
                // line 67
                echo "        </ul>
        ";
            }
            // line 69
            echo "
        ";
            // line 70
            $context["lastRank"] = $this->getAttribute($context["e"], "rankName", array());
            // line 71
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "        </ul>
    </td>
    <td class=\"enclave-info\">

        <img src=\"";
        // line 76
        echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("enclave") . $this->getAttribute($this->getAttribute((isset($context["enclave"]) ? $context["enclave"] : null), 0, array(), "array"), "bannerName", array())), "html", null, true);
        echo "\">

        <a href=\"#\" data-href=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enclave-statute", array("id" => $this->getAttribute($this->getAttribute((isset($context["enclave"]) ? $context["enclave"] : null), 0, array(), "array"), "id", array()))), "html", null, true);
        echo "\" title=\"Leggi la Licenza Statutaria\" class=\"show-statute\">
            ";
        // line 79
        if ($this->getAttribute($this->getAttribute((isset($context["enclave"]) ? $context["enclave"] : null), 0, array(), "array"), "notOfficial", array())) {
            // line 80
            echo "                Statuto
            ";
        } else {
            // line 82
            echo "                Licenza Statutaria
            ";
        }
        // line 84
        echo "        </a>

        ";
        // line 86
        if ($this->getAttribute($this->getAttribute((isset($context["enclave"]) ? $context["enclave"] : null), 0, array(), "array"), "annex", array())) {
            // line 87
            echo "            <a href=\"#\" data-href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enclave-annex", array("id" => $this->getAttribute($this->getAttribute((isset($context["enclave"]) ? $context["enclave"] : null), 0, array(), "array"), "id", array()))), "html", null, true);
            echo "\" title=\"Appendice alla Statutaria\" class=\"show-annex\">
                Appendice alla Licenza Statutaria
            </a>
        ";
        }
        // line 91
        echo "    </td>
</tr>
<tr>
    <td colspan=\"2\" style=\"text-align: center; padding-bottom: 7px\">
        <a href=\"#\" data-restore-list >CHIUDI DETTAGLI</a>
    </td>
</tr>";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Enclave:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  274 => 91,  266 => 87,  264 => 86,  260 => 84,  256 => 82,  252 => 80,  250 => 79,  246 => 78,  241 => 76,  235 => 72,  221 => 71,  219 => 70,  216 => 69,  212 => 67,  209 => 66,  205 => 63,  202 => 62,  199 => 61,  193 => 58,  189 => 57,  184 => 56,  178 => 53,  174 => 52,  169 => 51,  166 => 50,  163 => 49,  159 => 47,  155 => 45,  149 => 42,  145 => 41,  140 => 40,  134 => 37,  130 => 36,  125 => 35,  123 => 34,  120 => 33,  117 => 32,  115 => 31,  112 => 30,  109 => 29,  106 => 28,  103 => 27,  100 => 26,  97 => 25,  94 => 24,  92 => 23,  90 => 22,  86 => 20,  79 => 18,  74 => 16,  69 => 15,  63 => 13,  61 => 12,  58 => 11,  54 => 9,  51 => 8,  48 => 7,  30 => 6,  28 => 5,  23 => 3,  19 => 1,);
    }
}
/* <tr>*/
/*     <td class="enclave-members">*/
/*         <h2>{{ enclave[0].name }}</h2>*/
/*         <ul>*/
/*             {% set lastRank = null %}*/
/*             {% for e in enclave %}*/
/*             {% if lastRank != e.rankName %}*/
/*             {% if loop.first == false %}*/
/*         </ul>*/
/*         {% endif %}*/
/*         <li>*/
/*             {% if e.isClan == false %}*/
/*                 <img src="{{ uploadPath('enclave') ~ e.levelIcon }}">*/
/*             {% endif %}*/
/*             <img src="{{ uploadPath('enclave') ~ e.rankIcon }}">*/
/*             <span class="rank-name">{{ e.rankName }}</span>*/
/*         </li>*/
/*         <ul class="{% if e.isClan == true %}clan{% endif %}">*/
/*             {% endif %}*/
/* */
/*             <li class="pg-name">*/
/*                 {% if e.pgName %}*/
/*                     {# Nascondo il pg? #}*/
/*                     {% set hideMe = false %}*/
/*                     {% if e.isClan == true and e.pgHideClan == true %}*/
/*                         {% set hideMe = true %}*/
/*                     {% elseif e.isClan == false and e.pgHideEnclave == true %}*/
/*                         {% set hideMe = true %}*/
/*                     {% endif %}*/
/* */
/*                     {% if hideMe %}*/
/*                         {% if isMyEnclave %}*/
/*                             <abbr title="Visibile solo agli appartenenti di Enclave">*/
/*                                 {% if e.pgGender == 1 %}*/
/*                                     <a href="{{ path('avatar-index', {name: e.pgName}) }}">*/
/*                                         <img src="{{ uploadPath('race') ~ e.raceMaleIcon }}">*/
/*                                         {{ e.pgName }} (Ignoto)*/
/*                                     </a>*/
/*                                 {% else %}*/
/*                                     <a href="{{ path('avatar-index', {name: e.pgName}) }}">*/
/*                                         <img src="{{ uploadPath('race') ~ e.raceFemaleIcon }}">*/
/*                                         {{ e.pgName }} (Ignoto)*/
/*                                     </a>*/
/*                                 {% endif %}*/
/*                             </abbr>*/
/*                         {% else %}*/
/*                             <i class="ignote">Ignoto</i>*/
/*                         {% endif %}*/
/*                     {% else %}*/
/*                         {% if e.pgGender == 1 %}*/
/*                             <a href="{{ path('avatar-index', {name: e.pgName}) }}">*/
/*                                 <img src="{{ uploadPath('race') ~ e.raceMaleIcon }}">*/
/*                                 {{ e.pgName }}*/
/*                             </a>*/
/*                         {% else %}*/
/*                             <a href="{{ path('avatar-index', {name: e.pgName}) }}">*/
/*                                 <img src="{{ uploadPath('race') ~ e.raceFemaleIcon }}">*/
/*                                 {{ e.pgName }}*/
/*                             </a>*/
/*                         {% endif %}*/
/*                     {% endif %}*/
/*                 {% endif %}*/
/*             </li>*/
/* */
/*             {# Chiude la lista dei membri rimasta aperta #}*/
/*             {% if loop.last %}*/
/*         </ul>*/
/*         {% endif %}*/
/* */
/*         {% set lastRank = e.rankName %}*/
/*         {% endfor %}*/
/*         </ul>*/
/*     </td>*/
/*     <td class="enclave-info">*/
/* */
/*         <img src="{{ uploadPath('enclave') ~ enclave[0].bannerName }}">*/
/* */
/*         <a href="#" data-href="{{ path('enclave-statute', {id: enclave[0].id }) }}" title="Leggi la Licenza Statutaria" class="show-statute">*/
/*             {% if enclave[0].notOfficial %}*/
/*                 Statuto*/
/*             {% else %}*/
/*                 Licenza Statutaria*/
/*             {% endif %}*/
/*         </a>*/
/* */
/*         {% if enclave[0].annex %}*/
/*             <a href="#" data-href="{{ path('enclave-annex', {id: enclave[0].id }) }}" title="Appendice alla Statutaria" class="show-annex">*/
/*                 Appendice alla Licenza Statutaria*/
/*             </a>*/
/*         {% endif %}*/
/*     </td>*/
/* </tr>*/
/* <tr>*/
/*     <td colspan="2" style="text-align: center; padding-bottom: 7px">*/
/*         <a href="#" data-restore-list >CHIUDI DETTAGLI</a>*/
/*     </td>*/
/* </tr>*/
