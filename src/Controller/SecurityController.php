<?php

namespace App\Controller;

use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/connexion', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils, Request $request)
    {
        if ($this->getUser()) {
            // redirect to some 'already logged in' page or wherever you want.
            return $this->redirect($this->generateUrl('home'));
        }

        $lastUsername = $authenticationUtils->getLastUsername();
        $error = $authenticationUtils->getLastAuthenticationError();

        $form = $this->createForm(LoginType::class);

        $form->handleRequest($request);

        if ($error) {
            $this->addFlash('error', $error->getMessageKey());
        }

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'form' => $form->createView()
        ]);
    }

    #[Route('/déconnexion', name: 'logout')]
    public function logout()
    {
    }
}

