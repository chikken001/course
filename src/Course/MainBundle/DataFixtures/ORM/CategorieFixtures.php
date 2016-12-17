<?php

namespace Course\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Course\MainBundle\Entity\Categorie;

class CategorieFixtures extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function getOrder()
    {
        return 1;
    }

    public function load(ObjectManager $manager)
    {
        $nourriture = new Categorie();
        $nourriture->setNom('Nourriture');
        $manager->persist($nourriture);

        $boisson = new Categorie();
        $boisson->setNom('Boisson');
        $manager->persist($boisson);

        $produit_entretien = new Categorie();
        $produit_entretien->setNom("Produit d'entretien");
        $manager->persist($produit_entretien);

        $manager->flush();
    }
}