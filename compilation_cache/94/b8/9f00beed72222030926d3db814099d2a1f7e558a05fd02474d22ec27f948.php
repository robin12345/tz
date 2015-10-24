<?php

/* index.html */
class __TwigTemplate_94b89f00beed72222030926d3db814099d2a1f7e558a05fd02474d22ec27f948 extends Twig_Template
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
        echo "<script src=\"../js/index.js\" type=\"text/javascript\"></script>
    <div id=\"wrapper\">
        <h1>Расписание поездок курьеров в регионы</h1>

        <h4>Можете выбрать период</h4>
        <form>
            <lable>С <input class=\"start\" type=\"date\" name=\"start\"></lable>
            <lable>По <input class=\"end\" type=\"date\" name=\"end\"></lable>
        </form>
        <a style=\"margin: 15px 0; display: inline-block;\" href=\"";
        // line 12
        if (isset($context["url"])) { $_url_ = $context["url"]; } else { $_url_ = null; }
        echo twig_escape_filter($this->env, $_url_, "html", null, true);
        echo "push\" >Добавить поездку</a>
        <div class=\"all_trip\">
            <table>
                <tr>
                    <th>
                        ФИО курьера
                    </th>
                    <th>
                        Регон
                    </th>
                    <th>
                        Дата отъезда из Москвы
                    </th>
                    <th>
                        Дата прибытия в регион
                    </th>
                    <th>
                        Дата возвращения в Москву
                    </th>
                </tr>
                ";
        // line 32
        if (isset($context["trips"])) { $_trips_ = $context["trips"]; } else { $_trips_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_trips_);
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 33
            echo "                <tr class=\"added\">
                    <th>
                        ";
            // line 35
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_item_, "data_courier", array(), "array"), "name", array(), "array"), "html", null, true);
            echo "
                        ";
            // line 36
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_item_, "data_courier", array(), "array"), "second_name", array(), "array"), "html", null, true);
            echo "
                        ";
            // line 37
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_item_, "data_courier", array(), "array"), "last_name", array(), "array"), "html", null, true);
            echo "
                    </th>
                    <th>
                        ";
            // line 40
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_item_, "data_region", array(), "array"), "title", array(), "array"), "html", null, true);
            echo "
                    </th>
                    <th class=\"date_out\">
                        ";
            // line 43
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "date_out", array(), "array"), "html", null, true);
            echo "
                    </th>
                    <th class=\"date_in\">
                        ";
            // line 46
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "date_in", array(), "array"), "html", null, true);
            echo "
                    </th>
                    <th class=\"date_back\">
                        ";
            // line 49
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "date_back", array(), "array"), "html", null, true);
            echo "
                    </th>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "            </table>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 53,  113 => 49,  106 => 46,  99 => 43,  92 => 40,  85 => 37,  80 => 36,  75 => 35,  71 => 33,  66 => 32,  42 => 12,  31 => 3,  28 => 2,);
    }
}
