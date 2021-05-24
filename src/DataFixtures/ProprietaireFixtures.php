<?php

namespace App\DataFixtures;

use App\Entity\Proprietaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProprietaireFixtures extends Fixture
{
    public const PROPRIETAIRE_REFERENCE = 'Doe-Dupont';
    public function load(ObjectManager $manager)
    {
        $proprietaire = new Proprietaire();
        $proprietaire->setNom('Doe');
        $proprietaire->setPrenom('Dupont');
        $proprietaire->setAdresse('15 Rue paris');  
        $proprietaire->setTelephone('33 06 545025'); 
        $this->addReference(self::PROPRIETAIRE_REFERENCE, $proprietaire);     
        $manager->persist($proprietaire);  
       
        $manager->flush();
    }
}