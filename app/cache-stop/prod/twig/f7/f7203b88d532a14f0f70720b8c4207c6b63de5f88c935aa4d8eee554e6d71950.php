<?php

/* GdrAvatarBundle:Default:index.html.twig */
class __TwigTemplate_6c971e1e842083f90ddf6a473b4cb71f93b0d37d1e50249ba86fe02a1a4c0459 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@GdrGame/Default/index.html.twig", "GdrAvatarBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'goBack' => array($this, 'block_goBack'),
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@GdrGame/Default/index.html.twig";
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
        // line 9
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "35aa7fc_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_35aa7fc_0") : $this->env->getExtension('asset')->getAssetUrl("js/35aa7fc_foundation.section_1.js");
            // line 13
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "35aa7fc_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_35aa7fc_1") : $this->env->getExtension('asset')->getAssetUrl("js/35aa7fc_avatar_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "35aa7fc"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_35aa7fc") : $this->env->getExtension('asset')->getAssetUrl("js/35aa7fc.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 15
        echo "
";
    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
        // line 19
        echo "
    <div class=\"avatar-container\">
        <div class=\"wrapper-avatar section-container tabs\" data-section=\"tabs\">
            <section>
                <p class=\"title\" data-section-title><a
                            href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-index", array("name" => $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "name", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "name", array()), "html", null, true);
        echo "</a></p>

                <div class=\"content tab-avatar\" data-section-content>
                    ";
        // line 27
        $this->loadTemplate("@GdrAvatar/Default/avatar.html.twig", "GdrAvatarBundle:Default:index.html.twig", 27)->display(array_merge($context, array("personage" => (isset($context["personage"]) ? $context["personage"] : null))));
        // line 28
        echo "                </div>
            </section>
            <section>
                <p class=\"title\" data-section-title><a href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-inventory", array("name" => $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "name", array()))), "html", null, true);
        echo "\">Inventario</a>
                </p>

                <div class=\"content tab-inventario\" data-section-content></div>
            </section>
            <section>
                <p class=\"title\" data-section-title><a href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-dress-list", array("name" => $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "name", array()))), "html", null, true);
        echo "\">Vestiti</a>
                </p>

                <div class=\"content tab-vestiti\" data-pagination=true data-section-content></div>
            </section>
            <section>
                <p class=\"title\" data-section-title><a
                            href=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-bag-list", array("name" => $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "name", array()))), "html", null, true);
        echo "\">Borsa</a>
                </p>

                <div class=\"content tab-bag\" data-section-content></div>
            </section>
            <section>
                <p class=\"title\" data-section-title><a href=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("property-index", array("name" => $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "name", array()))), "html", null, true);
        echo "\">Proprietà</a>
                </p>

                <div class=\"content tab-property\" data-pagination=true data-section-content></div>
            </section>
            <section>
                <p class=\"title\" data-section-title><a href=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-diary-list", array("name" => $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "name", array()))), "html", null, true);
        echo "\">Diario</a>
                </p>

                <div class=\"content tab-diary\" data-section-content></div>
            </section>
            <section>
                <p class=\"title\" data-section-title><a href=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-experience", array("name" => $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "name", array()))), "html", null, true);
        echo "\">Esperienze</a>
                </p>

                <div class=\"content tab-experience\" data-section-content></div>
            </section>
            <section>
                <p class=\"title\" data-section-title><a href=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-achivement-index", array("name" => $this->getAttribute((isset($context["personage"]) ? $context["personage"] : null), "name", array()))), "html", null, true);
        echo "\">Riconoscimenti</a>
                </p>

                <div class=\"content tab-achievement tab-inventario\" data-section-content></div>
            </section>
            ";
        // line 73
        if ((isset($context["is_owner"]) ? $context["is_owner"] : null)) {
            // line 74
            echo "                <section>
                    <p class=\"title\" data-section-title><a href=\"";
            // line 75
            echo $this->env->getExtension('routing')->getUrl("skill-index");
            echo "\">Skill</a>
                    </p>

                    <div class=\"content tab-skill\" data-section-content></div>
                </section>

                <section>
                    <p class=\"title\" data-section-title><a href=\"";
            // line 82
            echo $this->env->getExtension('routing')->getUrl("combat-index");
            echo "\">Combattimento</a>
                    </p>

                    <div class=\"content tab-combat\" data-section-content></div>
                </section>

                <section>
                    <p class=\"title\" data-section-title><a href=\"";
            // line 89
            echo $this->env->getExtension('routing')->getUrl("grimory-index");
            echo "\">Grimorio</a>
                    </p>

                    <div class=\"content tab-grimory\" data-section-content></div>
                </section>

                <section>
                    <p class=\"title\" data-section-title><a href=\"";
            // line 96
            echo $this->env->getExtension('routing')->getUrl("avatar-management");
            echo "\">Gestione</a>
                    </p>

                    <div class=\"content tab-management\" data-section-content></div>
                </section>
            ";
        }
        // line 102
        echo "        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 102,  200 => 96,  190 => 89,  180 => 82,  170 => 75,  167 => 74,  165 => 73,  157 => 68,  148 => 62,  139 => 56,  130 => 50,  121 => 44,  111 => 37,  102 => 31,  97 => 28,  95 => 27,  87 => 24,  80 => 19,  77 => 18,  72 => 15,  52 => 13,  48 => 9,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  11 => 1,);
    }
}
/* {% extends '@GdrGame/Default/index.html.twig' %}*/
/* */
/* {% block goBack %}*/
/*     {{ render(controller('GdrGameBundle:Location:renderGoBack')) }}*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/*     {% javascripts filter='?uglifyjs2'*/
/*     '@GdrGameBundle/Resources/public/javascripts/foundation/foundation.section.js'*/
/*     '@GdrGameBundle/Resources/public/javascripts/avatar.js'*/
/*     %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* */
/* {% endblock %}*/
/* */
/* {% block body %}*/
/* */
/*     <div class="avatar-container">*/
/*         <div class="wrapper-avatar section-container tabs" data-section="tabs">*/
/*             <section>*/
/*                 <p class="title" data-section-title><a*/
/*                             href="{{ url('avatar-index', {name: personage.name}) }}">{{ personage.name }}</a></p>*/
/* */
/*                 <div class="content tab-avatar" data-section-content>*/
/*                     {% include '@GdrAvatar/Default/avatar.html.twig' with { personage: personage } %}*/
/*                 </div>*/
/*             </section>*/
/*             <section>*/
/*                 <p class="title" data-section-title><a href="{{ url('avatar-inventory', {name: personage.name}) }}">Inventario</a>*/
/*                 </p>*/
/* */
/*                 <div class="content tab-inventario" data-section-content></div>*/
/*             </section>*/
/*             <section>*/
/*                 <p class="title" data-section-title><a href="{{ url('avatar-dress-list', {name: personage.name}) }}">Vestiti</a>*/
/*                 </p>*/
/* */
/*                 <div class="content tab-vestiti" data-pagination=true data-section-content></div>*/
/*             </section>*/
/*             <section>*/
/*                 <p class="title" data-section-title><a*/
/*                             href="{{ url('avatar-bag-list', {name: personage.name}) }}">Borsa</a>*/
/*                 </p>*/
/* */
/*                 <div class="content tab-bag" data-section-content></div>*/
/*             </section>*/
/*             <section>*/
/*                 <p class="title" data-section-title><a href="{{ url('property-index', {name: personage.name}) }}">Proprietà</a>*/
/*                 </p>*/
/* */
/*                 <div class="content tab-property" data-pagination=true data-section-content></div>*/
/*             </section>*/
/*             <section>*/
/*                 <p class="title" data-section-title><a href="{{ url('avatar-diary-list', {name: personage.name}) }}">Diario</a>*/
/*                 </p>*/
/* */
/*                 <div class="content tab-diary" data-section-content></div>*/
/*             </section>*/
/*             <section>*/
/*                 <p class="title" data-section-title><a href="{{ url('avatar-experience', {name: personage.name}) }}">Esperienze</a>*/
/*                 </p>*/
/* */
/*                 <div class="content tab-experience" data-section-content></div>*/
/*             </section>*/
/*             <section>*/
/*                 <p class="title" data-section-title><a href="{{ url('avatar-achivement-index', {name: personage.name}) }}">Riconoscimenti</a>*/
/*                 </p>*/
/* */
/*                 <div class="content tab-achievement tab-inventario" data-section-content></div>*/
/*             </section>*/
/*             {% if is_owner %}*/
/*                 <section>*/
/*                     <p class="title" data-section-title><a href="{{ url('skill-index') }}">Skill</a>*/
/*                     </p>*/
/* */
/*                     <div class="content tab-skill" data-section-content></div>*/
/*                 </section>*/
/* */
/*                 <section>*/
/*                     <p class="title" data-section-title><a href="{{ url('combat-index') }}">Combattimento</a>*/
/*                     </p>*/
/* */
/*                     <div class="content tab-combat" data-section-content></div>*/
/*                 </section>*/
/* */
/*                 <section>*/
/*                     <p class="title" data-section-title><a href="{{ url('grimory-index') }}">Grimorio</a>*/
/*                     </p>*/
/* */
/*                     <div class="content tab-grimory" data-section-content></div>*/
/*                 </section>*/
/* */
/*                 <section>*/
/*                     <p class="title" data-section-title><a href="{{ url('avatar-management') }}">Gestione</a>*/
/*                     </p>*/
/* */
/*                     <div class="content tab-management" data-section-content></div>*/
/*                 </section>*/
/*             {% endif %}*/
/*         </div>*/
/*     </div>*/
/* */
/* {% endblock %}*/
