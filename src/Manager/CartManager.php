<?php

namespace App\Manager;

use App\Entity\Order;
use App\Factory\OrderFactory;
use App\Storage\CartSessionStorage;
use DateTime;
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
        try {
            $span = $this
                ->tracer
                ->spanBuilder(static::class . '::save')
                ->startSpan();

            $this->logger->info(sprintf('Saving cart to database %s', $cart->getStatus()));

            if ($this->should_fail()) {
                $span->recordException(new \Exception(''));
                $this->logger->error('Simulated failure');
                throw new \Exception('Simulated failure');
            }

            // Persist in database
            $this->entityManager->persist($cart);
            $this->entityManager->flush();

            $this->logger->info(sprintf('Saved cart to database %s', $cart->getId()));

            // Persist in session
            $this->cartSessionStorage->setCart($cart);

            $span->end();
        } catch (\Exception $e) {
            $this->logger->error(sprintf('Unable to save cart: %s', $e->getMessage()), ['exception' => $e]);
            $span->end();

            throw $e;
        }
    }

    private function should_fail(): bool
    {
        // dont fail in dev & test
        if (getenv('APP_ENV') == 'dev' || getenv('APP_ENV') == 'test') {
            return false;
        }

        $apcuKey = 'demo_start_time';
        $resetMinute = 30; // Reset 10 minutes after the full hour

        // Get the current time
        $now = new DateTime();
        $currentMinute = (int) $now->format('i');

        // Check if stored start time exists
        $startTime = apcu_fetch($apcuKey);

        // Reset logic: if it's 10 minutes past the hour, reset the stored value
        if ($currentMinute >= $resetMinute) {
            apcu_delete($apcuKey);
            $startTime = false;
        }

        // If no start time exists, generate and store it
        if ($startTime === false) {
            $startTime = 50 + rand(0, 15);
            apcu_store($apcuKey, $startTime);
        }

        // Failure condition: should fail if the current minute is >= the stored start time
        $shouldFail = $currentMinute >= $startTime;
        if ($shouldFail) {
            sleep(5);
        }

        return $shouldFail;
    }
}
