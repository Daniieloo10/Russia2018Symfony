<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Participation
 *
 * @ORM\Table(name="participation")
 * @ORM\Entity(repositoryClass="EvenementBundle\Repository\ParticipationRepository")
 */
class Participation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idParticipation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idparticipation;

    /**
     * @var int
     *
     * @ORM\Column(name="iduser", type="integer",  nullable=false)
     */
    private $iduser;

    /**
     * @var int
     *
     * @ORM\Column(name="idevenement", type="integer",  nullable=false)
     */
    private $idevenement;





    /**
     * Get idparticipation
     *
     * @return integer
     */
    public function getIdparticipation()
    {
        return $this->idparticipation;
    }

    /**
     * Set iduser
     *
     * @param integer $iduser
     *
     * @return Participation
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return integer
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set idevenement
     *
     * @param integer $idevenement
     *
     * @return Participation
     */
    public function setIdevenement($idevenement)
    {
        $this->idevenement = $idevenement;

        return $this;
    }

    /**
     * Get idevenement
     *
     * @return integer
     */
    public function getIdevenement()
    {
        return $this->idevenement;
    }
}
