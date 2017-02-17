<?php

namespace AppBundle\Service;

use AppBundle\Entity\Manual\Manual;
use AppBundle\Entity\Manual\ManualCategory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class ManualService
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
        $this->repository = $this->em->getRepository('AppBundle:Manual\Manual');
    }

    /**
     * @return integer
     */
    public function countAll()
    {
        $qb = $this->em->getRepository('AppBundle:Manual\Manual')->createQueryBuilder('m');
        $qb->select('COUNT(m)');

        return $qb->getQuery()->getSingleScalarResult();
    }

    /**
     * @param null $engine
     * @return \AppBundle\Entity\Manual\Manual[]|array
     */
    public function getAll($engine = null)
    {
        $criteria = array();
        if ($engine) {
            $engine = $this->em->getRepository('AppBundle:Engine')->findOneBy(array('slug' => $engine));

            $qb = $this->em->createQueryBuilder();
            $qb->from('AppBundle:Manual\Manual', 'm')
                ->select('m')
                ->leftJoin('m.engines', 'e')
                ->where('e = :engine')
                ->orderBy('m.position', 'ASC')
                ->setParameter('engine', $engine);

            return $qb->getQuery()->getResult();
        }

        $results = $this->em->getRepository('AppBundle:Manual\Manual')->findBy(array(), array('position' => 'ASC'));
        return $results;
    }

    /**
     * @return \AppBundle\Entity\Manual\ManualCategory[]|array
     */
    public function getAllByCategory()
    {
        $results = $this->em->getRepository('AppBundle:Manual\ManualCategory')->findBy(array(), array('position' => 'ASC'));
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

    /**
     * @param ManualCategory $category
     */
    public function saveManualCategory(ManualCategory $category)
    {
        $this->em->persist($category);
        $this->em->flush();
    }

    /**
     * Returns number of pages specified around selected page, sorted by position
     * @param Manual $page
     * @param int $count Count in each direction (i.e. if 2 it will return max 4 - 2 above, 2 under)
     * @return array
     */
    public function getPagesAround(Manual $page, $count = 2)
    {
        $qb = $this->repository->createQueryBuilder('m')
            ->where('m.position < :currentPosition')
            ->orderBy('m.position', 'DESC')
            ->setParameter('currentPosition', $page->getPosition())
            ->setMaxResults($count + 1)
            ->getQuery();

        $under = $qb->getResult();

        $qb = $this->repository->createQueryBuilder('m')
            ->where('m.position > :currentPosition')
            ->orderBy('m.position', 'ASC')
            ->setParameter('currentPosition', $page->getPosition())
            ->setMaxResults($count + 1)
            ->getQuery();

        $above = $qb->getResult();

        $under = array_reverse($under);
        if (count($under) > $count) {
            array_shift($under);
            $moreUnder = true;
        }

        if (count($above) > $count) {
            array_pop($above);
            $moreAbove = true;
        }

        return array(
            'under' => array(
                'more' => isset($moreUnder),
                'pages' => $under
            ),
            'above' => array(
                'more' => isset($moreAbove),
                'pages' => $above
            )
        );
    }

    /**
     * @param string $query
     * @return array
     */
    public function search($query)
    {
        return $this->repository->createQueryBuilder('m')
            ->addSelect("MATCH_AGAINST (m.content, m.title, :searchterm 'IN NATURAL MODE') as score")
            ->add('where', 'MATCH_AGAINST(m.content, m.title, :searchterm) > 0')
            ->setParameter('searchterm', $query)
            ->orderBy('score', 'desc')
            ->getQuery()
            ->getResult();
    }
}