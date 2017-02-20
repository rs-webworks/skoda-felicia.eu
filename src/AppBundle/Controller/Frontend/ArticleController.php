<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Form\SearchForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller
{
    /**
     * @Route("/clanky/detail", name="frontend_article_detail")
     * @Template("frontend/article/detail.twig")
     */
    public function detailAction()
    {
    }
}
