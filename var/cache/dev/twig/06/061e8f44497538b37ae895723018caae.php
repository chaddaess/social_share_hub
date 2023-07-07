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

/* social_media/index.html.twig */
class __TwigTemplate_55c850afa995f30334aac81a689751c4 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "social_media/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "social_media/index.html.twig"));

        $this->parent = $this->loadTemplate("templates.html.twig", "social_media/index.html.twig", 1);
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

        echo "Socials";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 4
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 5
        echo "    ";
        
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
        echo "
    <div class=\"wrapper--social\">
            ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 10, $this->source); })()), "flashes", [0 => "unauthorized_access"], "method", false, false, false, 10));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 11
            echo "                ";
            if ( !twig_test_empty($context["error"])) {
                // line 12
                echo "                <div class=\"error-message\">
                    ";
                // line 13
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "
                </div>
                ";
            }
            // line 16
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "        <h2 class=\"title\">Let's Get You Setup </h2>
        <hr>
        <p class=\"description\">Connect your social media profiles</p>
        <div class=\"social--media\">
            <div class=\"social--medium\">
                ";
        // line 22
        if ( !twig_test_empty((isset($context["picture"]) || array_key_exists("picture", $context) ? $context["picture"] : (function () { throw new RuntimeError('Variable "picture" does not exist.', 22, $this->source); })()))) {
            // line 23
            echo "                <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_facebook_login");
            echo "\">
                        <img class=\"socials--logo picture\" src=\"";
            // line 24
            echo twig_escape_filter($this->env, (isset($context["picture"]) || array_key_exists("picture", $context) ? $context["picture"] : (function () { throw new RuntimeError('Variable "picture" does not exist.', 24, $this->source); })()), "html", null, true);
            echo "\"/>
                        <img class=\"socials--logo miniature\" src='img/facebook.png.webp'/>
                </a>
                    ";
        } else {
            // line 28
            echo "                <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_facebook_login");
            echo "\">
                        <img class=\"socials--logo\" src='img/facebook.png.webp'/>
                </a>
                    ";
        }
        // line 32
        echo "            </div>
            <div class=\"social--medium\">
                ";
        // line 34
        if ( !twig_test_empty((isset($context["pictureLinkedin"]) || array_key_exists("pictureLinkedin", $context) ? $context["pictureLinkedin"] : (function () { throw new RuntimeError('Variable "pictureLinkedin" does not exist.', 34, $this->source); })()))) {
            // line 35
            echo "                <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_linkedin_login");
            echo "\">
                <img class=\"socials--logo picture\" src=\"";
            // line 36
            echo twig_escape_filter($this->env, (isset($context["pictureLinkedin"]) || array_key_exists("pictureLinkedin", $context) ? $context["pictureLinkedin"] : (function () { throw new RuntimeError('Variable "pictureLinkedin" does not exist.', 36, $this->source); })()), "html", null, true);
            echo "\"/>
                </a>

                    <img class=\"socials--logo miniature\" src=\"img/linkedin.png.webp\"/>
                    ";
        } else {
            // line 41
            echo "                <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_linkedin_login");
            echo "\">
                        <img class=\"socials--logo\" src=\"img/linkedin.png.webp\"/>
                </a>
                    ";
        }
        // line 45
        echo "
            </div>
            <div class=\"social--medium\">

                    ";
        // line 49
        if ( !twig_test_empty((isset($context["pictureTwitter"]) || array_key_exists("pictureTwitter", $context) ? $context["pictureTwitter"] : (function () { throw new RuntimeError('Variable "pictureTwitter" does not exist.', 49, $this->source); })()))) {
            // line 50
            echo "                <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_twitter_login");
            echo "\">
                        <img
                                class=\"socials--logo picture twitter\"
                                src=\"";
            // line 53
            echo twig_escape_filter($this->env, (isset($context["pictureTwitter"]) || array_key_exists("pictureTwitter", $context) ? $context["pictureTwitter"] : (function () { throw new RuntimeError('Variable "pictureTwitter" does not exist.', 53, $this->source); })()), "html", null, true);
            echo "\"
                        />
                </a>
                        <img
                                class=\"socials--logo miniature\"
                                src=\"img/twitter.png.webp\"
                        />
                    ";
        } else {
            // line 61
            echo "                <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_twitter_login");
            echo "\">
                        <img
                                class=\"socials--logo\"
                                src=\"img/twitter.png.webp\"
                        />
                </a>
                    ";
        }
        // line 68
        echo "

            </div>
        </div>

    </div>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "social_media/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  228 => 68,  217 => 61,  206 => 53,  199 => 50,  197 => 49,  191 => 45,  183 => 41,  175 => 36,  170 => 35,  168 => 34,  164 => 32,  156 => 28,  149 => 24,  144 => 23,  142 => 22,  135 => 17,  129 => 16,  123 => 13,  120 => 12,  117 => 11,  113 => 10,  109 => 8,  99 => 7,  89 => 5,  79 => 4,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'templates.html.twig' %}

{% block title %}Socials{% endblock %}
    {% block javascripts %}
    {% endblock %}

{% block body %}

    <div class=\"wrapper--social\">
            {% for error in app.flashes('unauthorized_access') %}
                {% if error is not empty %}
                <div class=\"error-message\">
                    {{ error }}
                </div>
                {% endif %}
            {% endfor %}
        <h2 class=\"title\">Let's Get You Setup </h2>
        <hr>
        <p class=\"description\">Connect your social media profiles</p>
        <div class=\"social--media\">
            <div class=\"social--medium\">
                {% if picture is not empty %}
                <a href=\"{{ path('app_facebook_login') }}\">
                        <img class=\"socials--logo picture\" src=\"{{ picture }}\"/>
                        <img class=\"socials--logo miniature\" src='img/facebook.png.webp'/>
                </a>
                    {% else %}
                <a href=\"{{ path('app_facebook_login') }}\">
                        <img class=\"socials--logo\" src='img/facebook.png.webp'/>
                </a>
                    {% endif %}
            </div>
            <div class=\"social--medium\">
                {% if pictureLinkedin is not empty %}
                <a href=\"{{ path('app_linkedin_login') }}\">
                <img class=\"socials--logo picture\" src=\"{{ pictureLinkedin }}\"/>
                </a>

                    <img class=\"socials--logo miniature\" src=\"img/linkedin.png.webp\"/>
                    {% else %}
                <a href=\"{{ path('app_linkedin_login') }}\">
                        <img class=\"socials--logo\" src=\"img/linkedin.png.webp\"/>
                </a>
                    {% endif %}

            </div>
            <div class=\"social--medium\">

                    {% if pictureTwitter is not empty %}
                <a href=\"{{ path('app_twitter_login') }}\">
                        <img
                                class=\"socials--logo picture twitter\"
                                src=\"{{ pictureTwitter }}\"
                        />
                </a>
                        <img
                                class=\"socials--logo miniature\"
                                src=\"img/twitter.png.webp\"
                        />
                    {% else %}
                <a href=\"{{ path('app_twitter_login') }}\">
                        <img
                                class=\"socials--logo\"
                                src=\"img/twitter.png.webp\"
                        />
                </a>
                    {% endif %}


            </div>
        </div>

    </div>

{% endblock%}
", "social_media/index.html.twig", "C:\\Users\\chadha\\social_share_hub\\templates\\social_media\\index.html.twig");
    }
}
