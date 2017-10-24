<?php

namespace MembreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MembreBundle\Entity\Cotisation;
use MembreBundle\Form\CotisationType;

/**
 * Cotisation controller.
 *
 * @Route("/cotisation")
 */
class CotisationController extends Controller
{
    /**
     * Lists all Cotisation entities.
     *
     * @Route("/", name="cotisation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cotisations = $em->getRepository('MembreBundle:Cotisation')->findAll();

        return $this->render('cotisation/index.html.twig', array(
            'cotisations' => $cotisations,
        ));
    }

    /**
     * Creates a new Cotisation entity.
     *
     * @Route("/new", name="cotisation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cotisation = new Cotisation();
        $form = $this->createForm('MembreBundle\Form\CotisationType', $cotisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation);
            $em->flush();

            return $this->redirectToRoute('cotisation_show', array('id' => $cotisation->getId()));
        }

        return $this->render('cotisation/new.html.twig', array(
            'cotisation' => $cotisation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cotisation entity.
     *
     * @Route("/{id}", name="cotisation_show")
     * @Method("GET")
     */
    public function showAction(Cotisation $cotisation)
    {
        $deleteForm = $this->createDeleteForm($cotisation);

        return $this->render('cotisation/show.html.twig', array(
            'cotisation' => $cotisation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cotisation entity.
     *
     * @Route("/{id}/edit", name="cotisation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cotisation $cotisation)
    {
        $deleteForm = $this->createDeleteForm($cotisation);
        $editForm = $this->createForm('MembreBundle\Form\CotisationType', $cotisation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation);
            $em->flush();

            return $this->redirectToRoute('cotisation_edit', array('id' => $cotisation->getId()));
        }

        return $this->render('cotisation/edit.html.twig', array(
            'cotisation' => $cotisation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Cotisation entity.
     *
     * @Route("/{id}", name="cotisation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cotisation $cotisation)
    {
        $form = $this->createDeleteForm($cotisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cotisation);
            $em->flush();
        }

        return $this->redirectToRoute('cotisation_index');
    }

    /**
     * Creates a form to delete a Cotisation entity.
     *
     * @param Cotisation $cotisation The Cotisation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cotisation $cotisation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cotisation_delete', array('id' => $cotisation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
