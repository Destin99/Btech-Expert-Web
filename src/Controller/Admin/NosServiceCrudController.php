<?php

namespace App\Controller\Admin;

use App\Entity\NosService;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NosServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NosService::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre')->setColumns(6),
            ImageField::new('image')
                ->setBasePath('upload/')
                ->setUploadDir('public/upload')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false)->setColumns(3),
                BooleanField::new('statut')->setColumns(3),
            TextEditorField::new('description')
        ];
    }
    
}
