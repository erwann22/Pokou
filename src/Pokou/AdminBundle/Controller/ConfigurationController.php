<?php

namespace Pokou\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pokou\AdminBundle\Entity\ConfigurationRepository;
use Pokou\AdminBundle\Entity\Configuration;
use Pokou\AdminBundle\Entity\TvaRepository;
use Pokou\UserBundle\Entity\UserRepository;

class ConfigurationController extends Controller
{
    public function indexAction()
    {
        // Récupère la configuration en base de donnèes
        $configuration = ConfigurationRepository::listeParametre();
        // Si aucune congiguration trouvée
        if (!isset($configuration)) {
            // on lance la configuration
            return $this->render('PokouAdminBundle:Configuration:init.html.twig');
        }
        return $this->render('PokouAdminBundle:Configuration:index.html.twig', array('config' => $configuration));
    
    }
    
    public function initAction() {
        return $this->render('PokouAdminBundle:Configuration:init.html.twig');
    }    
        

    
    public function editerAction() {
        $config = ConfigurationRepository::listeParametre();
        return $this->render('PokouAdminBundle:Configuration:edit.html.twig', array('config' => $config));
    }
    public function editAction()
    {
        $id = 1;
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $tva = $_POST['tva'];
        if ($tva === 'non') {
            $tva = false;
        } else {
            $tva =true;
        }
        $siret = $_POST['siret'];
        $adress= $_POST['adress'];
        $postal = $_POST['postal'];
        $ville = $_POST['ville'];
        $phone1 = $_POST['phone1'];
        $phone2 = $_POST['phone2'];
        $email = $_POST['email'];
        $web = $_POST['web'];
        $fb = $_POST['fb'];
        $twitter = $_POST['twitter'];
        $gplus = $_POST['gplus'];
        
        $config = new Configuration();
        $config->setId($id);
        $config->setNom($nom);
        $config->setDescription($description);
        $config->setTva($tva);
        $config->setSiret($siret);
        $config->setAdress($adress);
        $config->setPostal($postal);
        $config->setVille($ville);
        $config->setPhone1($phone1);
        $config->setPhone2($phone2);
        $config->setEmail($email);
        $config->setWeb($web);
        $config->setFb($fb);
        $config->setTwitter($twitter);
        $config->setGplus($gplus);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($config);
        $em->flush();
        
        return $this->render('PokouAdminBundle:Configuration:index.html.twig', array('config' => $config));
    }
    
    public function tvaAction() {
        $tva = TvaRepository::statutTva();
        $taux = TvaRepository::listeTva();
        return $this->render('PokouAdminBundle:Configuration:tva.html.twig', array('tva' => $tva, 'taux' => $taux));
    }
    
    public function inittvaAction() {
        $tva = TvaRepository::initialisationTaux();
        $taux = TvaRepository::listeTva();
        return $this->render('PokouAdminBundle:Configuration:tva.html.twig', array('tva' => $tva, 'taux' => $taux));
    }
    
    public function modiftvaAction() {
        $em = $this->getDoctrine()->getManager();
        $config = $em->getRepository('PokouAdminBundle:Configuration')->find(1);
        $tva = $config->getTva();
        if ($tva === true) {
            $tva = false;
        } else {
            $tva = true;
        }
        $config->setTva($tva);
        $em->flush();
        $taux = TvaRepository::listeTva();
        return $this->render('PokouAdminBundle:Configuration:tva.html.twig', array('tva' => $tva, 'taux' => $taux));
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
        $user->setRoles(array($_POST['roles']));
        $user->setSolde(0);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        
        return $this->render('PokouCenterBundle:Center:index.html.twig');
    }
    
    // Ajout du SUPER_ADMIN
    public function superAction() {
        $user = UserRepository::listeUsers();
        foreach ($user as $super) {
            $em = $this->getDoctrine()->getManager();
            $super->setRoles(array('ROLE_ADMIN', 'ROLE_SUPER_ADMIN'));
            $em->persist($super);
            $em->flush();
            
            return $super;
        }
    }
}
