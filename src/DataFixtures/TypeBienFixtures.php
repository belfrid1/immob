<?php

namespace App\DataFixtures;

use App\Entity\TypeBien;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeBienFixtures extends Fixture
{
    public const TYPEBIEN_REFERENCE = 'villa';
    public function load(ObjectManager $manager)
    {
        // creation type du bien  fixtures
        $typebien = new TypeBien();
        $typebien->setLibelle('villa');
        $this->addReference(self::TYPEBIEN_REFERENCE, $typebien);
        $manager->persist($typebien);

        $manager->flush();
    }
}
