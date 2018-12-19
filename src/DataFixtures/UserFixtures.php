<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {


        $user = new User();
        $roles[] = 'ROLE_ADMIN';
        $user->setEmail('admin@admin.fr');
        $user->setFirstname('Arnaud');
        $user->setLastname('Linder');
        $user->setRoles($roles);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user, 'admin'));

        $manager->persist($user);

        $manager->flush();
    }
}
