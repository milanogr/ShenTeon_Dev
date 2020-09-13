<?php

/* GdrSiteBundle:News:_news.html.twig */
class __TwigTemplate_2249a5bac7646921bd55ad19f0e275c5e1d9c055c00d3e1e2e15e09f73d412b5 extends Twig_Template
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
        echo "<section class=\"news-container\">
    ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["news"]) ? $context["news"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
            // line 3
            echo "        ";
            // line 4
            echo "            <div class=\"divider\"></div>
        ";
            // line 6
            echo "        <article>
            <h2>";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($context["n"], "title", array()), "html", null, true);
            echo "</h2>
            <div class=\"date\">";
            // line 8
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["n"], "createdAt", array()), "d/m/Y"), "html", null, true);
            echo "</div>
            <p>";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($context["n"], "preBody", array()), "html", null, true);
            echo " <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("site_news", array("slug" => $this->getAttribute($context["n"], "slug", array()))), "html", null, true);
            echo "\">Leggi tutto &rarr;</a></p>
        </article>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "</section>";
    }

    public function getTemplateName()
    {
        return "GdrSiteBundle:News:_news.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 12,  42 => 9,  38 => 8,  34 => 7,  31 => 6,  28 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
/* <section class="news-container">*/
/*     {% for n in news %}*/
/*         {#{% if loop.first == false %}#}*/
/*             <div class="divider"></div>*/
/*         {#{% endif %}#}*/
/*         <article>*/
/*             <h2>{{ n.title }}</h2>*/
/*             <div class="date">{{ n.createdAt|date("d/m/Y") }}</div>*/
/*             <p>{{ n.preBody }} <a href="{{ path('site_news', {slug: n.slug}) }}">Leggi tutto &rarr;</a></p>*/
/*         </article>*/
/*     {% endfor %}*/
/* </section>*/
