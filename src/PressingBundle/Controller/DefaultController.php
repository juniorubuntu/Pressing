<?php

namespace PressingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PressingBundle:Default:index.html.twig');
    }
}
