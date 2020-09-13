<?php

/* GdrUserBundle:Registration:register.html.twig */
class __TwigTemplate_44f8ddb7aa854c72960651afcf2469559cd0ca3b61971ba05c84faf203d9d4a2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("GdrSiteBundle::layout.html.twig", "GdrUserBundle:Registration:register.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'modals' => array($this, 'block_modals'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GdrSiteBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : null), array(0 => "EWZRecaptchaBundle:Form:ewz_recaptcha_widget.html.twig"));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "    <section class=\"page-register\">
        <article>
            <section>
                <h1>Creazione dell'account di gioco</h1>

                <p>
                    Stai per creare il tuo account di gioco su Shenteon – L’Eredità delle Lune. La creazione del
                    personaggio sarà possibile solo dopo questo step.
                </p>

                <form action=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("user_register");
        echo "\" method=\"POST\">

                    ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "

                    ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "user", array()), "email", array()), 'label');
        echo "
                    ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "user", array()), "email", array()), 'widget');
        echo "
                    ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "user", array()), "email", array()), 'errors');
        echo "

                    ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "user", array()), "plainPassword", array()), "first", array()), 'label');
        echo "
                    ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "user", array()), "plainPassword", array()), "first", array()), 'widget');
        echo "
                    ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "user", array()), "plainPassword", array()), "first", array()), 'errors');
        echo "

                    ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "user", array()), "plainPassword", array()), "second", array()), 'label');
        echo "
                    ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "user", array()), "plainPassword", array()), "second", array()), 'widget');
        echo "
                    ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "user", array()), "plainPassword", array()), "second", array()), 'errors');
        echo "

                    <label class=\"required\">Accetto i <a href=\"#\" data-reveal-id=\"termini-modal\">termini di servizio</a></label>
                    ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "terms", array()), 'widget');
        echo "
                    ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "terms", array()), 'errors');
        echo "

                    <label class=\"required\">Consenso al <a href=\"#\" data-reveal-id=\"privacy-modal\">trattamento dei dati
                            personali ai sensi dell'art. 23 D.Lgs 196/03</a></label>
                    ";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "privacy", array()), 'widget');
        echo "
                    ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "privacy", array()), 'errors');
        echo "

                    ";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "ages", array()), 'label');
        echo "
                    ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "ages", array()), 'widget');
        echo "
                    ";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "ages", array()), 'errors');
        echo "
                    <p class=\"help\">*All’interno del gioco è fatto divieto di descrivere scene di sesso esplicito, ma è
                        facile che si verifichino giocate violente, di combattimento e descrizioni truculente. Per
                        questo motivo, onde evitare di ledere la sensibilità dei più piccoli, la Gestione ritiene
                        necessaria la maggiore età per partecipare a Shenteon – L’Eredità delle Lune. Continuando la
                        Registrazione dichiarate di essere maggiorenni.</p>

                    <label>Quale personaggio ti ha consigliato il gioco?</label>
                    ";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "referrer", array()), 'widget');
        echo "
                    ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "referrer", array()), 'errors');
        echo "
                    <p class=\"help\">*Questo campo non è obbligatorio. Tuttavia, se qualche utente ti ha consigliato il
                        gioco, è prevista una ricompensa per entrambi una volta che il tuo primo personaggio creato avrà
                        raggiunto un certo numero di punti esperienza. Ti basta inserire il nome del suo personaggio.
                    </p>

                    ";
        // line 58
        echo "                    ";
        // line 59
        echo "                        ";
        // line 60
        echo "                            ";
        // line 61
        echo "                            ";
        // line 62
        echo "                        ";
        // line 63
        echo "                    ";
        // line 64
        echo "                    ";
        // line 65
        echo "
                    ";
        // line 66
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

                    <input type=\"submit\" value=\"Registrati\" formnovalidate class=\"button\">
                </form>
            </section>
        </article>
    </section>
";
    }

    // line 75
    public function block_modals($context, array $blocks = array())
    {
        // line 76
        echo "    <div id=\"privacy-modal\" class=\"reveal-modal\">
        ";
        // line 77
        $this->loadTemplate("@GdrSite/Default/privacy.html.twig", "GdrUserBundle:Registration:register.html.twig", 77)->display($context);
        // line 78
        echo "        <a class=\"close-reveal-modal\">&#215;</a>
    </div>

    <div id=\"termini-modal\" class=\"reveal-modal\">
        ";
        // line 82
        $this->loadTemplate("@GdrSite/Default/termini.html.twig", "GdrUserBundle:Registration:register.html.twig", 82)->display($context);
        // line 83
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "GdrUserBundle:Registration:register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 83,  192 => 82,  186 => 78,  184 => 77,  181 => 76,  178 => 75,  166 => 66,  163 => 65,  161 => 64,  159 => 63,  157 => 62,  155 => 61,  153 => 60,  151 => 59,  149 => 58,  140 => 51,  136 => 50,  125 => 42,  121 => 41,  117 => 40,  112 => 38,  108 => 37,  101 => 33,  97 => 32,  91 => 29,  87 => 28,  83 => 27,  78 => 25,  74 => 24,  70 => 23,  65 => 21,  61 => 20,  57 => 19,  52 => 17,  47 => 15,  35 => 5,  32 => 4,  28 => 1,  26 => 2,  11 => 1,);
    }
}
/* {% extends 'GdrSiteBundle::layout.html.twig' %}*/
/* {% form_theme form 'EWZRecaptchaBundle:Form:ewz_recaptcha_widget.html.twig' %}*/
/* */
/* {% block content %}*/
/*     <section class="page-register">*/
/*         <article>*/
/*             <section>*/
/*                 <h1>Creazione dell'account di gioco</h1>*/
/* */
/*                 <p>*/
/*                     Stai per creare il tuo account di gioco su Shenteon – L’Eredità delle Lune. La creazione del*/
/*                     personaggio sarà possibile solo dopo questo step.*/
/*                 </p>*/
/* */
/*                 <form action="{{ path('user_register') }}" method="POST">*/
/* */
/*                     {{ form_errors(form) }}*/
/* */
/*                     {{ form_label(form.user.email) }}*/
/*                     {{ form_widget(form.user.email) }}*/
/*                     {{ form_errors(form.user.email) }}*/
/* */
/*                     {{ form_label(form.user.plainPassword.first) }}*/
/*                     {{ form_widget(form.user.plainPassword.first) }}*/
/*                     {{ form_errors(form.user.plainPassword.first) }}*/
/* */
/*                     {{ form_label(form.user.plainPassword.second) }}*/
/*                     {{ form_widget(form.user.plainPassword.second) }}*/
/*                     {{ form_errors(form.user.plainPassword.second) }}*/
/* */
/*                     <label class="required">Accetto i <a href="#" data-reveal-id="termini-modal">termini di servizio</a></label>*/
/*                     {{ form_widget(form.terms) }}*/
/*                     {{ form_errors(form.terms) }}*/
/* */
/*                     <label class="required">Consenso al <a href="#" data-reveal-id="privacy-modal">trattamento dei dati*/
/*                             personali ai sensi dell'art. 23 D.Lgs 196/03</a></label>*/
/*                     {{ form_widget(form.privacy) }}*/
/*                     {{ form_errors(form.privacy) }}*/
/* */
/*                     {{ form_label(form.ages) }}*/
/*                     {{ form_widget(form.ages) }}*/
/*                     {{ form_errors(form.ages) }}*/
/*                     <p class="help">*All’interno del gioco è fatto divieto di descrivere scene di sesso esplicito, ma è*/
/*                         facile che si verifichino giocate violente, di combattimento e descrizioni truculente. Per*/
/*                         questo motivo, onde evitare di ledere la sensibilità dei più piccoli, la Gestione ritiene*/
/*                         necessaria la maggiore età per partecipare a Shenteon – L’Eredità delle Lune. Continuando la*/
/*                         Registrazione dichiarate di essere maggiorenni.</p>*/
/* */
/*                     <label>Quale personaggio ti ha consigliato il gioco?</label>*/
/*                     {{ form_widget(form.referrer) }}*/
/*                     {{ form_errors(form.referrer) }}*/
/*                     <p class="help">*Questo campo non è obbligatorio. Tuttavia, se qualche utente ti ha consigliato il*/
/*                         gioco, è prevista una ricompensa per entrambi una volta che il tuo primo personaggio creato avrà*/
/*                         raggiunto un certo numero di punti esperienza. Ti basta inserire il nome del suo personaggio.*/
/*                     </p>*/
/* */
/*                     {#{{ form_label(form.recaptcha) }}#}*/
/*                     {#{{ form_widget(form.recaptcha, { 'attr': {#}*/
/*                         {#'options' : {#}*/
/*                             {#'theme': 'light',#}*/
/*                             {#'type': 'image'#}*/
/*                         {#},#}*/
/*                     {#} }) }}#}*/
/*                     {#{{ form_errors(form.recaptcha) }}#}*/
/* */
/*                     {{ form_rest(form) }}*/
/* */
/*                     <input type="submit" value="Registrati" formnovalidate class="button">*/
/*                 </form>*/
/*             </section>*/
/*         </article>*/
/*     </section>*/
/* {% endblock %}*/
/* */
/* {% block modals %}*/
/*     <div id="privacy-modal" class="reveal-modal">*/
/*         {% include '@GdrSite/Default/privacy.html.twig' %}*/
/*         <a class="close-reveal-modal">&#215;</a>*/
/*     </div>*/
/* */
/*     <div id="termini-modal" class="reveal-modal">*/
/*         {% include '@GdrSite/Default/termini.html.twig' %}*/
/*     </div>*/
/* {% endblock %}*/
