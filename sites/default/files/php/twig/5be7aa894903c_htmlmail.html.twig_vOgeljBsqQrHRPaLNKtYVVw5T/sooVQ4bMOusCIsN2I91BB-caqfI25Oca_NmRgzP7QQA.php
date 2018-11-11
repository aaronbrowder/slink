<?php

/* modules/htmlmail/templates/htmlmail.html.twig */
class __TwigTemplate_673316b491cc561738dd1e811cbc0b24421d714907f0f4e895c1337ac23eaeac extends Twig_Template
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
        $tags = array("if" => 111, "set" => 134);
        $filters = array("capitalize" => 129, "format" => 134);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if', 'set'),
                array('capitalize', 'format'),
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

        // line 107
        echo "<div class=\"htmlmail-body\">
    ";
        // line 108
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["message"] ?? null), "body", array()), "html", null, true));
        echo "
</div>

";
        // line 111
        if (($context["debug"] ?? null)) {
            // line 112
            echo "<hr />
<div class=\"htmlmail-debug\">
    <dl>
        <dt>
            <p>To customize this message:</p>
        </dt>
        <dd>
            <ol>
                ";
            // line 120
            if ( !($context["theme"] ?? null)) {
                // line 121
                echo "                <li>
                    <p>
                        Visit <u>admin/config/system/htmlmail</u> and select a theme to hold your custom email template files.
                    </p>
                </li>
                ";
            } elseif ( !            // line 126
($context["theme_path"] ?? null)) {
                // line 127
                echo "                <li>
                    <p>
                        Visit <u>admin/appearance</u> to enable your selected <u>";
                // line 129
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_capitalize_string_filter($this->env, ($context["theme"] ?? null)), "html", null, true));
                echo "</u> theme.
                    </p>
                </li>
                ";
            }
            // line 133
            echo "
                ";
            // line 134
            $context["themeTemplate"] = sprintf("%s/%s", ($context["theme_path"] ?? null), ($context["message_template"] ?? null));
            // line 135
            echo "                ";
            if (($this->getAttribute($this, "getTemplateName", array(), "method") == ($context["themeTemplate"] ?? null))) {
                // line 136
                echo "                <li>
                    <p>
                        Edit your<br />
                        <code>
                            ";
                // line 140
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->getAttribute($this, "getTemplateName", array(), "method")));
                echo "
                        </code>
                        <br />file.
                    </p>
                </li>
                ";
            }
            // line 146
            echo "                ";
            if ( !($context["theme_html_exists"] ?? null)) {
                // line 147
                echo "                <li>
                    <p>
                        Copy<br />
                        <code>";
                // line 150
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["module_path"] ?? null), "html", null, true));
                echo "/htmlmail.html.twig</code>
                        <br />to<br />
                        <code>";
                // line 152
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["theme_path"] ?? null), "html", null, true));
                echo "/htmlmail.html.twig</code>
                    </p>
                </li>
                ";
            }
            // line 156
            echo "                ";
            if ( !($context["module_template_exists"] ?? null)) {
                // line 157
                echo "                <li>
                    <p>
                        For module-specific customization, copy<br />
                        <code>";
                // line 160
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["module_path"] ?? null), "html", null, true));
                echo "/htmlmail.html.twig</code>
                        <br />to<br />
                        <code>";
                // line 162
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["theme_path"] ?? null), "html", null, true));
                echo "/";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["module_template"] ?? null), "html", null, true));
                echo "</code>
                    </p>
                </li>
                ";
            }
            // line 166
            echo "                ";
            if ( !($context["message_template_exists"] ?? null)) {
                // line 167
                echo "                <li>
                    <p>
                        For message-specific customization, copy<br />
                        <code>";
                // line 170
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["module_path"] ?? null), "html", null, true));
                echo "/htmlmail.html.twig</code>
                        <br />to<br />
                        <code>";
                // line 172
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["theme_path"] ?? null), "html", null, true));
                echo "/";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["message_template"] ?? null), "html", null, true));
                echo "</code>
                    </p>
                </li>
                ";
            }
            // line 176
            echo "                <li>
                    <p>
                        Edit the copied file.
                    </p>
                </li>
                <li>
                    <p>
                        Send a test message to make sure your customizations worked.
                    </p>
                </li>
                <li>
                    <p>
                        If you think your customizations would be of use to others,
                        please contribute your file as a feature request in the
                        <a href=\"http://drupal.org/node/add/project-issue/htmlmail\">issue queue</a>.
                    </p>
                </li>
            </ol>
        </dd>
        ";
            // line 195
            if ($this->getAttribute(($context["message"] ?? null), "params", array())) {
                // line 196
                echo "        <dt>
            <p>
                The ";
                // line 198
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["message"] ?? null), "module", array()), "html", null, true));
                echo " module sets the <u><code>message.params</code></u>
                variable.  For this message,
            </p>
        </dt>
        <dd>
            <p>
                <code>
                    <pre>
                        \$params = ";
                // line 206
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["pre_formatted_params"] ?? null), "html", null, true));
                echo "
                    </pre>
                </code>
            </p>
        </dd>
        ";
            }
            // line 212
            echo "    </dl>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "modules/htmlmail/templates/htmlmail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 212,  211 => 206,  200 => 198,  196 => 196,  194 => 195,  173 => 176,  164 => 172,  159 => 170,  154 => 167,  151 => 166,  142 => 162,  137 => 160,  132 => 157,  129 => 156,  122 => 152,  117 => 150,  112 => 147,  109 => 146,  100 => 140,  94 => 136,  91 => 135,  89 => 134,  86 => 133,  79 => 129,  75 => 127,  73 => 126,  66 => 121,  64 => 120,  54 => 112,  52 => 111,  46 => 108,  43 => 107,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/htmlmail/templates/htmlmail.html.twig", "/home/ubuntu/workspace/modules/htmlmail/templates/htmlmail.html.twig");
    }
}
