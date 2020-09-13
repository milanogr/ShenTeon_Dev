<?php

/* GdrSiteBundle:Default:regolamenti.html.twig */
class __TwigTemplate_88adbf50e091deb82a6961b50a389be87bcffc976fae13933e1c21c7f9e167cb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrSiteBundle::layout.html.twig", "GdrSiteBundle:Default:regolamenti.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GdrSiteBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "I Regolamenti ed i Manuali di gioco";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
        <div class=\"page-regolamenti\">
            <h1><span>Regolamenti di Shenteon</span></h1>

            <p>
                La quantità di innovazioni e di automatismi che Shenteon propone è notevole.
                Non vi fate ingannare però. Non si tratta di cose astruse o di metodologie che necessitano di anni di
                studio. Gran parte del “lavoro” è svolto dal sistema che abbiamo studiato e che si nasconde dietro il
                sito
                stesso. Voi siete i fruitori del sito ed è lui al vostro servizio, non il contrario. <br><br>

                Di seguito trovate uno spaccato delle principali caratteristiche di Shenteon, per lo più esposto in
                maniera
                discorsiva. Se siete curiosi, e noi lo speriamo, concedetevi una manciata di minuti per leggerlo.
            </p>

            ";
        // line 23
        echo "                ";
        // line 24
        echo "                    ";
        // line 25
        echo "                        ";
        // line 26
        echo "                        ";
        // line 27
        echo "                        ";
        // line 28
        echo "                        ";
        // line 29
        echo "                        ";
        // line 30
        echo "                        ";
        // line 31
        echo "                        ";
        // line 32
        echo "                        ";
        // line 33
        echo "                    ";
        // line 34
        echo "                ";
        // line 35
        echo "                ";
        // line 36
        echo "            ";
        // line 37
        echo "            ";
        // line 38
        echo "                ";
        // line 39
        echo "            ";
        // line 40
        echo "
            <ul>
                ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["regolamenti"]) ? $context["regolamenti"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["regolamento"]) {
            // line 43
            echo "                    <li>
                        <a title=\"Leggi ";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($context["regolamento"], "title", array()), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("site_regolamento", array("slug" => $this->getAttribute($context["regolamento"], "slug", array()))), "html", null, true);
            echo "\">
                            <span>";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo ".</span> ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["regolamento"], "title", array()), "html", null, true);
            echo "
                        </a>
                    </li>
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
            // line 49
            echo "                    <li>Non ci sono regolamenti.</li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['regolamento'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "            </ul>
        </div>

    ";
    }

    public function getTemplateName()
    {
        return "GdrSiteBundle:Default:regolamenti.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 51,  140 => 49,  121 => 45,  115 => 44,  112 => 43,  94 => 42,  90 => 40,  88 => 39,  86 => 38,  84 => 37,  82 => 36,  80 => 35,  78 => 34,  76 => 33,  74 => 32,  72 => 31,  70 => 30,  68 => 29,  66 => 28,  64 => 27,  62 => 26,  60 => 25,  58 => 24,  56 => 23,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "GdrSiteBundle::layout.html.twig" %}*/
/* */
/* {% block title 'I Regolamenti ed i Manuali di gioco' %}*/
/* */
/*     {% block content %}*/
/* */
/*         <div class="page-regolamenti">*/
/*             <h1><span>Regolamenti di Shenteon</span></h1>*/
/* */
/*             <p>*/
/*                 La quantità di innovazioni e di automatismi che Shenteon propone è notevole.*/
/*                 Non vi fate ingannare però. Non si tratta di cose astruse o di metodologie che necessitano di anni di*/
/*                 studio. Gran parte del “lavoro” è svolto dal sistema che abbiamo studiato e che si nasconde dietro il*/
/*                 sito*/
/*                 stesso. Voi siete i fruitori del sito ed è lui al vostro servizio, non il contrario. <br><br>*/
/* */
/*                 Di seguito trovate uno spaccato delle principali caratteristiche di Shenteon, per lo più esposto in*/
/*                 maniera*/
/*                 discorsiva. Se siete curiosi, e noi lo speriamo, concedetevi una manciata di minuti per leggerlo.*/
/*             </p>*/
/* */
/*             {#<div id="google-search">#}*/
/*                 {#<script>#}*/
/*                     {#(function() {#}*/
/*                         {#var cx = '017029597386673014888:ps0cg-6kb4u';#}*/
/*                         {#var gcse = document.createElement('script');#}*/
/*                         {#gcse.type = 'text/javascript';#}*/
/*                         {#gcse.async = true;#}*/
/*                         {#gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +#}*/
/*                         {#'//www.google.com/cse/cse.js?cx=' + cx;#}*/
/*                         {#var s = document.getElementsByTagName('script')[0];#}*/
/*                         {#s.parentNode.insertBefore(gcse, s);#}*/
/*                     {#})();#}*/
/*                 {#</script>#}*/
/*                 {#<gcse:searchbox></gcse:searchbox>#}*/
/*             {#</div>#}*/
/*             {#<div id="google-search-results">#}*/
/*                 {#<gcse:searchresults></gcse:searchresults>#}*/
/*             {#</div>#}*/
/* */
/*             <ul>*/
/*                 {% for regolamento in regolamenti %}*/
/*                     <li>*/
/*                         <a title="Leggi {{ regolamento.title }}" href="{{ path('site_regolamento', {slug: regolamento.slug}) }}">*/
/*                             <span>{{ loop.index }}.</span> {{ regolamento.title }}*/
/*                         </a>*/
/*                     </li>*/
/*                 {% else %}*/
/*                     <li>Non ci sono regolamenti.</li>*/
/*                 {% endfor %}*/
/*             </ul>*/
/*         </div>*/
/* */
/*     {% endblock %}*/
