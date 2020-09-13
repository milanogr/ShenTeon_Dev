<?php

/* GdrUserBundle:Login:emailConfirmation.html.twig */
class __TwigTemplate_2b72f9a2321b26c2ca9c1cba19cbe78f646ebc579b42eef3c2fbb13cedaab010 extends Twig_Template
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
        echo "E' stato chiesto il recupero della tua password. Segui questo link:

<a href=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("user_do_reset", array("token" => (isset($context["token"]) ? $context["token"] : null), "email" => (isset($context["email"]) ? $context["email"] : null))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("user_do_reset", array("token" => (isset($context["token"]) ? $context["token"] : null), "email" => (isset($context["email"]) ? $context["email"] : null))), "html", null, true);
        echo "</a>";
    }

    public function getTemplateName()
    {
        return "GdrUserBundle:Login:emailConfirmation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }
}
/* E' stato chiesto il recupero della tua password. Segui questo link:*/
/* */
/* <a href="{{ url('user_do_reset', { 'token': token, 'email': email }) }}">{{ url('user_do_reset', { 'token': token, 'email': email }) }}</a>*/
