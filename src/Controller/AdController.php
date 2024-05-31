<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdController extends AbstractController
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    #[Route('/ads/for-home', name: 'ads_for_home')]
    public function forHomePage(): Response
    {
        $products = $this->productRepository->findAdvertised(3);

        return $this->render('ad/ads_for_home.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/ads/{id}', name: 'ads_for_product')]
    public function adsForProduct(Product $product): Response
    {
        $products = $this->productRepository->findAdvertised(3);

        return $this->render('ad/ads_for_product.html.twig', [
            'product' => $product,
            'products' => $products,
        ]);
    }
}
