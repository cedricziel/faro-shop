<?php

namespace App\Controller;

use App\Form\CartType;
use App\Manager\CartManager;
use App\Service\DiscountService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CartController extends AbstractController
{
    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly DiscountService $discountService,
    ){
    }

    #[Route('/cart', name: 'cart')]
    public function index(Request $request, CartManager $cartManager): Response
    {
        $cart = $cartManager->getCurrentCart();
        $form = $this->createForm(CartType::class, $cart);

        $form->handleRequest($request);

        $discount = $this->discountService->calculateDiscount($cart);

        if ($form->isSubmitted() && $form->isValid()) {
            $cart->setUpdatedAt(new \DateTimeImmutable());
            $cartManager->save($cart);

            if ($cart->getId() % 10 === 0) {
                throw new BadRequestException('Unable to checkout cart, please try again later.');
            }

            $this->addFlash('success', sprintf('Cart updated, total amount %s', $cart->getTotal()));

            $this->logger->info(sprintf('Updating cart, total amount %s', $cart->getTotal()));

            return $this->redirectToRoute('cart');
        }

        return $this->render('cart/index.html.twig', [
            'cart' => $cart,
            'discount' => $discount,
            'form' => $form->createView()
        ]);
    }
}
