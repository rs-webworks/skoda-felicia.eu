<?php

namespace AppBundle\Controller\Frontend\Article;

use AppBundle\Entity\Article\Report;
use AppBundle\Form\Article\ReportForm;
use ReCaptcha\ReCaptcha;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller
{
    /**
     * @Route("/clanky/", name="frontend_article_home", options={"sitemap"=true})
     * @Template("frontend/article/home.twig")
     */
    public function homeAction()
    {
        return array();
    }

    /**
     * @Route("/clanky/detail/{article}", name="frontend_article_detail_old")
     * @Route("/clanky/kategorie/{category}/{article}", name="frontend_article_detail")
     * @Template("frontend/article/detail.twig")
     */
    public function detailAction($article)
    {
        $article = $this->getDoctrine()->getRepository('AppBundle:Article\Article')->findOneBy(array(
            'slug' => $article
        ));

        return array(
            'article' => $article
        );
    }

    /**
     * @Route("/clanky/nahlasit-chybu/{article}", name="frontend_article_report")
     * @Template("frontend/article/report.twig")
     * @param Request $request
     * @param $slug
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function reportBugAction(Request $request, $article)
    {
        $article = $this->getDoctrine()->getRepository('AppBundle:Article\Article')->findOneBy(array('slug' => $article));
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
                $report->setArticle($article);
                $this->get('app.service.article')->saveReport($report);
                $this->addFlash('success', 'Tvoje připomínka byla úspěšně uložena a brzy se jí bude někdo věnovat. Děkujeme.');
                return $this->redirectToRoute('frontend_article_detail', array('article' => $article->getSlug()));
            }
        }

        return array(
            'form' => $form->createView(),
            'article' => $article
        );
    }

}
