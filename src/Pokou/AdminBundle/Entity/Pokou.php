<?php

namespace Pokou\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pokou
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pokou\AdminBundle\Entity\PokouRepository")
 */
class Pokou
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
     * @ORM\Column(name="coefficient", type="decimal")
     */
    private $coefficient;


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
     * Set coefficient
     *
     * @param string $coefficient
     * @return Pokou
     */
    public function setCoefficient($coefficient)
    {
        $this->coefficient = $coefficient;
    
        return $this;
    }

    /**
     * Get coefficient
     *
     * @return string 
     */
    public function getCoefficient()
    {
        return $this->coefficient;
    }
}
