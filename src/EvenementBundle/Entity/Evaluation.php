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
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     */
    private $iduser;

    /**
     * @var integer
     *
     * @ORM\Column(name="idEvenement", type="integer", nullable=false)
     */
    private $idevenement;


}

