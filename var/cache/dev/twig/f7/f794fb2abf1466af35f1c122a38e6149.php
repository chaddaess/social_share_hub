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
class __TwigTemplate_95f365c3d6fe7145e093b8b653101854 extends Template
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
    <meta charset=\"utf-8\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\" />
    <meta name=\"description\" content=\"\" />
    <meta name=\"author\" content=\"\" />
    <title>";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <link href=\"https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css\" rel=\"stylesheet\" />
    <link href=\"css/styles.css\" rel=\"stylesheet\" />
    <script src=\"https://use.fontawesome.com/releases/v6.3.0/js/all.js\" crossorigin=\"anonymous\"></script>
    <link rel=\"stylesheet\" href=\"css/app.css\">
    <link rel=\"stylesheet\" href=\"css/socials.css\">
    <link rel=\"stylesheet\" href=\"css/header.css\">

    ";
        // line 17
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 19
        echo "    ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 21
        echo "</head>
<div class=\"sb-nav-fixed\">
<nav class=\"sb-topnav navbar navbar-expand navbar-dark bg-dark\">
    <!-- Navbar Brand-->
    <a class=\"navbar-brand ps-3\" href=\"index.html\">Dlvr.it</a>
    <!-- Sidebar Toggle-->
    <button class=\"btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0\" id=\"sidebarToggle\" href=\"#!\"><i class=\"fas fa-bars\"></i></button>
    <!-- Navbar-->
    <a class=\"nav-link2\" href=\"";
        // line 29
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media");
        echo "\">Feeds</a>
    <ul class=\"navbar-nav ms-auto ms-md-0 me-3 me-lg-4\">
        <li class=\"nav-item dropdown\">
            <a class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\"><i class=\"fas fa-user fa-fw\"></i></a>
            <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdown\">
                <li>";
        // line 34
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "user", [], "any", false, false, false, 34), "userIdentifier", [], "any", false, false, false, 34), "html", null, true);
        echo "</li>
                <li><a class=\"dropdown-item\" href=\"#!\">Settings</a></li>
                <li><hr class=\"dropdown-divider\" /></li>
                <li><a class=\"dropdown-item\" href=\"";
        // line 37
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
        // line 47
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_post_content");
        echo "\">
                        <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-pen\"></i></div>
                        New Post
                    </a>
                    <a class=\"nav-link\" href=\"";
        // line 51
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
        // line 59
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 59, $this->source); })()), "user", [], "any", false, false, false, 59), "userIdentifier", [], "any", false, false, false, 59), "html", null, true);
        echo "
            </div>
        </nav>
    </div>


    </div>
</div>
<body>
";
        // line 68
        $this->displayBlock('body', $context, $blocks);
        // line 70
        echo "<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\" crossorigin=\"anonymous\"></script>
<script src=\"js/scripts.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js\" crossorigin=\"anonymous\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js\" crossorigin=\"anonymous\"></script>
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

    // line 17
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 18
        echo "    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 19
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 20
        echo "    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 68
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
        return array (  218 => 68,  208 => 20,  198 => 19,  188 => 18,  178 => 17,  159 => 9,  142 => 70,  140 => 68,  128 => 59,  117 => 51,  110 => 47,  97 => 37,  91 => 34,  83 => 29,  73 => 21,  70 => 19,  68 => 17,  57 => 9,  47 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\" />
    <meta name=\"description\" content=\"\" />
    <meta name=\"author\" content=\"\" />
    <title>{% block title %}SocialShareHub{% endblock %}</title>
    <link href=\"https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css\" rel=\"stylesheet\" />
    <link href=\"css/styles.css\" rel=\"stylesheet\" />
    <script src=\"https://use.fontawesome.com/releases/v6.3.0/js/all.js\" crossorigin=\"anonymous\"></script>
    <link rel=\"stylesheet\" href=\"css/app.css\">
    <link rel=\"stylesheet\" href=\"css/socials.css\">
    <link rel=\"stylesheet\" href=\"css/header.css\">

    {% block stylesheets %}
    {% endblock %}
    {% block javascripts %}
    {% endblock %}
</head>
<div class=\"sb-nav-fixed\">
<nav class=\"sb-topnav navbar navbar-expand navbar-dark bg-dark\">
    <!-- Navbar Brand-->
    <a class=\"navbar-brand ps-3\" href=\"index.html\">Dlvr.it</a>
    <!-- Sidebar Toggle-->
    <button class=\"btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0\" id=\"sidebarToggle\" href=\"#!\"><i class=\"fas fa-bars\"></i></button>
    <!-- Navbar-->
    <a class=\"nav-link2\" href=\"{{ path('app_social_media') }}\">Feeds</a>
    <ul class=\"navbar-nav ms-auto ms-md-0 me-3 me-lg-4\">
        <li class=\"nav-item dropdown\">
            <a class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\"><i class=\"fas fa-user fa-fw\"></i></a>
            <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdown\">
                <li>{{ app.user.userIdentifier }}</li>
                <li><a class=\"dropdown-item\" href=\"#!\">Settings</a></li>
                <li><hr class=\"dropdown-divider\" /></li>
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
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\" crossorigin=\"anonymous\"></script>
<script src=\"js/scripts.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js\" crossorigin=\"anonymous\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js\" crossorigin=\"anonymous\"></script>
<script src=\"js/datatables-simple-demo.js\"></script>
</body>
</html>
", "templates.html.twig", "C:\\Users\\chadha\\social_share_hub\\templates\\templates.html.twig");
    }
}
