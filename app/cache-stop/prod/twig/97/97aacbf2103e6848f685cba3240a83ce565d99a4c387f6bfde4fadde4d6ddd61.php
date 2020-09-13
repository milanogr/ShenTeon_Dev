<?php

/* GdrGameBundle:Online:index.html.twig */
class __TwigTemplate_691bed9cf64490ea01a87a75c453f364ca728930b7935ac79579ad90009d8cf5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Online:index.html.twig", 1);
        $this->blocks = array(
            'goBack' => array($this, 'block_goBack'),
            'javascripts' => array($this, 'block_javascripts'),
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
    public function block_javascripts($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    ";
        // line 10
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "2a7512c_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_2a7512c_0") : $this->env->getExtension('asset')->getAssetUrl("js/2a7512c_enclavi_1.js");
            // line 12
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "2a7512c"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_2a7512c") : $this->env->getExtension('asset')->getAssetUrl("js/2a7512c.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "
    <div id=\"online-container\">
        <h1><span>Presenti</span></h1>

        <div class=\"legenda\">
            <span><img src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/online/gestore.png"), "html", null, true);
        echo "\" title=\"Gestore\"
                       class=\"gdrtooltip\">
            Gestore</span>
            <span><img src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/online/moderatore.png"), "html", null, true);
        echo "\" title=\"Moderatore\"
                       class=\"gdrtooltip\"> Moderatore</span>
            <span><img src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/online/guida.png"), "html", null, true);
        echo "\" title=\"Guida\"
                       class=\"gdrtooltip\">
            Guida</span>
        </div>
        <div class=\"legenda\">
            <span><img class=\"gdrtooltip\" title=\"Disponibile al gioco\"
                       src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/online/disponibile.png"), "html", null, true);
        echo "\"> Disponibile al gioco</span>
            <span><img class=\"gdrtooltip\" title=\"Sto giocando\"
                       src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/online/giocando.png"), "html", null, true);
        echo "\"> Sto giocando</span>
            <span><img class=\"gdrtooltip\" title=\"Occupato\"
                       src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/online/occupato.png"), "html", null, true);
        echo "\"> Occupato</span>
        </div>

        ";
        // line 40
        $this->loadTemplate("@GdrGame/Online/list.html.twig", "GdrGameBundle:Online:index.html.twig", 40)->display($context);
        // line 41
        echo "
        <hr>

        <div class=\"centered-form status\">
            <form action=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("online-index");
        echo "\" method=\"post\">
                <label>Modifica il tuo status</label>
                ";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "status", array()), 'widget');
        echo "

                ";
        // line 49
        if ((isset($context["canBeInvisibile"]) ? $context["canBeInvisibile"] : null)) {
            // line 50
            echo "                    <label>Sono invisibile?</label>
                    ";
            // line 51
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "isInvisible", array()), 'widget');
            echo "
                ";
        }
        // line 53
        echo "
                ";
        // line 54
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
                <button type=\"submit\">Salva</button>
            </form>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Online:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 54,  143 => 53,  138 => 51,  135 => 50,  133 => 49,  128 => 47,  123 => 45,  117 => 41,  115 => 40,  109 => 37,  104 => 35,  99 => 33,  90 => 27,  85 => 25,  79 => 22,  72 => 17,  69 => 16,  53 => 12,  49 => 10,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  11 => 1,);
    }
}
/* {% extends 'GdrGameBundle:Default:innerContent.html.twig' %}*/
/* */
/* {% block goBack %}*/
/*     {{ render(controller('GdrGameBundle:Location:renderGoBack')) }}*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/* */
/*     {% javascripts filter='?uglifyjs2'*/
/*     '@GdrGameBundle/Resources/public/javascripts/enclavi.js' %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     <div id="online-container">*/
/*         <h1><span>Presenti</span></h1>*/
/* */
/*         <div class="legenda">*/
/*             <span><img src="{{ asset('bundles/gdrgame/images/online/gestore.png') }}" title="Gestore"*/
/*                        class="gdrtooltip">*/
/*             Gestore</span>*/
/*             <span><img src="{{ asset('bundles/gdrgame/images/online/moderatore.png') }}" title="Moderatore"*/
/*                        class="gdrtooltip"> Moderatore</span>*/
/*             <span><img src="{{ asset('bundles/gdrgame/images/online/guida.png') }}" title="Guida"*/
/*                        class="gdrtooltip">*/
/*             Guida</span>*/
/*         </div>*/
/*         <div class="legenda">*/
/*             <span><img class="gdrtooltip" title="Disponibile al gioco"*/
/*                        src="{{ asset('bundles/gdrgame/images/online/disponibile.png') }}"> Disponibile al gioco</span>*/
/*             <span><img class="gdrtooltip" title="Sto giocando"*/
/*                        src="{{ asset('bundles/gdrgame/images/online/giocando.png') }}"> Sto giocando</span>*/
/*             <span><img class="gdrtooltip" title="Occupato"*/
/*                        src="{{ asset('bundles/gdrgame/images/online/occupato.png') }}"> Occupato</span>*/
/*         </div>*/
/* */
/*         {% include '@GdrGame/Online/list.html.twig' %}*/
/* */
/*         <hr>*/
/* */
/*         <div class="centered-form status">*/
/*             <form action="{{ path('online-index') }}" method="post">*/
/*                 <label>Modifica il tuo status</label>*/
/*                 {{ form_widget(form.status) }}*/
/* */
/*                 {% if canBeInvisibile %}*/
/*                     <label>Sono invisibile?</label>*/
/*                     {{ form_widget(form.isInvisible) }}*/
/*                 {% endif %}*/
/* */
/*                 {{ form_rest(form) }}*/
/*                 <button type="submit">Salva</button>*/
/*             </form>*/
/*         </div>*/
/*     </div>*/
/* */
/* {% endblock %}*/
