<?php

namespace AppBundle\Entity\Manual;

use AppBundle\Entity\Identifier;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Table(name="manual_images")
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Gedmo\Sortable\Entity\Repository\SortableRepository")
 */
class ManualImage
{
    use Identifier;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Toto pole musí být vyplněno")
     */
    private $title;

    /**
     * @Vich\UploadableField(mapping="manual_image", fileNameProperty="imageName")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string")
     */
    private $imageName;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Manual\Manual", inversedBy="images")
     * @ORM\JoinColumn(name="manual_id", referencedColumnName="id")
     * @Gedmo\SortableGroup
     */
    private $manual;

    /**
     * @Gedmo\SortablePosition
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
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     * @return ManualImage
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     * @return ManualImage
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * @return Manual
     */
    public function getManual()
    {
        return $this->manual;
    }

    /**
     * @param Manual $manual
     */
    public function setManual(Manual $manual)
    {
        $this->manual = $manual;
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
}