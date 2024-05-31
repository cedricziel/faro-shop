<?php

namespace App\Controller;

use App\Entity\Order;
use App\O11y\Metrics;
use App\Service\CheckoutService;
use Doctrine\ORM\EntityManagerInterface;
use OpenTelemetry\API\Trace\Span;
use OpenTelemetry\API\Trace\StatusCode;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly LoggerInterface $logger,
        private readonly CheckoutService $checkoutService,
    ) {
    }

    #[Route('/checkout/{id}', name: 'app_checkout')]
    public function index(Request $request, Order $order): Response
    {
        $span = Span::getCurrent()->setAttributes([
            'app.order.id' => $order->getId(),
            'app.order.total' => $order->getTotal(),
        ]);

        try {
            $this->checkoutService->checkout($order);
        } catch (\Exception $e) {
            $this->logger->error('Checkout failed', [
                'order' => $order->getId(),
                'total' => $order->getTotal(),
                'error' => $e->getMessage(),
            ]);

            Metrics::recordOrder($order, false);

            $span->recordException($e);
            $span->setStatus(StatusCode::STATUS_ERROR);

            if ($request->getRequestFormat() === 'json') {

                return $this->json([
                    'error' => $e->getMessage(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return $this->redirectToRoute('app_checkout_failed', [
                'id' => $order->getId(),
            ]);
        }

        Metrics::recordOrder($order, true);
        $span->setStatus(StatusCode::STATUS_OK);

        $this->logger->info('Order placed', [
            'order' => $order->getId(),
            'total' => $order->getTotal(),
        ]);

        if ($request->getRequestFormat() === 'json') {

            return $this->json([
                'success' => true,
            ]);
        }

        return $this->redirectToRoute('app_checkout_success', [
            'id' => $order->getId(),
        ]);
    }

    #[Route('/checkout/{id}/failed', name: 'app_checkout_failed')]
    public function failed(Order $order): Response {
        Span::getCurrent()->setStatus(StatusCode::STATUS_ERROR);

        return $this->render('checkout/failed.html.twig', [
            'order' => $order,
        ], new Response('', Response::HTTP_BAD_REQUEST));
    }

    #[Route('/checkout/{id}/success', name: 'app_checkout_success')]
    public function success(Order $order): Response {

        return $this->render('checkout/success.html.twig', [
            'order' => $order,
        ]);
    }
}
