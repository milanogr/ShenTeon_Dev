<?php

/* GdrGameBundle:Forum:thread.html.twig */
class __TwigTemplate_1250eccad5771a4fc7f0dddb8d4061b441f4f8a1fc12d08d5ce0de173cd86885 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Forum:index.html.twig", "GdrGameBundle:Forum:thread.html.twig", 1);
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
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "category", array()), "name", array()), "html", null, true);
        echo "</span></h1>

        <a class=\"button\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-lista-threads", array("category" => $this->getAttribute($this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "category", array()), "id", array()))), "html", null, true);
        echo "\">← Torna
            indietro</a>

        ";
        // line 14
        if ((isset($context["following"]) ? $context["following"] : null)) {
            // line 15
            echo "            <a class=\"button follow\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-follow", array("id" => $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "id", array()))), "html", null, true);
            echo "\">Non seguire più la discussione</a>
        ";
        } else {
            // line 17
            echo "            <a class=\"button follow\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-follow", array("id" => $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "id", array()))), "html", null, true);
            echo "\">Segui la discussione</a>
        ";
        }
        // line 19
        echo "
        ";
        // line 20
        if (((isset($context["canWriteSoul"]) ? $context["canWriteSoul"] : null) == false)) {
            // line 21
            echo "            <a class=\"button\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-thread", array("category" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id", array()))), "html", null, true);
            echo "\">Crea thread</a>
        ";
        } elseif ($this->getAttribute(        // line 22
(isset($context["thread"]) ? $context["thread"] : null), "isLocked", array())) {
            // line 23
            echo "            ";
            if ((isset($context["isMod"]) ? $context["isMod"] : null)) {
                // line 24
                echo "                <a class=\"button rispondi\" data-href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-post", array("thread" => $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "id", array()))), "html", null, true);
                echo "\">Rispondi
                    (Chiusa)</a>
            ";
            } else {
                // line 27
                echo "                <a class=\"button\">Discussione chiusa</a>
            ";
            }
            // line 29
            echo "        ";
        } else {
            // line 30
            echo "            <a class=\"button rispondi\" data-href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-post", array("thread" => $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "id", array()))), "html", null, true);
            echo "\">Rispondi</a>

            ";
            // line 32
            if ((isset($context["isMod"]) ? $context["isMod"] : null)) {
                // line 33
                echo "                <a class=\"button close\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-close-thread", array("id" => $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "id", array()))), "html", null, true);
                echo "\">Chiudi discussione</a>
            ";
            }
            // line 35
            echo "        ";
        }
        // line 36
        echo "
        <a class=\"button\" href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("missive-create", array("destinatario" => 0, "isForGroup" => 0, "threadId" => $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "id", array()))), "html", null, true);
        echo "\">[Segnala]</a>
        <a class=\"button\" href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("missive-create", array("destinatario" => 0, "isForGroup" => 1, "threadId" => $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "id", array()))), "html", null, true);
        echo "\">[Segnala
            in ML]</a>


        <div id=\"write-reply\"></div>

        ";
        // line 44
        $this->loadTemplate("@GdrGame/Forum/showThread.html.twig", "GdrGameBundle:Forum:thread.html.twig", 44)->display($context);
        // line 45
        echo "
        <a class=\"button\" href=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-lista-threads", array("category" => $this->getAttribute($this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "category", array()), "id", array()))), "html", null, true);
        echo "\">← Torna
            indietro</a>

        ";
        // line 49
        if (((isset($context["canWriteSoul"]) ? $context["canWriteSoul"] : null) == false)) {
            // line 50
            echo "            <a class=\"button\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-thread", array("category" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id", array()))), "html", null, true);
            echo "\">Crea thread</a>
        ";
        } elseif ($this->getAttribute(        // line 51
(isset($context["thread"]) ? $context["thread"] : null), "isLocked", array())) {
            // line 52
            echo "            ";
            if ((isset($context["isMod"]) ? $context["isMod"] : null)) {
                // line 53
                echo "                <a class=\"button rispondi\" data-href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-post", array("thread" => $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "id", array()))), "html", null, true);
                echo "\">Rispondi
                    (Chiusa)</a>
            ";
            } else {
                // line 56
                echo "                <a class=\"button\">Discussione chiusa</a>
            ";
            }
            // line 58
            echo "        ";
        } else {
            // line 59
            echo "            <a class=\"button rispondi\" data-href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-create-post", array("thread" => $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "id", array()))), "html", null, true);
            echo "\">Rispondi</a>
        ";
        }
        // line 61
        echo "

        <a class=\"button\" href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("missive-create", array("destinatario" => 0, "isForGroup" => 0, "threadId" => $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "id", array()))), "html", null, true);
        echo "\">[Segnala]</a>
        <a class=\"button\" href=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("missive-create", array("destinatario" => 0, "isForGroup" => 1, "threadId" => $this->getAttribute((isset($context["thread"]) ? $context["thread"] : null), "id", array()))), "html", null, true);
        echo "\">[Segnala
            in ML]</a>

    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Forum:thread.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 64,  174 => 63,  170 => 61,  164 => 59,  161 => 58,  157 => 56,  150 => 53,  147 => 52,  145 => 51,  140 => 50,  138 => 49,  132 => 46,  129 => 45,  127 => 44,  118 => 38,  114 => 37,  111 => 36,  108 => 35,  102 => 33,  100 => 32,  94 => 30,  91 => 29,  87 => 27,  80 => 24,  77 => 23,  75 => 22,  70 => 21,  68 => 20,  65 => 19,  59 => 17,  53 => 15,  51 => 14,  45 => 11,  40 => 9,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Forum:index.html.twig' %}*/
/* */
/* {% block content %}*/
/*     {% set isAdmin = is_granted('ROLE_ADMIN') %}*/
/* */
/* */
/*     <div id="forum-container">*/
/* */
/*         <h1><span>{{ thread.category.name }}</span></h1>*/
/* */
/*         <a class="button" href="{{ path('bacheca-lista-threads', {category: thread.category.id}) }}">← Torna*/
/*             indietro</a>*/
/* */
/*         {% if following %}*/
/*             <a class="button follow" href="{{ path('bacheca-follow', {id: thread.id}) }}">Non seguire più la discussione</a>*/
/*         {% else %}*/
/*             <a class="button follow" href="{{ path('bacheca-follow', {id: thread.id}) }}">Segui la discussione</a>*/
/*         {% endif %}*/
/* */
/*         {% if canWriteSoul == false %}*/
/*             <a class="button" href="{{ path('bacheca-create-thread', {category: category.id}) }}">Crea thread</a>*/
/*         {% elseif thread.isLocked %}*/
/*             {% if isMod %}*/
/*                 <a class="button rispondi" data-href="{{ path('bacheca-create-post', {thread: thread.id}) }}">Rispondi*/
/*                     (Chiusa)</a>*/
/*             {% else %}*/
/*                 <a class="button">Discussione chiusa</a>*/
/*             {% endif %}*/
/*         {% else %}*/
/*             <a class="button rispondi" data-href="{{ path('bacheca-create-post', {thread: thread.id}) }}">Rispondi</a>*/
/* */
/*             {% if isMod %}*/
/*                 <a class="button close" href="{{ path('bacheca-close-thread', {id: thread.id}) }}">Chiudi discussione</a>*/
/*             {% endif %}*/
/*         {% endif %}*/
/* */
/*         <a class="button" href="{{ path('missive-create', {destinatario: 0, isForGroup: 0, threadId: thread.id}) }}">[Segnala]</a>*/
/*         <a class="button" href="{{ path('missive-create', {destinatario: 0, isForGroup: 1, threadId: thread.id}) }}">[Segnala*/
/*             in ML]</a>*/
/* */
/* */
/*         <div id="write-reply"></div>*/
/* */
/*         {% include '@GdrGame/Forum/showThread.html.twig' %}*/
/* */
/*         <a class="button" href="{{ path('bacheca-lista-threads', {category: thread.category.id}) }}">← Torna*/
/*             indietro</a>*/
/* */
/*         {% if canWriteSoul == false %}*/
/*             <a class="button" href="{{ path('bacheca-create-thread', {category: category.id}) }}">Crea thread</a>*/
/*         {% elseif thread.isLocked %}*/
/*             {% if isMod %}*/
/*                 <a class="button rispondi" data-href="{{ path('bacheca-create-post', {thread: thread.id}) }}">Rispondi*/
/*                     (Chiusa)</a>*/
/*             {% else %}*/
/*                 <a class="button">Discussione chiusa</a>*/
/*             {% endif %}*/
/*         {% else %}*/
/*             <a class="button rispondi" data-href="{{ path('bacheca-create-post', {thread: thread.id}) }}">Rispondi</a>*/
/*         {% endif %}*/
/* */
/* */
/*         <a class="button" href="{{ path('missive-create', {destinatario: 0, isForGroup: 0, threadId: thread.id}) }}">[Segnala]</a>*/
/*         <a class="button" href="{{ path('missive-create', {destinatario: 0, isForGroup: 1, threadId: thread.id}) }}">[Segnala*/
/*             in ML]</a>*/
/* */
/*     </div>*/
/* {% endblock %}*/
