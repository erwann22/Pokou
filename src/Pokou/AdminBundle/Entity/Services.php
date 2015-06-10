<?php

namespace Pokou\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Services
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pokou\AdminBundle\Entity\ServicesRepository")
 */
class Services
{
    /**
     * @var integer
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="Pokou\AdminBundle\Entity\Categorie", cascade={"persist"})
     */
    private $categories;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set nom
     *
     * @param string $nom
     * @return Services
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
     * Set description
     *
     * @param string $description
     * @return Services
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    public function __construct() {
        $this->categories = new ArrayCollection();
        $this->statuts = new ArrayCollection();
//        $this->categoriesService = new Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * Set categories
     * 
     * @param Pokou\AdminBundle\Entity\Categorie $categories
     */
    public function setCategories(\Pokou\AdminBundle\Entity\Categorie $categories) {
        $this->categories = $categories;
    }
    /**
    * Add categorie
    *
    * @param Pokou\AdminBundle\Entity\Categorie $categorie
    */
  public function addCategorie(Categorie $categorie) // addCategorie sans « s » !
  {
    // Ici, on utilise l'ArrayCollection vraiment comme un tableau, avec la syntaxe []
    $this->categories[] = $categorie;
    
    return $this;
  }
  /**
   * Remove categories
   * 
   * @param Pokou\AdminBundle\Entity\Categorie $categories
   */
  public function removeCategorie(\Pokou\AdminBundle\Entity\Categorie $categorie) {
      $this->categories->removeElement($categorie);
  }
  /**
   * Get categories
   * 
   * @return Doctrine\Common\Collections\Collection
   */
  public function getCategories() {
      return $this->categories;
  }
}
