<?php

/* themes/slink/templates/block--exposedformsearchpage_1.html.twig */
class __TwigTemplate_ff9c5fac1ab084461e0116e6eca66e4829111ade772da41b4c7a83da92850db8 extends Twig_Template
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
        $tags = array();
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array(),
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
        echo "<form action=\"/search\" method=\"get\" class=\"search-form search-block-form\" id=\"views-exposed-form-search-page-1\" accept-charset=\"UTF-8\" data-drupal-form-fields=\"edit-search-api-fulltext\">
    <input placeholder=\"Search for a school or person\" class=\"form-search\" size=\"15\" data-drupal-selector=\"edit-search-api-fulltext\" type=\"text\" id=\"edit-search-api-fulltext\" name=\"search_api_fulltext\" maxlength=\"128\">
    <input data-drupal-selector=\"edit-submit-search\" type=\"submit\" id=\"edit-submit-search\" value=\"Search\" class=\"search-form__submit button js-form-submit form-submit\">
</form>";
    }

    public function getTemplateName()
    {
        return "themes/slink/templates/block--exposedformsearchpage_1.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/slink/templates/block--exposedformsearchpage_1.html.twig", "/home/ubuntu/workspace/themes/slink/templates/block--exposedformsearchpage_1.html.twig");
    }
}
