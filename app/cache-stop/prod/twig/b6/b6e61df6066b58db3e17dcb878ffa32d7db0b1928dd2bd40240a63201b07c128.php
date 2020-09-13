<?php

/* GdrAvatarBundle:Management:form-user.html.twig */
class __TwigTemplate_8afc228f6d29f6d41869da2608b7027f54b8789754e4667d6e80d4e0707217c2 extends Twig_Template
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
        echo "<hr>
<h3>Gestione del'utente</h3>
<form id=\"form-management-user\" action=\"";
        // line 3
        echo $this->env->getExtension('routing')->getUrl("avatar-management-form-user");
        echo "\" method=\"POST\" novalidate=\"novalidate\">
    ";
        // line 4
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

    <button type=\"submit\">Salva</button>
</form>";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Management:form-user.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 4,  23 => 3,  19 => 1,);
    }
}
/* <hr>*/
/* <h3>Gestione del'utente</h3>*/
/* <form id="form-management-user" action="{{ url('avatar-management-form-user') }}" method="POST" novalidate="novalidate">*/
/*     {{ form_rest(form) }}*/
/* */
/*     <button type="submit">Salva</button>*/
/* </form>*/
