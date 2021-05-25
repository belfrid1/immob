<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        
        for ($count = 0; $count < 20; $count++) {
            $user = new User();
            $user->setLogin("Login " . $count);
            $user->setPrenom("nom" . $count);
            $user->setPrenom("Prenom" . $count);
            
            $password = $this->encoder->encodePassword($user, 'password');
            $user->setPassword($password);
            $manager->persist($user);
        }   
       
        $manager->flush();
    }
}
