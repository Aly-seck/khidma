<?php

namespace ResidenceBundle\Controller;

use Doctrine\ORM\Query\Expr\From;
use Doctrine\ORM\Query\Expr\Select;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ResidenceBundle\Entity\Residence;
use ResidenceBundle\Form\ResidenceType;

/**
 * Residence controller.
 *
 * @Route("/residence")
 */
class ResidenceController extends Controller
{
    /**
     * Lists all Residence entities.
     *
     * @Route("/", name="residence_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $residences = $em->getRepository('ResidenceBundle:Residence')->findAll();
        $appatements = $em->getRepository('ResidenceBundle:Appartement')->findAll();
        $responsables = $em->getRepository('ResidenceBundle:Responsable')->findAll();
        $accueillants = $em->getRepository('ResidenceBundle:Accueillant')->findAll();
        $chambres =  $em->getRepository('ResidenceBundle:Chambre')->findBy(
            array('etat' =>'disponible')
        );
        $ochambres =  $em->getRepository('ResidenceBundle:Chambre')->findBy(
            array('etat' =>'occupée')
        );

        return $this->render('residence/index.html.twig', array(
            'residences' => $residences,
            'appartements' => $appatements,
            'responsables' => $responsables,
            'accueillants'=> $accueillants,
            'chambres' => $chambres,
            'ochambres' => $ochambres
        ));
    }

    /**
     * Creates a new Residence entity.
     *
     * @Route("/new", name="residence_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $residence = new Residence();
        $form = $this->createForm('ResidenceBundle\Form\ResidenceType', $residence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($residence);
            $em->flush();

            return $this->redirectToRoute('residence_show', array('id' => $residence->getId()));
        }

        return $this->render('residence/new.html.twig', array(
            'residence' => $residence,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Residence entity.
     *
     * @Route("/{id}", name="residence_show")
     * @Method("GET")
     */
    public function showAction(Residence $residence)
    {
        $deleteForm = $this->createDeleteForm($residence);

        return $this->render('residence/show.html.twig', array(
            'residence' => $residence,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Residence entity.
     *
     * @Route("/{id}/edit", name="residence_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Residence $residence)
    {
        $deleteForm = $this->createDeleteForm($residence);
        $editForm = $this->createForm('ResidenceBundle\Form\ResidenceType', $residence);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($residence);
            $em->flush();

            return $this->redirectToRoute('residence_edit', array('id' => $residence->getId()));
        }

        return $this->render('residence/edit.html.twig', array(
            'residence' => $residence,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Residence entity.
     *
     * @Route("/{id}", name="residence_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Residence $residence)
    {
        $form = $this->createDeleteForm($residence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($residence);
            $em->flush();
        }

        return $this->redirectToRoute('residence_index');
    }

    /**
     * Creates a form to delete a Residence entity.
     *
     * @param Residence $residence The Residence entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Residence $residence)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('residence_delete', array('id' => $residence->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
