<?php

namespace AppBundle\Service;

use AppBundle\Entity\Download\Category;
use AppBundle\Entity\Download\Download;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class DownloadService
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
        $this->repository = $this->em->getRepository('AppBundle:Download\Download');
    }

    /**
     * @return integer
     */
    public function countAll()
    {
        $qb = $this->em->getRepository('AppBundle:Download\Download')->createQueryBuilder('d');
        $qb->select('COUNT(d)');

        return $qb->getQuery()->getSingleScalarResult();
    }

    /**
     * @param Download $download
     */
    public function save(Download $download)
    {
        $this->em->persist($download);
        $this->em->flush();
    }

    /**
     * @param Category $download
     */
    public function saveCategory(Category $download)
    {
        $this->em->persist($download);
        $this->em->flush();
    }

    /**
     *
     */
    public function getTotalDownloadsCount()
    {
        $sum = $this->repository->createQueryBuilder('d')
            ->select('SUM(d.clickCount) as downloads')
            ->getQuery()
            ->getOneOrNullResult();

        return $sum['downloads'];
    }

    /**
     * @param string $query
     * @return array
     */
    public function search($query)
    {
        return $this->repository->createQueryBuilder('d')
            ->addSelect("MATCH_AGAINST (d.description, d.title, :searchterm 'IN NATURAL MODE') as score")
            ->add('where', 'MATCH_AGAINST(d.description, d.title, :searchterm) > 0')
            ->setParameter('searchterm', $query)
            ->orderBy('score', 'desc')
            ->getQuery()
            ->getResult();
    }
}