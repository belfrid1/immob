<?php

namespace App\DataFixtures;

use App\Entity\Bien;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BienFixtures extends Fixture implements DependentFixtureInterface
{
    
    

    public function load(ObjectManager $manager)
    {
        // creation bien  fixtures
        $faker = Factory::create();
        $biens = [];
        for ($count = 0; $count < 30; $count++) {
            $bien = new Bien();
            $bien->setNom("nomBien" . $count);
            $bien->setSurface("25 m2");
            $bien->setPiece("4". $count);
            
            $bien->setProprietaire($this->getReference(ProprietaireFixtures::PROPRIETAIRE_REFERENCE));
            $bien->setVille($this->getReference(VilleFixtures::VILLE_REFERENCE));
            $bien->setTranche($this->getReference(TrancheFixtures::TRANCHE_REFERENCE));
            $bien->setEtat($this->getReference(EtatFixtures::ETAT_REFERENCE));
            $bien->setTypeBien($this->getReference(TypeBienFixtures::TYPEBIEN_REFERENCE));
            
            $manager->persist($bien);
            $biens[] = $bien;
        } 
        $manager->flush();
        $this->addReference('BIEN',$biens[$faker->numberBetween(0,29)]);
    }
    public function getDependencies()
    {
        return [
            ProprietaireFixtures::class,
            TrancheFixtures::class,
            EtatFixtures::class,
            TypeBienFixtures::class,
            VilleFixtures::class,
        ];
    }
}
