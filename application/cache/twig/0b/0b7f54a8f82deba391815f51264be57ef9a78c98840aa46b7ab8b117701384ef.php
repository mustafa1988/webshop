<?php

/* layouts/content.twig */
class __TwigTemplate_5e64e98e776ca3e908be835a6d6597d46df00f04f2dd1e958a027f7e6a7113a9 extends Twig_Template
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
        // line 1
        echo "
";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["yield"]) ? $context["yield"] : null), "html", null, true);
    }

    public function getTemplateName()
    {
        return "layouts/content.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("
{{yield}}", "layouts/content.twig", "C:\\wamp64\\www\\tryggva\\application\\views\\layouts\\content.twig");
    }
}
