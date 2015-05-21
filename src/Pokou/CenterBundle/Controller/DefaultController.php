<?php

namespace Pokou\CenterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PokouCenterBundle:Default:index.html.twig', array('name' => $name));
    }
}
