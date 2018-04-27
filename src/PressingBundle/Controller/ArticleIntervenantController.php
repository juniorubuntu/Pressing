<?php

namespace PressingBundle\Controller;

use PressingBundle\Entity\ArticleIntervenant;
use PressingBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Articleintervenant controller.
 *
 */
class ArticleIntervenantController extends Controller {

    /**
     * Lists all articleIntervenant entities.
     *
     */
    public function listeAction($id, $qte, $couleur) {
        $em = $this->getDoctrine()->getManager();

        if (isset($_GET['express'])) {
            $listArticleIntervenants = $em->getRepository('PressingBundle:ArticleIntervenant')->findBy(array('enCours' => true));
            $express = $_GET['express'];
            return $this->render('articleintervenant/listeArticle.html.twig', array(
                        'liste' => $listArticleIntervenants,
                        'express' => $express
            ));
        } elseif (($id != 0 ) && ($qte != 0)) {
            $article = $em->getRepository('PressingBundle:Article')->find($id);
            $articleIntervenant = new ArticleIntervenant();
            $articleIntervenant->setIdReception(NULL);
            $articleIntervenant->setArticle($article);
            $articleIntervenant->setQuantiteDepose($qte);
            $articleIntervenant->setCouleur('#' . $couleur);
            $articleIntervenant->setEnCours(true);

            // Empêcher la presence d'un article sur la liste deux fois

            $present = $em->getRepository('PressingBundle:ArticleIntervenant')->findOneBy(array(
                'idReception' => NULL,
                'article' => $article
            ));
            if ($present == NULL) {
                $em->persist($articleIntervenant);
                $em->flush();
            }
        } else if (($id != 0 ) && ($qte == 0)) {
            $articleIntervenant = $em->getRepository('PressingBundle:ArticleIntervenant')->find($id);
            if ($articleIntervenant != NULL) {
                $em->remove($articleIntervenant);
                $em->flush();
            }
        }
        $listArticleIntervenants = $em->getRepository('PressingBundle:ArticleIntervenant')->findBy(array('enCours' => true));

        return $this->render('articleintervenant/listeArticle.html.twig', array(
                    'liste' => $listArticleIntervenants,
        ));
    }

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $articleIntervenants = $em->getRepository('PressingBundle:ArticleIntervenant')->findAll();

        return $this->render('articleintervenant/index.html.twig', array(
                    'articleIntervenants' => $articleIntervenants,
        ));
    }

    /**
     * Creates a new articleIntervenant entity.
     *
     */
    public function newAction(Request $request) {
        $articleIntervenant = new Articleintervenant();
        $form = $this->createForm('PressingBundle\Form\ArticleIntervenantType', $articleIntervenant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($articleIntervenant);
            $em->flush();

            return $this->redirectToRoute('articleintervenant_show', array('id' => $articleIntervenant->getId()));
        }

        return $this->render('articleintervenant/new.html.twig', array(
                    'articleIntervenant' => $articleIntervenant,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a articleIntervenant entity.
     *
     */
    public function showAction(ArticleIntervenant $articleIntervenant) {
        $deleteForm = $this->createDeleteForm($articleIntervenant);

        return $this->render('articleintervenant/show.html.twig', array(
                    'articleIntervenant' => $articleIntervenant,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing articleIntervenant entity.
     *
     */
    public function editAction(Request $request, ArticleIntervenant $articleIntervenant) {
        $deleteForm = $this->createDeleteForm($articleIntervenant);
        $editForm = $this->createForm('PressingBundle\Form\ArticleIntervenantType', $articleIntervenant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('articleintervenant_edit', array('id' => $articleIntervenant->getId()));
        }

        return $this->render('articleintervenant/edit.html.twig', array(
                    'articleIntervenant' => $articleIntervenant,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a articleIntervenant entity.
     *
     */
    public function deleteAction(Request $request, ArticleIntervenant $articleIntervenant) {
        $form = $this->createDeleteForm($articleIntervenant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($articleIntervenant);
            $em->flush();
        }

        return $this->redirectToRoute('articleintervenant_index');
    }

    /**
     * Creates a form to delete a articleIntervenant entity.
     *
     * @param ArticleIntervenant $articleIntervenant The articleIntervenant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ArticleIntervenant $articleIntervenant) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('articleintervenant_delete', array('id' => $articleIntervenant->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
