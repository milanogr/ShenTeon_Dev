<?php

/* GdrAvatarBundle:Grimory:index.html.twig */
class __TwigTemplate_8952caf9d3280f6e3cbf790e5ec04ece287d4d2ff842766db9e14efd86669ca5 extends Twig_Template
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
        echo "<div class=\"text-centered\">
    <h4>Punti MANA totali a disposizione: <strong>";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["maxMana"]) ? $context["maxMana"] : null), "html", null, true);
        echo "</strong></h4>
</div>

<hr>

<div id=\"grimory-centered\">
    <div id=\"grimory-left\"></div>
    <div id=\"button-levels\" class=\"clearfix\">
        <h3>Scegliete i vostri incanti</h3>

        ";
        // line 12
        $context["lastLevel"] = 1;
        // line 13
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["books"]) ? $context["books"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["book"]) {
            // line 14
            echo "
            <div class=\"flotted\">
                <a href=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("grimory-categories", array("level" => $this->getAttribute($context["loop"], "index", array()))), "html", null, true);
            echo "\" class=\"button large open-categories\">Incanti
                    liv. ";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo " <i>(";
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GdrAvatarBundle:Grimory:totalSpellsLearned", array("level" => $this->getAttribute($context["loop"], "index", array()))));
            echo " selezionati)</i></a>
            </div>
            ";
            // line 19
            $context["lastLevel"] = ($this->getAttribute($context["loop"], "index", array()) + 1);
            // line 20
            echo "        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['book'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "
        ";
        // line 22
        if (((isset($context["lastLevel"]) ? $context["lastLevel"] : null) > 6)) {
            // line 23
            echo "            ";
            $context["lastLevel"] = 6;
            // line 24
            echo "        ";
        }
        // line 25
        echo "
        ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range((isset($context["lastLevel"]) ? $context["lastLevel"] : null), 6));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 27
            echo "            <div class=\"flotted\">
                <button class=\"button large\" disabled=true>Incanti liv. ";
            // line 28
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "</button>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "
        <div class=\"text-centered\">
            ";
        // line 33
        if (((isset($context["canStudy"]) ? $context["canStudy"] : null) &&  !twig_test_empty((isset($context["books"]) ? $context["books"] : null)))) {
            // line 34
            echo "                <a href=\"";
            echo $this->env->getExtension('routing')->getUrl("grimory-study");
            echo "\" class=\"button large study\">STUDIA selezionati</a>
            ";
        } elseif (twig_test_empty(        // line 35
(isset($context["books"]) ? $context["books"] : null))) {
            // line 36
            echo "                <button class=\"button large disabled\" disabled=true>Non avete le conoscenze adatte per lo studio di incanti</button>
            ";
        } else {
            // line 38
            echo "                <button class=\"button large disabled\" disabled=true>Avete studiato i vostri incanti. Potrete studiare nuovamente dal prossimo sorgere del sole [ore 5.00 am]</button><br>
            ";
        }
        // line 40
        echo "        </div>
    </div>
    <div id=\"grimory-right\"></div>
</div>


<hr>

<div class=\"clearfix centered-spells\">
    <div id=\"spells-learned\">
        <h3>Incanti attualmente studiati</h3>

        <p class=\"hint\">(incanti attualmente utilizzabili in chat)</p>

        <table class=\"table-spells-studied solited\">
            <thead>
            <tr>
                <th>Incanto</th>
                <th>Categoria</th>
                <th class=\"level\">Lanciato</th>
                <th class=\"level\">Lvl.</th>
                <th class=\"mana\">Mana</th>
            </tr>
            </thead>
            ";
        // line 64
        $context["totalManaStudied"] = 0;
        // line 65
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["spellsStudied"]) ? $context["spellsStudied"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["spell"]) {
            // line 66
            echo "                ";
            $context["totalManaStudied"] = ((isset($context["totalManaStudied"]) ? $context["totalManaStudied"] : null) + $this->getAttribute($context["spell"], "level", array()));
            // line 67
            echo "                <tr>
                    <td><a class=\"show-spell-description\" title=\"Visualizza la descrizione dell'incanto\" href=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("grimory-show-spell", array("id" => $this->getAttribute($context["spell"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["spell"], "name", array()), "html", null, true);
            echo "</a></td>
                    <td class=\"category\">";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($context["spell"], "category", array()), "html", null, true);
            echo "</td>
                    <td class=\"level\">";
            // line 70
            if ($this->getAttribute($context["spell"], "isUsed", array())) {
                echo "Sì";
            } else {
                echo "No";
            }
            echo "</td>
                    <td class=\"level\">";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute($context["spell"], "level", array()), "html", null, true);
            echo "</td>
                    <td class=\"mana\">";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($context["spell"], "level", array()), "html", null, true);
            echo "</td>
                </tr>
                ";
            // line 74
            if ($this->getAttribute($context["loop"], "last", array())) {
                // line 75
                echo "                    <tr>
                        <td colspan=\"4\"><strong>Totale mana utilizzato:</strong></td>
                        <td class=\"mana\"><strong>";
                // line 77
                echo twig_escape_filter($this->env, (isset($context["totalManaStudied"]) ? $context["totalManaStudied"] : null), "html", null, true);
                echo " su ";
                echo twig_escape_filter($this->env, (isset($context["maxMana"]) ? $context["maxMana"] : null), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            // line 80
            echo "            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['spell'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "        </table>

        ";
        // line 83
        if (twig_test_empty((isset($context["spellsStudied"]) ? $context["spellsStudied"] : null))) {
            // line 84
            echo "            <p><i>Non avete studiato ancora nessun incanto.</i></p>
        ";
        }
        // line 86
        echo "    </div>

    <div id=\"spells-selected\">
        <h3>Incanti attualmente selezionati</h3>

        <p class=\"hint\">(incanti che diventeranno disponibili in chat una volta studiati)</p>

        <table class=\"table-spells-selected solited\">
            <thead>
            <tr>
                <th>Incanto</th>
                <th class=\"category\">Categoria</th>
                <th class=\"level\">Lvl.</th>
                <th class=\"mana\">Mana</th>
            </tr>
            </thead>
            ";
        // line 102
        $context["totalManaSelected"] = 0;
        // line 103
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["spellsSelected"]) ? $context["spellsSelected"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["spell"]) {
            // line 104
            echo "                ";
            $context["totalManaSelected"] = ((isset($context["totalManaSelected"]) ? $context["totalManaSelected"] : null) + $this->getAttribute($context["spell"], "level", array()));
            // line 105
            echo "                <tr>
                    <td>";
            // line 106
            echo twig_escape_filter($this->env, $this->getAttribute($context["spell"], "name", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 107
            echo twig_escape_filter($this->env, $this->getAttribute($context["spell"], "category", array()), "html", null, true);
            echo "</td>
                    <td class=\"level\">";
            // line 108
            echo twig_escape_filter($this->env, $this->getAttribute($context["spell"], "level", array()), "html", null, true);
            echo "</td>
                    <td class=\"mana\">";
            // line 109
            echo twig_escape_filter($this->env, $this->getAttribute($context["spell"], "level", array()), "html", null, true);
            echo "</td>
                </tr>
                ";
            // line 111
            if ($this->getAttribute($context["loop"], "last", array())) {
                // line 112
                echo "                    <tr>
                        <td colspan=\"3\"><strong>Totale mana che sarà utilizzato:</strong></td>
                        <td class=\"mana\"><strong>";
                // line 114
                echo twig_escape_filter($this->env, (isset($context["totalManaSelected"]) ? $context["totalManaSelected"] : null), "html", null, true);
                echo " su ";
                echo twig_escape_filter($this->env, (isset($context["maxMana"]) ? $context["maxMana"] : null), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            // line 117
            echo "            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['spell'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 118
        echo "        </table>

        ";
        // line 120
        if (twig_test_empty((isset($context["spellsSelected"]) ? $context["spellsSelected"] : null))) {
            // line 121
            echo "            <p><i>Non avete selezionato ancora nessun incanto.</i></p>
        ";
        }
        // line 123
        echo "    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "GdrAvatarBundle:Grimory:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  353 => 123,  349 => 121,  347 => 120,  343 => 118,  329 => 117,  321 => 114,  317 => 112,  315 => 111,  310 => 109,  306 => 108,  302 => 107,  298 => 106,  295 => 105,  292 => 104,  274 => 103,  272 => 102,  254 => 86,  250 => 84,  248 => 83,  244 => 81,  230 => 80,  222 => 77,  218 => 75,  216 => 74,  211 => 72,  207 => 71,  199 => 70,  195 => 69,  189 => 68,  186 => 67,  183 => 66,  165 => 65,  163 => 64,  137 => 40,  133 => 38,  129 => 36,  127 => 35,  122 => 34,  120 => 33,  116 => 31,  107 => 28,  104 => 27,  100 => 26,  97 => 25,  94 => 24,  91 => 23,  89 => 22,  86 => 21,  72 => 20,  70 => 19,  63 => 17,  59 => 16,  55 => 14,  37 => 13,  35 => 12,  22 => 2,  19 => 1,);
    }
}
/* <div class="text-centered">*/
/*     <h4>Punti MANA totali a disposizione: <strong>{{ maxMana }}</strong></h4>*/
/* </div>*/
/* */
/* <hr>*/
/* */
/* <div id="grimory-centered">*/
/*     <div id="grimory-left"></div>*/
/*     <div id="button-levels" class="clearfix">*/
/*         <h3>Scegliete i vostri incanti</h3>*/
/* */
/*         {% set lastLevel = 1 %}*/
/*         {% for book in books %}*/
/* */
/*             <div class="flotted">*/
/*                 <a href="{{ url('grimory-categories', {level: loop.index}) }}" class="button large open-categories">Incanti*/
/*                     liv. {{ loop.index }} <i>({{ render(controller('GdrAvatarBundle:Grimory:totalSpellsLearned', {level: loop.index})) }} selezionati)</i></a>*/
/*             </div>*/
/*             {% set lastLevel = loop.index + 1 %}*/
/*         {% endfor %}*/
/* */
/*         {% if lastLevel > 6 %}*/
/*             {% set lastLevel = 6 %}*/
/*         {% endif %}*/
/* */
/*         {% for i in lastLevel..6 %}*/
/*             <div class="flotted">*/
/*                 <button class="button large" disabled=true>Incanti liv. {{ i }}</button>*/
/*             </div>*/
/*         {% endfor %}*/
/* */
/*         <div class="text-centered">*/
/*             {% if canStudy and books is not empty %}*/
/*                 <a href="{{ url('grimory-study') }}" class="button large study">STUDIA selezionati</a>*/
/*             {% elseif books is empty %}*/
/*                 <button class="button large disabled" disabled=true>Non avete le conoscenze adatte per lo studio di incanti</button>*/
/*             {% else %}*/
/*                 <button class="button large disabled" disabled=true>Avete studiato i vostri incanti. Potrete studiare nuovamente dal prossimo sorgere del sole [ore 5.00 am]</button><br>*/
/*             {% endif %}*/
/*         </div>*/
/*     </div>*/
/*     <div id="grimory-right"></div>*/
/* </div>*/
/* */
/* */
/* <hr>*/
/* */
/* <div class="clearfix centered-spells">*/
/*     <div id="spells-learned">*/
/*         <h3>Incanti attualmente studiati</h3>*/
/* */
/*         <p class="hint">(incanti attualmente utilizzabili in chat)</p>*/
/* */
/*         <table class="table-spells-studied solited">*/
/*             <thead>*/
/*             <tr>*/
/*                 <th>Incanto</th>*/
/*                 <th>Categoria</th>*/
/*                 <th class="level">Lanciato</th>*/
/*                 <th class="level">Lvl.</th>*/
/*                 <th class="mana">Mana</th>*/
/*             </tr>*/
/*             </thead>*/
/*             {% set totalManaStudied = 0 %}*/
/*             {% for spell in spellsStudied %}*/
/*                 {% set totalManaStudied = totalManaStudied + spell.level %}*/
/*                 <tr>*/
/*                     <td><a class="show-spell-description" title="Visualizza la descrizione dell'incanto" href="{{ url('grimory-show-spell', {id: spell.id}) }}">{{ spell.name }}</a></td>*/
/*                     <td class="category">{{ spell.category }}</td>*/
/*                     <td class="level">{% if spell.isUsed %}Sì{% else %}No{% endif %}</td>*/
/*                     <td class="level">{{ spell.level }}</td>*/
/*                     <td class="mana">{{ spell.level }}</td>*/
/*                 </tr>*/
/*                 {% if loop.last %}*/
/*                     <tr>*/
/*                         <td colspan="4"><strong>Totale mana utilizzato:</strong></td>*/
/*                         <td class="mana"><strong>{{ totalManaStudied }} su {{ maxMana }}</td>*/
/*                     </tr>*/
/*                 {% endif %}*/
/*             {% endfor %}*/
/*         </table>*/
/* */
/*         {% if spellsStudied is empty %}*/
/*             <p><i>Non avete studiato ancora nessun incanto.</i></p>*/
/*         {% endif %}*/
/*     </div>*/
/* */
/*     <div id="spells-selected">*/
/*         <h3>Incanti attualmente selezionati</h3>*/
/* */
/*         <p class="hint">(incanti che diventeranno disponibili in chat una volta studiati)</p>*/
/* */
/*         <table class="table-spells-selected solited">*/
/*             <thead>*/
/*             <tr>*/
/*                 <th>Incanto</th>*/
/*                 <th class="category">Categoria</th>*/
/*                 <th class="level">Lvl.</th>*/
/*                 <th class="mana">Mana</th>*/
/*             </tr>*/
/*             </thead>*/
/*             {% set totalManaSelected = 0 %}*/
/*             {% for spell in spellsSelected %}*/
/*                 {% set totalManaSelected = totalManaSelected + spell.level %}*/
/*                 <tr>*/
/*                     <td>{{ spell.name }}</td>*/
/*                     <td>{{ spell.category }}</td>*/
/*                     <td class="level">{{ spell.level }}</td>*/
/*                     <td class="mana">{{ spell.level }}</td>*/
/*                 </tr>*/
/*                 {% if loop.last %}*/
/*                     <tr>*/
/*                         <td colspan="3"><strong>Totale mana che sarà utilizzato:</strong></td>*/
/*                         <td class="mana"><strong>{{ totalManaSelected }} su {{ maxMana }}</td>*/
/*                     </tr>*/
/*                 {% endif %}*/
/*             {% endfor %}*/
/*         </table>*/
/* */
/*         {% if spellsSelected is empty %}*/
/*             <p><i>Non avete selezionato ancora nessun incanto.</i></p>*/
/*         {% endif %}*/
/*     </div>*/
/* </div>*/
