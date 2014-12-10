<?php

// src/Aka/ForumBundle/Controller/ForumController.php

namespace Aka\ForumBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Httpfoundation\Response;
class ForumController extends Controller
{
  public function indexAction()
 {
$sujets = array(
array(
'titre' => 'Life is like photography we develop from negatives !',
'id' => 1,
'auteur' => 'abdou',
'contenu' => 'Donner moi votre opinion à ce sujet',
'date' => new \Datetime()),
array(
'titre' => 'The key to success is [GET]money/invest',
'id' => 2,
'auteur' => 'abdou',
'contenu' => 'Warren Buffet got the key to the jet',
'date' => new \Datetime()),
array(
'titre' => 'Chiffre d\'affaire en hausse',
'id' => 3,
'auteur' => 'abdou',
'contenu' => 'Le CAC40 se porte mieux que le Dow-Jones…',
'date' => new \Datetime())
);
//
//  la ligne du render donne les sujets :
return $this->render('AkaForumBundle:Forum:index.html.twig', array(
'sujets' => $sujets
));
  }
  
 // On ne sait pas combien de pages il y a
 // Mais on sait qu'une page doit être supérieure ou égale à 1
  
// Ici, on récupérera la liste des sujets, puis on la passera
//au template

    
    
    public function voirAction($id)
    {
// Ici, on récupérera l'article correspondant à l'id $id
   $sujet = array(
'id' => 1,
'titre' => 'Bienvenue sur mon forum !',
'auteur' => 'abdou',
'contenu' => 'Life is like photography we develop from negatives but Success is the best revenge.',
'date' => new \Datetime()
);
// render comme qui, pour prendre en
//compte le sujet :
return $this->render('AkaForumBundle:Forum:voir.html.twig', array(
'sujet' => $sujet
));
    }
 public function menuAction($nombre) // Ici, nouvel argument
//$nombre, on l'a transmis via le render() depuis la vue
{

$liste = array(
array('id' => 2, 'titre' => 'My new website is online !'),
array('id' => 5, 'titre' => 'Recession is over ?'),
array('id' => 9, 'titre' => 'Test me..')
);
return $this->render('AkaForumBundle:Forum:menu.html.twig', array(
'liste_sujets' => $liste 
//le contrôleur passe les variables nécessaires au template !
));
}

    public function ajouterAction()
   {
//  gestion du formulaire 
    if( $this->get('request')->getMethod() == 'POST' ) 
    {
// Création et de la gestion du
//formulaire
    $this->get('session')->getFlashBag()->add('notice', 'Sujet
    bien enregistré');
// Redirection vers la page de visualisation de ce
//sujet
    return $this->redirect( $this->generateUrl('akaforum_voir',
    array('id' => 5)) );
    }
 // Si on n'est pas en POST alors on affiche le formulaire
    return $this->render('AkaForumBundle:Forum:ajouter.html.twig');
    }
    public function modifierAction($id)
    {
	$sujet = array(
'id' => 1,
'titre' => 'Mon weekend a Londres !',
'auteur' => 'abdou',
'contenu' => 'Ce weekend était trop bien. Blabla…',
'date' => new \Datetime()
);
// render  pour prendre en
//compte le sujet :
return $this->render('AkaForumBundle:Forum:modifier.html.twig',
array(
'sujet' => $sujet
));
// Récupéreration du sujet correspondant à $id
// Ici, on s'occupera de la création et de la gestion du
//formulaire
    return $this->render('AkaForumBundle:Forum:modifier.html.twig');
    }
    public function supprimerAction($id)
   {
// Récupérera l'article correspondant à $id
// Ici, on gérera la suppression de l'article en question
	// Ici, on gérera la suppression de l'article en question
    return $this->render('AkaForumBundle:Forum:supprimer.html.twig');
       }
    }
?>	