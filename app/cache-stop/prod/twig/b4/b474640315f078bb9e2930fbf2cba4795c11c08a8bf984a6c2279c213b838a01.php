<?php

/* IvoryCKEditorBundle:Form:ckeditor_widget.html.twig */
class __TwigTemplate_dd5771a453f729fe22994d224cc411cd0efd19bd8e2686bb816ef3d49d797813 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'ckeditor_widget' => array($this, 'block_ckeditor_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('ckeditor_widget', $context, $blocks);
    }

    public function block_ckeditor_widget($context, array $blocks = array())
    {
        // line 2
        echo "    <textarea ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo ">";
        echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
        echo "</textarea>

    ";
        // line 4
        if ((isset($context["enable"]) ? $context["enable"] : null)) {
            // line 5
            echo "        <script type=\"text/javascript\">
            var CKEDITOR_BASEPATH = \"";
            // line 6
            echo call_user_func_array($this->env->getFunction('ckeditor_base_path')->getCallable(), array((isset($context["base_path"]) ? $context["base_path"] : null)));
            echo "\";
        </script>

        <script type=\"text/javascript\" src=\"";
            // line 9
            echo call_user_func_array($this->env->getFunction('ckeditor_js_path')->getCallable(), array((isset($context["js_path"]) ? $context["js_path"] : null)));
            echo "\"></script>

        <script type=\"text/javascript\">
            ";
            // line 12
            echo call_user_func_array($this->env->getFunction('ckeditor_destroy')->getCallable(), array((isset($context["id"]) ? $context["id"] : null)));
            echo "

            ";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["plugins"]) ? $context["plugins"] : null));
            foreach ($context['_seq'] as $context["plugin_name"] => $context["plugin"]) {
                // line 15
                echo "                ";
                echo call_user_func_array($this->env->getFunction('ckeditor_plugin')->getCallable(), array($context["plugin_name"], $context["plugin"]));
                echo "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['plugin_name'], $context['plugin'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "
            ";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["styles"]) ? $context["styles"] : null));
            foreach ($context['_seq'] as $context["style_name"] => $context["style"]) {
                // line 19
                echo "                ";
                echo call_user_func_array($this->env->getFunction('ckeditor_styles_set')->getCallable(), array($context["style_name"], $context["style"]));
                echo "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['style_name'], $context['style'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "
            ";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["templates"]) ? $context["templates"] : null));
            foreach ($context['_seq'] as $context["template_name"] => $context["template"]) {
                // line 23
                echo "                ";
                echo call_user_func_array($this->env->getFunction('ckeditor_template')->getCallable(), array($context["template_name"], $context["template"]));
                echo "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['template_name'], $context['template'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "
            ";
            // line 26
            echo call_user_func_array($this->env->getFunction('ckeditor_replace')->getCallable(), array((isset($context["id"]) ? $context["id"] : null), (isset($context["config"]) ? $context["config"] : null)));
            echo "
        </script>
    ";
        }
    }

    public function getTemplateName()
    {
        return "IvoryCKEditorBundle:Form:ckeditor_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  104 => 26,  101 => 25,  92 => 23,  88 => 22,  85 => 21,  76 => 19,  72 => 18,  69 => 17,  60 => 15,  56 => 14,  51 => 12,  45 => 9,  39 => 6,  36 => 5,  34 => 4,  26 => 2,  20 => 1,);
    }
}
/* {% block ckeditor_widget %}*/
/*     <textarea {{ block('widget_attributes') }}>{{ value }}</textarea>*/
/* */
/*     {% if enable %}*/
/*         <script type="text/javascript">*/
/*             var CKEDITOR_BASEPATH = "{{ ckeditor_base_path(base_path) }}";*/
/*         </script>*/
/* */
/*         <script type="text/javascript" src="{{ ckeditor_js_path(js_path) }}"></script>*/
/* */
/*         <script type="text/javascript">*/
/*             {{ ckeditor_destroy(id) }}*/
/* */
/*             {% for plugin_name, plugin in plugins %}*/
/*                 {{ ckeditor_plugin(plugin_name, plugin) }}*/
/*             {% endfor %}*/
/* */
/*             {% for style_name, style in styles %}*/
/*                 {{ ckeditor_styles_set(style_name, style) }}*/
/*             {% endfor %}*/
/* */
/*             {% for template_name, template in templates %}*/
/*                 {{ ckeditor_template(template_name, template) }}*/
/*             {% endfor %}*/
/* */
/*             {{ ckeditor_replace(id, config) }}*/
/*         </script>*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
