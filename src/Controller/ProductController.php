<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\AddToCartType;
use App\Manager\CartManager;
use App\Service\DiscountService;
use OpenTelemetry\API\Trace\Span;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly DiscountService $discountService,
    ){
    }

    #[Route('/product/{id}', name: 'product_detail')]
    public function detail(Request $request, Product $product, CartManager $cartManager): Response
    {
        $discountForOrder = $this->discountService->calculateDiscountForProduct($product);
        Span::getCurrent()->setAttribute('app.product.id', $product->getId());

        $form = $this->createForm(AddToCartType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->logger->info(sprintf('adding product %s to cart', $product->getName()));

            $item = $form->getData();
            $item->setProduct($product);

            $cart = $cartManager->getCurrentCart();
            $cart
                ->addItem($item)
                ->setUpdatedAt(new \DateTimeImmutable());

            $cartManager->save($cart);

            $this->addFlash('success', sprintf('Product %s added to cart', $product->getName()));

            return $this->redirectToRoute('cart');
        }

        return $this->render('product/detail.html.twig', [
            'form' => $form->createView(),
            'product' => $product,
        ]);
    }
}
