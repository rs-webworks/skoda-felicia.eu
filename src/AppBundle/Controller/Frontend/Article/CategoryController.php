<?php

namespace AppBundle\Controller\Frontend\Article;

use AppBundle\Form\SearchForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{

    /**
     * @Route("/clanky/kategorie/{category}", name="frontend_article_detail", defaults={"category": "null"})
     * @Template("frontend/article/category/list.twig")
     */
    public function listAction()
    {
    }
}
