<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setUsername('admin1');
        $user->setPassword(
            $this->encoder->encodePassword($user, '1111')
        );
        $user->setEmail('jacekboguta@gmail.com');
        $manager->persist($user);

        $manager->flush();

        $user = new User();

        $user->setUsername('admin2');
        $user->setPassword(
            $this->encoder->encodePassword($user, '2222')
        );
        $user->setEmail('jacekboguta2@gmail.com');
        $manager->persist($user);

        $manager->flush();
    }
}
