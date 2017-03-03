<?php

namespace AppBundle\Controller\Manager\Download;

use AppBundle\Entity\Download\Category;
use AppBundle\Form\Download\CategoryForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{

    /**
     * @Route("/manager/download/category/list/", name="manager_download_category_list")
     * @Template("manager/download/category/list.html.twig")
     */
    public function categoryListAction(Request $request)
    {
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $this->getDoctrine()->getRepository('AppBundle:Download\Category')->createQueryBuilder('dc'),
            $request->query->getInt('page', 1),
            20,
            array('defaultSortFieldName' => 'dc.position', 'defaultSortDirection' => 'asc')
        );

        return array(
            'categories' => $pagination
        );
    }


    /**
     * @Route("/manager/download/category/edit/{id}", name="manager_download_category_edit", requirements={"id": "\d+"})
     * @param Request $request
     * @Template("manager/download/category/edit.html.twig")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function categoryEditAction(Request $request, $id)
    {
        $category = $this->getDoctrine()->getRepository('AppBundle:Download\Category')->find($id);
        $form = $this->createForm(CategoryForm::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();
            $this->get('app.service.download')->saveCategory($category);
            $this->addFlash('success', 'Kategorie souborů úspěšně upravena');
            return $this->redirectToRoute('manager_download_category_list');
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/manager/download/category/create/", name="manager_download_category_create")
     * @param Request $request
     * @Template("manager/download/category/create.html.twig")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function categoryCreateAction(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(CategoryForm::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();
            $this->get('app.service.download')->saveCategory($category);
            $this->addFlash('success', 'Kategorie souborů úspěšně uložena');
            return $this->redirectToRoute('manager_download_category_list');
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/manager/download/category/delete/{id}", name="manager_download_category_delete", requirements={"id": "\d+"})
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @internal param Request $request
     */
    public function categoryDeleteAction($id)
    {
        $category = $this->getDoctrine()->getRepository('AppBundle:Download\Category')->find($id);
        if (!$category) {
            $this->addFlash('danger', 'Kategorie nebyla nalezena');
            return $this->redirectToRoute('manager_download_category_list');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($category);
        $em->flush();

        $this->addFlash('success', 'Kategorie byla úspěšně smazána');
        return $this->redirectToRoute('manager_download_category_list');
    }

    /**
     * @Route(
     *     "/manager/download/category/move/{id}/{direction}/{changeBy}",
     *     name="manager_download_category_move",
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
        $entity = $this->getDoctrine()->getRepository('AppBundle:Download\Category')->find($id);

        if ($direction == 'up') {
            $entityTools->positionMoveUp($entity);
        } elseif ($direction == 'down') {
            $entityTools->positionMoveDown($entity);
        } elseif ($direction == 'custom') {
            $entityTools->positionChangeBy($entity, $changeBy);
        } else {
            $this->addFlash('danger', 'Nebyl rozpoznán správný směr přesunu');
        }

        return $this->redirectToRoute('manager_download_category_list');
    }
}
