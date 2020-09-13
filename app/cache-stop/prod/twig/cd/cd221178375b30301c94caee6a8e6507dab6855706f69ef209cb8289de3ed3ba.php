<?php

/* GdrAvatarBundle:Skill:skills.html.twig */
class __TwigTemplate_b78f9a7f3926175374a0a8d0b6816e541c8309bdfdc1591a43b53e9afe7441aa extends Twig_Template
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
        echo "<h3>Skill di livello ";
        echo twig_escape_filter($this->env, (isset($context["level"]) ? $context["level"] : null), "html", null, true);
        echo " ";
        if ((isset($context["canLearn"]) ? $context["canLearn"] : null)) {
            echo "<span>1 skill da imparare</span>";
        }
        echo "</h3>

";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["skills"]) ? $context["skills"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["skill"]) {
            // line 4
            echo "    <a ";
            if ((isset($context["canLearn"]) ? $context["canLearn"] : null)) {
                echo "href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("skill-learn", array("id" => $this->getAttribute($context["skill"], "id", array()))), "html", null, true);
                echo "\"";
            }
            // line 5
            echo "       title=\"<strong>Nome: </strong>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["skill"], "name", array()), "html", null, true);
            echo " <br>
            <strong>Si riattiva in: </strong> ";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute($context["skill"], "hoursToReload", array()), "html", null, true);
            echo " ore <br>
            ";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($context["skill"], "description", array()), "html", null, true);
            echo "\"
       class=\"skill";
            // line 8
            if (($this->getAttribute($context["skill"], "isLearned", array()) == false)) {
                echo " not-learned";
            }
            if ((isset($context["canLearn"]) ? $context["canLearn"] : null)) {
                echo " can-learn";
            }
            echo "\">
        <img src=\"";
            // line 9
            echo twig_escape_filter($this->env, ((isset($context["uploadPath"]) ? $context["uploadPath"] : null) . $this->getAttribute($context["skill"], "imageName", array())), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["skill"], "name", array()), "html", null, true);
            echo "\">
    </a>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['skill'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "

<span class=\"skill-plus-random\">+</span>

";
        // line 16
        if ((isset($context["randomSkill"]) ? $context["randomSkill"] : null)) {
            // line 17
            echo "    <img src=\"";
            echo twig_escape_filter($this->env, ((isset($context["uploadPath"]) ? $context["uploadPath"] : null) . $this->getAttribute($this->getAttribute((isset($context["randomSkill"]) ? $context["randomSkill"] : null), "skill", array()), "imageName", array())), "html", null, true);
            echo "\"
         alt=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["randomSkill"]) ? $context["randomSkill"] : null), "skill", array()), "name", array()), "html", null, true);
            echo "\"
         class=\"skill-random\"
         title=\"<strong>Nome: </strong>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["randomSkill"]) ? $context["randomSkill"] : null), "skill", array()), "name", array()), "html", null, true);
            echo " <br>
                <strong>Si riattiva in: </strong> ";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["randomSkill"]) ? $context["randomSkill"] : null), "skill", array()), "hoursToReload", array()), "html", null, true);
            echo " ore <br>
                ";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["randomSkill"]) ? $context["randomSkill"] : null), "skill", array()), "description", array()), "html", null, true);
            echo "\"
            >
";
        } else {
            // line 25
            echo "    ";
            if ((isset($context["canLearnRandom"]) ? $context["canLearnRandom"] : null)) {
                // line 26
                echo "        <a class=\"can-learn-random gdrtooltip\" data-href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("skill-random-learn", array("level" => (isset($context["level"]) ? $context["level"] : null))), "html", null, true);
                echo "\"
           data-price=\"";
                // line 27
                echo twig_escape_filter($this->env, (isset($context["priceForRandom"]) ? $context["priceForRandom"] : null), "html", null, true);
                echo "\" title=\"Acquista una pozione per imparare una skill in maniera casuale\">
            <img src=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/avatar/pozione_skill.jpg"), "html", null, true);
                echo "\">
        </a>
    ";
            } else {
                // line 31
                echo "        <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/avatar/pozione_skill_disabled.png"), "html", null, true);
                echo "\" class=\"cant-drink gdrtooltip\" title=\"Non puoi ancora acquistare una pozione per questo livello di Skill\">
    ";
            }
            // line 33
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Skill:skills.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 33,  123 => 31,  117 => 28,  113 => 27,  108 => 26,  105 => 25,  99 => 22,  95 => 21,  91 => 20,  86 => 18,  81 => 17,  79 => 16,  73 => 12,  62 => 9,  53 => 8,  49 => 7,  45 => 6,  40 => 5,  33 => 4,  29 => 3,  19 => 1,);
    }
}
/* <h3>Skill di livello {{ level }} {% if canLearn %}<span>1 skill da imparare</span>{% endif %}</h3>*/
/* */
/* {% for skill in skills %}*/
/*     <a {% if canLearn %}href="{{ url('skill-learn', {id: skill.id}) }}"{% endif %}*/
/*        title="<strong>Nome: </strong>{{ skill.name }} <br>*/
/*             <strong>Si riattiva in: </strong> {{ skill.hoursToReload }} ore <br>*/
/*             {{ skill.description }}"*/
/*        class="skill{% if skill.isLearned == false %} not-learned{% endif %}{% if canLearn %} can-learn{% endif %}">*/
/*         <img src="{{ uploadPath ~ skill.imageName }}" alt="{{ skill.name }}">*/
/*     </a>*/
/* {% endfor %}*/
/* */
/* */
/* <span class="skill-plus-random">+</span>*/
/* */
/* {% if randomSkill %}*/
/*     <img src="{{ uploadPath ~ randomSkill.skill.imageName }}"*/
/*          alt="{{ randomSkill.skill.name }}"*/
/*          class="skill-random"*/
/*          title="<strong>Nome: </strong>{{ randomSkill.skill.name }} <br>*/
/*                 <strong>Si riattiva in: </strong> {{ randomSkill.skill.hoursToReload }} ore <br>*/
/*                 {{ randomSkill.skill.description }}"*/
/*             >*/
/* {% else %}*/
/*     {% if canLearnRandom %}*/
/*         <a class="can-learn-random gdrtooltip" data-href="{{ path('skill-random-learn', {'level': level}) }}"*/
/*            data-price="{{ priceForRandom }}" title="Acquista una pozione per imparare una skill in maniera casuale">*/
/*             <img src="{{ asset('bundles/gdrgame/images/avatar/pozione_skill.jpg') }}">*/
/*         </a>*/
/*     {% else %}*/
/*         <img src="{{ asset('bundles/gdrgame/images/avatar/pozione_skill_disabled.png') }}" class="cant-drink gdrtooltip" title="Non puoi ancora acquistare una pozione per questo livello di Skill">*/
/*     {% endif %}*/
/* */
/* {% endif %}*/
