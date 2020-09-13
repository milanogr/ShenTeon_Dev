<?php

/* GdrAvatarBundle:Diary:index.html.twig */
class __TwigTemplate_41c1adfe1e1b45803ec258fd153e17738ab5f9e10197ca8bef683ebd7f2b80da extends Twig_Template
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
        echo "<h3>Pagine del Diario</h3>
<div id=\"diary-pages\">
    ";
        // line 3
        $this->loadTemplate("@GdrAvatar/Diary/list.html.twig", "GdrAvatarBundle:Diary:index.html.twig", 3)->display(array_merge($context, array("paginator" => (isset($context["paginator"]) ? $context["paginator"] : null))));
        // line 4
        echo "</div>

<hr>

<div class=\"diary-content-form\">
   ";
        // line 9
        if ((isset($context["is_owner"]) ? $context["is_owner"] : null)) {
            // line 10
            echo "       ";
            echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('http_kernel')->controller("GdrAvatarBundle:Diary:create", array("name" => (isset($context["name"]) ? $context["name"] : null))), array());
            // line 11
            echo "   ";
        }
        // line 12
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Diary:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 12,  37 => 11,  34 => 10,  32 => 9,  25 => 4,  23 => 3,  19 => 1,);
    }
}
/* <h3>Pagine del Diario</h3>*/
/* <div id="diary-pages">*/
/*     {% include '@GdrAvatar/Diary/list.html.twig' with {paginator: paginator} %}*/
/* </div>*/
/* */
/* <hr>*/
/* */
/* <div class="diary-content-form">*/
/*    {% if is_owner %}*/
/*        {% render(controller('GdrAvatarBundle:Diary:create', {name: name})) %}*/
/*    {% endif %}*/
/* </div>*/
