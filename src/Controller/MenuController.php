<?php

namespace App\Controller;

use App\Repository\DishCategoryRepository;
use App\Repository\DishSubCategoryRepository;
use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    /**
     * @Route("/menu", name="app_menu")
     */
    public function index(MenuRepository $menuRepository, DishCategoryRepository $dishCategoryRepository, DishSubCategoryRepository $dishSubCategoryRepository): Response
    {
        $plats = $menuRepository->findAll();
        $categories = $dishCategoryRepository->findAll();
        $subCategories = $dishSubCategoryRepository->findAll();

        return $this->render('menu/index.html.twig', [
            'plats' => $plats,
            'categories' => $categories,
            'subCategories' => $subCategories,
        ]);
    }
}
