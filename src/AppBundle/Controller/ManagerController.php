<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Manpage;
use AppBundle\Form\ManpageForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ManagerController extends Controller
{
    /**
     * @Route("/manager/", name="managerHome")
     */
    public function indexAction()
    {
        return $this->render('manager/index.twig');
    }

    /**
     * @Route("/manager/manpage/list/", name="manpageList")
     */
    public function manpageListAction()
    {
        return $this->render('manager/manpage/list.twig', array(
            'manpages' => $this->getDoctrine()->getRepository('AppBundle:Manpage')->findAll()
        ));
    }

    /**
     * @Route("/manager/manpage/edit/{id}", name="manpageEdit", requirements={"id": "\d+"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function manpageEditAction(Request $request, $id)
    {
        $manpage = $this->getDoctrine()->getRepository('AppBundle:Manpage')->find($id);
        return $this->saveManpage($manpage, $request, 'edit');
    }

    /**
     * @Route("/manager/manpage/create/", name="manpageCreate")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function manpageCreateAction(Request $request)
    {
        $manpage = new Manpage();
        return $this->saveManpage($manpage, $request, 'create');
    }

    /**
     * @param Manpage $manpage
     * @param Request $request
     * @param string $action
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    protected function saveManpage(Manpage $manpage, Request $request, $action)
    {
        $form = $this->createForm(ManpageForm::class, $manpage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manpage = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($manpage);
            $em->flush();

            $this->addFlash('success', 'Stránka příručky úspěšně uložena');
            return $this->redirectToRoute('manpageList');
        }

        return $this->render('manager/manpage/' . $action . '.twig', array(
            'form' => $form->createView()
        ));
    }
}
