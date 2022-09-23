<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use App\Entity\DishCategory;
use App\Entity\DishSubCategory;
use App\Entity\Menu;
use App\Entity\Opening;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Jungle Arch');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Accueil', 'fa fa-home');
        yield MenuItem::linkToCrud('Plats', 'fas fa-utensils', Menu::class);
        yield MenuItem::linkToCrud('Catégorie de Plat', 'fas fa-boxes', DishCategory::class);
        yield MenuItem::linkToCrud('Sous-catégorie de Plat', 'fas fa-cheese', DishSubCategory::class);
        yield MenuItem::linkToCrud('Horaire', 'fas fa-clock', Opening::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-comments', Contact::class);
    }
}
