<?php

/* GdrAvatarBundle:Skill:index.html.twig */
class __TwigTemplate_09c3d1232aee5891f1e8b71edaf204a66fa310c9bb7fb8b5736cdb60e7abb8f7 extends Twig_Template
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
        echo "<p class=\"text-centered\">
    Mano a mano che il tuo Personaggio salirà di Livello di razza avrai la possibilità di scegliere UNA Skill del nuovo
    livello ottenuto. <br>
    <strong>Attenzione: </strong> la scelta di una Skill è definitiva
</p>

<hr>

<div class=\"container-centered\">
    <div id=\"skills-container\">
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["maxLevel"]) ? $context["maxLevel"] : null)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 12
            echo "            ";
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrAvatarBundle:Skill:showSkills", array("level" => $context["i"])));
            echo "
            <hr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "    </div>
    <div id=\"skills-image\">
        ";
        // line 17
        $context["pathSkill"] = (("bundles/gdrgame/images/avatar/SKILL_LIV_" . (isset($context["raceLevel"]) ? $context["raceLevel"] : null)) . ".jpg");
        // line 18
        echo "        <img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl((isset($context["pathSkill"]) ? $context["pathSkill"] : null)), "html", null, true);
        echo "\">
    </div>
</div>

<span class=\"clearfix\"></span>

<script>
    \$(function () {
        \$('.skill, .skill-random').tooltipster({
            theme: '.tooltipster-shadow',
            maxWidth: 400

        }).on('click', function () {
            \$(this).tooltipster('hide');
        });
    });
</script>";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Skill:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 18,  49 => 17,  45 => 15,  35 => 12,  31 => 11,  19 => 1,);
    }
}
/* <p class="text-centered">*/
/*     Mano a mano che il tuo Personaggio salirà di Livello di razza avrai la possibilità di scegliere UNA Skill del nuovo*/
/*     livello ottenuto. <br>*/
/*     <strong>Attenzione: </strong> la scelta di una Skill è definitiva*/
/* </p>*/
/* */
/* <hr>*/
/* */
/* <div class="container-centered">*/
/*     <div id="skills-container">*/
/*         {% for i in 1..maxLevel %}*/
/*             {{ render(controller('GdrAvatarBundle:Skill:showSkills', {level: i})) }}*/
/*             <hr>*/
/*         {% endfor %}*/
/*     </div>*/
/*     <div id="skills-image">*/
/*         {% set pathSkill = "bundles/gdrgame/images/avatar/SKILL_LIV_" ~ raceLevel ~ ".jpg" %}*/
/*         <img src="{{ asset(pathSkill) }}">*/
/*     </div>*/
/* </div>*/
/* */
/* <span class="clearfix"></span>*/
/* */
/* <script>*/
/*     $(function () {*/
/*         $('.skill, .skill-random').tooltipster({*/
/*             theme: '.tooltipster-shadow',*/
/*             maxWidth: 400*/
/* */
/*         }).on('click', function () {*/
/*             $(this).tooltipster('hide');*/
/*         });*/
/*     });*/
/* </script>*/
