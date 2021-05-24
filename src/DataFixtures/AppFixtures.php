<?php

namespace App\DataFixtures;

use App\Entity\Annonce;
use App\Entity\Bien;
use App\Entity\Etat;
use App\Entity\Image;
use App\Entity\Pays;
use App\Entity\Proprietaire;
use App\Entity\Tranche;
use App\Entity\TypeBien;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Ville;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         // creation annonces fixtures
        $annonces = [];
        for ($count = 0; $count < 30; $count++) {
            $annonce = new Annonce();
            $annonce->setLibelleType("annonce" . $count);
            $annonce->setBien($this->getReference(BienFixtures::BIEN_REFERENCE));
            $this->addReference(self::ANNONCE_REFERENCE, $annonce);
            $manager->persist($annonce);
            $annonces[] =  $annonce;
             
        } 


        // creation bien  fixtures
        $biens = [];
        for ($count = 0; $count < 30; $count++) {
            $bien = new Bien();
            $bien->setNom("nomBien" . $count);
            $bien->setSurface("25 m2");
            $bien->setPiece("4");
            
            $bien->setProprietaire($this->getReference(ProprietaireFixtures::PROPRIETAIRE_REFERENCE));
            $bien->setVille($this->getReference(VilleFixtures::VILLE_REFERENCE));
            $bien->setTranche($this->getReference(TrancheFixtures::TRANCHE_REFERENCE));
            $bien->setEtat($this->getReference(EtatFixtures::ETAT_REFERENCE));
            $bien->setTypeBien($this->getReference(TypeBienFixtures::TYPEBIEN_REFERENCE));
            
            $manager->persist($bien);
            $biens[] = $bien;
        } 


        // creation contrat  fixtures
        $contrat = new Contrat();
        $contrat->setNumero('0001');
        $contrat->setDateSignature(new \DateTime('now'));
        $manager->persist($contrat);  
       
        
        // creation etat  fixtures
        $etat = new Etat();
        $etat->setLibelleEtat('BV');
        $etat->setLibelleEtat('Vendu');
        $this->addReference(self::ETAT_REFERENCE, $etat);
        $manager->persist($etat);  


        // creation images  fixtures
        $images = [];
        for ($count = 1; $count < 3; $count++) {
            $image = new Image();
            $image->setNom('image'.$count.'.png');
            $image->setChemin('public/image/image'.$count.'.png');
            $image->setBien($this->getReference(BienFixtures::BIEN_REFERENCE));
            $manager->persist($image);  
            $images[] = $image;
        }

        // creation pays fixtures
        $pays = new Pays();
        $pays->setNom('France');
        $this->addReference(self::PAYS_REFERENCE, $pays);
        $manager->persist($pays);


        // creation pays fixtures
        $proprietaire = new Proprietaire();
        $proprietaire->setNom('Doe');
        $proprietaire->setPrenom('Dupont');
        $proprietaire->setAdresse('15 Rue paris');  
        $proprietaire->setTelephone('33 06 545025'); 
        $this->addReference(self::PROPRIETAIRE_REFERENCE, $proprietaire);     
        $manager->persist($proprietaire);  

        // creation tranches fixtures
        $tranche = new Tranche();
        $tranche->setPrixMin(2000);
        $tranche->setPrixMax(4000);
        $this->addReference(self::TRANCHE_REFERENCE, $tranche);
        $manager->persist($tranche);

        // creation type du bien  fixtures
        $typebien = new TypeBien();
        $typebien->setLibelle('villa');
        $this->addReference(self::TYPEBIEN_REFERENCE, $typebien);
        $manager->persist($typebien);

        // creation user   fixtures
        $users = [];
        for ($count = 0; $count < 20; $count++) {
            $user = new User();
            $user->setLogin("Login " . $count);
            $user->setPrenom("nom" . $count);
            $user->setPrenom("Prenom" . $count);
            $password = $this->encoder->encodePassword($user, 'password');
            $user->setPassword($password);
            $manager->persist($user);
            $users[] = $user;
        } 

        // creation ville fixtures
        $villes = [];
        for ($count = 1; $count < 2; $count++) {
            $ville = new Ville();
            $ville->setNom("ville" . $count);
            $ville->setPays($this->getReference(PaysFixtures::PAYS_REFERENCE));
            $this->addReference(self::VILLE_REFERENCE, $ville);
            $manager->persist($ville);
            $villes[] = $ville;
        } 

        $manager->flush();
    }
}
