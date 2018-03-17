<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stade
 *
 * @ORM\Table(name="stade")
 * @ORM\Entity
 */
class Stade
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
     * @var string
     *
     * @ORM\Column(name="nom_stade", type="string", length=100, nullable=false)
     */
    private $nomStade;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=100, nullable=false)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=100, nullable=false)
     */
    private $adresse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_construction", type="date", nullable=false)
     */
    private $dateConstruction;

    /**
     * @var string
     *
     * @ORM\Column(name="surface", type="string", length=100, nullable=false)
     */
    private $surface;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacite", type="integer", nullable=false)
     */
    private $capacite;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=100, nullable=false)
     */
    private $image;


}

