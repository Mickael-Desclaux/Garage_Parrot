<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\CarRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarController extends AbstractController
{
    #[Route('/nos_voitures', name: 'car_list')]
    public function carList(CarRepository $carRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $carRepository->paginationQuery(),
            $request->query->get('page', 1),
            9
        );

        return $this->render('car/list.html.twig', [
            "pagination" => $pagination
        ]);
    }

    #[Route('/nos_voitures/{id}', name: "voiture_detail")]
    public function showDetails(Request $request,ManagerRegistry $doctrine, Car $car) {

        $contact = new Contact();

        $contact->setCar($car);

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($contact);
            $em->flush();
            return $this->redirectToRoute("home");
        }
        return $this->render('car/detail.html.twig', [
            'car' => $car,
            'contact_form' => $form->createView(),
        ]);
    }
}
