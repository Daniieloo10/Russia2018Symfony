<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MyApp\UserBundle\Entity\User;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation")
 * @ORM\Entity(repositoryClass="EvenementBundle\Repository\EvaluationRepository")
 */
class Evaluation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="evaluationId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $evaluationid;

    /**
     * @var string
     *
     * @ORM\Column(name="emailParticipant", type="string", length=30, nullable=true)
     */
    private $emailparticipant;

    /**
     * @var string
     *
     * @ORM\Column(name="nomParticipant", type="string", length=20, nullable=false)
     */
    private $nomparticipant;

    /**
     * @var string
     *
     * @ORM\Column(name="nomEvenement", type="string", length=30, nullable=false)
     */
    private $nomevenement;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomParticipant", type="string", length=30, nullable=false)
     */
    private $prenomparticipant;

    /**
     * @var float
     *
     * @ORM\Column(name="noteEvenement", type="float", precision=10, scale=0, nullable=true)
     */
    private $noteevenement;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="MyApp\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     * })
     */
    private $iduser;

    /**
     * @var integer
     *
     * @ORM\Column(name="idevenement", type="integer", nullable=false)
     */
    private $idevenement;




    /**
     * Get evaluationid
     *
     * @return integer
     */
    public function getEvaluationid()
    {
        return $this->evaluationid;
    }

    /**
     * Set emailparticipant
     *
     * @param string $emailparticipant
     *
     * @return Evaluation
     */
    public function setEmailparticipant($emailparticipant)
    {
        $this->emailparticipant = $emailparticipant;

        return $this;
    }

    /**
     * Get emailparticipant
     *
     * @return string
     */
    public function getEmailparticipant()
    {
        return $this->emailparticipant;
    }

    /**
     * Set nomparticipant
     *
     * @param string $nomparticipant
     *
     * @return Evaluation
     */
    public function setNomparticipant($nomparticipant)
    {
        $this->nomparticipant = $nomparticipant;

        return $this;
    }

    /**
     * Get nomparticipant
     *
     * @return string
     */
    public function getNomparticipant()
    {
        return $this->nomparticipant;
    }

    /**
     * Set nomevenement
     *
     * @param string $nomevenement
     *
     * @return Evaluation
     */
    public function setNomevenement($nomevenement)
    {
        $this->nomevenement = $nomevenement;

        return $this;
    }

    /**
     * Get nomevenement
     *
     * @return string
     */
    public function getNomevenement()
    {
        return $this->nomevenement;
    }

    /**
     * Set prenomparticipant
     *
     * @param string $prenomparticipant
     *
     * @return Evaluation
     */
    public function setPrenomparticipant($prenomparticipant)
    {
        $this->prenomparticipant = $prenomparticipant;

        return $this;
    }

    /**
     * Get prenomparticipant
     *
     * @return string
     */
    public function getPrenomparticipant()
    {
        return $this->prenomparticipant;
    }

    /**
     * Set noteevenement
     *
     * @param float $noteevenement
     *
     * @return Evaluation
     */
    public function setNoteevenement($noteevenement)
    {
        $this->noteevenement = $noteevenement;

        return $this;
    }

    /**
     * Get noteevenement
     *
     * @return float
     */
    public function getNoteevenement()
    {
        return $this->noteevenement;
    }

    /**
     * Set iduser
     *
     * @param integer $iduser
     *
     * @return Evaluation
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
     * @return Evaluation
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
