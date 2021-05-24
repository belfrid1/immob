<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Annonce;

class AnnoncesFixtures extends Fixture
{
    public const ANNONCE_REFERENCE = 'annonce1';
    public function load(ObjectManager $manager)
    {
        
        // $product = new Product();
        // $manager->persist($product);
        $annonces = [];
        for ($count = 0; $count < 30; $count++) {
            $annonce = new Annonce();
            $annonce->setLibelleType("annonce" . $count);
            $annonce->setBien($this->getReference(BienFixtures::BIEN_REFERENCE));
            $this->addReference(self::ANNONCE_REFERENCE, $annonce);
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
