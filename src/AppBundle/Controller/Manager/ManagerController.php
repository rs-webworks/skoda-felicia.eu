<?php

namespace AppBundle\Controller\Manager;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ManagerController extends Controller
{
    /**
     * @Route("/manager/", name="manager_home")
     * @Template("manager/home.html.twig")
     */
    public function indexAction()
    {
        return array(
            'manual' => array(
                'unresolvedReports' => $this->get('app.service.report')->getUnresolvedCount(),
                'allReports' => count($this->getDoctrine()->getRepository('AppBundle:Manual\Report')->findAll()),
                'count' => count($this->getDoctrine()->getRepository('AppBundle:Manual\Manual')->findAll())
            ),
            'article' => array(
                'unresolvedReports' => $this->get('app.service.article')->getUnresolvedReportsCount(),
                'allReports' => count($this->getDoctrine()->getRepository('AppBundle:Article\Report')->findAll()),
                'count' => count($this->getDoctrine()->getRepository('AppBundle:Article\Article')->findAll())
            ),
            'download' => array(
                'downloadsMade' => $this->get('app.service.download')->getTotalDownloadsCount(),
                'count' => count($this->getDoctrine()->getRepository('AppBundle:Download\Download')->findAll())
            )
        );
    }
}
