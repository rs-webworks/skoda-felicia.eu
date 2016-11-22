<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="engines")
 */
class Engine
{
    use Identifier;

    /**
     * @ORM\Column(type="string", length=5)
     * @Assert\NotBlank(message="Toto pole musí být vyplněno")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Toto pole musí být vyplněno")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Manual\Manual", mappedBy="engines")
     */
    private $manuals;

    /**
     * Engine constructor.
     */
    public function __construct()
    {
        $this->manuals = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $desc
     */
    public function setDescription($desc)
    {
        $this->description = $desc;
    }

    /**
     * @return mixed
     */
    public function getManuals()
    {
        return $this->manuals;
    }

    /**
     * @param mixed $manuals
     */
    public function setManuals($manuals)
    {
        $this->manuals = $manuals;
    }


}