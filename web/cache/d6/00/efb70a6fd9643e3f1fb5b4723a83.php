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
            'head' => array($this, 'block_head'),
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
        ";
        // line 5
        echo "        <link href=\"css/main.css\" type=\"text/css\" rel=\"stylesheet\" />
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        ";
        // line 7
        $this->displayBlock('head', $context, $blocks);
        // line 8
        echo "    </head>
    
    <body>
        <h1 lang=\"en\"><a href=\"/\" title=\"Page d'accueil\">MyShelves</a></h1>
        <ul title=\"Menu principal\" id=\"main-menu\">
            <li><a href=\"/shelves\" title=\"Gestion des &eacute;tag&egrave;res\">&Eacute;tag&egrave;res</a></li>
        </ul>
        
        ";
        // line 16
        $this->displayBlock('content', $context, $blocks);
        // line 19
        echo "
        ";
        // line 22
        echo "        <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js\"></script>
        <script type=\"text/javascript\">
            if(typeof jQuery === 'undefined') {
                //<![CDATA[
                document.write(\"<script src='/js/jquery-1.10.2.min.js' type='text/javascript'><\\/script>\");
                //]]>
            }
        </script>
        ";
        // line 30
        $this->displayBlock('js', $context, $blocks);
        // line 32
        echo "    </body>
</html>
";
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Accueil";
    }

    // line 7
    public function block_head($context, array $blocks = array())
    {
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "        
        ";
    }

    // line 30
    public function block_js($context, array $blocks = array())
    {
        // line 31
        echo "        ";
    }

    public function getTemplateName()
    {
        return "/index.twig";
    }

    public function getDebugInfo()
    {
        return array (  92 => 31,  89 => 30,  84 => 17,  81 => 16,  70 => 3,  64 => 32,  62 => 30,  52 => 22,  49 => 19,  47 => 16,  37 => 8,  35 => 7,  31 => 5,  27 => 3,  23 => 1,  113 => 37,  105 => 32,  101 => 31,  96 => 28,  90 => 27,  87 => 26,  85 => 25,  80 => 23,  76 => 7,  73 => 21,  68 => 20,  65 => 19,  63 => 18,  53 => 10,  51 => 9,  45 => 5,  42 => 4,  36 => 3,  30 => 2,);
    }
}
