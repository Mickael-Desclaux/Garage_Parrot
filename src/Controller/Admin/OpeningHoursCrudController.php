<?php

namespace App\Controller\Admin;

use App\Entity\OpeningHours;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OpeningHoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpeningHours::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('day')->setLabel('Jour');
        yield TextField::new('hours')->setLabel('Horaires');
    }
    
}
