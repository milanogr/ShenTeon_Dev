<?php

/* GdrGameBundle:Grave:showFamily.html.twig */
class __TwigTemplate_ea71c24cca589202824521eac7e24fe866de512ddbef39dd41041313fcf4fe74 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Grave:showFamily.html.twig", 1);
        $this->blocks = array(
            'goBack' => array($this, 'block_goBack'),
            'javascripts' => array($this, 'block_javascripts'),
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
    public function block_javascripts($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"cimitero-container\">

        <p class=\"text-centered\">In questo luogo, nel silenzio delle lapidi, delle edicole e dei vialetti, riposano le
            spoglie di coloro che muoiono a Teon. <br>
            Una visita a quest'ultimo lido equivale ad un viaggio nella storia di tutti noi.
        </p>

        <a href=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("cimitero-index");
        echo "\" class=\"button right\">Torna all'Entrata del Cimitero</a>

        <h3>Tombe di Famiglia</h3>
        ";
        // line 22
        $context["cognome"] = null;
        // line 23
        echo "
        ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginator"]) ? $context["paginator"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["grave"]) {
            // line 25
            echo "
        ";
            // line 26
            $context["isChanged"] = false;
            // line 27
            echo "        ";
            if (((isset($context["cognome"]) ? $context["cognome"] : null) != $this->getAttribute($context["grave"], "getSurname", array()))) {
                // line 28
                echo "            ";
                $context["cognome"] = $this->getAttribute($context["grave"], "getSurname", array());
                // line 29
                echo "            ";
                $context["isChanged"] = true;
                // line 30
                echo "        ";
            }
            // line 31
            echo "
        ";
            // line 32
            if (($this->getAttribute($context["loop"], "first", array()) == 1)) {
                // line 33
                echo "        <table class=\"spaced\">
        <tr>
            <td style=\"width: 250px !important\" class=\"dark cognome\"><strong>";
                // line 35
                echo twig_escape_filter($this->env, (isset($context["cognome"]) ? $context["cognome"] : null), "html", null, true);
                echo "</strong></td>
            <td class=\"date\">Data di morte</td>
            <td class=\"epitaffio\">Epitaffio</td>
        </tr>
    ";
            } elseif (            // line 39
(isset($context["isChanged"]) ? $context["isChanged"] : null)) {
                // line 40
                echo "    </table>
        <table class=\"spaced\">
            <tr>
                <td style=\"width: 250px !important\" class=\"dark nome\"><strong>";
                // line 43
                echo twig_escape_filter($this->env, (isset($context["cognome"]) ? $context["cognome"] : null), "html", null, true);
                echo "</strong></td>
                <td class=\"date\">Data di morte</td>
                <td class=\"epitaffio\">Epitaffio</td>
            </tr>
            ";
            }
            // line 48
            echo "            <tr>
                <td class=\"nome dark\"><strong>";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute($context["grave"], "getNickname", array()), "html", null, true);
            echo "</strong></td>
                <td class=\"date\">";
            // line 50
            echo twig_escape_filter($this->env, $this->env->getExtension('teon_date_extension')->teonDateFilter(twig_date_format_filter($this->env, $this->getAttribute($context["grave"], "getDeathAt", array()), "d/m/Y")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["grave"], "typeYear", array()), "html", null, true);
            echo "</td>
                <td class=\"epitaffio\">";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute($context["grave"], "getMessage", array()), "html", null, true);
            echo "</td>
            </tr>
            ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['grave'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "        </table>
        ";
        // line 55
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
        echo "
    </div>

";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Grave:showFamily.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 55,  168 => 54,  151 => 51,  145 => 50,  141 => 49,  138 => 48,  130 => 43,  125 => 40,  123 => 39,  116 => 35,  112 => 33,  110 => 32,  107 => 31,  104 => 30,  101 => 29,  98 => 28,  95 => 27,  93 => 26,  90 => 25,  73 => 24,  70 => 23,  68 => 22,  62 => 19,  53 => 12,  50 => 11,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Default:innerContent.html.twig' %}*/
/* */
/* {% block goBack %}*/
/*     {{ render(controller('GdrGameBundle:Location:renderGoBack')) }}*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/*     <div class="cimitero-container">*/
/* */
/*         <p class="text-centered">In questo luogo, nel silenzio delle lapidi, delle edicole e dei vialetti, riposano le*/
/*             spoglie di coloro che muoiono a Teon. <br>*/
/*             Una visita a quest'ultimo lido equivale ad un viaggio nella storia di tutti noi.*/
/*         </p>*/
/* */
/*         <a href="{{ path("cimitero-index") }}" class="button right">Torna all'Entrata del Cimitero</a>*/
/* */
/*         <h3>Tombe di Famiglia</h3>*/
/*         {% set cognome = null %}*/
/* */
/*         {% for grave in paginator %}*/
/* */
/*         {% set isChanged = false %}*/
/*         {% if (cognome != grave.getSurname) %}*/
/*             {% set cognome = grave.getSurname %}*/
/*             {% set isChanged = true %}*/
/*         {% endif %}*/
/* */
/*         {% if(loop.first == 1) %}*/
/*         <table class="spaced">*/
/*         <tr>*/
/*             <td style="width: 250px !important" class="dark cognome"><strong>{{ cognome }}</strong></td>*/
/*             <td class="date">Data di morte</td>*/
/*             <td class="epitaffio">Epitaffio</td>*/
/*         </tr>*/
/*     {% elseif isChanged %}*/
/*     </table>*/
/*         <table class="spaced">*/
/*             <tr>*/
/*                 <td style="width: 250px !important" class="dark nome"><strong>{{ cognome }}</strong></td>*/
/*                 <td class="date">Data di morte</td>*/
/*                 <td class="epitaffio">Epitaffio</td>*/
/*             </tr>*/
/*             {% endif %}*/
/*             <tr>*/
/*                 <td class="nome dark"><strong>{{ grave.getNickname }}</strong></td>*/
/*                 <td class="date">{{ grave.getDeathAt|date("d/m/Y")|teon_date() }} {{ grave.typeYear }}</td>*/
/*                 <td class="epitaffio">{{ grave.getMessage }}</td>*/
/*             </tr>*/
/*             {% endfor %}*/
/*         </table>*/
/*         {{ knp_pagination_render(paginator) }}*/
/*     </div>*/
/* */
/* {% endblock %}*/
