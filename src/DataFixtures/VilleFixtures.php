<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Ville;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class VilleFixtures extends Fixture implements DependentFixtureInterface
{
    
    public const VILLE_REFERENCE = 'Paris';
    public function load(ObjectManager $manager)
    {
        // creation ville fixtures
        for ($count = 1; $count < 2; $count++) {
            $ville = new Ville();
            $ville->setNom("ville" . $count);
            $ville->setPays($this->getReference(PaysFixtures::PAYS_REFERENCE));
            
            $manager->persist($ville);
        } 
        $manager->flush();
        $this->addReference(self::VILLE_REFERENCE, $ville);
    }
    public function getDependencies()
    {
        return [
            PaysFixtures::class,
        ];
    }
}
