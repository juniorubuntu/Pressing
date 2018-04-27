<?php

namespace PressingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use PressingBundle\Entity\Reception;

/**
 * Description of Livraison
 *
 * @author atbr
 */
class LivraisonController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $receptions = $em->getRepository('PressingBundle:Reception')->findBy(array('livre' => false));

        return $this->render('livraison/recherche.html.twig', array(
                    'receptions' => array_reverse($receptions),
        ));
    }

}
