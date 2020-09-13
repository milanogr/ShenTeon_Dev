<?php

/* @GdrAvatar/Inventory/sendItem.html.twig */
class __TwigTemplate_f4df434f3305b9e4ca2b9a4b3a74f3edc9bf7b40b7c7d947da678e3f066738b3 extends Twig_Template
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
        echo "<div class=\"container-send-item\">
    <img src=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/avatar/carro_send_item.png"), "html", null, true);
        echo "\" class=\"right\" style=\"margin-top: 30px; padding-left: 20px;\">
    <p>“Un lavorante verrà incaricato di consegnare i Vostri beni in cambio di una parcella variabile a seconda del valore e
        dell'ingombro di ciò che trasporterà.”</p>

    <form action=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
        echo "\" method=\"post\" class=\"avatar-send-item\">
        ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "destinatario", array()), 'label');
        echo "
        ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "destinatario", array()), 'widget');
        echo "

        <button type=\"submit\" class=\"button\">Trasferisci per ";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["price"]) ? $context["price"] : null), "html", null, true);
        echo " Mori</button>

        <span class=\"msg\"></span>
    </form>
</div>";
    }

    public function getTemplateName()
    {
        return "@GdrAvatar/Inventory/sendItem.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 10,  37 => 8,  33 => 7,  29 => 6,  22 => 2,  19 => 1,);
    }
}
/* <div class="container-send-item">*/
/*     <img src="{{ asset('bundles/gdrgame/images/avatar/carro_send_item.png') }}" class="right" style="margin-top: 30px; padding-left: 20px;">*/
/*     <p>“Un lavorante verrà incaricato di consegnare i Vostri beni in cambio di una parcella variabile a seconda del valore e*/
/*         dell'ingombro di ciò che trasporterà.”</p>*/
/* */
/*     <form action="{{ url }}" method="post" class="avatar-send-item">*/
/*         {{ form_label(form.destinatario) }}*/
/*         {{ form_widget(form.destinatario) }}*/
/* */
/*         <button type="submit" class="button">Trasferisci per {{ price }} Mori</button>*/
/* */
/*         <span class="msg"></span>*/
/*     </form>*/
/* </div>*/
