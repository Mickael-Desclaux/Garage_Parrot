<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use App\Entity\CarImage;
use App\Form\CarImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class CarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Car::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('brand');
        yield TextField::new('model');
        yield IntegerField::new('year');
        yield IntegerField::new('mileage');
        yield ChoiceField::new('energy')->setChoices([
            "Essence" => "Essence",
            "Gazole" => "Gazole",
            "Électrique" => "Électrique",
            "Hybride" => "Hybride",
        ]);
        yield ChoiceField::new('gearbox')->setChoices([
            "Manuelle" => "Manuelle",
            "Automatique" => "Automatique",
        ]);
        yield ChoiceField::new('doors')->setChoices([
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
        ]);
        yield IntegerField::new('horsepower');
        yield IntegerField::new('price')->setLabel("Prix");
        yield CollectionField::new('CarImages')->setLabel("Images")
        ->setEntryType(CarImageType::class);
    }
}
