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
}
