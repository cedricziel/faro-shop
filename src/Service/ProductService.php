<?php

namespace App\Service;

use App\Repository\ProductRepository;
use OpenTelemetry\API\Instrumentation\WithSpan;
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
            $redisSpan->addEvent('cache.stale');
            $redisSpan->addEvent('cache.refresh.start');
            $products = $this->productRepository->findAll();

            // Simulate a slow cache refresh
            sleep(1);

            $redisSpan->addEvent('cache.refresh.end');
        } else {
            $redisSpan->addEvent('cache.hit');

            $products = $this->productRepository->findAll();
        }

        $redisSpan->end();

        return $products;
    }
}
