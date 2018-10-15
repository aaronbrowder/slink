<?php

/* modules/custom/student_hosting/templates/student-hosting-formatter.html.twig */
class __TwigTemplate_6483754cc240474d974038f04ce268dfeb838e5278134930fbd872272db80e23 extends Twig_Template
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
        $tags = array("if" => 13);
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

        // line 1
        echo "<details class=\"js-form-wrapper form-wrapper\">
    <summary>";
        // line 2
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true));
        echo "</summary>
    <div class=\"details-wrapper\">
        ";
        // line 4
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["school_name"] ?? null), "html", null, true));
        echo "
        ";
        // line 5
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["description"] ?? null), "html", null, true));
        echo "
        <h2>Am I eligible?</h2>
        <ul>
            <li>Yes of course!</li>
        </ul>
        <h2>What does it cost?</h2>
        <ul>
            <li>You or your school must pay for travel expenses.</li>
            ";
        // line 13
        if ((($context["fee"] ?? null) > 0)) {
            // line 14
            echo "                <li>
                    You or your school must pay a weekly fee of ";
            // line 15
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["fee"] ?? null), "html", null, true));
            echo " (";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["currency"] ?? null), "html", null, true));
            echo "). This money
                    pays for your food and lodging, and helps cover the host school's operating costs.
                </li>
            ";
        }
        // line 19
        echo "            ";
        if (($context["isWage"] ?? null)) {
            // line 20
            echo "                <li>You don't have to worry about paying for food or lodging.</li>
                ";
            // line 21
            if ((($context["wage"] ?? null) > 0)) {
                // line 22
                echo "                    <li>You will receive a weekly wage of ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["wage"] ?? null), "html", null, true));
                echo " (";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["currency"] ?? null), "html", null, true));
                echo ") for your services.</li>
                ";
            }
            // line 24
            echo "            ";
        }
        // line 25
        echo "        </ul>
        <div>
            ";
        // line 27
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["program_parameters"] ?? null), "html", null, true));
        echo "
        </div>
    </div>
</details>";
    }

    public function getTemplateName()
    {
        return "modules/custom/student_hosting/templates/student-hosting-formatter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 27,  99 => 25,  96 => 24,  88 => 22,  86 => 21,  83 => 20,  80 => 19,  71 => 15,  68 => 14,  66 => 13,  55 => 5,  51 => 4,  46 => 2,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/custom/student_hosting/templates/student-hosting-formatter.html.twig", "/home/ubuntu/workspace/modules/custom/student_hosting/templates/student-hosting-formatter.html.twig");
    }
}
