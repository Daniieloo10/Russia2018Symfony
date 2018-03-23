<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation")
 * @ORM\Entity
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
     * @var \User
     * @ORM\ManyToOne(targetEntity="MyApp\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     * })
     */
    private $iduser;

    /**
     * @var Evenement
     * @ORM\ManyToOne(targetEntity="EvenementBundle\Entity\Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="idEvenement")
     * })
     */
    private $idevenement;

    /**
     * @return int
     */
    public function getEvaluationid()
    {
        return $this->evaluationid;
    }

    /**
     * @param int $evaluationid
     */
    public function setEvaluationid($evaluationid)
    {
        $this->evaluationid = $evaluationid;
    }

    /**
     * @return string
     */
    public function getEmailparticipant()
    {
        return $this->emailparticipant;
    }

    /**
     * @param string $emailparticipant
     */
    public function setEmailparticipant($emailparticipant)
    {
        $this->emailparticipant = $emailparticipant;
    }

    /**
     * @return string
     */
    public function getNomparticipant()
    {
        return $this->nomparticipant;
    }

    /**
     * @param string $nomparticipant
     */
    public function setNomparticipant($nomparticipant)
    {
        $this->nomparticipant = $nomparticipant;
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
    public function getPrenomparticipant()
    {
        return $this->prenomparticipant;
    }

    /**
     * @param string $prenomparticipant
     */
    public function setPrenomparticipant($prenomparticipant)
    {
        $this->prenomparticipant = $prenomparticipant;
    }

    /**
     * @return float
     */
    public function getNoteevenement()
    {
        return $this->noteevenement;
    }

    /**
     * @param float $noteevenement
     */
    public function setNoteevenement($noteevenement)
    {
        $this->noteevenement = $noteevenement;
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

    /**
     * @return Evenement
     */
    public function getIdevenement()
    {
        return $this->idevenement;
    }

    /**
     * @param Evenement $idevenement
     */
    public function setIdevenement($idevenement)
    {
        $this->idevenement = $idevenement;
    }


}

