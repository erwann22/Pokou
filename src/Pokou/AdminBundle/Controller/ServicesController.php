<?php

namespace Pokou\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pokou\AdminBundle\Entity\Services;
use Pokou\AdminBundle\Entity\ServicesRepository;
use Pokou\AdminBundle\Entity\CategorieRepository;
use Pokou\AdminBundle\Entity\Categorie;

class ServicesController extends Controller
{
    public function indexAction()
    {
        $services = ServicesRepository::listeServices();
        return $this->render('PokouAdminBundle:Services:index.html.twig', array('services' => $services));
    }
    
    public function ajoutAction() {
        // Vérifie la présence de catégories
        $categories = CategorieRepository::listeCategories();
        if ($categories == null) {
            // Si pas de catégories, on en créer une
            return $this->render('PokouAdminBundle:Services:ajoutcat.html.twig');
        }
        return $this->render('PokouAdminBundle:Services:ajout.html.twig', array('categories' => $categories));
    }
    
    // Ajout de service
    public function validAction() {
        $service = new Services();
        $service->setNom($_POST['nom']);
        $service->setDescription($_POST['description']);
        $categories = array($_POST['categories']);
        foreach ($categories as $cat) {
            $service->addCategorie($cat);
                        var_dump($cat);die;
        }
//        $service->setCategories($categories);        
        $em = $this->getDoctrine()->getManager();
        $em->persist($service);
        $em->flush();
        
        $services = ServicesRepository::listeServices();
        return $this->render('PokouAdminBundle:Services:index.html.twig', array('services' => $services));
    }
    
    // Listage des catégories
    public function listecatAction() {
        $categories = CategorieRepository::listeCategories();
        
        return $this->render('PokouAdminBundle:Services:listecat.html.twig', array('categories' => $categories));
    }
    
    // Formulaire d'ajout de catégorie
    public function ajoutcatAction() {
        return $this->render('PokouAdminBundle:Services:ajoutcat.html.twig');
    }
    
    // Ajout de catégorie
    public function validcatAction() {
        $categorie = new Categorie();
        $categorie->setNom($_POST['nom']);
        $categorie->setDescription($_POST['description']);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($categorie);
        $em->flush();
        
        $services = ServicesRepository::listeServices();
        return $this->render('PokouAdminBundle:Services:index.html.twig', array('services' => $services));
    }
}
