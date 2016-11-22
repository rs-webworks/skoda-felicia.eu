<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Form\SearchForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    /**
     * @Route("/vyhledavani", name="frontend_search")
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
     */
    public function searchResultsAction(Request $request, $query)
    {
        $form = $this->createForm(SearchForm::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            return $this->redirectToRoute('frontend_search_result', array('query' => $data['query']));
        }

        if ($query) {
            dump('Query sent: ' . $query);
        }

        return $this->render('frontend/search/result.twig', array(
            'query' => $query
        ));
    }
}
