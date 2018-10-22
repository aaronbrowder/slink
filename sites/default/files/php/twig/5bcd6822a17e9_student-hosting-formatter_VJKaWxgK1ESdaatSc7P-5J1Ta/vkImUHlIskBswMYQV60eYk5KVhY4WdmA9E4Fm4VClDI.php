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
        $tags = array("if" => 5);
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
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["description"] ?? null), "html", null, true));
        echo "
        ";
        // line 5
        if (($context["has_eligibility_requirements"] ?? null)) {
            // line 6
            echo "            <h2>Am I eligible?</h2>
            <ul>
                ";
            // line 8
            if ((($context["min_age"] ?? null) > 0)) {
                // line 9
                echo "                    <li>You must be at least ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["min_age"] ?? null), "html", null, true));
                echo " years old.</li>
                ";
            }
            // line 11
            echo "                ";
            if ((($context["min_years_enrolled"] ?? null) > 0)) {
                // line 12
                echo "                    <li>You must have been enrolled in your school for at least ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["min_years_enrolled"] ?? null), "html", null, true));
                echo " year(s).</li>
                ";
            }
            // line 14
            echo "            </ul>
        ";
        }
        // line 16
        echo "        <h2>What does it cost?</h2>
        <ul>
            <li>You or your school must pay for travel expenses.</li>
            ";
        // line 19
        if ((($context["fee"] ?? null) > 0)) {
            // line 20
            echo "                <li>
                    You or your school must pay a weekly fee of ";
            // line 21
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["fee"] ?? null), "html", null, true));
            echo " (";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["currency"] ?? null), "html", null, true));
            echo "). This money
                    pays for your food and housing, and helps cover ";
            // line 22
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["school_name"] ?? null), "html", null, true));
            echo "'s operating costs.
                </li>
            ";
        }
        // line 25
        echo "            ";
        if (($context["isWage"] ?? null)) {
            // line 26
            echo "                <li>You don't have to worry about paying for food or housing.</li>
                ";
            // line 27
            if ((($context["wage"] ?? null) > 0)) {
                // line 28
                echo "                    <li>You will receive a weekly wage of ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["wage"] ?? null), "html", null, true));
                echo " (";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["currency"] ?? null), "html", null, true));
                echo ") for your services.</li>
                ";
            }
            // line 30
            echo "            ";
        }
        // line 31
        echo "        </ul>
        ";
        // line 32
        if (($context["has_expectations"] ?? null)) {
            // line 33
            echo "            <h2>Expectations</h2>
            ";
            // line 34
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["expectations"] ?? null), "html", null, true));
            echo "
        ";
        }
        // line 36
        echo "        ";
        if (($context["has_required_documents"] ?? null)) {
            // line 37
            echo "            <h2>Required Documents</h2>
            <ul>
            ";
            // line 39
            if (($context["require_jc_record"] ?? null)) {
                // line 40
                echo "                <li>Your JC record for the current year. Obtain this from an official representative, such as your JC Clerk. The document should be signed by the official representative.</li>
            ";
            }
            // line 42
            echo "            ";
            if (($context["require_sm_approval"] ?? null)) {
                // line 43
                echo "                <li>A document, signed by your School Meeting Clerk or other official representative, stating that you have received approval from your School Meeting to be a guest at our school.</li>
            ";
            }
            // line 45
            echo "            ";
            if (($context["require_recommendation_letter"] ?? null)) {
                // line 46
                echo "                <li>A letter of recommendation written by a staff member at your school. This letter should explain why the staff member thinks you will be a pleasant and worthwhile addition to our school.</li>
            ";
            }
            // line 48
            echo "            </ul>
        ";
        }
        // line 50
        echo "        <div>
            <a href=\"/node/";
        // line 51
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["school_node_id"] ?? null), "html", null, true));
        echo "/";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["student_hosting_field_name"] ?? null), "html", null, true));
        echo "/application\">APPLY</a>
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
        return array (  170 => 51,  167 => 50,  163 => 48,  159 => 46,  156 => 45,  152 => 43,  149 => 42,  145 => 40,  143 => 39,  139 => 37,  136 => 36,  131 => 34,  128 => 33,  126 => 32,  123 => 31,  120 => 30,  112 => 28,  110 => 27,  107 => 26,  104 => 25,  98 => 22,  92 => 21,  89 => 20,  87 => 19,  82 => 16,  78 => 14,  72 => 12,  69 => 11,  63 => 9,  61 => 8,  57 => 6,  55 => 5,  51 => 4,  46 => 2,  43 => 1,);
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
