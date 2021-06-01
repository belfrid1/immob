<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Annonce;
use App\Entity\Bien;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class AnnoncesFixtures extends Fixture implements DependentFixtureInterface
{
    // public const ANNONCE_REFERENCE = 'annonce1';
    
   
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        
        $annonces = [];
        for ($count = 0; $count < 30; $count++) {
            $annonce = new Annonce();

            $annonce->setLibelleType("annonce".$count);
            $annonce->setBien($this->getReference('Bien'.$count));
            // $annonce->setBien($this->getReference(Bien::FBIEN));
            
            $manager->persist($annonce);
            $annonces[] =  $annonce; 
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            BienFixtures::class,
        ];
    }
}
