<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use OpenTelemetry\API\Trace\Span;
use OpenTelemetry\API\Trace\StatusCode;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Attribute\Route;

class AdController extends AbstractController
{
    public function __construct(
        private ProductRepository $productRepository,
        private LoggerInterface $logger,
    ){
    }

    #[Route('/ads/for-home', name: 'ads_for_home')]
    public function forHomePage(): Response
    {
        try {
            $products = $this->productRepository->findAdvertised(3);
        } catch (\Exception $e) {
            Span::getCurrent()
                ->recordException($e)
                ->setStatus(StatusCode::STATUS_ERROR, 'Unable to fetch ads for homepage');

            throw new HttpException(Response::HTTP_BAD_REQUEST, 'Unable to fetch ads for homepage', $e);
        }

        return $this->render('ad/ads_for_home.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/ads/{id}', name: 'ads_for_product')]
    public function adsForProduct(Product $product): Response
    {
        Span::getCurrent()->setAttribute('app.product.id', $product->getId());

        try {
            $products = $this->productRepository->findRelated($product, 3);
        } catch (\Exception $e) {
            Span::getCurrent()
                ->recordException($e)
                ->setStatus(StatusCode::STATUS_ERROR, 'Unable to fetch related products');
            $this->logger->error(sprintf('Unable to fetch related products: %s', $e->getMessage()), ['exception' => $e]);

            throw $e;
        }

        return $this->render('ad/ads_for_product.html.twig', [
            'product' => $product,
            'products' => $products,
        ]);
    }
}
