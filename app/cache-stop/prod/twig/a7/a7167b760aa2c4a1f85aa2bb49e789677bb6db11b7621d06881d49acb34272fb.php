<?php

/* GdrGameBundle:Chat/Type:_meteo.html.twig */
class __TwigTemplate_ca361da60ccb742d6c5b3a9b5a4535ca68011c4aa129c1545de18bd2698bce41 extends Twig_Template
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
        echo "<p class=\"chat-row meteo gdrtooltip\"
   title=\"Questa è una stringa del Meteo. Descrive un cambiamento climatico da tenere in considerazione.\">
            <span class=\"body\">
                ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["chat"]) ? $context["chat"] : null), "body", array()), "html", null, true);
        echo "
            </span>
</p>
<script>
    if (typeof Refresh != 'undefined') {
        Refresh.meteo();
    }
</script>";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Chat/Type:_meteo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 4,  19 => 1,);
    }
}
/* <p class="chat-row meteo gdrtooltip"*/
/*    title="Questa è una stringa del Meteo. Descrive un cambiamento climatico da tenere in considerazione.">*/
/*             <span class="body">*/
/*                 {{ chat.body }}*/
/*             </span>*/
/* </p>*/
/* <script>*/
/*     if (typeof Refresh != 'undefined') {*/
/*         Refresh.meteo();*/
/*     }*/
/* </script>*/
