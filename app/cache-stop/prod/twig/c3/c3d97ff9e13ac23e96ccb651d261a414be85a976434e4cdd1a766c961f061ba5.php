<?php

/* GdrGameBundle:Admin:shopList.html.twig */
class __TwigTemplate_d578dced95097c3b33463561a65595e2e6e8400762feca6847b817c3146ee798 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrGameBundle:Default:innerContent.html.twig", "GdrGameBundle:Admin:shopList.html.twig", 1);
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
    <div class=\"page-admin\">

        <h2><span>Admin - Lista botteghe</span></h2>


        <table id=\"table-online\" class=\"solited\">
            <thead>
            <tr>
                <th>Personaggio</th>
                <th>Bottega</th>
                <th>Prox. Tassa</th>
                <th>Prox. Prod</th>
                <th>Tassa</th>
                <td>Frequenza</td>
            </tr>
            </thead>
            <tbody>
            ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["shops"]) ? $context["shops"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["shop"]) {
            // line 27
            echo "                <tr>
                    <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["shop"], "owner", array()), "name", array()), "html", null, true);
            echo " <u>(";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["shop"], "owner", array()), "id", array()), "html", null, true);
            echo ")</u></td>
                    <td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["shop"], "name", array()), "html", null, true);
            echo " <u>(";
            echo twig_escape_filter($this->env, $this->getAttribute($context["shop"], "id", array()), "html", null, true);
            echo ")</u></td>
                    <td>";
            // line 30
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["shop"], "nextTaxAt", array()), "d/m/Y"), "html", null, true);
            echo "</td>
                    <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["shop"], "nextProductionAt", array()), "d/m/Y"), "html", null, true);
            echo "</td>
                    <td>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($context["shop"], "tax", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["shop"], "frequencyItems", array()), "html", null, true);
            echo "</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['shop'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "            </tbody>
            </table>

    </div>

";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Admin:shopList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 36,  93 => 33,  89 => 32,  85 => 31,  81 => 30,  75 => 29,  69 => 28,  66 => 27,  62 => 26,  42 => 8,  39 => 7,  32 => 4,  29 => 3,  11 => 1,);
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
/*     <div class="page-admin">*/
/* */
/*         <h2><span>Admin - Lista botteghe</span></h2>*/
/* */
/* */
/*         <table id="table-online" class="solited">*/
/*             <thead>*/
/*             <tr>*/
/*                 <th>Personaggio</th>*/
/*                 <th>Bottega</th>*/
/*                 <th>Prox. Tassa</th>*/
/*                 <th>Prox. Prod</th>*/
/*                 <th>Tassa</th>*/
/*                 <td>Frequenza</td>*/
/*             </tr>*/
/*             </thead>*/
/*             <tbody>*/
/*             {% for shop in shops %}*/
/*                 <tr>*/
/*                     <td>{{ shop.owner.name }} <u>({{ shop.owner.id }})</u></td>*/
/*                     <td>{{ shop.name }} <u>({{ shop.id }})</u></td>*/
/*                     <td>{{ shop.nextTaxAt|date("d/m/Y") }}</td>*/
/*                     <td>{{ shop.nextProductionAt|date("d/m/Y") }}</td>*/
/*                     <td>{{ shop.tax }}</td>*/
/*                     <td>{{ shop.frequencyItems }}</td>*/
/*                 </tr>*/
/*             {% endfor %}*/
/*             </tbody>*/
/*             </table>*/
/* */
/*     </div>*/
/* */
/* {% endblock %}*/
