<?php

namespace App\DataFixtures;

use App\Entity\Pays;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class PaysFixtures extends Fixture 
{
    public const PAYS_REFERENCE = 'France';

    public function load(ObjectManager $manager)
    {
        // creation pays fixtures
        $pays = new Pays();
        $pays->setNom('France');
        $manager->persist($pays);
        $manager->flush();
        $this->addReference(self::PAYS_REFERENCE, $pays);
    }
}
