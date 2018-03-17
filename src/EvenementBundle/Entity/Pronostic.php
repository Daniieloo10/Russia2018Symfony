<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pronostic
 *
 * @ORM\Table(name="pronostic")
 * @ORM\Entity
 */
class Pronostic
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var integer
     *
     * @ORM\Column(name="idMatch", type="integer", nullable=false)
     */
    private $idmatch;

    /**
     * @var string
     *
     * @ORM\Column(name="pro", type="string", length=255, nullable=false)
     */
    private $pro;


}

