<?php

namespace App\Controller\Admin;

use App\Entity\CarImage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CarImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CarImage::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
