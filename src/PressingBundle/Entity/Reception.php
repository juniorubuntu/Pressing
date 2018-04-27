<?php

namespace PressingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Reception
 * @ORM\Table(name="reception")
 * @ORM\Entity()
 */
class Reception {

    public function __toString() {
        return $this->getId() . ' ';
    }

    public function __construct() {
        $this->setLivre(false);
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \stdClass
     * 
     * @ORM\ManyToOne(targetEntity="Client")
     * @Assert\NotBlank()
     */
    private $client;

    /**
     * @var \stdClass
     * 
     * @ORM\ManyToOne(targetEntity="User")
     * @Assert\NotBlank()
     */
    private $personnel;

    /**
     * @var float
     * @ORM\Column(name="express", type="float")
     */
    private $express;

    /**
     * @var text
     * @ORM\Column(name="gratuit", type="text", nullable=true)
     */
    private $gratuit;

    /**
     * @var boolean
     * @ORM\Column(name="livre", type="boolean", nullable=true)
     */
    private $livre;

    /**
     * @var integer
     * @ORM\Column(name="montantTotal", type="integer")
     */
    private $montantTotal;

    /**
     * @var integer
     * @ORM\Column(name="montantVerse", type="integer")
     */
    private $montantVerse;

    /**
     * @var \Datetime
     * @ORM\Column(name="dateOperation", type="datetime")
     */
    private $dateOperation;

    /**
     * @var \DateTime
     * @ORM\Column(name="dateRdv", type="datetime")
     */
    private $dateRdv;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set express
     *
     * @param float $express
     *
     * @return Reception
     */
    public function setExpress($express) {
        $this->express = $express;

        return $this;
    }

    /**
     * Get express
     *
     * @return float
     */
    public function getExpress() {
        return $this->express;
    }

    /**
     * Set gratuit
     *
     * @param text $gratuit
     *
     * @return Reception
     */
    public function setGratuit($gratuit) {
        $this->gratuit = $gratuit;

        return $this;
    }

    /**
     * Get gratuit
     *
     * @return text
     */
    public function getGratuit() {
        return $this->gratuit;
    }

    /**
     * Set montantTotal
     *
     * @param integer $montantTotal
     *
     * @return Reception
     */
    public function setMontantTotal($montantTotal) {
        $this->montantTotal = $montantTotal;

        return $this;
    }

    /**
     * Get montantTotal
     *
     * @return integer
     */
    public function getMontantTotal() {
        return $this->montantTotal;
    }

    /**
     * Set montantVerse
     *
     * @param integer $montantVerse
     *
     * @return Reception
     */
    public function setMontantVerse($montantVerse) {
        $this->montantVerse = $montantVerse;

        return $this;
    }

    /**
     * Get montantVerse
     *
     * @return integer
     */
    public function getMontantVerse() {
        return $this->montantVerse;
    }

    /**
     * Set dateOperation
     *
     * @param \DateTime $dateOperation
     *
     * @return Reception
     */
    public function setDateOperation($dateOperation) {
        $this->dateOperation = $dateOperation;

        return $this;
    }

    /**
     * Get dateOperation
     *
     * @return \DateTime
     */
    public function getDateOperation() {
        return $this->dateOperation;
    }

    /**
     * Set dateRdv
     *
     * @param \DateTime $dateRdv
     *
     * @return Reception
     */
    public function setDateRdv($dateRdv) {
        $this->dateRdv = $dateRdv;

        return $this;
    }

    /**
     * Get dateRdv
     *
     * @return \DateTime
     */
    public function getDateRdv() {
        return $this->dateRdv;
    }

    /**
     * Set client
     *
     * @param \PressingBundle\Entity\Client $client
     *
     * @return Reception
     */
    public function setClient(\PressingBundle\Entity\Client $client = null) {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \PressingBundle\Entity\Client
     */
    public function getClient() {
        return $this->client;
    }

    /**
     * Set personnel
     *
     * @param \PressingBundle\Entity\User $personnel
     *
     * @return Reception
     */
    public function setPersonnel(\PressingBundle\Entity\User $personnel = null) {
        $this->personnel = $personnel;

        return $this;
    }

    /**
     * Get personnel
     *
     * @return \PressingBundle\Entity\User
     */
    public function getPersonnel() {
        return $this->personnel;
    }

    /**
     * Set livre
     *
     * @param boolean $livre
     *
     * @return Reception
     */
    public function setLivre($livre) {
        $this->livre = $livre;

        return $this;
    }

    /**
     * Get livre
     *
     * @return boolean
     */
    public function getLivre() {
        return $this->livre;
    }

}
