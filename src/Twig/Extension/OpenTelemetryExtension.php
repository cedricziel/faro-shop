<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\OpenTelemetryExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class OpenTelemetryExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('trace_id', [OpenTelemetryExtensionRuntime::class, 'getTraceId']),
            new TwigFunction('span_id', [OpenTelemetryExtensionRuntime::class, 'getSpanId']),
        ];
    }
}
