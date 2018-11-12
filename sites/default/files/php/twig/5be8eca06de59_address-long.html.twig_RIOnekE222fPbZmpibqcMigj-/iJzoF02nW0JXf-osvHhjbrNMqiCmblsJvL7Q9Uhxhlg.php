<?php

/* modules/address/templates/address-long.html.twig */
class __TwigTemplate_5434c5f517079a5759c0ec3a4d36b1f9703d5279be3f9af53154a57307c19275 extends Twig_Template
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
        $tags = array("if" => 36);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if'),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 35
        echo "<p class=\"address\" translate=\"no\">
  ";
        // line 36
        if ((($context["given_name"] ?? null) || ($context["family_name"] ?? null))) {
            // line 37
            echo "    ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["given_name"] ?? null), "html", null, true));
            echo " ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["family_name"] ?? null), "html", null, true));
            echo " <br>
  ";
        }
        // line 39
        echo "  ";
        if (($context["organization"] ?? null)) {
            // line 40
            echo "    ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["organization"] ?? null), "html", null, true));
            echo " <br>
  ";
        }
        // line 42
        echo "  ";
        if (($context["address_line1"] ?? null)) {
            // line 43
            echo "    ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["address_line1"] ?? null), "html", null, true));
            echo " <br>
  ";
        }
        // line 45
        echo "  ";
        if (($context["address_line2"] ?? null)) {
            // line 46
            echo "    ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["address_line2"] ?? null), "html", null, true));
            echo " <br>
  ";
        }
        // line 48
        echo "  ";
        if ($this->getAttribute(($context["dependent_locality"] ?? null), "code", array())) {
            // line 49
            echo "    ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["dependent_locality"] ?? null), "code", array()), "html", null, true));
            echo " <br>
  ";
        }
        // line 51
        echo "  ";
        if ((($this->getAttribute(($context["locality"] ?? null), "code", array()) || ($context["postal_code"] ?? null)) || $this->getAttribute(($context["administrative_area"] ?? null), "name", array()))) {
            // line 52
            echo "    ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["locality"] ?? null), "html", null, true));
            echo ", ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["administrative_area"] ?? null), "name", array()), "html", null, true));
            echo " ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["postal_code"] ?? null), "html", null, true));
            echo " <br>
  ";
        }
        // line 54
        echo "  ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["country"] ?? null), "name", array()), "html", null, true));
        echo "
</p>
";
    }

    public function getTemplateName()
    {
        return "modules/address/templates/address-long.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 54,  95 => 52,  92 => 51,  86 => 49,  83 => 48,  77 => 46,  74 => 45,  68 => 43,  65 => 42,  59 => 40,  56 => 39,  48 => 37,  46 => 36,  43 => 35,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/address/templates/address-long.html.twig", "/home/ubuntu/workspace/modules/address/templates/address-long.html.twig");
    }
}
