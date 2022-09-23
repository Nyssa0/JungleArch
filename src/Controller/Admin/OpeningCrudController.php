<?php

namespace App\Controller\Admin;

use App\Entity\Opening;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OpeningCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Opening::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Horaire')
            ->setEntityLabelInPlural('Horaires')
        ;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('lundi'),
            TextField::new('mardi'),
            TextField::new('mercredi'),
            TextField::new('jeudi'),
            TextField::new('vendredi'),
            TextField::new('samedi'),
            TextField::new('dimanche'),
        ];
    }
}
