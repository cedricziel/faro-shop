<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findAdvertised(int $amount = 3): array
    {
        $threshold = 10;
        // set threshold to 'test' every 30 minutes at the top of the hour and 30 minutes past the hour
        if ((getenv('APP_ENV') == 'dev' || getenv('APP_ENV') == 'prod') && date('i') % 30 === 0) {
            $threshold = 'test';
        }

        return $this->createQueryBuilder('p')
            ->andWhere('p.price < :price')
            ->setParameter('price', $threshold)
            ->setMaxResults($amount)
            ->getQuery()
            ->getResult();
    }

    public function findRelated(Product $product, int $amount): array
    {
        if ($product->getName() === 'Phare du Petit Minou') {
            throw HttpException::fromStatusCode(Response::HTTP_BAD_REQUEST, 'DatabaseConnectionException: Connection to the database failed.');
        }

        return $this->createQueryBuilder('p')
            ->andWhere('p.id != :id')
            ->setParameter('id', $product->getId())
            ->setMaxResults($amount)
            ->getQuery()
            ->getResult();
    }
}
