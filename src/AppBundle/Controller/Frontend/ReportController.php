<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Entity\Manual\Report;
use AppBundle\Form\ReportForm;
use AppBundle\Service\ReportService;
use ReCaptcha\ReCaptcha;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReportController extends Controller
{
    /**
     * @Route("/nahlasit-chybu/{slug}", name="frontend_report_bug")
     * @Template("frontend/report/bug.html.twig")
     * @param Request $request
     * @param ReportService $reportService
     * @param $slug
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function reportBugAction(Request $request, ReportService $reportService, $slug)
    {
        $manual = $this->getDoctrine()->getRepository('AppBundle:Manual\Manual')->findOneBy(array('slug' => $slug));
        $report = new Report();

        $form = $this->createForm(ReportForm::class, $report);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recaptcha = new ReCaptcha('6LeBPg0UAAAAALzndboAL_GziWFf1c3BW73Bh2oz');
            $resp = $recaptcha->verify($request->request->get('g-recaptcha-response'), $request->getClientIp());

            if (!$resp->isSuccess()) {
                $this->addFlash('danger', 'Anti-spam ověření selhalo.');
            } else {
                $report->setIp($request->getClientIp());
                $report->setManual($manual);
                $reportService->save($report);
                $this->addFlash('success', 'Tvoje připomínka byla úspěšně uložena a brzy se jí bude někdo věnovat. Děkujeme.');
                return $this->redirectToRoute('frontend_home');
            }
        }

        return array(
            'form' => $form->createView(),
            'manual' => $manual
        );
    }
}
