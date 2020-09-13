<?php

/* GdrGameBundle:Grave:show.html.twig */
class __TwigTemplate_051ba81d15ef1d13f5ad9f80d02a42453d28c8c5561685a423af87b923b052e3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Grave:show.html.twig", 1);
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
        <h1><span>Cimitero</span></h1>

        <p class=\"text-centered\">
            <img src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/cimitero.jpg"), "html", null, true);
        echo "\">
        </p>

        <p class=\"text-centered\">In questo luogo, nel silenzio delle lapidi, delle edicole e dei vialetti, riposano le
            spoglie di coloro che muoiono a Teon. <br>
            Una visita a quest'ultimo lido equivale ad un viaggio nella storia di tutti noi.
        </p>

        <a href=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("cimitero-index");
        echo "\" class=\"button right\">Torna all'Entrata del Cimitero</a>
        <h3>Tombe</h3>
        <table class=\"spaced\">
            <tr class=\"dark\">
                <th>Nome</th>
                <th>Cognome</th>
                <th>Data di morte</th>
                <th>Epitaffio</th>
            </tr>

            ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginator"]) ? $context["paginator"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["grave"]) {
            // line 35
            echo "                <tr>
                    <td class=\"nome dark\">";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($context["grave"], "getNickname", array()), "html", null, true);
            echo "</td>
                    <td class=\"cognome\">";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($context["grave"], "surname", array()), "html", null, true);
            echo "</td>
                    <td class=\"date\">Morto/a il ";
            // line 38
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["grave"], "getDeathAt", array()), "d/m/Y"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["grave"], "typeYear", array()), "html", null, true);
            echo " a ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["grave"], "deathAge", array()), "html", null, true);
            echo " anni.</td>
                    <td class=\"epitaffio\">";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($context["grave"], "getMessage", array()), "html", null, true);
            echo "</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['grave'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "        </table>
        ";
        // line 43
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
        echo "
    </div>

";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Grave:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 43,  115 => 42,  106 => 39,  98 => 38,  94 => 37,  90 => 36,  87 => 35,  83 => 34,  70 => 24,  59 => 16,  53 => 12,  50 => 11,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  11 => 1,);
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
/*         <h1><span>Cimitero</span></h1>*/
/* */
/*         <p class="text-centered">*/
/*             <img src="{{ asset('bundles/gdrgame/images/cimitero.jpg') }}">*/
/*         </p>*/
/* */
/*         <p class="text-centered">In questo luogo, nel silenzio delle lapidi, delle edicole e dei vialetti, riposano le*/
/*             spoglie di coloro che muoiono a Teon. <br>*/
/*             Una visita a quest'ultimo lido equivale ad un viaggio nella storia di tutti noi.*/
/*         </p>*/
/* */
/*         <a href="{{ path("cimitero-index") }}" class="button right">Torna all'Entrata del Cimitero</a>*/
/*         <h3>Tombe</h3>*/
/*         <table class="spaced">*/
/*             <tr class="dark">*/
/*                 <th>Nome</th>*/
/*                 <th>Cognome</th>*/
/*                 <th>Data di morte</th>*/
/*                 <th>Epitaffio</th>*/
/*             </tr>*/
/* */
/*             {% for grave in paginator %}*/
/*                 <tr>*/
/*                     <td class="nome dark">{{ grave.getNickname }}</td>*/
/*                     <td class="cognome">{{ grave.surname }}</td>*/
/*                     <td class="date">Morto/a il {{ grave.getDeathAt|date("d/m/Y")}} {{ grave.typeYear }} a {{ grave.deathAge }} anni.</td>*/
/*                     <td class="epitaffio">{{ grave.getMessage }}</td>*/
/*                 </tr>*/
/*             {% endfor %}*/
/*         </table>*/
/*         {{ knp_pagination_render(paginator) }}*/
/*     </div>*/
/* */
/* {% endblock %}*/
