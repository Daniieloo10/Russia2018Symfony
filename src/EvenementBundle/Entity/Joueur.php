<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur")
 * @ORM\Entity
 */
class Joueur
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
     * @ORM\Column(name="nom_equipe", type="string", length=50, nullable=false)
     */
    private $nomEquipe;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_joueur", type="string", length=50, nullable=false)
     */
    private $nomJoueur;

    /**
     * @var string
     *
     * @ORM\Column(name="post", type="string", length=50, nullable=false)
     */
    private $post;


}

