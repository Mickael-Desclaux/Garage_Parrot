<?php

namespace App\Controller\Admin;

use App\Controller\Admin\CarCrudController;
use App\Entity\Car;
use App\Entity\CarImage;
use App\Entity\Contact;
use App\Entity\Review;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Option 1. You can make your dashboard redirect to some common page of your backend
        
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(CarCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage Parrot');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Accueil du site', 'fa fa-home', '/');
        yield MenuItem::linkToCrud('Voitures', 'fas fa-list', Car::class);
        yield MenuItem::linkToCrud('Images', 'fas fa-image', CarImage::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Avis Clients', 'fas fa-star', Review::class);
        yield MenuItem::linkToCrud('Contacts', 'fas fa-list', Contact::class);
    }
}
