<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $product
            ->setName("Faros")
            ->setDescription("Foo Bar")
            ->setPrice(9.99)
        ;
        $manager->persist($product);

        $manager->flush();
    }
}
