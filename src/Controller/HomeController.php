<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(
        private ProductService $productService,
    ){
    }

    #[Route('/', name: 'home')]
    public function index(ProductRepository $productRepository): Response
    {
        $products = $this->productService->findAll();

        return $this->render('home/index.html.twig', [
            'products' => $products,
        ]);
    }
}
