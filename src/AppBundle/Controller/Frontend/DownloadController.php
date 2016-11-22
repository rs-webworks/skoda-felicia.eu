<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Form\SearchForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DownloadController extends Controller
{
    /**
     * @Route("/ke-stazeni", name="frontend_download")
     * @Template("frontend/download/list.twig")
     */
    public function listAction()
    {
    }
}
