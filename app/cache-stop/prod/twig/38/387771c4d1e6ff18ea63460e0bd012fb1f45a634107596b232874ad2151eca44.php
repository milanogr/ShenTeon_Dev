<?php

/* GdrGameBundle:Enclave:showShields.html.twig */
class __TwigTemplate_976df31d1034a216c6fa6366a13085ae0641d6ec11c8e33598602e16d11c7a75 extends Twig_Template
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
        $context['_seq'] = twig_ensure_traversable((isset($context["enclavi"]) ? $context["enclavi"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["enclave"]) {
            // line 2
            echo "    <div style=\"width: 48%; display: inline-block\">

        <h2>
            <a class=\"show-enclave\" href=\"#\" data-href=\"";
            // line 5
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enclave-show", array("id" => $this->getAttribute($context["enclave"], "id", array()))), "html", null, true);
            echo "\" title=\"Vedi i dettagli dell'Enclave\">
                ";
            // line 6
            if ($this->getAttribute($context["enclave"], "shieldName", array())) {
                // line 7
                echo "                    <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($context["enclave"], "shield"), "html", null, true);
                echo "\">
                ";
            }
            // line 9
            echo "                <span style=\"display: block; background-color: transparent\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["enclave"], "name", array()), "html", null, true);
            echo "</span>
            </a>
        </h2>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['enclave'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Enclave:showShields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 9,  34 => 7,  32 => 6,  28 => 5,  23 => 2,  19 => 1,);
    }
}
/* {% for enclave in enclavi %}*/
/*     <div style="width: 48%; display: inline-block">*/
/* */
/*         <h2>*/
/*             <a class="show-enclave" href="#" data-href="{{ path('enclave-show', {id: enclave.id}) }}" title="Vedi i dettagli dell'Enclave">*/
/*                 {% if enclave.shieldName %}*/
/*                     <img src="{{ vich_uploader_asset(enclave, 'shield') }}">*/
/*                 {% endif %}*/
/*                 <span style="display: block; background-color: transparent">{{ enclave.name }}</span>*/
/*             </a>*/
/*         </h2>*/
/*     </div>*/
/* {% endfor %}*/
