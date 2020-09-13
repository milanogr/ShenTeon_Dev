<?php

/* @GdrGame/Marque/list.html.twig */
class __TwigTemplate_55caa62e072ba936de14976292c3f47f8e26e2385a1c4ecef95f6a10bc30efde extends Twig_Template
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
        echo "<a id=\"marque-toggle\" class=\"gdrtooltip\" title=\"Ferma/Riprendi scorrimento\">
    <img src=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/ferma-marque.png"), "html", null, true);
        echo "\">
</a>
<marquee id=\"marque-tag\" behavior=\"scroll\" scrollamount=\"3\" direction=\"left\">
    ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["marques"]) ? $context["marques"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["marque"]) {
            // line 6
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["marque"], "text", array()), "html", null, true);
            if (($this->getAttribute($context["loop"], "last", array()) == false)) {
                echo " | ";
            }
            // line 7
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['marque'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "</marquee>";
    }

    public function getTemplateName()
    {
        return "@GdrGame/Marque/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 8,  51 => 7,  45 => 6,  28 => 5,  22 => 2,  19 => 1,);
    }
}
/* <a id="marque-toggle" class="gdrtooltip" title="Ferma/Riprendi scorrimento">*/
/*     <img src="{{ asset('bundles/gdrgame/images/ferma-marque.png') }}">*/
/* </a>*/
/* <marquee id="marque-tag" behavior="scroll" scrollamount="3" direction="left">*/
/*     {% for marque in marques %}*/
/*         {{ marque.text }}{% if loop.last == false %} | {% endif %}*/
/*     {% endfor %}*/
/* </marquee>*/
