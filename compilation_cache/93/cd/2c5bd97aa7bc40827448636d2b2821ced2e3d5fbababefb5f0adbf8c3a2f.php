<?php

/* push.html */
class __TwigTemplate_93cd2c5bd97aa7bc40827448636d2b2821ced2e3d5fbababefb5f0adbf8c3a2f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.html");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "<script src=\"../js/push.js\" type=\"text/javascript\"></script>
    <h1>Отправить курьера</h1>

    <form method=\"post\" action=\"/add\">
        <label>Дата отъезда из Москвы:
            <input type=\"date\" class=\"date\" name=\"date_out\">
        </label>
        <label>Укажите регион:
            <select name=\"region\">
                <option value=\"0\" selected=\"selected\"></option>
                ";
        // line 13
        if (isset($context["regions"])) { $_regions_ = $context["regions"]; } else { $_regions_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_regions_);
        foreach ($context['_seq'] as $context["_key"] => $context["val"]) {
            // line 14
            echo "                    <option class=\"region\" value=\"";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "id", array(), "array"), "html", null, true);
            echo "\" date_there=\"";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "days_there", array(), "array"), "html", null, true);
            echo "\" date_back=\"";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "days_back", array(), "array"), "html", null, true);
            echo "\">";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "title", array(), "array"), "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "            </select>
        </label>
        <label>Свободные курьеры:
            <select name=\"courier\">
                <option value=\"0\" selected=\"selected\"></option>
            </select>
        </label>
        <input type=\"hidden\" name=\"date_out\" value=\"\">
        <input type=\"hidden\" name=\"date_there\" value=\"\">
        <input type=\"hidden\" name=\"date_back\" value=\"\">
        <div class=\"send\" style=\"display: inline-block;
                                    padding: 4px 25px;
                                    margin-left: 11px;
                                    background: #e2e2e2;
                                    border-radius: 10px;
                                    border: 1px solid #A2A2A2;
                                    cursor: pointer;\">
            Отправить
        </div>
    </form>
    <h2 class=\"date_out\"></h2>
    <h2 class=\"date_there\"></h2>
    <h2 class=\"date_back\"></h2>

";
    }

    public function getTemplateName()
    {
        return "push.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 16,  48 => 14,  43 => 13,  31 => 3,  28 => 2,);
    }
}
