<?php

namespace AppBundle\Controller\Manager\Manual;

use AppBundle\Entity\Manual\Manual;
use AppBundle\Entity\Manual\ManualImage;
use AppBundle\Form\Manual\ManualForm;
use AppBundle\Form\Manual\ManualImageForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ManualController extends Controller
{

    /**
     * @Route("/manager/manual/list/", name="manager_manual_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function manualListAction(Request $request)
    {
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $this->getDoctrine()->getRepository('AppBundle:Manual\Manual')->createQueryBuilder('m'),
            $request->query->getInt('page', 1),
            20,
            array('defaultSortFieldName' => 'm.position', 'defaultSortDirection' => 'asc')
        );

        return $this->render('manager/manual/list.twig', array(
            'manual' => $pagination
        ));
    }

    /**
     * @Route("/manager/manual/images/{id}", name="manager_manual_images", requirements={"id": "\d+"})
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function manualImagesAction(Request $request, $id)
    {
        $manualImage = new ManualImage();
        return $this->saveManualImage($manualImage, $request, $id);
    }

    /**
     * @param Manual $manual
     * @return array
     * @Route("/manager/manual/migration/{id}", name="manager_manual_migration", requirements={"id": "\d+"})
     * @Template("manager/manual/migration.twig")
     */
    public function manualMigrationAction(Manual $manual)
    {
        return array(
            'manual' => $manual
        );
    }

    /**
     * @Route("/manager/manual/images/delete/{id}", name="manager_manual_images_delete", requirements={"id": "\d+"})
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function manualImageDeleteAction($id)
    {
        $image = $this->getDoctrine()->getRepository('AppBundle:Manual\ManualImage')->find($id);

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
     * @return \Symfony\Component\HttpFoundation\Response
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

        return $this->render('manager/manual/edit.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/manager/manual/create/", name="manager_manual_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
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

        return $this->render('manager/manual/create.twig', array(
            'form' => $form->createView()
        ));
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
    public function manualImageMoveAction($id, $direction)
    {
        $entityTools = $this->get('app.service.entitytools');
        $entity = $this->getDoctrine()->getRepository('AppBundle:Manual\ManualImage')->find($id);
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
     * @Template("manager/manual/reports.twig")
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
     * @param ManualImage $manualImage
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    protected function saveManualImage(ManualImage $manualImage, Request $request, $manualId)
    {
        $form = $this->createForm(ManualImageForm::class, $manualImage);
        $form->handleRequest($request);
        $manualImage->setManual($this->getDoctrine()->getRepository(Manual::class)->find($manualId));

        if ($form->isSubmitted() && $form->isValid()) {
            $manualImage = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($manualImage);
            $em->flush();

            $this->addFlash('success', 'Obrázek byl úspěšně nahrán');
            return $this->redirect($request->getRequestUri());
        }

        return $this->render('manager/manual/images.twig', array(
            'form' => $form->createView(),
            'manual' => $manualImage->getManual()
        ));
    }
}