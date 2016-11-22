<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Form\SearchForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FaqController extends Controller
{
    /**
     * @Route("/caste-otazky", name="frontend_faq")
     * @Template("frontend/faq/list.twig")
     */
    public function listAction()
    {
    }
}
