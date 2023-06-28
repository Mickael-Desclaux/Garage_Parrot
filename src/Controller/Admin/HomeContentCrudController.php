<?php

namespace App\Controller\Admin;

use App\Entity\HomeContent;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

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
    
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::EDIT)
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityPermission('ROLE_ADMIN');
    }
}
