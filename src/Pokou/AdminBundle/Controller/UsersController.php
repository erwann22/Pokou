<?php

namespace Pokou\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pokou\UserBundle\Entity\UserRepository;
use Pokou\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Session\Session;

class UsersController extends Controller
{
    public function indexAction()
    {
        $session = new Session();
        static $key = 0;
        $listeUsers = UserRepository::listeUsers();
        foreach ($listeUsers as $user) {
            foreach ($user->getRoles() as $role) {
                if ($role == 'ROLE_SUPER_ADMIN') {
                    $key++;
                    $session->set($key, $user->getId());
                    $session->set('key', $key);
                }
                $session = new Session();
            }
        }
        
        return $this->render('PokouAdminBundle:Users:index.html.twig', array('users' => $listeUsers));
    }
    
    public function modifAction()
    {
        $listeUsers = UserRepository::listeUsers();
        return $this->render('PokouAdminBundle:Users:modif.html.twig', array('users' => $listeUsers));
    }
    
    public function editAction()
    {
        $usernameModif = $_POST['username'];
        $request = $this->getRequest();
        $session = $request->getSession();
        $username = $session->get('SecurityContext::USERNAME');
        var_dump($username);die;
    }
    
    public function selectAction()
    {
        $user = $_POST['user'];
        return $this->render('PokouAdminBundle:Users:modif1.html.twig', array('username' => $user));
    }
    
    public function confirmedAction()
    {
        return $this->render('PokouCenterBundle:Center:confirmed.html.twig');
    }
    
    public function ajoutAction()
    {
        return $this->render('PokouAdminBundle:Users:ajout.html.twig');
    }
    
    public function ajouterAction()
    {
        $user = new user();
        $user->setUsername($_POST['username']);
        $user->setNom($_POST['nom']);
        $user->setPrenom($_POST['prenom']);
        $user->setPassword($_POST['password']);
        $user->setEmail($_POST['email']);
        $user->setPhone1($_POST['phone1']);
        $user->setPhone2($_POST['phone2']);
        $user->setAdress($_POST['adress']);
        $user->setPostal($_POST['postal']);
        $user->setVille($_POST['ville']);
        $user->setWeb($_POST['web']);
        $user->setFb($_POST['fb']);
        $user->setTwitter($_POST['twitter']);
        $user->setGplus($_POST['gplus']);
        $user->setStatut($_POST['statut']);
        $user->setEntite($_POST['entite']);
        if ($_POST['roles'] == 'ROLE_USER') {
            $user->setRoles(array('ROLE_USER'));
        }
        elseif ($_POST['roles'] == 'ROLE_ADMIN') {
            $user->setRoles(array('ROLE_USER', 'ROLE_ADMIN'));
    }
    elseif ($_POST['roles'] == 'ROLE_SUPER_ADMIN') {
        $user->setRoles(array('ROLE_USER', 'ROLE_ADMIN', 'ROLE_SUPER_ADMIN'));
    }
        $user->setSolde(0);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        
        $users = UserRepository::listeUsers();
        return $this->render('PokouAdminBundle:Users:index.html.twig', array('users' => $users));
    }
    
    // Initialise le ROLE_SUPER_ADMIN
    public function initsuperAction() {
        
        return $this->render('PokouCenterBundle:Center:super.html.twig');
        
    }
    public function validsuperAction() {
        $user = new User();
        $user->setUsername($_POST['username']);
        $user->setPassword($_POST['password']);
        $user->setEmail($_POST['email']);
        $user->setRoles(array('ROLE_USER', 'ROLE_ADMIN', 'ROLE_SUPER_ADMIN'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return $this->redirect('Accueil');
    }
    
    public function promoadminAction($slug) {
        $users = UserRepository::listeUsers();
        foreach ($users as $user) {
            if ($user->getId() == $slug) {
                $em = $this->getDoctrine()->getManager();
                $user->setRoles(array('ROLE_ADMIN', 'ROLE_USER'));
                $em->persist($user);
                $em->flush();
            }
        }
        return $this->redirect('Utilisateurs');
    }
    public function promosuperAction($slug) {
        $users = UserRepository::listeUsers();
        foreach ($users as $user) {
            if ($user->getId() == $slug) {
                $em = $this->getDoctrine()->getManager();
                $user->setRoles(array('ROLE_ADMIN', 'ROLE_USER', 'ROLE_SUPER_ADMIN'));
                $em->persist($user);
                $em->flush();
            }
        }
        return $this->redirect('Utilisateurs');
    }
    
    public function retroadminAction($slug) {
        $users = UserRepository::listeUsers();
        foreach ($users as $user) {
            if ($user->getUsername() == $slug) {
                $em = $this->getDoctrine()->getManager();
                $user->setRoles(array('ROLE_ADMIN', 'ROLE_USER'));
                $em->persist($user);
                $em->flush();
            }
        }
    }
    public function retrouserAction($slug) {
        $users = UserRepository::listeUsers();
        foreach ($users as $user) {
            if ($user->getUsername() == $slug) {
                $em = $this->getDoctrine()->getManager();
                $user->setRoles(array('ROLE_USER'));
                $em->persist($user);
                $em->flush();
            }
        }
        $users = UserRepository::listeUsers();
    return $this->render('PokouAdminBundle:Users:index.html.twig', array('users' => $users));
    }
}
