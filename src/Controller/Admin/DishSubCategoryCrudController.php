<?php

namespace App\Controller\Admin;

use App\Entity\DishSubCategory;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DishSubCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DishSubCategory::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
        ];
    }
}
