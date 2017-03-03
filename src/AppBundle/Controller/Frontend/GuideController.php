<?php

namespace AppBundle\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GuideController extends Controller
{
    /**
     * @Route("/navody", name="frontend_guide")
     * @Template("frontend/guide/list.html.twig")
     */
    public function listAction()
    {
    }
}
