<?php

namespace App\Service;

use App\Entity\Order;
use App\Message\Order\CheckoutCart;
use Doctrine\ORM\EntityManagerInterface;
use OpenTelemetry\API\Trace\SpanKind;
use OpenTelemetry\API\Trace\StatusCode;
use OpenTelemetry\API\Trace\TracerInterface;
use OpenTelemetry\SemConv\TraceAttributes;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class CheckoutService
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly LoggerInterface $logger,
        private readonly TracerInterface $tracer,
        private readonly MessageBusInterface $messageBus,
    ) {
    }

    public function checkout(Order $order): bool
    {
        $span = $this->tracer
            ->spanBuilder('CheckoutService.checkout')
            ->startSpan();

        try {
            $this->doCheckout($order);
        } catch (\Exception $e) {
            $span->setStatus(StatusCode::STATUS_ERROR);
            $span->recordException($e);

            throw $e;
        } finally {
            $this->entityManager->persist($order);
            $this->entityManager->flush();

            $span->end();
        }

        return true;
    }

    private function doCheckout(Order $order): void {
        try {
            // fake call to payment gateway in tracing
            $span = $this->tracer
                ->spanBuilder('POST /checkout')
                ->setSpanKind(SpanKind::KIND_CLIENT)
                ->setAttributes([
                    TraceAttributes::HTTP_REQUEST_METHOD => 'POST',
                    TraceAttributes::HTTP_URL => 'https://payment-gateway.com/checkout',
                    TraceAttributes::PEER_SERVICE => 'payment-gateway.com',
                ])
                ->startSpan()
            ;

            sleep(0.3);

            $order->setStatus(random_int(1, 2) == 1 ? Order::STATUS_CHECKOUT : Order::STATUS_FAILED);

            if ($order->getStatus() === Order::STATUS_FAILED) {
                $span->setAttribute(TraceAttributes::HTTP_RESPONSE_STATUS_CODE, 502);

                $exception = new \Exception('Payment Gateway not reachable');
                $span->recordException($exception);
                $span->setStatus(StatusCode::STATUS_ERROR);

                throw $exception;
            } else {
                $this->messageBus->dispatch(new CheckoutCart($order->getId()));
                $span->setAttribute(TraceAttributes::HTTP_RESPONSE_STATUS_CODE, 201);
            }
        } finally {
            $span->end();
        }
    }
}
