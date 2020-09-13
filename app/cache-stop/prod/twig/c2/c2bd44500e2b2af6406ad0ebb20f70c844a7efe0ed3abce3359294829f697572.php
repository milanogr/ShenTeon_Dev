<?php

/* GdrGameBundle:Chat/Type:_system.html.twig */
class __TwigTemplate_f272a37265ea07996f6730c8c5b5c442bde94482ab90dbc593d60b7712cf0f52 extends Twig_Template
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
        echo "<p class=\"chat-row system\">
    <span class=\"time\">";
        // line 2
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "createdAt", array()), "H.i"), "html", null, true);
        echo "</span>
            <span class=\"body\">
                ";
        // line 4
        echo trim($this->env->getExtension('chat_extension')->normalChatFilter($this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "body", array())));
        echo "
                ";
        // line 5
        if (((($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "name", array()) == $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "receiverWhispered", array())) || ($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "name", array()) == $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "senderName", array()))) && $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "extra", array()))) {
            // line 6
            echo "                    (";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "extra", array()), "html", null, true);
            echo ")
                ";
        }
        // line 8
        echo "            </span>
</p>";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Chat/Type:_system.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 8,  33 => 6,  31 => 5,  27 => 4,  22 => 2,  19 => 1,);
    }
}
/* <p class="chat-row system">*/
/*     <span class="time">{{ chat.createdAt|date('H.i') }}</span>*/
/*             <span class="body">*/
/*                 {{ chat.body|normalChat|trim|raw }}*/
/*                 {% if (personage.name == chat.receiverWhispered or personage.name == chat.senderName) and chat.extra %}*/
/*                     ({{ chat.extra }})*/
/*                 {% endif %}*/
/*             </span>*/
/* </p>*/
