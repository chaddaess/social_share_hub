<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/doc.json' => [[['_route' => 'app.swagger', '_controller' => 'nelmio_api_doc.controller.swagger'], null, ['GET' => 0], null, false, false, null]],
        '/api/doc' => [[['_route' => 'app.swagger_ui', '_controller' => 'nelmio_api_doc.controller.swagger_ui'], null, ['GET' => 0], null, false, false, null]],
        '/fcb-callback' => [[['_route' => 'fcb_callback', '_controller' => 'App\\Controller\\FacebookCallbackController::index'], null, ['GET' => 0], null, false, false, null]],
        '/facebook/login' => [[['_route' => 'app_facebook_login', '_controller' => 'App\\Controller\\FacebookLoginController::index'], null, null, null, false, false, null]],
        '/fallback-page' => [[['_route' => 'app_fallback_page', '_controller' => 'App\\Controller\\FallbackPageController::index'], null, null, null, false, false, null]],
        '/connect/google' => [[['_route' => 'connect_google_start', '_controller' => 'App\\Controller\\GoogleController::connectAction'], null, null, null, false, false, null]],
        '/connect/google/check' => [[['_route' => 'connect_google_check', '_controller' => 'App\\Controller\\GoogleController::connectCheckAction'], null, null, null, false, false, null]],
        '/linkedin-callback' => [[['_route' => 'app_linkedin_callback', '_controller' => 'App\\Controller\\LinkedinCallbackController::index'], null, ['GET' => 0], null, false, false, null]],
        '/linkedin/login' => [[['_route' => 'app_linkedin_login', '_controller' => 'App\\Controller\\LinkedinLoginController::index'], null, null, null, false, false, null]],
        '/archive' => [[['_route' => 'app_post_archive', '_controller' => 'App\\Controller\\PostArchiveController::index'], null, null, null, false, false, null]],
        '/post' => [[['_route' => 'app_post_content', '_controller' => 'App\\Controller\\PostContentController::index'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/reset-socials/facebook' => [[['_route' => 'app_reset_socials_facebook', '_controller' => 'App\\Controller\\ResetSocialsController::resetFacebook'], null, null, null, false, false, null]],
        '/reset-socials/linkedin' => [[['_route' => 'app_reset_socials_linkedin', '_controller' => 'App\\Controller\\ResetSocialsController::resetLinkedin'], null, null, null, false, false, null]],
        '/reset-socials/twitter' => [[['_route' => 'app_reset_socials_twitter', '_controller' => 'App\\Controller\\ResetSocialsController::resetTwitter'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/socialmedia' => [[['_route' => 'app_social_media', '_controller' => 'App\\Controller\\SocialMediaController::index'], null, null, null, false, false, null]],
        '/twitter-callback' => [[['_route' => 'twitter_callback', '_controller' => 'App\\Controller\\TwitterCallbackController::index'], null, ['GET' => 0], null, false, false, null]],
        '/twitter/login' => [[['_route' => 'app_twitter_login', '_controller' => 'App\\Controller\\TwitterLoginController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
    ],
    [ // $dynamicRoutes
    ],
    null, // $checkCondition
];
