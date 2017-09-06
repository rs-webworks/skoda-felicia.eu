<?php

namespace AppBundle\Controller\Frontend\Download;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Vich\UploaderBundle\Handler\DownloadHandler;

class DownloadController extends Controller
{

    /**
     * @Route("/ke-stazeni/{category}", name="frontend_download", defaults={"category" = null}, options={"sitemap"=true})
     * @Template("frontend/download/list.html.twig")
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
     * @param null $token
     * @param SessionInterface $session
     * @param DownloadHandler $downloadHandler
     * @return array|\Symfony\Component\HttpFoundation\StreamedResponse
     * @Template("frontend/download/request.html.twig")
     */
    public function requestAction(SessionInterface $session, DownloadHandler $downloadHandler, $slug, $token = null)
    {
        $download = $this->getDoctrine()->getRepository('AppBundle:Download\Download')->findOneBy(array(
            'slug' => $slug
        ));

        dump($session);

        if ($token) {
            $validation = $session->get('tokens')['downloadRequest'];

            if ($token == $validation['token'] && time() > $validation['validSince'] && time() < $validation['validSince'] + 25) {
                $download->addClickCount();
                $em = $this->getDoctrine()->getManager();
                $em->merge($download);
                $em->flush();

                return $downloadHandler->downloadObject($download, $fileField = 'file');
            }

            $this->addFlash('danger', 'Ověřovací token vypršel nebo není platný. Zkuste to prosím znovu.');
        }

        $token = md5(time());

        $session->set('tokens/downloadRequest/token', $token);
        $session->set('tokens/downloadRequest/validSince', time() + 5);
        dump($session->get('tokens'));

        return array(
            'token' => $token,
            'download' => $download
        );
    }

    /**
     * @Route("/ke-stazeni/detail/{slug}/", name="frontend_download_detail")
     * @param $slug
     * @Template("frontend/download/detail.html.twig")
     * @return array|\Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function detailAction($slug)
    {
        return array(
            'download' => $this->getDoctrine()->getRepository('AppBundle:Download\Download')->findOneBy(array('slug' => $slug))
        );
    }
}
