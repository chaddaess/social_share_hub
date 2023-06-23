<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemplateTestController extends AbstractController
{
    #[Route('/template', name: 'app_template_test')]
    public function index(): Response
    {
        return $this->render('templates.html.twig', [
            'controller_name' => 'TemplateTestController',
        ]);
    }
}
