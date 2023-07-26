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

/* templates.html.twig */
class __TwigTemplate_05c0135913722d8a5552034f751122bd extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "templates.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "templates.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\"/>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\"/>
    <meta name=\"description\" content=\"\"/>
    <meta name=\"author\" content=\"\"/>
    <title>";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <link href=\"https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css\" rel=\"stylesheet\"/>
    <link href=\"css/styles.css\" rel=\"stylesheet\"/>
    <script src=\"https://use.fontawesome.com/releases/v6.3.0/js/all.js\" crossorigin=\"anonymous\"></script>
    <link rel=\"stylesheet\" href=\"css/app.css\">
    <link rel=\"stylesheet\" href=\"css/header.css\">

    ";
        // line 16
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 18
        echo "    ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 20
        echo "</head>
<div class=\"sb-nav-fixed\">
    <nav class=\"sb-topnav navbar navbar-expand navbar-dark bg-dark\">
        <!-- Navbar Brand-->
        <a class=\"navbar-brand ps-3\">SocialShareHub</a>
        <ul class=\"navbar-nav ms-auto ms-md-0 me-3 me-lg-4\">
            <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\"
                   aria-expanded=\"false\"><i class=\"fas fa-user fa-fw\"></i></a>
                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdown\">
                    <li>";
        // line 30
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 30, $this->source); })()), "user", [], "any", false, false, false, 30), "userIdentifier", [], "any", false, false, false, 30), "html", null, true);
        echo "</li>
                    <li>
                        <hr class=\"dropdown-divider\"/>
                    </li>
                    <li><a class=\"dropdown-item\" href=\"";
        // line 34
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        echo "\">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id=\"layoutSidenav\">
        <div id=\"layoutSidenav_nav\">
            <nav class=\"sb-sidenav accordion sb-sidenav-dark\" id=\"sidenavAccordion\">
                <div class=\"sb-sidenav-menu\">
                    <div class=\"nav\">
                        <a class=\"nav-link\" href=\"";
        // line 44
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media");
        echo "\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" class=\"people-svg\"><g id=\"SVGRepo_bgCarrier\" stroke-width=\"0\"></g><g id=\"SVGRepo_tracerCarrier\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></g><g id=\"SVGRepo_iconCarrier\"> <path d=\"M11 7C11 9.20914 9.20914 11 7 11C4.79086 11 3 9.20914 3 7C3 4.79086 4.79086 3 7 3C9.20914 3 11 4.79086 11 7ZM4.97715 7C4.97715 8.11719 5.88281 9.02284 7 9.02284C8.11719 9.02284 9.02284 8.11719 9.02284 7C9.02284 5.88281 8.11719 4.97716 7 4.97716C5.88281 4.97716 4.97715 5.88281 4.97715 7Z\" fill=\"#595C5F\"></path> <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M2.37162 14.2378C3.54371 13.3886 5.09751 13 7 13C8.90249 13 10.4563 13.3886 11.6284 14.2378C12.8188 15.1004 13.4914 16.3477 13.795 17.8079C14.1811 19.6647 12.5708 21 11 21H3C1.42922 21 -0.181121 19.6647 0.204962 17.8079C0.508602 16.3477 1.18119 15.1004 2.37162 14.2378ZM3.54511 15.8574C2.84896 16.3618 2.39073 17.1203 2.16308 18.2151C2.12425 18.4018 2.17618 18.5729 2.31828 18.7223C2.47041 18.8824 2.71717 19 3 19H11C11.2828 19 11.5296 18.8824 11.6817 18.7223C11.8238 18.5729 11.8757 18.4018 11.8369 18.2151C11.6093 17.1203 11.151 16.3618 10.4549 15.8574C9.74039 15.3397 8.65185 15 7 15C5.34815 15 4.25961 15.3397 3.54511 15.8574Z\" fill=\"#595C5F\"></path> <path d=\"M21 7C21 9.20914 19.2091 11 17 11C14.7909 11 13 9.20914 13 7C13 4.79086 14.7909 3 17 3C19.2091 3 21 4.79086 21 7ZM14.9772 7C14.9772 8.11719 15.8828 9.02284 17 9.02284C18.1172 9.02284 19.0228 8.11719 19.0228 7C19.0228 5.88281 18.1172 4.97716 17 4.97716C15.8828 4.97716 14.9772 5.88281 14.9772 7Z\" fill=\"#595C5F\"></path> <path d=\"M14.5361 13.2689C13.9347 13.4165 13.7248 14.1168 14.0647 14.6344L14.1075 14.6995C14.3593 15.0829 14.839 15.239 15.2891 15.1501C15.7787 15.0534 16.3451 15 17 15C18.6519 15 19.7404 15.3397 20.4549 15.8574C21.1511 16.3618 21.6093 17.1203 21.8369 18.2151C21.8758 18.4018 21.8238 18.5729 21.6817 18.7223C21.5296 18.8824 21.2828 19 21 19H16C15.4478 19 15 19.4477 15 20C15 20.5523 15.4478 21 16 21H21C22.5708 21 24.1811 19.6647 23.7951 17.8079C23.4914 16.3477 22.8188 15.1004 21.6284 14.2378C20.4563 13.3886 18.9025 13 17 13C16.0994 13 15.2769 13.0871 14.5361 13.2689Z\" fill=\"#595C5F\"></path> </g></svg>
                            Socials
                        </a>

                        <a class=\"nav-link\" href=\"";
        // line 49
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_content");
        echo "\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-pen\"></i></div>
                            New Post
                        </a>
                        <a class=\"nav-link\" href=\"";
        // line 53
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_archive");
        echo "\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-book\"></i></div>
                            My Posts
                        </a>
                    </div>
                </div>
                <div class=\"sb-sidenav-footer\">
                    <div class=\"small\">Logged in as:</div>
                    ";
        // line 61
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 61, $this->source); })()), "user", [], "any", false, false, false, 61), "userIdentifier", [], "any", false, false, false, 61), "html", null, true);
        echo "
                </div>
            </nav>
        </div>


    </div>
</div>
<body>
";
        // line 70
        $this->displayBlock('body', $context, $blocks);
        // line 72
        echo "<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\"
        crossorigin=\"anonymous\"></script>
<script src=\"js/scripts.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js\" crossorigin=\"anonymous\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js\"
        crossorigin=\"anonymous\"></script>
<script src=\"js/datatables-simple-demo.js\"></script>
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 9
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "SocialShareHub";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 16
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 17
        echo "    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 18
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 19
        echo "    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 70
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "templates.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 70,  212 => 19,  202 => 18,  192 => 17,  182 => 16,  163 => 9,  144 => 72,  142 => 70,  130 => 61,  119 => 53,  112 => 49,  104 => 44,  91 => 34,  84 => 30,  72 => 20,  69 => 18,  67 => 16,  57 => 9,  47 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\"/>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\"/>
    <meta name=\"description\" content=\"\"/>
    <meta name=\"author\" content=\"\"/>
    <title>{% block title %}SocialShareHub{% endblock %}</title>
    <link href=\"https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css\" rel=\"stylesheet\"/>
    <link href=\"css/styles.css\" rel=\"stylesheet\"/>
    <script src=\"https://use.fontawesome.com/releases/v6.3.0/js/all.js\" crossorigin=\"anonymous\"></script>
    <link rel=\"stylesheet\" href=\"css/app.css\">
    <link rel=\"stylesheet\" href=\"css/header.css\">

    {% block stylesheets %}
    {% endblock %}
    {% block javascripts %}
    {% endblock %}
</head>
<div class=\"sb-nav-fixed\">
    <nav class=\"sb-topnav navbar navbar-expand navbar-dark bg-dark\">
        <!-- Navbar Brand-->
        <a class=\"navbar-brand ps-3\">SocialShareHub</a>
        <ul class=\"navbar-nav ms-auto ms-md-0 me-3 me-lg-4\">
            <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\"
                   aria-expanded=\"false\"><i class=\"fas fa-user fa-fw\"></i></a>
                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdown\">
                    <li>{{ app.user.userIdentifier }}</li>
                    <li>
                        <hr class=\"dropdown-divider\"/>
                    </li>
                    <li><a class=\"dropdown-item\" href=\"{{ path('app_logout') }}\">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id=\"layoutSidenav\">
        <div id=\"layoutSidenav_nav\">
            <nav class=\"sb-sidenav accordion sb-sidenav-dark\" id=\"sidenavAccordion\">
                <div class=\"sb-sidenav-menu\">
                    <div class=\"nav\">
                        <a class=\"nav-link\" href=\"{{ path('app_social_media') }}\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" class=\"people-svg\"><g id=\"SVGRepo_bgCarrier\" stroke-width=\"0\"></g><g id=\"SVGRepo_tracerCarrier\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></g><g id=\"SVGRepo_iconCarrier\"> <path d=\"M11 7C11 9.20914 9.20914 11 7 11C4.79086 11 3 9.20914 3 7C3 4.79086 4.79086 3 7 3C9.20914 3 11 4.79086 11 7ZM4.97715 7C4.97715 8.11719 5.88281 9.02284 7 9.02284C8.11719 9.02284 9.02284 8.11719 9.02284 7C9.02284 5.88281 8.11719 4.97716 7 4.97716C5.88281 4.97716 4.97715 5.88281 4.97715 7Z\" fill=\"#595C5F\"></path> <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M2.37162 14.2378C3.54371 13.3886 5.09751 13 7 13C8.90249 13 10.4563 13.3886 11.6284 14.2378C12.8188 15.1004 13.4914 16.3477 13.795 17.8079C14.1811 19.6647 12.5708 21 11 21H3C1.42922 21 -0.181121 19.6647 0.204962 17.8079C0.508602 16.3477 1.18119 15.1004 2.37162 14.2378ZM3.54511 15.8574C2.84896 16.3618 2.39073 17.1203 2.16308 18.2151C2.12425 18.4018 2.17618 18.5729 2.31828 18.7223C2.47041 18.8824 2.71717 19 3 19H11C11.2828 19 11.5296 18.8824 11.6817 18.7223C11.8238 18.5729 11.8757 18.4018 11.8369 18.2151C11.6093 17.1203 11.151 16.3618 10.4549 15.8574C9.74039 15.3397 8.65185 15 7 15C5.34815 15 4.25961 15.3397 3.54511 15.8574Z\" fill=\"#595C5F\"></path> <path d=\"M21 7C21 9.20914 19.2091 11 17 11C14.7909 11 13 9.20914 13 7C13 4.79086 14.7909 3 17 3C19.2091 3 21 4.79086 21 7ZM14.9772 7C14.9772 8.11719 15.8828 9.02284 17 9.02284C18.1172 9.02284 19.0228 8.11719 19.0228 7C19.0228 5.88281 18.1172 4.97716 17 4.97716C15.8828 4.97716 14.9772 5.88281 14.9772 7Z\" fill=\"#595C5F\"></path> <path d=\"M14.5361 13.2689C13.9347 13.4165 13.7248 14.1168 14.0647 14.6344L14.1075 14.6995C14.3593 15.0829 14.839 15.239 15.2891 15.1501C15.7787 15.0534 16.3451 15 17 15C18.6519 15 19.7404 15.3397 20.4549 15.8574C21.1511 16.3618 21.6093 17.1203 21.8369 18.2151C21.8758 18.4018 21.8238 18.5729 21.6817 18.7223C21.5296 18.8824 21.2828 19 21 19H16C15.4478 19 15 19.4477 15 20C15 20.5523 15.4478 21 16 21H21C22.5708 21 24.1811 19.6647 23.7951 17.8079C23.4914 16.3477 22.8188 15.1004 21.6284 14.2378C20.4563 13.3886 18.9025 13 17 13C16.0994 13 15.2769 13.0871 14.5361 13.2689Z\" fill=\"#595C5F\"></path> </g></svg>
                            Socials
                        </a>

                        <a class=\"nav-link\" href=\"{{ path('app_post_content') }}\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-pen\"></i></div>
                            New Post
                        </a>
                        <a class=\"nav-link\" href=\"{{ path('app_post_archive') }}\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-book\"></i></div>
                            My Posts
                        </a>
                    </div>
                </div>
                <div class=\"sb-sidenav-footer\">
                    <div class=\"small\">Logged in as:</div>
                    {{ app.user.userIdentifier }}
                </div>
            </nav>
        </div>


    </div>
</div>
<body>
{% block body %}
{% endblock %}
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\"
        crossorigin=\"anonymous\"></script>
<script src=\"js/scripts.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js\" crossorigin=\"anonymous\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js\"
        crossorigin=\"anonymous\"></script>
<script src=\"js/datatables-simple-demo.js\"></script>
</body>
</html>
", "templates.html.twig", "C:\\Users\\chadha\\social_share_hub\\templates\\templates.html.twig");
    }
}
