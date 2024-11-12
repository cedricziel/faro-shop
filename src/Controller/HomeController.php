<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use OpenTelemetry\API\Trace\TracerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(private TracerInterface $tracer)
    {
    }

    #[Route('/', name: 'home')]
    public function index(ProductRepository $productRepository): Response
    {
        // 5 minutes after the full hour, and 5 minutes after the half hour, slow down requests for demo purposes
        $currentMinute = (int)date('i');
        if (($currentMinute >= 0 && $currentMinute <= 5) || ($currentMinute >= 30 && $currentMinute <= 35)) {
            $span = $this->tracer->spanBuilder('cache.refresh')
                ->startSpan();

            $span->addEvent('cache.refresh.start');
            sleep(1);
            $span->addEvent('cache.refresh.end');

            $span->end();
        }

        return $this->render('home/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }
}
