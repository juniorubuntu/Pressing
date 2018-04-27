<?php

namespace PressingBundle\Controller;

use PressingBundle\Entity\EntreFinance;
use PressingBundle\Entity\Reception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Entrefinance controller.
 *
 */
class EntreFinanceController extends Controller {

    /**
     * Lists all entreFinance entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entreFinances = $em->getRepository('PressingBundle:EntreFinance')->findAll();

        return $this->render('entrefinance/index.html.twig', array(
                    'entreFinances' => $entreFinances,
        ));
    }

    /**
     * Creates a new entreFinance entity.
     *
     */
    public function newAction(Request $request, $id = 0) {
        $entreFinance = new EntreFinance();
        $form = $this->createForm('PressingBundle\Form\EntreFinanceType', $entreFinance);
        $form->handleRequest($request);



        if ($id != 0) {
            $em = $this->getDoctrine()->getManager();
            $reception = new Reception();
            $reception = $em->getRepository('PressingBundle:Reception')->find($id);
            $montant = $request->request->get("montant");
            $date = \DateTime::createFromFormat("y-m-d h:m:s", date('y-m-d h:m:s'));

            //Modification des articles retirés de la transaction
            // Retrait des articles déposés

            $tout = $request->request->get("tout");

            // Vérification de la somme d'argent déjà versé
            $montantTotalVerse = $reception->getMontantVerse();
            $finances = $em->getRepository('PressingBundle:EntreFinance')->findBy(array('reception' => $reception));
            foreach ($finances as $entree) {
                $montantTotalVerse += $entree->getMontant();
            }
            $montantTotalVerse += $montant;
            if ($tout == "on") {
                // On démarre la livraison totale
                if ($montantTotalVerse == $reception->getMontantTotal()) {
                    //début de la livraison
                    $articleintervenant = $em->getRepository('PressingBundle:ArticleIntervenant')->findBy(array('idReception' => $reception));
                    //$nombre = count($articleintervenant);
                    $montantRestant = 0;
                    foreach ($articleintervenant as $article) {
                        $article->setQuantiteRetire($article->getQuantiteDepose());
                        //enregistrement des nouvelles quantités
                        $em->persist($article);
                        $em->flush();
                    }
                    $reception->setLivre(true);
                    $em->persist($reception);
                    $em->flush();
                } else {
                    //message indiquant qu'on ne peut pas livrer
                    die('Hello Non');
                }
            } else {
                $articleintervenant = $em->getRepository('PressingBundle:ArticleIntervenant')->findBy(array('idReception' => $reception));
                //$nombre = count($articleintervenant);
                $montantRestant = 0;
                $totalR = 0;
                $totalD = 0;
                foreach ($articleintervenant as $article) {
                    $article->setQuantiteRetire($article->getQuantiteRetire() + $request->request->get("arti_" . $article->getId()));
                    $reste = $article->getQuantiteDepose() - $article->getQuantiteRetire();
                    $montantRestant += $reste * ($article->getArticle()->getPrixUnit() + $article->getArticle()->getPrixUnit() * $reception->getExpress());


                    $totalD += $article->getQuantiteDepose();
                    $totalR += $request->request->get("arti_" . $article->getId());
                }
                $montantTheoVerse = $reception->getMontantTotal() - $montantRestant;

                if ($montantTheoVerse > $montantTotalVerse) {
                    // Retrait refusé!
                } else {
                    // Retrait accepté!
                    foreach ($articleintervenant as $article) {
                        $em->persist($article);
                        $em->flush();
                    }
                    if ($totalR == $totalD) {
                        $reception->setLivre(true);
                        $em->persist($reception);
                        $em->flush();
                    }
                }
            }

            $entreFinance->setDate($date);
            $entreFinance->setMontant($montant);
            $entreFinance->setReception($reception);
            $entreFinance->setReceptionniste($this->getUser());
            if ($montant != 0) {
                $em->persist($entreFinance);
                $em->flush();
                return $this->redirectToRoute('entrefinance_show', array('id' => $entreFinance->getId()));
            }
            return $this->redirectToRoute('entrefinance_index');
        }

        return $this->render('entrefinance/new.html.twig', array(
                    'entreFinance' => $entreFinance,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a entreFinance entity.
     *
     */
    public function showAction(EntreFinance $entreFinance) {
        $deleteForm = $this->createDeleteForm($entreFinance);

        return $this->render('entrefinance/show.html.twig', array(
                    'entreFinance' => $entreFinance,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing entreFinance entity.
     *
     */
    public function editAction(Request $request, EntreFinance $entreFinance) {
        $deleteForm = $this->createDeleteForm($entreFinance);
        $editForm = $this->createForm('PressingBundle\Form\EntreFinanceType', $entreFinance);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entrefinance_edit', array('id' => $entreFinance->getId()));
        }

        return $this->render('entrefinance/edit.html.twig', array(
                    'entreFinance' => $entreFinance,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a entreFinance entity.
     *
     */
    public function deleteAction(Request $request, EntreFinance $entreFinance) {
        $form = $this->createDeleteForm($entreFinance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($entreFinance);
            $em->flush();
        }

        return $this->redirectToRoute('entrefinance_index');
    }

    /**
     * Creates a form to delete a entreFinance entity.
     *
     * @param EntreFinance $entreFinance The entreFinance entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EntreFinance $entreFinance) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('entrefinance_delete', array('id' => $entreFinance->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
