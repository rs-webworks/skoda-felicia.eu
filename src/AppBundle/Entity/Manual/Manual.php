<?php

namespace AppBundle\Entity\Manual;

use AppBundle\Entity\Identifier;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Manual\ManualImage", mappedBy="manual")
     * @ORM\OrderBy({"position"="ASC"})
     */
    private $images;

    /**
     * @Gedmo\SortablePosition()
     * @ORM\Column(type="integer")
     */
    private $position;

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


}