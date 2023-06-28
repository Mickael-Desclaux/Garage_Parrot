<?php

namespace App\Controller\Admin;

use App\Entity\HomeContent;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class HomeContentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HomeContent::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextEditorField::new('content')->setLabel('Section de texte');
        yield ImageField::new('image')
        ->setLabel('Image')
        ->setUploadDir('public/images/home');
    }
    
}
