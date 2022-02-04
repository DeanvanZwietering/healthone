<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BezoekerController extends AbstractController
{
    /**
     * @Route("/bezoeker", name="bezoeker")
     */
    public function index(): Response
    {
        return $this->render('bezoeker/index.html.twig', [
            'controller_name' => 'BezoekerController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render("bezoeker/index.html.twig");
    }

    /**
     * @Route("/categorieen", name="categories")
     */
    public function readCategories(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->findAll();

        return $this->render("bezoeker/categories.html.twig", [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("categorie/{category_id}", name="category_products")
     */
    public function readProductsByCategory($category_id, ProductRepository $productRepository)
    {
        $products = $productRepository->findBy(['category_id' => $category_id]);

        return $this->render("bezoeker/products.html.twig", [
            'products' => $products,
        ]);
    }
}
