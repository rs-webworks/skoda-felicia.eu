<?php

namespace AppBundle\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DownloadController extends Controller
{
    /**
     * @Route("/ke-stazeni", name="frontend_download")
     * @Template("frontend/download/list.twig")
     */
    public function listAction()
    {
    }

    /**
     * @Route("/ke-stazeni/detail/{id}", name="frontend_download_show", requirements={"id": "\d+"})
     * @Template("frontend/download/detail.twig")
     */
    public function showAction()
    {
    }
}
