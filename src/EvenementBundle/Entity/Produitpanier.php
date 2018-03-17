<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produitpanier
 *
 * @ORM\Table(name="produitpanier", indexes={@ORM\Index(name="idpanier", columns={"id"}), @ORM\Index(name="id", columns={"id"})})
 * @ORM\Entity
 */
class Produitpanier
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
     * @ORM\Column(name="label", type="string", length=200, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=true)
     */
    private $type;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=true)
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */
    private $quantite;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=500, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="taille", type="string", length=100, nullable=true)
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=100, nullable=true)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=100, nullable=true)
     */
    private $couleur;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="idpanier", type="integer", nullable=true)
     */
    private $idpanier;


}

