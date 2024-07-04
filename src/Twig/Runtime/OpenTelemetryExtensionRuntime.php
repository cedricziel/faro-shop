<?php

namespace App\Twig\Runtime;

use OpenTelemetry\API\Trace\Span;
use OpenTelemetry\API\Trace\TracerInterface;
use Twig\Extension\RuntimeExtensionInterface;

class OpenTelemetryExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct(private TracerInterface $tracer)
    {
    }

    public function getTraceId()
    {
        return Span::getCurrent()->getContext()->getTraceId();
    }

    public function getSpanId()
    {
        return Span::getCurrent()->getContext()->getSpanId();
    }
}
