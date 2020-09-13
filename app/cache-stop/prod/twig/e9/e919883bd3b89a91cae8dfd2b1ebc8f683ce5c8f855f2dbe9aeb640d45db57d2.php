<?php

/* GdrGameBundle:Forum:index.html.twig */
class __TwigTemplate_8bd66be5c37693714024cbd6e3c5af860b3eacea42eb0612bd895b07b95ed9ea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Forum:index.html.twig", 1);
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
            // asset "c21d74b_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c21d74b_0") : $this->env->getExtension('asset')->getAssetUrl("js/c21d74b_forum_1.js");
            // line 12
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "c21d74b"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c21d74b") : $this->env->getExtension('asset')->getAssetUrl("js/c21d74b.js");
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
    <div id=\"forum-container\">

        ";
        // line 20
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 21
            echo "            <div class=\"form-centered centered-form\">
                <select id=\"admin-switch-forum\" class=\"select2\">
                    <option>Clicca da questa lista un'Enclave per visualizzare il suo Forum</option>
                    ";
            // line 24
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["hiddenForums"]) ? $context["hiddenForums"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["forum"]) {
                // line 25
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bacheca-lista-forum", array("id" => $this->getAttribute($this->getAttribute($context["forum"], "enclave", array()), "id", array()))), "html", null, true);
                echo "\">Forum de ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["forum"], "enclave", array()), "name", array()), "html", null, true);
                echo "</option>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['forum'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "                </select>
            </div>
        ";
        }
        // line 30
        echo "
        <h1><span>Forum pubblico</span></h1>
        ";
        // line 32
        $this->loadTemplate("@GdrGame/Forum/listForum.html.twig", "GdrGameBundle:Forum:index.html.twig", 32)->display(array_merge($context, array("forums" => (isset($context["forums"]) ? $context["forums"] : null))));
        // line 33
        echo "
        ";
        // line 34
        if (((isset($context["enclaveForums"]) ? $context["enclaveForums"] : null) != null)) {
            // line 35
            echo "            <h1><span>Forum di Enclave</span></h1>
            ";
            // line 36
            $this->loadTemplate("@GdrGame/Forum/listForum.html.twig", "GdrGameBundle:Forum:index.html.twig", 36)->display(array_merge($context, array("forums" => (isset($context["enclaveForums"]) ? $context["enclaveForums"] : null))));
            // line 37
            echo "        ";
        }
        // line 38
        echo "
        ";
        // line 39
        if (((isset($context["clanForums"]) ? $context["clanForums"] : null) != null)) {
            // line 40
            echo "            <h1><span>Forum di Enclave Razziale</span></h1>
            ";
            // line 41
            $this->loadTemplate("@GdrGame/Forum/listForum.html.twig", "GdrGameBundle:Forum:index.html.twig", 41)->display(array_merge($context, array("forums" => (isset($context["clanForums"]) ? $context["clanForums"] : null))));
            // line 42
            echo "        ";
        }
        // line 43
        echo "
        ";
        // line 44
        if (((isset($context["gestioneForums"]) ? $context["gestioneForums"] : null) != null)) {
            // line 45
            echo "            <h1><span>Forum di Gestione</span></h1>
            ";
            // line 46
            $this->loadTemplate("@GdrGame/Forum/listForum.html.twig", "GdrGameBundle:Forum:index.html.twig", 46)->display(array_merge($context, array("forums" => (isset($context["gestioneForums"]) ? $context["gestioneForums"] : null))));
            // line 47
            echo "        ";
        }
        // line 48
        echo "
        ";
        // line 49
        if (((isset($context["modForums"]) ? $context["modForums"] : null) != null)) {
            // line 50
            echo "            <h1><span>Forum Moderatori</span></h1>
            ";
            // line 51
            $this->loadTemplate("@GdrGame/Forum/listForum.html.twig", "GdrGameBundle:Forum:index.html.twig", 51)->display(array_merge($context, array("forums" => (isset($context["modForums"]) ? $context["modForums"] : null))));
            // line 52
            echo "        ";
        }
        // line 53
        echo "
        ";
        // line 54
        if (((isset($context["fateForums"]) ? $context["fateForums"] : null) != null)) {
            // line 55
            echo "            <h1><span>Forum Fato</span></h1>
            ";
            // line 56
            $this->loadTemplate("@GdrGame/Forum/listForum.html.twig", "GdrGameBundle:Forum:index.html.twig", 56)->display(array_merge($context, array("forums" => (isset($context["fateForums"]) ? $context["fateForums"] : null))));
            // line 57
            echo "        ";
        }
        // line 58
        echo "
        ";
        // line 59
        if (((isset($context["masterForums"]) ? $context["masterForums"] : null) != null)) {
            // line 60
            echo "            <h1><span>Forum Master</span></h1>
            ";
            // line 61
            $this->loadTemplate("@GdrGame/Forum/listForum.html.twig", "GdrGameBundle:Forum:index.html.twig", 61)->display(array_merge($context, array("forums" => (isset($context["masterForums"]) ? $context["masterForums"] : null))));
            // line 62
            echo "        ";
        }
        // line 63
        echo "    </div>

";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Forum:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 63,  185 => 62,  183 => 61,  180 => 60,  178 => 59,  175 => 58,  172 => 57,  170 => 56,  167 => 55,  165 => 54,  162 => 53,  159 => 52,  157 => 51,  154 => 50,  152 => 49,  149 => 48,  146 => 47,  144 => 46,  141 => 45,  139 => 44,  136 => 43,  133 => 42,  131 => 41,  128 => 40,  126 => 39,  123 => 38,  120 => 37,  118 => 36,  115 => 35,  113 => 34,  110 => 33,  108 => 32,  104 => 30,  99 => 27,  88 => 25,  84 => 24,  79 => 21,  77 => 20,  72 => 17,  69 => 16,  53 => 12,  49 => 10,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  11 => 1,);
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
/*     '@GdrGameBundle/Resources/public/javascripts/forum.js' %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     <div id="forum-container">*/
/* */
/*         {% if is_granted("ROLE_ADMIN") %}*/
/*             <div class="form-centered centered-form">*/
/*                 <select id="admin-switch-forum" class="select2">*/
/*                     <option>Clicca da questa lista un'Enclave per visualizzare il suo Forum</option>*/
/*                     {% for forum in hiddenForums %}*/
/*                         <option value="{{ path('bacheca-lista-forum', {id: forum.enclave.id}) }}">Forum de {{ forum.enclave.name }}</option>*/
/*                     {% endfor %}*/
/*                 </select>*/
/*             </div>*/
/*         {% endif %}*/
/* */
/*         <h1><span>Forum pubblico</span></h1>*/
/*         {% include '@GdrGame/Forum/listForum.html.twig' with {forums: forums} %}*/
/* */
/*         {% if enclaveForums != null %}*/
/*             <h1><span>Forum di Enclave</span></h1>*/
/*             {% include '@GdrGame/Forum/listForum.html.twig' with {forums: enclaveForums} %}*/
/*         {% endif %}*/
/* */
/*         {% if clanForums != null %}*/
/*             <h1><span>Forum di Enclave Razziale</span></h1>*/
/*             {% include '@GdrGame/Forum/listForum.html.twig' with {forums: clanForums} %}*/
/*         {% endif %}*/
/* */
/*         {% if gestioneForums != null %}*/
/*             <h1><span>Forum di Gestione</span></h1>*/
/*             {% include '@GdrGame/Forum/listForum.html.twig' with {forums: gestioneForums} %}*/
/*         {% endif %}*/
/* */
/*         {% if modForums != null %}*/
/*             <h1><span>Forum Moderatori</span></h1>*/
/*             {% include '@GdrGame/Forum/listForum.html.twig' with {forums: modForums} %}*/
/*         {% endif %}*/
/* */
/*         {% if fateForums != null %}*/
/*             <h1><span>Forum Fato</span></h1>*/
/*             {% include '@GdrGame/Forum/listForum.html.twig' with {forums: fateForums} %}*/
/*         {% endif %}*/
/* */
/*         {% if masterForums != null %}*/
/*             <h1><span>Forum Master</span></h1>*/
/*             {% include '@GdrGame/Forum/listForum.html.twig' with {forums: masterForums} %}*/
/*         {% endif %}*/
/*     </div>*/
/* */
/* {% endblock %}*/
