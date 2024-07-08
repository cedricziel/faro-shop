<?php

namespace App\Service;

use App\Entity\Order;
use OpenTelemetry\API\Trace\TracerInterface;
use Psr\Log\LoggerInterface;

readonly class DiscountService
{
    public function __construct(
        private LoggerInterface $logger,
        private TracerInterface $tracer,
    ){
    }

    public function calculateDiscount(Order $order): int
    {
        $this->logger->info('Calculating discount for order: ' . $order->getId());
        $span = $this->tracer->spanBuilder('DiscountService.calculateDiscount')
            ->startSpan()
            ->setAttribute('app.order.id', $order->getId())
            ->addEvent('Calculating discount');

        $discount = 0;
        if ($order->getTotal() > 100) {
            $discount = 10;
        }

        sleep(1);

        $span->addEvent('Discount calculated');

        $span->setAttribute('app.discount', $discount);
        $this->logger->info('Discount calculated: ' . $discount);

        $span->end();
    }
}
