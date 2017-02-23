<?php

namespace AppBundle\Service;

use AppBundle\Entity\Article\Article;
use AppBundle\Entity\Article\Category;
use AppBundle\Entity\Article\Report;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class ArticleService
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
        $this->repository = $this->em->getRepository('AppBundle:Article\Article');
    }

    /**
     * @return integer
     */
    public function countAll()
    {
        $qb = $this->repository->createQueryBuilder('a');
        $qb->select('COUNT(a)');

        return $qb->getQuery()->getSingleScalarResult();
    }

    /**
     * @param Article $article
     */
    public function save(Article $article)
    {
        $this->em->persist($article);
        $this->em->flush();
    }

    /**
     * @param Category $article
     */
    public function saveCategory(Category $article)
    {
        $this->em->persist($article);
        $this->em->flush();
    }

    /**
     * @param string $query
     * @return array
     */
    public function search($query)
    {
        return $this->repository->createQueryBuilder('a')
            ->addSelect("MATCH_AGAINST (a.perex, a.content, a.title, :searchterm 'IN NATURAL MODE') as score")
            ->add('where', 'MATCH_AGAINST(a.perex, a.content, a.title, :searchterm) > 0')
            ->setParameter('searchterm', $query)
            ->orderBy('score', 'desc')
            ->getQuery()
            ->getResult();
    }


    /**
     * @param Report $report
     */
    public function saveReport(Report $report)
    {
        $this->em->persist($report);
        $this->em->flush();
    }

    /**
     * @param $id
     */
    public function toggleReport($id)
    {
        $report = $this->em->getRepository('AppBundle:Article\Report')->find($id);
        $report->setResolved(!$report->isResolved());
        $this->em->merge($report);
        $this->em->flush();
    }

    /**
     *
     */
    public function getUnresolvedReportsCount()
    {
        return count($this->em->getRepository('AppBundle:Article\Report')->findBy(array('resolved' => false)));
    }
}