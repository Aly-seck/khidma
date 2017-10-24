<?php

namespace ResidenceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ResidenceBundle\Entity\Accueillant;
use ResidenceBundle\Form\AccueillantType;

/**
 * Accueillant controller.
 *
 * @Route("/accueillant")
 */
class AccueillantController extends Controller
{
    /**
     * Lists all Accueillant entities.
     *
     * @Route("/", name="accueillant_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $accueillants = $em->getRepository('ResidenceBundle:Accueillant')->findAll();

        return $this->render('accueillant/index.html.twig', array(
            'accueillants' => $accueillants,
        ));
    }

    /**
     * Creates a new Accueillant entity.
     *
     * @Route("/new", name="accueillant_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $accueillant = new Accueillant();
        $form = $this->createForm('ResidenceBundle\Form\AccueillantType', $accueillant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($accueillant);
            $em->flush();

            return $this->redirectToRoute('accueillant_show', array('id' => $accueillant->getId()));
        }

        return $this->render('accueillant/new.html.twig', array(
            'accueillant' => $accueillant,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Accueillant entity.
     *
     * @Route("/{id}", name="accueillant_show")
     * @Method("GET")
     */
    public function showAction(Accueillant $accueillant)
    {
        $deleteForm = $this->createDeleteForm($accueillant);

        return $this->render('accueillant/show.html.twig', array(
            'accueillant' => $accueillant,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Accueillant entity.
     *
     * @Route("/{id}/edit", name="accueillant_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Accueillant $accueillant)
    {
        $deleteForm = $this->createDeleteForm($accueillant);
        $editForm = $this->createForm('ResidenceBundle\Form\AccueillantType', $accueillant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($accueillant);
            $em->flush();

            return $this->redirectToRoute('accueillant_edit', array('id' => $accueillant->getId()));
        }

        return $this->render('accueillant/edit.html.twig', array(
            'accueillant' => $accueillant,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Accueillant entity.
     *
     * @Route("/{id}", name="accueillant_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Accueillant $accueillant)
    {
        $form = $this->createDeleteForm($accueillant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($accueillant);
            $em->flush();
        }

        return $this->redirectToRoute('accueillant_index');
    }

    /**
     * Creates a form to delete a Accueillant entity.
     *
     * @param Accueillant $accueillant The Accueillant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Accueillant $accueillant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('accueillant_delete', array('id' => $accueillant->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
