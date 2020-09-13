<?php

/* GdrGameBundle:Forum:helpDeskThread.html.twig */
class __TwigTemplate_70706642bddad0e89544a3f46b375fc99b81e0c71db0cc85b3ac616b7fd1330a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Forum:index.html.twig", "GdrGameBundle:Forum:helpDeskThread.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GdrGameBundle:Forum:index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context["isAdmin"] = $this->env->getExtension('security')->isGranted("ROLE_ADMIN");
        // line 5
        echo "
    <div id=\"forum-container\">

        <h1><span>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "category", array()), "name", array()), "html", null, true);
        echo "</span></h1>

        ";
        // line 10
        if (((isset($context["helpType"]) ? $context["helpType"] : null) == 1)) {
            // line 11
            echo "            <a class=\"button\" href=\"";
            echo $this->env->getExtension('routing')->getPath("bacheca-helpdesk", array("type" => "gestione"));
            echo "\">← Torna
                indietro</a>
        ";
        } elseif ((        // line 13
(isset($context["helpType"]) ? $context["helpType"] : null) == 2)) {
            // line 14
            echo "            <a class=\"button\" href=\"";
            echo $this->env->getExtension('routing')->getPath("bacheca-helpdesk", array("type" => "moderazione"));
            echo "\">← Torna
                indietro</a>
        ";
        } else {
            // line 17
            echo "            <a class=\"button\" href=\"";
            echo $this->env->getExtension('routing')->getPath("bacheca-helpdesk", array("type" => "fato"));
            echo "\">← Torna
                indietro</a>
        ";
        }
        // line 20
        echo "
        ";
        // line 21
        if ($this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "isLocked", array())) {
            // line 22
            echo "            ";
            if ((isset($context["isMod"]) ? $context["isMod"] : null)) {
                // line 23
                echo "                <a class=\"button rispondi\" data-href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-post", array("thread" => $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "id", array()))), "html", null, true);
                echo "\">Rispondi (Chiusa)</a>
            ";
            } else {
                // line 25
                echo "                <a class=\"button\">Discussione chiusa</a>
            ";
            }
            // line 27
            echo "        ";
        } else {
            // line 28
            echo "            <a class=\"button rispondi\" data-href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-post", array("thread" => $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "id", array()))), "html", null, true);
            echo "\">Rispondi</a>
        ";
        }
        // line 30
        echo "

        <div id=\"write-reply\"></div>

        ";
        // line 34
        $this->loadTemplate("@GdrGame/Forum/showThread.html.twig", "GdrGameBundle:Forum:helpDeskThread.html.twig", 34)->display($context);
        // line 35
        echo "
        ";
        // line 36
        if (((isset($context["helpType"]) ? $context["helpType"] : null) == 1)) {
            // line 37
            echo "            <a class=\"button\" href=\"";
            echo $this->env->getExtension('routing')->getPath("bacheca-helpdesk", array("type" => "gestione"));
            echo "\">← Torna
                indietro</a>
        ";
        } elseif ((        // line 39
(isset($context["helpType"]) ? $context["helpType"] : null) == 2)) {
            // line 40
            echo "            <a class=\"button\" href=\"";
            echo $this->env->getExtension('routing')->getPath("bacheca-helpdesk", array("type" => "moderazione"));
            echo "\">← Torna
                indietro</a>
        ";
        } else {
            // line 43
            echo "            <a class=\"button\" href=\"";
            echo $this->env->getExtension('routing')->getPath("bacheca-helpdesk", array("type" => "fato"));
            echo "\">← Torna
                indietro</a>
        ";
        }
        // line 46
        echo "
        ";
        // line 47
        if ($this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "isLocked", array())) {
            // line 48
            echo "            ";
            if ((isset($context["isMod"]) ? $context["isMod"] : null)) {
                // line 49
                echo "                <a class=\"button rispondi\" data-href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-post", array("thread" => $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "id", array()))), "html", null, true);
                echo "\">Rispondi (Chiusa)</a>
            ";
            } else {
                // line 51
                echo "                <a class=\"button\">Discussione chiusa</a>
            ";
            }
            // line 53
            echo "        ";
        } else {
            // line 54
            echo "            <a class=\"button rispondi\" data-href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-post", array("thread" => $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "id", array()))), "html", null, true);
            echo "\">Rispondi</a>
        ";
        }
        // line 56
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Forum:helpDeskThread.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 56,  151 => 54,  148 => 53,  144 => 51,  138 => 49,  135 => 48,  133 => 47,  130 => 46,  123 => 43,  116 => 40,  114 => 39,  108 => 37,  106 => 36,  103 => 35,  101 => 34,  95 => 30,  89 => 28,  86 => 27,  82 => 25,  76 => 23,  73 => 22,  71 => 21,  68 => 20,  61 => 17,  54 => 14,  52 => 13,  46 => 11,  44 => 10,  39 => 8,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Forum:index.html.twig' %}*/
/* */
/* {% block content %}*/
/*     {% set isAdmin = is_granted('ROLE_ADMIN') %}*/
/* */
/*     <div id="forum-container">*/
/* */
/*         <h1><span>{{ thread.category.name }}</span></h1>*/
/* */
/*         {% if helpType == 1 %}*/
/*             <a class="button" href="{{ path('bacheca-helpdesk', {type: 'gestione'}) }}">← Torna*/
/*                 indietro</a>*/
/*         {% elseif helpType == 2 %}*/
/*             <a class="button" href="{{ path('bacheca-helpdesk', {type: 'moderazione'}) }}">← Torna*/
/*                 indietro</a>*/
/*         {% else %}*/
/*             <a class="button" href="{{ path('bacheca-helpdesk', {type: 'fato'}) }}">← Torna*/
/*                 indietro</a>*/
/*         {% endif %}*/
/* */
/*         {% if thread.isLocked %}*/
/*             {% if isMod %}*/
/*                 <a class="button rispondi" data-href="{{ path('bacheca-create-post', {thread: thread.id}) }}">Rispondi (Chiusa)</a>*/
/*             {% else %}*/
/*                 <a class="button">Discussione chiusa</a>*/
/*             {% endif %}*/
/*         {% else %}*/
/*             <a class="button rispondi" data-href="{{ path('bacheca-create-post', {thread: thread.id}) }}">Rispondi</a>*/
/*         {% endif %}*/
/* */
/* */
/*         <div id="write-reply"></div>*/
/* */
/*         {% include '@GdrGame/Forum/showThread.html.twig' %}*/
/* */
/*         {% if helpType == 1 %}*/
/*             <a class="button" href="{{ path('bacheca-helpdesk', {type: 'gestione'}) }}">← Torna*/
/*                 indietro</a>*/
/*         {% elseif helpType == 2 %}*/
/*             <a class="button" href="{{ path('bacheca-helpdesk', {type: 'moderazione'}) }}">← Torna*/
/*                 indietro</a>*/
/*         {% else %}*/
/*             <a class="button" href="{{ path('bacheca-helpdesk', {type: 'fato'}) }}">← Torna*/
/*                 indietro</a>*/
/*         {% endif %}*/
/* */
/*         {% if thread.isLocked %}*/
/*             {% if isMod %}*/
/*                 <a class="button rispondi" data-href="{{ path('bacheca-create-post', {thread: thread.id}) }}">Rispondi (Chiusa)</a>*/
/*             {% else %}*/
/*                 <a class="button">Discussione chiusa</a>*/
/*             {% endif %}*/
/*         {% else %}*/
/*             <a class="button rispondi" data-href="{{ path('bacheca-create-post', {thread: thread.id}) }}">Rispondi</a>*/
/*         {% endif %}*/
/*     </div>*/
/* {% endblock %}*/
