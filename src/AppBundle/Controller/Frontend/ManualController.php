<?php

namespace AppBundle\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ManualController extends Controller
{
    /**
     * @Route("/", name="frontend_manual")
     */
    public function indexAction()
    {
        return $this->render('frontend/manual/list.twig', array(
            'manual' => $this->get('app.service.manual')->getAll(),
            'engines' => $this->get('doctrine')->getRepository('AppBundle:Engine')->findAll()
        ));
    }

    /**
     * @Route("/dilenska-prirucka/{slug}", name="frontend_manual_show")
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($slug)
    {
        $page = $this->getDoctrine()->getRepository('AppBundle:Manual\Manual')->findOneBy(array('slug' => $slug));
        $pagesAround = $this->get('app.service.manual')->getPagesAround($page);

        if (!$page) {
            $this->addFlash('danger', 'Hledaná stránka nebyla nalezena');
            $this->redirectToRoute('frontend_manual', null, 404);
        }

        return $this->render('frontend/manual/show.twig', array(
            'manual' => $page,
            'pagesAround' => $pagesAround
        ));
    }
}
