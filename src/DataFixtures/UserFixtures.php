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
            $user = new User();
            $user->setLogin("admin");
            $user->setRoles(["ROLE_ADMIN"]);
            $user->setNom("ZOUNON");
            $user->setPrenom("Auriane");
            $user->setEmail('Auriane@immob.com');
            $password = $this->encoder->encodePassword($user, 'password');
            $user->setPassword($password);
            $manager->persist($user);
        $manager->flush();
    }
}
