<?php

/* @GdrAvatar/Mod/lastRegistered.html.twig */
class __TwigTemplate_13601fe9be9707782aea5f9ad67637898e6a4c40606f2f93d3bb5c8b30993ca4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "@GdrAvatar/Mod/lastRegistered.html.twig", 1);
        $this->blocks = array(
            'goBack' => array($this, 'block_goBack'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GdrGameBundle:Default:innerContent.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_goBack($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Location:renderGoBack"));
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
    <div class=\"page-mod\">

        <h2><span>Moderazione - Ultimi iscritti</span></h2>

        <div class=\"form-centered centered-form\">

            <p class=\"text-centered\">Questa lista fornisce una panoramica sui personaggi creati negli ultimi 14 giorni.</p>

            <table class=\"spaced\">
                <tr class=\"dark\">
                    <th>Personaggio</th>
                    <th>Creato il</th>
                    <th>Scrivi</th>
                </tr>
                ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["personages"]) ? $context["personages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["personage"]) {
            // line 24
            echo "                    <tr>
                        <td class=\"dark\">
                            <strong>
                                <a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-index", array("name" => $this->getAttribute($this->getAttribute($context["personage"], 0, array()), "name", array()))), "html", null, true);
            echo "\">
                                    ";
            // line 28
            if (($this->getAttribute($this->getAttribute($context["personage"], 0, array()), "gender", array()) == 1)) {
                // line 29
                echo "                                        <img title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["personage"], 0, array()), "race", array()), "name", array()), "html", null, true);
                echo "\" src=\"";
                echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute($context["personage"], "raceMaleIcon", array())), "html", null, true);
                echo "\">
                                    ";
            } else {
                // line 31
                echo "                                        <img title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["personage"], 0, array()), "race", array()), "name", array()), "html", null, true);
                echo "\" src=\"";
                echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute($context["personage"], "raceFemaleIcon", array())), "html", null, true);
                echo "\">
                                    ";
            }
            // line 33
            echo "                                </a>
                                ";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["personage"], 0, array()), "name", array()), "html", null, true);
            echo "
                            </strong>
                        </td>
                        <td>";
            // line 37
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["personage"], 0, array()), "createdAt", array()), "d/m/Y"), "html", null, true);
            echo "</td>
                        <td class=\"text-centered\"><a href=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("missive-create", array("name" => $this->getAttribute($this->getAttribute($context["personage"], 0, array()), "name", array()))), "html", null, true);
            echo "\">Scrivi</a> </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['personage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "            </table>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "@GdrAvatar/Mod/lastRegistered.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 41,  103 => 38,  99 => 37,  93 => 34,  90 => 33,  82 => 31,  74 => 29,  72 => 28,  68 => 27,  63 => 24,  59 => 23,  42 => 8,  39 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Default:innerContent.html.twig' %}*/
/* */
/* {% block goBack %}*/
/*     {{ render(controller('GdrGameBundle:Location:renderGoBack')) }}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     <div class="page-mod">*/
/* */
/*         <h2><span>Moderazione - Ultimi iscritti</span></h2>*/
/* */
/*         <div class="form-centered centered-form">*/
/* */
/*             <p class="text-centered">Questa lista fornisce una panoramica sui personaggi creati negli ultimi 14 giorni.</p>*/
/* */
/*             <table class="spaced">*/
/*                 <tr class="dark">*/
/*                     <th>Personaggio</th>*/
/*                     <th>Creato il</th>*/
/*                     <th>Scrivi</th>*/
/*                 </tr>*/
/*                 {% for personage in personages %}*/
/*                     <tr>*/
/*                         <td class="dark">*/
/*                             <strong>*/
/*                                 <a href="{{ url('avatar-index', {name: personage.0.name}) }}">*/
/*                                     {% if personage.0.gender == 1 %}*/
/*                                         <img title="{{ personage.0.race.name }}" src="{{ uploadPath('race') ~ personage.raceMaleIcon }}">*/
/*                                     {% else %}*/
/*                                         <img title="{{ personage.0.race.name }}" src="{{ uploadPath('race') ~ personage.raceFemaleIcon }}">*/
/*                                     {% endif %}*/
/*                                 </a>*/
/*                                 {{ personage.0.name }}*/
/*                             </strong>*/
/*                         </td>*/
/*                         <td>{{ personage.0.createdAt|date("d/m/Y") }}</td>*/
/*                         <td class="text-centered"><a href="{{ path("missive-create", {name: personage.0.name}) }}">Scrivi</a> </td>*/
/*                     </tr>*/
/*                 {% endfor %}*/
/*             </table>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
