<?php

/* modules/custom/student_hosting/templates/student_hosting_formatter.html.twig */
class __TwigTemplate_a3d375ca56aeae0275a904cdc94e1faf9e1fbe3372cc1e873801321ac7a469e8 extends Twig_Template
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
        $tags = array("if" => 1, "trans" => 7);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if', 'trans'),
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
        if (($context["use_container"] ?? null)) {
            // line 2
            echo "<details class=\"js-form-wrapper form-wrapper\">
    <summary>";
            // line 3
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true));
            echo "</summary>
    <div class=\"details-wrapper\">
";
        }
        // line 6
        echo "        ";
        if ((($context["field_name"] ?? null) == "field_student_guest_program")) {
            // line 7
            echo "            ";
            echo t("@school_name is accepting applications for student guests. If you are a student at a Slink member school, you can come visit @school_name for a number of weeks, staying with a host family and going to school as if you were enrolled here.", array("@school_name" =>             // line 8
($context["school_name"] ?? null), "@school_name" => ($context["school_name"] ?? null), ));
            // line 10
            echo "        ";
        }
        // line 11
        echo "        ";
        if ((($context["field_name"] ?? null) == "field_student_ambassador_program")) {
            // line 12
            echo "            ";
            echo t("@school_name is accepting applications for student ambassadors. If you have been a student at a Slink member school for a long time and have a lot of experience, we might be interested in hiring you as a student ambassador. As an ambassador you would stay with a host family and come to @school_name as if you were enrolled here. You would be expected to help our school in some way in exchange for wages.", array("@school_name" =>             // line 13
($context["school_name"] ?? null), "@school_name" => ($context["school_name"] ?? null), ));
            // line 15
            echo "        ";
        }
        // line 16
        echo "        ";
        if (($context["has_eligibility_requirements"] ?? null)) {
            // line 17
            echo "            <h2>";
            echo t("Am I eligible?", array());
            echo "</h2>
            <ul>
                ";
            // line 19
            if ((($context["min_age"] ?? null) > 0)) {
                // line 20
                echo "                    <li>
                        ";
                // line 21
                echo t("You must be at least @min_age years old.", array("@min_age" =>                 // line 22
($context["min_age"] ?? null), ));
                // line 24
                echo "                    </li>
                ";
            }
            // line 26
            echo "                ";
            if ((($context["min_years_enrolled"] ?? null) > 0)) {
                // line 27
                echo "                    <li>
                        ";
                // line 28
                echo t("You must have been enrolled in your school for at least @min_years_enrolled year(s).", array("@min_years_enrolled" =>                 // line 29
($context["min_years_enrolled"] ?? null), ));
                // line 31
                echo "                    </li>
                ";
            }
            // line 33
            echo "            </ul>
        ";
        }
        // line 35
        echo "        <h2>";
        echo t("What does it cost?", array());
        echo "</h2>
        <ul>
            <li>";
        // line 37
        echo t("You or your school must pay for travel expenses.", array());
        echo "</li>
            ";
        // line 38
        if ((($context["field_name"] ?? null) == "field_student_guest_program")) {
            // line 39
            echo "                ";
            if ((($context["cost"] ?? null) > 0)) {
                // line 40
                echo "                    <li>
                        ";
                // line 41
                echo t("You or your school must pay a weekly fee of @cost (@currency). This money
                            pays for your food and housing, and helps cover @school_name's operating costs.", array("@cost" =>                 // line 42
($context["cost"] ?? null), "@currency" => ($context["currency"] ?? null), "@school_name" =>                 // line 43
($context["school_name"] ?? null), ));
                // line 45
                echo "                    </li>
                ";
            }
            // line 47
            echo "            ";
        }
        // line 48
        echo "            ";
        if ((($context["field_name"] ?? null) == "field_student_ambassador_program")) {
            // line 49
            echo "                <li>";
            echo t("You don't have to worry about paying for food or housing.", array());
            echo "</li>
                ";
            // line 50
            if ((($context["cost"] ?? null) > 0)) {
                // line 51
                echo "                    <li>
                        ";
                // line 52
                echo t("You will receive a weekly wage of @cost (@currency) for your services.", array("@cost" =>                 // line 53
($context["cost"] ?? null), "@currency" => ($context["currency"] ?? null), ));
                // line 55
                echo "                    </li>
                ";
            }
            // line 57
            echo "            ";
        }
        // line 58
        echo "        </ul>
        ";
        // line 59
        if (($context["has_expectations"] ?? null)) {
            // line 60
            echo "            <h2>";
            echo t("Expectations", array());
            echo "</h2>
            <p>";
            // line 61
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["expectations"] ?? null), "html", null, true));
            echo "</p>
        ";
        }
        // line 63
        echo "        ";
        if (($context["has_required_documents"] ?? null)) {
            // line 64
            echo "            <h2>";
            echo t("Required Documents", array());
            echo "</h2>
            <ul>
            ";
            // line 66
            if (($context["require_jc_record"] ?? null)) {
                // line 67
                echo "                <li>";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["jc_record_document_description"] ?? null), "html", null, true));
                echo "</li>
            ";
            }
            // line 69
            echo "            ";
            if (($context["require_sm_approval"] ?? null)) {
                // line 70
                echo "                <li>";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["sm_approval_document_description"] ?? null), "html", null, true));
                echo "</li>
            ";
            }
            // line 72
            echo "            ";
            if (($context["require_recommendation_letter"] ?? null)) {
                // line 73
                echo "                <li>";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["recommendation_letter_document_description"] ?? null), "html", null, true));
                echo "</li>
            ";
            }
            // line 75
            echo "            </ul>
        ";
        }
        // line 77
        echo "        ";
        if (($context["use_apply_button"] ?? null)) {
            // line 78
            echo "            <div>
                ";
            // line 79
            if (($context["require_interview"] ?? null)) {
                // line 80
                echo "                    ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["interview_notification"] ?? null), "html", null, true));
                echo "
                ";
            }
            // line 82
            echo "                <br>
                <a class=\"slink-button-primary\" href=\"/node/";
            // line 83
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["school_node_id"] ?? null), "html", null, true));
            echo "/";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["field_name"] ?? null), "html", null, true));
            echo "/application\">
                    ";
            // line 84
            echo t("Apply", array());
            // line 85
            echo "                </a>
            </div>
        ";
        }
        // line 88
        if (($context["use_container"] ?? null)) {
            // line 89
            echo "    </div>
</details>
";
        }
    }

    public function getTemplateName()
    {
        return "modules/custom/student_hosting/templates/student_hosting_formatter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  251 => 89,  249 => 88,  244 => 85,  242 => 84,  236 => 83,  233 => 82,  227 => 80,  225 => 79,  222 => 78,  219 => 77,  215 => 75,  209 => 73,  206 => 72,  200 => 70,  197 => 69,  191 => 67,  189 => 66,  183 => 64,  180 => 63,  175 => 61,  170 => 60,  168 => 59,  165 => 58,  162 => 57,  158 => 55,  156 => 53,  155 => 52,  152 => 51,  150 => 50,  145 => 49,  142 => 48,  139 => 47,  135 => 45,  133 => 43,  132 => 42,  130 => 41,  127 => 40,  124 => 39,  122 => 38,  118 => 37,  112 => 35,  108 => 33,  104 => 31,  102 => 29,  101 => 28,  98 => 27,  95 => 26,  91 => 24,  89 => 22,  88 => 21,  85 => 20,  83 => 19,  77 => 17,  74 => 16,  71 => 15,  69 => 13,  67 => 12,  64 => 11,  61 => 10,  59 => 8,  57 => 7,  54 => 6,  48 => 3,  45 => 2,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/custom/student_hosting/templates/student_hosting_formatter.html.twig", "/home/ubuntu/workspace/modules/custom/student_hosting/templates/student_hosting_formatter.html.twig");
    }
}
