<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Form\SearchForm;
use AppBundle\Service\ArticleService;
use AppBundle\Service\DownloadService;
use AppBundle\Service\ManualService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    /**
     * @Route("/vyhledavani", name="frontend_search", options={"sitemap"=true})
     */
    public function searchAction(Request $request)
    {
        $form = $this->createForm(SearchForm::class, null, array(
            'action' => $this->generateUrl('frontend_search_result')
        ));

        return $this->render('frontend/search/form.html.twig', array(
            'searchForm' => $form->createView()
        ));
    }

    /**
     * @Route("/hledani/{query}", name="frontend_search_result", defaults={"query" = null})
     * @Template("frontend/search/result.html.twig")
     * @param Request $request
     * @param ManualService $manualService
     * @param DownloadService $downloadService
     * @param ArticleService $articleService
     * @param $query
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function searchResultsAction(Request $request, ManualService $manualService, DownloadService $downloadService, ArticleService $articleService, $query)
    {
        $form = $this->createForm(SearchForm::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            if (strlen($data['query']) < 3) {
                $this->addFlash('warning', 'Hledaný výraz musí být alespoň 3 znaky dlouhý.');
            }
            return $this->redirectToRoute('frontend_search_result', array('query' => $data['query']));
        }

        $results = array();
        if ($query) {
            $results = array(
                'manual' => $manualService->search($query),
                'download' => $downloadService->search($query),
                'article' => $articleService->search($query)
            );
        }

        return array(
            'query' => $query,
            'results' => $results,
            'form' => $form
        );
    }
}
