<?php

/* GdrGameBundle:Enclave:showNobili.html.twig */
class __TwigTemplate_8ba56a5f13bcf3b940a74c7b8477aa0aec03ae1912d53addaeb86a67232043b3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@GdrGame/Enclave/index.html.twig", "GdrGameBundle:Enclave:showNobili.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@GdrGame/Enclave/index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div id=\"enclavi-container\">
        <h1><span>I Nobili di Teon</span></h1>

        <div class=\"nobili-container\">

            <ul>
                ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["nobili"]) ? $context["nobili"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["nobile"]) {
            // line 11
            echo "                    <li><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($context["nobile"], "icon"), "html", null, true);
            echo "\"></li>
                    <li>
                        ";
            // line 13
            if (($this->getAttribute($this->getAttribute($context["nobile"], "personage", array()), "gender", array()) == 1)) {
                // line 14
                echo "                            <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => $this->getAttribute($this->getAttribute($context["nobile"], "personage", array()), "name", array()))), "html", null, true);
                echo "\">
                                <img src=\"";
                // line 15
                echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute($this->getAttribute($this->getAttribute($context["nobile"], "personage", array()), "race", array()), "maleIconName", array())), "html", null, true);
                echo "\">
                            </a>
                        ";
            } else {
                // line 18
                echo "                            <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("avatar-index", array("name" => $this->getAttribute($this->getAttribute($context["nobile"], "personage", array()), "name", array()))), "html", null, true);
                echo "\">
                                <img src=\"";
                // line 19
                echo twig_escape_filter($this->env, ($this->env->getExtension('path_extension')->generateUploadPath("race") . $this->getAttribute($this->getAttribute($this->getAttribute($context["nobile"], "personage", array()), "race", array()), "femaleIconName", array())), "html", null, true);
                echo "\">
                            </a>
                        ";
            }
            // line 22
            echo "                        <span class=\"rank-name\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["nobile"], "name", array()), "html", null, true);
            echo "</span>
                        ";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["nobile"], "personage", array()), "name", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["nobile"], "personage", array()), "surname", array()), "html", null, true);
            echo "
                    </li>
                    ";
            // line 25
            if (($this->getAttribute($context["loop"], "last", array()) == false)) {
                // line 26
                echo "                        <li class=\"divider\">
                            <img src=\"";
                // line 27
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/divider.png"), "html", null, true);
                echo "\">
                        </li>
                    ";
            }
            // line 30
            echo "                ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['nobile'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "            </ul>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Enclave:showNobili.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 31,  109 => 30,  103 => 27,  100 => 26,  98 => 25,  91 => 23,  86 => 22,  80 => 19,  75 => 18,  69 => 15,  64 => 14,  62 => 13,  56 => 11,  39 => 10,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends '@GdrGame/Enclave/index.html.twig' %}*/
/* */
/* {% block content %}*/
/*     <div id="enclavi-container">*/
/*         <h1><span>I Nobili di Teon</span></h1>*/
/* */
/*         <div class="nobili-container">*/
/* */
/*             <ul>*/
/*                 {% for nobile in nobili %}*/
/*                     <li><img src="{{ vich_uploader_asset(nobile, 'icon') }}"></li>*/
/*                     <li>*/
/*                         {% if nobile.personage.gender == 1 %}*/
/*                             <a href="{{ path('avatar-index', {name: nobile.personage.name}) }}">*/
/*                                 <img src="{{ uploadPath('race') ~ nobile.personage.race.maleIconName }}">*/
/*                             </a>*/
/*                         {% else %}*/
/*                             <a href="{{ path('avatar-index', {name: nobile.personage.name}) }}">*/
/*                                 <img src="{{ uploadPath('race') ~ nobile.personage.race.femaleIconName }}">*/
/*                             </a>*/
/*                         {% endif %}*/
/*                         <span class="rank-name">{{ nobile.name }}</span>*/
/*                         {{ nobile.personage.name }} {{ nobile.personage.surname }}*/
/*                     </li>*/
/*                     {% if loop.last == false %}*/
/*                         <li class="divider">*/
/*                             <img src="{{ asset('bundles/gdrgame/images/divider.png') }}">*/
/*                         </li>*/
/*                     {% endif %}*/
/*                 {% endfor %}*/
/*             </ul>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
