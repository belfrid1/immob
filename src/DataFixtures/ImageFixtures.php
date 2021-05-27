<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($count = 1; $count < 3; $count++) {
            $image = new Image();
            $image->setNom('image'.$count.'.png');
            $image->setChemin('public/image/image'.$count.'.png');
            $image->setBien($this->getReference('BIEN'));
            $manager->persist($image);  
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