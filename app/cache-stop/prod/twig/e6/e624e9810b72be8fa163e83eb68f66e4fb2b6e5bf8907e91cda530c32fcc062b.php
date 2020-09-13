<?php

/* @GdrGame/Enclave/enclaveList.html.twig */
class __TwigTemplate_3ace985cb1700de2fb1760794096158c72d5b13693cde127913dfeed4358494b extends Twig_Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categoriesEnclave"]) ? $context["categoriesEnclave"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 2
            echo "    <table class=\"enclavi shields solited\">
        <tr>
            <th colspan=\"2\">";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "name", array()), "html", null, true);
            echo "</th>
        </tr>
        <tr>
            <td colspan=\"2\" style=\"text-align: center\">
                ";
            // line 8
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrGameBundle:Enclave:showShields", array("id" => $this->getAttribute($context["category"], "id", array()), "isClan" => (isset($context["isClan"]) ? $context["isClan"] : null), "notOfficial" => (isset($context["notOfficial"]) ? $context["notOfficial"] : null))));
            echo "
            </td>
        </tr>
        <tfoot class=\"hide data-target-details\"></tfoot>
    </table>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "@GdrGame/Enclave/enclaveList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 8,  27 => 4,  23 => 2,  19 => 1,);
    }
}
/* {% for category in categoriesEnclave %}*/
/*     <table class="enclavi shields solited">*/
/*         <tr>*/
/*             <th colspan="2">{{ category.name }}</th>*/
/*         </tr>*/
/*         <tr>*/
/*             <td colspan="2" style="text-align: center">*/
/*                 {{ render(controller('GdrGameBundle:Enclave:showShields', {id: category.id, isClan: isClan, notOfficial: notOfficial})) }}*/
/*             </td>*/
/*         </tr>*/
/*         <tfoot class="hide data-target-details"></tfoot>*/
/*     </table>*/
/* {% endfor %}*/
