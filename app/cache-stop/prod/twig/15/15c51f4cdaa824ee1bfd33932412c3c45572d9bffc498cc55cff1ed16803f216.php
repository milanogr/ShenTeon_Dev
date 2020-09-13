<?php

/* GdrAvatarBundle:Inventory:index.html.twig */
class __TwigTemplate_b55559e91c83c5645611e5516a04e69f355b6dc77873eb7b1de3dd73b18a6a12 extends Twig_Template
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
        echo "<div class=\"categories-items-container\">

";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 4
            echo "
    <a class=\"category-item-box data-inventory-items gdrtooltip\"
       title=\"";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "categoryName", array()), "html", null, true);
            echo "\"
        href=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-inventory-items", array("name" => (isset($context["name"]) ? $context["name"] : null), "category" => $this->getAttribute($context["category"], "categoryId", array()))), "html", null, true);
            echo "\">
        <img src=\"/uploads/itemsType/";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "categoryImage", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "categoryImage", array()), "html", null, true);
            echo "\">
    </a>

";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 12
            echo "
    <p class=\"text-centered\">Non disponi di alcun oggetto.</p>

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "</div>


<div class=\"js-inventory-items-container\">

<p class=\"text-center\">Scegli una categoria per vedere gli oggetti.</p>

</div>";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Inventory:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 16,  51 => 12,  40 => 8,  36 => 7,  32 => 6,  28 => 4,  23 => 3,  19 => 1,);
    }
}
/* <div class="categories-items-container">*/
/* */
/* {% for category in categories %}*/
/* */
/*     <a class="category-item-box data-inventory-items gdrtooltip"*/
/*        title="{{ category.categoryName }}"*/
/*         href="{{ url('avatar-inventory-items', {name: name, category: category.categoryId}) }}">*/
/*         <img src="/uploads/itemsType/{{ category.categoryImage }}" alt="{{ category.categoryImage }}">*/
/*     </a>*/
/* */
/* {% else %}*/
/* */
/*     <p class="text-centered">Non disponi di alcun oggetto.</p>*/
/* */
/* {% endfor %}*/
/* </div>*/
/* */
/* */
/* <div class="js-inventory-items-container">*/
/* */
/* <p class="text-center">Scegli una categoria per vedere gli oggetti.</p>*/
/* */
/* </div>*/
