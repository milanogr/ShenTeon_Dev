<?php

/* @GdrAvatar/Mod/sameIps.html.twig */
class __TwigTemplate_4e574e1e99e40cd247aecb99fcb862c34e932a8a7452163106e79c075a4f8a53 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "@GdrAvatar/Mod/sameIps.html.twig", 1);
        $this->blocks = array(
            'goBack' => array($this, 'block_goBack'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GdrGameBundle:Default:innerContent.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_goBack($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Location:renderGoBack"));
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
    <div class=\"page-mod\">

        <h2><span>Moderazione - IP</span></h2>

        <p class=\"text-centered\">Attenzione: bisogna prendere con le pinze questa lista. Esistono svariati modi per
            modificare il proprio ip e spesso molti provider (es. Fastweb) utilizzano una sorta di condivisione di
            IP per più utenze (IP statico pubblico). Questa tabella è semplicemente uno strumento che indica
            PROBABILMENTE un doppio account, ma non va trattato come tale. La tabella nasce con lo scopo di
            effettuare
            controlli
            incrociati (conti di gioco, passaggi di oggetti...), e non come caccia all'IP uguale.</p>

        <div class=\"form-centered centered-form\">

            ";
        // line 23
        $context["lastIp"] = null;
        // line 24
        echo "            ";
        // line 25
        echo "
                ";
        // line 27
        echo "                    ";
        // line 28
        echo "                ";
        // line 29
        echo "
                ";
        // line 31
        echo "                    ";
        // line 32
        echo "                    ";
        // line 33
        echo "                        ";
        // line 34
        echo "                        ";
        // line 35
        echo "                    ";
        // line 36
        echo "                ";
        // line 37
        echo "                ";
        // line 38
        echo "                    ";
        // line 39
        echo "                        ";
        // line 40
        echo "                        ";
        // line 41
        echo "                            ";
        // line 42
        echo "                                ";
        // line 43
        echo "                            ";
        // line 44
        echo "                        ";
        // line 45
        echo "                    ";
        // line 46
        echo "                    ";
        // line 47
        echo "                        ";
        // line 48
        echo "                    ";
        // line 49
        echo "                ";
        // line 50
        echo "
                ";
        // line 52
        echo "                    ";
        // line 53
        echo "                ";
        // line 54
        echo "                ";
        // line 55
        echo "            ";
        // line 56
        echo "                ";
        // line 57
        echo "            ";
        // line 58
        echo "        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "@GdrAvatar/Mod/sameIps.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 58,  124 => 57,  122 => 56,  120 => 55,  118 => 54,  116 => 53,  114 => 52,  111 => 50,  109 => 49,  107 => 48,  105 => 47,  103 => 46,  101 => 45,  99 => 44,  97 => 43,  95 => 42,  93 => 41,  91 => 40,  89 => 39,  87 => 38,  85 => 37,  83 => 36,  81 => 35,  79 => 34,  77 => 33,  75 => 32,  73 => 31,  70 => 29,  68 => 28,  66 => 27,  63 => 25,  61 => 24,  59 => 23,  42 => 8,  39 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Default:innerContent.html.twig' %}*/
/* */
/* {% block goBack %}*/
/*     {{ render(controller('GdrGameBundle:Location:renderGoBack')) }}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     <div class="page-mod">*/
/* */
/*         <h2><span>Moderazione - IP</span></h2>*/
/* */
/*         <p class="text-centered">Attenzione: bisogna prendere con le pinze questa lista. Esistono svariati modi per*/
/*             modificare il proprio ip e spesso molti provider (es. Fastweb) utilizzano una sorta di condivisione di*/
/*             IP per più utenze (IP statico pubblico). Questa tabella è semplicemente uno strumento che indica*/
/*             PROBABILMENTE un doppio account, ma non va trattato come tale. La tabella nasce con lo scopo di*/
/*             effettuare*/
/*             controlli*/
/*             incrociati (conti di gioco, passaggi di oggetti...), e non come caccia all'IP uguale.</p>*/
/* */
/*         <div class="form-centered centered-form">*/
/* */
/*             {% set lastIp = null %}*/
/*             {#{% for ip in ips %}#}*/
/* */
/*                 {#{% if (lastIp != ip.ip and loop.first == false) %}#}*/
/*                     {#</table>#}*/
/*                 {#{% endif %}#}*/
/* */
/*                 {#{% if loop.first or lastIp != ip.ip %}#}*/
/*                     {#<table class="spaced alternated">#}*/
/*                     {#<tr class="dark">#}*/
/*                         {#<th>Personaggi con stesso IP</th>#}*/
/*                         {#<th>Data login</th>#}*/
/*                     {#</tr>#}*/
/*                 {#{% endif %}#}*/
/*                 {#<tr>#}*/
/*                     {#<td>#}*/
/*                         {#<strong>{{ ip.personage.name }}</strong>#}*/
/*                         {#{% if is_granted("ROLE_ADMIN") %}#}*/
/*                             {#<abbr class="gdrtooltip" title="Info solo gestione">#}*/
/*                                 {#{{ ip.user.email }}#}*/
/*                             {#</abbr>#}*/
/*                         {#{% endif %}#}*/
/*                     {#</td>#}*/
/*                     {#<td>#}*/
/*                         {#{{ ip.createdAt|date("d/m/Y H:i") }}#}*/
/*                     {#</td>#}*/
/*                 {#</tr>#}*/
/* */
/*                 {#{% if loop.last %}#}*/
/*                     {#</table>#}*/
/*                 {#{% endif %}#}*/
/*                 {#{% set lastIp = ip.ip %}#}*/
/*             {#{% else %}#}*/
/*                 {#<p class="text-centered"><strong>Al momento non ci sono IP uguali.</strong></p>#}*/
/*             {#{% endfor %}#}*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
