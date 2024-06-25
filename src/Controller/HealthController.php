<?php

namespace App\Controller;

use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/health')]
class HealthController extends AbstractController
{
    public function __construct(private readonly Connection $connection)
    {
    }

    public function __invoke(): JsonResponse
    {
        try {
            $this->connection->connect();
            $this->connection->executeQuery('SELECT 1');
            return $this->json(['status' => 'ok']);
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
