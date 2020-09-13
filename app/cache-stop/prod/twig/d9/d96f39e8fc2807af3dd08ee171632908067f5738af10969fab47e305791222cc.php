<?php

/* @GdrGame/Grave/incipt.html.twig */
class __TwigTemplate_19a124028fcc99cf90d4783bd684c335c45b2afe020720e2db1aa8284eb1b152 extends Twig_Template
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
        echo "<h1><span>Cimitero</span></h1>

<p class=\"text-centered\">
    <img src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/gdrgame/images/cimitero.jpg"), "html", null, true);
        echo "\">
</p>

<p class=\"text-centered\">In questo luogo, nel silenzio delle lapidi, delle edicole e dei vialetti, riposano le
    spoglie di coloro che muoiono a Teon. <br>
    Una visita a quest'ultimo lido equivale ad un viaggio nella storia di tutti noi.
</p>";
    }

    public function getTemplateName()
    {
        return "@GdrGame/Grave/incipt.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 4,  19 => 1,);
    }
}
/* <h1><span>Cimitero</span></h1>*/
/* */
/* <p class="text-centered">*/
/*     <img src="{{ asset('bundles/gdrgame/images/cimitero.jpg') }}">*/
/* </p>*/
/* */
/* <p class="text-centered">In questo luogo, nel silenzio delle lapidi, delle edicole e dei vialetti, riposano le*/
/*     spoglie di coloro che muoiono a Teon. <br>*/
/*     Una visita a quest'ultimo lido equivale ad un viaggio nella storia di tutti noi.*/
/* </p>*/
