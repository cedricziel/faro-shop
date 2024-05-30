<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->getLighthouses() as $lighthouse) {
            $product = new Product();
            $product
                ->setName($lighthouse['name'])
                ->setDescription($lighthouse['description'])
                ->setImage($lighthouse['image'])
                ->setPrice($lighthouse['price'])
            ;

            $manager->persist($product);
        }

        $manager->flush();
    }

    protected function getLighthouses(): array
    {
        return [
            [
                'name' => 'Île Vierge Lighthouse',
                'description' => <<<EOT
Île Vierge (Breton language: Enez-Werc'h) is a 6-hectare (15-acre)[1] islet lying 1.5 kilometres (3⁄4 nautical mile) off the north-west coast of Brittany, opposite the village of Lilia.[2] It is in the commune of Plouguerneau, in the département of Finistère.[2] It is the location of the tallest stone lighthouse in Europe,[2][3] and the tallest "traditional lighthouse" in the world.[4] The International Hydrographic Organization specifies Île Vierge as marking the south-western limit of the English Channel.[5]
EOT,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/6/62/Breizh-122.JPG',
                'price' => 18.99,
            ],
            [
                'name' => 'La Jument',
                'description' => <<<EOT
La Jument is the name of a lighthouse at the Northwestern part of France, Brittany. The lighthouse is built on a rock (that is also called La Jument) about 300 metres from the coast of the island of Ushant, which marks the north-westernmost point of metropolitan France. The lighthouse was built at the request of the Maritime Administration of Finistère in order to secure the most dangerous shallow off Ushant, the "Raz de Sein".[1] The construction of the lighthouse began in 1904 and was finished in 1911. The lighthouse is 47 metres high, and its light is visible from 25 nautical miles (46 km; 29 mi). It is automated, and closed to the public.
EOT,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/0/03/Breizh-176.JPG',
                'price' => 6.89,
            ],
            [
                'name' => 'Phare du Petit Minou',
                'description' => <<<EOT
The Phare du Petit Minou (Petit Minou lighthouse) is a lighthouse in the roadstead of Brest, standing in front of the Fort du Petit Minou, in the commune of Plouzané. It is located at the north-western entrance of the Goulet de Brest, in the département of Finistère, France. It is a maritime and land signal marking the passage of the Goulet, the strait between Brest and the Crozon peninsula. It is also a coastal lighthouse, marking the western entrance of the roadstead of Brest and the eastern limit of the Iroise Sea. It is one of the most powerful lighthouses in the world, with a theoretical range of 32 nautical miles (59 km; 37 mi), and a real range of 22 nautical miles (41 km; 25 mi).
EOT,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/8/8c/Phare_petit_minou_600x800.JPG',
                'price' => 9.99,
            ],
            [
                'name' => 'Phare de la Vieille',
                'description' => <<<EOT
The Phare de la Vieille is a lighthouse in the département of Finistère at the commune of Plogoff, on the northwest coast of France. It lies on the rock known as Gorlebella (Breton for "farthest rock"), guiding mariners in the strait Raz de Sein, across from the companion lighthouse of Tévennec. It is among the small class of lighthouses said to be inhabited, with a team of four lightkeepers flown in by helicopter for month-long tours of duty. The lighthouse is closed to the public.
EOT,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/f/f8/Phare_de_la_vieille.jpg',
                'price' => 199.10,
            ],
            [
                'name' => 'Phare de Tévennec',
                'description' => <<<EOT
The Phare de Tévennec is a lighthouse located on the island of Tévennec in the département of Finistère at the commune of Plogoff on the northwest coast of France. It lies in the strait Raz de Sein, opposite the companion lighthouse of La Vieille. It is among the small class of lighthouses said to be inhabited, with a team of four lightkeepers flown in by helicopter for month-long tours of duty. The lighthouse is closed to the public.
EOT,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/5/5a/Tevennec-ciel-web.jpg',
                'price' => 2000.88,
            ],
            [
                'name' => 'Phare de Kéréon',
                'description' => <<<EOT
The Phare de Kéréon is a lighthouse in the Iroise Sea, off the coast of Brittany in France. It is in the commune of Le Conquet, Finistère. It lies on the Chaussée de Sein, a dangerous reef stretching west from Brittany, which is marked by a series of lighthouses and beacons. It is among the small class of lighthouses said to be inhabited, with a team of four lightkeepers flown in by helicopter for month-long tours of duty. The lighthouse is closed to the public.
EOT,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Kereon_from_Ouessant.jpg',
                'price' => 6.56,
            ],
            [
                'name' => 'Phare de l\'île de Batz',
                'description' => <<<EOT
The Phare de l'île de Batz is a lighthouse located on the island of Batz in the département of Finistère at the commune of Roscoff on the northwest coast of France. It lies in the strait of the Chenal du Four, which connects the English Channel with the Bay of Biscay. It is among the small class of lighthouses said to be inhabited, with a team of four lightkeepers flown in by helicopter for month-long tours of duty. The lighthouse is closed to the public.
EOT,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/1/18/%C3%8Ele-de-Batz_le_Phare_3_2021.jpg',
                'price' => 42.99,
            ],
            [
                'name' => 'Phare de l\'île Vierge',
                'description' => <<<EOT
The Phare de l'île Vierge is a lighthouse in Plouguerneau, Finistère department, in Brittany, France. At a height of 82.5 metres (271 ft) it is one of the tallest in the world. It is located on the north coast of Brittany, in the commune of Plouguerneau, on the small islet of L'Île Vierge, 1.5 kilometres (0.9 mi) north-east of the village of Lilia, which marks the north-western limit of the English Channel. It is the tallest traditional lighthouse in the world, as opposed to the tallest building which happens to be a lighthouse, which is the Jeddah Light in Saudi Arabia. It is also the most powerful lighthouse in Europe, with a light of 6,000,000 candelas, with a range of 27 nautical miles (50 km; 31 mi). It is fully automated, and closed to the public, although the lighthouse itself is visible from the coast of Brittany.
EOT,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/48/Phare_de_l%27%C3%8Ele_Vierge_%28lighthouse%29_%2814868828151%29.jpg',
                'price' => 9.99,
            ]
        ];
    }
}
