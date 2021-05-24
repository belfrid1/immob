<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Ville;

class VilleFixtures extends Fixture
{
    
    public const VILLE_REFERENCE = 'Paris';
    public function load(ObjectManager $manager)
    {
        // creation ville fixtures
        for ($count = 1; $count < 2; $count++) {
            $ville = new Ville();
            $ville->setNom("ville" . $count);
            $ville->setPays($this->getReference(PaysFixtures::PAYS_REFERENCE));
            $this->addReference(self::VILLE_REFERENCE, $ville);
            $manager->persist($ville);
        } 
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            PaysFixtures::class,
        ];
    }
}
