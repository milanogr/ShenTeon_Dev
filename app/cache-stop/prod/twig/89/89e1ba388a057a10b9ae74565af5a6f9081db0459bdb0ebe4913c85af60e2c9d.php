<?php

/* GdrGameBundle:Grave:index.html.twig */
class __TwigTemplate_9442a4f7b8d35bdf17919587642a079b3d41e3a4dcab730e9048da72b78814ae extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Grave:index.html.twig", 1);
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

        ";
        // line 14
        $this->loadTemplate("@GdrGame/Grave/incipt.html.twig", "GdrGameBundle:Grave:index.html.twig", 14)->display($context);
        // line 15
        echo "
        <h3 class=\"text-centered\">
            <a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("cimitero-singole");
        echo "\">Visita le Tombe</a>
        </h3>


        <h3 class=\"text-centered\">
            <a href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("cimitero-famiglia");
        echo "\">Visita le Tombe di Famiglia</a>
        </h3>
    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Grave:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 22,  63 => 17,  59 => 15,  57 => 14,  53 => 12,  50 => 11,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  11 => 1,);
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
/*         {% include "@GdrGame/Grave/incipt.html.twig" %}*/
/* */
/*         <h3 class="text-centered">*/
/*             <a href="{{ path('cimitero-singole') }}">Visita le Tombe</a>*/
/*         </h3>*/
/* */
/* */
/*         <h3 class="text-centered">*/
/*             <a href="{{ path('cimitero-famiglia') }}">Visita le Tombe di Famiglia</a>*/
/*         </h3>*/
/*     </div>*/
/* {% endblock %}*/
