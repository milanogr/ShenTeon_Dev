<?php

/* GdrGameBundle:Chat:skills.html.twig */
class __TwigTemplate_f63d03bb4cb9270702eff2fe4a6b32cd2fefafc9b4c7c0a63cda7b08be3e29fd extends Twig_Template
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
        $context["firstRefresh"] = 0;
        // line 2
        echo "
    ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["skills"]) ? $context["skills"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["skill"]) {
            // line 4
            echo "        ";
            $context["canUse"] = ($this->getAttribute($context["skill"], "canUseAt", array()) <= (isset($context["now"]) ? $context["now"] : null));
            // line 5
            echo "        <a href=\"#\" data-skill-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["skill"], "id", array()), "html", null, true);
            echo "\"
           title=\"<strong>Nome: </strong>";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute($context["skill"], "name", array()), "html", null, true);
            echo " <br>
            <strong>Usabile: </strong> ";
            // line 7
            if ((isset($context["canUse"]) ? $context["canUse"] : null)) {
                echo "adesso";
            } else {
                echo " il ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["skill"], "canUseAt", array()), "d/m/Y H:i:s"), "html", null, true);
            }
            echo "<br>
            ";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($context["skill"], "description", array()), "html", null, true);
            echo "\"
           class=\"skill ";
            // line 9
            if ($this->getAttribute($context["skill"], "isRandom", array())) {
                echo "skill-random";
            } else {
                echo "skill-standard";
            }
            echo " skill-tooltip ";
            if ((isset($context["canUse"]) ? $context["canUse"] : null)) {
                echo "skill-enabled";
            } else {
                echo "skill-disabled";
            }
            echo "\">
            <img src=\"";
            // line 10
            echo twig_escape_filter($this->env, ((isset($context["uploadPath"]) ? $context["uploadPath"] : null) . $this->getAttribute($context["skill"], "imageName", array())), "html", null, true);
            echo "\">
        </a>

        ";
            // line 14
            echo "        ";
            if ((((isset($context["firstRefresh"]) ? $context["firstRefresh"] : null) < twig_date_format_filter($this->env, $this->getAttribute($context["skill"], "canUseAt", array()), "U")) && (twig_date_format_filter($this->env, $this->getAttribute($context["skill"], "canUseAt", array()), "U") > twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "U")))) {
                // line 15
                echo "            ";
                $context["firstRefresh"] = twig_date_format_filter($this->env, $this->getAttribute($context["skill"], "canUseAt", array()), "U");
                // line 16
                echo "        ";
            }
            // line 17
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['skill'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "
    ";
        // line 19
        if (((isset($context["maxLevelSkills"]) ? $context["maxLevelSkills"] : null) > (isset($context["totalLearnedSkills"]) ? $context["totalLearnedSkills"] : null))) {
            // line 20
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range((isset($context["totalLearnedSkills"]) ? $context["totalLearnedSkills"] : null), ((isset($context["maxLevelSkills"]) ? $context["maxLevelSkills"] : null) - 1)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 21
                echo "            <a class=\"skill skill-tooltip \" href=\"#\" title=\"Non hai ancora raggiunto il livello razziale per questa skill\">
                <img src=\"";
                // line 22
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/chat/skill-disabled.png"), "html", null, true);
                echo "\">
            </a>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "    ";
        }
        // line 26
        echo "
<span id=\"skill-refresh\" class=\"hide\" data-url=\"";
        // line 27
        echo $this->env->getExtension('routing')->getUrl("chat-skill-show");
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["firstRefresh"]) ? $context["firstRefresh"] : null), "html", null, true);
        echo "</span>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Chat:skills.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 27,  113 => 26,  110 => 25,  101 => 22,  98 => 21,  93 => 20,  91 => 19,  88 => 18,  82 => 17,  79 => 16,  76 => 15,  73 => 14,  67 => 10,  53 => 9,  49 => 8,  40 => 7,  36 => 6,  31 => 5,  28 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set firstRefresh = 0 %}*/
/* */
/*     {% for skill in skills %}*/
/*         {% set canUse = skill.canUseAt <= now %}*/
/*         <a href="#" data-skill-id="{{ skill.id }}"*/
/*            title="<strong>Nome: </strong>{{ skill.name }} <br>*/
/*             <strong>Usabile: </strong> {% if canUse %}adesso{% else %} il {{ skill.canUseAt|date('d/m/Y H:i:s') }}{% endif %}<br>*/
/*             {{ skill.description }}"*/
/*            class="skill {% if skill.isRandom %}skill-random{% else %}skill-standard{% endif %} skill-tooltip {% if canUse %}skill-enabled{% else %}skill-disabled{% endif %}">*/
/*             <img src="{{ uploadPath ~ skill.imageName }}">*/
/*         </a>*/
/* */
/*         {# Rappresenta la data in cui il js dovrà aggiornare il div #}*/
/*         {% if firstRefresh < skill.canUseAt|date('U') and skill.canUseAt|date('U') > now|date('U') %}*/
/*             {% set firstRefresh = skill.canUseAt|date('U') %}*/
/*         {% endif %}*/
/*     {% endfor %}*/
/* */
/*     {% if maxLevelSkills > totalLearnedSkills %}*/
/*         {% for i in totalLearnedSkills..maxLevelSkills-1 %}*/
/*             <a class="skill skill-tooltip " href="#" title="Non hai ancora raggiunto il livello razziale per questa skill">*/
/*                 <img src="{{ asset('bundles/gdrgame/images/chat/skill-disabled.png') }}">*/
/*             </a>*/
/*         {% endfor %}*/
/*     {% endif %}*/
/* */
/* <span id="skill-refresh" class="hide" data-url="{{ url('chat-skill-show') }}">{{ firstRefresh }}</span>*/
/* */
