<?php

/* GdrUserBundle:Login:choosePersonage.html.twig */
class __TwigTemplate_98394cb79c56dc5c551c123a1f00723ac449f6def6db6f991073505f58f78e03 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrSiteBundle::layout.html.twig", "GdrUserBundle:Login:choosePersonage.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GdrSiteBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"text-centered\">
        <h2>Scegli o crea il tuo personaggio</h2>

        <p>Puoi creare al massimo <strong>quattro</strong> personaggi.</p>
    </div>

    <div class=\"personage-container\">

        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["personages"]) ? $context["personages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["personage"]) {
            // line 13
            echo "
            <div class=\"choose-personage ";
            // line 14
            if ($this->getAttribute($context["personage"], "isDead", array())) {
                echo "dead";
            }
            echo "\">
                <span class=\"name\">";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($context["personage"], "name", array()), "html", null, true);
            echo "</span>

                ";
            // line 17
            if ($this->getAttribute($context["personage"], "avatarName", array())) {
                // line 18
                echo "                    <img class=\"avatar\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($context["personage"], "avatar"), "html", null, true);
                echo "\"
                         alt=\"Avatar di ";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute($context["personage"], "name", array()), "html", null, true);
                echo "\"/>
                ";
            } else {
                // line 21
                echo "                    ";
                if (($this->getAttribute($context["personage"], "gender", array()) == 1)) {
                    // line 22
                    echo "                        ";
                    $context["img"] = $this->env->getExtension('vich_uploader')->asset($this->getAttribute($context["personage"], "race", array()), "maleImage");
                    // line 23
                    echo "                    ";
                } else {
                    // line 24
                    echo "                        ";
                    $context["img"] = $this->env->getExtension('vich_uploader')->asset($this->getAttribute($context["personage"], "race", array()), "femaleImage");
                    // line 25
                    echo "                    ";
                }
                // line 26
                echo "                    <img class=\"avatar\" src=\"";
                echo twig_escape_filter($this->env, (isset($context["img"]) ? $context["img"] : null), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["personage"], "race", array()), "name", array()), "html", null, true);
                echo "\"/>
                ";
            }
            // line 28
            echo "
                <span class=\"race\"><small>Razza:</small> ";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["personage"], "race", array()), "name", array()), "html", null, true);
            echo "</span>
                <span class=\"level\"><small>Liv. Razza:</small> ";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["personage"], "raceLevel", array()), "html", null, true);
            echo "</span>
                <span class=\"letters\"><small>Missive da leggere:
                    </small> ";
            // line 32
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrUserBundle:Login:showNotReadedLetters", array("id" => $this->getAttribute($context["personage"], "id", array()))));
            echo "</span>
                <span class=\"buttonS\">
            ";
            // line 34
            if (($this->getAttribute($context["personage"], "getIsDead", array()) &&  !$this->getAttribute($context["personage"], "getIsSoul", array()))) {
                // line 35
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_choose_dead_pg_id", array("id" => $this->getAttribute($context["personage"], "getId", array()))), "html", null, true);
                echo "\">Resuscita</a>
            ";
            } else {
                // line 37
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_choose_pg_id", array("id" => $this->getAttribute($context["personage"], "getId", array()))), "html", null, true);
                echo "\">Seleziona</a>
            ";
            }
            // line 39
            echo "                </span>
            </div>

        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['personage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "
        ";
        // line 44
        if ((isset($context["canCreate"]) ? $context["canCreate"] : null)) {
            // line 45
            echo "            <div class=\"new-personage\">
                <a href=\"";
            // line 46
            echo $this->env->getExtension('routing')->getPath("user_new_pg");
            echo "\">Crea nuovo PG</a>
            </div>
        ";
        }
        // line 49
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrUserBundle:Login:choosePersonage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 49,  142 => 46,  139 => 45,  137 => 44,  134 => 43,  125 => 39,  119 => 37,  113 => 35,  111 => 34,  106 => 32,  101 => 30,  97 => 29,  94 => 28,  86 => 26,  83 => 25,  80 => 24,  77 => 23,  74 => 22,  71 => 21,  66 => 19,  61 => 18,  59 => 17,  54 => 15,  48 => 14,  45 => 13,  41 => 12,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrSiteBundle::layout.html.twig' %}*/
/* */
/* {% block content %}*/
/*     <div class="text-centered">*/
/*         <h2>Scegli o crea il tuo personaggio</h2>*/
/* */
/*         <p>Puoi creare al massimo <strong>quattro</strong> personaggi.</p>*/
/*     </div>*/
/* */
/*     <div class="personage-container">*/
/* */
/*         {% for personage in personages %}*/
/* */
/*             <div class="choose-personage {% if personage.isDead %}dead{% endif %}">*/
/*                 <span class="name">{{ personage.name }}</span>*/
/* */
/*                 {% if personage.avatarName %}*/
/*                     <img class="avatar" src="{{ vich_uploader_asset(personage, 'avatar') }}"*/
/*                          alt="Avatar di {{ personage.name }}"/>*/
/*                 {% else %}*/
/*                     {% if personage.gender == 1 %}*/
/*                         {% set img = vich_uploader_asset(personage.race, 'maleImage') %}*/
/*                     {% else %}*/
/*                         {% set img = vich_uploader_asset(personage.race, 'femaleImage') %}*/
/*                     {% endif %}*/
/*                     <img class="avatar" src="{{ img }}" alt="{{ personage.race.name }}"/>*/
/*                 {% endif %}*/
/* */
/*                 <span class="race"><small>Razza:</small> {{ personage.race.name }}</span>*/
/*                 <span class="level"><small>Liv. Razza:</small> {{ personage.raceLevel }}</span>*/
/*                 <span class="letters"><small>Missive da leggere:*/
/*                     </small> {{ render(controller('GdrUserBundle:Login:showNotReadedLetters', {'id': personage.id})) }}</span>*/
/*                 <span class="buttonS">*/
/*             {% if(personage.getIsDead and not personage.getIsSoul) %}*/
/*                 <a href="{{ path('user_choose_dead_pg_id', {id: personage.getId}) }}">Resuscita</a>*/
/*             {% else %}*/
/*                 <a href="{{ path('user_choose_pg_id', {id: personage.getId}) }}">Seleziona</a>*/
/*             {% endif %}*/
/*                 </span>*/
/*             </div>*/
/* */
/*         {% endfor %}*/
/* */
/*         {% if canCreate %}*/
/*             <div class="new-personage">*/
/*                 <a href="{{ path('user_new_pg') }}">Crea nuovo PG</a>*/
/*             </div>*/
/*         {% endif %}*/
/*     </div>*/
/* {% endblock %}*/
