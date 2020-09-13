<?php

/* GdrGameBundle:Chat:enterChat.html.twig */
class __TwigTemplate_104ae942622ee17ada60951f00f05ce21c83683726a32d34ea8668df3c351d5e extends Twig_Template
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
        echo "<div class=\"enter-in-chat\">
    ";
        // line 2
        if (((isset($context["canEnter"]) ? $context["canEnter"] : null) == false)) {
            // line 3
            echo "        <p>Il tuo personaggio è morto e le anime qui non possono giocare.</p>
    ";
        } else {
            // line 5
            echo "        <a href=\"";
            echo $this->env->getExtension('routing')->getPath("chat-join");
            echo "\" class=\"button medium\">Entra in chat</a> <br>
        <p>Una volta entrato in chat non potrai più inserire e/o togliere oggetti dalla borsa. Quando uscirai dalla
            chat, la stessa
            limitazione sarà applicata per altri 20 minuti, anche se non entrerai nuovamente in gioco.</p>
    ";
        }
        // line 10
        echo "    <a data-href=\"";
        echo $this->env->getExtension('routing')->getUrl("chat-show-online");
        echo "\" title=\"Visualizza i presenti\" id=\"show-online\">
        [Visualizza i presenti]
    </a>
</div>";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Chat:enterChat.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 10,  28 => 5,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* <div class="enter-in-chat">*/
/*     {% if canEnter == false %}*/
/*         <p>Il tuo personaggio è morto e le anime qui non possono giocare.</p>*/
/*     {% else %}*/
/*         <a href="{{ path('chat-join') }}" class="button medium">Entra in chat</a> <br>*/
/*         <p>Una volta entrato in chat non potrai più inserire e/o togliere oggetti dalla borsa. Quando uscirai dalla*/
/*             chat, la stessa*/
/*             limitazione sarà applicata per altri 20 minuti, anche se non entrerai nuovamente in gioco.</p>*/
/*     {% endif %}*/
/*     <a data-href="{{ url('chat-show-online') }}" title="Visualizza i presenti" id="show-online">*/
/*         [Visualizza i presenti]*/
/*     </a>*/
/* </div>*/
