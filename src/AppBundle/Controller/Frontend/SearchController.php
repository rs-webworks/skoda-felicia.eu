<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Form\SearchForm;
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

        return $this->render('frontend/search/form.twig', array(
            'searchForm' => $form->createView()
        ));
    }

    /**
     * @Route("/hledani/{query}", name="frontend_search_result", defaults={"query" = null})
     * @Template("frontend/search/result.twig")
     */
    public function searchResultsAction(Request $request, $query)
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
                'manual' => $this->get('app.service.manual')->search($query),
                'download' => $this->get('app.service.download')->search($query),
                'article' => $this->get('app.service.article')->search($query)
            );
        }

        return array(
            'query' => $query,
            'results' => $results,
            'form' => $form
        );
    }
}
