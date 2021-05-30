<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Annonce;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AnnoncesFixtures extends Fixture implements DependentFixtureInterface
{
    public const ANNONCE_REFERENCE = 'annonce1';
    
   
    public function load(ObjectManager $manager)
    {
        
        // $product = new Product();
        // $manager->persist($product);
        $annonces = [];
        for ($count = 0; $count < 10; $count++) {
            $annonce = new Annonce();

            $annonce->setLibelleType("annonce" . $count);
            $annonce->setBien($this->getReference('BIEN'));
            $manager->persist($annonce);
            $annonces[] =  $annonce;             
        } 

        $manager->flush();
        $this->addReference(self::ANNONCE_REFERENCE, $annonce);
    }
    public function getDependencies()
    {
        return [
            BienFixtures::class,
        ];
    }
}
