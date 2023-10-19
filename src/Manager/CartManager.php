<?php

namespace App\Manager;

use App\Entity\Order;
use App\Factory\OrderFactory;
use App\Storage\CartSessionStorage;
use Doctrine\ORM\EntityManagerInterface;
use OpenTelemetry\API\Globals;
use OpenTelemetry\API\Trace\TracerInterface;
use Psr\Log\LoggerInterface;

/**
 * Class CartManager
 * @package App\Manager
 */
class CartManager
{
    /**
     * @var CartSessionStorage
     */
    private CartSessionStorage $cartSessionStorage;

    /**
     * @var OrderFactory
     */
    private OrderFactory $cartFactory;

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;
    private LoggerInterface $logger;
    private TracerInterface $tracer;

    public function __construct(
        CartSessionStorage $cartStorage,
        OrderFactory $orderFactory,
        EntityManagerInterface $entityManager,
        LoggerInterface $logger,
    ) {
        $this->cartSessionStorage = $cartStorage;
        $this->cartFactory = $orderFactory;
        $this->entityManager = $entityManager;
        $this->logger = $logger;
        $this->tracer = Globals::tracerProvider()->getTracer(static::class);
    }

    /**
     * Gets the current cart.
     *
     * @return Order
     */
    public function getCurrentCart(): Order
    {
        $span = $this
            ->tracer
            ->spanBuilder(static::class . '::getCurrentCart')
            ->startSpan();

        $cart = $this->cartSessionStorage->getCart();

        if (!$cart) {
            $cart = $this->cartFactory->create();
        }

        $span->end();

        return $cart;
    }

    /**
     * Persists the cart in database and session.
     *
     * @param Order $cart
     */
    public function save(Order $cart): void
    {
        $span = $this
            ->tracer
            ->spanBuilder(static::class . '::save')
            ->startSpan();

        $this->logger->info(sprintf('Saving cart to database %s', $cart->getStatus()));

        // Persist in database
        $this->entityManager->persist($cart);
        $this->entityManager->flush();

        $this->logger->info(sprintf('Saved cart to database %s', $cart->getId()));

        // Persist in session
        $this->cartSessionStorage->setCart($cart);

        $span->end();
    }
}
