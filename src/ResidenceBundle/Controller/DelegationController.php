<?php

namespace ResidenceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ResidenceBundle\Entity\Delegation;
use ResidenceBundle\Form\DelegationType;

/**
 * Delegation controller.
 *
 * @Route("/delegation")
 */
class DelegationController extends Controller
{
    /**
     * Lists all Delegation entities.
     *
     * @Route("/", name="delegation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $delegations = $em->getRepository('ResidenceBundle:Delegation')->findAll();

        return $this->render('delegation/index.html.twig', array(
            'delegations' => $delegations,
        ));
    }

    /**
     * Creates a new Delegation entity.
     *
     * @Route("/new", name="delegation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $delegation = new Delegation();
        $form = $this->createForm('ResidenceBundle\Form\DelegationType', $delegation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($delegation);
            $em->flush();

            return $this->redirectToRoute('delegation_show', array('id' => $delegation->getId()));
        }

        return $this->render('delegation/new.html.twig', array(
            'delegation' => $delegation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Delegation entity.
     *
     * @Route("/{id}", name="delegation_show")
     * @Method("GET")
     */
    public function showAction(Delegation $delegation)
    {
        $deleteForm = $this->createDeleteForm($delegation);

        return $this->render('delegation/show.html.twig', array(
            'delegation' => $delegation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Delegation entity.
     *
     * @Route("/{id}/edit", name="delegation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Delegation $delegation)
    {
        $deleteForm = $this->createDeleteForm($delegation);
        $editForm = $this->createForm('ResidenceBundle\Form\DelegationType', $delegation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($delegation);
            $em->flush();

            return $this->redirectToRoute('delegation_edit', array('id' => $delegation->getId()));
        }

        return $this->render('delegation/edit.html.twig', array(
            'delegation' => $delegation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Delegation entity.
     *
     * @Route("/{id}", name="delegation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Delegation $delegation)
    {
        $form = $this->createDeleteForm($delegation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($delegation);
            $em->flush();
        }

        return $this->redirectToRoute('delegation_index');
    }

    /**
     * Creates a form to delete a Delegation entity.
     *
     * @param Delegation $delegation The Delegation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Delegation $delegation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('delegation_delete', array('id' => $delegation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
