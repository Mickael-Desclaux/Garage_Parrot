<?php

namespace App\Controller\Admin;

use App\Entity\Review;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ReviewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Review::class;
    }


    public function configureFields(string $pageName): iterable
    {
       yield TextField::new('name')->setLabel('Nom');
       yield TextareaField::new('comment')->setLabel('Commentaire');
       yield ChoiceField::new('note')->setChoices([
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
       ]);
    }
    
}
