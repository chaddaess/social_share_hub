<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UnsetSessionController extends AbstractController
{
    #[Route('/unset/session', name: 'app_unset_session')]
    public function index(Request $request)
    {
        $session=$request->getSession();
        if ($request->isXmlHttpRequest()) {
            // Unset facebook user session variable
            $session->remove('facebook_user');
            $session->remove('facebook_user_picture');
        }

        return($this->redirectToRoute('app_social_media'));
    }
}
