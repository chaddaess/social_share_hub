<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* post_archive/index.html.twig */
class __TwigTemplate_3e17d4ff0ea5379326b5205b9f256f50 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "templates.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "post_archive/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "post_archive/index.html.twig"));

        $this->parent = $this->loadTemplate("templates.html.twig", "post_archive/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Archive";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 4
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 5
        echo "    <link rel=\"stylesheet\" href=\"css/post-archive.css\"/>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 7
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 8
        echo "    <div class=\"posts\">
        ";
        // line 9
        if (twig_test_empty((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 9, $this->source); })()))) {
            // line 10
            echo "            <div class=\"empty\">
                No posts yet,
                <a href=\"";
            // line 12
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_content");
            echo "\">start by posting something amazing</a>
            </div>
        ";
        }
        // line 15
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 15, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 16
            echo "            <div class=\"post-box\">
                <p class=\"title\">Post:</p>
                <div class=\"post--body\">
                    <p class=\"description\">
                        ";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "text", [], "any", false, false, false, 20), "html", null, true);
            echo "
                    </p>
                    <a href=\"";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "link", [], "any", false, false, false, 22), "html", null, true);
            echo "\">
                        <div class=\"link\">
                            ";
            // line 24
            if ((twig_get_attribute($this->env, $this->source, $context["post"], "domain", [], "any", false, false, false, 24) == "www.jawharafm.net")) {
                // line 25
                echo "                                <img src=\"";
                echo twig_escape_filter($this->env, ("https://www.jawharafm.net" . twig_get_attribute($this->env, $this->source, $context["post"], "image", [], "any", false, false, false, 25)), "html", null, true);
                echo "\" class=\"article--image\"/>
                            ";
            } else {
                // line 27
                echo "                                <img src=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "image", [], "any", false, false, false, 27), "html", null, true);
                echo "\" class=\"article--image\"/>
                            ";
            }
            // line 29
            echo "                            <div class=\"info\">
                                <p class=\"link--title\">";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 30), "html", null, true);
            echo "</p>
                                <p class=\"domain\">";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "domain", [], "any", false, false, false, 31), "html", null, true);
            echo "</p>
                            </div>

                        </div>
                    </a>
                </div>
                <hr>
                <p class=\"title\">Social platforms:</p>
                <div class=\"socials\">
                    ";
            // line 40
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["post"], "postedOn", [], "any", false, false, false, 40));
            foreach ($context['_seq'] as $context["_key"] => $context["media"]) {
                // line 41
                echo "                        ";
                $context["path"] = (("img/" . $context["media"]) . ".png.webp");
                // line 42
                echo "                        <img src=\"";
                echo twig_escape_filter($this->env, (isset($context["path"]) || array_key_exists("path", $context) ? $context["path"] : (function () { throw new RuntimeError('Variable "path" does not exist.', 42, $this->source); })()), "html", null, true);
                echo "\" class=\"social--media--archive\"/>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['media'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "                </div>
                <span>Posted at ";
            // line 45
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "postTime", [], "any", false, false, false, 45), "m/d/Y H:i:s"), "html", null, true);
            echo "</span>
                <br>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "post_archive/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  208 => 49,  198 => 45,  195 => 44,  186 => 42,  183 => 41,  179 => 40,  167 => 31,  163 => 30,  160 => 29,  154 => 27,  148 => 25,  146 => 24,  141 => 22,  136 => 20,  130 => 16,  125 => 15,  119 => 12,  115 => 10,  113 => 9,  110 => 8,  100 => 7,  89 => 5,  79 => 4,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'templates.html.twig' %}

{% block title %}Archive{% endblock %}
{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"css/post-archive.css\"/>
{% endblock %}
{% block body %}
    <div class=\"posts\">
        {% if posts is empty %}
            <div class=\"empty\">
                No posts yet,
                <a href=\"{{ path('app_post_content') }}\">start by posting something amazing</a>
            </div>
        {% endif %}
        {% for post in posts %}
            <div class=\"post-box\">
                <p class=\"title\">Post:</p>
                <div class=\"post--body\">
                    <p class=\"description\">
                        {{ post.text }}
                    </p>
                    <a href=\"{{ post.link }}\">
                        <div class=\"link\">
                            {% if post.domain==\"www.jawharafm.net\" %}
                                <img src=\"{{ \"https://www.jawharafm.net\"~post.image }}\" class=\"article--image\"/>
                            {% else %}
                                <img src=\"{{ post.image }}\" class=\"article--image\"/>
                            {% endif %}
                            <div class=\"info\">
                                <p class=\"link--title\">{{ post.title }}</p>
                                <p class=\"domain\">{{ post.domain }}</p>
                            </div>

                        </div>
                    </a>
                </div>
                <hr>
                <p class=\"title\">Social platforms:</p>
                <div class=\"socials\">
                    {% for media in post.postedOn %}
                        {% set path='img/'~media~'.png.webp' %}
                        <img src=\"{{ path }}\" class=\"social--media--archive\"/>
                    {% endfor %}
                </div>
                <span>Posted at {{ post.postTime|date('m/d/Y H:i:s') }}</span>
                <br>
            </div>
        {% endfor %}
    </div>
{% endblock %}
", "post_archive/index.html.twig", "C:\\Users\\chadha\\social_share_hub\\templates\\post_archive\\index.html.twig");
    }
}
