<?php

namespace AppBundle\Service;

use AppBundle\Entity\Manual\Manual;
use Doctrine\ORM\EntityManager;

class ManualService
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

    public function getAll()
    {
        $results = $this->em->getRepository('AppBundle:Manual\Manual')->findBy(array(), array('position' => 'ASC'));
        return $results;
    }

    /**
     * @param Manual $manual
     */
    public function saveManual(Manual $manual)
    {
        $this->em->persist($manual);
        $this->em->flush();
    }
}