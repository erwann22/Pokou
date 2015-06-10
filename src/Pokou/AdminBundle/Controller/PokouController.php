<?php

namespace Pokou\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pokou\UserBundle\Entity\UserRepository;

class PokouController extends Controller
{
    public function indexAction()
    {
        $users = UserRepository::listeUsers();
        foreach ($users as $user) {
            if ($user->getSolde() == NULL) {
                $user->setSolde(0);
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
            }
        }
        return $this->render('PokouAdminBundle:Pokou:index.html.twig', array('users' => $users));
    }
}
