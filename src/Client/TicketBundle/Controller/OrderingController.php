<?php

namespace Client\TicketBundle\Controller;

use Client\TicketBundle\Entity\Ordering;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Ordering controller.
 *
 */
class OrderingController extends Controller
{
    /**
     * Lists all ordering entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $orderings = $em->getRepository('ClientTicketBundle:Ordering')->findAll();

        return $this->render('ordering/index.html.twig', array(
            'orderings' => $orderings,
        ));
    }

    /**
     * Creates a new ordering entity.
     *
     */
    public function newAction(Request $request)
    {
        $ordering = new Ordering();
        $form = $this->createForm('Client\TicketBundle\Form\OrderingType', $ordering);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ordering);
            $em->flush();

            return $this->redirectToRoute('order_show', array('id' => $ordering->getId()));
        }

        return $this->render('ordering/new.html.twig', array(
            'ordering' => $ordering,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ordering entity.
     *
     */
    public function showAction(Ordering $ordering)
    {
        $deleteForm = $this->createDeleteForm($ordering);

        return $this->render('ordering/show.html.twig', array(
            'ordering' => $ordering,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ordering entity.
     *
     */
    public function editAction(Request $request, Ordering $ordering)
    {
        $deleteForm = $this->createDeleteForm($ordering);
        $editForm = $this->createForm('Client\TicketBundle\Form\OrderingType', $ordering);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('order_edit', array('id' => $ordering->getId()));
        }

        return $this->render('ordering/edit.html.twig', array(
            'ordering' => $ordering,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ordering entity.
     *
     */
    public function deleteAction(Request $request, Ordering $ordering)
    {
        $form = $this->createDeleteForm($ordering);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ordering);
            $em->flush();
        }

        return $this->redirectToRoute('order_index');
    }

    /**
     * Creates a form to delete a ordering entity.
     *
     * @param Ordering $ordering The ordering entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ordering $ordering)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('order_delete', array('id' => $ordering->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
