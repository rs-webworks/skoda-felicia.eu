<?php

namespace AppBundle\Controller\Frontend\Manual;

use AppBundle\Service\ManualService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ManualController extends Controller
{
    /**
     * @Route("/dilenska-prirucka/obsah/", name="frontend_manual", options={"sitemap"=true})
     */
    public function indexAction($engine = null, ManualService $manualService)
    {
        return $this->render('frontend/manual/index.html.twig', array(
            'manualCategories' => $manualService->getAllByCategory(),
            'engines' => $this->get('doctrine')->getRepository('AppBundle:Engine')->findAll()
        ));
    }


    /**
     * @Route("/dilenska-prirucka/kategorie/{slug}/{engine}", name="frontend_manual_category_list", defaults={"engine" = null})
     * @Template("frontend/manual/list.html.twig")
     * @param Request $request
     * @param $slug
     * @param null $engine
     * @return array
     */
    public function listAction(Request $request, $slug, $engine = null)
    {
        $category = $this->getDoctrine()->getRepository('AppBundle:Manual\Category')->findOneBy(array(
            'slug' => $slug
        ));

        $qb = $this->getDoctrine()->getRepository('AppBundle:Manual\Manual')->createQueryBuilder('m');
        $qb->andWhere('m.category = :category');
        $qb->setParameter('category', $category);

        if ($engine) {
            $engine = $this->getDoctrine()->getRepository('AppBundle:Engine')->findOneBy(array(
                'slug' => $engine
            ));
            $qb->andWhere(':engine MEMBER OF m.engines');
            $qb->setParameter('engine', $engine);
        }

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            20,
            array('defaultSortFieldName' => 'm.position', 'defaultSortDirection' => 'asc')
        );

        return array(
            'engines' => $this->getDoctrine()->getRepository('AppBundle:Engine')->findAll(),
            'manuals' => $pagination,
            'filterEngine' => $engine,
            'category' => $category
        );
    }

    /**
     * @Route("/dilenska-prirucka/{slug}", name="frontend_manual_show")
     * @param ManualService $manualService
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(ManualService $manualService, $slug)
    {
        $page = $this->getDoctrine()->getRepository('AppBundle:Manual\Manual')->findOneBy(array('slug' => $slug));
        $pagesAround = $manualService->getPagesAround($page);

        if (!$page) {
            $this->addFlash('danger', 'Hledaná stránka nebyla nalezena');
            $this->redirectToRoute('frontend_manual', null, 404);
        }

        return $this->render('frontend/manual/show.html.twig', array(
            'manual' => $page,
            'pagesAround' => $pagesAround
        ));
    }

    /**
     * @Route("/dilenska-prirucka/test/", name="frontend_manual_show_test")
     * @Template("frontend/manual/testShow.html.twig")
     */
    public function testShowAction()
    {

    }
}
