<?php

/* @GdrAvatar/Diary/list.html.twig */
class __TwigTemplate_9e599847165b03a3856ba794301be6b9d10275593fbdfd7e7d797537e7196ddb extends Twig_Template
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
        echo "<div class=\"pages-container\">
    ";
        // line 2
        if ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "totalItemCount", array())) {
            // line 3
            echo "    <ul class=\"first-ul\">
        ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["paginator"]) ? $context["paginator"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["diary"]) {
                // line 5
                echo "        <li>
            <a class=\"diary-show\" href=\"";
                // line 6
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-diary-show", array("id" => $this->getAttribute($context["diary"], "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["diary"], "title", array()), "html", null, true);
                echo "</a> <br>
            <span>";
                // line 7
                echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute($context["diary"], "createdAt", array()), "none", "none", "it_IT", null, "d MMMM Y"), "html", null, true);
                echo "</span>

            ";
                // line 9
                if ((isset($context["is_owner"]) ? $context["is_owner"] : null)) {
                    // line 10
                    echo "                <span><a class=\"edit\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-diary-edit", array("id" => $this->getAttribute($context["diary"], "id", array()))), "html", null, true);
                    echo "\" title=\"Modifica la pagina\">[modifica]</a></span>
                <span><a class=\"delete\" href=\"";
                    // line 11
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("avatar-diary-delete", array("id" => $this->getAttribute($context["diary"], "id", array()))), "html", null, true);
                    echo "\" title=\"Elimina la pagina\">[elimina]</a></span>
                <abbr title=\"Info visibile solo a te\">
                    ";
                    // line 13
                    if ($this->getAttribute($context["diary"], "isHidden", array())) {
                        // line 14
                        echo "                        (pagina visibile solo a te)
                    ";
                    } else {
                        // line 16
                        echo "                        (pagina visibile a tutti)
                    ";
                    }
                    // line 18
                    echo "                </abbr>
            ";
                }
                // line 20
                echo "
        </li>
        ";
                // line 22
                if (($this->getAttribute($context["loop"], "index", array()) == (isset($context["split"]) ? $context["split"] : null))) {
                    // line 23
                    echo "    </ul>
    <ul class=\"second-ul\">
        ";
                }
                // line 26
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['diary'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "    </ul>
    ";
        } else {
            // line 29
            echo "    <p class=\"text-centered\"><i>Non sono state ancora scritte pagine del diario...</i></p>
    ";
        }
        // line 31
        echo "</div>

<span class=\"clearfix\"></span>

";
        // line 35
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["paginator"]) ? $context["paginator"] : null));
    }

    public function getTemplateName()
    {
        return "@GdrAvatar/Diary/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 35,  117 => 31,  113 => 29,  109 => 27,  95 => 26,  90 => 23,  88 => 22,  84 => 20,  80 => 18,  76 => 16,  72 => 14,  70 => 13,  65 => 11,  60 => 10,  58 => 9,  53 => 7,  47 => 6,  44 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* <div class="pages-container">*/
/*     {% if paginator.totalItemCount %}*/
/*     <ul class="first-ul">*/
/*         {% for diary in paginator %}*/
/*         <li>*/
/*             <a class="diary-show" href="{{ url('avatar-diary-show', {id: diary.id}) }}">{{ diary.title }}</a> <br>*/
/*             <span>{{ diary.createdAt|localizeddate('none', 'none', 'it_IT', null, "d MMMM Y") }}</span>*/
/* */
/*             {% if is_owner %}*/
/*                 <span><a class="edit" href="{{ url('avatar-diary-edit', {id: diary.id}) }}" title="Modifica la pagina">[modifica]</a></span>*/
/*                 <span><a class="delete" href="{{ url('avatar-diary-delete', {id: diary.id}) }}" title="Elimina la pagina">[elimina]</a></span>*/
/*                 <abbr title="Info visibile solo a te">*/
/*                     {% if diary.isHidden %}*/
/*                         (pagina visibile solo a te)*/
/*                     {% else %}*/
/*                         (pagina visibile a tutti)*/
/*                     {% endif %}*/
/*                 </abbr>*/
/*             {% endif %}*/
/* */
/*         </li>*/
/*         {% if loop.index == split %}*/
/*     </ul>*/
/*     <ul class="second-ul">*/
/*         {% endif %}*/
/*         {% endfor %}*/
/*     </ul>*/
/*     {% else %}*/
/*     <p class="text-centered"><i>Non sono state ancora scritte pagine del diario...</i></p>*/
/*     {% endif %}*/
/* </div>*/
/* */
/* <span class="clearfix"></span>*/
/* */
/* {{ knp_pagination_render(paginator) }}*/
