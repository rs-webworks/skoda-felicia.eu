<?php

namespace AppBundle\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DownloadController extends Controller
{

    /**
     * @Route("/ke-stazeni/{category}", name="frontend_download", defaults={"category" = null})
     * @Template("frontend/download/list.twig")
     * @param Request $request
     * @return array
     */
    public function listAction(Request $request, $category = null)
    {
        $category = $this->getDoctrine()->getRepository('AppBundle:Download\DownloadCategory')->findOneBy(array(
            'slug' => $category
        ));

        $qb = $this->getDoctrine()->getRepository('AppBundle:Download\Download')->createQueryBuilder('d');

        if ($category) {
            $qb->andWhere('d.category = :category');
            $qb->setParameter('category', $category);
        }

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            5,
            array('defaultSortFieldName' => 'd.position', 'defaultSortDirection' => 'asc')
        );

        return array(
            'downloads' => $pagination,
            'downloadsCount' => count($this->getDoctrine()->getRepository('AppBundle:Download\Download')->findAll()),
            'categories' => $this->getDoctrine()->getRepository('AppBundle:Download\DownloadCategory')->findBy(array(), array('position' => 'ASC')),
            'currentCategory' => $category
        );
    }

    /**
     * @Route("/ke-stazeni/soubor/{slug}", name="frontend_download_request")
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\Response
     * @Template("frontend/download/detail.twig")
     */
    public function requestAction($slug)
    {
        $download = $this->getDoctrine()->getRepository('AppBundle:Download\Download')->findOneBy(array(
            'slug' => $slug
        ));

        $download->addClickCount();
        $em = $this->getDoctrine()->getManager();
        $em->merge($download);
        $em->flush();

        $downloadHandler = $this->get('vich_uploader.download_handler');
        return $downloadHandler->downloadObject($download, $fileField = 'file');
    }
}
