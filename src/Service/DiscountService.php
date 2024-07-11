<?php

namespace App\Service;

use App\Entity\Order;
use OpenTelemetry\API\Trace\TracerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

readonly class DiscountService
{
    public function __construct(
        private LoggerInterface $logger,
        private TracerInterface $tracer,
        private RequestStack $requestStack,
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

        if ($country = $this->requestStack->getCurrentRequest()?->attributes->get('geo.country')) {
            // if country is br, in or cn, add a delay
            if (in_array($country, ['br', 'in', 'jp'])) {
                sleep(1);
            }
        }


        $span->addEvent('Discount calculated');

        $span->setAttribute('app.discount', $discount);
        $this->logger->info('Discount calculated: ' . $discount);

        $span->end();

        return $discount;
    }
}
