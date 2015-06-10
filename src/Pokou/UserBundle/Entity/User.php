<?php

namespace Pokou\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
 * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
 */
private $prenom;

/**
 * @ORM\Column(name="nom", type="string", length=255, nullable=true)
 */
private $nom;



    /**
     * @ORM\Column(name="web", type="string", length=255, nullable=true)
     */
    private $web;

    /**
     * @ORM\Column(name="fb", type="string", length=255, nullable=true)
     */
    private $fb;

    /**
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;
    
    /**
     * @ORM\Column(name="gplus", type="string", length=255, nullable=true)
     */
    private $gplus;

    /**
     * @ORM\Column(name="phone1", type="string", length=255, nullable=true)
     */
    private $phone1;

    /**
     * @ORM\Column(name="phone2", type="string", length=255, nullable=true)
     */
    private $phone2;

    /**
     * @ORM\Column(name="adress", type="string", length=255, nullable=true)
     */
    private $adress;

    /**
     * @ORM\Column(name="postal", type="string", length=255, nullable=true)
     */
    private $postal;
    
    /**
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;
    
    /**
     * @ORM\Column(name="statut", type="string", length=255, nullable=true)
     */
    private $statut;
    
    /**
     * @ORM\Column(name="solde", type="decimal", nullable=true)
     */
    private $solde;
    
    /**
     * @ORM\Column(name="entite", type="string", length=255, nullable=true)
     */
    private $entite;
    
    /**
     * Set prenom
     *
     * @param string $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return User
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
     * Set web
     *
     * @param string $web
     * @return User
     */
    public function setWeb($web)
    {
        $this->web = $web;
    
        return $this;
    }

    /**
     * Get web
     *
     * @return string 
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set fb
     *
     * @param string $fb
     * @return User
     */
    public function setFb($fb)
    {
        $this->fb = $fb;
    
        return $this;
    }

    /**
     * Get fb
     *
     * @return string 
     */
    public function getFb()
    {
        return $this->fb;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return User
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    
        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }
    
    /**
     * Set gplus
     * 
     * @param string $gplus
     * @return User
     */
    public function setGplus($gplus)
    {
        $this->gplus = $gplus;
        return $this;
    }
    /**
     * Get gplus
     * 
     * @return string
     */
    public function getGplus()
    {
        return $this->gplus;
    }

    /**
     * Set phone1
     *
     * @param string $phone1
     * @return User
     */
    public function setPhone1($phone1)
    {
        $this->phone1 = $phone1;
    
        return $this;
    }

    /**
     * Get phone1
     *
     * @return string 
     */
    public function getPhone1()
    {
        return $this->phone1;
    }

    /**
     * Set phone2
     *
     * @param string $phone2
     * @return User
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;
    
        return $this;
    }

    /**
     * Get phone2
     *
     * @return string 
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * Set adress
     *
     * @param string $adress
     * @return User
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    
        return $this;
    }

    /**
     * Get adress
     *
     * @return string 
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set postal
     *
     * @param string $postal
     * @return User
     */
    public function setPostal($postal)
    {
        $this->postal = $postal;
    
        return $this;
    }

    /**
     * Get postal
     *
     * @return string 
     */
    public function getPostal()
    {
        return $this->postal;
    }
    
    /**
     * Set ville
     * 
     * @param string $ville
     * @return User
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
        return $this;
    }
    /**
     * Get ville
     * 
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }
    
    
    /**
     * Set statut
     * 
     * @param string $statut
     * @return User
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
        return $this;
    }
    /**
     * Get statut
     * 
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }
    /**
     * Set solde
     *
     * @param float $solde
     * @return User
     */
    public function setSolde($solde)
    {
        $this->solde = $solde;
    
        return $this;
    }

    /**
     * Get solde
     *
     * @return float 
     */
    public function getSolde()
    {
        return $this->solde;
    }
    
    /**
     * Set entite
     *
     * @param string $entite
     * @return User
     */
    public function setEntite($entite)
    {
        $this->entite = $entite;
    
        return $this;
    }

    /**
     * Get entite
     *
     * @return string 
     */
    public function getEntite()
    {
        return $this->entite;
    }
    
}
