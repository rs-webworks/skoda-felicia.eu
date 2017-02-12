<?php

namespace AppBundle\Controller\Manager;

use AppBundle\Entity\Download\Download;
use AppBundle\Entity\Manual\Manual;
use AppBundle\Form\ManualForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DownloadController extends Controller
{

    /**
     * @Route("/manager/download/list/", name="manager_download_list")
     * @Template("manager/download/list.twig")
     */
    public function downloadListAction(Request $request)
    {
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $this->getDoctrine()->getRepository('AppBundle:Download\Download')->createQueryBuilder('d'),
            $request->query->getInt('page', 1),
            10
        );

        return array(
            'downloads' => $pagination
        );
    }


    /**
     * @Route("/manager/download/edit/{id}", name="manager_download_edit", requirements={"id": "\d+"})
     * @param Request $request
     * @Template("manager/download/edit.twig")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function downloadEditAction(Request $request, $id)
    {
        $download = $this->getDoctrine()->getRepository('AppBundle:Download\Download')->find($id);
        $form = $this->createForm(DownloadForm::class, $download);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $download = $form->getData();
            $this->get('app.service.download')->save($download);
            $this->addFlash('success', 'Soubor úspěšně upraven');
            return $this->redirectToRoute('manager_download_list');
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/manager/download/create/", name="manager_download_create")
     * @param Request $request
     * @Template("manager/manual/create.twig")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function downloadCreateAction(Request $request)
    {
        $download = new Download();
        $form = $this->createForm(DownloadForm::class, $download);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $download = $form->getData();
            $this->get('app.service.download')->save($download);
            $this->addFlash('success', 'Soubor úspěšně uložen');
            return $this->redirectToRoute('manager_download_list');
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/manager/download/delete/{id}", name="manager_download_delete", requirements={"id": "\d+"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function downloadDeleteAction(Request $request, $id)
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
     *     "/manager/download/move/{id}/{direction}/{changeBy}",
     *     name="manager_download_move",
     *     options={"expose"=true},
     *     requirements={"id": "\d+"},
     *     defaults={"changeBy" = null})
     * @param $id
     * @param $direction
     * @param null $changeBy
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function downloadMoveAction($id, $direction, $changeBy = null)
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


}
