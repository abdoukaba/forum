<?php

namespace Aka\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Sujet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Aka\ForumBundle\Entity\SujetRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Sujet
{

    /**
    * @ORM\Column(name="publication", type="boolean")
    */
    private $publication;



    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=255)
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;
    /**
    * @ORM\Column(type="date", nullable=true)
    */
    private $dateEdition;
	
	/**
    * @Gedmo\Slug(fields={"titre"})
    * @ORM\Column(length=128, unique=true)
    */
    private $slug;
	
    /**
    * @ORM\OneToOne(targetEntity="Aka\ForumBundle\Entity\Image",
    cascade={"persist", "remove"})
    */
    private $image;
	
	/**
    * @ORM\ManyToMany(targetEntity="Aka\ForumBundle\Entity\Categorie",
    cascade={"persist"})
    */
    private $categories;
	
	/**
    * @ORM\OneToMany(targetEntity="Aka\ForumBundle\Entity\Commentaire",
    * mappedBy="article")
    */
	
    private $commentaires; 
   // Ici commentaires prend un « s », car un
   //sujet a plusieurs commentaires !
	
	public function __construct()
    {
    $this->date = new \Datetime;
    $this->publication = true;
    $this->categories = new
    \Doctrine\Common\Collections\ArrayCollection();
    $this->commentaires = new
    \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
    * @ORM\preUpdate
     * Callback pour mettre à jour la date d'édition à chaque
     *modification de l'entité
    */
	
    public function updateDate()
    {
    $this->setDateEdition(new \Datetime());
    }
	
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Sujet
     */
    public function setDate(\Datetime $date))
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Sujet
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     * @return Sujet
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

	/**
    * @param Aka\ForumBundle\Entity\Image $image
    * @return Article
    */
     public function setImage(\Aka\ForumBundle\Entity\Image $image = null)
    {
    $this->image = $image;
    return $this;
    }
	
	/**
    * @return Aka\ForumBundle\Entity\Image
    */
    public function getImage()
    {
    return  $this->image;
	}
	
	/**
    * @param Aka\ForumBundle\Entity\Categorie $categorie
    * @return Sujet
    */
    public function addCategorie(\Aka\ForumBundle\Entity\Categorie
    $categorie)
    {
    $this->categories[] = $categorie;
    return $this;
     }
	 
    /**
    * @param Aka\ForumBundle\Entity\Categorie $categorie
    */
    public function removeCategorie(\Aka\ForumBundle\Entity\Categorie
    $categorie)
    {
    $this->categories->removeElement($categorie);
    }
	
    /**
    * @return Doctrine\Common\Collections\Collection
    */
    public function getCategories()
	{
     return $this->categories;
    }
	
	/**
    * @param Aka\ForumBundle\Entity\Commentaire $commentaire
    * @return Sujet
    */
    public function addCommentaire(\Aka\ForumBundle\Entity\Commentaire
    $commentaire)
    {
     $this->commentaires[] = $commentaire;
    return $this;
    }
	
    /**
    * @param Aka\ForumBundle\Entity\Commentaire $commentaire
    */
    public function removeCommentaire(\Aka\ForumBundle\Entity\Commentaire
    $commentaire)
    {
    $this->commentaires->removeElement($commentaire);
    }
	
	/**
    * @return Doctrine\Common\Collections\Collection
    */
    public function getCommentaires()
   {
    return $this->commentaires;
    }
	
	
	
    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Sujet
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set publication
     *
     * @param boolean $publication
     * @return Sujet
     */
    public function setPublication($publication)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return boolean 
     */
    public function getPublication()
    {
        return $this->publication;
    }
	
	/**
	@param datetime $dateEdition
    * @return Sujet
    */
    public function setDateEdition(\Datetime $dateEdition)
    {
    $this->dateEdition = $dateEdition;
    return $this;
    }
	
	
    /**
    * @return date
    */
    public function getDateEdition()
    {
    return $this->dateEdition;
    }

	/**
    * @param string $slug
    * @return Sujet
    */
    public function setSlug($slug)
    {
    $this->slug = $slug;
    return $this;
    }
	
	
    /**
    * @return string
    */
    public function getSlug()
    {
    return $this->slug;
    }
     

}
