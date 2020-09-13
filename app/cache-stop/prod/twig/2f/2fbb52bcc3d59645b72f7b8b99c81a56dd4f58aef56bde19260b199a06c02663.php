<?php

/* GdrGameBundle:Default:location.html.twig */
class __TwigTemplate_543bfa7c5dbb0e6c15ab8b5c13bb2aa6063e92bb5c5779f328d81c801439027b extends Twig_Template
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
        echo "<figure>
    <figcaption>";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["location"]) ? $context["location"] : null), "name", array()), "html", null, true);
        echo "</figcaption>

    ";
        // line 4
        if ((isset($context["isProperty"]) ? $context["isProperty"] : null)) {
            // line 5
            echo "        <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset((isset($context["image"]) ? $context["image"] : null), "chatImage"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["location"]) ? $context["location"] : null), "name", array()), "html", null, true);
            echo "\">
    ";
        } elseif (        // line 6
(isset($context["image"]) ? $context["image"] : null)) {
            // line 7
            echo "        <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset((isset($context["image"]) ? $context["image"] : null), "image"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["location"]) ? $context["location"] : null), "name", array()), "html", null, true);
            echo "\">
    ";
        } else {
            // line 9
            echo "        <img src=\"http://placehold.it/210x110\" alt=\"Immagine mancante\" title=\"Immagine mancante\">
    ";
        }
        // line 11
        echo "</figure>

<a id=\"show-location-modal\" class=\"view-description gdrtooltip\" data-href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("location-info");
        echo "\"
   title=\"Leggi la descrizione della location\">Descrizione</a>
<a id=\"show-map-modal\" class=\"view-map gdrtooltip\" data-href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("location-map-description");
        echo "\"
   title=\"Visualizza la mappa del luogo\">Mappa</a>
";
        // line 17
        if ($this->getAttribute((isset($context["location"]) ? $context["location"] : null), "subChat", array())) {
            // line 18
            echo "    <a id=\"change-location-chat\" class=\"gdrtooltip button small\" title='Entra nella chat \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["location"]) ? $context["location"] : null), "subChat", array()), "html", null, true);
            echo "\"'
       data-location=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["location"]) ? $context["location"] : null), "subchat", array()), "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["location"]) ? $context["location"] : null), "subChat", array()), "html", null, true);
            echo "</a>
";
        }
        // line 21
        echo "
<a id=\"hideSx\" class=\"gdrtooltip\" title=\"Clicca per avere più spazio\"></a>";
    }

    public function getTemplateName()
    {
        return "GdrGameBundle:Default:location.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 21,  71 => 19,  66 => 18,  64 => 17,  59 => 15,  54 => 13,  50 => 11,  46 => 9,  38 => 7,  36 => 6,  29 => 5,  27 => 4,  22 => 2,  19 => 1,);
    }
}
/* <figure>*/
/*     <figcaption>{{ location.name }}</figcaption>*/
/* */
/*     {% if isProperty %}*/
/*         <img src="{{ vich_uploader_asset(image, 'chatImage') }}" alt="{{ location.name }}">*/
/*     {% elseif image %}*/
/*         <img src="{{ vich_uploader_asset(image, 'image') }}" alt="{{ location.name }}">*/
/*     {% else %}*/
/*         <img src="http://placehold.it/210x110" alt="Immagine mancante" title="Immagine mancante">*/
/*     {% endif %}*/
/* </figure>*/
/* */
/* <a id="show-location-modal" class="view-description gdrtooltip" data-href="{{ path('location-info') }}"*/
/*    title="Leggi la descrizione della location">Descrizione</a>*/
/* <a id="show-map-modal" class="view-map gdrtooltip" data-href="{{ path('location-map-description') }}"*/
/*    title="Visualizza la mappa del luogo">Mappa</a>*/
/* {% if location.subChat %}*/
/*     <a id="change-location-chat" class="gdrtooltip button small" title='Entra nella chat "{{ location.subChat }}"'*/
/*        data-location="{{ location.subchat.id }}">{{ location.subChat }}</a>*/
/* {% endif %}*/
/* */
/* <a id="hideSx" class="gdrtooltip" title="Clicca per avere più spazio"></a>*/
