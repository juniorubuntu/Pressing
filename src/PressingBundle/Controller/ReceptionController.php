<?php

namespace PressingBundle\Controller;

use PressingBundle\Entity\Reception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use PressingBundle\Entity\Client;
use PressingBundle\Entity\ArticleIntervenant;

/**
 * Reception controller.
 *
 */
class ReceptionController extends Controller {

    /**
     * Lists all reception entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $receptions = $em->getRepository('PressingBundle:Reception')->findAll();

        return $this->render('reception/index.html.twig', array(
                    'receptions' => $receptions,
        ));
    }

    /**
     * Creates a new reception entity.
     *
     */
    public function newAction(Request $request) {
        $reception = new Reception();
        $form = $this->createForm('PressingBundle\Form\ReceptionType', $reception);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        $client = $em->getRepository('PressingBundle:Client')->findAll();
        $article = $em->getRepository('PressingBundle:Article')->findAll();

        $listArticleIntervenants = $em->getRepository('PressingBundle:ArticleIntervenant')->findBy(array('enCours' => true));

        foreach ($listArticleIntervenants as $intervenant) {
            $em->remove($intervenant);
            $em->flush();
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reception);
            $em->flush();

            return $this->redirectToRoute('reception_show', array(
                        'id' => $reception->getId()
            ));
        }

        return $this->render('reception/new.html.twig', array(
                    'reception' => $reception,
                    'form' => $form->createView(),
                    'listClient' => $client,
                    'listArticle' => $article,
        ));
    }

    /**
     * Finds and displays a reception entity.
     *
     */
    public function showAction(Reception $reception) {
        $deleteForm = $this->createDeleteForm($reception);

        return $this->render('reception/show.html.twig', array(
                    'reception' => $reception,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reception entity.
     *
     */
    public function editAction(Request $request, Reception $reception) {
        $deleteForm = $this->createDeleteForm($reception);
        $editForm = $this->createForm('PressingBundle\Form\ReceptionType', $reception);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reception_edit', array('id' => $reception->getId()));
        }

        return $this->render('reception/edit.html.twig', array(
                    'reception' => $reception,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reception entity.
     *
     */
    public function deleteAction(Request $request, Reception $reception) {
        $form = $this->createDeleteForm($reception);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reception);
            $em->flush();
        }

        return $this->redirectToRoute('reception_index');
    }

    /**
     * Creates a form to delete a reception entity.
     *
     * @param Reception $reception The reception entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reception $reception) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('reception_delete', array('id' => $reception->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
