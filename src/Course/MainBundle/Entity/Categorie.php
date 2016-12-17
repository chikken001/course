<?php

namespace Course\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Course\MainBundle\Entity\Produit;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="Course\MainBundle\Repository\CategorieRepository")
 */
class Categorie
{
    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * Une catégorie a plusieurs produits.
     * @ORM\OneToMany(targetEntity="Course\MainBundle\Entity\Produit", mappedBy="categorie", cascade={"persist","remove"})
     */
    private $produits;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Categorie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param Produit $produit
     */
    public function removeProduit(Produit $produit)
    {
        $this->produits->removeElement($produit);
    }

    /**
     * @param Produit $produit
     */
    public function addProduit(Produit $produit)
    {
        $produit->setCategorie($this);

        $this->produits->add($produit);
    }

    /**
     * @return ArrayCollection
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * @param ArrayCollection $produits
     */
    public function setProduits(\Doctrine\Common\Collections\ArrayCollection $produits)
    {
        foreach ($produits as $produit)
        {
            if($produit instanceof Produit)
            {
                $this->addProduit($produit) ;
            }
        }
    }
}

