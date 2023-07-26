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
class __TwigTemplate_c7961aa9cff41f3ebf7d9e44d1432845 extends Template
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
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 5
        echo "        <link rel=\"stylesheet\" href=\"css/socials.css\">
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 7
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 8
        echo "    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 9
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 10
        echo "
    <div class=\"wrapper--social\">
        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "flashes", ["unauthorized_access"], "method", false, false, false, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 13
            echo "            ";
            if ( !twig_test_empty($context["error"])) {
                // line 14
                echo "                <div class=\"error-message\">
                    ";
                // line 15
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "
                </div>
            ";
            }
            // line 18
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 19, $this->source); })()), "flashes", ["connection_errors"], "method", false, false, false, 19));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 20
            echo "            ";
            if ( !twig_test_empty($context["error"])) {
                // line 21
                echo "                <div class=\"error-message\">
                    ";
                // line 22
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "
                </div>
            ";
            }
            // line 25
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 26, $this->source); })()), "flashes", ["success"], "method", false, false, false, 26));
        foreach ($context['_seq'] as $context["_key"] => $context["success"]) {
            // line 27
            echo "            ";
            if ( !twig_test_empty($context["success"])) {
                // line 28
                echo "                <div class=\"success-message\">
                    ";
                // line 29
                echo twig_escape_filter($this->env, $context["success"], "html", null, true);
                echo "
                </div>
            ";
            }
            // line 32
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['success'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "        <h2 class=\"title\">Let's Get You Setup </h2>
        <hr>
        <p class=\"description\">Connect your social media profiles</p>

        <div class=\"social--media\">
            <div class=\"social--medium\">
                ";
        // line 39
        if ( !twig_test_empty((isset($context["picture"]) || array_key_exists("picture", $context) ? $context["picture"] : (function () { throw new RuntimeError('Variable "picture" does not exist.', 39, $this->source); })()))) {
            // line 40
            echo "                    <a id=\"facebook-pfp\">
                        <img class=\"socials--logo picture\" src=\"";
            // line 41
            echo twig_escape_filter($this->env, (isset($context["picture"]) || array_key_exists("picture", $context) ? $context["picture"] : (function () { throw new RuntimeError('Variable "picture" does not exist.', 41, $this->source); })()), "html", null, true);
            echo "\"/>
                        <img class=\"socials--logo miniature\" src='img/facebook.png.webp'/>
                    </a>
                ";
        } else {
            // line 45
            echo "                    <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_facebook_login");
            echo "\">
                        <img class=\"socials--logo\" src='img/facebook.png.webp'/>
                    </a>
                ";
        }
        // line 49
        echo "            </div>
            <div class=\"social--medium\">
                ";
        // line 51
        if ( !twig_test_empty((isset($context["pictureLinkedin"]) || array_key_exists("pictureLinkedin", $context) ? $context["pictureLinkedin"] : (function () { throw new RuntimeError('Variable "pictureLinkedin" does not exist.', 51, $this->source); })()))) {
            // line 52
            echo "                    <a href=\"#\" id=\"linkedin-pfp\">
                        <img class=\"socials--logo picture\" src=\"";
            // line 53
            echo twig_escape_filter($this->env, (isset($context["pictureLinkedin"]) || array_key_exists("pictureLinkedin", $context) ? $context["pictureLinkedin"] : (function () { throw new RuntimeError('Variable "pictureLinkedin" does not exist.', 53, $this->source); })()), "html", null, true);
            echo "\"/>
                    </a>

                    <img class=\"socials--logo miniature\" src=\"img/linkedin.png.webp\"/>
                ";
        } else {
            // line 58
            echo "                    <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_linkedin_login");
            echo "\">
                        <img class=\"socials--logo\" src=\"img/linkedin.png.webp\"/>
                    </a>
                ";
        }
        // line 62
        echo "
            </div>
            <div class=\"social--medium\">

                ";
        // line 66
        if ( !twig_test_empty((isset($context["pictureTwitter"]) || array_key_exists("pictureTwitter", $context) ? $context["pictureTwitter"] : (function () { throw new RuntimeError('Variable "pictureTwitter" does not exist.', 66, $this->source); })()))) {
            // line 67
            echo "                    <a href=\"#\" id=\"twitter-pfp\">
                        <img
                                class=\"socials--logo picture twitter\"
                                src=\"";
            // line 70
            echo twig_escape_filter($this->env, (isset($context["pictureTwitter"]) || array_key_exists("pictureTwitter", $context) ? $context["pictureTwitter"] : (function () { throw new RuntimeError('Variable "pictureTwitter" does not exist.', 70, $this->source); })()), "html", null, true);
            echo "\"
                        />
                    </a href=\"#\">
                    <img
                            class=\"socials--logo miniature\"
                            src=\"img/twitter.png.webp\"
                    />
                ";
        } else {
            // line 78
            echo "                    <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_twitter_login");
            echo "\">
                        <img
                                class=\"socials--logo\"
                                src=\"img/twitter.png.webp\"
                        />
                    </a>
                ";
        }
        // line 85
        echo "

            </div>
        </div>
        <div class=\"confirm-reset\" id=\"fb\">
            <p>Are you sure you want to disconnect from Facebook ?</p>
            <button class=\"confirm-button  yes\"><a href=\"";
        // line 91
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reset_socials_facebook");
        echo "\">yes</a></button>
            <button id=\"fb-button\" class=\"confirm-button\">no</button>
        </div>
        <div class=\"confirm-reset\" id=\"tw\">
            <p>Are you sure you want to disconnect from Twitter ?</p>
            <button class=\"confirm-button yes\"><a href=\"";
        // line 96
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reset_socials_twitter");
        echo "\">yes</a></button>
            <button class=\"confirm-button\" id=\"tw-button\">no</button>
        </div>
        <div class=\"confirm-reset\" id=\"link\">
            <p>Are you sure you want to disconnect from Linkedin ?</p>
            <button class=\"confirm-button yes\"><a href=\"";
        // line 101
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reset_socials_linkedin");
        echo "\">yes</a></button>
            <button id=\"link-button\" class=\"confirm-button\">no</button>
        </div>
    </div>
    <script src=\"js/social-media.js\"></script>

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
        return array (  315 => 101,  307 => 96,  299 => 91,  291 => 85,  280 => 78,  269 => 70,  264 => 67,  262 => 66,  256 => 62,  248 => 58,  240 => 53,  237 => 52,  235 => 51,  231 => 49,  223 => 45,  216 => 41,  213 => 40,  211 => 39,  203 => 33,  197 => 32,  191 => 29,  188 => 28,  185 => 27,  180 => 26,  174 => 25,  168 => 22,  165 => 21,  162 => 20,  157 => 19,  151 => 18,  145 => 15,  142 => 14,  139 => 13,  135 => 12,  131 => 10,  121 => 9,  111 => 8,  101 => 7,  90 => 5,  80 => 4,  61 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'templates.html.twig' %}

{% block title %}Socials{% endblock %}
    {% block stylesheets %}
        <link rel=\"stylesheet\" href=\"css/socials.css\">
    {% endblock %}
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
        {% for error in app.flashes('connection_errors') %}
            {% if error is not empty %}
                <div class=\"error-message\">
                    {{ error }}
                </div>
            {% endif %}
        {% endfor %}
        {% for success in app.flashes('success') %}
            {% if success is not empty %}
                <div class=\"success-message\">
                    {{ success }}
                </div>
            {% endif %}
        {% endfor %}
        <h2 class=\"title\">Let's Get You Setup </h2>
        <hr>
        <p class=\"description\">Connect your social media profiles</p>

        <div class=\"social--media\">
            <div class=\"social--medium\">
                {% if picture is not empty %}
                    <a id=\"facebook-pfp\">
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
                    <a href=\"#\" id=\"linkedin-pfp\">
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
                    <a href=\"#\" id=\"twitter-pfp\">
                        <img
                                class=\"socials--logo picture twitter\"
                                src=\"{{ pictureTwitter }}\"
                        />
                    </a href=\"#\">
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
        <div class=\"confirm-reset\" id=\"fb\">
            <p>Are you sure you want to disconnect from Facebook ?</p>
            <button class=\"confirm-button  yes\"><a href=\"{{ path('app_reset_socials_facebook') }}\">yes</a></button>
            <button id=\"fb-button\" class=\"confirm-button\">no</button>
        </div>
        <div class=\"confirm-reset\" id=\"tw\">
            <p>Are you sure you want to disconnect from Twitter ?</p>
            <button class=\"confirm-button yes\"><a href=\"{{ path('app_reset_socials_twitter') }}\">yes</a></button>
            <button class=\"confirm-button\" id=\"tw-button\">no</button>
        </div>
        <div class=\"confirm-reset\" id=\"link\">
            <p>Are you sure you want to disconnect from Linkedin ?</p>
            <button class=\"confirm-button yes\"><a href=\"{{ path('app_reset_socials_linkedin') }}\">yes</a></button>
            <button id=\"link-button\" class=\"confirm-button\">no</button>
        </div>
    </div>
    <script src=\"js/social-media.js\"></script>

{% endblock %}
", "social_media/index.html.twig", "C:\\Users\\chadha\\social_share_hub\\templates\\social_media\\index.html.twig");
    }
}
