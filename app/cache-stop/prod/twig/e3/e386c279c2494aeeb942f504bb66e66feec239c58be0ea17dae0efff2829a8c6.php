<?php

/* GdrGameBundle:Chat:passaMori.html.twig */
class __TwigTemplate_f7c9b34f4782be12cf6df15be476152b0acd399de6ef4624ab2415774b7b7e99 extends Twig_Template
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
        echo "<form id=\"form-passa-mori\" method=\"post\" action=\"";
        echo $this->env->getExtension('routing')->getUrl("chat-passa-mori", array("formSended" => true));
        echo "\">
    ";
        // line 2
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "destinatario", array()), 'row');
        echo "

    <label>Mori da passare (in tasca avete ";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["mori"]) ? $context["mori"] : null), "html", null, true);
        echo " Mori)</label>
    ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "mori", array()), 'widget');
        echo "

    ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

    <button type=\"submit\">Passa Mori</button>

    <p class=\"error\"></p>
</form>";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Chat:passaMori.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 7,  33 => 5,  29 => 4,  24 => 2,  19 => 1,);
    }
}
/* <form id="form-passa-mori" method="post" action="{{ url('chat-passa-mori', {formSended: true}) }}">*/
/*     {{ form_row(form.destinatario) }}*/
/* */
/*     <label>Mori da passare (in tasca avete {{ mori }} Mori)</label>*/
/*     {{ form_widget(form.mori) }}*/
/* */
/*     {{ form_rest(form) }}*/
/* */
/*     <button type="submit">Passa Mori</button>*/
/* */
/*     <p class="error"></p>*/
/* </form>*/
