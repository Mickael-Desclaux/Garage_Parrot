<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function showDetails(Car $car) {
        return $this->render('car/detail.html.twig', ['car' => $car]);
    }
}
