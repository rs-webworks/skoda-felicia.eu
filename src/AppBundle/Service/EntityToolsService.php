<?php

namespace AppBundle\Service;

use AppBundle\Entity\Manual\Manual;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Entity;

class EntityToolsService
{
    /** @var EntityManager */
    protected $em;

    /**
     * ManualService constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param Entity $entity
     */
    public function positionMoveUp($entity)
    {
        $this->positionChangeTo($entity, $entity->getPosition() + 1);
    }

    /**
     * @param Entity $entity
     */
    public function positionMoveDown($entity)
    {
        $this->positionChangeTo($entity, $entity->getPosition() - 1);
    }

    /**
     * @param $entity
     * @param $amount
     */
    public function positionChangeBy($entity, $amount)
    {
        $this->positionChangeTo($entity, ($entity->getPosition() + (int) $amount));
    }

    /**
     * @param $entity
     * @param $position
     */
    public function positionChangeTo($entity, $position)
    {
        $entity->setPosition($position);
        $this->em->merge($entity);
        $this->em->flush();
    }
}