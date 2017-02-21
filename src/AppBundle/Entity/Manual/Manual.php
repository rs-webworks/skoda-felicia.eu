<?php

namespace AppBundle\Entity\Manual;

use AppBundle\Entity\Engine;
use AppBundle\Entity\Identifier;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="manual_pages", indexes={@ORM\Index(name="fulltext_index",columns={"content","title"})})
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Manual\Category", inversedBy="manuals")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * @Gedmo\SortableGroup
     */
    private $category;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Toto pole musí být vyplněno")
     */
    private $content;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Manual\Image", mappedBy="manual", cascade={"remove"})
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
    private $fullWidth = false;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Manual\Report", mappedBy="manual", cascade={"remove"})
     */
    private $reports;

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
     * @return Image[]
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param Image[] $images
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

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getReports()
    {
        return $this->reports;
    }


    /**
     * @param Engine|null $searchEngine
     * @return bool
     */
    public function hasEngine(Engine $searchEngine = null)
    {
        if ($searchEngine === null) {
            return true;
        }

        if ($this->engines->contains($searchEngine)) {
            return true;
        }

        return false;
    }
}