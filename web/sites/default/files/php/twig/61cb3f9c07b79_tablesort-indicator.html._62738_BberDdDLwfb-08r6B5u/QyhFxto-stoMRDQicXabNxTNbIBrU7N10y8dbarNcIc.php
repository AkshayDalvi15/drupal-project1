<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* core/modules/system/templates/tablesort-indicator.html.twig */
class __TwigTemplate_a662d4ca77afa4f2e6899a3bb8c8c075e3e669af158d288db6abeae845b2f47e extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        $context["classes"] = [0 => "tablesort", 1 => ("tablesort--" . $this->sandbox->ensureToStringAllowed(        // line 15
($context["style"] ?? null), 15, $this->source))];
        // line 18
        echo "<span";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 18), 18, $this->source), "html", null, true);
        echo ">
  <span class=\"visually-hidden\">
    ";
        // line 20
        if ((($context["style"] ?? null) == "asc")) {
            // line 21
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Sort ascending"));
            echo "
    ";
        } else {
            // line 23
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Sort descending"));
            echo "
    ";
        }
        // line 25
        echo "  </span>
</span>
";
    }

    public function getTemplateName()
    {
        return "core/modules/system/templates/tablesort-indicator.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 25,  55 => 23,  50 => 21,  48 => 20,  42 => 18,  40 => 15,  39 => 13,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation for displaying a tablesort indicator.
 *
 * Available variables:
 * - style: Either 'asc' or 'desc', indicating the sorting direction.
 *
 * @ingroup themeable
 */
#}
{%
  set classes = [
    'tablesort',
    'tablesort--' ~ style,
  ]
%}
<span{{ attributes.addClass(classes) }}>
  <span class=\"visually-hidden\">
    {% if style == 'asc' -%}
      {{ 'Sort ascending'|t }}
    {% else -%}
      {{ 'Sort descending'|t }}
    {% endif %}
  </span>
</span>
", "core/modules/system/templates/tablesort-indicator.html.twig", "/app/web/core/modules/system/templates/tablesort-indicator.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 13, "if" => 20);
        static $filters = array("escape" => 18, "t" => 21);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 't'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
