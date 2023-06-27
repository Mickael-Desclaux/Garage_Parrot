<?php

namespace App\Controller;

use App\Entity\Review;
use App\Form\ReviewType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReviewController extends AbstractController
{
    #[Route('/vos_avis', name: 'review')]
    public function newReview(Request $request, ManagerRegistry $doctrine): Response
    {
        $review = new Review();
        $review->setApproved(false);

        $form = $this->createForm(ReviewType::class, $review);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($review);
            $em->flush();
            return $this->redirectToRoute("home");
        }
        return $this->render('review/form.html.twig', [
            "review_form" => $form->createView()
        ]);
    }
}
