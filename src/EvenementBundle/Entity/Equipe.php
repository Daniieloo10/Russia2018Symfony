<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe")
 * @ORM\Entity
 */
class Equipe
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
     * @ORM\Column(name="nom_equipe", type="string", length=45, nullable=true)
     */
    private $nomEquipe;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_poule", type="string", length=20, nullable=false)
     */
    private $nomPoule;

    /**
     * @var string
     *
     * @ORM\Column(name="continent", type="string", length=45, nullable=true)
     */
    private $continent;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_joueur", type="integer", nullable=true)
     */
    private $nbrJoueur;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_participation", type="integer", nullable=true)
     */
    private $nbrParticipation;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_coupe", type="integer", nullable=true)
     */
    private $nbrCoupe;

    /**
     * @var float
     *
     * @ORM\Column(name="taux_victoire", type="float", precision=10, scale=0, nullable=true)
     */
    private $tauxVictoire;


}

