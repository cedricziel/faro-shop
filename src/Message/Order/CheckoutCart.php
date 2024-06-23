<?php

namespace App\Message\Order;

final class CheckoutCart
{
    public function __construct(
        public readonly string $orderId,
    )
    {
    }
}
