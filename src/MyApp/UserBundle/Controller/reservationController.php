<?php

namespace MyApp\UserBundle\Controller;

use MyApp\UserBundle\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Reservation controller.
 *
 */
class reservationController extends Controller
{
    /**
     * Lists all reservation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('MyAppUserBundle:Reservation')->findAll();

        return $this->render('reservation/index.html.twig', array(
            'reservations' => $reservations,
        ));
    }

    /**
     * Creates a new reservation entity.
     *
     */
    public function newAction(Request $request)
    {
        $reservation = new Reservation();
        $datedepart = new \DateTime();
        $reservation->setDatedepart($datedepart);
        $datearrive = new \DateTime();
        $reservation->setDatearrivee($datearrive);
        $reservation->setIdP($this->getUser()->getId());

        $form = $this->createForm('MyApp\UserBundle\Form\ReservationType', $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush($reservation);

            return $this->redirectToRoute('reservation_show', array('id' => $reservation->getIdRv()));
        }

        return $this->render('reservation/new.html.twig', array(
            'reservation' => $reservation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reservation entity.
     *
     */
    public function showAction(reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);

        return $this->render('reservation/show.html.twig', array(
            'reservation' => $reservation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reservation entity.
     *
     */
    public function editAction(Request $request, reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);
        $editForm = $this->createForm('MyApp\UserBundle\Form\ReservationType', $reservation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservation_edit', array('id' => $reservation->getIdRv()));
        }

        return $this->render('reservation/edit.html.twig', array(
            'reservation' => $reservation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reservation entity.
     *
     */
    public function deleteAction(Request $request, reservation $reservation)
    {
        $form = $this->createDeleteForm($reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reservation);
            $em->flush($reservation);
        }

        return $this->redirectToRoute('reservation_index');
    }

    /**
     * Creates a form to delete a reservation entity.
     *
     * @param reservation $reservation The reservation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(reservation $reservation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reservation_delete', array('id' => $reservation->getIdRv())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
