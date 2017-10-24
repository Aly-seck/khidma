<?php

namespace MembreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MembreBundle\Entity\Barkelou;
use MembreBundle\Form\BarkelouType;

/**
 * Barkelou controller.
 *
 * @Route("/barkelou")
 */
class BarkelouController extends Controller
{
    /**
     * Lists all Barkelou entities.
     *
     * @Route("/", name="barkelou_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $barkelous = $em->getRepository('MembreBundle:Barkelou')->findAll();

        return $this->render('barkelou/index.html.twig', array(
            'barkelous' => $barkelous,
        ));
    }

    /**
     * Creates a new Barkelou entity.
     *
     * @Route("/new", name="barkelou_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $barkelou = new Barkelou();
        $form = $this->createForm('MembreBundle\Form\BarkelouType', $barkelou);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($barkelou);
            $em->flush();

            return $this->redirectToRoute('barkelou_show', array('id' => $barkelou->getId()));
        }

        return $this->render('barkelou/new.html.twig', array(
            'barkelou' => $barkelou,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Barkelou entity.
     *
     * @Route("/{id}", name="barkelou_show")
     * @Method("GET")
     */
    public function showAction(Barkelou $barkelou)
    {
        $deleteForm = $this->createDeleteForm($barkelou);

        return $this->render('barkelou/show.html.twig', array(
            'barkelou' => $barkelou,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Barkelou entity.
     *
     * @Route("/{id}/edit", name="barkelou_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Barkelou $barkelou)
    {
        $deleteForm = $this->createDeleteForm($barkelou);
        $editForm = $this->createForm('MembreBundle\Form\BarkelouType', $barkelou);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($barkelou);
            $em->flush();

            return $this->redirectToRoute('barkelou_edit', array('id' => $barkelou->getId()));
        }

        return $this->render('barkelou/edit.html.twig', array(
            'barkelou' => $barkelou,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Barkelou entity.
     *
     * @Route("/{id}", name="barkelou_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Barkelou $barkelou)
    {
        $form = $this->createDeleteForm($barkelou);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($barkelou);
            $em->flush();
        }

        return $this->redirectToRoute('barkelou_index');
    }

    /**
     * Creates a form to delete a Barkelou entity.
     *
     * @param Barkelou $barkelou The Barkelou entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Barkelou $barkelou)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('barkelou_delete', array('id' => $barkelou->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
