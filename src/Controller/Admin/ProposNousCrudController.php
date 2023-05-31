<?php

namespace App\Controller\Admin;

use App\Entity\ProposNous;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class ProposNousCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProposNous::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
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
