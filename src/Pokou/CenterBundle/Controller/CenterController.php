<?php

namespace Pokou\CenterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CenterController extends Controller
{
    public function indexAction()
    {
        return $this->render('PokouCenterBundle:Center:index.html.twig');
    }
}
