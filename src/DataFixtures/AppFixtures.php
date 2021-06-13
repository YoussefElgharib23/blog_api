<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(
        UserPasswordHasherInterface $hasher
    ) {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstName('Youssef')
            ->setLastName('El Gharib')
            ->setEmail('youssef.elgharib17@gmail.com')
            ->setPassword(
                $this->hasher->hashPassword($user, 'youssef1234')
            )
            ->setBirthDate(
                new DateTimeImmutable('05/23/2001')
            )
            ->setUsername('youssef@2310')
        ;

        $manager->persist($user);
        $manager->flush();
    }
}
