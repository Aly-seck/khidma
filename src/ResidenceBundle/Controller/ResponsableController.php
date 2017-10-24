<?php

namespace ResidenceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ResidenceBundle\Entity\Responsable;
use ResidenceBundle\Form\ResponsableType;

/**
 * Responsable controller.
 *
 * @Route("/responsable")
 */
class ResponsableController extends Controller
{
    /**
     * Lists all Responsable entities.
     *
     * @Route("/", name="responsable_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $responsables = $em->getRepository('ResidenceBundle:Responsable')->findAll();

        return $this->render('responsable/index.html.twig', array(
            'responsables' => $responsables,
        ));
    }

    /**
     * Creates a new Responsable entity.
     *
     * @Route("/new", name="responsable_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $responsable = new Responsable();
        $form = $this->createForm('ResidenceBundle\Form\ResponsableType', $responsable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($responsable);
            $em->flush();

            return $this->redirectToRoute('responsable_show', array('id' => $responsable->getId()));
        }

        return $this->render('responsable/new.html.twig', array(
            'responsable' => $responsable,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Responsable entity.
     *
     * @Route("/{id}", name="responsable_show")
     * @Method("GET")
     */
    public function showAction(Responsable $responsable)
    {
        $deleteForm = $this->createDeleteForm($responsable);

        return $this->render('responsable/show.html.twig', array(
            'responsable' => $responsable,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Responsable entity.
     *
     * @Route("/{id}/edit", name="responsable_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Responsable $responsable)
    {
        $deleteForm = $this->createDeleteForm($responsable);
        $editForm = $this->createForm('ResidenceBundle\Form\ResponsableType', $responsable);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($responsable);
            $em->flush();

            return $this->redirectToRoute('responsable_edit', array('id' => $responsable->getId()));
        }

        return $this->render('responsable/edit.html.twig', array(
            'responsable' => $responsable,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Responsable entity.
     *
     * @Route("/{id}", name="responsable_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Responsable $responsable)
    {
        $form = $this->createDeleteForm($responsable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($responsable);
            $em->flush();
        }

        return $this->redirectToRoute('responsable_index');
    }

    /**
     * Creates a form to delete a Responsable entity.
     *
     * @param Responsable $responsable The Responsable entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Responsable $responsable)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('responsable_delete', array('id' => $responsable->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
