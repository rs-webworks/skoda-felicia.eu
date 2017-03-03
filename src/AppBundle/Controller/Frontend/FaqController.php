<?php

namespace AppBundle\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FaqController extends Controller
{
    /**
     * @Route("/caste-otazky", name="frontend_faq")
     * @Template("frontend/faq/list.html.twig")
     */
    public function listAction()
    {
    }
}
