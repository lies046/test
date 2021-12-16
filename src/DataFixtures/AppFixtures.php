<?php

namespace App\DataFixtures;

use App\Entity\Subject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i = 1; $i <= 20; $i++){
            $sub = new Subject();
            $sub->setTitle('test_'. $i);
            $manager->persist($sub);
            $manager->flush();
        }
    }
}
