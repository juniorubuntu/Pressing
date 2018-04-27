<?php

namespace PressingBundle\Controller;

use PressingBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Article controller.
 *
 */
class ArticleController extends Controller {

    /**
     * Lists all article entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('PressingBundle:Article')->findAll();

        return $this->render('article/index.html.twig', array(
                    'articles' => $articles,
        ));
    }

    /**
     * Creates a new article entity.
     *
     */
    public function newTemplateAction(Request $request) {
        $article = new Article();
        $form = $this->createForm('PressingBundle\Form\ArticleType', $article);
        $form->handleRequest($request);


        if (isset($_GET['nom']) && isset($_GET['nbre']) && isset($_GET['prix'])) {
            $em = $this->getDoctrine()->getManager();
            $article = new Article();
            $article->setDesignation($_GET['nom']);
            $article->setNbrePiece($_GET['nbre']);
            $article->setPrixUnit($_GET['prix']);
            $article->setDefinitif(0);
            $em->persist($article);
            $em->flush();
            return $this->redirectToRoute('article_show', array('id' => $article->getId()));
        }

        return $this->render('article/newTemplate.html.twig', array(
                    'article' => $article,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a renew Article list.
     *
     */
    public function newListAction() {
        $em = $this->getDoctrine()->getManager();

        $listArticle = $em->getRepository('PressingBundle:Article')->findAll();

        return $this->render('article/articleList.html.twig', array(
                    'listArticle' => $listArticle
        ));
    }

    public function newAction(Request $request) {
        $article = new Article();
        $form = $this->createForm('PressingBundle\Form\ArticleType', $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_show', array('id' => $article->getId()));
        }

        return $this->render('article/new.html.twig', array(
                    'article' => $article,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a article entity.
     *
     */
    public function showAction(Article $article) {
        $deleteForm = $this->createDeleteForm($article);

        return $this->render('article/show.html.twig', array(
                    'article' => $article,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing article entity.
     *
     */
    public function editAction(Request $request, Article $article) {
        $deleteForm = $this->createDeleteForm($article);
        $editForm = $this->createForm('PressingBundle\Form\ArticleType', $article);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_edit', array('id' => $article->getId()));
        }

        return $this->render('article/edit.html.twig', array(
                    'article' => $article,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a article entity.
     *
     */
    public function deleteAction(Request $request, Article $article) {
        $form = $this->createDeleteForm($article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }

        return $this->redirectToRoute('article_index');
    }

    /**
     * Creates a form to delete a article entity.
     *
     * @param Article $article The article entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Article $article) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('article_delete', array('id' => $article->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
