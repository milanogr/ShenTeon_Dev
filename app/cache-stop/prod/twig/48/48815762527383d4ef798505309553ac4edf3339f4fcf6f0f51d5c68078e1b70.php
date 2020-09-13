<?php

/* GdrAvatarBundle:Inventory:item.html.twig */
class __TwigTemplate_36a41bdc18f35f893ae172a296675711184d4c1448de5cf410b71805a5bde846 extends Twig_Template
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
        echo "<div class=\"inventory-item\" style=\"clear:both\">

    <table class=\"spaced\" style=\"margin-top: 13px;\">
        <tr>
            <td class=\"text-centered\">
                <h2>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
        echo "</h2>

                ";
        // line 8
        if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "imageName", array())) {
            // line 9
            echo "                    <img style=\"margin-bottom: 8px\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset((isset($context["item"]) ? $context["item"] : null), "image"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
            echo "\">
                ";
        }
        // line 11
        echo "
                ";
        // line 12
        if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "longDescription", array())) {
            // line 13
            echo "                    ";
            echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "longDescription", array());
            echo "
                ";
        } else {
            // line 15
            echo "                    <p>";
            echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "shortDescription", array());
            echo "</p>
                ";
        }
        // line 17
        echo "
                ";
        // line 18
        if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "bigImageName", array())) {
            // line 19
            echo "                    <hr style=\" width: 70%; margin: 10px auto\">
                    <img src=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset((isset($context["item"]) ? $context["item"] : null), "bigImage"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
            echo "\">
                ";
        }
        // line 22
        echo "            </td>
        </tr>
    </table>
</div>";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Inventory:item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 22,  66 => 20,  63 => 19,  61 => 18,  58 => 17,  52 => 15,  46 => 13,  44 => 12,  41 => 11,  33 => 9,  31 => 8,  26 => 6,  19 => 1,);
    }
}
/* <div class="inventory-item" style="clear:both">*/
/* */
/*     <table class="spaced" style="margin-top: 13px;">*/
/*         <tr>*/
/*             <td class="text-centered">*/
/*                 <h2>{{ item.name }}</h2>*/
/* */
/*                 {% if item.imageName %}*/
/*                     <img style="margin-bottom: 8px" src="{{ vich_uploader_asset(item, 'image') }}" title="{{ item.name }}">*/
/*                 {% endif %}*/
/* */
/*                 {% if item.longDescription %}*/
/*                     {{ item.longDescription|raw }}*/
/*                 {% else %}*/
/*                     <p>{{ item.shortDescription|raw }}</p>*/
/*                 {% endif %}*/
/* */
/*                 {% if item.bigImageName %}*/
/*                     <hr style=" width: 70%; margin: 10px auto">*/
/*                     <img src="{{ vich_uploader_asset(item, 'bigImage') }}" title="{{ item.name }}">*/
/*                 {% endif %}*/
/*             </td>*/
/*         </tr>*/
/*     </table>*/
/* </div>*/
