<?php

/* /Shelves/index.twig */
class __TwigTemplate_7a96a9e0c5a97ac559959aa4fce87585 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/index.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/index.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "&Eacute;tag&egrave;res";
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        echo "<link href=\"css/shelves.css\" type=\"text/css\" rel=\"stylesheet\" />";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "<h2>Mes &eacute;tag&egrave;res</h2>
<div class=\"new-link\">
    <a href=\"/shelf/new\" title=\"Créer une nouvelle étagère\">Ajouter...</a>
</div>
";
        // line 9
        if ((!twig_test_empty((isset($context["shelves"]) ? $context["shelves"] : null)))) {
            // line 10
            echo "<table class=\"data\" id=\"shelves\">
    <thead>
        <tr>
            <th>Nom</th>
            <th class=\"nb\">&Eacute;l&eacute;ments</th>
        </tr>
    </thead>
    <tbody>
    ";
            // line 18
            $context["totalShelves"] = 0;
            // line 19
            echo "    ";
            $context["totalItems"] = 0;
            // line 20
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["shelves"]) ? $context["shelves"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["shelf"]) {
                // line 21
                echo "        <tr>
            <td>";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["shelf"]) ? $context["shelf"] : null), "name"));
                echo "</td>
            <td class=\"nb\">";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["shelf"]) ? $context["shelf"] : null), "nbItems"), "html", null, true);
                echo "</td>
        </tr>
        ";
                // line 25
                $context["totalShelves"] = ((isset($context["totalShelves"]) ? $context["totalShelves"] : null) + 1);
                // line 26
                echo "        ";
                $context["totalItems"] = ((isset($context["totalItems"]) ? $context["totalItems"] : null) + $this->getAttribute((isset($context["shelf"]) ? $context["shelf"] : null), "nbItems"));
                // line 27
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['shelf'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            echo "    </tbody>
    <tfoot>
        <tr>
            <td class=\"nb\">";
            // line 31
            echo twig_escape_filter($this->env, (isset($context["totalShelves"]) ? $context["totalShelves"] : null), "html", null, true);
            echo " &eacute;tag&egrave;re(s)</td>
            <td class=\"nb\">";
            // line 32
            echo twig_escape_filter($this->env, (isset($context["totalItems"]) ? $context["totalItems"] : null), "html", null, true);
            echo " &eacute;l&eacute;ment(s)</td>
        </tr>
    </tfoot>
</table>
";
        } else {
            // line 37
            echo "<p>Aucune &eacute;tag&egrave;re.</p>
";
        }
    }

    public function getTemplateName()
    {
        return "/Shelves/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 37,  105 => 32,  101 => 31,  96 => 28,  90 => 27,  87 => 26,  85 => 25,  80 => 23,  76 => 22,  73 => 21,  68 => 20,  65 => 19,  63 => 18,  53 => 10,  51 => 9,  45 => 5,  42 => 4,  36 => 3,  30 => 2,);
    }
}
