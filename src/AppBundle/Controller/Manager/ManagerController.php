<?php

namespace AppBundle\Controller\Manager;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ManagerController extends Controller
{
    /**
     * @Route("/manager/", name="manager_home")
     */
    public function indexAction()
    {
        return $this->render('manager/index.twig');
    }
}
