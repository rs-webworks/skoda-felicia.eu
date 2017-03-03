<?php

namespace AppBundle\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TuningController extends Controller
{
    /**
     * @Route("/sportovni-upravy", name="frontend_tuning")
     * @Template("frontend/tuning/list.html.twig")
     */
    public function listAction()
    {
    }
}
