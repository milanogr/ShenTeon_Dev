<?php

/* GdrUserBundle:Login:emailConfirmation.txt.twig */
class __TwigTemplate_0319e850a666da8791e1208379efbc8a6abeeef2027daa56221a58d41af3f747 extends Twig_Template
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
        echo "E' stato chiesto il recupero della tua password. Fai copia incolla di questo link nel tuo browser:
";
        // line 2
        echo $this->env->getExtension('routing')->getUrl("user_do_reset", array("token" => (isset($context["token"]) ? $context["token"] : null), "email" => (isset($context["email"]) ? $context["email"] : null)));
    }

    public function getTemplateName()
    {
        return "GdrUserBundle:Login:emailConfirmation.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }
}
/* E' stato chiesto il recupero della tua password. Fai copia incolla di questo link nel tuo browser:*/
/* {{ url('user_do_reset', { 'token': token, 'email': email }) }}*/
