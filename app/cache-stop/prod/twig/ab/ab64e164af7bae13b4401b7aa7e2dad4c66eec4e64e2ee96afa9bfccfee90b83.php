<?php

/* @GdrAvatar/Mod/esilio.html.twig */
class __TwigTemplate_75adf8d31a6fb33f27202339203614531e480fa793bc81e131c5dbd22c8e48ea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "@GdrAvatar/Mod/esilio.html.twig", 1);
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

        <h2><span>Moderazione - Esilia PG</span></h2>

        <div class=\"centered-form\">
            <div class=\"errors\">
                ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 16
            echo "
                    <p><strong>";
            // line 17
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "</strong></p>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "            </div>

            <form action=\"\" method=\"POST\">

                ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "personage", array()), 'label');
        echo "
                ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "personage", array()), 'widget');
        echo "
                ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "personage", array()), 'errors');
        echo "

                ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "reason", array()), 'label');
        echo "
                ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "reason", array()), 'widget');
        echo "
                ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "reason", array()), 'errors');
        echo "

                ";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "days", array()), 'label');
        echo "
                ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "days", array()), 'widget');
        echo "
                ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "days", array()), 'errors');
        echo "

                ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

                <button type=\"submit\" formnovalidate=\"formnovalidate\">Esilia il personaggio</button>
            </form>
        </div>

        <hr>

        <h3>Personaggi Esiliati</h3>
        <table class=\"spaced\">
            <tr class=\"dark\">
                <th>Personaggi</th>
                <th>Moderatore</th>
                <th>Giorni</th>
                <th>Dal</th>
                <th>Al</th>
                <th>Motivo</th>
            </tr>
            ";
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginator"]) ? $context["paginator"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["esilio"]) {
            // line 54
            echo "                <tr>
                    <td class=\"dark\">
                        ";
            // line 56
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["esilio"], "banned", array()), "personages", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["personage"]) {
                // line 57
                echo "                            ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["personage"], "name", array()), "html", null, true);
                echo "
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['personage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "                    </td>
                    <td>";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($context["esilio"], "moderator", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($context["esilio"], "days", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 62
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["esilio"], "createdAt", array()), "d/m/Y H:i"), "html", null, true);
            echo "</td>
                    <td>";
            // line 63
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["esilio"], "until", array()), "d/m/Y H:i"), "html", null, true);
            echo "</td>
                    <td>";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($context["esilio"], "reason", array()), "html", null, true);
            echo "</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['esilio'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "        </table>

        <div class=\"text-centered\">
            ";
        // line 70
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
        echo "
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "@GdrAvatar/Mod/esilio.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  186 => 70,  181 => 67,  172 => 64,  168 => 63,  164 => 62,  160 => 61,  156 => 60,  153 => 59,  144 => 57,  140 => 56,  136 => 54,  132 => 53,  111 => 35,  106 => 33,  102 => 32,  98 => 31,  93 => 29,  89 => 28,  85 => 27,  80 => 25,  76 => 24,  72 => 23,  66 => 19,  58 => 17,  55 => 16,  51 => 15,  42 => 8,  39 => 7,  32 => 4,  29 => 3,  11 => 1,);
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
/*         <h2><span>Moderazione - Esilia PG</span></h2>*/
/* */
/*         <div class="centered-form">*/
/*             <div class="errors">*/
/*                 {% for flashMessage in app.session.flashbag.get('success') %}*/
/* */
/*                     <p><strong>{{ flashMessage }}</strong></p>*/
/*                 {% endfor %}*/
/*             </div>*/
/* */
/*             <form action="" method="POST">*/
/* */
/*                 {{ form_label(form.personage) }}*/
/*                 {{ form_widget(form.personage) }}*/
/*                 {{ form_errors(form.personage) }}*/
/* */
/*                 {{ form_label(form.reason) }}*/
/*                 {{ form_widget(form.reason) }}*/
/*                 {{ form_errors(form.reason) }}*/
/* */
/*                 {{ form_label(form.days) }}*/
/*                 {{ form_widget(form.days) }}*/
/*                 {{ form_errors(form.days) }}*/
/* */
/*                 {{ form_rest(form) }}*/
/* */
/*                 <button type="submit" formnovalidate="formnovalidate">Esilia il personaggio</button>*/
/*             </form>*/
/*         </div>*/
/* */
/*         <hr>*/
/* */
/*         <h3>Personaggi Esiliati</h3>*/
/*         <table class="spaced">*/
/*             <tr class="dark">*/
/*                 <th>Personaggi</th>*/
/*                 <th>Moderatore</th>*/
/*                 <th>Giorni</th>*/
/*                 <th>Dal</th>*/
/*                 <th>Al</th>*/
/*                 <th>Motivo</th>*/
/*             </tr>*/
/*             {% for esilio in paginator %}*/
/*                 <tr>*/
/*                     <td class="dark">*/
/*                         {% for personage in esilio.banned.personages %}*/
/*                             {{ personage.name }}*/
/*                         {% endfor %}*/
/*                     </td>*/
/*                     <td>{{ esilio.moderator }}</td>*/
/*                     <td>{{ esilio.days }}</td>*/
/*                     <td>{{ esilio.createdAt|date("d/m/Y H:i") }}</td>*/
/*                     <td>{{ esilio.until|date("d/m/Y H:i") }}</td>*/
/*                     <td>{{ esilio.reason }}</td>*/
/*                 </tr>*/
/*             {% endfor %}*/
/*         </table>*/
/* */
/*         <div class="text-centered">*/
/*             {{ knp_pagination_render(paginator) }}*/
/*         </div>*/
/*     </div>*/
/* */
/* {% endblock %}*/
