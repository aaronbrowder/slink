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
        $tags = array("if" => 1, "trans" => 17);
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
            echo "            
                ";
            // line 8
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["school_name"] ?? null), "html", null, true));
            echo " is accepting applications for student guests. If you are a student at a SLINK member school, you can come visit ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["school_name"] ?? null), "html", null, true));
            echo " for a number of weeks, staying with a host family and going to school as if you were enrolled here.
            
        ";
        }
        // line 11
        echo "        ";
        if ((($context["field_name"] ?? null) == "field_student_ambassador_program")) {
            // line 12
            echo "            
                ";
            // line 13
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["school_name"] ?? null), "html", null, true));
            echo " is accepting applications for student ambassadors. If you have been a student at a SLINK member school for a long time and have a lot of experience, we might be interested in hiring you as a student ambassador. As an ambassador you would stay with a host family and come to ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["school_name"] ?? null), "html", null, true));
            echo " as if you were enrolled here. You would be expected to help our school in some way in exchange for wages.
            
        ";
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
                        
                            You must be at least ";
                // line 22
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["min_age"] ?? null), "html", null, true));
                echo " years old.
                        
                    </li>
                ";
            }
            // line 26
            echo "                ";
            if ((($context["min_years_enrolled"] ?? null) > 0)) {
                // line 27
                echo "                    <li>
                        
                            You must have been enrolled in your school for at least ";
                // line 29
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["min_years_enrolled"] ?? null), "html", null, true));
                echo " year(s).
                        
                    </li>
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
                        
                            You or your school must pay a weekly fee of ";
                // line 42
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["cost"] ?? null), "html", null, true));
                echo " (";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["currency"] ?? null), "html", null, true));
                echo "). This money
                            pays for your food and housing, and helps cover ";
                // line 43
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["school_name"] ?? null), "html", null, true));
                echo "'s operating costs.
                        
                    </li>
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
                        
                            You will receive a weekly wage of ";
                // line 53
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["cost"] ?? null), "html", null, true));
                echo " (";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["currency"] ?? null), "html", null, true));
                echo ") for your services.
                        
                    </li>
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
                <br>
                <a class=\"slink-button-primary\" href=\"/node/";
            // line 80
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["school_node_id"] ?? null), "html", null, true));
            echo "/";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["field_name"] ?? null), "html", null, true));
            echo "/application\">
                    ";
            // line 81
            echo t("Apply", array());
            // line 82
            echo "                </a>
            </div>
        ";
        }
        // line 85
        if (($context["use_container"] ?? null)) {
            // line 86
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
        return array (  259 => 86,  257 => 85,  252 => 82,  250 => 81,  244 => 80,  240 => 78,  237 => 77,  233 => 75,  227 => 73,  224 => 72,  218 => 70,  215 => 69,  209 => 67,  207 => 66,  201 => 64,  198 => 63,  193 => 61,  188 => 60,  186 => 59,  183 => 58,  180 => 57,  171 => 53,  167 => 51,  165 => 50,  160 => 49,  157 => 48,  154 => 47,  147 => 43,  141 => 42,  137 => 40,  134 => 39,  132 => 38,  128 => 37,  122 => 35,  118 => 33,  111 => 29,  107 => 27,  104 => 26,  97 => 22,  93 => 20,  91 => 19,  85 => 17,  82 => 16,  74 => 13,  71 => 12,  68 => 11,  60 => 8,  57 => 7,  54 => 6,  48 => 3,  45 => 2,  43 => 1,);
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
