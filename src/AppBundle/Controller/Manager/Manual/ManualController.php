<?php

namespace AppBundle\Controller\Manager\Manual;

use AppBundle\Entity\Manual\Image;
use AppBundle\Entity\Manual\Manual;
use AppBundle\Form\Manual\ImageForm;
use AppBundle\Form\Manual\ManualForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ManualController extends Controller
{

    /**
     * @Route("/manager/manual/list/", name="manager_manual_list")
     * @param Request $request
     * @Template("manager/manual/manual/list.twig")
     * @return array
     */
    public function manualListAction(Request $request)
    {
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $this->getDoctrine()->getRepository('AppBundle:Manual\Manual')->createQueryBuilder('m'),
            $request->query->getInt('page', 1),
            15,
            array('defaultSortFieldName' => 'm.position', 'defaultSortDirection' => 'asc')
        );

        return array(
            'manual' => $pagination
        );
    }

    /**
     * @Route("/manager/manual/images/{id}", name="manager_manual_images", requirements={"id": "\d+"})
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @Template("manager/manual/manual/images.twig")
     */
    public function imagesAction(Request $request, $id)
    {
        $manualImage = new Image();
        return $this->saveImage($manualImage, $request, $id);
    }

    /**
     * @Route("/manager/manual/images/delete/{id}", name="manager_manual_images_delete", requirements={"id": "\d+"})
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function imageDeleteAction($id)
    {
        $image = $this->getDoctrine()->getRepository('AppBundle:Manual\Image')->find($id);

        if (!$image) {
            $this->addFlash('danger', 'Obrázek nebyl nalezen');
            return $this->redirectToRoute('manager_manual_list');
        }

        $redirectId = $image->getManual()->getId();
        $em = $this->getDoctrine()->getManager();
        $em->remove($image);
        $em->flush();

        $this->addFlash('success', 'Obrázek byl úspěšně odstraněn');
        return $this->redirectToRoute('manager_manual_images', array('id' => $redirectId));
    }

    /**
     * @Route("/manager/manual/edit/{id}", name="manager_manual_edit", requirements={"id": "\d+"})
     * @param Request $request
     * @Template("manager/manual/manual/edit.twig")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function manualEditAction(Request $request, $id)
    {
        $manual = $this->getDoctrine()->getRepository('AppBundle:Manual\Manual')->find($id);
        $form = $this->createForm(ManualForm::class, $manual);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manual = $form->getData();
            $this->get('app.service.manual')->saveManual($manual);
            $this->addFlash('success', 'Stránka příručky úspěšně upravena');
            return $this->redirectToRoute('manager_manual_list');
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/manager/manual/create/", name="manager_manual_create")
     * @param Request $request
     * @Template("manager/manual/manual/create.twig")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function manualCreateAction(Request $request)
    {
        $manual = new Manual();
        $form = $this->createForm(ManualForm::class, $manual);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manual = $form->getData();
            $this->get('app.service.manual')->saveManual($manual);
            $this->addFlash('success', 'Stránka příručky úspěšně uložena');
            return $this->redirectToRoute('manager_manual_list');
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/manager/manual/delete/{id}", name="manager_manual_delete", requirements={"id": "\d+"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function manualDeleteAction(Request $request, $id)
    {
        $manual = $this->getDoctrine()->getRepository('AppBundle:Manual\Manual')->find($id);
        if (!$manual) {
            $this->addFlash('danger', 'Stránka nebyla nalezena');
            return $this->redirectToRoute('manager_manual_list');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($manual);
        $em->flush();

        $this->addFlash('success', 'Stránka byla úspěšně smazána');
        return $this->redirectToRoute('manager_manual_list');
    }

    /**
     * @Route(
     *     "/manager/manual/move/{id}/{direction}/{changeBy}",
     *     name="manager_manual_move",
     *     options={"expose"=true},
     *     requirements={"id": "\d+"},
     *     defaults={"changeBy" = null})
     * @param $id
     * @param $direction
     * @param null $changeBy
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function manualMoveAction($id, $direction, $changeBy = null)
    {
        $entityTools = $this->get('app.service.entitytools');
        $entity = $this->getDoctrine()->getRepository('AppBundle:Manual\Manual')->find($id);

        if ($direction == 'up') {
            $entityTools->positionMoveUp($entity);
        } elseif ($direction == 'down') {
            $entityTools->positionMoveDown($entity);
        } elseif ($direction == 'custom') {
            $entityTools->positionChangeBy($entity, $changeBy);
        } else {
            $this->addFlash('danger', 'Nebyl rozpoznán správný směr přesunu');
        }

        return $this->redirectToRoute('manager_manual_list');
    }

    /**
     * @Route("/manager/manual/image/move/{id}/{direction}", name="manager_manual_image_move", requirements={"id": "\d+"})
     * @param $id
     * @param $direction
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function imageMoveAction($id, $direction)
    {
        $entityTools = $this->get('app.service.entitytools');
        $entity = $this->getDoctrine()->getRepository('AppBundle:Manual\Image')->find($id);
        $returnId = $entity->getManual()->getId();

        if ($direction == 'up') {
            $entityTools->positionMoveUp($entity);
        } elseif ($direction == 'down') {
            $entityTools->positionMoveDown($entity);
        } else {
            $this->addFlash('danger', 'Nebyl rozpoznán správný směr přesunu');
        }

        return $this->redirectToRoute('manager_manual_images', array(
            'id' => $returnId
        ));
    }

    /**
     * @Route("/manager/manual/reports/", name="manager_manual_reports")
     * @Template("manager/manual/report/list.twig")
     */
    public function manualReportsAction()
    {
        return array(
            'reports' => $this->get('app.service.report')->getAll()
        );
    }

    /**
     * @Route("/manager/manual/report/toggle-status/{id}", name="manager_manual_report_toggle", requirements={"id": "\d+"})
     */
    public function manualReportToggleAction($id)
    {
        $this->get('app.service.report')->toggle($id);
        return $this->redirectToRoute('manager_manual_reports');
    }

    /**
     * @param Image $image
     * @param Request $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function saveImage(Image $image, Request $request, $manualId)
    {
        $form = $this->createForm(ImageForm::class, $image);
        $form->handleRequest($request);
        $image->setManual($this->getDoctrine()->getRepository(Manual::class)->find($manualId));

        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();

            $this->addFlash('success', 'Obrázek byl úspěšně nahrán');
            return $this->redirect($request->getRequestUri());
        }

        return array(
            'form' => $form->createView(),
            'manual' => $image->getManual()
        );
    }
}
