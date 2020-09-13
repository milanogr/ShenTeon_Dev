<?php

/* GdrAvatarBundle:Management:form-common.html.twig */
class __TwigTemplate_84f8eefa6a4cd7242452955ab453230e2e51bcb97f49bd46965b53b137a6c9dd extends Twig_Template
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
        echo "<h3>Gestione del personaggio</h3>
<form id=\"form-management-common\" action=\"";
        // line 2
        echo $this->env->getExtension('routing')->getUrl("avatar-management-form-common");
        echo "\" method=\"POST\"
      novalidate=\"novalidate\" ";
        // line 3
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo ">

    ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "avatar", array()), 'label');
        echo "
    ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "avatar", array()), 'widget');
        echo "
    ";
        // line 7
        if ($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "avatarName", array())) {
            // line 8
            echo "        <a target=\"_blank\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset((isset($context["personage"]) ? $context["personage"] : null), "avatar"), "html", null, true);
            echo "\" title=\"Guarda il tuo avatar\">Mostra avatar attuale</a>
    ";
        }
        // line 10
        echo "
    ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

    <button type=\"submit\">Salva</button>
</form>";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Management:form-common.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 11,  47 => 10,  41 => 8,  39 => 7,  35 => 6,  31 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }
}
/* <h3>Gestione del personaggio</h3>*/
/* <form id="form-management-common" action="{{ url('avatar-management-form-common') }}" method="POST"*/
/*       novalidate="novalidate" {{ form_enctype(form) }}>*/
/* */
/*     {{ form_label(form.avatar) }}*/
/*     {{ form_widget(form.avatar) }}*/
/*     {% if personage.avatarName %}*/
/*         <a target="_blank" href="{{ vich_uploader_asset(personage, 'avatar') }}" title="Guarda il tuo avatar">Mostra avatar attuale</a>*/
/*     {% endif %}*/
/* */
/*     {{ form_rest(form) }}*/
/* */
/*     <button type="submit">Salva</button>*/
/* </form>*/
