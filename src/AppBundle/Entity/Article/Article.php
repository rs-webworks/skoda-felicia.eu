<?php

namespace AppBundle\Entity\Article;

use AppBundle\Entity\Identifier;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Table(name="articles", indexes={@ORM\Index(name="fulltext_index",columns={"content","title"})})
 * @ORM\Entity(repositoryClass="Gedmo\Sortable\Entity\Repository\SortableRepository")
 * @Vich\Uploadable
 */
class Article
{
    use Identifier;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Toto pole musí být vyplněno")
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Article\Category", inversedBy="articles")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * @Gedmo\SortableGroup
     */
    private $category;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(max="500", maxMessage="Perex může být maximálně {{ limit }} znaků dlouhý")
     */
    private $perex;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Toto pole musí být vyplněno")
     */
    private $content;

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
     * @var \DateTime $createdAt
     * @ORM\Column(type="datetime", nullable=false)
     * @Assert\NotBlank(message="U článku musí být datum vytvoření")
     */
    private $createdAt;


    /**
     * @var \DateTime $upadtedAt
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $published;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Toto pole musí být vyplněno")
     */
    private $author;

    /**
     * @Vich\UploadableField(mapping="article_image", fileNameProperty="imageName")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string")
     */
    private $imageName;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Article\Report", mappedBy="article", cascade={"remove"})
     */
    private $reports;

    /**
     * Article constructor.
     */
    public function __construct()
    {
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
    public function getPerex()
    {
        return $this->perex;
    }

    /**
     * @param mixed $perex
     */
    public function setPerex($perex)
    {
        $this->perex = $perex;
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
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @param mixed $published
     */
    public function setPublished($published)
    {
        $this->published = $published;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     * @return Article
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
     * @return Article
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
     * @return mixed
     */
    public function getReports()
    {
        return $this->reports;
    }

    /**
     * @param mixed $reports
     */
    public function setReports($reports)
    {
        $this->reports = $reports;
    }


}