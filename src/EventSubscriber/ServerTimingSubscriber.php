<?php

namespace App\EventSubscriber;

use OpenTelemetry\API\Trace\Span;
use OpenTelemetry\API\Trace\SpanContext;
use OpenTelemetry\API\Trace\SpanInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ServerTimingSubscriber implements EventSubscriberInterface
{
    private ?SpanContext $rootContext = null;

    public function onKernelRequest(RequestEvent $event): void
    {
        $rootSpan = Span::getCurrent();
        $this->rootContext = $rootSpan->getContext();

        $faroSession = $event->getRequest()->headers->get('x-faro-session', '');
        if ($faroSession !== '') {
            $rootSpan->setAttribute('faro.session.id', $faroSession);
        }
    }

    public function onKernelResponse(ResponseEvent $event): void
    {
        if ($this->rootContext === null) {
            return;
        }

        $currentResponse = $event->getResponse();
        $currentResponse->headers->set('Server-Timing', $this->getServerTimingHeader($this->rootContext));

        $event->setResponse($currentResponse);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
            KernelEvents::RESPONSE => 'onKernelResponse',
        ];
    }

    private function getServerTimingHeader(SpanContext $rootContext): string
    {
        return sprintf(
            'traceparent;desc="00-%s-%s-%s-%s"',
            $rootContext->getTraceId(),
            $rootContext->getSpanId(),
            $rootContext->isSampled() ? '01' : '00',
            $rootContext->isSampled() ? '01' : '00'
        );
    }
}
