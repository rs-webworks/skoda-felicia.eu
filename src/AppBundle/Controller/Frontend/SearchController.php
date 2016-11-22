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
     * @Route("/hledani", name="frontend_search")
     * @Method({"GET"})
     */
    public function searchAction(Request $request)
    {
        $form = $this->createForm(SearchForm::class, $request, array(
            'action' => $this->generateUrl('frontend_search'),
            'method' => 'GET'
        ));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('frontend/search/result.twig', array(
                'searchForm' => $form
            ));
        }

        return $this->render('frontend/search/form.twig', array(
            'searchForm' => $form->createView()
        ));
    }
}
