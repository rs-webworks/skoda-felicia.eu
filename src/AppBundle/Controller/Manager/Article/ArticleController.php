<?php

namespace AppBundle\Controller\Manager\Article;

use AppBundle\Entity\Article\Article;
use AppBundle\Form\Article\ArticleForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller
{

    /**
     * @Route("/manager/article/list/", name="manager_article_list")
     * @Template("manager/article/article/list.html.twig")
     */
    public function articleListAction(Request $request)
    {
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $this->getDoctrine()->getRepository('AppBundle:Article\Article')->createQueryBuilder('d'),
            $request->query->getInt('page', 1),
            10
        );

        return array(
            'articles' => $pagination
        );
    }


    /**
     * @Route("/manager/article/edit/{id}", name="manager_article_edit", requirements={"id": "\d+"})
     * @param Request $request
     * @Template("manager/article/article/edit.html.twig")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function articleEditAction(Request $request, $id)
    {
        $article = $this->getDoctrine()->getRepository('AppBundle:Article\Article')->find($id);
        $form = $this->createForm(ArticleForm::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();
            $this->get('app.service.article')->save($article);
            $this->addFlash('success', 'Článek úspěšně upraven');
            return $this->redirectToRoute('manager_article_list');
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/manager/article/create/", name="manager_article_create")
     * @param Request $request
     * @Template("manager/article/article/create.html.twig")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function articleCreateAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleForm::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Article $article */
            $article = $form->getData();
            $this->get('app.service.article')->save($article);
            $this->addFlash('success', 'Článek úspěšně uložen');
            return $this->redirectToRoute('manager_article_list');
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/manager/article/delete/{id}", name="manager_article_delete", requirements={"id": "\d+"})
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function articleDeleteAction($id)
    {
        $article = $this->getDoctrine()->getRepository('AppBundle:Article\Article')->find($id);
        if (!$article) {
            $this->addFlash('danger', 'Soubor nebyl nalezen');
            return $this->redirectToRoute('manager_article_list');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($article);
        $em->flush();

        $this->addFlash('success', 'Článek byl úspěšně smazán');
        return $this->redirectToRoute('manager_article_list');
    }

    /**
     * @Route(
     *     "/manager/article/move/{id}/{direction}/{changeBy}",
     *     name="manager_article_move",
     *     options={"expose"=true},
     *     requirements={"id": "\d+"},
     *     defaults={"changeBy" = null})
     * @param $id
     * @param $direction
     * @param null $changeBy
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function articleMoveAction($id, $direction, $changeBy = null)
    {
        $entityTools = $this->get('app.service.entitytools');
        $entity = $this->getDoctrine()->getRepository('AppBundle:Article\Article')->find($id);

        if ($direction == 'up') {
            $entityTools->positionMoveUp($entity);
        } elseif ($direction == 'down') {
            $entityTools->positionMoveDown($entity);
        } elseif ($direction == 'custom') {
            $entityTools->positionChangeBy($entity, $changeBy);
        } else {
            $this->addFlash('danger', 'Nebyl rozpoznán správný směr přesunu');
        }

        return $this->redirectToRoute('manager_article_list');
    }


}
