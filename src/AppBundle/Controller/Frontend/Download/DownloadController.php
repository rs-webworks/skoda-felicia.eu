<?php

namespace AppBundle\Controller\Frontend\Download;

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
        $category = $this->getDoctrine()->getRepository('AppBundle:Download\Category')->findOneBy(array(
            'slug' => $category
        ));

        $qb = $this->getDoctrine()->getRepository('AppBundle:Download\Download')->createQueryBuilder('d');

        if ($category) {
            $qb->andWhere('d.category = :category');
            $qb->setParameter('category', $category);
            $sort = 'd.position';
            $direction = 'ASC';
        } else {
            $sort = 'd.id';
            $direction = 'DESC';
        }

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            5,
            array('defaultSortFieldName' => $sort, 'defaultSortDirection' => $direction)
        );

        return array(
            'downloads' => $pagination,
            'downloadsCount' => count($this->getDoctrine()->getRepository('AppBundle:Download\Download')->findAll()),
            'categories' => $this->getDoctrine()->getRepository('AppBundle:Download\Category')->findBy(array(), array('position' => 'ASC')),
            'currentCategory' => $category
        );
    }

    /**
     * Tokens are valid only after 10 seconds of their issue time and then 30 seconds from that point
     * @Route("/ke-stazeni/soubor/{slug}/{token}", name="frontend_download_request", defaults={"token" = null})
     * @param $slug
     * @Template("frontend/download/request.twig")
     * @return array|\Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function requestAction($slug, $token = null)
    {
        $download = $this->getDoctrine()->getRepository('AppBundle:Download\Download')->findOneBy(array(
            'slug' => $slug
        ));

        $session = $this->get('session');

        if ($token) {
            $validation = $this->get('session')->get('tokens')['downloadRequest'];

            if ($token == $validation['token'] && time() > $validation['validSince'] && time() < $validation['validSince'] + 25) {
                $download->addClickCount();
                $em = $this->getDoctrine()->getManager();
                $em->merge($download);
                $em->flush();

                $downloadHandler = $this->get('vich_uploader.download_handler');
                return $downloadHandler->downloadObject($download, $fileField = 'file');
            }

            $this->addFlash('danger', 'Ověřovací token vypršel nebo není platný. Zkuste to prosím znovu.');
        }

        $token = md5(time());

        $session->set('tokens/downloadRequest/token', $token);
        $session->set('tokens/downloadRequest/validSince', time() + 5);

        return array(
            'token' => $token,
            'download' => $download
        );
    }

    /**
     * @Route("/ke-stazeni/detail/{slug}/", name="frontend_download_detail")
     * @param $slug
     * @Template("frontend/download/detail.twig")
     * @return array|\Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function detailAction($slug)
    {
        return array(
            'download' => $this->getDoctrine()->getRepository('AppBundle:Download\Download')->findOneBy(array('slug' => $slug))
        );
    }
}
