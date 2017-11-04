<?php

namespace Zema\Bundle\JsontableBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApplicationSonataJsontableBundle:Default:index.html.twig');
    }
}
