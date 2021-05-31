<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        
        for ($count = 0; $count < 20; $count++) {
            $user = new User();
            $user->setLogin("Login " . $count);
            $user->setNom("nom" . $count);
            $user->setPrenom("Prenom" . $count);
            $user->setEmail('login'. $count .'@test.com');
            $password = $this->encoder->encodePassword($user, 'password');
            $user->setPassword($password);
            $manager->persist($user);
        }   
       
        $manager->flush();
    }
}
