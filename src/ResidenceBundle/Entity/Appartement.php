<?php

namespace ResidenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Appartement
 *
 * @ORM\Table(name="appartement")
 * @ORM\Entity(repositoryClass="ResidenceBundle\Repository\AppartementRepository")
 */
class Appartement
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
     * @ORM\Column(name="nombreChambre", type="integer")
     */
    private $nombreChambre;

    /**
     * @var \Residence
     *
     * @ORM\ManyToOne(targetEntity="Residence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="residence", referencedColumnName="id", nullable=false)
     * })
     */
    private $residence;


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
     * @return Appartement
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
     * Set nombreChambre
     *
     * @param integer $nombreChambre
     *
     * @return Appartement
     */
    public function setNombreChambre($nombreChambre)
    {
        $this->nombreChambre = $nombreChambre;

        return $this;
    }

    /**
     * Get nombreChambre
     *
     * @return int
     */
    public function getNombreChambre()
    {
        return $this->nombreChambre;
    }

    /**
     * Set $residence
     *
     * @param \ResidenceBundle\Entity\Residence $residence
     *
     * @return Residence
     */
    public function setResidence(\ResidenceBundle\Entity\Residence $residence)
    {
        $this->residence = $residence;

        return $this;
    }

    /**
     * Get $residence
     *
     * @return \ResidenceBundle\Entity\Residence
     */
    public function getResidence()
    {
        return $this->residence;
    }
}

