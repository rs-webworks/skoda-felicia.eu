<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Form\SearchForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TuningController extends Controller
{
    /**
     * @Route("/sportovni-upravy", name="frontend_tuning")
     * @Template("frontend/tuning/list.twig")
     */
    public function listAction()
    {
    }
}
