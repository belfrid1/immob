<?php

namespace App\DataFixtures;

use App\Entity\Tranche;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class TrancheFixtures extends Fixture
{
    public const TRANCHE_REFERENCE = 'tranche 1';
    public function load(ObjectManager $manager)
    {
        // creation tranches fixtures
        $tranche = new Tranche();
        $tranche->setPrixMin(2000);
        $tranche->setPrixMax(4000);
        $this->addReference(self::TRANCHE_REFERENCE, $tranche);
        $manager->persist($tranche);

        $manager->flush();
    }
}
