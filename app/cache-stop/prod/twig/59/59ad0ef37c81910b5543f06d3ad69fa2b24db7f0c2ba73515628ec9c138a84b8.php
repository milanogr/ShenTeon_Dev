<?php

/* GdrGameBundle:Chat:passaOggetti.html.twig */
class __TwigTemplate_e13b00c0aa13a4e8c2f194a5cc7de02c30010ff84065db16a1ecd2f7d66bf122 extends Twig_Template
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
        echo "<form id=\"form-passa-oggetti\" method=\"post\" action=\"";
        echo $this->env->getExtension('routing')->getUrl("chat-passa-oggetti", array("formSended" => true));
        echo "\">

    <label>Seleziona oggetto/i da passare:</label>
    ";
        // line 4
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "inventories", array()), 'widget', array("attr" => array("class" => "inventories")));
        echo "

    ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "destinatario", array()), 'row');
        echo "

    ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

    <div><button type=\"submit\">Passa Oggetto/i</button></div>

    <p class=\"error\"></p>
</form>

<script>
    \$(document).ready(function() {
        \$('.inventories').select2({
            'allowClear': true,
            'placeholder': 'Seleziona oggetto/i:'
        });
    });
</script>";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Chat:passaOggetti.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 8,  31 => 6,  26 => 4,  19 => 1,);
    }
}
/* <form id="form-passa-oggetti" method="post" action="{{ url('chat-passa-oggetti', {formSended: true}) }}">*/
/* */
/*     <label>Seleziona oggetto/i da passare:</label>*/
/*     {{ form_widget(form.inventories, {'attr': {'class': 'inventories'}}) }}*/
/* */
/*     {{ form_row(form.destinatario) }}*/
/* */
/*     {{ form_rest(form) }}*/
/* */
/*     <div><button type="submit">Passa Oggetto/i</button></div>*/
/* */
/*     <p class="error"></p>*/
/* </form>*/
/* */
/* <script>*/
/*     $(document).ready(function() {*/
/*         $('.inventories').select2({*/
/*             'allowClear': true,*/
/*             'placeholder': 'Seleziona oggetto/i:'*/
/*         });*/
/*     });*/
/* </script>*/
