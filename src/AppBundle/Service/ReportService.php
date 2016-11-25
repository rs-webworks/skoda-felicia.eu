<?php

namespace AppBundle\Service;

use AppBundle\Entity\Manual\Report;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class ReportService
{
    /** @var EntityManager */
    protected $em;

    /** @var  EntityRepository */
    protected $repository;

    /**
     * ManualService constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->repository = $this->em->getRepository('AppBundle:Manual\Report');
    }

    /**
     *
     */
    public function getAll()
    {
        return $this->repository->findBy(array(), array('sent' => 'DESC'));
    }

    /**
     * @param $id
     */
    public function toggle($id)
    {
        $report = $this->repository->find($id);
        $report->setResolved(!$report->isResolved());
        $this->em->merge($report);
        $this->em->flush();
    }

    /**
     *
     */
    public function getUnresolvedCount()
    {
        return count($this->repository->findBy(array('resolved' => false)));
    }

    /**
     * @param Report $report
     */
    public function save(Report $report)
    {
        $this->em->persist($report);
        $this->em->flush();
    }

}