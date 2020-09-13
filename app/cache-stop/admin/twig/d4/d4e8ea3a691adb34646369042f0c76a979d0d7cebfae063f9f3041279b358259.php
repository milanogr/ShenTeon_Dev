<?php

/* SonataBlockBundle:Block:block_base.html.twig */
class __TwigTemplate_df10de0f8df9e781704c3c0408a6f0f57f55c26787fd21be6790640b902fcfae extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'block' => array($this, 'block_block'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0ac4a5e4b8c5f34af55121920429198a57569cbaf9b6409508240f6b493233f3 = $this->env->getExtension("native_profiler");
        $__internal_0ac4a5e4b8c5f34af55121920429198a57569cbaf9b6409508240f6b493233f3->enter($__internal_0ac4a5e4b8c5f34af55121920429198a57569cbaf9b6409508240f6b493233f3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SonataBlockBundle:Block:block_base.html.twig"));

        // line 11
        echo "<div id=\"cms-block-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "id", array()), "html", null, true);
        echo "\" class=\"cms-block cms-block-element\">
    ";
        // line 12
        $this->displayBlock('block', $context, $blocks);
        // line 13
        echo "</div>
";
        
        $__internal_0ac4a5e4b8c5f34af55121920429198a57569cbaf9b6409508240f6b493233f3->leave($__internal_0ac4a5e4b8c5f34af55121920429198a57569cbaf9b6409508240f6b493233f3_prof);

    }

    // line 12
    public function block_block($context, array $blocks = array())
    {
        $__internal_bae6fb20716957efb1ff01a29b62c630b9995393cba64c32415fecae9de01096 = $this->env->getExtension("native_profiler");
        $__internal_bae6fb20716957efb1ff01a29b62c630b9995393cba64c32415fecae9de01096->enter($__internal_bae6fb20716957efb1ff01a29b62c630b9995393cba64c32415fecae9de01096_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "block"));

        echo "EMPTY CONTENT";
        
        $__internal_bae6fb20716957efb1ff01a29b62c630b9995393cba64c32415fecae9de01096->leave($__internal_bae6fb20716957efb1ff01a29b62c630b9995393cba64c32415fecae9de01096_prof);

    }

    public function getTemplateName()
    {
        return "SonataBlockBundle:Block:block_base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 12,  30 => 13,  28 => 12,  23 => 11,);
    }
}
/* {#*/
/* */
/* This file is part of the Sonata package.*/
/* */
/* (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>*/
/* */
/* For the full copyright and license information, please view the LICENSE*/
/* file that was distributed with this source code.*/
/* */
/* #}*/
/* <div id="cms-block-{{ block.id }}" class="cms-block cms-block-element">*/
/*     {% block block %}EMPTY CONTENT{% endblock %}*/
/* </div>*/
/* */
