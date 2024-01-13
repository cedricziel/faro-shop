<?php

namespace App\O11y;

use App\Entity\Order;
use OpenTelemetry\API\Globals;
use OpenTelemetry\API\Metrics\CounterInterface;
use OpenTelemetry\API\Metrics\MeterInterface;

class Metrics
{
    private static ?MeterInterface $appMeter = null;

    public static function getAppMeter(): ?MeterInterface
    {
        if (self::$appMeter === null) {
            self::$appMeter = Globals::meterProvider()->getMeter('app');
        }

        return self::$appMeter;
    }

    public static function checkoutCounter(): CounterInterface
    {
        $appMeter = self::getAppMeter();

        return $appMeter->createCounter('app.checkout');
    }

    public static function recordOrder(Order $order, bool $success): void {
        $counter = self::checkoutCounter();

        $counter->add(1, [
            'order' => $order->getId(),
            'total' => $order->getTotal(),
            'success' => $success,
        ]);
    }
}
