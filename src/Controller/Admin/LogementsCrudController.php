<?php

namespace App\Controller\Admin;

use App\Entity\Logements;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

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
            Field::new('coupdecoeur'),
            Field::new('typologie'),
            Field::new('capacite'),
            TextField::new('latitude'),
            TextField::new('longitude'),
            ArrayField::new('dispos'),
            Field::new('prix'),
            Field::new('superficie'),
            Field::new('description'),
            Field::new('nom'),
            Field::new('chambres'),
            Field::new('salledebain'),
            Field::new('ville'),
            Field::new('region'),
            Field::new('postcode'),
            Field::new('animaux'),
            Field::new('barbecue'),
            Field::new('piscine'),
            Field::new('internet'),
            Field::new('menage'),
            Field::new('clim'),
            Field::new('wifi')
        ];
    }
    
}
