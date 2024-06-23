<?php

namespace App\MessageHandler\Order;

use App\Message\Order\CheckoutCart;
use App\Repository\OrderRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class CheckoutCartHandler
{
    public function __construct(private readonly OrderRepository $orderRepository)
    {
    }

    public function __invoke(CheckoutCart $message): void
    {
        $order = $this->orderRepository->find($message->orderId);
    }
}
