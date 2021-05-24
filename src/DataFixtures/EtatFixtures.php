<?php

namespace App\DataFixtures;

use App\Entity\Etat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtatFixtures extends Fixture
{
    public const ETAT_REFERENCE = 'vendu';
    public function load(ObjectManager $manager)
    {
        $etat = new Etat();
        $etat->setLibelleEtat('BV');
        $etat->setLibelleEtat('Vendu');
        $this->addReference(self::ETAT_REFERENCE, $etat);
        $manager->persist($etat);  
       
        $manager->flush();
    }
}