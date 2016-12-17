<?php

namespace Course\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Course\MainBundle\Entity\Produit;

class ProduitFixtures extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function getOrder()
    {
        return 2;
    }

    public function load(ObjectManager $manager)
    {
        $categorie = $manager->getRepository('CourseMainBundle:Categorie')->find(1);

        $pain = new Produit();
        $pain->setNom('Pain');
        $pain->setCategorie($categorie);
        $manager->persist($pain);

        $categorie = $manager->getRepository('CourseMainBundle:Categorie')->find(2);

        $perrier = new Produit();
        $perrier->setNom('Perrier');
        $perrier->setCategorie($categorie);
        $manager->persist($perrier);

        $categorie = $manager->getRepository('CourseMainBundle:Categorie')->find(3);

        $lave_vaisselle = new Produit();
        $lave_vaisselle->setNom('Lave vaisselle');
        $lave_vaisselle->setCategorie($categorie);
        $manager->persist($lave_vaisselle);

        $manager->flush();
    }
}