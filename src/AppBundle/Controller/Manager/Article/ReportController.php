<?php

namespace AppBundle\Controller\Manager\Article;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReportController extends Controller
{

    /**
     * @Route("/manager/article/reports/", name="manager_article_reports")
     * @Template("manager/article/report/list.twig")
     */
    public function manualReportsAction()
    {
        return array(
            'reports' => $this->getDoctrine()->getRepository('AppBundle:Article\Report')->findAll()
        );
    }

    /**
     * @Route("/manager/article/report/toggle-status/{id}", name="manager_article_report_toggle", requirements={"id": "\d+"})
     */
    public function manualReportToggleAction($id)
    {
        $this->get('app.service.article')->toggleReport($id);
        return $this->redirectToRoute('manager_article_reports');
    }
}
