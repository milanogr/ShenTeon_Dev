<?php

/* @GdrGame/Letter/list.html.twig */
class __TwigTemplate_5e2febb5c5b4be48b395ddfc778ecb4cc659dcb3d2fb33fea1c7c1bd16eda572 extends Twig_Template
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
        $context["isAdmin"] = $this->env->getExtension('security')->isGranted("ROLE_ADMIN");
        // line 2
        echo "
<div class=\"text-centered\" style=\"margin-bottom: 15px\">
    ";
        // line 4
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
        echo "
</div>


<table id=\"lista-missive\" class=\"spaced\">
    <tr class=\"dark\">
        <th class=\"number\">Nr.</th>
        <th class=\"sender\">Mittente</th>
        <th class=\"category\">Ambito</th>
        <th class=\"date\">Data ed ora</th>
        <th class=\"preview\">Anteprima</th>
        <th>Converti</th>
        <th class=\"delete\"><input type=\"checkbox\" id=\"letter-select-all\" title=\"Seleziona tutte\"></th>
    </tr>

    <form action=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("missive-delete", array("page" => (isset($context["page"]) ? $context["page"] : null))), "html", null, true);
        echo "\" method=\"POST\" id=\"letter-delete-form\">
        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginator"]) ? $context["paginator"] : null));
        $context['_iterated'] = false;
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
        foreach ($context['_seq'] as $context["_key"] => $context["letter"]) {
            // line 21
            echo "            <tr ";
            if (($this->getAttribute($context["letter"], "isRead", array()) == false)) {
                echo " class=\"to-read\" ";
            }
            echo ">
                <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "getTotalItemCount", array()), "html", null, true);
            echo "</td>
                <td>
                    ";
            // line 24
            if ($this->getAttribute($context["letter"], "nameAsAdmin", array())) {
                // line 25
                echo "                        <strong>GESTIONE</strong> ";
                if ((isset($context["isAdmin"]) ? $context["isAdmin"] : null)) {
                    echo "<abbr
                            title=\"Solo per Gestori\"> ";
                    // line 26
                    echo twig_escape_filter($this->env, $this->getAttribute($context["letter"], "senderName", array()), "html", null, true);
                    echo "</abbr>";
                }
                // line 27
                echo "                    ";
            } elseif ($this->getAttribute($context["letter"], "nameAsMod", array())) {
                // line 28
                echo "                        <strong>MODERAZIONE</strong>";
                if ((isset($context["isAdmin"]) ? $context["isAdmin"] : null)) {
                    echo "<abbr
                            title=\"Solo per Gestori\"> ";
                    // line 29
                    echo twig_escape_filter($this->env, $this->getAttribute($context["letter"], "senderName", array()), "html", null, true);
                    echo "</abbr>";
                }
                // line 30
                echo "                    ";
            } elseif ($this->getAttribute($context["letter"], "nameAsFate", array())) {
                // line 31
                echo "                        <strong>FATO</strong>";
                if ((isset($context["isAdmin"]) ? $context["isAdmin"] : null)) {
                    echo "<abbr
                            title=\"Solo per Gestori\"> ";
                    // line 32
                    echo twig_escape_filter($this->env, $this->getAttribute($context["letter"], "senderName", array()), "html", null, true);
                    echo "</abbr>";
                }
                // line 33
                echo "                    ";
            } elseif ((null === $this->getAttribute($context["letter"], "sender", array()))) {
                // line 34
                echo "                        ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["letter"], "senderName", array()), "html", null, true);
                echo "
                    ";
            } else {
                // line 36
                echo "                        ";
                if ($this->getAttribute($context["letter"], "senderRaceIcon", array())) {
                    // line 37
                    echo "                            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => $this->getAttribute($context["letter"], "senderName", array()))), "html", null, true);
                    echo "\">
                                <img title=\"";
                    // line 38
                    echo twig_escape_filter($this->env, $this->getAttribute($context["letter"], "senderRaceName", array()), "html", null, true);
                    echo "\" class=\"gdrtooltip\"
                                     src=\"";
                    // line 39
                    echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute($context["letter"], "senderRaceIcon", array())), "html", null, true);
                    echo "\">
                            </a>
                        ";
                }
                // line 42
                echo "                        ";
                if ($this->getAttribute($context["letter"], "senderLevelIcon", array())) {
                    // line 43
                    echo "                            <img title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["letter"], "senderRankName", array()), "html", null, true);
                    echo "\" class=\"gdrtooltip\"
                                 src=\"";
                    // line 44
                    echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("enclave") . $this->getAttribute($context["letter"], "senderLevelIcon", array())), "html", null, true);
                    echo "\">
                        ";
                } else {
                    // line 46
                    echo "                            <img title=\"Appartenenza ad Enclavi sconosciuta\"
                                 src=\"";
                    // line 47
                    echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/no-enclave.png"), "html", null, true);
                    echo "\"
                                 class=\"gdrtooltip\">
                        ";
                }
                // line 50
                echo "                        ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["letter"], "senderName", array()), "html", null, true);
                echo "
                    ";
            }
            // line 52
            echo "                </td>
                <td class=\"text-centered\">";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["categories"]) ? $context["categories"] : null), $this->getAttribute($context["letter"], "category", array()), array(), "array"), "html", null, true);
            echo "</td>
                <td class=\"date\">";
            // line 54
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["letter"], "createdAt", array()), "d/m/y H.i"), "html", null, true);
            echo "</td>
                <td>
                    <a class=\"show-letter\"
                       data-href=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("missive-show", array("id" => $this->getAttribute($context["letter"], "id", array()))), "html", null, true);
            echo "\">
                        ";
            // line 58
            if ($this->getAttribute($context["letter"], "special", array())) {
                // line 59
                echo "                            <span>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["letter"], "special", array()), "html", null, true);
                echo ": </span>
                            ";
                // line 60
                echo $this->env->getExtension('text_extension')->truncateFilter(strip_tags($this->getAttribute($context["letter"], "body", array())), 40);
                echo "
                        ";
            } else {
                // line 62
                echo "                            ";
                echo $this->env->getExtension('text_extension')->truncateFilter(strip_tags($this->getAttribute($context["letter"], "body", array())), 60);
                echo "
                        ";
            }
            // line 64
            echo "                    </a>
                </td>
                <td class=\"converti\">
                    ";
            // line 67
            if (($this->getAttribute($context["letter"], "category", array()) == 0)) {
                // line 68
                echo "                        <button data-href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("missive-convert", array("id" => $this->getAttribute($context["letter"], "id", array()))), "html", null, true);
                echo "\" class=\"convert small\">Crea
                            oggetto
                        </button>
                    ";
            } else {
                // line 72
                echo "                        <button class=\"small disabled gdrtooltip\" disabled=\"disabled\"
                                title=\"Possono essere convertite solo le Missive di ambito ON\">Crea oggetto
                        </button>
                    ";
            }
            // line 76
            echo "                </td>
                <td class=\"text-centered\">
                    <input class=\"missiva-id\" type=\"checkbox\" name=\"missiva[]\" value=\"";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute($context["letter"], "id", array()), "html", null, true);
            echo "\">
                </td>
            </tr>
        ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 82
            echo "            <tr>
                <td colspan=\"6\" class=\"text-center\">Non hai ricevuto nessuna missiva.</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['letter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        echo "    </form>

</table>
<div class=\"text-centered\" style=\"margin-bottom: 15px\">
    ";
        // line 90
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "@GdrGame/Letter/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  261 => 90,  255 => 86,  246 => 82,  229 => 78,  225 => 76,  219 => 72,  211 => 68,  209 => 67,  204 => 64,  198 => 62,  193 => 60,  188 => 59,  186 => 58,  182 => 57,  176 => 54,  172 => 53,  169 => 52,  163 => 50,  157 => 47,  154 => 46,  149 => 44,  144 => 43,  141 => 42,  135 => 39,  131 => 38,  126 => 37,  123 => 36,  117 => 34,  114 => 33,  110 => 32,  105 => 31,  102 => 30,  98 => 29,  93 => 28,  90 => 27,  86 => 26,  81 => 25,  79 => 24,  72 => 22,  65 => 21,  47 => 20,  43 => 19,  25 => 4,  21 => 2,  19 => 1,);
    }
}
/* {% set isAdmin = is_granted('ROLE_ADMIN') %}*/
/* */
/* <div class="text-centered" style="margin-bottom: 15px">*/
/*     {{ knp_pagination_render(paginator) }}*/
/* </div>*/
/* */
/* */
/* <table id="lista-missive" class="spaced">*/
/*     <tr class="dark">*/
/*         <th class="number">Nr.</th>*/
/*         <th class="sender">Mittente</th>*/
/*         <th class="category">Ambito</th>*/
/*         <th class="date">Data ed ora</th>*/
/*         <th class="preview">Anteprima</th>*/
/*         <th>Converti</th>*/
/*         <th class="delete"><input type="checkbox" id="letter-select-all" title="Seleziona tutte"></th>*/
/*     </tr>*/
/* */
/*     <form action="{{ path('missive-delete', {'page': page}) }}" method="POST" id="letter-delete-form">*/
/*         {% for letter in paginator %}*/
/*             <tr {% if letter.isRead == false %} class="to-read" {% endif %}>*/
/*                 <td>{{ loop.index }}/{{ paginator.getTotalItemCount }}</td>*/
/*                 <td>*/
/*                     {% if letter.nameAsAdmin %}*/
/*                         <strong>GESTIONE</strong> {% if isAdmin %}<abbr*/
/*                             title="Solo per Gestori"> {{ letter.senderName }}</abbr>{% endif %}*/
/*                     {% elseif letter.nameAsMod %}*/
/*                         <strong>MODERAZIONE</strong>{% if isAdmin %}<abbr*/
/*                             title="Solo per Gestori"> {{ letter.senderName }}</abbr>{% endif %}*/
/*                     {% elseif letter.nameAsFate %}*/
/*                         <strong>FATO</strong>{% if isAdmin %}<abbr*/
/*                             title="Solo per Gestori"> {{ letter.senderName }}</abbr>{% endif %}*/
/*                     {% elseif letter.sender is null %}*/
/*                         {{ letter.senderName }}*/
/*                     {% else %}*/
/*                         {% if letter.senderRaceIcon %}*/
/*                             <a href="{{ path('avatar-index', {name: letter.senderName}) }}">*/
/*                                 <img title="{{ letter.senderRaceName }}" class="gdrtooltip"*/
/*                                      src="{{ uploadPath('race') ~ letter.senderRaceIcon }}">*/
/*                             </a>*/
/*                         {% endif %}*/
/*                         {% if letter.senderLevelIcon %}*/
/*                             <img title="{{ letter.senderRankName }}" class="gdrtooltip"*/
/*                                  src="{{ uploadPath('enclave') ~ letter.senderLevelIcon }}">*/
/*                         {% else %}*/
/*                             <img title="Appartenenza ad Enclavi sconosciuta"*/
/*                                  src="{{ asset('bundles/gdrgame/images/chat/no-enclave.png') }}"*/
/*                                  class="gdrtooltip">*/
/*                         {% endif %}*/
/*                         {{ letter.senderName }}*/
/*                     {% endif %}*/
/*                 </td>*/
/*                 <td class="text-centered">{{ categories[letter.category] }}</td>*/
/*                 <td class="date">{{ letter.createdAt|date('d/m/y H.i') }}</td>*/
/*                 <td>*/
/*                     <a class="show-letter"*/
/*                        data-href="{{ path('missive-show', { 'id': letter.id }) }}">*/
/*                         {% if letter.special %}*/
/*                             <span>{{ letter.special }}: </span>*/
/*                             {{ letter.body|striptags|truncate(40)|raw }}*/
/*                         {% else %}*/
/*                             {{ letter.body|striptags|truncate(60)|raw }}*/
/*                         {% endif %}*/
/*                     </a>*/
/*                 </td>*/
/*                 <td class="converti">*/
/*                     {% if letter.category == 0 %}*/
/*                         <button data-href="{{ path('missive-convert', {id: letter.id}) }}" class="convert small">Crea*/
/*                             oggetto*/
/*                         </button>*/
/*                     {% else %}*/
/*                         <button class="small disabled gdrtooltip" disabled="disabled"*/
/*                                 title="Possono essere convertite solo le Missive di ambito ON">Crea oggetto*/
/*                         </button>*/
/*                     {% endif %}*/
/*                 </td>*/
/*                 <td class="text-centered">*/
/*                     <input class="missiva-id" type="checkbox" name="missiva[]" value="{{ letter.id }}">*/
/*                 </td>*/
/*             </tr>*/
/*         {% else %}*/
/*             <tr>*/
/*                 <td colspan="6" class="text-center">Non hai ricevuto nessuna missiva.</td>*/
/*             </tr>*/
/*         {% endfor %}*/
/*     </form>*/
/* */
/* </table>*/
/* <div class="text-centered" style="margin-bottom: 15px">*/
/*     {{ knp_pagination_render(paginator) }}*/
/* </div>*/
/* */
