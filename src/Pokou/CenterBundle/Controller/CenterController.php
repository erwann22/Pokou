<?php

namespace Pokou\CenterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pokou\AdminBundle\Entity\ConfigurationRepository;
use Pokou\UserBundle\Entity\UserRepository;
use Pokou\UserBundle\Entity\User;

class CenterController extends Controller
{
    public function indexAction()
    {
        // Vérification de présence d'utilisateurs dans la BDD
        $users = UserRepository::listeUsers();
        if (empty($users)) {
            // Si pas d'utilisateurs, on le créer
            return $this->redirect('register');
        }
        
        // Vérifie la présence d'un SUPER_ADMIN
        foreach ($users as $user) {
            foreach ($user->getRoles() as $role) {
                if ($role == 'ROLE_SUPER_ADMIN') {
                    $super = true;
                } else {
                    // Sinon on le créer
                    $super = UserRepository::initSuper();
                }
            }
        }
        // Vérification d'authentification
        $user = $this->container->get('security.context')->getToken()->getUser();
        if ($user == "anon.") {
            // Si pas d'authentification, on redirige vers la connexion
            return $this->redirect('login');
        } else {
            // Vérifie si l'application est installée
            // Ce test se base sur la présence d'une configuration dans la BDD
        $config = ConfigurationRepository::listeParametre();
        // Si aucune config, on créer le SUPER_ADMIN
        if (!isset($config)) {
            return $this->render('PokouAdminBundle:Configuration:super.html.twig');
        }
        }
        $roles = $this->getUser()->getRoles();
        
        return $this->render('PokouCenterBundle:Center:index.html.twig', array('roles' => $roles));
    }
    public function confirmedAction()
    {
        return $this->render('PokouCenterBundle:Center:index.html.twig');
    }
}
