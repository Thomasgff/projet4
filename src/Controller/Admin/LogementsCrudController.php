<?php

namespace App\Controller\Admin;

use App\Entity\Logements;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class LogementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Logements::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('reference'),
            Field::new('typologie'),
            Field::new('capacite'),
            Field::new('latitude'),
            Field::new('longitude'),
            Field::new('dispos'),
            Field::new('prix'),
            Field::new('superficie'),
            Field::new('description'),
            Field::new('nom'),
            Field::new('chambres'),
            Field::new('salledebain'),
            Field::new('wifi')
        ];
    }
    
}
