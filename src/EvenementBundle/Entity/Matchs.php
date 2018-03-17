<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matchs
 *
 * @ORM\Table(name="matchs")
 * @ORM\Entity
 */
class Matchs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="equipe1", type="string", length=255, nullable=false)
     */
    private $equipe1;

    /**
     * @var string
     *
     * @ORM\Column(name="equipe2", type="string", length=255, nullable=false)
     */
    private $equipe2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_match", type="date", nullable=false)
     */
    private $dateMatch;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure", type="time", nullable=false)
     */
    private $heure;

    /**
     * @var string
     *
     * @ORM\Column(name="stade", type="string", length=255, nullable=false)
     */
    private $stade;

    /**
     * @var string
     *
     * @ORM\Column(name="type_phase", type="string", length=255, nullable=false)
     */
    private $typePhase;

    /**
     * @var string
     *
     * @ORM\Column(name="type_match", type="string", length=255, nullable=false)
     */
    private $typeMatch;


}

