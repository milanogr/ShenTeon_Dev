<?php

/* GdrGameBundle:Library:showBook.html.twig */
class __TwigTemplate_57aac1835c6977694e95440904dee7494cd91975f09f74fcc2bfc2c36715a0a8 extends Twig_Template
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
        echo "<table class=\"spaced\" style=\"margin-top: 13px;\">
    <tr>
        <td>
            <h2>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["book"]) ? $context["book"] : null), "title", array()), "html", null, true);
        echo "</h2>

            <div class=\"body-book\">
                ";
        // line 7
        echo $this->getAttribute((isset($context["book"]) ? $context["book"] : null), "body", array());
        echo "
            </div>

            <hr style=\" width: 70%; margin: 10px auto\">

            <p style=\"text-align: right\"><i>";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["book"]) ? $context["book"] : null), "author", array()), "html", null, true);
        echo "</i></p>

        </td>
    </tr>
</table>";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Library:showBook.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 12,  30 => 7,  24 => 4,  19 => 1,);
    }
}
/* <table class="spaced" style="margin-top: 13px;">*/
/*     <tr>*/
/*         <td>*/
/*             <h2>{{ book.title }}</h2>*/
/* */
/*             <div class="body-book">*/
/*                 {{ book.body|raw }}*/
/*             </div>*/
/* */
/*             <hr style=" width: 70%; margin: 10px auto">*/
/* */
/*             <p style="text-align: right"><i>{{ book.author }}</i></p>*/
/* */
/*         </td>*/
/*     </tr>*/
/* </table>*/
