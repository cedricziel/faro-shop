<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use OpenTelemetry\API\Trace\Span;
use OpenTelemetry\API\Trace\StatusCode;
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

        $response = new Response();
        try {
            if (rand(1, 10) === 1) {
                $response->setStatusCode(Response::HTTP_BAD_REQUEST);
                throw new BadRequestException('Unable to fetch ads for homepage');
            }
        } catch (\Exception $e) {
            Span::getCurrent()
                ->recordException($e)
                ->setStatus(StatusCode::STATUS_ERROR, 'Unable to fetch ads for homepage');
        }

        return $this->render('ad/ads_for_home.html.twig', [
            'products' => $products,
        ], $response);
    }

    #[Route('/ads/{id}', name: 'ads_for_product')]
    public function adsForProduct(Product $product): Response
    {
        $products = $this->productRepository->findAdvertised(3);

        $response = new Response();
        try {
            if ($product->getId() % 2 === 1) {
                $response->setStatusCode(Response::HTTP_BAD_REQUEST);
                throw new BadRequestException('Product not allowed to show ads');
            }
        } catch (\Exception $e) {
            Span::getCurrent()
                ->recordException($e)
                ->setStatus(StatusCode::STATUS_ERROR, 'Product not allowed to show ads');
        }

        return $this->render('ad/ads_for_product.html.twig', [
            'product' => $product,
            'products' => $products,
        ], $response);
    }
}
