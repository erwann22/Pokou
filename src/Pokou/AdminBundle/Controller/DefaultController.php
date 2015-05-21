<?php

namespace Pokou\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PokouAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
