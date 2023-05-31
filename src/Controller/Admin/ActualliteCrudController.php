<?php

namespace App\Controller\Admin;

use App\Entity\Actuallite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ActualliteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actuallite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre')->setColumns(6),
            AssociationField::new('category')->setColumns(6),
            ImageField::new('url_image')
                ->setBasePath('upload/')
                ->setUploadDir('public/upload')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false)->setColumns(6),
                BooleanField::new('statut')->setColumns(3),
            TextEditorField::new('description')
        ];
    }
    
}
