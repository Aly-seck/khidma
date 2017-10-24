<?php

namespace MembreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MembreBundle\Entity\Engagement;
use MembreBundle\Form\EngagementType;

/**
 * Engagement controller.
 *
 * @Route("/engagement")
 */
class EngagementController extends Controller
{
    /**
     * Lists all Engagement entities.
     *
     * @Route("/", name="engagement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $engagements = $em->getRepository('MembreBundle:Engagement')->findAll();

        return $this->render('engagement/index.html.twig', array(
            'engagements' => $engagements,
        ));
    }

    /**
     * Creates a new Engagement entity.
     *
     * @Route("/new", name="engagement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $engagement = new Engagement();
        $form = $this->createForm('MembreBundle\Form\EngagementType', $engagement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($engagement);
            $em->flush();

            return $this->redirectToRoute('engagement_show', array('id' => $engagement->getId()));
        }

        return $this->render('engagement/new.html.twig', array(
            'engagement' => $engagement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Engagement entity.
     *
     * @Route("/{id}", name="engagement_show")
     * @Method("GET")
     */
    public function showAction(Engagement $engagement)
    {
        $deleteForm = $this->createDeleteForm($engagement);

        return $this->render('engagement/show.html.twig', array(
            'engagement' => $engagement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Engagement entity.
     *
     * @Route("/{id}/edit", name="engagement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Engagement $engagement)
    {
        $deleteForm = $this->createDeleteForm($engagement);
        $editForm = $this->createForm('MembreBundle\Form\EngagementType', $engagement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($engagement);
            $em->flush();

            return $this->redirectToRoute('engagement_edit', array('id' => $engagement->getId()));
        }

        return $this->render('engagement/edit.html.twig', array(
            'engagement' => $engagement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Engagement entity.
     *
     * @Route("/{id}", name="engagement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Engagement $engagement)
    {
        $form = $this->createDeleteForm($engagement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($engagement);
            $em->flush();
        }

        return $this->redirectToRoute('engagement_index');
    }

    /**
     * Creates a form to delete a Engagement entity.
     *
     * @param Engagement $engagement The Engagement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Engagement $engagement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('engagement_delete', array('id' => $engagement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
