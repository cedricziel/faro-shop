<?php

namespace App\Service;

use App\Repository\ProductRepository;
use OpenTelemetry\API\Instrumentation\WithSpan;
use OpenTelemetry\API\Trace\SpanKind;
use OpenTelemetry\API\Trace\StatusCode;
use OpenTelemetry\API\Trace\TracerInterface;

class ProductService
{
    public function __construct(
        private ProductRepository $productRepository,
        private TracerInterface $tracer,
    ){
    }

    #[WithSpan("ProductService::findAll")]
    public function findAll()
    {
        $redisSpan = $this->tracer->spanBuilder('GET products')
            ->setSpanKind(SpanKind::KIND_CLIENT)
            ->setAttributes([
                'db.system' => 'redis',
                'db.statement' => 'GET products',
                'db.namespace' => 1,
                'db.operation.name' => 'GET',
                'server.port' => 6379,
                'peer.service' => 'productcache',
            ])
            ->startSpan();

        // 5 minutes after the full hour, and 5 minutes after the half hour, slow down requests for demo purposes
        $currentMinute = (int)date('i');
        if (($currentMinute >= 0 && $currentMinute <= 5) || ($currentMinute >= 30 && $currentMinute <= 35)) {
            $redisSpan->recordException(new \Exception('Cache server is slow'));
            $redisSpan->setStatus(StatusCode::STATUS_ERROR, 'Cache server is slow');

            $redisSpan->addEvent('cache.stale');
            $redisSpan->addEvent('cache.refresh.start');
            $redisSpan->end();

            $products = $this->productRepository->findAll();

            // Simulate a slow cache refresh
            sleep(1);

            $redisSpan->addEvent('cache.refresh.end');
        } else {
            $redisSpan->addEvent('cache.hit');
            $redisSpan->end();

            $products = $this->productRepository->findAll();
        }



        return $products;
    }
}
