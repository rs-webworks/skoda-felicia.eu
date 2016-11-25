<?php

namespace AppBundle\Controller\Manager;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ManagerController extends Controller
{
    /**
     * @Route("/manager/", name="manager_home")
     * @Template("manager/index.twig")
     */
    public function indexAction()
    {
        return array(
            'manual' => array('unresolvedReports' => $this->get('app.service.report')->getUnresolvedCount())
        );
    }
}
