<?php

namespace Course\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Course\MainBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class UserFixtures extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var
     */
    private $container;

    /**
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 3;
    }

    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $admin = new User();
        $admin->setRoles(array(User::ROLE_SUPER_ADMIN));
        $admin->setUsername('admin');
        $admin->setUsernameCanonical('admin');
        $admin->setEmail('aujean.thomas@gmail.com');
        $admin->setEmailCanonical('aujean.thomas@gmail.com');
        $admin->setPlainPassword('qqq');
        $admin->setEnabled(1);
        $admin->setGender('M');

        $userManager->updateUser($admin, true);
        $this->addReference('admin', $admin);

        $user = new User();
        $user->setRoles(array(User::ROLE_USER));
        $user->setUsername('user');
        $user->setUsernameCanonical('user');
        $user->setEmail('user@gmail.com');
        $user->setEmailCanonical('user@gmail.com');
        $user->setPlainPassword('qqq');
        $user->setEnabled(1);
        $user->setGender('M');

        $userManager->updateUser($user, true);
        $this->addReference('user', $user);
    }
}