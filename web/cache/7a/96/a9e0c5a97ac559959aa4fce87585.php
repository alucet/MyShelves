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
        echo "Etag&egrave;res";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<h2>Mes &eacute;tag&egrave;res</h2>
";
        // line 5
        if ((!twig_test_empty((isset($context["shelves"]) ? $context["shelves"] : null)))) {
            // line 6
            echo "<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>&Eacute;l&eacute;ments</th>
        </tr>
    </thead>
    <tbody>
    ";
            // line 14
            $context["totalShelves"] = 0;
            // line 15
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["shelves"]) ? $context["shelves"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["shelf"]) {
                // line 16
                echo "        <tr>
            <td>";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["shelf"]) ? $context["shelf"] : null), "name"));
                echo "</td>
            <td>";
                // line 18
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["shelf"]) ? $context["shelf"] : null), "nbItems"), "html", null, true);
                echo "</td>
        </tr>
        ";
                // line 20
                ((isset($context["totalShelves"]) ? $context["totalShelves"] : null) + 1);
                // line 21
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['shelf'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "    </tbody>
    <tfoot>
        <tr>
            <td colspan=\"2\">
                
            </td>
        </tr>
    </tfoot>
</table>
";
        } else {
            // line 32
            echo "    <p>Aucune &eacute;tag&egrave;re.</p>
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
        return array (  92 => 32,  80 => 22,  74 => 21,  72 => 20,  67 => 18,  63 => 17,  60 => 16,  55 => 15,  53 => 14,  43 => 6,  41 => 5,  38 => 4,  35 => 3,  29 => 2,);
    }
}
