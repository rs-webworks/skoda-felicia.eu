<?php
/**
 * Created by PhpStorm.
 * User: raito
 * Date: 14.11.16
 * Time: 22:42
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @property-read int $id
 */
trait Identifier
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var integer
     */
    private $id;

    /**
     * @return integer
     */
    final public function getId()
    {
        return $this->id;
    }

    public function __clone()
    {
        $this->id = NULL;
    }

}