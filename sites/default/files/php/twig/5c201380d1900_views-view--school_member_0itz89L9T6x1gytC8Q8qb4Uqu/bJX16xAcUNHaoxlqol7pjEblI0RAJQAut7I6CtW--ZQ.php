<?php

/* themes/slink/templates/views-view--school_members--block-1.html.twig */
class __TwigTemplate_9f40df759d57b30041c69475e2a5ffc4a48c3490a1c162c8d97d3d6b66a9326d extends Twig_Template
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
        $tags = array("set" => 34, "if" => 47);
        $filters = array("clean_class" => 36);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('set', 'if'),
                array('clean_class'),
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

        // line 34
        $context["classes"] = array(0 => "view", 1 => ("view-" . \Drupal\Component\Utility\Html::getClass(        // line 36
($context["id"] ?? null))), 2 => ("view-id-" .         // line 37
($context["id"] ?? null)), 3 => ("view-display-id-" .         // line 38
($context["display_id"] ?? null)), 4 => ((        // line 39
($context["dom_id"] ?? null)) ? (("js-view-dom-id-" . ($context["dom_id"] ?? null))) : ("")));
        // line 42
        echo "<details class=\"slink-school-members-view\" open>
    <summary>School Members</summary>
    <div class=\"details-wrapper\">
        <div";
        // line 45
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["attributes"] ?? null), "addClass", array(0 => ($context["classes"] ?? null)), "method"), "html", null, true));
        echo ">
          ";
        // line 46
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true));
        echo "
          ";
        // line 47
        if (($context["title"] ?? null)) {
            // line 48
            echo "            ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true));
            echo "
          ";
        }
        // line 50
        echo "          ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true));
        echo "
          ";
        // line 51
        if (($context["header"] ?? null)) {
            // line 52
            echo "            <div class=\"view-header\">
              ";
            // line 53
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["header"] ?? null), "html", null, true));
            echo "
            </div>
          ";
        }
        // line 56
        echo "          ";
        if (($context["exposed"] ?? null)) {
            // line 57
            echo "            <div class=\"view-filters\">
              ";
            // line 58
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["exposed"] ?? null), "html", null, true));
            echo "
            </div>
          ";
        }
        // line 61
        echo "          ";
        if (($context["attachment_before"] ?? null)) {
            // line 62
            echo "            <div class=\"attachment attachment-before\">
              ";
            // line 63
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["attachment_before"] ?? null), "html", null, true));
            echo "
            </div>
          ";
        }
        // line 66
        echo "        
          ";
        // line 67
        if (($context["rows"] ?? null)) {
            // line 68
            echo "            <div class=\"view-content\">
              ";
            // line 69
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["rows"] ?? null), "html", null, true));
            echo "
            </div>
          ";
        } elseif (        // line 71
($context["empty"] ?? null)) {
            // line 72
            echo "            <div class=\"view-empty\">
              ";
            // line 73
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["empty"] ?? null), "html", null, true));
            echo "
            </div>
          ";
        }
        // line 76
        echo "        
          ";
        // line 77
        if (($context["pager"] ?? null)) {
            // line 78
            echo "            ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["pager"] ?? null), "html", null, true));
            echo "
          ";
        }
        // line 80
        echo "          ";
        if (($context["attachment_after"] ?? null)) {
            // line 81
            echo "            <div class=\"attachment attachment-after\">
              ";
            // line 82
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["attachment_after"] ?? null), "html", null, true));
            echo "
            </div>
          ";
        }
        // line 85
        echo "          ";
        if (($context["more"] ?? null)) {
            // line 86
            echo "            ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["more"] ?? null), "html", null, true));
            echo "
          ";
        }
        // line 88
        echo "          ";
        if (($context["footer"] ?? null)) {
            // line 89
            echo "            <div class=\"view-footer\">
              ";
            // line 90
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["footer"] ?? null), "html", null, true));
            echo "
            </div>
          ";
        }
        // line 93
        echo "          ";
        if (($context["feed_icons"] ?? null)) {
            // line 94
            echo "            <div class=\"feed-icons\">
              ";
            // line 95
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["feed_icons"] ?? null), "html", null, true));
            echo "
            </div>
          ";
        }
        // line 98
        echo "        </div>
    </div>
</details>";
    }

    public function getTemplateName()
    {
        return "themes/slink/templates/views-view--school_members--block-1.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 98,  184 => 95,  181 => 94,  178 => 93,  172 => 90,  169 => 89,  166 => 88,  160 => 86,  157 => 85,  151 => 82,  148 => 81,  145 => 80,  139 => 78,  137 => 77,  134 => 76,  128 => 73,  125 => 72,  123 => 71,  118 => 69,  115 => 68,  113 => 67,  110 => 66,  104 => 63,  101 => 62,  98 => 61,  92 => 58,  89 => 57,  86 => 56,  80 => 53,  77 => 52,  75 => 51,  70 => 50,  64 => 48,  62 => 47,  58 => 46,  54 => 45,  49 => 42,  47 => 39,  46 => 38,  45 => 37,  44 => 36,  43 => 34,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/slink/templates/views-view--school_members--block-1.html.twig", "/home/ubuntu/workspace/themes/slink/templates/views-view--school_members--block-1.html.twig");
    }
}
