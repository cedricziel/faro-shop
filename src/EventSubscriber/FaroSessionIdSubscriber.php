<?php

namespace App\EventSubscriber;

use OpenTelemetry\API\Trace\Span;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class FaroSessionIdSubscriber implements EventSubscriberInterface
{
    public function onKernelRequest(RequestEvent $event): void
    {
        $rootSpan = Span::getCurrent();

        $faroSession = $event->getRequest()->headers->get('x-faro-session', '');
        if ($faroSession !== '') {
            $rootSpan->setAttribute('session.id', $faroSession);
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
        ];
    }
}
