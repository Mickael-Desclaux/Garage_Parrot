<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    #[Route('/nos_voitures', name: 'car_list')]
    public function carList(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Car::class);
        $cars = $repository->findAll();
        return $this->render('car/list.html.twig', [
            "cars" => $cars
        ]);
    }

    #[Route('/nos_voitures/{id}', name: "voiture_detail")]
    public function showDetails(Car $car) {
        return $this->render('car/detail.html.twig', ['car' => $car]);
    }

    #[Route('/nos_voitures/ajouter')]
    public function add(Request $request, ManagerRegistry $doctrine): Response
    {
        $car = new Car();

        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $car->setUser($this->getUser());
            $em = $doctrine->getManager();
            $em->persist($car);
            $em->flush();
            return $this->redirectToRoute("car_list");
        }

        return $this->render('car/form.html.twig', [
            'car_form' => $form->createView(),
        ]);
    }
}
