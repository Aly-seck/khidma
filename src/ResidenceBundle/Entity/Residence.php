<?php

namespace ResidenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Residence
 *
 * @ORM\Table(name="residence")
 * @ORM\Entity(repositoryClass="ResidenceBundle\Repository\ResidenceRepository")
 */
class Residence
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreAppartement", type="integer")
     */
    private $nombreAppartement;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Residence
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nombreAppartement
     *
     * @param integer $nombreAppartement
     *
     * @return Residence
     */
    public function setNombreAppartement($nombreAppartement)
    {
        $this->nombreAppartement = $nombreAppartement;

        return $this;
    }

    /**
     * Get nombreAppartement
     *
     * @return int
     */
    public function getNombreAppartement()
    {
        return $this->nombreAppartement;
    }

}

