<?php

namespace App\Controller;

use App\Entity\Order;
use App\O11y\Metrics;
use App\Service\CheckoutService;
use Doctrine\ORM\EntityManagerInterface;
use OpenTelemetry\API\Globals;
use OpenTelemetry\API\Trace\Span;
use OpenTelemetry\API\Trace\StatusCode;
use OpenTelemetry\SemConv\TraceAttributes;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function index(Order $order): Response
    {
        try {
            $this->checkoutService->checkout($order);
        } catch (\Exception $e) {
            $this->logger->error('Checkout failed', [
                'order' => $order->getId(),
                'total' => $order->getTotal(),
                'error' => $e->getMessage(),
            ]);

            return $this->redirectToRoute('app_checkout_failed', [
                'id' => $order->getId(),
            ]);
        }



        $span = Span::getCurrent()->setAttributes([
            'app.order.id' => $order->getId(),
            'app.order.total' => $order->getTotal(),
        ]);

        if ($order->getStatus() === Order::STATUS_FAILED) {
            $span
                ->setStatus(StatusCode::STATUS_ERROR)
                ->setAttributes([
                    TraceAttributes::ERROR_TYPE => 'order',
                    'error.message' => 'Order failed',
                ])
            ;

            Metrics::recordOrder($order, false);

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

        return $this->redirectToRoute('app_checkout_success', [
            'id' => $order->getId(),
        ]);
    }

    #[Route('/checkout/{id}/failed', name: 'app_checkout_failed')]
    public function failed(Order $order): Response {

        return $this->render('checkout/failed.html.twig', [
            'order' => $order,
        ]);
    }

    #[Route('/checkout/{id}/success', name: 'app_checkout_success')]
    public function success(Order $order): Response {

        return $this->render('checkout/success.html.twig', [
            'order' => $order,
        ]);
    }
}
