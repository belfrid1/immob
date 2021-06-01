<?php

namespace App\DataFixtures;

use App\Entity\Contrat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContratFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $contrat = new Contrat();
        $contrat->setNumero('0001');
        $contrat->setDateSignature(new \DateTime('now'));
        $manager->persist($contrat);  
       
        $manager->flush();
    }
}
