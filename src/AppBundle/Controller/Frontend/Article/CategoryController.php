<?php

namespace AppBundle\Controller\Frontend\Article;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{

    /**
     * @Route("/clanky/kategorie/{category}", name="frontend_article_category_list", defaults={"category": "null"})
     * @Template("frontend/article/category/list.twig")
     */
    public function listAction(Request $request, $category)
    {
        $category = $this->getDoctrine()->getRepository('AppBundle:Article\Category')->findOneBy(array(
            'slug' => $category
        ));

        $qb = $this->getDoctrine()->getRepository('AppBundle:Article\Article')->createQueryBuilder('a');

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            20,
            array('defaultSortFieldName' => 'a.position', 'defaultSortDirection' => 'ASC')
        );

        return array(
            'articles' => $pagination,
            'categories' => $this->getDoctrine()->getRepository('AppBundle:Article\Category')->findBy(array(), array('position' => 'ASC')),
            'currentCategory' => $category
        );
    }

    /**
     * @Route("/clanky/kategorie", name="frontend_article_category_home")
     * @Template("frontend/article/category/home.twig")
     */
    public function homeAction()
    {
        $categories = $this->getDoctrine()->getRepository('AppBundle:Article\Category')->findAll();

        return array(
            'categories' => $categories
        );
    }
}
