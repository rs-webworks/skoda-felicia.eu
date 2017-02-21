<?php

namespace AppBundle\Entity\Article;

use AppBundle\Entity\Identifier;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="articles", indexes={@ORM\Index(name="fulltext_index",columns={"content","title"})})
 * @ORM\Entity(repositoryClass="Gedmo\Sortable\Entity\Repository\SortableRepository")
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Manual\Category", inversedBy="manuals")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * @Gedmo\SortableGroup
     */
    private $category;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Toto pole musí být vyplněno")
     * @Assert\Length(max="200", maxMessage="Perex může být maximálně {{ limit }} znaků dlouhý")
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Manual\Report", mappedBy="manual", cascade={"remove"})
     */
    private $reports;

    /**
     * Article constructor.
     */
    public function __construct()
    {
    }

}