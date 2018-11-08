<?php

/* modules/juicebox/templates/juicebox-embed-markup.html.twig */
class __TwigTemplate_53be161c38fe666dd29c5b027bfbf8055e60f853c0584f97d63853beb316c5e5 extends Twig_Template
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
        $tags = array("if" => 23, "for" => 29);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if', 'for'),
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

        // line 18
        echo "<div";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true));
        echo ">
  ";
        // line 19
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true));
        echo "
  <div id=\"";
        // line 20
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["gallery_id"] ?? null), "html", null, true));
        echo "\" class=\"juicebox-container\">
    <noscript>
      <!-- Image gallery content for non-javascript devices -->
      ";
        // line 23
        if ($this->getAttribute(($context["gallery_options"] ?? null), "gallerytitle", array(), "any", true, true)) {
            // line 24
            echo "      <h1 class=\"jb-name\">";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["gallery_options"] ?? null), "gallerytitle", array()), "html", null, true));
            echo "</h1>
      ";
        }
        // line 26
        echo "      ";
        if ($this->getAttribute(($context["gallery_options"] ?? null), "gallerydescription", array(), "any", true, true)) {
            // line 27
            echo "      <p class=\"jb-description\">";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["gallery_options"] ?? null), "gallerydescription", array()), "html", null, true));
            echo "</p>
      ";
        }
        // line 29
        echo "      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["gallery_images"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 30
            echo "      <p class=\"jb-image\">
        ";
            // line 31
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["image"], "image_plain", array()), "html", null, true));
            echo "<br/>
        <span class=\"jb-title\">";
            // line 32
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["image"], "title", array()), "html", null, true));
            echo "</span><br/>
        <span class=\"jb-caption\">";
            // line 33
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["image"], "caption", array()), "html", null, true));
            echo "</span>
      </p>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "    </noscript>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/juicebox/templates/juicebox-embed-markup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 36,  91 => 33,  87 => 32,  83 => 31,  80 => 30,  75 => 29,  69 => 27,  66 => 26,  60 => 24,  58 => 23,  52 => 20,  48 => 19,  43 => 18,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/juicebox/templates/juicebox-embed-markup.html.twig", "/home/ubuntu/workspace/modules/juicebox/templates/juicebox-embed-markup.html.twig");
    }
}
