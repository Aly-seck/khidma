<?php

namespace ResidenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chambre
 *
 * @ORM\Table(name="chambre")
 * @ORM\Entity(repositoryClass="ResidenceBundle\Repository\ChambreRepository")
 */
class Chambre
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
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var \Appartement
     *
     * @ORM\ManyToOne(targetEntity="Appartement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="appartement", referencedColumnName="id", nullable=false)
     * })
     */
    private $appartement;

    /**
     * @var \Responsable
     *
     * @ORM\ManyToOne(targetEntity="Responsable")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="responsable", referencedColumnName="id", nullable=false)
     * })
     */
    private $responsable;


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
     * Set numero
     *
     * @param integer $numero
     *
     * @return Chambre
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Chambre
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set $appartement
     *
     * @param \ResidenceBundle\Entity\Appartement $appartement
     *
     * @return Appartement
     */
    public function setAppartement(\ResidenceBundle\Entity\Appartement $appartement)
    {
        $this->appartement = $appartement;

        return $this;
    }

    /**
     * Get $appartement
     *
     * @return \ResidenceBundle\Entity\Appartement
     */
    public function getAppartement()
    {
        return $this->appartement;
    }

    /**
     * Set $responsable
     *
     * @param \ResidenceBundle\Entity\Responsable $responsable
     *
     * @return Responsable
     */
    public function setResponsable(\ResidenceBundle\Entity\Responsable $responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get $responsable
     *
     * @return \ResidenceBundle\Entity\Responsable
     */
    public function getResponsable()
    {
        return $this->responsable;
    }
}

