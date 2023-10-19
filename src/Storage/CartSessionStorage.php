<?php

namespace App\Storage;

use App\Entity\Order;
use App\Repository\OrderRepository;
use OpenTelemetry\API\Globals;
use OpenTelemetry\API\Trace\TracerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartSessionStorage
{
    /**
     * The request stack.
     *
     * @var RequestStack
     */
    private RequestStack $requestStack;

    /**
     * The cart repository.
     *
     * @var OrderRepository
     */
    private OrderRepository $cartRepository;

    /**
     * @var string
     */
    const CART_KEY_NAME = 'cart_id';

    private TracerInterface $tracer;

    /**
     * CartSessionStorage constructor.
     *
     * @param RequestStack $requestStack
     * @param OrderRepository $cartRepository
     */
    public function __construct(
        RequestStack $requestStack,
        OrderRepository $cartRepository,
    )
    {
        $this->requestStack = $requestStack;
        $this->cartRepository = $cartRepository;
        $this->tracer = Globals::tracerProvider()->getTracer(static::class);;
    }

    /**
     * Gets the cart in session.
     *
     * @return Order|null
     */
    public function getCart(): ?Order
    {
        $span = $this
            ->tracer
            ->spanBuilder(static::class . '::getCart')
            ->startSpan();

        $cart = $this->cartRepository->findOneBy([
            'id' => $this->getCartId(),
            'status' => Order::STATUS_CART
        ]);

        $span->end();

        return $cart;
    }

    /**
     * Sets the cart in session.
     *
     * @param Order $cart
     */
    public function setCart(Order $cart): void
    {
        $span = $this
            ->tracer
            ->spanBuilder(static::class . '::setCart')
            ->startSpan();

        $this->getSession()->set(self::CART_KEY_NAME, $cart->getId());

        $span->end();
    }

    /**
     * Returns the cart id.
     *
     * @return int|null
     */
    private function getCartId(): ?int
    {
        $span = $this
            ->tracer
            ->spanBuilder(static::class . '::getCartId')
            ->startSpan();

        $cartId = $this->getSession()->get(self::CART_KEY_NAME);

        $span->end();

        return $cartId;
    }

    private function getSession(): SessionInterface
    {
        return $this->requestStack->getSession();
    }
}
