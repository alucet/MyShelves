<?php

/* /index.twig */
class __TwigTemplate_d600efb70a6fd9643e3f1fb5b4723a83 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
    <head>
        <title>";
        // line 3
        $this->displayBlock('title', $context, $blocks);
        echo " - MyShelves</title>
    </head>
    
    <body>
        <h1 lang=\"en\"><a href=\"/\" title=\"Page d'accueil\">MyShelves</a></h1>
        <ul title=\"Menu principal\" id=\"main-menu\">
            <li><a href=\"/shelves\" title=\"Gestion des &eacute;tag&egrave;res\">&Eacute;tag&egrave;res</a></li>
        </ul>
        
        ";
        // line 12
        $this->displayBlock('content', $context, $blocks);
        // line 15
        echo "
        ";
        // line 18
        echo "        <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js\"></script>
        <script type=\"text/javascript\">
            if(typeof jQuery === 'undefined') {
                //<![CDATA[
                document.write(\"<script src='/js/jquery-1.10.2.min.js' type='text/javascript'><\\/script>\");
                //]]>
            }
        </script>
        ";
        // line 26
        $this->displayBlock('js', $context, $blocks);
        // line 28
        echo "    </body>
</html>
";
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Accueil";
    }

    // line 12
    public function block_content($context, array $blocks = array())
    {
        // line 13
        echo "        
        ";
    }

    // line 26
    public function block_js($context, array $blocks = array())
    {
        // line 27
        echo "        ";
    }

    public function getTemplateName()
    {
        return "/index.twig";
    }

    public function getDebugInfo()
    {
        return array (  78 => 27,  75 => 26,  70 => 13,  67 => 12,  61 => 3,  55 => 28,  53 => 26,  43 => 18,  40 => 15,  26 => 3,  22 => 1,  38 => 12,  35 => 3,  29 => 2,);
    }
}
