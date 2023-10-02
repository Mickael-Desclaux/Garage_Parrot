<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class RedirectToHttpsListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        // Si la requête est en HTTP et non en HTTPS
        if (!$request->isSecure()) {
            // Construire l'URL HTTPS
            $httpsUrl = 'https://' . $request->getHost() . $request->getRequestUri();

            // Rediriger vers l'URL HTTPS
            $response = new RedirectResponse($httpsUrl, 301); // 301 est le code de statut pour une redirection permanente
            $event->setResponse($response);
        }
    }
}
