<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FallbackPageController extends AbstractController
{
    #[Route('/fallback-page', name: 'app_fallback_page')]
    /**
     * Redirects to a fallback page upon calling incorrect or inexistent routes
     */
    public function index(): Response
    {
        return $this->render('fallback_page/index.html.twig', [
            'controller_name' => 'FallbackPageController',
        ]);
    }
}
