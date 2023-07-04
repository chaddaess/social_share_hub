<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture implements FixtureGroupInterface
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {

        $user = new User();
        $user->setEmail("dummyUser1@gmail.com");
        $user->setPassword($this->hasher->hashPassword($user, '1234'));
        $manager->persist($user);
        $manager->flush();

        $admin1 = new User();
        $user->setEmail("admin1@gmail.com");
        $admin1->setRoles(["ROLE_ADMIN"]);
        $admin1->setPassword($this->hasher->hashPassword($admin1, 'admin'));
        $manager->persist($admin1);
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['user'];
    }
}
