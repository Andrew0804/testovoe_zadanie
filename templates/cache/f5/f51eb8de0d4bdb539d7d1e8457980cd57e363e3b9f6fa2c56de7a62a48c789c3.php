<?php

/* index.html */
class __TwigTemplate_7cdafd5a981ebd7f742a103a0602bf13a2a7c846907b235cfafd277703b932c8 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Каталог</title>
</head>
<body>

    ";
        // line 9
        if (isset($context["filter"])) { $_filter_ = $context["filter"]; } else { $_filter_ = null; }
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($_filter_);
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 10
            echo "    <a href=\"/";
            if (isset($context["args_as_string"])) { $_args_as_string_ = $context["args_as_string"]; } else { $_args_as_string_ = null; }
            echo twig_escape_filter($this->env, $_args_as_string_, "html", null, true);
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "slug", array()), "html", null, true);
            echo "\">";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "name", array()), "html", null, true);
            echo "</a>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "    <a href=\"/\">Назад</a>

    <table border=\"1\">
        <tr><th>Товар</th><th>Цена</th><th>Размер</th><th>Начинка</th><th>Назначение</th><th>Тесто</th><th>Приготовление</th></tr>

        ";
        // line 17
        if (isset($context["goods"])) { $_goods_ = $context["goods"]; } else { $_goods_ = null; }
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($_goods_);
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 18
            echo "        <tr><td>";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "name", array()), "html", null, true);
            echo "</td><td>";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "price", array()), "html", null, true);
            echo " рублей</td><td>";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "size", array()), "html", null, true);
            echo "</td><td>";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "stuffing", array()), "html", null, true);
            echo "</td><td>";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "target", array()), "html", null, true);
            echo "</td><td>";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "paste", array()), "html", null, true);
            echo "</td><td>";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "oven", array()), "html", null, true);
            echo "</td></tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 20
            echo "        Товары не найдены
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "    </table>
    Найдено товаров: ";
        // line 23
        if (isset($context["goods_count"])) { $_goods_count_ = $context["goods_count"]; } else { $_goods_count_ = null; }
        echo twig_escape_filter($this->env, $_goods_count_, "html", null, true);
        echo "
</body>
</html>";
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
        return array (  99 => 23,  96 => 22,  89 => 20,  62 => 18,  56 => 17,  49 => 12,  34 => 10,  29 => 9,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <title>Каталог</title>*/
/* </head>*/
/* <body>*/
/* */
/*     {% for item in filter %}*/
/*     <a href="/{{ args_as_string }}{{ item.slug }}">{{ item.name }}</a>*/
/*     {% endfor %}*/
/*     <a href="/">Назад</a>*/
/* */
/*     <table border="1">*/
/*         <tr><th>Товар</th><th>Цена</th><th>Размер</th><th>Начинка</th><th>Назначение</th><th>Тесто</th><th>Приготовление</th></tr>*/
/* */
/*         {% for item in goods %}*/
/*         <tr><td>{{ item.name }}</td><td>{{ item.price }} рублей</td><td>{{ item.size }}</td><td>{{ item.stuffing }}</td><td>{{ item.target }}</td><td>{{ item.paste }}</td><td>{{ item.oven }}</td></tr>*/
/*         {% else %}*/
/*         Товары не найдены*/
/*         {% endfor %}*/
/*     </table>*/
/*     Найдено товаров: {{ goods_count }}*/
/* </body>*/
/* </html>*/
