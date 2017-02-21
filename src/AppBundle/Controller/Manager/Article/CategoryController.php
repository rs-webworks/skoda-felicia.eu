<?php

namespace AppBundle\Controller\Manager\Article;

use AppBundle\Entity\Article\Category;
use AppBundle\Form\Article\CategoryForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{

    /**
     * @Route("/manager/article/category/list/", name="manager_article_category_list")
     * @Template("manager/article/category/list.twig")
     */
    public function categoryListAction(Request $request)
    {
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $this->getDoctrine()->getRepository('AppBundle:Article\Category')->createQueryBuilder('ac'),
            $request->query->getInt('page', 1),
            20,
            array('defaultSortFieldName' => 'ac.position', 'defaultSortDirection' => 'asc')
        );

        return array(
            'categories' => $pagination
        );
    }


    /**
     * @Route("/manager/article/category/edit/{id}", name="manager_article_category_edit", requirements={"id": "\d+"})
     * @param Request $request
     * @Template("manager/article/category/edit.twig")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function categoryEditAction(Request $request, $id)
    {
        $category = $this->getDoctrine()->getRepository('AppBundle:Article\Category')->find($id);
        $form = $this->createForm(CategoryForm::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();
            $this->get('app.service.article')->saveCategory($category);
            $this->addFlash('success', 'Kategorie souborů úspěšně upravena');
            return $this->redirectToRoute('manager_article_category_list');
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/manager/article/category/create/", name="manager_article_category_create")
     * @param Request $request
     * @Template("/manager/article/category/create.twig")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function categoryCreateAction(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(CategoryForm::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();
            $this->get('app.service.article')->saveCategory($category);
            $this->addFlash('success', 'Kategorie souborů úspěšně uložena');
            return $this->redirectToRoute('manager_article_category_list');
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/manager/article/category/delete/{id}", name="manager_article_category_delete", requirements={"id": "\d+"})
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @internal param Request $request
     */
    public function categoryDeleteAction($id)
    {
        $category = $this->getDoctrine()->getRepository('AppBundle:Article\Category')->find($id);
        if (!$category) {
            $this->addFlash('danger', 'Kategorie nebyla nalezena');
            return $this->redirectToRoute('manager_article_category_list');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($category);
        $em->flush();

        $this->addFlash('success', 'Kategorie byla úspěšně smazána');
        return $this->redirectToRoute('manager_article_category_list');
    }

    /**
     * @Route(
     *     "/manager/article/category/move/{id}/{direction}/{changeBy}",
     *     name="manager_article_category_move",
     *     options={"expose"=true},
     *     requirements={"id": "\d+"},
     *     defaults={"changeBy" = null})
     * @param $id
     * @param $direction
     * @param null $changeBy
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function categoryMoveAction($id, $direction, $changeBy = null)
    {
        $entityTools = $this->get('app.service.entitytools');
        $entity = $this->getDoctrine()->getRepository('AppBundle:Article\Category')->find($id);

        if ($direction == 'up') {
            $entityTools->positionMoveUp($entity);
        } elseif ($direction == 'down') {
            $entityTools->positionMoveDown($entity);
        } elseif ($direction == 'custom') {
            $entityTools->positionChangeBy($entity, $changeBy);
        } else {
            $this->addFlash('danger', 'Nebyl rozpoznán správný směr přesunu');
        }

        return $this->redirectToRoute('manager_article_category_list');
    }
}
