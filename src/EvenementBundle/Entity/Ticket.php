<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket")
 * @ORM\Entity
 */
class Ticket
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ref", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ref;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombre", type="integer", nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="stade", type="string", length=100, nullable=false)
     */
    private $stade;

    /**
     * @var string
     *
     * @ORM\Column(name="equipe1", type="string", length=200, nullable=false)
     */
    private $equipe1;

    /**
     * @var string
     *
     * @ORM\Column(name="equipe2", type="string", length=200, nullable=false)
     */
    private $equipe2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_match", type="date", nullable=false)
     */
    private $dateMatch;

    /**
     * @var string
     *
     * @ORM\Column(name="heure", type="string", length=200, nullable=false)
     */
    private $heure;

    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=100, nullable=false)
     */
    private $place;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;


}

