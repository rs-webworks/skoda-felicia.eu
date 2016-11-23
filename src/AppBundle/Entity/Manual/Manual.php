<?php

namespace AppBundle\Entity\Manual;

use AppBundle\Entity\Identifier;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="manual_pages")
 * @ORM\Entity(repositoryClass="Gedmo\Sortable\Entity\Repository\SortableRepository")
 */
class Manual
{
    use Identifier;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Toto pole musí být vyplněno")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Toto pole musí být vyplněno")
     */
    private $content;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Manual\ManualImage", mappedBy="manual", cascade={"remove"})
     * @ORM\OrderBy({"position"="ASC"})
     */
    private $images;

    /**
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Engine", inversedBy="manuals")
     * @ORM\JoinTable(name="manuals_engines")
     */
    private $engines;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $fullWidth;

    /**
     * Manual constructor.
     */
    public function __construct()
    {
        $this->engines = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return ManualImage[]
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param ManualImage[] $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return mixed
     */
    public function getEngines()
    {
        return $this->engines;
    }

    /**
     * @param mixed $engines
     */
    public function setEngines($engines)
    {
        $this->engines = $engines;
    }

    /**
     * @return boolean
     */
    public function getFullWidth()
    {
        return $this->fullWidth;
    }

    /**
     * @param boolean $fullWidth
     */
    public function setFullWidth($fullWidth = false)
    {
        $this->fullWidth = $fullWidth;
    }


}