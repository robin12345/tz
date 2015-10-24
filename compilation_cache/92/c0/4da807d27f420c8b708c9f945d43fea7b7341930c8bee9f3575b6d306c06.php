<?php

/* layout.html */
class __TwigTemplate_92c04da807d27f420c8b708c9f945d43fea7b7341930c8bee9f3575b6d306c06 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <title></title>
    <script src=\"http://yastatic.net/jquery/2.1.4/jquery.min.js\" type=\"text/javascript\"></script>
</head>
<body>
    <div id=\"header\">
        ";
        // line 10
        $this->displayBlock('header', $context, $blocks);
        // line 13
        echo "    </div>

    <div id=\"content\">
        ";
        // line 16
        $this->displayBlock('body', $context, $blocks);
        // line 19
        echo "    </div>

    <div id=\"footer\">
        ";
        // line 22
        $this->displayBlock('footer', $context, $blocks);
        // line 25
        echo "    </div>
</body>
</html>";
    }

    // line 10
    public function block_header($context, array $blocks = array())
    {
        // line 11
        echo "
        ";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        echo "
        ";
    }

    // line 22
    public function block_footer($context, array $blocks = array())
    {
        // line 23
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  74 => 23,  71 => 22,  66 => 17,  63 => 16,  58 => 11,  55 => 10,  49 => 25,  47 => 22,  42 => 19,  40 => 16,  35 => 13,  33 => 10,  22 => 1,  142 => 83,  123 => 81,  118 => 80,  109 => 75,  83 => 53,  31 => 3,  28 => 2,);
    }
}
