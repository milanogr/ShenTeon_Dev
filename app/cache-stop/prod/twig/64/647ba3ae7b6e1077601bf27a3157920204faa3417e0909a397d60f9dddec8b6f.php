<?php

/* GdrAvatarBundle:Diary:show.html.twig */
class __TwigTemplate_167740f61ff83cac2fe7c22bc434d6517ee9ecc4a35cdcb7726222df891566b3 extends Twig_Template
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
        echo "<div class=\"popup-diary\">
    <h3>";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diary"]) ? $context["diary"] : null), "title", array()), "html", null, true);
        echo "</h3>

    ";
        // line 4
        echo $this->getAttribute((isset($context["diary"]) ? $context["diary"] : null), "body", array());
        echo "

    <hr>

    <span class=\"date\">";
        // line 8
        echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["diary"]) ? $context["diary"] : null), "createdAt", array()), "none", "none", "it_IT", null, "d MMMM Y"), "html", null, true);
        echo "</span>
</div>";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Diary:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 8,  27 => 4,  22 => 2,  19 => 1,);
    }
}
/* <div class="popup-diary">*/
/*     <h3>{{ diary.title }}</h3>*/
/* */
/*     {{ diary.body|raw }}*/
/* */
/*     <hr>*/
/* */
/*     <span class="date">{{ diary.createdAt|localizeddate('none', 'none', 'it_IT', null, "d MMMM Y") }}</span>*/
/* </div>*/
