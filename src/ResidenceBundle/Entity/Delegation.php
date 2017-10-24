<?php

namespace ResidenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Delegation
 *
 * @ORM\Table(name="delegation")
 * @ORM\Entity(repositoryClass="ResidenceBundle\Repository\DelegationRepository")
 */
class Delegation
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
     * @ORM\Column(name="chef", type="string", length=255)
     */
    private $chef;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="bigint")
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="nombrePersonne", type="integer")
     */
    private $nombrePersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var \Chambre
     *
     * @ORM\ManyToOne(targetEntity="Chambre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="chambre", referencedColumnName="id", nullable=false)
     * })
     */
    private $chambre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateArrive", type="datetime")
     */
    private $dateArrive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRetour", type="datetime")
     */
    private $dateRetour;

    /**
     * @var string
     *
     * @ORM\Column(name="addresse", type="text")
     */
    private $addresse;

    /**
     * @var \Accueillant
     *
     * @ORM\ManyToOne(targetEntity="Accueillant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="accueillant", referencedColumnName="id", nullable=false)
     * })
     */
    private $accueillant;


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
     * Set chef
     *
     * @param string $chef
     *
     * @return Delegation
     */
    public function setChef($chef)
    {
        $this->chef = $chef;

        return $this;
    }

    /**
     * Get chef
     *
     * @return string
     */
    public function getChef()
    {
        return $this->chef;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Delegation
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Delegation
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Delegation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set nombrePersonne
     *
     * @param integer $nombrePersonne
     *
     * @return Delegation
     */
    public function setNombrePersonne($nombrePersonne)
    {
        $this->nombrePersonne = $nombrePersonne;

        return $this;
    }

    /**
     * Get nombrePersonne
     *
     * @return int
     */
    public function getNombrePersonne()
    {
        return $this->nombrePersonne;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Delegation
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set chambre
     *
     * @param integer $chambre
     *
     * @return Delegation
     */
    public function setChambre($chambre)
    {
        $this->chambre = $chambre;

        return $this;
    }

    /**
     * Get chambre
     *
     * @return int
     */
    public function getChambre()
    {
        return $this->chambre;
    }

    /**
     * Set dateArrive
     *
     * @param \DateTime $dateArrive
     *
     * @return Delegation
     */
    public function setDateArrive($dateArrive)
    {
        $this->dateArrive = $dateArrive;

        return $this;
    }

    /**
     * Get dateArrive
     *
     * @return \DateTime
     */
    public function getDateArrive()
    {
        return $this->dateArrive;
    }

    /**
     * Set dateRetour
     *
     * @param \DateTime $dateRetour
     *
     * @return Delegation
     */
    public function setDateRetour($dateRetour)
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    /**
     * Get dateRetour
     *
     * @return \DateTime
     */
    public function getDateRetour()
    {
        return $this->dateRetour;
    }

    /**
     * Set addresse
     *
     * @param string $addresse
     *
     * @return Delegation
     */
    public function setAddresse($addresse)
    {
        $this->addresse = $addresse;

        return $this;
    }

    /**
     * Get addresse
     *
     * @return string
     */
    public function getAddresse()
    {
        return $this->addresse;
    }

    /**
     * Set $accueillant
     *
     * @param \ResidenceBundle\Entity\Accueillant $accueillant
     *
     * @return Accueillant
     */
    public function setAccueillant(\ResidenceBundle\Entity\Accueillant $accueillant)
    {
        $this->accueillant = $accueillant;

        return $this;
    }

    /**
     * Get $accueillant
     *
     * @return \ResidenceBundle\Entity\Accueillant
     */
    public function getAccueillant()
    {
        return $this->accueillant;
    }
}

