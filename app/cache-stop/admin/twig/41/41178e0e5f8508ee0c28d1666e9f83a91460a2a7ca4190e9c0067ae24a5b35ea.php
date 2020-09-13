<?php

/* IvoryCKEditorBundle:Form:ckeditor_widget.html.twig */
class __TwigTemplate_c5e7b5c555a8d65066387aa03ba6b4ad8b6a09c4f1735816d625553595b56c7b extends Twig_Template
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
        $__internal_1ecc06ecd795f0dddbe494bbd13963382ff632fcc755b55e78f50a554204d54e = $this->env->getExtension("native_profiler");
        $__internal_1ecc06ecd795f0dddbe494bbd13963382ff632fcc755b55e78f50a554204d54e->enter($__internal_1ecc06ecd795f0dddbe494bbd13963382ff632fcc755b55e78f50a554204d54e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "IvoryCKEditorBundle:Form:ckeditor_widget.html.twig"));

        // line 1
        $this->displayBlock('ckeditor_widget', $context, $blocks);
        
        $__internal_1ecc06ecd795f0dddbe494bbd13963382ff632fcc755b55e78f50a554204d54e->leave($__internal_1ecc06ecd795f0dddbe494bbd13963382ff632fcc755b55e78f50a554204d54e_prof);

    }

    public function block_ckeditor_widget($context, array $blocks = array())
    {
        $__internal_ab57853ae9ef99bdf1ca42f31ed5020595fd9bd8888b09fd896af74734c2bd90 = $this->env->getExtension("native_profiler");
        $__internal_ab57853ae9ef99bdf1ca42f31ed5020595fd9bd8888b09fd896af74734c2bd90->enter($__internal_ab57853ae9ef99bdf1ca42f31ed5020595fd9bd8888b09fd896af74734c2bd90_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "ckeditor_widget"));

        // line 2
        echo "    <textarea ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo ">";
        echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
        echo "</textarea>

    ";
        // line 4
        if ((isset($context["enable"]) ? $context["enable"] : $this->getContext($context, "enable"))) {
            // line 5
            echo "        <script type=\"text/javascript\">
            var CKEDITOR_BASEPATH = \"";
            // line 6
            echo call_user_func_array($this->env->getFunction('ckeditor_base_path')->getCallable(), array((isset($context["base_path"]) ? $context["base_path"] : $this->getContext($context, "base_path"))));
            echo "\";
        </script>

        <script type=\"text/javascript\" src=\"";
            // line 9
            echo call_user_func_array($this->env->getFunction('ckeditor_js_path')->getCallable(), array((isset($context["js_path"]) ? $context["js_path"] : $this->getContext($context, "js_path"))));
            echo "\"></script>

        <script type=\"text/javascript\">
            ";
            // line 12
            echo call_user_func_array($this->env->getFunction('ckeditor_destroy')->getCallable(), array((isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"))));
            echo "

            ";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["plugins"]) ? $context["plugins"] : $this->getContext($context, "plugins")));
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
            $context['_seq'] = twig_ensure_traversable((isset($context["styles"]) ? $context["styles"] : $this->getContext($context, "styles")));
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
            $context['_seq'] = twig_ensure_traversable((isset($context["templates"]) ? $context["templates"] : $this->getContext($context, "templates")));
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
            echo call_user_func_array($this->env->getFunction('ckeditor_replace')->getCallable(), array((isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config"))));
            echo "
        </script>
    ";
        }
        
        $__internal_ab57853ae9ef99bdf1ca42f31ed5020595fd9bd8888b09fd896af74734c2bd90->leave($__internal_ab57853ae9ef99bdf1ca42f31ed5020595fd9bd8888b09fd896af74734c2bd90_prof);

    }

    public function getTemplateName()
    {
        return "IvoryCKEditorBundle:Form:ckeditor_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  113 => 26,  110 => 25,  101 => 23,  97 => 22,  94 => 21,  85 => 19,  81 => 18,  78 => 17,  69 => 15,  65 => 14,  60 => 12,  54 => 9,  48 => 6,  45 => 5,  43 => 4,  35 => 2,  23 => 1,);
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
