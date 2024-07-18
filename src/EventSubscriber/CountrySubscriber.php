<?php

namespace App\EventSubscriber;

use OpenTelemetry\API\Trace\Span;
use OpenTelemetry\API\Trace\StatusCode;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\KernelEvents;

class CountrySubscriber implements EventSubscriberInterface
{
    private $countries = [
        'us' => 'United States',
        'de' => 'Germany',
        'fr' => 'France',
        'es' => 'Spain',
        'it' => 'Italy',
        'uk' => 'United Kingdom',
        'jp' => 'Japan',
        'cn' => 'China',
        'in' => 'India',
        'br' => 'Brazil',
    ];

    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly RequestStack $requestStack,
        private string $env,
    ){
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if ($event->getRequest()->getPathInfo() == '/health') {
            $this->logger->info('Skipping health check');

            return;
        }

        /** @var Span $rootSpan */
        $rootSpan = Span::getCurrent();

        $session = $this->requestStack->getSession();
        $this->logger->info('Session ID: ' . $session->getId());
        if ($session->has('session.id')) {
            $rootSpan->setAttribute('session.id', $session->getId());
        }

        // random country
        $country = array_rand($this->countries);
        if ($session->has('country')) {
            $country = $session->get('country');
        } else {
            $session->set('country', $country);
        }
        $event->getRequest()->attributes->set('geo.country', $country);
        $rootSpan->setAttribute('geo.country', $this->countries[$country]);
        $this->logger->info('Country: ' . $this->countries[$country]);

        // if country is cn, throw an exception
        if ($this->env === 'prod' && $country === 'cn') {
            $exception = new HttpException(403, 'China is not allowed');
            $rootSpan->recordException($exception);
            $rootSpan->setStatus(StatusCode::STATUS_ERROR, 'China is not allowed');

            throw $exception;
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
        ];
    }
}
