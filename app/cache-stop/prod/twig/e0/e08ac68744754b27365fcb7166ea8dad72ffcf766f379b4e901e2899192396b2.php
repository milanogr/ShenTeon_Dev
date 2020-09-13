<?php

/* GdrGameBundle:Archivio:show.html.twig */
class __TwigTemplate_0b6a65506f2ff9d772baaad74bcc90818636789d08ea1ca68104791a09b17118 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@GdrGame/Library/index.html.twig", "GdrGameBundle:Archivio:show.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@GdrGame/Library/index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"library-container archivio\">
    <h2><span>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "getName", array()), "html", null, true);
        echo "</span></h2>

    <p class=\"text-centered\">
        <a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("archivio-index");
        echo "\">Torna all'ingresso del'Archivio</a>
    </p>

    ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["books"]) ? $context["books"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["book"]) {
            // line 12
            echo "        ";
            if ($this->getAttribute($context["loop"], "first", array())) {
                // line 13
                echo "            <div class=\"ripiano\">
        ";
            }
            // line 15
            echo "
        <a class=\"show-book gdrtooltip\" data-href=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("archivio-show-book", array("id" => $this->getAttribute($context["book"], "id", array()))), "html", null, true);
            echo "\" title=\"Leggi ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["book"], "title", array()), "html", null, true);
            echo "\">
            <img src=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($context["book"], "image"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["book"], "getTitle", array()), "html", null, true);
            echo "\">
        </a>

        ";
            // line 20
            if (((($this->getAttribute($context["loop"], "index", array()) % 5) == 0) || $this->getAttribute($context["loop"], "last", array()))) {
                // line 21
                echo "            </div>
        ";
            }
            // line 23
            echo "
        ";
            // line 24
            if (((($this->getAttribute($context["loop"], "index", array()) % 5) == 0) && ($this->getAttribute($context["loop"], "last", array()) == false))) {
                // line 25
                echo "            <div class=\"ripiano\">
        ";
            }
            // line 27
            echo "    ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['book'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Archivio:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 28,  102 => 27,  98 => 25,  96 => 24,  93 => 23,  89 => 21,  87 => 20,  79 => 17,  73 => 16,  70 => 15,  66 => 13,  63 => 12,  46 => 11,  40 => 8,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends '@GdrGame/Library/index.html.twig' %}*/
/* */
/* {% block content %}*/
/*     <div class="library-container archivio">*/
/*     <h2><span>{{ section.getName }}</span></h2>*/
/* */
/*     <p class="text-centered">*/
/*         <a href="{{ path('archivio-index') }}">Torna all'ingresso del'Archivio</a>*/
/*     </p>*/
/* */
/*     {% for book in books %}*/
/*         {% if loop.first %}*/
/*             <div class="ripiano">*/
/*         {% endif %}*/
/* */
/*         <a class="show-book gdrtooltip" data-href="{{ path('archivio-show-book', {id: book.id}) }}" title="Leggi {{ book.title }}">*/
/*             <img src="{{ vich_uploader_asset(book, 'image') }}" alt="{{ book.getTitle }}">*/
/*         </a>*/
/* */
/*         {% if loop.index % 5 == 0 or loop.last %}*/
/*             </div>*/
/*         {% endif %}*/
/* */
/*         {% if loop.index % 5 == 0 and loop.last == false %}*/
/*             <div class="ripiano">*/
/*         {% endif %}*/
/*     {% endfor %}*/
/*     </div>*/
/* {% endblock %}*/
