<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert ;




/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="EvenementBundle\Repository\EvenementRepository")
 */
class Evenement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idEvenement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevenement;

    /**
     * @var string
     *@Assert\NotBlank(message="Le champ nom est vide")
     *@Assert\Length( min = 10,
     *      max = 50,
     *      minMessage = "Votre nom doit contenir au moins {{ limit }} caracteres ",
     *      maxMessage = "Votre nom ne doit pas depasser{{ limit }} caracteres")
     * @ORM\Column(name="nomEvenement", type="string", length=100, nullable=false)
     */
    private $nomevenement;

    /**
     * @var string
     * @Assert\NotBlank(message="Le champ description est vide")
     *@Assert\Length( min = 10,
     *      max = 80,
     *      minMessage = "Votre description doit contenir au moins {{ limit }} caracteres ",
     *      maxMessage = "Votre descirption ne doit pas depasser{{ limit }} caracteres")
     * @ORM\Column(name="description", type="string", length=300, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *Assert\Date()
     * @Assert\GreaterThan("today",message="Veuillez entre une date valide")
     * @ORM\Column(name="dateEvenement", type="date", nullable=false)
     */
    private $dateevenement;

    /**
     * @var string
     *@Assert\NotBlank(message="Le champ duree est vide")
     * @Assert\Length(
     *      max = 50,
     *
     *      maxMessage = "Votre descirption ne doit pas depasser{{ limit }} caracteres")
     * @ORM\Column(name="duree", type="string", length=50, nullable=true)
     */
    private $duree;

    /**
     * @var string
     *@Assert\NotBlank(message="Le champ destination est vide")
     * @Assert\Length(
     *      max = 50,
     *
     *      maxMessage = "Votre destination ne doit pas depasser{{ limit }} caracteres")
     * @ORM\Column(name="destination", type="string", length=100, nullable=false)
     */
    private $destination;

    /**
     * @var string
     *@Assert\NotBlank(message="Le champ type est vide")
     * @Assert\Length(
     *      max = 50,
     *
     *      maxMessage = "Votre descirption ne doit pas depasser{{ limit }} caracteres")
     * @ORM\Column(name="type", type="string", length=100, nullable=false)
     */
    private $type;


    /**
     * @var string
     *@Assert\NotBlank(message="Le champ etat est vide")
     * @ORM\Column(name="etat", type="string", length=20, nullable=false)
     */
    private $etat;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Ajouter une image jpg")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $image;



    /**
     * @var integer
     *@Assert\NotBlank(message="Le champ nombre de places est vide")
     * @Assert\Range(
     *      min = 15,
     *
     *      minMessage = "le nombre de places doit etre supperieur à {{ limit }}"
     *
     * )
     * @ORM\Column(name="nombrePlace", type="integer", nullable=false)
     */
    private $nombreplace;



    /**
     * @var float
     *@Assert\NotBlank(message="Le champ Prix est vide")
     *@Assert\Range(
     *      min = 0,
     *
     *      minMessage = "veuillez entrer un prix supperieur à {{ limit }}"
     *
     * )
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var \User
     * @ORM\ManyToOne(targetEntity="MyApp\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     * })
     */
    private $iduser;

    private  $moyenne ;
    private  $participe ;
    private  $evalue ;
    private  $countCommentaire ;

    /**
     * @return mixed
     */
    public function getCountCommentaire()
    {
        return $this->countCommentaire;
    }

    /**
     * @param mixed $countCommentaire
     */
    public function setCountCommentaire($countCommentaire)
    {
        $this->countCommentaire = $countCommentaire;
    }

    /**
     * @return mixed
     */
    public function getParticipe()
    {
        return $this->participe;
    }

    /**
     * @param mixed $participe
     */
    public function setParticipe($participe)
    {
        $this->participe = $participe;
    }

    /**
     * @return mixed
     */
    public function getEvalue()
    {
        return $this->evalue;
    }

    /**
     * @param mixed $evalue
     */
    public function setEvalue($evalue)
    {
        $this->evalue = $evalue;
    }

    /**
     * @return mixed
     */
    public function getMoyenne()
    {
        return $this->moyenne;
    }

    /**
     * @param mixed $moyenne
     */
    public function setMoyenne($moyenne)
    {
        $this->moyenne = $moyenne;
    }

    /**
     * @return int
     */
    public function getIdevenement()
    {
        return $this->idevenement;
    }

    /**
     * @param int $idevenement
     */
    public function setIdevenement($idevenement)
    {
        $this->idevenement = $idevenement;
    }

    /**
     * @return string
     */
    public function getNomevenement()
    {
        return $this->nomevenement;
    }

    /**
     * @param string $nomevenement
     */
    public function setNomevenement($nomevenement)
    {
        $this->nomevenement = $nomevenement;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return \DateTime
     */
    public function getDateevenement()
    {
        return $this->dateevenement;
    }

    /**
     * @param \DateTime $dateevenement
     */
    public function setDateevenement($dateevenement)
    {
        $this->dateevenement = $dateevenement;
    }

    /**
     * @return string
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param string $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param string $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }





    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }





    /**
     * @return int
     */
    public function getNombreplace()
    {
        return $this->nombreplace;
    }

    /**
     * @param int $nombreplace
     */
    public function setNombreplace($nombreplace)
    {
        $this->nombreplace = $nombreplace;
    }

    /**
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return \User
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param \User $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }


    public function getImage()
    {
        return $this->image;
    }


    public function setImage($image)
    {
        $this->image = $image;
    }




}
