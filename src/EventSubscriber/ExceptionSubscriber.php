<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ExceptionSubscriber implements EventSubscriberInterface
{
    private $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException',
        ];
    }

    public function onKernelException(ExceptionEvent $event)
    {
        // Check if the exception is a NotFoundHttpException
        if ($event->getThrowable() instanceof NotFoundHttpException) {
            // Generate the URL for the fallback page
            $fallbackUrl = $this->urlGenerator->generate('app_fallback_page');

            // Create a RedirectResponse to the fallback page
            $response = new RedirectResponse($fallbackUrl);

            // Set the response on the event
            $event->setResponse($response);
        }
    }
}
