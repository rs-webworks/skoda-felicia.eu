<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Entity\Manual\Report;
use AppBundle\Form\ReportForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReportController extends Controller
{
    /**
     * @Route("/nahlasit-chybu/{slug}", name="frontend_report_bug")
     * @Template("frontend/report/bug.twig")
     * @param Request $request
     * @param $slug
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function reportBugAction(Request $request, $slug)
    {
        $manual = $this->getDoctrine()->getRepository('AppBundle:Manual\Manual')->findOneBy(array('slug' => $slug));
        $report = new Report();

        $form = $this->createForm(ReportForm::class, $report);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $report->setIp($request->getClientIp());
            $report->setManual($manual);
            $this->get('app.service.report')->save($report);
            $this->addFlash('success', 'Tvoje připomínka byla úspěšně uložena a brzy se jí bude někdo věnovat. Děkujeme.');
            return $this->redirectToRoute('frontend_home');
        }

        return array(
            'form' => $form->createView(),
            'manual' => $manual
        );
    }
}
