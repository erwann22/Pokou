<?php

namespace Pokou\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tva
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pokou\AdminBundle\Entity\TvaRepository")
 */
class Tva
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
     * @ORM\Column(name="taux", type="decimal")
     */
    private $taux;


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
     * Set taux
     *
     * @param string $taux
     * @return Tva
     */
    public function setTaux($taux)
    {
        $this->taux = $taux;
    
        return $this;
    }

    /**
     * Get taux
     *
     * @return string 
     */
    public function getTaux()
    {
        return $this->taux;
    }
}
