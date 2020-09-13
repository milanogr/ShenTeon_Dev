<?php

/* GdrGameBundle:Library:index.html.twig */
class __TwigTemplate_fd418afd01f9702a4207240b392937b1ad374084d6aa5a80843fecefe1dd0662 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Library:index.html.twig", 1);
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
        // line 10
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "b7304ba_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b7304ba_0") : $this->env->getExtension('asset')->getAssetUrl("js/b7304ba_library_1.js");
            // line 12
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "b7304ba"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b7304ba") : $this->env->getExtension('asset')->getAssetUrl("js/b7304ba.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "    <div class=\"library-container\">
        <h1><span>Biblioteca</span></h1>

        <p class=\"text-centered\">
            Benvenuto nella Biblioteca di Teon. Puoi consultare liberamente i libri in essa custoditi. <br>
            Le sue antiche sale ti attendono. Forse riuscirai a trovare quel che cerchi. <br>
        </p>

        <div class=\"images\">
            ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["sections"]) ? $context["sections"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
            // line 27
            echo "                <a class=\"gdrtooltip\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("biblioteca-show", array("id" => $this->getAttribute($context["section"], "getId", array()))), "html", null, true);
            echo "\"
                   title=\"Accedi alla ";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["section"], "getName", array()), "html", null, true);
            echo "\">
                    <img src=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($context["section"], "image"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["section"], "name", array()), "html", null, true);
            echo "\">
                </a>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Library:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 32,  96 => 29,  92 => 28,  87 => 27,  83 => 26,  72 => 17,  69 => 16,  53 => 12,  49 => 10,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  11 => 1,);
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
/* */
/*     {% javascripts filter='?uglifyjs2'*/
/*     'bundles/gdrgame/javascripts/library.js' %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/*     <div class="library-container">*/
/*         <h1><span>Biblioteca</span></h1>*/
/* */
/*         <p class="text-centered">*/
/*             Benvenuto nella Biblioteca di Teon. Puoi consultare liberamente i libri in essa custoditi. <br>*/
/*             Le sue antiche sale ti attendono. Forse riuscirai a trovare quel che cerchi. <br>*/
/*         </p>*/
/* */
/*         <div class="images">*/
/*             {% for section in sections %}*/
/*                 <a class="gdrtooltip" href="{{ path("biblioteca-show", {id: section.getId}) }}"*/
/*                    title="Accedi alla {{ section.getName }}">*/
/*                     <img src="{{ vich_uploader_asset(section, 'image') }}" alt="{{ section.name }}">*/
/*                 </a>*/
/*             {% endfor %}*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
