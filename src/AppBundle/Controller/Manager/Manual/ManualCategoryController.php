<?php

namespace AppBundle\Controller\Manager\Manual;

use AppBundle\Entity\Manual\Manual;
use AppBundle\Entity\Manual\ManualCategory;
use AppBundle\Entity\Manual\ManualImage;
use AppBundle\Form\Manual\ManualCategoryForm;
use AppBundle\Form\ManualForm;
use AppBundle\Form\ManualImageForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ManualCategoryController extends Controller
{

    /**
     * @Route("/manager/manual/category/list/", name="manager_manual_category_list")
     */
    public function manualCategoryListAction(Request $request)
    {
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $this->getDoctrine()->getRepository('AppBundle:Manual\ManualCategory')->createQueryBuilder('mc'),
            $request->query->getInt('page', 1),
            20,
            array('defaultSortFieldName' => 'mc.position', 'defaultSortDirection' => 'asc')
        );

        return $this->render('manager/manual/categoryList.twig', array(
            'categories' => $pagination
        ));
    }


    /**
     * @Route("/manager/manual/category/edit/{id}", name="manager_manual_category_edit", requirements={"id": "\d+"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function manualCategoryEditAction(Request $request, $id)
    {
        $category = $this->getDoctrine()->getRepository('AppBundle:Manual\ManualCategory')->find($id);
        $form = $this->createForm(ManualCategoryForm::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();
            $this->get('app.service.manual')->saveManualCategory($category);
            $this->addFlash('success', 'Kategorie příručky úspěšně upravena');
            return $this->redirectToRoute('manager_manual_category_list');
        }

        return $this->render('manager/manual/categoryEdit.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/manager/manual/category/create/", name="manager_manual_category_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function manualCategoryCreateAction(Request $request)
    {
        $category = new ManualCategory();
        $form = $this->createForm(ManualCategoryForm::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();
            $this->get('app.service.manual')->saveManualCategory($category);
            $this->addFlash('success', 'Kategorie příručky úspěšně uložena');
            return $this->redirectToRoute('manager_manual_category_list');
        }

        return $this->render('manager/manual/categoryCreate.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/manager/manual/category/delete/{id}", name="manager_manual_category_delete", requirements={"id": "\d+"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function manualCategoryDeleteAction(Request $request, $id)
    {
        $category = $this->getDoctrine()->getRepository('AppBundle:Manual\ManualCategory')->find($id);
        if (!$category) {
            $this->addFlash('danger', 'Kategorie nebyla nalezena');
            return $this->redirectToRoute('manager_manual_category_list');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($category);
        $em->flush();

        $this->addFlash('success', 'Kategorie byla úspěšně smazána');
        return $this->redirectToRoute('manager_manual_category_list');
    }

    /**
     * @Route(
     *     "/manager/manual/category/move/{id}/{direction}/{changeBy}",
     *     name="manager_manual_category_move",
     *     options={"expose"=true},
     *     requirements={"id": "\d+"},
     *     defaults={"changeBy" = null})
     * @param $id
     * @param $direction
     * @param null $changeBy
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function manualCategoryMoveAction($id, $direction, $changeBy = null)
    {
        $entityTools = $this->get('app.service.entitytools');
        $entity = $this->getDoctrine()->getRepository('AppBundle:Manual\ManualCategory')->find($id);

        if ($direction == 'up') {
            $entityTools->positionMoveUp($entity);
        } elseif ($direction == 'down') {
            $entityTools->positionMoveDown($entity);
        } elseif ($direction == 'custom') {
            $entityTools->positionChangeBy($entity, $changeBy);
        } else {
            $this->addFlash('danger', 'Nebyl rozpoznán správný směr přesunu');
        }

        return $this->redirectToRoute('manager_manual_category_list');
    }
}
