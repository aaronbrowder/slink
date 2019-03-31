<?php

/* core/themes/classy/templates/dataset/forum-list.html.twig */
class __TwigTemplate_96804d5e8f7daf8b3f1aa0e69fe5733b2ba20bfa6d042b5ecff5966f498791da extends Twig_Template
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
        $tags = array("for" => 43, "if" => 45);
        $filters = array("t" => 36);
        $functions = array("range" => 55);

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('for', 'if'),
                array('t'),
                array('range')
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

        // line 33
        echo "<table id=\"forum-";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["forum_id"] ?? null), "html", null, true));
        echo "\">
  <thead>
    <tr>
      <th>";
        // line 36
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Forum")));
        echo "</th>
      <th>";
        // line 37
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Topics")));
        echo "</th>
      <th>";
        // line 38
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Posts")));
        echo "</th>
      <th>";
        // line 39
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Last post")));
        echo "</th>
    </tr>
  </thead>
  <tbody>
  ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["forums"] ?? null));
        foreach ($context['_seq'] as $context["child_id"] => $context["forum"]) {
            // line 44
            echo "    <tr id=\"forum-list-";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $context["child_id"], "html", null, true));
            echo "\" class=\"";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["forum"], "zebra", array()), "html", null, true));
            echo "\">
      <td ";
            // line 45
            if (($this->getAttribute($context["forum"], "is_container", array()) == true)) {
                // line 46
                echo "colspan=\"4\" class=\"container\"";
            } else {
                // line 48
                echo "class=\"forum-list__forum\"";
            }
            // line 49
            echo ">
        ";
            // line 55
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute($context["forum"], "depth", array())));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                if (($this->getAttribute($context["forum"], "depth", array()) > 0)) {
                    echo "<div class=\"indented\">";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 56
            echo "          <div class=\"forum__icon forum-status-";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["forum"], "icon_class", array()), "html", null, true));
            echo "\" title=\"";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["forum"], "icon_title", array()), "html", null, true));
            echo "\">
            <span class=\"visually-hidden\">";
            // line 57
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["forum"], "icon_title", array()), "html", null, true));
            echo "</span>
          </div>
          <div class=\"forum__name\"><a href=\"";
            // line 59
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["forum"], "link", array()), "html", null, true));
            echo "\">";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["forum"], "label", array()), "html", null, true));
            echo "</a></div>
          ";
            // line 60
            if ($this->getAttribute($this->getAttribute($context["forum"], "description", array()), "value", array())) {
                // line 61
                echo "            <div class=\"forum__description\">";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["forum"], "description", array()), "value", array()), "html", null, true));
                echo "</div>
          ";
            }
            // line 63
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute($context["forum"], "depth", array())));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                if (($this->getAttribute($context["forum"], "depth", array()) > 0)) {
                    echo "</div>";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "      </td>
      ";
            // line 65
            if (($this->getAttribute($context["forum"], "is_container", array()) == false)) {
                // line 66
                echo "        <td class=\"forum__topics\">
          ";
                // line 67
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["forum"], "num_topics", array()), "html", null, true));
                echo "
          ";
                // line 68
                if (($this->getAttribute($context["forum"], "new_topics", array()) == true)) {
                    // line 69
                    echo "            <br />
            <a href=\"";
                    // line 70
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["forum"], "new_url", array()), "html", null, true));
                    echo "\">";
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["forum"], "new_text", array()), "html", null, true));
                    echo "</a>
          ";
                }
                // line 72
                echo "        </td>
        <td class=\"forum__posts\">";
                // line 73
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["forum"], "num_posts", array()), "html", null, true));
                echo "</td>
        <td class=\"forum__last-reply\">";
                // line 74
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["forum"], "last_reply", array()), "html", null, true));
                echo "</td>
      ";
            }
            // line 76
            echo "    </tr>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['child_id'], $context['forum'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo "  </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/dataset/forum-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 78,  177 => 76,  172 => 74,  168 => 73,  165 => 72,  158 => 70,  155 => 69,  153 => 68,  149 => 67,  146 => 66,  144 => 65,  141 => 64,  129 => 63,  123 => 61,  121 => 60,  115 => 59,  110 => 57,  103 => 56,  91 => 55,  88 => 49,  85 => 48,  82 => 46,  80 => 45,  73 => 44,  69 => 43,  62 => 39,  58 => 38,  54 => 37,  50 => 36,  43 => 33,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "core/themes/classy/templates/dataset/forum-list.html.twig", "/home/ubuntu/workspace/core/themes/classy/templates/dataset/forum-list.html.twig");
    }
}
