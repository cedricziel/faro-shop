<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\AddToCartType;
use App\Manager\CartManager;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    #[Route('/product/{id}', name: 'product_detail')]
    public function detail(Request $request, Product $product, CartManager $cartManager): Response
    {
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

            return $this->redirectToRoute('product_detail', [
                'id' => $product->getId(),
            ]);
        }

        return $this->render('product/detail.html.twig', [
            'form' => $form->createView(),
            'product' => $product,
        ]);
    }
}
