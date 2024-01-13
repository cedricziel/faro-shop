<?php

namespace App\Controller;

use App\Entity\Order;
use App\O11y\Metrics;
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
    ) {
    }

    #[Route('/checkout/{id}', name: 'app_checkout')]
    public function index(Order $order): Response
    {
        $order->setStatus(random_int(1, 2) == 1 ? Order::STATUS_CHECKOUT : Order::STATUS_FAILED);
        $this->entityManager->persist($order);
        $this->entityManager->flush();

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

        return $this->render('checkout/success.html.twig');
    }

    #[Route('/checkout/{id}/failed', name: 'app_checkout_failed')]
    public function failed(Order $order): Response {

        return $this->render('checkout/failed.html.twig', [
            'order' => $order,
        ]);
    }
}
