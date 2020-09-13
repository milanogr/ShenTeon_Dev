<?php

/* GdrAvatarBundle:Management:index.html.twig */
class __TwigTemplate_29c335d426f1393bc2eb6211ed73313666716f8da3a231ce59ba5a8a9c75a674 extends Twig_Template
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
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrAvatarBundle:Management:formCommon"));
        echo "
";
        // line 2
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrAvatarBundle:Management:formUser"));
        echo "

<hr>
<h3>Programma Referral</h3>

<table class=\"table spaced\" style=\"width: 350px\">
    <tr>
        <td class=\"dark\">Personaggio</td>
    </tr>

    ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pgRef"]) ? $context["pgRef"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["ref"]) {
            // line 13
            echo "        ";
            if ($this->getAttribute($context["ref"], "newPersonage", array())) {
                // line 14
                echo "            <tr>
                <td>";
                // line 15
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["ref"], "newPersonage", array()), "name", array()), "html", null, true);
                echo "</td>
            </tr>
        ";
            }
            // line 18
            echo "    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 19
            echo "        <tr>
            <td>Al momento nessun personaggio ha dichiarato di essersi registrato grazie a te. Invita i tuoi amici per
                guadagnare
                qualche moneta!
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ref'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "</table>

<hr>
<h3>Gestione della Morte</h3>

";
        // line 31
        if (($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "isDead", array()) == false)) {
            // line 32
            echo "    <a class=\"button medium kill\" data-href=\"";
            echo $this->env->getExtension('routing')->getPath("avatar-management-kill", array("suicide" => false));
            echo "\">Dichiara
        l'uccisione del PG</a>
    <a class=\"button medium kill\" data-href=\"";
            // line 34
            echo $this->env->getExtension('routing')->getPath("avatar-management-kill", array("suicide" => true));
            echo "\">Dichiara il suicidio
        del PG</a>
";
        } else {
            // line 37
            echo "    <p>Il tuo personaggio risulta essere un anima.</p>
";
        }
        // line 39
        echo "

";
        // line 41
        if (($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "canManageEnclave", array()) || $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "canManageClan", array()))) {
            // line 42
            echo "    <hr>
    <h3>Gestione Enclave</h3>

    ";
            // line 45
            if ($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "canManageEnclave", array())) {
                // line 46
                echo "        <a class=\"button medium\" href=\"";
                echo $this->env->getExtension('routing')->getPath("master-enclave-index");
                echo "\">Gestisci Enclave</a>
    ";
            }
            // line 48
            echo "
    ";
            // line 49
            if ($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "canManageEnclave", array())) {
                // line 50
                echo "        <a class=\"button medium\" href=\"";
                echo $this->env->getExtension('routing')->getPath("master-forum-enclave-admin");
                echo "\">Gestisci Forum Enclave</a>
    ";
            }
            // line 52
            echo "
    ";
            // line 53
            if ($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "canManageClan", array())) {
                // line 54
                echo "        <a class=\"button medium\" href=\"";
                echo $this->env->getExtension('routing')->getPath("master-clan-index");
                echo "\">Gestisci Enclave Razziale</a>
    ";
            }
            // line 56
            echo "
    ";
            // line 57
            if ($this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "canManageClan", array())) {
                // line 58
                echo "        <a class=\"button medium\" href=\"";
                echo $this->env->getExtension('routing')->getPath("master-forum-clan-admin");
                echo "\">Gestisci Forum Enclave Razziale</a>
    ";
            }
        }
        // line 61
        echo "

";
        // line 63
        if ((isset($context["canMarry"]) ? $context["canMarry"] : null)) {
            // line 64
            echo "    <hr>

    <h3>Gestione Matrimoni</h3>

    <a class=\"button medium\" href=\"";
            // line 68
            echo $this->env->getExtension('routing')->getPath("matrimoni-index");
            echo "\">Officia matrimoni</a>
";
        }
        // line 70
        echo "
";
        // line 71
        if ((isset($context["isFate"]) ? $context["isFate"] : null)) {
            // line 72
            echo "    <hr>

    <h3>Gestione Fato</h3>

    <a class=\"button medium\" href=\"";
            // line 76
            echo $this->env->getExtension('routing')->getPath("fato-index");
            echo "\">Gestione Fato</a>
";
        }
        // line 78
        echo "
";
        // line 79
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 80
            echo "    <hr>

    <h3>Gestione Admin</h3>

    <a class=\"button medium\" href=\"";
            // line 84
            echo $this->env->getExtension('routing')->getPath("g-admin-items");
            echo "\">Assegna oggetti</a>
    <a class=\"button medium\" href=\"";
            // line 85
            echo $this->env->getExtension('routing')->getPath("g-show-locations");
            echo "\">Gestione location</a>
    <a class=\"button medium\" href=\"";
            // line 86
            echo $this->env->getExtension('routing')->getPath("g-edit-pg");
            echo "\">Cambia razza/età/connotati</a>
    <a class=\"button medium\" href=\"";
            // line 87
            echo $this->env->getExtension('routing')->getPath("g-shop-list");
            echo "\">Lista botteghe</a>
";
        }
        // line 89
        echo "
";
        // line 90
        if ((isset($context["isMod"]) ? $context["isMod"] : null)) {
            // line 91
            echo "    <hr>

    <h3>Gestione Moderatori</h3>

    <a class=\"button medium\" href=\"";
            // line 95
            echo $this->env->getExtension('routing')->getPath("mod-esilio");
            echo "\">Pannello Esilio</a>
    <a class=\"button medium\" href=\"";
            // line 96
            echo $this->env->getExtension('routing')->getPath("mod-last-registered");
            echo "\">Lista ultimi PG registrati</a>
    <a class=\"button medium\" href=\"";
            // line 97
            echo $this->env->getExtension('routing')->getPath("mod-same-ips");
            echo "\">Lista controllo IP uguali</a>
";
        }
        // line 99
        echo "
<span class=\"fix-grafico\"></span>";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Management:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  233 => 99,  228 => 97,  224 => 96,  220 => 95,  214 => 91,  212 => 90,  209 => 89,  204 => 87,  200 => 86,  196 => 85,  192 => 84,  186 => 80,  184 => 79,  181 => 78,  176 => 76,  170 => 72,  168 => 71,  165 => 70,  160 => 68,  154 => 64,  152 => 63,  148 => 61,  141 => 58,  139 => 57,  136 => 56,  130 => 54,  128 => 53,  125 => 52,  119 => 50,  117 => 49,  114 => 48,  108 => 46,  106 => 45,  101 => 42,  99 => 41,  95 => 39,  91 => 37,  85 => 34,  79 => 32,  77 => 31,  70 => 26,  58 => 19,  53 => 18,  47 => 15,  44 => 14,  41 => 13,  36 => 12,  23 => 2,  19 => 1,);
    }
}
/* {{ render(controller('GdrAvatarBundle:Management:formCommon')) }}*/
/* {{ render(controller('GdrAvatarBundle:Management:formUser')) }}*/
/* */
/* <hr>*/
/* <h3>Programma Referral</h3>*/
/* */
/* <table class="table spaced" style="width: 350px">*/
/*     <tr>*/
/*         <td class="dark">Personaggio</td>*/
/*     </tr>*/
/* */
/*     {% for ref in pgRef %}*/
/*         {% if ref.newPersonage %}*/
/*             <tr>*/
/*                 <td>{{ ref.newPersonage.name }}</td>*/
/*             </tr>*/
/*         {% endif %}*/
/*     {% else %}*/
/*         <tr>*/
/*             <td>Al momento nessun personaggio ha dichiarato di essersi registrato grazie a te. Invita i tuoi amici per*/
/*                 guadagnare*/
/*                 qualche moneta!*/
/*             </td>*/
/*         </tr>*/
/*     {% endfor %}*/
/* </table>*/
/* */
/* <hr>*/
/* <h3>Gestione della Morte</h3>*/
/* */
/* {% if personage.isDead == false %}*/
/*     <a class="button medium kill" data-href="{{ path('avatar-management-kill', {suicide: false}) }}">Dichiara*/
/*         l'uccisione del PG</a>*/
/*     <a class="button medium kill" data-href="{{ path('avatar-management-kill', {suicide: true}) }}">Dichiara il suicidio*/
/*         del PG</a>*/
/* {% else %}*/
/*     <p>Il tuo personaggio risulta essere un anima.</p>*/
/* {% endif %}*/
/* */
/* */
/* {% if (personage.canManageEnclave or personage.canManageClan) %}*/
/*     <hr>*/
/*     <h3>Gestione Enclave</h3>*/
/* */
/*     {% if(personage.canManageEnclave) %}*/
/*         <a class="button medium" href="{{ path("master-enclave-index") }}">Gestisci Enclave</a>*/
/*     {% endif %}*/
/* */
/*     {% if(personage.canManageEnclave) %}*/
/*         <a class="button medium" href="{{ path("master-forum-enclave-admin") }}">Gestisci Forum Enclave</a>*/
/*     {% endif %}*/
/* */
/*     {% if(personage.canManageClan) %}*/
/*         <a class="button medium" href="{{ path("master-clan-index") }}">Gestisci Enclave Razziale</a>*/
/*     {% endif %}*/
/* */
/*     {% if(personage.canManageClan) %}*/
/*         <a class="button medium" href="{{ path("master-forum-clan-admin") }}">Gestisci Forum Enclave Razziale</a>*/
/*     {% endif %}*/
/* {% endif %}*/
/* */
/* */
/* {% if(canMarry) %}*/
/*     <hr>*/
/* */
/*     <h3>Gestione Matrimoni</h3>*/
/* */
/*     <a class="button medium" href="{{ path("matrimoni-index") }}">Officia matrimoni</a>*/
/* {% endif %}*/
/* */
/* {% if(isFate) %}*/
/*     <hr>*/
/* */
/*     <h3>Gestione Fato</h3>*/
/* */
/*     <a class="button medium" href="{{ path("fato-index") }}">Gestione Fato</a>*/
/* {% endif %}*/
/* */
/* {% if is_granted('ROLE_ADMIN') %}*/
/*     <hr>*/
/* */
/*     <h3>Gestione Admin</h3>*/
/* */
/*     <a class="button medium" href="{{ path('g-admin-items') }}">Assegna oggetti</a>*/
/*     <a class="button medium" href="{{ path('g-show-locations') }}">Gestione location</a>*/
/*     <a class="button medium" href="{{ path('g-edit-pg') }}">Cambia razza/età/connotati</a>*/
/*     <a class="button medium" href="{{ path('g-shop-list') }}">Lista botteghe</a>*/
/* {% endif %}*/
/* */
/* {% if isMod %}*/
/*     <hr>*/
/* */
/*     <h3>Gestione Moderatori</h3>*/
/* */
/*     <a class="button medium" href="{{ path('mod-esilio') }}">Pannello Esilio</a>*/
/*     <a class="button medium" href="{{ path("mod-last-registered") }}">Lista ultimi PG registrati</a>*/
/*     <a class="button medium" href="{{ path("mod-same-ips") }}">Lista controllo IP uguali</a>*/
/* {% endif %}*/
/* */
/* <span class="fix-grafico"></span>*/
