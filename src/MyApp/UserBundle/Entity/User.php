<?php
/**
 * Created by PhpStorm.
 * User: Marwen
 * Date: 29/10/2017
 * Time: 18:29
 */
namespace MyApp\UserBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert ;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */ class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    private $nom;
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    private $prenom;
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    private $nationalite;

    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    private $role;


    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    private $telephone;
    /**
     * @ORM\Column(type="float",length=255,nullable=true)
     */
    private $argent;






    public function __construct()
    {
        parent::__construct();
    }








    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }



    /**
     * @return mixed
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * @param mixed $nationalite
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }


    // your own logic

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set argent
     *
     * @param float $argent
     *
     * @return User
     */
    public function setArgent($argent)
    {
        $this->argent = $argent;

        return $this;
    }

    /**
     * Get argent
     *
     * @return float
     */
    public function getArgent()
    {
        return $this->argent;
    }
}
